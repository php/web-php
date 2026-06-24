<?php

use phpweb\Framework\Build\BuildTools;

(PHP_SAPI === 'cli') or die("Please run this script using the cli sapi");

require_once __DIR__ . '/../src/autoload.php';

exit(BuildTools::executeBuild());
