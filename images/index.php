<?php
// Simulate a /images shortcut call
$_SERVER['REQUEST_URI'] = '/images';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
?>
