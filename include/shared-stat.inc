<?php // -*- C++ -*-
header("Vary: User-Agent");
require_once 'prepend.inc';

function commonStatHeader($title,0,1) {
	commonHeader($title);
}

function commonStatBody($title) {
}

function commonStatFooter() {
	commonFooter();
}
?>
