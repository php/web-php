<?php

declare(strict_types=1);

namespace phpweb\Downloads;

class OptionResolver
{
    /**
     * @param array<string, array{name: string, variants: array<string, string>}> $osList
     */
    public function __construct(private readonly array $osList)
    {
    }

    /**
     * Resolve the selected download options from the request, auto-detecting the
     * operating system from client hints / user agent when not explicitly chosen.
     *
     * When the client supplies an invalid os parameter (e.g. bots requesting
     * ?os=<garbage> or ?os[]=x, which previously crashed while indexing the os
     * list), the returned Resolution carries a redirect query pointing at the
     * auto-detected results instead of silently rendering a default.
     *
     * @param array<string, mixed> $get GET parameters (os, osvariant, version, ...)
     */
    public function resolve(array $get, string $platformHeader, string $uaHeader): Resolution
    {
        [$autoOs, $autoOsVariant] = $this->autoDetect($platformHeader, $uaHeader);

        $defaults = [
            'os' => $autoOs ?? 'linux',
            'version' => 'default',
        ];

        $options = array_merge($defaults, $get);

        $invalidOs = array_key_exists('os', $get)
            && (!is_string($get['os']) || !array_key_exists($get['os'], $this->osList));

        if ($invalidOs) {
            $options['os'] = $defaults['os'];
        }

        if ($autoOsVariant && (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $this->osList[$options['os']]['variants']))) {
            $options['osvariant'] = $autoOsVariant;
        } elseif (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $this->osList[$options['os']]['variants'])) {
            $options['osvariant'] = array_key_first($this->osList[$options['os']]['variants']);
        }

        return new Resolution(
            $options,
            $invalidOs ? $this->redirectQuery($options) : null,
        );
    }

    /**
     * Build the canonical query string for the auto-detected results, preserving
     * the resolved os/variant/version so the redirect lands on a valid page.
     *
     * @param array<string, mixed> $options
     */
    private function redirectQuery(array $options): string
    {
        $query = [];

        foreach (['os', 'osvariant', 'version'] as $key) {
            if (array_key_exists($key, $options) && is_string($options[$key])) {
                $query[$key] = $options[$key];
            }
        }

        return http_build_query($query);
    }

    /**
     * @return array{0: ?string, 1: ?string} [auto os, auto os variant]
     */
    private function autoDetect(string $platformHeader, string $uaHeader): array
    {
        $autoOs = null;
        $autoOsVariant = null;

        if ($platformHeader === '' && $uaHeader === '') {
            return [$autoOs, $autoOsVariant];
        }

        $platform = strtolower(trim($platformHeader, '"'));

        if ($platform === 'windows' || stripos($uaHeader, 'Windows') !== false) {
            $autoOs = 'windows';
        } elseif ($platform === 'macos' || stripos($uaHeader, 'Mac') !== false) {
            $autoOs = 'osx';
        } elseif ($platform === 'linux' || stripos($uaHeader, 'Linux') !== false) {
            $autoOs = 'linux';
            if (stripos($uaHeader, 'Ubuntu') !== false) {
                $autoOsVariant = 'linux-ubuntu';
            } elseif (stripos($uaHeader, 'Debian') !== false) {
                $autoOsVariant = 'linux-debian';
            } elseif (stripos($uaHeader, 'Fedora') !== false) {
                $autoOsVariant = 'linux-fedora';
            } elseif (stripos($uaHeader, 'Red Hat') !== false || stripos($uaHeader, 'RedHat') !== false) {
                $autoOsVariant = 'linux-redhat';
            }
        }

        return [$autoOs, $autoOsVariant];
    }
}
