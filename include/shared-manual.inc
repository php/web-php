<?php // -*- C++ -*-
require("shared.inc");

$LANGUAGES = array(
    'en' => 'English',
    'pt_BR' => 'Brazilian Portuguese',
    'nl' => 'Dutch',
    'fr' => 'French',
    'de' => 'German',
    'hu' => 'Hungarian',
    'it' => 'Italian',
    'ja' => 'Japanese',
    'kr' => 'Korean',
    'ru' => 'Russian',
    'es' => 'Spanish',
);

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

function makeBorderTOC($this)
{
    global $NEXT, $PREV, $UP, $HOME, $TOC, $PHP_SELF, $DOCUMENT_ROOT;

    echo "Top: <b><a href=\"./\">$HOME[1]</a></b><br>\n";
    echo '<form method="GET" action="../../manual-lookup.php">';
?>
    <b><a href="../../quickref.php">quickref:</a></b><br>

    <input type="hidden" name="lang" value="$LANG">
    <input type="text" class="small" name="function" size="10">
    <?php echo make_submit('small_submit.gif', 'lookup', 'bottom');?>
    </form>
<?php

    if ($HOME[1] != $UP[1] && $UP[1]) {
      echo "Up: <b><a href=\"$UP[0]\">$UP[1]</a></b>\n";
    }

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
	echo "<li><a href=\"$url\">$title</a></li>";
    }
};

function navigationBar($title,$id,$loc) {
    global $NEXT, $PREV, $tstamp, $SERVER_NAME,$SERVER_PORT,$PHP_SELF;
    echo '<table border="0" width="800" bgcolor="#d0d0d0" cellpadding="4" cellspacing="1"><tr>';
    if ($loc == "bottom") {
      echo "<td align=\"middle\" colspan=\"3\">";
      $back_url = "http://$SERVER_NAME".(($SERVER_PORT==80)?"":":".$SERVER_PORT).$PHP_SELF;
      echo "<a href=\"../add-note.php?sect=$id&amp;redirect=$back_url\">add note</a> | ";
      echo "<a href=\"../about-notes.php\">about notes</a>";
      echo "</td></tr><tr>";
    }
    echo "<td align=\"left\" width=\"44%\">";
    if ($PREV[1]) {
      echo "Previous: <a href=\"$PREV[0]\">$PREV[1]</a>";
    }
    echo "&nbsp;</td>\n";
    echo "<td align=\"center\" width=\"12%\">Updated<br>$tstamp</td>\n";
    echo "<td align=\"right\" width=\"44%\">&nbsp;";
    if ($NEXT[1]) {
      echo "Next: <a href=\"$NEXT[0]\">$NEXT[1]</a>";
    }
    echo "</td>\n";
    if ($loc == "top") {
      echo "</tr><tr>";
      echo "<td colspan=\"3\" align=\"center\">";
      $file = substr($id,0,-4);
      echo "View this page in: ";
      global $LANGUAGES;
      while (list($code,$name) = each($LANGUAGES)) {
	if (file_exists("../$code/$id")) {
	  echo "<a href=\"../$code/$id\">$name</a> | ";
	}
      }
      if (file_exists("html/$file.html")) {
	echo "<a href=\"html/$file.html\">Plain HTML </a>";
      }
    }
    echo "</tr></table>\n";
}


function makeEntry($date,$name,$blurb,$id=0) {
	global $MAGIC_COOKIE;
?>
<tr valign="top">
<td align="left" bgcolor="#e0e0e0">
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tr><td>
<?
	$name = htmlspecialchars($name);
        if (ereg("(.+)@(.+)\.(.+)",$name)) {
                echo "<a href=\"mailto:".$name."\">".$name."</a><br>\n";
        } else {
                echo "<b>".$name."</b><br>\n";
        }
        echo date("d-M-Y h:i",$date);
?>
</td></tr>
<tr bgcolor="#f0f0f0"><td>
<?
echo clean_note($blurb);
?><BR>
<?if (isset($MAGIC_COOKIE)):?>
<hr noshade size=1>
<a href="/manual/admin-notes.php?action=delete+<?echo $id?>&brief=1&popup=1" target="admin">delete</a> | 
<a href="/manual/admin-notes.php?action=reject+<?echo $id?>&brief=1&popup=1" target="admin">reject</a> | 
<a href="/manual/admin-notes.php?action=edit+<?echo $id?>&brief=1" target="admin">edit</a>
<?endif;?>
</td></tr>
</table>
</td>
</tr>  
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
		$notes_file = "../usernotes/" . urlencode( $title ) . ".txt";
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

	echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"1\" width=\"100%\">\n";

	$notes = manualGetUserNotes($title, $id);
	$num_notes = count($notes);
	if ( $num_notes > 0 ) {
                echo "<tr bgcolor=\"#d0d0d0\"><td><b>User Contributed Notes: $title</b></td></tr>";
		for ($i=0; $i<$num_notes; $i++) {
			$note = $notes[$i]; // should use foreach? 
			makeEntry($note['xwhen'],$note['user'],$note['note'],$note['id']);
		}
	}
	echo "</table>\n";
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
        global $LANG;
        $LANG = $lang;
	Header("Content-type: text/html;charset=$charset");
	Header("Content-language: $lang");
}

function manualHeader($title,$id="") {
	global $HTDIG, $LANGUAGES, $LANG;
	manualLastModified($title,$id);
	commonHeader("Manual: $title", 1);
        # create links to plain html and other languages
	if (!$HTDIG):
		navigationBar($title, $id, "top");
	endif;
        echo '<table width="800" border="0" cellpadding="4" cellspacing="1">';
        echo '<tr>';
        echo '<td valign="top">';
}

function manualFooter($title,$id="") {
	if (!$HTDIG):
		manualUserNotes($title,$id);
	endif;
        echo '</td>';
        echo '<td valign="top" bgcolor="#e0e0e0">';
	makeBorderTOC($title);
        echo '</td>';
        echo '</tr></table><!--HITHERE-->';
	global $HTDIG;
	if (!$HTDIG):
		navigationBar($title, $id, "bottom");
	endif;
	commonFooter($title);
}
?>
