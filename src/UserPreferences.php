<?php

namespace phpweb;

/**
 * Handles the "My PHP.net" preferences.
 */
final class UserPreferences
{
    public static string $languageCode = '';

    /**
     * URL search fallback
     *
     * @var 'manual'|'quickref'|false
     */
    public static string|false $searchType = false;

    public static bool $isUserGroupTipsEnabled = false;
}
