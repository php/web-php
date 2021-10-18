<?php
$_SERVER['BASE_PAGE'] = 'releases/8.1/en.php';
include_once __DIR__ . '/common.php';

releases\php81\language_redirect('en');

releases\php81\common_header(
    'PHP 8.1 is a major update of the PHP language. ' .
    'It contains many new features and optimizations including enums, ' .
    'fibers, `never`&nbsp;return&nbsp;type, intersection types, ' .
    'readonly properties, performance improvements and more.');

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
        <br class="display-none-md"> It contains many new features and optimizations including enums, fibers, `never`&nbsp;return&nbsp;type, intersection types, readonly properties, performance improvements and more.
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
      <a class="php8-rfc" href="https://wiki.php.net/rfc/enumerations">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class Status
{
    const DRAFT = \'draft\';
    const PUBLISHED = \'published\';
    const ARCHIVED = \'archived\';
}
acceptStatus(string $status) {...}'
            );?>
        </div>


      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'enum Status
{
    case draft;
    case published;
    case archived;
}
acceptStatus(Status $status) {...}
'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <ul>
        <li>Use instead of set of constants and get validation out of the box.</li>
      </ul>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
        <h3 id="nested_attributes">Nested Attributes</h3>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="never_return_type">
        Never return type
      <a class="php8-rfc" href="https://wiki.php.net/rfc/noreturn_type">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
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
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="array_unpacking_support_for_string_keyed_arrays">
        Array unpacking support for string-keyed arrays
      <a class="php8-rfc" href="https://php.watch/versions/8.1/spread-operator-string-array-keys">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP ≤8.0</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8.1</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '@TODO'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>@TODO</p>
    </div>
  </div>
</section>

<section class="php8-section center php8-section_light">
    <div class="php8-compare">
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
                <li>inheritance cache (avoid relinking classes in each request)</li>
                <li>fast class name resolution (avoid lowercasing and hash lookup)</li>
                <li>timelib and ext/date performance improvements</li>
                <li>SPL file-system iterators improvements</li>
                <li>serialize/unserialize optimizations</li>
                <li>some internal functions optimization
                    (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())</li>
                <li>JIT improvements, fixes, ...</li>
            </ul>
      </div>
    </div>

    <div class="php8-compare">
      <h2 class="php8-h2 php8-h2_margin-top" id="deprecation_and_backward_compatibility_breaks">Deprecation and backward compatibility breaks</h2>
      <div class="php8-compare__content">
        <ul>
            <li>Passing null to non-nullable internal function parameters is deprecated</li>
            <li>Return types in PHP built-in class methods and deprecation notices</li>
            <li>New #[ReturnTypeWillChange] attribute</li>
            <li>Serializable interface deprecated</li>
            <li>HTML entity en/decode functions process single quotes and substitute by default</li>
            <li>$GLOBALS variable restrictions</li>
            <li>MySQLi: Default error mode set to exceptions</li>
            <li>Implicit incompatible float to int conversion is deprecated</li>
            <li>finfo Extension: file_info resource are migrated to existing finfo objects</li>
            <li>IMAP: imap resources are IMAP\Connection class objects</li>
            <li>FTP Extension: Connection resources are FTP\Connection class objects</li>
            <li>GD Extension: Font identifiers are GdFont class objects</li>
            <li>LDAP: resources migrated to LDAP\Connection, LDAP\Result, and LDAP\ResultEntry objects</li>
            <li>PostgreSQL: resources migrated to \PgSql\Connection, \PgSql\Result, and \PgSql\Lob objects</li>
            <li>Pspell: pspell, pspell config resources are PSpell\Dictionary, PSpell\Config class objects</li>
            <li>New fsync and fdatasync functions</li>
            <li>New array_is_list function</li>
            <li>New Sodium XChaCha20 functions</li>
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
      <a class="php8-button php8-button_light" href="/downloads">Upgrade to PHP 8 now!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        For source downloads of PHP 8 please visit the <a href="https://www.php.net/downloads">downloads</a> page.
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
