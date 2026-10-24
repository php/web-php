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
        $footer = fancy_footer($extraCredit);

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
                        <a href="/downloads.php" class="button-primary">$upgradeNow</a>
                    </div>

                    $description
                </div>
            </section>

            $footer

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
