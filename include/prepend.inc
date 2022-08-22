<?php // -*- C++ -*-
// Compress all pages, if ext/zlib is available on the mirror
// XXX Deactivated by sas, causes errors towards delivery machines
// ini_set("zlib.output_compression", 1);

// See http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.9
// for cache control header descriptions (used in many places on the site).

// Provide default content-type, charset and language information
// Manual pages will override this, and maybe others too
header("Content-language: en");
header("Content-type: text/html; charset=utf-8");

// Opt out of FLoC
header("Permissions-Policy: interest-cohort=()");

/* Fix Silly Same Origin Policies */
(function () {
    if (!isset($_SERVER["HTTP_ORIGIN"])) {
        return;
    }

    $host = parse_url($_SERVER["HTTP_ORIGIN"]);
    if (strncmp(strrev($host["host"]), strrev("php.net"), strlen("php.net")) != 0) {
        if ($host["host"] != $_SERVER["SERVER_NAME"]) {
            exit(10);
        }
    }
    if (isset($host["port"])) {
        $hostname = $host["host"] . ":" . $host["port"];
    } else {
        $hostname = $host["host"];
    }

    header("Access-Control-Allow-Origin: http://$hostname");
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"])) {
        $headers = $_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"];
        $headers = str_replace(["\r", "\n", "\0"], "", $headers);
        header("Access-Control-Allow-Headers: $headers");
    }
})();

/* Clickjacking workaround. Nothing should be in a frame so it could technically be 'deny'
 * but it doesn't make any difference anyway */
header("X-Frame-Options: SAMEORIGIN");

// Be 100% sure the timezone is set
if (ini_get("date.timezone") === "" && function_exists("date_default_timezone_set")) {
    date_default_timezone_set("UTC");
}

/* Compatibility with the PHP webserver.. */
if (!isset($_SERVER["SERVER_ADDR"])) {
    $_SERVER["SERVER_ADDR"] = "127.0.0.1";
}

// As of PHP 5.3.0 multibyte sequence errors are no longer
// silent. Prior to that version this bitfield does not exist
// so define it to prevent notices on older versions
if (!defined("ENT_IGNORE")) {
    define("ENT_IGNORE", 0);
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

// Site details (mirror site information)
include __DIR__ . '/site.inc';

// Choose language used for translated parts
include __DIR__ . '/langchooser.inc';

// Get country of the user and set it in a cookie
include __DIR__ . '/ip-to-country.inc';

// Common layout functions
include __DIR__ . '/layout.inc';

// This file is generated on rsync.php.net and propagated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include __DIR__ . '/last_updated.inc';

// -----------------------------------------------------------------------------

// Load in the user preferences
function myphpnet_load()
{
    global $MYPHPNET, $MYSITE;

    // Empty the preferences array
    $MYPHPNET = [false, false, "NONE", 0, false];

    if ($MYSITE === 'http://docs.php.net/') {
        $MYPHPNET[4] = true;
    }

    // If we have a cookie, set the values in the array
    if (!empty($_COOKIE['MYPHPNET'])) {
        $MYPHPNET = explode(",", $_COOKIE['MYPHPNET']);
    }

    // Ignore site part, and always use https://www.php.net
    $MYPHPNET[2] = 'https://www.php.net';
}

// Get or set preferred language code
function myphpnet_language($langcode = false)
{
    global $MYPHPNET, $LANGUAGES;

    // Set language code
    if ($langcode && isset($LANGUAGES[$langcode])) {
        $MYPHPNET[0] = $langcode;
    }
    // Return code or FALSE
    elseif (isset($MYPHPNET[0]) && $MYPHPNET[0]) {
        return $MYPHPNET[0];
    }
    return false;
}

const MYPHPNET_URL_NONE = false;
const MYPHPNET_URL_FUNC = 'quickref';
const MYPHPNET_URL_MANUAL = 'manual';

// Set URL search fallback preference
function myphpnet_urlsearch($type = false)
{
    global $MYPHPNET;

    // Set type if specified and if correct
    if ($type && in_array($type, [MYPHPNET_URL_FUNC, MYPHPNET_URL_MANUAL], true)) {
        $MYPHPNET[1] = $type;
    }

    // Return code or NONE
    elseif (isset($MYPHPNET[1]) && !empty($MYPHPNET[1])) {
        return $MYPHPNET[1];
    } else { return MYPHPNET_URL_NONE; }
}

function myphpnet_showug($enable = null) {
    global $MYPHPNET;

    if (isset($_GET["showug"])) {
        $enable = true;
    }

    if ($enable !== null) {
        $MYPHPNET[3] = $enable;
    }

    if (isset($MYPHPNET[3])) {
        return $MYPHPNET[3];
    }

    if ($_SERVER["REQUEST_TIME"] % 10) {
        return true;
    }

    return false;
}

// Save user settings in cookie
function myphpnet_save()
{
    global $MYPHPNET;

    // Fill in values not specified
    for ($i = 0; $i <= 3; $i++) {
        if (!isset($MYPHPNET[$i])) { $MYPHPNET[$i] = false; }
    }

    // Set all the preferred values for a year
    mirror_setcookie("MYPHPNET", join(",", $MYPHPNET), 60 * 60 * 24 * 365);

}

function google_cse() {
?>
<noscript>
  php.net's search functionality requires JavaScript to operate. Please enable
  JavaScript and reload to continue.
</noscript>
<script>
    (function() {
        var cx = '011570197911755000456:fip9wopfz_u';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>
<div class="gcse-search" data-linktarget></div>
<?php
}
