<?php
// Simulate a /include shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/include';
include_once __DIR__ . '/prepend.inc';
include_once __DIR__ . '/../error.php';
