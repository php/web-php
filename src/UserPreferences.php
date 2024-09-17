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
}
