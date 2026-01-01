<?php

use phpweb\I18n\Languages;

$lang = $_GET["lang"] ?? "en";
if (empty($_SERVER["DOCUMENT_ROOT"])) {
    $_SERVER["DOCUMENT_ROOT"] = __DIR__ . "/../";
}
include __DIR__ . '/../include/prepend.inc';
if (!isset(Languages::ACTIVE_ONLINE_LANGUAGES[$lang])) {
    header("Location: https://www.php.net");
}

$combinedIndex = $_SERVER["DOCUMENT_ROOT"] . "/manual/$lang/search-combined.json";
$tsstring = gmdate("D, d M Y H:i:s ", filemtime($combinedIndex)) . "GMT";

if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

header("Last-Modified: " . $tsstring);
header("Content-Type: application/javascript");
readfile($combinedIndex);
