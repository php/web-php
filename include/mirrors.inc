<?php









/*
 * DO NOTE MODIFY THIS FILE
 * This file is automagically generated, and overwritten,
 * by the rsync box. It is only included in this repo to simplify getting
 * up and running on your localhost without needing to generate all this
 * yourself from master.
*/
 








/*
 Structure of an element of the $MIRRORS array:

  0  Country code
  1  Provider name
  2  Local stats flag (TRUE / FALSE)
  3  Provider URL
  4  Mirror type [see type constants]
  5  SQLite availability [was originally: local search engine flag] (TRUE / FALSE)
  6  Default language code
  7  Status [see status constants]

 List generated: 2013/09/19 23:59:07 GMT
*/

// Mirror type constants
define('MIRROR_DOWNLOAD', 0);
define('MIRROR_STANDARD', 1);
define('MIRROR_SPECIAL',  2);
define('MIRROR_VIRTUAL',  3);

// Mirror status constants
define('MIRROR_OK',          0);
define('MIRROR_NOTACTIVE',   1);
define('MIRROR_OUTDATED',    2);
define('MIRROR_DOESNOTWORK', 3);
$MIRRORS = array(
    "http://ar2.php.net/" => array(
        "ARG", "XMundo Hosting Solutions", FALSE,
        "http://www.xmundo.net", MIRROR_STANDARD, TRUE,
        "es", MIRROR_OK),
    "http://am1.php.net/" => array(
        "ARM", "ARMINCO Global Telecommunications", TRUE,
        "http://www.arminco.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://au1.php.net/" => array(
        "AUS", "UberGlobal", TRUE,
        "http://www.uber.com.au/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://at1.php.net/" => array(
        "AUT", "Goodie Domain Service", FALSE,
        "http://www.gdsw.at/", MIRROR_STANDARD, TRUE,
        "de", MIRROR_OK),
    "http://at2.php.net/" => array(
        "AUT", "Yalwa Local Directory Services Austria", TRUE,
        "http://www.yalwa.at/", MIRROR_STANDARD, TRUE,
        "de", MIRROR_OK),
    "http://bd1.php.net/" => array(
        "BGD", "IS Pros Limited", TRUE,
        "http://www.ispros.com.bd", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://be1.php.net/" => array(
        "BEL", "King Foo", FALSE,
        "http://www.king-foo.be/", MIRROR_STANDARD, TRUE,
        "nl", MIRROR_OK),
    "http://be2.php.net/" => array(
        "BEL", "Cu.be Solutions", TRUE,
        "http://www.cu.be/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://br1.php.net/" => array(
        "BRA", "HostNet Internet", FALSE,
        "http://www.hostnet.com.br", MIRROR_STANDARD, TRUE,
        "pt_BR", MIRROR_OK),
    "http://br2.php.net/" => array(
        "BRA", "Digirati Internet", FALSE,
        "http://www.digirati.com.br/", MIRROR_STANDARD, TRUE,
        "pt_BR", MIRROR_OK),
    "http://bg2.php.net/" => array(
        "BGR", "Data.BG", TRUE,
        "http://www.data.bg", MIRROR_STANDARD, TRUE,
        "bg", MIRROR_OK),
    "http://ca1.php.net/" => array(
        "CAN", "easyDNS", FALSE,
        "http://www.easydns.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ca2.php.net/" => array(
        "CAN", "Parasane, LLC", TRUE,
        "http://www.parasane.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ca3.php.net/" => array(
        "CAN", "egateDOMAINS", TRUE,
        "http://www.egatedomains.ca/?RP=DJFEIWHFEWQ", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://cl1.php.net/" => array(
        "CHL", "Caos Consultores", TRUE,
        "http://www.caos.cl", MIRROR_STANDARD, TRUE,
        "es", MIRROR_OK),
    "http://cn1.php.net/" => array(
        "CHN", "VeryCD Network", FALSE,
        "http://www.verycd.com", MIRROR_STANDARD, FALSE,
        "", MIRROR_DOESNOTWORK),
    "http://cn2.php.net/" => array(
        "CHN", "Sina App Engine (SAE)", TRUE,
        "http://sae.sina.com.cn/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://cz1.php.net/" => array(
        "CZE", "Czech Technical University in Prague", FALSE,
        "http://www.cvut.cz/", MIRROR_STANDARD, TRUE,
        "cs", MIRROR_OK),
    "http://cz2.php.net/" => array(
        "CZE", "Softaculous Ltd.", TRUE,
        "http://www.softaculous.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://dk1.php.net/" => array(
        "DNK", "Siminn Denmark", TRUE,
        "http://www.siminn.dk", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ee1.php.net/" => array(
        "EST", "Zone Media LLC", TRUE,
        "https://www.zone.ee/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://fi1.php.net/" => array(
        "FIN", "Avenla Oy", TRUE,
        "http://www.avenla.fi/", MIRROR_STANDARD, TRUE,
        "fi", MIRROR_OK),
    "http://fi2.php.net/" => array(
        "FIN", "Planeetta Internet OY", TRUE,
        "http://www.planeetta.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://fr2.php.net/" => array(
        "FRA", "Crihan", FALSE,
        "http://www.crihan.fr/", MIRROR_STANDARD, TRUE,
        "fr", MIRROR_OK),
    "http://de1.php.net/" => array(
        "DEU", "@GLOBE GmbH", FALSE,
        "http://www.globe.de/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://de2.php.net/" => array(
        "DEU", "Locanto Kleinanzeigen", TRUE,
        "http://www.locanto.de/", MIRROR_STANDARD, TRUE,
        "de", MIRROR_OK),
    "http://de3.php.net/" => array(
        "DEU", "1&1 Internet AG", FALSE,
        "http://1und1.de", MIRROR_STANDARD, TRUE,
        "de", MIRROR_OK),
    "http://gr2.php.net/" => array(
        "GRC", "Golden-i", TRUE,
        "http://www.golden-i.gr/", MIRROR_STANDARD, TRUE,
        "el", MIRROR_OK),
    "http://hk1.php.net/" => array(
        "HKG", "Nethub Online Limited", FALSE,
        "http://www.nethub.com.hk/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://hk2.php.net/" => array(
        "HKG", "Website Solution Web Hosting", FALSE,
        "http://www.website-solution.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://hu1.php.net/" => array(
        "HUN", "PHPhost.hu", FALSE,
        "http://www.phphost.hu", MIRROR_STANDARD, TRUE,
        "hu", MIRROR_OK),
    "http://is1.php.net/" => array(
        "ISL", "Netsamskipti ehf", TRUE,
        "http://www.nwc.is", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://is2.php.net/" => array(
        "ISL", "Dotgeek", TRUE,
        "http://dotgeek.org/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://in1.php.net/" => array(
        "IND", "Directi Web Hosting", FALSE,
        "http://www.directi.com", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://in2.php.net/" => array(
        "IND", "Directi Web Hosting", FALSE,
        "http://www.directi.com", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://in3.php.net/" => array(
        "IND", "IndiaLinks Web Hosting Pvt Ltd", TRUE,
        "http://www.indialinks.com", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://id1.php.net/" => array(
        "IDN", "PT Pasifik Satelit Nusantara", TRUE,
        "http://www.pesat.net.id", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ir2.php.net/" => array(
        "IRN", "ParsPack.com", FALSE,
        "http://parspack.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ie1.php.net/" => array(
        "IRL", "Yalwa - Local Directory Services Ireland", TRUE,
        "http://www.yalwa.ie/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://il1.php.net/" => array(
        "ISR", "SPD HOSTING LTD", FALSE,
        "http://www.spd.co.il/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://it1.php.net/" => array(
        "ITA", "Register.it", FALSE,
        "http://www.register.it/", MIRROR_STANDARD, TRUE,
        "it", MIRROR_OK),
    "http://it2.php.net/" => array(
        "ITA", "nidohosting", FALSE,
        "http://www.nidohosting.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://jm2.php.net/" => array(
        "JAM", "Teamopolis Sports Websites Inc.", TRUE,
        "http://www.teamopolis.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://jp1.php.net/" => array(
        "JPN", "PacketBusiness, Inc.", FALSE,
        "http://www.packetbusiness.com/", MIRROR_STANDARD, TRUE,
        "ja", MIRROR_OK),
    "http://jp2.php.net/" => array(
        "JPN", "snotch", TRUE,
        "http://bloggers.ja.bz/sunouchi/", MIRROR_STANDARD, TRUE,
        "ja", MIRROR_OK),
    "http://lv1.php.net/" => array(
        "LVA", "Amigo", TRUE,
        "http://www.amigo.lv/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://li1.php.net/" => array(
        "LIE", "Telecom Liechtenstein AG", TRUE,
        "http://www.telecom.li/", MIRROR_STANDARD, TRUE,
        "de", MIRROR_OK),
    "http://lu1.php.net/" => array(
        "LUX", "root eSolutions ISP", FALSE,
        "http://www.root.lu", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://my1.php.net/" => array(
        "MYS", "MaxDedicated", TRUE,
        "http://www.maxdedicated.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://mx1.php.net/" => array(
        "MEX", "uServers Mexico", FALSE,
        "http://www.uservers.net/?in=php", MIRROR_STANDARD, TRUE,
        "es", MIRROR_OK),
    "http://mx2.php.net/" => array(
        "MEX", "Universidad Autónoma Metropolitana Azcapotzalco", TRUE,
        "http://www.azc.uam.mx", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://nl1.php.net/" => array(
        "NLD", "Stream Service", TRUE,
        "http://www.streamservice.nl/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://nl3.php.net/" => array(
        "NLD", "Computel Standby BV", TRUE,
        "http://www.computel.nl/", MIRROR_STANDARD, TRUE,
        "nl", MIRROR_OK),
    "http://nc1.php.net/" => array(
        "NCL", "Nautile", TRUE,
        "http://www.nautile.nc/", MIRROR_STANDARD, TRUE,
        "fr", MIRROR_OK),
    "http://nz1.php.net/" => array(
        "NZL", "Simon Sites", TRUE,
        "http://simonsites.geek.nz/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://nz2.php.net/" => array(
        "NZL", "Catalyst IT Ltd", FALSE,
        "http://catalyst.net.nz/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://no1.php.net/" => array(
        "NOR", "Nordicom Norge AS", FALSE,
        "http://nordicom.no/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://no2.php.net/" => array(
        "NOR", "Verdens Gang AS", TRUE,
        "http://www.vg.no", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://pk1.php.net/" => array(
        "PAK", "MAGSNET LIMITED", FALSE,
        "http://magsnet.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://pa1.php.net/" => array(
        "PAN", "Unidominios", TRUE,
        "http://www.unidominios.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://pl1.php.net/" => array(
        "POL", "WEBdev", TRUE,
        "http://webdev.pl/", MIRROR_STANDARD, TRUE,
        "pl", MIRROR_OK),
    "http://pt1.php.net/" => array(
        "PRT", "nfsi telecom, lda", FALSE,
        "http://www.nfsi.pt/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://pt2.php.net/" => array(
        "PRT", "dominios.pt", TRUE,
        "http://www.dominios.pt/", MIRROR_STANDARD, TRUE,
        "pt", MIRROR_OK),
    "http://kr1.php.net/" => array(
        "KOR", "ask.sarang.net", TRUE,
        "http://ask.sarang.net", MIRROR_STANDARD, TRUE,
        "kr", MIRROR_OK),
    "http://md1.php.net/" => array(
        "MDA", "dev.md", FALSE,
        "http://www.dev.md/", MIRROR_STANDARD, TRUE,
        "ro", MIRROR_OK),
    "http://ro1.php.net/" => array(
        "ROU", "SpiderVPS", FALSE,
        "http://www.spidervps.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ru2.php.net/" => array(
        "RUS", "Cronyx Plus LLC", FALSE,
        "http://isp.rinet.ru/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_DOESNOTWORK),
    "http://sg2.php.net/" => array(
        "SGP", "Xssist Group (Singapore) Pte Ltd", FALSE,
        "http://www.xssist.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://sg3.php.net/" => array(
        "SGP", "NamesAhead.com", TRUE,
        "http://www.namesahead.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://si1.php.net/" => array(
        "SVN", "DOMENAR.net", FALSE,
        "http://www.domenar.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://es1.php.net/" => array(
        "ESP", "GRN Serveis Telematics", FALSE,
        "http://www.grn.es/classic", MIRROR_STANDARD, TRUE,
        "es", MIRROR_OK),
    "http://se1.php.net/" => array(
        "SWE", "Portlane AB", FALSE,
        "http://www.portlane.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://se2.php.net/" => array(
        "SWE", "SpaceDump IT AB", TRUE,
        "http://www.spacedump.se/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ch1.php.net/" => array(
        "CHE", "ComunidadHosting", TRUE,
        "http://www.comunidadhosting.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ch2.php.net/" => array(
        "CHE", "Jobsuchmaschine AG", FALSE,
        "http://www.jobsuchmaschine.ch/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://tw1.php.net/" => array(
        "TWN", "twemail.com", TRUE,
        "http://twemail.com/", MIRROR_STANDARD, TRUE,
        "tw", MIRROR_OK),
    "http://tw2.php.net/" => array(
        "TWN", "www.mirror.tw", TRUE,
        "http://www.mirror.tw/", MIRROR_STANDARD, TRUE,
        "tw", MIRROR_OK),
    "http://th1.php.net/" => array(
        "THA", "THAIWEB.network", TRUE,
        "http://www.thaiweb.net", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://tr1.php.net/" => array(
        "TUR", "İstanbul Teknik Üniversitesi Bilgi İşlem Daire Başkanlığı", FALSE,
        "http://www.itu.edu.tr/", MIRROR_STANDARD, TRUE,
        "tr", MIRROR_OK),
    "http://tr2.php.net/" => array(
        "TUR", "DGN Teknoloji", FALSE,
        "http://www.dgn.net.tr/", MIRROR_STANDARD, TRUE,
        "tr", MIRROR_OK),
    "http://ua1.php.net/" => array(
        "UKR", "ELRO Corporation", FALSE,
        "http://elro.com", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://ua2.php.net/" => array(
        "UKR", "Max Khaikin", FALSE,
        "http://www.masterlogic.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://uk1.php.net/" => array(
        "GBR", "Camel Network", TRUE,
        "http://camelnetwork.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://uk3.php.net/" => array(
        "GBR", "CatN PHP Hosting", TRUE,
        "http://www.catn.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://tz1.php.net/" => array(
        "TZA", "Aptus Solutions", TRUE,
        "http://aptus.co.tz", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://us1.php.net/" => array(
        "USA", "NEXCESS.NET", FALSE,
        "http://www.nexcess.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://us2.php.net/" => array(
        "USA", "Hurricane Electric", FALSE,
        "http://he.net/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_OK),
    "http://us3.php.net/" => array(
        "USA", "C7 Data Centers", TRUE,
        "http://www.c7dc.com/", MIRROR_STANDARD, TRUE,
        "en", MIRROR_DOESNOTWORK),
    "http://www.php.net/" => array(
        "USA", "Yahoo! Inc.", FALSE,
        "http://developer.yahoo.com/", MIRROR_SPECIAL, TRUE,
        "en", MIRROR_OK),
    "http://docs.php.net/" => array(
        "XXX", "EUKhost", FALSE,
        "http://eukhost.com/", MIRROR_SPECIAL, TRUE,
        "en", MIRROR_DOESNOTWORK),
);
