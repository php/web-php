<?
function local_ping($ip) {
	global $SERVER_NAME;

	echo file_exists("/bin/ping");
	echo "<br>\n";
	echo file_exists("/usr/sbin/ping");
	echo "<br>\n";
	if(file_exists("/bin/ping")) { $ping="/bin/ping"; }
	elseif(file_exists("/usr/sbin/ping")) { $ping="/usr/sbin/ping"; }
	elseif(file_exists("/usr/bin/ping")) { $ping="/usr/bin/ping"; }
	elseif(file_exists("/usr/local/bin/ping")) { $ping="/usr/local/bin/ping"; }
	else { $ping="ping"; }
	echo $ping;
	$fp=popen("$ping -s -n $ip 32 5","r");
	$i=0;
	while(!feof($fp)) {
		$lines[]=fgets($fp,256);
		$i++;
	}
	echo "<a href=\"http://$SERVER_NAME\">$SERVER_NAME</a><br>\n";
	echo $lines[$i-3]."<br>";
	echo $lines[$i-2]."<br>";
	flush();
	pclose($fp);
}

function ping($server) {
	global $SERVER_NAME;
	global $REMOTE_HOST;	
	if($server==$SERVER_NAME) { local_ping($REMOTE_HOST); }
	else {
		/* Go back to basics here and don't rely on a url fopen since
		   remote servers may not have that option enabled */
		$fp= fsockopen($server,80);
		fputs($fp,"GET /ping.php3?ip=$REMOTE_HOST HTTP/1.0\nHost: $server\n\n");
		$i=0;
		while(!feof($fp)) {
			$lines[]=fgets($fp,256);
			$i++;
		}
		fclose($fp);
		echo $lines[$i-4];
		echo $lines[$i-3];
		echo $lines[$i-2];
		echo "<P>\n";
		flush();
	}
}

if(isset($ip)) {
	local_ping($ip);
} else {
	echo "Please wait, checking all mirrors...<P>\n";
	flush();
	ping("ca.php.net");
	ping("il.php.net");
	ping("machba.il.php.net");
	ping("no.php.net");
	ping("uk.php.net");
	ping("www.php.net");
}
?>
