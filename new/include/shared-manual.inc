<?php // -*- C++ -*-

require("shared.inc");

$navBarNo = "";
$jsfunc['change'] = "manual_jsfunc_change";
$jsfunc['LoadImgs'] = "manual_jsfunc_loadimgs";
$func['sidebar'] = "manual_func_sidebar";

$NEXT = $PREV = $UP = $HOME = array(false, false);
$TOC = array();

function setupNavigation($data)
{
    global $NEXT, $PREV, $UP, $HOME, $TOC;
    $HOME = @$data["home"];
    $NEXT = @$data["next"];
    $PREV = @$data["prev"];
    $UP   = @$data["up"];
    $TOC =  @$data["toc"];
}

function makeBorderTOC($this)
{
    global $NEXT, $PREV, $UP, $HOME, $TOC;

    echo "<TABLE BORDER=0 CELLPADDING=1 CELLSPACING=0 WIDTH=\"100%\">\n";
    echo "<TR VALIGN=top>\n";
    echo "<TD>";
    spc(10, 10);
    echo "</TD>\n";
    echo "<TD COLSPAN=2><FONT SIZE=-1 FACE=\"$FONTFACE\">";
    echo "<A HREF=\"$cat_url\" onMouseover=\"hide();\" CLASS=white>";
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
	echo "<TR VALIGN=top><TD>";
	spc(10,10);
	echo "</TD>\n<TD WIDTH=15><A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$i',1)\" onMouseout=\"changebullet('bullet$i',$out)\"><IMG SRC=\"/new/gifs/b-bullet-$type.gif\" WIDTH=10 HEIGHT=10 BORDER=0 NAME=\"bullet$i\"></A>\n";
	echo "</TD>\n<TD WIDTH=100%><FONT FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\" SIZE=-1><A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$i',1)\" onMouseout=\"changebullet('bullet$i',$out)\" CLASS=white>$title<BR></A></TD></TR>\n";
    }
    echo "</TABLE>\n";
};

function navigationBar() {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACE;
    global $navBarNo;
    $no = $navBarNo;
    if ($title!="Show Source") {
	echo("<!-- start next/prev -->\n");
	echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
	echo "<TR VALIGN=middle>\n";
	echo "<TD ALIGN=left WIDTH=18><IMG SRC='/new/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	if ($PREV[0] && $PREV[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$PREV[0]\" onMouseover=\"change('prev$no',1);\" onMouseout=\"hide();\"><IMG SRC='/new/gifs/b-prev-p.gif' ALT='Previous' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=left WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV[1]<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT[1]&nbsp;<BR></TD>\n";
	if ($NEXT[0] && $NEXT[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT[0]\" onMouseover=\"change('next$no',1);\" onMouseout=\"hide();\"><IMG SRC='/new/gifs/b-next-p.gif' ALT='Next' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/new/gifs/gcap-right.gif' WIDT=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE>\n";
	echo "<BR>\n";
	$navBarNo = (string)((int)$navBarNo + 2);
    }
}


function manual_jsfunc_change() {
    global $HAVE_LAYERS; ?>
function change(Name,No) {
    if (document.images && (loaded == 1)) {
	document[Name].src = eval("b_" + Name + No + ".src");
    }
    if (No == 1) {
        <? if ($HAVE_LAYERS) { ?> if (layers) {
	    hideLayer('searchKick');
	} <? } ?>
        if (Name != 'sear') {
	    change('sear',0);
	}
	lastbutton = Name;
    }
} <? } /* function manual_jsfunc_change() */


function manual_jsfunc_loadimgs() { ?>
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
	
	b_bullet0 = new Image();
	b_bullet0.src = "/new/gifs/b-bullet-p.gif";
	b_bullet1 = new Image();
	b_bullet1.src = "/new/gifs/b-bullet-c.gif";
	b_bullet2 = new Image();
	b_bullet2.src = "/new/gifs/b-bullet-w.gif";
	
	loaded = 1;
    }
} <? } /* function manual_jsfunc_loadimgs() */


function manual_func_sidebar() {
?>
   <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH="150">
    <TR VALIGN=top>
     <TD ALIGN=left>
      <IMG SRC="/new/gifs/cap-ul.gif" WIDTH=9 HEIGHT=9 BORDER=0><BR>
      <?spc(15,67);?><A HREF="/new/index.php3"><IMG SRC="/new/gifs/logo.gif" ALT="PHP3 Home Page" WIDTH=130 HEIGHT=67 BORDER=0></A><BR>
      <?spc(1,10);?><BR>
     </TD>
    </TR>
    <TR VALIGN=top>
     <TD ALIGN=left>
      <A HREF="<? echo $HOME[0] ?>" onMouseover="change('cont',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-contents-p.gif" ALT="contents" WIDTH=129 HEIGHT=30 BORDER=0 NAME="cont" hspace=10></A><BR>
      <A HREF="<? echo $UP[0];?>" onMouseover="change('up',1);" onMouseout="hide();"><IMG SRC="/new/gifs/b-up-p.gif" ALT="up to <? echo $UP[1];?>" WIDTH=129 HEIGHT=30 BORDER=0 NAME="up" hspace=10><BR>
      <? makeBorderTOC($title);?>
     </TD>
    </TR>
   </TABLE>
<?
}

function manualHeader($title) {
    commonHeader("Manual: $title");
    navigationBar();
}

function manualFooter($title) {
    navigationBar();
    commonFooter($title);
}
?>
