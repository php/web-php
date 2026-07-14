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
     * @param array<string, mixed> $get GET parameters (os, osvariant, version, ...)
     * @return array<string, mixed>
     */
    public function resolve(array $get, string $platformHeader, string $uaHeader): array
    {
        [$autoOs, $autoOsVariant] = $this->autoDetect($platformHeader, $uaHeader);

        $defaults = [
            'os' => $autoOs ?? 'linux',
            'version' => 'default',
        ];

        $options = array_merge($defaults, $get);

        // Ignore an invalid or non-string os parameter (e.g. bots requesting
        // ?os=<garbage> or ?os[]=x) so indexing $osList below stays safe.
        if (!is_string($options['os']) || !array_key_exists($options['os'], $this->osList)) {
            $options['os'] = $defaults['os'];
        }

        if ($autoOsVariant && (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $this->osList[$options['os']]['variants']))) {
            $options['osvariant'] = $autoOsVariant;
        } elseif (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $this->osList[$options['os']]['variants'])) {
            $options['osvariant'] = array_key_first($this->osList[$options['os']]['variants']);
        }

        return $options;
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
