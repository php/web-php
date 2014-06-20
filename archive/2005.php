<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2005.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2005", array("cache" => true));
?>

<h1>News Archive - 2005</h1>

<p>
 Here are the most important news items we have published in 2005 on PHP.net.
</p>

<hr>

<h1>PHP 5.1.1 Released</h1>
<p>
 <span class="newsdate">[28-Nov-2005]</span>
 The PHP Development Team would like to announce the immediate release of <a href="/downloads.php">PHP 5.1.1</a>.<br>
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

<hr>

<h1>PHP 5.1.0 Released</h1>
<p>
 <span class="newsdate">[24-Nov-2005]</span>
 The PHP development team is proud to announce the release of <a href="/downloads.php#v5">PHP 5.1.0</a>.<br>
 Some of the key features of PHP 5.1.0 include:
<ul>
<li>A complete rewrite of date handling code, with improved timezone support.</li>
<li>Significant performance improvements compared to PHP 5.0.X.</li>
<li>PDO extension is now enabled by default.</li>
<li>Over 30 new functions in various extensions and built-in functionality.</li>
<li>Bundled libraries, PCRE and SQLite upgraded to latest versions.</li>
<li>Over 400 various bug fixes.</li>
<li>PEAR upgraded to version 1.4.5</li>
</ul>

In addition to new features, this release includes a number of important
security fixes and we recommend that all users of PHP 5.0 and early
adopters of PHP 5.1 betas upgrade to this release as soon as possible.
The complete details about all of the changes can be found in the
<a href="/ChangeLog-5.php#5.1.0">PHP 5 ChangeLog</a> and an
<a href="/migration51">upgrading guide</a> is available as well.
</p>

<hr>

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

<hr>

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

<hr>

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

<hr>

<h1>Get Your Pocket PHP Reference and Help Hurricane Relief</h1>
<p>
 <span class="newsdate">[08-Sep-2005]</span>
 php|architect has announced the publication of
 <a href="http://www.phparch.com/rcrs">php|architect's Pocket
 PHP Reference</a>, a handy guide to every function in PHP, inclusive
 of syntax, extension and description. It's a perfect companion
 for all your coding work, perfect for looking up function syntax
 in a pinch, and its convenient pocket size (5x8") makes it
 unobtrusive and easy to transport.
</p>
<p>
 What's more, however, buying this book will help those affected
 by the recent hurricane disaster: all profits from the sale of
 the Pocket Guide will be donated entirely to the Canadian Red
 Cross' Katrina Relief Fund.
</p>

<hr>

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

<hr>

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

<hr>

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

<hr>

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

<hr>

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

<hr>

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
<hr>

<?php news_image("http://www.php.net", "php10thbd.jpg", "PHP 10th anniversary cake"); ?>
<h1>10 years since PHP 1.0 was released!</h1>
<p>
 <span class="newsdate">[08-Jun-2005]</span> 
 <a href="http://groups.google.ch/groups?selm=3r7pgp%24aa1%40ionews.io.org&amp;oe=UTF-8&amp;output=gplain">It
 has been 10 years since Rasmus released the first version of PHP</a>.
 To everyone that has helped to shape PHP into what it is today; from the
 people developing the core and extensions, documentors, script developers, bug
 reporters, beta testers, PHP application developers and even just people that
 are using PHP--<b>Thank you!</b>

</p>

<hr>

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

<hr>

<?php news_image("http://www.phpwest.com/", "phpwest.gif", "PHP West Conferences"); ?> 

<h1>PHP West Security Conference in Vancouver, BC</h1>
<p>
 <span class="newsDate">[11-May-2005]</span>
 <a href="http://www.osevents.com">Open Source Events</a> is hosting their
 second conference on June 11th, 2005 in Vancouver, British Columbia. The
 conference will focus on PHP and Open Source Security. Featured talks
 will be presented by Bruce Perens, Chris Shiflett, Christian Wenz,
 Tom Robinson and Chris Hubbard.
</p>
<p>
 The conference is a single day &ndash; one track event where attendees will
 receive a free t-shirt, lunch, and full access to the full day of talks
 with the <a href="http://store.osevents.com/product_info.php?products_id=1">purchase
 of their ticket</a>. A number of free prizes will be given away at the
 closing ceremonies.
</p>

<hr>

<?php news_image("http://conf.phpquebec.org/en/cdrom2005/", "cdrom_phpquebec_2005.gif", "PHP Québec CD ROM 2005"); ?> 

<h1>PHP Applications gathering</h1>
<p>
 <span class="newsdate">[20-Apr-2005]</span>
 The PHP Québec Conference team is looking for the best software developed
 with PHP, MySQL and Apache. Each proposal
 <a href="http://conf.phpquebec.org/en/cdrom2005/">received</a>
 by April 29th will be reviewed by an experts and members of the
 PHP Québec community.
</p>
<p>
 The most useful software will be included on the 2005 PHP Québec
 Conference CDROM along with over 25 hours of conference which where given
 by the leaders behind PHP, MySQL and Apache, as well as regional and
 international experts at the 2005 PHP Québec conference.
</p>

<hr>

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

<hr>

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

<hr>

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

<hr>

<h1>PHP and PEAR at FOSDEM 2005</h1>

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

<hr>

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

<hr>

<h1>ApacheCon Europe 2005</h1>
<p>
 <span class="newsdate">[08-Feb-2005]</span>
 <a href="http://www.apachecon.com/2005/EU/index.html">ApacheCon Europe</a>
 will be held from July 18th to July 22th in Stuttgart, Germany.
</p>

<hr>

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

<hr>

<h1>O'Reilly Open Source Convention 2005</h1>

<p>
 <span class="newsdate">[27-Jan-2005]</span>
 Circle August 1-5 on your calendar and join in at the 
 <a href="http://conferences.oreillynet.com/os2005/">O'Reilly
 Open Source Convention</a> in beautiful Portland, Oregon. OSCON 2005
 will be at the Oregon Convention Center, where there will be
 tutorials, sessions, parties, BOFs, and a huge exhibit
 hall.
</p>

<hr>

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

<hr>

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

<hr>

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

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
