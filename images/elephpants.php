<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$now = $_SERVER["REQUEST_TIME"];
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

/*

 Simple script to serve elephpant images in json format.
 This script is called directly by the browser to feed the
 javascript generated banner of elephpant images.
 
 The structure of the response data is:
 
 [{
     title: <image title>, 
     url:   <link to image on flickr>, 
     data:  <base64 encoded image>
 },{
     ...
 }]
*/

// determine how many images to serve.
if (isset($_REQUEST['count'])) {
    $count = min(intval($_REQUEST['count']), 50);
} else {
    header('HTTP/1.1 400', true, 400);
    print json_encode(array(
        'error' => "Specify how many elephpants to serve via 'count'."
    ));
    exit;
}

// read out photo metadata
$path   = dirname(__FILE__) . '/elephpants';
$json   = @file_get_contents($path . '/flickr.json');
$photos = json_decode($json, true);

// if no photo data, respond with an error.
if (!$photos || !is_array($photos)) {
    header('HTTP/1.1 500', true, 500);
    print json_encode(array(
        'error' => "No elephpant metadata available."
    ));
    exit;
}

// prepare requested number of elephpants at random.
shuffle($photos);
$elephpants = array();
$got = 0;
foreach ($photos as $photo) {

    // stop when we have the requested number of photos.
    if ($got == $count) {
        break;
    }

    // skip photo if file doesn't exist.
    if (!is_readable($path . '/' . $photo['filename'])) {
        continue;
    }
    
    $got++;
    // add photo to response array.
    $elephpants[] = array(
        'title' => $photo['title'],
        'url'   => "http://flickr.com/photos/" . $photo['owner'] . "/" . $photo['id'],
        'data'  => base64_encode(file_get_contents($path . '/' . $photo['filename']))
    );
}

print json_encode($elephpants);

