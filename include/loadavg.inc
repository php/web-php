<?php # vim:ft=php

// $Id$

/*
 Offload to the visitor's nearest mirror if the load is too high.
 We use the sys_getloadavg() function that requires PHP 5.1.3+
*/

// Check load on mirror
function load_check()
{
    global $COUNTRY, $MIRRORS;

    // We cannot check the load here
    if (!function_exists("sys_getloadavg") || !is_primary_site()) {
        return;
    }

    // Get load and print it out in header
    $load = sys_getloadavg();
    header("X-PHP-Load: " . implode(", ", $load));
    $load = $load[0];

    // Load is very high, we won't even redirect
    if ($load > 80) { load_toobusy(); }

    // Adhere to user preferences if valid
    $user_mirror = myphpnet_mirror();
    if (isset($MIRRORS[$user_mirror]) && $MIRRORS[$user_mirror][7] == MIRROR_OK
        && $user_mirror != "http://php.net/" && $user_mirror != 'http://www.php.net/') {
        header("Location: $user_mirror" . substr($_SERVER['REQUEST_URI'], 1));
        exit;
    }
    
    $close_mirrors = array();
    $other_mirrors = array();

    // Find potential close mirrors 
    foreach ($MIRRORS as $murl => $mirror) {
        if ($murl != 'http://php.net/' && $murl != 'http://www.php.net/' && $mirror[7] == MIRROR_OK && $mirror[4] != MIRROR_SPECIAL) {
            if ($mirror[0] == $COUNTRY) {
                $close_mirrors[] = $murl;
            } else {
                $other_mirrors[] = $murl;
            }
        }
    }

    $need_mirror = TRUE;

    // Randomly pick one of the close mirrors
    if (count($close_mirrors) > 0) {
        if (!load_random_redirect($close_mirrors)) {
            $need_mirror = FALSE; // selected the same site
        }
    }

    // Pick a random mirror if load is moderate
    if ($need_mirror && $load > 10 && count($other_mirrors) > 0) {
        load_random_redirect($other_mirrors);
    }

    // No mirror was found, allow the request
    // through if the load isn't really really high
    if ($load > 20) { load_toobusy(); }
}

// Send reply to the client that we are too busy now
function load_toobusy()
{
    header("HTTP/1.1 503 Too busy, try again later");
    echo "Server too busy, please try again later, or <a href=\"/mirrors.php\">use a mirror</a>";
    exit;
}

// Redirect to the same page on $mirror site
function load_random_redirect($mirrors)
{
    global $MYSITE;
    
    $murl = $mirrors[array_rand($mirrors)];
    if ($murl != $MYSITE) {
        header("Location: $murl" . substr($_SERVER['REQUEST_URI'], 1));
        exit;
    } else { return FALSE; }
}

load_check();
