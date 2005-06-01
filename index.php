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
 <li><a href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
 <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
 <li><a href="http://ez.no/">eZ systems</a> / <a href="http://www.hit.no/english">HiT</a></li>
 <li><a href="http://www.osuosl.org">OSU Open Source Lab</a></li>
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

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<?php news_image("http://www.afup.org/", "afup2005.jpg", "AFUP"); ?>
<h1>Forum AFUP 2005 Call for Papers</h1>
<p>
<span class="newsdate">[1-Jun-2005]</span>
The <a href="http://www.afup.org/index.php">AFUP</a>, Association Française des Utilisateurs de PHP, is proud to announce the forum PHP 2005. For this unique event in France, we are looking for the best French speaking experts, who want to share their know-how and enthusiasm. The forum PHP features 2 days, with distinct themas&nbsp;:
<UL>
<li>Technical day, with the most advanced PHP technics</li>
<li>Business day, with user cases and sucessful projects</li>
</ul>

The <a href="http://www.afup.org/article.php3?id_article=282">forum PHP 2005</a> will take place in Paris, at the SNH (Société Nationale d'Orthiculture), on thursday 8th and friday 9th, November 2005.
<hr />


<h1>CfP PHP Track - (AUUG) Annual Conference</h1>
<p>
 <span class="newsdate">[20-May-2005]</span>
 For the first time the AUUG will incorporate a PHP Track as part of its
 annual conference in Sydney, Australia. For this
 track we seek tutorials and presentations. Tutorials are on October 16 to 18
 and presentations on October 19 to 21. For information on how to submit
 a proposal we kindly point you to our CfP which you can find on <a
 href="http://auug.org.au/events/2005/auug2005/cfp.html">our website</a>. The
 deadline for proposals is May 27. In case you want more information, email
 <a href="mailto:derick&#64;php.net">Derick</a> or <a
 href="mailto:arjen&#64;mysql.com">Arjen</a>.
</p>
<hr />

<?php news_image("http://www.phpwest.com/", "phpwest.gif", "PHP West Conferences"); ?> 

<h1>PHP West Security Conference in Vancouver, BC</h1>
<p>
 <span class="newsDate">[11-May-2005]</span>
 <a href="http://www.osevents.com"><img src="http://www.osevents.com/themes/osevents_v1/images/header/logo-osevents.gif" border="0" align="right" /></a> <a href="http://www.osevents.com">Open Source Events</a> is hosting their second conference on June 11th, 2005 in Vancouver, British Columbia. The conference will focus on PHP and Open Source Security. Featured talks will be presented by Bruce Perens, Chris Shiflett, Christian Wenz, Tom Robinson and Chris Hubbard.
</p>
<p>
The conference is a single day - one track event where attendees will receive a free t-shirt, lunch, and full access to the full day of talks with the <a href="http://store.osevents.com/product_info.php?products_id=1">purchase of their ticket</a>. A number of free prizes will be given away at the closing ceremonies.
</p>
<hr />

<?php news_image("http://conf.phpquebec.org/en/cdrom2005/", "cdrom_phpquebec_2005.gif", "PHP Québec CD ROM 2005"); ?> 

<h1>PHP Applications gathering</h1>
<p>
 <span class="newsdate">[20-Apr-2005]</span>
The PHP Québec Conference team is looking for the best software developed
with PHP, MySQL and Apache. Each proposal <a href="http://conf.phpquebec.org/en/cdrom2005/">received</a>
by  April 29th 29 will be will be reviewed by an experts and members of the PHP Québec community.
</p>
<p>
The most useful software will be included on the 2005 PHP Québec
Conference CDROM along with over 25 hours of conference which where given
by the leaders behind PHP, MySQL and Apache, as well as regional and
international experts at the 2005 PHP Québec conference.
</p>
<hr />

<h1>PHP 5.0.4 and 4.3.11 Released</h1>
<p>
 <span class="newsdate">[31-Mar-2005]</span>
  The PHP Development Team would like to announce the immediate release of 
  <a href="/downloads.php#v5">PHP 5.0.4</a> and <a href="/downloads.php#v4">4.3.11</a>. 
  These are maintenance releases that in addition to non-critical bug fixes 
  address several security issues. All Users of PHP are strongly 
  encouraged to upgrade to one of these releases as soon as possible.
</p>

<p>
 For changes in PHP 5.0.4 since PHP 5.0.3, please consult the
 <a href="/ChangeLog-5.php#5.0.4">PHP 5 ChangeLog</a>.
 For changes in PHP 4.3.11 since PHP 4.3.10, please consult the
 <a href="/ChangeLog-4.php#4.3.11">PHP 4 ChangeLog</a>.
</p>

<hr />


<h1>International PHP Conference 2005 Spring Edition</h1>
<p>
 <span class="newsdate">[23-Mar-2005]</span>
 The <a href="http://www.phpconference.com/">International PHP
 Conference 2005 Spring Edition</a> will take
 place from May 2, 2005 to May 4, 2005. The Conference features
 a PowerWorkshop day on May 2 with PHP/MySQL Best Practices,
 XML/WebServices with PHP 5, Rapid Application Development and a
 PHP Starter Workshop for Beginners. The main Conference days
 will include sessions on PHP Internals, XML, Databases, Migration
 to PHP 5 and others. Early bird discounts are available until April
 1, 2005.
</p>
<hr />

<?php news_image("http://zend.kbconferences.com/", "zendphp_conf.gif", "Zend/PHP Conference & Expo"); ?> 
<h1>Call for Speakers: Zend/PHP Conference & Expo 2005</h1>
<p>
 <span class="newsdate">[17-Mar-2005]</span>
 Zend Technologies and KB Conferences proudly announce the
 <a href="http://zend.kbconferences.com/">Zend/PHP Conference & Expo 2005</a> 
 taking place at the Hyatt Regency San Francisco
 Airport on October 18-21, 2005.  The theme of the conference will be
 &quot;Power Your Business With PHP&quot; and will feature sessions
 in the following four tracks:  The Business Case for PHP; Developing,
 Deploying and Managing Large-Scale PHP Applications; Integrating
 PHP with the Enterprise (including Web Services and XML); and PHP
 Resources: Tools, Libraries and Techniquies.
</p> 
 
<p>
 We <a href="http://zend.kbconferences.com/call.php">invite interested speakers</a> 
 to submit session proposals between
 now and July 15, 2005.  Visit the conference website for more
 information about the conference or if you are interested in
 submitting a session proposal.
</p>
<hr />


<h1>PHP Québec 2005: PHP - MySQL - Apache</h1>

<p>
 <span class="newsdate">[15-Mar-2005]</span>
 PHP Québec is proud to present an extended conference in Montréal, Québec,
 covering the latest innovations in PHP, MySQL and Apache. From March 30th
 until April 1st, major AMP contributors will talk about Security, Web Services,
 PHP 5 and great achievements with PHP in North America. The 4 tracks 
 are available at <a
 href="http://conf.phpquebec.com/en/conf2005/horaire">the PHP Québec site</a>.
</p>
<p>
 PHP Certification exams by Zend are included with every admission ticket to
 the conference. The certification center will also provide MySQL and Linux 
 certification from MySQL AB, LPI and Savoir Faire Linux. The 
 <a href="http://conf.phpquebec.com/en/conf2005/certifications">examination center</a>
 is open to everyone.
</p>
<hr />

<h1>PHP &amp; PEAR at FOSDEM 2005</h1>

<p>
 <span class="newsdate">[23-Feb-2005]</span>
 This year PHP &amp; PEAR have a devroom at FOSDEM 2005 held in Brussels.  On
 Sunday, 27th of February, several developers will talk about PHP &amp; PEAR.
 Topics include Xdebug, eZ publish, SimpleTest, Horde and PEAR. A full schedule
 can be found on the <a
 href="http://fosdem.org/2005/index/dev_room_phppear/schedule">FOSDEM's
 site</a>.
</p>
<p>
 Along with giving the scheduled talks, the developers will be available during
 the course of the day to chat with. The devroom is also open to all who want a
 place to code and/or relax.
</p>
<p>
 We hope to see you there !
</p>

<hr />

<h1>php|symphony</h1>

<p>
 <span class="newsdate">[10-Feb-2005]</span>
 php|architect magazine has introduced <a
 href="http://www.phparch.com/shop_dept.php?itemid=12">php|symphony</a>, an
 ongoing series of online talks given by some of today's leaders in the PHP
 world. Each talk in the series features an in-depth discussion on a specific
 topic, such as security, enterprise development and so on. Talks are delivered
 entirely online using an interactive system compatible with most OSs and
 browsers.
</p>
<p>
 The series will start on February 23rd with a talk by security expert Chris
 Shiflett titled "Mastering PHP Security".
</p>

<hr />

<h1>ApacheCon Europe Call for Papers</h1>
<p>
 <span class="newsdate">[08-Feb-2005]</span>
 ApacheCon Europe will be held from July 18th to July 22th in Stuttgart,
 Germany. The conference organizers are looking for speakers willing to have a
 talk of any of the topics mentioned on the <a
 href="http://www.apachecon.com/2005/EU/index.html">website</a>.  If you think
 that you have material for this conference and want to have a talk there, you
 can submit a paper <a href="http://apachecon.com/html/login.html">here</a>.
</p>

<hr />

<?php news_image("http://phpsec.org/", "phpsc-logo.gif", "PHPSC Logo"); ?>

<h1>PHP Security Consortium</h1>
<p>
 <span class="newsdate">[31-Jan-2005]</span>
 An international group of PHP experts today announced the official launch
 of the <a href="http://phpsec.org/">PHP Security Consortium</a> (PHPSC), a
 group whose mission is to promote secure programming practices within the
 PHP community through education and exposition while maintaining high
 ethical standards.
</p>
<p>
 Members of the PHPSC seek to educate PHP developers about security through
 a variety of resources, including documentation, tools, and standards. In
 addition to their educational efforts, the PHPSC engages in exploratory
 and experimental research in order to develop and promote standards of
 best practice for PHP application development.
</p>

<hr />

<h1>O'Reilly Open Source Convention 2005</h1>

<p>
 <span class="newsdate">[27-Jan-2005]</span>
 Circle August 1-5 on your calendar and join in at the O'Reilly
 Open Source Convention in beautiful Portland, Oregon. OSCON 2005
 will be at the Oregon Convention Center, where there will be
 tutorials, sessions, parties, BOFs, and a huge exhibit
 hall. The <a href="http://conferences.oreillynet.com/os2005/">Call
 for Proposals</a> is now open, and registration and hotel
 information will be available soon. Get the details as soon
 as they're available by signing up for the <a
 href="http://www.oreillynet.com/cs/nl/home#conferences">OSCON
 newsletter</a>.
</p>
<p>
 You're invited to submit a proposal to lead tutorials and sessions.
 Visit the submissions page for all the details on tracks and proposal
 guidelines. The committee is particularly interested in talks on PHP
 5: migration, new developments, security, case studies, large-scale
 applications development, and best practices. Proposals are due no
 later than February 13, 2005.
</p>

<hr />

<?php news_image("http://phpconf.hu/2005/", "hu_conf.gif", "PHPConf.hu"); ?>

<h1>Third Hungarian PHP Conference</h1>

<p>
 <span class="newsdate">[17-Jan-2005]</span>
 The Web Application Development Division of the John von Neumann Computer
 Society is proud to present the <a href="http://phpconf.hu/2005/">Third
 Hungarian PHP Conference</a> which will take place in Budapest, on Saturday
 March 12th, sponsored by several international and local companies.
 The conference offers an entirely free one day activity with several
 presentations addressing basic and advanced topics as well, mostly in
 Hungarian. This year, the organizers are also happy to welcome Derick
 Rethans and Lukas Smith speaking. Continuing on the success of previous
 years, a five+five kilobyte-limited PHP 5 contest has been started to
 discover the most talented PHP programmers in the country.
</p>

<hr />

<?php news_image("http://www.phparch.com/tropics", "php_tropics.jpg", "php|tropics"); ?>
<h1>php|tropics</h1>

<p>
 <span class="newsdate">[06-Jan-2005]</span>
 On the heels of last year's php|cruise, this year
 <a href="http://www.phparch.com">php|architect magazine</a> has
 announced <a href="http://www.phparch.com/tropics">php|tropics</a>, a
 5-day conference event that will take place between May 11 and 15, 2005 at the
 Moon Palace All-inclusive Resort in wonderful Cancun, Mexico.
</p>
<p>
 With sessions and hands-on tutorials held by many leading PHP experts,
 including Ilia Alshanetsky, Wez Furlong, Derick Rethans, George Schlossnagle
 and many others, php|tropics is an excellent and inexpensive way to learn lots
 about PHP in a fun-filled and exciting atmosphere. This year, the conference
 also sports "bring your own laptop" tutorials, where the audience is encourage
 to participate in hands-on exercises throughout the event.
</p>
<p>
 A special early-bird discount is in effect until February 28, and attendees
 who sign up before that date receive a $100 discount. In addition,
 php|architect will sponsor and cover all examination fees for conference
 attendees interested in trying their hand at the Zend Certification Exam.
</p>

<hr />

<?php news_image("http://www.php.net/", "php-logo.gif", "Programming Language of 2004"); ?>
<h1>PHP awarded Programming Language of 2004</h1>

<p>
 <span class="newsdate">[05-Jan-2005]</span>
 PHP has been awarded the <a href="http://www.tiobe.com/tpci.htm">Programming
 Language of 2004</a>, according to the TIOBE Programming Community Index.
 This index uses information collected from the popular search engines, and
 are based on the world-wide availability of skilled engineers, courses and
 third party vendors.
</p>
<p>
 Congratulations to us all!
</p>

<hr />

<p class="center"><a href="/news-2004.php">News Archive</a></p>

<?php commonFooter(); ?>
