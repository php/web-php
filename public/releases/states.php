<?php
# This API is deprecated as of 2025-04-01.
# Please use /releases/branches.php instead.
# This API *may* be removed at an indeterminate point in the future.

use phpweb\Releases\Branches;

$_SERVER['BASE_PAGE'] = 'releases/active.php';

require_once __DIR__ . '/../../include/prepend.inc';

header('Content-Type: application/json; charset=UTF-8');

$states = [];

function formatDate($date = null) {
    return $date !== null ? $date->format('c') : null;
}

foreach (Branches::all() as $major => $releases) {
    $states[$major] = [];
    foreach ($releases as $branch => $release) {
        $states[$major][$branch] = [
            'state' => Branches::getBranchSupportStatus($branch),
            'initial_release' => formatDate(Branches::getBranchReleaseDate($branch)),
            'active_support_end' => formatDate(Branches::getBranchBugsEOLDate($branch)),
            'security_support_end' => formatDate(Branches::getBranchSecurityEOLDate($branch)),
        ];
    }
    krsort($states[$major]);
}

krsort($states);

echo json_encode($states);
