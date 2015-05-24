<?php // -*- C++ -*-

// $Id$

// We need this for error reporting 
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/errors.inc';

// Try to find some variations of keyword with $prefix in the $lang manual
function tryprefix($lang, $keyword, $prefix)
{
    // Replace all underscores with hyphens (phpdoc convention)
    $keyword = str_replace("_", "-", $keyword);

    // Replace everything in parentheses with a hyphen (ie. function call)
    $keyword = preg_replace("!\\(.*\\)!", "-", $keyword);

    // Try the keyword with the prefix
    $try = "/manual/${lang}/${prefix}${keyword}.php";
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }

    // Drop out spaces, and try that keyword (if different)
    $nosp = str_replace(" ", "", $keyword);
    if ($nosp != $keyword) {
        $try = "/manual/${lang}/${prefix}${nosp}.php";
        if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }
    }

    // Replace spaces with hyphens, and try that (if different)
    $dasp = str_replace(" ", "-", $keyword);
    if ($dasp != $keyword) {
        $try = "/manual/${lang}/${prefix}${dasp}.php";
        if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }
    }

    // Remove hyphens (and underscores), and try that (if different)
    $noul = str_replace("-", "", $keyword);
    if ($noul != $keyword) {
        $try = "/manual/${lang}/${prefix}${noul}.php";
        if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }
    }

    // urldecode() (%5C == \) Replace namespace sperators, and try that (if different)
    $keyword = urldecode($keyword);
    $noul = str_replace("\\", "-", $keyword);
    if ($noul != $keyword) {
        $try = "/manual/${lang}/${prefix}${noul}.php";
        if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }
    }

    // Replace first - with a dot and try that (for mysqli_ type entries)
    // Only necessary when prefix is empty
    if (empty($prefix)) {
        $pos = strpos($keyword, '-');
        if ($pos !== false) {
            $keyword[$pos] = '.';

            $try = "/manual/${lang}/${prefix}${keyword}.php";
            if (@file_exists($_SERVER['DOCUMENT_ROOT'] . $try)) { return $try; }
        }
    }

    // Nothing found
    return "";
}

// Try to find a manual page in a specified language
// for the specified "keyword". Using the sqlite is
// better because then stat() calls are eliminated.
function find_manual_page_slow($lang, $keyword)
{
    // Possible prefixes to test
    $sections = get_manual_search_sections();

    // Remove .. for security reasons
    $keyword = str_replace("..", "", $keyword);
    
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

    // BC: Few references pages where moved to book.
    if (strpos($keyword, "ref.") === 0) {
        $kw = substr_replace($keyword, "book.", 0, 4);
        return find_manual_page($lang, $kw);
    }

    // Nothing found
    return "";
}

// If sqlite is available on this mirror use that for manual
// page shortcuts, so we avoid stat() calls on the server
function find_manual_page($lang, $keyword)
{
    // If there is no sqlite support, or we are unable to
    // open the database, fall back to normal search. Use
    // open rather than popen to avoid any chance of confusion
    // when rsync updates the database
    $dbh = FALSE;
    if (class_exists('PDO')) {
        if (in_array('sqlite', PDO::getAvailableDrivers())) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/backend/manual-lookup.sqlite')) {
                try {
                    $dbh = new PDO( 'sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/backend/manual-lookup.sqlite', '', '', array( PDO::ATTR_PERSISTENT => TRUE, PDO::ATTR_EMULATE_PREPARES => TRUE) );
                } catch (PDOException $e) {
                    return find_manual_page_slow($lang, $keyword);
                }
            }
        }
    }
    if (!$dbh) {
        return find_manual_page_slow($lang, $keyword);
    }
    $kw = $keyword;
    
    // Try the preferred language first, then the
    // English one in case no page is found
    $langs = ($lang != 'en') ? array($lang, 'en') : array('en');
    
    // Reformat keyword, drop anything in parenthesis --- except a search for the underscore only. (Bug #63490)
    if ($keyword != '_') {
        $keyword = str_replace('_', '-', $keyword);
    }
    if (strpos($keyword, '(') !== FALSE) {
        $keyword = preg_replace("!\\(.*\\)!", "-", $keyword);
    }

    // No keyword to search for
    if (strlen($keyword) == 0) {
        return "";
    }
    
    // If there is a dot in the $keyword, then a prefix
    // is specfied, so we need to carry that on into the SQL
    // search [eg. function.echo or function.mysql-close]

    // Check for all the languages
    foreach ($langs as $lang) {
        
        // @todo consider alternative schemas for this data
        // @todo utilize phd to generate this data, instead of the current systems/gen-phpweb-sqlite-db.php

        /* Example data:
           lang    = en
           name    = /manual/en/function.str-replace.php
           keyword = str-replace
           prefix  = function.
           prio    = 2

           Therefore, the query below matches: str-replace, function.str-replace and function.str-replace.php
           This also applies to other sections like book.foo, language.foo, example.foo, etc.
           Note: $keyword replaces _ with - above, so _ variants also work
        */
        if (strpos($keyword, ".") > 0) {
            $SQL = "SELECT name from fs WHERE lang = ? AND (name = ? OR keyword = ?) ORDER BY prio LIMIT 1";

            $_keyword = $keyword;
            if (pathinfo($keyword, PATHINFO_EXTENSION) !== 'php') {
                $_keyword .= '.php';
            }

            $stm = $dbh->prepare($SQL);
            if (!$stm) {
                    return find_manual_page_slow($lang, $keyword);
            }
            $stm->execute(array($lang, "/manual/{$lang}/{$_keyword}", $keyword));
    
        // Some partially specified URL is used
        } else {
        
            // List a few variations, plus a metaphone version
            // FIXME: metaphone causes too many false positives, disable for now
            //        the similar_text() search fallback works fine (see quickref.php)
            //        if this change remains, adjust the gen-phpweb-sqlite script accordingly
        
            $SQL = "SELECT name, prio FROM fs WHERE lang = :lang
                    AND keyword IN (?, ?, ?, ?) ORDER BY keyword = ? DESC, prio LIMIT 1";
        
            $stm = $dbh->prepare($SQL);
            if ($stm) {
                $stm->execute(array($lang, $keyword, str_replace('\\', '-', $keyword), str_replace(' ', '', $keyword), str_replace(' ', '-', $keyword), str_replace('-', '', $keyword), $keyword));
            }
        }
        
        // Successful query
        if ($stm) {
            $r = $stm->fetch(PDO::FETCH_NUM);
            
            if (isset($r[0])) {
                if(isset($r[1]) && $r[1] > 10 && strlen($keyword) < 4) {
                    // "Match" found, but the keyword is so short
                    // its probably bogus. Skip it
                    continue;
                }


                // Match found
                // But does the file really exist?
                // @todo consider redirecting here, instead of including content within the 404
                // @todo considering the file path is generated from the manual build, we can probably remove this file_exists() check
                if (file_exists($_SERVER["DOCUMENT_ROOT"] . $r[0])) {
                    return $r[0];
                }
            }
        } else {
            error_noservice();
        }
    }
    
    // No match found
    // @todo refactor. find_manual_page_slow() performs many of the same searches already performed above,
    //       but uses file_exists() instead of sqlite. In other words, if sqlite was used, don't perform
    //       all of the slow and unnecessary checks.
    return find_manual_page_slow($langs[0], $kw);
}

