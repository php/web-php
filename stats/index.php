<?php

// This page is displayed if there is no alias to
// override the stats directory distributed by rsync
// => no local search is set up
include_once 'prepend.inc';
commonHeader("No Stats");
echo '<p>No visitor statistics information is available on this mirror site.</p>';
commonFooter();
?>
