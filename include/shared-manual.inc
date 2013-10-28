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
    if (myphpnet_beta()) {
        return manual_setup_beta($page_data);
    }
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
// TODO: replace logo with logos/php-med-trans-light.gif on print
function manual_header()
{
    if (myphpnet_beta()) {
        return manual_header_beta();
    }
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

    // {{{ Build rev=canonical
    $sections = get_manual_search_sections();
    // Kill the first entry (empty)
    array_shift($sections);

    // We can at the very least kill the .php
    $shorturl = substr($PGI['this'][0], 0, -4);

    foreach($sections as $section) {
      // If we know this section
      if (strpos($PGI['this'][0], $section) === 0) {
        // We can make it even shorter
        $shorturl = substr($PGI['this'][0], strlen($section), -4);
      }
    }
    // }}}

    manual_sidebar();
    $link = array(
        "contents"         => $PGI["home"][0],
        "index"            => $PGI["up"][0],
        "prev"             => $PGI["prev"][0],
        "next"             => $PGI["next"][0],
        "schema.dc"        => "http://purl.org/dc/elements/1.1/",
        "schema.rdfs"      => "http://www.w3.org/2000/01/rdf-schema#",
        array(
            "rev"  => "canonical",
            "rel"  => "self alternate shorter shorturl shortlink",
            "href" => "http://php.net/" . $shorturl,
        ),
        array(
            "rel" => "license",
            "href" => "http://creativecommons.org/licenses/by/3.0/",
            "about" => "#content",
        ),
    );
    if (isset($PGI["extra_header_links"])) {
        $link[] = (array)$PGI["extra_header_links"];
    }

    site_header("$title - Manual", array(
        "link" => $link,
        "profile" => "http://purl.org/NET/erdf/profile",
        "extra_headers" => array(
            "Link" => "<http://php.net/" . $shorturl . ">; rel=shorturl",
        ),
        "headtags" => array(
            '<meta http-equiv="Content-language" content="' . $lang . '" />
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var toggleImage = function(elem) {
        if ($(elem).hasClass("shown")) {
            $(elem).removeClass("shown").addClass("hidden");
            $("img", elem).attr("src", "/images/notes-add.gif");
        }
        else {
            $(elem).removeClass("hidden").addClass("shown");
            $("img", elem).attr("src", "/images/notes-reject.gif");
        }
    };

    $(".soft-deprecation-notice h1.title").each(function() {
        $(this).prepend("<a class=\'toggler shown\' href=\'#\'><img src=\'/images/notes-reject.gif\' alt=\'minimize\' /></a> ");
    });
    $(".refsect1 h3.title").each(function() {
        url = "https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=" + $(this).parent().parent().attr("id") + "%23" + $(this).parent().attr("id");
        $(this).parent().prepend("<div class=\'reportbug\'><a href=\'" + url + "\'>Report a bug</a></div>");
        $(this).prepend("<a class=\'toggler shown\' href=\'#\'><img src=\'/images/notes-reject.gif\' alt=\'reject note\' /></a> ");
    });
    $("#usernotes .head").each(function() {
        $(this).prepend("<a class=\'toggler shown\' href=\'#\'><img src=\'/images/notes-reject.gif\' alt=\'reject note\' /></a> ");
    });
    $(".soft-deprecation-notice h1.title .toggler").click(function() {
        $(this).parent().siblings().slideToggle("slow");
        toggleImage(this);
        return false;
    });
    $(".refsect1 h3.title .toggler").click(function() {
        $(this).parent().siblings().slideToggle("slow");
        toggleImage(this);
        return false;
    });
    $("#usernotes .head .toggler").click(function() {
        $(this).parent().next().slideToggle("slow");
        toggleImage(this);
        return false;
    });
});
</script>
<script type="text/javascript" src="/js/usernotes.js"></script>
',


        ),
    ));
    manual_navbar();
}

// Print out manual page footer
function manual_footer()
{
    if (myphpnet_beta()) {
        return manual_footer_beta();
    }
    global $PGI;

    // Get vars for easy handling
    list($filename, $title) = $PGI['this'];

    echo "<br /><br />";
    manual_notes();
    echo "<br />";
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
        if (preg_match("!^[a-zA-Z0-9_>():&;-]+$!", $title)) {
            $wrap = '<span class="w"> </span>';
            $title = str_replace(array('_', '->', '::', '-&gt;'), array("_$wrap", "->$wrap", "::$wrap", "-&gt;$wrap"), $title);
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
    global $PGI, $LANG, $LANGUAGES, $INACTIVE_ONLINE_LANGUAGES, $ACTIVE_ONLINE_LANGUAGES;

    // Start navbar with
    echo "<!--UdmComment-->\n<div class=\"manualnavbar manualnavbar_$location\">\n <span class=\"next\">\n";
    if (isset($PGI['next']) && isset($PGI['next'][1])) {
        echo "  <a href=\"{$PGI['next'][0]}\">" .
             $PGI['next'][1] .
             make_image('caret-r.gif', '&gt;') .
             "</a>\n";
    }
    echo " </span>\n <span class=\"prev\">\n";
    if (isset($PGI['prev']) && isset($PGI['prev'][1])) {
        echo "  <a href=\"{$PGI['prev'][0]}\">" .
             make_image('caret-l.gif', '&lt;') .
             $PGI['prev'][1] . "</a>\n";
    } else {
        echo "  &nbsp;\n";
    }
    echo " </span>\n <hr />\n";


    // Quick access to filename
    $filename = $PGI['this'][0];

    // Provide last updated and online editor information on this page
    $elink = '[<a href="https://edit.php.net/?project=PHP&amp;perm=' . $PGI['head'][1] . '/' . $filename. '">edit</a>]';
    echo " <span class=\"lastupdated\">{$elink} Last updated: {$PGI['lastmod']}</span>\n";

    // Print out language switch on top of manual pages
    echo " <div class=\"langchooser\">\n";
    if ($location != 'bottom') {

        $links = array();

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
        echo '  <form action="/manual/change.php" method="get">' . "\n" .
             '   <p>view this page in </p><fieldset><select name="page">'. "\n";
        foreach ($links as $link) {
            echo '    <option value="' . $link[0] . '">' . $link[1] . "</option>\n";
        }
        echo "   </select>\n" .
             '   <input type="image" src="' . $_SERVER['STATIC_ROOT'] .
             '/images/small_submit.gif" id="changeLangImage" ' .
             'alt="Change language" />' . "\n  </fieldset></form>\n";

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
    if (myphpnet_beta()) {
        return manual_notes_beta();
    }
    // Get needed values
    list($filename, $title) = $GLOBALS['PGI']['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    // Load user note for this page
    $notes = manual_notes_load($filename);
    uasort($notes, "manual_notes_sort");

    // If there are few comments, provide the quick 'prevous'/'next' navigation
    // above the comments
    if(count($notes) > 2) {
        manual_navbar("bottom");
    }

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet =
        make_link($addnotelink, make_image('notes-add.gif', 'add a note', FALSE, 'class="middle"')) .
        ' <small>' .
        make_link($addnotelink, 'add a note') .
        '</small>';
    
    $num_notes = count($notes);

	// note snippet
	list($redir_filename) = $GLOBALS['PGI']['this'];
    if (substr($redir_filename, -4) == '.php') {
      $redir_filename = substr($redir_filename, 0, -4);
    }

    echo <<<END_USERNOTE_HEADER

<div id="usernotes">
 <div class="head">
  <span class="action">{$addnotesnippet}</span>
  <small>User Contributed Notes</small>
  <strong>{$title}</strong> - [<em>{$num_notes}</em> notes]
 </div>
END_USERNOTE_HEADER;

    // If we have no notes, then inform the user
    if (sizeof($notes) == 0) {
        echo "\n <div class=\"note\">There are no user contributed notes for this page.</div>";
    }

    // If we have notes, print them out
    else {
        echo '<div id="allnotes">';

        foreach($notes as $note) {
            manual_note_display(
                $note['xwhen'], $note['user'], $note['note'], $note['id'], $note['votes']
            );
        }
        echo "</div>\n";
        echo "\n <div class=\"foot\">$addnotesnippet</div>\n";
    }

    // End of #usernotes
    echo "</div>";
}

function manual_notes_beta() {
    // Get needed values
    list($filename, $title) = $GLOBALS['PGI']['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    // Load user note for this page
    $notes = manual_notes_load($filename);
    uasort($notes, "manual_notes_sort");

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = make_link(
        $addnotelink,
        "<img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12' /> <small>add a note</small>"
    );

    $num_notes = count($notes);
    if ($num_notes) {
        $num_notes = "<span class=\"count\">$num_notes note" . ($num_notes == 1 ? '' : 's') . "</span>";
    } else {
        $num_notes = null;
    }

    echo <<<END_USERNOTE_HEADER

<section id="usernotes">
 <div class="head">
  <span class="action">{$addnotesnippet}</span>
  <h3 class="title">User Contributed Notes {$num_notes}</h3>
 </div>
END_USERNOTE_HEADER;

    // If we have no notes, then inform the user
    if (sizeof($notes) == 0) {
        echo "\n <div class=\"note\">There are no user contributed notes for this page.</div>";
    }

    // If we have notes, print them out
    else {
        echo '<div id="allnotes">';

        foreach($notes as $note) {
            manual_note_display(
                $note['xwhen'], $note['user'], $note['note'], $note['id'], $note['votes']
            );
        }
        echo "</div>\n";
        echo "\n <div class=\"foot\">$addnotesnippet</div>\n";
    }

    // #usernotes gets closed by the footer
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
    // ..if it exists
    if (!file_exists($notes_file)) {
        return $notes;
    }
    if ($fp = @fopen($notes_file, "r")) {
        while (!feof($fp)) {
            $line = chop(fgets($fp, 12288));
            if ($line == "") { continue; }
            @list($id, $sect, $rate, $ts, $user, $note, $up, $down) = explode("|", $line);
            $notes[$id] = array(
                "id"    => $id,
                "sect"  => $sect,
                "rate"  => $rate,
                "xwhen" => $ts,
                "user"  => $user,
                "note"  => base64_decode($note),
                "votes"  => array("up"=> (int)$up, "down"=> (int)$down)
            );
        }
        fclose($fp);
    }
    return $notes;
}

// Print out one user note entry
function manual_note_display($date, $name, $text, $id, $votes = array('up'=>0,'down'=>0), $voteOption = true)
{
    if ($name) {
        $name = "\n  <strong class=\"user\"><em>" . htmlspecialchars($name) . "</em></strong>";
    } else {
        $name = "<strong class=\"user\"><em>Anonymous</em></strong>";
    }
    $name = ($id ? "\n  <a href=\"#$id\" class=\"name\">$name</a><a class=\"genanchor\" href=\"#$id\"> &para;</a>" : "\n  $name");

    // New date style will be relative time
    $datestr = relTime(new DateTime("@{$date}"));
    $fdatestr = date("Y-m-d h:i", $date);
    $text    = clean_note($text);
    
    // Calculate note rating by up/down votes
    $vote = $votes['up'] - $votes['down'];
    $p = floor(($votes['up'] / (($votes['up'] + $votes['down']) ? $votes['up'] + $votes['down'] : 1)) * 100);
    $rate = !$p && !($votes['up'] + $votes['down']) ? "no votes..." : "$p% like this...";

    // Vote User Notes Div
    if ($voteOption) {
	    list($redir_filename) = $GLOBALS['PGI']['this'];
	    if (substr($redir_filename, -4) == '.php') {
	        $redir_filename = substr($redir_filename, 0, -4);
	    }
	    $rredir_filename = urlencode($redir_filename);
	    $votediv = <<<VOTEDIV
  <div class="votes">
    <div id="Vu{$id}">
    <a href="/manual/vote-note.php?id={$id}&amp;page={$rredir_filename}&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd{$id}">
    <a href="/manual/vote-note.php?id={$id}&amp;page={$rredir_filename}&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V{$id}" title="{$rate}">
    {$vote}
    </div>
  </div>
VOTEDIV;
	} else {
		$votediv = null;
	}

    // If the viewer is logged in, show admin options
    if (isset($_COOKIE['IS_DEV']) && $id) {

        $admin = "\n  <span class=\"admin\">\n   " .

        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=edit+' . $id,
            '<img src="/images/notes-edit@2x.png" height="12" width="12" alt="edit note" />',
            'admin',
            'scrollbars=yes,width=650,height=400'
        ) . "\n   " .

        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=reject+' . $id,
            '<img src="/images/notes-reject@2x.png" height="12" width="12" alt="reject note" />',
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n   " .

        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=delete+' . $id,
            '<img src="/images/notes-delete@2x.png" height="12" width="12" alt="delete note" />',
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n  </span>";

    } else {
        $admin = '';
    }

    echo <<<USER_NOTE_TEXT

  <div class="note" id="$id">{$votediv}{$name}{$admin}<div class="date" title="$fdatestr"><strong>{$datestr}</strong></div>
  <div class="text" id="Hcom{$id}">
{$text}
  </div>
 </div>
USER_NOTE_TEXT;

}

/* vim: set et ts=4 sw=4: */

function manual_setup_beta($setup) {
    global $PGI, $MYSITE;
    $PGI = $setup;
    // Set base href for this manual page
    $_SERVER['BASE_PAGE'] = 'manual/' . language_convert($setup['head'][1]) . "/" . $setup['this'][0];
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];


    $siblings = array();
    foreach($setup["toc"] as $entry) {
        // We strip out any class prefix here, we only want method names
        $methodname = $entry[1];
        if(strpos($entry[1], '::') !== false && strpos($entry[1], ' ') === false) {
            list($classname, $methodname) = explode('::', $entry[1]);
        }
        //add zero-width spaces to allow line-breaks at various characters
        $methodname = str_replace(array('-','_'), array('-&#8203;','_&#8203;'), $methodname);
        $siblings[] = array(
            "title" => $methodname,
            "link"  => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        );
    }
    
    $menu = array();
    foreach(array_reverse($setup["parents"]) as $parent) {
        $menu[] = array(
            "title" => $parent[1],
            "link"  => $parent[0],
        );
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = array(
            "title" => $setup["up"][1],
            "link"  => $setup["up"][0],
        );
        $siblings = array(array_merge($last_item, array("children" => $siblings)));
        $menu[] = $last_item;
    }
    
    $_SERVER["BASE_PAGE"] = "/manual/" . $setup["head"][1] . "/" . $setup["this"][0];

    $config = array(
        "current" => "docs",
        "leftmenu" => $siblings,
        "breadcrumbs" => $menu,
        "meta-navigation" => array(
            "contents" => $setup["home"][0],
            "index"    => $setup["up"][0],
            "prev"     => $setup["prev"][0],
            "next"     => $setup["next"][0],
        ),
        "lang"         => $setup["head"][1],
        "thispage"     => $setup["this"][0],
    );
    site_header($setup["this"][1] . " - Manual ", $config);
    
    echo '<div class="change-language">' . manual_language_chooser($config["lang"], $config["thispage"]) . '</div>';


}
function manual_language_chooser($currentlang, $currentpage) {
    global $ACTIVE_ONLINE_LANGUAGES;


    $links = array();

    foreach ($ACTIVE_ONLINE_LANGUAGES as $lang => $name) {
        $links[] = array("$lang/$currentpage", $name, $lang);
    }

    // Print out the form with all the options
    $rt = '<form action="/manual/change.php" method="get" id="changelang" name="changelang">'.
    	  '<fieldset>'.
    	  '
          <p>Change language: 
          <select onchange="document.changelang.submit()" name="page" id="changelang-langs">';
                foreach ($links as $link) {
                    $rt.= "<option value='{$link[0]}' " .($link[2] == $currentlang ? "selected" : ""). ">{$link[1]}</option>\n";
                }
    	$rt.= '<option value="help-translate.php">Other</option>'.
	      '</select></p>'.
              '</fieldset>'.
              '</form>';
	return $rt;
}

function manual_header_beta(){}
function manual_footer_beta() {

    manual_notes();
    echo "</section>";
    site_footer(array('elephpants' => true));
}

// This function takes a DateTime object and returns a formated string of the time difference relative to now
function relTime(DateTime $date) {
    $current = new DateTime;
    $diff = $current->diff($date);
    $units = array("year" => $diff->format("%y"),
                   "month" => $diff->format("%m"),
                   "day" => $diff->format("%d"),
                   "hour" => $diff->format("%h"),
                   "minute" => $diff->format("%i"),
                   "second" => $diff->format("%s"),
                  );
    $out = "just now...";
    foreach ($units as $unit => $amount) {
        if (empty($amount)) {
            continue;
        }
        $out = $amount . " " . ($amount == 1 ? $unit : $unit . "s") . " ago";
        break;
    }
    return $out;
}

// Sort notes by rating and group by date
function manual_notes_sort($a, $b)
{
    if ($a['votes']['up'] + $a['votes']['down'] < 1) {
      $c = 1;
    } else {
      $c = $a['votes']['up'] + $a['votes']['down'];
    }
    if ($b['votes']['up'] + $b['votes']['down'] < 1) {
      $d = 1;
    } else {
      $d = $b['votes']['up'] + $b['votes']['down'];
    }
	$voteA = $a['votes']['up'] / $c;
	$voteB = $b['votes']['up'] / $d;
	$rateA = $a['votes']['up'] - $a['votes']['down'];
	$rateB = $b['votes']['up'] - $b['votes']['down'];
	// Lower voted notes go to the bottom regardless of date
	if ($voteA > $voteB) {
		// Exception to the rule for today's notes
		if ($b['xwhen'] >= mktime(0,0,0,date('n'),date('j'),date('Y')) && $voteB > -1) return 1;
		// Another exception for notes with no votes compared to notes with more than 4 votes and 30% or less rating
		if ($voteB === 0 && $d === 1 && $voteA <= 0.30 && $c >= 4) return 1;
		return -1;
	}
	// Higher voted notes go to the top regardless of date
	elseif ($voteA < $voteB) {
		// Exception to the rule for today's notes
		if ($a['xwhen'] >= mktime(0,0,0,date('n'),date('j'),date('Y')) && $voteA > -1) return -1;
		// Another exception for notes with no votes compared to notes with more than 4 votes and 30% or less rating
		if ($voteA === 0 && $c === 1 && $voteB <= 0.30 && $d >= 4) return -1;
		return 1;
	}
	// Votes of equal amounts are sorted based on the overall rating and in descending order by date
	else {
		if ($rateA > $rateB) {
		  return -1;
		}
		elseif ($rateA < $rateB) {
		  return 1;
		}
		else {
			if ($a['xwhen'] > $b['xwhen']) {
				return -1;
			}
			elseif ($a['xwhen'] < $b['xwhen']) {
				return 1;
			}
			else {
				return 0;
			}
		}
	}
}

