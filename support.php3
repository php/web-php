<?
require("shared.inc");
commonHeader("Support");
?>

<?
if (isset($maillist)) {
	# should really grab some email validating routine and use it here.
	if (empty($email) || $email == 'user@example.com') {
		echo "You forgot to specify an email address to be added to the list.  ";
		echo "Go back and try again.";
	} else {
		$request = strtolower($action);
		$sub = str_replace("@", "=", $email);
		switch ($maillist) {
		    case "phplib":
		    case "phplib-dev":
			mail("$maillist-$request-$sub@lists.netuse.de", $request, $request, 
				"From: $email\r\n");
			break;
		    default:
			mail("$maillist-$request-$sub@lists.php.net", "Website Subscription", 
				"This was a request generated from the form at http://www.php.net/support.php3.", "From: $email\r\n");
			break;
		}
?>
<p>
A request has been entered into the mailing list processing queue. You
should receive an email at <?echo $email;?> shortly describing how to
complete your request.
<?
	}
} else {

?>
<h3>Documentation</h3>
<P>
A good place to start is by skimming through the ever-growing <a
href="/FAQ.php3">FAQ</a>.  Then have a look at the online manual and
other resources in the <a href="/docs.php3">documentation</a> section.
</P>

<h3>Books</h3>
<P>
<a href="books.php3">Books</a> are convenient resources to begin exploring 
PHP. <a href="books.php3">The titles listed here</a> will help you to start 
learning PHP, as well as extending your existing knowledge.
</P>

<h3>Reporting Bugs</h3>
<P>If you can't resolve your problem from the
available documentation or mailing list archives, and you think it might
be a bug, a <a href="http://bugs.php.net">Bug Database</a> has
been established for tracking bugs and ensuring that all reported bugs
get addressed.  If you see a problem, please tell us so we can address it.
Please read <a href="http://bugs.php.net/bugs-dos-and-donts.php3"
>Dos & Don'ts</a> before posting a report.
</P>

<h3>User Groups</h3>

PHP user groups have started popping up.  Christopher
R. Moewes-Bystrom is running a PHP user group registry at <a
href="http://www.moewes.com/phpug.php3">http://www.moewes.com/phpug.php3</a>.

<h3>Mailing Lists</h3>
<P>
One of the best resources is the very friendly and helpful mailing
lists.  There are a few PHP-related mailing lists available.

<ul>
 <li>Announcements of new PHP releases are sent the php-announce
     list. (This is a very low-volume, moderated list.)
 <li>The main list for PHP users is <b>php-general@lists.php.net</b>.
     (This is an unmoderated, high volume list, and is also available
     in a twice-daily digest.)
 <li>The list for discussing database topics is <b>php-db@lists.php.net</b>.
     (This is an unmoderated list.)
 <li>The list for discussing installation issues and problems
     is <b>php-install@lists.php.net</b>.
     (This is an unmoderated list.)
 <li>The list for discussion migration from earlier versions of PHP 
     is <b>php-migration@lists.php.net</b>.
     (This is an unmoderated list.)
 <li>The list for Windows PHP users is <b>php-windows@lists.php.net</b>.
     (This is an unmoderated list.)
 <li>Users interested in early access to PHP releases so that they
     can provide feedback about bugs to the developers before releases
     go out to the world can subscribe to the Beta list. (This is an
     unmoderated, low-volume list.)
 <li>The list for those who want to help out with the development
     of PHP is <b>php-dev@lists.php.net</b>. (This is an unmoderated,
     medium-volume list.)
 <li>The Knowledge Base list receives daily mailings that contain
     summaries of topics discussed on the user list, as well as
     other topics drawn from the Knowledge Base. More
     information about the Knowledge Base can be found at <a
     href="http://e-gineer.com/phpkb/">http://e-gineer.com/phpkb/</a>.
</ul>

<p>
To subscribe to one of these lists, use this simple form:

<form method="POST" action="http://www.php.net/support.php3">
<table>
 <tr>
  <td><b>List:</b></td>
  <td><select name="maillist">
    <option value="php-announce">Announcements
    <option value="php-general">General List
    <option value="php-general-digest">General List Digest
    <option value="php-beta">Beta List
    <option value="php-db">Database List
    <option value="php-db-digest">Database List Digest
    <option value="php-dev">Developer List
    <option value="phpdoc">Documentation List
    <option value="php-install">Installation List
    <option value="php-install-digest">Installation List Digest
    <option value="phplib">PHPLIB Mailing List
    <option value="phplib-dev">PHPLIB Developers List
    <option value="php-kb">Knowledge Base
    <option value="php-migration">Migration List
    <option value="php-migration-digest">Migration List Digest
    <option value="php-windows">Windows List
    <option value="php-windows-digest">Windows List Digest
  </select></td>
  <td><input type=submit name="action" value="Subscribe"></td>
 </tr>
 <tr>
  <td><b>Email:</b></td>
  <td><input type=text name="email" width=40 value="user@example.com"></td>
  <td><input type=submit name="action" value="Unsubscribe"></td>
 </tr>
</table>
</form>

<p>
You will be sent a confirmation mail at the address you wish to
be subscribed or unsubscribed, and only added to the list after
following the directions in that mail.

<P>
Archives for some of these mailing lists can be found at: 
</P>

<ul>
 <li><a href="http://php.gotocity.com/mail/">PHP 3.0 List at www.phpbuilder.com</a>
 <li><a href = "http://www.progressive-comp.com/Lists/?l=php-dev">Developers' List</a>
 <li><a href="http://www.progressive-comp.com/Lists/?l=php3-general">PHP 3.0 List</a>
 <li><a href="http://www.progressive-comp.com/Lists/?l=phpdoc">PHP Documentation List</a>
 <li><a href="http://www.progressive-comp.com/Lists/?l=phplib">PHPLIB List</a>
 <li><a href="http://www.progressive-comp.com/Lists/?l=phplib-dev">PHPLIB Developers' List</a>
</ul>

<P>
<b>Warning:</b> The PHP users mailing list gets close to 2500 messages
per month currently.  Do the math.  That translates to about 80 messages
per day.  If your mailbox can't handle this sort of traffic you might
want to consider subscribing to the digest list instead (two messages
per day).  You can also read the mailing list on the above web interface,
or if you like reading things with a news reader, you can read it at
<a href="news://news.netimages.com/php3.general">news.netimages.com</a>.

<P>
You can search the mailing lists right from this website from <A
HREF="/search.php3">the search page</A> or by using the search button
on the top-right of every page.

<h3>Newsgroups</h3>
<p>
The mailing lists hosted at lists.php.net are also gatewayed to
newsgroups on the server at <a href="news://news.php.net/">news.php.net</a>.
<p>
You can both read and post to the mailing lists through the news
interface.

<h3>Local Mailing Lists</h3>
<p>
There are also some mailing lists that have been set up by others in
the community to host local discussions (particularly non-English
discussions).
<ul>
  <li><a href="mailto:php3-france-subscribe@onelist.com">French PHP User's Mailing List</a>
  <li><a href="news:fr.comp.infosystemes.www.auteurs.php">French PHP Newsgroup</a>
  <li><a href="http://www.php-center.de/">German PHP User's Mailing List</a>
  <li><a href="news:de.comp.lang.php">German PHP Newsgroup</a>
  <li><a href="mailto:php3-it-request@michel.enter.it">Italian PHP User's Mailing List</a>
  <li><a href="http://www.egroups.com/group/php-pt/info.html">Portuguese PHP User's Mailing List</a>
  <li><a href="mailto:php-subscribe@listserver.iwcc.com.ar">Spanish PHP User's Mailing List</a>
  <li><a href="http://phptr.baslangic.net/">Turkish PHP User's Mailing List</a>
</ul>

<h3>Sample Code</h3>
<P>
Looking for some more sample PHP scripts?  Our <A
HREF="/links.php3">links page</A> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</P>

<h3>Knowledge Base</h3>
<P>
The knowledge base is a growing collection of PHP related information in
a searchable question and answer format.  Anyone can contribute, and
everyone is encouraged to do so. You can visit the Knowledge Base
at <a href="http://www.faqts.com/">http://www.faqts.com/</a>.
</P>

<h3>Getting the Latest Development Version</h3>
<P>
PHP is developed using CVS, so it's possible to obtain the latest
development release at any time.  Further instructions can be found in
the web interface to the <a href="http://cvs.php.net">PHP 3.0
CVS tree</a>.
</P>

<h3>Instant Resource Center</h3>
<P>
Otherwise known as IRC or Internet Relay Chat.  Here you can usually find
experienced PHP people sitting around doing nothing on the #php channel
on <a href="http://openprojects.nu">OpenProjects</a>.  There is also a #php
channel on EFNet, but due to the difficulties many people have getting on and
staying on that network we are migrating to the OpenProjects network.

<?
}
commonFooter();
?>
