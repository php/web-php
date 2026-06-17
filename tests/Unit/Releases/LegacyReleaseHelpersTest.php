<?php

namespace phpweb\Test\Unit\Releases;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use phpweb\Releases\Branches;
use function array_keys;

require_once __DIR__ . '/../../../include/branches.inc';

class LegacyReleaseHelpersTest extends TestCase
{
    public function testReleaseDataLoading(): void
    {
        self::assertNotEmpty(Branches::getReleaseData());
        self::assertNotEmpty(Branches::getOldReleaseData());
        self::assertNotEmpty(Branches::all());
    }

    public function testOldReleasesDoNotContainNewReleases(): void
    {
        $olderReleases = Branches::getOldReleaseData();
        $recentReleases = Branches::getReleaseData();

        foreach ($recentReleases as $majorId => $releases) {
            foreach (array_keys($releases) as $releaseId) {
                self::assertFalse(isset($olderReleases[$majorId][$releaseId]), "Duplicate data for '$releaseId'");
            }
        }
    }

    public function testAllReleasesContainsRecent(): void
    {
        $all = Branches::all();

        foreach (Branches::getReleaseData() as $majorId => $releases) {
            foreach (array_keys($releases) as $releaseId) {
                self::assertTrue(
                    isset($all[$majorId][$releaseId]),
                    "Missing recent release data for '$releaseId' in all()",
                );
            }
        }
    }

    public function testAllReleasesContainsOld(): void
    {
        $all = Branches::all();

        foreach (Branches::getOldReleaseData() as $majorId => $releases) {
            foreach (array_keys($releases) as $releaseId) {
                self::assertTrue(
                    isset($all[$majorId][$releaseId]),
                    "Missing old release data for '$releaseId' in all()",
                );
            }
        }
    }

    public function testNormalizationForAllData(): void
    {
        foreach (Branches::all() as $releases) {
            foreach ($releases as $releaseId => $release) {
                /* @phpstan-ignore-next-line */
                self::assertTrue(
                    /* @phpstan-ignore-next-line */
                    isset($release['version']),
                    "Release '$releaseId' does not have a version defined",
                );

                /* @phpstan-ignore-next-line */
                self::assertTrue(
                    /* @phpstan-ignore-next-line */
                    isset($release['date']),
                    "Release '$releaseId' does not have a date defined",
                );

                /* @phpstan-ignore-next-line */
                self::assertTrue(
                    /* @phpstan-ignore-next-line */
                    isset($release['announcement']) && is_bool($release['announcement']),
                    "Release '$releaseId' does not have an announcement defined",
                );

                /* @phpstan-ignore-next-line */
                self::assertTrue(
                    /* @phpstan-ignore-next-line */
                    isset($release['source']) && is_array($release['source']),
                    "Release '$releaseId' does not have a source list defined",
                );

                foreach ($release['source'] as $idx => $source) {
                    /* @phpstan-ignore-next-line */
                    self::assertTrue(
                        /* @phpstan-ignore-next-line */
                        isset($source['filename']),
                        "Release '$releaseId' source $idx does not have a filename",
                    );

                    /* @phpstan-ignore-next-line */
                    self::assertTrue(
                        /* @phpstan-ignore-next-line */
                        isset($source['name']),
                        "Release '$releaseId' source $idx does not have a name",
                    );
                }
            }
        }
    }

    public function testActive(): void
    {
        self::assertNotEmpty(Branches::active());
    }

    public function testInitialReleases(): void
    {
        self::assertNotEmpty(
            Branches::getInitialReleaseForBranch('8.5'),
            'Unable to find initial branch for 8.5',
        );

        self::assertNotEmpty(
            Branches::getInitialReleaseForBranch('8.4'),
            'Unable to find initial branch for 8.4 (aborted release)',
        );
    }

    /**
     * These were dumped from the old functions and may break if additional
     * information is added to the overrides at some point
     */
    public static function provideExpectedDates(): Generator
    {
        yield '8.5' => ['8.5', '2025-11-20', '2027-12-31', '2029-12-31'];
        yield '8.4' => ['8.4', '2024-11-21', '2026-12-31', '2028-12-31'];
        yield '8.3' => ['8.3', '2023-11-23', '2025-12-31', '2027-12-31'];
        yield '8.2' => ['8.2', '2022-12-08', '2024-12-31', '2026-12-31'];
        yield '8.1' => ['8.1', '2021-11-25', '2023-11-25', '2025-12-31'];
        yield '8.0' => ['8.0', '2020-11-26', '2022-11-26', '2023-11-26'];
        yield '7.4' => ['7.4', '2019-11-28', '2021-11-28', '2022-11-28'];
        yield '7.3' => ['7.3', '2018-12-06', '2020-12-06', '2021-12-06'];
        yield '7.2' => ['7.2', '2017-11-30', '2019-11-30', '2020-11-30'];
        yield '7.1' => ['7.1', '2016-12-01', '2018-12-01', '2019-12-01'];
        yield '7.0' => ['7.0', '2015-12-03', '2018-01-04', '2019-01-10'];
        yield '5.6' => ['5.6', '2014-08-28', '2017-01-19', '2018-12-31'];
        yield '5.5' => ['5.5', '2013-06-20', '2015-07-10', '2016-07-21'];
        yield '5.4' => ['5.4', '2012-03-01', '2014-09-14', '2015-09-03'];
        yield '5.3' => ['5.3', '2009-06-30', '2013-07-11', '2014-08-14'];
        yield '5.2' => ['5.2', '2006-11-02', '2008-11-02', '2011-01-06'];
        yield '5.1' => ['5.1', '2005-11-24', '2007-11-24', '2006-08-24'];
        yield '5.0' => ['5.0', '2004-07-13', '2006-07-13', '2005-09-05'];
        yield '4.4' => ['4.4', '2005-07-11', '2007-07-11', '2008-08-07'];
        yield '4.3' => ['4.3', '2002-12-27', '2004-12-27', '2005-03-31'];
        yield '4.2' => ['4.2', '2002-04-22', '2004-04-22', '2002-09-06'];
        yield '4.1' => ['4.1', '2001-12-10', '2003-12-10', '2002-03-12'];
        yield '4.0' => ['4.0', '2000-05-22', '2002-05-22', '2001-06-23'];

        // 3.0 is not included as it's the only one which returns null
    }

    #[DataProvider('provideExpectedDates')]
    public function testExpectedDates(string $branch, string $initialDate, string $bugfixDate, string $securityDate): void
    {
        self::assertEquals(
            $initialDate,
            Branches::getBranchReleaseDate($branch)?->format('Y-m-d'),
        );

        self::assertEquals(
            $bugfixDate,
            Branches::getBranchBugsEOLDate($branch)?->format('Y-m-d'),
        );

        self::assertEquals(
            $securityDate,
            Branches::getBranchSecurityEOLDate($branch)?->format('Y-m-d'),
        );
    }

    public function testCurrentReleaseForBranch(): void
    {
        /* need something that won't change in response to new releases */
        self::assertEquals(
            '7.4.33',
            Branches::getCurrentReleaseForBranch(7, 4),
        );
    }
}
