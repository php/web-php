<?php

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

use phpweb\I18n\Languages;
use phpweb\LangChooser;

require_once __DIR__ . '/../src/autoload.php';

// Default STRIPPED_URI
$_SERVER['STRIPPED_URI'] = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');

// The code is encapsulated in a function,
// so the variable namespace is not polluted
list($LANG, $EXPL_LANG) = (new LangChooser(Languages::LANGUAGES, Languages::INACTIVE_ONLINE_LANGUAGES, $userPreferences->languageCode, default_language() ?: ''))->chooseCode(
    $_REQUEST['lang'] ?? null,
    $_SERVER['REQUEST_URI'],
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null,
);

// Compatibility
if ($EXPL_LANG == '') { unset($EXPL_LANG); }
