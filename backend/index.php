<?php

// Simulate a /backend shortcut call
$_SERVER['REQUEST_URI'] = $HTTP_SERVER_VARS['REQUEST_URI'] = '/backend';
include_once 'prepend.inc';
include_once "$DOCUMENT_ROOT/error/index.php";

?>
