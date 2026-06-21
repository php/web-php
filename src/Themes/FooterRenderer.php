<?php

namespace phpweb\Themes;

use phpweb\Navigation\NavItem;
use function htmlspecialchars;
use function idate;

class FooterRenderer
{
    /**
     * @return list<NavItem>
     */
    public static function getBottomNavigationLinks(): array
    {
        return [
            new NavItem(
                name: 'PHP',
                href: '',
                id: 'footer-php',
                children: [
                    new NavItem(
                        name: 'My PHP.net',
                        href: '/my.php',
                        id: 'footer-my-php',
                    ),
                    new NavItem(
                        name: 'Downloads',
                        href: '/downloads.php',
                        id: 'footer-downloads',
                    ),
                    new NavItem(
                        name: 'Contact',
                        href: '/contact.php',
                        id: 'footer-contact',
                    ),
                    new NavItem(
                        name: 'Other PHP.net sites',
                        href: '/sites.php',
                        id: 'footer-sites',
                    ),
                ],
            ),
            new NavItem(
                name: 'Learn',
                href: '',
                id: 'footer-learn',
                children: [
                    new NavItem(
                        name: 'Documentation',
                        href: '/docs.php',
                        id: 'footer-documentation',
                    ),
                    new NavItem(
                        name: 'Get Involved',
                        href: '/get-involved.php',
                        id: 'footer-get-involved',
                    ),
                ],
            ),
            new NavItem(
                name: 'The PHP Foundation',
                href: '',
                id: 'footer-foundation',
                children: [
                    new NavItem(
                        name: 'About the Foundation',
                        href: 'https://thephp.foundation/',
                        id: 'footer-foundation-about',
                    ),
                    new NavItem(
                        name: 'Sponsor',
                        href: 'https://thephp.foundation/sponsor/',
                        id: 'footer-foundation-sponsor',
                    ),
                    new NavItem(
                        name: 'Contact',
                        href: 'https://thephp.foundation/contact/',
                        id: 'footer-foundation-contact',
                    ),
                ],
            ),
            new NavItem(
                name: 'Legal',
                href: '',
                id: 'footer-legal',
                children: [
                    new NavItem(
                        name: 'Privacy Policy',
                        href: '/privacy.php',
                        id: 'footer-privacy',
                    ),
                ],
            ),
        ];
    }

    public static function renderFooter(): void
    {
        ?>
        <footer class="gst-theme-footer gst-container gst-footer-block">
            <div class="gst-content-p-wide">
                <div style="display: flex; gap: 3em; flex-wrap: wrap; align-items: center; font-size: 90%">
                    <div style="flex: 1 1 400px">
                        <img src="/images/logos/new-php-logo.svg" style="width: 100px" alt="PHP logo "/>
                        <br /><br />

                        PHP is developed and maintained by a global community of contributors.
                        <br /><br />

                        The <a rel="nofollow" href="https://thephp.foundation/">PHP Foundation</a> helps fund this work.
                        If PHP is part of your business or projects, consider sponsoring the Foundation.
                    </div>
                    <div style="flex: 99999 0; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.5em">
                        <?php foreach (self::getBottomNavigationLinks() as $top) { ?>
                            <div>
                                <div style="font-weight: bold"><?= htmlspecialchars($top->name) ?></div>
                                <br />

                                <div role="list">
                                    <?php foreach ($top->children as $link) { ?>
                                        <a role="listitem" style="display: block; margin-bottom: 0.5em; border-bottom: 0"
                                           href="<?= htmlspecialchars($link->href) ?>"
                                        >
                                            <?= htmlspecialchars($link->name) ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div style="text-align: center; font-size: 90%; margin-top: 2em">
                    <a href="/copyright.php">Copyright © 2001 - <?= idate('Y') ?> the PHP Group. All Rights Reserved.</a>
                </div>
            </div>
        </footer>
        <?php
    }
}
