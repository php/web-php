<?php

if (!isset($HTTP_REFERER)) {
	$HTTP_REFERER="-";
}

if (!isset($download_file)
	|| !file_exists("distributions/$download_file")) {
	exit("Invalid file requested for download!");
}

if (!isset($source_site)) {
	$source_site="www.php.net";
}

header("Location: http://$source_site/distributions/$download_file");

$log = @fopen("logs/download.log", "a");
if ($log) {
	$log_line = sprintf("%s %s %s %s %s", date("H:i:s d-M-Y"), $HTTP_REFERER, $download_file, gethostbyaddr($REMOTE_ADDR), $source_site);
	fputs($log, "$log_line\n");
	fclose($log);
}

?>
