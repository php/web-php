<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php81\common_header;
use function releases\php81\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.1/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    new FeatureComparison(
        id: 'enumerations',
        title: message('enumerations_title', $lang),
        description: message('enumerations_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/enumerations',
            message('documentation', $lang) . "|/manual/$documentation/language.enumerations.php",
        ],
        before: <<<'PHP'
            class Status
            {
                const DRAFT = 'draft';
                const PUBLISHED = 'published';
                const ARCHIVED = 'archived';
            }
            function acceptStatus(string $status) {...}
            PHP,
        after: <<<'PHP'
            enum Status
            {
                case Draft;
                case Published;
                case Archived;
            }
            function acceptStatus(Status $status) {...}
            PHP,
    ),
    new FeatureComparison(
        id: 'readonly_properties',
        title: message('readonly_properties_title', $lang),
        description: message('readonly_properties_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/readonly_properties_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.properties.php#language.oop5.properties.readonly-properties",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
            class BlogData
            {
                public readonly Status $status;

                public function __construct(Status $status)
                {
                    $this->status = $status;
                }
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'first_class_callable_syntax',
        title: message('first_class_callable_syntax_title', $lang),
        description: message('first_class_callable_syntax_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/first_class_callable_syntax',
            message('documentation', $lang) . "|/manual/$documentation/functions.first_class_callable_syntax.php",
        ],
        before: <<<'PHP'
            $foo = [$this, 'foo'];

            $fn = Closure::fromCallable('strlen');
            PHP,
        after: <<<'PHP'
            $foo = $this->foo(...);

            $fn = strlen(...);
            PHP,
    ),
    new FeatureComparison(
        id: 'new_in_initializers',
        title: message('new_in_initializers_title', $lang),
        description: message('new_in_initializers_content', $lang),
        links: ['RFC|https://wiki.php.net/rfc/new_in_initializers'],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
        before2: <<<'PHP'
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
        after2: <<<'PHP'
            class User
            {
                #[\Assert\All(
                    new \Assert\NotNull,
                    new \Assert\Length(min: 5))
                ]
                public string $name = '';
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'pure_intersection_types',
        title: message('pure_intersection_types_title', $lang),
        description: message('pure_intersection_types_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/pure-intersection-types',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.composite.intersection",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
            function count_and_iterate(Iterator&Countable $value) {
                foreach ($value as $val) {
                    echo $val;
                }

                count($value);
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'never_return_type',
        title: message('never_return_type_title', $lang),
        description: message('never_return_type_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/noreturn_type',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.never",
        ],
        before: <<<'PHP'
            function redirect(string $uri) {
                header('Location: ' . $uri);
                exit();
            }

            function redirectToLoginPage() {
                redirect('/login');
                echo 'Hello'; // <- dead code
            }
            PHP,
        after: <<<'PHP'
            function redirect(string $uri): never {
                header('Location: ' . $uri);
                exit();
            }

            function redirectToLoginPage(): never {
                redirect('/login');
                echo 'Hello'; // <- dead code detected by static analysis
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'final_class_constants',
        title: message('final_class_constants_title', $lang),
        description: message('final_class_constants_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/final_class_const',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.final.php#language.oop5.final.example.php81",
        ],
        before: <<<'PHP'
            class Foo
            {
                public const XX = "foo";
            }

            class Bar extends Foo
            {
                public const XX = "bar"; // No error
            }
            PHP,
        after: <<<'PHP'
            class Foo
            {
                final public const XX = "foo";
            }

            class Bar extends Foo
            {
                public const XX = "bar"; // Fatal error
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'explicit_octal_numeral_notation',
        title: message('octal_numeral_notation_title', $lang),
        description: message('octal_numeral_notation_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/explicit_octal_notation',
            message('documentation', $lang) . "|/manual/$documentation/migration81.new-features.php#migration81.new-features.core.octal-literal-prefix",
        ],
        before: <<<'PHP'
            016 === 16; // false because `016` is octal for `14` and it's confusing
            016 === 14; // true
            PHP,
        after: <<<'PHP'
            0o16 === 16; // false — not confusing with explicit notation
            0o16 === 14; // true
            PHP,
    ),
    new FeatureComparison(
        id: 'fibers',
        title: message('fibers_title', $lang),
        description: message('fibers_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/fibers',
            message('documentation', $lang) . "|/manual/$documentation/language.fibers.php",
        ],
        before: <<<'PHP'
            $httpClient->request('https://example.com/')
                    ->then(function (Response $response) {
                        return $response->getBody()->buffer();
                    })
                    ->then(function (string $responseBody) {
                        print json_decode($responseBody)['code'];
                    });
            PHP,
        after: <<<'PHP'
            $response = $httpClient->request('https://example.com/');
            print json_decode($response->getBody()->buffer())['code'];
            PHP,
    ),
    new FeatureComparison(
        id: 'array_unpacking_support_for_string_keyed_arrays',
        title: message('array_unpacking_title', $lang),
        description: message('array_unpacking_content', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/array_unpacking_string_keys',
            message('documentation', $lang) . "|/manual/$documentation/language.types.array.php#language.types.array.unpacking",
        ],
        before: <<<'PHP'
            $arrayA = ['a' => 1];
            $arrayB = ['b' => 2];

            $result = array_merge(['a' => 0], $arrayA, $arrayB);

            // ['a' => 1, 'b' => 2]
            PHP,
        after: <<<'PHP'
            $arrayA = ['a' => 1];
            $arrayB = ['b' => 2];

            $result = ['a' => 0, ...$arrayA, ...$arrayB];

            // ['a' => 1, 'b' => 2]
            PHP,
    ),
];

echo ReleasePage::getHeroSection(
    title: message('main_title', $lang),
    subtitle: message('main_subtitle', $lang),
    logoSvg: <<<SVG
        <svg class="hero-php-logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 417 126" >
            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M21.4,125.4h-21l18.7-96.2h40.3c12.1,0,21,3.2,26.5,9.5c5.6,6.4,7.2,15.2,5,26.7c-0.9,4.7-2.5,9-4.6,12.9 c-2.2,3.9-5,7.5-8.5,10.7c-4.2,3.9-8.8,6.7-13.9,8.4s-11.6,2.5-19.6,2.5h-18L21.4,125.4z M67.4,48.8c-2.7-2.9-8-4.4-15.9-4.4H37.1 l-7.8,40.3H42c8.4,0,14.7-1.6,18.9-4.8c4.1-3.2,6.9-8.5,8.4-15.9C70.7,56.8,70,51.8,67.4,48.8z"/>
            <path fill="currentColor" d="M106.3,3.6h20.8l-5,25.6h18.5c11.7,0,19.7,2,24.1,6.1c4.4,4.1,5.8,10.7,4,19.8L160,99.9h-21.1l8.3-42.6 c0.9-4.8,0.6-8.1-1-9.9c-1.6-1.8-5.1-2.6-10.4-2.6h-16.6l-10.7,55.1H87.6L106.3,3.6z"/>
            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M184.9,125.4h-21l18.7-96.2H223c12.1,0,21,3.2,26.5,9.5c5.6,6.4,7.2,15.2,5,26.7c-0.9,4.7-2.5,9-4.6,12.9 c-2.2,3.9-5,7.5-8.5,10.7c-4.2,3.9-8.8,6.7-13.9,8.4s-11.6,2.5-19.6,2.5h-18L184.9,125.4z M231,48.8c-2.7-2.9-8-4.4-15.9-4.4h-14.4 l-7.8,40.3h12.7c8.4,0,14.7-1.6,18.9-4.8c4.1-3.2,6.9-8.5,8.4-15.9C234.2,56.8,233.6,51.8,231,48.8z"/>
            <path fill="currentColor" d="M317.4,48c-5.7-13.6-10.5-25.4-5.8-33.6c1.8-2.5,3.8-3.8,6-3.8c4.5,0,8.6,4.9,8.6,4.9l5.7,6.9l-3.6-8.2 C328.1,13.9,322,0,311,0c-3.8,0-7.8,1.7-11.7,5.1l-0.1,0.1c-9.5,11-0.2,31.8,8.1,50.1l6.1,14.2c0,0,0.6,0.5,0,0 c2.8,7.3,5.6,16,3.9,22.4c-2.6,10-11.5,16.8-11.6,16.9l-5.7,4.4l6.9-2.2c0.7-0.2,16-5.2,19.7-18.5c2.3-10.9-0.6-21.8-3.5-30.2 c0.4-0.3-0.4,0.3,0,0l-5.3-13.7"/>
            <path fill="#6b58ff" d="M334.3,9.4l-7.1-7.8l5.1,9.3c0.1,0.1,6.3,11.7-1.6,25.2c-2.9,4.2-7.4,8.4-13.1,12.6l-10.4,6.7 c-0.1-0.2-0.1-0.1,0,0l-0.4,0.3h0.1h-0.1c-11.5,6.6-22.2,10.6-22.4,10.7c-15.9,7.1-25.9,18.1-27.3,30.3 c-1.1,9.2,3.2,18.2,11.6,24.5l0.1,0.1c5.3,3.2,11,4.8,17,4.8c15.7,0,28-10.9,28.5-11.4l7.7-6.9l-9.1,4.8c-0.1,0-7.7,4-15.6,4 c-7.1,0-12.1-3.1-15.1-9.4c-3.8-13.4,9.5-22.6,24.8-33.2c2-1.4,4.1-2.9,6.2-4.3l0.1-0.1l9.1-6.8c0.1-0.2,0.4-0.4,0.4-0.4 c7.5-6.2,17.4-15.9,19.7-29.5C344.4,20.6,334.7,9.9,334.3,9.4z"/>
            <path fill="currentColor" d="M347.4,81.3h19.9l-6.5,22.8h-19.9L347.4,81.3z"/>
            <path fill="currentColor" d="M390.9,47L379,50.5V33.9l20.5-6.8h15l-15.2,77.1h-19.4L390.9,47z"/>
        </svg>
        SVG,
    upgradeNow: message('upgrade_now', $lang),
);

echo ReleasePage::getFeatureComparisons($comparisons, 'PHP 8.1', 'PHP < 8.1');

?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="performance_improvements"><?= message('performance_title', $lang) ?></h2>
                    <div class="center">
                        <?= message('performance_chart', $lang) ?>
                        <div class="chart-table">
                            <img src="/images/php8/php81_performance.svg" alt="">
                        </div>
                    </div>
                    <h3><?= message('performance_results_title', $lang) ?></h3>
                    <ul>
                        <li><?= message('performance_results_symfony', $lang) ?></li>
                        <li><?= message('performance_results_wordpress', $lang) ?></li>
                    </ul>

                    <h3><?= message('performance_related_functions_title', $lang) ?></h3>
                    <ul class="new">
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
                <div>
                    <h2 id="other_new_things"><?= message('other_new_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('other_new_returntypewillchange', $lang) ?></li>
                        <li><?= message('other_new_fsync_fdatasync', $lang) ?></li>
                        <li><?= message('other_new_array_is_list', $lang) ?></li>
                        <li><?= message('other_new_sodium_xchacha20', $lang) ?></li>
                    </ul>

                    <h2 id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
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
        </div>
    </section>

<?php

echo ReleasePage::getPrefooter(
    title: message('footer_title', $lang),
    upgradeNow: message('upgrade_now', $lang),
    description: message('footer_content', $lang),
);

site_footer(['footer' => false]);
