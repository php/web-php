<?php

require_once 'prepend.inc';

$lang = default_language();
if (is_dir($lang)) {
  header("Location: /manual/$lang/function.include.php");
}
header("Location: /manual/en/function.include.php");

?>
