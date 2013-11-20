<?php
$_SERVER["SERVER_ADDR"] = $_SERVER["HTTP_HOST"];

$filename = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : $_SERVER["SCRIPT_NAME"];
$afilename = $_SERVER["DOCUMENT_ROOT"] . $filename;
$afilename = realpath($afilename);
$len = strlen($_SERVER["DOCUMENT_ROOT"]);

if (strncmp($_SERVER["DOCUMENT_ROOT"], $afilename, $len) == 0) {
    if (file_exists($afilename)) {
        return false;
    }
}
include_once "error.php";

