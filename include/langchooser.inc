<?php // -*- C++ -*-

// $Id$

/*

 This script tries to guess what language to use for
 language dependent operations (lookup, search, books
 page display, etc.), considering all possible factors
 affecting language selection.

 After this script run, $LANG is set to the preferred
 language, or is the empty string, if no manual is
 available on the current mirror site.
  
 $EXPL_LANG will also be set to the explicitly provided
 language, or will not exist if there are only implications
 on the preferred language.
 
 $UA_LANGS will contain the user agent language settings
 parsed as an array. The language names are corrected for
 php.net usage in this array. This is just to present to
 the user in case he would like to get information on the
 parsed language information (see /my.php).

 The $_SERVER['STRIPPED_URI'] var is also set to the
 stripped request URI (in case of a shortcut, the
 language is stipped, so the shortcut handling code
 is not bothered with it).

*/

// Default STRIPPED_URI
$_SERVER['STRIPPED_URI'] = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');

// The code is encapsulated in a function,
// so the variable namespace is not polluted
list($LANG, $EXPL_LANG, $UA_LANGS) = language_choose_code();

// Compatibility
if ($EXPL_LANG == '') { unset($EXPL_LANG); }

function language_choose_code()
{
    // Contains all the languages picked up by the
    // process in priority order (without repeating codes)
    $languages = array();

    // Default values for languages
    $explicitly_specified = ''; $selected = '';
    
    // Specified for the request (GET/POST parameter)
    if (!empty($_REQUEST['lang']) && is_string($_REQUEST['lang'])) {
        $explicitly_specified = language_add(htmlspecialchars($_REQUEST['lang'], ENT_QUOTES, 'UTF-8'), $languages);

        // Set the language in a cookie for a year
        mirror_setcookie("LAST_LANG", $explicitly_specified, 60*60*24*365);
    }

    // Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
    if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES, 'UTF-8'), $flang)) {
        
        // Put language into preference list
        $rlang = language_add($flang[1], $languages);
        
        // Set explicity specified language
        if (empty($explicitly_specified)) {
            $explicitly_specified = $rlang;
        }
        
        // Drop out langauge specification from URL, as this is already handled
        $_SERVER['STRIPPED_URI'] = preg_replace(
            "!^/$flang[1]/!", "/", htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8')
        );
    
    }

    // Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
    if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8'), $flang)) {
        
        $flang = language_add($flang[1], $languages);

        // Set explicity specified language
        if (empty($explicitly_specified)) {
            $explicitly_specified = $flang;
        }

        // Set the language in a cookie for a year
        mirror_setcookie("LAST_LANG", $flang, 60*60*24*365);
    }
    
    // Honor the users own language setting (if available)
    if (myphpnet_language()) {
        language_add(myphpnet_language(), $languages);
    }
    
    // Put the last selected language in the priority order (if available)
    if (isset($_COOKIE['LAST_LANG'])) {
        language_add($_COOKIE['LAST_LANG'], $languages);
    }

    // Specified by the user via the browser's Accept Language setting
    // Samples: "hu, en-us;q=0.66, en;q=0.33", "hu,en-us;q=0.5"
    $browser_langs = array(); $parsed_langs = array();

    // Check if we have $_SERVER['HTTP_ACCEPT_LANGUAGE'] set and
    // it no longer breaks if you only have one language set :)
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $browser_accept = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);

        // Go through all language preference specs
        for ($i = 0; $i < count($browser_accept); $i++) {
            // The language part is either a code or a code with a quality
            // We cannot do anything with a * code, so it is skipped
            // If the quality is missing, it is assumed to be 1 according to the RFC
            if (preg_match("!([a-z-]+)(;q=([0-9\\.]+))?!", trim($browser_accept[$i]), $found)) {
                $quality = (isset($found[3]) ? (float) $found[3] : 1.0);
                $browser_langs[] = array($found[1], $quality);
            }
            unset($found);
        }
    }

    // Order the codes by quality
    usort($browser_langs, "language_accept_order");

    // For all languages found in the accept-language
    foreach ($browser_langs as $langdata) {
    
        // Translation table for accept-language codes and phpdoc codes
        switch($langdata[0]) {
            case "pt-br" : $langdata[0] = 'pt_br'; break;
            case "zh-cn" : $langdata[0] = 'zh'; break;
            case "zh-hk" : $langdata[0] = 'hk'; break;
            case "zh-tw" : $langdata[0] = 'tw'; break;
        }
        
        // We do not support flavors of languages (except the ones above)
        // This is not in conformance to the RFC, but it here for user
        // convinience reasons
        if (preg_match("!^(.+)-!", $langdata[0], $match)) {
            $langdata[0] = $match[1];
        }
        
        // Add language to priority order
        $parsed_langs[] = language_add($langdata[0], $languages);
    }

    // Language preferred by this mirror site
    language_add(default_language(), $languages);

    // Last default language is English
    language_add("en", $languages);

    // Try to find out what language is available on this mirror.
    // As most of the language dependant operations involve manual
    // page display (lookup, search, shortcuts), we will check for
    // the index file of manuals.
/*
    foreach ($languages as $language) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$language/index.php")) {
            $selected = $language;
            break;
        }
    }
*/
    $selected = $languages[0];
    
    // Return with all found data
    return array($selected, $explicitly_specified, $parsed_langs);
}


// Add a language to the possible languages' list
function language_add($langcode, &$langs)
{
    global $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES, $MQ;

    // Make language code lowercase, html encode special chars and remove slashes
    $langcode = strtolower(htmlspecialchars($MQ ? stripslashes($langcode) : $langcode));

    // The Brazilian Portuguese code needs special attention
    if ($langcode == 'pt_br') { $langcode = 'pt_BR'; }

    // Append language code in priority order if it is not
    // there already and supported by the PHP site. Try to
    // lower number of file_exists() calls to the minumum...
    if (!in_array($langcode, $langs) && isset($LANGUAGES[$langcode])
        && !isset($INACTIVE_ONLINE_LANGUAGES[$langcode])) {
        $langs[] = $langcode;
    }
    
    // Return with language code
    return $langcode;
}

// Order the array of compiled
// accept-language codes by quality value
function language_accept_order($a, $b)
{
    if ($a[1] == $b[1]) { return 0; }
    return ($a[1] > $b[1]) ? -1 : 1;
}

/* vim: set noet ts=4 sw=4 ft=php: : */
