<?php
include_once 'prepend.inc';

// Try to make this page non-cached
header("Cache-Control: private");
header("Pragma: no-cache");

// If there is no such file, then drop out an invalid file error message
if (!isset($df) || !file_exists('distributions/' . $df)) {
    exit('Invalid file requested for download!');
}

// Print out common header
commonHeader('Get Download');
?>

<h1>Choose mirror site for download</h1>

<p>
You have chosen to download the following file:
</p>

<p align="center">
<table border="0" cellpadding="10" cellspacing="1" width="500">
<tr bgcolor="#cccccc"><td align="center">
<?php 
echo '<b>' . $df . '</b><br />';

// Get real file name
if ($tmp = strrchr($df, '/')) {
    $local_file = substr($tmp, 1, strlen($tmp));
} else {
    $local_file = 'distributions/' . $df;
}

// Try to get filesize to display
$size = @filesize($local_file);
if ($size) {
    echo '<small>' . number_format($size, 0, '.', ',') . ' bytes</small><br />'; 
}
?>
</td></tr></table>
</p>

<p>
 Please choose the mirror closest to you from which to download the file.  
 The current mirror is highlighted in yellow, but you may have better luck
 with a different mirror, especially if the current mirror is busy. Mirror
 sites detected to be out of date or disfunctional are not listed for your
 convenience.
</p>

<p align="center">
<table border="0" cellpadding="3" cellspacing="1" width="500">
<?php
    
// Maintain previous country code information
$prevcc = 'aa';

// Go through all mirror sites and print out download links
$MURLS = array_keys($MIRRORS);
foreach ($MURLS as $murl) {

    // If the mirror is not all right, skip it
    // Virtual mirrors *are listed* here, because local unofficial
    // mirrors can be used in this way for download.
    if (mirror_status($murl) != MIRROR_OK) { continue; }

    // Get country code, print out a
    // country header, if it is a new one
    $country = mirror_country($murl);
    if ($prevcc != $country) {
        echo '<tr><td colspan="3"></td></tr>';
        echo '<tr bgcolor="#cccccc"><td width="40" align="center">';
        print_image('flags/' . strtolower($country) . '.png', $COUNTRIES[$country], FALSE, 'CLASS="flag"');
        echo '<br /></td>';
        echo '<td colspan="2"><b>' . $COUNTRIES[$country] . '</b><br /></td>';
        echo '</tr>';
    }

    // Highlight this mirror if it is the current one
    echo '<tr bgcolor="' . ($MYSITE == $murl ? '#ffffcc' : '#e0e0e0') . '">';

    // Print out caret (in bold if current mirror)
    echo '<td bgcolor="#ffffff" align="right">';
    print_image( ($MYSITE == $murl ? 'caret-r.gif' : 'caret-rg.gif') );
    echo '<br /></td>';

    // Print out mirror site download link
    echo '<td><small>';
    $ps = strpos($murl, '//') + 2;
    print_link('/do_download.php?mr=' . urlencode($murl) . '&df=' . urlencode($df), substr($murl, $ps, -1));
    echo '</small><br /></td>';

    // Print out mirror provider's name
    echo '<td><small>';
    echo mirror_provider($murl);
    echo '</small><br /></td>';

    // End row for this mirror
    echo '</tr>';

    // Maintain previous country code
    $prevcc = $country;
}
?>
</table>
</p>

<?php commonFooter(); ?>
