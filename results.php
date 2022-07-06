<?php
$_SERVER['BASE_PAGE'] = 'results.php';
include __DIR__ . '/include/prepend.inc';
include __DIR__ . '/include/results.inc';

if (!isset($_GET['l']) || !is_string($_GET['l'])) {
  $_GET['l'] = null;
}

$lang = isset($_GET["l"]) ? (string)$_GET["l"] : "en";
$query = isset($_GET["q"]) ? (string)$_GET["q"] : '';

if (!isset($LANGUAGES[$lang])) {
    $lang = "en";
}


// HTTP status line is passed on, signifies an error
site_header(
    'Search results',
    array(
        'noindex',
        'current' => 'help',
        'layout_span' => 12,
    )
);

echo '<h1>Search results</h1>';

google_cse($query, $lang);

site_footer();
