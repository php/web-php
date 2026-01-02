<?php

/*
 *
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
{

}
