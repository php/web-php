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
// Get mirror specific configuration, and check for manual language existance
if (file_exists("../configuration.inc")) {
    include_once "../configuration.inc";
}
$lang = default_language();
if (!@is_dir("$DOCUMENT_ROOT/manual/$lang")) {
    $lang = "en"; // fall back to English
}

// ============================================================================
// BC: handle .php3 files that were renamed to .php
if (preg_match("/(.*\.php)3$/", $REQUEST_URI, $array)) {
    if($SERVER_PORT!=80) {
        $url = "http://".$SERVER_NAME.":".$SERVER_PORT.$array[1];
    } else {
        $url = "http://".$SERVER_NAME.$array[1];
    }
    $urle = htmlspecialchars($url);
    
    header("Location: $url");

    print "<html><title>Redirect to $urle</title><body>";
    print "<a href=\"".$url."\">Please click here</a></body></html>";
    exit;
}

// ============================================================================
// BC: handle moving english manual down into its own directory (also supports
//     default language manual accessibilty on mirror sites through /manual/filename)
if (eregi("^(.*)/manual/((html/)?[^/]+)$", $REQUEST_URI, $array)) {
    if ($SERVER_PORT != 80) {
        $url = "http://".$SERVER_NAME.":".$SERVER_PORT."$array[1]/manual/$lang/".$array[2];
    } else {
        $url = "http://".$SERVER_NAME."$array[1]/manual/$lang/".$array[2];
    }
    $urle = htmlspecialchars($url);
    
    header("Location: $url");

    print "<html><title>Redirect to $url</title><body>";
    print "<a href=\"".$url."\">Please click here</a></body></html>";
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
    @file_exists("../manual/$parts[1]/$parts[3]")) {
    header('HTTP/1.1 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "../manual/$parts[1]/$parts[3]";
    exit;
}

// BC: for old HTML directory (.html extension was used in that)
elseif (preg_match("!^manual/(\\w+)/html/(.+)\\.(html|php)$!", $uri, $parts) &&
        @file_exists("../manual/$parts[1]/$parts[2].php")) {
    header('HTTP/1.1 200 OK');
    $PRINT_PAGE = TRUE;
    include "../manual/$parts[1]/$parts[2].php";
    exit;
}

// The index file needs to be handled in a special way
elseif (preg_match("!^manual/(\\w+)/(print|printwn|html)(/)?$!", $uri, $parts) &&
        @file_exists("../manual/$parts[1]/index.php")) {
    header('HTTP/1.1 200 OK');
    $PRINT_PAGE = TRUE;
    if ($parts[2] == "printwn") { $PRINT_NOTES = TRUE; }
    include "../manual/$parts[1]/index.php";
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

    "icap"         => "mcal", // mcal is the successor of icap
    
    # external shortcut aliases ;)
    "dochowto"    => "phpdochowto"
    
);

$external_redirects = array(
    "phpdochowto" => "http://cvs.php.net/co.php/phpdoc/howto/howto.html.tar.gz?p=1",
    "php4news"    => "http://cvs.php.net/co.php/php4/NEWS?p=1"
);

// ============================================================================
// "Rewrite" the URL, if it was a shortcut
if (isset($uri_aliases[strtolower($uri)])) {
    $uri = $uri_aliases[strtolower($uri)];
}

// ============================================================================
// Redirect if the entered URI was a PHP page name
if (file_exists("$DOCUMENT_ROOT/$uri.php")) {
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
    if ($lang != 'pt_BR') { $lang = strtolower($lang); }

    // Transform function name, so it can be a shortcut
	if (isset($uri_aliases[$function])) {
        $function = $uri_aliases[$function];
    }

} else {
    $function = strtolower($uri);
}

// ============================================================================
// Quick access to revcheck output and build logs for various languages
if ($function == "rev") {
    header("Location: http://$SERVER_NAME/manual/$lang/revcheck.html.gz");
    exit;
} elseif ($function == "blog") {
    header("Location: http://$SERVER_NAME/manual/$lang/build.log.gz");
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
header('Location: http://'.$SERVER_NAME.'/search.php?show=nosource&auto=1&pattern='.urlencode(substr($REQUEST_URI,1)) );
?>
