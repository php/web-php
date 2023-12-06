--TEST--
Branch::create() returns Branch
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release;

require_once __DIR__ . '/../../../../src/autoload.php';

$branch = Release\Branch::create(
    Release\Major::fromString('8'),
    Release\Minor::fromString('4'),
);

var_dump([
    $branch->toString(),
    $branch->major()->toString(),
    $branch->minor()->toString(),
]);
?>
--EXPECT--
array(3) {
  [0]=>
  string(3) "8.4"
  [1]=>
  string(1) "8"
  [2]=>
  string(1) "4"
}
