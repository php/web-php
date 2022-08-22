<?php // -*- C++ -*-

/*

 This file is included directly on all manual pages,
 and therefore is the entering point for all manual pages
 to the website function collection. These functions display
 the manual pages with headers and navigation.

 The $PGI global variable is used to store all page related
 information, including HTTP header related data.

*/

// Ensure that our environment is set up
include_once __DIR__ . '/prepend.inc';

// Set variable defaults
$PGI = []; $SIDEBAR_DATA = '';

// =============================================================================
// User note display functions
// =============================================================================

require_once __DIR__ . '/../autoload.php';
use phpweb\UserNotes\Sorter;

// Print out all user notes for this manual page
function manual_notes($notes) {
    // Get needed values
    list($filename) = $GLOBALS['PGI']['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    $sorter = new Sorter;
    $sorter->sort($notes);

    // Link target to add a note to the current manual page,
    // and it's extended form with a [+] image
    $addnotelink = '/manual/add-note.php?sect=' . $filename .
                   '&amp;redirect=' . $_SERVER['BASE_HREF'];
    $addnotesnippet = make_link(
        $addnotelink,
        "＋<small>add a note</small>"
    );

    $num_notes = count($notes);
    $noteCountHtml = '';
    if ($num_notes) {
        $noteCountHtml = "<span class=\"count\">$num_notes note" . ($num_notes == 1 ? '' : 's') . "</span>";
    }

    echo <<<END_USERNOTE_HEADER
<section id="usernotes">
 <div class="head">
  <span class="action">{$addnotesnippet}</span>
  <h3 class="title">User Contributed Notes {$noteCountHtml}</h3>
 </div>
END_USERNOTE_HEADER;

    // If we have no notes, then inform the user
    if ($num_notes === 0) {
        echo "\n <div class=\"note\">There are no user contributed notes for this page.</div>";
    } else {
        // If we have notes, print them out
        echo '<div id="allnotes">';
        foreach ($notes as $note) {
            manual_note_display(
                $note['xwhen'], $note['user'], $note['note'], $note['id'], $note['votes']
            );
        }
        echo "</div>\n";
        echo "<div class=\"foot\">$addnotesnippet</div>\n";
    }
    echo "</section>";
}
// Get user notes from the appropriate text dump
function manual_notes_load($id)
{
    // Initialize values
    $notes = [];
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
            $notes[$id] = [
                "id" => $id,
                "sect" => $sect,
                "rate" => $rate,
                "xwhen" => $ts,
                "user" => $user,
                "note" => base64_decode($note, true),
                "votes" => ["up" => (int)$up, "down" => (int)$down]
            ];
        }
        fclose($fp);
    }
    return $notes;
}

// Print out one user note entry
function manual_note_display($date, $name, $text, $id, $votes = ['up' => 0, 'down' => 0], $voteOption = true)
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
    $text = clean_note($text);

    // Calculate note rating by up/down votes
    $vote = $votes['up'] - $votes['down'];
    $p = floor(($votes['up'] / (($votes['up'] + $votes['down']) ?: 1)) * 100);
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
            'https://main.php.net/manage/user-notes.php?action=edit+' . $id,
            '<img src="/images/notes-edit@2x.png" height="12" width="12" alt="edit note">',
            'admin',
            'scrollbars=yes,width=650,height=400'
        ) . "\n   " .

        make_popup_link(
            'https://main.php.net/manage/user-notes.php?action=reject+' . $id,
            '<img src="/images/notes-reject@2x.png" height="12" width="12" alt="reject note">',
            'admin',
            'scrollbars=no,width=300,height=200'
        ) . "\n   " .

        make_popup_link(
            'https://main.php.net/manage/user-notes.php?action=delete+' . $id,
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
    $menu = [];
    foreach (array_reverse($setup["parents"]) as $parent) {
        $menu[] = [
            "title" => $parent[1],
            "link" => $parent[0],
        ];
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = [
            "title" => $setup["up"][1],
            "link" => $setup["up"][0],
        ];
        $menu[] = $last_item;
    }
    return $menu;
}

function manual_navigation_related(array $setup) {
    $siblings = [];
    foreach ($setup['toc'] as $entry) {
        $siblings[] = [
            "title" => manual_navigation_methodname($entry[1]),
            "link" => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        ];
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = [
            "title" => $setup["up"][1],
            "link" => $setup["up"][0],
        ];
        $siblings = [array_merge($last_item, ["children" => $siblings])];
    }
    return $siblings;
}

function manual_navigation_deprecated(array $setup) {
    $methods = [];
    foreach ((array)$setup['toc_deprecated'] as $entry) {
        $methods[] = [
            "title" => manual_navigation_methodname($entry[1]),
            "link" => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        ];
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
    return str_replace(['-', '_'], ['-&#8203;', '_&#8203;'], $methodname);
}

// Set up variables important for this page
// including HTTP header information
function manual_setup($setup) {
    global $PGI, $MYSITE, $USERNOTES;
    global $ACTIVE_ONLINE_LANGUAGES;

    //TODO: get rid of this hack to get the related items into manual_footer
    global $__RELATED;

    if (!isset($setup["toc_deprecated"])) {
        $setup["toc_deprecated"] = [];
    }
    $PGI = $setup;
    // Set base href for this manual page
    $base = 'manual/' . language_convert($setup['head'][1]) . "/";
    $_SERVER['BASE_PAGE'] = $base . $setup['this'][0];
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];

    $timestamps = [
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/" . $_SERVER["BASE_PAGE"]),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/include/prepend.inc"),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/styles/theme-base.css"),
    ];

    // Load user note for this page
    list($filename, $title) = $PGI['this'];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }
    $USERNOTES = manual_notes_load($filename);
    if ($USERNOTES) {
        $note = current($USERNOTES);
        $timestamps[] = $note["xwhen"];
    }

    $lastmod = max($timestamps);

    $breadcrumbs = manual_navigation_breadcrumbs($setup);
    $__RELATED['toc'] = manual_navigation_related($setup);
    $__RELATED['toc_deprecated'] = manual_navigation_deprecated($setup);

    $config = [
        "current" => "docs",
        "breadcrumbs" => $breadcrumbs,
        "languages" => array_keys($ACTIVE_ONLINE_LANGUAGES),
        "meta-navigation" => [
            "contents" => $base . $setup["home"][0],
            "index" => $base . $setup["up"][0],
            "prev" => $base . $setup["prev"][0],
            "next" => $base . $setup["next"][0],
        ],
        "lang" => $setup["head"][1],
        "thispage" => $setup["this"][0],
        "prev" => $setup["prev"],
        "next" => $setup["next"],
        "cache" => $lastmod,
    ];
    site_header($setup["this"][1] . " - Manual ", $config);

    $id = substr($setup['this'][0], 0, -4);
    $repo = strtolower($config['lang']); // pt_BR etc.

    $edit_url = "https://github.com/php/doc-{$repo}";
    // If the documentation source information is available (generated using
    // doc-base/configure.php and PhD) then try and make a source-specific URL.
    if (isset($setup['source'])) {
        $source_lang = $setup['source']['lang'];
        if ($source_lang === $repo || $source_lang === 'base') {
            $edit_url = "https://github.com/php/doc-{$source_lang}/blob/master/{$setup['source']['path']}";
        }
    }

    $languageChooser = manual_language_chooser($config['lang'], $config['thispage']);

    echo <<<PAGE_TOOLS
  <div class="page-tools">
    <div class="change-language">
      {$languageChooser}
    </div>
    <div class="edit-bug">
      <a href="{$edit_url}">Submit a Pull Request</a>
      <a href="https://github.com/php/doc-{$repo}/issues/new?body=From%20manual%20page:%20https:%2F%2Fphp.net%2F$id%0A%0A---">Report a Bug</a>
    </div>
  </div>
PAGE_TOOLS;
}

function manual_language_chooser($currentlang, $currentpage) {
    global $ACTIVE_ONLINE_LANGUAGES;

    $links = [];

    foreach ($ACTIVE_ONLINE_LANGUAGES as $lang => $name) {
        $links[] = ["$lang/$currentpage", $name, $lang];
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

function manual_footer() {
    global $USERNOTES, $__RELATED;

    manual_notes($USERNOTES);
    $config = [
        'related_menu' => $__RELATED['toc'],
        'related_menu_deprecated' => $__RELATED['toc_deprecated']
    ];
    site_footer($config);
}

// This function takes a DateTime object and returns a formated string of the time difference relative to now
function relTime(DateTime $date) {
    $current = new DateTime;
    $diff = $current->diff($date);
    $units = ["year" => $diff->format("%y"),
        "month" => $diff->format("%m"),
        "day" => $diff->format("%d"),
        "hour" => $diff->format("%h"),
        "minute" => $diff->format("%i"),
        "second" => $diff->format("%s"),
    ];
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
