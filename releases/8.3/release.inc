<?php

use function releases\php83\common_header;
use function releases\php83\language_chooser;
use function releases\php83\language_redirect;
use function releases\php83\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.3/' . $lang . '.php';

include_once __DIR__ . '/common.php';

language_redirect($lang);

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
                <img src="/images/php8/logo_php8_2.svg" alt="PHP 8.3" height="126" width="343">
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
            <h2 class="php8-h2" id="readonly_classes">
                Readonly amendments
                <a class="php8-rfc" href="https://wiki.php.net/rfc/readonly_amendments">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="typed_class_constants">
                Typed class constants
                <a class="php8-rfc" href="https://wiki.php.net/rfc/typed_class_constants">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
// TODO
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
// TODO
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="override_attribute">
                <code>#[\Override]</code> attribute
                <a class="php8-rfc" href="https://wiki.php.net/rfc/marking_overriden_methods">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
use PHPUnit\Framework\TestCase;
 
final class MyTest extends TestCase
{
    protected $logFile;

    protected function setUp(): void
    {
        $this->logFile = fopen('/tmp/logfile', 'w');
    }

    protected function taerDown(): void
    {
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
// TODO
use PHPUnit\Framework\TestCase;
 
final class MyTest extends TestCase
{
    protected $logFile;

    protected function setUp(): void
    {
        $this->logFile = fopen('/tmp/logfile', 'w');
    }

    #[\Override]
    protected function taerDown(): void
    {
        fclose($this->logFile);
        unlink('/tmp/logfile');
    }
}

// Fatal error: MyTest::taerDown() has #[\Override] attribute,
// but no matching parent method exists
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="randomizer_get_bytes_from_string">
                New <code>Randomizer::getBytesFromString</code> method
                <a class="php8-rfc" href="https://wiki.php.net/rfc/randomizer_additions#getbytesfromstring">RFC</a>
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
        $result .= $string[random_int(0, $stringLength - 1)]);
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
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="randomizer_get_float">
                New <code>Randomizer::getFloat</code> and <code>Randomizer::nextFloat</code> methods
                <a class="php8-rfc" href="https://wiki.php.net/rfc/randomizer_additions#getfloat">RFC</a>
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
$myBoolean = $randomizer->nextFloat(); < $chanceForTrue;
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare__content">
            The algorithm used is the γ-section algorithm as published in:
            <a href="https://doi.org/10.1145/3503512" target="_blank" rel="noopener noreferrer">Drawing Random
                Floating-Point Numbers from an Interval</a>.
            Frédéric Goualard, ACM Trans. Model. Comput. Simul., 32:3, 2022.
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="dynamic_class_constant_fetch">
                Dynamic class constant fetch
                <a class="php8-rfc" href="https://wiki.php.net/rfc/dynamic_class_constant_fetch">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.3</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
// TODO
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
// TODO
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
                    <li>New <code>json_validate</code> function.</li>
                    <li>New <code>ldap_connect_wallet</code>, and <code>ldap_exop_sync</code> functions.</li>
                    <li>New <code>mb_str_pad</code> function.</li>
                    <li>New <code>posix_sysconf</code>, <code>posix_pathconf</code>, <code>posix_fpathconf</code>, and
                        <code>posix_eaccess</code> functions.
                    </li>
                    <li>New <code>ReflectionMethod::createFromMethodName</code> method.</li>
                    <li>New <code>socket_atmark</code> function.</li>
                    <li>New <code>str_increment</code>, <code>str_decrement</code>, and
                        <code>stream_context_set_options</code> functions.
                    </li>
                    <li>New <code>ZipArchive::getArchiveFlag</code> function.</li>
                </ul>
            </div>
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>
                    <li>More Appropriate Date/Time Exceptions.</li>
                    <li>Negative indices in arrays.</li>
                    <li>Changes to the <code>range</code> function.</li>
                    <li>Traits and static properties.</li>
                    <li>The <code>U_MULTIPLE_DECIMAL_SEPERATORS</code> constant had been deprecated in favor of <code>U_MULTIPLE_DECIMAL_SEPARATORS</code>.</li>
                    <li>The <code>MT_RAND_PHP</code> Mt19937 variant is deprecated.</li>
                    <li><code>ReflectionClass::getStaticProperties</code> is no longer nullable.</li>
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
