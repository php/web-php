<?php
include_once 'prepend.inc';
commonHeader("Mirror Sites");
?>

<h1>Mirror Sites</h1>

<p>
 Here you can find information about the mirrors of php.net. This table only
 lists the official mirrors, registered in our database. The mirrors automatically
 detected to be outdated or disfunctional are not listed for your convinience, so
 there may be a mirror (or some mirrors) with problems in your country additionaly
 to those listed here. Therefore if you cannot find mirror sites in your country
 here, or the mirror site you used seems to be disappeared, check back later.
</p>
<p>
 We would like to advice you to choose a mirror site close to use in your
 everyday work. All mirror sites are expected to provide the same service
 (with the possible exception of local search support, in which case the
 main site performs the search). This means that you don't loose anything,
 if you go with a local mirror site, but you gain speed. The current mirror
 is highlighted in the list below.
</p>
<p>
 If you are interested in hosting a mirror of this site,
 <?php print_link("/mirroring.php", "here's how"); ?>.
</p>

<div align="center">
<table border="0" cellpadding="3" cellspacing="1" width="560">
<?php

// Previous mirror country code
$prevcc = 'aa';

// Go through all mirror sites and print out information about them
$MURLS = array_keys($MIRRORS);
foreach ($MURLS as $murl) {

    // If the mirror is not all right or it is virtual (not an official mirror), skip it
    if (mirror_status($murl) != MIRROR_OK || mirror_type($murl) == MIRROR_VIRTUAL) { continue; }

    // Get country code, print out a
    // country header, if it is a new one
    $country = mirror_country($murl);
    if ($prevcc != $country) {
        echo '<tr><td colspan="4"></td></tr>' . "\n";
        echo '<tr bgcolor="#cccccc"><td width="40" align="center">';
        print_image('flags/' . strtolower($country) . '.png', $COUNTRIES[$country], FALSE, 'CLASS="flag"');
        echo '<br /></td>';
        echo '<td colspan="3"><b>' . $COUNTRIES[$country] . '</b><br /></td>';
        echo '</tr>' . "\n";
    }

    // Highlight this mirror if it is the current one
    echo '<tr bgcolor="' . ($MYSITE == $murl ? '#ffffcc' : '#e0e0e0') . '">' . "\n";

    // Print out caret (in bold if current mirror)
    echo '<td bgcolor="#ffffff" align="right">';
    print_image( ($MYSITE == $murl ? 'caret-r.gif' : 'caret-rg.gif') );
    echo '<br /></td>' . "\n";

    // Print out mirror site link
    echo '<td><small>';
    $ps = strpos($murl, '//') + 2;
    print_link($murl, substr($murl, $ps, -1));
    echo '</small><br /></td>' . "\n";

    // Print out mirror provider's link
    echo '<td><small>';
    print_link(mirror_provider_url($murl), mirror_provider($murl));
    echo '</small><br /></td>' . "\n";

    // Print out search support information
    echo '<td><small>';
    echo (have_search($murl) ? "with local search" : "&nbsp;");
    echo '</small><br /></td>' . "\n";

    // End row for this mirror
    echo "</tr>\n";

    // Maintain previous country code
    $prevcc = $country;
}

?>
</table>
</div>

<?php commonFooter(); ?>
