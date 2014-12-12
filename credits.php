<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'credits.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Put credits information to $credits
ob_start();
phpcredits();
$credits = ob_get_contents();
ob_end_clean();

// Strip all but the body and drop styles
preg_match('!<body.*?>(.*)</body>!ims', $credits, $m);
$credits = preg_replace('!<style.*?>.*</style>!ims', '', $m[1]);

// Fix for PHP bug #24839,
// which affects the page layout
$credits = str_replace(
    array("</center>", "& "),
    array("</div>", "&amp; "),
    $credits
);

// If there is something left, print it out
if ($credits) {
    site_header("Credits", array("current" => "community", 'css' => array('credits.css')));
    echo $credits;
    site_footer(); 
}

?>
