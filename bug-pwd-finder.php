<?
/* See bugs.php for the table layout of bugdb. */

require("shared.inc");
if (strstr($MYSITE,"bugs.php.net")) {
	$dbhost="localhost";
	$dbuser="nobody";
	$dbpwd="";
} else if (strstr($MYSITE,"il.php.net")) {
	$dbhost="bugs.php.net";
	$dbuser="bourbon";
	$dbpwd="";
} else if (strstr($MYSITE,"localhost")) {
	$dbhost="localhost";
	$dbuser="nobody";
	$dbpwd="";
} else {
	Header("Location: http://bugs.php.net");
	exit;
}

if ($bug_id)
  {
	mysql_connect ($dbhost,$dbuser,$dbpwd)
		or die("Unable to connect to SQL server. Please try again later.");

	mysql_select_db ('php3');

	# Clean up the bug id
	$bug_id = ereg_replace ('[^0-9]+', '', $bug_id);

	$query = "SELECT email, passwd FROM bugdb WHERE id = $bug_id";

	$result = mysql_query ($query)
		or die ("Sorry.  No information could be found for bug report #$bug_id");

	list ($email, $passwd) = mysql_fetch_row ($result);
	$passwd = stripslashes ($passwd);

	mail ($email, "Password for bug report #$bug_id", "The password for bug report #$bug_id is $passwd.", "From: noreply@php.net")
		or die ("Sorry. Mail could not be sent at this time. Please try again later.");

	$msg = "The password for bug report #$bug_id has been sent to $email.";
  }

$DISABLE_KICKOUTS=1;
commonHeader("Bug Reporting");

?>
<form method=POST action="<? echo $PHP_SELF;?>">
<p><b>Bugs Report Password Finder</b></p>

<p>If you need to modify a bug report that you submitted, but have forgotten what password you used, this utility can help you.</p>
<p>Enter in the number of the bug report, press the Send button and the password will be mailed to the email address specified in the bug report.</p>

<?php $msg and print "<p><font color=\"#CC0000\">$msg</font></p>";?>

<p><b>Bug Report ID:</b> #<input type=text size=20 name="bug_id" /> <input type="submit" value="Send" /></p>
</form>
</font>
<? commonFooter(); ?>
