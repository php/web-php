<?php
require_once 'prepend.inc';

commonHeader("News Archive");
?>

<h1>News Archives</h1>

<p>
Here you can find older news items from the PHP project. You may find the
information useful.
</p>

<?php echo hdelim(); ?>

<?php echo make_image("linuxtag3.gif", "LinuxTag", "right"); ?>

<h1>LinuxTag 2002: 6 - 9th June, Karlsruhe, Germany</h1>
<font class="newsdate">[23-May-2002]</font> PHP will be attending 
<a href="http://www.linuxtag.org/2002/deutsch/showitem.php3?item=30&lang=en">LinuxTag</a> 
again this year. The combined efforts of the PHP Verein, the Apache Software Foundation and
MySQL AB,  will create a "(L)AMP" day, focusing on web development with  the 3 core technologies.
During the day there will be many <a
href="http://www.linuxtag.org/2002/deutsch/showitem.php3?item=293&lang=en">interesting
workshops</a>, which are free to enter. Make time to visit the (L)AMP booth also, which will 
be hosting several <a href="http://www.phpug.de/index_ka109.php">PHP related projects</a> (text in
German).

<?php echo hdelim(); ?>

<h1>PHP Coding Contest</h1>
<p>
<font class="newsDate">[16-May-2002]</font>
CodeWalkers have started a new fortnightly PHP contest. Every two weeks, there
is a new problem to solve, a new script to write. The winner will receive
prizes provided by the sponsors, Zend Technologies and Sams Publishing.
You can enter the challenge by visiting <a href="http://codewalkers.com/php-contest.php">their site</a>.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.2.1 released</h1>
<p>
<font class="newsDate">[13-May-2002]</font>
The PHP Group is happy to announce the
<?php print_link ("/downloads.php", "immediate availability"); ?> of
PHP 4.2.1, the latest version of the widely-used, general-purpose scripting language
that is especially well-suited for Web development.</p>

<p>This latest release contains several bug fixes as found in PHP 4.2.0. These include
fixes for the session, com and mbstring extensions, as well as a major upgrade of the DomXML
extension. Also a few extra checks for safe_mode were added. For more information, see the
<?php print_link ("/release_4_2_1.php", "PHP 4.2.1 release announcement"); ?>.
</p>

<?php echo hdelim(); ?>

<?php echo make_image("phpaward_100.gif", "PHP Award", "right"); ?>

<h1>PHP Award 2002</h1>
<p>
<font class="newsDate">[27-Apr-2002]</font>
The Association Française des Utilisateurs de PHP (AFUP) and
the German PHP Association (PHP Verein) are organizing a PHP
contest to give out the first PHP Award. The PHP Award will
be given in three categories: Open Source, Freeware and
Commercial Software, the submission deadline is July, 15th 2002.
If you are interested go to
<a href="http://www.php-award.net/">http://www.php-award.net/</a>.
</p>

<?php echo hdelim(); ?>

<h1>PHP.net: A Tourist's Guide</h1>
<p>
<font class="newsDate">[26-Apr-2002]</font>
Damien Seguy has written <a href="/sites.php">a tourist's guide</a> to the
various sites that make up the PHP.net family of sites. Did you know you can
browse a hyperlinked version of the PHP source code at <a
href="http://lxr.php.net/">lxr.php.net</a>? View the archives of all of the
mailing lists at <a href="http://news.php.net/">news.php.net</a>? See what else
you've been missing.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.2.0 released</h1>
<p>
<font class="newsDate">[22-Apr-2002]</font>
The PHP Group is happy to announce the
<?php print_link ("/downloads.php", "immediate availability"); ?> of
PHP 4.2.0, the latest version of the widely-used, general-purpose scripting language
that is especially well-suited for Web development.</p>

<p>This latest release contains over one hundred changes, bug fixes and improvements over
the previous release, PHP 4.1.2. Among the highlights are experimental support for Apache 2,
cleanups in variable handling and overhauls of various PHP components, including the
domxml, posix, sockets and iconv extensions. For more information, see the
<?php print_link ("/release_4_2_0.php", "PHP 4.2.0 release announcement"); ?>.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://weblabor.hu/php-doc-chm", make_image("chmhelp.gif", "CHM", "right") ); ?>

<h1>Fifth sample of 'PHP Manual CHM Edition'</h1>

<p>
<font class="newsDate">[20-Apr-2002]</font>
We released the fifth sample of the new CHM Edition. New in
this sample: user preferences application, a new optional
design, custom context menu support, linked functions
in examples, and of course updated content.
</p>

<p>
<?php print_link("http://weblabor.hu/php-doc-chm", "Try out the new CHM Edition"); ?>,
and send us your feedback to our
<?php print_link("mailto:php-doc-chm@lists.php.net", "dedicated mailing list"); ?>.
</p>

<?php echo hdelim(); ?>

<?php echo make_image("phpmag.gif", "PHP Magazin", "right"); ?>

<h1>PHP Magazin out now!</h1>
<p>
<font class="newsDate">[26-Mar-2002]</font>
The Software &amp; Support Verlag, based in Frankfurt,
Germany, has now published a magazine on PHP as a
tribute to the steadily growing German PHP community.
More information can be found at
<a href="http://www.phpmag.de/">www.phpmag.de</a>.

<?php echo hdelim(); ?>

<h1>New PHP.net URL Howto</h1>
<p>
<font class="newsDate">[23-Mar-2002]</font>
Ever wondered what you can type in your browsers location
field to access a php.net page? Many of you already know
<a href="http://php.net/echo">http://php.net/echo</a>.
We gathered some information about how the URLs are parsed,
and what are your possibilities. Read it in our new
<a href="urlhowto.php">URL Howto</a>.

<?php echo hdelim(); ?>

<?php echo make_image("brain.gif", "PHPDoc Brain", "right"); ?>

<h1>PHP Documentation Team Meeting</h1>
<p>
<font class="newsDate">[13-Mar-2002]</font>
The <?php print_link('http://www.php-ev.de/documents/phpdoc/protocol.html',
'notes from the PHP Documentation Team Meeting'); ?> (Stuttgart, March
8th-10th) are now available.
Pictures of the event are currently not available.
</p>

<?php echo hdelim(); ?>

<h1>PHP Security Update - Windows Version</h1>
<p>
<font class="newsDate">[12-Mar-2002]</font>
Following up from the previous annoucement, PHP 4.1.2 has been released for
windows. The delayed release is due to the fix of a further security issue only
relating to the PHP for Windows version. More information on this change can be
found <?php print_link('/release_4_1_2_win32.php', 'here'); ?>. All PHP -
Windows users are encouraged to upgrade to the <?php
print_link('/downloads.php', 'latest version'); ?>.
</p>

<?php echo hdelim(); ?>

<h1>PHP Security Update</h1>
<p>
<font class="newsDate">[27-Feb-2002]</font>
Due to a security issue found in all versions of PHP (including 3.x and 4.x), a
new version of PHP has been released.  Details about the security issue are <a
href="http://security.e-matters.de/advisories/012002.html">available here</a>.
All users of PHP are strongly encouraged to either upgrade to <a
href="/downloads.php">PHP 4.1.2</a>, or install the patch (<a
href="/downloads.php">available for PHP 3.0.18, 4.0.6 and 4.1.0/4.1.1)</a>.
</p>

<?php echo hdelim(); ?>

<h1>PHP-GTK 0.5.0 released</h1>

<p>
<font class="newsDate">[24-Jan-2002]</font>
<?php print_link("http://gtk.php.net/", "PHP-GTK"); ?> has reached version
0.5.0, also known as <em>"monday starts on saturday"</em>. The version number
was bumped from 0.1.1 to this one to indicate that PHP-GTK is now a fairly
mature and stable extension and can be used for a variety of applications
(just look on <?php print_link("http://www.freshmeat.net/", "Freshmeat"); ?>).
</p>

<p>
Also taking this opportunity, we would like to ask if some of you would
consider helping out with PHP-GTK documentation. It would be a great way to
learn this exciting extension and also contribute to the project.
</p>

<?php echo hdelim();

print_link("http://www.phpconference.de/2001/index_en.php", make_image("international_conference.gif", 
							"International PHP Conference 2001", "right") ); ?>

<h1>International PHP Conference slides available</h1>

<p>
<font class="newsDate">[10-Jan-2002]</font>
You can find an overview of all slides of the sessions from the International PHP Conference 2001 on the
<a href="http://www.phpconference.de/2001/slides_en.php">conference slides page</a>. 
It is still not too late to check out some photos from the conference:
<ul>
    <li><?php print_link("http://www.photoalbum.nohn.net/PHPConference2001", "Sebastian Nohn"); ?></li>
    <li><?php print_link("http://www.bttr.org/phpconf/", "Ralf Geschke"); ?></li>
    <li><?php print_link("http://www.phpconference.de/2001/images/PHP_Konferenz/", "Conference photos"); ?></li>
</ul>
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.1.0 Released!</h1>

<p>
<font class="newsDate">[10-Dec-2001]</font>
<a href="/downloads.php">PHP 4.1.0</a> is a key new release in the PHP 4 family.  It includes
highly-improved performance, especially under Windows; a more security-friendly
way of accepting form variables; output compression; and much, much more.  Read the full
<a href="/release_4_1_0.php">release announcement</a>, or check out the
<a href="/ChangeLog-4.php">changelog</a>. Windows binaries are also available.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Windows Manual Survey Results</h1>

<p>
<font class="newsDate">[27-Nov-2001]</font>
After one week our Windows HTML Help Manual Survey is over now. We received nearly six hundred
processable forms with many wishes and comments. Thanks for you all, who contributed to making
the best help system for PHP on Windows. You can get more information about the ongoing
project, including the detailed results of the survey at 
<?php print_link("http://weblabor.hu/php/newchm.php", "the project's own page"); ?>.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>PHP-GTK Documentation Update</h1>

<p>
<font class="newsDate">[18-Oct-2001]</font>
<?php print_link("http://gtk.php.net/", "PHP-GTK"); ?> 
<?php print_link("http://gtk.php.net/docs.php", "documentation"); ?> is starting
to be more filled out. The manual is now rebuilt every night and
<?php print_link("http://gtk.php.net/download-docs.php", "downloadable versions"); ?> 
of it in different formats are also available. If you have been working with
PHP-GTK and would like to contribute to the documentation effort, please
let us know. 
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Rackspace providing additional hosting for PHP project</h1>
<?php print_link("http://www.rackspace.com/?supbid=php.net", make_image("rackspace.gif", "Rackspace", "right") ); ?>

<p>
<font class="newsDate">[17-Sep-2001]</font>
Thanks to the generous folks at <a
href="http://www.rackspace.com/?supbid=php.net">Rackspace</a>, we have added additional
capacity for hosting the PHP project's efforts. Currently, the machine they
have provided is serving downloads for www.php.net and snaps.php.net. We will
continue to re-balance our resource needs across all of the machines provided
by our supporters.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>11.09.2001</h1>

<p>
<font class="newsDate">[11-Sep-2001]</font>
The worldwide PHP community is horrified by recent events and would like to
offer its deepest sympathies to the friends and families of those who lost
their lives. <a href="http://www.redcross.org/donate/donate.html">Support the
Red Cross.</a>
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Manual notes are mirrored worldwide</h1>

<p>
<font class="newsDate">[28-Aug-2001]</font>
There is no need now to come to the main php.net server, if you would like to read the manual notes,
as they are mirrored worldwide, and you can read them on all our mirror sites. You can get better response
times by visiting the closest mirror. See the bottom of our pages.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1><?php print_link("http://gtk.php.net/", make_image("php-gtk-white.gif", "PHP-GTK", "right") ); ?>
PHP-GTK version 0.1 released</h1>

<p>
<font class="newsDate">[02-Aug-2001]</font>
The 0.1 release of PHP-GTK is now available. PHP-GTK is a PHP extension that provides an object-oriented interface
to GTK+ toolkit and enables you to write client-side cross-platform GUI applications. Win32 binary version
should be available a little later.
</p>
<p>
Note that this version requires PHP CVS version to compile, but it can be run
under 4.0.5 and later.
</p>
<p>
A talk on PHP-GTK was presented by Andrei Zmievski and Frank Kromann at the 2001 O'Reilly Open Source Conference
in San Diego. The slides from the talk can be <a href="http://conf.php.net/sd-gtk">viewed online</a>.
For more information, visit <?php print_link("http://gtk.php.net/")?>.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Mailing lists and CVS are up!</h1>
<?php print_link("http://promote.pair.com/direct.pl?php.net", make_image("pair.gif", "pair Networks", "right") ); ?>

<p>
<font class="newsDate">[1-Jul-2001]</font>
The disturbances in the mailing lists and CVS services that happened in the last
few weeks are now gone, hopefully for good. This is thanks to a brand new server donated
by <a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a>. Thanks!
<br clear="all">
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.linuxtag.org/2001/english/30.html", make_image("phplt.gif", "LinuxTag", "right") ); ?>

<h1>LinuxTag 2001 in Europe</h1>

<p>
<font class="newsDate">[14-Jun-2001]</font>
<a href="http://www.linuxtag.org/2001/english/30.html">LinuxTag 2001</a>
was in Stuttgart, Germany, between July 5th-8th. PHPUG.De has <a href="http://www.phpug.de/phplt_en.php4">a report</a> on the PHP events at LinuxTag.
</p>

<?php echo hdelim(); ?>

<h1><?php print_link("http://apachecon.com/2001/US/", "ApacheCon 2001");?></h1>

<p>
<font class="newsDate">[11-Apr-2001]</font>
You may have missed the conference, but you can see some of the
presentations online. Check out:</p>
<ul>
    <li>Thies Arntzen on <a href="http://conf.php.net/oci">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
	 <li>Stig Bakken on <a href="http://conf.php.net/pear">The PHP Extension and Application Repository</a></li>
	 <li>Daniel Beckham and Brian Moon on <a href="http://dealnews.com/apachecon/">Caching Dynamic Web Content to Increase Dependability and Performance</a></li>
	 <li>Rasmus Lerdorf's <a href="http://conf.php.net/ac2">Introduction to PHP</a></li>
	 <li>Zeev Suraski on <a href="http://conf.php.net/pres/other/internals/">PHP 4 Internals</a></li> 
	 <li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
 </ul>

<?php commonFooter(); ?>
