<?php
/* $Id$ */

include_once "prepend.inc";

// The output of this page should not be cached by public proxies
header("Cache-Control: private, max-age=86400, min-age=43200");
header("Pragma: no-cache");

// Proper content-type header
header("Content-type: text/css");

// If we have a valid country, output a CSS rule
// marking the events in the user's country specially
if (i2c_valid_country()) {
    echo ".event_$COUNTRY { font-weight: bold; }";
}
