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

// Open events CVS file, and print out event title
$fp = @fopen("backend/events.csv", "r");
if ($fp) {
	$cm = 0;
	while (!feof($fp)) {
		list($d, $m, $y, $url, $desc, $id) = fgetcsv($fp, 8192);
		// fgetcvs returns an array with a single null element for a blank line
        if ($d === NULL) { continue; }
        if ($cm != (int) $m) { 
			if ($cm) {
                $RSIDEBAR_DATA .= "<br />\n";
            }
			else {
                $RSIDEBAR_DATA .= '<h3>Upcoming Events<br />&nbsp;&nbsp;&nbsp;&nbsp;<a href="submit-event.php">[add event]</a></h3>';
            }
			$cm = (int) $m;
			$RSIDEBAR_DATA .= "<h4>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h4>\n"; 
			unset($seen);
		}
		if (!$seen[$desc]) {
			$RSIDEBAR_DATA .= "$d. <a href=\"cal.php?id=$id\">". stripslashes($desc)."</a><br>\n";
			$seen[$desc] = true;
		}
	}
	fclose($fp);
}

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>


<?php echo make_image("engine.gif", "Zend Engine 2", "right"); ?>

<h1>Initial Alpha Release of PHP w/ the Zend Engine 2 Available</h1>
<font class="newsdate">[9-Jun-2002]</font>
<p>The first alpha release of PHP w/ Zend Engine 2 is
<a href="distributions/php-4.3.0-dev-zend2-alpha1pl1.tar.gz">now available</a>.
It is based on the current PHP 4 CVS (4.3.0-dev) and includes the new 
scripting engine which greatly improves the object model, adds exception
handling and provides a much better infrastructure for the integration
of external technologies like Java or .NET.  For more details and
examples you can check out the <a href="ZEND_CHANGES.txt">CHANGES file</a>
and an <a href="http://www.php.net/source.php?url=/zend2_example.phps">example script</a>
which shows how some of these features can be used.</p>

<p><b>Note:</b>  This is an alpha version.  It should not be used in production
or even semi-production web sites.  There are known bugs in it, and in
addition, some of the features may change (based on feedback).  We
encourage you to download and play with it (and report bugs if you find any!),
but please don't expect it to replace your copy of PHP 4 at this stage.</p>

<p>Windows binary version is also available for
<?php download_link("php-4.3.0-dev-zend2-win32-alpha1.zip", "download"); ?>.</p>

<?php echo hdelim(); ?>


<h1>ActiveState Awards</h1>
<p>
ActiveState is delighted to announce the second annual Programmers'
Choice and Activators' Choice Awards. The awards honor the unnamed
heroes who <em>actively</em> contribute to open languages and display
excellence in their programming efforts. The Programmers' Choice
recipients are nominated and chosen by members of the programming
community - like you.  Know someone who's really made a difference using
these languages? Tell us about them!
<?print_link('http://www.ActiveState.com/Corporate/Awards/ActiveAwards.html', 'Get out the vote')?> and stay
tuned! Nominees will be announced July 2, 2002. Perl, PHP, Python and
XSLT winners will be announced at OSCON July 23, 2002. Tcl winners will
be announced at the Tcl 2002 conference in September.
</p>

<?php echo hdelim(); ?>

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

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
