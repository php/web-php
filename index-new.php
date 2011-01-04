<?php // vim: et

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
if (myphpnet_beta()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/index-beta.php';
} else {
    include $_SERVER['DOCUMENT_ROOT'] . '/index-stable.php';
}
