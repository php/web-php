<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Events;

use phpweb\Events\EventInput;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(EventInput::class)]
final class EventInputTest extends Framework\TestCase
{
    public function testCoercesNumericStringsToIntegers(): void
    {
        $result = EventInput::normalize(['smonth' => '12', 'sday' => '25', 'syear' => '2026']);

        self::assertSame(12, $result['smonth']);
        self::assertSame(25, $result['sday']);
        self::assertSame(2026, $result['syear']);
    }

    public function testCoercesNonNumericStringsToZero(): void
    {
        $result = EventInput::normalize(['smonth' => 'January', 'sday' => 'abc', 'syear' => '12abc']);

        self::assertSame(0, $result['smonth']);
        self::assertSame(0, $result['sday']);
        self::assertSame(0, $result['syear']);
    }

    public function testCoercesArrayValuesToZero(): void
    {
        $result = EventInput::normalize(['smonth' => ['x'], 'sday' => [], 'syear' => ['1', '2']]);

        self::assertSame(0, $result['smonth']);
        self::assertSame(0, $result['sday']);
        self::assertSame(0, $result['syear']);
    }

    public function testDefaultsMissingNumericFieldsToZero(): void
    {
        $result = EventInput::normalize([]);

        foreach (['sday', 'smonth', 'syear', 'eday', 'emonth', 'eyear', 'recur', 'recur_day'] as $field) {
            self::assertSame(0, $result[$field], $field);
        }
    }

    public function testDefaultsMissingStringFieldsToEmptyString(): void
    {
        $result = EventInput::normalize([]);

        foreach (['type', 'country', 'category', 'email', 'url', 'ldesc', 'sdesc'] as $field) {
            self::assertSame('', $result[$field], $field);
        }
    }

    public function testKeepsSuppliedStringFields(): void
    {
        $result = EventInput::normalize(['email' => 'a@b.com', 'type' => 'multi', 'sdesc' => '0']);

        self::assertSame('a@b.com', $result['email']);
        self::assertSame('multi', $result['type']);
        self::assertSame('0', $result['sdesc']);
    }

    public function testLeavesUnknownFieldsUntouched(): void
    {
        $result = EventInput::normalize(['sname' => 'PHP UK', 'smonth' => '5']);

        self::assertSame('PHP UK', $result['sname']);
        self::assertSame(5, $result['smonth']);
    }

    /**
     * Regression test for the production fatal:
     *   Uncaught TypeError: checkdate(): Argument #1 ($month) must be of type int, string given
     *
     * After normalization the date parts are always integers, so passing them to
     * checkdate() (and mktime()) can no longer throw a TypeError; garbage input
     * simply becomes an invalid (0) date that the normal validation rejects.
     */
    public function testNormalizedValuesAreSafeForCheckdate(): void
    {
        $result = EventInput::normalize(['smonth' => 'notamonth', 'sday' => '1', 'syear' => '2026']);

        self::assertFalse(checkdate($result['smonth'], $result['sday'], $result['syear']));
    }
}
