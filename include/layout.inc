<?php

/* $Id$ */

// Print an image for a sized spacer
function spacer($width = 1, $height = 1, $return = false, $align = false, $extras = false)
{
    $function = ($return ? "sprintf" : "printf");
    return $function('<img src="/images/spacer.gif" width="%d" height="%d" border="0" alt="" %s%s />',
        $width,
        $height,
        ($align ? "align=\"$align\" " : ""),
        ($extras ? $extras : "")
    );
}

# resize_image()
# tag the output of make_image() and resize it manually
# (considering possible HTML/XHTML image tag endings)
#

function resize_image($img, $width=1, $height=1) {
	$str = preg_replace('!width=\"([0-9]+?)\"!i', '', $img );
	$str = preg_replace('!height=\"([0-9]+?)\"!i', '', $str );
	return preg_replace('!/?>$!', sprintf(' height="%s" width="%s" />', $height, $width), $str);
}

# make_image()
# return an IMG tag for a given file (relative to the images dir)
#

function make_image($file, $alt=false, $align=false, $extras=false, $dir=false, $border=0) {
	global $HTTP_SERVER_VARS;
	if (!$dir) {
		$dir = '/images';
	}
	if ($size = @getimagesize($HTTP_SERVER_VARS['DOCUMENT_ROOT'].$dir.'/'.$file)) {
		$image = sprintf('<img src="%s/%s" border="%d" %s alt="%s" %s%s />',
			$dir,
			$file,
			$border,
			$size[3],
			($alt    ? $alt : ''),
			($align  ? ' align="'.$align.'"'  : ''),
			($extras ? ' '.$extras            : '')
		);
	} else {
		$image = sprintf('<img src="%s/%s" border="%d" alt="%s" %s%s />',
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
		$dir = '/images';
	}
	$return = make_image($file, $alt, $align, $extras, $dir, $border);
	if ($return != "<img>") {
		$return = '<input type="image"'.substr($return,4);
	} else {
		$return = '<input type="submit" />';
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
		return '<hr noshade="noshade" size="1" />';
	}
	return sprintf('<hr noshade="noshade" size="1" color="%s" />', $color );
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

function download_link($file, $title, $showsize = true, $mirror = '') {

	$download_link = "get/$file/from/a/mirror";
	if ($mirror != '') {
		$download_link = $mirror . $download_link;
	} else {
		$download_link = "/" . $download_link;
	}

    print_link($download_link, $title);

	if ($showsize) {

		if ($tmp = strrchr($file, "/")) {
			$local_file = substr($tmp, 1, strlen($tmp));
		} else {
			$local_file = "distributions/$file";
		}

		$size = @filesize($local_file);

		/*  Print out size in bytes (if size is less the 1Kb, or else in Kb)  */

		if ($size) {
			echo ' [';
			if ($size < 1024) { 
				echo number_format($size, 0, '.', ',') . 'b'; 
			} else { 
				echo number_format($size/1024, 0, '.', ',') . 'Kb'; 
			}
			echo ']';
		}
	}

}



$enclosed = 0;

# commonheader()
#
#

function commonHeader($title="",$dont_enclose=0,$headers_gone=0) {
	global $MYSITE, $base, $enclosed, $EXPL_LANG, $SIDEBAR_DATA;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 <title>PHP<?php if ($title) echo ": $title";?></title>
 <link rel="stylesheet" href="/style.css" />
 <link rel="shortcut icon" href="/favicon.ico" />
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0"
 bgcolor="#ffffff" text="#000000" link="#000099" alink="#0000ff"
 vlink="#000099">

<table border="0" cellspacing="0" cellpadding="0" height="48" width="100%">
 <tr bgcolor="#9999cc">
  <td align="center" rowspan="2" width="126"><a href="/"><?php
	print_image('php.gif', 'PHP', false, 'hspace="3"'); ?></a></td>
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
	print_link('/mailing-lists.php','mailing lists',false,'class="small"');
	echo delim();
	print_link('http://bugs.php.net/','reporting bugs',false,'class="small"');
	echo delim();
	print_link('/sites.php','php.net sites',false,'class="small"');
	echo delim();
	print_link('/links.php','links',false,'class="small"');
      ?>&nbsp;
  </td>
 </tr>
 <tr bgcolor="#333366"><td colspan="2"><?php spacer(); ?></td></tr>
 <tr bgcolor="#666699">
   <td align="right" valign="top" colspan="2"><font color="#ffffff">
    <form method="post" action="/search.php" class="thin">
<?php
    if (isset($EXPL_LANG)) {
        echo '<input type="hidden" name="lang" value="'.  $EXPL_LANG . '" />';
      }

    if (isset($base) && $base != $MYSITE) {
	$base = stripslashes($base);
	echo '<input type="hidden" name="base" value="' . $base . '" />';
    }
?>
<small><span title="Keyboard shortcut: Alt+S (Win), Ctrl+S (Apple)"><u>s</u>earch for</span></small>
<input class="small" type="text" name="pattern" value="" size="30" accesskey="s" />
<small>in the</small>
<select name="show" class="small">
<option value="quickref" selected="selected">function list</option>
<option value="wholesite">whole site</option>
<option value="manual">online documentation [en]</option>
<option value="bugdb">bug database</option>
<option value="maillist">general mailing list</option>
<option value="devlist">developer mailing list</option>
<option value="phpdoc">documentation mailing list </option>
</select>
<?php echo make_submit('small_submit_white.gif', 'search', 'bottom'); ?>&nbsp;
</form>
</font>
   </td>
 </tr>
 <tr bgcolor="#333366"><td colspan="3"><?php spacer(); ?></td></tr> 
</table>

<?php
  if (!$dont_enclose):
    $enclosed = 1;
?>

<table border="0" cellpadding="0" cellspacing="0">
 <tr valign="top">
<?php if (isset($SIDEBAR_DATA)):?>
  <td width="200" bgcolor="#f0f0f0">
   <table width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr valign="top"><td class="sidebar"><?php echo $SIDEBAR_DATA?></td></tr>
   </table>
  </td>
  <td bgcolor="#cccccc" background="/images/checkerboard.gif" width="1"><?php spacer(); ?></td>
<?php endif; ?>
  <td>
   <table cellpadding="10" cellspacing="0" width="100%">
    <tr><td valign="top">
<?php
  endif;
/* don't show this yet ... ?>
 <div class="mirror">
 You are using <?php echo $MYSITE; ?>. However, foo.php.net is closer. We would appreciate if you could use that mirror.
 </div>

<?php */ }


# commonfooter()
#
#

function commonFooter() {
	global $SCRIPT_NAME,$MYSITE,$LAST_UPDATED,$PHP_SELF,$enclosed, $RSIDEBAR_DATA;
	if ($enclosed) {
		echo "</td></tr></table></td>";
		if(isset($RSIDEBAR_DATA)) {?>
<td bgcolor="#cccccc" background="/images/checkerboard.gif" width="1"><?php spacer(); ?></td>
<td width="175" bgcolor="#f0f0f0">
 <table width="100%" cellpadding="4" cellspacing="0">
  <tr valign="top"><td class="sidebar"><?php echo $RSIDEBAR_DATA?></td></tr>
 </table>
<?php spacer(175); ?>
</td>
<?php		}
		echo "</tr></table>\n";
	}
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
 <tr bgcolor="#333366"><td><?php spacer(); ?></td></tr>
 <tr bgcolor="#9999cc">
  <td align="right" valign="bottom">
<?php
	print_link('/source.php?url='.$SCRIPT_NAME, 'show source', false, 'class="small"');
	echo delim();
	print_link('/credits.php', 'credits', false, 'class="small"');
	echo delim();
	if (have_stats()) {
		print_link('/stats/', 'stats', false, 'class="small"');
		echo delim();
	}
	print_link('/mirrors.php', 'mirror sites', false, 'class="small"');
        echo "&nbsp;";
?>
  </td>
 </tr>
 <tr bgcolor="#333366"><td><?php spacer(); ?></td></tr>
</table>

<table border="0" cellspacing="0" cellpadding="6" width="100%">
 <tr valign="top" bgcolor="#cccccc">
  <td><small><?php echo make_link('/copyright.php', 'Copyright &copy; 2001-2003 The PHP Group'); ?><br />All rights reserved.</small></td>
  <td align="right"><small>
   <a href="/mirror.php">This mirror</a> generously provided by:
   <a href="<?php echo mirror_provider_url();?>"><?php echo mirror_provider();?></a><br />
   Last updated: <url-minder-ignore><?php echo strftime("%c %Z", $LAST_UPDATED); ?></url-minder-ignore>
   </small>
  </td>
 </tr>
</table>
<!--/UdmComment-->
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

    /* preserve linebreaks */
    	$text = str_replace("\n", "<br>", $text);

    /* this will only break long lines */
    if (function_exists("wordwrap")) {
        $text = wordwrap($text);
    }
    
    // Preserve spacing of user notes
    $text = str_replace("  ", " &nbsp;", $text);

    $text = "<code class=\"note\">".$text."</code>";
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
  echo "<b>", stripslashes(htmlentities($event['sdesc'])), "</b>";
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
 <tr bgcolor="#eeeeee"><td><?php echo preg_replace("/\r?\n\r?\n/","<br /><br />",trim($event['ldesc'])); if ($event['url']) {?><br /><br /><b>URL:</b> <?php echo '<a href="',htmlentities($event['url']),'">',htmlentities($event['url']),'</a>'; }?></td></tr>
</table>
<?php
}

function calc_distance($from,$to) {
  $lat1 = pi()/180 * $from['lat'];
  $lat2 = pi()/180 * $to['lat'];
  $lon1 = pi()/180 * $from['lon'];
  $lon2 = pi()/180 * $to['lon'];

  $dlat = $lat2 - $lat1;
  $dlon = $lon2 - $lon1;

  $t = pow(sin($dlat/2), 2) + cos($lat1)*cos($lat2)*pow(sin($dlon/2),2);
  return atan2(sqrt($t),sqrt(1-$t));
}

?>
