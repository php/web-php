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

<h3>File sizes and dates</h3>
<p>
If you are using a capable browser, the file size and
date will show up when you move the mouse above the link.
If you use another browser, or would like to see all the
information, you can <a href="/download-docs.php?sizes=1">click
here to see all the file sizes and dates</a>.
</p>

<h3>Tip for Windows users</h3>
<p>
<a href="http://www.rarsoft.com/">WinRAR</a> supports .bz2, and
Redhat also hosts
<a href="http://sources.redhat.com/bzip2/">free
downloads of .bz2 tools for Windows</a>.
</p>
';

commonHeader("Download documentation");

$man_languages = array('en', 'pt_BR', 'cs', 'nl', 'fr', 'de', 'hu', 'it', 'ja', 'kr', 'pl', 'es');

# array structure: (header, link_text, show_size_for_package)
$formats = array(
 "bigmanual.html.bz2"      => array("Single HTML",         "html.bz2"),
 "manual.tar.bz2"          => array("Many HTML files",     "tar.bz2"),
 "php_manual_LANG.pdf.bz2" => array("PDF",                 "pdf.bz2"),
 "manual_doc.pdb"          => array("PalmPilot DOC",       "doc.pdb"),
 "manual_isilo.pdb"        => array("PalmPilot iSilo",     "isilo.pdb"),
 "manual-LANG.chm"         => array("Windows HTML Help",   "chm")
);
?>

<h1>Download documentation</h1>

<p>
The PHP manual is available in a selection of languages
and formats. Pick a language and format from the table below
to start downloading.
</p>

<p>
Note that the packaged HTML version of the manual
(tar.bz2) don't contain any directories,
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

       $link_to = "";
       if (file_exists("manual/$langcode/$fn")) {
         $link_to = "manual/$langcode/$fn";
       }
       elseif (file_exists("distributions/manual/php_manual_$langcode.$details[1]")) {
         $link_to = "distributions/manual/php_manual_$langcode.$details[1]";
       }
       elseif (file_exists("distributions/manual/manual-$langcode.$details[1]")) {
         $link_to = "distributions/manual/manual-$langcode.$details[1]";
       }

       if (!$link_to) {
         echo "&nbsp;";
       }
       else {
         $size = @filesize($link_to);
         $changed = @filemtime($link_to);
         $date_format = "j M Y"; // Part of the RFC date type (to be short)
         if ($size) {
           echo "<a href=\"$link_to\" title=\" Size: ", (int) ($size/1024), "Kb\n Date: ", date($date_format, $changed), "\">$details[1]</a>";
           if ($sizes) {
             echo "<br><small>Size: ", (int) ($size/1024), "Kb<br>Date: ", date($date_format, $changed), "</small>";
           }
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
