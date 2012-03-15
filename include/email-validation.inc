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

/**
 * Basic blacklisting.
 * Add email addresses, domains, or partial-match patterns
 * to $mosquitoes array to blacklist.
 * CAUTION: Be sure anything you add here won't partially
 * match legitimate email addresses!  For example:
 *     spamsend
 * .... will match:
 *     real_person@thisispamsendoftheweb.example.com
 */
function blacklisted($email) {
    $mosquitoes = array(
        'saradhaaa@gmail.com',
        'mg-tuzi@yahoo.com.cn',
        'bitlifesciences',
        'bitconferences',
	'grandeurhk',
	'legaladvantagellc',
	'sanath7285',
	'omicsgroup',
	'@sina.com',
	'omicsonline',
	'bit-ibio',
	'evabrianparker',
	'bitpetrobio',
    );
    foreach ($mosquitoes as $m) {
        if (preg_match('/'.$m.'/i',$email)) return true;
    }
}
