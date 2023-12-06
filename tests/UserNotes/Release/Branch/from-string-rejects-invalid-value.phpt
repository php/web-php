--TEST--
Branch::fromString() rejects invalid values
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release;

require_once __DIR__ . '/../../../../src/autoload.php';

$values = [
    'string-blank' => ' ',
    'string-empty' => '',
    'string-major-leading-zero' => '00.3',
    'string-major-minor-patch' => '8.3.0',
    'string-major-only' => '8',
    'string-minor-leading-zero' => '8.03',
    'string-word' => 'foo',
];

$invalidValues = array_filter($values, static function (string $value): bool {
    try {
        Release\Branch::fromString($value);
    } catch (\InvalidArgumentException) {
        return true;
    }

    return false;
});

var_dump($invalidValues);
?>
--EXPECT--
array(7) {
  ["string-blank"]=>
  string(1) " "
  ["string-empty"]=>
  string(0) ""
  ["string-major-leading-zero"]=>
  string(4) "00.3"
  ["string-major-minor-patch"]=>
  string(5) "8.3.0"
  ["string-major-only"]=>
  string(1) "8"
  ["string-minor-leading-zero"]=>
  string(4) "8.03"
  ["string-word"]=>
  string(3) "foo"
}
