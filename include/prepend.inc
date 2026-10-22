<?php

use phpweb\UserPreferences;

require_once __DIR__ . '/../src/autoload.php';

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
(function (): void {
    // The presence of CORS headers below depends on the Origin request header,
    // so shared caches must not reuse a response across different origins.
    header("Vary: Origin", false);

    if (!isset($_SERVER["HTTP_ORIGIN"])) {
        return;
    }

    // Browsers send a literal "null" origin for sandboxed iframes, documents
    // loaded from data:/file: URLs and some cross origin redirects. parse_url()
    // reports no host at all for those, so treat them as untrusted.
    $host = parse_url($_SERVER["HTTP_ORIGIN"]);
    $hostname = $host["host"] ?? "";

    $isTrustedOrigin = $hostname !== "" && (
        preg_match('/^(.+\.)?php\.net$/', $hostname) === 1
        || $hostname === ($_SERVER["SERVER_NAME"] ?? "")
    );

    if (!$isTrustedOrigin) {
        // Serve the page normally, only without any CORS headers.
        if (in_array($_SERVER["REQUEST_METHOD"] ?? "GET", ["GET", "HEAD", "OPTIONS"], true)) {
            return;
        }

        // Never respond with an empty body here: that is what ended up cached.
        header("Cache-Control: no-store");
        http_response_code(403);
        exit("Cross-origin requests are not allowed for this endpoint.\n");
    }

    if (isset($host["port"])) {
        $hostname .= ":" . $host["port"];
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
unset($ONLOAD);
unset($LAST_UPDATED);

$userPreferences = new UserPreferences();

// Load the My PHP.net settings before any includes
$userPreferences->load();

// Site details (mirror site information)
include __DIR__ . '/site.inc';

// Choose language used for translated parts
include __DIR__ . '/langchooser.inc';

// Import function to get the real IP address
include __DIR__ . '/ip-to-country.inc';

// Common layout functions
include __DIR__ . '/layout.inc';

// This file is generated on rsync.php.net and propagated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include __DIR__ . '/last_updated.inc';

// -----------------------------------------------------------------------------

// Embed Google Custom Search engine
function google_cse(): void {
    $cse_snippet = <<<EOF
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
    EOF;

    echo $cse_snippet;
}
