<?php
require_once 'prepend.inc';

$lang = default_language();
if (@is_dir($lang)) {
  header("Location: $lang/");
}
header("Location: en/");
