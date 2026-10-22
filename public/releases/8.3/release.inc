<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php83\common_header;
use function releases\php83\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.3/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    new FeatureComparison(
        id: 'typed_class_constants',
        title: message('typed_class_constants_title', $lang),
        description: '',
        links: ['RFC|https://wiki.php.net/rfc/typed_class_constants'],
        before: <<<'PHP'
            interface I {
                // We may naively assume that the PHP constant is always a string.
                const PHP = 'PHP 8.2';
            }

            class Foo implements I {
                // But implementing classes may define it as an array.
                const PHP = [];
            }
            PHP,
        after: <<<'PHP'
            interface I {
                const string PHP = 'PHP 8.3';
            }

            class Foo implements I {
                const string PHP = [];
            }

            // Fatal error: Cannot use array as value for class constant
            // Foo::PHP of type string
            PHP,
    ),
    new FeatureComparison(
        id: 'dynamic_class_constant_fetch',
        title: message('dynamic_class_constant_fetch_title', $lang),
        description: '',
        links: ['RFC|https://wiki.php.net/rfc/dynamic_class_constant_fetch'],
        before: <<<'PHP'
            class Foo {
                const PHP = 'PHP 8.2';
            }

            $searchableConstant = 'PHP';

            var_dump(constant(Foo::class . "::{$searchableConstant}"));
            PHP,
        after: <<<'PHP'
            class Foo {
                const PHP = 'PHP 8.3';
            }

            $searchableConstant = 'PHP';

            var_dump(Foo::{$searchableConstant});
            PHP,
    ),
    new FeatureComparison(
        id: 'override_attribute',
        title: message('override_title', $lang),
        description: message('override_description', $lang),
        links: ['RFC|https://wiki.php.net/rfc/marking_overriden_methods'],
        before: <<<'PHP'
            use PHPUnit\Framework\TestCase;

            final class MyTest extends TestCase {
                protected $logFile;

                protected function setUp(): void {
                    $this->logFile = fopen('/tmp/logfile', 'w');
                }

                protected function taerDown(): void {
                    fclose($this->logFile);
                    unlink('/tmp/logfile');
                }
            }

            // The log file will never be removed, because the
            // method name was mistyped (taerDown vs tearDown).
            PHP,
        after: <<<'PHP'
            use PHPUnit\Framework\TestCase;

            final class MyTest extends TestCase {
                protected $logFile;

                protected function setUp(): void {
                    $this->logFile = fopen('/tmp/logfile', 'w');
                }

                #[\Override]
                protected function taerDown(): void {
                    fclose($this->logFile);
                    unlink('/tmp/logfile');
                }
            }

            // Fatal error: MyTest::taerDown() has #[\Override] attribute,
            // but no matching parent method exists
            PHP,
    ),
    new FeatureComparison(
        id: 'readonly_classes',
        title: message('readonly_title', $lang),
        description: message('readonly_description', $lang),
        links: ['RFC|https://wiki.php.net/rfc/readonly_amendments'],
        before: <<<'PHP'
            class PHP {
                public string $version = '8.2';
            }

            readonly class Foo {
                public function __construct(
                    public PHP $php
                ) {}

                public function __clone(): void {
                    $this->php = clone $this->php;
                }
            }

            $instance = new Foo(new PHP());
            $cloned = clone $instance;

            // Fatal error: Cannot modify readonly property Foo::$php
            PHP,
        after: <<<'PHP'
            class PHP {
                public string $version = '8.2';
            }

            readonly class Foo {
                public function __construct(
                    public PHP $php
                ) {}

                public function __clone(): void {
                    $this->php = clone $this->php;
                }
            }

            $instance = new Foo(new PHP());
            $cloned = clone $instance;

            $cloned->php->version = '8.3';
            PHP,
    ),
    new FeatureComparison(
        id: 'json_validate',
        title: message('json_validate_title', $lang),
        description: message('json_validate_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/json_validate',
            message('documentation', $lang) . "|/manual/$lang/function.json-validate.php",
        ],
        before: <<<'PHP'
            function json_validate(string $string): bool {
                json_decode($string);

                return json_last_error() === JSON_ERROR_NONE;
            }

            var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
            PHP,
        after: <<<'PHP'
            var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
            PHP,
    ),
    new FeatureComparison(
        id: 'randomizer_get_bytes_from_string',
        title: message('randomizer_getbytesfromstring_title', $lang),
        description: message('randomizer_getbytesfromstring_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/randomizer_additions#getbytesfromstring',
            message('documentation', $lang) . "|/manual/$lang/random-randomizer.getbytesfromstring.php",
        ],
        before: <<<'PHP'
            // This function needs to be manually implemented.
            function getBytesFromString(string $string, int $length) {
                $stringLength = strlen($string);

                $result = '';
                for ($i = 0; $i < $length; $i++) {
                    // random_int is not seedable for testing, but secure.
                    $result .= $string[random_int(0, $stringLength - 1)];
                }

                return $result;
            }

            $randomDomain = sprintf(
                "%s.example.com",
                getBytesFromString(
                    'abcdefghijklmnopqrstuvwxyz0123456789',
                    16,
                ),
            );

            echo $randomDomain;
            PHP,
        after: <<<'PHP'
            // A \Random\Engine may be passed for seeding,
            // the default is the secure engine.
            $randomizer = new \Random\Randomizer();

            $randomDomain = sprintf(
                "%s.example.com",
                $randomizer->getBytesFromString(
                    'abcdefghijklmnopqrstuvwxyz0123456789',
                    16,
                ),
            );

            echo $randomDomain;
            PHP,
    ),
    new FeatureComparison(
        id: 'randomizer_get_float',
        title: message('randomizer_getfloat_nextfloat_title', $lang),
        description: message('randomizer_getfloat_nextfloat_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/randomizer_additions#getfloat',
            message('documentation', $lang) . "|/manual/$lang/random-randomizer.getfloat.php",
        ],
        before: <<<'PHP'
            // Returns a random float between $min and $max, both including.
            function getFloat(float $min, float $max) {
                // This algorithm is biased for specific inputs and may
                // return values outside the given range. This is impossible
                // to work around in userland.
                $offset = random_int(0, PHP_INT_MAX) / PHP_INT_MAX;

                return $offset * ($max - $min) + $min;
            }

            $temperature = getFloat(-89.2, 56.7);

            $chanceForTrue = 0.1;
            // getFloat(0, 1) might return the upper bound, i.e. 1,
            // introducing a small bias.
            $myBoolean = getFloat(0, 1) < $chanceForTrue;
            PHP,
        after: <<<'PHP'
            $randomizer = new \Random\Randomizer();

            $temperature = $randomizer->getFloat(
                -89.2,
                56.7,
                \Random\IntervalBoundary::ClosedClosed,
            );

            $chanceForTrue = 0.1;
            // Randomizer::nextFloat() is equivalent to
            // Randomizer::getFloat(0, 1, \Random\IntervalBoundary::ClosedOpen).
            // The upper bound, i.e. 1, will not be returned.
            $myBoolean = $randomizer->nextFloat() < $chanceForTrue;
            PHP,
    ),
    new FeatureComparison(
        id: 'command_line_linter',
        title: message('command_line_linter_title', $lang),
        description: message('command_line_linter_description', $lang),
        links: [
            'PR|https://github.com/php/php-src/issues/10024',
            message('documentation', $lang) . "|/manual/$lang/features.commandline.options.php",
        ],
        before: <<<'CODE'
            php -l foo.php bar.php
            No syntax errors detected in foo.php
            CODE,
        after: <<<'CODE'
            php -l foo.php bar.php
            No syntax errors detected in foo.php
            No syntax errors detected in bar.php
            CODE,
        highlightCode: false,
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
            <path fill="currentColor" d="m379.951 86.1562 12.796-10.4921c4.602 6.0996 9.989 10.0039 18.632 10.0039 9.429 0 14.255-5.7334 14.255-11.1016 0-5.7334-3.704-8.9053-12.684-8.9053h-8.53l3.062-15.4931h9.846c7.97 0 14.817-3.7818 14.817-10.8575 0-5.0019-4.491-8.2954-10.328-8.2954-6.959 0-11.56 3.1719-17.285 8.7832l-9.541-11.833c7.408-8.2959 15.94-13.7856 28.847-13.7856 16.5 0 26.041 10.1255 26.041 22.2031 0 10.4912-5.949 18.1773-17.51 21.8369 5.5 2.44 10.663 8.2949 10.663 16.835 0 15.4932-13.02 27.4483-32.887 27.4483-16.613 0-25.592-8.1739-30.194-16.3468Z"/>
        </svg>
        SVG,
    upgradeNow: message('upgrade_now', $lang),
);

echo ReleasePage::getFeatureComparisons($comparisons, 'PHP 8.3', 'PHP < 8.3');

?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('new_dom', $lang) ?></li>
                        <li><?= message('new_intl', $lang) ?></li>
                        <li><?= message('new_ldap', $lang) ?></li>
                        <li><?= message('new_mb_str_pad', $lang) ?></li>
                        <li><?= message('new_posix', $lang) ?></li>
                        <li><?= message('new_reflection', $lang) ?></li>
                        <li><?= message('new_socket', $lang) ?></li>
                        <li><?= message('new_str', $lang) ?></li>
                        <li><?= message('new_ziparchive', $lang) ?></li>
                        <li><?= message('new_openssl_ec', $lang) ?></li>
                        <li><?= message('new_ini', $lang) ?></li>
                        <li><?= message('ini_fallback', $lang) ?></li>
                        <li><?= message('anonymous_readonly', $lang) ?></li>
                    </ul>
                </div>
                <div>
                    <h2 id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
                        <li><?= message('bc_datetime', $lang) ?></li>
                        <li><?= message('bc_arrays', $lang) ?></li>
                        <li><?= message('bc_range', $lang) ?></li>
                        <li><?= message('bc_traits', $lang) ?></li>
                        <li><?= message('bc_umultipledecimalseparators', $lang) ?></li>
                        <li><?= message('bc_mtrand', $lang) ?></li>
                        <li><?= message('bc_reflection', $lang) ?></li>
                        <li><?= message('bc_ini', $lang) ?></li>
                        <li><?= message('bc_standard', $lang) ?></li>
                        <li><?= message('bc_sqlite3', $lang) ?></li>
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
