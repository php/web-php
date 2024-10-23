<?php

use function releases\php84\common_header;use function releases\php84\language_chooser;use function releases\php84\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.4/' . $lang . '.php';

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
                <img src="/images/php8/logo_php8_4.svg" alt="PHP 8.4" height="126" width="343">
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
                <?= message('property_hooks_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/property-hooks">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Locale
{
    private string $languageCode;
    private string $countryCode;
    
    public function __construct(string $languageCode, string $countryCode) {
        $this->setLanguageCode($languageCode);
        $this->setCountryCode($countryCode);
    }

    public function getLanguageCode(): string {
        return $this->languageCode;
    }

    public function setLanguageCode(string $languageCode): void {
        $this->languageCode = $languageCode;
    }

    public function getCountryCode(): string {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void {
        $this->countryCode = strtoupper($countryCode);
    }

    public function setCombinedCode(string $combinedCode): void {
        [$languageCode, $countryCode] = explode('_', $combinedCode, 2);

        $this->setLanguageCode($languageCode);
        $this->setCountryCode($countryCode);
    }

    public function getCombinedCode(): string {
        return \sprintf("%s_%s", $this->languageCode, $this->countryCode);
    }
}

$brazilianPortuguese = new Locale('pt', 'br');
var_dump($brazilianPortuguese->getCountryCode()); // BR
var_dump($brazilianPortuguese->getCombinedCode()); // pt_BR
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Locale
{
    public string $languageCode;

    public string $countryCode {
        set (string $countryCode) {
            $this->countryCode = strtoupper($countryCode);
        }
    }

    public string $combinedCode {
        get => \sprintf("%s_%s", $this->languageCode, $this->countryCode);
        set (string $value) {
            [$this->countryCode, $this->languageCode] = explode('_', $value, 2);
        }
    }

    public function __construct(string $languageCode, string $countryCode) {
        $this->languageCode = $languageCode;
        $this->countryCode = $countryCode;
    }
}

$brazilianPortuguese = new Locale('pt', 'br');
var_dump($brazilianPortuguese->countryCode); // BR
var_dump($brazilianPortuguese->combinedCode); // pt_BR
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="asymmetric_visibility">
                <?= message('asymmetric_visibility_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/asymmetric-visibility-v2">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    public string $version = '8.3';
}

$phpVersion = new PhpVersion();
var_dump($phpVersion->version); // string(3) "8.3"
$phpVersion->version = 'PHP 8.4'; // No error
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    public private(set) string $version = '8.4';
}

$phpVersion = new PhpVersion();
var_dump($phpVersion->version); // string(3) "8.4"
$phpVersion->version = 'PHP 8.3'; // Visibility error
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="deprecated_attribute">
                <?= message('deprecated_attribute_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/deprecated_attribute">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    /**
     * @deprecated 8.3 use PhpVersion::getVersion() instead
     */
    public function getPhpVersion() {
        return $this->getVersion();
    }
    
    public function getVersion() {
        return '8.3';
    }
}

$phpVersion = new PhpVersion();
// No indication that the method is deprecated.
echo $phpVersion->getPhpVersion();
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    #[\Deprecated(
        message: "use PhpVersion::getVersion() instead",
        since: "8.4"
    )]
    public function getPhpVersion() {
        return $this->getVersion();
    }
    
    public function getVersion() {
        return '8.4';
    }
}

$phpVersion = new PhpVersion();
// Deprecated: Method PhpVersion::getPhpVersion() is deprecated since 8.4, use getVersion() instead
echo $phpVersion->getPhpVersion();
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="dom_additions_84">
                <?= message('dom_additions_html5_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/dom_additions_84">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/domdocument_html5_parser">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$dom = new DOMDocument();
$dom->loadHTML(<<<HTML
<main>
    <article>PHP 8.4 is a feature-rich release!</article>
    <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
</main>
HTML, LIBXML_NOERROR);

$xpath = new DOMXPath($dom);
$node = $xpath->query(".//main/article[not(following-sibling::*)]")[0];
$classes = explode(" ", $node->className); // Simplified
var_dump(in_array("featured", $classes)); // bool(true)
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$dom = Dom\HTMLDocument::createFromString(<<<HTML
<main>
    <article>PHP 8.4 is a feature-rich release!</article>
    <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
</main>
HTML, LIBXML_NOERROR);

$node = $dom->querySelector('main > article:last-child');
var_dump($node->classList->contains("featured")); // bool(true)
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="new_array_find">
                <?= message('new_array_find_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/array_find">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$animal = null;
foreach (['dog', 'cat', 'cow', 'duck', 'goose'] as $value) {
    if (str_starts_with($value, 'c')) {
        $animal = $value;
        break;
    }
}

var_dump($animal); // string(3) "cat"
PHP
                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$animal = array_find(
    ['dog', 'cat', 'cow', 'duck', 'goose'],
    static function (string $value) {
        return str_starts_with($value, 'c');
    }
);

var_dump($animal); // string(3) "cat"
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('new_array_find_description', $lang) ?>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="pdo_driver_specific_parsers">
                <?= message('pdo_driver_specific_parsers_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/pdo_driver_specific_parsers">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$connection = new PDO(
    'sqlite:foo.db',
    $username,
    $password
); // object(PDO)

$connection->sqliteCreateFunction(
    'append_php',
    static fn($string) => 'PHP ' . $string
);

$connection->query('SELECT append_php(version) FROM php');
PHP
                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$connection = PDO::connect(
    'sqlite:foo.db',
    $username,
    $password
); // object(Pdo\Sqlite)

$connection->createFunction(
    'append_php',
    static fn($string) => 'PHP ' . $string
); // Does not exist on a mismatching driver.

$connection->query('SELECT append_php(version) FROM php');
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('pdo_driver_specific_parsers_description', $lang) ?>
            </div>
        </div>
        <div class="php8-compare">
            <h2 class="php8-h2" id="new_without_parentheses">
                <?= message('new_without_parentheses_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/new_without_parentheses">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    public function getVersion(): string {
        return 'PHP 8.3';
    }
}

var_dump((new PhpVersion())->getVersion());
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.4</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class PhpVersion
{
    public function getVersion(): string {
        return 'PHP 8.4';
    }
}

var_dump(new PhpVersion()->getVersion());
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
                    <li><?= message('new_core_functions', $lang) ?></li>
                    <li><?= message('new_bcmath_functions', $lang) ?></li>
                    <li><?= message('new_date_functions', $lang) ?></li>
                    <li><?= message('new_dom_functions', $lang) ?></li>
                    <li><?= message('new_mb_functions', $lang) ?></li>
                    <li><?= message('new_pcntl_functions', $lang) ?></li>
                    <li><?= message('new_reflection_functions', $lang) ?></li>
                    <li><?= message('new_standard_functions', $lang) ?></li>
                    <li><?= message('new_xml_functions', $lang) ?></li>
                </ul>
            </div>
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>
                    <li><?= message('bc_pecl', $lang) ?></li>
                    <li><?= message('bc_nullable_parameter_types', $lang) ?></li>
                    <li><?= message('bc_classname', $lang) ?></li>
                    <li><?= message('bc_zero_raised_to_negative_number', $lang) ?></li>
                    <li><?= message('bc_gmp', $lang) ?></li>
                    <li><?= message('bc_mysqli_constants', $lang) ?></li>
                    <li><?= message('bc_mysqli_functions', $lang) ?></li>
                    <li><?= message('bc_standard', $lang) ?></li>
                    <li><?= message('bc_core', $lang) ?></li>
                    <li><?= message('bc_warnings', $lang) ?></li>
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
