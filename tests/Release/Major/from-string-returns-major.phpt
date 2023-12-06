--TEST--
Major::fromString() returns Major
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Major;

require_once __DIR__ . '/../../../src/autoload.php';

$major = Major::fromString('8');

var_dump($major->toString());
?>
--EXPECT--
string(1) "8"
