<?php // -*- C++ -*-

function tryprefix($cc, $func, $prefix) {
    global $DOCUMENT_ROOT;

    // Get the country code, to find native
    // language manual entries first
    $try = array();

    $func = ereg_replace("_","-",$func);
    $func = ereg_replace('\(.*\)',"-",$func);

    $try = "/manual/${cc}/${prefix}${func}.php";
    if (file_exists("$DOCUMENT_ROOT$try")) return $try;

    $nosp = ereg_replace(" ", "", $func);
    if ($nosp != $func) {
	$try = "/manual/${cc}/${prefix}${nosp}.php";
        if (file_exists("$DOCUMENT_ROOT$try")) return $try;
    }
    $dasp = ereg_replace(" ", "-", $func);
    if ($dasp != $func) {
	$try = "/manual/${cc}/${prefix}${dasp}.php";
        if (file_exists("$DOCUMENT_ROOT$try")) return $try;
    }
    $noul = ereg_replace("-", "", $func);
    if ($noul != $func) {
	$try = "/manual/${cc}/${prefix}${noul}.php";
        if (file_exists("$DOCUMENT_ROOT$try")) return $try;
    }
    return "";
}

function find_manual_page($lang, $function) {
    $sections = array("function.", "class.", "ref.", "feature-", "construct.", "control-structures.");
    while (list($t,$section) = each($sections)) {
      $try = tryprefix($lang, $function, $section);
      if ($try) return $try;
    }
    if ($lang != "en") {
      while (list($t,$section) = each($sections)) {
	$try = tryprefix("en", $function, $section);
	if ($try) return $try;
      }
    }
    return "";
}
