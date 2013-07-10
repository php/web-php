<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'download-docs.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

if (!empty($_GET['active_langs'])) {
    echo serialize($ACTIVE_ONLINE_LANGUAGES);
    exit;
}

$SIDEBAR_DATA='
<h3>Online documentation</h3>
<p>
 You can read the
 <a href="/docs.php">documentation online</a>
 in various languages. The Documentation HOWTO,
 and archive manuals are also available
 from our <a href="/docs.php">documentation page</a>.
</p>

<h3>Other formats</h3>
<p>
 The manual is also available via *nix style man pages. To
 install and use:
</p>
<ul class="toc">
 <li>Install: pear install doc.php.net/pman</li>
 <li>Upgrade: pear upgrade doc.php.net/pman</li>
 <li>Example usage: pman strlen</li>
</ul>

<h3>HTML Help viewers</h3>
<ul class="toc">
 <li>Microsoft Windows has a reader built in.</li>
 <li>
  On Linux, *BSD and Solaris:<br />
  <ul class="simple">
   <li><a href="http://xchm.sourceforge.net/">xCHM</a></li>
   <li><a href="http://gnochm.sourceforge.net/">GnoCHM</a></li>
   <li><a href="http://www.kchmviewer.net/">KchmViewer</a></li>
  </ul>
 </li>
 <li>
  <a href="http://code.google.com/p/ichm/">iChm</a> caters
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

site_header("Download documentation", array("current" => "docs"));

// Format to look for
$formats = array(
    "Single HTML file" => "html.gz",
    "Many HTML files"  => "tar.gz",
#   "Many PDF files"   => "pdf.tar.gz",
#   "PDF"              => "pdf",
#    "HTML Help file"   => "chm", // Bug #64842
#    "HTML Help file (with user notes)" => "chm", // Bug #64842
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
  The CHM builds are offline but will be fixed in the future. We are 
  sorry for the inconvenience.
  <!--
  <p class="warn">
  If you are using Windows XP SP2 or later and you are going to download the
  documentation in CHM format, you <strong>need</strong> to &quot;unblock&quot;
  the file after downloading it by right-clicking on it in Windows Explorer and
  selecting the &quot;Properties&quot; menu item, then clicking on the
  &quot;Unblock&quot; button (on Windows Vista this is within the
  &quot;Security&quot; options).  Failure to unblock the documentation file may
  result in error messages including &quot;Navigation to the webpage was
  canceled&quot; due to Windows security restrictions.
  </p>
  -->
 </li>
</ul>

<?php
$files = array(); $found_formats = array();
$filepath = $filename = '';

// Go through all possible manual languages
foreach ($LANGUAGES as $langcode => $language) {
    if(isset($INACTIVE_ONLINE_LANGUAGES[$langcode]) && $MYSITE !== 'http://docs.php.net/') {
       continue;
    }

    // Go through all possible manual formats
    foreach ($formats as $formatname => $extension) {
    
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/distributions/manual/';
        if ($formatname === 'HTML Help file (with user notes)') {
            $filename = "php_enhanced_$langcode.$extension";
        } else {
            $filename = "php_manual_$langcode.$extension";
        }
        
        $filepath .= $filename;
        
        // File named after the language and format exists
        if (file_exists($filepath)) {
            
            // Mirror selection download URL
            $link_to = "/get/$filename/from/a/mirror";

            // Try to get size and changed date
            $size    = @filesize($filepath);
            $changed = @filemtime($filepath);
            
            // Size available, collect information
            if ($size !== FALSE) {
                $files[$langcode][$formatname] = array(
                    $link_to,
                    (int) ($size/1024),
                    date("j M Y", $changed),
                    $extension
                );
                $found_formats[$formatname] = 1;
            }
        }
    }
}
/* {{{ FIXME: Special handling for the extended html help format since it doesn't follow the "naming rules"
 * (mostly copy&paste from the loop above)
 * Feb 20, 2009: Commenting this out as we currently don't build or work on it

$formats['<a href="/docs-echm.php">Extended HTML Help</a>'] = "zip"; // Add a link to the xchm docs in the table header
$actual_file = $_SERVER['DOCUMENT_ROOT'] . "/distributions/manual/php_manual_chm.zip";
if (file_exists($actual_file)) {
    $link_to = "/get/php_manual_chm.zip/from/a/mirror";
    $size    = @filesize($actual_file);
    $changed = @filemtime($actual_file);
    if ($size !== FALSE) {
        $files["en"]["zip"] = array(
            $link_to,
            (int) ($size/1024),
            date("j M Y", $changed),
            "zip"
        );
        $found_formats["xchm"] = "zip";
    }
}
}}} */

if (count($found_formats) == 0) {
    echo "<p class=\"tip\">This mirror has no documentation files for download.</p>";
} else {

    echo '<table border="0" cellpadding="4" cellspacing="2" class="standard">' . "\n" .
         "<tr>\n  <th>&nbsp;</th>\n";

    // Print out the name of the formats
    foreach ($formats as $formatname => $extension) {
        if (!isset($found_formats[$formatname])) { continue; }
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

        echo "<tr>\n<th class=\"subl\">" . $LANGUAGES[$langcode] . "</th>\n";

        foreach ($formats as $formatname => $extension) {
        
            // Skip if no file found
            if (!isset($found_formats[$formatname])) { continue; }

            echo "<td align=\"center\"$cellclass>";
            if (!isset($lang_files[$formatname])) {
                echo "&nbsp;";
            } else {
                
                $fileinfo = $lang_files[$formatname];
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
