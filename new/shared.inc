<?
require("site.inc");

$MIRRORS = array(
   "http://ca.php.net/"         => array("ca", "Toronto, Canada"),
   "http://il.php.net/"         => array("il", "Netvision, Israel"),
   "http://machba.il.php.net/"  => array("il", "Technion, Israel"),
   "http://no.php.net/"         => array("no", "Trondheim, Norway"),
   "http://uk.php.net/"         => array("uk", "Norwich, United Kingdom"),
   "http://www.php.net/"        => array("us", "Circle Net, United States")
);

function kickHeader($offset) {
	echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>";
	echo "<TR VALIGN=top>";
	echo "<TD rowspan=3><IMG SRC='gifs/spacer.gif' WIDTH=1 HEIGHT=$offset BORDER=0><BR><IMG SRC='gifs/black.gif' WIDTH=13 HEIGHT=3 BORDER=0><BR></TD>";
	echo "<TD><IMG SRC='gifs/kick-ctl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD BACKGROUND='gifs/kick-bt.gif'><IMG SRC='gifs/spacer.gif' WIDTH=1 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD><IMG SRC='gifs/kick-ctr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
	echo "</TR>";
	echo "<TR VALIGN=top>";
	echo "<TD BACKGROUND='gifs/kick-bl.gif'><IMG SRC='gifs/spacer.gif' WIDTH=9 HEIGHT=1 BORDER=0><BR></TD>";
	echo "<TD BACKGROUND='gifs/kick-bg.gif'><FONT FACE='TAHOMA,ARIAL' SIZE=-1>";
};

function kickFooter() {
	echo "</TD>";
	echo "<TD BACKGROUND='gifs/kick-br.gif'><IMG SRC='gifs/spacer.gif' WIDTH=10 HEIGHT=1 BORDER=0><BR></TD></TR>";
	echo "<TR VALIGN=top>";
	echo "<TD><IMG SRC='gifs/kick-cbl.gif' WIDTH=9 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD BACKGROUND='gifs/kick-bb.gif'><IMG SRC='gifs/spacer.gif' WIDTH=1 HEIGHT=10 BORDER=0><BR></TD>";
	echo "<TD><IMG SRC='gifs/kick-cbr.gif' WIDTH=10 HEIGHT=10 BORDER=0><BR></TD>";
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
	return $root_url . "gifs/" . $img;
}

function jpgurl($img) {
	global $root_url;
	return $root_url . "jpgs/" . $img;
}

function commonHeader($title) {
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
	if (NS4 || IE4) {
		eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="visible"');
	}	
}
        
function hideLayer(layerName){
	if (NS4 || IE4) {
		eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="hidden"');
	}	
}

loaded = 0

function LoadImgs () {
	if (document.images) {
		b_down0 = new Image();
		b_down0.src = "gifs/b-downloads-p.gif";
		b_down1 = new Image();
		b_down1.src = "gifs/b-downloads-c.gif";

		b_docs0 = new Image();
		b_docs0.src = "gifs/b-docs-p.gif";
		b_docs1 = new Image();
		b_docs1.src = "gifs/b-docs-c.gif";

		b_mail0 = new Image();
		b_mail0.src = "gifs/b-mailing-p.gif";
		b_mail1 = new Image();
		b_mail1.src = "gifs/b-mailing-c.gif";

		b_dev0 = new Image();
		b_dev0.src = "gifs/b-development-p.gif";
		b_dev1 = new Image();
		b_dev1.src = "gifs/b-development-c.gif";

		b_news0 = new Image();
		b_news0.src = "gifs/b-news-p.gif";
		b_news1 = new Image();
		b_news1.src = "gifs/b-news-c.gif";

		b_link0 = new Image();
		b_link0.src = "gifs/b-links-p.gif";
		b_link1 = new Image();
		b_link1.src = "gifs/b-links-c.gif";

		b_mirr0 = new Image();
		b_mirr0.src = "gifs/b-mirror-p.gif";
		b_mirr1 = new Image();
		b_mirr1.src = "gifs/b-mirror-c.gif";

		b_top0 = new Image();
		b_top0.src = "gifs/b-top-p.gif";
		b_top1 = new Image();
		b_top1.src = "gifs/b-top-c.gif";

		b_sear0 = new Image();
		b_sear0.src = "gifs/b-search-p.gif";
		b_sear1 = new Image();
		b_sear1.src = "gifs/b-search-c.gif";

		b_sour0 = new Image();
		b_sour0.src = "gifs/b-source-p.gif";
		b_sour1 = new Image();
		b_sour1.src = "gifs/b-source-c.gif";

		loaded = 1
	}
}
   
function change(Name,No,Msg) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_" + Name + No + ".src");
	}
	return true
}

function hideAll () {
	change('down',0);
	change('docs',0);
	change('mail',0);
	change('dev',0);
	change('news',0);
	change('link',0);
	change('mirr',0);
	change('top',0);
	change('sear',0);
	change('sour',0);
	if (NS4 || IE4) {
		hideLayer('mirrorsKick');
	}
}

if (IE4) LoadImgs();

//--->
</SCRIPT>

<!-- Kick outs -->
<SCRIPT LANGUAGE="Javascript1.2">
<!--  
document.write("<STYLE TYPE='text/css'>");
document.write("#mirrorsKick {POSITION: absolute; Z-INDEX: 20; VISIBILITY: hidden; TOP: 220 px; LEFT: 144px;}");
document.write("</STYLE>");
//--->
</SCRIPT>


</HEAD>

<BODY OnLoad="LoadImgs()" BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#4040ff" VLINK="#404040" ALINK="#00FF00" MARGINHEIGHT=3 MARGINWIDTH=5>
<A NAME="top">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>
<TR valign=top>
<TD ALIGN=left width=150>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=150 BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6">
<TR VALIGN=top>
<TD ALIGN=left>
<IMG SRC="gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
<IMG SRC="gifs/spacer.gif" WIDTH=15 HEIGHT=1 BORDER=0><A HREF="index.php3"><IMG SRC="gifs/logo.gif" ALT="PHP3 Home Page" WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
<IMG SRC="gifs/spacer.gif" WIDTH=1 HEIGHT=10 BORDER=0><BR>
</TD></TR>
<TR VALIGN=top BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6">
<TD ALIGN=left>
<A HREF="downloads.php3" onMouseover="change('down',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-downloads-p.gif" ALT="downloads" WIDTH=129 HEIGHT=30 BORDER=0 NAME="down" hspace=10></A><BR>
<A HREF="docs.php3" onMouseover="hideAll();change('docs',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-docs-p.gif" ALT="documentation" WIDTH=129 HEIGHT=30 BORDER=0 NAME="docs" hspace=10><BR>
<A HREF="mail.php3" onMouseover="hideAll();change('mail',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-mailing-p.gif" ALT="mailing list" WIDTH=129 HEIGHT=30 BORDER=0 NAME="mail" hspace=10><BR>
<A HREF="dev.php3" onMouseover="hideAll();change('dev',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-development-p.gif" ALT="development" WIDTH=129 HEIGHT=30 BORDER=0 NAME="dev" hspace=10><BR>
<A HREF="news.php3" onMouseover="hideAll();change('news',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-news-p.gif" ALT="in the news" WIDTH=129 HEIGHT=30 BORDER=0 NAME="news" hspace=10><BR>
<A HREF="links.php3" onMouseover="hideAll();change('link',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-links-p.gif" ALT="links" WIDTH=129 HEIGHT=30 BORDER=0 NAME="link" hspace=10><BR>
<A HREF="mirrors.php3" onMouseover="hideAll();change('mirr',1); showLayer('mirrorsKick')"><IMG SRC="gifs/b-mirror-p.gif" ALT="mirror sites" WIDTH=129 HEIGHT=30 BORDER=0 NAME="mirr" hspace=10><BR>
</TD></TR>
</TABLE>
</TD>
<TD align=left width="100%">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width=100%>
<TR VALIGN=middle BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6">
<TD ALIGN=left><IMG SRC="gifs/spacer.gif" WIDTH=5 HEIGHT=1 BORDER=0><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=+1><B>
<!-- start title -->
<? echo $title;?>
<!-- end title -->
</B></FONT></TD>
<TD ALIGN=right><A HREF="source.php3" onMouseover="hideAll();change('sour',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-source-p.gif" ALT="View the source code for this page" WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME="sour"></A><A HREF="search.p
hp3" onMouseover="hideAll();change('sear',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-search-p.gif" ALT="Search this site" WIDTH=75 HEIGHT=30 vspace=9 BORDER=0 NAME="sear"></A><IMG SRC="gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD></TR>
</TABLE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width=100%>
<TR VALIGN=top>
<TD ALIGN=left WIDTH=12><IMG SRC="gifs/corner-ul.gif" WIDTH=12 HEIGHT=12 BORDER=0></TD>
<TD ALIGN=left WIDTH=100%><FONT FACE="TAHOMA,ARIAL"><BR>
<!-- start body -->
<?
};


function commonFooter() {
	global $MIRRORS,$MYSITE;
?>
<!-- end body -->
</TD></TR>
</TABLE>

</TD>
</TR>

<TR valign=top>
<TD ALIGN=left width=150 BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6"><IMG SRC="gifs/spacer.gif" WIDTH=150 HEIGHT=1 BORDER=0></TD>
<TD ALIGN=left width=100%><IMG SRC="gifs/corner-bl.gif" WIDTH=12 HEIGHT=12 BORDER=0></TD>
</TR>

<TR valign=top>
<TD ALIGN=left width=150>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=150 BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6">
<TR VALIGN=bottom>
<TD ALIGN=left>
<IMG SRC="gifs/spacer.gif" WIDTH=1 HEIGHT=9 BORDER=0><BR>
<A HREF="#top" onMouseover="hideAll();change('top',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-top-p.gif" ALT="Scroll back to the top of this page" WIDTH=129 HEIGHT=30 BORDER=0 hspace=10 NAME="top"></A><BR>
<IMG SRC="gifs/cap-bl.gif" WIDTH=9 HEIGHT=9 BORDER=0></TD>
</TR>
</TABLE>

</TD><TD align=left width=100%>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width=100%>
<TR VALIGN=middle BACKGROUND="gifs/background-p.gif" BGCOLOR="#5B69A6">
<TD ALIGN=right width=100%>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR VALIGN=middle><TD align=right><FONT FACE="TAHOMA,ARIAL" SIZE=-1>
<I>Site Hosted by:</I><BR><? echo $MIRRORS[$MYSITE][1]; ?><BR></TD>
<TD><IMG SRC="gifs/spacer.gif" WIDTH=10 HEIGHT=36 BORDER=0><IMG SRC="gifs/flag-<? echo $MIRRORS[$MYSITE][0]; ?>.gif" WIDTH=64 HEIGHT=36 BORDER=0><BR></TD>
<TD><IMG SRC="gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
</TR></TABLE>

</TD></TR>
</TABLE>

</TD></TR>
</TABLE>

<!-- Kick outs -->
<SCRIPT LANGUAGE="Javascript1.2">
<!--  

document.write("<DIV ID='mirrorsKick'>");
document.write("<?kickHeader(62);?>");
document.write("<FORM ACTION='redirect.php3' METHOD='POST'>");
document.write("<B>Pick a mirror site close to you:</B><BR>");
document.write("<SELECT NAME='URL'>");
document.write("<?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
while ($site = key($mirror_sites)):
	next($mirror_sites);
	$place=$mirror_sites[$site][1];
	echo "<OPTION VALUE='$site'>$place";
endwhile;
?>");
document.write("</SELECT><INPUT TYPE='image' SRC='gifs/b-go.gif' ALIGN=absmiddle WIDTH=36 HEIGHT=21 BORDER=0></FORM>");
document.write("<? kickFooter();?></DIV>");

//-->
</SCRIPT>

</BODY>
</HTML>
<?
};
?>
