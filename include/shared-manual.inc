<?php // -*- C++ -*-
require_once 'prepend.inc';

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

$SIDEBAR_DATA = '';


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



function makeBorderTOC($this) {
	global $NEXT, $PREV, $UP, $HOME, $TOC, $PHP_SELF, $DOCUMENT_ROOT;
	global $SIDEBAR_DATA, $LANG;

	$SIDEBAR_DATA = '<form method="GET" action="/manual-lookup.php">' .
	$SIDEBAR_DATA.= '<table border="0" CELLPADDING="4" CELLSPACING="0">';

	$SIDEBAR_DATA.= '<tr valign="top"><td><small>' .
		'<input type="hidden" name="lang" value="' . $LANG . '">' .
		'lookup: <input type="text" class="small" name="function" size="10"> ' .
		make_submit('small_submit.gif', 'lookup', 'bottom') .
		'<br></small></td></tr>';

	$SIDEBAR_DATA.= '<tr bgcolor="#cccccc"><td></td></tr>';

	$SIDEBAR_DATA.= '<tr valign="top"><td>' . 
		make_link('./', make_image('caret-t.gif', $HOME[1]) . $HOME[1] ) . 
		'<br></td></tr>';

	$SIDEBAR_DATA.= '<tr bgcolor="#cccccc"><td></td></tr>';

	if (($HOME[1] != $UP[1]) && $UP[1]) {
		$SIDEBAR_DATA.= '<tr valign="top"><td>' . 
			make_link($UP[0], make_image('caret-u.gif', $UP[1]) . $UP[1] ) . 
			'<br></td></tr>';
	}

	$SIDEBAR_DATA.= '<tr valign="top"><td><small>';

	for ($i = 0; $i < count($TOC); $i++) {
		list($url, $title) = $TOC[$i];
		if (!$url || !$title) {
			continue;
		}
		$img = 'box-0.gif';
		if ($title == $this) {
			$img = 'box-1.gif';
		}
		if ($UP[0] == 'funcref.php') {
			$title = eregi_replace(" functions\$", "", $title);
		}
		$SIDEBAR_DATA .= '&nbsp;' . 
			make_link($url, make_image($img, $title) . $title ) . 
			'<br>';
	}

	$SIDEBAR_DATA.= '</small></td></tr>';
	$SIDEBAR_DATA.= '</table></form>';

}

function navigationBar($title,$id,$loc) {
	global $NEXT, $PREV, $tstamp, $SERVER_NAME,$SERVER_PORT,$PHP_SELF;

	echo '<table border="0" width="620" bgcolor="#e0e0e0" cellpadding="0" cellspacing="4">';

	echo '<tr>';
	echo '<td align="left">';
	if ($PREV[1]) {
		echo make_link( $PREV[0] , make_image('caret-l.gif', 'previous') . $PREV[1] ) ;
	}
	echo '<br></td>';

	echo '<td align="right">';
	if ($NEXT[1]) {
		echo make_link( $NEXT[0] , $NEXT[1] . make_image('caret-r.gif', 'next') ) ;
	}
	echo '<br></td>';
	echo '</tr>';

	echo '<tr bgcolor="#cccccc"><td colspan="2">';
	spacer(1,1);
	echo '<br></td></tr>';

	echo '<tr>';
	echo '<td align="right" colspan="2"><small>Last updated: '.$tstamp.'<br>';

	if ($loc == 'bottom') {

		$back_url = 'http://' . $SERVER_NAME . 
			(($SERVER_PORT==80) ? '' : ':'.$SERVER_PORT ) . 
			$PHP_SELF;
		print_link('/manual/add-note.php?sect='.$id.'&redirect='.$back_url, 'add note',false,'class="small"');
		echo delim();
		print_link('/manual/about-notes.php', 'about notes',false,'class="small"',false,'class="small"');

	} else {

		global $LANGUAGES;
		$links = array();
		foreach($LANGUAGES as $code=>$name) {
			if (file_exists("../$code/$id")) {
				$links[] = make_link("../$code/$id", $name);
			}
		}
		$file = substr($id,0,-4);
		if (file_exists("html/$file.html")) {
			$links[] = make_link("html/$file.html", 'Plain HTML');
		}
		if (count($links)) {
			echo 'view this page in ' . join (delim(), $links);
		}
	}

	echo '<br></small></td></tr>';
	echo "</table>\n";

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
<?if (isset($MAGIC_COOKIE) && $id):?>
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
	global $HTDIG, $LANGUAGES, $LANG, $SIDEBAR_DATA;
	manualLastModified($title,$id);
	makeBorderTOC($title);
	commonHeader('Manual: '.$title);
        # create links to plain html and other languages
	if (!$HTDIG) {
		navigationBar($title, $id, "top");
	}
}

function manualFooter($title,$id="") {
	global $HTDIG;
	if (!$HTDIG) {
		manualUserNotes($title,$id);
		navigationBar($title, $id, "bottom");
	}
	commonFooter();

}
?>
