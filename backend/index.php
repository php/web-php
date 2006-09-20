<?php
// $Id$

// Simulate a /backend shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/backend';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
