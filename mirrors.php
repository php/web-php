<?php

/**
 * Any ideas?
 *
 * @see https://github.com/php/web-php
 */

include_once __DIR__ . '/include/prepend.inc';

header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
