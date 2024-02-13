<?php

declare(strict_types=1);

namespace phpweb\Test\EndToEnd;

use PHPUnit\Framework;

#[Framework\Attributes\CoversNothing]
final class SmokeTest extends Framework\TestCase
{
    #[Framework\Attributes\DataProvider('provideUrl')]
    public function testUrlReturnsSuccessfulHttpResponseStatusCode(string $url): void
    {
        $successfulHttpStatusCodes = [200, 301, 302];

        $handle = curl_init();

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
        ];

        curl_setopt_array($handle, $options);

        curl_exec($handle);

        $httpStatusCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        self::assertTrue(in_array($httpStatusCode, $successfulHttpStatusCodes, true), sprintf(
            'Failed asserting that the URL "%s" returns a successful HTTP response status code, got "%d" instead.',
            $url,
            $httpStatusCode,
        ));
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideUrl(): \Generator
    {
        $httpHost = getenv('HTTP_HOST');

        if (!is_string($httpHost)) {
            throw new \RuntimeException('Environment variable "HTTP_HOST" is not set.');
        }

        $pathToRoot = realpath(__DIR__ . '/../..');

        $patterns = [
            $pathToRoot . '/*.php',
            $pathToRoot . '/archive/*.php',
            $pathToRoot . '/conferences/*.php',
            $pathToRoot . '/license/*.php',
            $pathToRoot . '/manual/*.php',
            $pathToRoot . '/manual/en/*.php',
            $pathToRoot . '/releases/*.php',
            $pathToRoot . '/releases/*/*.php',
            $pathToRoot . '/releases/*/*/*.php',
        ];

        foreach ($patterns as $pattern) {
            $pathsToFiles = glob($pattern);

            $paths = str_replace($pathToRoot, '', $pathsToFiles);

            foreach ($paths as $path) {
                $url = sprintf(
                    'http://%s%s',
                    $httpHost,
                    $path,
                );

                yield $url => [
                    $url,
                ];
            }
        }
    }
}
