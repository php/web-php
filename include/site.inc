<?php

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
    define('MIRROR_SPECIAL', 2);

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

// Guess the current site from what Apache tells us
$MYSITE = 'http://' . $_SERVER["SERVER_NAME"] . '/'; 

// If this site does not exist
if (!isset($MIRRORS[$MYSITE])) {

    // Try the hostname [without www]
    $MYSITE = 'http://' . ereg_replace("^www\\.", "", $_SERVER["HTTP_HOST"]) . '/';

    // If the mirror is not registered with this name, provide defaults
    // (no country code, no search, no stats, English default language ...)
    if (!isset($MIRRORS[$MYSITE])) {
        $MIRRORS[$MYSITE] = array("xx", $MYSITE, FALSE, $MYSITE, MIRROR_SPECIAL, FALSE, "en", MIRROR_OK);
    }

}

?>
