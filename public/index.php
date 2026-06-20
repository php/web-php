<?php

use phpweb\News\NewsHandler;
use phpweb\Releases\Branches;
use phpweb\Releases\VersionLogos;

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

class FrontPageClickableCard
{
    public function __construct(
        public string $title,
        public string $href,
        public string $href_label,
        public string $image = '',
        public string $body = '',
    ) {
    }
}

/**
 * @phpstan-import-type NormalizedReleaseStruct from Branches
 */
class FrontPageController
{
    /** @return list<FrontPageClickableCard> */
    private static function getHeaderCards(): array
    {
        return [
            new FrontPageClickableCard(
                title: 'Learn',
                href: '/docs.php',
                href_label: '',
//                image: '/images/language-development/documentation.png', //'Browse Docs',
                body: 'Browse the documentation, including extensive tutorials and guidance.',
            ),
            new FrontPageClickableCard(
                title: 'Releases',
                href: '#releases',
                href_label: '',
//                image: '/images/php8/logo_php8_5.svg', //'View Runtimes',
                body: 'View currently supported PHP runtimes including download logs and highlight features.',
            ),
            new FrontPageClickableCard(
                title: 'Community',
                href: '#community',
                href_label: '', //'Get Engaged',
//                image: '/images/language-development/get-involved.png',
                body: 'Get involved with the PHP Community via forums, live chat and conferences.',
            ),
            new FrontPageClickableCard(
                title: 'Language Development',
                href: '/#language-development',
                href_label: '', //'Find Out More',
                body: 'See how the PHP language works to evolve, and maybe even get involved yourself!',
            ),
        ];
    }

    /** @return list<FrontPageClickableCard> */
    private static function getLanguageDevelopmentCards(): array
    {
        return [
            new FrontPageClickableCard(
                title: 'PHP on Github',
                href: 'https://github.com/php',
                href_label: '', //'Visit GitHub',
                image: '/images/language-development/github_invertocat_white.svg',
                body: 'Browse and contribute to the source code behind the PHP engine and infrastructure.',
            ),
            new FrontPageClickableCard(
                title: 'RFCs / Language Proposals',
                href: 'https://wiki.php.net/rfc',
                href_label: '', //'View Proposals',
                image: '/images/language-development/rfcs.png',
                body: 'Requests for Comments are the mechanism PHP internals uses to propose language changes.',
            ),
            new FrontPageClickableCard(
                title: 'PHP Internals',
                href: 'https://news-web.php.net/php.internals',
                href_label: '', //'Browse Mailing List',
                image: '/images/language-development/php-internals.png',
                body: 'Browse discussions from PHP Internals mailing list about current and future enhancements.',
            ),
            new FrontPageClickableCard(
                title: 'Get Involved',
                href: '/get-involved.php',
                href_label: '', //'Get Involved',
                image: '/images/language-development/get-involved.png',
                body: 'Find ways to contribute to the PHP engine, documentation and more.',
            ),
            new FrontPageClickableCard(
                title: 'Submit a Bug Report',
                href: 'https://github.com/php/php-src/issues',
                href_label: '', //'Browse & Submit Issues',
                image: '/images/language-development/submit-bug-report.png',
                body: 'Found a bug in the PHP runtime? Help us out by submitting it to our issue tracker.',
            ),
            new FrontPageClickableCard(
                title: 'Documentation Translation',
                href: 'https://doc.php.net/guide/',
                href_label: '', //'Learn About Translation',
                image: '/images/language-development/documentation.png',
                body: 'Help our team translate our documentation into multiple languages.',
            ),
        ];
    }

    /** @return list<FrontPageClickableCard> */
    private static function getCommunityLinks(): array
    {
        return [
            new FrontPageClickableCard(
                title: 'Reddit',
                href: 'https://www.reddit.com/r/PHP/',
                href_label: '',
                image: '/images/community/reddit.png',
                body: 'Reddit has an active PHP community discussing the language and its ecosystem.',
            ),
            new FrontPageClickableCard(
                title: 'PHP Community (Discord)',
                href: 'https://discord.phpc.social/',
                href_label: '',
                image: '/images/community/phpc-discord.png',
                body: 'Join thousands of users on Discord talking about PHP.',
            ),
            new FrontPageClickableCard(
                title: 'Official Mailing Lists',
                href: '/mailing-lists.php',
                href_label: '',
                image: '/images/community/mailing-lists.png',
                body: 'Help and guidance, as well as proposals & discussions on the future of the language.',
            ),
            new FrontPageClickableCard(
                title: 'PHP Developers (Discord)',
                href: 'https://discord.gg/php-developers-484326318851358720',
                href_label: '',
                image: '/images/community/phpdevelopers-discord.webp',
                body: 'Born in 2018, it is the first community on Discord dedicated to PHP developers. Open for both experts and apprentices.',
            ),
            new FrontPageClickableCard(
                title: 'Libera.Chat',
                href: 'https://libera.chat/',
                href_label: '',
                image: '/images/community/libera.svg',
                body: 'Providing a community platform for free and open-source software and peer directed projects..',
            ),
            new FrontPageClickableCard(
                title: 'LinkedIn',
                href: 'https://www.linkedin.com/search/results/content/?keywords=php',
                href_label: '',
                image: '/images/community/linkedin.svg',
                body: 'PHP related posts on the world\'s largest professional network.',
            ),
            new FrontPageClickableCard(
                title: 'phpc.social (Mastodon)',
                href: 'https://phpc.social/',
                href_label: '',
                image: '/images/community/mastodon.svg',
                body: 'A place for PHP programmers & friends to discuss topics related to the PHP programming language, frameworks, packages, tools, open source, tech, life, and more',
            ),
        ];
    }

    private const array FOUNDATION_SPONSORS = [
        ['name' => 'JetBrains', 'icon' => 'https://images.opencollective.com/jetbrains/fe76f99/logo.png'],
        ['name' => 'Private Packagist', 'icon' => 'https://images.opencollective.com/packagist/2ac48ff/logo.png'],
        ['name' => 'Cybozu', 'icon' => 'https://images.opencollective.com/cybozu/933e46d/logo.png'],
        ['name' => 'Aternos GmbH', 'icon' => 'https://images.opencollective.com/aternos/5436b31/logo.png'],
        ['name' => 'Mercari Inc.', 'icon' => 'https://images.opencollective.com/mercari/454ef50/logo.png'],
        ['name' => 'pixiv Inc.', 'icon' => 'https://images.opencollective.com/user-ecfec7e5/2f4c2c4/logo.png'],
        ['name' => 'SPY', 'icon' => 'https://images.opencollective.com/spy/261d722/logo.png'],
        ['name' => 'Symfony Corp', 'icon' => 'https://images.opencollective.com/symfony-sas/b1f53fd/logo.png'],
        ['name' => 'shopware AG', 'icon' => 'https://images.opencollective.com/stefan-hamann/2865d41/logo.png'],
        ['name' => 'OP.GG', 'icon' => 'https://images.opencollective.com/opgg/7e44af2/logo.png'],
        ['name' => 'Passbolt', 'icon' => 'https://images.opencollective.com/passbolt/2468aab/logo.png'],
        ['name' => 'Spryker', 'icon' => 'https://images.opencollective.com/spryker/a634346/logo.png'],
        ['name' => 'Digital Scholar', 'icon' => 'https://images.opencollective.com/digital-scholar/logo.png'],
        ['name' => 'Cambium Learning, Inc.', 'icon' => 'https://images.opencollective.com/cambium-learning-inc/30c5f1c/logo.png'],
        ['name' => 'Craft CMS', 'icon' => 'https://images.opencollective.com/craftcms/1fd28bf/logo.png'],
        ['name' => 'GoDaddy.com', 'icon' => 'https://images.opencollective.com/godaddy/c37e587/logo.png'],
        ['name' => 'Laravel', 'icon' => 'https://images.opencollective.com/laravel/4ad04b8/logo.png'],
        ['name' => 'Livesport s.r.o.', 'icon' => 'https://images.opencollective.com/livesport-s-r-o/be081c5/logo.png'],
        ['name' => 'Aligent Consulting', 'icon' => 'https://images.opencollective.com/aligent-consulting/ee7abd9/logo.png'],
        ['name' => 'Moodle', 'icon' => 'https://images.opencollective.com/moodle/141a57d/logo.png'],
    ];

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

        $conferences =[];
        foreach (new NewsHandler()->getConferences() as $conference) {

        }

        site_header(null, $this->getHeaderConfig());
        $this->drawStyles();

        $this->drawSection('primary', 'hero', function() {
            ?>
            <div class="lp-header">
                <div style="flex: 999999 0 400px">

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
            $this->drawClickableCards(self::getHeaderCards(), id: 'header-cards');
        });

        $this->drawSection('secondary', 'releases', function() use ($latestRelease, $latestReleases) {
            $this->drawLatestVersionHeader($latestRelease);
            ?>

            <div class="gst-cgrid" style="grid-template-columns: repeat(auto-fit, minmax(340px, 1fr))">
                <?php foreach ($latestReleases as $release) { ?>
                    <?php $this->drawSupportedMinorVersion($release); ?>
                <?php } ?>
            </div>
            <?php
        });

        $this->drawSection('primary', 'php-foundation', function() {
            ?>
            <div class="banner-container">
                <div class="banner-graphic-container">
                    <img src="https://web-php-revamp26-558551258802.europe-west4.run.app/images/logos/php-foundation.svg"
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

        $this->drawSection('secondary', 'community', function(): void {
            $this->drawSectionTitle(
                    title: 'Community',
                    subtitle: 'Find places to engage with other PHP users across the internet',
            );

            $this->drawClickableCards(self::getCommunityLinks(), id: 'community-cards', shuffleLimit: 6);

            $this->drawSectionTitle(
                    title: 'Events & Conferences',
                    subtitle: 'Events & Conferences',
            );

            $this->drawClickableCards(self::getCommunityLinks(), id: 'event-cards', shuffleLimit: 6);
        });

        $this->drawSection('primary', 'composer', function() {
            ?>
            <div class="banner-container">
                <div class="banner-graphic-container">
                    <img src="https://web-php-revamp26-558551258802.europe-west4.run.app/images/logos/composer.png"
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

        $this->drawSection('secondary', 'language-development', function() {
            $this->drawSectionTitle(
                    title: 'Language Development',
                    subtitle: 'It takes a broad effort to develop the PHP language',
            );

            $this->drawClickableCards(self::getLanguageDevelopmentCards(), id: 'language-development-cards');
        });

        site_footer([
            'footer_style' => 'new',
            "atom" => "/feed.atom", // Add a link to the feed at the bottom
        ]);
    }


    private function safe(string $content): string
    {
        return htmlspecialchars($content, ENT_QUOTES);
    }

    private function drawLatestVersionHeader(array $release): void
    {
        [$major, $minor] = explode('.', $release['version']);
        $versionId = $major . '.' . $minor;
        $highlights = (require __DIR__ . '/../include/branch-highlights.inc')[$versionId]['features'] ?? [];

        ?>
        <div class="lp-lrh">
            <div class="lp-lrh-left">
                <?= VersionLogos::getLogo($versionId, highlight: '#000000', style: 'width: 100%; height: 100px') ?>

                <?php $this->drawUnifiedVersionHeader($release) ?>
            </div>
            <div class="lp-lhr-highlights">
                <?php foreach ($highlights as $highlight) { ?>
                <div class="lp-lrh-highlight">
                    <div class="lp-lrh-highlight-title"><?= $this->safe($highlight['title']) ?></div>
                    <div class="lp-lrh-highlight-text"><?= $this->safe($highlight['about'] ?? $highlight['short'] ?? '') ?></div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }

    private function drawUnifiedVersionHeader(array $release): void
    {
        $releaseId = $release['version'];
        [$major, $minor, $patch] = explode('.', $releaseId);
        $versionId = $major . '.' . $minor;

        $timeLabel = function (string $label, ?DateTime $time): string {
            return sprintf('<span><span style="font-weight: 500; margin-right: 0.5em">%s:</span>%s</span>',
                    $label,
                    $time ? $time->format('Y-m-d') : 'End  of  Life',
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
        <div class="gst-card gst-cgrid-card">
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
                        <?php foreach ($upgrades as $upgrade) { ?>
                            <li><?= $this->safe($upgrade['short'] ?? $upgrade['title'] ?? '')?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="gst-card-footer" style="display: flex; gap: 1em; flex-wrap: wrap; padding-top: 0">
                <a style="flex: 1 1; padding: 1em" class="gst-card-chunky-btn" href="/releases/<?= $versionId ?>/">Discover More</a>
                <a style="flex: 1 1; padding: 1em" class="gst-card-chunky-btn" href="/downloads.php?version=<?= $versionId ?>">Download</a>
            </div>
        </div>
        <?php
    }

    /**
     * @param FrontPageClickableCard[] $cards
     * @return void
     */
    private function drawClickableCards(array $cards, int $width = 340, string $id = '', ?int $shuffleLimit = null): void
    {
        ?>
        <div class="gst-cgrid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(<?= $width ?>px, 1fr));)"
            id="<?= $id ?>"
        >
            <?php foreach ($cards as $card) { ?>
                <div class="gst-cgrid-card gst-card gst-navcard">
                    <div style="position: absolute; top: 0; right: 0; padding-top: 0.25em; padding-right: 0.25em">
                        <svg class="gst-navcard-indicator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M480 96C515.3 96 544 124.7 544 160L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 160C96 124.7 124.7 96 160 96L480 96zM368 360C368 373.3 378.7 384 392 384C405.3 384 416 373.3 416 360L416 248C416 234.7 405.3 224 392 224L280 224C266.7 224 256 234.7 256 248C256 261.3 266.7 272 280 272L334.1 272L231.1 375C221.7 384.4 221.7 399.6 231.1 408.9C240.5 418.2 255.7 418.3 265 408.9L368 305.9L368 360z"/></svg>
                    </div>
                    <div class="gst-card-title">
                        <?php if ($card->image) { ?>
                            <img src="<?= $this->safe($card->image) ?>"
                                 style="width: 64px; height: 64px; border-radius: 0.25em; object-fit: contain"
                                 aria-hidden="true" alt=""/>
                        <?php } ?>

                        <div role="heading" id="<?= $id ?>-title-text" class="gst-navcard-title-text" style="flex: 1 0 200px">
                            <a class="plaina gst-navcard-title-link" href="<?= $this->safe($card->href) ?>"><?= $this->safe($card->title) ?></a>
                        </div>
                    </div>
                    <div class="gst-card-content" id="<?= $id ?>-content-text">
                        <?= $this->safe($card->body) ?>
                    </div>

                    <?php if ($card->href_label) { ?>
                    <div class="gst-card-footer">
                        <span class="gst-navcard-btn"><?= $this->safe($card->href_label) ?></span>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const parent = document.querySelector('#<?= $id ?>');

                <?php if ($shuffleLimit !== null) { ?>
                shuffleDOMChildrenWithLimit(parent, <?= $shuffleLimit ?>);
                <?php } ?>

                dynamicAlignment(parent, <?= $width ?>);
            });
        </script>
        <?php
    }

    private function drawSection(string $template, string $id, Closure $contents): void
    {
        ?>
        <div class="<?= "gst-$template gst-$template-container" ?>" id="<?= $this->safe($id) ?>">
            <div class="gst-content-p-wide">
                <?php $contents() ?>
            </div>
        </div>
        <?php
    }

    private function drawSectionTitle(string $title, string $subtitle = ''): void
    {
        ?>
        <div class="gst-section-title">
            <div role="heading" style="font-size: 40px; line-height: 1.2"><?= $this->safe($title) ?></div>

            <?php if (!empty($subtitle)) { ?>
                <div style="margin-top: 0.75em; font-size: 20px; font-weight: 500;">
                    <?= $this->safe($subtitle) ?>
                </div>
            <?php } ?>
        </div>
        <?php
    }

    private function drawStyles(): void
    {
        ?>
        <script type="text/javascript">
            function shuffleImmutableArray(array) {
                const newArray = [...array];
                for (let i = newArray.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [newArray[i], newArray[j]] = [newArray[j], newArray[i]];
                }
                return newArray;
            }

            function shuffleDOMChildrenWithLimit(parent, limit) {
                const children = Array.from(parent.children);
                const  replacements = shuffleImmutableArray(children).slice(0, limit);

                while (parent.children.length) {
                    parent.removeChild(parent.children[0]);
                }

                replacements.forEach(n => parent.appendChild(n));
            }

            function dynamicAlignment(parent, targetWidth)
            {
                parent.style.display = 'flex';
                parent.style.flexWrap = 'wrap';
                parent.style.justifyContent = 'center';

                let resizeTimer;

                const resizeObserver = new ResizeObserver((entries) => {
                    // Instantly apply the class that kills transitions on children
                    parent.classList.add('no-transition');

                    // Clear previous timeout and set a new one to restore transitions
                    // 100ms after the resize completely stops.
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        parent.classList.remove('no-transition');
                    }, 100);

                    for (const entry of entries) {
                        const containerWidth = entry.contentRect.width;
                        const children = Array.from(parent.children);
                        const itemCount = children.length;

                        // Prevent dividing by zero or calculating for empty containers
                        if (itemCount === 0 || containerWidth === 0) continue;

                        const computedStyle = window.getComputedStyle(parent);
                        const columnGap = parseFloat(computedStyle.columnGap) || 0;

                        // Calculate the max number of items that can theoretically fit in one row
                        let columnsPerRow = Math.floor((containerWidth + columnGap) / (targetWidth + columnGap));
                        if (columnsPerRow < 1) columnsPerRow = 1;

                        let itemWidth;

                        if (itemCount >= columnsPerRow) {
                            // We have enough items to completely fill at least one row.
                            // Calculate exact width needed to stretch across the full container.
                            const exactWidth = (containerWidth - (columnsPerRow - 1) * columnGap) / columnsPerRow;

                            // Subtract 0.5px margin of error to guarantee that browser rounding
                            // engines never accidentally push the final item onto the next row.
                            itemWidth = exactWidth - 0.5;
                        } else {
                            // We DO NOT have enough items to completely fill a single row.
                            // Constrain them to the targetWidth, clamping it if the container is tiny.
                            itemWidth = Math.min(targetWidth, containerWidth);
                        }

                        // Apply synchronously so it paints in the same frame
                        children.forEach((child) => {
                            child.style.boxSizing = 'border-box';
                            child.style.width = `${itemWidth}px`;
                            child.style.flex = `0 0 ${itemWidth}px`;
                        });
                    }
                });

                resizeObserver.observe(parent);
            }

            document.addEventListener('DOMContentLoaded', () => {
                shuffleDOMChildrenWithLimit(document.querySelector('#community-cards'), 6);
            });
        </script>
        <style>
            .no-transition * {
                transition: none !important;
            }

            .lp-header {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 1.5em;
                margin-bottom: 2em;
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
                background: #4F5B93;
                border-radius: var(--gst-card-radius);
                padding: 2em;
                margin-bottom: 1.5em;
                display: flex;
                flex-wrap: wrap;
                gap: 1.5em;
                align-items: center;
                color: white;

                & a {
                    color: white;;
                }
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
                flex: 1 0 160px;
            }

            .banner-graphic-container img {
                width: 160px;
                aspect-ratio: 1;
                object-fit: contain;
                background: white;
                border-radius: 0.5rem;
            }

            .banner-content {
                flex: 999999 0 300px;
            }

            .banner-content-highlight {
                font-size: 140%;
                margin-bottom: 1rem;
                line-height: 1.4;
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
            'css' => ['theme-gst.css', 'landing.css'],
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
