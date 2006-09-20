<?php
// $Id$

// Simulate a /styles shortcut call (which will lead to a manual page)
$_SERVER['REQUEST_URI'] = '/styles';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/error.php';
