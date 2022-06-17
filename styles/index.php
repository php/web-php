<?php declare(strict_types=1);
// Simulate a /styles shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/styles';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../error.php';
