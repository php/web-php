<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php82\common_header;
use function releases\php82\message;

if (!isset($lang)) {
    $lang = 'en';
}

$_SERVER['BASE_PAGE'] = 'releases/8.2/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
    new FeatureComparison(
        id: 'readonly_classes',
        title: message('readonly_classes_title', $lang),
        description: '',
        links: [
            'RFC|https://wiki.php.net/rfc/readonly_classes',
            message('documentation', $lang) . "|/manual/$lang/language.oop5.basic.php#language.oop5.basic.class.readonly",
        ],
        before: <<<'PHP'
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
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'dnf_types',
        title: message('dnf_types_title', $lang),
        description: message('dnf_types_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/dnf_types',
            message('documentation', $lang) . "|/manual/$lang/migration82.new-features.php#migration82.new-features.core.type-system",
        ],
        before: <<<'PHP'
            class Foo {
                public function bar(mixed $entity) {
                    if ((($entity instanceof A) && ($entity instanceof B)) || ($entity === null)) {
                        return $entity;
                    }

                    throw new Exception('Invalid entity');
                }
            }
            PHP,
        after: <<<'PHP'
            class Foo {
                public function bar((A&B)|null $entity) {
                    return $entity;
                }
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'null_false_true_types',
        title: message('null_false_true_types_title', $lang),
        description: '',
        links: [
            'RFC|https://wiki.php.net/rfc/null-false-standalone-types',
            'RFC|https://wiki.php.net/rfc/true-type',
        ],
        before: <<<'PHP'
            class Falsy
            {
                public function almostFalse(): bool { /* ... */ *}

                public function almostTrue(): bool { /* ... */ *}

                public function almostNull(): string|null { /* ... */ *}
            }
            PHP,
        after: <<<'PHP'
            class Falsy
            {
                public function alwaysFalse(): false { /* ... */ *}

                public function alwaysTrue(): true { /* ... */ *}

                public function alwaysNull(): null { /* ... */ *}
            }
            PHP,
    ),
    new FeatureComparison(
        id: 'random_extension',
        title: message('random_title', $lang),
        description: message('random_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/rng_extension',
            'RFC|https://wiki.php.net/rfc/random_extension_improvement',
            message('documentation', $lang) . "|/manual/$lang/book.random.php",
        ],
        before: '',
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'constants_in_traits',
        title: message('constants_in_traits_title', $lang),
        description: message('constants_in_traits_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/constants_in_traits',
            message('documentation', $lang) . "|/manual/$lang/migration82.new-features.php#migration82.new-features.core.constant-in-traits",
        ],
        before: '',
        after: <<<'PHP'
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
    ),
    new FeatureComparison(
        id: 'deprecate_dynamic_properties',
        title: message('deprecate_dynamic_properties_title', $lang),
        description: message('deprecate_dynamic_properties_description', $lang),
        links: [
            'RFC|https://wiki.php.net/rfc/deprecate_dynamic_properties',
            message('documentation', $lang) . "|/manual/$lang/migration82.deprecated.php#migration82.deprecated.core.dynamic-properties",
        ],
        before: <<<'PHP'
            class User
            {
                public $name;
            }

            $user = new User();
            $user->last_name = 'Doe';

            $user = new stdClass();
            $user->last_name = 'Doe';
            PHP,
        after: <<<'PHP'
            class User
            {
                public $name;
            }

            $user = new User();
            $user->last_name = 'Doe'; // Deprecated notice

            $user = new stdClass();
            $user->last_name = 'Doe'; // Still allowed
            PHP,
    ),
];

echo ReleasePage::getHeroSection(
    title: message('main_title', $lang),
    subtitle: message('main_subtitle', $lang),
    logoSvg: <<<SVG
        <svg class="hero-php-logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 451 127">
            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M21.8,125.8h-21l18.7-96.1h40.3c12.1,0,21,3.2,26.5,9.5c5.6,6.4,7.2,15.2,5,26.7c-0.9,4.7-2.5,9-4.6,12.9 c-2.2,3.9-5,7.5-8.5,10.7c-4.2,3.9-8.8,6.7-13.9,8.4c-5.1,1.7-11.6,2.5-19.6,2.5h-18L21.8,125.8z M67.7,49.2 c-2.7-2.9-8-4.4-15.9-4.4H37.5l-7.8,40.3h12.7c8.4,0,14.7-1.6,18.9-4.8c4.1-3.2,6.9-8.5,8.4-15.9C71,57.2,70.3,52.2,67.7,49.2z"/>
            <path fill="currentColor" d="M106.6,4.1h20.8l-5,25.6h18.5c11.7,0,19.7,2,24.1,6.1c4.4,4.1,5.8,10.7,4,19.8l-8.7,44.8h-21.1l8.3-42.6 c0.9-4.8,0.6-8.1-1-9.9c-1.6-1.8-5.1-2.6-10.4-2.6h-16.6l-10.7,55.1H87.9L106.6,4.1z"/>
            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M185.2,125.8h-21l18.7-96.1h40.4c12.1,0,21,3.2,26.5,9.5c5.6,6.4,7.2,15.2,5,26.7c-0.9,4.7-2.5,9-4.6,12.9 c-2.2,3.9-5,7.5-8.5,10.7c-4.2,3.9-8.8,6.7-13.9,8.4c-5.1,1.7-11.6,2.5-19.6,2.5h-18L185.2,125.8z M231.2,49.2 c-2.7-2.9-8-4.4-15.9-4.4h-14.4l-7.8,40.3h12.7c8.4,0,14.7-1.6,18.9-4.8c4.1-3.2,6.9-8.5,8.4-15.9C234.4,57.2,233.8,52.2,231.2,49.2z"/>
            <path fill="currentColor" d="M317.5,48.5c-5.7-13.6-10.5-25.4-5.8-33.6c1.8-2.5,3.8-3.8,6-3.8c4.5,0,8.6,4.9,8.6,4.9l5.7,6.9l-3.6-8.2 c-0.2-0.3-6.3-14.2-17.2-14.2c-3.8,0-7.8,1.7-11.7,5.1l-0.1,0.1c-9.5,11-0.2,31.8,8.1,50.1l6.1,14.2c0,0,0.6,0.5,0,0 c2.8,7.3,5.6,16,3.9,22.4c-2.6,10-11.5,16.8-11.6,16.9l-5.7,4.4l6.9-2.2c0.7-0.2,16-5.2,19.7-18.5c2.3-10.9-0.6-21.8-3.5-30.2 c0.4-0.3-0.4,0.3,0,0L318,49.1"/>
            <path fill="#6b58ff" d="M334.4,9.9l-7.1-7.8l5.1,9.3c0.1,0.1,6.3,11.7-1.6,25.2c-2.9,4.2-7.4,8.4-13.1,12.6l-10.3,6.7 c-0.1-0.2-0.1-0.1,0,0l-0.4,0.3h0.1H307c-11.5,6.6-22.2,10.6-22.4,10.7c-15.9,7.1-25.9,18.1-27.3,30.3c-1.1,9.2,3.2,18.2,11.6,24.5 l0.1,0.1c5.3,3.2,11,4.8,17,4.8c15.7,0,28-10.9,28.5-11.4l7.7-6.9l-9.1,4.8c-0.1,0-7.7,4-15.6,4c-7.1,0-12.1-3.1-15.1-9.4 c-3.8-13.4,9.5-22.6,24.8-33.2c2-1.4,4.1-2.9,6.2-4.3l0.1-0.1l9.1-6.8c0.1-0.2,0.4-0.4,0.4-0.4c7.5-6.2,17.4-15.9,19.7-29.5 C344.5,21.1,334.8,10.4,334.4,9.9z"/>
            <path fill="currentColor" d="M345.4,83h19.5l-3.5,17.7h-19.5L345.4,83z"/>
            <path fill="currentColor" d="M432.8,67.2c13.2-10.1,18.1-17.8,18.1-28.6c0-14.2-10.7-23.7-26.7-23.7c-11.4,0-21.4,5.2-29.5,15.3l-0.5,0.7 l11.4,13l0.8-0.8c6.7-7.1,11.7-9.9,17.2-9.9c5.4,0,8.4,2.7,8.4,7.5c0,4.6-3.1,8.8-10.6,14.5l-39.2,29.6l0,0l-3.1,15.7h61.4l3.4-17.7 h-31.8L432.8,67.2z"/>
        </svg>
        SVG,
    upgradeNow: message('upgrade_now', $lang),
);

echo ReleasePage::getFeatureComparisons($comparisons, 'PHP 8.2', 'PHP < 8.2');

?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="other_new_things"><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('new_mysqli', $lang) ?></li>
                        <li><?= message('new_attributes', $lang) ?></li>
                        <li><?= message('new_zip', $lang) ?></li>
                        <li><?= message('new_reflection', $lang) ?></li>
                        <li><?= message('new_functions', $lang) ?></li>
                    </ul>
                </div>
                <div>
                    <h2 id="deprecations_and_bc_breaks"><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
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
        </div>
    </section>

<?php

echo ReleasePage::getPrefooter(
    title: message('footer_title', $lang),
    upgradeNow: message('upgrade_now', $lang),
    description: message('footer_description', $lang),
);

site_footer(['footer' => false]);
