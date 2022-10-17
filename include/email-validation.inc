<?php

// Try to remove anti-SPAM bits
function clean_AntiSPAM($email)
{
    $remove_spam = "![-_]?(NO|I[-_]?HATE|DELETE|REMOVE)[-_]?(THIS)?(ME|SPAM)?[-_]?!i";
    return preg_replace($remove_spam, "", trim($email));
}

// Try to check that this email address is valid
function is_emailable_address($email)
{
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    // No email, no validation
    if (! $email) {
        return false;
    }

    $host = substr($email, strrpos($email, '@') + 1);
    // addresses from our mailing-list servers
    $host_regex = "!(lists\.php\.net|chek[^.*]\.com)!i";
    if (preg_match($host_regex, $host)) {
        return false;
    }

    // When no MX-Entry can be found it's for sure not a valid email-address.
    if (getmxrr($host, $return_values) === false) {
        return false;
    }

    return true;
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
    $mosquitoes = [
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
        'cogzidel',
        'vaccinecon',
        'bit-ica',
        'geki@live.cl',
        'wcd-bit',
        'bit-pepcon',
        'proformative.com',
        'bitcongress',
        'medifest@gmail.com',
        '@sina.cn',
        'wcc-congress',
        'albanezi',
        'supercoderarticle',
        'somebody@hotmail.com',
        'bit-cloudcon',
        'eclinicalcentral',
        'iddst.com',
        'achromicpoint.com',
        'wcgg-bit',
        '@163.com',
        'a-hassani2011@live.fr',
        'analytix-congress',
        'nexus-irc',
        'bramyao23',
        'dbmall27@gmail.com',
        'robinsonm750@gmail.com',
        'enu.kz',
        'isim-congress',
        '.*cmcb.*',
        'molmedcon',
        'agbtinternational',
        'biosensors',
        'conferenceseries.net',
        'wirelesscommunication',
        'clinicalpharmacy',
        'antibiotics',
        'globaleconomics',
        'sandeepsingh.torrent117232@gmail.com',
        'herbals',
        'europsychiatrysummit',
        'antibodies',
        'graduatecentral',
        'a@a.com',
        '@insightconferences.com',
        '@conferenceseries.com',
    ];
    foreach ($mosquitoes as $m) {
        if (preg_match('/' . preg_quote($m, '/') . '/i',$email)) return true;
    }
}
