<?php
require_once 'prepend.inc';

$SIDEBAR_DATA='
<h3>Documentation</h3>
<p>
A good place to start is by skimming through the ever-growing <a
href="/FAQ.php">FAQ</a>. Then have a look at the online manual and
other resources in the <a href="/docs.php">documentation</a> section.
</p>

<h3>Books</h3>
<p>
<a href="/books.php">Books</a> are convenient resources to begin exploring 
PHP. <a href="/books.php">The titles listed here</a> will help you to start 
learning PHP, as well as extending your existing knowledge.
</p>

<h3>User Groups</h3>
<p>
PHP user groups have started popping up. Christopher
R. Moewes-Bystrom is running a PHP user group registry at <a
href="http://www.phpusergroups.org/">http://www.phpusergroups.org/</a>.<br>
As Germanys PHP-community is quite busy, they have their own user groups.
For an overview as well as news from the various groups have a look
at <a href="http://www.phpug.de/">http://www.phpug.de/</a>.  
</p>

<h3>Sample Code</h3>
<p>
Looking for some more sample PHP scripts? Our <A
HREF="/links.php">links page</A> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</p>

<h3>Knowledge Base</h3>
<p>
The knowledge base is a growing collection of PHP related information in
a searchable question and answer format. Anyone can contribute, and
everyone is encouraged to do so. You can visit the Knowledge Base
at <a href="http://php.faqts.com/">http://php.faqts.com/</a>.
</p>

<h3>Instant Resource Center</h3>
<p>
Otherwise known as IRC or Internet Relay Chat. Here you can usually find
experienced PHP people sitting around doing nothing on the #php channel
on <a href="http://openprojects.nu">OpenProjects</a>. There are also many
PHP related channels on EFNet and on <a href="http://www.ludd.luth.se/irc/main.html">IRCNet</a> 
(like #php and <a href="http://php.de.jayniz.de">#php.de</a>).
</p>
';

commonHeader("Support");
?>

<h1>Mailing Lists</h1>

<?php
if (isset($maillist)) {
	# should really grab some email validating routine and use it here.
	if (empty($email) || $email == 'user@example.com') {
		echo "You forgot to specify an email address to be added to the list. ";
		echo "Go back and try again.";
	} else {
		$request = strtolower($action);
                if ($request != "subscribe" && $request != "unsubscribe") {
                    $request = "subscribe";
                }
		$sub = str_replace("@", "=", $email);
		switch ($maillist) {
		    case "phplib":
		    case "phplib-dev":
			mail("$maillist-$request-$sub@lists.netuse.de", $request, $request, 
				"From: $email\r\n");
			break;
		    default:
			mail("$maillist-$request-$sub@lists.php.net", "Website Subscription", 
				"This was a request generated from the form at http://www.php.net/support.php.", "From: $email\r\n");
			break;
		}
?>
<p>
A request has been entered into the mailing list processing queue. You
should receive an email at <?php echo $email;?> shortly describing how to
complete your request.
</p>
<?php
	}
} else {

?>
<p>
There are many PHP-related mailing lists available. Most of them
have archives are available, and many are also available as newsgroups
on our <a href="news://news.php.net">news server</a>. The archives
are searchable. There is an experimental web interface for the news
server at <a href="http://news.php.net/">http://news.php.net/</a>.
</p>

<?php

  // array of lists (list, name, short desc., moderated, archive, digest, newsgroup)
  $mailing_lists = Array(

    'General mailing lists for PHP users',
    Array (
      'php-announce', 'Announcements',
      'Announcements of new PHP releases are sent to this very low-volume list',
      true, false, false, "php.announce"
    ),
    Array (
      'php-general', 'General user list',
      'This is a really high volume general list for PHP users',
      false, true, true, "php.general"
    ),
    Array (
      'php-windows', 'Windows PHP users list',
      'Using PHP on Microsoft Windows',
      false, true, true, "php.windows"
    ),

    'Subject specific lists for PHP users',
    Array (
      'php-install', 'Installation issues and problems',
      'How to install PHP with partiucular configurations, and servers',
      false, true, true, "php.install"
    ),
    Array (
      'php-db', 'Databases and PHP',
      'This list is for the discussin of PHP database topics',
      false, true, true, "php.db"
    ),
    Array (
      'php-i18n', 'Internationalization',
      'Internationalization (i18n) and localization (l10n) issues and features',
      false, true, true, "php.i18n"
    ),
    Array (
      'pear-general', 'PEAR general list',
      'A list for users of PEAR, an open-source common code library for PHP',
      false, true, true, "php.pear.general"
    ),
    Array (
      'php-gtk-general', 'PHP-GTK general list',
      'A list for users of PHP-GTK, An extension for PHP making it possible to write client-side GUI applications' ,
      false, true, true, "php.gtk.general"
    ),
    Array (
      'phplib', 'PHPLIB mailing list',
      'List of the open source PHP code library',
      false, true, false
    ),
    Array (
      'phplib-dev', 'PHPLIB developers list',
      'List for the PHPLIB developers',
      false, true, false
    ),

    'Lists for the developers of PHP, php.net and documentations',
    Array (
      'php-dev', 'Developer list',
      'A medium volume list for those who want to help out with the development of PHP',
      false, true, false, "php.dev"
    ),
    Array (
      'php-gtk-dev', 'PHP-GTK developers list',
      'A list for the developers of PHP-GTK, An extension for PHP making it possible to write client-side GUI applications' ,
      false, true, true, "php.gtk.dev"
    ),
    Array (
      'pear-dev', 'PEAR developers list',
      'A list for developers of PEAR, an open-source common code library for PHP',
      false, true, true, "php.pear.dev"
    ),
    Array (
      'php-cvs', 'CVS commit list',
      'All the commits of the cvs PHP code repository are posted to this list automatically',
      true, true, false, "php.cvs"
    ),
    Array (
      'php-cvs-daily', 'Daily CVS commit summary',
      'Daily changelog and NEWS file updates',
      true, false, false
    ),
    Array (
      'php-gtk-cvs', 'PHP-GTK CVS list',
      'All the commits to the cvs PHP-GTK code repository are posted to this list automatically' ,
      false, true, true, "php.gtk.cvs"
    ),
    Array (
      'pear-cvs', 'PEAR CVS list',
      'All the commits of the cvs PEAR code repository are posted to this list automatically',
      false, true, true, "php.pear.cvs"
    ),
    Array (
      'phpdoc', 'PHP documentation list',
      'List for the authors of the PHP documentation with CVS commits',
      false, true, false, "php.doc"
    ),
    Array (
      'php-qa', 'Quality Assurance list',
      'List for the members of the PHP-QA Team',
      false, true, false, "php.qa"
    )
  
  );

?>

<form method="post" action="http://www.php.net/support.php">
<p>
<table cellpadding="5" cellspacing="1" border="0">
<?php

while ( list(, $listinfo) = each($mailing_lists)) {
	if (!is_array($listinfo)) {

		echo '<tr bgcolor="#cccccc">';
		echo '<th>' . $listinfo . '</th>';
		echo '<th>Moderated</th>';
		echo '<th>Archive</th>';
		echo '<th>Newsgroup</th>';
		echo '<th>Normal</th>';
		echo '<th>Digest</th>';
		echo '</tr>' . "\n";

	} else {
  
		echo '<tr align="center" bgcolor="#e0e0e0">';
		echo '<td align="left"><b>' . $listinfo[1] . '</b><br><small>'. $listinfo[2] . '</small></td>';
		echo '<td>' . ($listinfo[3] ? 'yes' : 'no') . '</td>';
		echo '<td>' . ($listinfo[4] ? make_link("http://marc.theaimsgroup.com/?l=".$listinfo[0], 'yes') : 'n/a') . '</td>';
		echo '<td>' . ($listinfo[6] ? make_link("news://news.php.net/".$listinfo[6], 'yes') : 'n/a') . '</td>';
		echo '<td><input name="maillist" type="radio" value="' . $listinfo[0] . '"></td>';
		echo '<td>' . ($listinfo[5] ? '<input name="maillist" type="radio" value="'.$listinfo[0].'-digest">' : 'n/a' ) . '</td>';
		echo '</tr>' . "\n";

	}
}

?>
</table>
</p>

<p align="center">
<b>Email:</b>
<input type="text" name="email" width="40" value="user@example.com">
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
There are a variety of commands you can use to modify your subscription.
Either send a message to php-whatever-help@lists.php.net (as in,
php-general-help@lists.php.net) or you can view the commands for
ezmlm <a href="http://www.ezmlm.org/ezman-0.32/ezman1.html">here.</a>
</p>

<p>
Archives for some of these mailing lists are also available at
<a href="http://www.phpbuilder.com/mail/">http://www.phpbuilder.com/mail/</a>.
</p>

<p>
<b>Warning:</b> The PHP users mailing list gets close to 2500 messages
per month currently. Do the math. That translates to about 80 messages
per day. If your mailbox can't handle this sort of traffic you might
want to consider subscribing to the digest list instead (two messages
per day), using the news server, or reading the mailing list using the
archives. 
</p>

<p>
You can search the main mailing lists right from this website from <A
HREF="/search.php">the search page</A> or by using the search input box
selecting the appropriate option on the top-right of every page.
</p>

<?php echo hdelim(); ?>

<h1>Local Mailing Lists</h1>

<p>
There are also some mailing lists and newsgroups for PHP users
that have been set up by others in the community to host local
(particularly non-English) discussions.
</p>

<ul>
  <li><a href="http://www.ilovephp.com/mailinglist/">French Mailing List</a></li>
  <li><a href="news:fr.comp.infosystemes.www.auteurs.php">French Newsgroup</a></li>
  <li><a href="http://www.php-center.de/">German Mailing List</a></li>
  <li><a href="news:de.comp.lang.php">German Newsgroup</a></li>
  <li><a href="mailto:wl-phplista-request@gimli.externet.hu?subject=subscribe">Hungarian Mailing List</a></li>
  <li><a href="http://groups.yahoo.com/group/php_greek">Greek Mailing List</a></li>
  <li><a href="mailto:php3-it-request@michel.enter.it">Italian Mailing List</a></li>
  <li><a href="http://groups.yahoo.com/group/php-pt">Portuguese Mailing List</a></li>
  <li><a href="mailto:lista-subscribe@phpes.com">Spanish Mailing List</a></li>
  <li><a href="http://phptr.baslangic.net/">Turkish Mailing List</a></li>
</ul>

<?php
}

commonFooter();
?>
