<?php
require_once 'prepend.inc';

// A 'good looking' 404 error message page
function make404()
{
    global $REQUEST_URI;
    header('Status: 404 Not Found');
    header("Cache-Control: public, max-age=600");
    commonHeader('404 Not Found');
    echo "<h1>Not Found</h1>\n";
    echo "<p>The page <b>" . htmlspecialchars($REQUEST_URI) . "</b> could not be found.</p>\n";
    commonFooter();
}

// ============================================================================
// For images, display a 404 automatically (no redirect)
if (preg_match('/\.(pdf|gif|jpg|png)$/', $REQUEST_URI)) {
    make404();
    exit;
}

// ============================================================================
// Check for a manual in the mirror's default language
$lang = default_language();
if (!@is_dir("$DOCUMENT_ROOT/manual/$lang/index.php")) {
    $lang = "en"; // fall back to English
}

// ============================================================================
// BC: handle .php3 files that were renamed to .php
if (preg_match("/(.*\.php)3$/", $REQUEST_URI, $array)) {
    header("Location: http://$SERVER_NAME$array[1]");
    exit;
}

// ============================================================================
// BC: handle moving english manual down into its own directory (also supports
//     default language manual accessibilty on mirror sites through /manual/filename)
if (eregi("^(.*)/manual/((html/)?[^/]+)$", $REQUEST_URI, $array)) {
    header("Location: http://$SERVER_NAME$array[1]/manual/$lang/$array[2]");
    exit;
}

// ============================================================================
// Prepare URI for further manipulation, dropping out leading slash
$error_notes = $REDIRECT_REDIRECT_ERROR_NOTES
             ? $REDIRECT_REDIRECT_ERROR_NOTES
             : $REDIRECT_ERROR_NOTES;
$uri = substr(
    $error_notes,
    strpos($error_notes,$DOCUMENT_ROOT)+strlen($DOCUMENT_ROOT)+1
);
if ($uri[0] == "/") { $uri = substr($uri,1); }

// ============================================================================
// Printer friendly manual page handling. It's important that this is included,
// and not redirected, as this way all relative URL's will retain their meaning
// and point to pages relative to the print dir (which is nonexistent)
// We need to override the 404 status in that case.
if (preg_match("!^manual/(\\w+)/(print|printwn)/(.+\\.php)$!", $uri, $parts) &&
    @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/$parts[3]")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "$DOCUMENT_ROOT/manual/$parts[1]/$parts[3]";
    exit;
}

// BC: for old HTML directory (.html extension was used in that)
elseif (preg_match("!^manual/(\\w+)/html/(.+)\\.(html|php)$!", $uri, $parts) &&
        @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/$parts[2].php")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    include "$DOCUMENT_ROOT/manual/$parts[1]/$parts[2].php";
    exit;
}

// The index file needs to be handled in a special way
elseif (preg_match("!^manual/(\\w+)/(print|printwn|html)(/)?$!", $uri, $parts) &&
        @file_exists("$DOCUMENT_ROOT/manual/$parts[1]/index.php")) {
    header('Status: 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "$DOCUMENT_ROOT/manual/$parts[1]/index.php";
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

    "faq.php"      => "faq", // for backward compatibility with PHP page!

    "icap"         => "mcal", // mcal is the successor of icap
    
    # external shortcut aliases ;)
    "dochowto"     => "phpdochowto",
    "projects.php" => "projects", // for backward compatibility with PHP page!
    
);

$external_redirects = array(
    "php4news" => "http://cvs.php.net/co.php/php4/NEWS?p=1",
    "projects" => "http://freshmeat.net/browse/183/"
);

// ============================================================================
// "Rewrite" the URL, if it was a shortcut
if (isset($uri_aliases[strtolower($uri)])) {
    $uri = $uri_aliases[strtolower($uri)];
}

// ============================================================================
// Redirect if the entered URI was a PHP page name (except the books page,
// which we display in the mirror's language or the explicitly specified
// language [see below])
if ($uri !=  'books' && file_exists("$DOCUMENT_ROOT/$uri.php")) {
    header("Location: http://$SERVER_NAME/$uri.php");
    exit;
}

// ============================================================================
// Execute external redirect if a rule exists for the URI
if (isset($external_redirects[strtolower($uri)])) {
    header("Location: " . $external_redirects[strtolower($uri)]);
    exit;
}

// ============================================================================
// Try to find the URI as a manual entry
require "manual-lookup.inc";
if (strchr($uri,'/')) {
    
    // Find language and function name part (eg. hu/ini)
    list($lang,$function) = explode('/',$uri,2);

    $function = strtolower($function);
    $lang     = strtolower($lang);
    
    // Proper case for Brazilian Portuguese
    if ($lang == 'pt_br') { $lang = 'pt_BR'; }

    // Transform function name, so it can be a shortcut
    if (isset($uri_aliases[$function])) {
        $function = $uri_aliases[$function];
    }

} else {
    $function = strtolower($uri);
}

// ============================================================================
// Quick access to revcheck output, build logs, books for various languages and
// the PHP Documentation Howto for backward compatibility
if ($function == "rev") {
    header("Location: http://$SERVER_NAME/manual/$lang/revcheck.html.gz");
    exit;
} elseif ($function == "blog") {
    header("Location: http://$SERVER_NAME/manual/$lang/build.log.gz");
    exit;
} elseif ($function == "books") {
    header("Location: http://$SERVER_NAME/books.php?type_lang=PHP_$lang");
    exit;
} elseif ($function == "phpdochowto") {
    header("Location: http://$SERVER_NAME/manual/howto/index.html");
    exit;
}

// ============================================================================
// Try to find the page using this language as a manual page (lang is the language
// from the URI, or the default language if it was not there in the URI
$try = find_manual_page($lang, $function);
if ($try) {
    header("Location: $try");
    exit;
}

// ============================================================================
// If no match was found till this point, the last action is to start a
// search with the URI the user typed in
header('Location: http://'.$SERVER_NAME.'/search.php?show=manual&lang='.urlencode($lang).'&pattern='.urlencode(substr($REQUEST_URI,1)) );
?>
