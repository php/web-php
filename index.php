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
&nbsp; ' . make_link("http://promote.pair.com/direct.pl?php.net", "pair Networks") . '<br>
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

<h1>PHP 4.2.2 released in response to vulnerability</h1>

<p>
<font class="newsdate">[22-Jul-2002]</font> The PHP Group today announced
the details of a serious <a href="release_4_2_2.php">vulnerability</a> in PHP versions 4.2.0 and 4.2.1.
A security update, <a href="downloads.php">PHP 4.2.2</a>, fixes the issue. Everyone running
affected versions of PHP is encouraged to upgrade immediately. The new 4.2.2
release doesn't include other changes, so upgrading from 4.2.1 is safe and painless.
</p>

<?php echo hdelim(); ?>

<h1>New comp.lang.php newsgroup started</h1>

<p>
<font class="newsdate">[09-Jul-2002]</font> comp.lang.php was created yesterday,
after a two and a half month long process started in April by Ian Fette resulted
in a <a href="http://groups.google.com/groups?q=comp.lang.php&hl=en&lr=&ie=UTF-8&sel
m=1025483879.39561%40isc.org&rnum=3">177-11 vote</a> in favor of the group.
The new group is already carried on most news servers, and should be carried
on almost all news servers in the world within the next few days.
</p>

<p>
The new group is important for a few reasons: Firstly, the old alt.* php
groups suffered from poor propagation - i.e. not all servers carried them,
and the community was split between multiple groups. This new group offers a
chance to unite the PHP-Usenet community. Secondly, most servers have longer
post-retention times for comp.* than alt.*. Finally, the creation of
comp.lang.php represents PHP's coming to acceptance and maturity. Virtually
all languages have a spot under the comp.lang.* hierarchy. Stop on by and
become a part of the community - comp.lang.php is a great place to get help
and to help others.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://weblabor.hu/php-doc-chm", make_image("chmhelp.gif", "CHM", "right") ); ?>

<h1>New Sample of PHP Documentation "New CHM Edition"</h1>
<p>
<font class="newsdate">[04-Jul-2002]</font> The 6th sample of the CHM edition is out now.
This sample is mainly a content update, but it also fixes some small bugs. We welcome
any suggestions and bug reports.
<?php print_link("http://weblabor.hu/php-doc-chm", "Try out the new CHM Edition"); ?>,
and please send us your feedback to our
<?php print_link("mailto:php-doc-chm@lists.php.net", "dedicated mailing list"); ?>.
</p>

<?php echo hdelim(); ?>

<?php echo make_image("engine.gif", "Zend Engine 2", "right"); ?>

<h1>Alpha 2 of PHP w/ the Zend Engine 2 Now Available</h1>
<p>
<font class="newsdate">[30-Jun-2002]</font>
The second alpha release of PHP w/ Zend Engine 2 is
<?php download_link("php-4.3.0-dev-zend2-alpha2.tar.gz", "now available"); ?>.
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
<?php download_link("php-4.3.0-dev-zend2-win32-alpha2.zip", "download"); ?>.</p>

<?php echo hdelim(); ?>

<?php echo make_image("phpconf2002.gif", "International PHP Conference 2002", "right"); ?>

<h1>Call for Papers: International PHP Conference 2002</h1>
<p>
<font class="newsdate">[12-Jun-2002]</font>
The <?php print_link('http://www.php-conference.de/2002/', 'International PHP Conference 2002'); ?> is looking for 
people, who do talks and workshops at the conference. If you want to present your talk, please 
<?php print_link('http://www.phpconference.de/2002/kt/input/', 'submit your proposals'); ?> to them. 
The conference will be held in November in Frankfurt/Germany. For more information about dates and
topics, visit the <?php print_link('http://www.phpconference.de/2002/cfp_en.php', 'Call for Papers page'); ?>.
</p>

<?php echo hdelim(); ?>


<?php echo make_image("engine.gif", "Zend Engine 2", "right"); ?>

<h1>Initial Alpha Release of PHP w/ the Zend Engine 2 Available</h1>
<p>
<font class="newsdate">[9-Jun-2002]</font>
The first alpha release of PHP w/ Zend Engine 2 is
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

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
