<?php // -*- C++ -*-
header("Vary: User-Agent");
require("site.inc");

/* Check that browser! */

$IE4 = $IE3 = $NS4 = $NS3 = $X11 = $HAVE_STYLE = $HTDIG = false;

$DISABLE_KICKOUTS = false;

if (ereg("MSIE ([0-9]+)",$HTTP_USER_AGENT,$version)):
        $ver=(int)$version[1];
        if ($ver>=4):
		$IE4=true;
		$HAVE_STYLE = true;
        elseif($ver==3):
		$IE3=true;
        endif;
elseif (ereg("Mozilla/([0-9]+)",$HTTP_USER_AGENT,$version)):                                    
        $ver=(int)$version[1];
        if ($ver>=4):
		$NS4=true;
		$HAVE_STYLE=true;
        elseif($ver==3):  
		$NS3=true;
        endif;
endif;
if (ereg("X11",$HTTP_USER_AGENT)):
	$X11 = true;
endif;
if (ereg("htdig",$HTTP_USER_AGENT)):
	$HTDIG = true;
endif;

/* Base variables */

$FONTFACE = "tahoma, verdana, arial, helvetica, sans-serif";
$FRAMEMODE = "standard";
$FONTFACEATTR = " FACE=\"$FONTFACE\"";

/* Base functions */

function preloadImages() {
	global $FRAMEMODE;
?>
		b_close0 = new Image();
		b_close0.src = "/gifs/b-close-p.gif";
		b_close1 = new Image();
		b_close1.src = "/gifs/b-close-c.gif";

		b_cred0 = new Image();
		b_cred0.src = "/gifs/b-credits-p.gif";
		b_cred1 = new Image();
		b_cred1.src = "/gifs/b-credits-c.gif";

		b_top0 = new Image();
		b_top0.src = "/gifs/b-top-p.gif";
		b_top1 = new Image();
		b_top1.src = "/gifs/b-top-c.gif";

		b_sear0 = new Image();
		b_sear0.src = "/gifs/b-search-p.gif";
		b_sear1 = new Image();
		b_sear1.src = "/gifs/b-search-c.gif";

		b_sour0 = new Image();
		b_sour0.src = "/gifs/b-source-p.gif";
		b_sour1 = new Image();
		b_sour1.src = "/gifs/b-source-c.gif";

		b_mirr0 = new Image();
		b_mirr0.src = "/gifs/b-mirror-p.gif";
		b_mirr1 = new Image();
		b_mirr1.src = "/gifs/b-mirror-c.gif";

		b_next0 = new Image();
		b_next0.src = "/gifs/b-next-p.gif";
		b_next1 = new Image();
		b_next1.src = "/gifs/b-next-c.gif";

		b_prev0 = new Image();
		b_prev0.src = "/gifs/b-prev-p.gif";
		b_prev1 = new Image();
		b_prev1.src = "/gifs/b-prev-c.gif";

		b_next20 = new Image();
		b_next20.src = "/gifs/b-next-p.gif";
		b_next21 = new Image();
		b_next21.src = "/gifs/b-next-c.gif";

		b_prev20 = new Image();
		b_prev20.src = "/gifs/b-prev-p.gif";
		b_prev21 = new Image();
		b_prev21.src = "/gifs/b-prev-c.gif";

<?	if ($FRAMEMODE == "manual"): ?>
		b_cont0 = new Image();
		b_cont0.src = "/gifs/b-contents-p.gif";
		b_cont1 = new Image();
		b_cont1.src = "/gifs/b-contents-c.gif";

		b_up0 = new Image();
		b_up0.src = "/gifs/b-up-p.gif";
		b_up1 = new Image();
		b_up1.src = "/gifs/b-up-c.gif";

		b_bullet0 = new Image();
		b_bullet0.src = "/gifs/b-bullet-p.gif";
		b_bullet1 = new Image();
		b_bullet1.src = "/gifs/b-bullet-c.gif";
		b_bullet2 = new Image();
		b_bullet2.src = "/gifs/b-bullet-w.gif";
<?	else: ?>
		b_down0 = new Image();
		b_down0.src = "/gifs/b-downloads-p.gif";
		b_down1 = new Image();
		b_down1.src = "/gifs/b-downloads-c.gif";

		b_docs0 = new Image();
		b_docs0.src = "/gifs/b-docs-p.gif";
		b_docs1 = new Image();
		b_docs1.src = "/gifs/b-docs-c.gif";

		b_mail0 = new Image();
		b_mail0.src = "/gifs/b-mailing-p.gif";
		b_mail1 = new Image();
		b_mail1.src = "/gifs/b-mailing-c.gif";

		b_dev0 = new Image();
		b_dev0.src = "/gifs/b-development-p.gif";
		b_dev1 = new Image();
		b_dev1.src = "/gifs/b-development-c.gif";

		b_news0 = new Image();
		b_news0.src = "/gifs/b-news-p.gif";
		b_news1 = new Image();
		b_news1.src = "/gifs/b-news-c.gif";

		b_link0 = new Image();
		b_link0.src = "/gifs/b-links-p.gif";
		b_link1 = new Image();
		b_link1.src = "/gifs/b-links-c.gif";
<? endif;
}


function spc($width, $height) {
	echo "<IMG SRC='/gifs/spacer.gif' WIDTH=$width HEIGHT=$height BORDER=0>";
}

function kickHeader($offset,$side,$width) {
	global $FONTFACEATTR;
	$off=abs($offset);
	$innerwidth=$width-40;
	$innerwidth2=$innerwidth+21;
	$tablewidth=$width;
	if ($side=="left"):
		$tablewidth=$tablewidth+50;
	endif;
	echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=$tablewidth>\n";
	if ($side=="left"):
		echo "<TR>\n";
		if ($offset>=0):
			echo "<TD valign=top rowspan=3 width=30>";
			spc(1,$off);
			echo "<BR><IMG SRC='/gifs/bubbles-up.gif' WIDTH=50 HEIGHT=50 BORDER=0><BR></TD>\n";
		else:
			echo "<TD valign=bottom rowspan=3 width=30><IMG SRC='/gifs/bubbles-up.gif' WIDTH=50 HEIGHT=50 BORDER=0><BR>";
			spc(1,$off);
			echo "<BR></TD>\n";
		endif;
	else:
		if ($offset>=0):
			echo "<TR>\n<TD colspan=4 align=left width=$width>";
			spc($off,1);
			echo "<IMG SRC='/gifs/bubbles-down.gif' WIDTH=50 HEIGHT=50 BORDER=0><BR></TD></TR>\n";
		else:
			echo "<TR><TD colspan=4 align=right width=$width><IMG SRC='/gifs/bubbles-down.gif' WIDTH=50 HEIGHT=50 BORDER=0>";
			spc($off,1);
			echo "<BR></TD>\n</TR>\n";
		endif;	
		echo "<TR VALIGN=top>\n";
	endif;
	echo "<TD width=9><IMG SRC='/gifs/kick-ctl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>\n";
	echo "<TD colspan=2 BACKGROUND='/gifs/kick-bt.gif' width=$innerwidth2>";
	spc(1,10);
	echo "<BR></TD>\n<TD width=10><IMG SRC='/gifs/kick-ctr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>\n";
	echo "</TR>\n";
	echo "<TR VALIGN=top><TD BACKGROUND='/gifs/kick-bl.gif' width=9>";
	spc(9,1);
	echo "<BR></TD>\n<TD BGCOLOR='#EFEF52' width=$innerwidth><FONT $FONTFACEATTR SIZE=2>\n";
}

function kickFooter($kickname,$buttname,$width) {
	$innerwidth=$width-40;
	echo "</TD>\n<TD BACKGROUND='/gifs/kick-bg.gif' width=21 VALIGN=top>";
	echo "<A HREF=\"javascript:popUp('$kickname',false);change('$buttname',0);\"><IMG SRC='/gifs/kick-close.gif' ALT='Close this window' WIDTH=21 HEIGHT=21 BORDER=0></A><BR>";
	echo "</TD>\n<TD BACKGROUND='/gifs/kick-br.gif' width=10>";
	spc(10,1);
	echo "<BR></TD>\n</TR>\n<TR VALIGN=top>\n";
	echo "<TD width=9><IMG SRC='/gifs/kick-cbl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>\n";
	echo "<TD colspan=2 BACKGROUND='/gifs/kick-bb.gif' width=$innerwidth2>";
	spc(1,10);
	echo "<BR></TD>\n<TD width=10><IMG SRC='/gifs/kick-cbr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>\n";
	echo "</TR>\n</TABLE>\n";
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
	return $root_url . "/gifs/" . $img;
}

function jpgurl($img) {
	global $root_url;
	return $root_url . "jpgs/" . $img;
}

function makeSideButton($url,$button,$kick,$gif,$width,$height,$vspace,$hspace,$alt,$br) {
	if ($url):
		echo "<A HREF=\"$url\" onMouseover=\"change('$button',1);";
		if ($kick):
			echo " popUp('$kick',true);\" \n >";
		else:
			echo "\" \n onMouseout=\"hide();\">";
		endif;
	endif;
	echo "<IMG SRC=\"/gifs/b-$gif-p.gif\" \n ALT=\"$alt\" \n WIDTH=$width HEIGHT=$height BORDER=0 \n NAME=\"$button\" \n HSPACE=$hspace VSPACE=$vspace>";
	if ($url):
		echo "</A>";
	endif;
	echo $br;
}

function commonHeader($title) {
	global $NS4, $NS3, $IE3, $IE4, $X11, $FRAMEMODE, $FONTFACEATTR, $HTDIG;
	global $PHP_SELF, $HTTP_REFERER, $FONTFACE, $COUNTRIES, $MIRRORS, $MYSITE;
	global $HAVE_STYLE,$HAVE_SEARCH;
	global $NEXT, $PREV, $UP, $HOME, $TOC;
	global $DISABLE_KICKOUTS;
	$HAVE_SEARCH=$MIRRORS[$MYSITE][5];
?>
<HTML>
<HEAD>
<TITLE>PHP3: <? echo $title;?></TITLE>

<? if ($HAVE_STYLE): ?>
<LINK REL="stylesheet" HREF="/php-style.css" TYPE="text/css">
<? endif; ?>

<SCRIPT LANGUAGE="JavaScript">
<!--
var loaded = 0;
var gotlayers = 0;
var lastbutton='top';

<? if (($NS4 || $IE4) && (!$DISABLE_KICKOUTS)):	/* Kick Outs */ ?>

NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
ver4 = (NS4 || IE4) ? 1 : 0;

function moveLayers() {
	if (gotlayers) {
		if (NS4) {
			screenWidth = window.innerWidth;
<? if ($FRAMEMODE!="manual"): ?>
			document.layers['mirrorsKick'].left = 140;
			document.layers['mirrorsKick'].top = 185;
<? endif; ?>
			document.layers['searchKick'].left = screenWidth-350;
			document.layers['searchKick'].top = 36;
		} else {
			screenWidth = document.body.clientWidth + 18;
<? if ($FRAMEMODE!="manual"): ?>
			document.all['mirrorsKick'].style.pixelLeft = 140;
			document.all['mirrorsKick'].style.pixelTop = 185;
<? endif; ?>
			document.all['searchKick'].style.pixelLeft = screenWidth-350;
			document.all['searchKick'].style.pixelTop = 36;
		}
	}
}

function popUp(menuName,on) {
	if (gotlayers) {
		if (on) {
			moveLayers();
			if (NS4) {
				document.layers[menuName].visibility = "show";
			} else {
				document.all[menuName].style.visibility = "visible";
			}
		} else {
			if (NS4) {
				document.layers[menuName].visibility = "hide";
			} else {
				document.all[menuName].style.visibility = "hidden";
			}
		}
	}
}

<? else: ?>
function popUp(menuName,on) {
}
function moveLayers() {
}
<? endif;	/* Kick outs */ ?>


<? if ($NS4 || $NS3 || $IE4):	/* OnOvers */ ?>
function LoadImgs () {
	if (document.images) {
<? preloadImages(); ?>
		loaded = 1;
	}
}

function change(Name,No) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_" + Name + No + ".src");
	}
	if (No == 1) {
		if (gotlayers) {
<? if ($FRAMEMODE!="manual"): ?>
			popUp('mirrorsKick',false);
<? endif; ?>
			popUp('searchKick',false);
		}
<? if ($FRAMEMODE!="manual"): ?>
		if (Name != 'mirr') {
			change('mirr',0);
		}
<? endif; ?>
		if (Name != 'sear') {
			change('sear',0);
		}
		lastbutton = Name;
	}
}

function changebullet(Name,No) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_bullet" + No + ".src");
	}
}

function hide() {
	if (document.images && (loaded == 1)) {
		change(lastbutton,0);
	}
}
<? else:	/* OnOvers */ ?>

function change(Name,No) {
}
function changebullet(Name,No) {
}
function hide() {
}

<? endif;	/* OnOvers */

if ($IE4):
	echo "LoadImgs();\n";
endif;
?>

//--->
</SCRIPT>

</HEAD>

<BODY MARGINHEIGHT=3 MARGINWIDTH=3 TOPMARGIN=3 LEFTMARGIN=3 BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#5B69A6" VLINK="#5B69A6" ALINK="#00FF00"
<? if ($NS4 || $NS3):
	echo " OnLoad=\"LoadImgs();\"";
endif; ?>
><A NAME="top">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
 <TR valign=top>
  <TD ALIGN=left width=150 BGCOLOR="#5B69A6">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
    <TR VALIGN=top>
     <TD ALIGN=left>
      <IMG SRC="/gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
      <?spc(15,67);?><A HREF="/index.php3"><IMG SRC="/gifs/logo.gif" ALT="PHP3 Home Page" WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
      <?spc(1,10);?><BR>
     </TD>
    </TR>
    <TR VALIGN=top>
     <TD ALIGN=left>
	<? if ($FRAMEMODE == "manual"):
		makeSideButton("$HOME[0]","cont","","contents",129,30,0,10,"Manual Table of Contents","<BR>\n");
		if ($UP[0] && $UP[1]):
			makeSideButton($UP[0],"up","","up",129,30,0,10,"Up to $UP[1]","<BR>\n");
		endif;
		if (!$HTDIG):
			makeBorderTOC($title);
		endif;
	else:
		makeSideButton("downloads.php3","down","","downloads",129,30,0,10,"Downloads","<BR>\n");
		makeSideButton("docs.php3","docs","","docs",129,30,0,10,"Documentation","<BR>\n");
#		makeSideButton("mail.php3","mail","","mailing",129,30,0,10,"Mailing Lists","<BR>\n");
		makeSideButton("support.php3","dev","","development",129,30,0,10,"Getting Help","<BR>\n");
		makeSideButton("news.php3","news","","news",129,30,0,10,"PHP in the News","<BR>\n");
		makeSideButton("links.php3","link","","links",129,30,0,10,"PHP Links","<BR>\n");
		makeSideButton("mirrors.php3","mirr","mirrorsKick","mirror",129,30,0,10,"Mirror sites","<BR>\n");
	endif; ?>
     </TD>
    </TR>
   </TABLE>
  </TD>
  <TD align=left width="100%">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=middle BGCOLOR="#5B69A6">
     <TD ALIGN=left>
      <?
		spc(5,1);
		echo "<FONT${FONTFACEATTR} SIZE=4><B>$title</B></FONT><BR>\n";
      ?>
     </TD>
     <TD ALIGN=right>
      <?
		if($title=="Show Source"):
			makeSideButton("","sour","","source",1,1,0,0,"","");
			makeSideButton($HTTP_REFERER,"close","","close",75,30,9,5,"Close this source page","");
		else:
			makeSideButton("","close","","close",1,1,0,0,"","");
			makeSideButton("/source.php3?page_url=$PHP_SELF","sour","","source",75,30,9,5,"View the source code for this page","");
		endif;
		makeSideButton("/search.php3","sear","searchKick","search",75,30,9,5,"Search the site","");
      ?><IMG SRC="/gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
    </TR>
   </TABLE>
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=top BGCOLOR="#FFFFFF">
     <TD ALIGN=left WIDTH="12">
      <IMG SRC="/gifs/corner-ul.gif" WIDTH=12 HEIGHT=12 BORDER=0><BR>
     </TD>
     <TD ALIGN=left WIDTH="100%">
      <? if ($FONTFACEATTR): ?>
      <FONT<? echo $FONTFACEATTR;?>>
      <? endif; ?>
      <BR CLEAR=ALL>
      <!-- start body -->
<?
}


function commonFooter() {
	global $NS4, $NS3, $IE3, $IE4, $X11, $HAVE_STYLE, $FRAMEMODE, $FONTFACEATTR, $HTTP_USER_AGENT, $HTDIG;
	global $MIRRORS, $MYSITE, $COUNTRIES;
	global $NEXT, $PREV, $UP, $HOME, $TOC;
	global $DISABLE_KICKOUTS;
	$country=$MIRRORS[$MYSITE][0];
	$HAVE_SEARCH=$MIRRORS[$MYSITE][5];
?>
      <!-- end body -->
     </TD>
    </TR>
   </TABLE>
  </TD>
 </TR>
 <TR valign=top BGCOLOR="#5B69A6">
  <TD ALIGN=left width="150">
   <?spc(150,1);?><BR>
  </TD>
  <TD ALIGN=left width="100%" BGCOLOR="#FFFFFF">
   <IMG SRC="/gifs/corner-bl.gif" WIDTH=12 HEIGHT=12 BORDER=0><BR>
  </TD>
 </TR>
 <TR valign=top>
  <TD ALIGN=left width="150" BGCOLOR="#5B69A6">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
    <TR VALIGN=bottom>
     <TD ALIGN=left>
      <?
		spc(1,3);
		echo "<BR>\n";
		makeSideButton("/credits.php3","cred","","credits",129,30,0,10,"Who's responsible for this?","<BR>\n");
		makeSideButton("#top","top","","top",129,30,0,10,"Top of this page","<BR>\n");
      ?>
      <IMG SRC="/gifs/cap-bl.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
     </TD>
    </TR>
   </TABLE>
  </TD>
  <TD align=left width="100%">
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
    <TR VALIGN=middle>
     <TD ALIGN=center BGCOLOR="#5B69A6">
      <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
       <TR VALIGN=middle>
        <TD align=right>
         <FONT<? echo $FONTFACEATTR ?> SIZE=1>
         <I>Site<BR>Hosting:</I><BR>
        </TD>
        <TD>
         <? spc(5,1);?><BR>
        </TD>
        <TD>
         <A HREF="<? echo $MIRRORS[$MYSITE][3]; ?>"><IMG SRC="/gifs/logo-<? echo $MIRRORS[$MYSITE][2]; ?>.gif" WIDTH=190 HEIGHT=48 BORDER=0 vspace=12></A><BR>
        </TD>
       </TR>
      </TABLE>
     </TD>
     <TD ALIGN=right BGCOLOR="#5B69A6">
      <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
       <TR VALIGN=middle>
        <TD align=center>
<?	if (!$HTDIG):
		echo "<FONT $FONTFACEATTR SIZE=2>\n";
		echo "<FONT SIZE=1><I>Located in</I></FONT><BR>".$COUNTRIES[$country];
	endif; ?>
	  </TD>
        <TD><? spc(5,1);?></TD>
        <TD>
         <IMG SRC="/gifs/flag-<? echo $country; ?>.gif" BORDER=0></TD>
        <TD>
         <IMG SRC="/gifs/cap-right2.gif" WIDTH=24 HEIGHT=72 BORDER=0></TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>
  </TD>
 </TR>
</TABLE>

<? if (($NS4 || $IE4) && !$DISABLE_KICKOUTS):	/* Kick outs */ ?>

<DIV ID='mirrorsKick' STYLE="POSITION: absolute; Z-INDEX: 20; VISIBILITY: hidden; TOP: 0px; LEFT: 0px;">
<? kickHeader(-20,'left',400);?>
<FORM ACTION='redirect.php3' METHOD='POST'>
<B>Pick a mirror site close to you:</B><BR>
<SELECT NAME="URL">
<?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
while ($site = key($mirror_sites)):
	next($mirror_sites);
	$country=$mirror_sites[$site][0];
	$place=$mirror_sites[$site][1];
	$type=$mirror_sites[$site][4];
	if ($type==1 && substr($site,0,7)=="http://"):
		echo "<OPTION VALUE=\"$site\">$place ($COUNTRIES[$country])\n";
	endif;
endwhile;
?>
</SELECT>
<INPUT TYPE='image' SRC='/gifs/b-go.gif' ALIGN=absmiddle WIDTH=36 hspace=3 HEIGHT=21 BORDER=0>
</FORM>
<? kickFooter("mirrorsKick","mirr",350);?>
</DIV>

<?
if ($HAVE_SEARCH):
	$form="/search.php3";
else:
	$form="http://uk.php.net/search.php3";
endif;
?>

<DIV ID='searchKick' STYLE="POSITION: absolute; Z-INDEX: 20; VISIBILITY: hidden; TOP: 0px; LEFT: 0px;">
<? kickHeader(-35,'top',300);
if (!isset($prevsearch)):
	$prevsearch[0]="";
endif;
echo "<form action='$form' METHOD='POST'>\n"; ?>
<B>What are you searching for:</B><BR>
<FONT SIZE=3><input type='text' name='pattern' size=20 VALUE='<? echo $prevsearch[0];?>'></FONT><BR>
<FONT SIZE=2>
<INPUT TYPE='RADIO' NAME='show' VALUE='nosource' CHECKED> Search whole site<BR>
<INPUT TYPE='RADIO' NAME='show' VALUE='manual'> Search documentation only<BR>
<INPUT TYPE='RADIO' NAME='show' VALUE='source'> Search source code only
<INPUT TYPE='image' SRC='/gifs/b-go.gif' ALIGN=right WIDTH=36 HEIGHT=21 hspace=3 BORDER=0><BR>
</FORM>
<? kickFooter("searchKick","sear",300);?>
</DIV>

<SCRIPT LANGUAGE="JavaScript">
<!--
if (NS4) {
	gotlayers = (document.layers.length == 2) ? 1 : 0;
}
if (IE4) {
	gotlayers = 1;
}

//--->
</SCRIPT>
<?
endif;		/* Kick outs */
?>
</BODY>
</HTML>
<?
}
?>
