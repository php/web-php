<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'download-docs.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA='
<h3>Documentation online</h3>
<p>
 You can read the
 <a href="/docs.php">documentation online</a>
 in various languages, even in printer
 friendly formats.
</p>

<h3>Tip for Linux and BSD users</h3>
<p>
 A free CHM viewer is available for Linux, *BSD and Solaris,
 which is capable of reading the CHMs available here, except
 the extended CHMs. It is called
 <a href="http://xchm.sourceforge.net/">xCHM</a>. If you
 use Gnome, you might also be interested in another fine
 project named <a href="http://gnochm.sourceforge.net/">GnoCHM</a>.
</p>

<h3>CHM reader for Mac OS X</h3>
<p>
 There is also a free CHM viewer available for Mac
 OS X, named <a href="http://chmox.sourceforge.net/">Chmox</a>.
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

site_header("Download documentation");

// Format to look for
$formats = array(
    "Single HTML"        => "html.gz",
    "Many HTML files"    => "tar.gz",
    "PDF"                => "pdf.bz2",
    "PalmPilot DOC"      => "doc.pdb",
    "PalmPilot iSilo"    => "isilo.pdb",
    "Windows HTML Help"  => "chm",
    "Extended HTML Help" => "chm.zip"
);
?>

<h1>Download documentation</h1>

<p>
 The PHP manual is available in a selection of languages and
 formats. Note that the English version should be considered
 the most accurate, since translations are based on that version.
 Most of the translations are not complete, and contain English
 parts. Pick a language and format from the table below to start
 downloading.
</p>

<p>
 Note that the packaged HTML version of the manual
 (tar.gz) doesn't contain any directories,
 so all of the files will be dumped into your current working
 directory when you expand the archive unless the tool you
 use does otherwise.
</p>

<p>
 The English version of the manual is <a
 href="http://www.osoft.com/store/productdetails.php?pid=14&cid=1">also
 available</a> for the ThoutReader.
</p>

<?php
$files = array(); $found_formats = array();

// Go through all possible manual languages
foreach ($LANGUAGES as $langcode => $language) {

    // Go through all possible manual formats
    foreach ($formats as $formatname => $extension) {
    
        // Skip chm.zip if we are not dealing with the English manual
        if ($extension == 'chm.zip' && $langcode != 'en') {
            continue;
        }

        // Actual filename of the file
        $actual_file = $_SERVER['DOCUMENT_ROOT'] . 
                       "/distributions/manual/php_manual_" .
                       ($extension == 'chm.zip' ? $extension : "$langcode.$extension");
        
        // File named after the language and format exists
        if (file_exists($actual_file)) {
            
            // Mirror selection download URL
            $link_to = '/get/php_manual_' .
                ($extension == 'chm.zip' ? $extension : "$langcode.$extension") .
                '/from/a/mirror';

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
        if ($formatname === 'Extended HTML Help') {
            echo "  <th valign=\"bottom\"><a href=\"/docs-echm.php\">$formatname</a></th>\n";
        } else {
            echo "  <th valign=\"bottom\">$formatname</th>\n";
        }
    }

    echo " </tr>\n";

    foreach ($files as $langcode => $lang_files) {
    
        // See if current language is the preferred one
        if ($langcode == $LANG) { $preflang = TRUE; }
        else { $preflang = FALSE; }
        
        // Additional link for special French version of the manual
        $language = $LANGUAGES[$langcode];
        if ($langcode == "fr") {
            $language .= '<br /><a href="http://www.nexen.net/docs/php/index.php">[Special French]</a>';
        }
        
        // Highlight manual in preferred language
        if ($preflang) {
            $cellclass = ' class="highlight"';
        } else {
            $cellclass = "";
        }

        echo "<tr>\n<th class=\"subl\">$language</td>\n";

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

<?php site_footer(); ?>
