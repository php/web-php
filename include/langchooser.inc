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

*/

// Empty languages array, and preferred language
$LANGS = array(); $LANG = '';

// Specified for the request (GET/POST parameter)
if (isset($_REQUEST['lang'])) { language_add($_REQUEST['lang']); }

// Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", $_SERVER['REQUEST_URI'], $flang)) {
    language_add($flang[1]);
}

// Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", $_SERVER['REQUEST_URI'], $flang)) {
    language_add($flang[1]);
}

// USER PREFERENCE HANDLING SHOULD BE ADDED HERE IN THE FUTURE

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
    global $LANGS;

    // Make language code lowercase
    $langcode = strtolower($langcode);

    // The Brazilian Portuguese code needs special attention
    if ($langcode == 'pt_br') { $langcode = 'pt_BR'; }

    // Append language code in priority order
    // if it is not there already [try to lower number
    // of file_exists() calls to minumum]
    if (!in_array($langcode, $LANGS)) { $LANGS[] = $langcode; }
}

?>
