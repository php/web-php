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
function manual_notes() {
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

// Set up variables important for this page
// including HTTP header information
function manual_setup($setup) {
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
        "lang" => $setup["head"][1],
        "thispage" => $setup["this"][0],
        "prev" => $setup["prev"],
        "next" => $setup["next"],
    );
    site_header($setup["this"][1] . " - Manual ", $config);
    
    $id = substr($setup['this'][0], 0, -4);
    ?>
      <div class="page-tools">
        <div class="change-language">
          <?php echo manual_language_chooser($config['lang'], $config['thispage']); ?>
        </div>
        <div class="edit-bug">
          <a href="https://edit.php.net/?project=PHP&amp;perm=<?php echo $config['lang']; ?>/<?php echo $config['thispage']; ?>">Edit</a>
          <a href="https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=<?php echo $id; ?>">Report a Bug</a>
        </div>
      </div>
    <?php
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

function manual_header(){}
function manual_footer() {

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

