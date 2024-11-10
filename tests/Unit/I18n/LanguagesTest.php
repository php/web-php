<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\I18n;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use phpweb\I18n\Languages;

use function array_diff;

#[CoversClass(Languages::class)]
final class LanguagesTest extends TestCase
{
    #[DataProvider('languageCodeProvider')]
    public function testConvert(string $languageCode, string $expected): void
    {
        self::assertSame($expected, (new Languages())->convert($languageCode));
    }

    public static function languageCodeProvider(): iterable
    {
        yield ['en', 'en'];
        yield ['de', 'de'];
        yield ['es', 'es'];
        yield ['fr', 'fr'];
        yield ['it', 'it'];
        yield ['ja', 'ja'];
        yield ['pl', 'pl'];
        yield ['pt_br', 'pt_BR'];
        yield ['pt_BR', 'pt_BR'];
        yield ['ro', 'ro'];
        yield ['ru', 'ru'];
        yield ['tr', 'tr'];
        yield ['uk', 'uk'];
        yield ['zh', 'zh'];
        yield ['zh_cn', 'zh'];
        yield ['zh_CN', 'zh'];
        yield ['unknown', 'en'];
        yield ['', 'en'];
    }

    public function testConstantsDifference(): void
    {
        self::assertSame(
            array_diff(Languages::LANGUAGES, Languages::INACTIVE_ONLINE_LANGUAGES),
            Languages::ACTIVE_ONLINE_LANGUAGES,
        );
    }

    public function testLanguagesIncGlobalVariables(): void
    {
        global $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES, $ACTIVE_ONLINE_LANGUAGES;

        include __DIR__ . '/../../../include/languages.inc';

        self::assertSame(Languages::LANGUAGES, $LANGUAGES);
        self::assertSame(Languages::INACTIVE_ONLINE_LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);
        self::assertSame(Languages::ACTIVE_ONLINE_LANGUAGES, $ACTIVE_ONLINE_LANGUAGES);
    }
}
