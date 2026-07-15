<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Downloads;

use phpweb\Downloads\OptionResolver;
use phpweb\Downloads\Resolution;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(OptionResolver::class)]
#[Framework\Attributes\CoversClass(Resolution::class)]
class OptionResolverTest extends Framework\TestCase
{
    /**
     * @var array<string, array{name: string, variants: array<string, string>}>
     */
    private const OS_LIST = [
        'linux' => [
            'name' => 'Linux',
            'variants' => [
                'linux-debian' => 'Debian',
                'linux-ubuntu' => 'Ubuntu',
            ],
        ],
        'osx' => [
            'name' => 'macOS',
            'variants' => [
                'osx-homebrew' => 'Homebrew',
                'osx-macports' => 'MacPorts',
            ],
        ],
        'windows' => [
            'name' => 'Windows',
            'variants' => [
                'windows-downloads' => 'ZIP Downloads',
                'windows-native' => 'Single Line Installer',
            ],
        ],
    ];

    /**
     * Reproduces the production crash: a bot requesting downloads.php?os=<garbage>
     * previously made $os[$options['os']] null and threw
     * "array_key_exists(): Argument #2 ($array) must be of type array, null given".
     * It now redirects to the auto-detected results instead.
     */
    public function testInvalidOsParameterRedirectsToDefault(): void
    {
        $resolution = $this->resolver()->resolve(['os' => 'not-a-real-os'], '', '');

        self::assertSame('linux', $resolution->options['os']);
        self::assertSame('linux-debian', $resolution->options['osvariant']);
        self::assertSame('os=linux&osvariant=linux-debian&version=default', $resolution->redirectQuery);
    }

    public function testArrayOsParameterRedirectsToDefault(): void
    {
        $resolution = $this->resolver()->resolve(['os' => ['linux']], '', '');

        self::assertSame('linux', $resolution->options['os']);
        self::assertSame('os=linux&osvariant=linux-debian&version=default', $resolution->redirectQuery);
    }

    public function testInvalidOsRedirectsToAutoDetectedResults(): void
    {
        $resolution = $this->resolver()->resolve(
            ['os' => 'error'],
            '',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        );

        self::assertSame('windows', $resolution->options['os']);
        self::assertSame('os=windows&osvariant=windows-downloads&version=default', $resolution->redirectQuery);
    }

    public function testInvalidOsRedirectPreservesRequestedVersion(): void
    {
        $resolution = $this->resolver()->resolve(['os' => 'error', 'version' => '8.4'], '', '');

        self::assertSame('os=linux&osvariant=linux-debian&version=8.4', $resolution->redirectQuery);
    }

    public function testValidOsParameterDoesNotRedirect(): void
    {
        $resolution = $this->resolver()->resolve(['os' => 'windows'], '', '');

        self::assertNull($resolution->redirectQuery);
        self::assertSame('windows', $resolution->options['os']);
        self::assertSame('windows-downloads', $resolution->options['osvariant']);
    }

    public function testAbsentOsParameterDoesNotRedirect(): void
    {
        $resolution = $this->resolver()->resolve([], '', '');

        self::assertNull($resolution->redirectQuery);
        self::assertSame('linux', $resolution->options['os']);
    }

    public function testValidOsAndVariantAreHonored(): void
    {
        $resolution = $this->resolver()->resolve(
            ['os' => 'osx', 'osvariant' => 'osx-macports'],
            '',
            '',
        );

        self::assertNull($resolution->redirectQuery);
        self::assertSame('osx', $resolution->options['os']);
        self::assertSame('osx-macports', $resolution->options['osvariant']);
    }

    public function testInvalidVariantFallsBackToFirstForThatOs(): void
    {
        $resolution = $this->resolver()->resolve(
            ['os' => 'windows', 'osvariant' => 'linux-debian'],
            '',
            '',
        );

        self::assertNull($resolution->redirectQuery);
        self::assertSame('windows', $resolution->options['os']);
        self::assertSame('windows-downloads', $resolution->options['osvariant']);
    }

    public function testVersionDefaultsWhenNotSupplied(): void
    {
        $resolution = $this->resolver()->resolve([], '', '');

        self::assertSame('default', $resolution->options['version']);
    }

    public function testGetParametersArePreserved(): void
    {
        $resolution = $this->resolver()->resolve(
            ['os' => 'linux', 'version' => '8.4', 'source' => 'Y'],
            '',
            '',
        );

        self::assertSame('8.4', $resolution->options['version']);
        self::assertSame('Y', $resolution->options['source']);
    }

    public function testDetectsWindowsFromUserAgent(): void
    {
        $resolution = $this->resolver()->resolve([], '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');

        self::assertSame('windows', $resolution->options['os']);
    }

    public function testDetectsUbuntuVariantFromUserAgent(): void
    {
        $resolution = $this->resolver()->resolve([], '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64)');

        self::assertSame('linux', $resolution->options['os']);
        self::assertSame('linux-ubuntu', $resolution->options['osvariant']);
    }

    public function testExplicitOsParameterOverridesAutoDetection(): void
    {
        $resolution = $this->resolver()->resolve(
            ['os' => 'osx'],
            '',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        );

        self::assertNull($resolution->redirectQuery);
        self::assertSame('osx', $resolution->options['os']);
    }

    private function resolver(): OptionResolver
    {
        return new OptionResolver(self::OS_LIST);
    }
}
