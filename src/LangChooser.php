<?php

namespace phpweb;

class LangChooser
{
    private readonly string $preferredLanguage;

    private readonly string $defaultLanguage;

    /**
     * @param array<string, string> $availableLanguages
     * @param array<string, string> $inactiveLanguages
     */
    public function __construct(
        private readonly array $availableLanguages,
        private readonly array $inactiveLanguages,
        string $preferredLanguage,
        string $defaultLanguage,
    )
    {
        $this->defaultLanguage = $this->normalize($defaultLanguage);
        $this->preferredLanguage = $this->normalize($preferredLanguage);
    }

    /**
     * @return array{string, string}
     */
    public function chooseCode(
        string|array|null $langParam,
        string $requestUri,
        ?string $acceptLanguageHeader,
    ): array
    {
        // Default values for languages
        $explicitly_specified = '';

        // Specified for the request (GET/POST parameter)
        if (is_string($langParam)) {
            $langCode = $this->normalize(htmlspecialchars($langParam, ENT_QUOTES, 'UTF-8'));
            $explicitly_specified = $langCode;
            if ($this->isAvailableLanguage($langCode)) {
                return [$langCode, $explicitly_specified];
            }
        }

        // Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
        if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", htmlspecialchars($requestUri,ENT_QUOTES, 'UTF-8'), $flang)) {
            // Put language into preference list
            $rlang = $this->normalize($flang[1]);

            // Set explicitly specified language
            if (empty($explicitly_specified)) {
                $explicitly_specified = $rlang;
            }

            // Drop out language specification from URL, as this is already handled
            $_SERVER['STRIPPED_URI'] = preg_replace(
                "!^/$flang[1]/!", "/", htmlspecialchars($requestUri, ENT_QUOTES, 'UTF-8'),
            );

            if ($this->isAvailableLanguage($rlang)) {
                return [$rlang, $explicitly_specified];
            }
        }

        // Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
        if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", htmlspecialchars($requestUri, ENT_QUOTES, 'UTF-8'), $flang)) {
            $flang = $this->normalize($flang[1]);

            // Set explicitly specified language
            if (empty($explicitly_specified)) {
                $explicitly_specified = $flang;
            }

            if ($this->isAvailableLanguage($flang)) {
                return [$flang, $explicitly_specified];
            }
        }

        // Honor the users own language setting (if available)
        if ($this->isAvailableLanguage($this->preferredLanguage)) {
            return [$this->preferredLanguage, $explicitly_specified];
        }

        // Specified by the user via the browser's Accept Language setting
        // Samples: "hu, en-us;q=0.66, en;q=0.33", "hu,en-us;q=0.5"
        $browser_langs = [];

        // Check if we have $_SERVER['HTTP_ACCEPT_LANGUAGE'] set and
        // it no longer breaks if you only have one language set :)
        if (isset($acceptLanguageHeader)) {
            $browser_accept = explode(",", $acceptLanguageHeader);

            // Go through all language preference specs
            foreach ($browser_accept as $value) {
                // The language part is either a code or a code with a quality
                // We cannot do anything with a * code, so it is skipped
                // If the quality is missing, it is assumed to be 1 according to the RFC
                if (preg_match("!([a-z-]+)(;q=([0-9\\.]+))?!", trim($value), $found)) {
                    $quality = (isset($found[3]) ? (float) $found[3] : 1.0);
                    $browser_langs[] = [$found[1], $quality];
                }
                unset($found);
            }
        }

        // Order the codes by quality
        usort($browser_langs, fn ($a, $b) => $b[1] <=> $a[1]);

        // For all languages found in the accept-language
        foreach ($browser_langs as $langdata) {

            // Translation table for accept-language codes and phpdoc codes
            switch ($langdata[0]) {
                case "pt-br":
                    $langdata[0] = 'pt_br';
                    break;
                case "zh-cn":
                    $langdata[0] = 'zh';
                    break;
                case "zh-hk":
                    $langdata[0] = 'hk';
                    break;
                case "zh-tw":
                    $langdata[0] = 'tw';
                    break;
            }

            // We do not support flavors of languages (except the ones above)
            // This is not in conformance to the RFC, but it here for user
            // convenience reasons
            if (preg_match("!^(.+)-!", $langdata[0], $match)) {
                $langdata[0] = $match[1];
            }

            $lang = $this->normalize($langdata[0]);
            if ($this->isAvailableLanguage($lang)) {
                return [$lang, $explicitly_specified];
            }
        }

        // Language preferred by this mirror site
        if ($this->isAvailableLanguage($this->defaultLanguage)) {
            return [$this->defaultLanguage, $explicitly_specified];
        }

        // Last default language is English
        return ["en", $explicitly_specified];
    }

    private function normalize(string $langCode): string
    {
        // Make language code lowercase, html encode special chars and remove slashes
        $langCode = strtolower(htmlspecialchars($langCode));

        // The Brazilian Portuguese code needs special attention
        if ($langCode == 'pt_br') {
            return 'pt_BR';
        }
        return $langCode;
    }

    private function isAvailableLanguage(string $langCode): bool
    {
        return isset($this->availableLanguages[$langCode]) && !isset($this->inactiveLanguages[$langCode]);
    }
}
