<?php

// $Id$

/*

 This script handles all 401, 403 and 404 error redirects,
 and some directory requests (like /images). Uses the
 preferred language setting and the REQUEST_URI to guess what
 page should be displayed. In case there is no page that can
 be displayed, the user is redirected to a search page.

*/

// Ensure that our environment is set up
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/errors.inc';

// Get URI for this request, strip leading slash
// See langchooser.inc for more info on STRIPPED_URI
$URI = substr($_SERVER['STRIPPED_URI'], 1);

// ============================================================================
// Mozilla Search Sidebar plugin resource file handling (need to be mirror
// dependent, so the search results will show up in the sidebar)
if ($URI == 'phpnetsearch.src') {
    status_header(200);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/include/mozsearch.inc';
    exit;
}

// ============================================================================
// BC: handle bugs.php moved completely to bugs.php.net
if (preg_match("!^bugs.php\\?(.+)$!", $URI, $array)) {
    mirror_redirect("http://bugs.php.net/?$array[1]");
}

// ============================================================================
// Omit query string from URL and urldecode special chars
$URI = urldecode(preg_replace("!(\\?.*$)!", "", $URI));

// ============================================================================
// Perform a redirect for manual figures, other images display a 404 automatically
if (preg_match("!^manual/(\\w+)/(print|printwn|tableless)/figures/(.+)$!", $URI, $parts)) {
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
//     default language manual accessibilty on mirror sites through /manual/filename)
if (preg_match("!^manual(/[^/]*)$!", $URI, $array)) {
    // Special case for mirror checking
    if ($array[1] == 'mirror-info') {
        mirror_redirect("/manual/mirror-info.php");
    }
    mirror_redirect("/manual/$LANG$array[1]");
} elseif (preg_match("!^manual/html/([^/]+)$!", $URI, $array)) {
    $array[1] = preg_replace("!.html$!", ".php", $array[1]);
    mirror_redirect("/manual/$LANG/print/$array[1]");
}

// ============================================================================
// BC: handle documentation howto moved to the doc.php.net server
// (redirect to index page)
if (preg_match("!^manual/howto/!", $URI, $array)) {
    mirror_redirect("http://doc.php.net/php/dochowto/");
}

// ============================================================================
// Printer friendly manual page handling. It's important that this is included,
// and not redirected, as this way all relative URL's will retain their meaning
// and point to pages relative to the print dir (which is nonexistent)
// We need to override the 404 status in these cases too.
if (preg_match("!^manual/(\\w+)/(print|printwn|tableless)/(.+\\.php)$!", $URI, $parts) &&
    @file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/$parts[3]")) {
    status_header(200);
    if (in_array($parts[2], array('print', 'printwn'))) {
        $PRINT_PAGE = TRUE;
        if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    } else {
        $NOTABLES = TRUE;
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/$parts[3]";
    exit;
}

// BC: for old HTML directory (.html extension was used in that)
elseif (preg_match("!^manual/(\\w+)/html/(.+)\\.(html|php)$!", $URI, $parts) &&
        @file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/$parts[2].php")) {
    status_header(200);
    $PRINT_PAGE = TRUE;
    include $_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/$parts[2].php";
    exit;
}

// The index file needs to be handled in a special way
elseif (preg_match("!^manual/(\\w+)/(print|printwn|html|tableless)(/)?$!", $URI, $parts) &&
        @file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/index.php")) {
    status_header(200);
    if (in_array($parts[2], array('print', 'printwn', 'html'))) {
        $PRINT_PAGE = TRUE;
        if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    } else {
        $NOTABLE = TRUE;
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/manual/$parts[1]/index.php";
    exit;
}

// ============================================================================
// The trailing slash only causes problems from now on
$URI = preg_replace('!/+$!', '', $URI);

// ============================================================================
// Some nice URLs for getting something for download
if (preg_match("!^get/([^/]+)$!", $URI, $what)) {
    switch ($what[1]) {
        case "php"           : $URI = "downloads"; break;
        case "docs"          : // intentional
        case "documentation" : $URI = "download-docs"; break;
        case "dochowto"      : // intentional
        case "phpdochowto"   : $URI = "getdochowto"; break;
    }
}


// ============================================================================
// Nice URLs for download files, so wget works completely well with download links
if (preg_match("!^get/([^/]+)/from/([^/]+)(/mirror)?$!", $URI, $dlinfo)) {
    
    $df = $dlinfo[1];
    
    // Mirror selection page
    if ($dlinfo[2] == "a") {
        status_header(200);
        include_once $_SERVER['DOCUMENT_ROOT'] . "/include/get-download.inc";
        exit;
    }
    
    // The same mirror is selected
    if ($dlinfo[2] == "this") { $mr = $MYSITE; }
    
    // Some other mirror is selected
    else { $mr = "http://{$dlinfo[2]}/"; }
    
    // Start the download process
    status_header(200);
    include $_SERVER['DOCUMENT_ROOT'] . "/include/do-download.inc";
    download_file($mr, $df);
    exit;
}

// Work with lowercased URI from now
$URI = strtolower($URI);

// ============================================================================
// Major manual page modifications (need to handle shortcuts and pages in all languages)
// Used permanent HTTP redirects, so search engines will be able to pick up the correct
// new URLs for these pages.
$manual_page_moves = array(
    // entry point changed
    'installation'               => 'install',
    
    // was splitted among platforms (don't know where to redirect)
    'install.apache'             => 'install', 
    'install.apache2'            => 'install',
    'install.netscape-enterprise'=> 'install',
    'install.otherhttpd'         => 'install',
    
    // moved to platform sections
    'install.caudium'            => 'install.unix.caudium',
    'install.commandline'        => 'install.unix.commandline',
    'install.fhttpd'             => 'install.unix.fhttpd',
    'install.hpux'               => 'install.unix.hpux',
    'install.iis'                => 'install.windows.iis',
    'install.linux'              => 'install.unix',
    'install.omnihttpd'          => 'install.windows.omnihttpd',
    'install.openbsd'            => 'install.unix.openbsd',
    'install.sambar'             => 'install.windows.sambar',
    'install.solaris'            => 'install.unix.solaris',
    'install.xitami'             => 'install.windows.xitami',
);

if (isset($manual_page_moves[$URI])) {
    status_header(301);
    mirror_redirect("/" . $manual_page_moves[$URI]);
} elseif (preg_match("!^manual/([^/]+)/([^/]+).php$!", $URI, $match) &&
          isset($manual_page_moves[$match[2]])) {
    status_header(301);
    mirror_redirect("/manual/$match[1]/" . $manual_page_moves[$match[2]] . ".php");
}

// ============================================================================
// Define shortcuts for PHP files, manual pages and external redirects
$uri_aliases = array (

    # PHP page shortcuts
    "download"      => "downloads",
    "getphp"        => "downloads",
    "getdocs"       => "download-docs",
    "documentation" => "docs",
    "mailinglists"  => "mailing-lists",
    "mailinglist"   => "mailing-lists",
    "changelog"     => "ChangeLog-4",
    "gethelp"       => "support",
    "help"          => "support",
    "unsubscribe"   => "unsub",
    "subscribe"     => "mailing-lists",
    "logos"         => "download-logos",

    # manual shortcuts
    "ini"          => "configuration",

    "intro"        => "introduction",
    "whatis"       => "introduction",
    "whatisphp"    => "introduction",
    "what_is_php"  => "introduction",

    "windows"      => "install.windows",
    "win32"        => "install.windows",

    "globals"          => "language.variables.predefined",
    "register_globals" => "security.globals",
    "registerglobals"  => "security.globals",
    "manual/en/security.registerglobals.php" => "security.globals", // fix for 4.3.8 configure
    "magic_quotes"     => "security.magicquotes",
    "magicquotes"      => "security.magicquotes",
    "gd"               => "image",

    "callback"     => "language.pseudo-types",
    "number"       => "language.pseudo-types",
    "mixed"        => "language.pseudo-types",
    "bool"         => "language.types.boolean",
    "boolean"      => "language.types.boolean",
    "int"          => "language.types.integer",
    "integer"      => "language.types.integer",
    "float"        => "language.types.float",
    "string"       => "language.types.string",
    "heredoc"      => "language.types.string",
    "<<<"          => "language.types.string",
    "object"       => "language.types.object",
    "null"         => "language.types.null",

    "htaccess"     => "configuration.changes",
    "php_value"    => "configuration.changes",

    "ternary"      => "language.operators.comparison",
    "instanceof"   => "language.operators.type",
    "if"           => "language.control-structures",
    "static"       => "language.variables.scope",
    "global"       => "language.variables.scope",
    
    "tut"          => "tutorial",
    "tut.php"      => "tutorial", // BC

    "faq.php"      => "faq",      // BC
    "bugs.php"     => "bugs",     // BC
    "bugstats.php" => "bugstats", // BC

    "icap"         => "mcal", // mcal is the successor of icap
    "odbc"         => "uodbc", // BC
    "_"            => "function.gettext",

    "class"        => "language.oop5.basic",
    "new"          => "language.oop5.basic",
    "extends"      => "language.oop5.basic",
    "construct"    => "language.oop5.decon",
    "destruct"     => "language.oop5.decon",
    "public"       => "language.oop5.visibility",
    "private"      => "language.oop5.visibility",
    "protected"    => "language.oop5.visibility",
    "abstract"     => "language.oop5.abstract",
    "interface"    => "language.oop5.interfaces",
    "interfaces"   => "language.oop5.interfaces",
    "autoload"     => "language.oop5.autoload",
    "__autoload"   => "language.oop5.autoload",
    "reflection"   => "language.oop5.reflection",

    "throw"        => "language.exceptions",
    "try"          => "language.exceptions",
    "catch"        => "language.exceptions",

    "factory"      => "language.oop5.patterns",
    "singleton"    => "language.oop5.patterns",
    
    "news.php"                     => "news-2004", // BC
    "readme.mirror"                => "mirroring", // BC
    
    "php5"                         => "language.oop5",
    "zend_changes.txt"             => "language.oop5", // BC
    "zend2_example.phps"           => "language.oop5", // BC
    "zend_changes_php_5_0_0b2.txt" => "language.oop5", // BC
    "zend-engine-2"                => "language.oop5", // BC
    "zend-engine-2.php"            => "language.oop5", // BC
    
    "news_php_5_0_0b2.txt"         => "ChangeLog-5", // BC
    "news_php_5_0_0b3.txt"         => "ChangeLog-5", // BC
    
    "manual/about-notes.php" => "manual/add-note", // BC
    
    # external shortcut aliases ;)
    "dochowto"     => "phpdochowto",
    "projects.php" => "projects", // BC
);

$external_redirects = array(
    "php4news"    => "http://cvs.php.net/viewcvs.cgi/php-src/NEWS?view=markup&pathrev=PHP_4_4",
    "php5news"    => "http://cvs.php.net/viewcvs.cgi/php-src/NEWS?view=markup&pathrev=PHP_5_2",
    "php6news"    => "http://cvs.php.net/viewcvs.cgi/php-src/NEWS?view=markup&pathrev=HEAD",
    "projects"    => "http://freshmeat.net/browse/183/",
    "pear"        => "http://pear.php.net/",
    "bugs"        => "http://bugs.php.net/",
    "bugstats"    => "http://bugs.php.net/bugstats.php",
    "phpdochowto" => "http://doc.php.net/php/dochowto/",
    "getdochowto" => "http://doc.php.net/php/dochowto/howto.html.tar.gz",
    "rev"         => "http://doc.php.net/php/$LANG/revcheck.php",
    //"blog"        => "/manual/$LANG/build.log.gz",
    "functions.js.txt" => "http://cvs.php.net/cvs.php/phpdoc/scripts/quickref",
);

// ============================================================================
// "Rewrite" the URL, if it was a shortcut

if (isset($uri_aliases[$URI])) {
    $URI = $uri_aliases[$URI];
}

// ============================================================================
// Redirect if the entered URI was a PHP page name (except some pages,
// which we display in the mirror's language or the explicitly specified
// language [see below])
if (!in_array($URI, array('mirror-info', 'error')) &&
    file_exists($_SERVER['DOCUMENT_ROOT'] . "/$URI.php")) {
    mirror_redirect("/$URI.php");
}

// ============================================================================
// Execute external redirect if a rule exists for the URI
if (isset($external_redirects[$URI])) {
    mirror_redirect($external_redirects[$URI]);
}

// Temporary hack for mirror-info, until all the pages
// will be capable of being included from anywhere
if (in_array($URI, array('mirror-info'))) {
    status_header(200);
    include_once $_SERVER['DOCUMENT_ROOT'] . "/$URI.php";
}

// ============================================================================
// Try to find the page using the preferred language as a manual page
include_once $_SERVER['DOCUMENT_ROOT'] . "/include/manual-lookup.inc";
$try = find_manual_page($LANG, $URI);
if ($try) {
    status_header(200);
    include_once $_SERVER['DOCUMENT_ROOT'] . $try;
    exit;
}

// ============================================================================
// 404 page for manual pages (eg. not built language)
if (strpos($URI, "manual/") === 0) {
    error_404_manual();
}

// ============================================================================
// If no match was found till this point, the last action is to start a
// search with the URI the user typed in
$fallback = (myphpnet_urlsearch() === MYPHPNET_URL_MANUAL ? "manual" : "quickref");
mirror_redirect(
    '/search.php?show=' . $fallback . '&lang=' . urlencode($LANG) .
    '&pattern=' . urlencode(substr($_SERVER['REQUEST_URI'], 1))
);
/*
 * vim:et
 */
?>
