<?php

declare(strict_types=1);

namespace releases\php80;

require_once __DIR__ . '/../../../include/prepend.inc';

const LANGUAGES = [
    'en' => 'English',
    'de' => 'Deutsch',
    'es' => 'Español',
    'fr' => 'Français',
    'it' => 'Italiano',
    'ja' => '日本語',
    'nl' => 'Nederlands',
    'pt_BR' => 'Brazilian Portuguese',
    'ru' => 'Русский',
    'tr' => 'Türkçe',
    'zh' => '简体中文',
    'ka' => 'ქართული',
];

function common_header(string $description): void {
    global $MYSITE, $lang;

    $meta_image_path = \htmlspecialchars(
        \filter_var($MYSITE . 'images/php8/php_8_released.png', \FILTER_VALIDATE_URL));
    $meta_description = \htmlspecialchars($description);

    $languages = [];
    foreach (LANGUAGES as $code => $text) {
        $languages[] = ['name' => $text, 'selected' => $lang === $code, 'url' => '/releases/8.0/' . $code . '.php'];
    }

    \site_header("PHP 8.0 Release Announcement", [
        'current' => 'php85',
        'css' => ['php85.css'],
        'language_switcher' => $languages,
        'theme_switcher' => true,
        'meta_tags' => <<<META
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@official_php" />
<meta name="twitter:title" content="PHP 8.0 Released" />
<meta name="twitter:description" content="{$meta_description}" />
<meta name="twitter:creator" content="@official_php" />
<meta name="twitter:image:src" content="{$meta_image_path}" />

<meta itemprop="name" content="PHP 8.0 Released" />
<meta itemprop="description" content="{$meta_description}" />
<meta itemprop="image" content="{$meta_image_path}" />

<meta property="og:image" content="{$meta_image_path}" />
<meta property="og:description" content="{$meta_description}" />
META
    ]);
}

function message($code, $language = 'en'): string
{
    $original = require __DIR__ . '/languages/en.php';
    if (($language !== 'en') && file_exists(__DIR__ . '/languages/' . $language . '.php')) {
        $translation = require __DIR__ . '/languages/' . $language . '.php';
    }

    return $translation[$code] ?? $original[$code] ?? $code;
}
