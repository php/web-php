<?php
/* $Id: */
/**
 * Simple SPAM control functions.
 * 27-APR-2010 <danbrown>
 */


/**
 * Block specific static IP addresses known to do nothing
 * but make our lives more difficult.  27-APR-2010 <danbrown>
 * Expects: $ip
 * Returns: $ip on blacklist, false on clear.
 */
function kill_spammer($ip) {

        // Bad IPs
        $bad = array(
                '66.51.252.15',
        );

        // If the IP is blocked, return the IP address.
        if (in_array($ip,$bad)) {
                return $ip;
        }

        return false;
}
