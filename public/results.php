<?php

$_SERVER['BASE_PAGE'] = 'results.php';
include __DIR__ . '/include/prepend.inc';

if (!empty($_GET['p']) && is_string($_GET['p'])) {
    $show = htmlspecialchars($_GET['p'], ENT_QUOTES, 'UTF-8');

    if ($show == '404manual') {
        status_header(404);
    }
}

// HTTP status line is passed on, signifies an error
site_header(
    'Search results',
    [
        'noindex',
        'current' => 'help',
        'layout_span' => 12,
    ],
);

echo '<h1>Search results</h1>';

google_cse();

site_footer();
