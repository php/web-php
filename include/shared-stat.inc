<?php // -*- C++ -*-
header("Vary: User-Agent");
require_once 'prepend.inc';

function commonStatHeader($title) {
	commonHeader($title);
}

function commonStatBody($title) {
}

function commonStatFooter() {
	commonFooter();
}
?>
