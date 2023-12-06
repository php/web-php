--TEST--
Version::fromString() rejects invalid values
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Version;

require_once __DIR__ . '/../../../src/autoload.php';

$values = [
    'string-blank' => ' ',
    'string-empty' => '',
    'string-major' => '1',
    'string-major-minor' => '1.2',
    'string-major-minor-patch-where-major-has-leading-zero' => '01.2.3',
    'string-major-minor-patch-where-minor-has-leading-zero' => '1.02.3',
    'string-major-minor-patch-where-patch-has-leading-zero' => '1.2.03',
    'string-word' => 'foo',
];

$invalidValues = array_filter($values, static function (string $value): bool {
    try {
        Version::fromString($value);
    } catch (\ValueError) {
        return true;
    }

    return false;
});

var_dump($invalidValues);
?>
--EXPECT--
array(8) {
  ["string-blank"]=>
  string(1) " "
  ["string-empty"]=>
  string(0) ""
  ["string-major"]=>
  string(1) "1"
  ["string-major-minor"]=>
  string(3) "1.2"
  ["string-major-minor-patch-where-major-has-leading-zero"]=>
  string(6) "01.2.3"
  ["string-major-minor-patch-where-minor-has-leading-zero"]=>
  string(6) "1.02.3"
  ["string-major-minor-patch-where-patch-has-leading-zero"]=>
  string(6) "1.2.03"
  ["string-word"]=>
  string(3) "foo"
}
