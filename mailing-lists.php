<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mailing-lists.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/email-validation.inc';

$SIDEBAR_DATA = '
<h3>Would like to unsubscribe yourself?</h3>

<p>
 If you have trouble getting off from any of our mailing lists, or
 would like to unsubscribe from a mailing list not listed here, we
 have more information for you on <a href="/unsub.php">the
 unsubscription page</a>.
</p>

<h3>Other PHP related mailing lists</h3>

<p>
 Find the <a href="http://pear.php.net/support/lists.php">PEAR
 lists</a>, the <a href="http://pecl.php.net/support.php">PECL
 lists</a>, and the <a href="http://gtk.php.net/resources.php">PHP-GTK
 lists</a> on their own pages.
</p> 

<a name="local"></a>
<h3>Local Mailing Lists and Newsgroups</h3>

<ul class="toc">
 <li><a href="http://groups.google.com/group/dk.edb.internet.webdesign.serverside.php/topics">Danish Newsgroup</a></li>
 <li><a href="http://groups.google.com/group/fr.comp.lang.php/topics">French Newsgroup</a></li>
 <li><a href="http://lists.phpbar.de/mailman/listinfo">German Mailing List</a></li>
 <li><a href="http://groups.google.com/group/de.comp.lang.php.misc/topics">German Newsgroup</a> (also other topics under de.comp.lang.php)</li>
 <li><a href="http://groups.yahoo.com/group/php_greek/">Greek Mailing List</a></li>
 <li><a href="http://weblabor.hu/levlistak">Hungarian Mailing List</a></li>
 <li><a href="http://www.domeus.it/circles/php">Italian Mailing List (at PHPItalia)</a></li>
 <li><a href="http://ml.php.gr.jp/">The Japanese PHP User Group\'s Mailing lists</a></li>
 <li><a href="http://br.groups.yahoo.com/group/php-pt/">Portuguese Mailing List</a></li>
</ul>
';

site_header("Mailing Lists", array("current" => "help"));

// Some mailing list is selected for [un]subscription
if (isset($_POST['maillist'])) {
    
    // No error found yet
    $error = "";
    
    // Check email address
    if (empty($_POST['email']) || $_POST['email'] == 'user@example.com' ||
        $_POST['email'] == 'fake@from.net' || !is_emailable_address($_POST['email'])) {
        $error = "You forgot to specify an email address to be added to the list, or specified an invalid address." .
                 "<br>Please go back and try again.";
    }
    
    // Seems to be a valid email address
    else {
 
        // Decide on request mode, email address part and IP address
        $request = strtolower($_POST['action']);
        if ($request != "subscribe" && $request != "unsubscribe") {
            $request = "subscribe";
        }
        $sub = str_replace("@", "=", $_POST['email']);
        $remote_addr = i2c_realip();

        // Get in contact with master server to [un]subscribe the user
        $result = posttohost(
            "http://master.php.net/entry/subscribe.php",
            array(
                "request"  => $request,
                "email"    => $_POST['email'],
                "maillist" => $_POST['maillist'],
                "remoteip" => $remote_addr,
                "referer"  => $MYSITE . "mailing-lists.php"
            )
        );
        
        // Provide error if unable to [un]subscribe
        if ($result) {
            $error = "We were unable to subscribe you due to some technical problems.<br>" .
                     "Please try again later.";
        }
    }
    
    // Give error information or success report
    if (!empty($error)) {
        echo "<p class=\"formerror\">$error</p>";
    } else {
?>
<p>
 A request has been entered into the mailing list processing queue. You
 should receive an email at <?php echo $_POST['email']; ?> shortly describing
 how to complete your request.
</p>
<?php
    }
    site_footer();
    exit;
}

// No form submitted
?>
<h1>Mailing Lists</h1>

<p>
 There are many PHP-related mailing lists available on our server.
 Most of them are archived, and all of them are available as newsgroups
 on our <a href="news://news.php.net">news server</a>. You can search
 some mailing lists right from this website from <a href="/search.php">the
 search page</a> or by using the search input box selecting the
 appropriate option on the top-right of every page.
</p>
<p>
 There is an experimental web interface for the news server at
 <a href="http://news.php.net/">http://news.php.net/</a>, and
 there are also other archives provided by
 <a href="http://marc.info/">Marc</a>.
</p>

<h2>Twitter</h2>
<p>
 The PHP team maintains an official PHP.net account on twitter,
 <a href="https://twitter.com/official_php">@official_php</a>, for those
 interested in following news and other announcements from the PHP project.
</p>

<h2>Mailing List Posting guidelines</h2>

<p>
 When posting to mailing lists or newsgroups, please keep the following in mind:
</p>

<ul>
 <li>
  Use a valid email address. Every new poster's email address
  is checked for validity through confirmation.
 </li>
 <li>
  Send plain ASCII messages, no HTML-formatted emails please.
 </li>
 <li>
  Turn on word wrapping so your entire message doesn't show up on
  a single line.
 </li>
 <li>
  Be sure to click <strong>Reply-All</strong> to reply to list. Clicking
  <strong>Reply</strong> will email the author of the message privately.
 </li>
 <li>
  No attachments please, just post a URL if you want someone to
  look at something.
 </li>
 <li>
  Don't GPG/PGP sign your messages. If you want people to be able
  to send you encrypted email, stick your key-locator in your signature
 </li>
 <li>
  Don't hijack other peoples' threads. To post on a new topic, start
  a new message, don't reply and just change the subject.
 </li>
 <li>
  Check the archives before posting a question, chances are it has
  already been asked and answered a few times.
 </li>
 <li>
  When asking a question, don't just tell us, &quot;it doesn't work&quot;.
  Tell us what you are trying to accomplish, a <strong>short</strong> code
  snippet showing how you tried to solve it, what you expected to get and
  what you got instead.
 </li>
</ul>
<p>
 And make sure you have read our
 <a href="//git.php.net/?p=php-src.git;a=blob_plain;f=README.MAILINGLIST_RULES;hb=HEAD">Mailinglist Rules</a>.
</p>
<?php

  // array of lists (list, name, short desc., moderated, archive, digest, newsgroup)
  $general_mailing_lists = array(

    'General mailing lists for PHP users',
    array (
      'php-announce', 'Announcements',
      'Announcements of new PHP releases are sent to this very low-volume list',
      TRUE, FALSE, FALSE, "php.announce"
    ),
    array (
      'php-general', 'General user list',
      'This is a high volume list for general PHP support; ask PHP questions here',
      FALSE, TRUE, TRUE, "php.general"
    ),
    array (
      'php-windows', 'Windows PHP users list',
      'Using PHP on Microsoft Windows',
      FALSE, TRUE, TRUE, "php.windows"
    ),

    'Subject specific lists for PHP users',
    array (
      'php-install', 'Installation issues and problems',
      'How to install PHP with particular configurations and servers',
      FALSE, TRUE, TRUE, "php.install"
    ),
    array (
      'php-db', 'Databases and PHP',
      'This list is for the discussion of PHP database topics',
      FALSE, TRUE, TRUE, "php.db"
    ),
    array (
      'php-i18n', 'Unicode and Internationalization',
      'Unicode support, Internationalization (i18n) and localization (l10n) issues and features',
      FALSE, TRUE, TRUE, "php.i18n"
    ),
    array (
      'php-evangelism', 'PHP evangelism mailing list',
      'A list for people interested in promoting PHP and learning good reasons to support PHP in the enterprise',
      TRUE, TRUE, TRUE, "php.evangelism"
    ),	
    array (
      'soap', 'PHP SOAP list',
      'List for the SOAP developers',
      FALSE, FALSE, FALSE, 'php.soap'
    ),
    'Non-English language mailing lists',
    array (
      'php-es', 'Spanish PHP Mailing list',
      'List for Spanish speaking people interested in PHP',
      FALSE, FALSE, FALSE, 'php.general.es'
    ),
  
  );

  // array of lists (list, name, short desc., moderated, archive, digest, newsgroup)
  $internals_mailing_lists = array(

    'PHP and Zend Engine internals lists',
    array (
      'internals', 'Internals list',
      'A medium volume list for those who want to help out with the development of PHP',
      FALSE, 'php-internals', TRUE, "php.internals"
    ),
    array (
      'internals-win', 'Windows Internals list',
      'A low volume list for those who want to help out with the development of PHP on Windows',
      FALSE, FALSE, TRUE, "php.internals.win"
    ),
    array (
      'php-cvs', 'Git commit list',
      'All commits to internals (php-src) and the Zend Engine are posted to this list automatically',
      TRUE, TRUE, FALSE, "php.cvs"
    ),
    array (
      'git-pulls', 'Git pull requests',
      'Pull requests from Github',
      FALSE, FALSE, FALSE, "php.git-pulls"
    ),
    array (
      'php-qa', 'Quality Assurance list',
      'List for the members of the PHP-QA Team',
      FALSE, TRUE, FALSE, "php.qa"
    ),
    array (
      'php-bugs', 'General bugs',
      'General bug activity are posted here',
      FALSE, FALSE, FALSE, "php.bugs"
    ),
    array (
      'standards', 'PHP Standardization and interoperability list',
      'Development of language standards',
      FALSE, FALSE, FALSE, "php.standards"
    ),

    'PHP internal website mailing lists',
    array (
      'php-webmaster', 'PHP php.net internal infrastructure discussion',
      'List for discussing and maintaining the php.net web infrastructure.<br>
       For general PHP support questions, see "General Mailing Lists" or the <a href="/support.php">support page</a>',
      FALSE, FALSE, FALSE, "php.webmaster"
    ),

    'PHP documentation mailing lists',
    array (
      'phpdoc', 'Documentation discussion',
      'List for discussing the PHP documentation',
      FALSE, TRUE, FALSE, "php.doc"
    ),
    array (
      'doc-cvs', 'Documentation changes and commits',
      'Changes to the documentation are posted here',
      TRUE, "php-doc-cvs", FALSE, "php.doc.cvs"
    ),
    array (
      'doc-bugs', 'Documentation bugs',
      'Documentation bug activity (translations, sources, and build system) are posted here',
      TRUE, 'php-doc-bugs', FALSE, "php.doc.bugs"
    ),
  );

// Print out a table for a given list array
function output_lists_table($mailing_lists)
{
    echo '<table cellpadding="5" border="0" class="standard mailing-lists">', "\n";
    while ( list(, $listinfo) = each($mailing_lists)) {
        if (!is_array($listinfo)) {
            echo "<tr><th>{$listinfo}</th><th>Moderated</th><th>Archive</th>" .
                 "<th>Newsgroup</th><th>Normal</th><th>Digest</th></tr>\n";
        } else {
            echo '<tr align="center">';
            echo '<td align="left"><strong>' . $listinfo[1] . '</strong><br><small>'. $listinfo[2] . '</small></td>';
            echo '<td>' . ($listinfo[3] ? 'yes' : 'no') . '</td>';

            // Let the list name defined with a string, if the
            // list is archived under a different name then php.net
            // uses for it (for backward compatibilty for example)
            if ($listinfo[4] !== FALSE) {
                $larchive = ($listinfo[4] === TRUE ? $listinfo[0] : $listinfo[4]);
            } else { $larchive = FALSE; }
            echo '<td>' . ($larchive ? "<a href=\"http://marc.info/?l={$larchive}\">yes</a>" : 'n/a') . '</td>';
            echo '<td>' . ($listinfo[6] ? "<a href=\"news://news.php.net/{$listinfo[6]}\">yes</a> <a href=\"http://news.php.net/group.php?group={$listinfo[6]}\">http</a>" : 'n/a') . '</td>';
            echo '<td><input name="maillist" type="radio" value="' . $listinfo[0] . '"></td>';
            echo '<td>' . ($listinfo[5] ? '<input name="maillist" type="radio" value="' . $listinfo[0] . '-digest">' : 'n/a' ) . '</td>';
            echo "</tr>\n";
        }
    }
    echo "</table>\n";
}

?>

<form method="post" action="/mailing-lists.php">

<h2 id="general">General Mailing Lists</h2>

<?php output_lists_table($general_mailing_lists); ?>

<h2 id="internals">Internals Mailing Lists</h2>

<?php output_lists_table($internals_mailing_lists); ?>

<p class="center">
 <strong>Email:</strong>
 <input type="text" name="email" size="40" value="user@example.com">
 <input type="submit" name="action" value="Subscribe">
 <input type="submit" name="action" value="Unsubscribe">
</p>

</form>

<p>
 You will be sent a confirmation mail at the address you wish to
 be subscribed or unsubscribed, and only added to the list after
 following the directions in that mail.
</p>

<p>
 <strong>Warning:</strong> The PHP users mailing list gets close to 1500-2000
 messages per month currently. Do the math. That translates to about 60
 messages per day. If your mailbox can't handle this sort of traffic you
 might want to consider subscribing to the digest list instead (two messages
 per day), using the news server, or reading the mailing list using the
 archives. 
</p>

<h2>Mailing list options</h2>

<p>
 All of the mailing lists hosted at <a
 href="http://lists.php.net/">lists.php.net</a> are managed using the <a
 href="http://untroubled.org/ezmlm/">ezmlm-idx</a> mailing list software.
 There are a variety of commands you can use to modify your subscription.
 Either send a message to <code>php-whatever-help@lists.php.net</code> (as in,
 <code>php-general-help@lists.php.net</code>) or you can view the commands for
 ezmlm <a href="http://untroubled.org/ezmlm/ezman/ezman1.html">here.</a>
</p>

<?php site_footer(); ?>
