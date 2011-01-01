<?php
require dirname(__FILE__) . "/include/languages.inc";

$langcode = language_convert(isset($_GET["lang"]) ? $_GET["lang"] : "en");

if (isset($_GET["description"])) {
    $filename = "search-description";
    $varname = "descriptionIndex";
}
else {
    $filename = "search-index";
    $varname = "searchIndex";
}

header("Content-Type: application/javascript");

// Will send out the proper header, if the browser supports it at all
ob_start("ob_gzhandler");

echo "$varname = ";
$file = dirname(__FILE__) . "/manual/$langcode/$filename.json";
if (is_readable($file)) {
    readfile($file);
} else {
    echo "[]";
}


