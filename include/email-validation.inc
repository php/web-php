<?php

/*
 * email_validation.inc
 * $Id$
 */


// checks that is an *outside* host, and tries to remove anti-SPAM bits
function clean_AntiSPAM ($email) {
    $remove_spam = "[-_]?(NO|I[-_]?HATE|DELETE|REMOVE)[-_]?(THIS)?(ME|SPAM)?[-_]?";
    return eregi_replace($remove_spam,"",trim($email));
}


function is_emailable_address( $email) {
    $hosts_regex="lists\.php\.net|chek.*\.com";
    $excluded_hosts = ereg($hosts_regex,$email);
	$email_regex="^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~ ])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~ ]+\\.)+[a-zA-Z]{2,4}\$";
    if (!$excluded_hosts && $email != "") {
		return eregi($email_regex, $email);
    } else {
        return false;
    }
}
?>
