<?
$MIRRORS = array(
   "http://ca.php.net/"         => array("ca", "Toronto, Canada", "bellasf", "http://www.bell.ca/", 1),
   "http://il.php.net/"         => array("il", "Netvision, Israel", "netvision", "http://www.netvision.net.il/", 1),
   "http://php.netvision.net.il/" => array("il", "Netvision, Israel", "netvision", "http://www.netvision.net.il/", 0),
   "http://machba.il.php.net/"  => array("il", "Technion, Israel", "technion", "http://www.technion.ac.il/", 1),
   "http://php.technion.ac.il/" => array("il", "Technion, Israel", "technion", "http://www.technion.ac.il/", 0),
   "http://no.php.net/"         => array("no", "Trondheim, Norway", "guardian", "http://www.guardian.no/", 1),
   "http://uk.php.net/"         => array("uk", "Norwich, United Kingdom", "squid", "http://www.netcom.co.uk/", 1),
   "http://www.php.net/"        => array("us", "Circle Net, United States", "besthost", "http://BestHost.net/", 1),
   "http://www.shmooze.net/"	=> array("ca", "Private World, Canada", "pwc", "http://www.privateworld.com/", 1),
   ""				=> array("xx", "Unknown", "none", "/")
);

$MYSITE='http://'.getenv("SERVER_NAME").'/';
if (!isset($MIRRORS[$MYSITE])) {
	$MYSITE="";
}
?>
