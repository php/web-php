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
 Mirror sites also have default language settings, so shortcut navigation
 services provide you results in that language. See the
 <a href="/urlhowto.php">URL shortcuts page</a> for examples of this behaviour.
</p>
<p>
 If you are interested in hosting a mirror of this site,
 <?php print_link("/mirroring.php", "here's how"); ?>.
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <th>Country</th>
  <th>Mirror Address</th>
  <th>Provider</th>
  <th>Default Language</th>
 </tr>
<?php

// Previous mirror country code
$prevcc = 'aa';

// Go through all mirror sites and print out information about them
$MURLS = array_keys($MIRRORS);
foreach ($MURLS as $murl) {

    // If the mirror is not all right, skip it
    if (mirror_status($murl) != MIRROR_OK) { continue; }

    // Print out table row, color it specially if current mirror
    echo '<tr bgcolor="' . ($MYSITE == $murl ? '#ffffcc' : '#e0e0e0') . '"><td>';

    // Check country code, and only print
    // out country name, if it is a new one
    $country = mirror_country($murl);
    if ($prevcc != $country) {
        echo $COUNTRIES[$country];
    } else {
        echo "&nbsp;";
    }

    // Print out table cells with mirror information
    echo '</td><td>' . make_link($murl, $murl) .
         '</td><td>' . make_link(mirror_provider_url($murl), mirror_provider($murl)) .
         '</td><td>' . $LANGUAGES[default_language($murl)] . '</td></tr>' . "\n";

    // Preserve previous contry code
    $prevcc = $country;
}

?>
</table>

<?php commonFooter(); ?>
