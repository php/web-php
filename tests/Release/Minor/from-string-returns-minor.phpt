--TEST--
Minor::fromString() returns Minor
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Minor;

require_once __DIR__ . '/../../../src/autoload.php';

$minor = Minor::fromString('3');

var_dump($minor->toString());
?>
--EXPECT--
string(1) "3"
