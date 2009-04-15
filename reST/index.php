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
$_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];


$SIDEBAR_DATA = '<h3>File list</h3>
<ul class="simple" id="reSTlist">';

$restfiles = glob($rest_dir. "/*");

$list = $lastdir = "";
foreach($restfiles as $filename) {
	$link = basename($filename, ".rest");

	// Separate the dirname from the filename
	list($dir, $filename) = explode("_", $link, 2);

	// Create a tree-like-structure
	if ($dir != $lastdir) {
		if ($lastdir) {
			$list .= "</ul>\n";
		}
		$list .= "<li><h4>$dir</h4><li>\n<ul class=\"simple\">\n";
		$lastdir = $dir;
	}

	// Replace the first - with a directory seperator
	$link[strpos($link, "_")] = "/";

	// Only use the "last part" of the filename (i.e. README.FOOBAR => FOOBAR)
	if (strpos($filename, ".") !== false) {
		$filename = substr($filename, strpos($filename, ".")+1);
	}

	$filename = str_replace(array("-", "_"), " ", $filename);
	$list .= '<li><a href="/reST/' .$link.'">'.$filename.'</a></li>'."\n";
}

if ($list) {
	$SIDEBAR_DATA .= "$list</ul>";
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
	manual_notes();
}

site_footer();

