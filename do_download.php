<?php

if (!isset($HTTP_REFERER)) {
	$HTTP_REFERER="-";
}

if (!isset($download_file)
	|| !file_exists("distributions/$download_file")) {
	exit("Invalid file requested for download!");
}

header("Location: http://$SERVER_NAME/distributions/$download_file");

$remote_addr = $HTTP_X_FORWARDED_FOR ? $HTTP_X_FORWARDED_FOR : $REMOTE_ADDR;

$remote_log = 
    @fopen("http://www.php.net/log_download.php".
        "?download_file=" . urlencode($download_file).
        "&mirror=" . urlencode($SERVER_NAME).
        "&user_referer=" . urlencode($HTTP_REFERER).
        "&user_ip=" . urlencode($remote_addr), 
    'r');

if ($remote_log) {
    fread($remote_log, 1024);
    fclose($remote_log);
}

?>
