<?php // vim: et
$_SERVER['BASE_PAGE'] = 'search.php';
include_once __DIR__ . '/include/prepend.inc';

// ---------------------------------------------------------------------------

$_FORM = &$_GET;

// ---------------------------------------------------------------------------

// We received something to search for
if (!empty($_FORM['pattern'])) {

    if (empty($_FORM['show'])) {
        $_FORM['show'] = 'all';
    }

    // Never allow a comma in the show string, that would confuse our JS
    $_FORM['show'] = str_replace(",", "", $_FORM['show']);

    $ucp = urlencode($_FORM['pattern']);

    // Do redirections for external search engines
    switch ($_FORM['show']) {
        case "quickref" :
        case "404quickref" :
            $langparam = (isset($EXPL_LANG) ? "&lang=$EXPL_LANG" : "");
            mirror_redirect("/manual-lookup.php?pattern={$ucp}{$langparam}&scope={$_FORM['show']}");
            break;

        case "manual":
        case "404manual":
            mirror_redirect($MYSITE . "results.php?q={$ucp}&p={$_FORM['show']}&l=$LANG");
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
    $link = [
        "rel" => "search",
        "type" => "application/opensearchdescription+xml",
        "href" => $MYSITE . "phpnetimprovedsearch.src",
        "title" => "Add PHP.net search"
    ];
    site_header("Search", ["link" => [$link], "current" => "help"]);

    google_cse();
    site_footer();
}
