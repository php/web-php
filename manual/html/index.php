<?php
require "shared.inc";

$lang = $MIRRORS[$MYSITE][6];
if (is_dir("../$lang/html")) {
  header("Location: ../lang/html/");
}
header("Location: ../en/html/");
