<?php // -*- C++ -*-
/* $Id$ */

require_once 'site.inc';
require_once 'layout.inc';
# this file is generated on rsync.php.net and propogated from there
# it just defines $LAST_UPDATED.
require_once 'last_updated.inc';

if($SCRIPT_NAME=="/bugs.php" || $SCRIPT_NAME=="/bugstats.php") {
#	$my_logo="/jpgs/logo-bug.jpg";
	$my_logo="/gifs/logo-bug.gif";
	$my_size="WIDTH=130 HEIGHT=67";
} else {
	$my_logo="/gifs/logo.gif";
	$my_size="WIDTH=130 HEIGHT=67";
}

?>
