<?
require("shared-manual.inc");
manualHeader("Show Source");

if (!isset($page_url)):
	echo "No page URL specified.";
	manualFooter("Show Source");
	exit;
endif;

echo "Source of: $page_url<BR><hr noshade><FONT SIZE=-1>\n";

/* remove other path prefixes than /manual/ */

$legal_paths = array("/manual" => 1);
$tmp = strrchr($page_url, "/");
if ($tmp) {
    $path = substr($page_url, 0, strlen($page_url)-strlen($tmp));
    if ($legal_paths[$path]) {
        $page_name = "$DOCUMENT_ROOT/" . ereg_replace("^/", "", $page_url);
    } else {
        $page_name = substr($tmp, 1, strlen($tmp));
    }
} else {
  $page_name = $page_url;
}

show_source($page_name);

manualFooter("Show Source");
?>
