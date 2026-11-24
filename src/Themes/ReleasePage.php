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
        bool $isReleaseAvailable = true,
        string $unavailableReason = '',
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
            $featuresLink = '<a href="#features" class="button button--primary">' . $whatsNew . '</a>';
        }

        $upgradeLink = $isReleaseAvailable ?
            '<a href="/downloads.php" class="button button--soft">' . $upgradeNow . '</a>' :
            '<a class="button button--soft" aria-disabled="true">' . $upgradeNow . '</a>';

        $unavailableNote = '';
        if (!$isReleaseAvailable && $unavailableReason !== '') {
            $unavailableNote = '<p class="release-unavailable-note">' . $unavailableReason . '</p>';
        }

        if (!str_starts_with($subtitle, '<p>')) {
            $subtitle = '<p>' . $subtitle . '</p>';
        }

        // The page's <main> opens here and closes in getPrefooter(), before the footer.
        return <<<HTML
        <main id="main">
        <section class="hero">
            <div class="hero-bg" aria-hidden="true"></div>

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
                    $upgradeLink
                </div>
                $unavailableNote
            </div>
        </section>
    HTML;
    }

    public static function getPrefooter(string $title, string $upgradeNow, string $description, string $extraCredit = '', bool $isReleaseAvailable = true, string $unavailableReason = ''): string
    {
        $footer = fancy_footer($extraCredit);
        $elephpant = site_svg('elephpant');

        $upgradeLink = $isReleaseAvailable ?
            '<a href="/downloads.php" class="button button--primary">' . $upgradeNow . '</a>' :
            '<a class="button button--primary" aria-disabled="true">' . $upgradeNow . '</a>';

        $unavailableNote = '';
        if (!$isReleaseAvailable && $unavailableReason !== '') {
            $unavailableNote = '<p class="release-unavailable-note">' . $unavailableReason . '</p>';
        }

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
                    $elephpant

                    <h2>$title</h2>

                    <div class="cta-footer-button-container">
                        $upgradeLink
                    </div>

                    $unavailableNote

                    $description
                </div>
            </section>
            </main>

            $footer

            <script>
                // Give each linkable heading a permalink, shown on hover.
                document.querySelectorAll('main h2[id]').forEach((heading) => {
                    const anchor = document.createElement('a');
                    anchor.className = 'genanchor';
                    anchor.href = '#' + heading.id;
                    anchor.textContent = ' ¶';
                    heading.append(anchor);
                });
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
                <div class="code-container" data-copy-scope>
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
                <div class="code-container" data-copy-scope>
                    <div class="header">
                        <div>
                            <span>$previousVersion</span>
                        </div>
                        $copyCodeButton
                    </div>
                    $beforeCode
                </div>

                <div class="code-container" data-copy-scope>
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
            <button type="button" data-copy-code aria-label="Copy code" title="Copy code">
                <svg class="copy-button__icon--copy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="copy-button__icon--done" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M5 14L8.5 17.5L19 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            HTML;
    }
}
