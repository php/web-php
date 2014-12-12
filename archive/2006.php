<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2006.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2006", array("cache" => true));
?>

<h1>News Archive - 2006</h1>

<p>
 Here are the most important news items we have published in 2006 on PHP.net.
</p>

<hr>
<?php news_image("http://www.prophp.com.br/phpconference.php", "phpconfbrasil.jpg", "PHP Brasil 2007"); ?>
<h1>PHP Conference Brazil</h1>
<p>
 <span class="newsdate">[27-Nov-2006]</span>
 The PHP Conference Brasil is the first Brazilian conference related exclusively
 to the PHP language in Sao Paulo, on December 1st and 2nd, 2006.
</p>

<p>
 It will be a 
 great opportunity to establish a sustainable Brazilian PHP community and to
 exchange ideas among our professionals.
 More info is available at
 <a href="http://www.prophp.com.br/phpconference.php">the Brazilian PHP Conference</a> Web site.
</p>

<hr>

<h1>PHP 5.2.0 Released</h1>
<p>
 <span class="newsdate">[02-Nov-2006]</span>
 The PHP development team is proud to announce the immediate release of PHP
 5.2.0. This release is a major improvement in the 5.X series, which includes a
 large number of new features, bug fixes and security enhancements.
 Further details about this release can be found in the release announcement
 <a href="/releases/5_2_0.php">5.2.0</a>, the full list of changes is
 available in the ChangeLog <a href="/ChangeLog-5.php#5.2.0">PHP 5</a>.
</p>
<p>
 All users of PHP, especially those using earlier PHP 5 releases are advised
 to upgrade to this release as soon as possible. This release also obsoletes
 the 5.1 branch of PHP.
</p>
<p>
 For users upgrading from PHP 5.0 and PHP 5.1 there is an upgrading guide 
 available <a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
 and PHP 5.2.0.
</p>

<hr>

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

<hr>

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

<hr>

<h1>PHP 5.1.6 Released</h1>
<p>
 <span class="newsdate">[24-Aug-2006]</span>
 The PHP development team would like to announce the immediate availability of
 PHP <a href="/downloads.php#v5">5.1.6</a>. This release contains a fix for 
 memory_limit restriction on 64 bit systems that was not included in PHP 5.1.5.
</p>

<hr>

<?php news_image("http://www.amazon.com/exec/obidos/ASIN/0596528124/wwwphpnet", "mre3cover_sm.jpg", "Mastering Regular Expressions, 3rd edition"); ?>
<h1>Mastering Regular Expressions - now with PHP coverage</h1>
<p>
 <span class="newsdate">[24-Aug-2006]</span>
 The third edition of
 <a href="http://www.amazon.com/exec/obidos/ASIN/0596528124/wwwphpnet">Mastering Regular Expressions</a>
 is finally out and includes a full 48-page chapter on PHP. This is an excellent
 resource from Jeffrey Friedl who has been writing about regexps for years.
</p>

<hr>

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

<hr>

<h1>PHP 4.4.3 Released</h1>
<p>
 <span class="newsdate">[03-Aug-2006]</span>
 The PHP development team is proud to announce the release of <a
 href="/downloads.php#v4">PHP 4.4.3</a>.  This release combines small number of
 bug fixes and resolves a number of security issues.  Some of the key changes
 of PHP 4.4.3 include:
</p>
<ul>
<li>Disallow certain characters in session names.</li>
<li>Fixed a buffer overflow inside the wordwrap() function.</li>
<li>Prevent jumps to parent directory via the 2nd parameter of the tempnam() function.</li>
<li>Improved safe_mode check for the error_log() function.</li>
<li>Fixed cross-site scripting inside the phpinfo() function.</li>
<li>Fixed offset/length parameter validation inside the substr_compare() function.</li>
<li>Upgraded bundled PCRE library to version 6.6</li>
<li>Over 20 various bug fixes.</li>
</ul>
<p>
Further details about this release can be found in the <a
href="/release_4_4_3.php">release announcement</a> and the full list of changes
is available in the <a href="/ChangeLog-4.php#4.4.3">PHP 4 ChangeLog</a>.
</p>

<hr>

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

<hr>

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

<hr>

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

<hr>

<h1>PHP 5.1.4 Released</h1>
<p>
 <span class="newsdate">[04-May-2006]</span>
 A critical bug with $_POST array handling as well as the FastCGI sapi have been discovered in PHP 5.1.3. A new PHP release <a href="/downloads.php">5.1.4</a> is now
 available to address these issues. All PHP users are encouraged to upgrade to this release as soon as possible.
</p>
<p>
Further details about this release can be found in the <a href="/release_5_1_4.php">release announcement</a> 
and the full list of changes is available in the <a href="/ChangeLog-5.php#5.1.4">PHP 5 ChangeLog</a>.
<br>
<b>The tarballs were updated to include the PEAR's phar file, previously missing from the release.</b>
</p>

<hr>

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

<hr>

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

<hr>
<h1>PHP Vikinger</h1>
<p>
 <span class="newsdate">[24-Apr-2006]</span>
 The <a href="http://phpvikinger.org/">PHP Vikinger</a> is a community-driven
 PHP event that will be held in
 <a href="http://en.wikipedia.org/wiki/Skien">Skien, Norway</a>
 from June 24th to 25th. Like the famous
 <a href="http://en.wikipedia.org/wiki/Foo_Camp">Foo Camp</a> and
 <a href="http://en.wikipedia.org/wiki/Bar_Camp">Bar Camp</a>, the people
 who attend get to choose and present the sessions at the event.
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

<hr>
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

<hr>
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
Early bird pricing are available until march 3rd.<br>
Learn more about this <a 
href="http://conf.phpquebec.com/en/conf2006/">exciting conference</a>.
</p>

<hr>
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
An <a
href="http://www.nyphpcon.com/attendee_registration.php">early-bird
discount is available until March 1st</a>.
</p>

<hr>

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

<hr>
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

<hr>
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

<hr>
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

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
