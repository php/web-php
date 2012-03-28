<?php // vim: et

// show beta home page if user has requested the beta site.
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
if (myphpnet_beta()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/index-beta.php';
} else {
    include $_SERVER['DOCUMENT_ROOT'] . '/index-stable.php';
}
