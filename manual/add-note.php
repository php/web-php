<?
require_once 'prepend.inc';
require_once 'posttohost.inc';

require("shared-manual.inc");
commonHeader("Manual Notes");

/* clean off leading and trailing whitespace */
$user = trim($user);
$note = trim($note);

/* don't pass through example username */
if ($user == "user@example.com") {
    $user = "";
}

if ($note == "") {
    unset ($note);
}

if (isset($note) && strlen($note) >= 4096) {
  echo "<p>Your note is too long. You'll have to make it shorter before you can post it.</p>";
}

if (isset($note) && isset($action) && strlen($note) < 4096) && strtolower($action) != "preview"):
  $result = posttohost("http://master.php.net/entry/user-note.php", array(
              "user" => stripslashes($user),
              "note" => stripslashes($note),
              "lang" => stripslashes($lang),
              "sect" => stripslashes($sect)
            ));

  if ($result) {
    echo "<!-- $result -->";
    echo "<p>There was an error processing your submission. It has been automatically e-mailed to the developers, who will process the note manually.</p>";
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
<?else:
        if (isset($note)):?>
<p>This is what your entry will look like, roughly:</p>
<?
                echo '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
                makeEntry(time(),stripslashes($user),stripslashes($note));
                echo "</table>";
        else:?>
<P>You can contribute to the PHP manual from the comfort of your browser!
Just add your comment in the big field below, and, optionally, your email 
address in the little one (usual anti-spam practices are OK, e.g.
johnNOSPAM@doe.NO_SPAM.com).</p>

<p>Note that most HTML tags are not allowed in the posts. We tried
allowing them in the past, but people invariably made a mess of
things making the manual hard to read for everybody. You can include
&lt;p&gt;, &lt;/p&gt;, and &lt;br&gt; tags.</p>

<p>Read carefully the following note. If your post falls into one of the
categories mentioned there, it will be rejected by one of the editors.</p>

<P><B>Note:</B> If you are trying to <A href="http://bugs.php.net/">report a
bug</A>, or <a href="http://bugs.php.net/">request a new fature or language
change</a> you're in the wrong place.  If you are just commenting on the fact
that something is not documented, save your breath. This is where <B>you</B>
add to the documentation, not where you ask <B>us</B> to add the
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
<p>
<a href="/support.php">Click here to go to the support pages.</a><br>
<a href="http://bugs.php.net/">Click here to submit a bug report.</a><br>
<a href="http://bugs.php.net/">Click here to request a feature.</a>
</p>
<?      endif;
	if (!$user) $user = "user@example.com";
        if (!isset($sect)):?>
<p><b>To add a note, you must click on the 'Add Note' button
on the bottom of a manual page so we know where to add the note!</b></p>
<?      else:?>
<form method="post" action="<?php echo $PHP_SELF;?>">
<input type="hidden" name="sect" value="<?echo $sect;?>" />
<input type="hidden" name="redirect" value="<?echo $redirect;?>" />
<input type="hidden" name="lang" value="<?echo $lang;?>" />
<table border="0" cellpadding="5" cellspacing="0" bgcolor="#d0d0d0">
<tr valign="top">
<TD><B>Your email address:</B></TD>
<td><input type="text" name="user" size="40" maxlength="40" value="<?echo htmlspecialchars(stripslashes($user))?>"></td>
</TR>
<TR VALIGN=top>
<TD><B>Your notes:</B></TD>
<td><textarea name="note" rows="6" cols="40" wrap="virtual"><?echo htmlspecialchars(stripslashes($note))?></textarea><br>
</TD>
</TR>
<TR>
 <td colspan="2" align="right">
  <input type="submit" name="action" value="Preview">
  <input type="submit" name="action" value="Add Note">
 </td>
</tr>
</TABLE>
</FORM>
<?      endif;
endif;
commonFooter();
?>
