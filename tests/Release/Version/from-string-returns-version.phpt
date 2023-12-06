--TEST--
Version::fromString() returns Version
--FILE--
<?php

declare(strict_types=1);

use phpweb\Release\Version;

require_once __DIR__ . '/../../../src/autoload.php';

$version = Version::fromString('8.3.0');

var_dump($version->toString());
?>
--EXPECT--
string(5) "8.3.0"
