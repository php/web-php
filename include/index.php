<?php

// Simulate a /include shortcut call
include_once 'prepend.inc';
$REQUEST_URI = '/include';
include_once "$DOCUMENT_ROOT/error/index.php";

?>
