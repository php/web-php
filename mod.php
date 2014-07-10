<?php
// $Id$

/*
 This page supports the PHP.net automoderation system
 with enabling users to confirm their emails via the web.
 This script only need to run on the primary php.net box.
*/

$_SERVER['BASE_PAGE'] = 'mod.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Email confirmation", array("current" => "community"));

// Only run on main php.net box.
if (!is_primary_site()) {
    echo <<<ERROR
<h1>Email confirmation failed</h1>

<p class="formerror">
 This server is not capable of handling email confirmations.
</p>
ERROR;
    site_footer();
    exit;
}

// These sites are handled by automoderation
$sites = array("php.net", "lists.php.net");

// Get data from the URL
list($none, $site, $token, $sender) = explode("/", $_SERVER["PATH_INFO"]);

// Error in input data
if ($sender == "" || strlen($token) < 32 || !isset($sites[$site])) {
    echo <<<ERROR
<h1>Email confirmation failed</h1>

<p class="formerror">
 Sorry, the URL is incomplete. Please verify that you used the
 complete URL even if it spans multiple lines.
</p>
ERROR;
}

// Data OK, send confirmation mail
else {
    mail(
        "confirm@" . $sites[$site],
        "confirm",
        "[confirm: $token $sender]",
        "From: $sender"
    );

    echo <<<THANKS
<h1>Email confirmation successful</h1>

<p> 
 Thanks for confirming your email address. No further
 action is required on your part.
</p>
THANKS;

}

site_footer();
