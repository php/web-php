<?php

use function releases\php81\common_header;
use function releases\php81\language_chooser;
use function releases\php81\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.1/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    [
        'id' => 'enumerations',
        'title' => message('enumerations_title', $lang),
        'description' => message('enumerations_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/enumerations',
            message('documentation', $lang) . "|/manual/$documentation/language.enumerations.php",
        ],
        'before' => <<<'PHP'
            class Status
            {
                const DRAFT = 'draft';
                const PUBLISHED = 'published';
                const ARCHIVED = 'archived';
            }
            function acceptStatus(string $status) {...}
            PHP,
        'after' => <<<'PHP'
            enum Status
            {
                case Draft;
                case Published;
                case Archived;
            }
            function acceptStatus(Status $status) {...}
            PHP,
    ],
    [
        'id' => 'readonly_properties',
        'title' => message('readonly_properties_title', $lang),
        'description' => message('readonly_properties_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/readonly_properties_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.properties.php#language.oop5.properties.readonly-properties",
        ],
        'before' => <<<'PHP'
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
            PHP,
        'after' => <<<'PHP'
            class BlogData
            {
                public readonly Status $status;

                public function __construct(Status $status)
                {
                    $this->status = $status;
                }
            }
            PHP,
    ],
    [
        'id' => 'first_class_callable_syntax',
        'title' => message('first_class_callable_syntax_title', $lang),
        'description' => message('first_class_callable_syntax_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/first_class_callable_syntax',
            message('documentation', $lang) . "|/manual/$documentation/functions.first_class_callable_syntax.php",
        ],
        'before' => <<<'PHP'
            $foo = [$this, 'foo'];

            $fn = Closure::fromCallable('strlen');
            PHP,
        'after' => <<<'PHP'
            $foo = $this->foo(...);

            $fn = strlen(...);
            PHP,
    ],
    [
        'id' => 'new_in_initializers',
        'title' => message('new_in_initializers_title', $lang),
        'description' => message('new_in_initializers_content', $lang),
        'links' => ['RFC|https://wiki.php.net/rfc/new_in_initializers'],
        'before' => <<<'PHP'
            class Service
            {
                private Logger $logger;

                public function __construct(
                    ?Logger $logger = null,
                ) {
                    $this->logger = $logger ?? new NullLogger();
                }
            }
            PHP,
        'after' => <<<'PHP'
            class Service
            {
                private Logger $logger;

                public function __construct(
                    Logger $logger = new NullLogger(),
                ) {
                    $this->logger = $logger;
                }
            }
            PHP,
        'before2' => <<<'PHP'
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
            PHP,
        'after2' => <<<'PHP'
            class User
            {
                #[\Assert\All(
                    new \Assert\NotNull,
                    new \Assert\Length(min: 5))
                ]
                public string $name = '';
            }
            PHP,
    ],
    [
        'id' => 'pure_intersection_types',
        'title' => message('pure_intersection_types_title', $lang),
        'description' => message('pure_intersection_types_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/pure-intersection-types',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.composite.intersection",
        ],
        'before' => <<<'PHP'
            function count_and_iterate(Iterator $value) {
                if (!($value instanceof Countable)) {
                    throw new TypeError('value must be Countable');
                }

                foreach ($value as $val) {
                    echo $val;
                }

                count($value);
            }
            PHP,
        'after' => <<<'PHP'
            function count_and_iterate(Iterator&Countable $value) {
                foreach ($value as $val) {
                    echo $val;
                }

                count($value);
            }
            PHP,
    ],
    [
        'id' => 'never_return_type',
        'title' => message('never_return_type_title', $lang),
        'description' => message('never_return_type_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/noreturn_type',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.never",
        ],
        'before' => <<<'PHP'
            function redirect(string $uri) {
                header('Location: ' . $uri);
                exit();
            }

            function redirectToLoginPage() {
                redirect('/login');
                echo 'Hello'; // <- dead code
            }
            PHP,
        'after' => <<<'PHP'
            function redirect(string $uri): never {
                header('Location: ' . $uri);
                exit();
            }

            function redirectToLoginPage(): never {
                redirect('/login');
                echo 'Hello'; // <- dead code detected by static analysis
            }
            PHP,
    ],
    [
        'id' => 'final_class_constants',
        'title' => message('final_class_constants_title', $lang),
        'description' => message('final_class_constants_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/final_class_const',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.final.php#language.oop5.final.example.php81",
        ],
        'before' => <<<'PHP'
            class Foo
            {
                public const XX = "foo";
            }

            class Bar extends Foo
            {
                public const XX = "bar"; // No error
            }
            PHP,
        'after' => <<<'PHP'
            class Foo
            {
                final public const XX = "foo";
            }

            class Bar extends Foo
            {
                public const XX = "bar"; // Fatal error
            }
            PHP,
    ],
    [
        'id' => 'explicit_octal_numeral_notation',
        'title' => message('octal_numeral_notation_title', $lang),
        'description' => message('octal_numeral_notation_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/explicit_octal_notation',
            message('documentation', $lang) . "|/manual/$documentation/migration81.new-features.php#migration81.new-features.core.octal-literal-prefix",
        ],
        'before' => <<<'PHP'
            016 === 16; // false because `016` is octal for `14` and it's confusing
            016 === 14; // true
            PHP,
        'after' => <<<'PHP'
            0o16 === 16; // false — not confusing with explicit notation
            0o16 === 14; // true
            PHP,
    ],
    [
        'id' => 'fibers',
        'title' => message('fibers_title', $lang),
        'description' => message('fibers_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/fibers',
            message('documentation', $lang) . "|/manual/$documentation/language.fibers.php",
        ],
        'before' => <<<'PHP'
            $httpClient->request('https://example.com/')
                    ->then(function (Response $response) {
                        return $response->getBody()->buffer();
                    })
                    ->then(function (string $responseBody) {
                        print json_decode($responseBody)['code'];
                    });
            PHP,
        'after' => <<<'PHP'
            $response = $httpClient->request('https://example.com/');
            print json_decode($response->getBody()->buffer())['code'];
            PHP,
    ],
    [
        'id' => 'array_unpacking_support_for_string_keyed_arrays',
        'title' => message('array_unpacking_title', $lang),
        'description' => message('array_unpacking_content', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/array_unpacking_string_keys',
            message('documentation', $lang) . "|/manual/$documentation/language.types.array.php#language.types.array.unpacking",
        ],
        'before' => <<<'PHP'
            $arrayA = ['a' => 1];
            $arrayB = ['b' => 2];

            $result = array_merge(['a' => 0], $arrayA, $arrayB);

            // ['a' => 1, 'b' => 2]
            PHP,
        'after' => <<<'PHP'
            $arrayA = ['a' => 1];
            $arrayB = ['b' => 2];

            $result = ['a' => 0, ...$arrayA, ...$arrayB];

            // ['a' => 1, 'b' => 2]
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
            <img src="/images/php8/logo_php8_1.svg" alt="php8.1" height="126" width="343">
        </div>
        <div class="php8-title"><?= message('main_title', $lang) ?></div>
        <div class="php8-subtitle"><?= message('main_subtitle', $lang) ?></div>
        <div class="php8-button-wrapper center">
            <a class="php8-button php8-button_light" href="/downloads"><?= message('upgrade_now', $lang) ?></a>
        </div>
    </div>
</section>

<?= feature_comparisons($comparisons, 'PHP 8.1', 'PHP < 8.1') ?>

<section class="php8-section center php8-section_light php8-columns">
    <div class="php8-column">
        <h2 class="php8-h2" id="performance_improvements"><?= message('performance_title', $lang) ?></h2>
        <div class="php8-compare__content">
            <div class="center">
                <?= message('performance_chart', $lang) ?>
                <div class="php8-chart__table">
                    <img src="/images/php8/php81_performance.svg" alt="">
                </div>
            </div>
            <h3 class="php8-h3"><?= message('performance_results_title', $lang) ?></h3>
            <ul>
                <li><?= message('performance_results_symfony', $lang) ?></li>
                <li><?= message('performance_results_wordpress', $lang) ?></li>
            </ul>
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
        <h2 class="php8-h2" id="other_new_things"><?= message('other_new_title', $lang) ?></h2>
        <div class="php8-compare__content php8-compare__content--block">
            <ul>
                <li><?= message('other_new_returntypewillchange', $lang) ?></li>
                <li><?= message('other_new_fsync_fdatasync', $lang) ?></li>
                <li><?= message('other_new_array_is_list', $lang) ?></li>
                <li><?= message('other_new_sodium_xchacha20', $lang) ?></li>
            </ul>
        </div>
        <h2 class="php8-h2 php8-h2_margin-top" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
        <div class="php8-compare__content">
            <ul>
                <li><?= message('bc_null_to_not_nullable', $lang) ?></li>
                <li><?= message('bc_return_types', $lang) ?></li>
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
            <?= message('footer_content', $lang) ?>
        </div>
    </div>
</section>

<?php

site_footer();
