<?php
/**
 * This file is deprecated, and it exists for backward compatibility purposes only.
 * It must be kept in sync with {@see \phpweb\I18n\Languages}.
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

$INACTIVE_ONLINE_LANGUAGES = [
    'pl' => 'Polish',
    'ro' => 'Romanian',
];

$ACTIVE_ONLINE_LANGUAGES = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);
