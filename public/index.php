<?php

use phpweb\News\NewsHandler;
use phpweb\Releases\Branches;
use phpweb\Releases\VersionLogos;
use phpweb\Themes\ClickableCard;
use phpweb\Themes\HTML;
use phpweb\Themes\SVG;
use phpweb\Themes\ThemeRenderer;

require_once __DIR__ . '/../include/prepend.inc';

(function ($uri): void {
    // Special redirect cases not able to be captured in error.php
    $shortcuts = [
            '/?:' => '/language.operators.comparison#language.operators.comparison.ternary',
            '/??' => '/language.operators.comparison#language.operators.comparison.coalesce',
            '/??=' => '/language.operators.assignment#language.operators.assignment.other',
    ];
    if (isset($shortcuts[$uri])) {
        header("Location: {$shortcuts[$uri]}");
        exit;
    }
})(
        $_SERVER['REQUEST_URI'] ?? ''
);

/**
 * @phpstan-import-type NormalizedReleaseStruct from Branches
 */
readonly class FrontPageController
{
    private ThemeRenderer $theme;

    /** @return list<ClickableCard> */
    private static function getLanguageDevelopmentCards(): array
    {
        return [
            new ClickableCard(
                title: 'PHP on Github',
                href: 'https://github.com/php',
                image: new SVG(<<<SVG
                    <svg style="" class="" width="98" height="96" viewBox="0 0 98 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_730_27136)">
                        <path d="M41.4395 69.3848C28.8066 67.8535 19.9062 58.7617 19.9062 46.9902C19.9062 42.2051 21.6289 37.0371 24.5 33.5918C23.2559 30.4336 23.4473 23.7344 24.8828 20.959C28.7109 20.4805 33.8789 22.4902 36.9414 25.2656C40.5781 24.1172 44.4062 23.543 49.0957 23.543C53.7852 23.543 57.6133 24.1172 61.0586 25.1699C64.0254 22.4902 69.2891 20.4805 73.1172 20.959C74.457 23.543 74.6484 30.2422 73.4043 33.4961C76.4668 37.1328 78.0937 42.0137 78.0937 46.9902C78.0937 58.7617 69.1934 67.6621 56.3691 69.2891C59.623 71.3945 61.8242 75.9883 61.8242 81.252L61.8242 91.2051C61.8242 94.0762 64.2168 95.7031 67.0879 94.5547C84.4102 87.9512 98 70.6289 98 49.1914C98 22.1074 75.9883 6.69539e-07 48.9043 4.309e-07C21.8203 1.92261e-07 -1.9479e-07 22.1074 -4.3343e-07 49.1914C-6.20631e-07 70.4375 13.4941 88.0469 31.6777 94.6504C34.2617 95.6074 36.75 93.8848 36.75 91.3008L36.75 83.6445C35.4102 84.2188 33.6875 84.6016 32.1562 84.6016C25.8398 84.6016 22.1074 81.1563 19.4277 74.7441C18.375 72.1602 17.2266 70.6289 15.0254 70.3418C13.877 70.2461 13.4941 69.7676 13.4941 69.1934C13.4941 68.0449 15.4082 67.1836 17.3223 67.1836C20.0977 67.1836 22.4902 68.9063 24.9785 72.4473C26.8926 75.2227 28.9023 76.4668 31.2949 76.4668C33.6875 76.4668 35.2187 75.6055 37.4199 73.4043C39.0469 71.7773 40.291 70.3418 41.4395 69.3848Z" fill="currentColor"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_730_27136">
                        <rect width="98" height="96" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                SVG),
                body: 'Browse and contribute to the source code behind the PHP engine and infrastructure.',
            ),
            new ClickableCard(
                title: 'RFCs / Language Proposals',
                href: 'https://wiki.php.net/rfc',
                image: '/images/language-development/rfcs.png',
                body: 'Requests for Comments are the mechanism PHP internals uses to propose language changes.',
            ),
            new ClickableCard(
                title: 'PHP Internals',
                href: 'https://news-web.php.net/php.internals',
                image: '/images/language-development/php-internals.png',
                body: 'Browse discussions from PHP Internals mailing list about current and future enhancements.',
            ),
            new ClickableCard(
                title: 'Get Involved',
                href: '/get-involved.php',
                image: '/images/language-development/get-involved.png',
                body: 'Find ways to contribute to the PHP engine, documentation and more.',
            ),
            new ClickableCard(
                title: 'Submit a Bug Report',
                href: 'https://github.com/php/php-src/issues',
                image: '/images/language-development/submit-bug-report.png',
                body: 'Found a bug in the PHP runtime? Help us out by submitting it to our issue tracker.',
            ),
            new ClickableCard(
                title: 'Documentation Translation',
                href: 'https://doc.php.net/guide/',
                image: '/images/language-development/documentation.png',
                body: 'Help our team translate our documentation into multiple languages.',
            ),
        ];
    }

    /** @return list<ClickableCard> */
    private static function getCommunityLinks(): array
    {
        return [
            new ClickableCard(
                title: 'Reddit',
                href: 'https://www.reddit.com/r/PHP/',
                image: '/images/community/reddit.png',
                body: 'Reddit has an active PHP community discussing the language and its ecosystem.',
            ),
            new ClickableCard(
                title: 'PHP Community (Discord)',
                href: 'https://discord.phpc.social/',
                image: '/images/community/phpc-discord.png',
                body: 'Join thousands of users on Discord talking about PHP.',
            ),
            new ClickableCard(
                title: 'Official Mailing Lists',
                href: '/mailing-lists.php',
                image: '/images/community/mailing-lists.png',
                body: 'Help and guidance, as well as proposals & discussions on the future of the language.',
            ),
            new ClickableCard(
                title: 'PHP Developers (Discord)',
                href: 'https://discord.gg/php-developers-484326318851358720',
                image: '/images/community/phpdevelopers-discord.webp',
                body: 'Born in 2018, it is the first community on Discord dedicated to PHP developers. Open for both experts and apprentices.',
            ),
            new ClickableCard(
                title: 'Libera.Chat',
                href: 'https://libera.chat/',
                image: '/images/community/libera.svg',
                body: 'Providing a community platform for free and open-source software and peer directed projects..',
            ),
            new ClickableCard(
                title: 'LinkedIn',
                href: 'https://www.linkedin.com/search/results/content/?keywords=php',
                image: '/images/community/linkedin.svg',
                body: 'PHP related posts on the world\'s largest professional network.',
            ),
            new ClickableCard(
                title: 'phpc.social (Mastodon)',
                href: 'https://phpc.social/',
                image: '/images/community/mastodon.svg',
                body: 'A place for PHP programmers & friends to discuss topics related to the PHP programming language, frameworks, packages, tools, open source, tech, life, and more',
            ),
        ];
    }

    private const array HERO_TIPS = [
        [
            'title' => 'Fast & Modern',
            'about' => 'PHP provides blistering fast performance and a modern developer-focused experience.',
        ],
        [
            'title' => 'A Massive Ecosystem',
            'about' => 'Leverage over 450,000 existing open source packages for your projects, along with powerful tooling.',
        ],
        [
            'title' => 'An Established Community',
            'about' => 'Millions of developers and businesses already use PHP to achieve their goals every day.',
        ],
    ];

    public function __construct()
    {
        $this->theme = new ThemeRenderer();
    }

    public function render(): void
    {
        $latestReleases = [];
        foreach (Branches::active(false) as $releases) {
            foreach ($releases as $versionId => $release) {
                $latestReleases[$versionId] = $release;
            }
        }

        $latestReleases = array_reverse($latestReleases);
        $latestRelease = array_shift($latestReleases);
        assert($latestRelease !== null);

        $conferenceCards =[];
        $now = new DateTimeImmutable(); // ->sub(new DateInterval('P180D')); add this to include more for testing
        foreach (new NewsHandler()->getConferences() as $conference) {
            $cutoff = NewsHandler::parseTeaserCutoff($conference);
            if (!$cutoff || $cutoff < $now) {
                continue;
            }

            $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '/', $conference["link"][0]["href"] ?? '');
            if (!$link) {
                continue;
            }

            $image = $conference['newsImage']['content'] ?? '';
            if ($image) {
                $image = '/images/news/' . $image;
            }

            $conferenceCards[] = new ClickableCard(
                title: $conference['title'],
                href: $link,
                image: $image,
                body: NewsHandler::extractTeaser($conference, 160),
            );
        }

        site_header(null, $this->getHeaderConfig());
        $this->drawStyles();

        $this->drawSection('header gst-header-block', 'hero', function() {
            ?>
            <div class="lp-header">
                <div style="flex: 999999 0 300px; display: flex;">
                    <svg style="padding: 1em; width: 100%; height: 200px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 -1 100 50">
                        <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"/>
                        <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"/>
                        <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"/>
                    </svg>

                </div>
                <div style="flex: 1 1 450px">
                    <?php foreach (self::HERO_TIPS as $tip) { ?>
                        <div class="lp-header-promo">
                            <div class="lp-header-title"><?= $this->safe($tip['title']) ?></div>
                            <div class="lp-header-tagline"><?= $this->safe($tip['about']) ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        });

        $this->drawSection('primary', 'releases', function() use ($latestRelease, $latestReleases) {
            $this->drawLatestVersionHeader($latestRelease);
            ?>

            <div class="gst-cgrid" style="grid-template-columns: repeat(auto-fit, minmax(340px, 1fr))">
                <?php foreach ($latestReleases as $release) { ?>
                    <?php $this->drawSupportedMinorVersion($release); ?>
                <?php } ?>
            </div>
            <?php
        });

        $this->drawSection('secondary', 'php-foundation', function() {
            ?>
            <div class="banner-container">
                <div class="banner-graphic-container">
                    <img src="/images/logos/php-foundation.svg"
                         alt="PHP Foundation Logo" />
                </div>
                <div class="banner-content">
                    <div class="banner-content-highlight">
                        The PHP Foundation is a collective of people and organizations,
                        united in the mission to ensure the long-term prosperity of the PHP language.
                    </div>

                    <div class="banner-content-links">
                        <a class="button-primary" target="_blank" href="https://thephp.foundation/">
                            Learn About the PHP Foundation
                        </a>
                        &nbsp;·&nbsp;

                        <a class="button-primary" target="_blank" href="https://opencollective.com/phpfoundation/contribute">
                            Donate Via Open Collective
                        </a>
                        &nbsp;·&nbsp;

                        <a class="button-primary" target="_blank" href="https://github.com/sponsors/ThePHPF">
                            Donate Via GitHub
                        </a>
                    </div>
                </div>
            </div>
            <?php
        });

        $this->drawSection('primary', 'community', function() use ($conferenceCards): void {
            echo $this->theme->sectionHeader(
                title: 'Community',
                subtitle: 'Find places to engage with other PHP users across the internet',
            );

            echo $this->theme->clickableCards(self::getCommunityLinks(), id: 'community-cards', shuffleLimit: 6);

            if ($conferenceCards) {
                echo $this->theme->sectionHeader(
                    title: 'Events & Conferences',
                );

                echo $this->theme->clickableCards(
                    cards: $conferenceCards,
                    id: 'event-cards',
                    shuffleLimit: 6,
                    cssImage: 'gst-card-title-icon lp-conf-image-background',
                );

                ?>
                <div class="gst-readable" style="text-align: center; margin-top: 1.5em">
                    <a href="/conferences/">View more conferences</a>
                </div>
                <?php
            }
        });

        $this->drawSection('secondary', 'composer', function() {
            ?>
            <div class="banner-container">
                <div class="banner-graphic-container">
                    <img src="/images/logos/composer.png"
                         alt="Composer Logo" />
                </div>
                <div class="banner-content">
                    <div class="banner-content-highlight">
                        PHP has one of the largest collections of open-source libraries in the world.
                        <br /><br />

                        Ranging from individual helpers to entire application frameworks, all packages are
                        easily installable via the <em>Composer</em> package manager.
                    </div>

                    <div class="banner-content-links">
                        <a class="button-primary" target="_blank" href="https://getcomposer.org/">
                            Get Composer
                        </a>
                        &nbsp;·&nbsp;

                        <a class="button-primary" target="_blank" href="https://packagist.org/">
                            Browse Package Repository
                        </a>
                    </div>
                </div>
            </div>
            <?php
        });

        $this->drawSection('primary', 'language-development', function() {
            echo $this->theme->sectionHeader(
                title: 'Language Development',
                subtitle: 'It takes a broad effort to develop the PHP language',
            );

            echo $this->theme->clickableCards(self::getLanguageDevelopmentCards(), id: 'language-development-cards');
        });

        site_footer([
            'footer_style' => 'new',
            "atom" => "/feed.atom", // Add a link to the feed at the bottom
        ]);
    }


    private function safe(string|HTML $content): string
    {
        if ($content instanceof HTML) {
            return $content->html;
        }

        return htmlspecialchars($content, ENT_QUOTES);
    }

    /**
     * @param NormalizedReleaseStruct $release
     */
    private function drawLatestVersionHeader(array $release): void
    {
        [$major, $minor] = explode('.', $release['version']);
        $versionId = $major . '.' . $minor;
        $highlights = (require __DIR__ . '/../include/branch-highlights.inc')[$versionId]['features'] ?? [];

        ?>
        <div class="gst-theme-inverted gst-card gst-container">
            <div class="gst-card-content">
                <div class="lp-lrh">
                    <div class="lp-lrh-left">
                        <?= VersionLogos::getLogo($versionId, highlight: '#000000', style: 'width: 100%; height: 100px') ?>

                        <?php $this->drawUnifiedVersionHeader($release) ?>

                        <div style="width: 100%; margin-top: 1rem">
                            <div class="lp-lhr-button-split">
                                <a class="gst-chunky-btn plaina" href="/releases/<?= $versionId ?>/">Discover More</a>
                                <a class="gst-chunky-btn plaina" href="/downloads.php?version=<?= $versionId ?>">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="lp-lhr-highlights">
                        <?php foreach ($highlights as $highlight) { ?>
                        <div class="lp-lrh-highlight">
                            <div class="lp-lrh-highlight-title">
                                <?= $this->safe($this->theme->textWithCode($highlight['title'])) ?>
                            </div>
                            <div class="lp-lrh-highlight-text">
                                <?= $this->safe($this->theme->textWithCode($highlight['about'] ?? $highlight['short'] ?? '')) ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <?php
    }

    /**
     * @param NormalizedReleaseStruct $release
     */
    private function drawUnifiedVersionHeader(array $release): void
    {
        $releaseId = $release['version'];
        [$major, $minor, $patch] = explode('.', $releaseId);
        $versionId = $major . '.' . $minor;

        $now = new DateTimeImmutable();
        $timeLabel = function (string $label, ?DateTime $time) use ($now): string {
            return sprintf('<span><span style="font-weight: 500; margin-right: 0.5em">%s:</span>%s</span>',
                    $label,
                    ($time && $time > $now) ? $time->format('Y-m-d') : 'End of Life',
            );
        };

        ?>
        <div style="text-align: center">
            <div>
                <a href="/releases/<?= $major . '_' . $minor . '_' . $patch ?>.php"><?= $releaseId ?></a>
                &nbsp;
                <a href="/manual/migration<?= $major . $minor ?>">Migration Guide</a>
            </div>
            <div style="font-size: smaller; margin-top: 0.1rem">
                <?= $timeLabel('Bugfixes', Branches::getBranchBugsEOLDate($versionId)) ?>
                &nbsp;
                &nbsp;
                <?= $timeLabel('Security', Branches::getBranchSecurityEOLDate($versionId)) ?>
            </div>
        </div>
        <?php
    }

    /**
     * @param NormalizedReleaseStruct $release
     */
    private function drawSupportedMinorVersion(array $release): void
    {
        [$major, $minor] = explode('.', $release['version']);
        $versionId = $major . '.' . $minor;

        $upgrades = (require __DIR__ . '/../include/branch-highlights.inc')[$versionId]['features'] ?? [];

        ?>
        <div class="gst-card gst-default-card gst-cgrid-card">
            <div class="gst-card-content" style="display: flex; flex-direction: column; gap: 1.5em; padding-bottom: 0">
                <div style="margin-top: 1em">
                    <?= VersionLogos::getLogo($versionId, style: 'width: 100%; height: 70px; object-fit: contain') ?>
                </div>

                <div style="margin-left: auto; margin-right: auto">
                    <?php $this->drawUnifiedVersionHeader($release) ?>
                </div>

                <div>
                    <div style="font-weight: bold; margin-bottom: 0.25em">Major Features:</div>
                    <ul>
                        <?php foreach ($upgrades as $idx => $upgrade) { ?>
                            <li class="<?= $idx >= 2 ? 'hidden-phone': '' ?>"><?= $this->safe($upgrade['short'] ?? $upgrade['title'] ?? '')?></li>
                        <?php } ?>
                        <li>
                            Plus much more...
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gst-card-footer lp-lhr-button-split" >
                <a class="gst-chunky-btn plaina" href="/releases/<?= $versionId ?>/">Discover More</a>
                <a class="gst-chunky-btn plaina" href="/downloads.php?version=<?= $versionId ?>">Download</a>
            </div>
        </div>
        <?php
    }

    private function drawSection(string $template, string $id, Closure $contents): void
    {
        ?>
        <div class="<?= "gst-theme-$template gst-container" ?>" id="<?= $this->safe($id) ?>">
            <div class="gst-content-p-wide">
                <?php $contents() ?>
            </div>
        </div>
        <?php
    }

    private function drawStyles(): void
    {
        ?>
        <style>
            .no-transition * {
                transition: none !important;
            }

            .lp-header {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 1.5em;
                align-items: center;
            }

            .lp-header-promo {
                padding: 1em;
            }

            .lp-header-promo + .lp-header-promo {
                border-top: 1px dashed #4a5568;
            }

            .lp-header-title {
                font-size: larger;
                margin-bottom: 0.25em;
            }

            .lp-header-tagline {
                margin-bottom: 0;
            }

            .lp-lrh {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5em;
                align-items: center;
            }

            .lp-lrh-left {
                display: flex;
                align-items: center;
                flex: 1 0 300px;
                flex-direction: column;
                gap: 1.5em;
            }

            .lp-lhr-highlights {
                flex: 1 1 300px;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
                gap: 1.5em;
            }

            .lp-lhr-button-split {
                display: grid;
                gap: 1em;
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            }

            .lp-lhr-label {
                font-size: smaller;
                font-weight: bold;
            }

            .lp-lrh-highlight {
                padding: 1em;
                border-radius: 0.5em;
                background: rgba(var(--gst-contrast-rgb), 0.05);
                border: 1px solid color-mix(in srgb, currentColor 10%, transparent)
            }

            @media (max-width: 600px) {
                .lp-lhr-highlights {
                    display: flex;
                    flex-direction: column;
                    gap: 0;
                }

                .lp-lrh-highlight {
                    background: none;
                    border: 0;
                    padding-left: 0.5rem;
                    padding-right: 0.5rem;
                }

                .lp-lrh-highlight + .lp-lrh-highlight {
                    border-top: 1px dashed color-mix(in srgb, currentColor 10%, transparent);
                }
            }

            .lp-lrh-highlight-title {
                font-size: smaller;
                font-weight: 500;
                margin-bottom: 0.25rem;
            }

            .lp-lrh-highlight-text {
                font-size: smaller;
            }

            .banner-container {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5em;
                align-items: center;
                margin-left: auto;
                margin-right: auto;
                width: min(1100px, 100%);
            }

            .banner-graphic-container {
                display: flex;
                align-items: center;
                justify-content: center;
                flex: 1 0 160px;
            }

            .banner-graphic-container img {
                width: 160px;
                aspect-ratio: 1;
                object-fit: contain;
                background: white;
                border-radius: 0.5rem;
                padding: 1em;
            }

            .banner-content {
                flex: 999999 0 300px;
            }

            .banner-content-highlight {
                font-size: 140%;
                margin-bottom: 1rem;
                line-height: 1.4;
            }

            .lp-conf-image-background {
                background: white;
                padding: 0.5em;
            }
        </style>
        <?php
    }

    /**
     * @return mixed[]
     */
    private function getHeaderConfig(): array
    {
        global $MYSITE;

        return [
            'include_section' => false,
            'footer_style' => 'new',
            'current' => 'home',
            'css' => ['theme-gst.css'],
            'headtags' => [
                '<link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'feed.atom">',
                '<script>',
                "function okc(f){var c=[38,38,40,40,37,39,37,39,66,65,13],x=function(){x.c=x.c||Array.apply({},c);x.r=function(){x.c=null};return x.c},h=function(e){if(x()[0]==(e||window.event).keyCode){x().shift();if(!x().length){x.r();f()}}else{x.r()}};window.addEventListener?window.addEventListener('keydown',h,false):document.attachEvent('onkeydown',h)}",
                "okc(function(){if(document.getElementById){i=document.getElementById('phplogo');i.src='" . $MYSITE . "images/php_konami.gif'}});",
                '</script>',
            ],
            'link' => [
                [
                    "rel" => "search",
                    "type" => "application/opensearchdescription+xml",
                    "href" => $MYSITE . "phpnetimprovedsearch.src",
                    "title" => "Add PHP.net search",
                ],
                [
                    "rel" => "alternate",
                    "type" => "application/atom+xml",
                    "href" => $MYSITE . "releases/feed.php",
                    "title" => "PHP Release feed",
                ],
            ],
        ];
    }
}

new FrontPageController()->render();
