<?
require("site.inc");

$FONTFACE="TAHOMA,ARIAL";

function spc($width, $height) {
	echo "<IMG SRC='/new/gifs/spacer.gif' WIDTH=$width HEIGHT=$height BORDER=0>";
};

function kickHeader($offset,$side,$distance,$width) {
	$off=abs($offset);
	$innerwidth=$width-40;
	$innerwidth2=$innerwidth+21;
	$tablewidth=$width;
	if ($side=="left"):
		$tablewidth=$tablewidth+$distance;
	endif;
	echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=$tablewidth>";
	if ($side=="left"):
		echo "<TR>";
		if ($offset>=0):
			echo "<TD valign=top rowspan=3 width=$distance>";
			spc(1,$off);
			echo "<BR><IMG SRC='/new/gifs/black.gif' WIDTH=$distance HEIGHT=3 BORDER=0><BR></TD>";
		else:
			echo "<TD valign=bottom rowspan=3 width=$distance><IMG SRC='/new/gifs/black.gif' WIDTH=$distance HEIGHT=3 BORDER=0><BR>";
			spc(1,$off);
			echo "<BR></TD>";
		endif;
	else:
		if ($offset>=0):
			echo "<TR><TD colspan=4 align=left width=$width>";
			spc($off,1);
			echo "<IMG SRC='/new/gifs/black.gif' WIDTH=3 HEIGHT=$distance BORDER=0><BR></TD></TR>";
		else:
			echo "<TR><TD colspan=4 align=right width=$width><IMG SRC='/new/gifs/black.gif' WIDTH=3 HEIGHT=$distance BORDER=0>";
			spc($off,1);
			echo "<BR></TD></TR>";
		endif;	
		echo "<TR VALIGN=top>";
	endif;
	echo "<TD width=9><IMG SRC='/new/gifs/kick-ctl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD colspan=2 BACKGROUND='/new/gifs/kick-bt.gif' width=$innerwidth2>";
	spc(1,10);
	echo "<BR></TD><TD width=10><IMG SRC='/new/gifs/kick-ctr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
	echo "</TR>";
	echo "<TR VALIGN=top><TD BACKGROUND='/new/gifs/kick-bl.gif' width=9>";
	spc(9,1);
	echo "<BR></TD><TD BACKGROUND='/new/gifs/kick-bg.gif' width=$innerwidth><FONT FACE='TAHOMA,ARIAL' SIZE=-1>";
};

function kickFooter($kickname,$buttname) {
	echo "</TD><TD BACKGROUND='/new/gifs/kick-bg.gif' width=21 VALIGN=top>";
	echo "<A HREF=\\\"javascript:hideLayer('$kickname');change('$buttname',0);\\\"><IMG SRC='/new/gifs/kick-close.gif' ALT='Close this window' WIDTH=21 HEIGHT=21 BORDER=0></A><BR>";
	echo "</TD><TD BACKGROUND='/new/gifs/kick-br.gif' width=10>";
	spc(10,1);
	echo "<BR></TD></TR><TR VALIGN=top>";
	echo "<TD width=9><IMG SRC='/new/gifs/kick-cbl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD colspan=2 BACKGROUND='/new/gifs/kick-bb.gif' width=$innerwidth2>";
	spc(1,10);
	echo "<BR></TD><TD width=10><IMG SRC='/new/gifs/kick-cbr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
	echo "</TR></TABLE>";
};

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
	return $root_url . "/new/gifs/" . $img;
}

function jpgurl($img) {
	global $root_url;
	return $root_url . "jpgs/" . $img;
}

function commonHeader($title) {
	global $PHP_SELF, $HTTP_REFERER, $FONTFACE, $COUNTRIES;
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
}
   
function change(Name,No) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_" + Name + No + ".src");
	}
	if (No == 1) {
		if (NS4 || IE4 && (layers == 1)) {
			hideLayer('mirrorsKick');
			hideLayer('searchKick');
		}
		if (Name != 'mirr') {
			change('mirr',0);
		}
		if (Name != 'sear') {
			change('sear',0);
		}
		lastbutton = Name;
	}
}

function hide() {
	if (document.images && (loaded == 1)) {
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
//-->
</SCRIPT>


<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
<TR valign=top>
<TD ALIGN=left width=150 BGCOLOR="#5B69A6">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
<TR VALIGN=top>
<TD ALIGN=left>
<IMG SRC="/new/gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
<?spc(15,67);?><A HREF="index.php3"><IMG SRC="/new/gifs/logo.gif" ALT="PHP3 Home Page" WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
<?spc(1,10);?><BR>
</TD></TR>
<TR VALIGN=top>
<TD ALIGN=left>
<A HREF="downloads.php3" onMouseover="change('down',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-downloads-p.gif" ALT="downloads" WIDTH=129 HEIGHT=30 BORDER=0 NAME="down" hspace=10></A><BR>
<A HREF="docs.php3" onMouseover="change('docs',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-docs-p.gif" ALT="documentation" WIDTH=129 HEIGHT=30 BORDER=0 NAME="docs" hspace=10><BR>
<A HREF="mail.php3" onMouseover="change('mail',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-mailing-p.gif" ALT="mailing list" WIDTH=129 HEIGHT=30 BORDER=0 NAME="mail" hspace=10><BR>
<A HREF="dev.php3" onMouseover="change('dev',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-development-p.gif" ALT="development" WIDTH=129 HEIGHT=30 BORDER=0 NAME="dev" hspace=10><BR>
<A HREF="sites.php3" onMouseover="change('news',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-news-p.gif" ALT="in the news" WIDTH=129 HEIGHT=30 BORDER=0 NAME="news" hspace=10><BR>
<A HREF="links.php3" onMouseover="change('link',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-links-p.gif" ALT="links" WIDTH=129 HEIGHT=30 BORDER=0 NAME="link" hspace=10><BR>
<A HREF="mirrors.php3" onMouseover="change('mirr',1); showLayer('mirrorsKick');"><IMG SRC="/new/gifs/b-mirror-p.gif" ALT="mirror sites" WIDTH=129 HEIGHT=30 BORDER=0 NAME="mirr" hspace=10><BR>
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
if($title=="Show Source"):
	echo "<IMG SRC=\"/new/gifs/b-source-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"sour\">";
	echo "<A HREF=\"$HTTP_REFERER\" onMouseover=\"change('close',1);\" onMouseout=\"hide();\"><IMG SRC=\"/new/gifs/b-close-p.gif\" ALT=\"Close this source page\" WIDTH=75 HEIGHT=30 vspace=9 hspace=5 BORDER=0 NAME=\"close\"></A>";
else:
	echo "<IMG SRC=\"/new/gifs/b-close-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"close\">";
	echo "<A HREF=\"source.php3?page_url=$PHP_SELF\" onMouseover=\"change('sour',1);\" onMouseout=\"hide();\">";
	echo "<IMG SRC=\"/new/gifs/b-source-p.gif\" ALT=\"View the source code for this page\" WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME=\"sour\">";
	echo "</A>";
endif;
echo "<A HREF=\"search.php3\" onMouseover=\"change('sear',1);showLayer('searchKick');\" ><IMG SRC=\"/new/gifs/b-search-p.gif\" ALT=\"Search this site\" WIDTH=75 HEIGHT=30 vspace=9 BORDER=0 NAME=\"sear\"></A>";
echo "<IMG SRC=\"/new/gifs/cap-right.gif\" WIDTH=24 HEIGHT=48 BORDER=0><BR>";
?>
</TD></TR></TABLE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width="100%">
<TR VALIGN=top BGCOLOR="#FFFFFF">
<TD ALIGN=left WIDTH="12"><IMG SRC="/new/gifs/corner-ul.gif" WIDTH=12 HEIGHT=12 BORDER=0></TD>
<TD ALIGN=left WIDTH="100%"><FONT FACE="<? echo $FONTFACE;?>"><BR>
<!-- start body -->
<?
};

function commonFooter() {
	global $MIRRORS,$MYSITE,$FONTFACE, $COUNTRIES;
	$country=$MIRRORS[$MYSITE][0];
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
<A HREF="credits.php3" onMouseover="change('cred',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-credits-p.gif" ALT="Who is responsible for this?" WIDTH=129 HEIGHT=30 BORDER=0 hspace=10 NAME="cred"></A><BR>
<A HREF="#top" onMouseover="change('top',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-top-p.gif" ALT="Scroll back to the top of this page" WIDTH=129 HEIGHT=30 BORDER=0 hspace=10 NAME="top"></A><BR>
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
document.writeln("<? kickFooter("mirrorsKick","mirr");?></DIV>");

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
document.writeln("<? kickFooter("searchKick","sear");?></DIV>");

layers = 1;

//--->
</SCRIPT>

</BODY>
</HTML>
<?
};
?>
