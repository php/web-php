<?php // -*- C++ -*-

// $Id$

// Try to find some variations of keyword with $prefix in the $lang manual
function tryprefix($lang, $keyword, $prefix)
{
    global $DOCUMENT_ROOT;

    // Replace all underscores with hyphens (phpdoc convention)
    $keyword = str_replace("_", "-", $keyword);

    // Replace everything in parentheses with a hyphen (ie. function call)
    $keyword = preg_replace("!\\(.*\\)!", "-", $keyword);

    // Try the keyword with the prefix
    $try = "/manual/${lang}/${prefix}${keyword}.php";
    if (@file_exists("$DOCUMENT_ROOT$try")) { return $try; }

    // Drop out spaces, and try that keyword (if different)
    $nosp = str_replace(" ", "", $keyword);
    if ($nosp != $keyword) {
        $try = "/manual/${lang}/${prefix}${nosp}.php";
        if (@file_exists("$DOCUMENT_ROOT$try")) { return $try; }
    }

    // Replace spaces with hyphens, and try that (if different)
    $dasp = str_replace(" ", "-", $keyword);
    if ($dasp != $keyword) {
        $try = "/manual/${lang}/${prefix}${dasp}.php";
        if (@file_exists("$DOCUMENT_ROOT$try")) { return $try; }
    }

    // Remove hyphens (and underscores), and try that (if different)
    $noul = str_replace("-", "", $keyword);
    if ($noul != $keyword) {
        $try = "/manual/${lang}/${prefix}${noul}.php";
        if (@file_exists("$DOCUMENT_ROOT$try")) { return $try; }
    }

    // Nothing found
    return "";
}

// Try to find a manual page in a specified
// language for the specified "keyword"
function find_manual_page($lang, $keyword)
{
    // Possible prefixes to test
    $sections = array(
        "", "ref.", "function.", "class.",
        "feature-", "control-structures.", "language."
    );

    // Try to find a manual page with the specified prefix
    foreach ($sections as $section) {
        $found = tryprefix($lang, $keyword, $section);
        if ($found) { return $found; }
    }

    // Fall back to English, if the language was not English,
    // and nothing was found so far for any of the prefixes
    if ($lang != "en") {
        foreach ($sections as $section) {
            $found = tryprefix("en", $keyword, $section);
            if ($found) { return $found; }
        }
    }

    // Nothing found
    return "";
}

?>
