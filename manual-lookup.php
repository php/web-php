<?php // -*- C++ -*-

require_once 'prepend.inc';
require_once 'manual-lookup.inc';

if (!$function && $pattern) $function = $pattern;

if (get_magic_quotes_gpc()) $function = stripslashes($function);

$function = strtolower($function);

if (!isset($lang)) $lang = default_language();

$file = find_manual_page($lang, $function);

if ($file) {
    header("Location: $file");
    exit;
}

$notfound = $prevsearch = $function;
include 'quickref.php';

exit;

?>
