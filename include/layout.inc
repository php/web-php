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
		return '&nbsp;|&nbsp;';
	}
	return sprintf('<font color="%s">&nbsp;|&nbsp;</font>', $color );
}



# hdelim()
# print a horizontal delimiter (just a wide line);
#

function hdelim($color="#000000") {
	if (!$color) {
		return '<HR noshade size="1">';
	}
	return sprintf('<HR noshade size="1" color="%s">', $color );
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


# download_link()
# print a link for a downloadable file (including filesize)
#

function download_link($file, $title) {
	global $filesizes;
	if ($tmp = strrchr($file, "/")) {
		$local_file = substr($tmp, 1, strlen($tmp));
	} else {
		$file = "distributions/$file";
		$local_file = $file;
	}
	print_link($file, $title);
	$size = @filesize($local_file)/1024;
	echo("<!-- file=$file localfile=$local_file size-$size-->\n");
	if ($size) {
		printf(" (%dKB)", $size);
	} else if (isset($filesizes[$local_file])) {
		echo " (".$filesizes[$local_file].")";
	}
}





$enclosed = 0;


# commonheader()
#
#

function commonHeader($title="",$dont_enclose=0,$headers_gone=0) {
	global $MYSITE, $MIRRORS, $COUNTRIES, $enclosed;
	global $SIDEBAR_DATA;
	if (!$headers_gone) header("Last-Modified: ".gmdate("D, d M Y H:i:s",getlastmod())." GMT");
?><html>
<head>
 <title>PHP<?php if ($title) echo ": $title";?></title>
 <link rel="stylesheet" href="/style.css">
</head>

<body
	topmargin="0" leftmargin="0"
	marginheight="0" marginwidth="0"
        bgcolor="#ffffff"
        text="#000000"
        link="#000099"
        alink="#0000ff"
        vlink="#000099"
><a name="TOP"></a>
<table border="0" cellspacing="0" cellpadding="0" height="48" width="100%">
  <tr bgcolor="#9999cc">
    <td align="middle" rowspan="2" width="120">
<?php if ($GLOBALS["REQUEST_URI"] != "/") echo '<a href="/">';
      print_image('php_logo.gif', 'PHP');
      if ($GLOBALS["REQUEST_URI"] != "/") echo '</a>';
?>
    </td>
    <td align="right" valign="top">
      <font color="#ffffff"><b>
        <?php echo strftime("%A, %B %d, %Y"); ?>
      </b>&nbsp;<br>
      </font>
    </td>
  </tr>

  <tr bgcolor="#9999cc">
    <td align="right" valign="bottom">
      <?php
	print_link('/downloads.php','downloads',false,'class="small"');
	echo delim();
	print_link('/docs.php', 'documentation', false, 'class="small"');
	echo delim();
	print_link('/support.php','support',false,'class="small"');
	echo delim();
	print_link('/bugs.php','reporting bugs',false,'class="small"');
	echo delim();
	print_link('/links.php','links',false,'class="small"');
      ?>&nbsp;<br>
    </td>
  </tr>

  <tr bgcolor="#333366"><td colspan="2"><?php spacer(1,1);?><br></td></tr>

  <tr bgcolor="#666699">
    <form method="POST" action="/search.php">
      <td align="right" valign="top" colspan="2"><FONT COLOR="#ffffff">
        <small>search for</small>
<INPUT CLASS="small" TYPE="text" NAME="pattern" VALUE="<? echo htmlspecialchars($prevsearch) ?>" SIZE="30">
<small>in the</small>
<SELECT NAME="show" CLASS="small">
<OPTION VALUE="quickref" SELECTED>function list
<OPTION VALUE="nosource">whole site
<OPTION VALUE="manual">online documentation
<OPTION VALUE="maillist">general mailing list
<OPTION VALUE="devlist">developer mailing list
<OPTION VALUE="phpdoc">documentation mailing list 
<OPTION VALUE="source">website source code    
</SELECT>
<?	echo make_submit('small_submit_white.gif', 'search', 'bottom');
      ?>&nbsp;<br>
      </font></td>
    </form>
  </tr>

  <tr bgcolor="#333366"><td colspan="2"><?php spacer(1,1);?><br></td></tr>
</table>

<?php
  if (!$dont_enclose):
    $enclosed = 1;
?>

<table align="left" cellpadding="0" cellspacing="0">
 <tr valign="top">
<?php if (isset($SIDEBAR_DATA)):?>
  <td bgcolor="#f0f0f0">
   <table width="149" align="left" cellpadding="4" cellspacing="0">
    <tr valign="top">
     <td><?php echo $SIDEBAR_DATA?></td>
    </tr>
   </table>
  </td>
  <td bgcolor="#cccccc" background="/gifs/checkerboard.gif"><?php spacer(1,1);?><br></td>
<?php endif; ?>
  <td>
   <table width="625" align="left" cellpadding="10" cellspacing="0">
    <tr>
     <td valign="top">
<?php
  endif;
}




# commonfooter()
#
#

function commonFooter() {
	global $SCRIPT_NAME,$MIRRORS,$MYSITE,$COUNTRIES,$LAST_UPDATED,$enclosed;
	if ($enclosed) {
		echo "</td></tr></table></td></tr></table>\n";
	}
?>

<br clear="all">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr bgcolor="#333366"><td><?php spacer(1,1);?><br></td></tr>
  <tr bgcolor="#9999cc">
    <form method="GET" action="/mirrors.php" onsubmit="return gotomirror(this);">
      <td align="right" valign="bottom">
      <script language="javascript">
      <!--
        function gotomirror(form) {
          url = form.country.options[form.country.selectedIndex].value;
          window.location.href = url;
	  return false;
        }
      //-->
      </script>
      <input type="hidden" name="REDIRECT" value=1>
      <?php
	# TODO: should send current url above, so we can redirect to
	# the same page on the mirror, and do the same in our javascript.
	print_link('/source.php?url='.$SCRIPT_NAME, 'show source', false, 'class="small"');
	echo delim();
	print_link('/credits.php', 'credits', false, 'class="small"');
	echo delim();
	print_link('/mirrors.php', 'mirror sites:', false, 'class="small"');
	echo " <select class=\"small\" name=\"country\" onchange=\"gotomirror(this.form)\">\n";
	echo "<option value=\"-1\">--\n";
	while (list($url,$mirror) = each($MIRRORS)) {
          if ($mirror[4] == 1) { /* only list full mirrors here */
            echo "<option value=\"$url\">".$COUNTRIES[$mirror[0]]." ($mirror[1])\n";
          }
	}
	echo "</select> ";
	echo make_submit('small_submit.gif', 'search', 'bottom' );
      ?>&nbsp;<br>
      </td>
    </form>
  </tr>
  <tr bgcolor="#333366"><td><?php spacer(1,1); ?><br></td></tr>
</table>

<table border="0" cellspacing="0" cellpadding="6" width="100%">
  <tr valign="top" bgcolor="#cccccc">
    <td><small>
      Copyright &copy; 1998-2001 The PHP Group<BR>
      All rights reserved.<BR>
      </small>
    </td>
    <td align="right"><small>
      This mirror generously provided by:
      <a href="<?php echo $MIRRORS[$MYSITE][3];?>"><?php echo $MIRRORS[$MYSITE][1];?></a><BR>
      Last updated: <?php echo strftime("%c %Z", $LAST_UPDATED); ?><BR>
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
	if(is_file($func)) return $func;
	else if(is_file($chap)) return $chap;
	else if(is_file($feat)) return $feat;
	else if(is_file($struct)) return $struct;
	else return "$string.php";
}

function clean_note($text) {
    $text = htmlspecialchars($text);
    $fixes = array('<br>','<p>','</p>');
    reset($fixes);
    while (list(,$f)=each($fixes)) {
        $text=str_replace(htmlspecialchars($f), $f, $text);
        $text=str_replace(htmlspecialchars(strtoupper($f)), $f, $text);
    }
    $text = "<tt>".nl2br($text)."</tt>";
    return $text;
}
