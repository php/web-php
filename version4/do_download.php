<?
if (!isset($HTTP_REFERER)) {
	$HTTP_REFERER="-";
}

if (!isset($download_file)
	|| !file_exists("downloads/$download_file")) {
	exit("Invalid file requested for download!");
}

header("Location:  http://www.php.net/version4/downloads/$download_file");

$log = @fopen("logs/download.log", "a");
if ($log) {
	$log_line = sprintf("%s %s %s %s", date("H:i:s d-M-Y"), $HTTP_REFERER, $download_file, gethostbyaddr($REMOTE_ADDR));
	fputs($log, "$log_line\n");
	fclose($log);
}
?>
