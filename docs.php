<?php
require("shared.inc");
commonHeader("Documentation ");

$languages = array(
 "en" => "English"
,"pt_BR" => "Brazilian Portuguese"
,"cs" => "Czech"
,"nl" => "Dutch"
,"fr" => "French"
,"de" => "German"
,"hu" => "Hungarian"
,"it" => "Italian"
,"ja" => "Japanese"
,"kr" => "Korean"
,"es" => "Spanish"
);

$formats = array(
 "bigmanual.html.gz" => array("Single HTML file (compressed)", "html.gz")
,"manual_doc.pdb" => array("PalmPilot DOC", "doc.pdb")
,"manual_isilo.pdb" => array("PalmPilot iSilo", "isilo.pdb")
,"manual.pdf" => array("PDF", "pdf")
,"manual.txt.gz" => array("Plain text (compressed)", "txt.gz")
,"manual.tar.gz" =>  array("Seperate HTML files (compressed tar archive)", "tar.gz")
,"manual.zip" => array("Seperate HTML files (zip archive)", "zip")
,"manual.chm" => array("Windows HTML Help", "chm")
);
?>

<H1>PHP FAQ</H1>
<ul>
<li>The <a href="/FAQ.php">PHP FAQ</a> is your first stop for general
    information and those questions that seem to be on most people's minds.

</ul>

<?
$prefix = ($MYSITE=='http://bugs.php.net/') ? 'http://www.php.net' : '';
?>

<H1>The PHP Manual On-line</H1>
<ul>
<li><a href="<?php echo $prefix; ?>/manual/">PHP Manual Online</a>. Your reference
    to everything that's great about PHP.

<li><a href="<?php echo $prefix; ?>/manual/html/">Plain HTML PHP Manual Online</a>. The very
    same manual in a light-weight, HTML 3.2 version without any bells or
    whistles.
</ul>

<H2>PHP Annotated Manuals</H2>
<ul>
<LI><A href="http://www.php.net/manual/">PHP Annotated Manual</A>. This
    is the same as the above, except there is a built-in errata/note system
    that users all around the world can (and have!) contributed to. Of
    all of the documentation, this will be the most current version,
    as it is updated (and annotated) daily.

<LI><A href="http://www.php.net/manual/browse-errata.php">PHP Manual
    Errata</A>. This is the collected errata from the on-line errata/note
    system.
</ul>

<H1>Downloadable PHP Manuals</H1>

<p>The PHP manual is also available in a selection of downloadable
formats for off-line use. Pick your format and language from the
table below:</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <td></td>
  <?while (list($k,$v) = each($languages)) {
      echo "<th>$v</th>\n";
    }?>
 </tr>
 <?while (list($fn,$details) = each($formats)) {
     echo "<tr>\n<td bgcolor=\"#dddddd\"><b>$details[0]</b></td>\n";
     reset($languages);
     while (list($langcode,$language) = each($languages)) {
       echo "<td align=\"center\" bgcolor=\"#eeeeee\">";
       # temporary hack until pdf are auto-generated
       if ($fn == "manual.pdf") {
         echo "<a href=\"http://snaps.php.net/~jah/pdf/manual-$langcode.pdf\">$details[1]</a></td>";
         continue;
       }
       # temporary hack until chm are auto-generated
       if ($fn == "manual.chm") {
         echo "<a href=\"distributions/manual_$langcode.chm\">$details[1]</a></td>";
         continue;
       }
       $size = @filesize("manual/$langcode/$fn");
       if ($size) {
         echo "<a href=\"manual/$langcode/$fn\">$details[1]</a>";
       }
       else {
         echo "&nbsp;";
       }
       echo "</td>\n";
     }
   }?>
</table>

<H1>More information</H1>
<ul>
<li><a href="http://zugeschaut-und-mitgebaut.de/php/">PHP Function Table</a>.
    This page has a overview about which pages are translated to the
	different languages and in which versions of PHP the functions
	are available.

<li><a href="/books.php">Books on PHP</A>. Here you can find a
    great selection of books on PHP and related themes.

<li>License questions?  See the <a href="/license/#FAQ">License FAQ</a></li>	
</ul>

<H1>CVS Account</H1>
<ul>
<li><a href="/anoncvs.php">CVS instructions</a></li>
<li><A href="/cvs-php.php">Getting a CVS account</a>.  If you wish to help out
with the development of PHP, read this.
</ul>

<H1>Old/unsupported information</H1>
<ul>
<li><a href="/manual/phpfi2.html">PHP/FI 2.0 Manual</a>. 
</ul>


<?php commonFooter("") ?>
