<?php

declare(strict_types=1);

namespace phpweb\Homepage;

use function array_keys;
use function file_get_contents;
use function floor;
use function is_array;
use function is_int;
use function is_string;
use function json_decode;
use function number_format;
use function rtrim;

/**
 * Packagist's package, version and install totals for the homepage, read from
 * the copy of packagist.org/statistics.json that web-master's update-backend
 * script writes to backend/packagist-stats.json.
 */
final class PackagistStats
{
    // Last known totals, used if the file is missing or malformed.
    public const FALLBACK = [
        'packages' => 480630,
        'versions' => 6066036,
        'downloads' => 213748586762,
    ];

    /**
     * @return array{packages: int, versions: int, downloads: int}
     */
    public static function load(string $path): array
    {
        $json = @file_get_contents($path);

        return self::fromJson(is_string($json) ? $json : null);
    }

    /**
     * @return array{packages: int, versions: int, downloads: int}
     */
    public static function fromJson(?string $json): array
    {
        $data = $json ? json_decode($json, true) : null;
        $totals = is_array($data) ? ($data['totals'] ?? null) : null;

        if (!is_array($totals)) {
            return self::FALLBACK;
        }

        $stats = [];
        foreach (array_keys(self::FALLBACK) as $key) {
            if (!is_int($totals[$key] ?? null)) {
                return self::FALLBACK;
            }
            $stats[$key] = $totals[$key];
        }

        return $stats;
    }

    /**
     * Abbreviate a large count for display, always rounding down: 480630 => 480K,
     * 6066036 => 6.06M, 213748586762 => 213B+.
     */
    public static function abbreviate(int $number): string
    {
        if ($number >= 1_000_000_000) {
            return floor($number / 1_000_000_000) . 'B+';
        }
        if ($number >= 1_000_000) {
            return rtrim(rtrim(number_format(floor($number / 10_000) / 100, 2, '.', ''), '0'), '.') . 'M';
        }
        if ($number >= 1_000) {
            return floor($number / 1_000) . 'K';
        }

        return (string) $number;
    }
}
