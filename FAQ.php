<?php

// This page jumps to the manual page of the FAQ,
// as it is now distributed with the manual
// The mirrors language is prefered

require_once 'prepend.inc';
require_once 'manual-lookup.inc';

$file = find_manual_page(default_language(), "faq");

if ($file) {
    header("Location: $file");
} else { header("Location: /"); }

?>