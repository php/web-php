<?php

declare(strict_types=1);

namespace phpweb\Events;

final class EventInput
{
    /**
     * The numeric event fields (start/end date parts and recurrence) that must be
     * integers before being passed to checkdate() or mktime().
     */
    private const NUMERIC_FIELDS = [
        'sday', 'smonth', 'syear', 'eday',
        'emonth', 'eyear', 'recur', 'recur_day',
    ];

    /**
     * The free-text event fields, which default to an empty string so the form can
     * be rendered and validated without E_WARNING on undefined array keys.
     */
    private const STRING_FIELDS = [
        'type', 'country', 'category', 'email', 'url', 'ldesc', 'sdesc',
    ];

    /**
     * Normalize a raw event submission so every known field is present and of the
     * expected type.
     *
     * Untrusted numeric input (non-numeric strings, arrays, missing values) would
     * otherwise reach checkdate()/mktime() and throw a TypeError under PHP 8.
     * Anything that is not a numeric value becomes 0, i.e. an invalid date that the
     * normal form validation already rejects. Missing text fields become an empty
     * string. Unknown fields are left untouched.
     *
     * @param array<string, mixed> $post
     * @return array<string, mixed>
     */
    public static function normalize(array $post): array
    {
        foreach (self::NUMERIC_FIELDS as $field) {
            $value = $post[$field] ?? null;
            $post[$field] = is_numeric($value) ? (int) $value : 0;
        }

        foreach (self::STRING_FIELDS as $field) {
            $post[$field] ??= '';
        }

        return $post;
    }
}
