<?php
/* $Id$ */

include_once "prepend.inc";

// The output of this page should not be cached
header_nocache();

// If we have a valid country, output a CSS rule
// marking the events in the user's country specially
if (!empty($COUNTRY) && $COUNTRY != "NA") {
    echo ".event_$COUNTRY { font-weight: bold; }";
}