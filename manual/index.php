<?php
require "shared.inc";

$lang = $MIRRORS[$MYSITE][6];
if (is_dir($lang)) {
  header("Location: lang/");
}
header("Location: en/");
