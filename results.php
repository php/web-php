<?php
$_SERVER['BASE_PAGE'] = 'results.php';
include __DIR__ . '/include/prepend.inc';
include __DIR__ . '/include/results.inc';

// HTTP status line is passed on, signifies an error
site_header(
    'Search results',
    [
        'noindex',
        'current' => 'help',
        'layout_span' => 12,
    ]
);

echo '<h1>Search results</h1>';

google_cse();

site_footer();
