<?php

// Define $MYSITE and $LAST_UPDATED variables
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Text/plain content type for better readability in browsers
header("Content-type: text/plain;charset=ISO-8859-1");

// Try to find out if local search is possible
unset($htsearch_prog);
if (file_exists("configuration.inc")) {
    include_once 'configuration.inc';
    $searchtype = 2;
}
if (isset($_SERVER['HTSEARCH_PROG'])) {
    $htsearch_prog = $_SERVER['HTSEARCH_PROG'];
    $searchtype = 1;
}
if (!@is_executable($htsearch_prog)) {
    unset($htsearch_prog);
}
if (!isset($htsearch_prog)) {
    $searchtype = 0;
}

// Provide information on local stats setup
if (isset($_SERVER['MIRROR_STATS']) && $_SERVER['MIRROR_STATS'] == '1') {
    $mirror_stats = 1;
} else {
    $mirror_stats = 0;
}

echo "$MYSITE|", phpversion(), "|$LAST_UPDATED|$searchtype|$mirror_stats|" , default_language(), "|";

// Test if there is a /manual alias
$correctmanual = @virtual("/manual/noalias.txt");
if (!$correctmanual) { echo "manual-alias"; }
