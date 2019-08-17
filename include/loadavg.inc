<?php # vim:ft=php

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

    // Load is very high
    if ($load > 80) { load_toobusy(); }
}

// Send reply to the client that we are too busy now
function load_toobusy()
{
    header("HTTP/1.1 503 Too busy, try again later");
    echo "Server too busy, please try again later, or <a href=\"/mirrors.php\">use a mirror</a>";
    exit;
}

load_check();
