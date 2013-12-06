<?php

function imgheader($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch($ext) {
        case "gif":
            $hdr = "image/gif";
            break;
        case "png":
            $hdr = "image/png";
            break;
        case "jpg":
        case "jpeg":
            $hdr = "image/jpeg";
            break;
        default:
            return false;
    }
    header("Content-Type: " . $hdr);
}

$now = $_SERVER["REQUEST_TIME"];
$logos = array(
    "./logos/php-logo@2x.png",
);

/* xmas season, december and the first week of January */
$day = date("z", $_SERVER["REQUEST_TIME"]) - date("L", $now);
if ($day < 7 || 365-$day < 32) {
    $logos[] = "./php_snow_2008.gif";
}

/* Every 60seconds.. give the elephpant a chance */
if ($now % 60 == 10) {
    $logos[] = "./ele-running.gif";
}


shuffle($logos);
$logo = array_pop($logos);


if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"])) {
    $last = strtotime($_SERVER["HTTP_IF_MODIFIED_SINCE"]);

    /* Use the same logo for a day */
    if (strtotime("+1 day", $last) > $now) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
}

$future = strtotime("+1 day", $now);
$tsstring = gmdate("D, d M Y H:i:s ", $now) . "GMT";
header("Last-Modified: " . $tsstring);
header("Expires: " . date(DATE_RSS, $future));
imgheader($logo);
readfile($logo);


