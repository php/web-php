--TEST--
paths return HTTP response status code 200, 301, or 302
--FILE--
<?php

declare(strict_types=1);

$httpHost = getenv('HTTP_HOST');

if (!is_string($httpHost)) {
    throw new \RuntimeException('Environment variable "HTTP_HOST" is not set.');
}

$pathToRoot = realpath(__DIR__ . '/../..');

$pathsToFiles = [
    ...glob($pathToRoot . '/*.php'),
    ...glob($pathToRoot . '/archive/*.php'),
    ...glob($pathToRoot . '/conferences/*.php'),
    ...glob($pathToRoot . '/license/*.php'),
    ...glob($pathToRoot . '/manual/*.php'),
    ...glob($pathToRoot . '/manual/en/*.php'),
    ...glob($pathToRoot . '/releases/*.php'),
    ...glob($pathToRoot . '/releases/*/*.php'),
    ...glob($pathToRoot . '/releases/*/*/*.php'),
];

$paths = str_replace($pathToRoot, '', $pathsToFiles);

$baseUrl = sprintf(
    'http://%s',
    $httpHost,
);

$pathsToStatusCodes = array_combine(
    $paths,
    array_map(static function (string $url) use ($baseUrl): int {
        $handle = curl_init();

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => sprintf(
                '%s%s',
                $baseUrl,
                $url,
            ),
        ];

        curl_setopt_array($handle, $options);

        curl_exec($handle);

        return curl_getinfo($handle, CURLINFO_HTTP_CODE);
    }, $paths),
);

$pathsWithUnexpectedStatusCodes = array_filter($pathsToStatusCodes, static function (int $statusCode): bool {
    return !in_array($statusCode, [200, 301, 302], true);
});

var_dump($pathsWithUnexpectedStatusCodes);
?>
--EXPECT--
array(0) {
}
