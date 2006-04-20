<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'manual/add-note.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
site_header("Add Manual Note");

// Copy over "sect" and "redirect" from GET to POST
if (!isset($_POST['sect']) && isset($_GET['sect'])) {
    $_POST['sect'] = $_GET['sect'];
}
if (!isset($_POST['redirect']) && isset($_GET['redirect'])) {
    $_POST['redirect'] = $_GET['redirect'];
}

// Decide on whether all vars are present for processing 
$process = TRUE;
$needed_vars = array('note', 'user', 'sect', 'redirect', 'action');
foreach ($needed_vars as $varname) {
    if (!isset($_POST[$varname])) {
        $process = FALSE;
        break;
    }
}

// We have a submitted form to process
if ($process) {

    // Clean off leading and trailing whitespace 
    $user = trim($_POST['user']);
    $note = trim($_POST['note']);
    
    // Convert all line-endings to unix format,
    // and don't allow out-of-control blank lines
    $note = str_replace("\r\n", "\n", $note);
    $note = str_replace("\r", "\n", $note);
    $note = preg_replace("/\n{2,}/", "\n\n", $note);
    
    // Don't pass through example username
    if ($user == "user@example.com") {
        $user = "";
    }
    
    // We don't know of any error now
    $error = FALSE;

    // No note specified
    if (strlen($note) == 0) {
        $error = "You have not specified the note text.";
    }
    
    // The user name contains a malicious character
    elseif (stristr($user, "|")) {
        $error = "You have included bad characters within your username. We appreciate you may want to obfuscate your email further, but we have a system in place to do this for you.";
    }

    // Check if the note is not too long
    elseif (strlen($note) >= 4096) {
        $error = "Your note is too long. You'll have to make it shorter before you can post it. Keep in mind that this is not the place for long code examples!";
    }

    // Check if the note is not too short
    elseif (strlen($note) < 32) {
        $error = "Your note is too short. Trying to test the notes system? Save us the trouble of deleting your test, and don't. It works.";
    }

    // Chek if any line is too long
    else {
    
        // Split the note by whitespace, and check length
        foreach (preg_split("/\\s+/", $note) as $chunk) {
            if (strlen($chunk) > 70) {
                $error = "Your note contains a bit of text that will result in a line that is too long, even after using wordwrap().";
                break;
            }
        }
    }

    // No error was found, and the submit action is required
    if (!$error && strtolower($_POST['action']) != "preview") {

        $redirip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ?
                   $_SERVER['HTTP_X_FORWARDED_FOR'] :
                   (isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : '');

        // Post the variables to the central user note script
        // ($MQ is defined in prepend.inc)
        $result = posttohost(
            "http://master.php.net/entry/user-note.php",
            array(
                'user'    => ($MQ ? stripslashes($user) : $user),
                'note'    => ($MQ ? stripslashes($note) : $note),
                'sect'    => ($MQ ? stripslashes($_POST['sect']) : $_POST['sect']),
                'ip'      => $_SERVER['REMOTE_ADDR'],
                'redirip' => $redirip
            )
        );

        // If there is any non-header result, then it is an error
        if ($result) {
            if (strpos($result, '[TOO MANY NOTES]') !== FALSE) {
                print "<p class=\"formerror\">As a security precaution, we only allow a certain number of notes to be submitted per minute. At this time, this number has been exceeded. Please re-submit your note in about a minute.</p>";
            } else if (strpos($result, '[SPAMMER]') !== FALSE) {
                print '<p class="formerror">Your IP is listed in one of the spammers lists we use. If you think this is an error, please contact the <a href="mailto:webmaster@php.net">webmaster</a>.</p>';
            } else if (strpos($result, '[SPAM WORD]') !== FALSE) {
                echo '<p class="formerror">Your note contains a prohibited (usually SPAM) word. Please remove it and try again.</p>';
            } else {
                echo "<!-- $result -->";
                echo "<p class=\"formerror\">There was an internal error processing your submission. Please try to submit again later.</p>";
            }
        }

        // There was no error returned
        else { 
            echo '<p>Your submission was successful -- thanks for contributing! Note ',
                 'that it will not show up for up to a few hours on some of the <a ',
                 'href="/mirrors.php">mirrors</a>, but it will find its way to all of ',
                 'our mirrors in due time.</p>';
        }
        
        // Provide a backlink for the page the user is coming from
        echo '<p>You can <a href="' . $_POST['redirect'] . '">go back</a> from whence you came.</p>';
        
        // Print out common footer, and end page
        site_footer();
        exit();
    }
    
    // There was an error, or a preview is needed
    else {

        // If there was an error, print out
        if ($error) { echo "<p class=\"formerror\">$error</p>\n"; }
        
        // Print out preview of note
        echo '<p>This is what your entry will look like, roughly:</p>';
        echo '<div id="usernotes">';
        manual_note_display(time(), stripslashes($user), stripslashes($note), FALSE);
        echo '</div><br /><br />';
    }
}

// Any needed variable was missing => display instructions
else { ?>
<p>
 You can contribute your notes to the PHP  manual from the comfort of your
 browser! Just add your comment in the big field below, and, optionally,
 your email address or name in the little one. After submission, your note
 will appear under the documentation as a part of the manual.
</p>

<p>
 There is no need to obfuscate your email address, as we have a simple
 conversion in place to convert the @ signs and dots in your address. You
 may still want to include a part in the email address only understandable
 by humans, to make it spam protected, as our conversion can be performed
 the other way too. You may submit your email address as
 <tt>user@NOSPAM.example.com</tt> for example (which will be displayed
 as <tt>user at NOSPAM dot example dot com</tt>. Although note that we can
 only inform you of the removal of your note, if you use your real email
 address.
</p>

<p>
 Note that HTML tags are not allowed in the posts, but the note formatting
 is preserved. URLs will be turned into clickable links, PHP code blocks
 enclosed in the PHP tags &lt;?php and ?&gt; will
 be source highlighted automatically. So always enclose PHP snippets in
 these tags. <em>(Double-check that your note appears
 as you want during the preview. That's why it is there!)</em>
</p>

<p>
 Please read the following points carefully before submitting your comment. 
 If your post falls into one of the categories mentioned there, it will be 
 rejected by one of the editors.
</p>

<p>
 Your IP Address will be logged with the submitted note and made public on the
 PHP manual user notes mailing list. The IP address is logged as part of the
 notes moderation process, and won't be shown within the PHP manual itself.
</p>

<ul>
 <li>
  If you are trying to <a href="http://bugs.php.net/">report a
  bug</a>, or <a href="http://bugs.php.net/">request a new feature
  or language change</a> you're in the wrong place.
 </li>
 
 <li>
  If you are just commenting on the fact that something is not documented, 
  save your breath. This is where <strong>you</strong> add to the documentation,
  not where you ask <strong>us</strong> to add the documentation. If you have
  an addition or change request, open a Documentation Problem in 
  <a href="http://bugs.php.net/">our bug system</a>, where your idea can be discussed.
 </li>
 
 <li>
  This is also not the correct place to <a href="/support.php">ask questions</a> 
  (even if you see others have done that before, we are editing the notes slowly 
  but surely). If you need support send email to the
  <a href="mailto:php-general@lists.php.net">php-general list</a>, or see what
  <a href="/support.php">other support options are available</a>.
 </li>
</ul>

<h3>If you post a note in any of the categories above, it will be edited or removed.</h3>

<p>
 Just to make the point once more. The notes are being edited and support
 questions/bug reports/feature request/comments on lack of documentation, are
 being <strong>deleted</strong> from them (and you may get a <strong>rejection</strong>
 email), so if you post a question/bug/feature/complaint, it will be removed.
 (But once you get an answer/bug solution/function documentation, feel free to
 come back and add it here!)
</p>
<p>
 (And if you're posting an example of validating email addresses, please
 don't bother. Your example is almost certainly wrong for some small subset of
 cases. See <a href="http://examples.oreilly.com/regex/readme.html">this information
 from O'Reilly Mastering Regular Expressions book</a> for the gory details.)
</p>
<p>
 Please note that periodically, the developers may go through the notes and
 incorporate the information in them into the documentation. This means
 that any note submitted here becomes the property of the PHP Documentation
 Group.
</p>
<?php
}

// If the user name was not specified, provide a default
if (empty($_POST['user'])) { $_POST['user'] = "user@example.com"; }

// There is no section to add note to
if (!isset($_POST['sect']) || !isset($_POST['redirect'])) {
    echo '<p class="formerror">To add a note, you must click on the "Add Note" button (the plus sign)  ',
         'on the bottom of a manual page so we know where to add the note!</p>';
}

// Everything is in place, so we can display the form
else {?>
<form method="post" action="/manual/add-note.php">
 <p>
  <input type="hidden" name="sect" value="<?php echo clean($_POST['sect']); ?>" />
  <input type="hidden" name="redirect" value="<?php echo clean($_POST['redirect']); ?>" />
 </p>
 <table border="0" cellpadding="3" class="standard">
  <tr>
   <td colspan="2">
    <b>
     <a href="/support.php">Click here to go to the support pages.</a><br />
     <a href="http://bugs.php.net/">Click here to submit a bug report.</a><br />
     <a href="http://bugs.php.net/">Click here to request a feature.</a><br />
     (Again, please note, if you ask a question, report a bug, or request a feature,
     your note <i>will be deleted</i>.)
    </b>
   </td>
  </tr>
  <tr>
   <th class="subr">Your email address (or name):</th>
   <td><input type="text" name="user" size="60" maxlength="40" value="<?php echo clean($_POST['user']); ?>" /></td>
  </tr>
  <tr>
   <th class="subr">Your notes:</th>
   <td><textarea name="note" rows="20" cols="60" wrap="virtual"><?php if (isset($_POST['note'])) { echo clean($_POST['note']); } ?></textarea>
   <br />
  </td>
  </tr>
  <tr>
   <th colspan="2">
    <input type="submit" name="action" value="Preview" />
    <input type="submit" name="action" value="Add Note" />
   </th>
  </tr>
 </table>
</form>
<?php
}

// Print out common footer
site_footer();
?>
