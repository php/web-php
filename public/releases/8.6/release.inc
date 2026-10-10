<?php

use phpweb\Themes\FeatureComparison;
use phpweb\Themes\ReleasePage;
use function releases\php86\common_header;
use function releases\php86\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.6/' . $lang . '.php';

require_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));

$comparisons = [
        new FeatureComparison(
                id: 'partial-function-application',
                title: message('pfa_title', $lang),
                description: message('pfa_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/partial_function_application_v2',
                ],
                before: <<<'PHP'
            $title = 'PHP 8.5 released!';

            $slug = $title
                |> trim(...)
                |> (fn($s) => str_replace(' ', '-', $s))
                |> (fn($s) => str_replace(['.', '/', '…', '!'], '', $s))
                |> strtolower(...);

            var_dump($slug);
            // string(15) "php-85-released"
            PHP,
                after: <<<'PHP'
            $title = 'PHP 8.6 released!';

            $slug = $title
                |> trim(...)
                |> str_replace(' ', '-', ?)
                |> str_replace(['.', '/', '…', '!'], '', ?)
                |> strtolower(...);

            var_dump($slug);
            // string(15) "php-86-released"
            PHP,
        ),
        new FeatureComparison(
                id: 'polling-api',
                title: message('polling_api_title', $lang),
                description: message('polling_api_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/poll_api',
                ],
                before: <<<'PHP'
            // TODO
            PHP,
                after: <<<'PHP'
            // TODO
            PHP,
        ),
        new FeatureComparison(
                id: 'duration-class',
                title: message('duration_title', $lang),
                description: message('duration_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/duration_class',
                ],
                before: <<<'PHP'
            // TODO
            PHP,
                after: <<<'PHP'
            // TODO
            PHP,
        ),
        new FeatureComparison(
                id: 'clamp-function',
                title: message('clamp_title', $lang),
                description: message('clamp_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/clamp_v2',
                ],
                before: <<<'PHP'
            function clamp(int $value, int $min, int $max): int {
                if ($max < $min) {
                    throw new \InvalidArgumentException(
                        '$min must be smaller than or equal to argument $max'
                    );
                }
                if ($value > $max) {
                    return $max;
                }
                if ($value < $min) {
                    return $min;
                }

                return $value;
            }
            PHP,
                after: <<<'PHP'
            var_dump(clamp(-10, 0, 100));
            // int(0)

            var_dump(clamp(50, 0, 100));
            // int(50)

            var_dump(clamp(110, 0, 100));
            // int(100)
            PHP,
        ),
        new FeatureComparison(
                id: 'sort-direction-enum',
                title: message('sort_direction_title', $lang),
                description: message('sort_direction_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/sort_direction_enum',
                ],
                before: <<<'PHP'
            if (!enum_exists('SortDirection')) {
                enum SortDirection {
                    case Ascending;
                    case Descending;
                }
            }
            PHP,
                after: <<<'PHP'
            class QueryBuilder {
                private SortDirection $sort;

                public function setSort(SortDirection $sort): void {
                    $this->sort = $sort;
                }

                private function getSortKeyword(): string {
                    return match($this->sort) {
                        SortDirection::Ascending => 'ASC',
                        SortDirection::Descending => 'DESC',
                    };
                }
            }
            PHP,
        ),
        new FeatureComparison(
                id: 'doc-comments',
                title: message('doc_comments_title', $lang),
                description: message('doc_comments_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/parameter-doccomments',
                ],
                before: '',
                after: <<<'PHP'
            class DB {
                /**
                * Returns collection
                * @return array
                */
                function search(
                    /** string Terms to search */
                    string $query,

                    /** int Terms to search */
                    int $limit = 10
                ): array {
                    return [];
                }
            }

            var_dump(
                new ReflectionParameter([DB::class, 'search'], 'query')->getDocComment()
            );
            // string(29) "/** string Terms to search */"
            PHP,
        ),
        new FeatureComparison(
                id: 'isreadable-iswriteable',
                title: message('isreadable_iswriteable_title', $lang),
                description: message('isreadable_iswriteable_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/parameter-doccomments',
                ],
                before: '',
                after: <<<'PHP'
            class NewsEntry {
                public string $title = 'PHP 8.6 released!';

                public private(set) string $slug = 'php-86-released';
            }

            $entry = new NewsEntry();
            foreach (['title', 'slug'] as $item) {
                $property = new ReflectionProperty(NewsEntry::class, $item);
                printf(
                    "%s: isReadable=%s isWritable=%s\n",
                    $item,
                    $property->isReadable(null, $entry) ? 'yes' : 'no',
                    $property->isWritable(null, $entry) ? 'yes' : 'no'
                );
            }
            // title: isReadable=yes isWritable=yes
            // slug: isReadable=yes isWritable=no
            PHP,
        ),
        new FeatureComparison(
                id: 'readonly-property-defaults',
                title: message('readonly_property_defaults_title', $lang),
                description: message('readonly_property_defaults_description', $lang),
                links: [
                        'RFC|https://wiki.php.net/rfc/readonly_property_defaults',
                ],
                before: <<<'PHP'
            //TODO
            PHP,
                after: <<<'PHP'
            //TODO
            PHP,
        ),
];

echo ReleasePage::getHeroSection(
        title: message('main_title', $lang),
        subtitle: message('main_subtitle', $lang),
        logoSvg: <<<'SVG'
        <svg class="hero-php-logo" width="484" height="138" viewBox="0 0 484 138" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7836 130.5H0L19.3978 30.4113H61.2017C73.7532 30.4113 82.9853 33.7441 88.6905 40.3056C94.4995 46.9713 96.1592 56.1365 93.8771 68.1139C92.9435 73.009 91.2838 77.4875 89.1055 81.5494C86.8234 85.6113 83.9189 89.3607 80.2883 92.6935C75.9316 96.7554 71.1599 99.6716 65.8696 101.442C60.5793 103.213 53.8367 104.046 45.5382 104.046H26.8665L21.7836 130.5ZM69.3965 50.7207C66.5957 47.7003 61.0979 46.138 52.9031 46.138H38.0695L29.9784 88.1109H43.1524C51.8658 88.1109 58.4009 86.4445 62.7576 83.1116C67.0106 79.7788 69.9151 74.2588 71.4711 66.5516C72.8196 59.0528 72.0935 53.8452 69.3965 50.7207Z" fill="currentColor"/>
        <path d="M109.748 3.74902H131.324L126.138 30.4117H145.328C157.465 30.4117 165.763 32.4947 170.328 36.7649C174.892 41.035 176.344 47.909 174.477 57.3867L165.452 104.047H143.565L152.174 59.6781C153.108 54.6788 152.797 51.2418 151.137 49.3671C149.477 47.4924 145.847 46.6592 140.349 46.6592H123.13L112.03 104.047H90.3508L109.748 3.74902Z" fill="currentColor"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M191.281 130.5H169.498L188.895 30.4113H230.803C243.354 30.4113 252.587 33.7441 258.292 40.3056C264.101 46.9713 265.761 56.1365 263.478 68.1139C262.545 73.009 260.885 77.4875 258.707 81.5494C256.425 85.6113 253.52 89.3607 249.89 92.6935C245.533 96.7554 240.761 99.6716 235.471 101.442C230.181 103.213 223.438 104.046 215.139 104.046H196.468L191.281 130.5ZM238.998 50.7207C236.197 47.7003 230.699 46.138 222.504 46.138H207.567L199.476 88.1109H212.65C221.363 88.1109 227.898 86.4445 232.255 83.1116C236.508 79.7788 239.413 74.2588 240.969 66.5516C242.317 59.0528 241.695 53.8452 238.998 50.7207Z" fill="currentColor"/>
        <path d="M328.518 49.9925C322.606 35.8279 317.627 23.5381 322.502 14.9977C324.369 12.394 326.444 11.04 328.726 11.04C333.394 11.04 337.647 16.1434 337.647 16.1434L343.559 23.3298L339.825 14.7894C339.618 14.477 333.29 0 321.983 0C318.041 0 313.892 1.77057 309.847 5.3117L309.743 5.41585C299.888 16.8725 309.535 38.5358 318.145 57.5955L324.473 72.3849C327.377 79.9879 330.282 89.0491 328.518 95.7147C325.821 106.13 316.589 113.212 316.485 113.316L310.573 117.899L317.73 115.608C318.456 115.399 334.327 110.192 338.165 96.3396C340.551 84.9872 337.543 73.6347 334.535 64.886C334.95 64.5736 334.12 65.1985 334.535 64.886L329.037 50.6174" fill="currentColor"/>
        <path d="M346.049 9.78979L338.684 1.66602L343.974 11.352C344.078 11.4562 350.509 23.5377 342.315 37.5981C339.306 41.9724 334.638 46.3468 328.726 50.7211L318.041 57.6992C317.938 57.5951 317.938 57.4909 318.041 57.6992L317.626 58.0117C305.697 64.8856 294.598 69.0517 294.391 69.1558C277.897 76.5505 267.524 88.0071 266.072 100.714C264.931 110.296 269.391 119.669 278.105 126.231L278.208 126.335C283.706 129.668 289.619 131.334 295.843 131.334C312.129 131.334 324.888 119.982 325.406 119.461L333.394 112.275L323.954 117.274C323.85 117.274 315.967 121.44 307.772 121.44C300.407 121.44 295.22 118.211 292.108 111.65C288.167 97.6932 301.963 88.1113 317.834 77.0713C319.909 75.6132 322.087 74.0509 324.265 72.5928L324.369 72.4887L333.809 65.4064C333.912 65.1981 334.223 64.9898 334.223 64.9898C342.003 58.5324 352.273 48.4298 354.659 34.2653C356.526 21.4547 346.464 10.3105 346.049 9.78979Z" fill="#6b58ff"/>
        <path d="M357.459 85.9246H377.687L374.057 104.359H353.829L357.459 85.9246Z" fill="currentColor"/>
        <path d="M446.184 52.0094C450.839 52.0959 454.976 52.6146 458.596 53.5658C462.303 54.5169 465.492 55.9868 468.164 57.9756C470.75 59.8778 472.258 62.688 472.689 66.406C473.206 70.124 472.603 74.7068 470.879 80.1541C469.327 84.9098 467.129 88.9737 464.285 92.3459C461.441 95.6316 457.95 98.2688 453.812 100.258C449.675 102.16 445.495 103.673 441.271 104.797C437.048 105.835 432.781 106.483 428.471 106.742C426.834 106.915 425.196 107.002 423.558 107.002C421.921 107.002 420.283 106.915 418.645 106.742C417.007 106.656 415.456 106.526 413.991 106.353C412.525 106.18 411.103 106.008 409.724 105.835C403.001 104.883 397.7 102.938 393.821 99.9981C389.943 96.9718 387.486 92.9944 386.452 88.0658C385.504 83.1372 385.331 77.8195 385.934 72.1128C386.538 66.3195 387.96 60.1804 390.201 53.6955C392.873 46 396.148 39.515 400.027 34.2406C403.906 28.8797 408.388 24.7293 413.474 21.7895C418.559 18.7631 424.205 16.515 430.411 15.0451C436.617 13.5752 443.34 12.8402 450.58 12.8402L483.679 12.7105L479.412 28.6635H445.796C441.314 28.75 437.306 29.2255 433.772 30.0902C430.324 30.8684 427.351 32.0789 424.851 33.7218C422.438 35.3646 420.197 37.7425 418.128 40.8552C416.146 43.8816 414.422 47.6428 412.956 52.1391L446.184 52.0094ZM440.754 67.9624H408.819C408.733 68.2218 408.647 68.4812 408.56 68.7406C408.56 69 408.517 69.2162 408.431 69.3891C408.431 69.4756 408.388 69.6053 408.302 69.7782C408.302 69.8647 408.302 69.9511 408.302 70.0376C408.302 70.2105 408.259 70.3402 408.173 70.4267C408.173 70.5131 408.173 70.5996 408.173 70.6861C407.828 72.4154 407.612 74.1447 407.526 75.8741C407.526 77.5169 407.569 79.1165 407.655 80.6729C407.828 82.3158 408.345 83.7425 409.207 84.953C410.069 86.1635 411.189 87.2444 412.568 88.1955C413.43 88.7143 414.335 89.1898 415.284 89.6222C416.318 90.0545 417.438 90.4004 418.645 90.6598C419.852 90.9192 421.059 91.1353 422.265 91.3083C423.472 91.4812 424.722 91.5677 426.015 91.5677C427.135 91.6541 428.256 91.6541 429.376 91.5677C430.497 91.4812 431.617 91.3947 432.738 91.3083C433.083 91.2218 433.427 91.1786 433.772 91.1786C434.117 91.0921 434.462 91.0489 434.807 91.0489C435.496 90.8759 436.186 90.703 436.875 90.5301C437.651 90.3571 438.341 90.1842 438.944 90.0113C440.237 89.6654 441.4 89.1466 442.435 88.4549C443.555 87.7631 444.59 86.8985 445.538 85.8609C446.486 84.8233 447.262 83.7425 447.865 82.6184C448.555 81.4944 449.029 80.3703 449.287 79.2462C449.718 77.8628 449.891 76.5225 449.804 75.2256C449.718 73.9286 449.373 72.718 448.77 71.594C448.167 70.3834 447.175 69.5188 445.796 69C444.417 68.3947 442.693 68.0921 440.625 68.0921L440.754 67.9624Z" fill="currentColor"/>
        </svg>
        SVG,
        upgradeNow: message('upgrade_now', $lang),
        whatsNew: message('whats_new', $lang),
        released: message('released', $lang),
);
?>
    <!-- new features -->
    <section class="features">
        <svg aria-hidden="true" width="100%" height="100%" class="features-pattern">
            <defs>
                <pattern id="features-pattern" width="13" height="13" patternUnits="userSpaceOnUse">
                    <rect x="5.5" y="5.5" width="1" height="1" fill="currentColor"></rect>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#features-pattern)"></rect>
        </svg>

        <div class="features-title">
            <h2 id="features"><?= message('key_features', $lang) ?></h2>
            <?= message('key_features_description', $lang) ?>
        </div>

        <div class="features-grid-container">
            <div class="features-grid">
                <div class="features-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                            </svg>

                            <a href="#partial-function-application"><span></span><?= message('pfa_title', $lang) ?></a>
                            <?= message('features_pfa_description', $lang) ?>
                        </div>
                    </div>
                </div>
                <div class="features-col features-first-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"/>
                            </svg>

                            <a href="#polling-api"><span></span><?= message('polling_api_title', $lang) ?></a>
                            <?= message('features_polling_api_description', $lang) ?>
                        </div>
                    </div>
                </div>
                <div class="features-col features-fourth-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5"/>
                            </svg>

                            <a href="#duration-class"><span></span><?= message('duration_title', $lang) ?>
                            </a>
                            <?= message('features_duration_description', $lang) ?>
                        </div>
                    </div>
                </div>
                <div class="features-col features-sixth-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                            </svg>

                            <a href="#clamp-function"><span></span><?= message('clamp_title', $lang) ?>
                            </a>
                            <?= message('features_clamp_description', $lang) ?>
                        </div>
                    </div>
                </div>
                <div class="features-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                            </svg>

                            <a href="#sort-direction-enum"><span></span><?= message('sort_direction_title', $lang) ?>
                            </a>
                            <?= message('features_sort_direction_description', $lang) ?>
                        </div>
                    </div>
                </div>
                <div class="features-col features-third-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"/>
                            </svg>

                            <a href="#readonly-property-defaults"><span></span><?= message('readonly_property_defaults_title', $lang) ?>
                            </a>
                            <?= message('features_readonly_property_defaults_description', $lang) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= ReleasePage::getFeatureComparisons($comparisons, 'PHP 8.6', message('old_version', $lang), message('badge_new', $lang)) ?>

    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2 id="additional-improvements"><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('new_uri', $lang) ?></li>
                        <li><?= message('new_gmp', $lang) ?></li>
                        <li><?= message('new_intl', $lang) ?></li>
                        <li><?= message('new_mysqli', $lang) ?></li>
                        <li><?= message('new_reflection', $lang) ?></li>
                        <li><?= message('new_zip', $lang) ?></li>
                        <li><?= message('new_stream', $lang) ?></li>
                    </ul>
                </div>
                <div>
                    <h2 id="deprecations-and-bc-breaks"><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
                        <li><?= message('deprecated_mysqli', $lang) ?></li>
                        <li><?= message('deprecated_spl', $lang) ?></li>
                        <li><?= message('deprecated_standard', $lang) ?></li>
                        <li><?= message('deprecated_date', $lang) ?></li>
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
