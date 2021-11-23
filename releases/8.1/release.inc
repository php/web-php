<?php

use function releases\php81\common_header;
use function releases\php81\language_chooser;
use function releases\php81\language_redirect;
use function releases\php81\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.1/' . $lang . '.php';

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
            <img src="/images/php8/logo_php8_1.svg" alt="php8.1" height="126" width="343">
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
        <h2 class="php8-h2" id="enumerations">
            <?= message('enumerations_title', $lang) ?>
            <a class="php8-rfc" href="https://wiki.php.net/rfc/enumerations">RFC</a> <a class="php8-rfc" href="/manual/en/language.enumerations.php"><?= message('documentation', $lang) ?></a>
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
            <?= message('enumerations_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="readonly_properties">
            <?= message('readonly_properties_title', $lang) ?>
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
                    <?php highlight_php_trimmed(
                            <<<'PHP'
class BlogData
{
    public readonly Status $status;
   
    public function __construct(Status $status) 
    {
        $this->status = $status;
    }
}
PHP
                    );?>
                </div>
            </div>
        </div>
        <div class="php8-compare__content">
            <?= message('readonly_properties_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="first_class_callable_syntax">
            <?= message('first_class_callable_syntax_title', $lang) ?>
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
            <?= message('first_class_callable_syntax_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="new_in_initializers">
            <?= message('new_in_initializers_title', $lang) ?>
            <a class="php8-rfc" href="https://wiki.php.net/rfc/new_in_initializers">RFC</a>
        </h2>
        <div class="php8-compare__main">
            <div class="php8-compare__block example-contents">
                <div class="php8-compare__label">PHP ≤8.0</div>
                <div class="php8-code phpcode">
                    <?php highlight_php_trimmed(
                        <<<'PHP'
class Service 
{
    private Logger $logger;
 
    public function __construct(
        ?Logger $logger = null,
    ) {
        $this->logger = $logger ?? new NullLogger();
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
class Service 
{
    private Logger $logger;
    
    public function __construct(
        Logger $logger = new NullLogger(),
    ) {
        $this->logger = $logger;
    }
}
PHP
                    );?>
                </div>
            </div>
        </div>

        <div class="php8-compare__content">
            <?= message('new_in_initializers_content', $lang) ?>
        </div>
        <div class="php8-compare__main">
            <div class="php8-compare__block example-contents">
                <div class="php8-compare__label">PHP ≤8.0</div>
                <div class="php8-code phpcode">
                    <?php highlight_php_trimmed(
                        <<<'PHP'
class User 
{
    /**
     * @Assert\All({
     *     @Assert\NotNull,
     *     @Assert\Length(min=5)
     * })
     */
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
class User 
{
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
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="pure_intersection_types">
            <?= message('pure_intersection_types_title', $lang) ?>
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
            <?= message('pure_intersection_types_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="never_return_type">
            <?= message('never_return_type_title', $lang) ?>
            <a class="php8-rfc" href="https://wiki.php.net/rfc/noreturn_type">RFC</a> <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.never"><?= message('documentation', $lang) ?></a>
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
            <?= message('never_return_type_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="final_class_constants">
            <?= message('final_class_constants_title', $lang) ?>
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
            <?= message('final_class_constants_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="explicit_octal_numeral_notation">
            <?= message('octal_numeral_notation_title', $lang) ?>
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
            <?= message('octal_numeral_notation_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="fibers">
            <?= message('fibers_title', $lang) ?>
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
            <?= message('fibers_content', $lang) ?>
        </div>
    </div>

    <div class="php8-compare">
        <h2 class="php8-h2" id="array_unpacking_support_for_string_keyed_arrays">
            <?= message('array_unpacking_title', $lang) ?>
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
            <?= message('array_unpacking_content', $lang) ?>
        </div>
    </div>
</section>

<section class="php8-section center php8-section_light php8-columns">
    <div class="php8-column">
        <h2 class="php8-h2" id="performance_improvements"><?= message('performance_title', $lang) ?></h2>
        <div class="php8-compare__content">
            <p><?= message('performance_results', $lang) ?></p>
            <p>
                <img src="@TODO" width="900" alt="">
            </p>
            <h3 class="php8-h3"><?= message('performance_related_functions_title', $lang) ?></h3>
            <ul>
                <li><?= message('performance_jit_arm64', $lang) ?></li>
                <li><?= message('performance_inheritance_cache', $lang) ?></li>
                <li><?= message('performance_fast_class_name_resolution', $lang) ?></li>
                <li><?= message('performance_timelib_date_improvements', $lang) ?></li>
                <li><?= message('performance_spl', $lang) ?></li>
                <li><?= message('performance_serialize_unserialize', $lang) ?></li>
                <li><?= message('performance_internal_functions', $lang) ?></li>
                <li><?= message('performance_jit', $lang) ?></li>
            </ul>
        </div>
    </div>

    <div class="php8-column">
        <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_tilte', $lang) ?></h2>
        <div class="php8-compare__content">
            <ul>
                <li><?= message('bc_null_to_not_nullable', $lang) ?></li>
                <li><?= message('bc_return_types', $lang) ?></li>
                <li><?= message('bc_returntypewillchange', $lang) ?></li>
                <li><?= message('bc_serializable_deprecated', $lang) ?></li>
                <li><?= message('bc_html_entity_encode_decode', $lang) ?></li>
                <li><?= message('bc_globals_restrictions', $lang) ?></li>
                <li><?= message('bc_mysqli_exceptions', $lang) ?></li>
                <li><?= message('bc_float_to_int_conversion', $lang) ?></li>
                <li><?= message('bc_finfo_objects', $lang) ?></li>
                <li><?= message('bc_imap_objects', $lang) ?></li>
                <li><?= message('bc_ftp_objects', $lang) ?></li>
                <li><?= message('bc_gd_objects', $lang) ?></li>
                <li><?= message('bc_ldap_objects', $lang) ?></li>
                <li><?= message('bc_postgresql_objects', $lang) ?></li>
                <li><?= message('bc_pspell_objects', $lang) ?></li>
                <li><?= message('bc_fsync_fdatasync', $lang) ?></li>
                <li><?= message('bc_array_is_list', $lang) ?></li>
                <li><?= message('bc_sodium_xchacha20', $lang) ?></li>
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
        <div class="php8-footer__content">
            <?= message('footer_content') ?>
        </div>
    </div>
</section>

<?php

site_footer();
