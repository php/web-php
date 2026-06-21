<?php

namespace phpweb;

use Closure;
use Error;
use Throwable;
use function ob_end_clean;
use function ob_get_clean;
use function ob_get_level;
use function ob_start;
use function version_compare;

class Utils
{
    /**
     * @param Closure $closure
     */
    public static function bufferOutput(Closure $closure): string
    {
        $level = ob_get_level();
        try {
            ob_start();
            $result = $closure();

            if (ob_get_level() !== ($level + 1)) {
                throw new Error('Buffering closure unexpected manipulated buffers');
            }

            /* always try and close the buffer, we need to check contents within it */
            $buffer = ob_get_clean();
            if ($buffer === false) {
                throw new Error('Unable to close output buffer within ' . __METHOD__);
            }

            /* we tried to do two things at once (or maybe warnings?) */
            if ($result !== null && $buffer !== '') {
                throw new Error('Buffer callback returned a string, but also emitted output to the buffer');
            }

            /* the callback returned null, so we assume that we're going to return the buffer */
            return $result !== null ? $result : $buffer;
        } catch (Throwable $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }

            throw $e;
        }
    }

    /**
     * Compares two version strings
     */
    public static function versionCompare(string $a, string $b): int
    {
        return version_compare($a, $b);
    }

    /**
     * Version string comparison that explicitly expects a comparison operator
     */
    public static function versionCompareOp(string $a, string $b, string $op): bool
    {
        return version_compare($a, $b, $op) === true;
    }
}
