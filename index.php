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
<p>
 PHP is a project of the
 <a href="http://www.apache.org/">Apache Software Foundation</a>.
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
 <li><a href="http://ez.no/">eZ systems</a> / <a href="http://www.hit.no/">HiT</a></li>
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

<?php news_image("/downloads.php#v5", "php5_logo.gif", "PHP 5"); ?>

<h1>PHP 5 Release Candidate 1 Released!</h1>
<p>
 <span class="newsdate">[18-Mar-2004]</span>
The <a href="/downloads.php#v5">first Release Candidate of PHP 5</a> is finally here!  The move from Beta stage to RC stage means that PHP 5 is now feature complete, and is quite stable - stable enough for everyone to start playing with.  Note that it is still <i>not</i> recommended for mission-critical use.</p>

<p>Some of the key features of PHP 5 include:</p>

<ul>
<li>The Zend Engine II with a new object model and dozens of new features.</li>
<li>XML support has been completely redone in PHP 5, all extensions are now focused around the excellent libxml2 library (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).</li>
<li>A new MySQL extension named MySQLi for developers using MySQL 4.1 and later. Additionally to a functional interface this new extension also includes an object-oriented interfaced and support for many of MySQL's new features such as prepared statements.</li>
<li>SQLite has been bundled with PHP. For more information on SQLite, please visit <a href="http://www.sqlite.org/">their website</a>.</li>
<li>A brand new built-in SOAP extension for interoperability with Web Services.</li>
<li>A new SimpleXML extension for easily accessing and manipulating XML as PHP objects. It can also interface with the DOM extension and vice-versa.</li>
<li>Streams have been greatly improved, including the ability to access low-level socket operations on streams.</li>
<li>And lots more...</li>
</ul>

<p>For changes since Beta 4, please consult the <a href="/ChangeLog-5.php#5.0.0b4">ChangeLog</a>.</p>
<hr />


<h1>Spanish PHP Mailing List Now at PHP.net</h1>
<p>
 <span class="newsdate">[29-Feb-2004]</span>
 The Spanish PHP mailing list was relocated to our list server. If you would like to subscribe
 to the list, you can do it via our <a href="mailing-lists.php">mailing lists page</a>. To read
 the archives, please see <a href="http://news.php.net/">our news server</a>.
</p>

<hr />

<?php news_image("http://www.phpconference.com/", "intcon2004spring.png", "International PHP Conference 2004 - Spring Edition"); ?>

<h1>International PHP Conference 2004 Amsterdam: Timetable and Open Source PHP projects</h1>
<p>
 <span class="newsdate">[27-Feb-2004]</span>
 Having the CfP over now, the organizers of the
 <a href="http://www.phpconference.com/">International PHP Conference
 2004 Spring Edition Amsterdam</a> have published the
 <a href="http://www.phpconference.com/proxy/proxy.php?CatID=0&amp;NewsID=374">session
 and workshop timetable</a>. The Conference features 32 sessions and two
 power workshops. It will happen again at <a
 href="http://www.phpconference.com/content/content2.php?CatID=0&amp;NewsID=356">the
 RAI Conference Centre, Amsterdam</a>.
</p>
<p>
 <strong>Open Source PHP projects</strong> can present themselves, like in
 the last years, for free on the Conference at the exhibition area between
 the commercial exhibitors. Take your chance and contact
 <a href="mailto:fstepan@entwickler.com">Frank Stepan</a> from
 Software &amp; Support.
</p>

<hr />

<h1>PHP 4.3.5RC3 released!</h1>
<p>
 <span class="newsdate">[16-Feb-2004]</span>
 <a href="http://qa.php.net/">PHP 4.3.5RC3</a> has been released for testing. This 
 will be the last release candidate prior to the final release, so please test it
 as much as possible. List of changes can be found in the 
 <a href="http://cvs.php.net/diff.php/php-src/NEWS?r1=1.1247.2.522&amp;r2=1.1247.2.566">NEWS</a> file.
</p>

<hr />

<h1>PHP 5.0 Beta 4 released!</h1>
<p>
 <span class="newsdate">[12-Feb-2004]</span>
 <a href="/downloads.php#v5">PHP 5.0 Beta 4</a> has been released.  This fourth beta 
 of PHP 5 is also scheduled to be the last one (barring unexpected surprises, that
 did occur with beta 3).  This beta incorporates dozens of bug fixes since Beta 3,
 rewritten exceptions support, improved interfaces support, new <i>experimental</i>
 SOAP support, as well as lots of other improvements, some of which are documented
 in the <a href="/ChangeLog-5.php#5.0.0b4">ChangeLog</a>.
</p>
<p>
 Some of the key features of PHP 5 include:
</p>
<ul>
 <li>
  PHP 5 features the <a href="/zend-engine-2.php">Zend Engine 2</a>.
 </li>
 <li>
  XML support has been completely redone in PHP 5, all extensions are now focused around the
  excellent libxml2 library (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).
 </li>
 <li>
  SQLite has been bundled with PHP. For more information on SQLite, please visit their
  <a href="http://www.hwaci.com/sw/sqlite/">website</a>.
 </li>
 <li>
  A new SimpleXML extension for easily accessing and manipulating XML as PHP objects. It can
  also interface with the DOM extension and vice-versa.
 </li>
 <li>
  Streams have been greatly improved, including the ability to access low-level socket
  operations on streams.
 </li>
</ul>

<hr />

<?php news_image("http://conf.phpquebec.org/", "conference_php_quebec.gif", "Conference PHP Quebec"); ?>

<h1>Conf&eacute;rence PHP Qu&eacute;bec 2004 - (Montr&eacute;al, March 25&amp;26rst, 2004)</h1>
<p>
 <span class="newsdate">[11-Feb-2004]</span>
 The PHP Qu&eacute;bec Association announces the <a
 href="http://conf.phpquebec.com/">Conference PHP Qu&eacute;bec 2004</a>.
 The conference features 20 sessions over 2 days, in English and French.
 3 tracks : PHP advanced technics, PHP professionnal and Open Source technologies.
 It will take place downtown Montr&eacute;al, Qu&eacute;bec, Canada.
</p>
<p>
 We are currently offering <a 
 href="http://conf.phpquebec.org/main.php/en/conf2004/tarif">early bird prices</a>.
 Students and Small Businesses are eligible for reduced prices.
 Buy your tickets early to get rebates and discount with the DVD!
</p>
<p>
 Learn more about those exciting days at 
 <a href="http://conf.phpquebec.org/">conf.phpquebec.com</a>.
</p>

<hr />

<?php news_image("http://www.pawscon.com/", "paws_small.jpg", "PHP and Web Standards Conference - UK 2004"); ?>

<h1>PaWS Tickets Now On Sale!</h1>
<p>
 <span class="newsdate">[05-Feb-2004]</span>
 The <a href="http://www.pawscon.com/">PaWS Group</a> is proud to announce that
 tickets are now available for the first 
 <a href="http://www.pawscon.com/">PHP and Web Standards Conference</a>. We are
 offering Weekend tickets (Saturday 21st and Sunday 22nd only) as well as Conference
 tickets (Friday 20th - Tuesday 24th) for the entire length of the event. 
 Additionally, we also have Daily tickets available for each day of the conference.
 Tickets will also be available on the door for those that simply want to drop in.
</p>
<p>
 For ticket and accommodation Prices, look over our 
 <a href="http://www.pawscon.com/pricing">pricing guide</a> for more information.
 <a href="http://www.pawscon.com/register">Purchase your tickets</a> today for this
 one of a kind conference!
</p>

<hr />

<h1>Call for Papers Reminder: O'Reilly Open Source Convention</h1>
<p>
 <span class="newsdate">[03-Feb-2004]</span>
 The <a href="http://conferences.oreillynet.com/os2004/">2004 O'Reilly Open
 Source Convention</a> will be in Portland OR, July 26-30.
 <a href="http://conferences.oreillynet.com/cs/os2004/create/e_sess">Submit</a>
 your PHP-related talks and tutorials until the February 9 deadline.
</p>

<hr />

<?php news_image("http://www.phparch.com/cruise", "phpcruise.png", "php|cruise"); ?>

<h1>php|cruise deadline set for February 15th</h1>

<p>
 <span class="newsdate">[16-Jan-2004]</span>
 The organizers of the <a 
 href="http://www.phparch.com/cruise">php|cruise</a> conference (March 
 1st through March 5th, 2004) have announced that February 15th will be 
 the deadline to <a href="http://www.phparch.com/cruise/signup.php">sign 
 up for the event</a>. php|cruise features over 30 sessions, covering 
 material from beginner to advanced level, and takes place onboard a 
 cruise ship bound for the Bahamas islands.
</p>

<hr />

<?php news_image("http://www.pawscon.com/", "paws_small.jpg", "PHP and Web Standards Conference - UK 2004"); ?>

<h1>PHP and Web Standards Conference - UK 2004</h1>
<p>
 <span class="newsdate">[22-Dec-2003]</span>
 The PaWS Group is pleased to announce the first ever UK <a
 href="http://www.pawscon.com">PHP and Web Standards Conference</a>.
 PaWS Con will cover using PHP and Web Standards separately and in
 conjunction with each other. The conference will take place
 from February 20th - 24th 2004.
</p>
<p>
 The <a href="http://www.pawscon.com/speakers">Call for Papers</a> has
 been announced with a deadline of January 17th.
 <a href="http://www.pawscon.com/register">Pre-Registration</a> for
 early-bird savers is now also open, so register to earn your
 discount and provide PaWS with valuable feedback.
</p>

<hr />

<?php news_image("http://vancouver.php.net/", "vancouver_conference_2004.gif", "Vancouver PHP Conference 2004"); ?>

<h1>Vancouver PHP Conference 2004</h1>
<p>
 <span class="newsdate">[22-Dec-2003]</span>
 The Vancouver PHP Users Association presents <a href="http://vancouver.php.net/">The PHP Vancouver Conference</a>
 on January 22-23, a professional and technical conference focused on the PHP scripting language.
 The goal of this conference is to bring together some of the world's leading PHP developers and
 business professionals to share their experience with both students and PHP professionals in a series of talks.
</p>

<hr />

<h1>PHP Community Site Project Announced</h1>
<p>
 <span class="newsdate">[18-Dec-2003]</span>
 Members of the PHP community are <a href="http://shiflett.org/archive/19">seeking
 volunteers</a> to help develop the first Web site that is created both by
 the community and for the community. The features of this project will be
 driven by the needs and desires of the community as much as possible and
 may include such things as blogs, news, FAQs, articles, links, and tutorials.
</p>
 <p>
 If you would like to contribute, please <a
 href="http://shiflett.org/contact">contact Chris Shiflett</a>, who is
 coordinating this project. There is a need for every type of contributor,
 including developers, translators, administrators, designers, writers, and
 advocates.
</p>

<hr />

<?php news_image("http://www.php-mag.net/", "php-mag.gif", "International PHP Magazine"); ?>

<h1>PHP Magazine in PDF Format</h1>
<p>
 <span class="newsdate">[15-Dec-2003]</span>
 <a href="http://software-support.biz/en">Software & Support Media</a>,
 producers of the <a href="http://www.phpconference.de/2003/index_en.php">International
 PHP Conference</a>, are pleased to announce a new monthly version of their
 print publication, the "<a href="http://www.php-mag.net/">International
 PHP Magazine</a>", published in PDF format and distributed
 electronically. The first issue is available for free on
 <a href="http://www.php-mag.net/">the magazine's website</a>.
</p>

<hr />

<?php news_image("http://conf.phpquebec.org/index.html", "conference_php_quebec.gif", "Conference PHP Quebec"); ?>

<h1>First PHP dedicated DVD released!</h1>
<p>
 <span class="newsdate">[13-Dec-2003]</span>
 The PHP Qu&eacute;bec is pleased to announce the immediate availability
 of PHP Qu&eacute;bec DVD. Over 6 hours of conferences, recorded in
 Montr&eacute;al, in March 2003. DVD is subtitled in English and French,
 making legendary sessions from Rasmus and Zeev available anywhere 
 in the world. 
</p>
<p> 
 This DVD makes a nice christmas present for every PHP enthusiast.
 Available in
 <a href="http://conf.phpquebec.org/main.php/en/dvd2003/main">English</a> or 
 <a href="http://conf.phpquebec.org/main.php/fr/dvd2003/main">French</a>.
</p>

<hr />

<?php news_image("http://mysql.com/events/uc2004", "mysqluc2004.png", "MySQL User Conference 2004"); ?>

<h1>Call for Participation: MySQL User Conference 2004</h1>
<p>
 <span class="newsdate">[12-Dec-2003]</span>
 The <a href="http://mysql.com/events/uc2004/speakers.html">Call
 for Participation</a> for the 2004 MySQL User Conference is
 now open. MySQL is looking for sessions that speak to your peers:
 practical, pragmatic and clueful presentations that focus on how
 you solved problems in a demanding or unique technical environment.
 Additionally, the conference is looking for solid proposals for
 Bird-of-a-Feather (BoF) sessions and Lightning Talks.
</p>
<p>
 The call for papers closes on January 14th. The call for BoFs and
 lightning talks closes on February 14th. The conference will take
 place on April 14th to 16th in Orlando, Florida, USA.
</p>

<hr />

<?php news_image("http://webdevmagazine.co.uk/conf/index_n.php", "bulgaria_2004.gif", "First Bulgarian PHP conference"); ?>

<h1>First Bulgarian and Second Hungarian PHP Conference</h1>
<p>
 <span class="newsdate">[01-Dec-2003]</span>
 The <a href="http://webdevmagazine.co.uk/conf/index_n.php">First Bulgarian
 PHP conference</a> will be held within the framework of the 2004 Web Technology
 Conference in Sofia in March. The goal of the meeting is to discuss the trends and
 to popularize PHP among the business, education and services sectors. The organizers
 welcome proposals for sessions and company presentations.
</p>

<?php news_image("http://www.phpconf.hu/", "hu_conf.gif", "Second Hungarian PHP conference"); ?>

<p>
 Also coming in March 2004 is the <a href="http://www.phpconf.hu/">Second Hungarian
 PHP Conference</a> building on last year's successful event. The Call For Papers is
 open for the conference, speakers are welcome to hold sessions and workshops ranging
 from PHP internals to web standard compliance. The event is exclusively in Hungarian.
</p>

<hr />

<p class="center"><a href="/news-2003.php">News Archive</a></p>

<?php commonFooter(); ?>
