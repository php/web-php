<?php

require_once 'prepend.inc';

$lang = $MIRRORS[$MYSITE][6];
if (is_dir($lang)) {
  header("Location: /manual/$lang/function.include.php");
}
header("Location: /manual/en/function.include.php");


?>
