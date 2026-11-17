<?php

declare(strict_types=1);

namespace phpweb\Homepage;

use Closure;
use DateTimeImmutable;
use DateTimeInterface;

use function array_unique;
use function max;
use function round;
use function str_ends_with;
use function usort;

/**
 * The homepage's "PHP through the years" timeline: every major and minor
 * release, oldest first, positioned in pixels along a horizontal track.
 */
final class ReleaseHistory
{
    public const FIRST_YEAR = 1995;

    // Timeline geometry, in pixels.
    private const START = 80;

    private const YEAR_WIDTH = 64;

    private const END_PADDING = 112;

    /**
     * @param list<string> $branches
     * @param array<string, array{label?: string, date?: string, url?: string}> $overrides
     *     Keyed by branch; entries with a `label` are added even if not in $branches.
     * @param Closure(string): ?DateTimeInterface $releaseDate
     * @param Closure(string): ?string $releaseUrl
     */
    public function __construct(
        private readonly array $branches,
        private readonly array $overrides,
        private readonly Closure $releaseDate,
        private readonly Closure $releaseUrl,
        private readonly int $currentYear,
    ) {
    }

    /**
     * @return array{width: int, releases: list<array{branch: string, label: string, title: string, url: ?string, major: bool, left: int, timestamp: int}>, years: list<array{year: int, left: int}>}
     */
    public function timeline(): array
    {
        $branches = [];
        foreach ($this->overrides as $branch => $override) {
            if (isset($override['label'])) {
                $branches[] = (string) $branch;
            }
        }
        foreach ($this->branches as $branch) {
            $branches[] = $branch;
        }

        $origin = new DateTimeImmutable(self::FIRST_YEAR . '-01-01');
        $lastYear = $this->currentYear;
        $releases = [];

        foreach (array_unique($branches) as $branch) {
            $override = $this->overrides[$branch] ?? [];
            $date = isset($override['date']) ? new DateTimeImmutable($override['date']) : ($this->releaseDate)($branch);
            if ($date === null) {
                continue;
            }

            $label = $override['label'] ?? "PHP $branch";
            $years = $origin->diff($date)->days / 365.25;
            $lastYear = max($lastYear, (int) $date->format('Y'));

            $releases[] = [
                'branch' => $branch,
                'label' => $label,
                'title' => $label . ', released ' . $date->format('F j, Y'),
                'url' => $override['url'] ?? ($this->releaseUrl)($branch),
                'major' => str_ends_with($branch, '.0'),
                'left' => (int) round(self::START + $years * self::YEAR_WIDTH),
                'timestamp' => $date->getTimestamp(),
            ];
        }

        usort($releases, static fn (array $a, array $b): int => $a['timestamp'] <=> $b['timestamp']);

        $years = [];
        for ($year = self::FIRST_YEAR; $year <= $lastYear; $year++) {
            $years[] = ['year' => $year, 'left' => self::yearOffset($year)];
        }

        return [
            'width' => self::yearOffset($lastYear) + self::END_PADDING,
            'releases' => $releases,
            'years' => $years,
        ];
    }

    private static function yearOffset(int $year): int
    {
        return self::START + ($year - self::FIRST_YEAR) * self::YEAR_WIDTH;
    }
}
