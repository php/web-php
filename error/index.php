<?php
require_once 'prepend.inc';


function make404() {
	global $REQUEST_URI;
	header('HTTP/1.0 404 Not Found');
	commonHeader('404 Not Found');
	echo "<H1>Not Found</H1>\n";
	echo "<P>The page <B>" . $REQUEST_URI . "</B> could not be found.</P>\n";
	commonFooter();
}


if (file_exists("../configuration.inc")) {
  include_once "../configuration.inc";
}

if (preg_match('/\.(pdf|gif|jpg)$/', $REQUEST_URI)) {
  make404();
  exit;
}

$lang = default_language();
if (!is_dir("$DOCUMENT_ROOT/manual/$lang")) {
	$lang = "en"; // fall back to English
}
# handle .php3 files that were renamed to .php
if (preg_match("/(.*\.php)3$/", $REQUEST_URI, $array)) {
	if($SERVER_PORT!=80) {
		$url = "http://".$SERVER_NAME.":".$SERVER_PORT.$array[1];
	} else {
		$url = "http://".$SERVER_NAME.$array[1];
	}
	$urle = htmlspecialchars($url);
	
	header("HTTP/1.0 302 Redirect");
	header("Location: $url");

	print "<html><title>Redirect to $urle</title><body>";
	print "<a href=\"".$url."\">Please click here</a></body></html>";
	exit;
}

# handle moving english manual down into its own directory
if (eregi("^(.*)/manual/((html/)?[^/]+)$", $REQUEST_URI, $array)) {
	if($SERVER_PORT!=80) {
		$url = "http://".$SERVER_NAME.":".$SERVER_PORT."$array[1]/manual/$lang/".$array[2];
	} else {
		$url = "http://".$SERVER_NAME."$array[1]/manual/$lang/".$array[2];
	}
	$urle = htmlspecialchars($url);
	
	header("HTTP/1.0 302 Redirect");
	header("Location: $url");

	print "<html><title>Redirect to $urle</title><body>";
	print "<a href=\"".$url."\">Please click here</a></body></html>";
	exit;
}

$uri=substr($REDIRECT_REDIRECT_ERROR_NOTES,strpos($REDIRECT_REDIRECT_ERROR_NOTES,$DOCUMENT_ROOT)+strlen($DOCUMENT_ROOT)+1);


# try to find the uri as a manual entry

require "manual-lookup.inc";
if(strchr($uri,'/')) {
	list($lang,$function) = explode('/',$uri,2);
	$function = strtolower($function);
	$lang = strtolower($lang);
} else {
        $function = strtolower($uri);
}

$try = find_manual_page($lang, $function);
if ($try) {
	header("HTTP/1.0 302 Redirect");
	header("Location: $try");
	exit;
}


# If all else fails ... redirect to the search page with the pattern set to $REQUEST_URI

if ($REQUEST_URI) {
	header('HTTP/1.0 302 Redirect');
	header('Location: /search.php?show=nosource&pattern='.urlencode($REQUEST_URI) );
	exit;
}

make404();
exit;


?>
