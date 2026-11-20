<?php

declare(strict_types=1);

namespace phpweb\Test\EndToEnd;

use PHPUnit\Framework;

/**
 * Regression tests for the blank-page bug reported in
 * https://github.com/php/web-php/issues/1955.
 *
 * The CORS guard in include/prepend.inc used to terminate the request with
 * exit(10) whenever the Origin request header did not belong to php.net.
 * exit(10) emits an integer exit status, not a body, so the response was a
 * perfectly valid "200 OK" with a zero byte body.
 *
 * Since Origin was not part of the CDN cache key and no Vary header was sent,
 * a single request carrying a foreign Origin header was enough for the CDN to
 * store that empty 200 and replay it to every subsequent visitor as a blank
 * white page, until the cache was purged.
 *
 * SmokeTest only asserts the status code, so it could not catch this: a blank
 * page is still a 200.
 */
#[Framework\Attributes\CoversNothing]
final class OriginHeaderTest extends Framework\TestCase
{
    /**
     * A cross-origin request must never produce an empty body, because that
     * body is what the CDN caches and replays to everyone else.
     */
    #[Framework\Attributes\DataProvider('provideForeignOrigin')]
    public function testForeignOriginDoesNotReturnBlankPage(string $origin): void
    {
        $response = self::get('/', $origin);

        self::assertSame(200, $response['status'], sprintf(
            'Expected "/" to return 200 for Origin "%s", got "%d".',
            $origin,
            $response['status'],
        ));

        self::assertNotSame('', $response['body'], sprintf(
            'Blank page: "/" returned a %d response with a zero byte body for Origin "%s". '
                . 'The CDN caches this empty body and serves it to all visitors.',
            $response['status'],
            $origin,
        ));
    }

    /**
     * Every page is affected, not just the homepage.
     */
    #[Framework\Attributes\DataProvider('providePath')]
    public function testPathDoesNotReturnBlankPageForForeignOrigin(string $path): void
    {
        $response = self::get($path, 'https://example.com');

        self::assertNotSame('', $response['body'], sprintf(
            'Blank page: "%s" returned a %d response with a zero byte body for a foreign Origin.',
            $path,
            $response['status'],
        ));
    }

    /**
     * Guards the fix from the other side: legitimate php.net origins, and
     * requests with no Origin at all, must keep working.
     */
    #[Framework\Attributes\DataProvider('provideAllowedOrigin')]
    public function testAllowedOriginReturnsContent(?string $origin): void
    {
        $response = self::get('/', $origin);

        self::assertSame(200, $response['status']);
        self::assertNotSame('', $response['body']);
    }

    /**
     * The CORS headers depend on the Origin request header, so shared caches
     * have to be told not to reuse a response across origins.
     */
    public function testResponseVariesOnOrigin(): void
    {
        $response = self::get('/');

        self::assertStringContainsStringIgnoringCase('origin', $response['vary'], sprintf(
            'Expected a "Vary: Origin" response header, got "%s".',
            $response['vary'],
        ));
    }

    /**
     * The blank page must not be traded for a cross site request forgery hole:
     * the state changing endpoints have no CSRF tokens, so a cross origin POST
     * still has to be rejected.
     */
    public function testCrossOriginPostIsRejected(): void
    {
        $response = self::post('/manual/vote-note.php', 'https://example.com');

        self::assertSame(403, $response['status'], sprintf(
            'Expected a cross-origin POST to be rejected with 403, got "%d".',
            $response['status'],
        ));
    }

    /**
     * Rejections still need a body, otherwise they are just the blank page
     * again wearing a different status code.
     */
    public function testRejectedCrossOriginPostStillHasABody(): void
    {
        $response = self::post('/manual/vote-note.php', 'https://example.com');

        self::assertNotSame('', $response['body'], 'A rejected cross-origin POST returned an empty body.');
    }

    /**
     * Same-origin POSTs must keep working.
     */
    public function testSameOriginPostIsNotRejected(): void
    {
        $httpHost = getenv('HTTP_HOST');

        $response = self::post('/manual/vote-note.php', sprintf('http://%s', $httpHost));

        self::assertNotSame(403, $response['status'], 'A same-origin POST was rejected.');
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideForeignOrigin(): \Generator
    {
        $origins = [
            // Any unrelated site embedding or fetching php.net.
            'https://example.com',
            // Browsers send a literal "null" origin for sandboxed iframes,
            // documents from data:/file: URLs, and some cross-origin redirects.
            'null',
            // Must not be treated as php.net just because it contains it.
            'https://evil-php.net.attacker.com',
            'https://notphp.net',
        ];

        foreach ($origins as $origin) {
            yield $origin => [$origin];
        }
    }

    /**
     * @return \Generator<string, array{0: ?string}>
     */
    public static function provideAllowedOrigin(): \Generator
    {
        $origins = [
            'no Origin header' => null,
            'https://www.php.net' => 'https://www.php.net',
            'https://php.net' => 'https://php.net',
            'https://qa.php.net' => 'https://qa.php.net',
        ];

        foreach ($origins as $name => $origin) {
            yield $name => [$origin];
        }
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function providePath(): \Generator
    {
        $paths = [
            '/',
            '/downloads.php',
            '/contact.php',
            '/manual/en/function.str-replace.php',
            '/releases/',
        ];

        foreach ($paths as $path) {
            yield $path => [$path];
        }
    }

    /**
     * @return array{status: int, body: string, vary: string}
     */
    private static function post(string $path, string $origin): array
    {
        return self::get($path, $origin, ['vote' => 'up']);
    }

    /**
     * @param ?array<string, string> $postFields
     *
     * @return array{status: int, body: string, vary: string}
     */
    private static function get(
        string $path,
        ?string $origin = null,
        ?array $postFields = null,
    ): array
    {
        $httpHost = getenv('HTTP_HOST');

        if (!is_string($httpHost)) {
            throw new \RuntimeException('Environment variable "HTTP_HOST" is not set.');
        }

        $headers = [];

        if (is_string($origin)) {
            $headers[] = sprintf('Origin: %s', $origin);
        }

        $vary = '';

        $handle = curl_init();

        if (is_array($postFields)) {
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($postFields));
        }

        curl_setopt_array($handle, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => sprintf('http://%s%s', $httpHost, $path),
            CURLOPT_HEADERFUNCTION => static function ($handle, string $header) use (&$vary): int {
                if (stripos($header, 'vary:') === 0) {
                    $vary = trim(substr($header, strlen('vary:')));
                }

                return strlen($header);
            },
        ]);

        $body = curl_exec($handle);
        $status = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        curl_close($handle);

        if (!is_string($body)) {
            throw new \RuntimeException(sprintf('Failed to request "%s".', $path));
        }

        return [
            'status' => $status,
            'body' => $body,
            'vary' => $vary,
        ];
    }
}
