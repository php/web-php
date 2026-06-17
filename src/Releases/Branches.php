<?php

namespace phpweb\Releases;

use DateInterval;
use DateTime;
use ValueError;
use function count;
use function explode;
use function krsort;
use function ksort;
use function strlen;
use function strncmp;
use function version_compare;

/**
 * @phpstan-type NormalizedSourceStruct array{
 *     filename: string,
 *     name: string,
 *     md5?: string,
 *     sha256?: string,
 *     date: string,
 *  }
 *
 * @phpstan-type NormalizedReleaseStruct array{
 *    version: string,
 *    announcement: bool,
 *    tags: list<string>,
 *    date: string,
 *    source: list<NormalizedSourceStruct>
 * }
 */
class Branches
{
    /**
     * @return array<int, array<string, NormalizedReleaseStruct>>
     */
    public static function getReleaseData(): array
    {
        static $cache = null;

        /* there is no normalisation required here because it's all standard format */
        return $cache ??= require __DIR__ . '/../../include/version.inc';
    }

    /**
     * @return array<int, array<string, NormalizedReleaseStruct>>
     */
    public static function getOldReleaseData(): array
    {
        static $cache = null;

        return $cache ??= (function () {
            $original = require __DIR__ . '/../../include/releases.inc';

            foreach ($original as &$releases) {
                foreach ($releases as $releaseId => &$release) {
                    /* always force the version to be copied into the array, some normalized steps do it anyway */
                    $release['version'] = $releaseId;

                    /* only care for true or false here */
                    $announcement = $release['announcement'] ?? null;
                    if (is_array($announcement)) {
                        $release['announcement'] = !empty($announcement);
                    }

                    /* we have release announcements going back to 4.1.0 in releases/x_y_z.php */
                    $release['announcement'] ??= version_compare($release['version'], '4.1.0', '>=');

                    /* if any of the source files do not have a `filename` they are invalid */
                    foreach ($release['source'] as $sIdx => $source) {
                        if (!isset($source['filename'])) {
                            unset($release['source'][$sIdx]);
                        }
                    }
                }
            }

            return $original;
        })();
    }

    /**
     * @return array<string, array{security?:string, stable?:string, date?:string}>
     */
    public static function getBranchOverrides(): array
    {
        static $cache = null;
        return $cache ??= require __DIR__ . '/../../include/branch-overrides.inc';
    }

    /**
     * @return array<int, array<string, NormalizedReleaseStruct>>
     */
    public static function all(): array
    {
        static $cache = null;
        return $cache ??= (function () {
            $results = [];
            foreach (self::getReleaseData() as $majorVersion => $releases) {
                foreach ($releases as $releaseId => $release) {
                    $results[$majorVersion][$releaseId] = $release;
                }
            }

            foreach (self::getOldReleaseData() as $majorVersion => $releases) {
                foreach ($releases as $releaseId => $release) {
                    $results[$majorVersion][$releaseId] = $release;
                }
            }

            return $results;
        })();
    }

    /**
     * Returns an associative array [$major][$major.$minor] = $release where $release is the
     * standard data struct. In effect, finding the last version for each.
     *
     * Previously get_all_branches
     *
     * @return array<int, array<string, NormalizedReleaseStruct>>
     */
    public static function get_all_branches(): array
    {
        $GLOBAL_OLDRELEASES = self::getOldReleaseData();
        $GLOBAL_RELEASES = self::getReleaseData();
        $branches = [];

        foreach ($GLOBAL_OLDRELEASES as $major => $releases) {
            foreach ($releases as $version => $release) {
                $branch = self::versionToBranch($version);

                if (!isset($branches[$major][$branch])
                    || version_compare($version, $branches[$major][$branch]['version'], 'gt')
                ) {
                    $branches[$major][$branch] = $release;
                }
            }
        }

        foreach ($GLOBAL_RELEASES as $major => $releases) {
            foreach ($releases as $version => $release) {
                $branch = self::versionToBranch($version);

                if (!isset($branches[$major][$branch])
                    || version_compare($version, $branches[$major][$branch]['version'], 'gt')
                ) {
                    $branches[$major][$branch] = $release;
                }
            }
        }

        krsort($branches);
        foreach ($branches as &$branch) {
            krsort($branch);
        }

        return $branches;
    }

    /**
     * @param bool $include_recent_eols
     * @return array<int, array<string, NormalizedReleaseStruct>>
     */
    public static function active(bool $include_recent_eols = true): array
    {
        $recentInterval = new DateInterval('P28D');

        $GLOBAL_RELEASES = self::getReleaseData();
        $branches = [];
        $now = new DateTime();

        foreach ($GLOBAL_RELEASES as $major => $releases) {
            foreach ($releases as $releaseId => $release) {
                $branch = self::versionToBranch($releaseId);

                $threshold = self::getBranchSecurityEOLDate($branch);
                if ($threshold === null) {
                    // No EOL date available, assume it is ancient.
                    continue;
                }

                if ($include_recent_eols) {
                    $threshold->add($recentInterval);
                }

                if ($now < $threshold) {
                    $branches[$major][$branch] = $release;
                }
            }

            if (!empty($branches[$major])) {
                ksort($branches[$major]);
            }
        }

        ksort($branches);

        return $branches;
    }

    /**
     * @return array<int, array<string, array{
     *     date: string,
     *     link: string,
     *     version: string,
     * }>>
     */
    public static function eol(): array
    {
        $GLOBAL_OLDRELEASES = self::getOldReleaseData();
        $GLOBAL_RELEASES = self::getReleaseData();

        $branches = [];
        $now = new DateTime();

        // Gather the last release on each branch into a convenient array.
        foreach ($GLOBAL_OLDRELEASES as $major => $releases) {
            foreach ($releases as $version => $release) {
                $branch = self::versionToBranch($version);

                if (!isset($branches[$major][$branch])
                    || version_compare($version, $branches[$major][$branch]['version'], 'gt')
                ) {
                    $branches[(string)$major][$branch] = [
                        'date' => $release['date'],
                        'link' => "/releases#$version",
                        'version' => $version,
                    ];
                }
            }
        }

        /* Exclude releases from active branches, where active is defined as "in
         * the $RELEASES array and not explicitly marked as EOL there". */
        foreach ($GLOBAL_RELEASES as $major => $releases) {
            foreach ($releases as $version => $release) {
                $branch = self::versionToBranch($version);

                if ($now < self::getBranchSecurityEOLDate($branch)) {
                    /* This branch isn't EOL: remove it from our array. */
                    if (isset($branches[$major][$branch])) {
                        unset($branches[$major][$branch]);
                    }
                }
            }
        }

        krsort($branches);
        foreach ($branches as &$branch) {
            krsort($branch);
        }

        return $branches;
    }

    /**
     * Finds the first release for a given branch
     *
     * @return NormalizedReleaseStruct|null
     */
    public static function getInitialReleaseForBranch(string $branch): ?array
    {
        $all = self::all();
        $branch = self::versionToBranch($branch);
        [$major] = explode('.', $branch);

        /* it seems that 8.4.0 is completely missing from the data */
        for ($patch = 0; $patch < 5; $patch++) {
            $release = $all[$major][$branch . '.' . $patch] ?? null;
            if ($release) {
                return $release;
            }
        }

        return null;
    }

    /**
     * Finds the last release from a given branch
     *
     * @return NormalizedReleaseStruct|null
     */
    public static function getFinalReleaseForBranch(string $branch): ?array
    {
        $GLOBAL_OLDRELEASES = self::getOldReleaseData();
        $GLOBAL_RELEASES = self::getReleaseData();
        $branch = self::versionToBranch($branch);
        [$major] = explode('.', $branch);

        $last = "$branch.0";
        foreach ($GLOBAL_OLDRELEASES[$major] as $version => $release) {
            if (self::versionToBranch($version) == $branch && version_compare($version, $last, '>')) {
                $last = $version;
            }
        }

        if (isset($GLOBAL_OLDRELEASES[$major][$last])) {
            return $GLOBAL_OLDRELEASES[$major][$last];
        }

        /* If there's only been one release on the branch, it won't be in
         * $OLDRELEASES yet, so let's check $RELEASES. */
        if (isset($GLOBAL_RELEASES[$major][$last])) {
            // Fake a date like we have on the oldreleases array.
            $release = $GLOBAL_RELEASES[$major][$last];
            $release['date'] = $release['source'][0]['date'];

            return $release;
        }

        // Shrug.
        return null;
    }

    public static function getBranchBugsEOLDate(string $branch): ?DateTime
    {
        $GLOBAL_BRANCHES = self::getBranchOverrides();

        if (isset($GLOBAL_BRANCHES[$branch]['stable'])) {
            return new DateTime($GLOBAL_BRANCHES[$branch]['stable']);
        }

        $date = self::getBranchReleaseDate($branch);

        $date = $date?->add(new DateInterval('P2Y'));

        // Versions before 8.2 do not extend the release cycle to the end of the year
        if (version_compare($branch, '8.2', '<')) {
            return $date;
        }

        // Extend the release cycle to the end of the year
        return $date?->setDate((int)$date->format('Y'), 12, 31);
    }

    public static function getBranchSecurityEOLDate(string $branch): ?DateTime
    {
        $GLOBAL_BRANCHES = self::getBranchOverrides();
        if (isset($GLOBAL_BRANCHES[$branch]['security'])) {
            return new DateTime($GLOBAL_BRANCHES[$branch]['security']);
        }

        /* Versions before 5.3 are based solely on the final release date in
         * $OLDRELEASES. */
        if (version_compare($branch, '5.3', '<')) {
            $release = self::getFinalReleaseForBranch($branch);

            return $release ? new DateTime($release['date']) : null;
        }

        $date = self::getBranchReleaseDate($branch);

        // Versions before 8.1 have 3-year support since the initial release
        if (version_compare($branch, '8.1', '<')) {
            return $date?->add(new DateInterval('P3Y'));
        }

        $date = $date?->add(new DateInterval('P4Y'));

        // Extend the release cycle to the end of the year
        return $date?->setDate((int)$date->format('Y'), 12, 31);
    }

    public static function getBranchReleaseDate(string $branch): ?DateTime
    {
        $initial = self::getInitialReleaseForBranch($branch);

        return isset($initial['date']) ? new DateTime($initial['date']) : null;
    }

    public static function getBranchSupportStatus(string $branch): ?string
    {
        $initial = self::getBranchReleaseDate($branch);
        $bug = self::getBranchBugsEOLDate($branch);
        $security = self::getBranchSecurityEOLDate($branch);

        if ($initial && $bug && $security) {
            $now = new DateTime();

            if ($now >= $security) {
                return 'eol';
            }

            if ($now >= $bug) {
                return 'security';
            }

            if ($now >= $initial) {
                return 'stable';
            }

            return 'future';
        }

        return null;
    }

    public static function getCurrentReleaseForBranch(int $major, ?int $minor): ?string
    {
        $GLOBAL_RELEASES = self::getReleaseData();
        $GLOBAL_OLDRELEASES = self::getOldReleaseData();

        $prefix = "{$major}.";
        if ($minor !== null) {
            $prefix .= "{$minor}.";
        }

        foreach (($GLOBAL_RELEASES[$major] ?? []) as $version => $_) {
            if (!strncmp($prefix, $version, strlen($prefix))) {
                return $version;
            }
        }

        foreach (($GLOBAL_OLDRELEASES[$major] ?? []) as $version => $_) {
            if (!strncmp($prefix, $version, strlen($prefix))) {
                return $version;
            }
        }

        return null;
    }

    private static function versionToBranch(string $version): string
    {
        $parts = explode('.', $version);
        if (count($parts) > 1) {
            return "$parts[0].$parts[1]";
        }

        throw new ValueError("Unexpected version '$version'");
    }
}
