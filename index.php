<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

/* ------------------------------------------------------------------------- */

/* Get the modification dates of the main PHP file */
$timestamps[] = @getlastmod();

/* The date of prepend.inc indicates the age of ALL
   included files. Please touch it if you modify an
   another include file. The cost of stat'ing them
   all is prohibitive. Also note the file path,
   we aren't using the include path here. */
$timestamps[] = @filemtime("include/prepend.inc");

/* Calendar is the only dynamic feature on this page. */
$timestamps[] = @filemtime("backend/events.csv");

/* The latest of these modification dates is our real
   Last-Modified date. */
$timestamp = max($timestamps);

/* Note that this is not a RFC 822 date (the tz is always GMT) */
$tsstring = gmdate("D, d M Y H:i:s ",$timestamp)."GMT";

if ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring) {
	/* The UA has the exact same page we have. */
	header("HTTP/1.1 304 Not Modified");
	exit();
} else {
    header("Last-Modified: ".$tsstring);
}

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<br>
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a widely-used general-purpose scripting language that is
especially suited for Web development and can be embedded into HTML.
If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
Ever wondered how popular PHP is? see the ' .
make_link("/usage.php", "Netcraft Survey") . '.
</p>	

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://vasoftware.com/", "VA Software Corporation") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.devnetwork.net/", "PHP Developers Network") . '<br>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
';

$fp = @fopen("backend/events.csv",'r');
if($fp) {
	$cm=0;
	while(!feof($fp)) {
		list($d,$m,$y,$url,$desc,$id) = fgetcsv($fp,8192);
		if($cm!=(int)$m) { 
			if($cm) $RSIDEBAR_DATA.= "<br />\n"; 
			else $RSIDEBAR_DATA.='<h3>Upcoming Events<br />&nbsp;&nbsp;&nbsp;&nbsp;<a href="submit-event.php">[add event]</a></h3>';
			$cm = (int)$m;  
			$RSIDEBAR_DATA .= "<h4>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h4>\n"; 
			unset($seen);
		}
		if(!$seen[$desc]) {
			$RSIDEBAR_DATA .= $d. "<a href=\"cal.php?id=$id\">". stripslashes($desc)."</a><br>\n";
			$seen[$desc] = true;
		}
	}
	fclose($fp);
}

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>PHP for NetWare (Beta) Released</h1>
<p>
<font class="newsDate">[27-May-2002]</font>
A Beta version of PHP for NetWare is available on the
<a href="http://developer.novell.com/ndk/leadedge.htm#le169">Novell
Developer Kit site</a>. This version is based on the
4.0.8 (development) version of the PHP source code.
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

<?php echo hdelim(); ?>

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
