<?
$MIRRORS = array(
   "http://ca.php.net/"         => array("ca", "Toronto, Canada", "bellasf", "http://www.bell.ca/"),
   "http://il.php.net/"         => array("il", "Netvision, Israel", "netvision", "http://www.netvision.net.il/"),
   "http://machba.il.php.net/"  => array("il", "Technion, Israel", "none", "/"),
   "http://no.php.net/"         => array("no", "Trondheim, Norway", "guardian", "http://www.guardian.no/"),
   "http://uk.php.net/"         => array("uk", "Norwich, United Kingdom", "squid", "http://www.netcom.co.uk/"),
   "http://www.php.net/"        => array("us", "Circle Net, United States", "besthost", "http://BestHost.net/"),
   "http://www.shmooze.net/"	=> array("ca", "Private World, Canada", "pwc", "http://www.privateworld.com/"),
   ""				=> array("xx", "Unknown", "none", "/")
);

$MYSITE='http://'.getenv("SERVER_NAME").'/';
if (!isset($MIRRORS[$MYSITE])) {
	$MYSITE="";
}
?>
