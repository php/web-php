<?php
/*

 This script handles all 401, 403 and 404 error redirects,
 and some directory requests (like /images). Uses the
 preferred language setting and the REQUEST_URI to guess what
 page should be displayed. In case there is no page that can
 be displayed, the user is redirected to a search page.

*/

use phpweb\I18n\Languages;
use phpweb\UserPreferences;

// Ensure that our environment is set up
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/errors.inc';

// Get URI for this request, strip leading slash
// See langchooser.inc for more info on STRIPPED_URI
$URI = substr($_SERVER['STRIPPED_URI'], 1);
$uriParts = explode('?', $URI, 2);
$URI = $uriParts[0];
$queryString = isset($uriParts[1]) ? html_entity_decode($uriParts[1], ENT_QUOTES, 'UTF-8') : '';

// ============================================================================
// Mozilla Search Sidebar plugin resource file handling (need to be mirror
// dependent, so the search results will show up in the sidebar)
if ($URI == 'phpnetsearch.src') {
    status_header(200);
    include_once __DIR__ . '/include/mozsearch.inc';
    exit;
}
// FIXME: Nuke the old firefox search plugin
if ($URI == 'phpnetimprovedsearch.src') {
    status_header(200);
    include_once __DIR__ . '/include/mozopensearch.inc';
    exit;
}

// ============================================================================
// BC: handle bugs.php moved completely to bugs.php.net
if ($URI === 'bugs.php' && $queryString !== '') {
    mirror_redirect("https://bugs.php.net/?$queryString");
}

// ============================================================================
// FC: handle advisories
if (preg_match("!^security/advisories/PHPSA-(\\d+)\\.php$!", $URI, $array)) {
    status_header(200);
    $_GET["id"] = $array[1];
    include_once __DIR__ . '/security/index.php';
    exit;
}

// ============================================================================
// Omit query string from URL and urldecode special chars
$URI = urldecode(preg_replace("!(\\?.*$)!", "", $URI));

// ============================================================================
// An empty URI is useless at this point, so let's give them the search page
if (empty($URI)) {
    mirror_redirect("/search.php");
}

// ============================================================================
// Perform a redirect for manual figures, other images display a 404 automatically
if (preg_match("!^manual/(\\w+)/(print|printwn)/figures/(.+)$!", $URI, $parts)) {
    mirror_redirect("/manual/$parts[1]/figures/$parts[3]");
} elseif (preg_match("!\\.(pdf|gif|jpg|png)$!i", $URI)) {
    error_404();
}

// ============================================================================
// BC: handle .php3 files that were renamed to .php
if (preg_match("!(.*\\.php)3$!", $URI, $array)) {
    mirror_redirect("/$array[1]");
}

// ============================================================================
// BC: handle moving english manual down into its own directory (also supports
//     default language manual accessibility on mirror sites through /manual/filename)
// @todo do we rely on this? how about removing it...
if (preg_match("!^manual/([^/]*)$!", $URI, $array)) {
    if (!isset(Languages::INACTIVE_ONLINE_LANGUAGES[$array[1]])) {
        mirror_redirect("/manual/$LANG/$array[1]");
    }
} elseif (preg_match("!^manual/html/([^/]+)$!", $URI, $array)) {
    $array[1] = preg_replace("!.html$!", ".php", $array[1]);
    mirror_redirect("/manual/$LANG/$array[1]");
}

// ============================================================================
// BC: News archive moved to subfolder
if (preg_match("!^news-(\\d+)(\\.|$)!", $URI, $array)) {
    mirror_redirect("/archive/$array[1].php");
}

// ============================================================================
// BC: Release files moved to subfolder
if (preg_match("!^release_([^\\.]+)(\\.php$|$)!", $URI, $array)) {
    mirror_redirect("/releases/$array[1].php");
}

// ============================================================================
// BC: Printer friendly manual page handling was separate previously, but we
// only need to redirect the old URLs now. Our pages are now printer friendly
// by design.
if (preg_match("!^manual/(\\w+)/(print|printwn|html)((/.+)|$)!", $URI, $array)) {
    $array[3] = preg_replace("!.html$!", ".php", $array[3]);
    mirror_redirect("/manual/$array[1]$array[3]");
}

// ============================================================================
// If someone is looking for something in distributions/* and it isn't there,
// send them to the /releases page since that is likely to be most helpful.
if (preg_match("!^distributions/.*!", $URI, $array)) {
    status_header(404);
    include_once __DIR__ . "/releases/index.php";
}

// ============================================================================
// The trailing slash only causes problems from now on
$URI = rtrim($URI, '/');

// ============================================================================
// Some nice URLs for getting something for download
if (preg_match("!^get/([^/]+)$!", $URI, $what)) {
    switch ($what[1]) {
        case "php":
            $URI = "downloads";
            break;
        case "docs": // intentional
        case "documentation":
            $URI = "download-docs";
            break;
    }
}

// ============================================================================
// Nice URLs for download files, so wget works completely well with download links
if (preg_match("!^get/([^/]+)/from/([^/]+)(/mirror)?$!", $URI, $dlinfo)) {
    $df = $dlinfo[1];
    if (strpos($df, "7-LATEST") !== false) {
        include_once __DIR__ . "/include/version.inc";
        [$latest] = release_get_latest();
        $df = str_replace("7-LATEST", $latest, $df);
    }

    $mr = "https://www.php.net/";

    // Check if that mirror really exists if not, bail out
    if (!isset($MIRRORS[$mr])) {
        error_nomirror($mr);
        exit;
    }

    // Start the download process
    include __DIR__ . "/include/do-download.inc";
    $filename = get_actual_download_file($df);
    if ($filename) {
        status_header(200);
        download_file($mr, $filename);
    } else {
        status_header(404);
        /* The file didn't exist on this server.. ask the user to pick another mirror */
        include __DIR__ . "/include/get-download.inc";
    }
    exit;
}

// php.net/42 --> likely a bug number
if (is_numeric($URI)) {
    mirror_redirect("https://bugs.php.net/bug.php?id=$URI");
}

// php.net/GH-123 -> php-src GH issue #123
if (preg_match('/^GH-(\d+)$/', $URI, $matches)) {
    mirror_redirect("https://github.com/php/php-src/issues/" . $matches[1]);
}

// php.net/supported-versions.PHP -> supported-versions.php
if ($URI == 'supported-versions.PHP') {
    mirror_redirect("https://www.php.net/supported-versions.php");
}


// ============================================================================
// Redirect if the entered URI was a PHP page name (except some pages,
// which we display in the mirror's language or the explicitly specified
// language [see below])
if (!in_array($URI, ['mirror-info', 'error', 'mod'], true) &&
    file_exists($_SERVER['DOCUMENT_ROOT'] . "/$URI.php")) {
    mirror_redirect("/$URI.php");
}

// Work with lowercased URI from now
$URI = strtolower($URI);

// ============================================================================
// Doc-page redirect map generated by phd from doc-en/redirects.xml,
// shipped as manual/en/redirects.json.
//   'shortcut'  - bare URI  (php.net/{from})               -> /manual/{LANG}/{to}.php
//   'in_manual' - manual URI (/manual/{lang}/{from}[.php]) -> /manual/{lang}/{to}.php
//   'both'      - matches at either entry point

$docRedirects = is_file(__DIR__ . '/manual/en/redirects.json')
    ? json_decode(file_get_contents(__DIR__ . '/manual/en/redirects.json'), true)
    : ['shortcut' => [], 'in_manual' => [], 'both' => []];

if (preg_match("!^manual/([^/]+)/([^/]+?)(?:\.php)?$!", $URI, $match)) {
    $target = $docRedirects['both'][$match[2]] ?? $docRedirects['in_manual'][$match[2]] ?? null;
    if ($target !== null) {
        [$id, $anchor] = array_pad(explode('#', $target, 2), 2, '');
        status_header(301);
        mirror_redirect("/manual/$match[1]/$id.php" . ($anchor !== '' ? "#$anchor" : ''));
    }
}

// Bare-URI shortcut lookup. Try three forms in order
// 1. raw lowercased $URI ("if", "mysqli_get_client_version")
// 2. underscore -> hyphen $term ("short-open-tag" via /short_open_tag)
// 3. $-stripped $term ("-server" via /$_SERVER)
$target = null;
$term = str_replace('_', '-', $URI);
foreach ([$URI, $term, ltrim($term, '$')] as $key) {
    if (isset($docRedirects['both'][$key])) {
        $target = $docRedirects['both'][$key];
        break;
    }
    if (isset($docRedirects['shortcut'][$key])) {
        $target = $docRedirects['shortcut'][$key];
        break;
    }
}

if ($target !== null) {
    [$id, $anchor] = array_pad(explode('#', $target, 2), 2, '');
    $url = "/manual/$LANG/$id.php";
    if ($queryString !== '') {
        $url .= '?' . $queryString;
    }
    if ($anchor !== '') {
        $url .= "#$anchor";
    }
    status_header(301);
    mirror_redirect($url);
}

// ============================================================================
// Site-level shortcuts to non-manual pages and external URL keys.
// (Doc-page shortcuts live in doc-en/redirects.xml.)
$site_aliases = [
    # PHP page shortcuts
    "download" => "downloads",
    "getphp" => "downloads",
    "getdocs" => "download-docs",
    "documentation" => "docs",
    "mailinglists" => "mailing-lists",
    "mailinglist" => "mailing-lists",
    "changelog" => "ChangeLog-8",
    "gethelp" => "support",
    "help" => "support",
    "unsubscribe" => "unsub",
    "subscribe" => "mailing-lists",
    "logos" => "download-logos",

    # BC extensions
    "bugs.php" => "bugs",       // routed through $external_redirects
    "bugstats.php" => "bugstats",   // routed through $external_redirects
    "docs-echm.php" => "download-docs",
    "links" => "support",
    "links.php" => "support",

    # News / releases / software
    "news.php" => "archive/index",
    "news_php_5_0_0b2.txt" => "ChangeLog-5",
    "news_php_5_0_0b3.txt" => "ChangeLog-5",
    "software/index.php" => "software",
    "releases.php" => "releases/index",
    "release-candidates.php" => "pre-release-builds",
    "changelog-8.php" => "ChangeLog-8",

    # Mirroring / VCS legacy
    "readme.mirror" => "mirroring",
    "cvsup" => "mirroring",
    "anoncvs.php" => "git",
    "cvs-php.php" => "git-php",
    "svn" => "git",
    "svn.php" => "git",
    "svn-php" => "git-php",
    "svn-php.php" => "git-php",

    # External shortcut aliases (resolved via $external_redirects)
    "dochowto" => "phpdochowto",

    # Removed pages
    "tips" => "urlhowto",
    "tips.php" => "urlhowto",
];

$external_redirects = [
    "php4news" => "https://github.com/php/php-src/raw/PHP-4.4/NEWS",
    "php5news" => "https://github.com/php/php-src/raw/PHP-5.6/NEWS",
    "php53news" => "https://github.com/php/php-src/raw/PHP-5.3/NEWS",
    "php54news" => "https://github.com/php/php-src/raw/PHP-5.4/NEWS",
    "php55news" => "https://github.com/php/php-src/raw/PHP-5.5/NEWS",
    "php56news" => "https://github.com/php/php-src/raw/PHP-5.6/NEWS",
    "php70news" => "https://github.com/php/php-src/raw/PHP-7.0/NEWS",
    "php71news" => "https://github.com/php/php-src/raw/PHP-7.1/NEWS",
    "php72news" => "https://github.com/php/php-src/raw/PHP-7.2/NEWS",
    "php73news" => "https://github.com/php/php-src/raw/PHP-7.3/NEWS",
    "php74news" => "https://github.com/php/php-src/raw/PHP-7.4/NEWS",
    "php80news" => "https://github.com/php/php-src/raw/PHP-8.0/NEWS",
    "phptrunknews" => "https://github.com/php/php-src/raw/master/NEWS",
    "pear" => "https://pear.php.net/",
    "bugs" => "https://bugs.php.net/",
    "bugstats" => "https://bugs.php.net/stats.php",
    "phpdochowto" => "https://doc.php.net/guide/",
    "rev" => "https://doc.php.net/revcheck.php?p=graph&lang=$LANG",
    "release/5_3_0.php" => "/releases/5_3_0.php", // PHP 5.3.0 release announcement had a typo
    "ideas.php" => "https://wiki.php.net/ideas", // BC
    "releases.atom" => "/releases/feed.php", // BC, No need to pre-generate it
    "spec" => "https://github.com/php/php-langspec",
    "sunglasses" => "https://www.youtube.com/watch?v=dQw4w9WgXcQ", // Temporary easter egg for bug#66144
];

// ============================================================================
// "Rewrite" the URL, if it was a site-level shortcut. If the target
// resolves to a real .php in web-php, redirect immediately; otherwise
// mutate $URI and fall through so $external_redirects can catch it.

if (isset($site_aliases[$URI])) {
    $URI = $site_aliases[$URI];
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/$URI.php")) {
        $target = "/$URI.php";
        if ($queryString !== '') {
            $target .= (strpos($target, '?') === false ? '?' : '&') . $queryString;
        }
        mirror_redirect($target);
    }
}

// ============================================================================
// Execute external redirect if a rule exists for the URI
if (isset($external_redirects[$URI])) {
    mirror_redirect($external_redirects[$URI]);
}

// Temporary hack for mirror-info, until all the pages
// will be capable of being included from anywhere
if ($URI == 'mirror-info') {
    status_header(200);
    include_once __DIR__ . "/$URI.php";
    exit;
}

// ============================================================================
// Try to find the page using the preferred language as a manual page
include_once __DIR__ . "/include/manual-lookup.inc";
$try = find_manual_page($LANG, $URI);
if ($try) {
    status_header(200);
    include_once __DIR__ . $try;
    exit;
}
// BC. The class methods are now classname.methodname
if (preg_match("!^manual/(.+)/function\.(.+)-(.+).php$!", $URI, $array)) {
    $try = find_manual_page($array[1], $array[2] . "." . $array[3]);
    if ($try) {
        status_header(301);
        mirror_redirect($try);
        exit;
    }
}

// ============================================================================
// For manual pages for inactive languages, point visitors to the English page
if (preg_match("!^manual/([^/]+)/([^/]+).php$!", $URI, $match) &&
    isset(Languages::INACTIVE_ONLINE_LANGUAGES[$match[1]])) {
    $try = find_manual_page("en", $match[2]);
    if ($try) {
        error_inactive_manual_page(Languages::INACTIVE_ONLINE_LANGUAGES[$match[1]], $try);
    }
}

// ============================================================================
// 404 page for manual pages (eg. not built language)
if (strpos($URI, "manual/") === 0) {
    $legacy_manual_urls = get_legacy_manual_urls($URI);
    if (count($legacy_manual_urls) > 0) {
        fallback_to_legacy_manuals($legacy_manual_urls);
    }
    error_404_manual();
}

// ============================================================================
// If no match was found till this point, the last action is to start a
// search with the URI the user typed in
$fallback = ($userPreferences->searchType === UserPreferences::URL_MANUAL ? "404manual" : "404quickref");
mirror_redirect(
    '/search.php?show=' . $fallback . '&lang=' . urlencode($LANG) .
    '&pattern=' . substr($_SERVER['REQUEST_URI'], 1),
);
