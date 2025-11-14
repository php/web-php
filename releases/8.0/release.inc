<?php

use function releases\php80\common_header;
use function releases\php80\language_chooser;
use function releases\php80\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.0/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$ohNoText = message('oh_no', $lang);
$expectedText = message('this_is_expected', $lang);

$comparisons = [
    [
        'id' => 'named-arguments',
        'title' => message('named_arguments_title', $lang),
        'description' => '<ul>' . message('named_arguments_description', $lang) . '</ul>',
        'links' => [
            'RFC|https://wiki.php.net/rfc/named_params',
            message('documentation', $lang) . "|/manual/$documentation/functions.arguments.php#functions.named-arguments",
        ],
        'before' => <<<'PHP'
            htmlspecialchars($string, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
            PHP,
        'after' => <<<'PHP'
            htmlspecialchars($string, double_encode: false);
            PHP,
    ],
    [
        'id' => 'attributes',
        'title' => message('attributes_title', $lang),
        'description' => '<p>' . message('attributes_description', $lang) . '</p>',
        'links' => [
            'RFC|https://wiki.php.net/rfc/attributes_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.attributes.php",
        ],
        'before' => <<<'PHP'
            class PostsController
            {
                /**
                 * @Route("/api/posts/{id}", methods={"GET"})
                 */
                public function get($id) { /* ... */ }
            }
            PHP,
        'after' => <<<'PHP'
            class PostsController
            {
                #[Route("/api/posts/{id}", methods: ["GET"])]
                public function get($id) { /* ... */ }
            }
            PHP,
    ],
    [
        'id' => 'constructor-property-promotion',
        'title' => message('constructor_promotion_title', $lang),
        'description' => '<p>' . message('constructor_promotion_description', $lang) . '</p>',
        'links' => [
            'RFC|https://wiki.php.net/rfc/constructor_promotion',
            message('documentation', $lang) . "|/manual/$documentation/language.oop5.decon.php#language.oop5.decon.constructor.promotion",
        ],
        'before' => <<<'PHP'
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
        'after' => <<<'PHP'
            class Point {
                public function __construct(
                    public float $x = 0.0,
                    public float $y = 0.0,
                    public float $z = 0.0,
                ) {}
            }
            PHP,
    ],
    [
        'id' => 'union-types',
        'title' => message('union_types_title', $lang),
        'description' => '<p>' . message('union_types_description', $lang) . '</p>',
        'links' => [
            'RFC|https://wiki.php.net/rfc/union_types_v2',
            message('documentation', $lang) . "|/manual/$documentation/language.types.declarations.php#language.types.declarations.union",
        ],
        'before' => <<<'PHP'
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
        'after' => <<<'PHP'
            class Number {
                public function __construct(
                    private int|float $number
                ) {}
            }

            new Number('NaN'); // TypeError
            PHP,
    ],
    [
        'id' => 'match-expression',
        'title' => message('match_expression_title', $lang),
        'description' => message('match_expression_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/match_expression_v2',
            message('documentation', $lang) . "|/manual/$documentation/control-structures.match.php",
        ],
        'before' => <<<PHP
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
        'after' => <<<PHP
            echo match (8.0) {
                '8.0' => "{$ohNoText}",
                8.0 => "{$expectedText}",
            };
            //> {$expectedText}
            PHP,
    ],
    [
        'id' => 'nullsafe-operator',
        'title' => message('nullsafe_operator_title', $lang),
        'description' => '<p>' . message('nullsafe_operator_description', $lang) . '</p>',
        'links' => ['RFC|https://wiki.php.net/rfc/nullsafe_operator'],
        'before' => <<<'PHP'
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
        'after' => <<<'PHP'
            $country = $session?->user?->getAddress()?->country;
            PHP,
    ],
    [
        'id' => 'saner-string-to-number-comparisons',
        'title' => message('saner_string_number_comparisons_title', $lang),
        'description' => '<p>' . message('saner_string_number_comparisons_description', $lang) . '</p>',
        'links' => ['RFC|https://wiki.php.net/rfc/string_to_number_comparison'],
        'before' => <<<'PHP'
            0 == 'foobar' // true
            PHP,
        'after' => <<<'PHP'
            0 == 'foobar' // false
            PHP,
    ],
    [
        'id' => 'consistent-type-errors-for-internal-functions',
        'title' => message('consistent_internal_function_type_errors_title', $lang),
        'description' => '<p>' . message('consistent_internal_function_type_errors_description', $lang) . '</p>',
        'links' => ['RFC|https://wiki.php.net/rfc/consistent_type_errors'],
        'before' => <<<'PHP'
            strlen([]); // Warning: strlen() expects parameter 1 to be string, array given

            array_chunk([], -1); // Warning: array_chunk(): Size parameter expected to be greater than 0
            PHP,
        'after' => <<<'PHP'
            strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given

            array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0
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
                <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
            </div>
            <div class="php8-title"><?= message('main_title', $lang) ?></div>
            <div class="php8-subtitle"><?= message('main_subtitle', $lang) ?></div>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads"><?= message('upgrade_now', $lang) ?></a>
            </div>
        </div>
    </section>

    <?= feature_comparisons($comparisons, 'PHP 8', 'PHP 7') ?>

    <section class="php8-section php8-section_light">
        <h2 class="php8-h2" id="jit_compilation"><?= message('jit_compilation_title', $lang) ?></h2>
        <p><?= message('jit_compilation_description', $lang) ?></p>
        <h3 class="php8-h3"><?= message('jit_performance_title', $lang) ?></h3>
        <div class="php8-chart__table">
            <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
        </div>

        <div class="php8-columns">
            <div class="php8-column">
                <h2 class="php8-h2 php8-h2_margin-top" id="type_improvements"><?= message('type_improvements_title', $lang) ?></h2>
                <div class="php8-compare__content php8-compare__content--block" style="margin-top: 0">
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
            </div>

            <div class="php8-column">
                <h2 class="php8-h2 php8-h2_margin-top" id="other_improvements"><?= message('other_improvements_title', $lang) ?></h2>
                <div class="php8-compare__content php8-compare__content--block" style="margin-top: 0">
                    <ul>
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
                </div>

                <h2 class="php8-h2 php8-h2_margin-top" id="new_classes"><?= message('new_classes_title', $lang) ?></h2>
                <div class="php8-compare__content php8-compare__content--block" style="margin-top: 0">
                    <ul>
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
