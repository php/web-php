<?php // -*- C++ -*-
require("shared.inc");

$FRAMEMODE="manual";

$navBarNo = "";

$NEXT = $PREV = $UP = $HOME = array(false, false);
$TOC = array();

function setupNavigation($data) {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $tstamp;
    $HOME = @$data["home"];
    $HOME[0] = "./";
    $NEXT = @$data["next"];
    $PREV = @$data["prev"];
    $UP   = @$data["up"];
    $TOC =  @$data["toc"];
	$tstamp = gmdate("D, d M Y",getlastmod());
}

function makeBullet($url,$number,$offtype,$offnum) {
	echo "<A HREF=\"$url\" onMouseover=\"hide();changebullet('bullet$number',1)\" \n";
	echo "onMouseout=\"changebullet('bullet$number',$offnum)\">";
	echo "<IMG SRC=\"/gifs/b-bullet-$offtype.gif\" \n WIDTH=10 HEIGHT=10 HSPACE=2 VSPACE=2 BORDER=0 \n ALT=\"*\" NAME=\"bullet$number\">";
	echo "</A>";
}

function makeBorderTOC($this)
{
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACEATTR, $PHP_SELF, $DOCUMENT_ROOT;
    global $HAVE_STYLE, $HAVE_TD_BG;

    $tocfontsize = "-1"; // replace with CSS?

    $FONTCOL = " COLOR=\"#FFFFFF\"";

    echo "<TABLE BORDER=0 CELLPADDING=1 CELLSPACING=0 WIDTH=\"100%\">\n";
    $this = eregi_replace("^Manual: *", "", $this);

	$cur = substr(dirname($PHP_SELF),-3);
	$file = basename($PHP_SELF);
	echo "<TR VALIGN=top>\n";	
    echo "<TD COLSPAN=3>";
	if(substr($file,-5)=='.php3') $file = substr($file,0,-1);
	echo "<a href=\"/manual/en/$file\"><img src=\"/gifs/flag-uk.gif\" valign=bottom height=24 width=45 alt=\"English version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/de/$file")) echo "<a href=\"/manual/de/$file\"><img src=\"/gifs/flag-de.gif\" valign=bottom height=24 width=45 alt=\"German version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/ja/$file")) echo "<a href=\"/manual/ja/$file\"><img src=\"/gifs/flag-jp.gif\" valign=bottom height=24 width=45 alt=\"Japanese version of this page\"></a><br>";
	if(@is_file("$DOCUMENT_ROOT/manual/it/$file")) echo "<a href=\"/manual/it/$file\"><img src=\"/gifs/flag-it.gif\" valign=bottom height=24 width=45 alt=\"Italian version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/fr/$file")) echo "<a href=\"/manual/fr/$file\"><img src=\"/gifs/flag-fr.gif\" valign=bottom height=24 width=45 alt=\"French version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/hu/$file")) echo "<a href=\"/manual/hu/$file\"><img src=\"/gifs/flag-hu.gif\" valign=bottom height=24 width=45 alt=\"Hungarian version of this page\"></a><br>";
	if(@is_file("$DOCUMENT_ROOT/manual/es/$file")) echo "<a href=\"/manual/es/$file\"><img src=\"/gifs/flag-es.gif\" valign=bottom height=24 width=45 alt=\"Spanish version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/nl/$file")) echo "<a href=\"/manual/nl/$file\"><img src=\"/gifs/flag-nl.gif\" valign=bottom height=24 width=45 alt=\"Dutch version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/pt_BR/$file")) echo "<a href=\"/manual/pt_BR/$file\"><img src=\"/gifs/flag-br.gif\" valign=bottom height=24 width=45 alt=\"Brazilian Portuguese version of this page\"></a>";
	if(@is_file("$DOCUMENT_ROOT/manual/kr/$file")) echo "<a href=\"/manual/kr/$file\"><img src=\"/gifs/flag-kr.gif\" valign=bottom height=24 width=45 alt=\"Korean version of this page\"></a>";
	echo "</TD></TR>\n";

    echo "<TR VALIGN=top>\n";
    echo "<TD WIDTH=10>";
    spc(10, 10);
    echo "</TD>\n";
    echo "<TD COLSPAN=2><A HREF=\"$UP[0]\" onMouseover=\"hide();\" CLASS=sidebartoc>";
    echo "<FONT SIZE=\"$tocfontsize\"".$FONTCOL.$FONTFACEATTR.">";
    echo "<B>$UP[1]</B></FONT></A></TD></TR>\n";

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
	if ($UP[0] == 'funcref.php') {
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
    global $NEXT, $PREV, $UP, $HOME, $TOC, $FONTFACE, $tstamp;
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
	echo "<TD ALIGN=left WIDTH=44%><FONT FACE='$FONTFACE' SIZE=-1>&nbsp;$PREV[1]<BR></FONT></TD>\n";
	echo "<TD ALIGN=center WIDTH=12% nobr><FONT FACE='$FONTFACE' SIZE=-2>&nbsp;Updated<br>$tstamp<BR></FONT></TD>\n";
	echo "<TD ALIGN=right WIDTH=44%><FONT FACE='$FONTFACE' SIZE=-1>$NEXT[1]&nbsp;<BR></FONT></TD>\n";
	if ($NEXT[0] && $NEXT[1]) {
	    echo "<TD ALIGN=left WIDTH=75><A HREF=\"$NEXT[0]\" onMouseover=\"change('next$no',1);\" onMouseout=\"hide();\"><IMG SRC='/gifs/b-next-p.gif' ALT='Next page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next$no' align=absmiddle></A><BR></TD>\n";
	}
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/gifs/gcap-right.gif' alt=' ' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE>\n";
	echo "<BR>\n";
	$navBarNo = (string)((int)$navBarNo + 2);
    }
}


function makeTitle($title) {
        global $FONTFACE;
?>
<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=left><?
        echo "<FONT FACE=\"$FONTFACE\">\n";
        echo "<B>$title</B><BR></FONT>\n";
?></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<?
};

function makeEntry($date,$name,$blurb,$id=0) {
	global $FONTFACE, $MAGIC_COOKIE;
?>
<TR VALIGN=top>
<TD ALIGN=left><? spc(18,18);?><BR></TD>

<TD ALIGN=left BGCOLOR="#E0E0E0">
<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=3 WIDTH=100%>
<TR><TD>
<?
        echo "<FONT FACE=\"$FONTFACE\" SIZE=-1>\n";
	$name = htmlspecialchars($name);
        if (ereg("(.+)@(.+)\.(.+)",$name)) {
                echo "<A HREF=\"mailto:".$name."\">".$name."</A><BR>\n";
        } else {
                echo "<B>".$name."</B><BR>\n";
        }
        echo date("d-M-Y h:i",$date)."<BR>\n";
?>
</TD></TR>
<TR BGCOLOR="#F0F0F0"><TD>
<?
echo clean_note($blurb);
?><BR>
<?if (isset($MAGIC_COOKIE)):?>
<hr noshade size=1>
<A href="/manual/admin-notes.php?action=delete+<?echo $id?>&brief=1&popup=1" target="admin">delete</A> | 
<A href="/manual/admin-notes.php?action=reject+<?echo $id?>&brief=1&popup=1" target="admin">reject</A> | 
<A href="/manual/admin-notes.php?action=edit+<?echo $id?>&brief=1" target="admin">edit</A>
<BR>
<?endif;?>
</TD></TR>
</TABLE>

</TD>
<TD ALIGN=left bgcolor='#ffffff'><? spc(18,18);?><BR></TD>
</TR>  
<?
};

function makeAddNote() {
        global $FONTFACE;
?>
<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=right WIDTH=100%
><INPUT TYPE=image name="addnote" VALUE="Add Note" SRC="/gifs/b-addnote-p.gif" ALT="Add a Note" 
onMouseover="change('addnote',1);" onMouseout="hide();"
WIDTH=100 HEIGHT=21 VSPACE=7 BORDER=0 align=absmiddle
></A
>&nbsp;<A HREF="/manual/about-notes.php" onMouseover="change('abnote',1);" onMouseout="hide();"
><IMG SRC='/gifs/b-about-p.gif' ALT='About Notes' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='abnote' align=absmiddle
></A><BR>
</TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<?
};

function manualGetUserNotes($title, $id)
{
	// if we're www.php.net, get it from the local DB
	// otherwise look in "/manual/usernotes/$title.txt" (if present)
	global $MYSITE;
	$notes = array();
	if(strstr($MYSITE,"www.php.net")) {
#	if(strstr($MYSITE,"www.php.net") || strstr($MYSITE,"localhost")) {
		$host = 'localhost';
#		$host = '127.0.0.1';
		$user = 'nobody';
		$pass = '';
		$db_id = mysql_connect($host, $user, $pass);
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS xwhen FROM note WHERE sect = '$title' OR sect = '$id' ORDER BY id";
		$result_id = mysql_db_query("php3", $query, $db_id);
		if ($result_id && mysql_num_rows($result_id) > 0) {
			while ($row = mysql_fetch_array($result_id)) {
				$notes[] = $row;
			}
		}
	} else {
		$notes_file = "usernotes/" . urlencode( $title ) . ".txt";
		if ( @file_exists( $notes_file ) )
		{
			$fp = @fopen($notes_file,"r");
			if ($fp) {
				$body = fread($fp,filesize($notes_file));
				if (strlen($body)) {
					$notes = @unserialize($body);
				}
				fclose($fp);
			}
		}
	}
	return $notes;
}

function manualUserNotes($title, $id) {
	global $PHP_SELF, $SERVER_NAME, $SERVER_PORT;
	$cur = substr(dirname($PHP_SELF),-2);
	if($cur=='al') $cur='en';
	echo '<FORM method="POST" action="http://www.php.net/manual/add-note.php?lang='.$cur.'">';
	$back_url = "http://$SERVER_NAME".(($SERVER_PORT==80)?"":":".$SERVER_PORT).$PHP_SELF;
	echo '<INPUT type=hidden name="redirect" value="'.$back_url.'">';
	echo '<INPUT type=hidden name="sect" value="'.$title.'">';

	echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 width=100%>\n";

	$notes = manualGetUserNotes($title, $id);
	$num_notes = count($notes);
	if ( $num_notes > 0 ) {
		makeTitle("User Contributed Notes: ".$title);
		for ($i=0; $i<$num_notes; $i++) {
			$note = $notes[$i]; // should use foreach? 
			makeEntry($note['xwhen'],$note['user'],$note['note'],$note['id']);
		}
	}
	makeAddNote();
	echo "</TABLE></FORM>\n";
}

function manualLastModified($title, $id) {
	global $MYSITE, $SCRIPT_FILENAME;
	if(strstr($MYSITE,"www.php.net")) {
		$host = 'localhost';
		$user = 'nobody';
		$pass = '';
		$db_id = mysql_connect($host, $user, $pass);
		$query = "SELECT UNIX_TIMESTAMP(ts) AS stamp FROM note WHERE sect = '$title' OR sect = '$id' ORDER BY ts DESC limit 1";
		$result_id = mysql_db_query("php3", $query, $db_id);
	} else {
		$result_id = 0;
	}
	if($result_id && mysql_num_rows($result_id)) {
		$t = mysql_fetch_row($result_id);
		Header("Last-Modified: ".gmdate("D, d M Y H:i:s",$t[0])." GMT");
	} else {
		Header("Last-Modified: ".gmdate("D, d M Y H:i:s",getlastmod())." GMT");
	}
	if($result_id) mysql_free_result($result_id);
}

function sendManualHeaders($charset,$lang) {
	Header("Content-type: text/html;charset=$charset");
	Header("Content-language: $lang");
}

function manualHeader($title,$id="") {
	global $FRAMEMODE, $HTDIG;
	manualLastModified($title,$id);
	commonHeader("Manual: $title");
	if (!$HTDIG):
		navigationBar($title);
	endif;
}

function manualFooter($title,$id="") {
	global $HTDIG;
	if (!$HTDIG):
		manualUserNotes($title,$id);
		navigationBar($title);
	endif;
	commonFooter($title);
}
?>
