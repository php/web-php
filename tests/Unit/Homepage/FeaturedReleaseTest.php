<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Homepage;

use DateTimeImmutable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use phpweb\Homepage\FeaturedRelease;

#[CoversClass(FeaturedRelease::class)]
final class FeaturedReleaseTest extends TestCase
{
    public function testFeaturesTheNewestReleasedBranch(): void
    {
        self::assertSame('8.6', $this->branch(['8.5' => '2025-11-20', '8.6' => '2026-11-19'], now: '2026-12-01'));
    }

    public function testComparesBranchesAsVersions(): void
    {
        self::assertSame('8.10', $this->branch(['8.9' => '2030-11-20', '8.10' => '2031-11-20'], now: '2032-01-01'));
    }

    public function testSkipsABranchWithoutAReleaseDate(): void
    {
        self::assertSame('8.5', $this->branch(['8.6' => null, '8.5' => '2025-11-20'], now: '2026-11-17'));
    }

    public function testSkipsABranchReleasedAfterToday(): void
    {
        self::assertSame('8.5', $this->branch(['8.5' => '2025-11-20', '8.6' => '2026-11-19'], now: '2026-11-17'));
    }

    public function testFeaturesABranchOnItsReleaseDay(): void
    {
        self::assertSame('8.6', $this->branch(['8.5' => '2025-11-20', '8.6' => '2026-11-19'], now: '2026-11-19 09:00'));
    }

    public function testFallsBackToTheNewestBranchWhenNoneAreReleased(): void
    {
        self::assertSame('8.6', $this->branch(['8.5' => null, '8.6' => null], now: '2026-11-17'));
    }

    /**
     * @param array<string, ?string> $dates Branch => x.y.0 release date.
     */
    private function branch(array $dates, string $now): string
    {
        return FeaturedRelease::branch(
            array_map('strval', array_keys($dates)),
            static fn (string $branch): ?DateTimeImmutable => isset($dates[$branch]) ? new DateTimeImmutable($dates[$branch]) : null,
            new DateTimeImmutable($now),
        );
    }
}
