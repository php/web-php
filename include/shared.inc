<?php // -*- C++ -*-
/* $Id$ */

require_once 'site.inc';

/* Check that browser! */

$HTDIG = false;

# figure out the directory root
if (!$BASE_DIR) {
  $BASE_DIR = ereg_replace("/[^/]+/[^/]+$", "", $INCLUDE_DIR);
}

if($SCRIPT_NAME=="/bugs.php" || $SCRIPT_NAME=="/bugstats.php") {
#	$my_logo="/jpgs/logo-bug.jpg";
	$my_logo="/gifs/logo-bug.gif";
	$my_size="WIDTH=130 HEIGHT=67";
} else {
	$my_logo="/gifs/logo.gif";
	$my_size="WIDTH=130 HEIGHT=67";
}

function spc($width, $height) {
	echo "<img src=\"/gifs/spacer.gif\" width=\"$width\" height=\"$height\" border=\"0\" alt=\"\">";
}

function download_link($file, $title) {
	global $filesizes;
	if ($tmp = strrchr($file, "/")) {
		$local_file = substr($tmp, 1, strlen($tmp));
	} else {
		$file = "distributions/$file";
		$local_file = $file;
	}
	echo("<a href=\"$file\">$title</a>");
	$size = @filesize($local_file)/1024;
	echo("<!-- file=$file localfile=$local_file size-$size-->\n");
	if ($size) {
		printf(" (%dKB)", $size);
	} elseif (isset($filesizes[$local_file])) {
		echo " (".$filesizes[$local_file].")";
	}
}

# make_image()
#  - return a <img> tag for a given file (relative to the images dir)
function make_image($file, $alt=false, $align=false, $extras=false, $dir=false, $border=0) {
  if ($size = @getimagesize("$GLOBALS[BASE_DIR]/gifs/$file")) {
    $image = sprintf('<img src="%s/%s" border="%d" %s %s%s%s>',
                     "/gifs/",
                     $file,
                     $border,
                     $size[3],
                     ($alt    ? ' alt="'.$alt.'"'      : ''),
                     ($align  ? ' align="'.$align.'"'  : ''),
                     ($extras ? ' '.$extras            : '')
             );
  } else {
    $image = sprintf('<img src="%s/%s" border="%d"%s%s%s>',
                     "/gifs/",
                     $file,
                     $border,
                     ($alt    ? ' ALT="'.$alt.'"'      : ''),
                     ($align  ? ' ALIGN="'.$align.'"'  : ''),
                     ($extras ? ' '.$extras            : '')
             );
  }
  return $image;
}

# print_image()
#  - print an <img> tag for a given file in the images dir
function print_image($file, $alt=false, $align=false, $extras=false, $dir="gifs") {
  print make_image($file, $alt, $align, $extras, $dir);
}

# make_submit()
#  - make a submit button image
function make_submit($file,$alt=false,$align=false,$extras=false) {
  $return = make_image($file,$alt,$align,$extras);
  if ($return != "<img>") {
    $return = '<input type="image"'.substr($return,4);
  } else {
    $return = '<input type="submit">';
  }
  return $return;
}

# spacer()
#  - print a blank space GIF
function spacer($width=1, $height=1, $align=false) {
  print make_sized_image($width, $height, $align, 'spacer.gif');
}

function make_sized_image($width=1, $height=1, $align=false, $image='spacer.gif') {
  return sprintf('<img src="%s/%s" border="0" width="%s" height="%s"%s>',
                 "/gifs/",
                 $image,
                 $width,
                 $height,
                 ($align ? ' align="'.$align.'"' : '')
  );
}

function delim($color=false) {
  if (!$color) {
    return '&nbsp;|&nbsp;';
  }
  return sprintf('<font color="%s">&nbsp;|&nbsp;</font>',
                 $color);
}

# make_link()
#  - return a hyperlink to something, within the site

function make_link ($url, $linktext=false, $target=false, $extras=false) {
  $return = sprintf("<a href=\"%s\"%s%s>%s</a>",
                    $url,
                    ($target ? ' target="'.$target.'"' : ''),
                    ($extras ? ' '.$extras : ''),
                    ($linktext ? $linktext : $url)
            );
  return $return;
}

# print_link()
#  - echo a hyperlink to something, within the site

function print_link($url, $linktext=false, $target=false, $extras=false) {
  print make_link($url, $linktext, $target, $extras);
}

$enclosed = 0;

function commonHeader($title="",$dont_enclose=0) {
  global $MYSITE, $MIRRORS, $COUNTRIES, $enclosed;?>
<html>
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
      <small><font color="#ffffff"><b>
        Mirror last updated: 
	<?php echo strftime("%c")?>
      </b>&nbsp;<br>
      </font>
    </td>
  </tr>

  <tr bgcolor="#9999cc">
    <td align="right" valign="bottom">
      <form method="POST" action="/search.php">
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
	echo delim();
	print_link('/search.php','search:',false,'class="small"');
	echo ' <input class="small" type="text" name="what" size=10> ';
	echo make_submit('small_submit.gif', 'search', 'bottom');
      ?>&nbsp;<br>
      </form>
    </td>
  </tr>

  <tr bgcolor="#333366"><td colspan="2"><?php spacer(1,1);?><br></td></tr>
</table>
<?php
  if (!$dont_enclose):
    $enclosed = 1;?>
<table width="700" cellpadding="4" cellspacing="0"><tr><td valign="top">
<?php
  endif;
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

function commonFooter() {
  global $SCRIPT_NAME,$PHP_SELF,$MIRRORS,$MYSITE,$COUNTRIES,$enclosed;
  if ($enclosed):?>
</td></tr></table>
<?php
  endif;
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr bgcolor="#333366"><td><?php spacer(1,1);?><br></td></tr>
  <tr bgcolor="#9999cc">
    <td align="right" valign="bottom">
      <form method="GET" action="/mirrors.php" onsubmit="return gotomirror(this)">
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
	echo "<option value=-1>--\n";
	while (list($url,$mirror) = each($MIRRORS)) {
          if ($mirror[4] == 1) { /* only list full mirrors here */
            echo "<option value=\"$url\">".$COUNTRIES[$mirror[0]]." ($mirror[1])\n";
          }
	}
	echo "</select> ";
	echo make_submit('small_submit.gif', 'search', 'bottom' );
      ?>&nbsp;<br>
      </form>
    </td>
  </tr>
  <tr bgcolor="#333366"><td><?php spacer(1,1); ?><br></td></tr>
</table>

<table border="0" cellspacing="0" cellpadding="6" width="100%">
  <tr valign="bottom" bgcolor="#cccccc">
    <td><small>
      Copyright &copy; 1998,1999,2000,2001 someone.
      All rights reserved.
    </td>
    <td align="right">
      This mirror generously provided by:
      <a href="<?php echo $MIRRORS[$MYSITE][3];?>"><?php echo $MIRRORS[$MYSITE][1];?></a>
      <BR>
    </td>
  </tr>
</table>

<br>

</body>
</html>
<?php
}
?>
