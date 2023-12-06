--TEST--
Version::create() returns Version
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Major;
use phpweb\Release\Minor;
use phpweb\Release\Patch;
use phpweb\Release\Version;

require_once __DIR__ . '/../../../src/autoload.php';

$version = Version::create(
    Major::fromString('8'),
    Minor::fromString('3'),
    Patch::fromString('0'),
);

var_dump([
    $version->toString(),
    $version->major()->toString(),
    $version->minor()->toString(),
    $version->patch()->toString(),
]);
?>
--EXPECT--
array(4) {
  [0]=>
  string(5) "8.3.0"
  [1]=>
  string(1) "8"
  [2]=>
  string(1) "3"
  [3]=>
  string(1) "0"
}
