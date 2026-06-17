<?php

use phpweb\Releases\Branches;

include_once __DIR__ . '/../include/prepend.inc';

header('Content-Type: application/json; charset=UTF-8');

function formatDate($date = null) {
    return $date !== null ? $date->format('c') : null;
}

$current = [];
foreach (Branches::all() as $major => $releases) {
    foreach ($releases as $branch => $release) {
        $current[$branch] = [
            'branch' => $branch,
            'latest' => $release['version'],
            'state' => Branches::getBranchSupportStatus($branch),
            'initial_release' => formatDate(Branches::getBranchReleaseDate($branch)),
            'active_support_end' => formatDate(Branches::getBranchBugsEOLDate($branch)),
            'security_support_end' => formatDate(Branches::getBranchSecurityEOLDate($branch)),
        ];
    }
}

// Sorting should already be correct based on return of get_all_branches(),
// but enforce it here anyway, just to be nice.
usort($current, fn($a, $b) => version_compare($b['branch'], $a['branch']));

echo json_encode($current);
