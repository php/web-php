--TEST--
Patch::fromString() returns Patch
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Patch;

require_once __DIR__ . '/../../../src/autoload.php';

$patch = Patch::fromString('8');

var_dump($patch->toString());
?>
--EXPECT--
string(1) "8"
