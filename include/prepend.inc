<?php // -*- C++ -*-

// Prevent cross site scripting problems
unset($RSIDEBAR_DATA);
unset($SIDEBAR_DATA);

// Backward compatible array creation. After this point, the
// PHP 4.1.0+ arrays can be used to access variables coming
// from outside PHP. But it should be noted that these variables
// are not necessarily superglobals, so they need to be global-ed!
if (!isset($_SERVER)) {
    $_GET    = &$HTTP_GET_VARS;
    $_POST   = &$HTTP_POST_VARS;
    $_ENV    = &$HTTP_ENV_VARS;
    $_SERVER = &$HTTP_SERVER_VARS;
    $_COOKIE = &$HTTP_COOKIE_VARS;
}

// Load in always required parts
include_once 'site.inc';
include_once 'layout.inc';
include_once 'geoip.inc';

// This file is generated on rsync.php.net and propogated
// from there. It just defines $LAST_UPDATED, which is the
// mirror's last updated time.
include_once 'last_updated.inc';

?>
