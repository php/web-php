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

# array structure: (header, link_text, show_size_for_package)
$formats = array(
 ""                  => array("View Online",         "view",      false),
 "html/"             => array("View Online (plain)", "view",      false),
 "manual.txt.gz"     => array("Plain text",          "txt.gz",    true),
 "bigmanual.html.gz" => array("Single HTML",         "html.gz",   true),
 "manual.tar.gz"     => array("Many HTML files",     "tar.gz",    true),
 "manual.tar.bz2"    => array("Many HTML files",     "tar.bz2",   true),
 "manual.zip"        => array("Many HTML files",     "zip",       true),
 "manual.pdf"        => array("PDF",                 "pdf",       false),
 "manual_doc.pdb"    => array("PalmPilot DOC",       "doc.pdb",   true),
 "manual_isilo.pdb"  => array("PalmPilot iSilo",     "isilo.pdb", true),
 "manual.chm"        => array("Windows HTML Help",   "chm",       true)
);
?>

<h1>PHP Manual</h1>

<p>The PHP manual is available in a selection of languages
and formats. Pick a language and format from the table below.
Tip: If you are using a capable browser, the file size and
date will show up when you move the mouse above the link.
If you use another browser, or would like to see all the
information, you can <a href="/docs.php?sizes=1">click
here to see all the file sizes and dates</a>.
</p>

<p>
Note that the packaged versions of the manual (tar.gz, tar.bz2 and zip)
don't contain any directories, so all of the files will be dumped into
your current working directory when you expand the archive unless
the tool you use does otherwise.
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <td>&nbsp;</td>
  <?php 
    while (list($k,$v) = each($formats)) {
      echo "<th valign=\"bottom\">$v[0]</th>\n";
    }?>
 </tr>
 <?php
   while (list(,$langcode) = each($man_languages)) {
     $language = $LANGUAGES[$langcode];
     echo "<tr>\n<td bgcolor=\"#dddddd\"><b>$language</b></td>\n";
     reset($formats);
     while (list($fn,$details) = each($formats)) {
       echo "<td align=\"center\" bgcolor=\"#eeeeee\">";

       # temporary hacks until pdf and chm are auto-generated
       if ($fn == "manual.pdf") {
#         $link_to = "http://snaps.php.net/~jah/pdf/manual-$langcode.pdf";
          $link_to = 'down';
       } elseif ($fn == "manual.chm") {
         $link_to = "distributions/manual_$langcode.chm";
       } else {
         $link_to = "manual/$langcode/$fn";
       }
       
       # if no size required [pdf, online], then just print, else
       # decide what to do according to the $size of the file
       if (!$details[2]) { 
         if ($link_to == 'down') echo "PDF Format Unavailable Temporarily";
         else echo "<a href=\"$link_to\">$details[1]</a>"; 
       }
       else {
         $size = @filesize($link_to);
         $changed = @filemtime($link_to);
         $date_format = "j M Y"; // Part of the RFC date type (to be short)
         if ($size) {
           echo "<a href=\"$link_to\" title=\" Size: " . (int) ($size/1024) . "Kb\n Date: " . date ($date_format, $changed) . "\">$details[1]</a>";
           if ($sizes) { echo "<br><small>Size: " . (int) ($size/1024) . "Kb<br>Date: " . date ($date_format, $changed) . "</small>"; }
         } else {
           echo "&nbsp;";
         }
       }

       echo "</td>\n";
     }
   }?>
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
</p>

<p>
La documentation Fran&ccedil;aise est disponible sur un site secondaire,
dans diff&eacute;rents formats. C'est la version officielle, compl&egrave;tement 
francis&eacute;e et retravaill&eacute;e. De plus, ces docs sont compress&eacute;es.
</p>

<p>
<ul>
<li><a href="http://dev.nexen.net/docs/php/annotee/">Annotated version</a></li>
<li><a href="http://dev.nexen.net/docs/php/chargement.html">Manual downloads</a></li>
</ul>
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
