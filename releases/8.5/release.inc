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
            <h2 class="php8-h2" id="uri_extension">
                <?= message('uri_extension_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/url_parsing_api">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$components = parse_url('https://php.net/releases/8.4/en.php');

var_dump($components['host']);
// string(7) "php.net"
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
use Uri\Rfc3986\Uri;

$uri = new Uri('https://php.net/releases/8.5/en.php');

var_dump($uri->getHost());
// string(7) "php.net"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('uri_extension_description', $lang) ?>
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
$title = ' PHP 8.5 Released ';

$slug = strtolower(
    str_replace('.', '',
        str_replace(' ', '-',
            trim($title)
        )
    )
);

var_dump($slug); // string(15) "php-85-released"
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$title = ' PHP 8.5 Released ';

$slug = $title
    |> trim(...)
    |> (fn($str) => str_replace(' ', '-', $str))
    |> (fn($str) => str_replace('.', '', $str))
    |> strtolower(...);

var_dump($slug); // string(15) "php-85-released"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('pipe_operator_description', $lang) ?>
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
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        $values = get_object_vars($this);
        $values['alpha'] = $alpha;
        return new self(...$values);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        return clone($this, ['alpha' => $alpha]);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('clone_with_description', $lang) ?>
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
function getPhpVersion(): string
{
	return 'PHP 8.4';
}

getPhpVersion(); // No warning
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
#[\NoDiscard]
function getPhpVersion(): string
{
	return 'PHP 8.5';
}

getPhpVersion();
// Warning: The return value of function getPhpVersion() should either be used or intentionally ignored by casting it as (void)
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('no_discard_description', $lang) ?>
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
$lastEvent = $events === []
    ? null
    : $events[array_key_last($events)];
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$lastEvent = array_last($events);
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="fcc_in_const_expr">
                <?= message('fcc_in_const_expr_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/closures_in_const_expr">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/fcc_in_const_expr">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
function increment(
    int $value,
    ?Closure $incrementer = null,
): int {
    if ($incrementer === null) {
        $incrementer = addOne(...);
    }

    return $incrementer($value);
}

function addOne(int $value): int
{
    return $value + 1;
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
function increment(
    int $value,
    Closure $incrementer = addOne(...),
): int {
    return $incrementer($value);
}

function addOne(int $value): int
{
    return $value + 1;
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('fcc_in_const_expr_description', $lang) ?>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="curl_share_persistence_improvement">
                <?= message('persistent_curl_share_handles_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/curl_share_persistence">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/curl_share_persistence_improvement">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch1 = curl_init('https://php.net/');
curl_setopt($ch1, CURLOPT_SHARE, $sh);

curl_exec($ch1);
PHP
                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.5</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                                <<<'PHP'
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT
]);

$ch1 = curl_init('https://php.net/');
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// This may now reuse the connection from an earlier SAPI request
curl_exec($ch1);
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('persistent_curl_share_handles_description', $lang) ?>
            </div>
        </div>
    </section>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
                    <li><?= message('fatal_error_backtrace', $lang) ?></li>
                    <li><?= message('const_attribute_target', $lang) ?></li>
                    <li><?= message('override_attr_properties', $lang, ['<a href="/manual/' . $documentation . '/class.override.php"><code>#[\Override]</code></a>']) ?></li>
                    <li><?= message('deprecated_traits_constants', $lang, ['<a href="/manual/' . $documentation . '/class.deprecated.php"><code>#[\Deprecated]</code></a>']) ?></li>
                    <li><?= message('asymmetric_static_properties', $lang) ?></li>
                    <li><?= message('final_promoted_properties', $lang) ?></li>
                    <li><?= message('closure_getCurrent', $lang) ?></li>
                    <li><?= message('partitioned_cookies', $lang) ?></li>
                    <li><?= message('get_set_error_handler', $lang, [
                        '<a href="/manual/' . $documentation . '/function.get-error-handler.php"><code>get_error_handler()</code></a>',
                        '<a href="/manual/' . $documentation . '/function.get-exception-handler.php"><code>get_exception_handler()</code></a>',
                    ]) ?></li>
                    <li><?= message('new_dom_element_methods', $lang, [
                        '<code>Dom\Element::getElementsByClassName()</code>',
                        '<code>Dom\Element::insertAdjacentHTML()</code>',
                    ]) ?></li>
                    <li><?= message('grapheme_levenshtein', $lang, ['<code>grapheme_levenshtein()</code>']) ?></li>
                    <li><?= message('delayed_target_validation', $lang, ['<code>#[\DelayedTargetValidation]</code>']) ?></li>
                </ul>
            </div>
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>
                    <li><?= message('bc_backtick_operator', $lang, ['<code>shell_exec()</code>']) ?></li>
                    <li><?= message('bc_non_canonical_cast_names', $lang) ?></li>
                    <li><?= message('bc_disable_classes', $lang, ['<code>disable_classes</code>']) ?></li>
                    <li><?= message('bc_semicolon_after_case', $lang) ?></li>
                    <li><?= message('bc_null_array_offset', $lang, ['<code>array_key_exists()</code>']) ?></li>
                    <li><?= message('bc_class_alias_names', $lang, ['<code>class_alias()</code>']) ?></li>
                    <li><?= message('bc_sleep_wakeup', $lang, [
                        '<code>__sleep()</code>',
                        '<code>__wakeup()</code>',
                        '<code>__serialize()</code>',
                        '<code>__unserialize()</code>',
                    ]) ?></li>
                    <li><?= message('bc_casting_nan', $lang, ['<code>NAN</code>']) ?></li>
                    <li><?= message('bc_non_array_destructuring', $lang, ['<code>[]</code>', '<code>list()</code>']) ?></li>
                    <li><?= message('bc_casting_non_int_floats', $lang) ?></li>
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
