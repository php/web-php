<?php
$_SERVER['BASE_PAGE'] = 'releases/active.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

header('Content-Type: application/json; charset=UTF-8');

echo json_encode(get_active_branches());
