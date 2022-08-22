<?php
$_SERVER['BASE_PAGE'] = 'credits.php';
include_once __DIR__ . '/include/prepend.inc';

// Put credits information to $credits
ob_start();
phpcredits();
$credits = ob_get_clean();

// Strip all but the body and drop styles
preg_match('!<body.*?>(.*)</body>!ims', $credits, $m);
$credits = preg_replace('!<style.*?>.*</style>!ims', '', $m[1]);

// Fix for PHP bug #24839,
// which affects the page layout
$credits = str_replace(
    ["</center>", "& "],
    ["</div>", "&amp; "],
    $credits
);

// If there is something left, print it out
if ($credits) {
    site_header("Credits", ["current" => "community", 'css' => ['credits.css']]);
    echo $credits;
    site_footer();
}
