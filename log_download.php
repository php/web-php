<?php

$log = @fopen("logs/download.log", "a");
if ($log) {
	$log_line = sprintf("%s %s %s %s %s", date("H:i:s d-M-Y"), $user_referer, $download_file, gethostbyaddr($user_ip), $mirror);
	fputs($log, "$log_line\n");
	fclose($log);
}

?>
