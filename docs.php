<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'docs.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Documentation", array("current" => "docs"));

?>

<h1>Documentation</h1>
<div class="content-box">

<p>
 The PHP Manual is available online in a selection of languages.
 Please pick a language from the list below.
</p>

<p>
 More information about php.net URL shortcuts by visiting our
 <a href="urlhowto.php">URL howto page</a>.
</p>

<p>
 Note, that many languages are just under translation, and
 the untranslated parts are still in English. Also some translated
 parts might be outdated. The translation teams are open to
 contributions. 
</p>

 <div class="warning">
  <p>
   Documentation for PHP 4 has been removed from the
   manual, but there is archived version still available. For
   more informations, please read <a href="/manual/php4.php">
   Documentation for PHP 4</a>.
  </p>
 </div>
</div>

<table class="standard">
 <tr>
  <th>Formats</th>
  <th>Destinations</th>
 </tr>
 <tr>
  <th class="sub">View Online</th>
  <td>
<?php

// List all manual languages viewable online
$lastlang = end($ACTIVE_ONLINE_LANGUAGES);
foreach ($ACTIVE_ONLINE_LANGUAGES as $langcode => $langname) {
	if (!file_exists($_SERVER["DOCUMENT_ROOT"] . "/manual/{$langcode}/index.php")) {
		continue;
	}

    // Make preferred language bold
    if ($langcode == $LANG) { echo "<strong>"; }

    echo '<a href="/manual/' . $langcode . '/">' . $langname . '</a>';
    echo ($lastlang != $langname) ? ",\n" : "\n";

    if ($langcode == $LANG) { echo "</strong>"; }
}

?>
  </td>
 </tr>
 <tr>
  <th class="sub">Downloads</th>
  <td>
   For downloadable formats, please visit our
   <a href="download-docs.php">documentation downloads</a> page.
  </td>
 </tr>
</table>

<h2 class="content-header">More documentation</h2>
<ul class="content-box listed">
 <li>
  If you are interested in how the documentation is edited and translated,
  you should read the <a href="http://doc.php.net/tutorial/">Documentation HOWTO</a>.
 </li>
 <li>
  <a href="http://gtk.php.net/">PHP-GTK related documentation</a>
  is hosted on the PHP-GTK website.
 </li>
 <li>
  <a href="http://pear.php.net/manual/">Documentation of PEAR and the various
  packages</a> can be found on a separate server.
 </li>
 <li>
  You can still read a copy of the original <a href="/manual/phpfi2.php">PHP/FI
  2.0 Manual</a> on our site, which we only host for historical purposes.
  The same applies to the <a href="/manual/php3.php">PHP 3 Manual</a>, and
  the <a href="/manual/php4.php">PHP 4 Manual</a>.
 </li>
</ul>

<?php site_footer();
