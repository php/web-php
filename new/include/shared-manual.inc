<?
require("shared.inc");
require("manual.inc");

function getNextPrevCat($function) {
	global $NEXT_FUNC, $NEXT_URL, $NEXT_CAT, $PREV_FUNC, $PREV_URL, $PREV_CAT, $THIS_CAT, $MANUAL, $PREV, $NEXT, $CAT_URLS;
	if ($function!="Show Source"):
		$THIS_CAT=$MANUAL[$function][1];
		$THIS_CAT_URL=$CAT_URLS[$THIS_CAT];
		$PREV_FUNC=$PREV[$function];
		$NEXT_FUNC=$NEXT[$function];
		if($PREV_FUNC!=""):
			$PREV_URL=$MANUAL[$PREV_FUNC][0];
			$PREV_CAT=$MANUAL[$PREV_FUNC][1];
		endif;
		if($NEXT_FUNC!=""):
			$NEXT_URL=$MANUAL[$NEXT_FUNC][0];
			$NEXT_CAT=$MANUAL[$NEXT_FUNC][1];
		endif;
	endif;
};

function manualHeader($function) {
	global $PHP_SELF, $HTTP_REFERER, $FONTFACE;
	global $NEXT_FUNC, $NEXT_URL, $NEXT_CAT, $PREV_FUNC, $PREV_URL, $PREV_CAT, $THIS_CAT, $THIS_CAT_URL;
	getNextPrevCat($function);
	$title="Show Source";
	if ($function!="Show Source"):
		$title="Manual";
	endif;
?>
<HTML>
<HEAD>
<TITLE>PHP3: <? echo $title;?></TITLE>

<SCRIPT LANGUAGE="JavaScript">
<!--

var bName = navigator.appName;
var bVer = parseInt(navigator.appVersion);

var NS4 = (bName == "Netscape" && bVer >= 4);
var IE4 = (bName == "Microsoft Internet Explorer" && bVer >= 4);
var NS3 = (bName == "Netscape" && bVer < 4);
var IE3 = (bName == "Microsoft Internet Explorer" && bVer < 4);

var loaded = 0;
var layers = 0;
var lastbutton='top';

if (NS4 || IE4) {
	if (navigator.appName == "Netscape") {
      		layerStyleRef="layer.";
		layerRef="document.layers";
		styleSwitch="";
	}else{
		layerStyleRef="layer.style.";
		layerRef="document.all";
		styleSwitch=".style";
	}
}

function showLayer(layerName){
	if ((NS4 || IE4) && (layers == 1)) {
		eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="visible"');
	}	
}
        
function hideLayer(layerName){
	if ((NS4 || IE4) && (layers == 1)) {
		eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="hidden"');
	}	
}

function LoadImgs () {
	if (document.images) {
		b_cont0 = new Image();
		b_cont0.src = "/new/gifs/b-contents-p.gif";
		b_cont1 = new Image();
		b_cont1.src = "/new/gifs/b-contents-c.gif";

		b_up0 = new Image();
		b_up0.src = "/new/gifs/b-up-p.gif";
		b_up1 = new Image();
		b_up1.src = "/new/gifs/b-up-c.gif";

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

		b_next0 = new Image();
		b_next0.src = "/new/gifs/b-next-p.gif";
		b_next1 = new Image();
		b_next1.src = "/new/gifs/b-next-c.gif";

		b_prev0 = new Image();
		b_prev0.src = "/new/gifs/b-prev-p.gif";
		b_prev1 = new Image();
		b_prev1.src = "/new/gifs/b-prev-c.gif";

		b_next20 = new Image();
		b_next20.src = "/new/gifs/b-next-p.gif";
		b_next21 = new Image();
		b_next21.src = "/new/gifs/b-next-c.gif";

		b_prev20 = new Image();
		b_prev20.src = "/new/gifs/b-prev-p.gif";
		b_prev21 = new Image();
		b_prev21.src = "/new/gifs/b-prev-c.gif";

		loaded = 1;
	}
}
   
function change(Name,No,Msg) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_" + Name + No + ".src");
	}
	lastbutton = Name;
	return true
}

function hide() {
	if (document.images && (loaded == 1)) {
		if (NS4 || IE4 && (layers == 1) && (lastbutton == 'mirr')) {
			hideLayer('mirrorsKick');
		}
		if (NS4 || IE4 && (layers == 1) && (lastbutton == 'sear')) {
			hideLayer('searchKick');
		}
		change(lastbutton,0);
	}
}

if (IE4) LoadImgs();

//--->
</SCRIPT>
</HEAD>

<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#4040ff" VLINK="#404040" ALINK="#00FF00" MARGINWIDTH=5 MARGINHEIGHT=0 OnLoad="LoadImgs();"><A NAME="top">
<IMG SRC="/new/gifs/spacer.gif" WIDTH=100% HEIGHT=5 BORDER=0 NAME="bigspacer"><BR>
<!-- Kick outs -->

<SCRIPT LANGUAGE="Javascript1.2">
<!--
screenWidth=document.bigspacer.width;
searchPosLeft=screenWidth - 320;
searchPosTop=40;
mirrorPosLeft=143;
mirrorPosTop=230;

if (IE4) {
	searchPosLeft+=4;
	searchPosTop+=15;
	mirrorPosLeft+=4;
	mirrorPosTop+=16;
}

document.writeln("<STYLE TYPE='text/css'>");
document.writeln("BODY { font-family: Tahoma, Arial, sans-serif }");
document.writeln("TD { font-family: Tahoma, Arial, sans-serif }");
document.writeln("A { text-decoration: none }");
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
//-->
</SCRIPT>


<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
<TR valign=top>
<TD ALIGN=left width=150 BGCOLOR="#5B69A6">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
<TR VALIGN=top>
<TD ALIGN=left>
<IMG SRC="/new/gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
<?spc(15,67);?><A HREF="/new/index.php3"><IMG SRC="/new/gifs/logo.gif" ALT="PHP3 Home Page" WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
<?spc(1,10);?><BR>
</TD></TR>
<TR VALIGN=top>
<TD ALIGN=left>

<A HREF="index.php3" onMouseover="hide();change('cont',1);" ><IMG SRC="/new/gifs/b-contents-p.gif" ALT="contents" WIDTH=129 HEIGHT=30 BORDER=0 NAME="cont" hspace=10></A><BR>
<A HREF="<? echo $THIS_CAT_URL;?>" onMouseover="hide();change('up',1);" ><IMG SRC="/new/gifs/b-up-p.gif" ALT="up to front of the $THIS_CAT category" WIDTH=129 HEIGHT=30 BORDER=0 NAME="up" hspace=10><BR>

</TD></TR>
</TABLE>
</TD>
<TD align=left width="100%">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
<TR VALIGN=middle BGCOLOR="#5B69A6">
<TD ALIGN=left>
<?
	spc(5,1);
	echo "<FONT FACE=\"$FONTFACE\" SIZE=+1><B>$title</B></FONT><BR></TD>\n";
?>
<TD ALIGN=right><?
if($function=="Show Source"):
	echo "<IMG SRC=\"/new/gifs/b-source-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"sour\">";
	echo "<A HREF=\"$HTTP_REFERER\" onMouseover=\"hide();change('close',1);\"><IMG SRC=\"/new/gifs/b-close-p.gif\" ALT=\"Close this source page\" WIDTH=75 HEIGHT=30 vspace=9 hspace=5 BORDER=0 NAME=\"close\"></A>";
else:
	echo "<IMG SRC=\"/new/gifs/b-close-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"close\">";
	echo "<A HREF=\"source-manual.php3?page_url=$PHP_SELF\" onMouseover=\"hide();change('sour',1);\" >";
	echo "<IMG SRC=\"/new/gifs/b-source-p.gif\" ALT=\"View the source code for this page\" WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME=\"sour\">";
	echo "</A>";
endif;
?><A HREF="search.php3" onMouseover="hide();change('sear',1);showLayer('searchKick');" ><IMG SRC="/new/gifs/b-search-p.gif" ALT="Search this site" WIDTH=75 HEIGHT=30 vspace=9 BORDER=0 NAME="sear"></A><IMG SRC="/new/gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><B
R></TD>
</TR></TABLE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
<TR VALIGN=top BGCOLOR="#FFFFFF">
<TD ALIGN=left WIDTH="12"><IMG SRC="/new/gifs/corner-ul.gif" WIDTH=12 HEIGHT=12 BORDER=0></TD>
<TD ALIGN=left WIDTH="100%"><FONT FACE="<? echo $FONTFACE;?>"><BR>
<!-- start next/prev -->
<?
if ($function!="Show Source"):
		echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
		echo "<TR VALIGN=middle>\n";
		echo "<TD ALIGN=left WIDTH=18><IMG SRC='/new/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		if ($PREV_FUNC!=""):
			echo "<TD ALIGN=left WIDTH=75><A HREF=\"$PREV_URL\" onMouseover=\"hide();change('prev',1);\" ><IMG SRC='/new/gifs/b-prev-p.gif' ALT='Previous' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev' align=absmiddle></A><BR></TD>\n";
		endif;
		echo "<TD ALIGN=left WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV_FUNC<BR></TD>\n";
		echo "<TD ALIGN=right WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT_FUNC&nbsp;<BR></TD>\n";
		if ($NEXT_FUNC!=""):
			echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT_URL\" onMouseover=\"hide();change('next',1);\" ><IMG SRC='/new/gifs/b-next-p.gif' ALT='Previous' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next' align=absmiddle></A><BR></TD>\n";
		endif;
		echo "<TD ALIGN=right WIDTH=18><IMG SRC='/new/gifs/gcap-right.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		echo "</TR></TABLE>\n";
		echo "<BR>\n";
endif;
echo "<!-- start body -->\n";
};

function manualFooter($function) {
	global $MIRRORS,$MYSITE,$COUNTRIES, $FONTFACE, $NEXT_FUNC, $NEXT_URL, $PREV_FUNC, $PREV_URL;
	$country=$MIRRORS[$MYSITE][0];
	echo "<!-- start next/prev -->\n";
	getNextPrevCat($function);
	if ($function!="Show Source"):
		echo "<BR><BR>\n";
		echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
		echo "<TR VALIGN=middle>\n";
		echo "<TD ALIGN=left WIDTH=18><IMG SRC='/new/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		if ($PREV_FUNC!=""):
			echo "<TD ALIGN=left WIDTH=75><A HREF=\"$PREV_URL\" onMouseover=\"hide();change('prev2',1);\" ><IMG SRC='/new/gifs/b-prev-p.gif' ALT='Previous' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev2' align=absmiddle></A><BR></TD>\n";
		endif;
		echo "<TD ALIGN=left WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV_FUNC<BR></TD>\n";
		echo "<TD ALIGN=right WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT_FUNC&nbsp;<BR></TD>\n";
		if ($NEXT_FUNC!=""):
			echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT_URL\" onMouseover=\"hide();change('next2',1);\" ><IMG SRC='/new/gifs/b-next-p.gif' ALT='Previous' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next2' align=absmiddle></A><BR></TD>\n";
		endif;
		echo "<TD ALIGN=right WIDTH=18><IMG SRC='/new/gifs/gcap-right.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		echo "</TR></TABLE>\n";
	endif;
?>
<!-- end body -->
</TD></TR>
</TABLE>

</TD>
</TR>

<TR valign=top BGCOLOR="#5B69A6">
<TD ALIGN=left width="150"><?spc(150,1);?><BR></TD>
<TD ALIGN=left width="100%" BGCOLOR="#FFFFFF"><IMG SRC="/new/gifs/corner-bl.gif" WIDTH=12 HEIGHT=12 BORDER=0><BR></TD>
</TR>

<TR valign=top>
<TD ALIGN=left width="150" BGCOLOR="#5B69A6">

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
<TR VALIGN=bottom>
<TD ALIGN=left>
<?spc(1,3);?><BR>
<A HREF="credits.php3" onMouseover="hide();change('cred',1);" ><IMG SRC="/new/gifs/b-credits-p.gif" ALT="Who is responsible for this?" WIDTH=129 HEIGHT=30 BORDER=0 hspace=10 NAME="cred"></A><BR>
<A HREF="#top" onMouseover="hide();change('top',1);" ><IMG SRC="/new/gifs/b-top-p.gif" ALT="Scroll back to the top of this page" WIDTH=129 HEIGHT=30 BORDER=0 hspace=10 NAME="top"></A><BR>
<IMG SRC="/new/gifs/cap-bl.gif" WIDTH=9 HEIGHT=9 BORDER=0></TD>
</TR>
</TABLE>

</TD><TD align=left width="100%">

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
<TR VALIGN=middle>
<TD ALIGN=center BGCOLOR="#5B69A6">

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR VALIGN=middle><TD align=right><FONT FACE="<? echo $FONTFACE;?>" SIZE=-2>
<I>Site<BR>Hosting:</I><BR></TD>
<TD><? spc(5,1);?><BR></TD>
<TD><A HREF="<? echo $MIRRORS[$MYSITE][3]; ?>"><IMG SRC="/new/gifs/logo-<? echo $MIRRORS[$MYSITE][2]; ?>.gif" WIDTH=190 HEIGHT=48 BORDER=0 vspace=12></A><BR></TD>
</TR></TABLE>

</TD>
<TD ALIGN=right BGCOLOR="#5B69A6">

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR VALIGN=middle><TD align=center><FONT FACE="<? echo $FONTFACE;?>" SIZE=-1>
<FONT SIZE=-2><I>Located in</I></FONT><BR><? echo $COUNTRIES[$country]; ?><BR></TD>
<TD><? spc(5,1);?><BR></TD>
<TD><IMG SRC="/new/gifs/flag-<? echo $country; ?>.gif" BORDER=0><BR></TD>
<TD><IMG SRC="/new/gifs/cap-right2.gif" WIDTH=24 HEIGHT=72 BORDER=0><BR></TD>
</TR></TABLE>

</TD></TR>
</TABLE>

</TD></TR>
</TABLE>

<!-- Kick outs -->
<SCRIPT LANGUAGE="Javascript1.2">
<!--

document.write("<DIV ID='mirrorsKick'>");
document.write("<? kickHeader(-20,'left',25,300);?>");
document.write("<FORM ACTION='redirect.php3' METHOD='POST'>");
document.write("<B>Pick a mirror site close to you:</B><BR>");
document.write("<SELECT NAME='URL'>");
document.write("<?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
while ($site = key($mirror_sites)):
	next($mirror_sites);
	$country=$mirror_sites[$site][0];
	$place=$mirror_sites[$site][1];
	$type=$mirror_sites[$site][4];
	if ($type==1):
		echo "<OPTION VALUE='$site'>$place ($COUNTRIES[$country])";
	endif;
endwhile;?>");
document.write("</SELECT><INPUT TYPE='image' SRC='/new/gifs/b-go.gif' ALIGN=absmiddle WIDTH=36 hspace=3 HEIGHT=21 BORDER=0></FORM>");
document.writeln("<? kickFooter();?></DIV>");

document.write("<DIV ID='searchKick'>");
document.write("<? kickHeader(-35,'top',25,300);?>");
document.write("<FORM ACTION='search.php3' METHOD='POST'>");
document.write("<B>What are you searching for:</B><BR>");
document.write("<FONT SIZE=+0><input type='text' name='pattern' size=20></FONT><BR>");
document.write("<FONT SIZE=-2>");
document.write("<input type='checkbox' name='icase'> case sensitive<BR>");
document.write("<input type='checkbox' name='words'> match whole words only<BR>");
document.write("<input type='checkbox' name='fuzzy'> approximate search<INPUT TYPE='image' SRC='/new/gifs/b-go.gif' ALIGN=right WIDTH=36 HEIGHT=21 hspace=3 BORDER=0><BR>");
document.write("<input type='hidden' name='st_num' value='1'><input type='hidden' name='psize' value='10'></form>");
document.writeln("<? kickFooter();?></DIV>");

layers = 1;

//--->
</SCRIPT>

</BODY>
</HTML>
<?
};
?>
