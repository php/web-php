<?php
include './include/prepend.inc';

$SIDEBAR_DATA='
<h3>FAQ</h3>
<p>
The <a href="/FAQ.php">PHP FAQ</a> is your first stop for general
information and those questions that seem to be on most people\'s minds.
</p>

<h3>Changelog</h3>
<p>
You can also find the <a href="/ChangeLog-4.php">PHP Changelog</a> useful,
if you would like to look up changes between various versions of PHP.
</p>

<h3>More Information</h3>
<p>
The <a href="http://zugeschaut-und-mitgebaut.de/php/">PHP Function Table</a>
has an overview about which pages are translated to the
different languages and in which versions of PHP the functions
are available.<br /><br />

If you have license questions, see
the <a href="/license/">License FAQ</a>.
</p>

<h3>Books</h3>
<p>
<a href="/books.php">Books</a> are convenient resources to begin exploring 
PHP. <a href="/books.php">The titles listed here</a> will help you to start 
learning PHP, as well as extending your existing knowledge.
</p>

<h3>Sample Code</h3>
<p>
Looking for some more sample PHP scripts? Our <a
href="/links.php">links page</a> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</p>
';

// Start page with common header
commonHeader("Documentation");

// Check for really available manual languages
$man_languages = array();
// Remove inactive online languages from the list to show
$online_languages = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);
foreach ($online_languages as $code => $langname) {
// Avoid this stat call here for the moment
//    if (file_exists("manual/$code/index.php")) {
        $man_languages[] = $code;
//    }
}
$lastlang = count($man_languages) - 1;

?>

<h1>Documentation</h1>

<p>
The PHP manual is available online in a selection of languages.
You can choose between the printer friendly and graphically
designed versions. Please pick a language and format from
the table below.
</p>

<p>
You can learn how to integrate our online manual with various tools, including
your web browser, on our <a href="tips.php">quick reference tips</a> page.
You can also get more information about php.net URL shortcuts by visiting our
<a href="urlhowto.php">URL howto page</a>.
</p>

<p>
Note, that many languages are just under translation, and
the untranslated parts are still in English. The translation
teams are open to contributions though.
</p>

<table border="0" cellpadding="3" cellspacing="2" width="100%">
<tr bgcolor="#cccccc"><th>Formats</th><th>Languages</th></tr>
<tr><th bgcolor="#dddddd">View Online</th><td bgcolor="#eeeeee">
<?php

// List all manual languages viewable online
foreach ($man_languages as $langnum => $langcode) {

    // Make preferred language bold
    if ($langcode == $LANG) { echo "<b>"; }

    echo '<a href="/manual/' . $langcode . '/">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ", " : "";

    // Also link to the external special French version, after the French link
    if ($langcode == "fr") {
        echo '<a href="http://dev.nexen.net/docs/php/annotee/">[Special French]</a>, ';
    }

    if ($langcode == $LANG) { echo "</b>"; }

}

?>
</td></tr>
<tr><th bgcolor="#dddddd">Printer friendly</th><td bgcolor="#eeeeee">
<?php

// List printer friendly pages of all manual languages
foreach ($man_languages as $langnum => $langcode) {
    if ($langcode == $LANG) { echo "<b>"; }
    echo '<a href="/manual/' . $langcode . '/print/index.php">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ", " : "";
    if ($langcode == $LANG) { echo "</b>"; }
}

?>
</td></tr>
<tr><th bgcolor="#dddddd">Printer friendly<br />with notes</th><td bgcolor="#eeeeee">
<?php

// List printer friendly pages with notes of all manual languages
foreach ($man_languages as $langnum => $langcode) {
    if ($langcode == $LANG) { echo "<b>"; }
    echo '<a href="/manual/' . $langcode . '/printwn/index.php">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ", " : "";
    if ($langcode == $LANG) { echo "</b>"; }
}

?>
</td></tr>
<tr><th bgcolor="#dddddd">Downloads</th><td bgcolor="#eeeeee">
For downloadable formats, please visit our
<a href="download-docs.php">documentation downloads</a> page.
</td></tr>
<tr><th bgcolor="#dddddd">Other manuals</th><td bgcolor="#eeeeee">
The <a href="/manual/howto">Documentation HOWTO</a> is also
available for online reading.
<a href="http://gtk.php.net/docs.php">PHP-GTK</a> and
<a href="http://pear.php.net/manual/">PEAR</a> manuals
can be found on separate servers.
</td></tr>
</table>

<hr />

<h1>CVS Account</h1>
<ul>
<li><a href="/anoncvs.php">Anonymous CVS access instructions</a></li>
<li><a href="/cvs-php.php">Getting a CVS account</a>. If you
wish to help out with the development of PHP, read this.</li>
</ul>

<hr />

<h1>Old/Unsupported Information</h1>
<ul>
<li><a href="/manual/phpfi2.php">PHP/FI 2.0 Manual</a>.</li>
</ul>

<?php commonFooter(); ?>
