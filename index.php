<?php // vim: et

// show beta home page if user has requested the beta site.
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
if (myphpnet_beta()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/index-beta.php';
} else {
    $ts = time();
    // Hardcode 11am Jan.18 UTC to 5am Jan.19 UTC time window
    if($ts>=1295348400 && $ts<1295413200) {
        include $_SERVER['DOCUMENT_ROOT'] . '/index-sopa.php';
    } else {
        include $_SERVER['DOCUMENT_ROOT'] . '/index-stable.php';
    }
}
