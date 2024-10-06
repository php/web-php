<?php

declare(strict_types=1);

namespace phpweb;

use function explode;
use function in_array;
use function is_string;
use function join;
use function mirror_setcookie;

/**
 * Handles the "My PHP.net" preferences.
 */
final class UserPreferences
{
    public const URL_NONE = false;

    public const URL_FUNC = 'quickref';

    public const URL_MANUAL = 'manual';

    /** @param self::URL_* $searchType URL search fallback */
    public function __construct(
        public string $languageCode = '',
        public string|false $searchType = self::URL_NONE,
        public bool $isUserGroupTipsEnabled = false,
    ) {
    }

    public function load(): void
    {
        $this->languageCode = '';
        $this->searchType = self::URL_NONE;
        $this->isUserGroupTipsEnabled = false;

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
        $this->languageCode = $preferences[0] ?? '';
        $this->setUrlSearchType($preferences[1] ?? self::URL_NONE);
        $this->isUserGroupTipsEnabled = isset($preferences[3]) && $preferences[3];
    }

    public function setUrlSearchType(mixed $type): void
    {
        if (!in_array($type, [self::URL_FUNC, self::URL_MANUAL, self::URL_NONE], true)) {
            return;
        }

        $this->searchType = $type;
    }

    public function setIsUserGroupTipsEnabled(bool $enable): void {
        // Show the ug tips to lucky few, depending on time.
        if ($_SERVER["REQUEST_TIME"] % 10) {
            $enable = true;
        }

        $this->isUserGroupTipsEnabled = $enable;
    }

    public function save(): void
    {
        /**
         * 0 - Language code
         * 1 - URL search fallback
         * 2 - Mirror site (removed)
         * 3 - User Group tips
         * 4 - Documentation developmental server (removed)
         */
        $preferences = [$this->languageCode, $this->searchType, '', $this->isUserGroupTipsEnabled];

        // Set all the preferred values for a year
        mirror_setcookie("MYPHPNET", join(",", $preferences), 60 * 60 * 24 * 365);
    }
}
