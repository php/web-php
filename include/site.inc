<?php // -*- C++ -*-

// $Id$

// Define $MIRRORS array, and some constants
include_once 'mirrors.inc';

// Define $COUNTRIES array
include_once 'countries.inc';

// Define $LANGUAGES array
include_once 'languages.inc';

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
    return $MIRRORS[$site][6];
}

// Returns true if the current (or specified) mirror
// site is registered to have local search support
function have_search($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][5];
}

// Returns true if the current (or specified) mirror
// site is registered to have local stats support
function have_stats($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][2];
}

// Returns the current (or specified)
// mirror site's country code
function mirror_country($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][0];
}

// Returns the current (or specified)
// mirror site's provider's name
function mirror_provider($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][1];
}

// Returns the current (or specified)
// mirror site's provider's URL
function mirror_provider_url($site = FALSE)
{
    global $MIRRORS,$MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][3];
}

// Define mirror type and status constants
// if they are not already defined (BC)
if (!defined("MIRROR_STANDARD")) {

    define('MIRROR_DOWNLOAD', 0);
    define('MIRROR_STANDARD', 1);
    define('MIRROR_SPECIAL',  2);
    define('MIRROR_VIRTUAL',  3);

    define('MIRROR_OK',          0);
    define('MIRROR_NOTACTIVE',   1);
    define('MIRROR_OUTDATED',    2);
    define('MIRROR_DOESNOTWORK', 3);

}

// Returns the current (or specified)
// mirror site's type (use the constants!)
function mirror_type($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][4];
}

// Returns the current (or specified)
// mirror site's status (use the constants!)
function mirror_status($site = FALSE)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return $MIRRORS[$site][7];
}

// Redirect to an URI on this mirror
// site or outside this site
function mirror_redirect($absoluteURI, $remote = FALSE)
{
    global $MYSITE;

    // A local or remote redirect is needed
    if (!$remote) {
        $URI = substr($MYSITE, 0, -1) . $absoluteURI;
    } else {
        $URI = $absoluteURI;
    }

    // Do a redirection, if headers are not sent
    if (!headers_sent()) {
        header("Location: $URI");
    }

    // Always exit (the page is not to be displayed)
    exit;
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
    $MYSITE = 'http://' . preg_replace("!^www\\.!", "", $_SERVER["HTTP_HOST"]) . '/';

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

?>
