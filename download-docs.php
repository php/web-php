<?php
include_once 'prepend.inc';

$SIDEBAR_DATA='
<h3>Documentation online</h3>
<p>
You can read the
<a href="/docs.php">documentation online</a>
in various languages, even in printer
friendly formats.
</p>

<h3>Tips for Windows users</h3>
<p>
If you don\'t know how to handle bz2 compressed
manuals on Windows, please read our <a
href="/manual/en/faq.misc.php#faq.misc.bz2">FAQ entry</a>
on this subject.
</p>
<p>
You may also check out the still in progress
development of a new CHM format based PHP manual at
<a href="http://weblabor.hu/php-doc-chm">http://weblabor.hu/php-doc-chm</a>.
</p>

<h3>File sizes and dates</h3>
<p>
If you are using a capable browser, the file size and
date will show up when you move the mouse above a link.
If you use cannot view this information, or would like to see all the
information, you can <a href="/download-docs.php?sizes=1">click
here to see all the file sizes and dates</a>.
</p>
';

commonHeader("Download documentation");

// array structure: (filename => header, extension)
$formats = array(
 "bigmanual.html.bz2"      => array("Single HTML",         "html.bz2"),
 "manual.tar.bz2"          => array("Many HTML files",     "tar.bz2"),
 //"php_manual_LANG.pdf.bz2" => array("PDF",                 "pdf.bz2"),
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
 (tar.bz2) doesn't contain any directories,
 so all of the files will be dumped into your current working
 directory when you expand the archive unless the tool you
 use does otherwise.
</p>

<p>
 <em>
  Please note that due to some technical problems, we do not
  distribute PDF versions of the manual right now.
 </em>
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <td>&nbsp;</td>
<?php 
// Print out the name of the formats
foreach ($formats as $fname => $details) {
    echo "  <th valign=\"bottom\">$details[0]</th>\n";
}
?>
 </tr>
<?php

// Go through all possible manual languages
foreach ($LANGUAGES as $langcode => $language) {

    // Reset files array and format counter
    $files = array(); $formatnum = 0;
    
    // Go through all possible manual formats
    foreach ($formats as $fname => $details) {
    
        // Reset link target
        $link_to = "";
        
        // File named after the format exists [old!]
        if (file_exists("manual/$langcode/$fn")) {
            $link_to = "manual/$langcode/$fn";
        }
        
        // File named after the language and format exists
        elseif (file_exists("distributions/manual/php_manual_$langcode.$details[1]")) {
            $link_to = "distributions/manual/php_manual_$langcode.$details[1]";
        }
        
        // File named after the language and format exists [old!]
        elseif (file_exists("distributions/manual/manual-$langcode.$details[1]")) {
            $link_to = "distributions/manual/manual-$langcode.$details[1]";
        }
    
        // Unable to find file
        if (!$link_to) {
            $files[] = '';
        }
        
        // File found
        else {
            
            // Try to get size and changed date
            $size    = @filesize($link_to);
            $changed = @filemtime($link_to);
            
            // Size available, collect information
            if ($size) {
                $files[] = array($link_to, (int) ($size/1024),  date("j M Y", $changed), $details[1]);
                $formatnum++;
            }
            
            // Size is not available, we won't list the file
            else {
                $files[] = '';
            }
        }
    }
    
    // At least one format is found for this
    // language => write out table row
    if ($formatnum > 0) {

        echo "<tr>\n<td bgcolor=\"#dddddd\"><b>$language</b></td>\n";
        
        // Print out a table cell for all formats
        foreach ($files as $fileinfo) {
            
            echo "<td align=\"center\" bgcolor=\"#eeeeee\">";
            
            // Missing format
            if ($fileinfo == '') {
                echo "&nbsp;";
            }
            
            // Format found, write out link
            else {
                echo "<a href=\"$fileinfo[0]\" title=\" Size: $fileinfo[1]Kb\n Date: $fileinfo[2]\">$fileinfo[3]</a>";

                // Sizes required to be printed out (URL parameter)
                if ($sizes) {
                    echo "<br><small>Size: $fileinfo[1]Kb<br>Date: $fileinfo[2]</small>";
                }
            }

            // Quite bad looking code tweak to add a link to the extended CHM (en only!)
            if ($langcode == "en" && preg_match("!.chm$!", $fileinfo[0])) {
                echo ', <a href="http://weblabor.hu/php-doc-chm">extended chm</a>';
            }
       
            // End table cell
            echo "</td>\n";
        }
    }
}
?>
</table>

<?php echo hdelim(); ?>

<h1>Documentation howto</h1>

<p>
The PHP Documentation Team has a documentation howto, including coverage
on how to set up a working environment on Unix/Linux/Windows, how to build
HTML formatted docs from the XML sources, what conventions to follow when
writing documentation, etc. If you are interested in the process, or would
like to start/join a translation, this is a must read:
<a href="http://cvs.php.net/co.php/phpdoc/howto/howto.html.tar.gz">http://cvs.php.net/co.php/phpdoc/howto/howto.html.tar.gz</a>
</p>

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
