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
 include practical talks on PHP5, regular expressions, multilingual
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

<hr />

<?php news_image("http://www.zend.com/php5/contest/", "zendtech_logo.gif", "Zend Technologies"); ?>

<h1>Zend's PHP 5 Coding Contest</h1>

<p>
 <span class="newsdate">[06-Jun-2004]</span>
 <a href="http://www.zend.com/php5/contest/">Zend's
 PHP 5 Coding Contest</a> is underway and accepting submissions. 
 This is every developer's chance to flaunt their PHP 5 skills
 and let their application shine!
</p>

<p>
 Applications will be rated both by your peers and by a panel of
 judges assembled from among the most known and well-respected
 names in the PHP community. 
</p>

<p>
 Lots of <a href="http://www.zend.com/php5/contest/prizes.php">prizes</a>
 are available!
</p>

<hr />

<?php news_image("/downloads.php", "php-version4.gif", "PHP 4"); ?>

<h1>PHP 4.3.7 released!</h1>
<p>
 <span class="newsdate">[03-Jun-2004]</span>
 PHP Development Team is proud to announce the release of PHP
 <a href="/downloads.php">PHP 4.3.7</a>. This is a maintenance release
 that in addition to several non-critical bug fixes, addresses an input
 validation vulnerability in <code>escapeshellcmd()</code> and
 <code>escapeshellarg()</code> functions on the Windows platform.
 Users of PHP on Windows are encouraged to upgrade to this release
 as soon as possible.
</p>

<p>
 All in all this release fixes over 30 bugs that have been discovered
 and resolved since the 4.3.6 release. For a full list of changes in
 PHP 4.3.7, see the <a href="/ChangeLog-4.php#4.3.7">ChangeLog</a>.
</p>

<hr />

<?php news_image("http://www.afup.org/article.php3?id_article=242", "afup2004.jpg", "AFUP"); ?>
<h1>Call to speaker for Paris Forum 2004</h1>
<p>
 <span class="newsdate">[17-May-2004]</span>
 The <a href="http://www.afup.org/index.php">AFUP</a>, Association Fran&ccedil;aise
 des Utilisateurs de PHP, is proud to announce the forum PHP 2004. For this 
 unique event in France, we are looking for the best French speaking experts, 
 who want to share their know-how and enthusiasm. 
</p>
<p>
 The forum PHP features 2 days, with distinct themas:
 <ul>
  <li>Technical day, with the most advanced PHP technics</li>
  <li>Business day, with user cases and successful projects</li>
 </ul>
</p>
<p>
 The <a href="http://www.afup.org/article.php3?id_article=242">forum PHP 2004</a> 
 will take place in Paris, at the FIAP Jean Monnet, on thursday 25th and friday 
 26th, november 2004.<br />
 More information in French at this <a 
 href="http://www.afup.org/article.php3?id_article=242">URL</a>.
</p>

<hr />

<?php news_image("/downloads.php#5", "php-version5.gif", "PHP 5"); ?>
<h1>PHP 5 Release Candidate 2 Released!</h1>
<p>
 <span class="newsdate">[25-Apr-2004]</span>
 The <a href="/downloads.php#v5">second Release Candidate of PHP 5</a> is now
 available! This mostly bug fix release improves PHP 5's stability and irons out
 some of the remaining issues before PHP 5 can be deemed release quality. Note
 that it is still <i>not</i> recommended for mission-critical use but people are
 encouraged to start playing with it and report any problems.
</p>

<p>Key changes since Release Candidate 1 include:</p>

<ul>
 <li>
  The Zend Engine I compatibility mode (zend.ze1_compatibility_mode) has been
  re-implemented to more accurately support PHP 4's object auto-clone behavior.
 </li>
 <li>
  All object-oriented extensions except for MySQLi have moved to studlyCaps.
  This includes SQLite, SOAP, Reflection API, Ming and others.
 </li>
 <li>
  Implementing an interfaces and/or abstract method with the wrong prototype is
  now a fatal error. For backwards compatibility, re-implementing regular methods
  with the wrong prototype will only result in an E_STRICT warning.
 </li>
 <li>
  Features as described in the Release Candidate 1
  <a href="/index.php#5.0.0RC1">release announcement</a>
 </li>
 <li>And lots more...</li>
</ul>

<p>
 For changes since Release Candidate 1, please consult the
 <a href="/ChangeLog-5.php#5.0.0RC2">ChangeLog</a>.
</p>

<hr />

<h1>Second PHP Marathon announced</h1>
<p>
 <span class="newsdate">[06-Apr-2004]</span>
 DotGeek.org is proud to announce the <a href="http://marathon.dotgeek.org/">second
 PHP Programming Marathon</a> to be held on the 24 April 2004. Instead of receiving the
 problems and composing your solutions offline, it all takes place online and within
 a specific timeframe. The Marathon is kindly sponsored by Zend Technologies and will
 now feature a problem on PHP 5. Participation is free of charge.
</p>

<hr />

<?php news_image("/downloads.php#5", "php-version5.gif", "PHP 5"); ?>
<a name="5.0.0RC1"></a>
<h1>PHP 5 Release Candidate 1 Released!</h1>
<p>
 <span class="newsdate">[18-Mar-2004]</span>
 The <a href="/downloads.php#v5">first Release Candidate of PHP 5</a> is finally
 here!  The move from Beta stage to RC stage means that PHP 5 is now feature
 complete, and is quite stable - stable enough for everyone to start playing
 with.  Note that it is still <i>not</i> recommended for mission-critical
 use.
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
  A brand new built-in SOAP extension for interoperability with Web Services.
 </li>
 <li>
  A new SimpleXML extension for easily accessing and manipulating XML as
  PHP objects. It can also interface with the DOM extension and vice-versa.
 </li>
 <li>
  Streams have been greatly improved, including the ability to access
  low-level socket operations on streams.
 </li>
 <li>And lots more...</li>
</ul>

<p>
 For changes since Beta 4, please consult the
 <a href="/ChangeLog-5.php#5.0.0RC1">ChangeLog</a>.
</p>

<hr />

<h1>Spanish PHP Mailing List Now at PHP.net</h1>
<p>
 <span class="newsdate">[29-Feb-2004]</span>
 The Spanish PHP mailing list was relocated to our list server.
 If you would like to subscribe to the list, you can do it via our
 <a href="mailing-lists.php">mailing lists page</a>. To read
 the archives, please see <a href="http://news.php.net/">our
 news server</a>.
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

<p class="center"><a href="/news-2003.php">News Archive</a></p>

<?php commonFooter(); ?>
