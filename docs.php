<?php
require_once 'prepend.inc';

$SIDEBAR_DATA='
<b>FAQ</b>
<p>
The <a href="/FAQ.php">PHP FAQ</a> is your first stop for general
information and those questions that seem to be on most people\'s minds.
</p>

<b>Books</b>
<p>
<a href="/books.php">Books</a> are convenient resources to begin exploring 
PHP. <a href="/books.php">The titles listed here</a> will help you to start 
learning PHP, as well as extending your existing knowledge.
</p>

<b>Sample Code</b>
<p>
Looking for some more sample PHP scripts?  Our <A
HREF="/links.php">links page</A> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</p>
';

commonHeader("Documentation");

$languages = array(
 "en" => "English",
 "pt_BR" => "Brazilian Portuguese",
 "cs" => "Czech",
 "nl" => "Dutch",
 "fr" => "French",
 "de" => "German",
 "hu" => "Hungarian",
 "it" => "Italian",
 "ja" => "Japanese",
 "kr" => "Korean",
 "es" => "Spanish"
);

# array structure: (header, link text, show_size_in_link)
$formats = array(
 ""                  => array("View Online", "view", false),
 "html/"             => array("View Online (plain)", "view", false),
 "bigmanual.html.gz" => array("Single HTML", "html.gz", true),
 "manual.txt.gz"     => array("Plain text", "txt.gz", true),
 "manual.tar.gz"     => array("Many HTML files", "tar.gz", true),
 "manual.zip"        => array("Many HTML files", "zip", true),
 "manual.pdf"        => array("PDF", "pdf", false),
 "manual_doc.pdb"    => array("PalmPilot DOC", "doc.pdb", true),
 "manual_isilo.pdb"  => array("PalmPilot iSilo", "isilo.pdb", true),
 "manual.chm"        => array("Windows HTML Help", "chm", true)
);
?>

<h1>PHP Manual</h1>

<p>The PHP manual is available in a selection of languages
and formats. Pick a language and format from the table below.
Tip: If you are using Internet Explorer, the file size
will show up, when you move the mouse above one link.
If you use another browser you can 
<a href="/docs.php?sizes=1">click here to see the file sizes</a>.
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <td></td>
  <?php 
    while (list($k,$v) = each($formats)) {
      echo "<th valign=\"bottom\">$v[0]</th>\n";
    }?>
 </tr>
 <?php
   while (list($langcode,$language) = each($languages)) {
     echo "<tr>\n<td bgcolor=\"#dddddd\"><b>$language</b></td>\n";
     reset($formats);
     while (list($fn,$details) = each($formats)) {
       echo "<td align=\"center\" bgcolor=\"#eeeeee\">";

       # temporary hacks until pdf and chm are auto-generated
       if ($fn == "manual.pdf") {
         $link_to = "http://snaps.php.net/~jah/pdf/manual-$langcode.pdf";
       } elseif ($fn == "manual.chm") {
         $link_to = "distributions/manual_$langcode.chm";
       } else {
         $link_to = "manual/$langcode/$fn";
       }
       
       # if no size required [pdf, online], then just print, else
       # decide what to do according to the $size of the file
       if (!$details[2]) { echo "<a href=\"$link_to\">$details[1]</a>"; }
       else {
         $size = @filesize($link_to);
         if ($size) {
           echo "<a href=\"$link_to\" title=\"" . (int) ($size/1024) . "Kb\">$details[1]</a>";
           if ($sizes) { echo '<br><small>' . (int) ($size/1024) . '</small>'; }
         } else { 
           echo "&nbsp;";
         }
       }

       echo "</td>\n";
     }
   }?>
</table>

<? echo hdelim(); ?>

<H1>PHP Annotated Manuals</H1>
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

<? echo hdelim(); ?>

<h1>More Information</h1>

<ul>
<li><a href="http://zugeschaut-und-mitgebaut.de/php/">PHP Function Table</a>.
    This page has a overview about which pages are translated to the
	different languages and in which versions of PHP the functions
	are available.
<li>License questions?  See the <a href="/license/#FAQ">License FAQ</a></li>	
</ul>

<? echo hdelim(); ?>


<H1>CVS Account</H1>
<ul>
<li><a href="/anoncvs.php">CVS instructions</a></li>
<li><A href="/cvs-php.php">Getting a CVS account</a>.  If you wish to help out
with the development of PHP, read this.
</ul>



<? echo hdelim(); ?>


<h1>Old/Unsupported Information</h1>
<ul>
<li><a href="/manual/phpfi2.php">PHP/FI 2.0 Manual</a>. 
</ul>


<?php commonFooter("") ?>
