<?php // -*- C++ -*-

require("shared.inc");
require("manual-lookup.inc");

$function = strtolower($function);
if (!isset($lang)) $lang = $MIRRORS[$MYSITE][6];

$file = find_manual_page($lang, $function);
if (!$file) $file = get_manual_page("en",$function);

if ($file) {
    header("Location: $file");
    exit;
}
  
header("Location: search.php?pattern=".urlencode($function)."&show=nosource");
exit;
