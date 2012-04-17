<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'manual-lookup.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/include/manual-lookup.inc';

// BC code, so pattern and function can both be used as
// parameters to specify the function name
$function = '';
if (!empty($_GET['function']) && is_string($_GET['function'])) {
    $function = htmlspecialchars($_GET['function'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($_GET['pattern']) && is_string($_GET['pattern'])) {
    $function = htmlspecialchars($_GET['pattern'], ENT_QUOTES, 'UTF-8');
}

if(!empty($_GET['scope']) && is_string($_GET['scope'])) {
	$scope = htmlspecialchars($_GET['scope'], ENT_QUOTES, 'UTF-8');
} else {
	$scope = '';
}

// Prepare data for search
if ($function) {
    if ($MQ) {
        $function = stripslashes($function);
    }
    
    $function = strtolower($function);

    // Try to find appropriate manual page
    if ($file = find_manual_page($LANG, $function)) {
        mirror_redirect($file);
    }
}

// Fall back to a quick reference search
$notfound = $function;
include $_SERVER['DOCUMENT_ROOT'] . '/quickref.php';

?>
