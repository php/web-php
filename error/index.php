<?php

// Ensure that our environment is set up
include_once 'prepend.inc';

// Get URI for this request (without the leading slash)
// See langchooser.inc for more info on STRIPPED_URI
$URI = substr($_SERVER['STRIPPED_URI'], 1);

// ============================================================================
// For images, display a 404 automatically (no redirect)
if (preg_match("!\\.(pdf|gif|jpg|png)$!", $URI)) { make404(); }

// ============================================================================
// BC: handle .php3 files that were renamed to .php
if (preg_match("!(.*\\.php)3$!", $URI, $array)) {
    mirror_redirect("/$array[1]");
}

// ============================================================================
// BC: handle bugs.php moved completely to bugs.php.net
if (preg_match("!^bugs.php?(.+)$!", $URI, $array)) {
    mirror_redirect("http://bugs.php.net/?$array[1]", TRUE);
}

// ============================================================================
// BC: handle moving english manual down into its own directory (also supports
//     default language manual accessibilty on mirror sites through /manual/filename)
if (preg_match("!^manual/([^/]+)$!", $URI, $array)) {
    mirror_redirect("/manual/$LANG/$array[1]");
} elseif (preg_match("!^manual/html/([^/]+)$!", $URI, $array)) {
    $array[1] = preg_replace("!.html$!", ".php", $array[1]);
    mirror_redirect("/manual/$LANG/print/$array[1]");
}

// ============================================================================
// Printer friendly manual page handling. It's important that this is included,
// and not redirected, as this way all relative URL's will retain their meaning
// and point to pages relative to the print dir (which is nonexistent)
// We need to override the 404 status in these cases too.
if (preg_match("!^manual/(\\w+)/(print|printwn)/(.+\\.php)$!", $URI, $parts) &&
    @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/$parts[3]")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "$DOCUMENT_ROOT/manual/$parts[1]/$parts[3]";
    exit;
}

// BC: for old HTML directory (.html extension was used in that)
elseif (preg_match("!^manual/(\\w+)/html/(.+)\\.(html|php)$!", $URI, $parts) &&
        @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/$parts[2].php")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    include "$DOCUMENT_ROOT/manual/$parts[1]/$parts[2].php";
    exit;
}

// The index file needs to be handled in a special way
elseif (preg_match("!^manual/(\\w+)/(print|printwn|html)(/)?$!", $URI, $parts) &&
        @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/index.php")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "$DOCUMENT_ROOT/manual/$parts[1]/index.php";
    exit;
}

// ============================================================================
// Nice URLs for download files, so wget works completely well with download links
if (preg_match("!^get/([^/]+)/from/([^/]+)(/mirror)?$!", $URI, $dlinfo)) {
    
    $df = $dlinfo[1];
    
    // Mirror selection page
    if ($dlinfo[2] == "a") { include_once "$DOCUMENT_ROOT/get_download.php"; exit; }
    
    // The same mirror is selected
    if ($dlinfo[2] == "this") { $mr = $MYSITE; }
    
    // Some other mirror is selected
    else { $mr = "http://{$dlinfo[2]}/"; }
    include_once "$DOCUMENT_ROOT/do_download.php";
    exit;
}


// ============================================================================
// Define shortcuts for PHP files, manual pages and external redirects
$uri_aliases = array (

    # PHP page shortcuts
    "download"      => "downloads",
    "documentation" => "docs",
    "mailinglists"  => "mailing-lists",
    "mailinglist"   => "mailing-lists",
    "changelog"     => "ChangeLog-4",
    "gethelp"       => "support",
    "help"          => "support",
    "unsubscribe"   => "unsub",
    "subscribe"     => "mailing-lists",
    "logos"         => "download-logos",

    "README.mirror" => "mirroring", // backward compatibility
    "dochowto"     => "phpdochowto",

    # manual shortcuts
    "ini"          => "configuration",

    "install"      => "installation",

    "intro"        => "introduction",
    "whatis"       => "introduction",
    "whatisphp"    => "introduction",
    "what_is_php"  => "introduction",

    "windows"      => "install.windows",
    "win32"        => "install.windows",

    "globals"      => "language.variables.predefined",
    "register_globals" => "security.registerglobals",
    "registerglobals" => "security.registerglobals",
    "gd"           => "image",

    "tut"          => "tutorial",
    "tut.php"      => "tutorial", // for backward compatibility with PHP page!

    "faq.php"      => "faq",      // for backward compatibility with PHP page!
    "bugs.php"     => "bugs",     // for backward compatibility with PHP page!
    "bugstats.php" => "bugstats", // for backward compatibility with PHP page!

    "icap"         => "mcal", // mcal is the successor of icap
    
    # external shortcut aliases ;)
    "projects.php" => "projects", // for backward compatibility with PHP page!

    
);

$external_redirects = array(
    "php4news" => "http://cvs.php.net/co.php/php4/NEWS?p=1",
    "projects" => "http://freshmeat.net/browse/183/",
    "pear"     => "http://pear.php.net/",
    "bugs"     => "http://bugs.php.net/",
    "bugstats" => "http://bugs.php.net/bugstats.php",
);

// ============================================================================
// "Rewrite" the URL, if it was a shortcut
if (isset($uri_aliases[strtolower($URI)])) {
    $URI = $uri_aliases[strtolower($URI)];
}

// ============================================================================
// Redirect if the entered URI was a PHP page name (except the books page,
// which we display in the mirror's language or the explicitly specified
// language [see below])
if ($URI !=  'books' && file_exists("$DOCUMENT_ROOT/$URI.php")) {
    mirror_redirect("/$URI.php");
}

// ============================================================================
// Execute external redirect if a rule exists for the URI
if (isset($external_redirects[strtolower($URI)])) {
    mirror_redirect($external_redirects[strtolower($URI)], TRUE);
}

// ============================================================================
// Quick access to revcheck output, build logs, books for various languages and
// the PHP Documentation Howto for backward compatibility [breaks left out intentionally]
$URI = strtolower($URI);
switch ($URI) {
    case "rev"         : mirror_redirect("/manual/$LANG/revcheck.html.gz");
    case "blog"        : mirror_redirect("/manual/$LANG/build.log.gz");
    case "books"       : mirror_redirect("/books.php?type_lang=PHP_$LANG");
    case "phpdochowto" : mirror_redirect("/manual/howto/index.html");
}

// ============================================================================
// Try to find the page using the preferred language as a manual page
include_once "manual-lookup.inc";
$try = find_manual_page($LANG, $URI);
if ($try) { mirror_redirect($try); }

// ============================================================================
// If no match was found till this point, the last action is to start a
// search with the URI the user typed in
mirror_redirect(
    '/search.php?show=manual&lang=' . urlencode($LANG) .
    '&pattern=' . urlencode($_SERVER['REQUEST_URI'])
);

// A 'good looking' 404 error message page
function make404()
{
    global $_SERVER;
    header('Status: 404 Not Found');
    header("Cache-Control: public, max-age=600");
    commonHeader('404 Not Found');
    echo "<h1>Not Found</h1>\n",
         "<p>The page <b>",
         htmlspecialchars($_SERVER['REQUEST_URI']),
         "</b> could not be found.</p>\n";
    commonFooter();
    exit;
}

?>
