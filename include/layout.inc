<?php
/* $Id$ */

# spacer()
# print a IMG tag for a sized spacer GIF
#

function spacer($width=1, $height=1, $align=false, $extras=false) {
	printf('<img src="/gifs/spacer.gif" width="%d" height="%d" border="0" alt="" %s%s>',
		$width,
		$height,
		($align ? 'align="'.$align.'" ' : ''),
		($extras ? $extras : '')
	);
}

# resize_image()
# tag the output of make_image() and resize it manually
#

function resize_image($img, $width=1, $height=1) {
	$str = preg_replace('/width=\"([0-9]+?)\"/i', '', $img );
	$str = preg_replace('/height=\"([0-9]+?)\"/i', '', $str );
	$str = substr($str,0,-1) . sprintf(' height="%s" width="%s">', $height, $width );
	return $str;
}

# make_image()
# return an IMG tag for a given file (relative to the images dir)
#

function make_image($file, $alt=false, $align=false, $extras=false, $dir=false, $border=0) {
	global $HTTP_SERVER_VARS;
	if (!$dir) {
		$dir = '/gifs';
	}
	if ($size = @getimagesize($HTTP_SERVER_VARS['DOCUMENT_ROOT'].$dir.'/'.$file)) {
		$image = sprintf('<img src="%s/%s" border="%d" %s ALT="%s" %s%s>',
			$dir,
			$file,
			$border,
			$size[3],
			($alt    ? $alt : ''),
			($align  ? ' align="'.$align.'"'  : ''),
			($extras ? ' '.$extras            : '')
		);
	} else {
		$image = sprintf('<img src="%s/%s" border="%d" ALT="%s" %s%s>',
			$dir,
			$file,
			$border,
			($alt    ? $alt : ''),
			($align  ? ' ALIGN="'.$align.'"'  : ''),
			($extras ? ' '.$extras            : '')
		);
	}
	return $image;
}

# print_image()
# print an IMG tag for a given file
#

function print_image($file, $alt=false, $align=false, $extras=false, $dir=false, $border=0) {
	print make_image($file, $alt, $align, $extras, $dir);
}

# make_submit()
#  - make a submit button image
#
function make_submit($file, $alt=false, $align=false, $extras=false, $dir=false, $border=0) {
	if (!$dir) {
		$dir = '/gifs';
	}
	$return = make_image($file, $alt, $align, $extras, $dir, $border);
	if ($return != "<img>") {
		$return = '<input type="image"'.substr($return,4);
	} else {
		$return = '<input type="submit">';
	}
	return $return;
}

# delim()
# print a pipe delimiter
#

function delim($color=false) {
	if (!$color) {
		return ' | ';
	}
	return sprintf('<font color="%s"> | </font>', $color );
}

# hdelim()
# print a horizontal delimiter (just a wide line);
#

function hdelim($color="#000000") {
	if (!$color) {
		return '<hr noshade size="1">';
	}
	return sprintf('<hr noshade size="1" color="%s">', $color );
}

# make_link()
# return a hyperlink to something, within the site
#

function make_link ($url, $linktext=false, $target=false, $extras=false) {
	return sprintf("<a href=\"%s\"%s%s>%s</a>",
		$url,
		($target ? ' target="'.$target.'"' : ''),
		($extras ? ' '.$extras : ''),
		($linktext ? $linktext : $url)
	);
}

# print_link()
# echo a hyperlink to something, within the site
#

function print_link($url, $linktext=false, $target=false, $extras=false) {
	echo make_link($url, $linktext, $target, $extras);
}

# make_popup_link()
# return a hyperlink to something, within the site, that pops up a new window
#

function make_popup_link ($url, $linktext=false, $target=false, $windowprops="", $extras=false) {
	return sprintf("<a href=\"%s\" target=\"%s\" onclick=\"window.open('%s','%s','%s');return false;\"%s>%s</a>",
		htmlspecialchars($url),
		($target ? $target : "_new"),
		htmlspecialchars($url),
		($target ? $target : "_new"),
                $windowprops,
		($extras ? ' '.$extras : ''),
		($linktext ? $linktext : $url)
	);
}

# print_popup_link()
# echo a hyperlink to something, within the site, that pops up a new window
#

function print_popup_link($url, $linktext=false, $windowprops="", $target=false, $extras=false) {
	echo make_popup_link($url, $linktext, $windowprops, $target, $extras);
}

# download_link()
# print a link for a downloadable file (including filesize)
#

function download_link($file, $title) {
	global $filesizes;

	if ($tmp = strrchr($file, "/")) {
		$local_file = substr($tmp, 1, strlen($tmp));
	} else {
		$local_file = "distributions/$file";
	}

	$size = @filesize($local_file)/1024;
	//echo("<!-- file=$file localfile=$local_file size-$size -->\n");

  print_link("/do_download.php?download_file=$file", $title);

	if (!$size && isset($filesizes[$local_file])) { $size = $filesizes[$local_file]; }
	if ($size) { echo " [" . number_format($size, 0, ".", ",") . "Kb]"; }
}

$enclosed = 0;

# commonheader()
#
#

function commonHeader($title="",$dont_enclose=0,$headers_gone=0) {
	global $MYSITE, $enclosed;
	global $SIDEBAR_DATA, $prevsearch;

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
 <title>PHP<?php if ($title) echo ": $title";?></title>
 <link rel="stylesheet" href="/style.css">
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0"
 bgcolor="#ffffff" text="#000000" link="#000099" alink="#0000ff"
 vlink="#000099">
<table border="0" cellspacing="0" cellpadding="0" height="48" width="100%">
 <tr bgcolor="#9999cc">
  <td align="middle" rowspan="2" width="120"><a href="/"><?php print_image('php_logo.gif', 'PHP'); ?></a></td>
  <td>&nbsp;</td>
 </tr>
 <tr bgcolor="#9999cc">
  <td align="right" valign="bottom">
<?php
	print_link('/downloads.php','downloads',false,'class="small"');
	echo delim();
	print_link('/docs.php', 'documentation', false, 'class="small"');
	echo delim();
	print_link('/FAQ.php', 'faq', false, 'class="small"');
	echo delim();
	print_link('/support.php','getting help',false,'class="small"');
	echo delim();
	print_link('http://bugs.php.net/','reporting bugs',false,'class="small"');
	echo delim();
	print_link('/links.php','links',false,'class="small"');
      ?>&nbsp;
  </td>
 </tr>
 <tr bgcolor="#333366"><td colspan="2"><?php spacer(1,1);?></td></tr>
 <tr bgcolor="#666699">
  <form method="post" action="/search.php">
   <td align="right" valign="top" colspan="2"><font color="#ffffff">
<small>search for</small>
<input class="small" type="text" name="pattern" value="<?php echo htmlspecialchars(get_magic_quotes_gpc()?stripslashes($prevsearch):$prevsearch) ?>" size="30">
<small>in the</small>
<select name="show" class="small">
<option value="quickref" selected>function list
<option value="nosource">whole site
<option value="manual">online documentation
<option value="bugdb">bug database
<option value="maillist">general mailing list
<option value="devlist">developer mailing list
<option value="phpdoc">documentation mailing list 
</select>
<?php echo make_submit('small_submit_white.gif', 'search', 'bottom'); ?>&nbsp;
</font>
   </td>
  </form>
 </tr>
 <tr bgcolor="#333366"><td colspan="2"><?php spacer(1,1);?></td></tr>
</table>

<?php
  if (!$dont_enclose):
    $enclosed = 1;
?>

<table cellpadding="0" cellspacing="0">
 <tr valign="top">
<?php if (isset($SIDEBAR_DATA)):?>
  <td width="200" bgcolor="#f0f0f0">
   <table width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr valign="top"><td class="sidebar"><?php echo $SIDEBAR_DATA?></td></tr>
   </table>
  </td>
  <td bgcolor="#cccccc" background="/gifs/checkerboard.gif"><?php spacer(1,1);?></td>
<?php endif; ?>
  <td>
   <table cellpadding="10" cellspacing="0" width="620">
    <tr><td valign="top">
<?php
  endif;
}


# commonfooter()
#
#

function commonFooter() {
	global $SCRIPT_NAME,$MYSITE,$LAST_UPDATED,$PHP_SELF,$enclosed, $RSIDEBAR_DATA;
	if ($enclosed) {
		spacer(620);
		echo "</td></tr></table></td>";
		if(isset($RSIDEBAR_DATA)) {?>
<td bgcolor="#cccccc" background="/gifs/checkerboard.gif"><?php spacer(1,1);?></td>
<td width=175 bgcolor="#f0f0f0">
 <table width="100%" cellpadding="4" cellspacing="0">
  <tr valign="top"><td class="sidebar"><?php echo $RSIDEBAR_DATA?></td></tr>
 </table>
</td>
<?		}
		echo "</tr></table>\n";
	}
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
 <tr bgcolor="#333366"><td><?php spacer(1,1);?></td></tr>
 <tr bgcolor="#9999cc">
  <td align="right" valign="bottom">
   <form method="get" action="/mirrors.php" onsubmit="return gotomirror(this);" style="margin-bottom:0;">
   <script language="javascript">
   <!--
   function gotomirror(form) {
     mirror = form.country.options[form.country.selectedIndex].value;
     if (mirror != 'http://' + window.location.hostname + '/') {
                 window.location.href = mirror +
                 window.location.pathname.substring(1) +
                 window.location.hash +
                 window.location.search;
     }
     return false;
   }
   //-->
   </script>
   <input type="hidden" name="FROM" value="<?php echo htmlspecialchars($PHP_SELF)?>">
<?php
	print_link('/source.php?url='.$SCRIPT_NAME, 'show source', false, 'class="small"');
	echo delim();
	print_link('/credits.php', 'credits', false, 'class="small"');
	echo delim();
	if (have_stats()) {
		print_link('/stats/', 'stats', false, 'class="small"');
		echo delim();
	}
	print_link('/mirrors.php', 'mirror sites:', false, 'class="small"');
	echo " <select class=\"small\" name=\"country\" onchange=\"gotomirror(this.form)\">\n";
	show_mirror_options($MYSITE);
	echo "</select> ";
	echo make_submit('small_submit.gif', 'go', 'bottom' );
      ?>&nbsp;
   </form>
  </td>
 </tr>
 <tr bgcolor="#333366"><td><?php spacer(1,1); ?></td></tr>
</table>

<table border="0" cellspacing="0" cellpadding="6" width="100%">
 <tr valign="top" bgcolor="#cccccc">
  <td><small><?php echo make_link('/copyright.php', 'Copyright &copy; 2001, 2002 The PHP Group'); ?><br />All rights reserved.</small></td>
  <td align="right"><small>
   This mirror generously provided by:
   <a href="<?php echo mirror_provider_url();?>"><?php echo mirror_provider();?></a><br />
   Last updated: <url-minder-ignore><?php echo strftime("%c %Z", $LAST_UPDATED); ?></url-minder-ignore>
   </small>
  </td>
 </tr>
</table>
</body>
</html>
<?php
}

function sect_to_file($string) {
	$string = strtolower($string);
	$string = str_replace(' ','-',$string);
	$string = str_replace('_','-',$string);
	$func = "function.$string.php";
	$chap = "ref.$string.php";
	$feat = "features.$string.php";
	$struct = "control-structures.$string.php";
	if(@is_file($func)) return $func;
	else if(@is_file($chap)) return $chap;
	else if(@is_file($feat)) return $feat;
	else if(@is_file($struct)) return $struct;
	else return "$string.php";
}

function clean($var) {
  return htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($var) : $var);
}

function clean_note($text) {
    $text = htmlspecialchars(trim($text));

    /* turn urls into links */
    $text = preg_replace("/((mailto|http|ftp|nntp|news):.+?)(&gt;|\\s|\\)|\"|\\.\\s|$)/","<a href=\"\\1\">\\1</a>\\3",$text);

    /* this 'fixing' code will go away eventually. */
    $fixes = array('<br>','<p>','</p>');
    reset($fixes);
    while (list(,$f)=each($fixes)) {
        $text=str_replace(htmlspecialchars($f), $f, $text);
        $text=str_replace(htmlspecialchars(strtoupper($f)), $f, $text);
    }

    /* this will only break long lines */
    if (function_exists("wordwrap")) {
        $text = wordwrap($text);
    }

    $text = "<pre class=\"note\">".$text."</pre>";
    return $text;
}

function display_errors($errors)
{ 
	echo '<div class="errors">';
	if (count($errors) > 1) {
		echo "You need to do the following before your submission will be accepted:<ul>";
		foreach ($errors as $error) {
			echo "<li>$error</li>\n";
		}
		echo "</ul>";
	}
	else {
		echo $errors[0];
	}
	echo '</div>';
}

function display_event($event,$include_date=1)
{
  for ($i = 1; $i <= 7; $i++) {
    $days[$i] = strftime('%A',mktime(12,0,0,4,$i,2001));
  }

  $re = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',-1=>'Last',-2=>'2nd Last',-3=>'3rd Last');

  $sday = $event['start'] ? strtotime($event['start'])
          : mktime(0,0,1,$event['smonth'],$event['sday'],$event['syear']);
  $eday = $event['end'] ? strtotime($event['end'])
          : mktime(0,0,1,$event['emonth'],$event['eday'],$event['eyear']);
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%">
 <tr bgcolor="#dddddd"><td>
<?php
  if ($include_date && ($event['start'] || $event['smonth'])) echo "<b>", date("F j, Y", $sday), "</b>\n";
  if ($event['url']) echo '<a href="', htmlentities($event['url']),'">';
  echo "<b>", htmlentities($event['sdesc']), "</b>";
  if ($event['url']) echo "</a>";
  switch ($event['type']) {
  case 2:
  case 'multi':
    echo " (", date("Y-m-d",$sday), " to ", date("Y-m-d",$eday), ")";
    break;
  case 3:
  case 'recur':
    echo " (Every ", $re[$event['recur']], " ", $days[$event['recur_day']], " of the month)";
    break;
  }
?>
 </td></tr>
 <tr bgcolor="#eeeeee"><td><?php echo $event['ldesc']?></td></tr>
</table>
<?php
}

?>
