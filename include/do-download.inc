<?php

// $Id$

/*
   This code redirects the user to the exact file to
   download, and logs the download if it's something
   we would like to know about (PHP binary or source).
*/

// Download a file from a mirror site
function download_file($mirror, $file)
{
    // Quit if the requested file is not availabe localy
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $file)) {
        exit("Invalid file requested for download!");
    }
    
    // Redirect to the particular file
    if (!headers_sent()) {
        header('Location: ' . $mirror . 'distributions/' . $file);
    } else {
        exit("Unable to serve you the requested file for download");
    }

    // Try to flush output, and make the browser really
    // download the file, even if the log server is down
    echo " ";
    flush();
    
    // Log download on master server (may be a registered
    // shutdown function to really run after the file is
    // started to download)
    download_log($mirror, $file);
}

// Log downloads on the master server
function download_log($mirror, $file)
{
    // Set referer value
    $referer = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '-');
    
    // String to pass on as a query to the remote log
    $log_file = "http://master.php.net/log_download.php" .
                "?download_file=" . urlencode($file) .
                "&mirror=" .        urlencode($mirror) .
                "&user_referer=" .  urlencode($referer) .
                "&user_ip=" .       urlencode(i2c_realip());

    // Open the remote log and read some bytes
    $remote_log = @fopen($log_file, 'r');
    if ($remote_log) {
        fread($remote_log, 1024);
        fclose($remote_log);
    }
}
