<?php
require_once 'prepend.inc';

$SIDEBAR_DATA='
<h3>Documentation online</h3>
<p>
You can read the
<a href="/docs.php">documentation online</a>
is various languages, even in printer
friendly HTML format.
</p>
';

commonHeader("Download documentation");

$man_languages = array('en', 'pt_BR', 'cs', 'nl', 'fr', 'de', 'hu', 'it', 'ja', 'kr', 'es');

# array structure: (header, link_text, show_size_for_package)
$formats = array(
 "manual.txt.gz"     => array("Plain text",          "txt.gz",    true),
 "bigmanual.html.gz" => array("Single HTML",         "html.gz",   true),
 "manual.tar.gz"     => array("Many HTML files",     "tar.gz",    true),
 "manual.tar.bz2"    => array("Many HTML files",     "tar.bz2",   true),
 "manual.zip"        => array("Many HTML files",     "zip",       true),
 "manual.pdf.gz"     => array("PDF",                 "pdf.gz",    true),
 "manual.pdf.bz2"    => array("PDF",                 "pdf.bz2",   true),
 "manual.pdf.zip"    => array("PDF",                 "pdf.zip",   true),
 "manual_doc.pdb"    => array("PalmPilot DOC",       "doc.pdb",   true),
 "manual_isilo.pdb"  => array("PalmPilot iSilo",     "isilo.pdb", true),
 "manual.chm"        => array("Windows HTML Help",   "chm",       true)
);
?>

<h1>Download documentation</h1>

<p>The PHP manual is available in a selection of languages
and formats. Pick a language and format from the table below.
Tip: If you are using a capable browser, the file size and
date will show up when you move the mouse above the link.
If you use another browser, or would like to see all the
information, you can <a href="/docs.php?sizes=1">click
here to see all the file sizes and dates</a>.
</p>

<p>
Note that the packaged HTML versions of the manual
(tar.gz, tar.bz2 and zip) don't contain any directories,
so all of the files will be dumped into your current working
directory when you expand the archive unless the tool you
use does otherwise.
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
       if ($fn == "manual.pdf.bz2") {
          $link_to = "distributions/manual/manual-$langcode.pdf.bz2";
       } elseif ($fn == "manual.pdf.gz") {
          $link_to = "distributions/manual/manual-$langcode.pdf.gz";
       } elseif ($fn == "manual.pdf.zip") {
          $link_to = "distributions/manual/manual-$langcode.pdf.zip";
       } elseif ($fn == "manual.chm") {
         $link_to = "distributions/manual_$langcode.chm";
       } else {
         $link_to = "manual/$langcode/$fn";
       }
       
       # if no size required [pdf, online], then just print, else
       # decide what to do according to the $size of the file
       if (!$details[2]) { 
         if ($link_to == 'down') echo "Format Unavailable";
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

<h1>French PHP Manual</h1>

<p>
The French PHP manual is also available on an external site, in differents formats.
Documentation is the official flavor, while formating and localization has 
been worked some more (function and examples indexes, short version, search engine..). 
Besides, those are compressed for faster download.
<a href="http://dev.nexen.net/docs/php/chargement.html">Follow this link for
more French downloads</a>
</p>

<p>
La documentation Fran&ccedil;aise est disponible sur un site secondaire,
dans diff&eacute;rents formats. C'est la version officielle, compl&egrave;tement 
francis&eacute;e et retravaill&eacute;e. De plus, ces docs sont compress&eacute;es.
</p>

<?php commonFooter(); ?>
