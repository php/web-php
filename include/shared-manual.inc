<?php // -*- C++ -*-
require_once 'prepend.inc';

// Set variable defaults
$NEXT = $PREV = $UP = $HOME = array(false, false);
$TOC = array(); $SIDEBAR_DATA = '';

// If we don't know anything about printing, set it to false
if (!isset($PRINT_PAGE)) { $PRINT_PAGE = FALSE; }

// Set up variables containing navigational information
// for this page and page part of the manual
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

// Put all the border table of contents data to $SIDEBAR_DATA
function makeBorderTOC($this) {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $PHP_SELF, $DOCUMENT_ROOT, $SIDEBAR_DATA;

    $SIDEBAR_DATA.= '<table border="0" cellpadding="0" cellspacing="5" width="100%">';

    $SIDEBAR_DATA.= '<tr valign="top"><td>' . 
        make_link('./', make_image('caret-t.gif', '^') . $HOME[1] ) . 
        '<br></td></tr>';

    $SIDEBAR_DATA.= '<tr bgcolor="#cccccc"><td>' . spacer(1, 1, TRUE) . '</td></tr>';

    if (($HOME[1] != $UP[1]) && $UP[1]) {
        $SIDEBAR_DATA.= '<tr valign="top"><td>' . 
            make_link($UP[0], make_image('caret-u.gif', '&lt;') . $UP[1] ) . 
            '</td></tr>';
    }

    $SIDEBAR_DATA.= '<tr valign="top"><td><small class="sidetoc">';

    for ($i = 0; $i < count($TOC); $i++) {
        list($url, $title) = $TOC[$i];
        if (!$url || !$title) {
            continue;
        }
        if ($UP[0] == 'funcref.php') {
            $title = eregi_replace(" functions\$", "", $title);
        }
        $img = 'box-0.gif';
        if ($title == $this) {
            $img = 'box-1.gif';
            $title = "<b>$title</b>";
        }
        $SIDEBAR_DATA .= '&nbsp;' . 
            make_link($url, make_image($img, "&middot;") . $title ) .
            "<br />\n";
    }

    $SIDEBAR_DATA.= '</small></td></tr>';
    $SIDEBAR_DATA.= '</table>';
}

// Print out manual navigation bar
function navigationBar($title,$id,$loc) {
    global $NEXT, $PREV, $tstamp, $SERVER_NAME, $SERVER_PORT, $PHP_SELF, $LANGUAGES;

    echo '<table border="0" width="100%" bgcolor="#e0e0e0" cellpadding="0" cellspacing="4">';

    echo '<tr><td>';
    if ($PREV[1]) {
        echo make_link( $PREV[0] , make_image('caret-l.gif', '&lt;') . $PREV[1] ) ;
    }
    echo '</td>';

    echo '<td align="right">';
    if ($NEXT[1]) {
        echo make_link( $NEXT[0] , $NEXT[1] . make_image('caret-r.gif', '&gt;') ) ;
    }
    echo '</td>';
    echo '</tr>';

    echo '<tr bgcolor="#cccccc"><td colspan="2">';
    spacer(1,1);
    echo '</td></tr>';

    echo '<tr>';
    echo '<td align="right" colspan="2"><small>Last updated: '.$tstamp;

    if ($loc != 'bottom') {
        $links = array();
        foreach ($LANGUAGES as $code => $name) {
            if (!preg_match("!/$code/!", $PHP_SELF) && file_exists("../$code/$id")) {
                $links[] = make_link("../$code/$id", $name);
            }
        }
        echo "<br /> view the " . make_link("print/$id", 'printer friendly version') .
             " or the " . make_link("printwn/$id", 'printer friendly version with notes');
        
        if (count($links)) {
            echo ' or change language to ' . join (delim(), $links);
        }
    }

    echo '</small></td></tr>';
    echo "</table>\n";

}

// Try to make email address printing safe (protect from spammers)
function safeEmail($email)
{
    return str_replace(array('@', '.'), array(' at ', ' dot '), $email);
}

// Print out one user note entry
function makeEntry($date,$name,$blurb,$id=0) {
    global $MAGIC_COOKIE;
?>
<tr valign="top">
<td bgcolor="#e0e0e0" colspan="2">
<?php
    if ($id) { echo '<a name="#' . $id . '"></a>'; }
?>
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tr valign="top"><td>
<?php
    $name = htmlspecialchars($name);
    if ($name && $name != "php-general@lists.php.net" && $name != "user@example.com") {
        if (ereg("(.+)@(.+)\.(.+)",$name)) {
            $name = safeEmail($name);
        }
        echo "<b>".$name."</b><br>\n";
    }
    echo date("d-M-Y h:i",$date);
?>
</td>
<td align="right">
<?php
if (isset($MAGIC_COOKIE) && $id) {
    print_popup_link('http://master.php.net/manage/user-notes.php?action=edit+' . $id,
        make_image('notes-edit.gif', 'edit note'),
        'admin',
                'scrollbars=yes,width=650,height=400'
    );
    echo '&nbsp';
    print_popup_link('http://master.php.net/manage/user-notes.php?action=reject+' . $id,
        make_image('notes-reject.gif', 'reject note'),
        'admin',
                'scrollbars=no,width=300,height=200'
    );
    echo '&nbsp';
    print_popup_link('http://master.php.net/manage/user-notes.php?action=delete+' . $id,
        make_image('notes-delete.gif', 'delete note'),
        'admin',
                'scrollbars=no,width=300,height=200'
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

// Get user notes from the appropriate text dump
function manualGetUserNotes($title, $id) {
    global $DOCUMENT_ROOT;
    $notes = array();
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
    return $notes;
}

// Print out all user notes for this manual page
function manualUserNotes($title, $id) {

    global $PHP_SELF, $SERVER_NAME, $SERVER_PORT;
    $cur = substr(dirname($PHP_SELF),-2);
    if($cur=='al') $cur='en';

    # don't want .php at the end of the id.
    if (substr($id,-4) == '.php') $id = substr($id,0,-4);

    $notes = manualGetUserNotes($title, $id);

    $back_url = 'http://' . $SERVER_NAME . 
        (($SERVER_PORT==80) ? '' : ':'.$SERVER_PORT ) . 
        $PHP_SELF;

    echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
    echo "<tr bgcolor=\"#d0d0d0\" valign=\"top\">\n";
    echo "<td><small>User Contributed Notes</small><br /><b>$title</b></td>\n";
    echo "<td align=\"right\">";
    print_link('/manual/add-note.php?sect='.$id.'&redirect='.$back_url,
        make_image('notes-add.gif','add a note')
    );      
    echo "&nbsp;";
    print_link('/manual/about-notes.php',
        make_image('notes-about.gif', 'about notes')
    );
    echo "</td>\n";
    echo "</tr>\n";

    if (sizeof($notes) == 0) {
        echo '<tr valign="top">';
        echo '<td bgcolor="#e0e0e0" colspan="2">';
        echo 'There are no user contributed notes for this page.';
        echo '</td></tr>';
    } else {
        foreach($notes as $note) {
            makeEntry($note['xwhen'], $note['user'], $note['note'], $note['id']);
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
        echo "</td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
}

// Send manual HTTP headers, provide accurate language data
function sendManualHeaders($charset,$lang) {
    global $LANG, $LAST_UPDATED;
    $LANG = $lang;
    header("Last-Modified: " . gmdate("D, d M Y H:i:s ", $LAST_UPDATED) . "GMT");
    //header("Cache-Control: public, max-age=600");
    header("Vary: Cookie");
    header("Content-type: text/html;charset=$charset");
    header("Content-language: $lang");
}

// Print out manual page header
function manualHeader($title,$id="") {
    global $PRINT_PAGE;
    if ($PRINT_PAGE) {
        manualPrintHeader($title);
    } else {
        makeBorderTOC($title);
        commonHeader ($title. " - Manual");
        navigationBar($title, $id, "top");
        echo "<!--/UdmComment-->";
    }
}

// Print out manual footer
function manualFooter($title,$id="") {
    global $PRINT_PAGE, $PRINT_NOTES;
    if ($PRINT_PAGE) {
        if ($PRINT_NOTES) {
            manualPrintUserNotes($title, $id);
        }
        manualPrintFooter();
    } else {
        manualUserNotes($title,$id);
        echo "<br />";
        navigationBar($title, $id, "bottom");
        commonFooter();
    }
}

// =============================================================================
// Printer friendly support functions under this line
// =============================================================================

// "Printer optimized" header for manual pages
function manualPrintHeader ($title = '') {
    global $REQUEST_URI, $SERVER_NAME, $NEXT, $PREV, $HOME;
    $pageurl = "http://$SERVER_NAME$REQUEST_URI";
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
 <title>PHP<?php if ($title) echo ": $title";?></title>
 <link rel="prev" href="<?php echo $PREV[0]; ?>">
 <link rel="next" href="<?php echo $NEXT[0]; ?>">
 <link rel="start" href="<?php echo $HOME[0]; ?>">
</head>
<body bgcolor="#ffffff" text="#000000" link="#000099" alink="#0000ff" vlink="#000099">
<table>
<tr>
 <td><a href="/"><?php print_image('php_logo.gif', 'PHP'); ?></a></td>
 <td>
  This is a printer friendly version of the PHP Manual.<br>
  Original address of this page: <a href="<?php echo $pageurl; ?>"><?php echo $pageurl; ?></a><br>
  <small><?php echo make_link('copyright.php', 'Copyright &copy; 1997-2003 The PHP Documentation Group'); ?><br />All rights reserved.</small>
 </td>
</tr>
</table><hr size="1" noshade>
<?php
}

// "Printer optimized" footer for manual pages
function manualPrintFooter() {
    echo "</body>\n</html>";
}

// Print out all user notes for this manual page
function manualPrintUserNotes($title, $id) {

    global $PHP_SELF, $SERVER_NAME, $SERVER_PORT;
    $cur = substr(dirname($PHP_SELF),-2);
    if ($cur=='al') $cur='en';

    # don't want .php at the end of the id.
    if (substr($id,-4) == '.php') $id = substr($id,0,-4);

    $notes = manualGetUserNotes($title, $id);

    $back_url = 'http://' . $SERVER_NAME . 
        (($SERVER_PORT==80) ? '' : ':'.$SERVER_PORT ) . 
        $PHP_SELF;

    echo "<hr size=\"1\" noshade><h2>User Contributed Notes</h2>";

    if (sizeof($notes) == 0) {
        echo "<p>There are no user contributed notes for this page</p>";
    } else {
        foreach($notes as $note) {
            makePrintEntry($note['xwhen'], $note['user'], $note['note'], $note['id']);
        }
    }
}

// Make manual user note entry for printing
function makePrintEntry($date,$name,$blurb,$id=0) {

    if ($name && $name != "php-general@lists.php.net" && $name != "user@example.com") {
        if (ereg("(.+)@(.+)\.(.+)",$name)) {
            $name = safeEmail($name);
        }
        echo "<b>".$name."</b><br>\n";
    }
    echo date("d-M-Y h:i",$date) . "<br><br>";
    echo clean_note($blurb) . "<br><hr noshade size=\"1\" width=\"50%\" align=\"center\">";

}
    
?>
