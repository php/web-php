<?php // -*- C++ -*-
require_once 'prepend.inc';

// NOTE: See http://www.php.net/manual/note.mysql
//       for the table structure of the notes table

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

	$SIDEBAR_DATA = '<form method="get" action="/manual-lookup.php">' .
	$SIDEBAR_DATA.= '<table border="0" cellpadding="4" cellspacing="0">';

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

	echo '<tr><td>';
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

	if ($loc != 'bottom') {
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
		echo '<br>';
	}

	echo '</small></td></tr>';
	echo "</table>\n";

}


function makeEntry($date,$name,$blurb,$id=0) {
	global $MAGIC_COOKIE;
?>
<tr valign="top">
<td bgcolor="#e0e0e0" colspan="2">
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tr valign="top"><td>
<?php
	$name = htmlspecialchars($name);
        if ($name && $name != "php-general@lists.php.net" && $name != "user@example.com") {
	  if (ereg("(.+)@(.+)\.(.+)",$name)) {
	    echo "<a href=\"mailto:".$name."\">".$name."</a><br>\n";
	  }
	  else {
	    echo "<b>".$name."</b><br>\n";
	  }
        }
        echo date("d-M-Y h:i",$date);
?>
</td>
<td align="right">
<?php
if (isset($MAGIC_COOKIE) && $id) {
	print_link('/manual/admin-notes.php?action=edit+' . $id . '&brief=1',
		make_image('notes-edit.gif', 'edit note'),
		'admin'
	);
	echo '&nbsp';
	print_link('/manual/admin-notes.php?action=reject+' . $id . '&brief=1&popup=1',
		make_image('notes-reject.gif', 'reject note'),
		'admin'
	);
	echo '&nbsp';
	print_link('/manual/admin-notes.php?action=delete+' . $id . '&brief=1&popup=1',
		make_image('notes-delete.gif', 'delete note'),
		'admin'
	);
}
?>
<br></td>
</tr>
<tr bgcolor="#f0f0f0"><td colspan="2">
<?php echo clean_note($blurb); ?><br>
</td></tr>
</table>
</td>
</tr>
<?php
};

function manualGetUserNotes($title, $id) {
	// if we're www.php.net, get it from the local DB
	// otherwise look in "/manual/usernotes/$title.txt" (if present)
	global $MYSITE;
	$notes = array();
	if (0 && is_primary_site() && @mysql_connect("localhost","nobody","")) {
		mysql_select_db("php3");
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS xwhen FROM note WHERE sect='$id' AND NOT removed ORDER BY id";
                $result_id = mysql_query($query);
		if ($result_id && mysql_num_rows($result_id) > 0) {
			while ($row = mysql_fetch_array($result_id)) {
				$notes[] = $row;
			}
		}
	} else {
		global $DOCUMENT_ROOT;
		$hash = substr(md5($id),0,16);
		$notes_file = "$DOCUMENT_ROOT/backend/notes/".substr($hash,0,2)."/$hash";
		if ($fp = @fopen($notes_file,"r")) {
			while (!feof($fp)) {
				$line = chop(fgets($fp,8096));
				if ($line == "") continue;
				list($id,$sect,$rate,$ts,$user,$note) = explode("|",$line);
				$notes[] = array(
					"id" => $id,
					"sect" => $sect,
					"rate" => $rate,
					"xwhen" => $ts,
					"user" => $user,
					"note" => base64_decode($note)
				);
			}
			fclose($fp);
		}
	}
	return $notes;
}

function manualUserNotes($title, $id) {
	global $PHP_SELF, $SERVER_NAME, $SERVER_PORT, $LANG, $MYSITE;
	$cur = substr(dirname($PHP_SELF),-2);
	if($cur=='al') $cur='en';

	# don't want .php at the end of the id.
	if (substr($id,-4) == '.php') $id = substr($id,0,-4);

	echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

	$notes = manualGetUserNotes($title, $id);

	$back_url = 'http://' . $SERVER_NAME . 
		(($SERVER_PORT==80) ? '' : ':'.$SERVER_PORT ) . 
		$PHP_SELF;

	echo "<tr bgcolor=\"#d0d0d0\" valign=\"top\">\n";
	echo "<td><small>User Contributed Notes<br></small><b>$title</b><br></td>\n";
	echo "<td align=\"right\">";
	print_link('/manual/add-note.php?sect='.$id.'&redirect='.$back_url,
		make_image('notes-add.gif','add a note')
	);      
	echo "&nbsp;";
	print_link('/manual/about-notes.php',
		make_image('notes-about.gif', 'about notes')
	);
	echo "<br></td>\n";
	echo "</tr>\n";

	if (sizeof($notes) == 0) {
  	  echo '<tr valign="top">';
			echo '<td bgcolor="#e0e0e0" colspan="2">';
			echo 'There are no user contributed notes for this page.';
			echo '<br></td></tr>';
	} else {
		foreach($notes as $note) {
			makeEntry($note['xwhen'], $note['user'], $note['note'], $note['id'] );
		}

                echo "<tr bgcolor=\"#d0d0d0\" valign=\"top\">\n";
		echo "<td colspan=\"2\" align=\"right\">\n";
                print_link('/manual/add-note.php?sect='.$id.'&redirect='.$back_url,
                        make_image('notes-add.gif','add a note')
                );      
		echo "&nbsp;";
                print_link('/manual/about-notes.php',
                        make_image('notes-about.gif', 'about notes')
                );
		echo "<br></td>\n";
		echo "</tr>\n";

	}

	echo "</table><br><br>\n";
}

function sendManualHeaders($charset,$lang) {
        global $LANG;
        $LANG = $lang;
	Header("Cache-Control: public, max-age=300");
	Header("Content-type: text/html;charset=$charset");
	Header("Content-language: $lang");
}

function manualHeader($title,$id="") {
	global $HTDIG, $LANGUAGES, $LANG, $SIDEBAR_DATA;
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
