<?
/* Structure of MIRRORS array:
  0	"country code",
  1	"Mirror Name",
  2	"filename prefix for hosting company graphic",
  3	"url for hosting company",
  4	flag for whether site is a full mirror (1) or just a download site (0), or just a placeholder (2),
  5	flag for whether search engine works (1) or not (0) on the site
  6 default language code
*/

$MIRRORS = array(
   "http://au.php.net:81/"            => array("au", "Flinders University of South Australia", "rcis", "http://www.nisu.flinders.edu.au/", 1, 1, "en"),
#   "http://au2.php.net/"              => array("au", "Planet Mirror", "", "http://www.planetmirror.com/", 1, 0, "en"),
   "http://at.php.net/"               => array("at", "Goodie Domain Service", "gds", "http://gd.tuwien.ac.at/", 1, 0, "de"),
#   "http://bg.php.net/"               => array("bg", "Bulgaria Online", "", "http://online.bg/", 1, 0, "en"),
   "http://br.php.net/"               => array("br", "SST Internet", "sst", "http://www.sst.com.br/", 1, 0, "pt_BR"),
#   "http://br2.php.net/"               => array("br", "Lune Networks", "", "http://www.lunenetworks.com.br/", 1, 0, "pt_BR"),
   "http://ca.php.net/"               => array("ca", "easyDNS", "easydns", "http://www.easydns.com/", 1, 0, "en"),
#   "http://cn.php.net/"               => array("cn", "China GNU/Linux Forum", "", "http://www.linuxforum.net/", 1, 0, "cn"),
#   "http://hk.php.net/"               => array("hk", "TraLand.com", "", "http://www.traland.com", 1, 0, "en"),
   "http://php3.globe.de/"            => array("de", "@GLOBE GmbH", "globe", "http://www.globe.de/", 1, 0, "de"),
   "http://php3.de/"                  => array("de", "Schlund + Partner", "schlund", "http://admin.schlund.de/s+p/count.phtml?BName=logo-schlund.gif&BLocation=(www.php3.de)&url=www.schlund.de", 1, 1, "de"),
   "http://dk.php.net/"               => array("dk", "B&oslash;rsen Online", "borsen", "http://www.borsen.dk/", 1, 0, "dk"),
   "http://fi.php.net/"               => array("fi", "NIC Finland", "nic", "http://www.nic.fi/", 1, 0, "fi"),
#   "http://fi2.php.net/"              => array("fi", "IMG-Multimedia", "", "http://www.img-media.com/", 1, 0, "fi"),
   "http://fr.php.net/"               => array("fr", "L'Universit&eacute; Michel de Montaigne Bordeaux III","montaigne", "http://www-recherche.montaigne.u-bordeaux.fr/", 1, 0, "fr"),
   "http://hu.php.net/"               => array("hu", "Externet", "externet", "http://www.externet.hu/", 1, 0, "hu"),
   "http://php.fmal.com/"             => array("it", "Open Technology Consulting", "sts", "http://otc.fmal.com/", 1, 0, "it"),
   "http://it2.php.net/"              => array("it", "Utility Line Italia S.r.l.", "utilina", "http://www.uli.it/", 1, 0, "it"),
#   "http://it3.php.net/"              => array("it", "Italia OnLine", "", "http://www.iol.it/", 1, 0, "it"),
   "http://jp.php.net/"               => array("jp", "HappySize, Inc.", "happy", "http://jp.gigahit.com/", 1, 1, "jp"),
#   "http://kr.php.net/"               => array("kr", "HolyNet", "holynet", "http://www.holywar.net/", 1, 1, "kr"),
#   "http://li.php.net/"               => array("li", "Lie-Comtel AG", "", "http://www.lie-comtel.li", 1, 0, "de"),
   "http://mx.php.net/"               => array("mx", "Urbano.com.mx", "urbano", "http://web.urbano.com.mx/?in=php", 1, 0, "es"),
   "http://nl.php.net/"               => array("nl", "WEBtic Internet Consultancy", "webtic", "http://www.webtic.com/", 1, 0, "nl"),
   "http://php.nederland.net/"        => array("nl", "Nederland.net", "nederlandnet", "http://www.nederland.net/", 1, 0, "nl"),
   "ftp://ftp.nederland.net/pub/php/" => array("nl", "Nederland.net", "nederlandnet", "http://www.nederland.net/", 0, 0, "nl"),
   "http://php.guardian.no/"          => array("no", "Guardian Networks AS", "guardian", "http://www.guardian.no/", 0, 0, "no"),
   "http://no.php.net/"               => array("no", "Fast Search &amp; Transfer ASA", "fast", "http://www.fast.no/", 1, 0, "no"),
   "http://pl.php.net/"               => array("pl", "TGR", "tgr", "http://www.tgr.com.pl/", 1, 0, "pl"),
   "http://pt.php.net/"               => array("pt", "Telenet", "telenet", "http://www.telenet.pt/", 1, 1, "pt"),
#   "http://pt2.php.net/"               => array("pt", "SONET", "", "http://www.sonet.pt/", 1, 0, "pt"),
   "ftp://ftp.utt.ro/mirrors/php3/"   => array("ro", "University of Timisoara","upt", "http://www.utt.ro/", 0, 0, "ro"),
   "http://ru.php.net/"               => array("ru", "Direct Internet", "directnet", "http://www.dn.ru/", 1, 0, "ru"),
   "http://se.php.net/"               => array("se", "Chalmers Lindholmen", "cl", "http://www.chl.chalmers.se/", 1, 1, "se"),
#   "http://sg.php.net/"               => array("sg", "Hwa Chong Junior College", "", "http://www.hjc.edu.sg/", 1, 0, "en"),
   "http://ch.php.net/"               => array("ch", "Laboratoire de Bases de Donn&eacute;es", "lbd", "http://lbdwww.epfl.ch/", 1, 1, "en"),
   "http://sk.php.net/"               => array("sk", "Isternet SR", "isternet", "http://www.isternet.sk/", 1, 0, "sk"),
#   "http://th.php.net/"               => array("th", "", "", "", 1, 0, "th"),
   "http://tr.php.net/"               => array("tr", "Bilkent Sunsite", "sunsite", "http://sunsite.bilkent.edu.tr/", 1, 0, "tr"),
#   "http://tw.php.net/"               => array("tw", "DW", "", "http://www.dw.com.tw", 1, 0, "en"),
   "http://ua.php.net/"               => array("ua", "PACOnet", "paco", "http://www.paco.net.ua/", 1, 0, "ua"),
   "ftp://ua.php.net/"                => array("ua", "PACOnet", "paco", "http://www.paco.net.ua/", 0, 0, "ua"),
   "http://ua2.php.net/"              => array("ua", "New Damage/Outline", "ndot", "http://www2.newdamage.com/", 1, 0, "ua"),
   "http://uk.php.net/"               => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 1, 1, "en"),
   "ftp://uk.php.net/"                => array("uk", "Norwich", "squid", "http://www.netcom.co.uk/", 0, 0, "en"),
   "http://www.php.net/"              => array("us", "chek.com", "chek", "http://www.chek.com/", 1, 1, "en"),
   "http://us.php.net/"               => array("us", "Circle Net", "besthost", "http://BestHost.net/", 1, 0, "en"),
   "http://us4.php.net/"              => array("us", "Adgrafix", "adgrafix", "http://www.adgrafix.com/info/hkind", 1, 0, "en"),
   "http://bugs.php.net/"             => array("us", "chek.com", "chek", "http://www.chek.com/", 2, 1, "en"),
   "http://php.he.net/"               => array("us", "Hurricane Electric", "hurricane", "http://he.net/", 1, 0, "en"),
   "http://za.php.net/"               => array("za", "CSIR Mikomtek", "mikomtek", "http://www.mikom.csir.co.za/", 1, 0, "en"),
   ""                                 => array("xx", "Unknown", "none", "/", 1, 0, "en")
);

$COUNTRIES = array(
   "au" => "Australia",
   "at" => "Austria",
   "bg" => "Bulgaria",
   "br" => "Brazil",
   "ca" => "Canada",
   "ch" => "Switzerland",
   "cl" => "Chile",
   "cn" => "China",
   "cz" => "Czech Republic",
   "de" => "Germany",
   "dk" => "Denmark",
   "es" => "Spain",
   "fi" => "Finland",
   "fr" => "France",
   "hk" => "China (Hong Kong)",
   "hu" => "Hungary",
   "id" => "Indonesia",
   "il" => "Israel",
   "it" => "Italy",
   "jp" => "Japan",
   "kr" => "Korea",
   "lv" => "Latvia",
   "mx" => "Mexico",
   "nl" => "Netherlands",
   "no" => "Norway",
   "nz" => "New Zealand",
   "pl" => "Poland",
   "pt" => "Portugal",
   "ro" => "Romania",
   "ru" => "Russian Federation",
   "se" => "Sweden",
   "sk" => "Slovakia",
   "sg" => "Singapore",
   "th" => "Thailand",
   "tr" => "Turkey",
   "tw" => "Taiwan",
   "ua" => "Ukraine",
   "uk" => "United Kingdom",
   "us" => "United States",
   "za" => "South Africa",
   "xx" => "Other"
);


$MYSITE='http://'.getenv("SERVER_NAME").'/';

if (!isset($MIRRORS[$MYSITE])) {
	$MIRRORS[$MYSITE] = array("xx", "Unknown", "none", $MYSITE, 1, 0);
}

# fix for non-standard port in Australian mirror
if(strstr($MYSITE,"au.php.net")) {
	$MYSITE = ereg_replace("au.php.net", "au.php.net:81", $MYSITE);
}

?>
