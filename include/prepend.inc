<?php // -*- C++ -*-

// $Id$

// Start measuring time spent on page
$page_creation_start = getmicrotime();

// See http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.9
// for cache control header descriptions (used in many places on the site).

// Provide default content-type, charset and language information
// Manual pages will override this, and maybe others too
header("Content-language: en");
header("Content-type: text/html;charset=ISO-8859-1");

// Prevent cross site scripting problems
unset($RSIDEBAR_DATA);
unset($SIDEBAR_DATA);
unset($SEARCH_BASE);
unset($LANG);
unset($COUNTRY);
unset($ONLOAD);
unset($MYPHPNET);

// Load the My PHP.net settings before any includes
myphpnet_load();

// Put the magic quotes setting to $MQ
$MQ = (boolean) get_magic_quotes_gpc();

// Site details (mirror site information)
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/site.inc';

// Choose language used for translated parts
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/langchooser.inc';

// Get country of the user and set it in a cookie
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/ip-to-country.inc';

// Common layout functions
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/layout.inc';

// This file is generated on rsync.php.net and propagated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/last_updated.inc';

// Function used to import request vars to global scope.
// Walks through $array, and imports all values associated
// with elements listed in $keys to the global scope
function import_vars(&$array, $keys)
{
    // Wrong parameters passed
    if (!is_array($array) || !is_array($keys)) { return FALSE; }
    
    // Walk through all requested keys
    foreach ($keys as $keyname) {
        
        // If there is a value in the arary for this key,
        // import it to the global scope (without copying)
        if (isset($array[$keyname])) {
            $GLOBALS[$keyname] = &$array[$keyname];
        }
    }
    
    // Sign of success
    return TRUE;
}

// Unset all variables except common ones we use
// to access request variables and the globals array
// If all files are register_globals = off safe, then
// this function can be called to get rid of all
// variables, even if register_globals = on
function unset_variables()
{
    // Protect some common variables
    $protected = array(
        '_GET', '_POST', '_COOKIE', '_SERVER',
        '_ENV', '_REQUEST', 'GLOBALS',
    );
    
    // Go through all global variables
    foreach ($GLOBALS as $name => $value) {
        if (!in_array($name, $protected)) {
            unset($GLOBALS[$name]);
        }
    }
}

// Utility function used for time measuring
function getmicrotime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
}

// Load in the user preferences
function myphpnet_load()
{
    global $MYPHPNET;

    // Empty the preferences array
    $MYPHPNET = array();
    
    // If we have a cookie, set the values in the array
    if (isset($_COOKIE['MYPHPNET'])) {
        $MYPHPNET = explode(",", $_COOKIE['MYPHPNET']);
    }
}

// Get or set preferred language code
function myphpnet_language($langcode = FALSE)
{
    global $MYPHPNET;

    // Set language code
    if ($langcode) {
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

    // Return code or FALSE
    elseif (isset($MYPHPNET[1])) {
        return $MYPHPNET[1];
    } else { return MYPHPNET_URL_NONE; }
}

// Save user settings in cookie
function myphpnet_save()
{
    global $MYPHPNET;
    
    // Set all the preferred values for a year
    mirror_setcookie("MYPHPNET", join(",", $MYPHPNET), 60*60*24*365);
}
