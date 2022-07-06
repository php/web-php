<?php
// Simulate a /pear shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/pear';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../error.php';
