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
	header("X-PHP-Load: " . implode(", ", $l));

	/* offload them to their favourite mirror */
	foreach ($MIRRORS as $murl => $mirror) {
		if ($murl != 'http://www.php.net' &&
				mirror_country($murl) == $COUNTRY &&
				mirror_status($murl) == MIRROR_OK &&
				$mirror[5] /* searchable */) {
			header("Location: $murl" . substr($_SERVER['REQUEST_URI'], 1));
			exit;
		}
	}
	/* no searchable mirror was found, allow the request through if the load
	 * isn't really really high */
	if ($l[0] > 20) {
		header("HTTP/1.1 503 Too busy, try again later");
		echo "Server too busy, please try again later, or <a href=\"/mirrors.php\">use a mirror</a>";
		exit;
	}
}

check_load();

?>
