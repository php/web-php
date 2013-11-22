<?php
$_SERVER['BASE_PAGE'] = 'cached.php';
include_once 'include/prepend.inc';

if (!isset($_GET["t"], $_GET["f"])) {
    header("Location: http://php.net/");
    exit;
}

$tsstring = gmdate("D, d M Y H:i:s ", $_GET["t"]) . "GMT";
if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

header("Last-Modified: " . $tsstring);

$abs = $_SERVER["DOCUMENT_ROOT"]. "/" .(string)$_GET["f"];
$abs = realpath($abs);

if (strncmp($abs, $_SERVER["DOCUMENT_ROOT"], strlen($_SERVER["DOCUMENT_ROOT"])) != 0) {
    header("Location: http://php.net");
    exit;
}
if (substr($abs, -3) == ".js" || substr($abs, -5) == ".json") {
    header("Content-Type: application/javascript");
} elseif (substr($abs, -4) == ".css") {
    header("Content-Type: text/css");
}

if (function_exists("ob_gzhandler")) {
    ob_start("ob_gzhandler");
    readfile($abs);
    ob_end_flush();
} else {
    readfile($abs);
}


