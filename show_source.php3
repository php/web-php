<? isset($page_url) or die("No page URL specified."); ?>
<html>
<head>
<title>Source of <? echo $page_url ?></title>
<?
  $title="Source of $page_url";
  include "include/header.inc";

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

include "include/footer.inc";

?>
