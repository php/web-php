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
