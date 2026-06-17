<?php

use phpweb\Releases\Branches;

$_SERVER['BASE_PAGE'] = 'releases/active.php';

require_once __DIR__ . '/../../include/prepend.inc';

header('Content-Type: application/json; charset=UTF-8');

echo json_encode(Branches::active());
