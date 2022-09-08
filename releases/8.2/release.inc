<?php

use function releases\php82\common_header;
use function releases\php82\language_chooser;
use function releases\php82\language_redirect;
use function releases\php82\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.2/' . $lang . '.php';

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
                <img src="/images/php8/logo_php8_2.svg" alt="PHP 8.2" height="126" width="343">
            </div>
            <div class="php8-title">Released!</div>
            <div class="php8-subtitle">
                PHP 8.2 is a major update of the PHP language.<br class="display-none-md"> It
                contains many new features, including readonly classes, null, false, and true as stand-alone types,
                deprecated dynamic properties, performance improvements and more
            </div>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads">Upgrade to PHP 8.2 now!</a>
            </div>
        </div>
    </section>

    <section class="php8-section center">
        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Readonly classes
                <a class="php8-rfc" href="https://wiki.php.net/rfc/readonly_classes">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class BlogData
{
    public readonly string $title;

    public readonly Status $status;

    public function __construct(string $title, Status $status)
    {
        $this->title = $title;
        $this->status = $status;
    }
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
readonly class BlogData
{
    public string $title;

    public Status $status;

    public function __construct(string $title, Status $status)
    {
        $this->title = $title;
        $this->status = $status;
    }
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Allow <code>null</code>, <code>false</code>, and <code>true</code> as stand-alone types
                <a class="php8-rfc" href="https://wiki.php.net/rfc/null-false-standalone-types">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/true-type">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Falsy
{
    public function almostFalse(): string|bool { /* ... */ *}

    public function almostTrue(): string|bool { /* ... */ *}

    public function almostNull(): string|null { /* ... */ *}
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Falsy
{
    public function alwaysFalse(): false { /* ... */ *}

    public function alwaysTrue(): true { /* ... */ *}

    public function alwaysNull(): null { /* ... */ *}
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Disjunctive Normal Form Types
                <a class="php8-rfc" href="https://wiki.php.net/rfc/dnf_types">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Foo {
    public function bar(mixed $entity) {
        if ($entity === null) {
            return null;
        }

        if (($entity instanceof A) && ($entity instanceof B)) {
            return $entity;
        }

        throw new Exception('Invalid entity');
    }
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class Foo {
    public function bar((A & B) | null $entity) {
        if ($entity === null) {
            return null;
        }

        return $entity;
    }
}
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare__content">
            DNF types allow us to combine <a
                    href="/manual/en/language.types.declarations.php#language.types.declarations.composite.union">union</a>
            and <a href="/manual/en/language.types.declarations.php#language.types.declarations.composite.intersection">intersection</a>
            types, following a strict rule:
            when combining union and intersection types, intersection types must be grouped with brackets.
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Deprecate dynamic properties
                <a class="php8-rfc" href="https://wiki.php.net/rfc/deprecate_dynamic_properties">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class User
{
    public $name;
}

$user = new User();
$user->last_name = 'Doe';

$user = new stdClass();
$user->last_name = 'Doe';
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
class User
{
    public $name;
}

$user = new User();
$user->last_name = 'Doe'; // Deprecated notice

$user = new stdClass();
$user->last_name = 'Doe'; // Still allowed
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare__content">
            You can use the <code>#[AllowDynamicProperties]</code> attribute on classes that should still allow those
            properties. <code>stdClass</code> and <code>__get</code>/<code>__set</code> are not affected.
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Constants in traits
                <a class="php8-rfc" href="https://wiki.php.net/rfc/constants_in_traits">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
trait Foo
{
    public const CONSTANT = 1;

    public function bar(): int
    {
        return self::CONSTANT; // Fatal error
    }
}

class Bar
{
    use Foo;
}
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
trait Foo
{
    public const CONSTANT = 1;

    public function bar(): int
    {
        return self::CONSTANT; // Fatal error
    }
}

class Bar
{
    use Foo;
}

var_dump(Bar::CONSTANT); // 1
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare__content">
            You cannot access the constant through the name of the trait,
            but, you can access the constant through the class that uses the trait.
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                Deprecate <code>${}</code> string interpolation
                <a class="php8-rfc" href="https://wiki.php.net/rfc/deprecate_dollar_brace_string_interpolation">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
var_dump("Hello {$world}");
var_dump("Hello $world");
var_dump("Hello ${world}");
var_dump("Hello ${(world)}");
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
var_dump("Hello {$world}");
var_dump("Hello $world");
var_dump("Hello ${world}"); // Deprecated notice
var_dump("Hello ${(world)}"); // Deprecated notice
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="readonly_classes">
                New <code>Random</code> extension
                <a class="php8-rfc" href="https://wiki.php.net/rfc/rng_extension">RFC</a>
                <a class="php8-rfc" href="https://wiki.php.net/rfc/random_extension_improvement">RFC</a>
            </h2>
            <div class="php8-compare__main">
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label">PHP &lt; 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$array = ['foo', 'bar', 'baz'];

mt_srand(1234, MT_RAND_PHP);
$single = array_rand($array); // (int) 0
$multiple = array_rand($array, 2); // (array) [1, 2]
PHP

                        ); ?>
                    </div>
                </div>
                <div class="php8-compare__arrow"></div>
                <div class="php8-compare__block example-contents">
                    <div class="php8-compare__label php8-compare__label_new">PHP 8.2</div>
                    <div class="php8-code phpcode">
                        <?php highlight_php_trimmed(
                            <<<'PHP'
$array = ['foo', 'bar', 'baz'];

$engine = new Random\Engine\Mt19937(1234, MT_RAND_PHP);
$randomizer = new Random\Randomizer($engine);
$single = $randomizer->pickArrayKeys($array, 1)[0]; // (int) 0
 // or: [$single] = $randomizer->pickArrayKeys($array, 1);
$multiple = $randomizer->pickArrayKeys($array, 2); // (array) [1, 2]
PHP
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="php8-compare__content">
            <p>The new <code>random</code> extension organizes and consolidates the existing PHP functionality
                related to random number generation.</p>
            <p>One of the most important new additions with the new <code>random</code> extension
                is the <code>Random\Randomizer</code> class. It is meant to provide an object-oriented API
                to access all Random Number generation functionality with a choice of Pseudo Random Number Generator
                algorithm, which can be swapped out with a new implementation.</p>
        </div>
    </section>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="performance_improvements">Performance Improvements</h2>

        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things">New Classes, Interfaces, and Functions</h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
                    <li>New <code>mysqli_execute_query</code> function and <code>mysqli::execute_query</code> method.
                    </li>
                    <li>New <code>#[AllowDynamicProperties]</code> and <code>#[\SensitiveParameter]</code> attributes.
                    </li>
                    <li>New <code>curl_upkeep</code> function.</li>
                    <li>New <code>ZipArchive::getStreamIndex</code>, <code>ZipArchive::getStreamName</code>, and <code>ZipArchive::clearError</code>
                        methods.
                    </li>
                    <li>New <code>memory_reset_peak_usage</code> function.</li>
                    <li>New <code>sodium_crypto_stream_xchacha20_xor_ic</code> function.</li>
                </ul>
            </div>
            <h2 class="php8-h2 php8-h2_margin-top" id="deprecations_and_bc_breaks">
                Deprecations and backward compatibility breaks
            </h2>
            <div class="php8-compare__content">
                <ul>
                    <li>Deprecated <code>utf8_encode</code> and <code>utf8_decode</code> functions.</li>
                    <li>Methods <code>DateTime::createFromImmutable</code> and <code>DateTimeImmutable::createFromMutable</code>
                        has a tentative return type of <code>static</code>.
                    </li>
                    <li>Extensions <code>ODBC</code> and <code>PDO_ODBC</code> escapes the username and password.</li>
                    <li>Functions <code>strtolower</code> and <code>strtoupper</code> are locale-sensitive.</li>
                    <li>Methods <code>SplFileInfo::_bad_state_ex</code>, <code>SplFileObject::getCsvControl</code>,
                        <code>SplFileObject::fflush</code>,
                        <code>SplFileObject::ftell</code>, <code>SplFileObject::fgetc</code>,and <code>SplFileObject::fpassthru</code>
                        enforces their signature.
                    </li>
                    <li>Method <code>SplFileObject::hasChildren</code> has a tentative return type of <code>false</code>.
                    </li>
                    <li>Method <code>SplFileObject::getChildren</code> has a tentative return type of <code>null</code>.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="php8-section php8-section_dark php8-section_footer php8-footer">
        <div class="php8-section__content">
            <h2 class="php8-h2 center">Better performance, better syntax, improved type safety.</h2>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads">Upgrade to PHP 8.2 now!</a>
            </div>
            <div class="php8-footer__content">
                <p>
                    For source downloads of PHP 8.2 please visit the <a
                            href="https://www.php.net/downloads">downloads</a> page.
                    Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a>
                    site.
                    The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#PHP_8_2">ChangeLog</a>.
                </p>
                <p>
                    The <a href="/manual/en/migration82.php">migration guide</a> is available in the PHP Manual. Please
                    consult it for a detailed list of new features and backward-incompatible changes.
                </p>
            </div>
        </div>
    </section>

<?php

site_footer();
