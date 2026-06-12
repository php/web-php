<?php

namespace phpweb\Themes;

class ReleasePage
{
    public static function getHeroSection(
        string $title,
        string $subtitle,
        string $logoSvg,
        string $upgradeNow,
        string $whatsNew = '',
        string $released = '',
    ): string {
        $releasedBadge = '';
        if ($released !== '') {
            $releasedBadge = <<<HTML
            <div class="hero-badge">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                </svg>
                $released
            </div>
            HTML;
        }

        $featuresLink = '';
        if ($whatsNew !== '') {
            $featuresLink = '<a href="#features" class="button-primary">' . $whatsNew . '</a>';
        }

        if (!str_starts_with($subtitle, '<p>')) {
            $subtitle = '<p>' . $subtitle . '</p>';
        }

        return <<<HTML
        <section class="hero">
            <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice" class="hero-bg" aria-hidden="true">
                <defs>
                    <radialGradient id="Gradient1" cx="50%" cy="50%" fx="0.441602%" fy="50%" r=".5"><stop offset="0%" stop-color="rgba(210, 203, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient2" cx="50%" cy="50%" fx="2.68147%" fy="50%" r=".5"><stop offset="0%" stop-color="rgba(133, 109, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient3" cx="50%" cy="50%" fx="0.836536%" fy="50%" r=".5"><stop offset="0%" stop-color="rgba(210, 203, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
                </defs>
                <g class="hero-orb-1-x"><g class="hero-orb-1-y"><rect width="100%" height="100%" fill="url(#Gradient1)" class="hero-orb-1-r"></rect></g></g>
                <g class="hero-orb-2-x"><g class="hero-orb-2-y"><rect width="100%" height="100%" fill="url(#Gradient2)" class="hero-orb-2-r"></rect></g></g>
                <g class="hero-orb-3-x"><g class="hero-orb-3-y"><rect width="100%" height="100%" fill="url(#Gradient3)" class="hero-orb-3-r"></rect></g></g>
            </svg>

            <!-- hero background pattern -->
            <svg aria-hidden="true" class="hero-pattern">
                <defs>
                    <pattern id="hero-pattern" width="32" height="64" patternUnits="userSpaceOnUse" x="-1" y="-1">
                        <path d="M0,28 L20,28 L20,16 L16,16 L16,24 L4,24 L4,4 L32,4 L32,32 L28,32 L28,8 L8,8 L8,20 L12,20 L12,12 L24,12 L24,32 L0,32 L0,28 Z M12,36 L32,36 L32,40 L16,40 L16,64 L0,64 L0,60 L12,60 L12,36 Z M28,48 L24,48 L24,60 L32,60 L32,64 L20,64 L20,44 L32,44 L32,56 L28,56 L28,48 Z M0,36 L8,36 L8,56 L0,56 L0,52 L4,52 L4,40 L0,40 L0,36 Z"
                              fill="none" stroke-dasharray="0"></path>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#hero-pattern)"></rect>
            </svg>

            <div class="hero-content">
                $releasedBadge
                $logoSvg

                <h1>$title</h1>
                $subtitle

                <div class="hero-actions">
                    $featuresLink
                    <a href="/downloads.php" class="button-secondary">$upgradeNow</a>
                </div>
            </div>
        </section>
    HTML;
    }

    public static function getPrefooter(string $title, string $upgradeNow, string $description, string $extraCredit = ''): string
    {
        $currentYear = date('Y');

        return <<<HTML
            <section class="cta-footer">
                <svg aria-hidden="true">
                    <defs>
                        <pattern id="cta-pattern" width="12" height="12" patternUnits="userSpaceOnUse" x="-1" y="-1">
                            <path d="M.5 12V.5H12" fill="none" stroke-dasharray="0"></path>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#cta-pattern)"></rect>
                </svg>

                <div class="cta-footer-content">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path fill="currentColor"
                              d="M0 12.2v-.7a.5.5 0 0 1 1 0v.8c0 .2.1.3.3.5l.7.2.8-.2.2-.6V5c0-2 1.7-4 4.1-4 2.4 0 4 1.4 4.4 3 1 .1 2 .4 3 1.1l1 1.4c.3.5.5 1 .5 1.5v5.5c0 .3-.2.5-.5.5h-8a.5.5 0 0 1-.5-.5v-4c0-.2.1-.4.3-.5a6 6 0 0 0 2.4-1.5c.5-.7.9-1.6.8-3 0-1-1.2-2.5-3.3-2.5A3.1 3.1 0 0 0 4 5v7.2c0 .6-.2 1-.6 1.3-.3.4-.8.5-1.4.5-.5 0-1-.2-1.3-.4-.4-.3-.6-.7-.7-1.2v-.2ZM11.5 5a5 5 0 0 1-1 3.1C9.8 9 8.9 9.4 8 9.8V13h3v-2.5a.5.5 0 0 1 1 0V13h3V8c0-.2 0-.6-.3-1-.2-.4-.5-.8-.9-1.1a5 5 0 0 0-2.3-.9ZM7 5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                    </svg>

                    <h2>$title</h2>

                    <div class="cta-footer-button-container">
                        <a href="/downloads" class="button-primary">$upgradeNow</a>
                    </div>

                    $description
                </div>
            </section>

            <footer>
                <div class="footer-container">
                    <div class="footer-grid">
                        <div>
                            <a href="/" class="footer-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -1 100 50" fill="currentColor">
                                    <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                                    <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"></path>
                                    <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                                </svg>
                            </a>

                            <p>PHP is developed and maintained by a global community of contributors.
                                <a href="https://thephp.foundation/" target="_blank">The PHP Foundation</a> helps fund this work. <br>
                                If PHP is part of your business or projects, consider sponsoring the Foundation.</p>

                            <div class="social-icons">
                                <a href="https://www.linkedin.com/company/phpnet/" target="_blank" rel="noopener noreferrer">
                                    <span class="sr-only">Linkedin</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M11.9428 1.75H12.0572C14.2479 1.74999 15.9686 1.74998 17.312 1.93059C18.6886 2.11568 19.7809 2.50271 20.6391 3.36091C21.4973 4.21911 21.8843 5.31137 22.0694 6.68802C22.25 8.03144 22.25 9.75214 22.25 11.9428V12.0572C22.25 14.2479 22.25 15.9686 22.0694 17.312C21.8843 18.6886 21.4973 19.7809 20.6391 20.6391C19.7809 21.4973 18.6886 21.8843 17.312 22.0694C15.9686 22.25 14.2479 22.25 12.0572 22.25H11.9428C9.7521 22.25 8.03144 22.25 6.68802 22.0694C5.31137 21.8843 4.21911 21.4973 3.36091 20.6391C2.50272 19.7809 2.11568 18.6886 1.93059 17.312C1.74998 15.9686 1.74999 14.2479 1.75 12.0572V12.0572V11.9428V11.9428C1.74999 9.75211 1.74998 8.03144 1.93059 6.68802C2.11568 5.31137 2.50272 4.21911 3.36091 3.36091C4.21911 2.50271 5.31137 2.11568 6.68802 1.93059C8.03143 1.74998 9.75214 1.74999 11.9428 1.75ZM8.00195 10.5C8.00195 9.94771 7.55424 9.5 7.00195 9.5C6.44967 9.5 6.00195 9.94771 6.00195 10.5L6.00195 17C6.00195 17.5523 6.44967 18 7.00195 18C7.55424 18 8.00195 17.5523 8.00195 17L8.00195 10.5ZM11.002 9C11.4073 9 11.7564 9.2412 11.9134 9.58791C12.5213 9.215 13.2365 9 14.002 9C16.2111 9 18.002 10.7909 18.002 13V17C18.002 17.5523 17.5542 18 17.002 18C16.4497 18 16.002 17.5523 16.002 17V13C16.002 11.8954 15.1065 11 14.002 11C12.8974 11 12.002 11.8954 12.002 13L12.002 17C12.002 17.5523 11.5542 18 11.002 18C10.4497 18 10.002 17.5523 10.002 17L10.002 10C10.002 9.44771 10.4497 9 11.002 9ZM8.25977 7C8.25977 7.69036 7.70012 8.25 7.00977 8.25H7.00078C6.31043 8.25 5.75078 7.69036 5.75078 7C5.75078 6.30964 6.31043 5.75 7.00078 5.75H7.00977C7.70012 5.75 8.25977 6.30964 8.25977 7Z"
                                              fill="currentColor"></path>
                                    </svg>
                                </a>
                                <a href="https://fosstodon.org/@php" target="_blank" rel="noopener noreferrer">
                                    <span class="sr-only">@php@fosstodon.org</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M21.5 6.5c-.3-2.2-2.3-3.9-4.6-4.2-.4 0-1.9-.3-5.3-.3s-4.2.2-4.6.3c-2.2.3-4.3 1.9-4.8 4C2 7.6 2 8.8 2 9.9a38.5 38.5 0 0 0 .8 7.9c.4 2 2.4 3.5 4.2 4.2a11.6 11.6 0 0 0 7 .1l1.5-.6v-1.6a19 19 0 0 1-4.1.4c-2.3 0-3-1-3.2-1.5a4.7 4.7 0 0 1-.2-1.3c1.3.3 2.7.5 4 .5h1c1.3 0 2.7-.1 4-.4h.2a5 5 0 0 0 4.3-4.8V6.5Zm-3.3 7.9H16V9c0-1.1-.4-1.7-1.4-1.7-1 0-1.6.7-1.6 2v3h-2.2v-3c0-1.3-.5-2-1.6-2-1 0-1.4.6-1.4 1.7v5.3H5.6V8.9c0-1.1.3-2 .9-2.6a3 3 0 0 1 2.3-1c1.2 0 2 .4 2.6 1.2l.5 1 .6-1c.5-.8 1.4-1.2 2.5-1.2 1 0 1.8.3 2.4 1 .6.6.8 1.5.8 2.6v5.5Z"></path>
                                    </svg>
                                </a>
                                <a href="https://github.com/php/" target="_blank" rel="noopener noreferrer">
                                    <span class="sr-only">GitHub</span>
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                              clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>

                            <a href="https://thephp.foundation/sponsor/" target="_blank" class="button-primary">Donate</a>
                        </div>
                        <div class="footer-links-container">
                            <div class="footer-links-grid">
                                <div>
                                    <h3>PHP</h3>
                                    <ul role="list">
                                        <li><a href="/my.php">My PHP.net</a></li>
                                        <li><a href="/downloads.php">Downloads</a></li>
                                        <li><a href="/contact.php">Contact</a></li>
                                        <li><a href="/sites.php">Other PHP.net sites</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <h3>Learn</h3>
                                    <ul role="list">
                                        <li><a href="/docs.php">Documentation</a></li>
                                        <li><a href="/get-involved.php">Get Involved</a></li>
                                        <li><a href="/support.php">Help</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-links-grid">
                                <div>
                                    <h3>The PHP Foundation</h3>
                                    <ul role="list">
                                        <li><a href="https://thephp.foundation/" target="_blank" rel="noopener noreferrer">
                                                About the Foundation</a></li>
                                        <li><a href="https://thephp.foundation/sponsor/" target="_blank"
                                               rel="noopener noreferrer">Sponsor</a>
                                        </li>
                                        <li><a href="https://thephp.foundation/contact/" target="_blank"
                                               rel="noopener noreferrer">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h3>Legal</h3>
                                    <ul role="list">
                                        <li><a href="/privacy.php">Privacy policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-credits">
                        <p>Copyright © 2001-$currentYear The PHP Group.</p>
                        $extraCredit
                    </div>
                </div>
            </footer>

            <!-- noise -->
            <svg class="noise" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" preserveAspectRatio="none">
                <defs>
                    <filter id="noise-filter">
                        <feTurbulence type="turbulence" baseFrequency="1" numOctaves="1" stitchTiles="stitch" result="noise"></feTurbulence>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0" result="coloredNoise"></feColorMatrix>
                    </filter>
                </defs>
                <rect width="100%" height="100%" filter="url(#noise-filter)"></rect>
            </svg>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.addEventListener('click', async (e) => {
                        const btn = e.target.closest('.js-copy-code');
                        if (!btn?.closest('.code-container')) return;

                        const code = btn.closest('.code-container').querySelector('code').textContent;
                        if (!navigator.clipboard) return console.error('Clipboard API not available');

                        try {
                            await navigator.clipboard.writeText(code);
                            const originalHTML = btn.innerHTML;
                            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M5 14L8.5 17.5L19 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                            btn.disabled = true;
                            await new Promise(r => setTimeout(r, 2000));
                            btn.innerHTML = originalHTML;
                            btn.disabled = false;
                        } catch (err) {
                            console.error('Copy failed:', err);
                        }
                    });
                })
            </script>
            HTML;
    }

    /**
     * @param FeatureComparison[] $comparisons
     */
    public static function getFeatureComparisons(array $comparisons, string $version, string $previousVersion, string $newText = ''): string
    {
        $html = '';
        $lastKey = array_key_last($comparisons);

        foreach ($comparisons as $key => $feature) {
            $html .= self::getFeatureComparison(
                feat: $feature,
                version: $version,
                previousVersion: $previousVersion,
                isLast: $key === $lastKey,
                newText: $newText,
            ) . "\n";
        }

        return $html;
    }

    private static function getFeatureComparison(
        FeatureComparison $feat,
        string $version,
        string $previousVersion,
        bool $isLast,
        string $newText = '',
    ): string {
        $codeBlock = self::getCodeBlock($feat->before, $feat->after, $version, $previousVersion, $feat->highlightCode, $newText, $feat->links);
        $code2Block = '';

        if ($feat->after2 !== '') {
            $code2Block = self::getCodeBlock($feat->before2, $feat->after2, $version, $previousVersion, $feat->highlightCode);
        }

        $last = $isLast ? ' last' : '';

        $description = $feat->description;
        if (!str_starts_with($description, '<p>')) {
            $description = '<p>' . $description . '</p>';
        }

        return <<<HTML
            <section class="before-and-after-container$last">
                <div class="before-and-after-title-and-description">
                    <h2 id="{$feat->id}">{$feat->title}</h2>
                    $description
                </div>
                $codeBlock
                $code2Block
            </section>
            HTML;
    }

    private static function getCodeBlock(
        string $beforeCode,
        string $afterCode,
        string $version,
        string $previousVersion,
        bool $highlightCode,
        string $newText = '',
        array $links = [],
    ): string {
        $links = array_map(self::getRfcLink(...), $links);
        $linksHtml = implode("\n", $links);

        $newBadge = '';
        if ($newText !== '') {
            $newBadge = '<span class="badge-green">' . htmlspecialchars($newText) . '</span>';
        }

        $noBeforeCode = $beforeCode === '';

        if ($highlightCode) {
            $beforeCode = highlight_php_trimmed($beforeCode, true);
            $afterCode = highlight_php_trimmed($afterCode, true);
        } else {
            $beforeCode = "<pre><code>$beforeCode</code></pre>";
            $afterCode = "<pre><code>$afterCode</code></pre>";
        }

        $version = htmlspecialchars($version);
        $previousVersion = htmlspecialchars($previousVersion);
        $copyCodeButton = self::getCopyCodeButton();

        if ($noBeforeCode) {
            $codeMarkup = <<<HTML
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>$version</span>
                            $newBadge
                            $linksHtml
                        </div>
                        $copyCodeButton
                    </div>
                    $afterCode
                </div>
                HTML;
        } else {
            $codeMarkup = <<<HTML
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>$previousVersion</span>
                        </div>
                        $copyCodeButton
                    </div>
                    $beforeCode
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>$version</span>
                            $newBadge
                            $linksHtml
                        </div>
                        $copyCodeButton
                    </div>
                    $afterCode
                </div>
                HTML;
        }

        $singleClass = $noBeforeCode ? ' single' : '';
        return <<<HTML
            <div class="before-and-after-code-container">
                <div class="before-and-after-code$singleClass">
                    $codeMarkup
                </div>
            </div>
            HTML;
    }

    private static function getRfcLink(string $namedLink): string
    {
        // Use 'title|link' string since multiple links may have the same title
        preg_match('!^((.+)\|)?(.+)$!', $namedLink, $matches);
        $link = $matches[3];
        $title = $matches[2] ?: 'Link';

        return '<a target="_blank" href="' . $link . '">' . $title . ' <span>↗</span></a>';
    }

    private static function getCopyCodeButton(): string
    {
        return <<<'HTML'
            <button class="js-copy-code">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            HTML;
    }
}
