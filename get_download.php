<?php
include_once 'prepend.inc';

// Try to make this page non-cached
header_nocache();

// If there is no such file, then drop out an invalid file error message
if (!isset($df) || !file_exists($DOCUMENT_ROOT . '/distributions/' . $df)) {
    exit('Invalid file requested for download!');
}

// Set local file name
$local_file = $DOCUMENT_ROOT . '/distributions/' . $df;

// Print out common header
commonHeader('Get Download');
?>

<h1>Choose mirror site for download</h1>

<p>
You have chosen to download the following file:
</p>

<div align="center">
<table border="0" cellpadding="10" cellspacing="1" width="500">
<tr bgcolor="#cccccc"><td align="center">
<?php 
echo '<b>' . $df . '</b><br />';

// Try to get filesize to display
$size = @filesize($local_file);
if ($size) {
    echo '<small>' . number_format($size, 0, '.', ',') . ' bytes</small><br />'; 
}
?>
</td></tr></table>
</div>

<p>
 Please choose the mirror closest to you from which to download the file.  
 The current mirror is highlighted in yellow, mirror sites detected to be
 out of date or disfunctional are not listed for your convenience.

<?php

// If we have a valid country, and we have at least one mirror
// in that country, provide some intro text and the list of mirrors
if (i2c_valid_country()) {
    $close = count_mirrors($COUNTRY);
    if ($close > 0) {
        $mnum = (($close > 1) ? "mirrors" : "mirror");
        echo "We have automatically detected the following $mnum to be close\n" .
             "to you. If you use a mirror close to you for downloads and\n" .
             "your usual daily work, you will get better response times.</p>\n";
        mirror_list($COUNTRY);
        echo "<p>Here is the list of all the other sites in case our detection\n" .
             "did something wrong, or the local mirror sites are busy.\n";
        mirror_list('', $COUNTRY);
    } else { echo "</p>\n"; mirror_list(); }
} else { echo "</p>\n"; mirror_list(); }

// List mirrors for download with a possible country matching
function mirror_list($cmatch = '', $cnomatch = '') {
    
    global $MIRRORS, $MYSITE, $df, $COUNTRIES;
    
    // Print out start of the table centered
    echo '<div align="center">' . "\n" .
         '<table border="0" cellpadding="3" cellspacing="1" width="500">' . "\n";
    
    // Maintain previous country code information
    $prevcc = 'aa';

    // Go through all mirror sites and print out download links
    $MURLS = array_keys($MIRRORS);
    foreach ($MURLS as $murl) {

        // If the mirror is not all right, skip it
        // Virtual mirrors *are listed* here, because local unofficial
        // mirrors can be used in this way for download.
        if (mirror_status($murl) != MIRROR_OK) { continue; }

        // Get the country code and check if it is
        // matching the country provided (or does not
        // match the country, which it should not be)
        $country = mirror_country($murl);
        if (!empty($cmatch)   && $country != $cmatch)   { continue; }
        if (!empty($cnomatch) && $country == $cnomatch) { continue; }
        
        // Print out a country header, if a new country is found
        if ($prevcc != $country) {
            echo '<tr><td colspan="3"></td></tr>' . "\n";
            echo '<tr bgcolor="#cccccc"><td width="40" align="center">';
            print_image(
                'flags/' . strtolower($country) . '.png',
                $COUNTRIES[$country],
                FALSE,
                'CLASS="flag"'
            );
            echo '<br /></td>';
            echo '<td colspan="2"><b>' . $COUNTRIES[$country] . '</b><br /></td>';
            echo '</tr>' . "\n";
        }

        // We print out a line for the current mirror
        $thismirror = ($MYSITE == $murl);

        // Highlight this mirror if it is the current one
        echo '<tr bgcolor="' . ($thismirror ? '#ffffcc' : '#e0e0e0') . '">' . "\n";

        // Print out caret (in bold if current mirror)
        echo '<td bgcolor="#ffffff" align="right">';
        print_image( ($thismirror ? 'caret-r.gif' : 'caret-rg.gif') );
        echo '<br /></td>' . "\n";

        // Print out mirror site download link
        echo '<td><small>';
        $mirrorshort = substr($murl, strpos($murl, '//') + 2, -1);
        $mirrorname  = ($thismirror ? "this" : $mirrorshort);
        print_link("/get/$df/from/$mirrorname/mirror", $mirrorshort);
        echo '</small><br /></td>' . "\n";

        // Print out mirror provider's name
        echo '<td><small>';
        echo mirror_provider($murl);
        echo '</small><br /></td>' . "\n";

        // End row for this mirror
        echo "</tr>\n";

        // Maintain previous country code
        $prevcc = $country;
    }

    echo "</table>\n</div>\n";
}

commonFooter();
