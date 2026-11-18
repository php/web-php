<?php

/*
 * Data and markup helpers for the homepage (public/index.php).
 */

use phpweb\Homepage\FeaturedRelease;
use phpweb\Homepage\PackagistStats;
use phpweb\Homepage\ReleaseHistory;
use phpweb\News\NewsHandler;
use phpweb\ProjectGlobals;

require_once __DIR__ . '/branches.inc';
require_once __DIR__ . '/version.inc';

/**
 * Supported branches, newest first, each with its latest release.
 *
 * @return list<array{branch: string, version: string, major: string, minor: string}>
 */
function homepage_supported_releases(): array
{
    $releases = [];
    foreach (get_active_branches() as $major => $branches) {
        foreach ($branches as $branch => $release) {
            [, $minor] = explode('.', $branch);
            $releases[] = [
                'branch' => $branch,
                'version' => $release['version'],
                'major' => (string) $major,
                'minor' => $minor,
            ];
        }
    }

    usort($releases, fn ($a, $b) => version_compare($b['branch'], $a['branch']));

    return $releases;
}

/**
 * The newest front page news entry, shown under the latest releases.
 *
 * @return ?array{title: string, url: string, date: DateTimeImmutable}
 */
function homepage_latest_news(): ?array
{
    $entry = (new NewsHandler())->getFrontPageNews()[0] ?? null;
    if ($entry === null) {
        return null;
    }

    return [
        'title' => $entry['title'],
        'url' => preg_replace('~^https?://(www\.)?php\.net/~', '/', $entry['id']),
        'date' => new DateTimeImmutable($entry['updated']),
    ];
}

/**
 * The branch featured in the "Meet PHP x.y" card (the newest released branch
 * in include/homepage/features.php), with its release dates.
 *
 * @return array{branch: string, released: ?DateTime, latest: ?string, latest_date: ?DateTime, features: list<array{icon: string, title: string, anchor: string, description: string}>, url: string}
 */
function homepage_featured_release(): array
{
    /** @var array<string, list<array{icon: string, title: string, anchor: string, description: string}>> $featureReleases */
    $featureReleases = require __DIR__ . '/homepage/features.php';

    $branch = FeaturedRelease::branch(
        array_map('strval', array_keys($featureReleases)),
        get_branch_release_date(...),
        new DateTimeImmutable(),
    );

    $latest = get_current_release_for_branch(...array_map('intval', explode('.', $branch)));
    $latestDate = null;
    if ($latest !== null) {
        [$major] = explode('.', $branch);
        $date = $GLOBALS['RELEASES'][$major][$latest]['date']
            ?? $GLOBALS['OLDRELEASES'][$major][$latest]['date']
            ?? null;
        $latestDate = $date ? new DateTime($date) : null;
    }

    return [
        'branch' => $branch,
        'released' => get_branch_release_date($branch),
        'latest' => $latest,
        'latest_date' => $latestDate,
        'features' => $featureReleases[$branch],
        'url' => homepage_release_url($branch) ?? '/releases/',
    ];
}

/**
 * Where to read about a branch: its release landing page if it has one,
 * otherwise the x.y.0 announcement.
 */
function homepage_release_url(string $branch): ?string
{
    $public = ProjectGlobals::getPublicRoot();
    if (is_file("$public/releases/$branch/index.php")) {
        return "/releases/$branch/";
    }

    $announcement = 'releases/' . str_replace('.', '_', $branch) . '_0.php';
    if (is_file("$public/$announcement")) {
        return "/$announcement";
    }

    return null;
}

/**
 * @return array{width: int, releases: list<array{branch: string, label: string, title: string, url: ?string, major: bool, left: int, timestamp: int}>, years: list<array{year: int, left: int}>}
 */
function homepage_release_history(): array
{
    $branches = [];
    foreach (get_all_branches() as $majorBranches) {
        foreach (array_keys($majorBranches) as $branch) {
            $branches[] = (string) $branch;
        }
    }

    $history = new ReleaseHistory(
        $branches,
        require __DIR__ . '/homepage/history-overrides.php',
        get_branch_release_date(...),
        homepage_release_url(...),
        (int) date('Y'),
    );

    return $history->timeline();
}

/**
 * @return array{packages: int, versions: int, downloads: int}
 */
function homepage_packagist_stats(): array
{
    return PackagistStats::load(ProjectGlobals::getBackendRoot() . '/packagist-stats.json');
}

/**
 * Inline include/homepage/svg/{$name}.svg (e.g. 'logos/nike'), so it can use
 * currentColor and the page's CSS variables. The attributes are added to its
 * root <svg>; it is hidden from screen readers unless it is given an aria-label.
 *
 * @param array<string, string> $attributes
 */
function homepage_svg(string $name, array $attributes = []): string
{
    static $files = [];
    $svg = $files[$name] ??= trim((string) file_get_contents(__DIR__ . "/homepage/svg/$name.svg"));

    if (!isset($attributes['aria-label'])) {
        $attributes['aria-hidden'] = 'true';
    }

    $html = '';
    foreach ($attributes as $attribute => $value) {
        $html .= ' ' . $attribute . '="' . htmlspecialchars($value) . '"';
    }

    return substr_replace($svg, $html, strlen('<svg'), 0);
}

function homepage_icon(string $name, string $class = 'icon'): string
{
    return homepage_svg($name, ['class' => $class]);
}

function homepage_scribble(string $text): string
{
    return '<span class="scribble">' . $text
        . '<svg viewBox="0 0 220 14" preserveAspectRatio="none" aria-hidden="true">'
        . '<path d="M3 7C54 2 147 3 217 5M20 11C78 7 145 8 192 9"/></svg></span>';
}
