<?php
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

    // Never allow a comma in the show string, that would confuse our JS
    $_FORM['show'] = str_replace(",", "", $_FORM['show']);
    
    // Remember the last search settings for a week
    mirror_setcookie("LAST_SEARCH", "{$_FORM['show']},{$_FORM['pattern']}", 60*60*24*7);

    // Mailing list search base URL
    $ml_url = "http://marc.theaimsgroup.com/?r=1&w=2&q=b&";
    $ucp = urlencode($_FORM['pattern']);
    
    // Do redirections for external search engines
    switch ($_FORM['show']) {

        case "quickref" :
            $langparam = (isset($EXPL_LANG) ? "&lang=$EXPL_LANG" : "");
            mirror_redirect("/manual-lookup.php?pattern={$ucp}{$langparam}");

        case "maillist" :
            mirror_redirect("{$ml_url}l=php-general&s={$ucp}");

        case "devlist" :
            mirror_redirect("{$ml_url}l=php-dev&s={$ucp}");

        case "phpdoc" :
            mirror_redirect("{$ml_url}l=phpdoc&s={$ucp}");
            
        case "bugdb" :
            
            // Redirect to bug page in case of exact number
            if (preg_match("!^\\d+$!", $_FORM['pattern'])) {
                mirror_redirect("http://bugs.php.net/{$_FORM['pattern']}");
            }

            // Redirect to bug search page in case of some other pattern
            else {
                mirror_redirect(
                    "http://bugs.php.net/search.php?" .
                    "cmd=Display+Bugs&status=All&bug_type=Any&search_for={$ucp}"
                );
            }
        
        // Covers "wholesite", "manual" and any malicios targets
        default:
            mirror_redirect(
                "http://www.google.com/search?q={$ucp}+site:www.php.net&l=$LANG"
            );
    }
}

// No pattern provided, print search page 
else {

    // Print out common header
    site_header("Search");
    echo "<p>The search feature is accessible via the form elements at the top right of this page.</p>";
    echo "<p class=\"tip\">We have tried to reduce the size of the function list autocomplete script
    to the minimum, so you don't need to wait for long to start using this feature. If you are interested
    in the PHP and JavaScript sources we used to create this functionality, those are <a href=\"http://cvs.php.net/cvs.php/phpdoc/scripts/quickref\">available under the PHP license in phpdoc CVS</a>.</p>";
    if (FALSE) {
    if (isset($EXPL_LANG)) {
        $lang_input = "  <input type=\"hidden\" name=\"lang\" value=\"{$EXPL_LANG}\" />\n";
    } else {
        $lang_input = "\n";
    }

?>
<h1>Search</h1>
<form action="/search.php" method="post">
 <p><?php echo $lang_input ?>
  Search for:
  <input type="text" name="pattern" value="" size="30" />
  in the
  <select name="show">
<?php
if (empty($_FORM['show'])) { $_FORM['show'] = 'quickref'; }
$searchoptions = array(
    "quickref"  => "function list",
    "wholesite" => "whole site",
    "manual"    => "online documentation [en]",
    "bugdb"     => "bug database",
    "maillist"  => "general mailing list",
    "devlist"   => "developer mailing list",
    "phpdoc"    => "documentation mailing list",
);

// Print out an <option> for all search options
foreach ($searchoptions as $key => $value) {
    echo '   <option value="' . $key . '"' . 
         ($key == $_FORM['show'] ? ' selected="selected"' : '') .
         '>' . $value . "</option>\n";
}
?>
  </select>
  <input type="submit" value=" Search " />
 </p>
</form>
<?php
    }
    site_footer(array("functionsjs"));
}
