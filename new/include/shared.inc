<?php // -*- C++ -*-

require("site.inc");

// Let HTTP/1.1 proxies know that the generated content depends on
// the User-Agent header.
header("Vary: User-Agent");

$IE4 = false;
$HAVE_LAYERS = $HAVE_IMG_SRC = $HAVE_TD_BG = $HAVE_CSS = false;
$HAVE_FONT_COLOR = false;
$HAVE_JS = 0;
$FONTFACE = "tahoma, arial, helvetica, sans-serif";

/* this browser logic is really ugly :-P */
if (eregi("Mozilla/([0-9]+)", $HTTP_USER_AGENT, &$verdata)) {
    $version = (int)$verdata[1];
    if ($version >= 4) {
	$HAVE_LAYERS = $HAVE_TD_BG = $HAVE_CSS = $HAVE_TD_BG =
	    $HAVE_FONT_COLOR = true;
	$HAVE_JS = 12;
    } elseif ($version >= 3) {
	$HAVE_IMG_SRC = true;
	$HAVE_TD_BG = true;
	$HAVE_JS = 11;
    } elseif ($versjon >= 2) {
	$HAVE_JS = 10;
    }
}

if (eregi("MSIE ([0-9]+)\.", $HTTP_USER_AGENT, &$verdata)) {
    $version = (int)$verdata[1];
    if ($version >= 4) {
	$IE4 = true;
    }
}

$jsfunc['change'] = "default_jsfunc_change";
$jsfunc['LoadImgs'] = "default_jsfunc_loadimgs";
$func['sidebar'] = "default_func_sidebar";

function spc($width, $height) {
    echo "<IMG SRC='/new/gifs/spacer.gif' WIDTH=$width HEIGHT=$height BORDER=0>";
};


function default_jsfunc_change() {
    global $HAVE_LAYERS; ?>
function change(Name,No) {
    if (document.images && (loaded == 1)) {
	document[Name].src = eval("b_" + Name + No + ".src");
    }
    if (No == 1) {
        <? if ($HAVE_LAYERS) { ?> if (layers) {
	    hideLayer('mirrorsKick');
	    hideLayer('searchKick');
	} <? } ?>
	if (Name != 'mirr') {
	    change('mirr',0);
	}
	if (Name != 'sear') {
	    change('sear',0);
	}
	lastbutton = Name;
    }
} <? } /* function default_jsfunc_change() */


function default_jsfunc_loadimgs() { ?>
function LoadImgs () {
    if (document.images) {
	b_down0 = new Image();
	b_down0.src = "/new/gifs/b-downloads-p.gif";
	b_down1 = new Image();
	b_down1.src = "/new/gifs/b-downloads-c.gif";

	b_docs0 = new Image();
	b_docs0.src = "/new/gifs/b-docs-p.gif";
	b_docs1 = new Image();
	b_docs1.src = "/new/gifs/b-docs-c.gif";

	b_mail0 = new Image();
	b_mail0.src = "/new/gifs/b-mailing-p.gif";
	b_mail1 = new Image();
	b_mail1.src = "/new/gifs/b-mailing-c.gif";

	b_dev0 = new Image();
	b_dev0.src = "/new/gifs/b-development-p.gif";
	b_dev1 = new Image();
	b_dev1.src = "/new/gifs/b-development-c.gif";

	b_news0 = new Image();
	b_news0.src = "/new/gifs/b-news-p.gif";
	b_news1 = new Image();
	b_news1.src = "/new/gifs/b-news-c.gif";

	b_link0 = new Image();
	b_link0.src = "/new/gifs/b-links-p.gif";
	b_link1 = new Image();
	b_link1.src = "/new/gifs/b-links-c.gif";

	b_mirr0 = new Image();
	b_mirr0.src = "/new/gifs/b-mirror-p.gif";
	b_mirr1 = new Image();
	b_mirr1.src = "/new/gifs/b-mirror-c.gif";

	b_top0 = new Image();
	b_top0.src = "/new/gifs/b-top-p.gif";
	b_top1 = new Image();
	b_top1.src = "/new/gifs/b-top-c.gif";

	b_sear0 = new Image();
	b_sear0.src = "/new/gifs/b-search-p.gif";
	b_sear1 = new Image();
	b_sear1.src = "/new/gifs/b-search-c.gif";

	b_sour0 = new Image();
	b_sour0.src = "/new/gifs/b-source-p.gif";
	b_sour1 = new Image();
	b_sour1.src = "/new/gifs/b-source-c.gif";

	b_close0 = new Image();
	b_close0.src = "/new/gifs/b-close-p.gif";
	b_close1 = new Image();
	b_close1.src = "/new/gifs/b-close-c.gif";

	b_cred0 = new Image();
	b_cred0.src = "/new/gifs/b-credits-p.gif";
	b_cred1 = new Image();
	b_cred1.src = "/new/gifs/b-credits-c.gif";

	loaded = 1;
    }
} <? } /* function default_jsfunc_loadimgs() */


function default_func_sidebar()
{
?>
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
    <TR VALIGN=top>
     <TD ALIGN=left>
      <IMG SRC="/new/gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
      <?spc(15,67);?>
      <A HREF="index.php3"><IMG SRC="/new/gifs/logo.gif" ALT="PHP3 Home Page"
                                WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
      <?spc(1,10);?><BR>
     </TD>
    </TR>
    <TR VALIGN=top>
     <TD ALIGN=left>
      <? sidebarButton("downloads.php3", "down", "downloads", "downloads",
 		       false) ?>
      <? sidebarButton("docs.php3", "docs", "docs", "documentation",
 		       false) ?>
      <? sidebarButton("mail.php3", "mail", "mailing","mailing list",
 		       false) ?>
      <? sidebarButton("dev.php3", "dev", "development", "development",
 		       false) ?>
      <? sidebarButton("news.php3", "news", "news", "in the news",
 		       false) ?>
      <? sidebarButton("sites.php3", "link", "links", "links",
 		       false) ?>
      <? sidebarButton("mirrors.php3", "mirr", "mirror", "mirror sites",
 		       "mirrorsKick") ?>
     </TD>
    </TR>
   </TABLE>
<?    
}


function kickHeader($offset, $side, $distance, $width)
{
    global $innerwidth2;
    $off = abs($offset);
    $innerwidth = $width - 40;
    $innerwidth2 = $innerwidth + 21;
    $tablewidth = $width;
    if ($side == "left") {
	$tablewidth = $tablewidth + $distance;
    }
    echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=$tablewidth>";
    if ($side == "left") {
	echo "<TR>";
	if ($offset >= 0) {
	    echo "<TD valign=top rowspan=3 width=$distance>";
	    spc(1,$off);
	    echo "<BR><IMG SRC='/new/gifs/black.gif' WIDTH=$distance HEIGHT=3 BORDER=0><BR></TD>";
	} else {
	    echo "<TD valign=bottom rowspan=3 width=$distance><IMG SRC='/new/gifs/black.gif' WIDTH=$distance HEIGHT=3 BORDER=0><BR>";
	    spc(1,$off);
	    echo "<BR></TD>";
	}
    } else {
	if ($offset >= 0) {
	    echo "<TR><TD colspan=4 align=left width=$width>";
	    spc($off,1);
	    echo "<IMG SRC='/new/gifs/black.gif' WIDTH=3 HEIGHT=$distance BORDER=0><BR></TD></TR>";
	} else {
	    echo "<TR><TD colspan=4 align=right width=$width><IMG SRC='/new/gifs/black.gif' WIDTH=3 HEIGHT=$distance BORDER=0>";
	    spc($off,1);
	    echo "<BR></TD></TR>";
	}
	echo "<TR VALIGN=top>";
    }
    echo "<TD width=9><IMG SRC='/new/gifs/kick-ctl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
    echo "<TD colspan=2 BACKGROUND='/new/gifs/kick-bt.gif' width=$innerwidth2>";
    spc(1,10);
    echo "<BR></TD><TD width=10><IMG SRC='/new/gifs/kick-ctr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
    echo "</TR>";
    echo "<TR VALIGN=top><TD BACKGROUND='/new/gifs/kick-bl.gif' width=9>";
    spc(9,1);
    echo "<BR></TD><TD BACKGROUND='/new/gifs/kick-bg.gif' width=$innerwidth><FONT FACE='TAHOMA,ARIAL' SIZE=-1>";
};

function kickFooter($kickname, $buttname)
{
    echo "</TD><TD BACKGROUND='/new/gifs/kick-bg.gif' width=21 VALIGN=top>";
    echo "<A HREF=\"javascript:hideLayer('$kickname');change('$buttname',0);\"><IMG SRC='/new/gifs/kick-close.gif' ALT='Close' WIDTH=21 HEIGHT=21 BORDER=0></A><BR>";
    echo "</TD><TD BACKGROUND='/new/gifs/kick-br.gif' width=10>";
    spc(10,1);
    echo "<BR></TD></TR><TR VALIGN=top>";
    echo "<TD width=9><IMG SRC='/new/gifs/kick-cbl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
    echo "<TD colspan=2 BACKGROUND='/new/gifs/kick-bb.gif' width=$innerwidth2>";
    spc(1,10);
    echo "<BR></TD><TD width=10><IMG SRC='/new/gifs/kick-cbr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
    echo "</TR></TABLE>";
}

function sidebarButton($href, $imgname, $icon, $alt, $kickout) {
    echo("<A HREF=\"$href\" ".
	 "onMouseover=\"change('$imgname',1)");
    if ($kickout) {
	echo(";showLayer('$kickout')");
    }
    echo("\" onMouseout=\"hide()\">".
	 "<IMG SRC=\"/new/gifs/b-$icon-p.gif\" ALT=\"$alt\" ".
	 "WIDTH=129 HEIGHT=30 BORDER=0 NAME=\"$imgname\" hspace=10>".
	 "</A><BR>");
}

function download_link($file, $title)
{
    global $filesizes;
    if ($tmp = strrchr($file, "/")) {
	$local_file = substr($tmp, 1, strlen($tmp));
    } else {
	$file = "distributions/$file";
	$local_file = $file;
    }
    echo("<a href=\"$file\">$title</a>");
    $size = filesize($local_file)/1024;
    echo("<!-- file=$file localfile=$local_file size-$size-->\n");
    if ($size) {
	printf(" (%dKB)", $size);
    } elseif (isset($filesizes[$local_file])) {
	echo " (".$filesizes[$local_file].")";
    }
}

function gifurl($img) {
    global $root_url;
    return $root_url . "/new/gifs/" . $img;
}

function jpgurl($img) {
    global $root_url;
    return $root_url . "jpgs/" . $img;
}

function commonHeader($title) {
    global $IE4, $HAVE_LAYERS, $HAVE_IMG_SRC, $HAVE_TD_BG, $HAVE_CSS;
    global $HAVE_FONT_COLOR, $HAVE_JS;
    global $PHP_SELF, $HTTP_REFERER, $FONTFACE, $COUNTRIES;
    global $jsfunc, $func;
    // we're far from being conformant yet
    //<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
?><HTML>
<HEAD>
<TITLE>PHP3: <? echo $title ?></TITLE>
<STYLE TYPE="text/css">
.sidebartoc {
    color: #FFFFFF;
    text-decoration: none
}
</STYLE>
<? if ($HAVE_JS >= 12) { ?>
<SCRIPT LANGUAGE="JavaScript1.2">

var loaded = 0;
var layers = 0;
var lastbutton='top';

<? if ($HAVE_LAYERS) {
    if ($IE4) {
	$lp = "all";
	$ss = ".style";
    } else {
	$lp = "layers";
	$ss = "";
    }
    echo("function showLayer(layerName) {\n".
	 "    if (layers == 1) {\n".
	 "        document.${lp}[layerName]${ss}.visibility = 'visible';\n".
	 "    }\n".
	 "}\n".
	 "\n".
	 "function hideLayer(layerName) {\n".
	 "    if (layers == 1) {\n".
	 "        document.${lp}[layerName]${ss}.visibility = 'hidden';\n".
	 "    }\n".
	 "}\n");
} /* $HAVE_LAYERS */ ?>

<? $jsfunc['LoadImgs']() ?>
<? $jsfunc['change']() ?>

function hide() {
    if (document.images && (loaded == 1)) {
	change(lastbutton,0);
    }
}

<? if ($IE4) { echo("LoadImgs();\n"); } ?>

</SCRIPT>
<? } /* $HAVE_JS >= 12 */ ?>

</HEAD>

<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#4040ff" VLINK="#404040" ALINK="#00FF00" MARGINWIDTH=5 MARGINHEIGHT=0 OnLoad="LoadImgs();"><A NAME="top">
<IMG SRC="/new/gifs/spacer.gif" WIDTH=100% HEIGHT=5 BORDER=0 NAME="bigspacer"><BR>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
 <TR valign=top>
  <TD ALIGN=left width=150 BGCOLOR="#5B69A6">
   <? $func['sidebar']() ?>
  </TD>
  <TD align=left width="100%">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=middle BGCOLOR="#5B69A6">
     <TD ALIGN=left CLASS=pagetitle>
      <?
       spc(5,1);
       echo "<FONT FACE=\"$FONTFACE\" SIZE=+1><B>$title</B></FONT><BR></TD>\n";
      ?>
     </TD>
     <TD ALIGN=right><? /* The following code _has_ to be this dense */ ?>
      <? if ($title == "Show Source") { ?>
       <IMG SRC="/new/gifs/b-source-p.gif" WIDTH=1 HEIGHT=1 BORDER=0
 	    NAME="sour"><A
            HREF="<? echo $HTTP_REFERER ?>" onMouseover="change('close',1);"
            onMouseout="hide();"><IMG SRC="/new/gifs/b-close-p.gif"
            ALT="Close this source page" WIDTH=75 HEIGHT=30 VSPACE=9 HSPACE=5
            BORDER=0 NAME="close"></A><? } else { /* !Show Source */
       ?><IMG SRC="/new/gifs/b-close-p.gif" WIDTH=1 HEIGHT=1 BORDER=0
              NAME="close"><A HREF="source.php3?page_url=<? echo $PHP_SELF ?>"
              onMouseover="change('sour',1);" onMouseout="hide();"><IMG
              SRC="/new/gifs/b-source-p.gif" ALT="View source code for page"
              WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME="sour"></A><?
         } /* Show Source */ ?><A HREF="search.php3"
            onMouseover="change('sear',1);showLayer('searchKick');"><IMG
            SRC="/new/gifs/b-search-p.gif" ALT="Search site" WIDTH=75
            HEIGHT=30 vspace=9 BORDER=0 NAME="sear"></A><IMG
            SRC="/new/gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0></TD>
    </TR>
   </TABLE>
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=top BGCOLOR="#FFFFFF">
     <TD ALIGN=left WIDTH="12"
      ><IMG SRC="/new/gifs/corner-ul.gif" WIDTH=12 HEIGHT=12 BORDER=0></TD>
     <TD ALIGN=left WIDTH="100%"><FONT FACE="<? echo $FONTFACE;?>"><BR>
<!-- start body -->

<? } /* function commonHeader() */


function commonFooter() {
    global $IE4, $HAVE_LAYERS, $HAVE_IMG_SRC, $HAVE_TD_BG, $HAVE_CSS;
    global $HAVE_FONT_COLOR, $HAVE_JS;
    global $MIRRORS, $MYSITE, $FONTFACE, $COUNTRIES;
    $country = $MIRRORS[$MYSITE][0];
?>

<!-- end body -->
     </TD>
    </TR>
   </TABLE>
  </TD>
 </TR>

 <TR valign=top BGCOLOR="#5B69A6">
  <TD ALIGN=left width="150"><?spc(150,1);?><BR></TD>
  <TD ALIGN=left width="100%" BGCOLOR="#FFFFFF">
  <IMG SRC="/new/gifs/corner-bl.gif" WIDTH=12 HEIGHT=12 BORDER=0><BR></TD>
 </TR>

 <TR valign=top>

  <TD ALIGN=left width="150" BGCOLOR="#5B69A6">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
    <TR VALIGN=bottom>
     <TD ALIGN=left><?spc(1,3);?><BR>
      <? sidebarButton("credits.php3", "cred", "credits",
		       "Who is responsible for this?", false) ?>
      <? sidebarButton("#top", "top", "top", "Scroll to top of page", false) ?>
      <IMG SRC="/new/gifs/cap-bl.gif" WIDTH=9 HEIGHT=9 BORDER=0></TD>
    </TR>
   </TABLE>
  </TD>

  <TD align=left width="100%">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=middle>

     <TD ALIGN=center BGCOLOR="#5B69A6">
      <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
       <TR VALIGN=middle>
        <TD align=right><FONT FACE="<? echo $FONTFACE;?>" SIZE=-2>
         <I>Site<BR>Hosting:</I><BR></TD>
        <TD><? spc(5,1);?><BR></TD>
        <TD><A HREF="<? echo $MIRRORS[$MYSITE][3]; ?>">
          <IMG SRC="/new/gifs/logo-<? echo $MIRRORS[$MYSITE][2]; ?>.gif"
               WIDTH=190 HEIGHT=48 BORDER=0 vspace=12></A><BR></TD>
       </TR>
      </TABLE>
     </TD>

     <TD ALIGN=right BGCOLOR="#5B69A6">
      <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
       <TR VALIGN=middle>
        <TD align=center>
         <FONT FACE="<? echo $FONTFACE;?>" SIZE="-1">
         <FONT SIZE="-2"><I>Located in</I></FONT><BR><?
           echo $COUNTRIES[$country]; ?></TD>
        <TD><? spc(5,1);?></TD>
        <TD>
         <IMG SRC="/new/gifs/flag-<? echo $country; ?>.gif" BORDER=0></TD>
        <TD>
         <IMG SRC="/new/gifs/cap-right2.gif" WIDTH=24 HEIGHT=72 BORDER=0></TD>
       </TR>
      </TABLE>
     </TD>

    </TR>
   </TABLE>
  </TD>
 </TR>
</TABLE>

<? if ($HAVE_LAYERS && $HAVE_JS >= 12) { ?>

<!-- Kickouts -->

<SCRIPT LANGUAGE="Javascript1.2">
screenWidth   = document.bigspacer.width;
searchPosLeft = screenWidth - 320;
searchPosTop  = 40;
mirrorPosLeft = 143;
//mirrorPosTop  = 230;
mirrorPosTop  = 225;
<? if ($IE4) { ?>
searchPosLeft += 4;
searchPosTop  += 15;
mirrorPosLeft += 4;
mirrorPosTop  += 16;
<? } /* $IE4 */

/* We can't avoid using document.write() here.  The search kickout
 * is located relatively from the right, and we have to use
 * Javascript to get the window width.
 */ ?>
document.writeln("<STYLE TYPE='text/css'>");
document.writeln("TD { font-family: Tahoma, Arial, sans-serif }");
document.write("#mirrorsKick {POSITION: absolute; Z-INDEX: 20; VISIBILITY: hidden; TOP: ");
document.write(mirrorPosTop);
document.write("px; LEFT: ");
document.write(mirrorPosLeft);
document.writeln("px;}");
document.write("#searchKick {POSITION: absolute; Z-INDEX: 20; VISIBILITY: hidden; TOP: ");
document.write(searchPosTop);
document.write("px; LEFT: ");
document.write(searchPosLeft);
document.writeln("px;}");
document.writeln("</STYLE>");

</SCRIPT>

<DIV ID="mirrorsKick">
<? kickHeader(-20, "left", 25, 300); ?>
 <FORM ACTION="redirect.php3" METHOD="POST">
  <B>Pick a mirror site close to you:</B><BR>
  <SELECT NAME="URL">
<?
for (reset($MIRRORS); $site = key($MIRRORS); next($MIRRORS)) {
    list($country, $place, $name, $url, $type) = $MIRRORS[$site];
    if ($type == 1) {
	echo "   <OPTION VALUE=\"$site\">$place ($COUNTRIES[$country])\n";
    }
}
?></SELECT>
  <INPUT TYPE="image" SRC="/new/gifs/b-go.gif" ALIGN=absmiddle WIDTH=36
         HSPACE=3 HEIGHT=21 BORDER=0>
 </FORM>
 <? kickFooter("mirrorsKick","mirr"); ?>
</DIV>

<DIV ID="searchKick">
<? kickHeader(-35, "top", 25, 300); ?>
 <FORM ACTION="search.php3" METHOD="POST">
  <B>What are you searching for:</B><BR>
  <INPUT TYPE="text" NAME="pattern" SIZE=20></FONT><BR>
  <FONT SIZE=-1>
  <INPUT TYPE="checkbox" NAME="icase"> case sensitive<BR>
  <INPUT TYPE="checkbox" NAME="words"> match whole words only<BR>
  <INPUT TYPE="checkbox" NAME="fuzzy"> approximate search
  <INPUT TYPE="image" SRC="/new/gifs/b-go.gif" ALIGN=RIGHT WIDTH=36 HEIGHT=21
         HSPACE=3 BORDER=0><BR>
  <INPUT TYPE="hidden" NAME="st_num" VALUE="1">
  <INPUT TYPE="hidden" NAME="psize" VALUE="10">
 </FORM>
 <? kickFooter("searchKick", "sear"); ?>
</DIV>

<SCRIPT LANGUAGE="Javascript1.2">
layers = 1;
</SCRIPT>

<? } /* $HAVE_LAYERS && $HAVE_JS >= 12 */ ?>

</BODY>
</HTML>
<?
} /* function commonFooter() */
?>
