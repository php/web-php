<?php

use function releases\php85\common_header;use function releases\php85\language_chooser;use function releases\php85\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.5/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

?>
    <section class="php8-section php8-section_dark php8-section_header center">
        <div class="page-tools">
            <div class="change-language">
                <?php language_chooser($lang); ?>
            </div>
        </div>
        <div class="php8-section__content">
            <div class="php8-logo">
                <img src="/images/php8/logo_php8_5.svg" alt="PHP 8.5" height="126" width="343">
            </div>
            <div class="php8-title"><?= message('main_title', $lang) ?></div>
            <div class="php8-subtitle"><?= message('main_subtitle', $lang) ?></div>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads"><?= message('upgrade_now', $lang) ?></a>
            </div>
        </div>
    </section>

    <section class="php8-section center">
        <div class="php8-compare">
            <h2 class="php8-h2" id="property_hooks">
                <?= message('pipe_operator_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/pipe-operator-v3">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$input = ' Some kind of string. ';

$output = strtolower(
    str_replace(['.', '/', '…'], '',
        str_replace(' ', '-',
            trim($input)
        )
    )
);
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents" style="display: table;">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode" style="display: table-cell;">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$input = ' Some kind of string. ';

$output = $input
    |> trim(...)
    |> fn (string $string) => str_replace(' ', '-', $string)
    |> fn (string $string) => str_replace(['.', '/', '…'], '', $string)
    |> strtolower(...);
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="property_hooks">
                <?= message('url_parsing_api_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/url_parsing_api">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$components = parse_url("https://php.net/releases/8.5/en.php");

var_dump($components['host']); // string(7) "php.net"
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents" style="display: table;">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode" style="display: table-cell;">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$uri = new Uri\Rfc3986\Uri("https://php.net/releases/8.5/en.php");

var_dump($uri->getHost()); // string(7) "php.net"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('url_parsing_api_description', $lang) ?>
            </div>
        </div>
    </section>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>

                </ul>
            </div>
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>

                </ul>
            </div>
        </div>
    </section>

    <section class="php8-section php8-section_dark php8-section_footer php8-footer">
        <div class="php8-section__content">
            <h2 class="php8-h2 center"><?= message('footer_title', $lang) ?></h2>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads"><?= message('upgrade_now', $lang) ?></a>
            </div>
            <div class="php8-footer__content"><?= message('footer_description', $lang) ?></div>
        </div>
    </section>

<?php

site_footer();
