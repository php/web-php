<?php

// Define $MYSITE and $LAST_UPDATED variables
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Text/plain content type for better readability in browsers
header("Content-type: text/plain;charset=ISO-8859-1");

// No search support on mirror sites currently
$searchtype = 0;

// Provide information on local stats setup
if (isset($_SERVER['MIRROR_STATS']) && $_SERVER['MIRROR_STATS'] == '1') {
    $mirror_stats = 1;
} else {
    $mirror_stats = 0;
}

echo "$MYSITE|", phpversion(), "|$LAST_UPDATED|$searchtype|$mirror_stats|" , default_language(), "|";

// Try to flush an output buffer which was
// started in php.ini, so the virtual() is really
// output after the info above
ob_flush();

// Test if there is a /manual alias
$correctmanual = @virtual("/manual/noalias.txt");
if (!$correctmanual) { echo "manual-alias"; }

// Check for for an exe file (rsnyc settings)
echo "|" . ((int) file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/php-5.0.4-installer.exe'));
