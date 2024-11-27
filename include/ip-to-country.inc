<?php
// Returns the real IP address of the user
function i2c_realip()
{
    // No IP found (will be overwritten by for
    // if any IP is found behind a firewall)
    $ip = false;

    // If HTTP_CLIENT_IP is set, then give it priority
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }

    // User is behind a proxy and check that we discard RFC1918 IP addresses
    // if they are behind a proxy then only figure out which IP belongs to the
    // user.  Might not need any more hackin if there is a squid reverse proxy
    // infront of apache.
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        // Put the IP's into an array which we shall work with shortly.
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = false; }

        for ($i = 0; $i < count($ips); $i++) {
            // Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and
            // 192.168.0.0/16
            // Also skip RFC 6598 IP's
            if (!preg_match('/^(?:10|100\.(?:6[4-9]|[7-9]\d|1[01]\d|12[0-7])|172\.(?:1[6-9]|2\d|3[01])|192\.168)\./', $ips[$i]) && ip2long($ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }

    // Return with the found IP or the remote address
    return $ip ?: $_SERVER['REMOTE_ADDR'];
}
