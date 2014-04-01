<?php

$refresh = isset($_GET["refresh"]) ? true : false;

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

// Be 100% sure the timezone is set
if (ini_get("date.timezone") === "" && function_exists("date_default_timezone_set")) {
    date_default_timezone_set("UTC");
}

$now = $_SERVER["REQUEST_TIME"];
if(!isset($_SERVER["QUERY_STRING"])) {
    $_SERVER["QUERY_STRING"] = "phpweb";
}
switch($_SERVER["QUERY_STRING"]) {
    case "QA":
    case "qa":
        $logos = array(
            "./logos/qa.jpg",
        );
        break;
    default:
        $logos = array(
            "./logos/php-logo@2x.png",
        );
}

/* xmas season, december and the first week of January */
$day = date("z", $now) - date("L", $now);
if ($day < 6 || 365-$day < 32) {
    $logos = array("./logos/php-xmas-2013.png");
}

/* Every so often.. give the elephpant a chance */
if ($now % 60 == 10 || $refresh) {
    $logos[] = "./ele-running.gif";
}
if ($now % 240 == 10 || $refresh || $now) {
    $logos = array_merge($logos, glob("logos/oldschool/*"));
}


shuffle($logos);
$logo = array_pop($logos);


if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"])) {
    $last = strtotime($_SERVER["HTTP_IF_MODIFIED_SINCE"]);

    /* Use the same logo for a day */
    if (strtotime("+1 day", $last) > $now && !$refresh) {
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


