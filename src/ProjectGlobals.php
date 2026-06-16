<?php

namespace phpweb;

use Error;
use function realpath;

class ProjectGlobals
{
    public static function getProjectRoot(): string
    {
        return realpath(__DIR__ . '/../')
            ?: throw new Error('Unable to locate project root');
    }

    public static function getPublicRoot(): string
    {
        return realpath(__DIR__ . '/../public')
            ?: throw new Error('Unable to locate public root');
    }
}
