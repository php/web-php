<?php

/*
 This is a list of all manual languages hosted
 within PHP Git repositories (https://github.com/php/doc-{lang})
*/
$LANGUAGES = [
    'en' => 'English',
    'de' => 'German',
    'es' => 'Spanish',
    'fr' => 'French',
    'it' => 'Italian',
    'ja' => 'Japanese',
    'pl' => 'Polish',
    'pt_BR' => 'Brazilian Portuguese',
    'ro' => 'Romanian',
    'ru' => 'Russian',
    'tr' => 'Turkish',
    'uk' => 'Ukrainian',
    'zh' => 'Chinese (Simplified)',
];

/*
 The following languages are inactive, which means they will not:
 - Show up via the language select box at php.net
 - Be selectable via my.php
 - Accept redirections to the translation, despite ACCEPT_LANGUAGE
 - Be listed at php.net/docs or php.net/download-docs
 However, these languages are available on the doc dev server:
 - http://docs.php.net/
*/
$INACTIVE_ONLINE_LANGUAGES = [
    'pl' => 'Polish',
    'ro' => 'Romanian',
    'uk' => 'Ukrainian',
];

$ACTIVE_ONLINE_LANGUAGES = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);

// Convert between language codes back and forth
// [We use non-standard languages codes and so conversion
// is needed when communicating with the outside world]
function language_convert(string $langcode): string
{
    global $LANGUAGES;
    switch ($langcode) {
        case 'zh_cn': return 'zh';
        default:
            // Fallback on english if we got something wacky
            return array_key_exists($langcode, $LANGUAGES) ? $langcode : 'en';
    }
}
