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

// Empty languages array, and preferred language
$LANGS = array(); $LANG = '';

// Default STRIPPED_URI
$_SERVER['STRIPPED_URI'] = $_SERVER['REQUEST_URI'];

// Explicit language is not specified
unset($EXPL_LANG);

// Specified for the request (GET/POST parameter)
if (isset($_REQUEST['lang'])) {
    $EXPL_LANG = language_add($_REQUEST['lang']);
}

// Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", $_SERVER['REQUEST_URI'], $flang)) {
    
    // Put language into preference list
    language_add($flang[1]);
    
    // Drop out langauge specification from URL, as this is already handled
    $_SERVER['STRIPPED_URI'] = preg_replace(
        "!^/$flang[1]/!", "/", $_SERVER['REQUEST_URI']
    );
    
    // No need to set $EXPL_LANG here, as no page will be displayed,
    // only a Location header is sent back to the user.
}

// Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", $_SERVER['REQUEST_URI'], $flang)) {
    $flang = language_add($flang[1]);
    if (!isset($EXPL_LANG)) {
        $EXPL_LANG = $flang;
    }
}
unset($flang);

// USER PREFERENCE HANDLING SHOULD BE ADDED HERE IN THE FUTURE

// Specified by the user via the browser's Accept Language setting
// Samples: "hu, en-us;q=0.66, en;q=0.33", "hu,en-us;q=0.5"
$browser_accept = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
foreach ($browser_accept as $langcode) {
    
    // Get language code part
    list($langcode) = @explode(";", trim($langcode));
    
    // Translation table for accept-language codes and phpdoc codes
    switch($langcode) {
        case "pt-br" : $langcode = 'pt_br'; break;
        case "zh-cn" : $langcode = 'zh'; break;
        case "zh-hk" : $langcode = 'hk'; break;
        case "zh-tw" : $langcode = 'tw'; break;
    }
    
    // We do not support flavors of languages (except the ones above)
    if (preg_match("!^(.+)-!", $langcode, $match)) {
        $langcode = $match[1];
    }
    
    // Add language to priority order
    language_add($langcode);
}
unset($browser_accept); unset($langcode); unset($match);

// Language preferred by this mirror site
language_add(default_language());

// Last default language is English
language_add("en");

// Try to find out what language is available on this mirror.
// As most of the language dependant operations involve manual
// page display (lookup, search, shortcuts), we will check for
// the index file of manuals.
foreach ($LANGS as $language) {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/manual/$language/index.php")) {
        $LANG = $language;
        break;
    }
}

// Do not pollute variable namespace
unset($LANGS); unset($language);

// Add a language to the possible languages' list
function language_add($langcode)
{
    global $LANGS, $LANGUAGES;

    // Make language code lowercase
    $langcode = strtolower($langcode);

    // The Brazilian Portuguese code needs special attention
    if ($langcode == 'pt_br') { $langcode = 'pt_BR'; }

    // Append language code in priority order if it is not
    // there already and supported by the PHP site. Try to
    // lower number of file_exists() calls to the minumum...
    if (!in_array($langcode, $LANGS) && isset($LANGUAGES[$langcode])) { $LANGS[] = $langcode; }
    
    // Return with language code
    return $langcode;
}

?>
