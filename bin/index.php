<?php declare(strict_types=1);
// Simulate a /bin shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/bin';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../error.php';
