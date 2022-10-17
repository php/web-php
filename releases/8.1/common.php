<?php declare(strict_types=1);

namespace releases\php81;

include_once __DIR__ . '/../../include/prepend.inc';

function common_header(string $description): void {
    global $MYSITE;

    $meta_image_path = \htmlspecialchars(
        \filter_var($MYSITE . 'images/php8/php_8_1_released.png', \FILTER_VALIDATE_URL));
    $meta_description = \htmlspecialchars($description);

    \site_header("PHP 8.1.0 Release Announcement", [
        'current' => 'php8',
        'css' => ['php8.css'],
        'meta_tags' => <<<META
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@official_php" />
<meta name="twitter:title" content="PHP 8.1 Released" />
<meta name="twitter:description" content="{$meta_description}" />
<meta name="twitter:creator" content="@official_php" />
<meta name="twitter:image:src" content="{$meta_image_path}" />

<meta itemprop="name" content="PHP 8.1 Released" />
<meta itemprop="description" content="{$meta_description}" />
<meta itemprop="image" content="{$meta_image_path}" />

<meta property="og:image" content="{$meta_image_path}" />
<meta property="og:description" content="{$meta_description}" />
META
    ]);
}

function language_chooser(string $currentLang): void {
    $LANGUAGES = [
        'en' => 'English',
        'es' => 'Español',
        'de' => 'Deutsch',
        'pt_BR' => 'Português do Brasil',
        'ru' => 'Русский',
        'zh' => '简体中文',
        'ka' => 'ქართული',
        'ja' => '日本語',
    ];

    // Print out the form with all the options
    echo '
      <form action="" method="get" id="changelang" name="changelang">
        <fieldset>
          <label for="changelang-langs">Change language:</label>
          <select onchange="location = this.value + \'.php\'" name="lang" id="changelang-langs">
';

    $tab = '            ';
    foreach ($LANGUAGES as $lang => $text) {
        $selected = ($lang === $currentLang) ? ' selected="selected"' : '';
        echo $tab, "<option value='$lang'$selected>$text</option>\n";
    }

    echo '          </select>
        </fieldset>
      </form>
';
}

function message($code, $language = 'en')
{
    $original = require __DIR__ . '/languages/en.php';
    if (($language !== 'en') && file_exists(__DIR__ . '/languages/' . $language . '.php')) {
        $translation = require __DIR__ . '/languages/' . $language . '.php';
    }

    return $translation[$code] ?? $original[$code] ?? $code;
}
