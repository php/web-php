<?php // -*- C++ -*-

// $Id$

/*
 This is a list of all manual languages hosted
 on a full PHP.net mirror site

 Some codes, like "kr", "tw" and "hk" are not in
 conformance with the official language code standard!

 http://www.unicode.org/unicode/onlinedat/languages.html
*/
$LANGUAGES = array(
    'en'    => 'English',
    'ar'    => 'Arabic',
    'pt_BR' => 'Brazilian Portuguese',
    'zh'    => 'Chinese (Simplified)',
    'hk'    => 'Chinese (Hong Kong Cantonese)',
    'tw'    => 'Chinese (Traditional)',
    'cs'    => 'Czech',
    'da'    => 'Danish',
    'nl'    => 'Dutch',
    'fi'    => 'Finnish',
    'fr'    => 'French',
    'de'    => 'German',
    'el'    => 'Greek',
    'he'    => 'Hebrew',
    'hu'    => 'Hungarian',
    'it'    => 'Italian',
    'ja'    => 'Japanese',
    'kr'    => 'Korean',
    'pl'    => 'Polish',
    'ro'    => 'Romanian',
    'ru'    => 'Russian',
    'sk'    => 'Slovak',
    'es'    => 'Spanish',
    'sv'    => 'Swedish',
);

$INACTIVE_ONLINE_LANGUAGES = array(
    'ar' => 'Arabic',
);

// Convert between language codes back and forth
// [We use non standard languages codes and so conversion
// is needed when communicating with the outside world]
function language_convert($langcode, $to_phpweb_format = TRUE)
{
    if ($to_phpweb_format) {
        switch ($langcode) {
            case 'zh_cn': return 'zh';
            case 'zh_hk': return 'hk';
            case 'zh_tw': return 'tw';
            case 'ko'   : return 'kr';
            default:      return $langcode;
        }
    }
    else {
        switch ($langcode) {
            case 'cn': return 'zh_cn';
            case 'hk': return 'zh_hk';
            case 'tw': return 'zh_tw';
            case 'kr': return 'ko';
            default:   return $langcode;
        }
    }
}
