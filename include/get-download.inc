<?php
// $Id$
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/mirrortable.inc';

// Try to make this page non-cached
header_nocache();

// If there is no such file, then drop out an invalid file error message
if (!isset($df) || !file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $df)) {
    exit('Invalid file requested for download!');
}

// Set local file name
$local_file = $_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $df;

// Print out common header
commonHeader('Get Download');
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
 out of date or disfunctional are not listed for your convenience.
</p>
 
<?php
mirror_list($df);
commonFooter();
