<?php
require("shared.inc");
commonHeader("Show Source");

if (!isset($page_url)) {
    echo "No page URL specified.";
    commonFooter();
    exit;
}

echo "Source of: $page_url<BR><hr noshade><FONT SIZE=-1>\n";

$legal_dirs = array(
    "/manual" => 1,
    "/include" => 1);

$dir = dirname($page_url);
if ($dir && $legal_dirs[$dir]) {
    $page_name = $DOCUMENT_ROOT . $page_url;
} else {
    $page_name = basename($page_url);
}

echo("<!-- $page_name -->\n");

if (file_exists($page_name)) {
    show_source($page_name);
}

if (!strstr($page_name,"include/shared.inc")) {
?>
<hr noshade>
And if you're interested in what's behind the <B>commonHeader()</B> and <B>commonFooter</B> functions, 
you can always take a look at the 
<A HREF="/source.php3?page_url=/include/shared.inc">
source of the shared.inc</A> file.
<P>
<?
}

commonFooter();
?>

