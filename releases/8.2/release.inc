<?php

use function releases\php82\common_header;
use function releases\php82\language_chooser;
use function releases\php82\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.2/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    [
        'id' => 'readonly_classes',
        'title' => message('readonly_classes_title', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/readonly_classes',
            message('documentation', $lang) . "|/manual/$lang/language.oop5.basic.php#language.oop5.basic.class.readonly",
        ],
        'before' => <<<'PHP'
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
            PHP,
        'after' => <<<'PHP'
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
            PHP,
    ],
    [
        'id' => 'dnf_types',
        'title' => message('dnf_types_title', $lang),
        'description' => message('dnf_types_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/dnf_types',
            message('documentation', $lang) . "|/manual/$lang/migration82.new-features.php#migration82.new-features.core.type-system",
        ],
        'before' => <<<'PHP'
            class Foo {
                public function bar(mixed $entity) {
                    if ((($entity instanceof A) && ($entity instanceof B)) || ($entity === null)) {
                        return $entity;
                    }

                    throw new Exception('Invalid entity');
                }
            }
            PHP,
        'after' => <<<'PHP'
            class Foo {
                public function bar((A&B)|null $entity) {
                    return $entity;
                }
            }
            PHP,
    ],
    [
        'id' => 'null_false_true_types',
        'title' => message('null_false_true_types_title', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/null-false-standalone-types',
            'RFC|https://wiki.php.net/rfc/true-type',
        ],
        'before' => <<<'PHP'
            class Falsy
            {
                public function almostFalse(): bool { /* ... */ *}

                public function almostTrue(): bool { /* ... */ *}

                public function almostNull(): string|null { /* ... */ *}
            }
            PHP,
        'after' => <<<'PHP'
            class Falsy
            {
                public function alwaysFalse(): false { /* ... */ *}

                public function alwaysTrue(): true { /* ... */ *}

                public function alwaysNull(): null { /* ... */ *}
            }
            PHP,
    ],
    [
        'id' => 'random_extension',
        'title' => message('random_title', $lang),
        'description' => message('random_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/rng_extension',
            'RFC|https://wiki.php.net/rfc/random_extension_improvement',
            message('documentation', $lang) . "|/manual/$lang/book.random.php",
        ],
        'after' => <<<'PHP'
            use Random\Engine\Xoshiro256StarStar;
            use Random\Randomizer;

            $blueprintRng = new Xoshiro256StarStar(
                hash('sha256', "Example seed that is converted to a 256 Bit string via SHA-256", true)
            );

            $fibers = [];
            for ($i = 0; $i < 8; $i++) {
                $fiberRng = clone $blueprintRng;
                // Xoshiro256**'s 'jump()' method moves the blueprint ahead 2**128 steps, as if calling
                // 'generate()' 2**128 times, giving the Fiber 2**128 unique values without needing to reseed.
                $blueprintRng->jump();

                $fibers[] = new Fiber(function () use ($fiberRng, $i): void {
                    $randomizer = new Randomizer($fiberRng);

                    echo "{$i}: " . $randomizer->getInt(0, 100), PHP_EOL;
                });
            }

            // The randomizer will use a CSPRNG by default.
            $randomizer = new Randomizer();

            // Even though the fibers execute in a random order, they will print the same value
            // each time, because each has its own unique instance of the RNG.
            $fibers = $randomizer->shuffleArray($fibers);
            foreach ($fibers as $fiber) {
                $fiber->start();
            }
            PHP,
    ],
    [
        'id' => 'constants_in_traits',
        'title' => message('constants_in_traits_title', $lang),
        'description' => message('constants_in_traits_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/constants_in_traits',
            message('documentation', $lang) . "|/manual/$lang/migration82.new-features.php#migration82.new-features.core.constant-in-traits",
        ],
        'after' => <<<'PHP'
            trait Foo
            {
                public const CONSTANT = 1;
            }

            class Bar
            {
                use Foo;
            }

            var_dump(Bar::CONSTANT); // 1
            var_dump(Foo::CONSTANT); // Error
            PHP,
    ],
    [
        'id' => 'deprecate_dynamic_properties',
        'title' => message('deprecate_dynamic_properties_title', $lang),
        'description' => message('deprecate_dynamic_properties_description', $lang),
        'links' => [
            'RFC|https://wiki.php.net/rfc/deprecate_dynamic_properties',
            message('documentation', $lang) . "|/manual/$lang/migration82.deprecated.php#migration82.deprecated.core.dynamic-properties",
        ],
        'before' => <<<'PHP'
            class User
            {
                public $name;
            }

            $user = new User();
            $user->last_name = 'Doe';

            $user = new stdClass();
            $user->last_name = 'Doe';
            PHP,
        'after' => <<<'PHP'
            class User
            {
                public $name;
            }

            $user = new User();
            $user->last_name = 'Doe'; // Deprecated notice

            $user = new stdClass();
            $user->last_name = 'Doe'; // Still allowed
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
                <img src="/images/php8/logo_php8_2.svg" alt="PHP 8.2" height="126" width="343">
            </div>
            <div class="php8-title"><?= message('main_title', $lang) ?></div>
            <div class="php8-subtitle"><?= message('main_subtitle', $lang) ?></div>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads"><?= message('upgrade_now', $lang) ?></a>
            </div>
        </div>
    </section>

    <?= feature_comparisons($comparisons, 'PHP 8.2', 'PHP < 8.2') ?>

    <section class="php8-section center php8-section_light php8-columns">
        <div class="php8-column">
            <h2 class="php8-h2" id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
            <div class="php8-compare__content php8-compare__content--block">
                <ul>
                    <li><?= message('new_mysqli', $lang) ?></li>
                    <li><?= message('new_attributes', $lang) ?></li>
                    <li><?= message('new_zip', $lang) ?></li>
                    <li><?= message('new_reflection', $lang) ?></li>
                    <li><?= message('new_functions', $lang) ?></li>
                </ul>
            </div>
        </div>

        <div class="php8-column">
            <h2 class="php8-h2" id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
            <div class="php8-compare__content">
                <ul>
                    <li><?= message('bc_string_interpolation', $lang) ?></li>
                    <li><?= message('bc_utf8', $lang) ?></li>
                    <li><?= message('bc_datetime', $lang) ?></li>
                    <li><?= message('bc_odbc', $lang) ?></li>
                    <li><?= message('bc_str_locale_sensitive', $lang) ?></li>
                    <li><?= message('bc_spl_enforces_signature', $lang) ?></li>
                    <li><?= message('bc_spl_false', $lang) ?></li>
                    <li><?= message('bc_spl_null', $lang) ?></li>
                    <li><?= message('bc_spl_deprecated', $lang) ?></li>
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
