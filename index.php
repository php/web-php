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
&nbsp; ' . make_link("http://www.rackshack.net/", "RackShack") . ' <br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
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

// Find the type of logo provided and start the right
// sidebar with it if a mirror banner is available
$types = array("gif", "jpg", "png");
while (list(,$ext) = each($types)) {
    if (file_exists("backend/mirror." . $ext)) {
        $RSIDEBAR_DATA .= "<center><h3>This mirror sponsored by:</h3>\n";

		$img = make_image('mirror.'.$ext, mirror_provider(), false, false, 'backend', 0);
        if (is_primary_site() || is_backup_primary()) {
			$img = resize_image($img, 125, 125);
		} else {
			$img = resize_image($img, 120, 60);
		}

		$RSIDEBAR_DATA .= make_link( mirror_provider_url(), $img ) .
			'</center><br />' . 
			hdelim();
        break;
    }
}

// Read events CSV file, and appanend event information to right sidebar
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
            } else {
                $RSIDEBAR_DATA .= '<center><h3>Upcoming Events<br /><a href="submit-event.php">[add event]</a></h3></center>';
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

<h1>PHP Magazine - International Edition</h1>
<p>
<font class="newsdate">[16-Nov-2002]</font>
<p>
Software &amp; Support Verlag GmbH is going to publish an International version
of the <a href="http://www.phpmag.de/">PHP Magazin</a>. This magazine was
initiated after growing interest for an English magazine after the German
version has been around for a few months.
</p>
<p>
PHP Magazine not only informs about the script language itself, but also about
related technologies such as the Apache Web Server, database technologies, XML
and other innovative internet technologies.  Different sections within the
magazine are oriented towards the specific question areas with which a web
developer is confronted in daily practice.
</p>
<p>
The first issue will be published in December and the frequency of issues is
two months. You can subscribe on the <a
href="http://www.php-mag.net/">website</a> which will open shortly.
</p>

<?php echo hdelim(); ?>

<h1>New Monthly PHP Magazine Launched</h1>
<p>
<font class="newsdate">[15-Nov-2002]</font>
php|architect, a new monthly magazine dedicated exclusively to PHP, has
launched <a href="http://www.phparch.com/">its website</a>. php|a is published
in PDF format and is available worldwide. It covers a variety of advanced
topics ranging from day-to-day programming to the internals of PHP. A sample
article on the creation of a web-based PDF converter is also
available on the magazine website
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0RC1 Released</h1>
<p>
<font class="newsdate">[14-Nov-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0RC1</a>
has been released. This is the first release candidate and should have a very
low number of problems and/or bugs. Nevertheless, please download and test it as
much as possible on real-life applications to uncover remaining issues.

<?php echo hdelim(); ?>

<h1>PHP site server updates</h1>
<p>
<font class="newsdate">[12-Nov-2002]</font>
We are in the process of moving to new server machines so there may
be downtimes in some services, including site search, user note display
and downloads. Please be patient until we finish our work, and everything
will be back again.
</p>

<?php echo hdelim(); ?>

<h1>PHP Search Bars available for major browsers</h1>
<p>
<font class="newsdate">[29-Oct-2002]</font>
We added a new option to access our site's content quickly. In addition to
<a href="/urlhowto.php">URL shortcuts</a>, keyboard shortcuts and
<a href="/tips.php">browser specific magic</a> you can now use our
<a href="/sidebars.php">Search Bar</a> from the major browsers. Please help
us to test this new service, and provide feedback via
<a href="http://bugs.php.net/">the bug system</a> (categorize your bug
as a PHP.net website bug please).
</p>

<?php echo hdelim(); ?>

<?php print_link("http://weblabor.hu/php-doc-chm", make_image("chmhelp.gif", "CHM", "right") ); ?>

<h1>10th Release of the PHP Manual CHM Edition</h1>
<p>
<font class="newsdate">[29-Oct-2002]</font> The 10th sample of the CHM edition
is available for download from today. The sample probably fixes the copy
to clipboard issues experienced by some users, and it's also a content update
with actual manual text, mirrors list and user notes.
<?php print_link("http://weblabor.hu/php-doc-chm", "See the edition's page for download"); ?>,
and please send feedback to <?php print_link("mailto:php-doc-chm@lists.php.net",
"the edition's dedicated mailing list"); ?>.
</p>

<?php echo hdelim(); ?>

<h1>PHP at the LinuxWorld Expo Oct. 29-31th in Frankfurt, Germany</h1>
<p>
<font class="newsdate">[28-Oct-2002]</font>
For the first time the Open Source projects comprising the popular LAMP
platform (Linux, Apache, MySQL and PHP) will be present at the 
<a href="http://www.linuxworldexpo.de">LinuxWorld Expo</a>
with its own booth.
</p>
<p>
At the booth, which is organized by the <a href="http://www.php-ev.de">German
PHP Association</a> and the <a href="http://www.phpug.de">PHP Usergroup
Frankfurt</a>, fair visitors can experience and learn about Apache, MySQL, PHP
and related projects.
</p>
<p>
Visitors can take LAMP home, too, since there will be a CD with the necessary
software available at the booth.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0pre2 Released</h1>
<p>
<font class="newsdate">[27-Oct-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0pre2</a>
is available for download. This is the second pre-release version and
incorporates a large number of bug fixes since the first pre-release. Still, to
help us catch as many bugs as possible, please download it and start testing.

<?php echo hdelim(); ?>

<h1>New keyboard shortcuts</h1>
<p>
<font class="newsdate">[17-Oct-2002]</font>
We introduced new keyboard shortcuts on the site today to make our pages
even more comfortable to use. You can hit Alt+S on Microsoft Windows
or Ctrl+S on Macintosh now to go right to the search box and type your
search keyword. A similar shortcut with the letter "L" is also introduced
on the manual pages to access the lookup input field. Thanks to Tommy Ipsen
for the suggestion. You can read more about keyboard shortcuts on web pages
<a href="http://www.w3.org/TR/html401/interact/forms.html#access-keys">in
the HTML standard</a>.

<?php echo hdelim(); ?>

<h1>PHP 4.3.0pre1 Released</h1>
<p>
<font class="newsdate">[10-Oct-2002]</font>
<a href="http://www.php.net/~andrei/php-4.3.0pre1.tar.bz2">PHP 4.3.0pre1</a>
is available for download. PHP 4.3.0 incorporates a very large number of
changes, new features, and bugfixes and thus requires extensive testing. This
preliminary release is meant to kick-start this testing while the fixes are
still being performed. Please join in and help us make this a high-quality
release. You can use the build tracker at
<a href="http://qa.php.net/buildtest-submit.php">http://qa.php.net/buildtest-submit.php</a>
to report your results.

<?php echo hdelim(); ?>

<h1>PHP 4.2.3 Released</h1>
<p>
<font class="newsdate">[06-Sept-2002]</font>
<a href="downloads.php">PHP 4.2.3</a> has been released with a large number of bug fixes.  It is a maintenance
release, and is a recommended update for all users of PHP, and Windows users in particular. A complete
list of changes can be found in the <a href="ChangeLog-4.php">ChangeLog</a>.
</p>

<?php echo hdelim(); ?>


<?php print_link("http://www.php-conference.de/2002/index_en.php", make_image("phpconf2002.gif", "PHP Conference 2002", "right")); ?>

<h1>International PHP Conference 2002 (Frankfurt, Nov 3-6)</h1>
<p>
<font class="newsdate">[05-Sept-2002]</font>
After the big success of last year's first International PHP Conference this
year's show will be even bigger and better.</p>

<p>
<a href="http://www.php-conference.de/2002/index_en.php">Come to Frankfurt</a>
and meet the most excellent speakers of the PHP community on four following days
packed with <a href="http://www.php-conference.de/2002/pw_en.php">whole day
tutorials</a> on November 3 and 4 and a great variety of sessions on November
5 and 6.</p>

<p>
The topics are PHP Applications, PHP &amp; Business, Database Topics, PHP &amp; GTK,
PHP Internals / Extensions, PHP &amp; XML, and others.</p>

<p><a href="https://www.entwickler.com/ssl/php2002/en/form_php2002.php">Early
bird registration</a> will end on 7th of October. Students and private
persons get special discounts.</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.php-con.com/", make_image("phpcon2002.png", "PHPCon 2002", "right") ); ?>

<h1>PHPCon 2002 (California, Oct 24-25)</h1>
<p>
<font class="newsdate">[05-Sept-2002]</font> 
<a href="http://www.php-con.com" title="PHPCon 2002">PHPCon 2002</a>, a
2-day technical conference devoted entirely to PHP, announced today the
launch of the PHPCon 2002 website, online registration, and a call for
participation.</p>

<p>
<a href="http://www.php-con.com/2002/register.php">Early Bird
registration</a> is now open for PHPCon 2002. Strong technical tracks on
Enterprise PHP, Application Development, and XML combined with speakers
from Rackspace, Yahoo!, Macromedia, and MySQL make this the conference a
must attend for anyone interested in expanding their PHP knowledge.</p>

<p>
Join PHPCon in delivering the PHP message with Birds of a Feather (BoFs)
and Works in Process (WiPs) sessions. Submit your BoF and WiP topics <a
href="http://www.php-con.com/2002/bof_form.php" title=" BoF - WiP
Submission ">online</a>.</p>

<p>
An idea who's time has come, don't miss this opportunity to attend the
only conference in the US is placing PHP front and center as the language
for solving web problems. PHPCon 2002, October 24 & 25, 2002, Millbrae,
California.</p>

<?php echo hdelim(); ?>

<h1>Printer friendly manual pages with notes</h1>
<p>
<font class="newsdate">[03-Aug-2002]</font> Starting from today, the
manual pages are not only available in their printer friendly versions,
but also in printer friendly versions with user notes included. Check
the links at the <a href="/manual">top of the manual pages</a> to go
to printer friendly manual pages, and change languages.
</p>

<?php echo hdelim(); ?>

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
