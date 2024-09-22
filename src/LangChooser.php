<?php

namespace phpweb;

class LangChooser
{
    /**
     * @param array<string, string> $availableLanguages
     * @param array<string, string> $inactiveLanguages
     */
    public function __construct(
        private readonly array $availableLanguages,
        private readonly array $inactiveLanguages,
        private readonly string $preferredLanguage,
        private readonly string $defaultLanguage,
    )
    {
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
        // Contains all the languages picked up by the
        // process in priority order (without repeating codes)
        $languages = [];

        // Default values for languages
        $explicitly_specified = ''; $selected = '';

        // Specified for the request (GET/POST parameter)
        if (is_string($langParam)) {
            $explicitly_specified = $this->add(htmlspecialchars($langParam, ENT_QUOTES, 'UTF-8'), $languages);
        }

        // Specified in a shortcut URL (eg. /en/echo or /pt_br/echo)
        if (preg_match("!^/(\\w{2}(_\\w{2})?)/!", htmlspecialchars($requestUri,ENT_QUOTES, 'UTF-8'), $flang)) {

            // Put language into preference list
            $rlang = $this->add($flang[1], $languages);

            // Set explicitly specified language
            if (empty($explicitly_specified)) {
                $explicitly_specified = $rlang;
            }

            // Drop out language specification from URL, as this is already handled
            $_SERVER['STRIPPED_URI'] = preg_replace(
                "!^/$flang[1]/!", "/", htmlspecialchars($requestUri, ENT_QUOTES, 'UTF-8'),
            );

        }

        // Specified in a manual URL (eg. manual/en/ or manual/pt_br/)
        if (preg_match("!^/manual/(\\w{2}(_\\w{2})?)(/|$)!", htmlspecialchars($requestUri, ENT_QUOTES, 'UTF-8'), $flang)) {

            $flang = $this->add($flang[1], $languages);

            // Set explicitly specified language
            if (empty($explicitly_specified)) {
                $explicitly_specified = $flang;
            }
        }

        // Honor the users own language setting (if available)
        if ($this->preferredLanguage) {
            $this->add($this->preferredLanguage, $languages);
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

            // Add language to priority order
            $this->add($langdata[0], $languages);
        }

        // Language preferred by this mirror site
        $this->add($this->defaultLanguage, $languages);

        // Last default language is English
        $this->add("en", $languages);

        $selected = $languages[0];

        // Return with all found data
        return [$selected, $explicitly_specified];
    }

    /**
     * Add a language to the possible languages' list
     *
     * @param string $langcode
     * @param list<string> $langs
     */
    private function add(string $langcode, array &$langs): string
    {

        // Make language code lowercase, html encode special chars and remove slashes
        $langcode = strtolower(htmlspecialchars($langcode));

        // The Brazilian Portuguese code needs special attention
        if ($langcode == 'pt_br') { $langcode = 'pt_BR'; }

        // Append language code in priority order if it is not
        // there already and supported by the PHP site. Try to
        // lower number of file_exists() calls to the minimum...
        if (!in_array($langcode, $langs, false) && isset($this->availableLanguages[$langcode])
            && !isset($this->inactiveLanguages[$langcode])) {
            $langs[] = $langcode;
        }

        // Return with language code
        return $langcode;
    }
}
