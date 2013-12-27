<?php
$_GET["lang"] = "en";
if (!isset($_GET["lang"])) {
    header("Location: http://php.net");
    exit;
}
if (empty($_SERVER["DOCUMENT_ROOT"])) {
    $_SERVER["DOCUMENT_ROOT"] = __DIR__ . "/../";
}
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
if (!isset($ACTIVE_ONLINE_LANGUAGES[$_GET["lang"]])) {
    header("Location: http://php.net");
}
$lang = $_GET["lang"];

/*
$types = array(
    "phpdoc:varentry",
    "refentry",
    "phpdoc:exceptionref",
    "phpdoc:classref",
    "section",
    "chapter",
    "book",
    "reference",
    "set",
    "appendix",
    "article",
);
 */

$indexfile = $_SERVER["DOCUMENT_ROOT"] . "/manual/$lang/search-index.json";
$descfile = $_SERVER["DOCUMENT_ROOT"] . "/manual/$lang/search-description.json";

/* {{{ Cache this */
$time = max(filemtime($indexfile), filemtime($descfile));
$tsstring = gmdate("D, d M Y H:i:s ", $time) . "GMT";
if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

header("Last-Modified: " . $tsstring);
header("Content-Type: application/javascript");
/* }}} */



$s = file_get_contents($indexfile);
$js = json_decode($s, true);

$index = array();
foreach($js as $item) {
    if ($item[0]) {
        /* key: ID/filename, 0=>*/
        $index[$item[1]] = array($item[0], "", $item[2]);
    }
}

$s = file_get_contents($descfile);
$js = json_decode($s, true);

foreach($js as $k => $item) {
    if ($item && isset($index[$k])) {
        $index[$k][1] = $item;
    }
}


echo json_encode($index);

