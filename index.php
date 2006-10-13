<?php
/*
   If you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn!
*/

/* ------------------------------------------------------------------------- */

// Get the modification date of this PHP file
$timestamps = array(@getlastmod());

/*
   The date of prepend.inc represents the age of ALL
   included files. Please touch it if you modify any
   other include file (and the modification affects
   the display of the index page). The cost of stat'ing
   them all is prohibitive. Also note the file path,
   we aren't using the include path here.
*/
$timestamps[] = @filemtime("include/prepend.inc");

// Calendar is the only "dynamic" feature on this page
$timestamps[] = @filemtime("include/pregen-events.inc");

// The latest of these modification dates is our real Last-Modified date
$timestamp = max($timestamps);

// Note that this is not a RFC 822 date (the tz is always GMT)
$tsstring = gmdate("D, d M Y H:i:s ", $timestamp) . "GMT";

// Check if the client has the same page cached
if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit();
}
// Inform the user agent what is our last modification date
else {
    header("Last-Modified: " . $tsstring);
}

$_SERVER['BASE_PAGE'] = 'index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-events.inc';

// This goes to the left sidebar of the front page
$SIDEBAR_DATA = '
<h3>What is PHP?</h3>
<p>
 <acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
 is a widely-used general-purpose scripting language that is
 especially suited for Web development and can be embedded into HTML.
 If you are new to PHP and want to get some idea
 of how it works, try the <a href="/tut.php">introductory tutorial</a>.
 After that, check out the online <a href="/docs.php">manual</a>,
 and the example archive sites and some of the other resources
 available in the <a href="/links.php">links section</a>.
</p>
<p>
 Ever wondered how popular PHP is? see the
 <a href="/usage.php">Netcraft Survey</a>.
</p>

<h3><a href="/thanks.php">Thanks To</a></h3>
<ul class="simple">
 <li><a href="http://www.easydns.com/?V=698570efeb62a6e2" title="DNS Hosting provided by easyDNS">easyDNS</a></li>
 <li><a href="http://www.directi.com/">Directi</a></li>
 <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
 <li><a href="http://www.ev1servers.net/">EV1Servers</a></li>
 <li><a href="http://www.servercentral.net/">Server Central</a></li>
 <li><a href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
 <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
 <li><a href="http://ez.no/">eZ systems</a> / <a href="http://www.hit.no/english">HiT</a></li>
 <li><a href="http://www.osuosl.org">OSU Open Source Lab</a></li>
 <li><a href="http://www.emini.dk/">Emini</a> A/S</li>
 <li><a href="http://www.yahoo.com/">Yahoo! Inc.</a></li>
</ul>
<h3>Related sites</h3>
<ul class="simple">
 <li><a href="http://www.apache.org/">Apache</a></li>
 <li><a href="http://www.mysql.com/">MySQL</a></li>
 <li><a href="http://www.postgresql.org/">PostgreSQL</a></li>
 <li><a href="http://www.zend.com/">Zend Technologies</a></li>
</ul>
<h3>Community</h3>
<ul class="simple">
 <li><a href="http://www.linuxfund.org/">LinuxFund.org</a></li>
 <li><a href="http://www.ostg.com/">OSTG</a></li>
</ul>

<h3>Syndication</h3>
<p>
 You can grab our news as an RSS feed via a daily dump in a file
 named <a href="/news.rss">news.rss</a>.
</p>';

$MIRROR_IMAGE = '';

// Try to find a sponsor image in case this is an official mirror
if (is_official_mirror()) {

    // Iterate through possible mirror provider logo types in priority order
    $types = array("gif", "jpg", "png");
    while (list(,$ext) = each($types)) {

        // Check if file exists for this type
        if (file_exists("backend/mirror." . $ext)) {

            // Add text to rigth sidebar
            $MIRROR_IMAGE = "<div align=\"center\"><h3>This mirror sponsored by:</h3>\n";

            // Create image HTML code
            $img = make_image(
                'mirror.' . $ext,
                htmlspecialchars(mirror_provider()),
                FALSE,
                FALSE,
                'backend',
                0
            );

            // Add size information depending on mirror type
            if (is_primary_site() || is_backup_primary()) {
                $img = resize_image($img, 125, 125);
            } else {
                $img = resize_image($img, 120, 60);
            }

            // End mirror specific part
            $MIRROR_IMAGE .= '<a href="' . mirror_provider_url() . '">' .
                             $img . "</a></div><br /><hr />\n";

            // We have found an image
            break;
        }
    }
}

// Prepend mirror image to sidebar text
$RSIDEBAR_DATA = $MIRROR_IMAGE . $RSIDEBAR_DATA;

// Write out common header
site_header("Hypertext Preprocessor", array('onload' => 'boldEvents();', 'headtags' => '<link rel="alternate" type="application/rss+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'news.rss" />'));

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<h1>Vancouver PHP Conference Call For Speakers</h1>
<p>
 <span class="newsdate">[13-Oct-2006]</span>
 The <a href="http://vancouver.php.net">Vancouver PHP User Group</a> is pleased
 to announce thier second PHP Conference in Vancouver, B.C., Canada on February 12-13, 2007.
 If you are interested in participating as a speaker or sponsor,
 please email Shane Caraveo at shanec AT ActiveState DOT com.
</p>

<hr />

<?php news_image("http://www.afup.org/forumphp/", "afup2006.jpg", "AFUP Paris 2006"); ?>

<h1>Forum PHP in Paris, France, November 9 &amp; 10th, 2006</h1>
<p>
<span class="newsdate">[04-Oct-2006]</span>
The <a href="http://afup.org/">French AFUP association</a> is proud to announce
the <a href="http://afup.org/forumphp/">fifth annual PHP</a> meeting 
in Paris, on November 9th and 10th, 2006. Developers and managers will gather 
to meet Rasmus Lerdorf, Andrei Zmievski and other prominent community experts 
for two days of sessions, packed with enterprise solutions and 
advanced techniques (in French).
</p>

<hr />

<?php news_image("http://www.zendcon.com/", "zend_phpconf06.png", "Zend / PHP Conference &amp; Expo 2006"); ?>

<h1>Zend / PHP Conference &amp; Expo 2006</h1>
<p>
 <span class="newsdate">[13-Sep-2006]</span>
 The <a href="http://www.zendcon.com">Zend / PHP Conference &amp; Expo 2006</a>
 has an Early Bird registration special available before September 15.
 Use the 'earlybird' code, available on the site, and receive a $795 registration
 price.
</p>
<p>
 The conference has announced a great line-up of speakers, including Chris Anderson,
 author of The Long Tail and editor-in-chief at Wired Magazine, r0ml,
 open source strategist, and Matthew Rechs, CTO of interactive agency,
 Schematic. There's a great line-up of speakers
 <a href="http://www.zendcon.com/speakers_temp.php">available</a>.
</p>

<hr />

<?php news_image("http://phpconference.com/", "intconf2006fall.png", "International PHP Conference 2006"); ?>

<h1>International PHP Conference 2006</h1>
<p>
 <span class="newsdate">[10-Sep-2006]</span>
 Software &amp; Support media is pleased to announce the
 <a href="http://www.phpconference.com/">International PHP Conference 2006</a>.
 It will happen from Nov. 05 to Nov. 08, 2006 at Frankfurt/Main.
 This year's sessions include topics on Security, PHP Internals,
 PHP &amp; Business and Webservice topics. The Call for Papers has
 been closed and the programme is now online.
</p>
<p>
 On Nov. 05 and Nov. 06 there will be 6-hour PowerWorkshops that
 deliver hands-on PHP knowledge. A Management Day, dedicated to
 Managers who want to get informed about the usage of PHP, contains
 several sessions about the usage of PHP in large companies. The
 "PHP Code Camp @ Nite" with PHP Core Devs Marcus Börger and Sara
 Golemon. They go through from PHP basics to PHP OOP and implementing
 your own PHP extension. Delicious pizza and beer will do the rest.
 Registration is now open.
</p>

<hr />

<?php news_image("http://dcphpconference.com/", "dcphpconference.png", "2006 DC PHP Conference"); ?>

<h1>2006 DC PHP Conference - Speakers and schedule</h1>
<p>
<span class="newsdate">[06-Sep-2006]</span>
The <a href="http://www.dcphpconference.com">2006 DC PHP Conference</a> group
is pleased to announce our <a href="http://www.dcphpconference.com/schedule.php">
speaker and schedule lineup</a>. The conference is taking place in downtown 
Washington, DC, USA at the L'Enfant Plaza Hotel, October 19-20, 2006. There 
will be presentations and networking opportunities in the heart 
of the public sector.
</p>

<hr />

<h1>PHP 5.1.6 Released</h1>
<p>
 <span class="newsdate">[24-Aug-2006]</span>
 The PHP development team would like to announce the immediate availability of
 PHP <a href="/downloads.php#v5">5.1.6</a>. This release contains a fix for 
 memory_limit restriction on 64 bit systems that was not included in PHP 5.1.5.
</p>

<hr />

<?php news_image("http://www.amazon.com/exec/obidos/ASIN/0596528124/wwwphpnet", "mre3cover_sm.jpg", "Mastering Regular Expressions, 3rd edition"); ?>
<h1>Mastering Regular Expressions - now with PHP coverage</h1>
<p>
 <span class="newsdate">[24-Aug-2006]</span>
 The third edition of
 <a href="http://www.amazon.com/exec/obidos/ASIN/0596528124/wwwphpnet">Mastering Regular Expressions</a>
 is finally out and includes a full 48-page chapter on PHP. This is an excellent
 resource from Jeffrey Friedl who has been writing about regexps for years.
</p>

<hr />

<h1>PHP 4.4.4 and PHP 5.1.5 Released</h1>
<p>
 <span class="newsdate">[17-Aug-2006]</span>
 The PHP development team would like to announce the immediate availability of
 PHP <a href="/downloads.php#v5">5.1.5</a> and <a
 href="/downloads.php#v4">4.4.4</a>. These two releases address a series of
 security problems that were discovered since the release of PHP 5.1.4 and
 4.4.3. The new releases include the following changes:
</p>
<ul>
<li>Added missing safe_mode/open_basedir checks inside the error_log(),
	file_exists(), imap_open() and imap_reopen() functions.</li>
<li>Fixed overflows inside str_repeat() and wordwrap() functions on 64bit
    systems.</li>
<li>Fixed possible open_basedir/safe_mode bypass in cURL extension and on PHP
    5.1.5 with realpath cache.</li>
<li>Fixed overflow in GD extension on invalid GIF images.</li>
<li>Fixed a buffer overflow inside sscanf() function.</li>
<li>Fixed an out of bounds read inside stripos() function.</li>
<li>Fixed memory_limit restriction on 64 bit system.</li>
</ul>
<p>
Further details about this release can be found in the release announcements
(<a href="/release_5_1_5.php">5.1.5</a> and
<a href="/release_4_4_4.php">4.4.4</a>), and the full list of changes is
available in the ChangeLogs (<a href="/ChangeLog-4.php#4.4.4">PHP 4</a>, 
<a href="/ChangeLog-5.php#5.1.5">PHP 5</a>).
</p>

<hr />

<p class="center"><a href="/archive/index.php">News Archive</a></p>

<?php site_footer();
