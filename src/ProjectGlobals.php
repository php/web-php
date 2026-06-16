<?php

namespace phpweb;

use Error;
use function realpath;

class ProjectGlobals
{
    public static function getProjectRoot(): string
    {
        return realpath(__DIR__ . '/../');
    }

    public static function getPublicRoot(): string
    {
        return realpath(__DIR__ . '/../public') ?: throw new Error('eh');
    }
}
