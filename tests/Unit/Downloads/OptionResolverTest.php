<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Downloads;

use phpweb\Downloads\OptionResolver;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(OptionResolver::class)]
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
     */
    public function testInvalidOsParameterFallsBackToDefault(): void
    {
        $options = $this->resolver()->resolve(['os' => 'not-a-real-os'], '', '');

        self::assertSame('linux', $options['os']);
        self::assertSame('linux-debian', $options['osvariant']);
    }

    public function testArrayOsParameterFallsBackToDefault(): void
    {
        $options = $this->resolver()->resolve(['os' => ['linux']], '', '');

        self::assertSame('linux', $options['os']);
    }

    public function testValidOsParameterSelectsFirstVariant(): void
    {
        $options = $this->resolver()->resolve(['os' => 'windows'], '', '');

        self::assertSame('windows', $options['os']);
        self::assertSame('windows-downloads', $options['osvariant']);
    }

    public function testValidOsAndVariantAreHonored(): void
    {
        $options = $this->resolver()->resolve(
            ['os' => 'osx', 'osvariant' => 'osx-macports'],
            '',
            '',
        );

        self::assertSame('osx', $options['os']);
        self::assertSame('osx-macports', $options['osvariant']);
    }

    public function testInvalidVariantFallsBackToFirstForThatOs(): void
    {
        $options = $this->resolver()->resolve(
            ['os' => 'windows', 'osvariant' => 'linux-debian'],
            '',
            '',
        );

        self::assertSame('windows', $options['os']);
        self::assertSame('windows-downloads', $options['osvariant']);
    }

    public function testVersionDefaultsWhenNotSupplied(): void
    {
        $options = $this->resolver()->resolve([], '', '');

        self::assertSame('default', $options['version']);
    }

    public function testGetParametersArePreserved(): void
    {
        $options = $this->resolver()->resolve(
            ['os' => 'linux', 'version' => '8.4', 'source' => 'Y'],
            '',
            '',
        );

        self::assertSame('8.4', $options['version']);
        self::assertSame('Y', $options['source']);
    }

    public function testDetectsWindowsFromUserAgent(): void
    {
        $options = $this->resolver()->resolve([], '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');

        self::assertSame('windows', $options['os']);
    }

    public function testDetectsUbuntuVariantFromUserAgent(): void
    {
        $options = $this->resolver()->resolve([], '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64)');

        self::assertSame('linux', $options['os']);
        self::assertSame('linux-ubuntu', $options['osvariant']);
    }

    public function testExplicitOsParameterOverridesAutoDetection(): void
    {
        $options = $this->resolver()->resolve(
            ['os' => 'osx'],
            '',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        );

        self::assertSame('osx', $options['os']);
    }

    private function resolver(): OptionResolver
    {
        return new OptionResolver(self::OS_LIST);
    }
}
