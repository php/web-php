<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'manual-lookup.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/manual-lookup.inc';

// BC code, so patter and function can equaly be used as
// parameters to specify the function name
if (empty($_GET['function']) && !empty($_GET['pattern'])) {
    $_GET['function'] = $_GET['pattern'];
}

// Prepare data for search
if ($MQ) { $_GET['function'] = stripslashes($_GET['function']); }
$_GET['function'] = strtolower($_GET['function']);

// Try to find appropriate manual page
if ($file = find_manual_page($LANG, $_GET['function'])) {
    mirror_redirect($file);
}

// Fall back to a quick reference search
$notfound = $_GET['function'];
include_once $_SERVER['DOCUMENT_ROOT'] . '/quickref.php';

?>
