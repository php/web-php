<?php // -*- C++ -*-

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
    echo "<TD COLSPAN=2><FONT SIZE=-1 FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\">";
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
	echo "<TR VALIGN=top><TD>";
	spc(10,10);
	echo "</TD>\n<TD WIDTH=15><A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$i',1)\" onMouseout=\"changebullet('bullet$i',$out)\"><IMG SRC=\"/new/gifs/b-bullet-$type.gif\" WIDTH=10 HEIGHT=10 BORDER=0 NAME=\"bullet$i\"></A>\n";
	echo "</TD>\n<TD WIDTH=100%><FONT FACE=\"$FONTFACE\" COLOR=\"#FFFFFF\" SIZE=-1><A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$i',1)\" onMouseout=\"changebullet('bullet$i',$out)\" CLASS=white>$title<BR></A></TD></TR>\n";
    }
    echo "</TABLE>\n";
};

?>
