<?php // vim: et
// $Id$
$_SERVER['BASE_PAGE'] = 'search.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// ---------------------------------------------------------------------------

// Convert POST -> GET for dumping the user onto a mirror
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_FORM = &$_POST;
    $_SERVER['REQUEST_URI'] = "/search.php?";
    $vars = array("show", "pattern", "lang");
    foreach ($vars as $varname) {
        if (!empty($_POST[$varname])) {
            $_SERVER['REQUEST_URI'] .= "$varname=" . urlencode($_POST[$varname]) . "&";
        }
    }
} else {
    $_FORM = &$_GET;
}

// Drive load to mirror sites when searching
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

// ---------------------------------------------------------------------------

// If PHP added some slashes to quotes, get rid of them
if ($MQ) {
    foreach ($_FORM as $name => $value) {
        $_FORM[$name] = stripslashes($value);
    }
}

// We received something to search for
if (!empty($_FORM['pattern'])) {

    if (empty($_FORM['show'])) {
        $_FORM['show'] = 'all';
    }

    // Never allow a comma in the show string, that would confuse our JS
    $_FORM['show'] = str_replace(",", "", $_FORM['show']);
    
    // Mailing list search base URL
    $ml_url = "http://marc.info/?r=1&w=2&q=b&";
    $ucp = urlencode($_FORM['pattern']);

    // Do redirections for external search engines
    switch ($_FORM['show']) {

        case "quickref" :
        case "404quickref" :
            $langparam = (isset($EXPL_LANG) ? "&lang=$EXPL_LANG" : "");
            mirror_redirect("/manual-lookup.php?pattern={$ucp}{$langparam}&scope={$_FORM['show']}");

        case "maillist" :
            mirror_redirect("{$ml_url}l=php-general&s={$ucp}");

        case "devlist" :
            mirror_redirect("{$ml_url}l=php-internals&s={$ucp}");

        case "phpdoc" :
            mirror_redirect("{$ml_url}l=phpdoc&s={$ucp}");
            
        case "bugdb" :
            // Redirect to bug page in case of exact number
            if (preg_match("!^\\d+$!", $_FORM['pattern'])) {
                mirror_redirect("http://bugs.php.net/{$ucp}");
            }

            // Redirect to bug search page in case of some other pattern
            else {
                mirror_redirect(
                    "http://bugs.php.net/search.php?" .
                    "cmd=Display+Bugs&status=All&bug_type=Any&search_for={$ucp}"
                );
            }

        case "manual":
        case "404manual":
            mirror_redirect($MYSITE . "results.php?q={$ucp}&p={$_FORM['show']}&l=$LANG");
            break;

        case "news_archive":
            $p = urlencode($_FORM['show']);
            mirror_redirect($MYSITE . "results.php?q=intitle:news%2Barchive+{$ucp}&p=local");
            break;

        case "changelogs":
            $p = urlencode($_FORM['show']);
            mirror_redirect($MYSITE . "results.php?q=intitle:ChangeLog+{$ucp}&p=local");
            break;
 
        // Covers the rest
        default:
            $p = urlencode($_FORM['show']);
            mirror_redirect($MYSITE . "results.php?q={$ucp}&l=$LANG&p=$p");
            break;
    }
}

// No pattern provided, print search page 
else {

    // Print out common header
    $link = array(
        "rel"   => "search",
        "type"  => "application/opensearchdescription+xml",
        "href"  => $MYSITE . "phpnetimprovedsearch.src",
        "title" => "Add PHP.net search"
    );
    site_header("Search", array("link" => array($link), "current" => "docs"));

    google_cse();
    site_footer();
}
