<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Homepage;

use DateTimeImmutable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use phpweb\Homepage\ReleaseHistory;

#[CoversClass(ReleaseHistory::class)]
final class ReleaseHistoryTest extends TestCase
{
    public function testPositionsReleasesByDateFromTheFirstYear(): void
    {
        $timeline = $this->timeline(['1.0' => '1995-01-01', '1.1' => '1996-01-01'], currentYear: 1996);

        // Timeline starts at 80px
        self::assertSame(80, $timeline['releases'][0]['left']);

        // 1996-01-01 is 365 days after the origin: 80 + (365 / 365.25) * 64 = 143.96,
        // which rounds to 144
        self::assertSame(144, $timeline['releases'][1]['left']);
    }

    public function testSortsReleasesOldestFirst(): void
    {
        $timeline = $this->timeline(['8.0' => '2020-11-26', '5.0' => '2004-07-13', '7.0' => '2015-12-03']);

        self::assertSame(['5.0', '7.0', '8.0'], array_column($timeline['releases'], 'branch'));
    }

    public function testDescribesEachRelease(): void
    {
        $timeline = $this->timeline(['8.0' => '2020-11-26', '8.1' => '2021-11-25']);
        [$major, $minor] = $timeline['releases'];

        self::assertSame('PHP 8.0', $major['label']);
        self::assertSame('PHP 8.0, released November 26, 2020', $major['title']);
        self::assertSame('/releases/8.0/', $major['url']);
        self::assertTrue($major['major']);
        self::assertFalse($minor['major']);
    }

    public function testSkipsBranchesWithoutAReleaseDate(): void
    {
        $timeline = $this->timeline(['8.5' => '2025-11-20', '8.6' => null]);

        self::assertSame(['8.5'], array_column($timeline['releases'], 'branch'));
    }

    public function testOverridesAddLabelledReleasesAndReplaceDatesAndUrls(): void
    {
        $timeline = $this->timeline(['3.0' => '2000-01-01'], [
            '1.0' => ['label' => 'PHP Tools 1.0', 'date' => '1995-06-08', 'url' => 'https://talks.php.net/hhs'],
            '2.0' => ['date' => '1997-11-12'],
            '3.0' => ['date' => '1998-06-06', 'url' => '/archive/1998.php'],
        ]);

        // 2.0 has no label and is not a known branch, so it is not added.
        self::assertSame(['1.0', '3.0'], array_column($timeline['releases'], 'branch'));
        self::assertSame('PHP Tools 1.0, released June 8, 1995', $timeline['releases'][0]['title']);
        self::assertSame('https://talks.php.net/hhs', $timeline['releases'][0]['url']);
        self::assertSame('PHP 3.0, released June 6, 1998', $timeline['releases'][1]['title']);
        self::assertSame('/archive/1998.php', $timeline['releases'][1]['url']);
    }

    public function testListsBranchesInBothOverridesAndBranchesOnce(): void
    {
        $timeline = $this->timeline(['1.0' => '1995-06-08'], ['1.0' => ['label' => 'PHP Tools 1.0']]);

        self::assertCount(1, $timeline['releases']);
    }

    public function testMarksEveryYearThroughTheCurrentOne(): void
    {
        $timeline = $this->timeline(['8.0' => '2020-11-26'], currentYear: 2026);

        self::assertSame(range(1995, 2026), array_column($timeline['years'], 'year'));
        self::assertSame(80, $timeline['years'][0]['left']);

        // 2026 is 31 years after our start year of 1995
        self::assertSame(80 + (31 * 64), $timeline['years'][31]['left']);
    }

    public function testExtendsTheTrackToAReleaseAfterTheCurrentYear(): void
    {
        $timeline = $this->timeline(['8.0' => '2020-11-26'], currentYear: 1997);

        self::assertSame(range(1995, 2020), array_column($timeline['years'], 'year'));

        // 2020 is 25 years after 1995; 112px is our right margin
        self::assertSame(80 + (25 * 64) + 112, $timeline['width']);
    }

    /**
     * @param array<string, ?string> $dates Branch => x.y.0 release date.
     * @param array<string, array{label?: string, date?: string, url?: string}> $overrides
     * @return array{width: int, releases: list<array{branch: string, label: string, title: string, url: ?string, major: bool, left: int, timestamp: int}>, years: list<array{year: int, left: int}>}
     */
    private function timeline(array $dates, array $overrides = [], int $currentYear = 2026): array
    {
        $history = new ReleaseHistory(
            array_map('strval', array_keys($dates)),
            $overrides,
            static fn (string $branch): ?DateTimeImmutable => isset($dates[$branch]) ? new DateTimeImmutable($dates[$branch]) : null,
            static fn (string $branch): string => "/releases/$branch/",
            $currentYear,
        );

        return $history->timeline();
    }
}
