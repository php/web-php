<?php

// $Id$

// Try to remove anti-SPAM bits
function clean_AntiSPAM($email)
{
    $remove_spam = "![-_]?(NO|I[-_]?HATE|DELETE|REMOVE)[-_]?(THIS)?(ME|SPAM)?[-_]?!i";
    return preg_replace($remove_spam, "", trim($email));
}

// Try to check that this email address is valid
function is_emailable_address($email)
{
    // Exclude our mailing list hosting servers
    $hosts_regex = "!(lists\.php\.net|chek[^\.*]\.com)!i";
    $excluded_hosts = preg_match($hosts_regex, $email);

    // Email addresses need to match this pattern
    $email_regex = ":^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~ ])+" .
                   "@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~ ]+\\.)+" .
                   "[a-zA-Z]{2,6}\$:i";
    
    // If address is not under excluded hosts, and fits the regex,
    // then we belive that it is a good email address
    if (!$excluded_hosts && !empty($email)) {
        return preg_match($email_regex, $email);
    } else {
        return FALSE;
    }
}

