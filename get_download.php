<?php

require_once 'prepend.inc';

header("Cache-Control: private");
header("Pragma: no-cache");


// If there is no file, then drop out an invalid file error message

if (!isset($df) || !file_exists('distributions/'.$df)) {
	exit('Invalid file requested for download!');
}


commonHeader('Get Download');
$server = $SERVER_NAME;
?>

<h1>Latest version of PHP</h1>

<p>
You have chosen to download the following file:
</p>

<p align="center">
<table border="0" cellpadding="10" cellspacing="1" width="500"
<tr bgcolor="#cccccc"><td align="center">
<?php 
	echo '<b>' . $df . '</b><br>';

    if ($tmp = strrchr($df, '/')) {
        $local_file = substr($tmp, 1, strlen($tmp));
    } else {
        $local_file = 'distributions/' . $df;
    }

    $size = @filesize($local_file);
    if ($size) {
		echo '<small>' . number_format($size, 0, '.', ',') . ' bytes</small><br>'; 
    }
?>
</td></tr></table>
</p>

<p>
Please choose the mirror closest to you from which to download the file.  
The current mirror is highlighted in yellow, but you may have better luck
with a different mirror, especially if the current mirror is busy.
</p>


<p align="center">
<table border="0" cellpadding="3" cellspacing="1" width="500">
<?php
	$no_download = array('http://news.php.net/', 'http://bugs.php.net/');
	
	$mprevious = 'aa';
	foreach ($MIRRORS as $murl=>$mdata) {

		if ($murl=='0') {
			continue;
		}

		if(in_array($murl, $no_download)) {
			continue;
		}

		if ($mprevious != $mdata[0]) {
			echo '<tr><td colspan="3"></td></tr>';
			echo '<tr bgcolor="cccccc"><td width="40" align="center">';
			print_image('flags/' . strtolower($mdata[0]) . '.png', $COUNTRIES[$mdata[0]], false, 'CLASS="flag"' );
			echo '<br></td>';
			echo '<td colspan="2"><b>' . $COUNTRIES[$mdata[0]] . '</b><br></td>';
			echo '</tr>';
		}

		echo '<tr bgcolor="' . ($MYSITE==$murl ? '#ffffcc' : '#e0e0e0') . '">';

		echo '<td bgcolor="#ffffff" align="right">';
		print_image( ($MYSITE==$murl ? 'caret-r.gif' : 'caret-rg.gif') );
		echo '<br></td>';

		echo '<td><small>';
		$ps = strpos($murl, '//') + 2;
		print_link('/do_download.php?mr='.urlencode($murl) . '&df=' . urlencode($df), substr($murl, $ps, -1) );
		echo '</small><br></td>';

		echo '<td><small>';
		echo $mdata[1];
		echo '</small><br></td>';

		echo '</tr>';

		$mprevious = $mdata[0];

	}

?>
</table>
</p>


<?php commonFooter(); ?>
