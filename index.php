<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a server-side, cross-platform, HTML embedded scripting
language. If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please
submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
<p>
You can contact the webmaster at ' . 
make_link('mailto:webmaster@php.net', 'webmaster@php.net') . '.
</p>
';

$fp = @fopen("backend/events.csv",'r');
if($fp) {
	$cm=0;
	while(!feof($fp)) {
		list($d,$m,$y,$url,$desc) = fgetcsv($fp,4096);
		if($cm!=(int)$m) { 
			if($cm) $RSIDEBAR_DATA.= "<br>\n"; 
			else $RSIDEBAR_DATA.='<h3>Upcoming Events<br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.php.net/cal.php?a=1">[add event]</a></h3>';
			$cm = (int)$m;  
			$RSIDEBAR_DATA .= "<h4>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h4>\n"; 
			unset($seen);
		}
		if(!$seen[$desc]) {
			$RSIDEBAR_DATA .= "$d. <a href=\"$url\">$desc</a><br>\n";
			$seen[$desc] = true;
		}
	}
	fclose($fp);
}

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<?php print_link("http://www.php-conference.de/2001/index_en.php", make_image("international_conference.gif", "International PHP Conference 2001", "right") ); ?>

<h1>The International PHP Conference is over</h1>

<p>
<font class="newsDate">[17-Nov-2001]</font>
PHP enthusiasts from all over the world met three days to attend
powerworkshops and sessions presented by the inventors of PHP, members
of the core group and other well known people from the community.
The conference is over now, but you can get some impressions
by visting one of the photo galleries, attendees put together:
<ul>
    <li><?php print_link("http://www.photoalbum.nohn.net/PHPConference2001", "Sebastian Nohn"); ?></li>
    <li><?php print_link("http://www.bttr.org/phpconf/", "Ralf Geschke"); ?></li>
    <li><?php print_link("http://www.php-conference.de/2001/images/PHP_Konferenz/", "Conference photos"); ?></li>
</ul>
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>New Windows Manual Features - Survey!</h1>

<p>
<font class="newsDate">[15-Nov-2001]</font>
While improving the functions and design of the CHM manual,
we discovered that we need a professionaly designed
interface. We would like to ask your help to complete
a short survey about what environment you are using
the help in, and what elements are important for you,
so we can put them in hand for you. Feel free to make
any suggestions using the text field in the form.
<?php print_link("http://weblabor.hu/php/newchm.php",
"Please complete our survey"); ?> 
(there is no need to provide any personal details
about yourself). We also included links to proposed
designs. See and mail us your opinions.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<?php /* move this entry to the top when you update it! */ ?>

<h1>
<?php print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>
New Usage Stats For October available
</h1>

<p>
<font class="newsDate">[01-Nov-2001]</font>
<?php print_link("http://www.netcraft.com/", "Netcraft"); ?> and 
<?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace" ); ?> have
published the <?php print_link("/usage.php", "current results"); ?> for their Web 
Server surveys.
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
There is no need now to come to the main php.net
server, if you would like to read the manual notes,
as they are mirrored worldwide, and you can read them
on all our mirror sites. You can get better response
times by visiting the closest mirror. See the bottom
of our pages.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1><?php print_link("http://gtk.php.net/", make_image("php-gtk-white.gif", "PHP-GTK", "right") ); ?>
PHP-GTK version 0.1 released</h1>

<p>
<font class="newsDate">[02-Aug-2001]</font>
The 0.1 release of PHP-GTK is now available. PHP-GTK is
a PHP extension that provides an object-oriented interface
to GTK+ toolkit and enables you to write client-side
cross-platform GUI applications. Win32 binary version
should be available a little later.
</p>
<p>
Note that this version requires PHP CVS version to compile, but it can be run
under 4.0.5 and later.
</p>
<p>
A talk on PHP-GTK was presented by Andrei Zmievski and
Frank Kromann at the 2001 O'Reilly Open Source Conference
in San Diego. The slides from the talk can be
<a href="http://conf.php.net/sd-gtk">viewed online</a>.
For more information, visit <?php print_link("http://gtk.php.net/")?>.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>PHP Conference</h1>

<p>
<font class="newsDate">[29-Jul-2001]</font>
The first official PHP Conference, part of the
<a href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source Convention</a>,
brought the community together for
<a href="http://conferences.oreillynet.com/cs/os2001/pub/w/os2001/sessions_php.html">sessions</a>
and <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/php_tutorials.html">tutorials</a>
designed to explore and strengthen PHP in
the open source space. The conference
was at the Sheraton San Diego Hotel and Marina
in San Diego, California between July 23-27, 2001.
Some presentations, you can see online:</p>
<ul>
  <li>Rasmus Lerdorf's <a href="http://conf.php.net/or2001">PHP - Spinal Injection</a></li>
  <li>Thies Arntzen on <a href="http://conf.php.net/oci2">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
  <li>Andrei Zmievski and Frank M. Kromann with <a href="http://conf.php.net/sd-gtk">PHP-GTK</a></li>
  <li>Jon Parise on <a href="http://conf.php.net/pear2">The PHP Extension and Application Repository</a></li>
</ul>

<p>
You can also download some papers from the
<a href="ftp://ftp.oreilly.com/pub/conference/os2001/">O'Reilly FTP site</a>
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

<h1>PHP 4.0.6 Released!</h1>

<p>
<font class="newsDate">[23-Jun-2001]</font>
<a href="/downloads.php">PHP 4.0.6</a> is a maintenance release, that features many bug fixes from
PHP 4.0.5, and is especially much more efficient in its memory requirements. Users that skipped
the 4.0.5 upgrade may wish to jump directly from 4.0.4 to the much more stable 4.0.6. For a
full list of changes, check out the <a href="/ChangeLog-4.php">Change Log</a>.
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

<h1><?php print_link("http://ApacheCon.Com/", "ApacheCon 2001");?></h1>

<p>
<font class="newsDate">[11-Apr-2001]</font>
You may have missed the conference, but you can see some of the
presentations online. Check out:</p>
<ul>
  <!-- <li>Luis Argerich on <a href="">The PXP project, using reusable PHP components and XML to develop dynamic web sites</a></li> -->
  <li>Thies Arntzen on <a href="http://conf.php.net/oci">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
  <li>Stig Bakken on <a href="http://conf.php.net/pear">The PHP Extension and Application Repository</a></li>
  <li>Daniel Beckham and Brian Moon on <a href="http://dealnews.com/apachecon/">Caching Dynamic Web Content to Increase Dependability and Performance</a></li>
  <!-- <li>Tony Byrne with <a href="">High-Profile, High Speed: Case study in using PHP to build AlGore.com</a></li> -->
  <li>Rasmus Lerdorf's <a href="http://conf.php.net/ac2">Introduction to PHP</a></li>
  <li>Zeev Suraski on <a href="http://conf.php.net/pres/other/internals/">PHP 4 Internals</a></li> 
  <li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
</ul>

<?php echo hdelim(); ?>

<h1>Improve Your PHP Skills</h1> 

<p>
Looking for clear and useful guides to build dynamic web-sites using
PHP? Our <?php print_link("/books.php", "Books Resource Center"); ?> lists now
more than 60 books in eleven different languages. If you know
about more PHP-related books, tell us about them!
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Tips and Tricks Section</h1>

<p>
Check out our <?php print_link("/tips.php", "tips"); ?> page for some "neat" things, 
PHP-related.  It's a little sparse right now, but feel free to make suggestions!
<br clear="all">
</p>

<?php commonFooter(); ?>
