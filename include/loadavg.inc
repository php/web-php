<?php # vim:ft=php

/* Offload to the visitors nearest mirror if the load is too high.
 * getloadavg() function used here is currently only available on the www.php.net
 * machine. */
function check_load()
{
	global $COUNTRY, $MIRRORS;

	if (!function_exists("getloadavg")) {
		return;
	}
	$l = getloadavg();
	if (is_array($l) && $l[0] > 10) {
		/* offload them to their favourite mirror */
		foreach ($MIRRORS as $murl => $mirror) {
			if (mirror_country($murl) == $COUNTRY && mirror_status($murl) == MIRROR_OK) {
				header("Location: $murl" . $_SERVER['REQUEST_URI']);
				header("X-PHP-Load: Too-high, try this mirror");
				exit;
			}
		}
		header("Status: 503 Server too busy, try again later");
		exit;
	}
}

check_load();

?>
