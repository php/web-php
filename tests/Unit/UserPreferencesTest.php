<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use phpweb\UserPreferences;
use PHPUnit\Framework\TestCase;

#[CoversClass(UserPreferences::class)]
final class UserPreferencesTest extends TestCase
{
    /** @param array<string, mixed> $cookie */
    #[DataProvider('loadCookiesProvider')]
    public function testLoad(
        array $cookie,
        string $languageCode,
        string|false $searchType,
        bool $isUserGroupTipsEnabled,
    ): void {
        $_COOKIE = $cookie;

        $userPreferences = new UserPreferences();
        $userPreferences->load();

        self::assertSame($languageCode, $userPreferences->languageCode);
        self::assertSame($searchType, $userPreferences->searchType);
        self::assertSame($isUserGroupTipsEnabled, $userPreferences->isUserGroupTipsEnabled);
    }

    /** @return array<int, array{array<string, mixed>, string, string|false, bool}> */
    public static function loadCookiesProvider(): array
    {
        return [
            [[], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ['en,manual,,1']], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ''], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ',,,'], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ',,,0'], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ',,ignored,,ignored'], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => 'en,,,'], 'en', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ',manual,,'], '', UserPreferences::URL_MANUAL, false],
            [['MYPHPNET' => ',quickref,,'], '', UserPreferences::URL_FUNC, false],
            [['MYPHPNET' => ',invalid,,'], '', UserPreferences::URL_NONE, false],
            [['MYPHPNET' => ',,,1'], '', UserPreferences::URL_NONE, true],
            [['MYPHPNET' => 'en,manual,,1'], 'en', UserPreferences::URL_MANUAL, true],
        ];
    }

    #[DataProvider('urlSearchTypeProvider')]
    public function testSetUrlSearchType(mixed $type, string|false $expected): void
    {
        $userPreferences = new UserPreferences(searchType: UserPreferences::URL_NONE);
        $userPreferences->setUrlSearchType($type);
        self::assertSame($expected, $userPreferences->searchType);
    }

    /** @return array<int, array{mixed, string|false}> */
    public static function urlSearchTypeProvider(): array
    {
        return [
            ['manual', UserPreferences::URL_MANUAL],
            ['quickref', UserPreferences::URL_FUNC],
            [false, UserPreferences::URL_NONE],
            ['', UserPreferences::URL_NONE],
            ['invalid', UserPreferences::URL_NONE],
            [['manual'], UserPreferences::URL_NONE],
        ];
    }

    public function testSetIsUserGroupTipsEnabled(): void
    {
        $timeBackup = $_SERVER['REQUEST_TIME'];
        $_SERVER['REQUEST_TIME'] = 1726600070;

        $userPreferences = new UserPreferences(isUserGroupTipsEnabled: false);
        $userPreferences->setIsUserGroupTipsEnabled(true);
        self::assertTrue($userPreferences->isUserGroupTipsEnabled);

        $userPreferences = new UserPreferences(isUserGroupTipsEnabled: true);
        $userPreferences->setIsUserGroupTipsEnabled(false);
        self::assertFalse($userPreferences->isUserGroupTipsEnabled);

        $_SERVER['REQUEST_TIME'] = 1726600066;

        $userPreferences = new UserPreferences(isUserGroupTipsEnabled: false);
        $userPreferences->setIsUserGroupTipsEnabled(false);
        self::assertTrue($userPreferences->isUserGroupTipsEnabled);

        $_SERVER['REQUEST_TIME'] = $timeBackup;
    }
}
