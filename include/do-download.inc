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
    global $MYSITE;
    
    // Could be a normal download or a manual download file
    $possible_files = array($file => TRUE, "manual/$file" => FALSE); 
    
    // Find out what is the exact file requested 
    $found = FALSE;
    foreach ($possible_files as $name => $log) {
        if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $name)) {
            $found = $name;
            break;
        }
    }
    
    // No downloadable file found
    if ($found === FALSE) {
        site_header("Download not found");
        
        // If user comes from a mirror selection page, provide a backlink
        if (isset($_SERVER['HTTP_REFERER']) && preg_match("!/from/a/mirror$!", $_SERVER['HTTP_REFERER'])) {
            $moreinfo = ", or <a href=\"{$_SERVER['HTTP_REFERER']}\">reconsider your mirror selection</a>"; 
        } else { $moreinfo = ""; }
        
        echo <<<EOT
<h1>Download not found</h1>
<p>
 The file you requested (<strong>{$file}</strong>) is not found on
 this server (<strong>{$MYSITE}</strong>). If this file is a
 recent addition to our downloads, then it is possible that this
 particular server is not yet updated to host that file for download.
 Please come back to this server later{$moreinfo}.
</p>
EOT;
        site_footer();
        exit;
    }
    
    // Redirect to the particular file
    if (!headers_sent()) {
        header('Location: ' . $mirror . 'distributions/' . $found);
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
    if ($log) { download_log($mirror, $found); }
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
