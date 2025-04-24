<?php

include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../include/release-qa.php';

$output = $QA_RELEASES;
if (($_GET['only'] ?? null) === 'dev_versions') {
    $output = $output['reported'];
}

switch ($_GET['format'] ?? null) {
    case 'json':
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($output);
        exit;
    case 'serialize':
    default:
        header('Content-Type: text/plain; charset=UTF-8');
        echo serialize($output);
        exit;
}
