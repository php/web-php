<?

$mailto = 'rasmus@php.net';

/*
#
# Table structure for table 'note'
#
CREATE TABLE note (
  id mediumint(9) DEFAULT '0' NOT NULL auto_increment,
  sect varchar(80),
  user varchar(80),
  note text,
  ts datetime,
  PRIMARY KEY (id)
);
*/


	require("shared.inc");
	$DISABLE_KICKOUTS=1;
	commonHeader("Manual Notes");

# turn the POST data into GET data so we can do the redirect
if(!strstr($MYSITE,"www.php.net")) {
        Header("Location: http://www.php.net/manual/add-note.php?sect=".urlencode($sect)."&redirect=".urlencode($redirect));
}

	mysql_pconnect("localhost","nobody", "");
	mysql_select_db("php3");

	if (isset($note)):
		$now = date("Y-m-d H:i:s");
		$query = "INSERT INTO note (user, note, sect, ts) VALUES ";
		# protect all HTML-like stuff (may be "Joe Blow <joe@blow.com>")
		$query .= "('" . htmlspecialchars($user) . "',"; 
		# only protect PHP-code start tags.
		$query .= "'" . ereg_replace("<\\?", "&lt;?", $note) . "',";
		# or we could protect all HTML
		#$query .= "'" . htmlspecialchars(nl2br($note)) . "',";
		$query .= "'" . $sect . "',";
		$query .= "'" . $now . "')";
		//echo "<!--$query-->\n";
		if (mysql_query($query)):?>
<P>Your submission was successful -- thanks for contributing!
<?			$new_id = mysql_insert_id();	
			$msg = stripslashes($note);
			$msg .= "\n\n $redirect \n";
			mail("php-notes@lists.php.net","note $new_id added to $sect",$msg,"From: $user");
		else:
			// mail it.
			mail($mailto, "failed manual note query", $query);
?>
<P>There was an error processing your submission. It has been automatically
e-mailed to the developers.
<?		endif;?>

<P>You can <A href="<?echo $redirect?>">go back</A> from whence you came,
or you can <A href="http://www.php.net/manual/">browse the manual with the
on-line notes</A>.

<?	else:?>

<P>You can contribute to the PHP manual from the comfort of your browser!
Just add your comment in the big field below (and your email address in the
little one).

<P>Note that HTML tags are not allowed in the posts. We tried allowing them
in the past, but people invariably made a mess of things making the manual
hard to read for everybody.

<P><B>Note:</B> If you are trying to <A href="http://bugs.php.net">report a bug</A>, you're in the wrong place.
If you are just commenting on the fact that something is not documented,
save your breath. This is where <B>you</B> add to the documentation, not
where you ask <B>us</B> to add the documentation. This is also not the
correct place to <A href="/support.php">ask questions</A>. The notes
are being edited and support questions are being <b>deleted</b> from them,
so if you post a question, it will be removed. (But once you get an
answer, feel free to come back and add it here!)
<P>
<A href="/support.php">Click here to go to the support pages.</A>

<?if (!isset($sect)):?>
<p><b>To add a note, you must click on the 'Add Note' button
on the bottom of a manual page so we know where to add the note!</b>
<?else:?>
<FORM method="POST" action="/manual/add-note.php">
<INPUT type=hidden name="sect" value="<?echo $sect;?>">
<INPUT type=hidden name="redirect" value="<?echo $redirect;?>">
<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=0 BGCOLOR="#D0D0D0">
<TR VALIGN=top>
<TD><B>Your email address:</B></TD>
<TD><INPUT type=text name="user" size=40></TD>
</TR>
<TR VALIGN=top>
<TD><B>Your notes:</B></TD>
<TD><TEXTAREA name="note" rows=6 cols=40 wrap=virtual></TEXTAREA><BR>
</TD>
</TR>
<TR><TD colspan=2 align=right>
<INPUT TYPE=image VALUE="Add Note" SRC='/gifs/b-addnote-p.gif' ALT='Add Note'
WIDTH=100 HEIGHT=21 VSPACE=7 BORDER=0 align=absmiddle><BR>
</TD></TR>
</TABLE>
</FORM>
<?endif;
	endif;
	commonFooter();
?>
