<?php // -*- C++ -*-
require("shared.inc");

$FRAMEMODE="manual";

$navBarNo = "";

$NEXT = $PREV = $UP = $HOME = array(false, false);
$TOC = array();

function setupNavigation($data) {
    global $NEXT, $PREV, $UP, $HOME, $TOC;
    $HOME = @$data["home"];
    $NEXT = @$data["next"];
    $PREV = @$data["prev"];
    $UP   = @$data["up"];
    $TOC =  @$data["toc"];
};

function makeBullet($url,$number,$offtype,$offnum) {
	echo "<A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$number',1)\" \n ";
	echo "onMouseout=\"changebullet('bullet$number',$offnum)\">";
	echo "<IMG SRC=\"/new/gifs/b-bullet-$offtype.gif\" \n WIDTH=10 HEIGHT=10 HSPACE=2 VSPACE=2 BORDER=0 \n NAME=\"bullet$number\">";
	echo "</A>";
};

function makeBorderTOC($this) {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACE;
    echo "<TABLE BORDER=0 CELLPADDING=1 CELLSPACING=0 WIDTH=\"100%\">\n";
    echo "<TR VALIGN=top>\n";
    echo "<TD WIDTH=10>";
    spc(10, 10);
    echo "<BR></TD>\n";
    echo "<TD COLSPAN=2><FONT SIZE=-1 FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\">";
    echo "<A HREF=\"$UP[0]\" onMouseover=\"hide();\" CLASS=sidebartoc>";
    echo "<B>$UP[1]</B></A></TD></TR>\n";
    for ($i = 0; $i < count($TOC); $i++) {
	list($url, $title) = $TOC[$i];
	if (!$url || !$title) {
	    continue;
	}
	if ($title == $this) {
	    $type = "w";
	    $out = 2;
	} else {
	    $type = "p";
	    $out = 0;
	}
	if ($UP[0] == 'funcref.php3') {
	    $title = eregi_replace(" functions\$", "", $title);
	}
	echo "<TR VALIGN=top><TD WIDTH=10>";
	spc(10,10);
	echo "<BR>\n</TD>\n<TD WIDTH=15 ALIGN=left><FONT SIZE=-1 FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\">";
	makeBullet($url,$i,$type,$out);
	echo "<BR>\n</TD>\n<TD WIDTH=100%><FONT FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\" SIZE=-1><A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$i',1)\" onMouseout=\"changebullet('bullet$i',$out)\" CLASS=sidebartoc>$title<BR></A></TD></TR>\n";
    }
    echo "</TABLE>\n";
};

function navigationBar($title) {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACE;
    global $navBarNo;
    $no = $navBarNo;
    if ($title!="Show Source") {
	echo("<!-- start next/prev -->\n");
	echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
	echo "<TR VALIGN=middle>\n";
	echo "<TD ALIGN=left WIDTH=18><IMG SRC='/new/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	if ($PREV[0] && $PREV[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$PREV[0]\" onMouseover=\"change('prev$no',1);\" onMouseout=\"hide();\"><IMG SRC='/new/gifs/b-prev-p.gif' ALT='Previous page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=left WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV[1]<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT[1]&nbsp;<BR></TD>\n";
	if ($NEXT[0] && $NEXT[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT[0]\" onMouseover=\"change('next$no',1);\" onMouseout=\"hide();\"><IMG SRC='/new/gifs/b-next-p.gif' ALT='Next page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/new/gifs/gcap-right.gif' WIDT=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE>\n";
	echo "<BR>\n";
	$navBarNo = (string)((int)$navBarNo + 2);
    }
}

function manualHeader($title) {
	global $FRAMEMODE;
	commonHeader("Manual");
	navigationBar($title);
}

function manualFooter($title) {
	navigationBar($title);
	commonFooter($title);
}
?>
