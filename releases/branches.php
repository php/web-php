<?php

include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../include/branches.inc';

header('Content-Type: application/json; charset=UTF-8');

function formatDate($date = null) {
    return $date !== null ? $date->format('c') : null;
}

$current = [];
foreach (get_all_branches() as $major => $releases) {
    foreach ($releases as $branch => $release) {
        $current[$branch] = [
            'branch' => $branch,
            'lastest' => ($release['version'] ?? null),
            'state' => get_branch_support_state($branch),
            'initial_release' => formatDate(get_branch_release_date($branch)),
            'active_support_end' => formatDate(get_branch_bug_eol_date($branch)),
            'security_support_end' => formatDate(get_branch_security_eol_date($branch)),
        ];
    }
}

// Sorting should already be correct based on return of get_all_branches(),
// but enforce it here anyway, just to be nice.
usort($current, fn($a, $b) => version_compare($b['branch'], $a['branch']));

echo json_encode($current);
