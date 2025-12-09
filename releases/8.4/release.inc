<?php

use function releases\php84\common_header;
use function releases\php84\language_chooser;
use function releases\php84\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.4/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    [
        'id' => 'property_hooks',
        'title' => message('property_hooks_title', $lang),
        'description' => message('property_hooks_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/property-hooks',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.core.property-hooks",
        ],
        'before' => <<<'PHP'
            class Locale
            {
                private string $languageCode;
                private string $countryCode;

                public function __construct(string $languageCode, string $countryCode)
                {
                    $this->setLanguageCode($languageCode);
                    $this->setCountryCode($countryCode);
                }

                public function getLanguageCode(): string
                {
                    return $this->languageCode;
                }

                public function setLanguageCode(string $languageCode): void
                {
                    $this->languageCode = $languageCode;
                }

                public function getCountryCode(): string
                {
                    return $this->countryCode;
                }

                public function setCountryCode(string $countryCode): void
                {
                    $this->countryCode = strtoupper($countryCode);
                }

                public function setCombinedCode(string $combinedCode): void
                {
                    [$languageCode, $countryCode] = explode('_', $combinedCode, 2);

                    $this->setLanguageCode($languageCode);
                    $this->setCountryCode($countryCode);
                }

                public function getCombinedCode(): string
                {
                    return \sprintf("%s_%s", $this->languageCode, $this->countryCode);
                }
            }

            $brazilianPortuguese = new Locale('pt', 'br');
            var_dump($brazilianPortuguese->getCountryCode()); // BR
            var_dump($brazilianPortuguese->getCombinedCode()); // pt_BR
            PHP,
        'after' => <<<'PHP'
            class Locale
            {
                public string $languageCode;

                public string $countryCode
                {
                    set (string $countryCode) {
                        $this->countryCode = strtoupper($countryCode);
                    }
                }

                public string $combinedCode
                {
                    get => \sprintf("%s_%s", $this->languageCode, $this->countryCode);
                    set (string $value) {
                        [$this->languageCode, $this->countryCode] = explode('_', $value, 2);
                    }
                }

                public function __construct(string $languageCode, string $countryCode)
                {
                    $this->languageCode = $languageCode;
                    $this->countryCode = $countryCode;
                }
            }

            $brazilianPortuguese = new Locale('pt', 'br');
            var_dump($brazilianPortuguese->countryCode); // BR
            var_dump($brazilianPortuguese->combinedCode); // pt_BR
            PHP,
    ],
    [
        'id' => 'asymmetric_visibility',
        'title' => message('asymmetric_visibility_title', $lang),
        'description' => message('asymmetric_visibility_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/asymmetric-visibility-v2',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.visibility.php#language.oop5.visibility-members-aviz",
        ],
        'before' => <<<'PHP'
            class PhpVersion
            {
                private string $version = '8.3';

                public function getVersion(): string
                {
                    return $this->version;
                }

                public function increment(): void
                {
                    [$major, $minor] = explode('.', $this->version);
                    $minor++;
                    $this->version = "{$major}.{$minor}";
                }
            }
            PHP,
        'after' => <<<'PHP'
            class PhpVersion
            {
                public private(set) string $version = '8.4';

                public function increment(): void
                {
                    [$major, $minor] = explode('.', $this->version);
                    $minor++;
                    $this->version = "{$major}.{$minor}";
                }
            }
            PHP,
    ],
    [
        'id' => 'deprecated_attribute',
        'title' => message('deprecated_attribute_title', $lang),
        'description' => message('deprecated_attribute_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/deprecated_attribute',
            message('documentation', $lang) . "|/manual/$documentation/class.deprecated.php",
        ],
        'before' => <<<'PHP'
            class PhpVersion
            {
                /**
                 * @deprecated 8.3 use PhpVersion::getVersion() instead
                 */
                public function getPhpVersion(): string
                {
                    return $this->getVersion();
                }

                public function getVersion(): string
                {
                    return '8.3';
                }
            }

            $phpVersion = new PhpVersion();
            // No indication that the method is deprecated.
            echo $phpVersion->getPhpVersion();
            PHP,
        'after' => <<<'PHP'
            class PhpVersion
            {
                #[\Deprecated(
                    message: "use PhpVersion::getVersion() instead",
                    since: "8.4",
                )]
                public function getPhpVersion(): string
                {
                    return $this->getVersion();
                }

                public function getVersion(): string
                {
                    return '8.4';
                }
            }

            $phpVersion = new PhpVersion();
            // Deprecated: Method PhpVersion::getPhpVersion() is deprecated since 8.4, use PhpVersion::getVersion() instead
            echo $phpVersion->getPhpVersion();
            PHP,
    ],
    [
        'id' => 'dom_additions_html5',
        'title' => message('dom_additions_html5_title', $lang),
        'description' => message('dom_additions_html5_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/dom_additions_84',
            'RFC|https://wiki.php.net/rfc/domdocument_html5_parser',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.dom",
        ],
        'before' => <<<'PHP'
            $dom = new DOMDocument();
            $dom->loadHTML(
                <<<'HTML'
                    <main>
                        <article>PHP 8.4 is a feature-rich release!</article>
                        <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
                    </main>
                    HTML,
                LIBXML_NOERROR,
            );

            $xpath = new DOMXPath($dom);
            $node = $xpath->query(".//main/article[not(following-sibling::*)]")[0];
            $classes = explode(" ", $node->className); // Simplified
            var_dump(in_array("featured", $classes)); // bool(true)
            PHP,
        'after' => <<<'PHP'
            $dom = Dom\HTMLDocument::createFromString(
                <<<'HTML'
                    <main>
                        <article>PHP 8.4 is a feature-rich release!</article>
                        <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
                    </main>
                    HTML,
                LIBXML_NOERROR,
            );

            $node = $dom->querySelector('main > article:last-child');
            var_dump($node->classList->contains("featured")); // bool(true)
            PHP,
    ],
    [
        'id' => 'bcmath',
        'title' => message('bcmath_title', $lang),
        'description' => message('bcmath_description', $lang),
        'links' => ['RFC|https://wiki.php.net/rfc/support_object_type_in_bcmath'],
        'before' => <<<'PHP'
            $num1 = '0.12345';
            $num2 = '2';
            $result = bcadd($num1, $num2, 5);

            echo $result; // '2.12345'
            var_dump(bccomp($num1, $num2) > 0); // false
            PHP,
        'after' => <<<'PHP'
            use BcMath\Number;

            $num1 = new Number('0.12345');
            $num2 = new Number('2');
            $result = $num1 + $num2;

            echo $result; // '2.12345'
            var_dump($num1 > $num2); // false
            PHP,
    ],
    [
        'id' => 'new_array_find',
        'title' => message('new_array_find_title', $lang),
        'description' => message('new_array_find_description', $lang),
        'links' => ['RFC|https://wiki.php.net/rfc/array_find'],
        'before' => <<<'PHP'
            $animal = null;
            foreach (['dog', 'cat', 'cow', 'duck', 'goose'] as $value) {
                if (str_starts_with($value, 'c')) {
                    $animal = $value;
                    break;
                }
            }

            var_dump($animal); // string(3) "cat"
            PHP,
        'after' => <<<'PHP'
            $animal = array_find(
                ['dog', 'cat', 'cow', 'duck', 'goose'],
                static fn(string $value): bool => str_starts_with($value, 'c'),
            );

            var_dump($animal); // string(3) "cat"
            PHP,
    ],
    [
        'id' => 'pdo_driver_specific_subclasses',
        'title' => message('pdo_driver_specific_subclasses_title', $lang),
        'description' => message('pdo_driver_specific_subclasses_description', $lang),
        'links' => ['RFC|https://wiki.php.net/rfc/pdo_driver_specific_subclasses'],
        'before' => <<<'PHP'
            $connection = new PDO(
                'sqlite:foo.db',
                $username,
                $password,
            ); // object(PDO)

            $connection->sqliteCreateFunction(
                'prepend_php',
                static fn($string) => "PHP {$string}",
            );

            $connection->query('SELECT prepend_php(version) FROM php');
            PHP,
        'after' => <<<'PHP'
            $connection = PDO::connect(
                'sqlite:foo.db',
                $username,
                $password,
            ); // object(Pdo\Sqlite)

            $connection->createFunction(
                'prepend_php',
                static fn($string) => "PHP {$string}",
            ); // Does not exist on a mismatching driver.

            $connection->query('SELECT prepend_php(version) FROM php');
            PHP,
    ],
    [
        'id' => 'new_without_parentheses',
        'title' => message('new_without_parentheses_title', $lang),
        'description' => message('new_without_parentheses_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/new_without_parentheses',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.core.new-chaining",
        ],
        'before' => <<<'PHP'
            class PhpVersion
            {
                public function getVersion(): string
                {
                    return 'PHP 8.3';
                }
            }

            var_dump((new PhpVersion())->getVersion());
            PHP,
        'after' => <<<'PHP'
            class PhpVersion
            {
                public function getVersion(): string
                {
                    return 'PHP 8.4';
                }
            }

            var_dump(new PhpVersion()->getVersion());
            PHP,
    ],
];

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

    <?= feature_comparisons($comparisons, 'PHP 8.4', 'PHP < 8.4') ?>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
                    <li><?= message('new_lazy_objects', $lang) ?></li>
                    <li><?= message('new_jit_implementation', $lang) ?></li>
                    <li><?= message('new_core_functions', $lang) ?></li>
                    <li><?= message('new_bcmath_functions', $lang) ?></li>
                    <li><?= message('new_round_modes', $lang) ?></li>
                    <li><?= message('new_date_functions', $lang) ?></li>
                    <li><?= message('new_mb_functions', $lang) ?></li>
                    <li><?= message('new_pcntl_functions', $lang) ?></li>
                    <li><?= message('new_reflection_functions', $lang) ?></li>
                    <li><?= message('new_standard_functions', $lang) ?></li>
                    <li><?= message('new_xml_functions', $lang) ?></li>
                    <li><?= message('new_grapheme_function', $lang) ?></li>
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
                    <li><?= message('bc_round', $lang) ?></li>
                    <li><?= message('bc_typed_constants', $lang) ?></li>
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
