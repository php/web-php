<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'docs.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA='
<h3>FAQ</h3>
<p>
 The <a href="/FAQ.php">PHP FAQ</a> is your first stop for general
 information and those questions that seem to be on most people\'s minds.
 If you have licensing questions, see the separate
 <a href="/license/">License FAQ</a>.
</p>

<h3>Changelog</h3>
<p>
 You can also find the <a href="/ChangeLog-4.php">PHP 4 Changelog</a> or
 the <a href="/ChangeLog-5.php">PHP 5 Changelog</a> useful,
 if you would like to look up changes between various versions of PHP.
</p>

<h3>Books</h3>
<p>
 There are literally thousands of books available in
 English and numerous other languages. You can easily search at
 <a href="http://www.amazon.com/exec/obidos/external-search?mode=books&amp;keyword=PHP&amp;tag=wwwphpnet">Amazon.com</a>, or 
 go directly to
 <a href="http://www.amazon.de/exec/obidos/redirect-home/wwwphpnet07">Amazon.de</a>
 or <a href="http://www.amazon.fr/exec/obidos/redirect-home/wwwphpnet0f">Amazon.fr</a>
 and search there.
</p>

<h3>Sample Code</h3>
<p>
 Looking for some more sample PHP scripts? Our <a
 href="/links.php">links page</a> lists some archives of sample PHP code - 
 great places to find many example scripts and useful functions, organized for 
 your searching pleasure!
</p>
';

site_header("Documentation");

// Check for really available manual languages
$man_languages = array();
// Remove inactive online languages from the list to show
foreach ($ACTIVE_ONLINE_LANGUAGES as $code => $langname) {
// Avoid this stat call here for the moment
//    if (file_exists("manual/$code/index.php")) {
        $man_languages[] = $code;
//    }
}
$lastlang = count($man_languages) - 1;

?>

<h1>Documentation</h1>

<p>
 The PHP Manual is available online in a selection of languages.
 Please pick a language from the list below.
</p>

<p>
 You can learn how to integrate our online manual with various tools, including
 your web browser, on our <a href="tips.php">quick reference tips</a> page.
 You can also get more information about php.net URL shortcuts by visiting our
 <a href="urlhowto.php">URL howto page</a>.
</p>

<p>
 Note, that many languages are just under translation, and
 the untranslated parts are still in English. Also some translated
 parts might be outdated. The translation teams are open to
 contributions. 
</p>

<table border="0" cellpadding="3" cellspacing="2" class="standard">
 <tr>
  <th>Formats</th>
  <th>Destinations</th>
 </tr>
 <tr>
  <th class="sub">View Online</th>
  <td>
<?php

// List all manual languages viewable online
foreach ($man_languages as $langnum => $langcode) {

    // Make preferred language bold
    if ($langcode == $LANG) { echo "<strong>"; }

    echo '<a href="/manual/' . $langcode . '/">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ",\n" : "\n";

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

<h2>More documentation</h2>
<ul>
 <li>
  If you are interested in how the documentation is edited and translated,
  you should read the <a href="http://doc.php.net/php/dochowto/">Documentation HOWTO</a>.
 </li>
 <li>
  <a href="http://gtk.php.net/docs.php">PHP-GTK related documentation</a>
  is hosted on the PHP-GTK website.
 </li>
 <li>
  <a href="http://pear.php.net/manual/">Documentation of PEAR and the various
  packages</a> can be found on a separate server.
 </li>
 <li>
  You can still read a copy of the original <a href="/manual/phpfi2.php">PHP/FI
  2.0 Manual</a> on our site, which we only host for historical purposes.
 </li>
</ul>

<?php site_footer();
