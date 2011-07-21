<?php // -*- C++ -*-

// $Id$

/*
 This is a list of all manual languages hosted
 within PHP SVN modules (phpdoc-{lang})

 Some codes, like "kr", "tw" and "hk" are not in
 conformance with the official language code standard!

 http://www.unicode.org/unicode/onlinedat/languages.html
*/
$LANGUAGES = array(
    'en'    => 'English',
    'ar'    => 'Arabic',
	'bg'    => 'Bulgarian',
    'pt_BR' => 'Brazilian Portuguese',
    'zh'    => 'Chinese (Simplified)',
    'hk'    => 'Chinese (Hong Kong Cantonese)',
    'tw'    => 'Chinese (Traditional)',
    'ca'    => 'Catalan',
    'cs'    => 'Czech',
    'da'    => 'Danish',
    'nl'    => 'Dutch',
    'fi'    => 'Finnish',
    'fr'    => 'French',
    'de'    => 'German',
    'el'    => 'Greek',
    'he'    => 'Hebrew',
    'hu'    => 'Hungarian',
    'id'    => 'Indonesian',
    'it'    => 'Italian',
    'ja'    => 'Japanese',
    'kr'    => 'Korean',
    'lt'    => 'Lithuanian',
    'no'    => 'Norwegian',
    'pl'    => 'Polish',
    'pt'    => 'Portuguese',
    'ro'    => 'Romanian',
    'ru'    => 'Russian',
    'fa'    => 'Persian',
    'sr'    => 'Serbian',
    'sk'    => 'Slovak',
    'sl'    => 'Slovenian',
    'es'    => 'Spanish',
    'sv'    => 'Swedish',
    'tr'    => 'Turkish',
);

/*
 The following languages are inactive, which means they will not:
 - Show up via the language select box at php.net
 - Be selectable via my.php
 - Accept redirections to the translation, despite ACCEPT_LANGUAGE
 - Be listed at php.net/docs or php.net/download-docs
 However, these languages are available on the doc dev server:
 - http://docs.php.net/
*/
$INACTIVE_ONLINE_LANGUAGES = array(
    'ar'    => 'Arabic',
    'bg'    => 'Bulgarian',
    'hk'    => 'Chinese (Hong Kong Cantonese)',
    'tw'    => 'Chinese (Traditional)',
    'ca'    => 'Catalan',
    'cs'    => 'Czech',
    'da'    => 'Danish',
    'nl'    => 'Dutch',
    'fi'    => 'Finnish',
    'el'    => 'Greek',
    'he'    => 'Hebrew',
    'hu'    => 'Hungarian',
    'id'    => 'Indonesian',
    'it'    => 'Italian',
    'kr'    => 'Korean',
    'lt'    => 'Lithuanian',
    'no'    => 'Norwegian',
    'pt'    => 'Portuguese',
    'ru'    => 'Russian',
    'sr'    => 'Serbian',
    'sk'    => 'Slovak',
    'sl'    => 'Slovenian',
    'sv'    => 'Swedish',
 );

// Used for bing search
// Details: http://msdn.microsoft.com/en-us/library/dd251064.aspx
// Note: Bing bug with en-us currently (limited results), so we're using en-ca
$LANGUAGES_MAP = array(
	'en' => 'en-ca',
	'ar' => 'ar-xa',
	'bg' => 'bg-bg',
	'zh' => 'zh-cn',
	'hk' => 'zh-hk',
	'tw' => 'zh-tw',
	'ca' => 'en-ca', // ? ca Catalan, ca-es not available (yet)
	'cs' => 'cs-cz',
	'da' => 'da-dk',
	'nl' => 'nl-nl',
	'fi' => 'fi-fi',
	'fr' => 'fr-fr',
	'de' => 'de-de',
	'el' => 'el-gr',
	'hu' => 'hu-hu',
	'it' => 'it-it',
	'ja' => 'ja-jp',
	'kr' => 'ko-kr',
	'lt' => 'lt-lt',
	'no' => 'nb-no',
	'fa' => 'en-ca', // ? fa Persian, fa-fa not available (yet)
	'pl' => 'pl-pl',
	'pt' => 'pt-pt',
	'pt_BR' => 'pt-br',
	'ro' => 'ro-ro',
	'ru' => 'ru-ru',
	'sk' => 'sk-sk',
	'sl' => 'sl-sl',
	'sr' => 'en-ca', // ? sr Serbian, sr-sr not available (yet)
	'es' => 'es-es', // ? es-xl?
	'sv' => 'sv-se',
	'tr' => 'tr-tr',
	'he' => 'he-il',
	'id' => 'en-ca', // ? id Indonesian, in-id not available (yet)
);

$ACTIVE_ONLINE_LANGUAGES = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);

// Convert between language codes back and forth
// [We use non standard languages codes and so conversion
// is needed when communicating with the outside world]
function language_convert($langcode, $to_phpweb_format = TRUE)
{
    global $LANGUAGES;
    if ($to_phpweb_format) {
        switch ($langcode) {
            case 'zh_cn': return 'zh';
            case 'zh_hk': return 'hk';
            case 'zh_tw': return 'tw';
            case 'ko'   : return 'kr';
            default:
                if (isset($LANGUAGES[$langcode])) {
                    return $langcode;
                }
                // Fallback on english if we got something wacky
                return "en";
        }
    }
    else {
        switch ($langcode) {
            case 'cn': return 'zh_cn';
            case 'hk': return 'zh_hk';
            case 'tw': return 'zh_tw';
            case 'kr': return 'ko';
            default:
                if (isset($LANGUAGES[$langcode])) {
                    return $langcode;
                }
                // Fallback on english if we got something wacky
                return "en";
        }
    }
}
