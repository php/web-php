<?
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

switch($download_file) {
	case "php-4.0b4.tar.gz":
		$download_file = "php-4.0b4pl1.tar.gz";
		break;
	case "php-4.0b4-Win32.zip":
		$download_file = "php-4.0b4pl1-Win32.zip";
		break;
}

header("Location:  http://$source_site/distributions/$download_file");

$log = @fopen("logs/download.log", "a");
if ($log) {
	$log_line = sprintf("%s %s %s %s %s", date("H:i:s d-M-Y"), $HTTP_REFERER, $download_file, gethostbyaddr($REMOTE_ADDR), $source_site);
	fputs($log, "$log_line\n");
	fclose($log);
}
?>
