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
            <h2 class="php8-h2" id="url_parsing_api">
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

        <div class="php8-compare">
            <h2 class="php8-h2" id="clone_with">
                <?= message('clone_with_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/clone_with_v2">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="pipe_operator">
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
    |> (fn (string $string) => str_replace(' ', '-', $string))
    |> (fn (string $string) => str_replace(['.', '/', '…'], '', $string))
    |> strtolower(...);
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="no_discard">
                <?= message('no_discard_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/marking_return_value_as_important">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="fcc_in_const_expr">
                <?= message('fcc_in_const_expr_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/fcc_in_const_expr">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="curl_share_persistence_improvement">
                <?= message('curl_share_persistence_improvement_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/curl_share_persistence">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/curl_share_persistence_improvement">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                New <code>CurlSharePersistentHandle</code> class, <code>curl_multi_get_handles()</code>, <code>curl_share_init_persistent()</code> functions are available.
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="array_first_last">
                <?= message('array_first_last_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/array_first_last">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$versions = ['PHP 8.1', 'PHP 8.2', 'PHP 8.3', 'PHP 8.4', 'PHP 8.5'];

var_dump($versions[array_key_first($versions)]); // string(7) "PHP 8.1"
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
$versions = ['PHP 8.1', 'PHP 8.2', 'PHP 8.3', 'PHP 8.4', 'PHP 8.5'];

var_dump(array_first($versions)); // string(7) "PHP 8.1"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="final_promotion">
                <?= message('final_promotion_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/final_promotion">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
class PhpVersion {
    public function __construct(
        final public string $version = 'PHP 8.4'
    ) {

    }
}

var_dump(new PhpVersion()->version); // Fatal error: Cannot use the final modifier on a parameter
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
class PhpVersion {
    public function __construct(
        final public string $version = 'PHP 8.5'
    ) {

    }
}

var_dump(new PhpVersion()->version); // string(7) "PHP 8.5"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="attributes_on_constants">
                <?= message('attributes_on_constants_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes-on-constants">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
<?php

#[NewFeatures]
const VERSION = '8.4';

var_dump(VERSION); // Parse error: syntax error, unexpected token "const"
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
<?php

#[NewFeatures]
const VERSION = '8.5';

var_dump(VERSION); // string(3) "8.5"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="override_properties">
                <?= message('override_properties_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/override_properties">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="static_aviz">
                <?= message('static_aviz_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/static-aviz">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
class PhpVersion
{
    private static string $version = '8.4';

    public function getVersion(): string
    {
        return self::$version;
    }

    public function increment(): void
    {
        [$major, $minor] = explode('.', self::$version);
        $minor++;
        self::$version = "{$major}.{$minor}";
    }
}
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
class PhpVersion
{
    public static private(set) string $version = '8.5';

    public function increment(): void
    {
        [$major, $minor] = explode('.', self::$version);
        $minor++;
        self::$version = "{$major}.{$minor}";
    }
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="deprecated_traits">
                <?= message('deprecated_traits_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/deprecated_traits">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
/**
* @deprecated 8.4 use UsePhpVersion instead
*/
trait UseVersion
{
    public function getVersion(): string
    {
        return '8.4';
    }
}
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
#[\Deprecated(
    message: "use UsePhpVersion instead",
    since: "8.5",
)]
trait UseVersion
{
    public function getVersion(): string
    {
        return '8.5';
    }
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
                    <li>New <code>#[\DelayedTargetValidation]</code> attribute is available</li>
                    <li>New <code>get_error_handler()</code>, <code>get_exception_handler()</code> functions, and <code>Closure::getCurrent</code> method are available.</li>
                    <li>New <code>Dom\Element::getElementsByClassName()</code> and <code>Dom\Element::insertAdjacentHTML()</code> methods are available.</li>
                    <li>New <code>enchant_dict_remove_from_session()</code> and <code>enchant_dict_remove()</code> functions are available.</li>
                    <li>New <code>grapheme_levenshtein()</code> function is available.</li>
                    <li>New <code>opcache_is_script_cached_in_file_cache()</code> function is available.</li>
                    <li>New <code>ReflectionConstant::getFileName()</code>, <code>ReflectionConstant::getExtension()</code>, <code>ReflectionConstant::getExtensionName()</code>, <code>ReflectionConstant::getAttributes()</code>, and <code>ReflectionProperty::getMangledName()</code> methods are available.</li>
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
