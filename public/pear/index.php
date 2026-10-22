<?php

// Simulate a /pear shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/pear';
require_once __DIR__ . '/../../include/prepend.inc';
require_once __DIR__ . '/../error.php';
