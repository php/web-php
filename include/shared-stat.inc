<?php // -*- C++ -*-
header("Vary: User-Agent");
require_once 'prepend.inc';

function commonStatHeader($title) {
    commonHeader($title,0,1);
}

function commonStatBody($title) {
}

function commonStatFooter() {
    commonFooter();
}
?>
