<?php // -*- C++ -*-

// Define some constants, and $MIRRORS array
// Mirror type constants
const MIRROR_DOWNLOAD = 0;
const MIRROR_STANDARD = 1;
const MIRROR_SPECIAL = 2;
const MIRROR_VIRTUAL = 3;

// Mirror status constants
const MIRROR_OK = 0;
const MIRROR_NOTACTIVE = 1;
const MIRROR_OUTDATED = 2;
const MIRROR_DOESNOTWORK = 3;

$MIRRORS = [
    "https://www.php.net/" => [
        "DEU", "MyraCloud", false,
        "https://myracloud.com/en/", MIRROR_SPECIAL, true,
        "en", MIRROR_OK],
];

/**
 * @var array<string, string> $COUNTRIES
 */
$COUNTRIES = include __DIR__ . '/countries.inc';

// Define $LANGUAGES array
include __DIR__ . '/languages.inc';

// Returns true if the current (or specified)
// site is the primary mirror site
function is_primary_site($site = false)
{
    global $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return ($site == "https://www.php.net/" );
}

// Returns true if the current (or specified)
// mirror site is an official mirror site
function is_official_mirror($site = false)
{
    return (mirror_type($site) != MIRROR_VIRTUAL);
}

// Returns the current (or specified)
// mirror site's default language
function default_language($site = false)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][6] : false);
}

// Returns true if the current (or specified) mirror
// site is registered to have local search support
function have_search($site = false)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }
    return (isset($MIRRORS[$site]) ? $MIRRORS[$site][5] : false);
}

// Returns the current (or specified)
// mirror site's provider's name
function mirror_provider($site = false)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
       return $MIRRORS[$site][1];
    }

    if (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
       return $MIRRORS[$_SERVER['SERVER_ADDR']][1];
    }

    return false;
}

// Returns the current (or specified)
// mirror site's provider's URL
function mirror_provider_url($site = false)
{
    global $MIRRORS,$MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
        return $MIRRORS[$site][3];
    }

    if (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        return $MIRRORS[$_SERVER['SERVER_ADDR']][3];
    }

    return false;
}

// Returns the current (or specified)
// mirror site's type (use the constants!)
function mirror_type($site = false)
{
    global $MIRRORS, $MYSITE;
    if (!$site) { $site = $MYSITE; }

    if (isset($MIRRORS[$site])) {
        return $MIRRORS[$site][4];
    }

    if (isset($MIRRORS[$_SERVER['SERVER_ADDR']])) {
        return $MIRRORS[$_SERVER['SERVER_ADDR']][4];
    }

    return false;
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
        }

        return setcookie($name, $content, time() + $exptime, '/');
    }

    return false;
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

function get_available_sqlites() {

    $allsqlites = [1 => 'sqlite', 2 => 'sqlite3', 4 => 'pdo_sqlite', 8 => 'pdo_sqlite2'];
    $avail = 0;

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
    return [
        "", "book.", "ref.", "function.", "class.",
        "features.", "control-structures.", "language.",
        "about.", "faq.",
    ];
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
        $shorturl = substr($page, strrpos($page, "/") + 1);

        foreach ($sections as $section) {
            // If we know this section
            if (strpos($shorturl, $section) === 0) {
                // We can make it even shorter
                return substr($shorturl, strlen($section), -4);
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

if ($_SERVER["SERVER_PORT"] != '80' && $_SERVER["SERVER_PORT"] != 443) {
    $MYSITE = $proto . '://' . $_SERVER["SERVER_NAME"] . ':' . (int)$_SERVER["SERVER_PORT"] . '/';
    $msite = 'http://' . $_SERVER["SERVER_NAME"] . ':' . (int)$_SERVER["SERVER_PORT"] . '/';
} else {
    $MYSITE = $proto . '://' . $_SERVER["SERVER_NAME"] . '/';
    $msite = 'https://' . $_SERVER["SERVER_NAME"] . '/';
}

// If the mirror is not registered with this name, provide defaults
// (no country code, no search, no stats, English default language ...)
if (!isset($MIRRORS[$MYSITE])) {
    $MIRRORS[$MYSITE] = ["xx", $MYSITE, false, $MYSITE, MIRROR_VIRTUAL, false, "en", MIRROR_OK];
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

// Provide base href information to make relative links on
// shortcut URL accessed pages work without redirection
if (isset($_SERVER['BASE_PAGE'])) {
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];
} else { unset($_SERVER['BASE_HREF']); }
