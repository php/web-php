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

    // Set base page for this manual page
    $_SERVER['BASE_PAGE'] = 'manual/' . language_convert($PGI['head'][1]) . "/" . $PGI['this'][0];

    // Set last modification time on the current manual page
    if (($time = @filemtime($_SERVER['DOCUMENT_ROOT'] ."/". $_SERVER['BASE_PAGE'])) != false) {
        $PGI['lastmod'] = gmdate("D, d M Y", $time);
    } else {
        $PGI['lastmod'] = "Unkown";
    }
}

// Print out HTTP headers and the HTML header
// for this manual page, according to details
// already set up
function manual_header()
{
    global $PGI, $LAST_UPDATED, $MYSITE;

    // Get values out of the config array
    $title = $PGI['this'][1];
    list($encoding, $lang)  = $PGI['head'];

    header("Last-Modified: " . gmdate("D, d M Y H:i:s ", $LAST_UPDATED) . "GMT");
    //header("Cache-Control: public, max-age=600");
    header("Vary: Cookie");
    //header("Content-type: text/html;charset=$encoding");
    header("Content-type: text/html;charset=utf-8");
    header("Content-language: $lang");

    // Set base href for this manual page
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];

    manual_sidebar();
    site_header("$title - Manual", array(
		"link" => array(
			"contents"         => $PGI["home"][0],
			"index"            => $PGI["up"][0],
			"prev"             => $PGI["prev"][0],
			"next"             => $PGI["next"][0],
			"schema.dc"        => "http://purl.org/dc/elements/1.1/",
			"schema.rdfs"      => "http://www.w3.org/2000/01/rdf-schema#",
		),
		"profile" => "http://purl.org/NET/erdf/profile",
	));
    echo <<< MAIN_CONTENT
        <li id="main-column">
          <div class="content">
MAIN_CONTENT;

    manual_navbar();

echo <<< MAIN_CONTENT

            <div class="block"><span class="corners-top"><span></span></span>
              <div class="info">
				<p class="func-date">Last updated: <span>{$PGI['lastmod']}</span></p>


MAIN_CONTENT;

}

// Print out manual page footer
function manual_footer()
{
    global $PGI;

    // Get vars for easy handling
    list($filename, $title) = $PGI['this'];
    
    echo "</div><!-- .info -->\n";
    echo '<span class="corners-bottom"><span></span></span></div><!--.block-->';


    manual_notes();

    manual_navbar("bottom");
	echo <<< MAIN_CONTENT
		 </div> <!-- .content -->
        </li><!-- #main-column-->
MAIN_CONTENT;

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
    $BAR = <<< SIDEBAR
          <div class="content">
            <div class="block"><span class="corners-top"><span></span></span>
              <div class="info">
                <h3>PHP Manual</h3>
                <ul id="functions-list">
SIDEBAR;

    // Link to manual home
    $BAR .= ' <li class="header home"><a href="' . $PGI['home'][0] . '">' .
            $PGI['home'][1] . "</a></li>\n";

    // Link to parents
    if (isset($PGI['parents']) && ($c = count($PGI['parents'])-1) > 0) {
        // The root parent is the "PHP Manual"
        for($i=$c-1; $i>=0; $i--) {
            $BAR .= ' <li class="header up"><a href="' . $PGI['parents'][$i][0] . '">' .
                $PGI['parents'][$i][1] . "</a></li>\n";
        }
    }

    // Link to one page up if titles does not match
    if (($PGI['home'][1] !== $PGI['up'][1]) && $PGI['up'][1]) {
        $BAR .= ' <li class="header up sel"><a href="' . $PGI['up'][0] . '">' .
                $PGI['up'][1] . "</a><ul>\n";
    }

    // Print out one link for all siblings of this page
    foreach($PGI['toc'] as $tocitem) {
    
        // Get URL and title component
        list($url, $title) = $tocitem;

        // Get the proper classname to use for this <div>
        $liclass = ($url == $PGI['this'][0]) ? ' class="sel"' : "";
        
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

	$close = "";
    if (($PGI['home'][1] !== $PGI['up'][1]) && $PGI['up'][1]) {
      $close = "</ul></li>";
	}
    // Put navigation content into sidebar, end <div>
    $SIDEBAR_DATA = <<< SIDEBAR
     $BAR
                </ul>
              </div>
            <span class="corners-bottom"><span></span></span></div><!--.block-->
          </div><!-- .content -->
SIDEBAR;

}

function manual_navbar($location = "top")
{
    global $PGI, $LANG, $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES, $ACTIVE_ONLINE_LANGUAGES;

    // Start navbar with 
    echo <<< NAVBAR
            <div class="adv-block"><span class="corners-top"><span></span></span>
NAVBAR;
 
    if (isset($PGI['next']) && isset($PGI['next'][1])) {
        echo "  <a href=\"{$PGI['next'][0]}\" class=\"next\">" . $PGI['next'][1] . "</a>\n";
    }
    if (isset($PGI['prev']) && isset($PGI['prev'][1])) {
        echo "  <a href=\"{$PGI['prev'][0]}\" class=\"prev\">" . $PGI['prev'][1] . "</a>\n";
    } else {
        echo "  &nbsp;\n";
    }

    // Print out language switch on top of manual pages
    if ($location != 'bottom') {
        $links = array();

        // Quick access to filename
        $filename = $PGI['this'][0];

        // Disable all languages without online content
        // Add a dropdown item for all languages left
        foreach ($ACTIVE_ONLINE_LANGUAGES as $code => $name) {
            if (!preg_match("!/$code/!", $_SERVER['BASE_PAGE'])
                // && file_exists($_SERVER['DOCUMENT_ROOT'] . "/$code/$filename")
               ) {
                $links[] = array("$code/$filename", $name);
            }
        }
        $links[] = array('help-translate.php', 'Other');

        // Print out the form with all the options
        echo '<form action="/manual/change.php" method="get"><p>View this page in 

         <select name="page">';

        foreach ($links as $link) {
            echo '    <option value="' . $link[0] . '">' . $link[1] . "</option>\n";
        }
        echo '</select><input type="submit" value="&raquo;" /></p></form>';

    } else {
        echo "  &nbsp;\n";
    }
    echo <<< NAVBAR
             <span class="corners-bottom"><span></span></span>
            </div><!-- .adv-block-->
NAVBAR;
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

    // If there are few comments, provide the quick 'prevous'/'next' navigation
    // above the comments
    if(count($notes) > 2) {
        manual_navbar("bottom");
    }
echo <<< MAIN_CONTENT
            <div class="block"><span class="corners-top"><span></span></span>
MAIN_CONTENT;


    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = 
        '<div class="add-note">' .
        make_link($addnotelink, 'Add Note') .
        '</div>';

    echo <<<END_USERNOTE_HEADER

<div id="usernotes">
 {$addnotesnippet}
  <h4>User Contributed Notes</h4>
END_USERNOTE_HEADER;
    
    // If we have no notes, then inform the user
    if (sizeof($notes) == 0) {
        echo "\n <div class=\"note\">There are no user contributed notes for this page.</div>";
    }
     
    // If we have notes, print them out
    else {
		echo '<ul id="contributed-notes">';
        foreach($notes as $note) {
            manual_note_display(
                $note['xwhen'], $note['user'], $note['note'], $note['id']
            );
        }
		echo "</ul>\n";
        echo $addnotesnippet;
    }
    
    // End of #usernotes
    echo "</div>";
    echo '<span class="corners-bottom"><span></span></span></div><!--.block-->';
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

 <li id="{$id}">
  <div class="username">{$name}<a name="#{$id}">{$datestr}</a></div>
  <div class="ncontent">
   <div class="note">
	<span class="corners-top"><span></span></span>
{$text}
	<span class="corners-bottom"><span></span></span>
   </div>
  </div>
 </li>
USER_NOTE_TEXT;
 
}
