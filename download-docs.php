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
If you cannot view this information, or would like to see all the
information, you can <a href="/download-docs.php?sizes=1">click
here to see all the file sizes and dates</a>.
</p>
';

commonHeader("Download documentation");

// Available formats
$formats = array(
 "Single HTML"       => "html.bz2",
 "Many HTML files"   => "tar.bz2",
 "PDF"               => "pdf.bz2",
 "PalmPilot DOC"     => "doc.pdb",
 "PalmPilot iSilo"   => "isilo.pdb",
 "Windows HTML Help" => "chm"
);
?>

<h1>Download documentation</h1>

<p>
 The PHP manual is available in a selection of languages
 and formats. Pick a language and format from the table below
 to start downloading.
</p>

<p class="tip">
 Currently only the CHM versions are downloadable. We are going
 to make the other formats available soon.
</p>

<p>
 Note that the packaged HTML version of the manual
 (tar.bz2) doesn't contain any directories,
 so all of the files will be dumped into your current working
 directory when you expand the archive unless the tool you
 use does otherwise.
</p>

<table border="0" cellpadding="2" cellspacing="1" width="100%">
 <tr bgcolor="#cccccc">
  <td>&nbsp;</td>
<?php 
// Print out the name of the formats
foreach ($formats as $formatname => $extension) {
    echo "  <th valign=\"bottom\">$formatname</th>\n";
}
?>
 </tr>
<?php

// Go through all possible manual languages
foreach ($LANGUAGES as $langcode => $language) {

    // See if current language is the preferred one
    if ($langcode == $LANG) { $preflang = TRUE; }
    else { $preflang = FALSE; }

    // Reset files array and format counter
    $files = array(); $formatnum = 0;
    
    // Go through all possible manual formats
    foreach ($formats as $formatname => $extension) {
    
        // Actual filename of the file
        $actual_file = $_SERVER['DOCUMENT_ROOT'] . "/distributions/manual/php_manual_$langcode.$extension";
        
        // File named after the language and format exists
        if (file_exists($actual_file)) {
            
            // Mirror selection download URL
            $link_to = "/get/php_manual_$langcode.$extension/from/a/mirror";

            // Try to get size and changed date
            $size    = @filesize($actual_file);
            $changed = @filemtime($actual_file);
            
            // Size available, collect information
            if ($size) {
                
                // The PDF file was changed in 2002, skip it
                if ($formatname == "PDF" && $changed < mktime(0, 0, 0, 1, 1, 2003)) {
                    $files[] = '';
                } else {
                    $files[] = array(
                        $link_to,
                        (int) ($size/1024),
                        date("j M Y", $changed),
                        $extension
                    );
                    $formatnum++;
                }
            }
            
            // Size is not available, we won't list the file
            else {
                $files[] = '';
            }
        }
        
        // Unable to find file
        else {
            $files[] = '';
        }
    }
    
    // At least one format is found for this
    // language => write out table row
    if ($formatnum > 0) {

        // Additional link for special French version of the manual
        if ($langcode == "fr") {
            $language .= '<br /><a href="http://dev.nexen.net/docs/php/chargement.html">[Special French]</a>';
        }
        
        // Highlight manual in preferred language
        if ($preflang) {
            $bgcolor = "#ffffcc";
        } else {
            $bgcolor = "#eeeeee";
        }

        echo "<tr>\n<td bgcolor=\"#dddddd\"><b>$language</b></td>\n";
        
        // Print out a table cell for all formats
        foreach ($files as $fileinfo) {
            
            echo "<td align=\"center\" bgcolor=\"$bgcolor\">";
            
            // Missing format
            if ($fileinfo == '') {
                echo "&nbsp;";
            }
            
            // Format found, write out link
            else {

                // Start link tag
                echo "<a href=\"$fileinfo[0]\"";

                // Only print out tooltip, if explicit information is not printed
                if (!$sizes && !$preflang) {
                    echo " title=\" Size: $fileinfo[1]Kb\n Date: $fileinfo[2]\"";
                }

                // End link tag
                echo ">$fileinfo[3]</a>";

                // Sizes required to be printed out (URL parameter or preferred language)
                if ($sizes || $preflang) {
                    echo "<br /><small>Size: $fileinfo[1]Kb<br />Date: $fileinfo[2]</small>";
                }
            }

            // Quite bad looking code tweak to add a link to the extended CHM (en only!)
            if (strpos($fileinfo[0], "_en.chm/from")) {
                echo '<br /><a href="http://weblabor.hu/php-doc-chm">extended chm</a>';
            }
       
            // End table cell
            echo "</td>\n";
        }
        
        // End table row
        echo "</tr>\n";
    }
}
?>
</table>

<hr />

<h1>Documentation howto</h1>

<p>
The PHP Documentation Team has a documentation howto, including coverage
on how to set up a working environment on Unix/Linux/Windows, how to build
HTML formatted docs from the XML sources, what conventions to follow when
writing documentation, etc. If you are interested in the process, or would
like to start/join a translation, you can <a href="/get/dochowto">download
the howto</a>. Note, that <a href="/manual/howto">it is also readable
online</a>.
</p>

<?php commonFooter(); ?>
