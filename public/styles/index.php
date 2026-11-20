<?php

// Simulate a /styles shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/styles';
require_once __DIR__ . '/../include/prepend.inc';
require_once __DIR__ . '/../error.php';
