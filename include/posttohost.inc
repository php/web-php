<?php

// $Id$

/*
 This code is used to post data to the central server which
 can store the data in database and/or mail notices or requests
 to PHP.net stuff and servers
*/

function posttohost($url, $data)
{
    // Get parts of URL
    $url = parse_url($url);
    if (!$url) { return "couldn't parse url"; }
    
    // Provide defaults for port and query string
    if (!isset($url['port']))  { $url['port'] = ""; }
    if (!isset($url['query'])) { $url['query'] = ""; }

    // Build POST string
    $encoded = "";
    foreach ($data as $k => $v) {
        $encoded .= ($encoded ? "&" : "");
        $encoded .= rawurlencode($k) . "=" . rawurlencode($v);
    }

    // Open socket on host
    $fp = fsockopen($url['host'], $url['port'] ? $url['port'] : 80);
    if (!$fp) { return "failed to open socket to {$url['host']}"; }

    // Send HTTP 1.0 POST request to host
    fputs($fp, sprintf("POST %s%s%s HTTP/1.0\n", $url['path'], $url['query'] ? "?" : "", $url['query']));
    fputs($fp, "Host: {$url['host']}\n");
    fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
    fputs($fp, "Content-length: " . strlen($encoded) . "\n");
    fputs($fp, "Connection: close\n\n");
    fputs($fp, "$encoded\n");

    // Read the first line of data, only accept if 200 OK is sent
    $line = fgets($fp, 1024);
    if (!eregi("^HTTP/1\\.. 200", $line)) { return; }

    // Put everything, except the headers to $results 
    $results = ""; $inheader = TRUE;
    while(!feof($fp)) {
        $line = fgets($fp, 1024);
        if ($inheader && ($line == "\n" || $line == "\r\n")) {
            $inheader = FALSE;
        }
        elseif (!$inheader) {
            $results .= $line;
        }
    }
    fclose($fp);

    // Return with data received
    return $results;
}
