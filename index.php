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
also present the various storage solutions available such has �IBM DB2, 
PostgreSQL, SQLite and MySQL.
</p>
<p>
Early bird pricing are available until march 3rd.<br />
Learn more about this Learn more about this <a 
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

<ul>
<li>HTTP Response Splitting has been addressed in the header() function.</li>
<li>An XSS problem inside the error reporting functionality has been removed.</li>
<li>Apache 2 regression with sub-request handling on non-Linux systems has been fixed.</li>
<li>A regression with the key() and current() functions have been fixed.</li>
<li>Over 30 various bug fixes.</li>
</ul>

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

<ul>
<li>HTTP Response Splitting has been addressed in ext/session and in the header() function.</li>
<li>Fixed format string vulnerability in ext/mysqli.</li>
<li>Fixed possible cross-site scripting problems in certain error conditions.</li>
<li>Hash &amp; XMLWriter extensions added and enabled by default.</li>
<li>Upgraded OCI8 extension.</li>
<li>Over 85 various bug fixes.</li>
</ul>

Further details about this release can be found in the <a href="/release_5_1_2.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-5.php#5.1.2">PHP 5 ChangeLog</a>.
</p>

<hr />

<?php news_image("http://www.phparch.com/tek/", "php_tek_2006.gif", "php|tek 2006"); ?>

<h1>php|tek 2006 - Call for Papers</h1>
<p>
 <span class="newsdate">[01-Dec-2005]</span>
 php|architect magazine is proud to announce
 <a href="http://www.phparch.com/tek">php|tek 2006</a>, an exclusive three-day
 conference (plus one day of exclusive in-depth seminars) dedicated to the
 world of PHP-driven software development. This year's conference will take
 place from April 26-28, 2006, in Orlando, Florida, with April 25th set aside
 for a set of in-depth seminars.
</p>
<p>
 Do you have unique insight into PHP? Have you written extensions, or
 contributed to the core? Have you deployed PHP in a tough environment, or
 scaled it to handle millions of hits per minute? Have you solved a unique
 problem, and want to share your discovery? Perhaps you've become an expert
 in a specific field? This year, our theme is
 "<code>$build->deploy->scale();</code>", and if you're an expert on any of
 these, php|architect wants <em>you</em> to speak at  php|tek.
</p>
<p>
 For more information, please visit the
 <a href="http://www.phparch.com/tek/tek_cfp.php">Call for Papers</a> page,
 and submit your ideas. The deadline is December 21, 2005.
</p>

<hr />

<h1>PHP 5.1.1 Released</h1>
<p>
 <span class="newsdate">[28-Nov-2005]</span>
 The PHP Development Team would like to announce the immediate release of <a href="/downloads.php">PHP 5.1.1</a>.<br />
 This is a regression correction release aimed at addressing several issues introduced by PHP 5.1.0, the core changes as follows: 
<ul>
<li>Native date class is withdrawn to prevent namespace conflict with PEAR's date package.</li>
<li>Fixed fatal parse error when the last line of the script is a PHP comment.</li>
<li>eval() hangs when the code being evaluated ends with a comment.</li>
<li>Usage of \{$var} in PHP 5.1.0 resulted in the output of {$var} instead of the $var variable's value enclosed in {}.</li>
<li>Fixed inconsistency in the format of PHP_AUTH_DIGEST between Apache 1 and 2 sapis.</li>
<li>Improved safe_mode/open_basedir checks inside the cURL extension.</li>
</ul>

The complete details about all of the changes can be found in the
<a href="/ChangeLog-5.php#5.1.1">PHP 5 ChangeLog</a>.
</p>

<hr />

<h1>PHP 5.1.0 Released</h1>
<p>
 <span class="newsdate">[24-Nov-2005]</span>
 The PHP development team is proud to announce the release of <a href="/downloads.php#v5">PHP 5.1.0</a>.<br />
 Some of the key features of PHP 5.1.0 include:
<ul>
<li>A complete rewrite of date handling code, with improved timezone support.
<li>Significant performance improvements compared to PHP 5.0.X.
<li>PDO extension is now enabled by default.
<li>Over 30 new functions in various extensions and built-in functionality.
<li>Bundled libraries, PCRE and SQLite upgraded to latest versions.
<li>Over 400 various bug fixes.
<li>PEAR upgraded to version 1.4.5
</ul>

In addition to new features, this release includes a number of important
security fixes and we recommend that all users of PHP 5.0 and early
adopters of PHP 5.1 betas upgrade to this release as soon as possible.
The complete details about all of the changes can be found in the
<a href="/ChangeLog-5.php#5.1.0">PHP 5 ChangeLog</a> and an
<a href="/README_UPGRADE_51.php">upgrading guide</a> is available as well.
</p>

<hr />

<h1>PHP 4.4.1 Released</h1>
<p>
 <span class="newsdate">[31-Oct-2005]</span>
 PHP 4.4.1 is now <a href="/downloads.php#v4">available for download</a>.
 This version is a maintenance release, that contains numerous bug fixes,
 including a number of security fixes related to the overwriting of the GLOBALS
 array. All users of PHP 4.3 and 4.4 are encouraged to upgrade to this version.
</p>
<p>
 The full list of changes in PHP 4.4.1 is available in the
 <a href="/ChangeLog-4.php#4.4.1">PHP 4 ChangeLog</a>.
</p>

<hr />

<?php news_image("http://conf.phpquebec.com/en/conf2006/appel", "conference_php_quebec.gif", "PHP Québec"); ?>

<h1>PHP Québec 2006: call for speakers</h1>
<p>
 <span class="newsdate">[18-Oct-2005]</span>
<a href="http://conf.phpquebec.com/en/conf2006/">PHP Québec</a> is pleased to 
announce the 2006 PHP Québec conference, which will be held between March, 29th
and 31th 2006. We are looking for the best speakers, willing to share their 
experience and skills with professional PHP developers from eastern Canada 
and USA. PHP Québec 2006 features 3 distinct tracks: <ul>
<li>Technical PHP, covering in deep details of PHP techniques. </li>
<li>Professional Development, featuring tools and development methodologies to 
increase productivity.</li>
<li>Databases, covers different databases that can be used with PHP.</li></ul>
Sessions will be held in French or English. For more information, see the <a 
href="http://conf.phpquebec.com/en/conf2006/appel">PHP  Québec</a> website.
</p>

<hr />

<?php news_image("http://www.afup.org/pages/forumphp/", "afup2005.jpg", "Forum PHP"); ?>

<h1>Forum PHP in Paris, November 9 &amp; 10th, 2005</h1>
<p>
 <span class="newsdate">[05-Oct-2005]</span>
 The French <a href="http://www.afup.org/">AFUP association</a>
 is proud to announce the fourth annual PHP meeting in Paris,
 on November 9th and 10th, 2005. Developers and managers will
 gather to meet Rasmus Lerdorf, Wez Furlong and other prominent community experts
 for two days of sessions, packed with
 <a href="http://www.afup.org/pages/forumphp/">enterprise solutions and advanced techniques</a>
 (in French).
</p>

<hr />

<?php news_image("http://zend.kbconferences.com/", "zendphp_conf.gif", "Zend/PHP Conference &amp; Expo"); ?>
<h1>Zend/PHP Conference &amp; Expo 2005 Program Announced</h1>
<p>
 <span class="newsdate">[20-Sep-2005]</span>
 The final program for the Zend / PHP Conference (October 18-21, 2005 in
 San Francisco) 
 <a href="http://zend.kbconferences.com/speakerschedule.php">is now available</a>.
 The conference theme is "Power Your
 Business With PHP" and features keynote addresses from Marc Andreessen,
 Google VP Adam Bosworth, and executives from IBM, Oracle &amp; Intel.
 Featured speakers include Michael Radwin of Yahoo!, Adam Trachtenberg
 of eBay, Joyce Park of Renkoo.com, George Schlossnagle &amp; Wez Furlong
 of OmniTI, and, of course, Zeev Suraski &amp; Andi Gutmans.
</p>
<p>
 In addition to keynotes and sessions, the conference also features tutorials,
 certification, a party continuing the celebration of the 10th Anniversary of
 PHP, and an exhibit hall including companies like Zend, IBM, Oracle,
 Intel, MySQL, Microsoft, eBay/PayPal, Emic Networks, ActiveGrid, ActiveState
 and SpikeSource.  Registration discounts are still available.
</p>

<hr />

<h1>Get Your Pocket PHP Reference and Help Hurricane Relief</h1>
<p>
 <span class="newsdate">[08-Sep-2005]</span>
 php|architect has announced the publication of
 <a href="http://www.phparch.com/rcrs">php|architect's Pocket
 PHP Reference</a>, a handy guide to every function in PHP, inclusive
 of syntax, extension and description. It's a perfect companion
 for all your coding work, perfect for looking up function syntax
 in a pinch&mdash;and its convenient pocket size (5x8") makes it
 unobtrusive and easy to transport.
</p>
<p>
 What's more, however, buying this book will help those affected
 by the recent hurricane disaster: all profits from the sale of
 the Pocket Guide will be donated entirely to the Canadian Red
 Cross' Katrina Relief Fund.
</p>

<hr />

<h1>PHP 5.0.5 Released</h1>
<p>
 <span class="newsdate">[06-Sep-2005]</span>
 PHP 5.0.5 is now <a href="/downloads.php#v5">available for download</a>.
 This version is a maintenance release, that contains numerous bug fixes, including
 security fixes to vulnerabilities found in the XMLRPC package.  All users of PHP
 5.0 are encouraged to upgrade to this version.
</p>
<p>
 The full list of changes in PHP 5.0.5 is available in the
 <a href="/ChangeLog-5.php#5.0.5">PHP 5 ChangeLog</a>.
</p>

<hr />

<?php news_image("http://www.phpconference.com/", "intconf2005fall.gif", "International PHP Conference 2005"); ?>
<h1>International PHP Conference 2005 - Program available</h1>
<p>
 <span class="newsdate">[12-Aug-2005]</span>
 The program for the <a href="http://www.phpconference.com/">International PHP
 Conference</a> is now available. The conference that was one of the first
 events on PHP will take place again in Frankfurt from November 6-9, 2005
 and offers two days with pre conference tutorials as well as two days
 packed with sessions from well known speakers such as Derick Rethans,
 Zak Greant, Ilia Alshanetsky and many more.
</p>
<p>
 A new feature has been added to this year's conference: the Management Day
 where project managers and consultants shine the light on using PHP in
 enterprise-level projects. Conference attendees, including software
 architects, PHP developers, project leaders, and programmers can gain
 strategic information on how to realize their IT projects on-time,
 in-budget. The Management Day is <em>free of charge</em> for attendees
 registering prior to September 30, 2005.
</p>
<p>
 Early Bird Special discounts are available as well until this date, and
 special discounts for students and private persons.
</p>

<hr />

<?php news_image("http://www.phparch.com/phpworks", "php-web-works-logo.gif", "php|works and web|works 2005"); ?>
<h1>web|works and php|works 2005 Program Online</h1>
<p>
 <span class="newsdate">[16-Jul-2005]</span>
 The <a href="http://www.phparch.com/works/schedule.php">full program</a> of
 <a href="http://www.phparch.com/works">php/web|works 2005</a>, a three-day
 conference on PHP and web technologies is available. The event will take
 place in Toronto, Canada, the birthplace of PHP, between September 14 and
 September 16. This year's speakers include Rasmus Lerdorf, Derick
 Rethans, Wez Furlong, Ilia Alshanetsky and many more.
</p>
<p>
 An early-bird <a href="https://www.phparch.com/works/signup.php">special
 discount</a> is in effect until August 1st, and special pricing is
 available for students, member of academia and non-profit organizations.
</p>

<hr />

<h1>PHP 4.4.0 Released</h1>
<p>
 <span class="newsdate">[11-Jul-2005]</span>
 The PHP Development Team would like to announce the immediate release of 
 <a href="/downloads.php#v4">PHP 4.4.0</a>. 
 This is a maintenance release that addresses a serious memory corruption
 problem within PHP concerning references. If references were used in a wrong
 way, PHP could create memory corruptions which would not always surface or
 be visible. The increased middle digit was required because the fix that
 corrected the problem with references changed PHP's internal API, breaking
 binary compatibility with the PHP 4.3.* series. PHP 4.4.0 does not have
 any new features, and is solely a bugfix release; however, it is strongly
 recommended that you read the more detailed release announcement
 <a href="release_4_4_0.php">available here</a> prior to upgrading your
 PHP 4 installation.
</p>
<p>
For changes in PHP 4.4.0 since PHP 4.3.11, please consult the
<a href="/ChangeLog-4.php#4.4.0">PHP 4 ChangeLog</a>.
</p>

<hr />

<h1>PEAR XML_RPC Vulnerability and PHP 4.4.0RC2 release</h1>
<p>
 <span class="newsdate">[01-Jul-2005]</span>
 An easily exploitable security issue was discovered in PEAR XML_RPC &lt;=
 1.3.0.  We recommend that users of this PEAR class immediately upgrade to the
 latest version with:
</p>
<pre>
 pear upgrade XML_RPC
</pre>
<p>
 The same security problem exists in many other XML RPC implementations,
 please check if the installed applications that you use might have a
 similar problem.
</p>
<p>
 The new PEAR XML_RPC package is also bundled with the second release
 candidation of PHP 4.4.0RC2. Besides this new PEAR package there are two
 minor issues fixed since PHP 4.4.0RC1. As the improved reference support
 in PHP 4.4 might show as notices and warnings in your existing
 applications - in cases where PHP formerly just silently ignored this
 and often causing memory corruptions - we also recommend to test PHP
 4.4.0RC2 with your applications. The final release is planned for July
 11th. PHP 4.4.0RC2 can be found <a href="http://qa.php.net/~derick/">here</a>.
</p>

<hr />

<?php news_image("http://zend.kbconferences.com/", "zendphp_conf.gif", "Zend/PHP Conference &amp; Expo"); ?>
<h1>Zend/PHP Conference 2005</h1>
<p>
 <span class="newsdate">[23-Jun-2005]</span>
 The <a href="http://zend.kbconferences.com/">Zend/PHP Conference</a>
 is taking place at the Hyatt Regency San Francisco
 Airport on October 18-21, 2005. The theme of the conference will be
 "Power Your Business With PHP" and will feature sessions in the
 following four tracks: The Business Case for PHP; Developing,
 Deploying and Managing Large-Scale PHP Applications; Integrating PHP
 with the Enterprise (including Web Services and XML); and PHP
 Resources: Tools, Libraries and Techniquies.  Early registration
 discounts are available until August 15, 2005.
</p>
<hr />

<?php news_image("http://www.php.net", "php10thbd.jpg", "PHP 10th anniversary cake"); ?>
<h1>10 years since PHP 1.0 was released!</h1>
<p>
 <span class="newsdate">[08-Jun-2005]</span> 
 <a href="http://groups.google.ch/groups?selm=3r7pgp%24aa1%40ionews.io.org&amp;oe=UTF-8&amp;output=gplain">It
 has been 10 years since Rasmus released the first version of PHP</a>.
 To everyone that has helped to shape PHP into what it is today; from the
 people developing the core and extensions, documentors, script developers, bug
 reporters, beta testers, PHP application developers and even just people that
 are using PHP&mdash;<b>Thank you!</b>

</p>

<hr />

<p class="center"><a href="/news-2005.php">News Archive</a></p>

<?php commonFooter(); ?>
