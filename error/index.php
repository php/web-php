<?php
require_once 'prepend.inc';

// A 'good looking' 404 error message page
function make404() {
    global $REQUEST_URI;
    header('Status: 404 Not Found');
    header("Cache-Control: public, max-age=600");
    commonHeader('404 Not Found');
    echo "<h1>Not Found</h1>\n";
    echo "<p>the page <b>" . htmlspecialchars($REQUEST_URI) . "</b> could not be found.</p>\n";
    commonFooter();
}


// Mirror specific configuration (for search support)
if (file_exists("../configuration.inc")) {
    include_once "../configuration.inc";
}

// For images, we automatically display a 404
if (preg_match('/\.(pdf|gif|jpg)$/', $REQUEST_URI)) {
    make404();
    exit;
}

// Get preferred language, and check for
// existing manual in that language
$lang = default_language();
if (!@is_dir("$DOCUMENT_ROOT/manual/$lang")) {
    $lang = "en"; // fall back to English
}

// handle .php3 files that were renamed to .php
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

// handle moving english manual down into its own directory
if (eregi("^(.*)/manual/((html/)?[^/]+)$", $REQUEST_URI, $array)) {
    if ($SERVER_PORT != 80) {
        $url = "http://".$SERVER_NAME.":".$SERVER_PORT."$array[1]/manual/$lang/".$array[2];
    } else {
        $url = "http://".$SERVER_NAME."$array[1]/manual/$lang/".$array[2];
    }
    $urle = htmlspecialchars($url);
    
    header("Location: $url");

    print "<html><title>Redirect to $urle</title><body>";
    print "<a href=\"".$url."\">Please click here</a></body></html>";
    exit;
}

// prepare  URI for manual page and PHP page shortcuts
$uri = substr(
    $REDIRECT_REDIRECT_ERROR_NOTES,
    strpos($REDIRECT_REDIRECT_ERROR_NOTES,$DOCUMENT_ROOT)+strlen($DOCUMENT_ROOT)+1
);

// drop out leading slash
if ($uri[0] == "/") $uri = substr($uri,1);

// shortcuts for PHP and manual pages
$uri_aliases = array (

    # PHP page shortcuts
    "download"      => "downloads",
    "documentation" => "docs",
    "mailinglists"  => "mailing-lists",
    "mailinglist"   => "mailing-lists",
    "changelog"     => "ChangeLog-4",
    "gethelp"       => "support",
    "help"          => "support",

    # manual shortcuts
    "ini"         => "configuration",
    "install"     => "installation",
    "intro"       => "introduction",
    "whatis"      => "introduction",
    "whatisphp"   => "introduction",
    "what_is_php" => "introduction",

);

// if the user typed an aliased URL, transform it
if (isset($uri_aliases[strtolower($uri)])) {
    $uri = $uri_aliases[strtolower($uri)];
}

// handle common page shortcuts, like docs, links, support, etc.
if (file_exists("$DOCUMENT_ROOT/$uri.php")) {
    header("Location: http://$SERVER_NAME/$uri.php");
    exit;
}

// try to find the uri as a manual entry
require "manual-lookup.inc";
if (strchr($uri,'/')) {
    list($lang,$function) = explode('/',$uri,2);
    $function = strtolower($function);

    if (isset($uri_aliases[$function])) {
        $function = $uri_aliases[$function];
    }

    $lang = strtolower($lang);
} else {
    $function = strtolower($uri);
}

// Quick access to revcheck output and build logs for manual writers
if ($function == "rev") {
    header("Location: http://$SERVER_NAME/manual/$lang/revcheck.html");
    exit;
} elseif ($function == "blog") {
    header("Location: http://$SERVER_NAME/manual/$lang/build.log.gz");
    exit;
} else if (in_array($function, array("dochowto", "phpdochowto"))) {
    header("Location: http://cvs.php.net/co.php/phpdoc/howto/howto.html.tar.gz");
    exit;
}

$try = find_manual_page($lang, $function);
if ($try) {
    header("Location: $try");
    exit;
}

// redirect to the search page with the pattern set to $REQUEST_URI
header('Location: http://'.$SERVER_NAME.'/search.php?show=nosource&auto=1&pattern='.urlencode(substr($REQUEST_URI,1)) );
?>
