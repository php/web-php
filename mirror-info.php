<?php
// $Id$

// Define $MYSITE and $LAST_UPDATED variables
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Text/plain content type for better readability in browsers
header("Content-type: text/plain; charset=utf-8");

// Provide information on local stats setup
$mirror_stats = (int) (isset($_SERVER['MIRROR_STATS']) && $_SERVER['MIRROR_STATS'] == '1');

// Check for an existing exe file (identifies rsync setup problems)
$exefile = (int) file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/php-5.1.5-installer.exe');

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
    $exefile            // 7: Rsync setup problems
));
