<?php // -*- C++ -*-
/* $Id$ */

require_once 'site.inc';
require_once 'layout.inc';


# figure out the directory root

if (!$BASE_DIR) {
  $BASE_DIR = ereg_replace("/[^/]+/[^/]+$", "", $INCLUDE_DIR);
}


if($SCRIPT_NAME=="/bugs.php" || $SCRIPT_NAME=="/bugstats.php") {
#	$my_logo="/jpgs/logo-bug.jpg";
	$my_logo="/gifs/logo-bug.gif";
	$my_size="WIDTH=130 HEIGHT=67";
} else {
	$my_logo="/gifs/logo.gif";
	$my_size="WIDTH=130 HEIGHT=67";
}



?>
