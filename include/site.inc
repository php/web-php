<?
/* Structure of MIRRORS array:
  0	"country code",
  1	"Mirror Name",
  2	"filename prefix for hosting company graphic",
  3	"url for hosting company",
  4	flag for whether site is a full mirror (1) or just a download site (0),
  5	flag for whether search engine works (1) or not (0) on the site
*/

$MIRRORS = array(
   "http://au.php.net:81/"        => array("au", "Flinders University of South Australia", "rcis", "http://www.nisu.flinders.edu.au/", 1, 1),
   "http://ca.php.net/"           => array("ca", "Toronto", "bellasf", "http://www.bell.ca/", 1, 1),
   "http://php.privateworld.com/" => array("ca", "Private World", "pwc", "http://www.privateworld.com/", 1, 0),
   "http://il.php.net/"           => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 1, 0),
   "ftp://il.php.net/"            => array("il", "Netvision", "netvision", "ftp://il.php.net/php/distributions/", 1, 0),
   "http://php.netvision.net.il/" => array("il", "Netvision", "netvision", "http://www.netvision.net.il/", 0, 0),
   "http://machba.il.php.net/"    => array("il", "Technion", "technion", "http://www.technion.ac.il/", 1, 0),
   "http://php.technion.ac.il/"   => array("il", "Technion", "technion", "http://www.technion.ac.il/", 0, 0),
   "http://jp.php.net/"           => array("jp", "HappySize, Inc.", "happy", "http://jp.gigahit.com/", 1, 1),
   "http://www.guardian.no/"      => array("no", "Guardian Networks AS", "guardian", "http://www.guardian.no/", 0, 0),
   "http://php.guardian.no/"      => array("no", "Guardian Networks AS", "guardian", "http://www.guardian.no/", 0, 0),
   "http://no.php.net/"           => array("no", "Guardian Networks AS", "guardian", "http://no.php.net/", 1, 1),
   "ftp://no.php.net/pub/free/php/dist/" => array("no", "Guardian Networks AS", "guardian", "http://www.guardian.no/", 1, 0),
   "http://pt.php.net/"           => array("pt", "Telenet", "telenet", "http://www..telenet.pt/", 1, 1),
   "http://sk.php.net/"           => array("sk", "Isternet SR", "isternet", "http://www.isternet.sk/", 1, 0),
   "http://uk.php.net/"           => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 1, 1),
   "ftp://uk.php.net/"            => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 1, 0),
   "http://www.php.net/"          => array("us", "Circle Net", "besthost", "http://BestHost.net/", 1, 0),
   ""                             => array("xx", "", "none", "/")
);

$COUNTRIES = array(
   "au" => "Australia",
   "ca" => "Canada",
   "il" => "Israel",
   "jp" => "Japan",
   "no" => "Norway",
   "nz" => "New Zealand",
   "pt" => "Portugal",
   "sk" => "Slovakia",
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
