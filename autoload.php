<?php

/**
 * Any ideas?
 *
 * @see https://github.com/php/web-php
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
