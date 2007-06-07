<?php
// $Id$
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$i = 0;
do {
	$y = date("Y")-$i;
	if (file_exists("./$y.php")) {
		mirror_redirect("/archive/$y.php");
		break;
	}
} while(++$i<3);

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/errors.inc';
error_noservice();

