<?php // -*- C++ -*-

// $Id$

/*

 This file is included directly on all manual pages,
 and therefore is the entering point for all manual pages
 to the website function collection. These functions display
 the manual pages with headers and navigation.
 
 The $PGI global variable is used to store all page related
 information, including HTTP header related data.
 
*/

// Ensure that our environment is set up
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Set variable defaults
$PGI = array(); $SIDEBAR_DATA = '';

// Set up variables important for this page
// including HTTP header information
function manual_setup($page_data)
{
    global $PGI;
    $PGI = array_merge($PGI, $page_data); // merge for BC reasons
    $PGI['lastmod'] = gmdate("D, d M Y", getlastmod());
}

// Print out HTTP headers and the HTML header
// for this manual page, according to details
// already set up
// TODO: replace logo with logos/php-med-trans-light.gif on print
function manual_header()
{
    global $PGI, $LAST_UPDATED, $MYSITE;
    
    // Get values out of the config array
    list($filename, $title) = $PGI['this'];
    list($encoding, $lang)  = $PGI['head'];
    
    header("Last-Modified: " . gmdate("D, d M Y H:i:s ", $LAST_UPDATED) . "GMT");
    //header("Cache-Control: public, max-age=600");
    header("Vary: Cookie");
    //header("Content-type: text/html;charset=$encoding");
    header("Content-type: text/html;charset=utf-8");
    header("Content-language: $lang");
    
    // Set base page and href for this manual page
    $_SERVER['BASE_PAGE'] = 'manual/' . language_convert($lang) . "/$filename";
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];
    
    manual_sidebar();
    $link = array(
        "contents" => $PGI["home"][0],
        "index"    => $PGI["up"][0],
        "prev"     => $PGI["prev"][0],
        "next"     => $PGI["next"][0],
    );
    site_header("$title - Manual", array("link" => $link));
    manual_navbar();
}

// Print out manual page footer
function manual_footer()
{
    global $PGI;

    // Get vars for easy handling
    list($filename, $title) = $PGI['this'];
    
    echo "<br /><br />";
    manual_notes();
    echo "<br />";
    manual_navbar("bottom");
    site_footer();
}

// =============================================================================
// Manual page navigation parts
// =============================================================================

// Append all the table of contents data to $SIDEBAR_DATA
function manual_sidebar()
{
    global $PGI, $SIDEBAR_DATA;

    // Start sidebar with its <div>
    $BAR = "<!--UdmComment-->\n<ul class=\"toc\">\n";

    // Link to manual home
    $BAR .= ' <li class="header home"><a href="' . $PGI['home'][0] . '">' .
            $PGI['home'][1] . "</a></li>\n";

    // Link to one page up if titles does not match
    if (($PGI['home'][1] !== $PGI['up'][1]) && $PGI['up'][1]) {
        $BAR .= ' <li class="header up"><a href="' . $PGI['up'][0] . '">' .
                $PGI['up'][1] . "</a></li>\n";
    }

    // Print out one link for all siblings of this page
    foreach($PGI['toc'] as $tocitem) {
    
        // Get URL and title component
        list($url, $title) = $tocitem;

        // Get the proper classname to use for this <div>
        $liclass = ($url == $PGI['this'][0]) ? ' class="active"' : "";
        
        // There are some very long function names, which
        // make the TOC too wide, so enable the browser to wrap them
        // eg: xml_set_processing_instruction_handler 
	//     DOMElement->getElementsByTagNameNS()
        if (preg_match("!^[a-zA-Z0-9_>()-:]+$!", $title)) {
            $wrap = '<span class="w"> </span>';
            $title = str_replace(array('_', '->', '::'), array("_$wrap", "->$wrap", "::$wrap"), $title);
        }
        
        // Print out the TOC item using a <div>
        $BAR .= " <li{$liclass}>" .
                make_link($url, $title) . "</li>\n";
    }

    // Put navigation content into sidebar, end <div>
    $SIDEBAR_DATA = "$BAR</ul><!--/UdmComment-->\n";
}

function manual_navbar($location = "top")
{
    global $PGI, $LANG, $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES;

    // Start navbar with 
    echo "<!--UdmComment-->\n<div class=\"manualnavbar manualnavbar_$location\">\n <span class=\"next\">\n";
    if ($PGI['next'][1]) {
        echo "  <a href=\"{$PGI['next'][0]}\">" .
             $PGI['next'][1] .
             make_image('caret-r.gif', '&gt;') .
             "</a>\n";
    }
    echo " </span>\n <span class=\"prev\">\n";
    if ($PGI['prev'][1]) {
        echo "  <a href=\"{$PGI['prev'][0]}\">" . 
             make_image('caret-l.gif', '&lt;') .
             $PGI['prev'][1] . "</a>\n";
    } else {
        echo "  &nbsp;\n";
    }
    echo " </span>\n <hr />\n";

    // Provide last updated information on this page
    echo " <span class=\"lastupdated\">Last updated: {$PGI['lastmod']}</span>\n";

    // Print out language switch on top of manual pages
    echo " <div class=\"langchooser\">\n";
    if ($location != 'bottom') {
        
        $links = array();

        // Quick access to filename
        $filename = $PGI['this'][0];
        
        // Disable all languages without online content
        $online_languages = array_diff($LANGUAGES, $INACTIVE_ONLINE_LANGUAGES);
        
        // Add a dropdown item for all languages left
        foreach ($online_languages as $code => $name) {
            if (!preg_match("!/$code/!", $_SERVER['BASE_PAGE'])
                // && file_exists($_SERVER['DOCUMENT_ROOT'] . "/$code/$filename")
               ) {
                $links[] = array("$code/$filename", $name);
            }
        }
        
        // Print out the form with all the options
        echo '  <form action="/manual/change.php" method="get">' . "\n" .
             '   <p>view this page in </p><fieldset><select name="page">'. "\n";
        foreach ($links as $link) {
            echo '    <option value="' . $link[0] . '">' . $link[1] . "</option>\n";
        }
        echo "   </select>\n" .
             '   <input type="image" src="' . $_SERVER['STATIC_ROOT'] .
             '/images/small_submit.gif" id="changeLangImage" ' .
             'alt="" />' . "\n  </fieldset></form>\n";
       
    } else {
        echo "  &nbsp;\n";
    }
    echo " </div>\n";

    echo "</div>\n<!--/UdmComment-->\n\n";
}

// =============================================================================
// User note display functions
// =============================================================================

// Print out all user notes for this manual page
function manual_notes()
{
    // Get needed values
    list($filename, $title) = $GLOBALS['PGI']['this'];
    
    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    // Load user note for this page
    $notes = manual_notes_load($filename);

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = 
        make_link($addnotelink, make_image('notes-add.gif', 'add a note', 'middle')) .
        ' <small>' .
        make_link($addnotelink, 'add a note') .
        '</small>';

    echo <<<END_USERNOTE_HEADER

<div id="usernotes">
 <div class="head">
  <span class="action">{$addnotesnippet}</span>
  <small>User Contributed Notes</small><br />
  <strong>{$title}</strong>
 </div>
END_USERNOTE_HEADER;
    
    // If we have no notes, then inform the user
    if (sizeof($notes) == 0) {
        echo "\n <div class=\"note\">There are no user contributed notes for this page.</div>";
    }
     
    // If we have notes, print them out
    else {
        
        foreach($notes as $note) {
            manual_note_display(
                $note['xwhen'], $note['user'], $note['note'], $note['id']
            );
        }
        echo "\n <div class=\"foot\">$addnotesnippet</div>\n";
    }
    
    // End of #usernotes
    echo "</div>";
}

// Get user notes from the appropriate text dump
function manual_notes_load($id)
{
    // Initialize values
    $notes = array();
    $hash = substr(md5($id), 0, 16);
    $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" .
                  substr($hash, 0, 2) . "/$hash";
                  
    // Open the note file for reading and get the data (12KB)
    if ($fp = @fopen($notes_file, "r")) {
        while (!feof($fp)) {
            $line = chop(fgets($fp, 12288));
            if ($line == "") { continue; }
            list($id, $sect, $rate, $ts, $user, $note) = explode("|", $line);
            $notes[] = array(
                "id"    => $id,
                "sect"  => $sect,
                "rate"  => $rate,
                "xwhen" => $ts,
                "user"  => $user,
                "note"  => base64_decode($note)
            );
        }
        fclose($fp);
    }
    return $notes;
}

// Print out one user note entry
function manual_note_display($date, $name, $text, $id)
{
    if ($name) { $name = "\n  <strong>" . htmlspecialchars($name) . "</strong><br />"; }
    $datestr = date("d-M-Y h:i", $date);
    $datestr = ($id ? "\n  <a href=\"#$id\">$datestr</a>" : "\n  $datestr");
    $anchor  = ($id ? "<a name=\"$id\"></a>\n " : "");
    $text    = clean_note($text);

    // If the viewer is logged in, show admin options
    if (isset($_COOKIE['MAGIC_COOKIE']) && $id) {
    
        $admin = "\n  <span class=\"action\">\n   " .
        
        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=edit+' . $id,
            make_image('notes-edit.gif', 'edit note'),
            'admin',
            'scrollbars=yes,width=650,height=400'
        ) . "\n   " .
    
        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=reject+' . $id,
            make_image('notes-reject.gif', 'reject note'),
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n   " .
    
        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=delete+' . $id,
            make_image('notes-delete.gif', 'delete note'),
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n  </span>";
        
    } else { $admin = ''; }
    
    echo <<<USER_NOTE_TEXT

 {$anchor}<div class="note">{$admin}{$name}{$datestr}
  <div class="text">
{$text}
  </div>
 </div>
USER_NOTE_TEXT;
 
}
