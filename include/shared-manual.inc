<?php // -*- C++ -*-
require_once 'prepend.inc';

// Set variable defaults
$NEXT = $PREV = $UP = $HOME = $PGI = array(false, false);
$TOC = array(); $SIDEBAR_DATA = '';

// If we don't know anything about printing, set it to false
if (!isset($PRINT_PAGE)) { $PRINT_PAGE = FALSE; }

// Set up variables containing navigational information
// for this page and page part of the manual
function setupNavigation($data) {
    global $NEXT, $PREV, $UP, $HOME, $TOC, $PGI, $tstamp;
    $HOME = @$data["home"];
    $HOME[0] = "./";
    $NEXT = @$data["next"];
    $PREV = @$data["prev"];
    $UP   = @$data["up"];
    $TOC  = @$data["toc"];
    $PGI  = @$data["this"];
    $tstamp = gmdate("D, d M Y",getlastmod());
}

// Append all the table of contents data to $SIDEBAR_DATA
function makeBorderTOC($id)
{
    global $UP, $HOME, $TOC, $SIDEBAR_DATA;

    $SIDEBAR_DATA .= '<!--UdmComment-->' . "\n" . 
                     '<table border="0" cellpadding="0" cellspacing="5" width="100%">';

    $SIDEBAR_DATA.= '<tr valign="top"><td>' . 
        make_link('./', make_image('caret-t.gif', '^') . $HOME[1] ) . 
        '<br></td></tr>';

    $SIDEBAR_DATA.= '<tr bgcolor="#cccccc"><td>' . spacer(1, 1, TRUE) . '</td></tr>';

    if (($HOME[1] != $UP[1]) && $UP[1]) {
        $SIDEBAR_DATA.= '<tr valign="top"><td>' . 
            make_link($UP[0], make_image('caret-u.gif', '&lt;') . $UP[1] ) . 
            '</td></tr>';
    }

    $SIDEBAR_DATA.= '<tr valign="top"><td>';

    // Print out one link for all TOC items on this page
    foreach($TOC as $tocitem) {
    
        // Get URL and title component
        list($url, $title) = $tocitem;

        // Get the proper classname to use for this <div>
        $divclass = ($url == $id) ? "toca" : "toci";
        
        // There are some very long function names, which
        // make the TOC be too wide, so wrap them
        // eg: xml_set_processing_instruction_handler 
        if (strlen($title) > 30 && preg_match("!^[a-z0-9_]+$!", $title)) {
            $title = str_replace("_", " ", $title);
            $title = wordwrap($title, 30, "<br>");
            $title = str_replace(array(" ", "<br>"), array("_", "<br />_"), $title);
        }
        
        // Print out the TOC item using a div
        $SIDEBAR_DATA .= "\n<div class=\"$divclass\">" .
                         make_link($url, $title) . "</div>";
    }

    // End navigation table
    $SIDEBAR_DATA .= "</td></tr></table><!--/UdmComment-->\n";
}

// Print out manual navigation bar
function navigationBar($title,$id,$loc) {
    global $NEXT, $PREV, $tstamp, $SERVER_NAME, $SERVER_PORT,
           $PHP_SELF, $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES;

    echo '<!--UdmComment-->' . "\n" . 
         '<table border="0" width="100%" bgcolor="#e0e0e0" cellpadding="0" cellspacing="4">';

    echo '<tr><td>';
    if ($PREV[1]) {
        echo make_link($PREV[0] , make_image('caret-l.gif', '&lt;') . $PREV[1] ) ;
    }
    echo '</td>';

    echo '<td align="right">';
    if ($NEXT[1]) {
        echo make_link($NEXT[0] , $NEXT[1] . make_image('caret-r.gif', '&gt;') ) ;
    }
    echo '</td>';
    echo '</tr>';

    echo '<tr bgcolor="#cccccc"><td colspan="2">';
    spacer(1,1);
    echo '</td></tr>';

    echo '<tr>';
    echo '<td>';

    // Print out language switch on top of manual pages
    if ($loc != 'bottom') {
        $links = array();
        preg_match("!/manual/(.+)/!", $_SERVER['BASE_HREF'], $langcode);
        $links[] = array("$langcode[1]/print/$id", "printer friendly");
        $links[] = array("$langcode[1]/printwn/$id", "printer friendly [+notes]");
        // Disable all 'inactive' languages
        $online_languages = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);
        foreach ($online_languages as $code => $name) {
            if (!preg_match("!/$code/!", $PHP_SELF)
                // && file_exists($_SERVER['DOCUMENT_ROOT'] . "/$code/$id")
               ) {
                $links[] = array("$code/$id", $name);
            }
        }
        echo '<form action="/manual/change.php" method="GET" class="thin"><small>view the </small>' .
             '<select name="page" class="small">'. "\n";
        foreach ($links as $link) {
            echo '<option value="' . $link[0] . '">' . $link[1] . "</option>\n";
        }
        echo '</select>';
        echo '<input type="image" src="' . $_SERVER['STATIC_ROOT'] . '/images/small_submit.gif" border="0" width="11" height="11" alt="" align="baseline"> <small>version of this page</small></form>';
       
    } else {
        echo "<small>&nbsp;</small>";
    }

    echo '</td><td align="right" valign="bottom"><small>Last updated: ' . $tstamp . '</small></td></tr>';
    echo "</table>\n<!--/UdmComment-->\n";

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

    # don't want .php at the end of the id.
    if (substr($id,-4) == '.php') $id = substr($id,0,-4);

    $notes = manualGetUserNotes($title, $id);

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $id .
                   '&redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = 
        make_link($addnotelink, make_image('notes-add.gif', 'add a note')) .
        ' <small>' .
        make_link($addnotelink, 'add a note', false, 'style="color:#000000"') .
        '</small>';

    echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
    echo "<tr bgcolor=\"#d0d0d0\" valign=\"top\">\n";
    echo "<td><small>User Contributed Notes</small><br /><b>$title</b></td>\n";
    echo "<td align=\"right\">$addnotesnippet";

    /* This information has been included on add-note.php
    echo "&nbsp;";
    print_link('/manual/about-notes.php',
        make_image('notes-about.gif', 'about notes')
    );
    */
    echo "</td>\n</tr>\n";

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
        echo "<td colspan=\"2\" align=\"right\">\n$addnotesnippet";

        /* This information has been included on add-note.php
        echo "&nbsp;";
        print_link('/manual/about-notes.php',
            make_image('notes-about.gif', 'about notes')
        );
	*/
        echo "</td>\n</tr>\n";
    }
    echo "</table>\n";
}

// Send manual HTTP headers, provide accurate language data
function sendManualHeaders($charset,$lang) {
    global $LAST_UPDATED, $MYSITE;
    
    header("Last-Modified: " . gmdate("D, d M Y H:i:s ", $LAST_UPDATED) . "GMT");
    //header("Cache-Control: public, max-age=600");
    header("Vary: Cookie");
    header("Content-type: text/html;charset=$charset");
    header("Content-language: $lang");
    
    // Set initial base for this manual page
    // [will be extended in manualHeader()!]
    $_SERVER['BASE_PAGE'] = 'manual/' . language_convert($lang);
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];
}

// Print out manual page header.
function manualHeader()
{
    global $PRINT_PAGE, $PGI;
    
    // XSL [and new DSSSL] sheets provide params in the
    // 'this' array element configured above, while old
    // DSSSL sheets provide info via two parameters [title, id]
    if (func_num_args() > 0) {
        list($title, $filename) = func_get_args();
    } else {
        list($filename, $title) = $PGI;
    }
    
    if ($PRINT_PAGE) {
        $_SERVER['BASE_PAGE'] .= "/print/$filename";
        $_SERVER['BASE_HREF'] .= "/print/$filename";
        manualPrintHeader($title);
    } else {
        $_SERVER['BASE_PAGE'] .= "/$filename";
        $_SERVER['BASE_HREF'] .= "/$filename";
        makeBorderTOC($filename);
        commonHeader ($title. " - Manual");
        navigationBar($title, $filename, "top");
    }
}

// Print out manual footer
function manualFooter()
{
    global $PRINT_PAGE, $PRINT_NOTES, $PGI;

    // XSL [and new DSSSL] sheets provide params in the
    // 'this' array element configured above, while old
    // DSSSL sheets provide info via two parameters [title, id]
    if (func_num_args() > 0) {
        list($title, $id) = func_get_args();
    } else {
        list($id, $title) = $PGI;
    }
    
    if ($PRINT_PAGE) {
        if ($PRINT_NOTES) {
            echo "<br /><br />";
            manualPrintUserNotes($title, $id);
        }
        manualPrintFooter();
    } else {
        echo "<br /><br />";
        manualUserNotes($title, $id);
        echo "<br />";
        navigationBar($title, $id, "bottom");
        commonFooter();
    }
}

// =============================================================================
// Printer friendly support functions under this line
// =============================================================================

// "Printer optimized" header for manual pages
function manualPrintHeader($title = '') {
    global $NEXT, $PREV, $HOME;

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
 <title>PHP<?php if ($title) echo ": $title";?></title>
 <link rel="prev" href="<?php  echo $PREV[0]; ?>" />
 <link rel="next" href="<?php  echo $NEXT[0]; ?>" />
 <link rel="start" href="<?php echo $HOME[0]; ?>" />
 <base href="<?php echo $_SERVER['BASE_HREF']; ?>" />
</head>
<body bgcolor="#ffffff" text="#000000" link="#000099" alink="#0000ff" vlink="#000099">
<table>
<tr>
 <td><a href="/"><?php print_image('php.gif', 'PHP'); ?></a></td>
 <td>
  This is a printer friendly version of the PHP Manual.<br />
  Original address of this page: <?php print_link($_SERVER['BASE_HREF']); ?><br />
  <small><?php print_link('copyright.php', 'Copyright &copy; 1997-2003 The PHP Documentation Group'); ?><br />All rights reserved.</small>
 </td>
</tr>
</table><hr size="1" noshade="noshade" />
<?php
}

// "Printer optimized" footer for manual pages
function manualPrintFooter() {
    echo "</body>\n</html>";
}

// Print out all user notes for this manual page
function manualPrintUserNotes($title, $id) {

    // Don't want .php at the end of the id.
    if (substr($id, -4) == '.php') { $id = substr($id, 0, -4); }

    $notes = manualGetUserNotes($title, $id);

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
