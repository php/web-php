<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'reST/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';

// Pregenerated (on master) cache
$rest_dir = $_SERVER['DOCUMENT_ROOT'].'/reST/cache/';

$path = isset($_GET['rel_path']) ? $_GET['rel_path'] : "";

// Set "this pages ID" (for the notes system)
$PGI["this"] = array("reST/" . ($path ? $path : "index.php"), "");


$SIDEBAR_DATA = '<h3>File list</h3>
<ul class="simple">';

$restfiles = glob($rest_dir. "/*");

$list = "";
foreach($restfiles as $filename) {
	$link = basename($filename, ".rest");
	$text = substr($link, strpos($link, "_")+1); // Remove the fs dirname
	$link[strpos($link, "_")] = "/"; // Replace the first - with a directory seperator
	$list .= '<li><a href="/reST/' .$link.'">'.$text.'</a></li>';
}

if ($list) {
	$SIDEBAR_DATA .= $list;
} else {
	$SIDEBAR_DATA .= "<li>No files available</li>";
}
$SIDEBAR_DATA .= "</ul>";


$filename = $rest_dir. "/" .str_replace('/', '_', $path).'.rest';
if (($k = array_search($filename, $restfiles)) === false) {
	site_header("reST");
	if($path) {
		echo '<p class="warn">Unknown file</p>';
	}
	echo "<p>Please select a file from the filelist on the left</p>";
} else {
	site_header(basename($path));
	include $restfiles[$k];
}

manual_notes();
site_footer();

