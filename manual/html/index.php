<?php
require_once 'prepend.inc';

$lang = default_language();
if (is_dir("../$lang/html")) {
  header("Location: ../$lang/html/");
}
header("Location: ../en/html/");
