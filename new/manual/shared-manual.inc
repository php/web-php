<?
function manualHeader($THIS_FUNC, $PREV_FUNC, $PREV_URL, $NEXT_FUNC, $NEXT_URL) {
	global $PHP_SELF;
?>
<HTML>
<HEAD>
<TITLE>PHP3 Manual: <? echo $function_name;?></TITLE>

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

function LoadImgs () {
	if (document.images) {
		b_next0 = new Image();
		b_next0.src = "gifs/b-next-p.gif";
		b_next1 = new Image();
		b_next1.src = "gifs/b-next-c.gif";

		b_nextb0 = new Image();
		b_nextb0.src = "gifs/b-next-p.gif";
		b_nextb1 = new Image();
		b_nextb1.src = "gifs/b-next-c.gif";

		b_prev0 = new Image();
		b_prev0.src = "gifs/b-prev-p.gif";
		b_prev1 = new Image();
		b_prev1.src = "gifs/b-prev-c.gif";

		b_prevb0 = new Image();
		b_prevb0.src = "gifs/b-prev-p.gif";
		b_prevb1 = new Image();
		b_prevb1.src = "gifs/b-prev-c.gif";

		b_sear0 = new Image();
		b_sear0.src = "gifs/b-search-p.gif";
		b_sear1 = new Image();
		b_sear1.src = "gifs/b-search-c.gif";

		b_sour0 = new Image();
		b_sour0.src = "gifs/b-source-p.gif";
		b_sour1 = new Image();
		b_sour1.src = "gifs/b-source-c.gif";

		b_close0 = new Image();
		b_close0.src = "gifs/b-close-p.gif";
		b_close1 = new Image();
		b_close1.src = "gifs/b-close-c.gif";

		loaded = 1;
	}
}
   
function change(Name,No,Msg) {
	if (document.images && (loaded == 1)) {
		document[Name].src = eval("b_" + Name + No + ".src");
	}
	return true
}

function hideAll () {
	if (document.images && (loaded == 1)) {
		change('next',0);
		change('prev',0);
		change('nextb',0);
		change('prevb',0);
		change('sear',0);
		change('sour',0);
		change('close',0);
	}
}

if (IE4) LoadImgs();

//--->
</SCRIPT>

</HEAD>

<BODY OnLoad="LoadImgs()" BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#4040ff" VLINK="#404040" ALINK="#00FF00" MARGINHEIGHT=3 MARGINWIDTH=5>
<A NAME="top">
<FONT FACE="TAHOMA,ARIAL">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100% BACKGROUND="../gifs/background-p.gif" BGCOLOR="#5B69A6">
<TR valign=top>
<TD ALIGN=left WIDTH=125>
<IMG SRC="gifs/p-cap-left.gif" WIDTH=24 HEIGHT=48 BORDER=0><A HREF="../index.php3"><IMG SRC="gifs/lil-logo.gif" ALT="PHP3 Main page" WIDTH=89 HEIGHT=46 BORDER=0 vspace=1></A><BR>
</TD>
<TD ALIGN=left valign=middle width=50%><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=+2>&nbsp;<B>Manual</B><BR>
</TD>
<TD ALIGN=right width=50%>
<?
if($THIS_FUNC=="Show Source"):
	echo "<IMG SRC=\"gifs/b-source-p.gif\" ALT=\"View the source code for this page\" WIDTH=1 HEIGHT=1 hspace=5 vspace=9 BORDER=0 NAME=\"sour\">";
else:
	echo "<A HREF=\"source-manual.php3?page_url=$PHP_SELF\" onMouseover=\"hideAll();change('sour',1);\" onMouseout=\"hideAll();\">";
	echo "<IMG SRC=\"gifs/b-source-p.gif\" ALT=\"View the source code for this page\" WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME=\"sour\">";
	echo "</A>";
endif;
?><A HREF="../search.php3" onMouseover="hideAll();change('sear',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-search-p.gif" ALT="Search this site" WIDTH=75 HEIGHT=30 vspace=9 BORDER=0 NAME="sear"></A><A HREF="../index.php3" onMouseover="hideAll();change('close',1);" onMouseout="hideAll();"><IMG SRC="gifs/b-close-p.gif" ALT="close" WIDTH=75 HEIGHT=30 hspace=5 vspace=9 BORDER=0 NAME="close"></A><IMG SRC="gifs/p-cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
</TR></TABLE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100% BGCOLOR="#C0C0C0">
<TR valign=middle>
<TD ALIGN=left width=24><IMG SRC="gifs/cap-left.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
<TD ALIGN=left><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=-2>
<? if($PREV_FUNC==""):
	echo "<IMG SRC=\"gifs/b-prev-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"prev\"><BR><IMG SRC=\"gifs/spacer.gif\" WIDTH=100 HEIGHT=1 BORDER=0><BR>";
else:
	echo "<A HREF=\"$PREV_URL\" onMouseover=\"hideAll();change('prev',1);\" onMouseout=\"hideAll();\"><IMG SRC=\"gifs/b-prev-p.gif\" ALT=\"prev\" WIDTH=75 HEIGHT=21 BORDER=0 NAME=\"prev\"></A><BR>";
	echo "$PREV_FUNC<BR>";
endif;?></TD>
<TD ALIGN=center width=100%><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=+1>
<? echo $THIS_FUNC;?><BR></TD>
<TD ALIGN=right><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=-2>
<? if($NEXT_FUNC==""):
	echo "<IMG SRC=\"gifs/b-next-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"next\"><IMG SRC=\"gifs/spacer.gif\" WIDTH=100 HEIGHT=1 BORDER=0><BR>";
else:
	echo "<A HREF=\"$NEXT_URL\" onMouseover=\"hideAll();change('next',1);\" onMouseout=\"hideAll();\"><IMG SRC=\"gifs/b-next-p.gif\" ALT=\"next\" WIDTH=75 HEIGHT=21 BORDER=0 NAME=\"next\"></A><BR>";
	echo "$NEXT_FUNC<BR>";
endif;?></TD>
<TD ALIGN=left width=24><IMG SRC="gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
</TR></TABLE>
<BLOCKQUOTE>
<?
};

function manualFooter($THIS_FUNC, $PREV_FUNC, $PREV_URL, $NEXT_FUNC, $NEXT_URL) {
?>
</BLOCKQUOTE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100% BGCOLOR="#C0C0C0">
<TR valign=middle>
<TD ALIGN=left width=24><IMG SRC="gifs/cap-left.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
<TD ALIGN=left><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=-2>
<? if($PREV_FUNC==""):
	echo "<IMG SRC=\"gifs/b-prev-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"prevb\"><BR><IMG SRC=\"gifs/spacer.gif\" WIDTH=100 HEIGHT=1 BORDER=0><BR>";
else:
	echo "<A HREF=\"$PREV_URL\" onMouseover=\"hideAll();change('prevb',1);\" onMouseout=\"hideAll();\"><IMG SRC=\"gifs/b-prev-p.gif\" ALT=\"prev\" WIDTH=75 HEIGHT=21 BORDER=0 NAME=\"prevb\"></A><BR>";
	echo "$PREV_FUNC<BR>";
endif;?></TD>
<TD ALIGN=center width=100%><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=+1>
<? echo $THIS_FUNC;?><BR></TD>
<TD ALIGN=right><FONT FACE="TAHOMA,ARIAL" COLOR="#000000" SIZE=-2>
<? if($NEXT_FUNC==""):
	echo "<IMG SRC=\"gifs/b-next-p.gif\" WIDTH=1 HEIGHT=1 BORDER=0 NAME=\"nextb\"><BR><IMG SRC=\"gifs/spacer.gif\" WIDTH=100 HEIGHT=1 BORDER=0><BR>";
else:
	echo "<A HREF=\"$NEXT_URL\" onMouseover=\"hideAll();change('nextb',1);\" onMouseout=\"hideAll();\"><IMG SRC=\"gifs/b-next-p.gif\" ALT=\"next\" WIDTH=75 HEIGHT=21 BORDER=0 NAME=\"nextb\"></A><BR>";
	echo "$NEXT_FUNC<BR>";
endif;?></TD>
<TD ALIGN=left width=24><IMG SRC="gifs/cap-right.gif" WIDTH=24 HEIGHT=48 BORDER=0><BR></TD>
</TR></TABLE>
<BR>
</BODY></HTML>
<?
};
?>
