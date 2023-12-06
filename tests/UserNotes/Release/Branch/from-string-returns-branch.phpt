--TEST--
Branch::fromString() returns Branch
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release;

require_once __DIR__ . '/../../../../src/autoload.php';

$branch = Release\Branch::fromString('8.3');

var_dump($branch->toString());
?>
--EXPECT--
string(3) "8.3"
