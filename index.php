<?php
/*
   If you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn!
*/

/* ------------------------------------------------------------------------- */

// Get the modification date of this PHP file
$timestamps[] = @getlastmod();

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
 <li><a href="http://www.easydns.com/?V=698570efeb62a6e2">easyDNS</a></li>
 <li><a href="http://www.directi.com/">Directi</a></li>
 <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
 <li><a href="http://www.ev1servers.net/">EV1Servers</a></li>
 <li><a href="http://www.servercentral.net/">Server Central</a></li>
 <li><a href="http://www.redundant.com/">Redundant Networks</a></li>
 <li><a href="http://www.simplicato.com/?a=1007">Simplicato</a></li>
 <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
 <li><a href="http://ez.no/">eZ systems</a> / <a href="http://www.hit.no/english">HiT</a></li>
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
 <li><a href="http://www.osdn.org/">OSDN</a></li>
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

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<?php news_image("http://www.afup.org/forumphp/", "afup2004.jpg", "Forum PHP"); ?>

<h1>Forum PHP in Paris, November 18 &amp; 19, 2004</h1>
<p>
 <span class="newsdate">[28-Sep-2004]</span>
 The French <a href="http://www.afup.org/">AFUP association</a>
 is proud to announce the fourth annual PHP meeting in Paris,
 on November 18th and 19th, 2004. Developers and managers will
 gather to meet Zeev Suraski, Rasmus Lerdorf and other prominent community experts
 for two days of sessions, packed with
 <a href="http://www.afup.org/article.php3?id_article=253">enterprise solutions and advanced techniques</a>
 (in French).
</p>

<hr />

<?php news_image("/downloads.php#v5", "php-version5.gif", "PHP 5"); ?>
<h1>PHP 5.0.2 released!</h1>
<p>
 <span class="newsdate">[23-Sep-2004]</span>
 The PHP Development Team is proud to announce the immediate release of <a href="/downloads.php#v5">PHP 5.0.2</a>.
 This is a maintenance release that in addition to many non-critical bug fixes, addresses a problem
 with GPC input processing. 
 All Users of PHP 5 are encouraged to upgrade to this release as soon as possible.
</p>

<p>
 For changes since PHP 5.0.1, please consult the
 <a href="/ChangeLog-5.php#5.0.2">ChangeLog</a>.
</p>

<hr />

<?php news_image("/downloads.php#v4", "php-version4.gif", "PHP 4"); ?>
<h1>PHP 4.3.9 released!</h1>
<p>
 <span class="newsdate">[22-Sep-2004]</span>
 The PHP Development Team is proud to announce the immediate release of <a href="/downloads.php">PHP 4.3.9</a>.
 This is a maintenance release that in addition to over 50 non-critical bug fixes, addresses a problem
 with GPC input processing. This release also re-introduces ability to write
 GIF images via the bundled GD extension.
 All Users of PHP are encouraged to upgrade to this release as soon as possible.
</p>

<p>
 For changes since PHP 4.3.8, please consult the
 <a href="/ChangeLog-4.php#4.3.9">ChangeLog</a>.
</p>

<hr />

<?php news_image("http://mysqlcomconeurope.com", "MySQLcomcon_logo.gif", "MySQL"); ?>
<h1>MySQL ComCon Europe</h1>
<p>
 <span class="newsdate">[06-Sep-2004]</span>
 The MySQL ComCon Europe 2004 brings together the vigor and excitement of a
 community event with the structure of MySQL mission-critical business event.
 The conference will take place in Frankfurt from November 9th to 10th and will
 have a day of pre-conference power workshops on the 8th. Sessions on diverse
 topics such as "Performance Tuning J2EE Applications deployed on MySQL", "PHP
 5 and MySQL 4.1/5.0" and a two-part introduction to MySQL Cluster will be
 presented by MySQL core developers, expert trainers and MySQL community
 leaders. For more details on the event, please visit
 <a href="http://mysqlcomconeurope.com">http://mysqlcomconeurope.com/</a>.
</p>

<hr />

<h1>OSCOM.4 with Apache Track</h1>
<p>
 <span class="newsdate">[14-Aug-2004]</span>
 OSCOM, the international association for Open Source Content Management
 is arranging the <a href="http://oscom.org/events/oscom4/program/">Fourth
 Open Source Content Management Conference</a> from 29th September to 1st
 October in Zürich. This fall, the event features Apache Software Foundation
 projects, and PHP, so you have a chance to meet some prominent
 figures of the PHP scene there. OSCOM.4 is a place for developers,
 vendors, integrators and users to mingle and learn from each other. <a
 href="http://oscom.org/events/oscom4/registration">Registration is
 now open</a>!
</p>

<hr />

<h1>New Installation Instructions</h1>
<p>
 <span class="newsdate">[14-Aug-2004]</span>
 The latest online version of the PHP Manual contains a completely reorganized
 <a href="/install">Installation and Configuration</a> part, which is now
 divided into sections for individual platforms and servers to ease your first
 steps with PHP. The Windows installation instructions are completely
 revised, and now suggest you to set environment variables instead of moving 
 files. This way upgrades and configuration changes become easier.
</p>

<hr />

<?php news_image("/downloads.php#v5", "php-version5.gif", "PHP 5"); ?>
<a name="5.0.1"></a>
<h1>PHP 5.0.1 Released!</h1>
<p>
 <span class="newsdate">[12-Aug-2004]</span>
 The PHP Development Team would like to announce the immediate availability of <a href="/downloads.php">PHP 5.0.1</a>.
 This is a maintenance release that in addition to many non-critical bug fixes also includes new UNIX and
 Windows installation docs which are now auto-generated from the PHP Manual.
</p>

<p>
 For changes since PHP 5.0.0, please consult the
 <a href="/ChangeLog-5.php#5.0.1">ChangeLog</a>.
</p>

<hr />

<h1>PHP Tunisie Magazine</h1>
<p>
 <span class="newsdate">[02-Aug-2004]</span>
 <a href="http://www.phptunisie.net/">PHP Tunisie</a> has just released the 
 <a href="http://www.phptunisie.net/formation/downloadmagazine/2/1/">second 
 issue</a> of its monthly french PHP Magazine. In this issue you'll find
 a large plan on PostgreSQL, Databases abstractions with PHP, your mini
 template engine, an article on images generation with PHP, the migration
 towards PHP5 with EasyPHP1.7...  And many other articles and latests PHP news.
</p>
<p>
 PHP Tunisie Magazine is edited by the Tunisian PHP Users Group.
</p>

<hr />

<?php news_image("/downloads.php#v5", "php-version5.gif", "PHP 5"); ?>
<a name="5.0.0"></a>
<h1>PHP 5.0.0 Released!</h1>
<p>
 <span class="newsdate">[13-Jul-2004]</span>
 The PHP team is proud to announce the <a href="/downloads.php#v5">final release of PHP 5</a>!
</p>

<p>Some of the key features of PHP 5 include:</p>

<ul>
 <li>
  The <a href="http://www.zend.com/php5/zend-engine2.php">Zend Engine II</a>
  with a new object model and dozens of new features.
 </li>
 <li>
  XML support has been completely redone in PHP 5, all extensions are now
  focused around the excellent libxml2 library
  (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).
 </li>
 <li>
  A new SimpleXML extension for easily accessing and manipulating XML as
  PHP objects. It can also interface with the DOM extension and vice-versa.
 </li>
 <li>
  A brand new built-in SOAP extension for interoperability with Web Services.
 </li>
 <li>
  A new MySQL extension named MySQLi for developers using MySQL 4.1 and later.
  This new extension includes an object-oriented interface in addition to
  a traditional interface; as well as support for many of MySQL's new features,
  such as prepared statements.
 </li>
 <li>
  SQLite has been bundled with PHP. For more information on SQLite,
  please visit <a href="http://www.sqlite.org/">their website</a>.
 </li>
 <li>
  Streams have been greatly improved, including the ability to access
  low-level socket operations on streams.
 </li>
 <li>And lots more...</li>
</ul>

<p>
 For changes since Release Candidate 3, please consult the
 <a href="/ChangeLog-5.php#5.0.0">ChangeLog</a>.
</p>

<hr />

<?php news_image("/downloads.php#v4", "php-version4.gif", "PHP 4"); ?>

<h1>PHP 4.3.8 released!</h1>
<p>
 <span class="newsdate">[13-Jul-2004]</span>
 PHP Development Team would like to announce the immediate availability of <a href="/downloads.php">PHP 4.3.8</a>.
 This release is made in response to several security issues that have been discovered since the
 4.3.7 release. All users of PHP are strongly encouraged to upgrade to PHP 4.3.8 as soon as possible.
</p>

<hr />

<?php //news_image("http://www.phpconference.de/2003/index_en.php", "international_conference_2003.gif", "International PHP Conference"); ?>
<h1>International PHP Conference 2004</h1>
<p>
 <span class="newsdate">[18-Jun-2004]</span>
 The traditional International PHP Conference 2004 will be taking
 place from 7th November to 10th November in Frankfurt (FFM). The
 Call for Papers has been issued, so if you have an interesting
 talk, the organizers would love to hear about it! You can expect
 a gathering of PHP experts and core developers.
</p>
<p>
 You can find the CfP <a href="http://www.phpconference.de/2004/cfp_en.php">on
 the website</a>. The deadline is 16th July, 2004.
</p>
<p>
 The conference is also featuring an <strong>OpenSource Exhibition</strong>
 where PHP related OpenSource projects can present themselves for free.
</p>

<hr />

<?php news_image("http://phparch.com/phpworks", "phpworks.png", "php|works"); ?>
<h1>php|works - early-bird discount now in effect</h1>
<p>
 <span class="newsdate">[16-Jun-2004]</span>
 <a href="http://www.phparch.com">php|architect</a> magazine is proud to
 introduce <a href="http://www.phparch.com/phpworks">php|works 2004</a>, a
 three-day conference on PHP and the business of open-source software that
 will be held in Toronto, Canada, September 22-24 2004.
</p>
<p>
 The conference includes a total of over 30 hours of technical and
 business-oriented presentations that range from Rasmus Lerdorf's "Best
 Practices for PHP Developers" to "Getting your OSS Business Funded",
 presented by venture capital specialist Christian Mayaud. Other sessions
 include practical talks on PHP 5, regular expressions, multilingual
 development, PDO, XML and OOP. The business track includes sessions on the
 use of PHP in the legal, financial and healthcare industry, growing your
 business with OSS, the status of the PHP market and much, much more!
</p>
<p>
 As an added bonus, attendees who sign up before July 20th are
 eligible for up to $100 in early-bird savings.
</p>
<p>
 For more information, visit the <a
 href="http://www.phparch.com/phpworks">php|works website</a>.
</p>

<hr />

<?php news_image("http://lamparea.org/en", "lamparea.png", "Lamp Area"); ?>
<h1>LAMP area at LinuxTag 2004 in Karlsruhe, Germany</h1>
<p>
 <span class="newsdate">[14-Jun-2004]</span>
 The LAMP area will highlight the use of Linux, Apache, MySQL and PHP as
 technologies for enterprise applications at <a
 href="http://linuxtag.de">LinuxTag 2004</a> in Karlsruhe, Germany from June 23
 to 26. The companies that are presenting in the speakers area of the 150
 square meters booth are: <a href="http://100days.de">100days</a>, <a
 href="http://ez.no">eZ systems</a>, <a
 href="http://thinkphp.de">Mayflower</a>, <a href="http://mysql.com">MySQL</a>
 and <a href="http://zend.com">Zend</a>.
</p>

<p>
 Besides presentations from the above companies the LAMP area also presents
 over 40 sessions by Apache-, MySQL- and PHP-developers, such as Rasmus Lerdorf,
 Ken Coar and Brian Aker. Entrance to LinuxTag is free if you
 <a href="https://www.linuxtag.org/2004/registrationform.html">pre-register</a>.
 For more information see <a href="http://lamparea.org/en">the LAMP Area</a>
 website.
</p>

<hr />

<?php news_image("/downloads.php#5", "php-version5.gif", "PHP 5"); ?>
<h1>PHP 5 Release Candidate 3 Released!</h1>
<p>
 <span class="newsdate">[8-Jun-2004]</span>
 The <a href="/downloads.php#v5">third (and hopefully final) Release Candidate
 of PHP 5</a> is now available!  This mostly bug fix release improves PHP 5's
 stability and irons out some of the remaining issues before PHP 5 can be
 deemed release quality.  Everyone is now encouraged to start playing with it!
</p>

<p>There are few changes changes since Release Candidate 2, which can be found
<a href="/ChangeLog-5.php#5.0.0RC3">here</a>.</p>
</p>

<p class="center"><a href="/news-2004.php">News Archive</a></p>

<?php commonFooter(); ?>
