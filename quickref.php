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

// Constant values for the display
define("COLUMNS",    4);
define("SHOW_CLOSE", 20);

// Set empty $notfound if called directly
if (!isset($notfound)) {
    $notfound = '';
}

if (!isset($scope)) {
	$scope = '';
}

// Print out the table of found (or all) functions. The HTML comments are
// needed to support MyCroft search (Mozilla browser family and Sherlock for MacOSX)
function quickref_table($functions, $sort = true)
{
    global $LANG;

    echo "<!-- result list start -->\n";
    echo "<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"100%\">\n";
    echo "<tr valign=\"top\"><td>\n";
    
    // Prepare the data
    $i = 0;
    $limit = ceil(count($functions) / COLUMNS);
    if ($sort) {
        asort($functions);
    }
    
    // Print out all rows
    foreach ($functions as $file => $name) {
    
        // Start a new column
        if ($i > 0 && $i % $limit==0) {
            echo "</td><td>\n";
        }
        echo "<a href=\"/manual/$LANG/$file\">$name</a><br />\n";
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

site_header("Manual Quick Reference", $head_options+array("current" => "docs"));

$notfound_sc  = htmlspecialchars($notfound, ENT_QUOTES, 'UTF-8');
$notfound_enc = urlencode($notfound_sc);
?>

<h1>PHP Function List</h1>

<?php if (!empty($notfound) && count($maybe) > 0) { ?>

<p>
 <b><?php echo $notfound_sc; ?></b> doesn't exist. Closest matches:
</p>

<?php quickref_table($maybe, false); ?>

<?php
// Don't do a web search if the search term contains:
//  tp://   since we are seeing a lot of proxy attempts through the 404 handler
//  admin/  since these tend to be script-kiddie hack attempts
if(strlen($notfound) > 2 && !strstr($notfound,'tp://') && !strstr($notfound,'admin/')):
$srch_rqst = "/ws.php?profile=$scope&q=".urlencode($notfound)."&lang=$LANG&results=10&start=0&mirror=".trim(substr($MYSITE,7),'/');
$url = "http://www.php.net".$srch_rqst;
$data = fetch_contents($url);
if(!is_array($data)) {
	$res = unserialize($data);
	if(is_array($res) && $res['ResultSet']['totalResultsAvailable'] > 0) {
		// Ok, we got some results from the search backend	
		echo "<br /><h1>Site Search Results</h1>\n";
		search_results($res, $notfound, 'local', 10, 0, $LANG, false, false, true);
		echo '<br clear="left"/>';
	}
}
endif;
?>
<h1>Other forms of search</h1>

<p>
To search the string "<b><?php echo $notfound_sc; ?></b>" using other options, try searching:
</p>

<ul>
 <li><?php print_link('search.php?show=manual&amp;pattern=' . $notfound_enc, 'Only the documentation'); ?></li>
 <li><?php print_link('search.php?show=local&amp;pattern=' . $notfound_enc, 'Only this mirror'); ?></li>
 <li><?php print_link('search.php?show=wholesite&amp;pattern=' . $notfound_enc, 'The entire php.net domain'); ?></li>
</ul>

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
