<?php

use function releases\php83\common_header;
use function releases\php83\language_chooser;
use function releases\php83\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.3/' . $lang . '.php';

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
                <img src="/images/php8/logo_php8_3.svg" alt="PHP 8.3" height="126" width="343">
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
            <h2 class="php8-h2" id="typed_class_constants">
                <?= message('typed_class_constants_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/typed_class_constants">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
interface I {
    // We may naively assume that the PHP constant is always a string.
    const PHP = 'PHP 8.2';
}

class Foo implements I {
    // But implementing classes may define it as an array.
    const PHP = [];
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
interface I {
    const string PHP = 'PHP 8.3';
}

class Foo implements I {
    const string PHP = [];
}

// Fatal error: Cannot use array as value for class constant
// Foo::PHP of type string
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="dynamic_class_constant_fetch">
                <?= message('dynamic_class_constant_fetch_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/dynamic_class_constant_fetch">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Foo {
    const PHP = 'PHP 8.2';
}

$searchableConstant = 'PHP';

var_dump(constant(Foo::class . "::{$searchableConstant}"));
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Foo {
    const PHP = 'PHP 8.3';
}

$searchableConstant = 'PHP';

var_dump(Foo::{$searchableConstant});
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="override_attribute">
                <?= message('override_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/marking_overriden_methods">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP
                        ); ?>
                    </div>
                </div>
            </div>

            <div class="php8-compare__content">
                <?= message('override_description', $lang) ?>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                <?= message('readonly_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/readonly_amendments">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('readonly_description', $lang) ?>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="json_validate">
                <?= message('json_validate_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/json_validate">RFC</a>
                <a class="php8-rfc"
                   href="/manual/<?= $lang ?>/function.json-validate.php"><?= message('documentation', $lang) ?></a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
function json_validate(string $string): bool {
    json_decode($string);

    return json_last_error() === JSON_ERROR_NONE;
}

var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
PHP
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="php8-compare__content">
                <?= message('json_validate_description', $lang) ?>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="randomizer_get_bytes_from_string">
                <?= message('randomizer_getbytesfromstring_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/randomizer_additions#getbytesfromstring">RFC</a>
                <a class="php8-rfc"
                   href="/manual/<?= $lang ?>/random-randomizer.getbytesfromstring.php"><?= message('documentation', $lang) ?></a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP
                        ); ?>
                    </div>
                </div>
            </div>

            <div class="php8-compare__content">
                <?= message('randomizer_getbytesfromstring_description', $lang) ?>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="randomizer_get_float">
                <?= message('randomizer_getfloat_nextfloat_title', $lang) ?>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/randomizer_additions#getfloat">RFC</a>
                <a class="php8-rfc"
                   href="/manual/<?= $lang ?>/random-randomizer.getfloat.php"><?= message('documentation', $lang) ?></a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
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
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare__content">
            <?= message('randomizer_getfloat_nextfloat_description', $lang) ?>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="command_line_linter">
                <?= message('command_line_linter_title', $lang) ?>
                <a class="php8-rfc" href="https://github.com/php/php-src/issues/10024">PR</a>
                <a class="php8-rfc" href="/manual/<?= $lang ?>/features.commandline.options.php"><?= message('documentation', $lang) ?></a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <code>
php -l foo.php bar.php
No syntax errors detected in foo.php
                        </code>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.3</div>
                    <div class="php8-code phpcode">
                        <code>
php -l foo.php bar.php
No syntax errors detected in foo.php
No syntax errors detected in bar.php
                        </code>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare__content">
            <?= message('command_line_linter_description', $lang) ?>
        </div>


    </section>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
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
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>
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
