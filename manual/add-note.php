<?
require_once 'prepend.inc';

#
# Notes only available at main mirror site for now
#
if (!is_primary_site()) {
  if (is_backup_primary()) {
    commonHeader("Service Unavailable");?>
<p>Sorry, you can't add a note to the manual right now.</p>
<?php
    commonFooter();
    exit;
  }

  header('Location: http://www.php.net' . $HTTP_SERVER_VARS['REQUEST_URI'] );
  exit;
}

$mailto = 'rasmus@php.net';

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

# turn the POST data into GET data so we can do the redirect
if(!strstr($MYSITE,"www.php.net")) {
    Header("Location: http://www.php.net/manual/add-note.php?sect=".urlencode($sect)."&lang=".urlencode($lang)."&redirect=".urlencode($redirect));
    exit;
}

if (isset($note) && isset($action) && strtolower($action) != "preview"):
        mysql_pconnect("localhost","nobody", "");
        mysql_select_db("php3");

	$now = date("Y-m-d H:i:s");
	$sect = ereg_replace("\.php$","",$sect);
	$query = "INSERT INTO note (user, note, sect, ts, lang) VALUES ";
        # no need to call htmlspecialchars() -- we handle it on output
        $query .= "('$user','$note','$sect','$now','$lang')";
	//echo "<!--$query-->\n";
	if (mysql_query($query)):?>
<P>Your submission was successful -- thanks for contributing! Note that it may
not show up for a few hours on some of the <a href="/mirrors.php">mirrors</a>,
but it will find its way to all of our mirrors in due time.
<?		$new_id = mysql_insert_id();	
		$msg = stripslashes($note);
		$msg .= "\n\n $redirect \n";
                # make sure we have a return address.
                if (!$user) $user = "php-general@lists.php.net";
		mail("php-notes@lists.php.net","note $new_id added to $sect",$msg,"From: $user");
	else:
		// mail it.
		mail($mailto, "failed manual note query", $query);
?>
<P>There was an error processing your submission. It has been automatically
e-mailed to the developers.
<?	endif;?>

<P>You can <A href="<?echo $redirect?>">go back</A> from whence you came,
or you can <A href="http://www.php.net/manual/">browse the manual with the
on-line notes</A>.

<?else:
        if (isset($note) && strtolower($action) == "preview"):?>
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
<form method="POST" action="/manual/add-note.php">
<input type="hidden" name="sect" value="<?echo $sect;?>">
<input type="hidden" name="redirect" value="<?echo $redirect;?>">
<input type="hidden" name="lang" value="<?echo $lang;?>">
<table border="0" cellpadding="5" cellspacing="0" bgcolor="#d0d0d0">
<TR VALIGN=top>
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
