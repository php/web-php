<?php
require_once 'prepend.inc';
if (isset($country)) {
  header("Location: http://$country.php.net/");
}
commonHeader("Mirrors Page");
?>
<h1>
Mirror Sites
</h1>
<p>
Here you can find more information about the mirrors
of php.net. Pick a mirror site close to you, or visit
the provider's homepage:
</p>

<p>
<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <th>Country</th>
  <th>Mirror Address</th>
  <th>Provider</th>
  <th>Default Language</th>
 </tr>
<?php
  $mprevious = 'aa';
  foreach ($MIRRORS as $murl => $mdata) {
    if ($mdata[4] != 1) { continue; }
    echo '<tr bgcolor="#e0e0e0"><td>';
    if ($mprevious != $mdata[0]) { echo $COUNTRIES[$mdata[0]]; }
    else { echo "&nbsp;"; }
    echo '</td><td>' . make_link($murl, $murl) .
         '</td><td>' . make_link($mdata[3], $mdata[1]) . 
         '</td><td>' . $LANGUAGES[$mdata[6]] . '</td></tr>';
    $mprevious = $mdata[0];
  }
?>
</table>
</p>

<p>
If you are interested in hosting a mirror of this site, 
<?php print_link("/README.mirror", "here's how"); ?>.
</p>
<?php
commonFooter();
?>
