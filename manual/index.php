<?php
require_once '../include/prepend.inc';

$lang = default_language();
if (@is_dir($lang)) {
  header("Location: $lang/");
}
header("Location: en/");
