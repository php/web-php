<?php
$ts = getlastmod();
$tsstring = gmdate("D, d M Y H:i:s",$ts)." GMT";
if ($tsstring != $HTTP_IF_MODIFIED_SINCE) {
    header("Last-Modified: ".$tsstring);
    /* output the page here */
} else {
    header("HTTP/1.1 304 Not Modified");
    /* do nothing */
	exit();
}

require_once 'prepend.inc';

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
are available.<br><br>

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
Looking for some more sample PHP scripts? Our <A
HREF="/links.php">links page</A> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</p>
';

commonHeader("Documentation");

$man_languages = array('en', 'pt_BR', 'cs', 'nl', 'fr', 'de', 'hu', 'it', 'ja', 'kr', 'pl', 'es');

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
teams are open to other contributors though.
</p>

<table border="0" cellpadding="3" cellspacing="2" width="100%">
<tr bgcolor="#cccccc"><th>Formats</th><th>Languages</th></tr>
<tr><th bgcolor="#dddddd">View Online</th><td bgcolor="#eeeeee">
<?php

  $lastlang = count($man_languages) - 1;
  foreach ($man_languages as $langnum => $langcode) {
    echo '<a href="/manual/' . $langcode . '/">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ", " : "";
  }

?>
</td></tr>
<tr><th bgcolor="#dddddd">Printer friendly</th><td bgcolor="#eeeeee">
<?php

  foreach ($man_languages as $langnum => $langcode) {
    echo '<a href="/manual/' . $langcode . '/print/index.php">' . $LANGUAGES[$langcode] . '</a>';
    echo ($lastlang != $langnum) ? ", " : "";
  }

?>
</td></tr>
<tr><th bgcolor="#dddddd">Downloads</th><td bgcolor="#eeeeee">
For downloadable formats, please visit our
<a href="download-docs.php">documentation downloads</a> page.
</td></tr>
<tr><th bgcolor="#dddddd">Other manuals</th><td bgcolor="#eeeeee">
<a href="http://gtk.php.net/docs.php">PHP-GTK</a> and
<a href="http://pear.php.net/manual/">PEAR</a> manuals
can be found on separate servers.
</td></tr>
</table>

<?php echo hdelim(); ?>

<h1>French PHP Manual</h1>

<p>
The French PHP manual is also available on an external site, in differents formats.
Documentation is the official flavor, while formating and localization has 
been worked some more (function and examples indexes, short version, search engine..). 
Besides, those are compressed for faster download.
<a href="http://dev.nexen.net/docs/php/annotee/">Follow this link for
the annotated French manual</a>
</p>

<p>
La documentation Fran&ccedil;aise est disponible sur un site secondaire,
dans diff&eacute;rents formats. C'est la version officielle, compl&egrave;tement 
francis&eacute;e et retravaill&eacute;e. De plus, ces docs sont compress&eacute;es.
</p>

<?php echo hdelim(); ?>

<h1>CVS Account</h1>
<ul>
<li><a href="/anoncvs.php">Anonymous CVS access instructions</a></li>
<li><a href="/cvs-php.php">Getting a CVS account</a>. If you
wish to help out with the development of PHP, read this.</li>
</ul>

<?php echo hdelim(); ?>

<h1>Old/Unsupported Information</h1>
<ul>
<li><a href="/manual/phpfi2.php">PHP/FI 2.0 Manual</a>.</li>
</ul>

<?php commonFooter(); ?>
