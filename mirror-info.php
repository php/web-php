<?php
// $Id$

// Define $MYSITE and $LAST_UPDATED variables
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Define $PHP_5_VERSION, $PHP_5_MD5 & $RELEASES variables
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Text/plain content type for better readability in browsers
header("Content-type: text/plain; charset=utf-8");

// Provide information on local stats setup
$mirror_stats = (int) (isset($_SERVER['MIRROR_STATS']) && $_SERVER['MIRROR_STATS'] == '1');

// MD5 check last release file (identifies rsync setup problems)
$filename = $_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $RELEASES[5][$PHP_5_VERSION]["source"][0]["filename"];
$md5_ok = (int) (file_exists($filename) && md5_file($filename) == $PHP_5_MD5["tar.bz2"]);

// Does this mirror have sqlite?
$sqlite = (int) function_exists("sqlite_open");

echo join('|', array(
    $MYSITE,            // 0: ServerName problems
    phpversion(),       // 1: PHP version overview
    $LAST_UPDATED,      // 2: Update problems
    $sqlite,            // 3: SQLite support?
    $mirror_stats,      // 4: Optional local stats support
    default_language(), // 5: Mirror language
    'manual-noalias',   // 6: /manual alias check is done elsewhere now
    $md5_ok,            // 7: Rsync setup problems
));
