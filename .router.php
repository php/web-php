<?php
$_SERVER["SERVER_ADDR"] = $_SERVER["HTTP_HOST"];

$filename = $_SERVER["PATH_INFO"] ?? $_SERVER["SCRIPT_NAME"];

if (file_exists($_SERVER["DOCUMENT_ROOT"] . $filename)) {
    /* This could be an image or whatever, so don't try to compress it */
    ini_set("zlib.output_compression", 0);
    return false;
}

include_once "error.php";
