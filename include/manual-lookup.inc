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
function find_manual_page_slow($lang, $keyword)
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

function find_manual_page($lang, $keyword)
{
	// Use open rather than popen to avoid any chance of confusion
	// when rsync updates the database
	if (!function_exists("sqlite_open") || !($s = @sqlite_open(dirname(__FILE__) . '/../backend/manual-lookup.sqlite'))) {
		return find_manual_page_slow($lang, $keyword);
	}

	$keyword = str_replace('_', '-', $keyword);
	if (strpos($keyword, '(') !== false) {
		$keyword = preg_replace("!\\(.*\\)!", "-", $keyword);
	}

	if (strlen($keyword) == 0) {
		return "";
	}

	// NB: sqlite wants ' quoted as ''
	$keyword = sqlite_escape_string($keyword);

	$keywords = array_unique(array(
		$keyword,
		str_replace(' ', '', $keyword),
		str_replace(' ', '-', $keyword),
		str_replace('-', '', $keyword),
		metaphone($keyword)
	));

	$words = "'" . implode("','", $keywords) . "'";

	$langs = ($lang != 'en') ?
		array(sqlite_escape_string($lang), 'en') :
		array('en');

	foreach ($langs as $lang) {
		$q = sqlite_query($s, "SELECT name from fs where lang='" . $lang . "' and keyword in (" . $words . ") order by prio LIMIT 1");
		if ($q) {
			$r = sqlite_fetch_array($q, SQLITE_NUM);
			if (isset($r[0])) {
				return $r[0];
			}
		}
	}
	return "";

}

?>
