<?php

// This page tries to find the manual page for PEAR
// because people can access that page by using
// http://www.php.net/pear as a REQUEST_URI

require_once 'prepend.inc';
require_once 'manual-lookup.inc';

$file = find_manual_page(default_language(), "pear");

if ($file) {
    header("Location: $file");
} else { header("Location: /"); }

?>