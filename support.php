<?php
require("shared.inc");
commonHeader("Support");
?>

<?php
if (isset($maillist)) {
	# should really grab some email validating routine and use it here.
	if (empty($email) || $email == 'user@example.com') {
		echo "You forgot to specify an email address to be added to the list.  ";
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
<?php
	}
} else {

?>
<h3>Documentation</h3>
<P>
A good place to start is by skimming through the ever-growing <a
href="/FAQ.php">FAQ</a>.  Then have a look at the online manual and
other resources in the <a href="/docs.php">documentation</a> section.
</P>

<h3>Books</h3>
<P>
<a href="/books.php">Books</a> are convenient resources to begin exploring 
PHP. <a href="/books.php">The titles listed here</a> will help you to start 
learning PHP, as well as extending your existing knowledge.
</P>

<h3>Reporting Bugs</h3>
<P>If you can't resolve your problem from the
available documentation or mailing list archives, and you think it might
be a bug, a <a href="http://bugs.php.net">Bug Database</a> has
been established for tracking bugs and ensuring that all reported bugs
get addressed.  If you see a problem, please tell us so we can address it.
Please read <a href="http://bugs.php.net/bugs-dos-and-donts.php"
>Dos & Don'ts</a> before posting a report.
</P>

<h3>User Groups</h3>

PHP user groups have started popping up.  Christopher
R. Moewes-Bystrom is running a PHP user group registry at <a
href="http://www.phpusergroups.org/">http://www.phpusergroups.org/</a>.

<h3>Mailing Lists</h3>
<P>
One of the best resources is the very friendly and helpful mailing
lists. There are many PHP-related mailing lists available.

<?php

  // array of lists (list, name, short desc., moderated, archive, digest)
  $mailing_lists = Array(

    'General mailing lists for PHP users',
    Array (
      'php-announce', 'Announcements',
      'Announcements of new PHP releases are sent to this very low-volume list',
      true, false, false
    ),
    Array (
      'php-general', 'General user list',
      'This is a really high volume general list for PHP users',
      false, true, true
    ),
    Array (
      'php-windows', 'Windows PHP users list',
      'Using PHP on Microsoft Windows',
      false, true, true
    ),

    'Subject specific lists for PHP users',
    Array (
      'php-install', 'Installation issues and problems',
      'How to install PHP with partiucular configurations, and servers',
      false, true, true
    ),
    Array (
      'php-db', 'Databases and PHP',
      'This list is for the discussin of PHP database topics',
      false, true, true
    ),
    Array (
      'php-i18n', 'Internationalization',
      'Internationalization (i18n) and localization (l10n) issues and features',
      false, true, true
    ),
    Array (
      'php-migration', 'Migration from earlier versions',
      'Discussion of migration from earlier versions of PHP',
      false, true, true
    ),
    Array (
      'php-pear', 'PEAR common code library list',
      'A list for those interested in PEAR, an open-source common code library for PHP',
      false, true, true
    ),
    Array (
      'php-template', 'Templates mailing list',
      'A list for those working with template engines in PHP',
      false, true, true
    ),
    Array (
      'php-kb', 'Knowledge Base list',
      'This list receives daily mailings with summaries of topics on the user list, as well as others drawn from the <a href="#phpkb">Knowledge Base</a>',
      false, true, false
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
      false, true, false
    ),
    Array (
      'php-beta', 'Beta list',
      'A low volume list for users interested in early access to PHP releases',
      false, false, false
    ),
    Array (
      'php-cvs', 'CVS commit list',
      'All the commits of the cvs PHP code repository are posted to this list immediately',
      true, true, false
    ),
    Array (
      'php-cvs-daily', 'Daily CVS commit summary',
      'Daily changelog and NEWS file updates',
      true, false, false
    ),
    Array (
      'phpdoc', 'PHP documentation list',
      'List for the authors of the PHP documentation with CVS commits',
      false, true, false
    ),
    Array (
      'php-qa', 'Quality Assurance list',
      'List for the members of the PHP-QA Team',
      false, true, false
    )
  
  );

?>

<form method="post" action="http://www.php.net/support.php"><table cellspacing="2" cellpadding="3">
<?php

  while ( list(, $listinfo) = each($mailing_lists)) {

    if (!is_array($listinfo)) { echo '<tr bgcolor="#D0D0D0"><th colspan="2">' . $listinfo . '</th><th>Moderated</th><th>Archive</th><th>Normal</th><th>Digest</th></tr>' . "\n"; }
    else {
  
      echo '<tr align="center" bgcolor="#F0F0F0"><td><img src="/gifs/blank.gif" width="5" height="5"></td><td align="left"><b>' . $listinfo[1] . '</b><br><small>'. $listinfo[2] . '</small></td><td>';
      if ($listinfo[3]) { echo 'yes'; } else { echo "no"; }
      echo '</td><td>';
      if ($listinfo[4]) { echo '<a href="http://marc.theaimsgroup.com/?l=' . $listinfo[0] . '">available</a>'; } 
      else { echo 'n/a'; }
      echo '</td><td><input name="maillist" type="radio" value="' . $listinfo[0] . '"></td><td>';
      if ($listinfo[5]) { echo '<input name="maillist" type="radio" value="' . $listinfo[0] . '-digest">'; }
      else { echo 'n/a'; }
      echo '</td></tr>' . "\n";

    }
  }

?>

</table>

<p><table align="center">
 <tr>
  <td><b>Email:</b></td>
  <td><input type=text name="email" width=40 value="user@example.com"></td>
  <td><input type=submit name="action" value="Subscribe"></td>
  <td><input type=submit name="action" value="Unsubscribe"></td>
 </tr>
</table></form></p>

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
per day). You can also read the mailing list using the archives with
a web interface, or if you like reading things with a news reader, you
can read it at <a href="news://news.netimages.com/php3.general">news.netimages.com</a>.
</p>

<p>
You can search the mailing lists right from this website from <A
HREF="/search.php">the search page</A> or by using the search button
on the top-right of every page.
</p>

<h3>Newsgroups</h3>
<p>
The mailing lists hosted at lists.php.net are also gatewayed to
newsgroups on the server at <a href="news://news.php.net/">news.php.net</a>.
</p>

<p>
You can both read and post to the mailing lists through the news
interface.
</p>

<h3>Local Mailing Lists</h3>
<p>
There are also some mailing lists that have been set up by others in
the community to host local discussions (particularly non-English
discussions).
</p>

<ul>
  <li><a href="mailto:php3-france-subscribe@onelist.com">French PHP User's Mailing List</a>
  <li><a href="news:fr.comp.infosystemes.www.auteurs.php">French PHP Newsgroup</a>
  <li><a href="http://www.php-center.de/">German PHP User's Mailing List</a>
  <li><a href="news:de.comp.lang.php">German PHP Newsgroup</a>
  <li><a href="mailto:wl-phplista-request@gimli.externet.hu?subject=subscribe">Hungarian PHP Mailing List</a>
  <li><a href="mailto:php_greek-subscribe@egroups.com">Greek PHP Mailing List</a>
  <li><a href="mailto:php3-it-request@michel.enter.it">Italian PHP User's Mailing List</a>
  <li><a href="http://www.egroups.com/group/php-pt/info.html">Portuguese PHP User's Mailing List</a>
  <li><a href="mailto:lista-subscribe@phpes.com">Spanish PHP User's Mailing List</a>
  <li><a href="http://phptr.baslangic.net/">Turkish PHP User's Mailing List</a>
</ul>

<h3>Sample Code</h3>
<P>
Looking for some more sample PHP scripts?  Our <A
HREF="/links.php">links page</A> page lists some archives of sample PHP code - 
great places to find many example scripts and useful functions, organized for 
your searching pleasure!
</P>

<a name="phpkb"></a>
<h3>Knowledge Base</h3>
<P>
The knowledge base is a growing collection of PHP related information in
a searchable question and answer format. Anyone can contribute, and
everyone is encouraged to do so. You can visit the Knowledge Base
at <a href="http://www.faqts.com/">http://www.faqts.com/</a>.
</P>

<h3>Getting the Latest Development Version</h3>
<P>
PHP is developed using CVS, so it's possible to obtain the latest
development release at any time. Further instructions can be found in
the web interface of the <a href="http://cvs.php.net">PHP CVS tree</a>.
</P>

<h3>Instant Resource Center</h3>
<P>
Otherwise known as IRC or Internet Relay Chat. Here you can usually find
experienced PHP people sitting around doing nothing on the #php channel
on <a href="http://openprojects.nu">OpenProjects</a>. There is also a #php
channel on EFNet, but due to the difficulties many people have getting on and
staying on that network we are migrating to the OpenProjects network.
</p>

<?php
}
commonFooter();
?>
