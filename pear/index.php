<?php

// Simulate a /pear shortcut call
$_SERVER['REQUEST_URI'] = $HTTP_SERVER_VARS['REQUEST_URI'] = '/pear';
include_once 'prepend.inc';
include_once "$DOCUMENT_ROOT/error/index.php";

?>
