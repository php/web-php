<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
