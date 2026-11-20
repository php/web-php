<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php80\common_header;
use function releases\php80\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.0/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$ohNoText = message('oh_no', $lang);
$expectedText = message('this_is_expected', $lang);

$comparisons = [
    new FeatureComparison(
        id: 'named-arguments',
        title: message('named_arguments_title', $lang),
        description: '<ul>' . message('named_arguments_description', $lang) . '</ul>',
        links: [
            'RFC|https://wiki.php.net/rfc/named_params',
            message('documentation', $lang) . "|/manual/$documentation/functions.arguments.php#functions.named-arguments",
        ],
        before: <<<'PHP'
            htmlspecialchars($string, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
            PHP,
        after: <<<'PHP'
            htmlspecialchars($string, double_encode: false);
            PHP,
    ),
    new FeatureComparison(
        id: 'attributes',
        title: message('attributes_title', $lang),
        description: '<p>' . message('attributes_description', $lang) . '</p>',
        links: [
            'RFC|https://wiki.php.net/rfc/attributes_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.attributes.php",
        ],
        before: <<<'PHP'
            class PostsController
            {
                /**
                 * @Route("/api/posts/{id}", methods={"GET"})
                 */
                public function get($id) { /* ... */ }
            }
            PHP,
        after: <<<'PHP'
            class PostsController
            {
                #[Route("/api/posts/{id}", methods: ["GET"])]
                public function get($id) { /* ... */ }
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'constructor-property-promotion',
        title: message('constructor_promotion_title', $lang),
        description: '<p>' . message('constructor_promotion_description', $lang) . '</p>',
        links: [
            'RFC|https://wiki.php.net/rfc/constructor_promotion',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.decon.php#language.oop5.decon.constructor.promotion",
        ],
        before: <<<'PHP'
            class Point {
                public float $x;
                public float $y;
                public float $z;

                public function __construct(
                    float $x = 0.0,
                    float $y = 0.0,
                    float $z = 0.0
                ) {
                    $this->x = $x;
                    $this->y = $y;
                    $this->z = $z;
                }
            }
            PHP,
        after: <<<'PHP'
            class Point {
                public function __construct(
                    public float $x = 0.0,
                    public float $y = 0.0,
                    public float $z = 0.0,
                ) {}
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'union-types',
        title: message('union_types_title', $lang),
        description: '<p>' . message('union_types_description', $lang) . '</p>',
        links: [
            'RFC|https://wiki.php.net/rfc/union_types_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.union",
        ],
        before: <<<'PHP'
            class Number {
                /** @var int|float */
                private $number;

                /**
                 * @param float|int $number
                 */
                public function __construct($number) {
                    $this->number = $number;
                }
            }

            new Number('NaN'); //
            PHP
            . ' ' . message('ok', $lang),
        after: <<<'PHP'
            class Number {
                public function __construct(
                    private int|float $number
                ) {}
            }

            new Number('NaN'); // TypeError
            PHP,
    ),
    new FeatureComparison(
        id: 'match-expression',
        title: message('match_expression_title', $lang),
        description: message('match_expression_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/match_expression_v2',
            message('documentation', $lang) . "|/manual/$documentation/control-structures.match.php",
        ],
        before: <<<PHP
            switch (8.0) {
                case '8.0':
                    \$result = "{$ohNoText}";
                    break;
                case 8.0:
                    \$result = "{$expectedText}";
                    break;
            }
            echo \$result;
            //> {$ohNoText}
            PHP,
        after: <<<PHP
            echo match (8.0) {
                '8.0' => "{$ohNoText}",
                8.0 => "{$expectedText}",
            };
            //> {$expectedText}
            PHP,
    ),
    new FeatureComparison(
        id: 'nullsafe-operator',
        title: message('nullsafe_operator_title', $lang),
        description: '<p>' . message('nullsafe_operator_description', $lang) . '</p>',
        links: ['RFC|https://wiki.php.net/rfc/nullsafe_operator'],
        before: <<<'PHP'
            $country =  null;

            if ($session !== null) {
                $user = $session->user;

                if ($user !== null) {
                    $address = $user->getAddress();

                    if ($address !== null) {
                        $country = $address->country;
                    }
                }
            }
            PHP,
        after: <<<'PHP'
            $country = $session?->user?->getAddress()?->country;
            PHP,
    ),
    new FeatureComparison(
        id: 'saner-string-to-number-comparisons',
        title: message('saner_string_number_comparisons_title', $lang),
        description: '<p>' . message('saner_string_number_comparisons_description', $lang) . '</p>',
        links: ['RFC|https://wiki.php.net/rfc/string_to_number_comparison'],
        before: <<<'PHP'
            0 == 'foobar' // true
            PHP,
        after: <<<'PHP'
            0 == 'foobar' // false
            PHP,
    ),
    new FeatureComparison(
        id: 'consistent-type-errors-for-internal-functions',
        title: message('consistent_internal_function_type_errors_title', $lang),
        description: '<p>' . message('consistent_internal_function_type_errors_description', $lang) . '</p>',
        links: ['RFC|https://wiki.php.net/rfc/consistent_type_errors'],
        before: <<<'PHP'
            strlen([]); // Warning: strlen() expects parameter 1 to be string, array given

            array_chunk([], -1); // Warning: array_chunk(): Size parameter expected to be greater than 0
            PHP,
        after: <<<'PHP'
            strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given

            array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0
            PHP,
    ),
];

echo ReleasePage::getHeroSection(
    title: message('main_title', $lang),
    subtitle: message('main_subtitle', $lang),
    logoSvg: <<<SVG
        <svg class="hero-php-logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 343 126">
            <path fill="currentColor" d="M51.064 41.386c7.962 0 13.268 1.468 15.921 4.408 2.652 2.94 3.283 7.986 1.896 15.136-1.45 7.446-4.238 12.761-8.375 15.945-4.136 3.185-10.43 4.775-18.879 4.775H28.879l7.825-40.264h14.36zM0 122.41h20.958l4.972-25.578h17.95c7.922 0 14.437-.83 19.554-2.496 5.115-1.662 9.763-4.453 13.948-8.37 3.513-3.227 6.353-6.788 8.53-10.682 2.173-3.89 3.718-8.186 4.631-12.885 2.217-11.404.543-20.287-5.016-26.65C79.97 29.386 71.124 26.204 59 26.204H18.7L0 122.41M105.935.626h20.792l-4.971 25.578h18.523c11.656 0 19.695 2.033 24.12 6.098 4.424 4.065 5.75 10.654 3.98 19.761l-8.7 44.77h-21.122l8.271-42.568c.942-4.842.597-8.145-1.039-9.907-1.634-1.761-5.112-2.642-10.432-2.642h-16.618l-10.71 55.116H87.234l18.7-96.206M214.643 41.386c7.962 0 13.268 1.468 15.921 4.408 2.652 2.94 3.284 7.986 1.896 15.136-1.45 7.446-4.238 12.761-8.375 15.945-4.136 3.185-10.43 4.775-18.879 4.775h-12.748l7.825-40.264h14.36zm-51.064 81.024h20.958l4.97-25.578h17.952c7.92 0 14.436-.83 19.553-2.496 5.115-1.662 9.764-4.453 13.949-8.37 3.512-3.227 6.353-6.788 8.53-10.682 2.173-3.89 3.718-8.186 4.63-12.885 2.218-11.404.545-20.287-5.014-26.65-5.56-6.363-14.404-9.545-26.528-9.545h-40.302L163.58 122.41" transform="translate(-548 -112) translate(548 112) translate(0 3)"/>
            <path fill="currentColor" d="M316.964 48.124c-5.653-13.604-10.537-25.357-5.765-33.57 1.773-2.492 3.8-3.755 6.022-3.755 4.474 0 8.56 4.893 8.6 4.943l5.701 6.92-3.564-8.225C327.702 13.847 321.573 0 310.573 0c-3.847 0-7.787 1.732-11.71 5.146l-.125.127c-9.51 10.993-.159 31.75 8.091 50.062l.02.044 6.122 14.232s.64.51 0 0c2.837 7.27 5.561 16.01 3.86 22.373-2.648 9.976-11.504 16.849-11.593 16.917l-5.736 4.393 6.887-2.184c.651-.206 16.007-5.212 19.685-18.518 2.301-10.89-.596-21.788-3.531-30.233.382-.315-.393.333 0 0l-5.348-13.677" transform="translate(-548 -112) translate(548 112)"/>
            <path fill="#6b58ff" d="M333.91 9.388l-7.136-7.79 5.096 9.254c.064.115 6.257 11.682-1.563 25.209-2.945 4.166-7.35 8.407-13.112 12.62l-10.365 6.656c-.111-.248-.056-.124 0-.002l-.365.264.053-.01-.053.01C295 62.194 284.278 66.235 284.099 66.306c-15.94 7.096-25.877 18.145-27.261 30.313-1.05 9.23 3.168 18.153 11.572 24.482l.11.074c5.283 3.17 10.999 4.778 16.987 4.778 15.74 0 28.016-10.891 28.532-11.356l7.654-6.893-9.093 4.838c-.077.04-7.65 4.02-15.569 4.02-7.06 0-12.14-3.149-15.101-9.36-3.783-13.45 9.477-22.629 24.826-33.25 2.037-1.41 4.133-2.86 6.215-4.34.012.033.116-.119.13-.086l9.084-6.75c.137-.214.37-.38.358-.417 7.548-6.222 17.414-15.901 19.717-29.482 1.781-12.267-7.937-23.037-8.35-23.49z" transform="translate(-548 -112) translate(548 112)"/>
        </svg>
        SVG,
    upgradeNow: message('upgrade_now', $lang),
);

echo ReleasePage::getFeatureComparisons($comparisons, 'PHP 8', 'PHP 7');

?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="jit_compilation"><?= message('jit_compilation_title', $lang) ?></h2>
                    <p><?= message('jit_compilation_description', $lang) ?></p>
                    <h3><?= message('jit_performance_title', $lang) ?></h3>
                    <div class="chart-table">
                        <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
                    </div>
                </div>
            </div>
        </div>

        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="type_improvements"><?= message('type_improvements_title', $lang) ?></h2>
                    <ul>
                        <li>
                            <?= message('arithmetic_operator_type_checks', $lang) ?>
                            <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
                        </li>
                        <li>
                            <?= message('abstract_trait_method_validation', $lang) ?>
                            <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
                        </li>
                        <li>
                            <?= message('magic_method_signatures', $lang) ?>
                            <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
                        </li>
                        <li>
                            <?= message('engine_warnings', $lang) ?>
                            <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
                        </li>
                        <li>
                            <?= message('lsp_errors', $lang) ?>
                            <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
                        </li>
                        <li><?= message('at_operator_no_longer_silences_fatal_errors', $lang) ?></li>
                        <li>
                            <?= message('inheritance_private_methods', $lang) ?>
                            <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
                        </li>
                        <li>
                            <?= message('mixed_type', $lang) ?>
                            <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
                        </li>
                        <li>
                            <?= message('static_return_type', $lang) ?>
                            <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
                        </li>
                        <li>
                            <?= message('internal_function_types', $lang) ?>
                            <a href="https://externals.io/message/106522"><?= message('email_thread', $lang) ?></a>
                        </li>
                        <li><?= message('opaque_objects_instead_of_resources', $lang) ?></li>
                    </ul>
                </div>
                <div>
                    <h2 id="other_improvements"><?= message('other_improvements_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('allow_trailing_comma', $lang) ?></li>
                        <li>
                            <?= message('non_capturing_catches', $lang) ?>
                            <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
                        </li>
                        <li>
                            <?= message('variable_syntax_tweaks', $lang) ?>
                            <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
                        </li>
                        <li>
                            <?= message('namespaced_names_as_token', $lang) ?>
                            <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
                        </li>
                        <li>
                            <?= message('throw_expression', $lang) ?>
                            <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
                        </li>
                        <li>
                            <?= message('class_name_literal_on_object', $lang) ?>
                            <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
                        </li>
                    </ul>

                    <h2 id="new_classes"><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('weak_map_class', $lang) ?></li>
                        <li><?= message('stringable_interface', $lang) ?></li>
                        <li><?= message('new_str_functions', $lang) ?></li>
                        <li><a href="https://github.com/php/php-src/pull/4769">fdiv()</a></li>
                        <li><a href="https://wiki.php.net/rfc/get_debug_type">get_debug_type()</a></li>
                        <li><a href="https://github.com/php/php-src/pull/5427">get_resource_id()</a></li>
                        <li><?= message('token_as_object', $lang) ?></li>
                        <li><a href="https://wiki.php.net/rfc/dom_living_standard_api"><?= message('new_dom_apis', $lang) ?></a></li>
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
