<?
$MIRRORS = array(
   "http://ca.php.net/"           => array("ca", "Toronto", "bellasf", "http://www.bell.ca/", 1),
   "http://php.privateworld.com/" => array("ca", "Private World", "pwc", "http://www.privateworld.com/", 1),
   "http://il.php.net/"           => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 1),
   "http://php.netvision.net.il/" => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 0),
   "http://machba.il.php.net/"    => array("il", "Technion", "technion", "http://www.technion.ac.il/", 1),
   "http://php.technion.ac.il/"   => array("il", "Technion", "technion", "http://www.technion.ac.il/", 0),
   "http://no.php.net/"           => array("no", "Trondheim", "guardian", "http://www.guardian.no/", 1),
   "http://uk.php.net/"           => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 1),
   "http://www.php.net/"          => array("us", "Circle Net", "besthost", "http://BestHost.net/", 1),
   ""                             => array("xx", "", "none", "/")
);

$COUNTRIES = array(
   "ca" => "Canada",
   "il" => "Israel",
   "no" => "Norway",
   "uk" => "United Kingdom",
   "us" => "United States",
   "xx" => "Other"
);

$MYSITE='http://'.getenv("SERVER_NAME").'/';
if (!isset($MIRRORS[$MYSITE])) {
	$MYSITE="";
}
?>
