<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'credits.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Output buffering supported
if (function_exists('ob_start')) {
    
    // Put credits information to $credits
    ob_start();
    phpcredits();
    $credits = ob_get_contents();
    ob_end_clean();

    // Strip all but the body
    preg_match('!<body.*?>(.*)</body>!ims', $credits, $m);

    // Strip out any style
    $credits = preg_replace('!<style.*?>.*</style>!ims', '', $m[1]);

    // If there is something left, print it out
    if ($credits) {
        commonHeader("Credits");
        echo $credits;
        commonFooter(); 
    }
}
 
// No output buffer support, standard credits page
else {
    phpcredits();
}

?>
