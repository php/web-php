--TEST--
Minor::fromString() rejects invalid values
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release;

require_once __DIR__ . '/../../../../src/autoload.php';

$values = [
    'string-blank' => ' ',
    'string-empty' => '',
    'string-leading-zero' => '01',
    'string-word' => 'foo',
];

$invalidValues = array_filter($values, static function (string $value): bool {
    try {
        Release\Minor::fromString($value);
    } catch (\InvalidArgumentException) {
        return true;
    }

    return false;
});

var_dump($invalidValues);
?>
--EXPECT--
array(4) {
  ["string-blank"]=>
  string(1) " "
  ["string-empty"]=>
  string(0) ""
  ["string-leading-zero"]=>
  string(2) "01"
  ["string-word"]=>
  string(3) "foo"
}
