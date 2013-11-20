<?php
// $Id$
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/mirrortable.inc';

// Try to make this page non-cached
header_nocache();

// No file to download
if (!isset($df)) {
    exit("No file requested for download");
}

// Could be a normal download or a manual download file
$possible_files = array($df, "manual/$df"); 

// Find out what is the exact file requested 
$file = FALSE;
foreach ($possible_files as $name) {
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $name)) {
        $file = $name;
        break;
    }
}
    
// No downloadable file found
if ($file === FALSE) {
    site_header("Download not found");
    
        $info = "<p>
 The file you requested (<strong> " . htmlspecialchars($df, ENT_QUOTES, "UTF-8") . " </strong>) is not found on
 this server (<strong>{$MYSITE}</strong>). If this file is a
 recent addition to our downloads, then it is possible that this
 particular server is not yet updated to host that file for download.
 Please come back to this server later, or start the download from
 another mirror site.
</p>";
    
    echo <<<EOT
<h1>Download not found</h1>
{$info}
EOT;
    site_footer();
    exit;
}

// Set local file name
$local_file = $_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $file;

// Print out common header
site_header('Get Download');
?>

<h1>Choose mirror site for download</h1>

<p>
 You have chosen to download the following file:
</p>

<div class="center">
<table border="0" cellpadding="10" cellspacing="1" width="500">
<tr bgcolor="#cccccc"><td align="center">
<?php 
echo '<strong>' . $df . '</strong><br />';

// Try to get filesize to display
$size = @filesize($local_file);
if ($size) {
    echo '<small>' . number_format($size, 0, '.', ',') . ' bytes</small><br />'; 
}
?>
</td></tr></table>
</div>

<p>
 Please choose the mirror closest to you from which to download the file.  
 The current mirror is highlighted in yellow, mirror sites detected to be
 out of date or dysfunctional are not listed for your convenience.
</p>
 
<?php
mirror_list($df);
site_footer();
