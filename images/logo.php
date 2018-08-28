<?php

$refresh = isset($_GET['refresh']) ? true : false;

// Be 100% sure the timezone is set
if (ini_get('date.timezone') === '' && function_exists('date_default_timezone_set')) {
    date_default_timezone_set('UTC');
}

$now = $_SERVER['REQUEST_TIME'];

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
    $last = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);

    // Use the same logo for a day
    if (strtotime('+1 day', $last) > $now && !$refresh) {
        header('HTTP/1.1 304 Not Modified');
        exit;
    }
}

function imgheader($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'gif':
            $hdr = 'image/gif';
            break;
        case 'png':
            $hdr = 'image/png';
            break;
        case 'jpg':
        case 'jpeg':
            $hdr = 'image/jpeg';
            break;
        case 'svg':
            $hdr = 'image/svg+xml';
            break;
        default:
            return false;
    }
    header("Content-Type: $hdr");
}


function get_accepted_encodings() {
    if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
        $encodings = explode(',', $_SERVER['HTTP_ACCEPT_ENCODING']);
        return array_map(function ($x) {
            return trim($x);
        }, $encodings);
    }
    return array();
}


function serve_compressed_if_available($logo) {
    $encodings = get_accepted_encodings();
    if (!empty($encodings)) {
        foreach ($encodings as $encoding) {
            if ($encoding === 'gzip') {
                $encoded_file = "$logo.gz";
                if (file_exists($encoded_file)) {
                    header("Content-Encoding: $encoding");
                    readfile($encoded_file);
                    return;
                }
            }
        }
    }
    readfile($logo);
}

$logo = './logos/php-logo.svg';
if (isset($_SERVER['QUERY_STRING'])) {
	switch ($_SERVER['QUERY_STRING']) {
		case 'QA':
		case 'qa':
		    $logo = './logos/qa.jpg';
		    break;
	}
}

// xmas season, december and the first week of January
$day = date('z', $now) - date('L', $now);
if ($day < 6 || 365 - $day < 32) {
    $logo = './logos/php-xmas-2013.png';
}

$future = strtotime('+1 day', $now);
$tsstring = gmdate('D, d M Y H:i:s ', $now) . 'GMT';
header('Last-Modified: ' . $tsstring);
header('Expires: ' . date(DATE_RSS, $future));
imgheader($logo);
serve_compressed_if_available($logo);


