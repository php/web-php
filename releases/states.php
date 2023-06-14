<?php
$_SERVER['BASE_PAGE'] = 'releases/active.php';

include_once __DIR__ . '/../include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

header('Content-Type: application/json; charset=UTF-8');

$states = [];

function formatDate($date = null) {
    return $date !== null ? $date->format('c') : null;
}

foreach (get_all_branches() as $major => $releases) {
    $states[$major] = [];
    foreach ($releases as $branch => $release) {
        $states[$major][$branch] = [
            'state' => get_branch_support_state($branch),
            'initial_release' => formatDate(get_branch_release_date($branch)),
            'active_support_end' => formatDate(get_branch_bug_eol_date($branch)),
            'security_support_end' => formatDate(get_branch_security_eol_date($branch)),
        ];
    }
    krsort($states[$major]);
}

krsort($states);

echo json_encode($states);
