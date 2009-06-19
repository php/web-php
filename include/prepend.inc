<?php // -*- C++ -*-

// $Id$

// See http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.9
// for cache control header descriptions (used in many places on the site).

// Provide default content-type, charset and language information
// Manual pages will override this, and maybe others too
header("Content-language: en");
header("Content-type: text/html; charset=utf-8");

// Be 100% sure the timezone is set
if (ini_get("date.timezone") === "" && function_exists("date_default_timezone_set")) {
    date_default_timezone_set("UTC");
}

// Prevent cross site scripting problems
unset($RSIDEBAR_DATA);
unset($SIDEBAR_DATA);
unset($SEARCH_BASE);
unset($LANG);
unset($COUNTRY);
unset($ONLOAD);
unset($MYPHPNET);
unset($LAST_UPDATED);

// Load the My PHP.net settings before any includes
myphpnet_load();

// TODO: Remove MQ dependencies from phpweb
$MQ = get_magic_quotes_gpc();
if (get_magic_quotes_runtime()) {
    @set_magic_quotes_runtime(0);
}

// Check for APC support
$APC = function_exists('apc_store');

// Site details (mirror site information)
include $_SERVER['DOCUMENT_ROOT'] . '/include/site.inc';

// Choose language used for translated parts
include $_SERVER['DOCUMENT_ROOT'] . '/include/langchooser.inc';

// Get country of the user and set it in a cookie
include $_SERVER['DOCUMENT_ROOT'] . '/include/ip-to-country.inc';

// Common layout functions
include $_SERVER['DOCUMENT_ROOT'] . '/include/layout.inc';

// This file is generated on rsync.php.net and propagated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include $_SERVER['DOCUMENT_ROOT'] . '/include/last_updated.inc';

// -----------------------------------------------------------------------------

// Load in the user preferences
function myphpnet_load()
{
    global $MYPHPNET;

    // Empty the preferences array
    $MYPHPNET = array(FALSE, FALSE, "NONE", 0);

    // If we have a cookie, set the values in the array
    if (!empty($_COOKIE['MYPHPNET'])) {
        $MYPHPNET = explode(",", $_COOKIE['MYPHPNET']);
    }
}

// Get or set preferred language code
function myphpnet_language($langcode = FALSE)
{
    global $MYPHPNET, $LANGUAGES;

    // Set language code
    if ($langcode && isset($LANGUAGES[$langcode])) {
        $MYPHPNET[0] = $langcode;
    }
    // Return code or FALSE
    elseif (isset($MYPHPNET[0])) {
        return $MYPHPNET[0];
    }
    else { return FALSE; }
}

define("MYPHPNET_URL_NONE", FALSE);
define("MYPHPNET_URL_FUNC", 'quickref');
define("MYPHPNET_URL_MANUAL", 'manual');

// Set URL search fallback preference
function myphpnet_urlsearch($type = FALSE)
{
    global $MYPHPNET;

    // Set type if specified and if correct
    if ($type && in_array($type, array(MYPHPNET_URL_FUNC, MYPHPNET_URL_MANUAL))) {
        $MYPHPNET[1] = $type;
    }

    // Return code or NONE
    elseif (isset($MYPHPNET[1]) && !empty($MYPHPNET[1])) {
        return $MYPHPNET[1];
    } else { return MYPHPNET_URL_NONE; }
}

// Set mirror site redirection
function myphpnet_mirror($murl = FALSE)
{
    global $MYPHPNET;

    // Set mirror URL if specified and if correct
    if ($murl && ($murl == "AUTO" || mirror_status($murl) == MIRROR_OK)) {
        $MYPHPNET[2] = $murl;
    }

    // Return code or NONE
    elseif (isset($MYPHPNET[2])) {
        return $MYPHPNET[2];
    } else { return "NONE"; }
}

// Set suggestion hiding preference
function myphpnet_hidesuggest($hide = FALSE)
{
    global $MYPHPNET;

    // Set hiding preference, or return with value
    if (is_numeric($hide)) {
        $MYPHPNET[3] = $hide;
    }
    elseif (isset($MYPHPNET[3])) {
        return $MYPHPNET[3];
    } else {
        return 0;
    }
}

// Save user settings in cookie
function myphpnet_save()
{
    global $MYPHPNET;

    // Fill in values not specified
    for ($i = 0; $i <= 3; $i++) {
        if (!isset($MYPHPNET[$i])) { $MYPHPNET[$i] = FALSE; }
    }

    // Set all the preferred values for a year
    mirror_setcookie("MYPHPNET", join(",", $MYPHPNET), 60*60*24*365);
}
