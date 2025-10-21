<?php

$return = [];


$return['pipe-operator']['before'] = <<<'PHP'
$input = ' Some kind of string. ';
$output = strtolower(
    str_replace(['.', '/', '…'], '',
        str_replace(' ', '-',
            trim($input)
        )
    )
);
var_dump($output);
// string(19) "some-kind-of-string"
PHP;


$return['pipe-operator']['after'] = <<<'PHP'
$input = ' Some kind of string. ';
$output = $input
    |> trim(...)
    |> (fn($string) => str_replace(' ', '-', $string))
    |> (fn($string) => str_replace(['.', '/', '…'], '', $string))
    |> strtolower(...);
var_dump($output);
// string(19) "some-kind-of-string"
PHP;

$return['url_parsing_api']['before'] = <<<'PHP'
$components = parse_url('https://php.net/releases/8.5/en.php');
var_dump($components['host']);
// string(7) "php.net"
PHP;

$return['url_parsing_api']['after'] = <<<'PHP'
use Uri\Rfc3986\Uri;
$uri = new Uri('https://php.net/releases/8.5/en.php');
var_dump($uri->getHost());
// string(7) "php.net"
PHP;


$return['clone_with']['before'] = <<<'PHP'
final readonly class PhpVersion
{
    public function __construct(
        public string $version = 'PHP 8.4',
    ) {}
    public function withVersion(string $version): self
    {
        $newObject = clone $this;
        $newObject->version = $version;
        return $newObject;
    }
}
$version = new PhpVersion();
var_dump($version->version);
// string(7) "PHP 8.4"
var_dump($version->withVersion('PHP 8.5')->version);
// Fatal error: Uncaught Error: Cannot modify readonly property PhpVersion::$version
PHP;

$return['clone_with']['after'] = <<<'PHP'
final readonly class PhpVersion
{
    public function __construct(
        public string $version = 'PHP 8.4',
    ) {}
    public function withVersion(string $version): self
    {
        return clone($this, [
            'version' => $version,
        ]);
    }
}
$version = new PhpVersion();
var_dump($version->version);
// string(7) "PHP 8.4"
var_dump($version->withVersion('PHP 8.5')->version);
// string(7) "PHP 8.5"
var_dump($version->version);
// string(7) "PHP 8.4"
PHP;


$return['fcc_in_const_expr']['before'] = <<<'PHP'
final class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    #[DataProvider('subtractionProvider')]
    public function testSubtraction(
        int $minuend,
        int $subtrahend,
        int $result
    ): void
    {
        $this->assertSame(
            $result,
            Calculator::subtract($minuend, $subtrahend)
        );
    }
    public static function subtractionProvider(): iterable
    {
        for ($i = -10; $i <= 10; $i++) {
            yield [$i, $i, 0];
            yield [$i, 0, $i];
            yield [0, $i, -$i];
        }
    }
}
PHP;

$return['fcc_in_const_expr']['after'] = <<<'PHP'
final class CalculatorTest
{
    #[Test\CaseGenerator(static function (): iterable
    {
        for ($i = -10; $i <= 10; $i++) {
            yield [$i, $i, 0];
            yield [$i, 0, $i];
            yield [0, $i, -$i];
        }
    })]
    public function testSubtraction(
        int $minuend,
        int $subtrahend,
        int $result
    )
    {
        \assert(
            Calculator::subtract($minuend, $subtrahend) === $result
        );
    }
}
PHP;

$return['curl_share_persistence_improvement']['before'] = <<<'PHP'
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);
$ch1 = curl_init('https://php.net/');
curl_setopt($ch1, CURLOPT_SHARE, $sh);
curl_exec($ch1);
$ch2 = curl_init('https://thephp.foundation/');
curl_setopt($ch2, CURLOPT_SHARE, $sh);
curl_exec($ch2);
PHP;

$return['curl_share_persistence_improvement']['after'] = <<<'PHP'
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT
]);
$ch1 = curl_init('https://php.net/');
curl_setopt($ch1, CURLOPT_SHARE, $sh);
curl_exec($ch1);
$ch2 = curl_init('https://thephp.foundation/');
curl_setopt($ch2, CURLOPT_SHARE, $sh);
curl_exec($ch2);
PHP;


$return['array_first_last']['before'] = <<<'PHP'
$php = [
    'php-82' => ['state' => 'security', 'branch' => 'PHP-8.2'],
    'php-83' => ['state' => 'active', 'branch' => 'PHP-8.3'],
    'php-84' => ['state' => 'active', 'branch' => 'PHP-8.4'],
    'php-85' => ['state' => 'upcoming', 'branch' => 'PHP-8.5'],
];
$upcomingRelease = null;
foreach ($php as $key => $version) {
    if ($version['state'] === 'upcoming') {
        $upcomingRelease = $version;
        break;
    }
}
var_dump($upcomingRelease);
PHP;

$return['array_first_last']['after'] = <<<'PHP'
$php = [
    'php-82' => ['state' => 'security', 'branch' => 'PHP-8.2'],
    'php-83' => ['state' => 'active', 'branch' => 'PHP-8.3'],
    'php-84' => ['state' => 'active', 'branch' => 'PHP-8.4'],
    'php-85' => ['state' => 'upcoming', 'branch' => 'PHP-8.5'],
];
$upcomingRelease = array_first(
    array_filter(
        $php,
        static fn($version) => $version['state'] === 'upcoming'
    )
);
var_dump($upcomingRelease);
PHP;


$return['no_discard']['before'] = <<<'PHP'
function getPhpVersion(): string
{
	return 'PHP 8.4';
}
getPhpVersion(); // No Errors
PHP;

$return['no_discard']['after'] = <<<'PHP'
#[\NoDiscard]
function getPhpVersion(): string
{
	return 'PHP 8.5';
}
getPhpVersion();
// Warning: The return value of function getPhpVersion() should either be used or intentionally ignored by casting it as (void)
PHP;


$return['attr_on_consts'] = <<<'PHP'
#[\MyAttribute]
const Example1 = 1;
PHP;

$return['cpp_on_final_props'] = <<<'PHP'
class A {
    public function __construct(
        final $p1,
        final int $p2,
        final readonly int $p3
    ) {
        // ...
    }
}
PHP;


$return['static_aviz'] = <<<'PHP'
class Example
{
    public private(set) static string $classTitle = 'Example class';

    // Implicitly public-read, just like object properties.
    protected(set) static int $counter = 0;

    public static function changeName(string $name): void
    {
        // From private scope, so this is allowed.
        self::$classTitle = $name;
    }
}

print Example::$classTitle; // Allowed.

Example::$classTitle = 'Nope'; // Disallowed.
PHP;

$return['override_attr_props'] = <<<'PHP'
class P {
    abstract public mixed $p { get; }
}

class C extends P {
    #[\Override]
    public mixed $p;
}
PHP;

return $return;
