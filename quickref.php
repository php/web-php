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
include $_SERVER['DOCUMENT_ROOT'] . '/include/results.inc';

if (empty($notfound)) {
    mirror_redirect("/search.php");
}

// Print out the table of found (or all) functions. The HTML comments are
// needed to support MyCroft search (Mozilla browser family and Sherlock for MacOSX)
function quickref_table($functions, $sort = true)
{
    global $LANG;

    echo "<!-- result list start -->\n";
    echo "<ul id=\"quickref_functions\">\n";
    // Prepare the data
    if ($sort) {
        asort($functions);
    }
    
    // Print out all rows
    foreach ($functions as $file => $name) {
        echo "<li><a href=\"/manual/$LANG/$file\">$name</a></li>\n";
    }
    echo "</ul>\n";
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
    if (preg_match('!^(function|class)\.(.+)\.php$!', $entry, $parts)) {
        $funcname = str_replace('-', '_', $parts[2]);
        $functions[$entry] = $funcname;

        // Compute similarity of the name to the requested one
        if (function_exists('similar_text') && !empty($notfound)) {
            similar_text($funcname, $notfound, $p); 

            // If $notfound is a substring of $funcname then overwrite the score 
            // similar_text() gave it.
            if ($p < 70 && ($pos = strpos($funcname, $notfound)) !== FALSE) {
                $p = 90 - $pos;
            }
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
        if (count($maybe) >= 30) { break; }
        
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

site_header("Manual Quick Reference", $head_options+array("current" => "help"));

// Note: $notfound is defined (with htmlspecialchars) inside manual-lookup.php
$notfound_enc = urlencode($notfound);


if ($snippet = is_known_snippet($notfound)) {
    echo "<h1>Related snippet found for '{$notfound}'</h1>";
    echo "<p>{$snippet}</p>";
}

?>

<h1>PHP Function List</h1>

<?php if (!empty($notfound) && count($maybe) > 0) { ?>

<p>
 <b><?php echo $notfound; ?></b> doesn't exist. Closest matches:
</p>

<?php
quickref_table($maybe, false);

$config = array(
    "sidebar" => '<p class="panel"><a href="/search.php?show=all&amp;pattern=' . $notfound_enc . '">Full website search</a>',
);

site_footer($config);
} 

