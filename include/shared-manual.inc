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
// User note display functions
// =============================================================================


class ManualNotesSorter {
    private $maxVote;
    private $minVote;
    private $maxAge;
    private $minAge;

    private $voteFactor;
    private $ratingFactor;
    private $ageFactor;

    private $voteWeight = 38;
    private $ratingWeight = 60;
    private $ageWeight = 2;

    function sort(array &$notes) {
        // First we make a pass over the data to get the min and max values
        // for data normalization.
        $this->findMinMaxValues($notes);

        $this->voteFactor = $this->maxVote - $this->minVote
            ? (1 - .3)/ ($this->maxVote - $this->minVote)
            : .5;
        $this->ageFactor = $this->maxAge - $this->minAge
            ? 1 / ($this->maxAge - $this->minAge)
            : .5;

        $this->ageFactor *= $this->ageWeight;

        // Second we loop through to calculate sort priority using the above numbers
        $this->calcSortPriority($notes);

        // Third we sort the data.
        uasort($notes, array($this, 'factorSort'));
    }


    private function calcVotePriority(array $note) {
        return ($note['score'] - $this->minVote) * $this->voteFactor + .3;
    }


    private function calcRatingPriority(array $note) {
        if ($note['total'] <= 2) {
            return 0.5;
        } else {
            return $note['rating'];
        }
    }


    private function calcSortPriority(array &$notes) {
        foreach ($notes as &$note) {
            $prio = array(
                'vote' => $this->calcVotePriority($note) * $this->voteWeight,
                'rating' => $this->calcRatingPriority($note) * $this->ratingWeight,
                'age' =>  ($note['xwhen'] - $this->minAge) * $this->ageFactor
            );
            $note['sort'] = $prio['value'] = array_sum($prio);
        }
    }


    /*
     * Not sure why, but using `$b['sort'] - $a['sort']` does not seem to 
     * work properly.
     */
    private function factorSort($a, $b) {
        if ($a['sort'] < $b['sort']) {
            return 1;
        } elseif ($a['sort'] == $b['sort']) {
            return 0;
        } else {
            return -1;
        }
    }


    private function findMinMaxValues(array &$notes) {
        $count = count($notes);
        if ($count <= 0) {
            return;
        }
        $note = array_shift($notes);
        $note['score'] = $net = ($note['votes']['up'] - $note['votes']['down']);
        $note['total'] = $totalVotes = ($note['votes']['up'] + $note['votes']['down']);
        $note['rating'] = $totalVotes > 0 
            ? $note['votes']['up'] / $totalVotes
            : .5;

        $this->minVote = $this->maxVote = $net;
        $this->minAge = $this->maxAge = $age = $note['xwhen'];

        $first = $note;

        foreach ($notes as &$note) {
            $note['score'] = $net = ($note['votes']['up'] - $note['votes']['down']);
            $note['total'] = $totalVotes = ($note['votes']['up'] + $note['votes']['down']);
            $note['rating'] = $totalVotes > 0 
                ? $note['votes']['up'] / $totalVotes
                : .5;
            $age = $note['xwhen'];
            $this->maxVote = max($this->maxVote, $net);
            $this->minVote = min($this->minVote, $net);
            $this->maxAge = max($this->maxAge, $age);
            $this->minAge = min($this->minAge, $age);
        }
        array_unshift($notes, $first);
    }
}


// Print out all user notes for this manual page
function manual_notes($notes) {
    // Get needed values
    list($filename, $title) = $GLOBALS['PGI']['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    $sorter = new ManualNotesSorter;
    $sorter->sort($notes);

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = make_link(
        $addnotelink,
        "<img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12'> <small>add a note</small>"
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
            '<img src="/images/notes-edit@2x.png" height="12" width="12" alt="edit note">',
            'admin',
            'scrollbars=yes,width=650,height=400'
        ) . "\n   " .

        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=reject+' . $id,
            '<img src="/images/notes-reject@2x.png" height="12" width="12" alt="reject note">',
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n   " .

        make_popup_link(
            'https://master.php.net/manage/user-notes.php?action=delete+' . $id,
            '<img src="/images/notes-delete@2x.png" height="12" width="12" alt="delete note">',
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


function manual_navigation_breadcrumbs(array $setup) {
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
        $menu[] = $last_item;
    } 
    return $menu;
}

function manual_navigation_related(array $setup) {
    $siblings = array();
    foreach($setup['toc'] as $entry) {
        $siblings[] = array(
            "title" => manual_navigation_methodname($entry[1]),
            "link"  => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        );      
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = array(
            "title" => $setup["up"][1],
            "link"  => $setup["up"][0],
        );
        $siblings = array(array_merge($last_item, array("children" => $siblings)));
    }
    return $siblings;
}

function manual_navigation_deprecated(array $setup) {
    $methods = array();
    foreach((array)$setup['toc_deprecated'] as $entry) {
        $methods[] = array(
            "title" => manual_navigation_methodname($entry[1]),
            "link"  => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        );
    }

    return $methods;
}

function manual_navigation_methodname($methodname) {
    // We strip out any class prefix here, we only want method names
    if (strpos($methodname, '::') !== false && strpos($methodname, ' ') === false) {
        $tmp = explode('::', $methodname);
        $methodname = $tmp[1];
    }

    // Add zero-width spaces to allow line-breaks at various characters
    return str_replace(array('-','_'), array('-&#8203;','_&#8203;'), $methodname);
}

// Set up variables important for this page
// including HTTP header information
function manual_setup($setup) {
    global $PGI, $MYSITE, $USERNOTES;
    global $ACTIVE_ONLINE_LANGUAGES;

    //TODO: get rid of this hack to get the related items into manual_footer
    global $__RELATED; 

    if (!isset($setup["toc_deprecated"])) {
        $setup["toc_deprecated"] = array();
    }
    $PGI = $setup;
    // Set base href for this manual page
    $base = 'manual/' . language_convert($setup['head'][1]) . "/";
    $_SERVER['BASE_PAGE'] = $base . $setup['this'][0];
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];

    // Load user note for this page
    list($filename, $title) = $PGI['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }
    $USERNOTES = manual_notes_load($filename);
    $note = current($USERNOTES);
    $lastusernote = $note["xwhen"];

    $timestamps = array(
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/" . $_SERVER["BASE_PAGE"]),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/include/prepend.inc"),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/styles/theme-base.css"),
        $lastusernote,
    );
    $lastmod = max($timestamps);

    $breadcrumbs = manual_navigation_breadcrumbs($setup);
    $__RELATED['toc'] = manual_navigation_related($setup);
    $__RELATED['toc_deprecated'] = manual_navigation_deprecated($setup);

    $config = array(
        "current" => "docs",
        "breadcrumbs" => $breadcrumbs,
        "languages"   => array_keys($ACTIVE_ONLINE_LANGUAGES),
        "meta-navigation" => array(
            "contents" => $base . $setup["home"][0],
            "index"    => $base . $setup["up"][0],
            "prev"     => $base . $setup["prev"][0],
            "next"     => $base . $setup["next"][0],
        ),
        "lang" => $setup["head"][1],
        "thispage" => $setup["this"][0],
        "prev" => $setup["prev"],
        "next" => $setup["next"],
        "cache" => $lastmod,
    );
    site_header($setup["this"][1] . " - Manual ", $config);
    
    $id = substr($setup['this'][0], 0, -4);
    $language_chooser = 'manual_language_chooser';
    echo <<<PAGE_TOOLS
  <div class="page-tools">
    <div class="change-language">
      {$language_chooser($config['lang'], $config['thispage'])}
    </div>
    <div class="edit-bug">
      <a href="https://edit.php.net/?project=PHP&amp;perm={$config['lang']}/{$config['thispage']}">Edit</a>
      <a href="https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=$id">Report a Bug</a>
    </div>
  </div>
PAGE_TOOLS;
}

function manual_language_chooser($currentlang, $currentpage) {
    global $ACTIVE_ONLINE_LANGUAGES;

    $links = array();

    foreach ($ACTIVE_ONLINE_LANGUAGES as $lang => $name) {
        $links[] = array("$lang/$currentpage", $name, $lang);
    }

    // Print out the form with all the options
    $othersel = ' selected="selected"';
    $format_options = function (array $links) use ($currentlang, &$othersel) {
        $out = '';
        $tab = str_repeat('  ', 6);
        foreach ($links as $link) {
            list($value, $text, $lang) = $link;
            $selected = '';
            if ($lang == $currentlang) {
                $selected = ' selected="selected"';
                $othersel = '';
            }
            $out .= "$tab<option value='$value'$selected>$text</option>\n";
        }
        return trim($out);
    };
    $r = <<<CHANGE_LANG
      <form action="/manual/change.php" method="get" id="changelang" name="changelang">
        <fieldset>
          <label for="changelang-langs">Change language:</label>
          <select onchange="document.changelang.submit()" name="page" id="changelang-langs">
            {$format_options($links)}
            <option value="help-translate.php"{$othersel}>Other</option>
          </select>
        </fieldset>
      </form>
CHANGE_LANG;
    return trim($r);
}

function manual_header(){}
function manual_footer() {
    global $USERNOTES, $__RELATED;

    manual_notes($USERNOTES);
    echo "</section>";
    $config = array(
        'related_menu' => $__RELATED['toc'],
        'related_menu_deprecated' => $__RELATED['toc_deprecated']
    );
    site_footer($config);
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

/* vim: set et ts=4 sw=4: */

