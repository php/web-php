<?php
include_once 'prepend.inc';

/*
You need to grab http://www.php.net/Mirrors-htdig.tgz and follow the
directions in there if you want to run the search engine on your
mirror (or emulate it on your own website).
*/

// For safety reasons, we disallow the
// setting of this variable from outside
unset($htsearch_prog);

// Constant to specify when there is no base
define("NO_BASE", "-");

// Load in mirror specific configuration data (htdig path)
if (file_exists("configuration.inc")) {
    include_once 'configuration.inc';
}

// Override configuration.inc setting with per vhost setting
// [this will be used in the future instead of configuration.inc]
if (isset($_SERVER['HTSEARCH_PROG'])) {
    $htsearch_prog = $_SERVER['HTSEARCH_PROG'];
}

// If the program to use to search is not excutable, we cannot
// get search results, regardless of what we do
if (!@is_executable($htsearch_prog)) {
    unset($htsearch_prog);
}

/* Form parameters expected:
     pattern - search keywords
     lang    - language to limit search to [this is not
               used currently in searches, only for redirection!!!]
     show    - target of search action
     base    - base URL to point result links to
*/

// If PHP added some quotes, get rid of them
if ($MQ) {
    if (isset($pattern)) { $pattern = stripslashes($pattern); }
    if (isset($base))    { $base = stripslashes($base); }
    if (isset($lang))    { $lang = stripslashes($lang); }
}

// Set language to the preferred one if not set
// (also preserves $lang if provided in POST/GET)
if (!isset($lang) && isset($LANG)) {
    $lang = $LANG;
} elseif (!isset($lang)) {
    $lang = default_language();
}

// Only allow alphabetical chars in lang (security)
if (!preg_match("!^\\w+$!", $lang)) {
    $lang = default_language();
}

// Only allow alphabetical chars in show (security)
if (isset($show) && !preg_match("!^\\w+$!", $show)) {
    $show = "wholesite";
}

// We received something to search for
if (isset($pattern)) {

    // Mailing list search base URL
    $ml_url = "http://marc.theaimsgroup.com/";

    // Do redirections for external search engines
    switch ($show) {

        // Quick reference lookup
        case "quickref" :
            header("Location: manual-lookup.php?pattern=" . urlencode($pattern) . "&lang=$lang");
            exit;

        // PHP-General mailing list search
        case "maillist" :
            $query = "l=php-general&r=1&w=2&q=b&s=" . urlencode($pattern);
            header("Location: $ml_url?$query");
            exit;

        // PHP-Dev mailing list search
        case "devlist" :
            $query = "l=php-dev&r=1&w=2&q=b&s=" . urlencode($pattern);
            header("Location: $ml_url?$query");
            exit;

        // PHPDoc mailing list search
        case "phpdoc" :
            $query = "l=phpdoc&r=1&w=2&q=b&s=" . urlencode($pattern);
            header("Location: $ml_url?$query");
            exit;
            
        // Bug database search
        case "bugdb" :
            
            // Redirect to bug page in case of exact number
            if (preg_match("!^\\d+$!", $pattern)) {
                header("Location: http://bugs.php.net/$pattern");
            }

            // Redirect to bug search page in case of some other pattern
            else {
                $location = "http://bugs.php.net/search.php";
                $query = "cmd=Display+Bugs&status=All&bug_type=Any&search_for=" . urlencode($pattern);
                header("Location: $location?$query");
            }
            exit;
    }

    // If some local search is needed and we have no support for
    // it, send the user to the central search page on php.net
    if (!isset($htsearch_prog)) {
        
        // We cannot redirect to anywhere, absolute failure
        if (is_primary_site()) {
            commonHeader("Search Service");
            echo "<b>The search service is currently not available.</b>.<br />";
            echo "Please try later.\n";
            commonFooter();
            exit();
        }
        
        // We can redirect to the php.net search page
        else {
            $location = "http://www.php.net/search.php";
            $query = "show=$show&pattern=" . urlencode($pattern) .
                     "&base=" . urlencode($MYSITE) . "&lang=$lang";
            header("Location: $location?$query");
            exit;
        }
    }
    
    // The local search engine is in place, and some
    // local search function is needed, so try to do it
    else {
        
        // Print out common headers
        commonHeader("Search Results");
        echo "<h1>Search Results</h1>\n";
        
        // Guess what base is, if it is not specified
        if (!isset($base)) {

            // The base is the referrer site. Check if it was a PHP mirror site,
            // and not some other site offering a direct PHP.net search form.
            // Links should not be pointed back to a non PHP.net mirror site
            if (preg_match("!^http://(\\w{2}\\d?)\\.php\\.net/!", $HTTP_REFERER, $matches) && 
                $matches[1] != 'qa') {
                $base = "http://{$matches[1]}.php.net/";
            }
            unset($matches);

            // If we are on the same site, there is no need for the base
            if (isset($base) && $base == $MYSITE) {
                $base = NO_BASE;
            }
        }

        // This will be the link for new searches (a clean search page)
        $sourceurl = htmlentities($base == NO_BASE ? $PHP_SELF : $base . substr($PHP_SELF, 1));

        // If the pattern is empty, print out an error, and exit
        $pattern = trim($pattern);
        if ($pattern == "") {
            echo "<b>Error:</b> No search words specified.<br /><br />";
            echo "Click here for a <a href=\"$sourceurl\">New Search</a><br /><br />\n";
            commonFooter();
            exit();
        }
            
        // We have something to search for, now encode it as appropriate
        $words = escapeshellcmd(urlencode($pattern));
        
        // Restrict the search to the English manual or the
        // whole site depending on what the request asked for
        if ($show == "manual") {
            $restrict = $MYSITE . "manual/en";
            $where = "in the PHP documentation";
        } else {
            $restrict = $MYSITE;
            $where = "on the PHP website";
        }
        
        // If we have a page restriction, provide it for htdig
        if (isset($page)) { $page = intval($page); $pgr = "&page=$page"; } else { $pgr = ""; }
        
        // Always exclude the printer friendly pages of both types
        // The last exclude is a fix for the bogus index database of php.net,
        // and may be removed if the index problems are resolved [see bug #20870]
        $exclude = escapeshellcmd(urlencode("/print/|/printwn/|.php/|/manual/howto/"));

        // Create the htdig query, and execute the engine
        $query = "words=$words&config=php&exclude=$exclude&restrict=$restrict$pgr";
        exec("$htsearch_prog \"$query\"", $result);
        
        // Count the number of result rows
        $rc = count($result);
        
        // This means that some error occured (the output templates are in
        // Mirrors-htdig.tgz, and one of those should appear on the output)
        if ($rc < 2) {
            echo "<b>There was an error executing this query.</b><br /><br />Please try later.<br /><br />";
            commonFooter();
            exit;
        }

        // Create versions insertable in HTML output and URLs too
        $htmlpt = htmlspecialchars($pattern);
        $urlpt  = urlencode($pattern);

        // If the third row says there is no match, then we need to inform the user
        if ($result[2] == "NOMATCH") {
            echo "Sorry, no documents matched your search for <b>\"$htmlpt\"</b>.<br /><br />";
            echo "Continue your search at ";
            echo "<a href=\"http://www.alltheweb.com/search?q=$urlpt\">AllTheWeb</a> ";
            echo "or <a href=\"http://www.google.com/search?q=$urlpt\">Google</a><br /><br />";
            echo "Click here for a <a href=\"$sourceurl\">New Search</a> on the PHP website<br /><br />\n";
            commonFooter();
            exit;
        }
        
        // We have matches, so grab the info from the output
        // (the template for this is phphead.html in Mirrors-htdig.tgz)
        list(, , $matches, $firstdisplayed, $lastdisplayed, $page, $pages) = $result;
        
        // String to carry on the search parameters in prev/next URLs
        $baseurl = htmlentities($PHP_SELF . "?pattern=" . urlencode($pattern) . "&show=$show&base=" . urlencode($base));

        // Print out search results information header
        echo "$matches documents match your search for '<b>$htmlpt</b>' $where:<br /><br />\n";
        echo "Click here for a <a href=\"$sourceurl\">New Search</a><br /><br />\n";

        // Top navigation
        makeBar($page, $pages, $baseurl, $firstdisplayed, $lastdisplayed);

        // Skip response header, start from index 7
        $i = 7;
        while ($i < $rc) {
            
            // If we have not performed a "remote search", leave the text as is
            if ($base == NO_BASE) {
                echo $result[$i];
            }
            
            // Otherwise modify links to point to the referrer site
            else {
                echo preg_replace("!http://[^.]+\\.php\\.net/!i", htmlspecialchars($base), $result[$i]);
            }
            
            // Make HTML output readable
            echo "\n";
            
            // If the result element ended (a </div> or a </dl>
            // depending on htdig version and setup), print out delimiter
            if (preg_match("!(</div>|</dl>)$!", $result[$i])) {
                echo hdelim("#cccccc");
            }
            
            // Go to next result element
            $i++;
        }
        echo "<br />\n";

        // Bottom navigation
        makeBar($page, $pages, $baseurl, $firstdisplayed, $lastdisplayed);

        // Indicate what search engine we use
        echo "<p>Website search powered by " . make_link("http://www.htdig.org/", "ht://Dig") . "</p>\n";
    
        // End HTML page with footer
        commonFooter();
    }
}

// else of isset($pattern)
else {

    // Print out common header
    commonHeader("Site Search");

    // Choose the target for the search form
    if (isset($htsearch_prog)) {
        $target = $PHP_SELF;
    } else {
        $target = "http://www.php.net/search.php";
    }
?>
<h1>Search</h1>
<form action="<?php echo $target; ?>" method="post">
 <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
 <input type="hidden" name="base" value="<?php echo htmlspecialchars($MYSITE); ?>" />
 <table cellspacing="0" cellpadding="2" border="0" align="center">
 <tr valign="top">
  <td align="right">Search for:<br /></td>
  <td>
  <input type="text" name="pattern" value="" size="30" />
  <input type="submit" value=" Search "><br>
  </td>
 </tr>
 <tr valign="top">
  <td align="right">
  Restrict the search to:<br /></td>
  <td>
<?php if (!isset($show)) { $show = 'quickref'; } ?>
   <select name="show">
    <option value="quickref" <?php  echo ($show=='quickref')  ? 'selected':''?>>function list
    <option value="wholesite" <?php echo ($show=='wholesite') ? 'selected':''?>>whole site
    <option value="manual" <?php    echo ($show=='manual')    ? 'selected':''?>>online documentation [en]
    <option value="bugdb" <?php     echo ($show=='bugdb')     ? 'selected':''?>>bug database
    <option value="maillist" <?php  echo ($show=='maillist')  ? 'selected':''?>>general mailing list
    <option value="devlist" <?php   echo ($show=='devlist')   ? 'selected':''?>>developer mailing list
    <option value="phpdoc" <?php    echo ($show=='phpdoc')    ? 'selected':''?>>documentation mailing list
   </select><br />
  </td>
 </tr>
 </table>
</form>
<?php 

    commonFooter();
} // endof else isset($pattern)



// Prints out the top and bottom bar on the search page. Parameters:
// current page number, total page number, search URL without page
// parameter, nunber of the first result displayed, and number of
// the last result displayed
function makeBar($page, $pages, $baseurl, $firstdisplayed, $lastdisplayed)
{
    // Initialize prev and next values
    $prev = $next = '&nbsp;';
    
    // Not the first page, we need link to go back
    if ($page > 1) {
        $prev = make_link(
            $baseurl . '&page=' . ($page - 1),
            make_image('caret-l.gif', '&lt;') . 'previous page'
        );
    }
    
    // Not the last page, we need link to go forward
    if ($page < $pages) {
        $next = make_link(
            $baseurl . '&page=' . ($page + 1),
            'next page' . make_image('caret-r.gif', '&gt;')
        );
    }

    // This goes to the center
    $display = "<b>Displaying results $firstdisplayed to $lastdisplayed</b>";

    // Print out navigation table
    echo '<table border="0" width="620" bgcolor="#e0e0e0" cellpadding="0" cellspacing="4">';
    echo '<tr>';
    echo '<td align="middle" colspan="2">' . $display . '<br></td>';
    echo '</tr>';

    echo '<tr bgcolor="#cccccc"><td colspan="2">';
    spacer(1,1);
    echo '<br></td></tr>';

    echo '<tr>';
    echo '<td align="left">'  . $prev . '<br></td>';
    echo '<td align="right">' . $next . '<br></td>';
    echo '</tr>';
    echo '</table><br>' . "\n";
}

?>
