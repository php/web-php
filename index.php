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

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<hr />
<?php news_image("http://www.phparch.com/works/", "phpworks.png", "php|works / db|works 2006"); ?>
<h1>php/db|works 2006 Schedule Now Online</h1>
<p>
 <span class="newsdate">[29-June-2006]</span>
 The upcoming premier PHP conference, <a href="http://www.phparch.com/works">php|works/db|works</a>,
 will take place in Toronto, Canada, September 12-15, 2006.
</p>
<p>
 The conference, as always, will feature excellent speakers from many aspects of PHP development,
 including Rasmus Lerdorf, Wez Furlong, Sara Golemon, Sebastian Bergmann, Chris Shiflett and more!
 Be sure to check out the
 <a href="http://hades.phparch.com/ceres/public/page/index.php/works::schedule">entire lineup</a>,
 including special evening social events with top-notch prizes.
</p>

<hr />
<?php news_image("http://dcphpconference.com/", "dcphpconference.png", "2006 DC PHP Conference - Call for Papers"); ?>

<h1>2006 DC PHP Conference - Call for Papers</h1>
<p>
 <span class="newsdate">[13-June-2006]</span>
<a href="http://dcphpconference.com/">DC PHP Conference</a> invites technology experts from the federal government, 
local community, and the non-profit sector to participate in a premiere forum for PHP's vast number of users.
Present your technical concepts, cutting edge applications, or business applications for an opportunity 
to showcase your ideas in the PHP community.
</p>
<p>
Your participation will make this conference a success. The conference selection committee requests that 
you submit an abstract for consideration. <a href="http://dcphpconference.com/callforpapers.php">All abstracts</a> submitted on or before July 7th, 2006 will be considered.
</p>

<hr />

<?php news_image("http://code.google.com/soc/php/about.html", "google_soc_2006_128x53.gif", "Google Summer of Code 2006"); ?>

<h1>Welcome Summer of Code 2006 Students</h1>
<p>
 <span class="newsdate">[26-May-2006]</span>
PHP is very pleased to announce that seven students have been chosen for the
Google 'Summer of Code'. Through this project, Google provides student developers with 
a stipend to create new open source programs or to help currently established 
projects like PHP. The students are each mentored by members of our community,
who will look after the students and their projects step by step.
</p>
<p>
The students, their projects and their assigned mentors can be viewed
<a href="http://code.google.com/soc/php/about.html">here</a>.
</p>

<hr />

<h1>Zend/PHP Conference 2006 - Call for Papers</h1>
<p>
 <span class="newsdate">[24-May-2006]</span>
 Zend Technologies invites you to participate in the <a href="http://zendcon06.kbconferences.com/">Zend/PHP Conference
 2006</a>. Share your ideas with fellow colleagues in the PHP community. Present
 your technical concepts, cutting edge applications, or business
 applications. Your participation will help make this conference a success.
</p>
<p>
 Session tracks include:
</p>
<ul>
 <li>
  PHP and Web Services - Architecting and Building Service Based
  Applications:  From SOA to Mashups
 </li>
 <li>
  PHP Development - Best Practices and Pivotal Skills for PHP
  Development
 </li>
 <li>
  PHP Management - Operating Business Critical PHP Applications
 </li>
</ul>
<p>
 The conference selection committee will consider all abstracts submitted on
 or before June 30th, 2006. Notifications will be made by August 1st, 2006.
 Complete details available at the <a href="http://devzone.zend.com/node/view/id/89">Zend Developer Zone</a>
</p>

<hr />

<?php news_image("http://www.phparch.com/works/", "phpworks.png", "php|works / db|works 2006"); ?>

<h1>php|works / db|works 2006 - Call for Papers</h1>
<p>
 <span class="newsdate">[16-May-2006]</span>
 php|architect magazine is proud to announce
 <a href="http://www.phparch.com/works">php|works / db|works 2006</a>, a
 three-day conference (plus one day of exclusive in-depth seminars) dedicated
 to PHP driven software development. This year's conference will take
 place on Sept. 12-15, 2006, in Toronto, Canada with September 12th set aside
 for a set of in-depth seminars.
</p>
<p>
 If you've got unique insight into PHP, or have used PHP to connect to
 high-end datastores, php|architect wants to hear from you.
</p>
<p>
 For more information, please visit the
 <a href="http://hades.phparch.com/ceres/public/page/index.php/works::cfp">
 Call for Papers</a> page,  and submit your ideas. The deadline is June 5,
 2006.
</p>

<hr />

<?php news_image("http://www.afup.org/", "afup2006.jpg", "AFUP Paris 2006"); ?>

<h1>Call to speaker for Paris "Forum PHP 2006"</h1>
<p>
 <span class="newsdate">[17-May-2006]</span>
The <a href="http://www.afup.org/">AFUP, Association Française des Utilisateurs de PHP</a>, 
is proud to announce the upcoming conference "Forum PHP 2006". 
For this unique event in France, we are looking for the best French 
speaking experts, who want to share their know-how and enthusiasm. 
This two day conference features one technical day, with the most 
advanced PHP techniques and a business day, with case studies 
and examples of successful projects.
</p>
<p>
Date and location: the "Forum PHP 2006" will take place in Paris, 
at the SNHF (Société Nationale d'Horticulture), on Thursday and Friday 
the 9th and 10th of November 2006.
</p>

<hr />

<?php news_image("http://www.nyphpcon.com/", "NYPHPCon06.gif", "NYPHPCon 2006"); ?>

<h1>NYPHPCon 2006 Program Announced</h1>
<p>
 <span class="newsdate">[16-May-2006]</span>
 We are pleased to announce the speaker, tutorial and keynote program for 
 NYPHPCon 2006.  The <a href="http://www.nyphpcon.com">New York PHP 
 Conference &amp; Expo 2006</a> is taking place in New York City, at the 
 historic New Yorker Hotel, June 14-16, 2006.  There will be three full 
 days of sessions, tutorials, exhibits, and networking events.
</p>
<p>
We are also pleased to host the <a href="http://www.nyphpcon.com/mashup.php">
IBM Mashup Contest</a> and <a href="http://www.nyphpcon.com/OraclePHPfest.pdf">
Oracle PHPFest</a>, and a special 
<a href="http://www.nyphpcon.com/conference_glance.php#Training">PHP 
Training package</a> at this event.
</p>
<p>
NYPHPCon 2006 focuses on the The PHP Business Community, with two 
featured parallel tracks plus tutorials: 
<a href="http://www.nyphpcon.com/conference_glance.php#SpeakerSessions">
Business Strategy and Technical Solutions</a>.  Over 400 are expected to attend,
including business and technical professionals from around the world.
</p>

<hr />

<h1>PHP 5.1.4 Released</h1>
<p>
 <span class="newsdate">[04-May-2006]</span>
 A critical bug with $_POST array handling as well as the FastCGI sapi have been discovered in PHP 5.1.3. A new PHP release <a href="/downloads.php">5.1.4</a> is now
 available to address these issues. All PHP users are encouraged to upgrade to this release as soon as possible.
</p>
<p>
Further details about this release can be found in the <a href="/release_5_1_4.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-5.php#5.1.4">PHP 5 ChangeLog</a>.
<br />
<b>The tarballs were updated to include the PEAR's phar file, previously missing from the release.</b>
</p>

<hr />

<h1>PHP 5.1.3 Released</h1>
<p>
 <span class="newsdate">[01-May-2006]</span>
 The PHP development team is proud to announce the release of <a href="/downloads.php">PHP 5.1.3</a>.
 This release combines small number of feature enhancements with a significant amount of bug fixes and resolves a number of security issues.
 Some of the key changes of PHP 5.1.3 include:
</p>
<ul>
<li>Disallow certain characters in session names.</li>
<li>Fixed a buffer overflow inside the wordwrap() function.</li>
<li>Prevent jumps to parent directory via the 2nd parameter of the tempnam() function.</li>
<li>Enforce safe_mode for the source parameter of the copy() function.</li>
<li>Fixed cross-site scripting inside the phpinfo() function.</li>
<li>Fixed offset/length parameter validation inside the substr_compare() function.</li>
<li>Fixed a heap corruption inside the session extension.</li>
<li>Fixed a bug that would allow variable to survive unset().</li>
<li>Fixed a number of crashes in the DOM, SOAP and PDO extensions.</li>
<li>Upgraded bundled PCRE library to version 6.6</li>
<li>The use of the var keyword to declare properties no longer raises a deprecation E_STRICT.</li>
<li>FastCGI interface was completely reimplemented.</li>
<li>Multitude of improvements to the SPL, SimpleXML, GD, CURL and Reflection extensions.</li>
<li>Over 120 various bug fixes.</li>
</ul>
<p>
Further details about this release can be found in the <a href="/release_5_1_3.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-5.php#5.1.3">PHP 5 ChangeLog</a>.
</p>

<hr />

<h1>Summer of Code</h1>
<p>
 <span class="newsdate">[01-May-2006]</span>
 Proposals are now being accepted for
 <a href="http://code.google.com/summerofcode.html">Google's
 Summer of Code program</a>. If you
 <a href="http://code.google.com/soc/studentfaq.html#8">qualify</a>
 and you are interested in working on a PHP-related project this
 summer, please consider applying. We have listed a couple of
 <a href="/ideas.php">ideas</a>, but we would encourage you to
 submit a proposal for any part of PHP you are interested in.
 If your project is accepted we will match you up with a mentor
 and try to provide you with as much support as possible. To
 get started, read the
 <a href="http://code.google.com/soc/studentfaq.html#21">FAQ</a> and
 then go to <a href="http://code.google.com/soc/student_step1.html">Step 1</a>.
</p>

<hr />

<h1>PHP at FrOSCon Call for Papers</h1>
<p>
 <span class="newsdate">[24-Apr-2006]</span>
 The faculty for Computer Science of the college of higher education
 Bonn-Rhein-Sieg celebrates the first conference about free software in
 cooperation with the LUUSA and the <a href="http://froscon.de/">FrOSCon
 e.V. 2006</a>. The event takes place on June 24th/25th in Bonn, Germany
 and is organized completely free and open.
</p>
<p>
 The PHP user groups Köln/Bonn and Dortmund take part in the conference
 and organize a professional PHP track for both days. The
 <a href="http://froscon.phpugdo.de/">call for papers</a>
 is currently open and every interesting talk is highly appreciated.
</p>

<hr />
<h1>PHP Vikinger</h1>
<p>
 <span class="newsdate">[24-Apr-2006]</span>
 The <a href="http://phpvikinger.org/">PHP Vikinger</a> is a community-driven
 PHP event that will be held in
 <a href="http://en.wikipedia.org/wiki/Skien">Skien, Norway</a>
 from June 24th to 25th. Like the famous
 <a href="http://en.wikipedia.org/wiki/Foo_Camp">Foo Camp</a> and
 <a href="http://en.wikipedia.org/wiki/Bar_Camp">Bar Camp</a>, the people
 who attend get to choose and present the sessions at the event.</p>
</p>
<p>
 The event is meant to be affordable: registration is 20 Euros, and
 simple food and a place to sleep are provided for both days of the
 event. The major expense for most attendees will be the cost of
 traveling to Norway. 50
 <a href="http://zak.greant.com/php-vikinger-invitations-emailed">invitations</a>
 have been sent to various PEAR and PHP contributors. General
 registration for the event opens on May 1st.
</p>

<hr />
<h1>International PHP Conference 2006 Call for Papers</h1>
<p>
 <span class="newsdate">[24-Apr-2006]</span>
 The <a href="http://input.entwickler.com/phpconference">Call for Papers for
 the International PHP Conference 2006</a>, 5th to 8th November 2009 at
 Frankfurt/Main Germany, has been started. The Conference features two days
 full with six hours PowerWorkshops and two days main conference with sessions.
</p>
<p>
 The main focus of the conference will be Security through an own security
 track. Like last year, we'll provide a Management Day for businesses
 utilizing PHP or evaluating PHP.
</p>
<p>
 The Call for Papers will end at May, 21th. 
</p>

<hr />
<?php news_image("http://www.phparch.com/tek/", "php_tek_2006.gif", "php|tek 2006"); ?>
<h1>php|tek 2006</h1>
<p>
 <span class="newsdate">[02-Mar-2006]</span>
 The <a href="http://www.phparch.com/tek/">php|tek 2006 conference</a> will take place
 in Orlando, Florida, April 25-28.
</p>
<p>
 This year's speaker roster features many well-known PHP and open-source experts,
 including Rasmus Lerdorf, IBM's Rod Smith and Zend's Andi Gutmans, speaking on a
 variety of topics that highlight PHP's scalability, robustness and future.
</p>

<hr />
<?php news_image("http://conf.phpquebec.com/en/conf2006/", "conference_php_quebec.gif", "PHP Quebec 2006"); ?>

<h1>PHP Quebec 2006</h1>
<p>
 <span class="newsdate">[26-Feb-2006]</span>
The <a href="http://www.phpquebec.com/">PHP Quebec team</a> is pleased to 
announce the 4th edition of the <a href="http://conf.phpquebec.com/en/conf2006/">PHP Quebec Conference</a>. 
This year, the conference will be held at the Montreal Plaza Hotel 
from March 29th to 31st. It features 2 days of technical learning and an 
additional day of workshop. Among the speakers, the well known PHP Experts 
such has Rasmus Lerdorf, Andrei Zmeivski, Derick Rethans and Ilia 
Alshanetsky. 
</p>
<p>
The conference will have three distinct tracks of session: Advanced 
Techniques, Professional Development and Databases. With over 31 
sessions, including workshops, the PHP Québec Conference is great opportunity 
to learn about the latest PHP techniques and professional development 
techniques to help you build high quality PHP software. The conference will 
also present the various storage solutions available such has IBM DB2, 
PostgreSQL, SQLite and MySQL.
</p>
<p>
Early bird pricing are available until march 3rd.<br />
Learn more about this <a 
href="http://conf.phpquebec.com/en/conf2006/">exciting conference</a>.
</p>

<hr />
<?php news_image("http://www.nyphpcon.com/", "NYPHPCon06.gif", "NYPHPCon 2006"); ?>

<h1>NYPHPCon 2006</h1>
<p>
 <span class="newsdate">[02-Feb-2006]</span>
The <a href="http://www.nyphpcon.com">New York PHP Conference &amp; Expo
2006</a> is taking place in New York City, at the historic New Yorker
Hotel, June 14-16, 2006.  There will be three full days of sessions,
tutorials, exhibits, and networking events. </p>
<p>
NYPHPCon 2006 focuses on the The PHP Business Community, with two
featured parallel tracks: <a
href="http://www.nyphpcon.com/conference_glance.php">Business Strategy
and Technical Solutions</a>.  Over 400 are expected to attend, including
business and technical professionals from around the world.
</p>
<p>
We invite everyone - whether technical or non-technical - to participate
in our <a href="http://www.nyphpcon.com/call_for_papers.php">Call For
Papers</a>.
</p>
<p>
An <a
href="http://www.nyphpcon.com/attendee_registration.php">early-bird
discount is available until March 1st</a>.
</p>

<hr />
<?php news_image("http://wtconferences.com/", "webtech2006.png", "WebTech 2006"); ?>

<h1>Third Bulgarian PHP Conference</h1>
<p>
 <span class="newsdate">[19-Jan-2006]</span>
 The third <a href="http://wtconferences.com/">Web Technology conference
 and Expo</a> in Bulgaria will be held in June 2006 in the city
 of Sofia. Within its framework, the Third Bulgarian
 PHP Conference will be held. The event will take place on
 the 30th of June and the 1st of July at the conference area
 of the Kempinski Hotel Zografski.
</p>
<p>
 The purpose of this meeting is to discuss the new tendencies
 in this direction and to popularize the internet technologies
 in the spheres of business, education, and services. The
 range of subjects includes technologies like PHP, Perl,
 business systems through web, education through the
 internet, and others.
</p>

<hr />

<h1>FrOSCon 2006 - Call for Papers</h1>
<p>
 <span class="newsdate">[19-Jan-2006]</span>
 The first Free and Open Source Conference "FrOSCon" takes place on 24th
 and 25th June 2006 in St. Augustin, near Bonn, Germany. Organized by a
 commited team, it aims to become a significant event for free software
 in the Rhineland. The conference is hosted by the faculty of computer
 science of the University of Applied Sciences Bonn-Rhein-Sieg in
 collaboration with the student body and the Linux/Unix User Group St.
 Augustin.
</p>
<p>
 In a <a href="http://www.froscon.org/wiki/CallforPapers">Call for
 Papers</a>, the organizers ask for submission of
 contributions. A broad variety of topics concerning free and open
 source software is desired. Particularly welcome are contributions about
 programming languages, free software on the desktop, security, systems
 administration and networks. Aspects of free software in business and
 industry are also a focus of the conference.
</p>
<p>
 Contributions can be submitted in English or German and should summarize
 the intended talk concisely and succinctly; talks should range from 45
 to 60 minutes in length. Deadline for submission is 15th March 2006.
</p>

<hr />
<?php news_image("http://www.phpconference.co.uk/", "ukphp2006.png", "UK PHP Conference 2006"); ?>

<h1>UK PHP Conference 2006</h1>
<p>
 <span class="newsdate">[17-Jan-2006]</span>
 The first <a href="http://www.phpconference.co.uk/">UK PHP Conference</a>
 is going to be held on February 10th 2006, organized by the
 <a href="http://www.phplondon.org/">PHP London user group</a>.
 This is a one day event at South Bank University, plus networking events.
 The list of speakers: Derick Rethans, Pawel Kozlowski, Harry Fuecks,
 Chris Kunz and Matt Zandstra. Not bad for 50 quid.
</p>

<hr />
<h1>PHP 4.4.2 Released</h1>
<p>
 <span class="newsdate">[13-Jan-2006]</span>
 The PHP development team is proud to announce the release of <a href="/downloads.php">PHP 4.4.2</a>.
 This release address a few small security issues, and also corrects some
 regressions that occurred in PHP 4.4.1.  All PHP 4 users are encouraged to
 upgrade to this release. Some of the key changes of PHP 4.4.2 include:
</p>
<ul>
<li>HTTP Response Splitting has been addressed in the header() function.</li>
<li>An XSS problem inside the error reporting functionality has been removed.</li>
<li>Apache 2 regression with sub-request handling on non-Linux systems has been fixed.</li>
<li>A regression with the key() and current() functions have been fixed.</li>
<li>Over 30 various bug fixes.</li>
</ul>
<p>
Further details about this release can be found in the <a href="/release_4_4_2.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-4.php#4.4.2">PHP 4 ChangeLog</a>.
</p>

<hr />
<h1>PHP 5.1.2 Released</h1>
<p>
 <span class="newsdate">[12-Jan-2006]</span>
 The PHP development team is proud to announce the release of <a href="/downloads.php">PHP 5.1.2</a>.
 This release combines small feature enhancements with a fair number of
 bug fixes and addresses three security issues. All PHP 5 users are encouraged to
 upgrade to this release. Some of the key changes of PHP 5.1.2 include:
</p>
<ul>
<li>HTTP Response Splitting has been addressed in ext/session and in the header() function.</li>
<li>Fixed format string vulnerability in ext/mysqli.</li>
<li>Fixed possible cross-site scripting problems in certain error conditions.</li>
<li>Hash &amp; XMLWriter extensions added and enabled by default.</li>
<li>Upgraded OCI8 extension.</li>
<li>Over 85 various bug fixes.</li>
</ul>
<p>
Further details about this release can be found in the <a href="/release_5_1_2.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-5.php#5.1.2">PHP 5 ChangeLog</a>.
</p>

<hr />

<p class="center"><a href="/news-2005.php">News Archive</a></p>

<?php commonFooter(); ?>
