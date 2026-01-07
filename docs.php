<?php

use phpweb\I18n\Languages;

$_SERVER['BASE_PAGE'] = 'docs.php';
include_once __DIR__ . '/include/prepend.inc';

site_header("Documentation", ["current" => "docs"]);

?>

<h1>Documentation</h1>
<div class="content-box">

<p>
 The PHP Manual is available online in a selection of languages.
 Please pick a language from the list below.
</p>

<p>
 Note, that many languages are just under translation, and
 the untranslated parts are still in English. Also some translated
 parts might be outdated. The translation teams are
 <a href="https://doc.php.net/">open to contributions</a>.
</p>
</div>

<p>
  View Online:
<?php

// List all manual languages viewable online
$lastlang = array_key_last(Languages::ACTIVE_ONLINE_LANGUAGES);
foreach (Languages::ACTIVE_ONLINE_LANGUAGES as $langcode => $langname) {
    if (!file_exists($_SERVER["DOCUMENT_ROOT"] . "/manual/{$langcode}/index.php")) {
        continue;
    }

    // Make preferred language bold
    if ($langcode === $LANG) { echo "<strong>"; }

    echo '<a href="/manual/' . $langcode . '/">' . $langname . '</a>';
    echo ($lastlang !== $langcode) ? ",\n" : "\n";

    if ($langcode === $LANG) { echo "</strong>"; }
}

?>
</p>

<p>
 The language currently being used as the default for you should be in
 <strong>bold</strong> above. You can change the setting for this on the
 <a href="/my.php">My PHP.net customization page</a>.
</p>

<p>
 For downloadable formats, please visit our
 <a href="download-docs.php">documentation downloads</a> page.
</p>

<p>
 Information about php.net URL shortcuts can be found by visiting our
 <a href="urlhowto.php">Navigation tips &amp; tricks page</a>.
</p>

<h2 class="content-header">More documentation</h2>
<ul class="content-box listed">
 <li>
  If you are interested in how the documentation is edited and translated,
  you should read the <a href="https://doc.php.net/guide/">contribution guide</a>.
 </li>
 <li>
  <a href="https://pear.php.net/manual/">Documentation of PEAR and the various
  packages</a> can be found on a separate server.
 </li>
 <li>
  You can still read a copy of the original <a href="/manual/phpfi2.php">PHP/FI
  2.0 Manual</a> on our site, which we only host for historical purposes.
  The same applies to the <a href="/manual/php3.php">PHP 3 Manual</a>.
 </li>
 <li>
  The PHP 4 and PHP 5 documentation has been removed from the
  manual, but archived versions still exist. For
  more information, please read <a href="/manual/php4.php">
  Documentation for PHP 4</a> and <a href="manual/php5.php">
  Documentation for 5</a>, respectively.
 </li>
</ul>

<?php site_footer();
