<?php
// Simulate a /include shortcut call
$_SERVER['REQUEST_URI'] = '/include';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
?>
