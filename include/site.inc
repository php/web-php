<?
$MIRRORS = array(
   "http://au.php.net:81/"        => array("au", "Australia", "none", "/", 1),
   "http://ca.php.net/"           => array("ca", "Toronto", "bellasf", "http://www.bell.ca/", 1),
   "http://php.privateworld.com/" => array("ca", "Private World", "pwc", "http://www.privateworld.com/", 1),
   "http://il.php.net/"           => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 1),
   "http://php.netvision.net.il/" => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 0),
   "http://machba.il.php.net/"    => array("il", "Technion", "technion", "http://www.technion.ac.il/", 1),
   "http://php.technion.ac.il/"   => array("il", "Technion", "technion", "http://www.technion.ac.il/", 0),
   "http://jp.php.net"            => array("jp", "Japan", "none", "/", 1),
   "http://www.guardian.no/"      => array("no", "Trondheim", "guardian", "http://www.guardian.no/", 0),
   "http://php.guardian.no/"      => array("no", "Trondheim", "guardian", "http://www.guardian.no/", 0),
   "http://no.php.net/"           => array("no", "Trondheim", "guardian", "http://no.php.net/", 1),
   "ftp://no.php.net/pub/free/php/dist/" => array("no", "Trondheim", "guardian", "http://www.guardian.no/", 1),
   "http://sk.php.net/"           => array("sk", "Isternet SR", "isternet", "http://www.isternet.sk/", 1),
   "http://uk.php.net/"           => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 1),
   "http://www.php.net/"          => array("us", "Circle Net", "besthost", "http://BestHost.net/", 1),
   ""                             => array("xx", "", "none", "/")
);

$COUNTRIES = array(
   "au" => "Australia",
   "ca" => "Canada",
   "il" => "Israel",
   "jp" => "Japan",
   "sk" => "Slovakia",
   "no" => "Norway",
   "nz" => "New Zealand",
   "uk" => "United Kingdom",
   "us" => "United States",
   "za" => "South Africa",
   "xx" => "Other"
);

$MYSITE='http://'.getenv("SERVER_NAME").'/';
if (!isset($MIRRORS[$MYSITE])) {
	$MYSITE="";
}
?>
