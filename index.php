<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
PHP is a server-side, cross-platform, HTML embedded scripting
language.  If you are completely new to PHP and want to get some idea
of how it works, have a look at the ' . make_link("/tut.php", "introductory tutorial") . '.
Once you get beyond that, have a look at the example archive sites and some of the 
other resources available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the '.make_link("http://www.apache.org/","Apache Software Foundation").
'.</p>

<h3>So, How Much Does It Cost?</h3>

<p>
This may sound a little foreign to all you folks coming from a non-Unix
background, but PHP doesn\'t cost anything.  You can use it for commercial
and/or non-commercial use all you want.  You can give it to your friends,
print it out and hang it on your wall or eat it for lunch.  Welcome to
the world of ' . make_link("http://www.opensource.org/", "Open Source") . ' software!
Smile, be happy, the world is good.  For the full legalese, see the ' .
make_link("/license/", "official license") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To:") . '</h3>
&nbsp; ' . make_link("http://chek.com/", "Chek.com") . '<br>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<br>
<h3>Related sites:</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community:</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>
';

$tmp = '/tmp'; /* hopefully writeable on all mirrors */

if($t=@filemtime("$tmp/php_cal_events.csv")) {
	if(time()-$t > 21600) $t=false;
}
if(!$t) {
	$url = 'http://www.php.net/cal.php?format=csv&nm=3';
	$fpo = @fopen("$tmp/php_cal_events.tmp",'w');
	if($fpo) {
		$fpi = @fopen($url,'r');
		if($fpi) {
			while(!feof($fpi)) {
				$line = fgets($fpi,1024);
				fputs($fpo,$line);
			}
			fclose($fpi);
			fclose($fpo);
			@rename("$tmp/php_cal_events.tmp","$tmp/php_cal_events.csv");
		}
	}
}
$fp = @fopen("$tmp/php_cal_events.csv",'r');
if($fp) {
	$cm=0;
	while(!feof($fp)) {
		list($d,$m,$y,$url,$desc) = fgetcsv($fp,1024);
		if($cm!=(int)$m) { 
			if($cm) $RSIDEBAR_DATA.= "<br>\n" . hdelim(); 
			else $RSIDEBAR_DATA.='<h3>Upcoming Events</h3><div align="center"><a href="http://www.php.net/cal.php?a=1">[add event]</a></div><br>';
			$cm = (int)$m;  
			$RSIDEBAR_DATA .= "<h2>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h2>\n"; 
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

<h1>Manual additions, new event calendar</h1>

<p>
<font class="newsDate">[21-Jul-2001]</font>
The <a href="docs.php">manual page</a> now shows the new .tar.bz2 packaging
for some languages, and we are also working to get the PDF format back, and update
all the chm manuals soon. Check out our new <a href="cal.php">Event Calendar</a>
where you can add your groups PHP events, and see what is already there.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<?php /* move this entry to the top when you update it! */ ?>

<h1>
<?php print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>
New Usage Stats For June available
</h1>

<p>
<font class="newsDate">[21-Jul-2001]</font>
<?php print_link("http://www.netcraft.com/", "Netcraft"); ?> and 
<?php print_link("http://www.securityspace.com/s_survey/", "E-Soft" ); ?> have
published the current results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the 
<?php print_link("/usage.php", "usage page"); ?>.
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
<a href="downloads.php">PHP 4.0.6</a> is a maintenance release, that features many bug fixes from
PHP 4.0.5, and is especially much more efficient in its memory requirements. Users that skipped
the 4.0.5 upgrade may wish to jump directly from 4.0.4 to the much more stable 4.0.6. For a
full list of changes, check out the <a href="/ChangeLog-4.php">Change Log</a>.
<br clear="all">
</p>

<?php echo hdelim(); ?>


<h1>
<?php print_link("http://www.php-kongress.de/2001/index_en.php", make_image("international_conference.gif", "PHP International Conference 2001", "right") ); ?>
PHP conventions in Europe
</h1>

<p>
<font class="newsDate">[14-Jun-2001]</font>
The second International PHP Conference, taking place in Frankfurt, Germany this coming November
has been announced.  Further details are available on the 
<a href="http://www.php-kongress.de/2001/index_en.php">official Web site</a>.
</p>

<p>
<?php print_link("http://www.linuxtag.org/2001/english/30.html", make_image("phplt.gif", "LinuxTag", "right") ); ?>
Also  
<a href="http://www.linuxtag.org/2001/english/30.html">LinuxTag 2001</a>,
was in Stuttgart, Germany, between July 5th-8th. PHPUG.De has <a href="http://www.phpug.de/phplt_en.php4">a report</a> on the PHP events at LinuxTag.
</p>

<?php echo hdelim(); ?>

<h1>PHP Conference</h1>

<p>
<font class="newsDate">[1-May-2001]</font>
The first official PHP Conference, part of the <a href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source Convention</a>, will bring the community together for
<a href="http://conferences.oreillynet.com/cs/os2001/pub/w/os2001/sessions_php.html">sessions</a> and <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/php_tutorials.html">tutorials</a> designed to explore and strengthen PHP in
the open source space. Take a look under the hood at everything
PHP--from understanding PHP on wireless devices to participating
in a discussion on the future of PHP featuring some of the core
developers and luminaries from the PHP community. The conference
runs July 23-27, 2001, at the Sheraton San Diego Hotel and Marina
in San Diego, California.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1><?php print_link("http://ApacheCon.Com/", "ApacheCon 2001");?></h1>

<p>
<font class="newsDate">[11-Apr-2001]</font>
You may have missed the conference, but you can see some of the
presentations online. Check out:</p>
<ul>
  <!-- <li>Luis Argerich on <a href="">The PXP project, using reusable PHP components and XML to develop dynamic web sites</a></li> -->
  <li>Thies Arntzen on <a href="http://conf.php.net/pres/index.php?p=slides%2Foci&id=oci">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
  <li>Stig Bakken on <a href="http://conf.php.net/pres/index.php?p=slides%2Fpear&id=pear">The PHP Extension and Application Repository</a></li>
  <li>Daniel Beckham and Brian Moon on <a href="http://dealnews.com/apachecon/">Caching Dynamic Web Content to Increase Dependability and Performance</a></li>
  <!-- <li>Tony Byrne with <a href="">High-Profile, High Speed: Case study in using PHP to build AlGore.com</a></li> -->
  <li>Rasmus Lerdorf's <a href="http://conf.php.net/pres/index.php?p=slides%2Fintro&id=ac2">Introduction to PHP</a></li>
  <li>Zeev Suraski on <a href="http://conf.php.net/pres/other/internals/">PHP 4 Internals</a></li> 
  <li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
</ul>

<p>If you missed out on ApacheCon 2001 in Santa Clara, keep
your ear to the ground for more info on ApacheCon 2001 Europe in
Dublin, Ireland in October 2001! (And stay tuned for more info
on the first PHP Conference coming July 2001, part of the <a
href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source
Conference</a> in San Diego, California.)
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1><?php echo make_image("php-gtk-white.gif", "PHP-GTK", "right"); ?>
Announcing PHP-GTK</h1>

<p>
<font class="newsDate">[03-Mar-2001]</font>
The first release of PHP-GTK is now available. PHP-GTK is
a PHP extension that provides an object-oriented interface
to GTK+ toolkit and enables you to write client-side
cross-platform GUI applications. For more information, visit
<?php print_link("http://gtk.php.net/")?>.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>PHP 3.0.18 Released</h1>

<p>
<font class="newsDate">[21-Oct-2000]</font>
PHP 3.0.18 was released. This is a bug-fix release, including
fixes for file uploads and a backported imagetypes() function from PHP 4.0. The
<?php print_link("http://cvs.php.net/viewcvs.cgi/php3/ChangeLog?rev=1.854", "ChangeLog"); ?>
contains a full list of changes.
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>Improve Your PHP Skills</h1> 

<p>
Looking for clear and useful guides to build dynamic web-sites using
PHP? Our <?php print_link("/books.php", "Books Resource Center"); ?> lists now
more than 50 books in eleven different languages. If you know
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
