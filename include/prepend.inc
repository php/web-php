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

// Backward compatible array creation. After this point, the
// PHP 4.1.0+ arrays can be used to access variables coming
// from outside PHP. But it should be noted that these variables
// are not necessarily superglobals, so they need to be global-ed!
if (!isset($_SERVER)) {
    $_GET     = &$HTTP_GET_VARS;
    $_POST    = &$HTTP_POST_VARS;
    $_ENV     = &$HTTP_ENV_VARS;
    $_SERVER  = &$HTTP_SERVER_VARS;
    $_COOKIE  = &$HTTP_COOKIE_VARS;
    $_REQUEST = array_merge($_GET, $_POST, $_COOKIE);
}

// Put the magic quotes setting to $MQ
$MQ = (boolean) get_magic_quotes_gpc();
        
// Site details (mirror site information)
include_once 'site.inc';

// Choose language used for translated parts
include_once 'langchooser.inc';

// Get country of the user and set it in a cookie
include_once 'ip-to-country.inc';

// Common layout functions
include_once 'layout.inc';

// This file is generated on rsync.php.net and propogated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include_once 'last_updated.inc';

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
