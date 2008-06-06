<?php // -*- C++ -*-

// $Id$

// Define $MIRRORS array, and some constants
include $_SERVER['DOCUMENT_ROOT'] . '/include/mirrors.inc';

// Define $COUNTRIES array
include $_SERVER['DOCUMENT_ROOT'] . '/include/countries.inc';

// Define $LANGUAGES array
include $_SERVER['DOCUMENT_ROOT'] . '/include/languages.inc';

// Returns true if the current (or specified)
// site is the primary mirror site
function is_primary_site($site = FALSE)
{
    global $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $site == "http://www.php.net/";
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
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][1] : FALSE);
}

// Returns the current (or specified)
// mirror site's provider's URL
function mirror_provider_url($site = FALSE)
{
    global $MIRRORS,$MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][3] : FALSE);
}

// Returns the current (or specified)
// mirror site's type (use the constants!)
function mirror_type($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][4] : FALSE);
}

// Returns the current (or specified)
// mirror site's status (use the constants!)
function mirror_status($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][7] : FALSE);
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
    if(function_exists('file_get_contents') && ini_get('allow_url_fopen')) {
        $opts = array('user_agent'  => 'php.net',);

        stream_context_get_default(array("http" => $opts));
        $data = @file_get_contents($url);
        if ($headers) {
            return $http_response_header;
        }

        return $data;
    }

    // Let's find another way
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

        return $data;
    }

    // Redirect to www.php.net ?
    return array("ERROR" => "Unable to find a way to retrieve data");
}

// Compatibility function to fetch headers from external source
function fetch_header($url, $header) {
    $headers = array();

    if(function_exists("get_headers") && ini_get('allow_url_fopen')) {
        $headers = get_headers($url, 1);
    } else {
        $data = fetch_contents($url, true);
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
        $headers = array_change_key_case($headers, CASE_LOWER);
    }

    return isset($headers[$header]) ? $headers[$header] : null;
}


// Guess the current site from what Apache tells us.
// This should be the main name of the mirror (in case
// it works under more then one name). SERVER_NAME is
// the name of the Apache vhost.
$MYSITE = 'http://' . $_SERVER["SERVER_NAME"] . '/'; 

// If this site does not exist
if (!isset($MIRRORS[$MYSITE])) {

    // Try the hostname [without www]. In case the main name above is
    // not found, we try to find the mirror with the name provided by
    // the browser (in the Host HTTP header).
    $MYSITE = 'http://' . preg_replace("!^www\\.!", "", $_SERVER["SERVER_NAME"]) . '/';

    // If the mirror is not registered with this name, provide defaults
    // (no country code, no search, no stats, English default language ...)
    if (!isset($MIRRORS[$MYSITE])) {
        $MIRRORS[$MYSITE] = array("xx", $MYSITE, FALSE, $MYSITE, MIRROR_VIRTUAL, FALSE, "en", MIRROR_OK);
    }

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

