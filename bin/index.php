<?php
// Simulate a /bin shortcut call
$_SERVER['REQUEST_URI'] = '/bin';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
?>
