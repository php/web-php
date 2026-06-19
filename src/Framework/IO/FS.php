<?php

namespace phpweb\Framework\IO;

use RuntimeException;
use function file_get_contents;

/**
 * These helpers exist to make our lives easier with phpstan, as they narrow
 * the return types down to not include `false` by throwing an error instead.
 *
 * If any of these throw, then something has likely gone very wrong.
 */
class FS
{
    /**
     * @throws RuntimeException
     */
    public static function readContents(string $path): string
    {
        $contents = file_get_contents($path);
        if ($contents === false) {
            throw new RuntimeException('Unable to read file: ' . $path);
        }

        return $contents;
    }

    /**
     * @throws RuntimeException
     */
    public static function writeContents(string $path, string $contents): void
    {
        $result = file_put_contents($path, $contents);
        if ($result === false) {
            throw new RuntimeException('Unable to write file: ' . $path);
        }
    }

    /**
     * @throws RuntimeException
     */
    public static function writeContentsIfChanged(string $path, string $contents): bool
    {
        if (file_exists($path) && is_file($path) && self::readContents($path) === $contents) {
            return false;
        }

        self::writeContents($path, $contents);
        return true;
    }
}
