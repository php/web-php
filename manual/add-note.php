<?php
require_once 'prepend.inc';
require_once 'posttohost.inc';
require_once 'shared-manual.inc';

commonHeader("Manual Notes");

/* clean off leading and trailing whitespace */
$user = trim($user);
$note = trim($note);

/* don't pass through example username */
if ($user == "user@example.com") {
    $user = "";
}

$error = '';

if ($note && strlen($note) >= 4096) {
  $error = "Your note is too long. You'll have to make it shorter before you can post it. Keep in mind that this is not the place for long code examples!";
}

if ($note && strlen($note) < 32) {
  $error = "Your note is too short. Trying to test the notes system? Save us the trouble of deleting your test, and don't. It works.";
}

if ($note) {
  foreach (preg_split("/\\s+/",$note) as $chunk) {
    if (strlen($chunk) > 70) {
      $error = "Your note contains a bit of text that will result in a line that is too long, even after using wordwrap().";
    }
  }
}

if ($note && !$error && $action && strtolower($action) != "preview") {
  $result = posttohost("http://master.php.net/entry/user-note.php", array(
              "user" => stripslashes($user),
              "note" => stripslashes($note),
              "lang" => stripslashes($lang),
              "sect" => stripslashes($sect)
            ));

  if ($result) {
    echo "<!-- $result -->";
    echo "<p class=\"error\">There was an error processing your submission. It has been automatically e-mailed to the developers, who will process the note manually.</p>";
  }
  else {?>
<p>Your submission was successful -- thanks for contributing! Note that it will
not show up for up to a few hours on some of the <a
href="/mirrors.php">mirrors</a>, but it will find its way to all of our mirrors
in due time.</p>
<?php
  }
?>
<p>You can <a href="<?php echo $redirect?>">go back</a> from whence you came.</p>
<?php
}
else {
  if ($note) {
    if ($error) echo "<p class=\"error\">$error</p>\n";
?>
<p>This is what your entry will look like, roughly:</p>
<?php
    echo '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
    makeEntry(time(),stripslashes($user),stripslashes($note));
    echo "</table>";
  }
  else {?>
<p>You can contribute to the PHP manual from the comfort of your browser!
Just add your comment in the big field below, and, optionally, your email 
address in the little one (usual anti-spam practices are OK, e.g.
johnNOSPAM@doe.NO_SPAM.com).</p>

<p>Note that HTML tags are not allowed in the posts, but the note is presented
in side a &lt;pre&gt; element so formatting is preserved. URLs will be turned
into clickable links automatically. (Double-check that your note appears as you
want during the preview. That's why it is there!)</p>

<p>Read the following note carefully. If your post falls into one of the
categories mentioned there, it will be rejected by one of the editors.</p>

<P><b>Note:</b> If you are trying to <A href="http://bugs.php.net/">report a
bug</A>, or <a href="http://bugs.php.net/">request a new feature or language
change</a> you're in the wrong place.  If you are just commenting on the fact
that something is not documented, save your breath. This is where <b>you</b>
add to the documentation, not where you ask <b>us</b> to add the
documentation. This is also not the correct place to <A
href="/support.php">ask questions</A> (even if you see others have done that
before, we are editing the notes slowly but surely).  If you post a note in
any of the categories above, it will edited and/or removed.
</p>
<p>
Just to make the point once more. The notes are being edited and support
questions/bug reports/feature request/comments on lack of documentation, are
being <b>deleted</b> from them (and you may get a <b>rejection</b> email), so
if you post a question/bug/feature/complaint, it will be removed. (But once you
get an answer/bug solution/function documentation, feel free to come back
and add it here!)</p>
<p>(And if you're posting an example of validating email addresses, please
don't bother. Your example is almost certainly wrong for some small subset of
cases. See <a href="http://examples.oreilly.com/regex/">this information from
O'Reilly Mastering Regular Expressions book</a> for the gory details.)</p>
<?php
  }

  if (!$user) $user = "user@example.com";
  if (!isset($sect)) {?>
<p><b>To add a note, you must click on the 'Add Note' button
on the bottom of a manual page so we know where to add the note!</b></p>
<?php
  }
  else {?>
<form method="post" action="<?php echo $PHP_SELF;?>">
<input type="hidden" name="sect" value="<?php echo clean($sect);?>" />
<input type="hidden" name="redirect" value="<?php echo clean($redirect);?>" />
<input type="hidden" name="lang" value="<?php echo clean($lang);?>" />
<table border="0" cellpadding="5" cellspacing="0" bgcolor="#d0d0d0">
<tr>
 <td colspan="2">
<b>
<a href="/support.php">Click here to go to the support pages.</a><br>
<a href="http://bugs.php.net/">Click here to submit a bug report.</a><br>
<a href="http://bugs.php.net/">Click here to request a feature.</a>
</b>
 </td>
</tr>
<tr valign="top">
<td><b>Your email address:</b></td>
<td><input type="text" name="user" size="40" maxlength="40" value="<?php echo clean($user)?>"></td>
</tr>
<tr valign="top">
<td><b>Your notes:</b></td>
<td><textarea name="note" rows="6" cols="40" wrap="virtual"><?php echo clean($note)?></textarea><br>
</td>
</tr>
<tr>
 <td colspan="2" align="right">
  <input type="submit" name="action" value="Preview">
  <input type="submit" name="action" value="Add Note">
 </td>
</tr>
</table>
</form>
<?php
  }
}
commonFooter();
?>
