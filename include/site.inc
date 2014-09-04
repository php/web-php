<?php // -*- C++ -*-

// $Id$

// Define $MIRRORS array, and some constants
include $_SERVER['DOCUMENT_ROOT'] . '/include/mirrors.inc';

// Define $COUNTRIES array
include $_SERVER['DOCUMENT_ROOT'] . '/include/countries.inc';

// Define $COUNTRIES_ALPHA2 array
include $_SERVER['DOCUMENT_ROOT'] . '/include/countries-alpha2.inc';

// Define $COUNTRY_ALPHA_2_TO_3 array
include $_SERVER['DOCUMENT_ROOT'] . '/include/countries_alpha_mapping.inc';


// Define $LANGUAGES array
include $_SERVER['DOCUMENT_ROOT'] . '/include/languages.inc';

// Returns true if the current (or specified)
// site is the primary mirror site
function is_primary_site($site = FALSE)
{
    global $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return ($site == "http://www.php.net/" || $site == "http://php.net/" );
}

// Returns true if the current (or specified)
// site is the backup site of the primary site
function is_backup_primary($site = FALSE)
{
    global $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $site == "http://download.php.net/";
}

// Returns true if the current (or specified)
// mirror site is an official mirror site
function is_official_mirror($site = FALSE)
{
    return (mirror_type($site) != MIRROR_VIRTUAL);
}

// Returns the current (or specified)
// mirror site's default language
function default_language($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][6] : FALSE);
}

// Returns true if the current (or specified) mirror
// site is registered to have local search support
function have_search($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][5] : FALSE);
}

// Returns true if the current (or specified) mirror
// site is registered to have local stats support
function have_stats($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][2] : FALSE);
}

// Returns the current (or specified)
// mirror site's country code
function mirror_country($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][0] : FALSE);
}

// Returns the current (or specified)
// mirror site's provider's name
function mirror_provider($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
	return $MIRRORS[$site][1];
    } elseif (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
	return $MIRRORS[$_SERVER['SERVER_ADDR']][1];
    }

    return false;
}

// Returns the current (or specified)
// mirror site's provider's URL
function mirror_provider_url($site = FALSE)
{
    global $MIRRORS,$MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
        return $MIRRORS[$site][3];
    } elseif (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        return $MIRRORS[$_SERVER['SERVER_ADDR']][3];
    }

    return false;
}

// Returns the current (or specified)
// mirror site's type (use the constants!)
function mirror_type($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
        return $MIRRORS[$site][4];
    } elseif (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        return $MIRRORS[$_SERVER['SERVER_ADDR']][4];
    }

    return false;
}

// Returns the current (or specified)
// mirror site's status (use the constants!)
function mirror_status($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
        return $MIRRORS[$site][7];
    } elseif (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        return $MIRRORS[$_SERVER['SERVER_ADDR']][7];
    }

    return false;
}

// Count all mirrors or mirrors in a given country
function count_mirrors($country = FALSE)
{
    global $MIRRORS;
    
    // This is a non-identified country
    if ($country == "NA") { return 0; }
    
    // Count only the ones in the same country
    $count = 0;
    foreach ($MIRRORS as $murl => $mirror) {
        if (mirror_status($murl)  != MIRROR_OK) { continue; }
        if ($country === FALSE || mirror_country($murl) == $country) { $count++; }
    }
    return $count;
}

// Redirect to an URI on this mirror site or outside this site
function mirror_redirect($absoluteURI)
{
    global $MYSITE;

    // Test if there is no protocol spec
    // in the URL, then prepend local site URI
    if (!preg_match("!^[a-z]+://!", $absoluteURI)) {
        $absoluteURI = substr($MYSITE, 0, -1) . $absoluteURI;
    }
    
    // Do a redirection, if headers are not sent
    if (!headers_sent()) {
        header("Location: $absoluteURI");
    }

    // Always exit (the page is not to be displayed)
    exit;
}

// Set a cookie for all the .php.net sites for the root
// dir with $name and $content. Provide $exptime relatively
// to the current time!
function mirror_setcookie($name, $content, $exptime)
{
    if (!headers_sent()) {
        if (is_official_mirror()) {
            return setcookie($name, $content, time() + $exptime, '/', '.php.net');
        } else {
            return setcookie($name, $content, time() + $exptime, '/');
        }
    } else {
        return FALSE;
    }
}

function organise_mirrors($mirrors) {
    // Lets group the mirrors by country code, for easy output on the page.
    $retval = array();
    foreach($mirrors as $key => $mirror) {

        // If the mirror is not all right or it is virtual (not an official mirror), skip it
        if (mirror_status($key) != MIRROR_OK || mirror_type($key) == MIRROR_VIRTUAL) { continue; }

        if(!isset($grouped_mirrors[$mirror[0]])) {
            $grouped_mirrors[$mirror[0]] = array();
        }

        $retval[$mirror[0]][] = array(
            'url'            => $key,
            'country_code'   => $mirror[0],
            'provider_title' => $mirror[1],
            'provider_url'   => $mirror[3]
        );

    }
    return $retval;
}
function print_full_mirror_list($download_file = null, $direct_download = false) {
    global $COUNTRIES, $COUNTRY, $MIRRORS;

    $groupped = organise_mirrors($MIRRORS);
    $close = count_mirrors($COUNTRY);
    if ($close) {
        $mnum = (($close > 1) ? "mirrors" : "mirror");
        echo "<p>We have automatically detected the following $mnum to be close to you</p>";

        if (isset($groupped[$COUNTRY])) {
            print_mirror_box($COUNTRIES[$COUNTRY], $COUNTRY, $groupped[$COUNTRY], $download_file, $direct_download, true);
            echo "<br>";
        }
    }
    foreach($groupped as $mirrorcode => $country) {
        print_mirror_box($COUNTRIES[$mirrorcode], $mirrorcode, $country, $download_file, $direct_download, false);
    }
}

function print_mirror_box($countryname, $countrycode, $mirrors, $file = null, $direct_download = false, $homecountry = false) {
?>
    <div class="mirror <?php echo $homecountry ? "homecountry" : ""?>">
            <div class="title"><?php echo $countryname; ?>
                <img alt="<?php echo $countrycode; ?>"
                     height="25"
                     width="45"
                     src="<?php echo $_SERVER['MYSITE'] . '/images/flags/beta/' . strtolower($countrycode) . '.png'; ?>">
            </div>
            <?php foreach($mirrors as $mirror): ?>
<?php
    $url = $mirror["url"];
    $urltitle = substr($url, strpos($url, '//') + 2, -1);
    if ($file) {
        $what = $direct_download ? "this" : "a";
        $url = $mirror["url"] . "get/$file/from/$what/mirror";
    }
?>
            <div class="entry">
                <div class="url"><a href="<?php echo htmlentities($url, ENT_QUOTES | ENT_IGNORE, 'UTF-8'); ?>" title="<?php echo clean($mirror['url']); ?>"><?php echo clean($urltitle); ?></a></div>
                <div class="provider"><a href="<?php echo $mirror['provider_url']; ?>" title="<?php echo clean($mirror['provider_title']); ?>"><?php echo clean($mirror['provider_title']); ?></a></div>
            </div>
            <?php endforeach; ?>
        </div>
<?php
}

// Use this function to write out proper headers on
// pages where the content should not be publicly cached
function header_nocache()
{
    // Only try to send out headers in case
    // those were not sent already
    if (!headers_sent()) {
        header("Cache-Control: private");
        header("Pragma: no-cache");
    }
}


// Compatibility function to fetch data from external source
function fetch_contents($url, $headers = false) {

    $terrors_setting = ini_set('track_errors', true);

    // A mysterious and elusive bug on us3 allows this to work, but the other methods do not
    // So for now, use Curl first (curl++)
    if(function_exists('curl_exec')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HEADER, (int)$headers);
        curl_setopt($ch, CURLOPT_USERAGENT, "php.net");

        $data = curl_exec($ch);
        curl_close($ch);

        if ($headers) {
            $array = explode("\n", $data);
            foreach($array as $line) {
                if (strlen($line)<=2) {
                    return $header;
                } else {
                    $header[] = $line;
                }
            }
        }
        if (!$data) {
            return array(
                'ERROR_NOTE' => 'Unable to find a way to retrieve data with curl',
                'ERROR_LAST' => $php_errormsg,
            );
        }

        return $data;
    }

    if(function_exists('file_get_contents') && ini_get('allow_url_fopen')) {
        $context = null;
        $opts    = array('user_agent'  => 'php.net');

        if (version_compare(PHP_VERSION, '5.1.0', '>')) {
            $context = stream_context_get_default(array('http' => $opts));
        }
        elseif (version_compare(PHP_VERSION, '5.0.0', '>')) {
            $context = stream_context_create(array('http' => $opts));
        }
        if ($context) {
            $data = @file_get_contents($url, false, $context);
        } else {
            $data = @file_get_contents($url, false);
        }

        if ($headers) {
            return $http_response_header;
        }

        if (!$data) {
            return array(
                'ERROR_NOTE' => 'Unable to find a way to retrieve data with file_get_contents',
                'ERROR_LAST' => $php_errormsg,
                'URL'        => $url,
            );
        }

        return $data;
    }

    $array = parse_url($url);
    if(function_exists('fsockopen') && $fd = @fsockopen($array["host"], 80, $errno, $errstr, 15)) {
        $data = "";
        $header = array();
        $body = false;

        $path = $array["path"];
        if (isset($array["query"])) {
            $path .= "?" . $array["query"];
        }
        fputs($fd,"GET {$path} HTTP/1.0\r\n");
        fputs($fd,"Host: {$array["host"]}\r\n");
        fputs($fd,"User-Agent: php.net\r\n");
        fputs($fd,"Connection: close\r\n\r\n");

        while($line = fgets($fd)) { 
            if($body) {
                $data .= $line;
            } elseif(strlen($line)<=2) {
                $body = true;
            } else {
                $header[] = $line;
            }
        }
        fclose($fd);

        if ($headers) {
            return $header;
        }
        if (!$data) {
            return array(
                'ERROR_NOTE' => 'Unable to find a way to retrieve data with fsockopen',
                'ERROR_LAST' => $php_errormsg,
            );
        }

        return $data;
    }

    // TODO: Log if we get here
    // Redirect to www.php.net ?
    return array(
        'ERROR_NOTE' => 'Unable to find a way to retrieve data',
        'ERROR_LAST' => $php_errormsg,
    );
}

// Compatibility function to fetch headers from external source
function fetch_header($url, $header) {
    $headers = array();

    if(function_exists("get_headers") && ini_get('allow_url_fopen')) {
        $headers = get_headers($url, 1);
    } else {
        $data = fetch_contents($url, true);
        if (isset($data["ERROR_NOTE"])) {
            return null;
        }
        foreach($data as $line) {
            if (($pos = strpos($line, ":")) !== false) {
                $headers[substr($line, 0, $pos)] = trim(substr($line, $pos+1));
            } else {
                $headers[0] = trim($line);
            }
        }
    }
    if (!is_array($headers) || empty($headers)) {
        return null;
    }
    if (is_string($header)) {
        $header = strtolower($header);
        $headers = array_change_key_case($headers, CASE_LOWER);
    }

    return isset($headers[$header]) ? $headers[$header] : null;
}

function get_available_sqlites() {	

	$allsqlites = array(1 => 'sqlite', 2 => 'sqlite3', 4 => 'pdo_sqlite', 8 => 'pdo_sqlite2');
	$avail      = 0;

	if (function_exists('sqlite_open')) {
		$avail += 1;
	}
	if (class_exists('sqlite3')) {
		$avail += 2;
	}
	if (method_exists('PDO', 'getavailabledrivers')) {
		foreach (PDO::getavailabledrivers() as $driver) {
			switch ($driver) {
				case 'sqlite':
					$avail += 4;
					break;
				case 'sqlite2':
					$avail += 8;
					break;
			}
		}
	}
	return $avail;
}

// Get all manual prefix search sections
function get_manual_search_sections() {
    return array(
        "", "book.", "ref.", "function.", "class.",
        "features.", "control-structures.", "language.",
        "about.", "faq.",
    );
}

function get_shortname($page) {
    // We can at the very least kill the .php
    $shorturl = substr($page, 0, -4);

    // If its a "root page", we can't shorten it more
    if (strpos($shorturl, "/") === false) {
        return $shorturl;
    }

    // Manual pages get be quite short
    if (strpos($page, "manual/") !== false) {
        $sections = get_manual_search_sections();
        // Kill the first entry (empty)
        array_shift($sections);

        // We can atleast remove manual/xx/
        $shorturl = substr($page, strrpos($page, "/")+1);

        foreach($sections as $section) {
            // If we know this section
            if (strpos($shorturl, $section) === 0) {
                // We can make it even shorter
                return substr($shorturl, strlen($section), -4);
                break;
            }
        }

        // Didn't recognize the section, we better not shorten it at all
        return $page;
    }

    // /conferences/index.php can be shortened to /conferences
    if (strpos($page, "conferences/") !== false) {
        return "conferences";
    }

    return $shorturl;
}

// Guess the current site from what Apache tells us.
// This should be the main name of the mirror (in case
// it works under more then one name). SERVER_NAME is
// the name of the Apache vhost.

if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
    $proto = "http";
} else {
    $proto = "https";
}

if($_SERVER["SERVER_PORT"] != '80' && $_SERVER["SERVER_PORT"] != 443) {
    $MYSITE = $proto . '://' . $_SERVER["SERVER_NAME"] . ':' . (int)$_SERVER["SERVER_PORT"] . '/';
    $msite  =      'http://' . $_SERVER["SERVER_NAME"] . ':' . (int)$_SERVER["SERVER_PORT"] . '/';
} else {
    $MYSITE = $proto . '://' . $_SERVER["SERVER_NAME"] . '/';
    $msite  =      'http://' . $_SERVER["SERVER_NAME"] . '/';
}

// If this site does not exist - it is most likely because
// CC.php.net isn't in this array anymore.
if (!isset($MIRRORS[$MYSITE])) {
    if (isset($MIRRORS[$msite])) {
        $MIRRORS[$MYSITE] = $MIRRORS[$msite];
        unset($MIRRORS[$msite]);
    }
}

if (!isset($MIRRORS[$MYSITE])) {
    // Check if the IP address exists (a fix for the round-robin introduction)
    if (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        // Since it does, we know the servername is fine
        $MYSITE = $proto . '://' . $_SERVER["SERVER_NAME"] . '/';
    } else {

        // Try the hostname [without www]. In case the main name above is
        // not found, we try to find the mirror with the name provided by
        // the browser (in the Host HTTP header).
 
        $msite = str_replace("www.", "", $msite);

        // If the name without www. exists, use it
        if (isset($MIRRORS[$msite])) {
            $MYSITE = str_replace("www.", "", $MYSITE);
            if (!isset($MIRRORS[$MYSITE])) {
                $MIRRORS[$MYSITE] = $MIRRORS[$msite];
                unset($MIRRORS[$msite]);
            }
        }
    }
}

// If the mirror is not registered with this name, provide defaults
// (no country code, no search, no stats, English default language ...)
if (!isset($MIRRORS[$MYSITE])) {
    $MIRRORS[$MYSITE] = array("xx", $MYSITE, FALSE, $MYSITE, MIRROR_VIRTUAL, FALSE, "en", MIRROR_OK);
}

// Override mirror language with local preference
if (isset($_SERVER['MIRROR_LANGUAGE'])) {
    if (isset($LANGUAGES[$_SERVER['MIRROR_LANGUAGE']])) {
        $MIRRORS[$MYSITE][6] = $_SERVER['MIRROR_LANGUAGE'];
    }
}

// Fallback to English in case the language
// set is definitely not supported
if (!isset($LANGUAGES[$MIRRORS[$MYSITE][6]])) {
    $MIRRORS[$MYSITE][6] = "en";
}

// Override central stats information if specified in vhost
if (isset($_SERVER['MIRROR_STATS'])) {
    $MIRRORS[$MYSITE][2] = TRUE;
}

// Provide base href information to make relative links on
// shortcut URL accessed pages work without redirection
if (isset($_SERVER['BASE_PAGE'])) {
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];
} else { unset($_SERVER['BASE_HREF']); }

