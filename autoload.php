<?php

/**
 * @see https://github.com/php-fig/fig-standards/blob/a1a0674a742c9d07c5dd450209fb33b115ee7b40/accepted/PSR-4-autoloader-examples.md#closure-example
 */
spl_autoload_register(static function (string $class): void {
    $prefix = 'phpweb\\';
    $directory = __DIR__ . '/src/';

    $length = strlen($prefix);

    if (strncmp($prefix, $class, $length) !== 0) {
        return;
    }

    $relativeClass = substr(
        $class,
        $length
    );

    $file = $directory . str_replace('\\', '/', $relativeClass) . '.php';

    if (!file_exists($file)) {
        return;
    }

    require $file;
});
