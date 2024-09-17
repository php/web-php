<?php

namespace phpweb;

/**
 * Handles the "My PHP.net" preferences.
 */
final class UserPreferences
{
    public const URL_NONE = false;

    public const URL_FUNC = 'quickref';

    public const URL_MANUAL = 'manual';

    public static string $languageCode = '';

    /**
     * URL search fallback
     *
     * @var 'manual'|'quickref'|false
     */
    public static string|false $searchType = self::URL_NONE;

    public static bool $isUserGroupTipsEnabled = false;

    public static function load(): void
    {
        self::$languageCode = '';
        self::$searchType = self::URL_NONE;
        self::$isUserGroupTipsEnabled = false;

        if (!isset($_COOKIE['MYPHPNET']) || !is_string($_COOKIE['MYPHPNET']) || $_COOKIE['MYPHPNET'] === '') {
            return;
        }

        /**
         * 0 - Language code
         * 1 - URL search fallback
         * 2 - Mirror site (removed)
         * 3 - User Group tips
         * 4 - Documentation developmental server (removed)
         */
        $preferences = explode(",", $_COOKIE['MYPHPNET']);
        self::$languageCode = $preferences[0] ?? '';
        if (isset($preferences[1]) && in_array($preferences[1], [self::URL_FUNC, self::URL_MANUAL], true)) {
            self::$searchType = $preferences[1];
        }

        self::$isUserGroupTipsEnabled = isset($preferences[3]) && $preferences[3];
    }
}
