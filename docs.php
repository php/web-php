<?php
require_once 'prepend.inc';

$SIDEBAR_DATA='
<h3>FAQ</h3>
<p>
The <a href="/FAQ.php">PHP FAQ</a> is your first stop for general
information and those questions that seem to be on most people\'s minds.
</p>

<h3>More Information</h3>
<p>
The <a href="http://zugeschaut-und-mitgebaut.de/php/">PHP Function Table</a>
has an overview about which pages are translated to the
different languages and in which versions of PHP the functions
are available.<br><br>

If you have license questions, see
the <a href="/license/">License FAQ</a>
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

$man_languages = array('en', 'pt_BR', 'cs', 'nl', 'fr', 'de', 'hu', 'it', 'ja', 'kr', 'es');

?>

<h1>PHP Manual</h1>

<p>
The PHP manual is available online in a selection of languages.
You can choose between the printer friendly and graphically
designed versions. Please pick a language and format from
the table below.
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">

<tr><td bgcolor=\"#dddddd\">View Online</td><td bgcolor="#eeeeee">
<?php

  foreach ($man_languages as $langnum => $langcode) {
    echo '<a href="/manual/' . $langcode . '/">' . $LANGUAGES[$langcode] . '</a> ';
  }

?>
</td></tr>

<tr><td bgcolor=\"#dddddd\">Printer friendly</td><td bgcolor="#eeeeee">
<?php

  foreach ($man_languages as $langnum => $langcode) {
    echo '<a href="/manual/' . $langcode . '/html/">' . $LANGUAGES[$langcode] . '</a> ';
  }

?>
</td></tr>

<tr><td bgcolor=\"#dddddd\">Printer friendly</td><td bgcolor="#eeeeee">
For other downloadable formats, please visit our new
<a href="download-docs.php">documentation downloads</a> page.
</td></tr>

</table>

<?php echo hdelim(); ?>

<h1>Annotated PHP Manual</h1>
<ul>
<li>The <a href="http://www.php.net/manual/">Annotated PHP Manual</A> is
    the same as the above, except there is a built-in errata/note system
    that users all around the world can (and have!) contributed to. Of
    all of the documentation, this will be the most current version,
    as it is updated (and annotated) daily.</li>

<li><A href="http://www.php.net/manual/browse-errata.php">PHP Manual
    Errata</A>. This is the collected errata from the on-line
    errata/note system.</li>
</ul>

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
<li><a href="/anoncvs.php">CVS instructions</a></li>
<li><A href="/cvs-php.php">Getting a CVS account</a>. If you
wish to help out with the development of PHP, read this.</li>
</ul>

<?php echo hdelim(); ?>

<h1>Old/Unsupported Information</h1>
<ul>
<li><a href="/manual/phpfi2.php">PHP/FI 2.0 Manual</a>.</li>
</ul>

<?php commonFooter(); ?>
