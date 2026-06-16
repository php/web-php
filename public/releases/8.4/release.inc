<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php84\common_header;
use function releases\php84\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.4/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    new FeatureComparison(
        id: 'property_hooks',
        title: message('property_hooks_title', $lang),
        description: message('property_hooks_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/property-hooks',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.core.property-hooks",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'asymmetric_visibility',
        title: message('asymmetric_visibility_title', $lang),
        description: message('asymmetric_visibility_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/asymmetric-visibility-v2',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.visibility.php#language.oop5.visibility-members-aviz",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'deprecated_attribute',
        title: message('deprecated_attribute_title', $lang),
        description: message('deprecated_attribute_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/deprecated_attribute',
            message('documentation', $lang) . "|/manual/$documentation/class.deprecated.php",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'dom_additions_html5',
        title: message('dom_additions_html5_title', $lang),
        description: message('dom_additions_html5_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/dom_additions_84',
            'RFC|https://wiki.php.net/rfc/domdocument_html5_parser',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.dom",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'bcmath',
        title: message('bcmath_title', $lang),
        description: message('bcmath_description', $lang),
        links: ['RFC|https://wiki.php.net/rfc/support_object_type_in_bcmath'],
        before: <<<'PHP'
            $num1 = '0.12345';
            $num2 = '2';
            $result = bcadd($num1, $num2, 5);

            echo $result; // '2.12345'
            var_dump(bccomp($num1, $num2) > 0); // false
            PHP,
        after: <<<'PHP'
            use BcMath\Number;

            $num1 = new Number('0.12345');
            $num2 = new Number('2');
            $result = $num1 + $num2;

            echo $result; // '2.12345'
            var_dump($num1 > $num2); // false
            PHP,
    ),
    new FeatureComparison(
        id: 'new_array_find',
        title: message('new_array_find_title', $lang),
        description: message('new_array_find_description', $lang),
        links: ['RFC|https://wiki.php.net/rfc/array_find'],
        before: <<<'PHP'
            $animal = null;
            foreach (['dog', 'cat', 'cow', 'duck', 'goose'] as $value) {
                if (str_starts_with($value, 'c')) {
                    $animal = $value;
                    break;
                }
            }

            var_dump($animal); // string(3) "cat"
            PHP,
        after: <<<'PHP'
            $animal = array_find(
                ['dog', 'cat', 'cow', 'duck', 'goose'],
                static fn(string $value): bool => str_starts_with($value, 'c'),
            );

            var_dump($animal); // string(3) "cat"
            PHP,
    ),
    new FeatureComparison(
        id: 'pdo_driver_specific_subclasses',
        title: message('pdo_driver_specific_subclasses_title', $lang),
        description: message('pdo_driver_specific_subclasses_description', $lang),
        links: ['RFC|https://wiki.php.net/rfc/pdo_driver_specific_subclasses'],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'new_without_parentheses',
        title: message('new_without_parentheses_title', $lang),
        description: message('new_without_parentheses_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/new_without_parentheses',
            message('documentation', $lang) . "|/manual/$documentation/migration84.new-features.php#migration84.new-features.core.new-chaining",
        ],
        before: <<<'PHP'
            class PhpVersion
            {
                public function getVersion(): string
                {
                    return 'PHP 8.3';
                }
            }

            var_dump((new PhpVersion())->getVersion());
            PHP,
        after: <<<'PHP'
            class PhpVersion
            {
                public function getVersion(): string
                {
                    return 'PHP 8.4';
                }
            }

            var_dump(new PhpVersion()->getVersion());
            PHP,
    ),
];

echo ReleasePage::getHeroSection(
    title: message('main_title', $lang),
    subtitle: message('main_subtitle', $lang),
    logoSvg: <<<SVG
        <svg class="hero-php-logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 451 127">
            <path fill="currentColor" fill-rule="evenodd" d="M21.7998 125.799h-21l18.7-96.0998h40.3c12.1 0 21 3.2 26.5 9.5 5.6 6.4 7.2 15.2 5 26.7-.9 4.7-2.5 9-4.6 12.9-2.2 3.9-5 7.5-8.5 10.7-4.2 3.9-8.8 6.7-13.9 8.4-5.1 1.7-11.6 2.4998-19.6 2.4998h-18l-4.9 25.4Zm45.9-76.5998c-2.7-2.9-8-4.4-15.9-4.4h-14.3l-7.8 40.3h12.7c8.4 0 14.7-1.6 18.9-4.8 4.1-3.2 6.9-8.5 8.4-15.9 1.3-7.2.6-12.2-2-15.2Z" clip-rule="evenodd"/>
            <path fill="currentColor" d="M106.6 4.09961h20.8l-5 25.59999h18.5c11.7 0 19.7 2 24.1 6.1 4.4 4.1 5.8 10.7 4 19.8L160.3 100.4h-21.1l8.3-42.6004c.9-4.8.6-8.1-1-9.9-1.6-1.8-5.1-2.6-10.4-2.6h-16.6L108.8 100.4H87.9004L106.6 4.09961Z"/>
            <path fill="currentColor" fill-rule="evenodd" d="M185.2 125.799h-21l18.7-96.0998h40.4c12.1 0 21 3.2 26.5 9.5 5.6 6.4 7.2 15.2 5 26.7-.9 4.7-2.5 9-4.6 12.9-2.2 3.9-5 7.5-8.5 10.7-4.2 3.9-8.8 6.7-13.9 8.4-5.1 1.7-11.6 2.4998-19.6 2.4998h-18l-5 25.4Zm46-76.5998c-2.7-2.9-8-4.4-15.9-4.4h-14.4l-7.8 40.3h12.7c8.4 0 14.7-1.6 18.9-4.8 4.1-3.2 6.9-8.5 8.4-15.9 1.3-7.2.7-12.2-1.9-15.2Z" clip-rule="evenodd"/>
            <path fill="currentColor" d="M317.5 48.5c-5.7-13.6-10.5-25.4-5.8-33.6 1.8-2.5 3.8-3.8 6-3.8 4.5 0 8.6 4.9 8.6 4.9l5.7 6.9-3.6-8.2c-.2-.3-6.3-14.2-17.2-14.2-3.8 0-7.8 1.7-11.7 5.1l-.1.1c-9.5 11-.2 31.8 8.1 50.1l6.1 14.2c2.8 7.3 5.6 16 3.9 22.4-2.6 10-11.5 16.8-11.6 16.9l-5.7 4.4 6.9-2.2c.7-.2 16-5.2 19.7-18.5 2.3-10.9-.6-21.8-3.5-30.2.4-.3-.4.3 0 0L318 49.1"/>
            <path fill="#6b58ff" d="m334.4 9.89961-7.1-7.8 5.1 9.29999c.1.1 6.3 11.7-1.6 25.2-2.9 4.2-7.4 8.4-13.1 12.6l-10.3 6.7c-.1-.1-.1-.2 0 0l-.4.3c-11.5 6.6-22.2 10.6-22.4 10.7-15.9 7.1-25.9 18.1-27.3 30.3-1.1 9.2004 3.2 18.2004 11.6 24.5004l.1.1c5.3 3.2 11 4.8 17 4.8 15.7 0 28-10.9 28.5-11.4l7.7-6.9-9.1 4.8c-.1 0-7.7 4-15.6 4-7.1 0-12.1-3.1-15.1-9.4-3.8-13.4004 9.5-22.6004 24.8-33.2004 2-1.4 4.1-2.9 6.2-4.3l.1-.1 9.1-6.8c.1-.2.4-.4.4-.4 7.5-6.2 17.4-15.9 19.7-29.5 1.8-12.3-7.9-23-8.3-23.49999Z"/>
            <path fill="currentColor" d="M345.4 83h19.5l-3.5 17.7h-19.5l3.5-17.7Z"/>
            <path fill="currentColor" d="M423.85546875,50.75292969c1.28125-6.44580078,2.85058594-13.86523438,4.17089844-19.10791016h-.53613281c-3.71289062,4.95507812-7.65429688,10.38720703-11.63574219,15.09375l-16.53515625,18.59521484h49.98535156l-3.00097656,15.17285156h-70.05371094l2.71289062-13.81347656,45.89941406-51.03125h24.03125l-16.90429688,85.03613281h-17.86621094l9.73242188-49.9453125Z"/>
        </svg>
        SVG,
    upgradeNow: message('upgrade_now', $lang),
);

echo ReleasePage::getFeatureComparisons($comparisons, 'PHP 8.4', 'PHP < 8.4');

?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
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
                <div>
                    <h2 id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
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
                        <li><?= message('bc_trigger_error', $lang) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php

echo ReleasePage::getPrefooter(
    title: message('footer_title', $lang),
    upgradeNow: message('upgrade_now', $lang),
    description: message('footer_description', $lang),
);

site_footer(['footer' => false]);
