<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use phpweb\LangChooser;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(LangChooser::class)]
class LangChooserTest extends Framework\TestCase
{
    private const DEFAULT_LANGUAGE_LIST = [
        'en' => 'English',
        'de' => 'German',
        'ja' => 'Japanese',
        'pt_BR' => 'Brazilian Portuguese',
        'zh' => 'Chinese (Simplified)',
    ];

    public function testChooseCodeWithLangParameter(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', '', 'en');
        $result = $langChooser->chooseCode('de', '/', null);

        self::assertSame(['de', 'de'], $result);
    }

    public function testChooseCodeWithShortcutPath(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', '/de/echo', null);

        self::assertSame(['de', 'de'], $result);
    }

    #[Framework\Attributes\TestWith(['de', 'de'])]
    #[Framework\Attributes\TestWith(['pt_BR', 'pt_BR'])]
    public function testChooseCodeWithManualPath(string $pathLang, string $expected): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', "/manual/$pathLang", null);

        self::assertSame([$expected, $expected], $result);
    }

    public function testChooseCodeWithUserPreference(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], 'de', 'en');
        $result = $langChooser->chooseCode('', '/', null);

        self::assertSame(['de', ''], $result);
    }

    public function testChooseCodeWithAcceptLanguage(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', '/', 'de,ja,en');

        self::assertSame(['de', ''], $result);
    }

    public function testChooseCodeWithAcceptLanguageQuality(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', '/', 'de;q=0.8,ja,en');

        self::assertSame(['ja', ''], $result);
    }

    #[Framework\Attributes\TestWith(['de-at', 'de'])]
    #[Framework\Attributes\TestWith(['pt-br', 'pt_BR'])]
    #[Framework\Attributes\TestWith(['zh-cn', 'zh'])]
    #[Framework\Attributes\TestWith(['zh-tw', 'en'])]
    public function testChooseCodeWithAcceptLanguageFollowedByCountryCode(string $acceptLanguage, string $expected): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', '/', $acceptLanguage);

        self::assertSame([$expected, ''], $result);
    }

    public function testChooseCodeWithMirrorDefaultLanguage(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'de');
        $result = $langChooser->chooseCode('', '/', null);

        self::assertSame(['de', ''], $result);
    }

    public function testChooseCodeWithDefaultLanguage(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'fr');
        $result = $langChooser->chooseCode('', '/', null);

        self::assertSame(['en', ''], $result);
    }

    public function testChooseCodeWithLangParameterAndManualPath(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('de', '/manual/en', null);

        self::assertSame(['de', 'de'], $result);
    }

    public function testChooseCodeWithManualPathAndUserPreference(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], 'en', 'en');
        $result = $langChooser->chooseCode('', '/manual/de', null);

        self::assertSame(['de', 'de'], $result);
    }

    public function testChooseCodeWithManualPathAndAcceptLanguage(): void
    {
        $langChooser = new LangChooser(self::DEFAULT_LANGUAGE_LIST, [], '', 'en');
        $result = $langChooser->chooseCode('', '/manual/de', 'en');

        self::assertSame(['de', 'de'], $result);
    }

    public function testChooseCodeInactiveLanguageIsNotChosen(): void
    {
        $langChooser = new LangChooser(['en' => 'English', 'de' => 'German', 'pl' => 'Polish'], ['pl' => 'Polish'], '', '');
        $result = $langChooser->chooseCode('pl', '/manual/pl', 'pl');

        self::assertSame(['en', 'pl'], $result);
    }
}
