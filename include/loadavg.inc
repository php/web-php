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

	if ($l[0] > 80) {
		header("HTTP/1.1 503 Too busy, try again later");
		echo "Server too busy, please try again later, or <a href=\"/mirrors.php\">use a mirror</a>";
		exit;
	}

	$mirrors = array();
	$any_mirrors = array();
	
	/* find potential mirrors */
	foreach ($MIRRORS as $murl => $mirror) {
		if ($murl != 'http://www.php.net' &&
				$mirror[7] == MIRROR_OK /* mirror status */ &&
				$mirror[5] /* searchable */) {

			if ($mirror[0] == $COUNTRY) {
				$mirrors[] = $murl;
			} else {
				$any_mirrors[] = $murl;
			}
		}
	}

	/* randomly pick one of the mirrors in their country */
	if (count($mirrors) > 0) {
		$murl = $mirrors[array_rand($mirrors)];
		header("Location: $murl" . substr($_SERVER['REQUEST_URI'], 1));
		exit;
	}

	/* pick a random mirror if load is moderate */
	if ($l[0] > 10 && count($any_mirrors) > 0) {
		$murl = $any_mirrors[array_rand($any_mirrors)];
		header("Location: $murl" . substr($_SERVER['REQUEST_URI'], 1));
		exit;
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
