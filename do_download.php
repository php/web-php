<?php

$LOG_SERVER = "http://master.php.net/";
$LOG_FILE = "log_download.php";

// If there is no file, then drop out an invalid file error message
if (!isset($download_file)
	|| !file_exists("distributions/$download_file")) {
	exit("Invalid file requested for download!");
}

// Redirect to the particular file
header("Location: http://$SERVER_NAME/distributions/$download_file");
log_download();
// Register the log function as a shutdown function to let the
// download starts before the log activates. This way if the
// "log server" does not work, downloads are still working
/* register_shutdown_function("log_download"); */

// Log downloads in a shutdown function (do not disturb download)
function log_download ()
{
    global $HTTP_REFERER, $HTTP_X_FORWARDED_FOR,
           $REMOTE_ADDR, $SERVER_NAME;

    // Default referer
    if (!isset($HTTP_REFERER)) {
    	$HTTP_REFERER = "-";
    }

    // Figure out true remote address
    $remote_addr = $HTTP_X_FORWARDED_FOR ? $HTTP_X_FORWARDED_FOR : $REMOTE_ADDR;
    
    // Try to open remote log on master.php.net
    $log_file = $LOG_SERVER . $LOG_FILE . "?download_file=" . urlencode($download_file) . "&mirror=" . urlencode($SERVER_NAME) . "&user_referer=" . urlencode($HTTP_REFERER) . "&user_ip=" . urlencode($remote_addr);

    $remote_log = @fopen($log_file, 'r');
   
    mail("imajes@php.net", "download log info", $log_file); 

    if ($remote_log) {
        fread($remote_log, 1024);
        fclose($remote_log);
    }
}

?>
