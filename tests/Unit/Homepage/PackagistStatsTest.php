<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Homepage;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use phpweb\Homepage\PackagistStats;

#[CoversClass(PackagistStats::class)]
final class PackagistStatsTest extends TestCase
{
    public function testReadsTotalsFromStatisticsJson(): void
    {
        $json = '{"totals": {"downloads": 213748586762, "packages": 480630, "versions": 6066036, "packageVersions": 1}}';

        self::assertSame(
            ['packages' => 480630, 'versions' => 6066036, 'downloads' => 213748586762],
            PackagistStats::fromJson($json),
        );
    }

    #[DataProvider('provideUnusableJson')]
    public function testFallsBackWhenTheJsonIsUnusable(?string $json): void
    {
        self::assertSame(PackagistStats::FALLBACK, PackagistStats::fromJson($json));
    }

    /**
     * @return iterable<string, array{?string}>
     */
    public static function provideUnusableJson(): iterable
    {
        yield 'missing' => [null];
        yield 'empty' => [''];
        yield 'malformed' => ['{"totals": '];
        yield 'not an object' => ['"totals"'];
        yield 'no totals' => ['{"other": 1}'];
        yield 'totals not an object' => ['{"totals": 5}'];
        yield 'a total missing' => ['{"totals": {"packages": 1, "versions": 2}}'];
        yield 'a total not an integer' => ['{"totals": {"packages": "1", "versions": 2, "downloads": 3}}'];
        yield 'a total out of integer range' => ['{"totals": {"packages": 1e30, "versions": 2, "downloads": 3}}'];
    }

    public function testFallsBackWhenTheFileIsMissing(): void
    {
        self::assertSame(PackagistStats::FALLBACK, PackagistStats::load(__DIR__ . '/does-not-exist.json'));
    }

    #[DataProvider('provideAbbreviatedNumbers')]
    public function testAbbreviatesLargeNumbers(int $number, string $expected): void
    {
        self::assertSame($expected, PackagistStats::abbreviate($number));
    }

    /**
     * @return iterable<string, array{int, string}>
     */
    public static function provideAbbreviatedNumbers(): iterable
    {
        yield 'under a thousand' => [999, '999'];
        yield 'thousands round down' => [480630, '480K'];
        yield 'millions round down to two decimals' => [6066036, '6.06M'];
        yield 'millions never round up to the next tier' => [999_999_999, '999.99M'];
        yield 'trailing zeros are dropped' => [6000000, '6M'];
        yield 'one trailing zero is dropped' => [6100000, '6.1M'];
        yield 'billions round down with a plus' => [213748586762, '213B+'];
    }
}
