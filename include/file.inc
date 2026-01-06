<?php

/*
 * This file contains helper functions to deal with files in a safe manner.
 * These functions check for file existence and readability before performing
 * any operations on them.
*/

function file_get_size(string $filename): int|false
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    return filesize($filename);
}

function file_get_mtime(string $filename): int|false
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    return filemtime($filename);
}

function file_get_contents_if_exists(string $filename): string|false
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    return file_get_contents($filename);
}
