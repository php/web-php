<?php
$_SERVER['BASE_PAGE'] = 'releases/8.1/en.php';
include_once __DIR__ . '/common.php';

releases\php81\language_redirect('en');

releases\php81\common_header(
    'PHP 8.1 is a major update of the PHP language. ' .
    'enums, readonly properties, first-class callable syntax, ' .
    'fibers, intersection types, performance improvements and more.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php81\language_chooser('en'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8_1.svg" alt="php8.1" height="126" width="343">
    </div>
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
        PHP 8.1 is a major update of the PHP language.
        <br class="display-none-md"> It contains many new features and optimizations including enums, readonly&nbsp;properties, first-class&nbsp;callable&nbsp;syntax, fibers, intersection&nbsp;types, performance improvements and more.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Upgrade to PHP 8.1 now!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="enumerations">
        Enumerations
      <a class="php8-rfc" href="https://wiki.php.net/rfc/enumerations">RFC</a> <a class="php8-rfc" href="/manual/en/language.enumerations.php">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class Status
{
    const DRAFT = 'draft';
    const PUBLISHED = 'published';
    const ARCHIVED = 'archived';
}
acceptStatus(string $status) {...}
PHP

            );?>
        </div>


      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
enum Status
{
    case draft;
    case published;
    case archived;
}
acceptStatus(Status $status) {...}
PHP

            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
        Use instead of set of constants and get validation out of the box.
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="readonly_properties">
        Readonly Properties
      <a class="php8-rfc" href="https://wiki.php.net/rfc/readonly_properties_v2">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class BlogData
{
    private Status $status;
   
    public function __construct(Status $status) 
    {
        $this->status = $status;
    }
    
    public function getStatus(): Status 
    {
        return $this->status;    
    }
}
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(<<<'PHP'
class BlogData
{
    public function __construct(
        public readonly Status $status
    ) {}
}
PHP);?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Readonly properties cannot be changed after initialization, i.e. after a value is assigned to them. <br>
          They are a great way to model value objects and data-transfer objects.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="first_class_callable_syntax">
        First-class Callable Syntax
      <a class="php8-rfc" href="https://wiki.php.net/rfc/first_class_callable_syntax">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
$foo = [$this, 'foo'];

$fn = Closure::fromCallable('strlen');
PHP
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
$foo = $this->foo(...);

$fn = strlen(...);
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>It is now possible to get a reference to any function – this is called first-class callable syntax.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="new_in_initializers">
        New in initializers
      <a class="php8-rfc" href="https://wiki.php.net/rfc/new_in_initializers">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class Service {
    private Logger $logger;
 
    public function __construct(
        ?Logger $logger = null,
    ) {
        $this->logger = $logger ?? new NullLogger;
    }
}
PHP
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class Service {
    public function __construct(
        private Logger $logger = new NullLogger,
    ) {}
}
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class User {
    #[\Assert\All(
        new \Assert\NotNull,
        new \Assert\Length(min: 6))
    ]
    public string $name = '';
}
PHP
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class User {
    #[\Assert\All(
        new \Assert\NotNull,
        new \Assert\Length(min: 6))
    ]
    public string $name = '';
}
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Objects can now be used as default parameter values, static variables, and global constants, as well as in attribute arguments.</p>
      <p>This effectively makes possible to use <strong>nested attributes</strong>.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="pure_intersection_types">
        Pure Intersection Types
      <a class="php8-rfc" href="https://wiki.php.net/rfc/pure-intersection-types">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
interface CountableIterator extends Iterator, Countable {}

function count_and_iterate(CountableIterator $value) {
    foreach($value as $val) {
        echo $val;
    }

    count($value);
}
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
function count_and_iterate(Iterator&Countable $value) {
    foreach($value as $val) {
        echo $val;
    }

    count($value);
}
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Use intersection types on any type declarations when you need to require a value to satisfy multiple type constraints at the same time.</p>
      <p>It is not currently possible to mix intersection and union types together such as <code>A&B|C</code>.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="never_return_type">
        Never return type
      <a class="php8-rfc" href="https://wiki.php.net/rfc/noreturn_type">RFC</a> <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.never">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
function redirect(string $uri) {
    header('Location: ' . $uri);
    exit();
}
 
function redirectToLoginPage() {
    redirect('/login');
    echo 'Hello'; // <- dead code
}
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
function redirect(string $uri): never {
    header('Location: ' . $uri);
    exit();
}
 
function redirectToLoginPage(): never {
    redirect('/login');
    echo 'Hello'; // <- dead code detected by static analysis 
}
PHP

            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>A function or method declared with the <code>never</code> type indicates that it will not return a value and will either throw an exception or end the script’s execution with a call of <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, or something similar.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="final_class_constants">
        Final class constants
      <a class="php8-rfc" href="https://wiki.php.net/rfc/final_class_const">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class Foo
{
    public const XX = "foo";
}

class Bar extends Foo
{
    public const XX = "bar"; // No error
}
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
class Foo
{
    final public const XX = "foo";
}

class Bar extends Foo
{
    public const XX = "bar"; // Fatal error
}
PHP

            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>It is possible to declare final class constants, so that they cannot be overridden in child classes.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="explicit_octal_numeral_notation">
        Explicit Octal numeral notation
      <a class="php8-rfc" href="https://wiki.php.net/rfc/explicit_octal_notation">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
016 === 16; // false because `016` is octal for `14` and it's confusing
016 === 14; // true 
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
0o16 === 16; // false — not confusing with explicit notation
0o16 === 14; // true 
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>It is now possible to write octal numbers with the explicit <code>0o</code> prefix.</p>
    </div>
  </div>


  <div class="php8-compare">
    <h2 class="php8-h2" id="fibers">
        Fibers
      <a class="php8-rfc" href="https://wiki.php.net/rfc/fibers">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
@TODO
PHP

            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
@TODO
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Fibers are primitives for implementing light weight cooperative concurrency. Basically they are a means of creating code blocks that can be paused and resumed, much like threads. The main difference is that they are never preempted and that the scheduling must be done by a common library and not the OS.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="array_unpacking_support_for_string_keyed_arrays">
        Array unpacking support for string-keyed arrays
      <a class="php8-rfc" href="https://wiki.php.net/rfc/array_unpacking_string_keys">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
$arrayA = ['a' => 1];
$arrayB = ['b' => 2];

$result = array_merge(['a' => 0], $arrayA, $arrayB);

// ['a' => 1, 'b' => 2]
PHP
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                <<<'PHP'
$arrayA = ['a' => 1];
$arrayB = ['b' => 2];

$result = ['a' => 0, ...$arrayA, ...$arrayB];

// ['a' => 1, 'b' => 2]
PHP
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>PHP supported unpacking inside arrays through the spread operator before, but only if the arrays had integer keys. Now it is possible to unpack arrays with string keys too.</p>
    </div>
  </div>
</section>

<section class="php8-section center php8-section_light php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2" id="performance_improvements">Performance Improvements</h2>
      <div class="php8-compare__content">
          <p>The result (relative to PHP-8.0)
              - 3.5 % Wordpress speedup
              - 27.0% Symfony Demo speedup</p>
            <p>
                <img src="@TODO" width="900" alt="">
            </p>
            <h3 class="php8-h3">Performance related features in PHP 8.1:</h3>
            <ul>
                <li>JIT backend for ARM64(AArch64)</li>
                <li>Inheritance cache (avoid relinking classes in each request)</li>
                <li>Fast class name resolution (avoid lowercasing and hash lookup)</li>
                <li>timelib and ext/date performance improvements</li>
                <li>SPL file-system iterators improvements</li>
                <li>serialize/unserialize optimizations</li>
                <li>Some internal functions optimization
                    (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())</li>
                <li>JIT improvements and fixes</li>
            </ul>
      </div>
    </div>

    <div class="php8-column">
      <h2 class="php8-h2" id="deprecations_and_bc_breaks">Deprecations and backward compatibility breaks</h2>
      <div class="php8-compare__content">
        <ul>
            <li>Passing null to non-nullable internal function parameters is deprecated.</li>
            <li>Return types in PHP built-in class methods and deprecation notices.</li>
            <li>New <code>#[ReturnTypeWillChange]</code> attribute.</li>
            <li><code>Serializable</code> interface deprecated.</li>
            <li>HTML entity en/decode functions process single quotes and substitute by default.</li>
            <li><code>$GLOBALS</code> variable restrictions.</li>
            <li>MySQLi: Default error mode set to exceptions.</li>
            <li>Implicit incompatible float to int conversion is deprecated.</li>
            <li>finfo Extension: <code>file_info</code> resource are migrated to existing finfo objects.</li>
            <li>IMAP: imap resources are IMAP\Connection class objects.</li>
            <li>FTP Extension: Connection resources are FTP\Connection class objects.</li>
            <li>GD Extension: Font identifiers are GdFont class objects.</li>
            <li>LDAP: resources migrated to LDAP\Connection, LDAP\Result, and LDAP\ResultEntry objects.</li>
            <li>PostgreSQL: resources migrated to \PgSql\Connection, \PgSql\Result, and \PgSql\Lob objects.</li>
            <li>Pspell: pspell, pspell config resources are PSpell\Dictionary, PSpell\Config class objects.</li>
            <li>New fsync and fdatasync functions.</li>
            <li>New array_is_list function.</li>
            <li>New Sodium XChaCha20 functions.</li>
        </ul>
      </div>
    </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      Better performance, better syntax, improved type safety.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Upgrade to PHP 8.1 now!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        For source downloads of PHP 8.1 please visit the <a href="https://www.php.net/downloads">downloads</a> page.
        Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site.
        The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        The <a href="/manual/en/migration81.php">migration guide</a> is available in the PHP Manual. Please
        consult it for a detailed list of new features and backward-incompatible changes.
      </p>
    </div>
  </div>
</section>




<?php site_footer();
