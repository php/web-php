<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

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
		list($d,$m,$y,$url,$desc) = fgetcsv($fp,8192);
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
Also taking this opportunity, we would like to ask if some of you would consider
helping out with PHP-GTK documentation. It would be a great way to learn this
exciting extension and also contribute to the project.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.linuxtag.org", make_image("linuxtag2.gif", "LinuxTag", "right") ); ?>

<h1>LinuxTag 2002 - Call for Papers</h1>

<p>
<font class="newsDate">[23-Jan-2002]</font>
LinuxTag, Europe's most important Linux conference and exhibition, has
issued a call for papers. <a href="http://www.linuxtag.org">LinuxTag</a>
will be held at the fair in Karlsruhe, Germany 6th - 9th June 2002. 
Last year 15,000 visitors came to find the latest information on Linux, 
Free Software, Open Source solutions and of course PHP. The event is 
aimed at professionals, enthusiasts, researchers, developers and the community at large.
<ul>
    <li><?php print_link("http://www.linuxtag.org", "LinuxTag"); ?></li>
    <li><?php print_link("http://www1.linuxtag.net/cfp/cfp3-en.html", "Call for papers"); ?></li>
    <li><?php print_link("http://www.phpug.de/index_ka39.php", "PHP@LinuxTag 2001"); ?></li>
</ul>
</p>

<?php echo hdelim(); ?>

<h1>PHP Conference 2 - Call for Participation</h1>

<p>
<font class="newsDate">[10-Jan-2002]</font>
The second official PHP Conference, part of the <a
href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source
Convention</a>, has issued a <a
href="http://conferences.oreillynet.com/cs/os2002/create/e_sess">call for
participation</a> for those who would like to make a presentation or give a
tutorial. The theme of this year's conference is "Doing More With Less".  The
conference will be held at the Sheraton San Diego Hotel and Marina in San
Diego, California between July 22-26, 2002.
</p>

<?php echo hdelim(); ?>

<?php print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>

<h1>Usage stats for December available</h1>

<p>
<font class="newsDate">[09-Jan-2002]</font>
<?php print_link("http://www.netcraft.com/", "Netcraft"); ?> and
<?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace" ); ?> have
published the <?php print_link("/usage.php", "current results"); ?> for their Web
Server surveys.
<br clear="all">
</p>

<?php echo hdelim(); ?>


<?php print_link("http://www.php-conference.de/2001/index_en.php", make_image("international_conference.gif", "International PHP Conference 2001", "right") ); ?>

<h1>International PHP Conference slides available</h1>

<p>
<font class="newsDate">[10-Jan-2002]</font>
You can find an overview of all slides of the sessions from the
International PHP Conference 2001 on the
<a href="http://www.phpconference.de/2001/slides_en.php">conference
slides page</a>. It is still not too late to check out some photos
from the conference:
<ul>
    <li><?php print_link("http://www.photoalbum.nohn.net/PHPConference2001", "Sebastian Nohn"); ?></li>
    <li><?php print_link("http://www.bttr.org/phpconf/", "Ralf Geschke"); ?></li>
    <li><?php print_link("http://www.php-conference.de/2001/images/PHP_Konferenz/", "Conference photos"); ?></li>
</ul>
<br clear="all">
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.1.1 Released!</h1>

<p>
<font class="newsDate">[26-Dec-2001]</font> Due to a few bugs in PHP 4.1.0, we
decided to release <a href="/downloads.php">PHP 4.1.1</a>. The bugs that were
fixed are not major ones but minor ones, which could be annoying if you get
bitten by them.
</p>
<p>
Our recommendation is that people who already upgraded to PHP 4.1.0 do
not need to upgrade to PHP 4.1.1 unless they're experiencing one of the
described bugs. Read the full
<a href="/release_4_1_1.php">release announcement</a>.
<br clear="all">
</p>

<?php commonFooter(); ?>
