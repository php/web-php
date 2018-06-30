<?php
// Simulate a /pear shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/pear';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
