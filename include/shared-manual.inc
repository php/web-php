<?php // -*- C++ -*-
require("shared.inc");

$FRAMEMODE="manual";

$navBarNo = "";

$NEXT = $PREV = $UP = $HOME = array(false, false);
$TOC = array();

function setupNavigation($data) {
    global $NEXT, $PREV, $UP, $HOME, $TOC;
    $HOME = @$data["home"];
    $HOME[0] = "./";
    $NEXT = @$data["next"];
    $PREV = @$data["prev"];
    $UP   = @$data["up"];
    $TOC =  @$data["toc"];
}

function makeBullet($url,$number,$offtype,$offnum) {
	echo "<A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$number',1)\" \n";
	echo "onMouseout=\"changebullet('bullet$number',$offnum)\">";
	echo "<IMG SRC=\"/gifs/b-bullet-$offtype.gif\" \n WIDTH=10 HEIGHT=10 HSPACE=2 VSPACE=2 BORDER=0 \n ALT=\"*\" NAME=\"bullet$number\">";
	echo "</A>";
}

function makeBorderTOC($this)
{
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACEATTR;
    global $HAVE_STYLE, $HAVE_TD_BG;

    $tocfontsize = "-1"; // replace with CSS?

    $FONTCOL = " COLOR=\"#FFFFFF\"";

    echo "<TABLE BORDER=0 CELLPADDING=1 CELLSPACING=0 WIDTH=\"100%\">\n";
    echo "<TR VALIGN=top>\n";
    echo "<TD WIDTH=10>";
    spc(10, 10);
    echo "</TD>\n";
    echo "<TD COLSPAN=2><A HREF=\"$UP[0]\" onMouseover=\"hide();\" CLASS=sidebartoc>";
    echo "<FONT SIZE=\"$tocfontsize\"".$FONTCOL.$FONTFACEATTR.">";
    echo "<B>$UP[1]</B></FONT></A></TD></TR>\n";
    $this = eregi_replace("^Manual: *", "", $this);
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
	echo "</TD>\n<TD WIDTH=15><A HREF=\"$url\" ";
	echo "onMouseover=\"hide();changebullet('bullet$i',1)\" \n";
	echo "onMouseout=\"changebullet('bullet$i',$out)\">";
	echo "<IMG SRC=\"/gifs/b-bullet-$type.gif\" WIDTH=10 HEIGHT=10 ALT=\"*\" BORDER=0 NAME=\"bullet$i\"></A>\n";
	echo "</TD>\n<TD WIDTH=100%>";
	echo "<A HREF=\"$url\" onMouseover=\"hide();";
	echo "changebullet('bullet$i',1)\" \n ";
	echo "onMouseout=\"changebullet('bullet$i',$out)\" \n";
	echo "CLASS=sidebartoc>";
	echo "<FONT SIZE=\"$tocfontsize\"".$FONTCOL.$FONTFACEATTR.">";
	echo "$title</FONT></A></TD></TR>\n";
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
	echo "<TD ALIGN=left WIDTH=18><IMG SRC='/gifs/gcap-left.gif' ALT=' ' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	if ($PREV[0] && $PREV[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$PREV[0]\" onMouseover=\"change('prev$no',1);\" onMouseout=\"hide();\"><IMG SRC='/gifs/b-prev-p.gif' ALT='Previous page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=left WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV[1]<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=50%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT[1]&nbsp;<BR></TD>\n";
	if ($NEXT[0] && $NEXT[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT[0]\" onMouseover=\"change('next$no',1);\" onMouseout=\"hide();\"><IMG SRC='/gifs/b-next-p.gif' ALT='Next page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/gifs/gcap-right.gif' alt=' ' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE>\n";
	echo "<BR>\n";
	$navBarNo = (string)((int)$navBarNo + 2);
    }
}

function manualPrintNote(const $row, $num) {
       if ($num % 2 == 0) { $color = '#ccddee'; }
       else { $color = '#ddeeff'; }
       echo "<TR><TD bgcolor=$color valign=top><B>";
        # turn email address into mailto: links (roughly)
       echo ereg_replace("([^;[:space:]]+@[^&[:space:]]+)", "<A href=\"mailto:\\1\">\\1</A>", $row[user]);
	if (isset($row['ts'])) {
		echo "<BR>$ts";
	}
       echo "</B></TD><TD bgcolor=$color>$row[note]</TD></TR>\n";
}

function manualUserNotes($title) {
	global $MYSITE;
	if(strstr($MYSITE,"ca.php.net")) {
		$host = 'localhost'; $user = ''; $pass = '';
		$db_id = mysql_pconnect($host, $user, $pass);

		$result_id = mysql_db_query("php3","SELECT * FROM note WHERE sect = '$title' ORDER BY id", $db_id);
	} else $result_id = 0;
	echo '<FORM method="POST" action="http://ca.php.net/manual/add-note.php3">';
	echo '<TABLE width="100%">'."\n";
	if ($result_id && mysql_num_rows($result_id) > 0) {
		echo '<TD colspan=2 bgcolor="#aabbcc">User-contributed Notes</TD>',"\n";
		$num = 0;
		while ($result = mysql_fetch_array($result_id)) {
			manualPrintNote($result, $num++);
		}
	}
	echo "<TR><TD colspan=2 align=right>";
	echo '<INPUT type=hidden name="sect" value="'.$title.'">';
	global $PHP_SELF, $SERVER_NAME, $SERVER_PORT;
	$back_url = "http://$SERVER_NAME".(($SERVER_PORT==80)?"":":".$SERVER_PORT).$PHP_SELF;
	echo '<INPUT type=hidden name="redirect" value="'.$back_url.'">';
	echo '<INPUT type=submit value="Add Note">';
	echo "<SMALL><A href=\"/manual/about-notes.php3\">About</A></SMALL>\n";
	echo "</TD></TR></TABLE></FORM>\n";
}

function manualHeader($title) {
	global $FRAMEMODE, $HTDIG;
	commonHeader("Manual: $title");
	if (!$HTDIG):
		navigationBar($title);
	endif;
}

function manualFooter($title) {
	global $HTDIG;
	if (!$HTDIG):
               manualUserNotes($title);
		navigationBar($title);
	endif;
	commonFooter($title);
}
?>
