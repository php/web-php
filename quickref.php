<?php

// $Id$

/*

 This page is either directly called from the browser, in
 which case it will always show the full list of "functions"
 in the user's preferred language version of the PHP
 documentation.
 
 In other cases this file is included from manual-lookup.php,
 which sets $notfound, so we know what function to search for,
 and display results for that search.
 
*/

// Ensure that our environment is set up
$_SERVER['BASE_PAGE'] = 'quickref.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/errors.inc';

// Constant values for the display
define("COLUMNS",    3);
define("SHOW_CLOSE", 20);

// Print out the table of found (or all) functions. The HTML comments are
// needed to support MyCroft search (Mozilla browser family and Sherlock for MacOSX)
function quickref_table($functions)
{
    global $LANG;

    echo "<!-- result list start -->\n";
    echo "<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"100%\">\n";
    echo "<tr valign=\"top\"><td>\n";
    
    // Prepare the data
    $i = 0;
    $limit = ceil(count($functions) / COLUMNS);
    asort($functions);
    
    // Print out all rows
    foreach ($functions as $file => $name) {
    
        // Start a new column
        if ($i > 0 && $i % $limit==0) {
            echo "</td><td>\n";
        }
        echo "<!--i--><a href=\"/manual/$LANG/$file\">$name</a><br />\n";
        $i++;
    }
    echo "</td></tr></table>\n";
    echo "<!-- result list end -->\n";
}

// Open directory, fall back to English,
// if there is no dir for that language
$dirh = @opendir($_SERVER['DOCUMENT_ROOT'] . "/manual/$LANG");
if (!$dirh) {
    error_noservice();
}

$functions = $maybe = $temp = $parts = array();
$p = 0;

// Get all file names from the directory
while (($entry = readdir($dirh)) !== FALSE) {
    
    // Skip names starting with a dot
    if (substr($entry, 0, 1) == ".") { continue; }
    
    // For function and class pages, get the name out
    if (preg_match('!(function|class)\.(.+)\.php!', $entry, $parts)) {
        $funcname = str_replace('-', '_', $parts[2]);
        $functions[$entry] = $funcname;

        // Compute similarity of the name to the requested one
        if (function_exists('similar_text') && $notfound) {
            similar_text($funcname, $notfound, $p); 
            $temp[$entry] = $p;
        }
    }
}
closedir($dirh);

// We have found file names
if (count($temp) > 0) {

    // Sort names by percentage
    arsort($temp);

    // Collect SHOW_CLOSE number of names from the top
    foreach ($temp as $file => $p) {
        
        // Stop, if we found enough matches
        if (count($maybe) >= SHOW_CLOSE) { break; }
        
        // If the two are more then 70% similar or $notfound is a substring
        // of $funcname, then the match is a very similar one
        if ($p >= 70 || (strpos($functions[$file], $notfound) !== FALSE)) {
            $maybe[$file] = '<b>' . $functions[$file] . '</b>';
        }
        // Otherwise it is just similar 
        else {
            $maybe[$file] = $functions[$file];
        }
    }
    unset($matches, $temp);
}

// Do not index page if presented as a search result
if (count($maybe) > 0) { $head_options = array("noindex"); }
else { $head_options = array(); }

site_header("Manual Quick Reference", $head_options);
?>

<h1>PHP Function List</h1>

<?php if ($notfound && count($maybe) > 0) { ?>

<p>
 Sorry, but the function <b><?php echo htmlspecialchars($notfound); ?></b>
 is not in the online manual. Perhaps you misspelled it, or it is a relatively
 new function that hasn't made it into the online documentation yet. The
 following are the <?php echo count($maybe); ?> functions which seem to be
 closest in spelling to <b><?php echo htmlspecialchars($notfound); ?></b>
 (really good matches are in bold). Perhaps you were looking for one of these:
</p>

<?php quickref_table($maybe); ?>

<p>
 If you want to search the entire PHP website for the string
 "<b><?php echo htmlspecialchars($notfound); ?></b>", then
<?php
    print_link('search.php?show=wholesite&amp;pattern=' .
               urlencode(htmlspecialchars($notfound)),
               'click here');
?>.
</p>

<p>
 For a quick overview over all documented PHP functions,
 <?php print_link('quickref.php', 'click here'); ?>.
</p>

<?php
    site_footer();
    exit;
} 
?>

<p>
 Here is a list of all the documented PHP functions.
 Click on any one of them to jump to that page in the
 manual.
</p>

<?php
quickref_table($functions);
site_footer();
?>
