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
After one week our Windows HTML Help Manual Survey
is over now. We received nearly six hundred
processable forms with many wishes and comments.
Thanks for you all, who contributed to making
the best help system for PHP on Windows.
You can get more information about the ongoing
project, including the detailed results of the survey at
<?php print_link("http://weblabor.hu/php/newchm.php",
" the project's own page"); ?>.
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

<h1>PHP News Archive</h1>

<p>
Find all previous PHP related news and announcements <?php print_link("/news.php", "here"); ?>.
<br clear ="all">
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
<?php print_link("http://www.pair.com/", make_image("pair.gif", "pair Networks", "right") ); ?>

<p>
<font class="newsDate">[1-Jul-2001]</font>
The disturbances in the mailing lists and CVS services that happened in the last
few weeks are now gone, hopefully for good. This is thanks to a brand new server donated
by <a href="http://www.pair.com/">pair Networks</a>. Thanks!
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
