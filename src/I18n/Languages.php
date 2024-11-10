<?php

declare(strict_types=1);

namespace phpweb\I18n;

use function array_key_exists;

final class Languages
{
    /**
     * This is a list of all manual languages hosted
     * within PHP Git repositories (https://github.com/php/doc-{lang})
     */
    public const LANGUAGES = [
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

    /**
     * The following languages are inactive, which means they will not:
     * - Show up via the language select box at php.net
     * - Be selectable via my.php
     * - Accept redirections to the translation, despite ACCEPT_LANGUAGE
     * - Be listed at php.net/docs or php.net/download-docs
     * However, translation status for these languages is available at:
     * - https://doc.php.net/
     */
    public const INACTIVE_ONLINE_LANGUAGES = [
        'pl' => 'Polish',
        'ro' => 'Romanian',
    ];

    public const ACTIVE_ONLINE_LANGUAGES = [
        'en' => 'English',
        'de' => 'German',
        'es' => 'Spanish',
        'fr' => 'French',
        'it' => 'Italian',
        'ja' => 'Japanese',
        'pt_BR' => 'Brazilian Portuguese',
        'ru' => 'Russian',
        'tr' => 'Turkish',
        'uk' => 'Ukrainian',
        'zh' => 'Chinese (Simplified)',
    ];

    /**
     * Convert between language codes back and forth
     *
     * Uses non-standard languages codes and so conversion is needed when communicating with the outside world.
     *
     * Fall back to English if the language is not available.
     */
    public function convert(string $languageCode): string
    {
        return match ($languageCode) {
            'zh_cn', 'zh_CN' => 'zh',
            'pt_br', 'pt_BR' => 'pt_BR',
            default => array_key_exists($languageCode, self::LANGUAGES) ? $languageCode : 'en',
        };
    }
}
