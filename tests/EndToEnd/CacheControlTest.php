<?php

declare(strict_types=1);

namespace phpweb\Test\EndToEnd;

use Generator;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Without a Cache-Control header, BunnyCDN appears to apply a default of 30 days,
 * so new releases and branch state changes would not show up in these endpoints
 * until the cache expires or is purged.
 */
#[CoversNothing]
final class CacheControlTest extends TestCase
{
    #[DataProvider('getPaths')]
    public function testReleaseDataIsCachedBriefly(string $path): void
    {
        $response = self::get($path);

        self::assertSame(200, $response['status'], sprintf(
            'Expected "%s" to return 200, got "%d".',
            $path,
            $response['status'],
        ));

        self::assertSame('public, max-age=300', $response['cacheControl'], sprintf(
            'Unexpected Cache-Control header for "%s".',
            $path,
        ));
    }

    /**
     * @return Generator<string, array{0: string}>
     */
    public static function getPaths(): Generator
    {
        $paths = [
            '/releases/index.php?json',
            '/releases/index.php?json&version=8&max=2',
            '/releases/index.php?serialize',
            '/releases/branches.php',
            '/releases/states.php',
            '/releases/feed.php',
            '/pre-release-builds.php',
            '/pre-release-builds.php?format=json',
            '/pre-release-builds.php?format=json&only=dev_versions',
            '/pre-release-builds.php?format=serialize',
        ];

        foreach ($paths as $path) {
            yield $path => [$path];
        }
    }

    /**
     * @return array{status: int, cacheControl: string}
     */
    private static function get(string $path): array
    {
        $httpHost = getenv('HTTP_HOST');

        if (!is_string($httpHost)) {
            throw new \RuntimeException('Environment variable "HTTP_HOST" is not set.');
        }

        $cacheControl = '';

        $handle = curl_init();

        curl_setopt_array($handle, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => sprintf('http://%s%s', $httpHost, $path),
            CURLOPT_HEADERFUNCTION => static function ($handle, string $header) use (&$cacheControl): int {
                if (stripos($header, 'cache-control:') === 0) {
                    $cacheControl = trim(substr($header, strlen('cache-control:')));
                }

                return strlen($header);
            },
        ]);

        $body = curl_exec($handle);
        $status = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if (!is_string($body)) {
            throw new \RuntimeException(sprintf('Failed to request "%s".', $path));
        }

        return [
            'status' => $status,
            'cacheControl' => $cacheControl,
        ];
    }
}
