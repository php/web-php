<?php

namespace phpweb\UserNotes;

final class UserNoteService
{
    /**
     * Get user notes from the appropriate text dump
     *
     * @return array<string, UserNote>
     */
    public function load(string $id): array
    {
        $hash = substr(md5($id), 0, 16);
        $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" . substr($hash, 0, 2) . "/$hash";

        // Open the note file for reading and get the data (12KB)
        // ..if it exists
        if (!file_exists($notes_file)) {
            return [];
        }
        $notes = [];
        if ($fp = @fopen($notes_file, "r")) {
            while (!feof($fp)) {
                $line = chop(fgets($fp, 12288));
                if ($line == "") { continue; }
                @list($id, $sect, $rate, $ts, $user, $note, $up, $down) = explode("|", $line);
                $notes[$id] = new UserNote($id, $sect, $rate, $ts, $user, base64_decode($note, true), (int) $up, (int) $down);
            }
            fclose($fp);
        }
        return $notes;
    }

    /**
     * Print out all user notes for this manual page
     *
     * @param array<string, UserNote> $notes
     */
    public function display($notes):void {
        global $LANG;

        // Get needed values
        list($filename) = $GLOBALS['PGI']['this'];

        // Drop file extension from the name
        if (substr($filename, -4) == '.php') {
            $filename = substr($filename, 0, -4);
        }

        $sorter = new Sorter();
        $sorter->sort($notes);

        $addNote = autogen('add_a_note', $LANG);
        $repo = strtolower($LANG);
        // Link target to add a note to the current manual page,
        // and it's extended form with a [+] image
        $addnotelink = '/manual/add-note.php?sect=' . $filename .
            '&amp;repo=' . $repo .
            '&amp;redirect=' . $_SERVER['BASE_HREF'];
        $addnotesnippet = make_link(
            $addnotelink,
            "＋<small>$addNote</small>",
        );

        $num_notes = count($notes);
        $noteCountHtml = '';
        if ($num_notes) {
            $noteCountHtml = "<span class=\"count\">$num_notes note" . ($num_notes == 1 ? '' : 's') . "</span>";
        }

        $userContributedNotes = autogen('user_contributed_notes', $LANG);
        echo <<<END_USERNOTE_HEADER
        <section id="usernotes">
        <div class="head">
        <span class="action">{$addnotesnippet}</span>
        <h3 class="title">$userContributedNotes {$noteCountHtml}</h3>
        </div>
        END_USERNOTE_HEADER;

        // If we have no notes, then inform the user
        if ($num_notes === 0) {
            $noUserContributedNotes = autogen('no_user_notes', $LANG);
            echo "\n <div class=\"note\">$noUserContributedNotes</div>";
        } else {
            // If we have notes, print them out
            echo '<div id="allnotes">';
            foreach ($notes as $note) {
                $this->displaySingle($note);
            }
            echo "</div>\n";
            echo "<div class=\"foot\">$addnotesnippet</div>\n";
        }
        echo "</section>";
    }

    /**
     * Print out one user note entry
     */
    public function displaySingle(UserNote $note, $voteOption = true): void
    {
        if ($note->user) {
            $name = "\n  <strong class=\"user\"><em>" . htmlspecialchars($note->user) . "</em></strong>";
        } else {
            $name = "<strong class=\"user\"><em>Anonymous</em></strong>";
        }
        $name = ($note->id ? "\n  <a href=\"#{$note->id}\" class=\"name\">$name</a><a class=\"genanchor\" href=\"#{$note->id}\"> &para;</a>" : "\n  $name");

        // New date style will be relative time
        $date = new \DateTime("@{$note->ts}");
        $datestr = $this->relTime($date);
        $fdatestr = $date->format("Y-m-d h:i");
        $text = $this->cleanContent($note->text);

        // Calculate note rating by up/down votes
        $vote = $note->upvotes - $note->downvotes;
        $p = floor(($note->upvotes / (($note->upvotes + $note->downvotes) ?: 1)) * 100);
        $rate = !$p && !($note->upvotes + $note->downvotes) ? "no votes..." : "$p% like this...";

        // Vote User Notes Div
        if ($voteOption) {
            list($redir_filename) = $GLOBALS['PGI']['this'];
            if (substr($redir_filename, -4) == '.php') {
                $redir_filename = substr($redir_filename, 0, -4);
            }
            $rredir_filename = urlencode($redir_filename);
            $votediv = <<<VOTEDIV
              <div class="votes">
                <div id="Vu{$note->id}">
                <a href="/manual/vote-note.php?id={$note->id}&amp;page={$rredir_filename}&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
                </div>
                <div id="Vd{$note->id}">
                <a href="/manual/vote-note.php?id={$note->id}&amp;page={$rredir_filename}&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
                </div>
                <div class="tally" id="V{$note->id}" title="{$rate}">
                {$vote}
                </div>
              </div>
            VOTEDIV;
        } else {
            $votediv = null;
        }

        // If the viewer is logged in, show admin options
        if (isset($_COOKIE['IS_DEV']) && $note->id) {

            $admin = "\n  <span class=\"admin\">\n   " .

            $this->makePopupLink(
                'https://main.php.net/manage/user-notes.php?action=edit+' . $note->id,
                '<img src="/images/notes-edit@2x.png" height="12" width="12" alt="edit note">',
                'admin',
                'scrollbars=yes,width=650,height=400',
            ) . "\n   " .

            $this->makePopupLink(
                'https://main.php.net/manage/user-notes.php?action=reject+' . $note->id,
                '<img src="/images/notes-reject@2x.png" height="12" width="12" alt="reject note">',
                'admin',
                'scrollbars=no,width=300,height=200',
            ) . "\n   " .

            $this->makePopupLink(
                'https://main.php.net/manage/user-notes.php?action=delete+' . $note->id,
                '<img src="/images/notes-delete@2x.png" height="12" width="12" alt="delete note">',
                'admin',
                'scrollbars=no,width=300,height=200',
            ) . "\n  </span>";

        } else {
            $admin = '';
        }

        echo <<<USER_NOTE_TEXT

          <div class="note" id="{$note->id}">{$votediv}{$name}{$admin}<div class="date" title="$fdatestr"><strong>{$datestr}</strong></div>
          <div class="text" id="Hcom{$note->id}">
        {$text}
          </div>
         </div>
        USER_NOTE_TEXT;
    }

    // Clean out the content of one user note for printing to HTML
    private function cleanContent(string $text): string
    {
        // Highlight PHP source
        $text = highlight_php(trim($text), true);

        // Turn urls into links
        return preg_replace(
            '!((mailto:|(https?|ftp|nntp|news)://).*?)(\s|<|\)|"|\\\\|\'|$)!',
            '<a href="\1" rel="nofollow" target="_blank">\1</a>\4',
            $text,
        );
    }

    /**
     * This function takes a DateTime object and returns a formated string of the time difference relative to now
     */
    private function relTime(\DateTime $date): string
    {
        $current = new \DateTime();
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

    /**
     * Return a hyperlink to something, within the site, that pops up a new window
     */
    private function makePopupLink(string $url, string $linktext = '', string $target = '', string $windowprops = ''): string
    {
        return sprintf("<a href=\"%s\" target=\"%s\" onclick=\"window.open('%s','%s','%s');return false;\"%s>%s</a>",
            htmlspecialchars($url, ENT_QUOTES | ENT_IGNORE),
            ($target ?: "_new"),
            htmlspecialchars($url, ENT_QUOTES | ENT_IGNORE),
            ($target ?: "_new"),
            $windowprops,
            ($linktext ?: $url),
        );
    }
}
