<?
require("shared.inc");
commonHeader("Using CVS for PHP Development");
?>
<h3>Using CVS for PHP Development</h3>

<? if(!$fullname): ?>
All PHP development is done through a distributed revision control system called
CVS.  This helps us track changes and it makes it possible for people located
in all corners of the world to collaborate on a project without having to worry
about stepping on each others' toes.
<P>
The first thing you need to do is to get a CVS account.  If you are not
previously known to the PHP Development Team, then this is not an automatic
process.  Your best bet is to send mail to <a href="mailto: core@php.net">
core@php.net</a> and explain what you have in mind and perhaps give a bit of
background on yourself.<P>

If, you have already established yourself in the above manner you can submit
a CVS account request here: (only the encrypted version of the password is sent)
<form action="cvs.php3" method="POST">
<table>
<tr><th>Full Name: </th><td><input type=text size=50 name=fullname></td></tr>
<tr><th>Email: </th><td><input type=text size=50 name=email></td></tr>
<tr><th>User ID: </th><td><input type=text size=10 name=id></th></tr>
<tr><th>Requested Password: </th><td><input type=password size=10 name=password></th></tr>
<tr><th>&nbsp;</th><td><input type=submit value="Send It"></td></tr>
</table>
</form>
<? else:
mail("rasmus@lerdorf.on.ca","CVS Account Request","Full name: $fullname\nEmail: $email\nID: $id\nPassword: ".crypt($password));
?>
Thank you.  Your request has been sent.
<?endif;?>
<P>
The CVS account gives you access to a number of things.  First, and most important it gives you access
to modify the PHP CVS tree.  It also allows you to comment on and close bugs in the PHP bugs interface
as well as modifying the documentation notes in the annotated manual.  The relevant links for these
three things are:
<ul>
<li><a href="http://ca.php.net/cvsweb.cgi">CVS Web Interface</a>
<li><a href="http://ca.php.net/bugs.php3">PHP Bugs Database</a>
<li><a href="http://ca.php.net/manual/admin-notes.php3">Manual Errata Administration</a>
</ul>

If you are not familiar with CVS, you should have a look at the various documentation resources available
at <a href="http://www.cyclic.com">www.cyclic.com</a>.  This is also where to get the most recent version
of the CVS client.<P>

All CVS commit messages get sent to the php-dev mailing list.  You should subscribe yourself to this mailing
list.  Instructions for subscribing are on the <a href="/support.php3">Support</a> page.
<P>
CVS itself is quite easy to use.  Follow the steps listed on the <a href="http://ca.php.net/cvsweb.cgi">CVS Web Interface</a>
page for checking out your tree.  Substitute your own user name and password for the cvsread/phpfi combination listed there.
You will not be able to do this until you receive confirmation of your account having been created though.
<P>
Next, once you have your CVS tree you need to know the following commands.  They should all be executed from within
the checked out tree.  eg. cd php3
<dl>
<dt><b><tt>cvs update -d</tt></b>
<dd>This fetches all updates made by others and brings your tree up to date.  Before starting to edit anything
in the tree you should do this.  Generally you would do this whenever you see a CVS commit message on the php-dev
mailing list.

<dt><b><tt>cvs commit</tt></b>
<dd>This commits any changes you have made anywhere in the tree.  A text editor will pop up and you will need to
describe the changes you made.  Please provide a good description here as it may help people in the future when
looking at your code changes.
</dl>
<? commonFooter(); ?>
