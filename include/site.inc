<?php
/* Structure of MIRRORS array:
  0	"country code",
  1	"Mirror Name",
  2	flag for whether local stats work (1) or not (0) on this mirror
  3	"url for hosting company",
  4	flag for whether site is a full mirror (1) or just a download site (0), or just a placeholder (2),
  5	flag for whether search engine works (1) or not (0) on the site
  6 default language code
*/

require_once 'mirrors.inc';
require_once 'countries.inc';

function is_primary_site() {
  global $MYSITE;
  return $MYSITE == "http://www.php.net/";
}

function is_backup_primary() {
  global $MYSITE;
  return $MYSITE == "http://download.php.net/";
}

function default_language() {
  global $MIRRORS,$MYSITE;
  return $MIRRORS[$MYSITE][6];
}

function have_search() {
  global $MIRRORS,$MYSITE;
  return $MIRRORS[$MYSITE][5];
}

function have_stats() {
  global $MIRRORS,$MYSITE;
  return $MIRRORS[$MYSITE][2];
}

function mirror_provider() {
  global $MIRRORS,$MYSITE;
  return $MIRRORS[$MYSITE][1];
}

function mirror_provider_url() {
  global $MIRRORS,$MYSITE;
  return $MIRRORS[$MYSITE][3];
}

function show_mirror_options ($current) {
  global $MIRRORS, $COUNTRIES, $REQUEST_URI;
  foreach ($MIRRORS as $url=>$mirror) {
    if ($mirror[4] == 1) { /* only list full mirrors here */
      // If this is the current one, or the REQUEST_URI starts with the URL 
	  // (the server provides a different name as it's name then what is
	  // used to access it} => selected it by default
	  if ($url == $current || preg_match("!^$url!", $REQUEST_URI)) {
        echo '<option value="' . $url . '" selected>' . $COUNTRIES[$mirror[0]] . 
          ' (' . $mirror[1] . ") *</option>\n";
      } else {
        echo '<option value="' . $url . '">' . $COUNTRIES[$mirror[0]] . 
          ' (' . $mirror[1] . ")</option>\n";
      }
    }
  }
}

// Find the closest mirror sites, and return with the addresses
function find_closest_mirrors ()
{
    global $REMOTE_HOST, $REMOTE_ADDR, $HTTP_X_FORWARDED_FOR, $MIRRORS;
    
    // We do not know the country
    $country = '';

    // Figure out IP address and hostname
    $ipaddr = $HTTP_X_FORWARDED_FOR ? $HTTP_X_FORWARDED_FOR : $REMOTE_ADDR;
    $hostname = $REMOTE_HOST;
    
    // If we have no hostname, or if it's an IP
    // address, then try to get that hostname
    if  (!$hostname || $hostname == $ipaddr) {
        $hostname = @gethostbyaddr($ipaddr);
        if ($hostname == $ipaddr) { $hostname = ""; }
    }
    
    // If we have that hostname finnaly, get the TLD
    if ($hostname) {
        if (ereg('([a-zA-Z]+)$', $hostname, $reg)) {
            $country = $reg[0];
        }
    }

    // These two entires need to be checked
    $check_mirrors = array(
        "http://" . $country . ".php.net/",
        "http://" . $country . "2.php.net/"
    );
    
    // We do not know about any mirrors here
    $found_mirrors = array();
    
    // Check for those mirrors
    foreach ($check_mirrors as $mirror) {
        if (isset($MIRRORS[$mirror])) {
            $found_mirrors[] = $mirror;
        }
    }
    
    return $found_mirrors;
}

# http://www.unicode.org/unicode/onlinedat/languages.html
$LANGUAGES = array(
    'en' => 'English',
    'pt_BR' => 'Brazilian Portuguese',
    'bg' => 'Bulgarian',
    'ca' => 'Catalan',
    'zh' => 'Chinese',
    'cs' => 'Czech',
    'da' => 'Danish',
    'nl' => 'Dutch',
    'fi' => 'Finnish',
    'fr' => 'French',
    'de' => 'German',
    'el' => 'Greek',
    'hu' => 'Hungarian',
    'in' => 'Indonesian',
    'it' => 'Italian',
    'ja' => 'Japanese',
    'ko' => 'Korean',
    'kr' => 'Korean', # this should be 'ko'. its wrong in phpdoc.
    'lv' => 'Latvian',
    'no' => 'Norwegian',
    'pl' => 'Polish',
    'pt' => 'Portuguese',
    'ro' => 'Romanian',
    'ru' => 'Russian',
    'sk' => 'Slovak',
    'sl' => 'Slovenian',
    'es' => 'Spanish',
    'sv' => 'Swedish',
    'th' => 'Thai',
    'tr' => 'Turkish',
    'uk' => 'Ukranian',
);

$MYSITE = 'http://' . getenv("SERVER_NAME") . '/'; 
if (!isset($MIRRORS[$MYSITE])) {
    $MYSITE='http://' . ereg_replace("^www\\.","",$HTTP_HOST) . '/';
}
if (!isset($MIRRORS[$MYSITE])) {
    $MIRRORS[$MYSITE] = array("xx", $MYSITE, "none", $MYSITE, 2, 0, "en");
}

?>
