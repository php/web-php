<?php
$_SERVER['BASE_PAGE'] = 'releases/next.php';

include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . "/../include/gpg-keys.inc";
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

$activeList = get_active_branches();
ksort($activeList);
$activeList = array_keys(end($activeList));
usort($activeList, 'version_compare');
$latestActive = end($activeList);

$managedList = array_keys(gpg_key_get_branches(false));
usort($managedList, 'version_compare');
$latestManaged = end($managedList);

$next = $latestManaged && $latestActive && version_compare($latestManaged, $latestActive, '>')
    ? $latestManaged
    : null;

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($next);
