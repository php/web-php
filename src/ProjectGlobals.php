<?php

namespace phpweb;

use Error;
use function filter_var;
use function realpath;

class ProjectGlobals
{
    public static function getProjectRoot(): string
    {
        return realpath(__DIR__ . '/../')
            ?: throw new Error('Unable to locate project root');
    }

    public static function getBackendRoot(): string
    {
        return self::getProjectRoot() . '/public/backend';
    }

    public static function getPublicRoot(): string
    {
        return realpath(__DIR__ . '/../public')
            ?: throw new Error('Unable to locate public root');
    }

    public static function isDevelopmentMode(): bool
    {
        return filter_var(($_ENV['DEVELOPMENT'] ?? ''), FILTER_VALIDATE_BOOL);
    }
}
