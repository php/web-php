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
 
 The $_SERVER['STRIPPED_URI'] var is also set to the
 stripped request URI (in case of a shortcut, the
 language is stipped, so the shortcut handling code
 is not bothered with it).

*/

// Default STRIPPED_URI
$_SERVER['STRIPPED_URI'] = $_SERVER['REQUEST_URI'];

// The code is encapsulated in a function,
// so the variable namespace is not polluted
list($LANG, $EXPL_LANG) = language_choose_code();

// Compatibility
if ($EXPL_LANG == '') { unset($EXPL_LANG); }

function language_choose_code()
{
    global $_REQUEST, $_SERVER;
    
    // Contains all the languages picked up by the
    // process in priority order (without repeating codes)
    $languages = array();

    // Default values for languages
    $explicitly_specified = ''; $selected = '';
    
    // Specified for the request (GET/POST parameter)
    if (isset($_REQUEST['lang'])) {
        $explicitly_specified = language_add($_REQUEST['lang'], $languages);
    }

    // Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
    if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", $_SERVER['REQUEST_URI'], $flang)) {
        
        // Put language into preference list
        language_add($flang[1], $languages);
        
        // Drop out langauge specification from URL, as this is already handled
        $_SERVER['STRIPPED_URI'] = preg_replace(
            "!^/$flang[1]/!", "/", $_SERVER['REQUEST_URI']
        );
        
        // No need to set $explicitly_specified here, as no page will
        // be displayed, only a Location header is sent back to the user.
    }

    // Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
    if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", $_SERVER['REQUEST_URI'], $flang)) {
        $flang = language_add($flang[1], $languages);
        if (empty($explicitly_specified)) {
            $explicitly_specified = $flang;
        }
    }

    // Specified by the user via the browser's Accept Language setting
    // Samples: "hu, en-us;q=0.66, en;q=0.33", "hu,en-us;q=0.5"
    $browser_accept = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $browser_langs = array();
    
    // Go through all language preference specs
    foreach ($browser_accept as $langpref) {
        
        // The language part is either a code or a code with a quality
        // We cannot do anything with a * code, so it is skipped
        // If the quality is missing, it is assumed to be 1 according to the RFC
        if (preg_match("!([a-z-]+)(;q=([0-9\\.]+))?!", trim($langpref), $found)) {
            $quality = (isset($found[3]) ? (float) $found[3] : 1.0);
            $browser_langs[] = array($found[1], $quality);
        }
        unset($found);
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
        language_add($langdata[0], $languages);
    }

    // Language preferred by this mirror site
    language_add(default_language(), $languages);

    // Last default language is English
    language_add("en", $languages);

    // Try to find out what language is available on this mirror.
    // As most of the language dependant operations involve manual
    // page display (lookup, search, shortcuts), we will check for
    // the index file of manuals.
    foreach ($languages as $language) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$language/index.php")) {
            $selected = $language;
            break;
        }
    }
    
    // Return with all found data
    return array($selected, $explicitly_specified);
}


// Add a language to the possible languages' list
function language_add($langcode, &$langs)
{
    global $LANGUAGES;

    // Make language code lowercase
    $langcode = strtolower($langcode);

    // The Brazilian Portuguese code needs special attention
    if ($langcode == 'pt_br') { $langcode = 'pt_BR'; }

    // Append language code in priority order if it is not
    // there already and supported by the PHP site. Try to
    // lower number of file_exists() calls to the minumum...
    if (!in_array($langcode, $langs) && isset($LANGUAGES[$langcode])) {
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
