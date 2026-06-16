<?php

use phpweb\ProjectGlobals;

$_SERVER['BASE_PAGE'] = 'releases/active.php';

require_once __DIR__ . '/../../include/prepend.inc';
require_once ProjectGlobals::getPublicRoot(). '/include/branches.inc';

header('Content-Type: application/json; charset=UTF-8');

echo json_encode(get_active_branches());
