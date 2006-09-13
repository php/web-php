<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'download-docs.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA='
<h3>Documentation online</h3>
<p>
 You can read the
 <a href="/docs.php">documentation online</a>
 in various languages. The Documentation HOWTO,
 PEAR, Smarty and archive manuals are also available
 from our <a href="/docs.php">documentation page</a>.
</p>

<h3>CHM viewer programs</h3>
<ul class="toc">
 <li>Microsoft Windows has a reader built in.</li>
 <li>
  Use <a href="http://xchm.sourceforge.net/">xCHM</a> or 
  <a href="http://gnochm.sourceforge.net/">GnoCHM</a>
  on Linux, *BSD and Solaris.
 </li>
 <li>
  <a href="http://chmox.sourceforge.net/">Chmox</a> caters
  to Mac OS X users.
 </li>
</ul>

<h3>File sizes and dates</h3>
<p>
 If you are using a capable browser, the file size and
 date will show up when you move the mouse above a link.
 If you cannot view this information, or would like to see all the
 information, you can <a href="/download-docs.php?sizes=1">click
 here to see all the file sizes and dates</a>.
</p>
';

site_header("Download documentation");

// Format to look for
$formats = array(
    "Single HTML"        => "html.gz",
    "Many HTML files"    => "tar.gz",
    "PDF"                => "pdf.bz2",
    "PalmPilot DOC"      => "doc.pdb",
    "PalmPilot iSilo"    => "isilo.pdb",
    "Windows HTML Help"  => "chm",
);
?>

<h1>Download documentation</h1>

<p>
 The PHP manual is available in a selection of languages and
 formats. Pick a language and format from the table below to start
 downloading.
</p>

<h2>Notes to read before you download</h2>

<ul>
 <li>
  The English version should be considered the most accurate, since
  translations are based on that version. Most of the translations
  are not complete, and contain English parts. 
 </li>
 <li>
  The packaged HTML version of the manual (tar.gz) doesn't contain
  any directories, so all of the files will be dumped into your
  current working directory when you expand the archive unless the
  tool you use does otherwise.
 </li>
 <li>
  If you are using Microsoft Internet Explorer under Windows XP SP2 or
  later and you are going to download the documentation in CHM
  format, you should "unblock" the file after downloading it, by
  right-clicking on it and selecting the properties menu item. Then click
  on the 'Unblock' button. Failing to do this may lead to errors
  in the visualization of the file, due to a Microsoft bug.
 </li>
 <li>
  The English version of the manual is <a
  href="/get/php_manual_chm.zip/from/a/mirror">downloadable</a> in an
  <a href="/docs-echm.php">Extended HTML Help format</a>, and is also
  available <a
  href="http://www.osoft.com/store/productdetails.php?pid=14&cid=1">for
  the ThoutReader</a>.
 </li>
</ul>

<?php
$files = array(); $found_formats = array();

// Go through all possible manual languages
foreach ($LANGUAGES as $langcode => $language) {

    // Go through all possible manual formats
    foreach ($formats as $formatname => $extension) {
    
        // Actual filename of the file
        $actual_file = $_SERVER['DOCUMENT_ROOT'] . 
                       "/distributions/manual/php_manual_$langcode.$extension";
        
        // File named after the language and format exists
        if (file_exists($actual_file)) {
            
            // Mirror selection download URL
            $link_to = "/get/php_manual_$langcode.$extension/from/a/mirror";

            // Try to get size and changed date
            $size    = @filesize($actual_file);
            $changed = @filemtime($actual_file);
            
            // Size available, collect information
            if ($size !== FALSE) {
                $files[$langcode][$extension] = array(
                    $link_to,
                    (int) ($size/1024),
                    date("j M Y", $changed),
                    $extension
                );
                if (!in_array($extension, array_keys($found_formats))) {
                    $found_formats[$formatname] = $extension;
                }
            }
        }
    }
}

if (count($found_formats) == 0) {
    echo "<p class=\"tip\">This mirror has no documentation files for download.</p>";
} else {

    echo '<table border="0" cellpadding="3" cellspacing="2" class="standard">' . "\n" .
         "<tr>\n  <th>&nbsp;</th>\n";

    // Print out the name of the formats
    foreach ($formats as $formatname => $extension) {
        if (!in_array($extension, array_values($found_formats))) { continue; }
        echo "  <th valign=\"bottom\">$formatname</th>\n";
    }

    echo " </tr>\n";

    foreach ($files as $langcode => $lang_files) {
    
        // See if current language is the preferred one
        if ($langcode == $LANG) { $preflang = TRUE; }
        else { $preflang = FALSE; }
        
        // Highlight manual in preferred language
        if ($preflang) {
            $cellclass = ' class="highlight"';
        } else {
            $cellclass = "";
        }

        echo "<tr>\n<th class=\"subl\">" . $LANGUAGES[$langcode] . "</td>\n";

        foreach ($formats as $formatname => $extension) {
        
            // Skip if no file found
            if (!in_array($extension, array_values($found_formats))) { continue; }

            echo "<td align=\"center\"$cellclass>";
            
            if (!isset($lang_files[$extension])) {
                echo "&nbsp;";
            } else {
                
                $fileinfo = $lang_files[$extension];
                echo "<a href=\"$fileinfo[0]\"";

                // Only print out tooltip, if explicit information is not printed
                if (!isset($_GET['sizes']) && !$preflang) {
                    echo " title=\" Size: $fileinfo[1]Kb -- Date: $fileinfo[2]\"";
                }

                // End link tag
                echo ">$fileinfo[3]</a>";

                // Sizes required to be printed out (URL parameter or preferred language)
                if (isset($_GET['sizes']) || $preflang) {
                    echo "<br /><small>Size: $fileinfo[1]Kb<br />Date: $fileinfo[2]</small>";
                }
            }

            // End table cell
            echo "</td>\n";

        }
        
        // End table row
        echo "</tr>\n";
    }
    echo "</table>\n";
}
?>

<?php site_footer();
