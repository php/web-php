<?php

declare(strict_types=1);

namespace phpweb\Homepage;

use Closure;
use DateTimeInterface;

use function usort;
use function version_compare;

/**
 * Picks the branch for the homepage's "Meet PHP x.y" card: the newest one with
 * highlights that has been released, so highlights for an upcoming branch can
 * be added ahead of its release day.
 */
final class FeaturedRelease
{
    /**
     * @param list<string> $branches Branches that have highlights.
     * @param Closure(string): ?DateTimeInterface $releaseDate
     */
    public static function branch(array $branches, Closure $releaseDate, DateTimeInterface $now): string
    {
        usort($branches, static fn (string $a, string $b): int => version_compare($b, $a));

        foreach ($branches as $branch) {
            $released = $releaseDate($branch);
            if ($released !== null && $released <= $now) {
                return $branch;
            }
        }

        // Nothing is released yet (only possible in development); show the newest.
        return $branches[0];
    }
}
