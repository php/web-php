<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'news-2003.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("News Archive - 2003");
?>

<h1>News Archive - 2003</h1>

<p>
 Here are the most important news items we have published in 2003 on PHP.net.
 For the latest news, <a href="/index.php">check the homepage</a>.
 See more archives for <?php print_news_links(); ?>.
</p>

<hr />

<?php news_image("http://www.zend.com/survey/php_net.php", "zendtech_logo.gif", "Zend Technologies"); ?>

<h1>PHP Usage Survey</h1>
<p>
 <span class="newsdate">[24-Jun-2003]</span>
 Zend Technologies is sponsoring a public PHP Usage Survey.
 The results will be shared with the PHP Group, and will help
 us to better understand the ways in which PHP is being used,
 and what may need improvement.
 <a href="http://www.zend.com/survey/php_net.php">Fill it out</a>
 and get a chance to win one of 50 PHP T-shirts!
</p>

<hr />

<h1>PHP 4.3.2 Released!</h1>
<p>
 <span class="newsdate">[29-May-2003]</span>
 The PHP developers are proud to announce the immediate availability of
 <a href="release_4_3_2.php">PHP 4.3.2</a>. This release contains a large number of bug fixes
 and is a <strong>strongly</strong> recommended update for all users of PHP.
 Full list of fixes can be found in the <a href="ChangeLog-4.php#4.3.2">NEWS</a> file.
</p>

<hr />

<h1>Automatic Mirror Select</h1>
<p>
 <span class="newsdate">[23-May-2003]</span>
 In our ongoing battle to fight load and keep serving you content, whenever you
 perform a search on www.php.net, you will be redirected onto a nearby mirror
 (determined using the <a href="http://www.directi.com/?site=ip-to-country">Directi
 Ip-to-Country Database</a>). 
 You may experience a few quirks in the search until your mirrors have synced an up-to-date
 version of the site.
</p>

<hr />

<h1>Country Detection</h1>
<p>
 <span class="newsdate">[04-May-2003]</span>
 We are proud to introduce you the latest addition to our <a href="/my.php">My
 PHP.net</a> service. The PHP.net site and mirror sites now autodetect
 your country using the <a href="http://www.directi.com/?site=ip-to-country">Directi
 Ip-to-Country Database</a>. We use this information to present events in
 your country in bold letters on the frontpage, and to offer close mirror
 sites for downloads and your usual daily work.
</p>

<hr />

<h1>My PHP.net</h1>

<p>
 <span class="newsdate">[24-Apr-2003]</span>
 The PHP website and mirrors sites now have a
 '<a href="/my.php">My PHP.net</a>' page, which allows
 you to check what language settings you have, and enables
 you to set one which will override all the other detected
 parameters.
</p>

<p>
 However, normally this is not needed, as we remember the
 language you used last time. Be sure to have cookies turned
 on for PHP.net to let this feature work!
</p>

<hr />

<h1>Grant Program</h1>

<p>
 <span class="newsdate">[06-Mar-2003]</span>
 <a href="http://www.phparch.com">php|architect</a>, is proud to
 announce the creation of the php|architect Grant Program, whose goal is
 to provide financial support to best-of-breed PHP-related projects.
</p>

<p>
 Participation in the program is open to all open-source projects
 that are related to PHP (but not necessarily written <i>in</i> PHP). The
 program is accepting submissions now and will start distributing grants
 in June of 2003.
</p>

<p>
 For more information, visit the <a 
 href="http://www.phparch.com/grant/">program's website</a>.
</p>

<hr />

<h1>Set your own language preference</h1>

<p>
 <span class="newsdate">[01-Mar-2003]</span>
 Starting from today, your browser's "Accept Language" setting is also
 honored on language sensitive pages on the php.net site. If you would
 like to get to the documentation page of echo for example, you can use
 the <a href="/echo">/echo</a> shortcut on all mirror sites, if your
 browser is set to provide your language preference information to the
 server. This also makes the PHP error message links point to the
 documentation in your preferred language.
</p>

<p>
 You can set your preferences under Edit/Preferences/Navigator/Languages
 in Mozilla, and under Tools/Internet Options/Languages in Internet
 Explorer. This will probably also enhance your web experience on sites
 providing translated content.
</p>

<hr />

<?php print_link("http://phpconf.hu/", make_image("news/hu_conf.gif", "PHPConf.hu", "right") ); ?>

<h1>First Hungarian PHP Conference</h1>

<p>
 <span class="newsdate">[25-Feb-2003]</span>
 The members of the Hungarian PHP community announce
 <a href="http://phpconf.hu/">the first Hungarian PHP Conference</a> which
 will take place in Budapest, on Saturday March 29th, sponsored by several
 international and local companies. The conference offers an entirely free one
 day activity with several presentations addressing basic and advanced topics,
 as well, exclusively in Hungarian. Moreover, a five kilobyte-limited PHP
 contest has been started to discover the most talented PHP programmers in
 our country. The programme includes the first session of the so-called PHP
 Division which will be established with the set purpose of representing the
 community itself and promoting their interests in any national business and
 official phorums.
</p>

<hr />

<h1>PHP 4.3.1 released in response to CGI vulnerability</h1>

<p>
 <span class="newsdate">[17-Feb-2003]</span>
 The PHP Group today announced the details of a serious
 <a href="release_4_3_1.php">CGI vulnerability</a> in PHP version 4.3.0. A
 security update, <a href="downloads.php">PHP 4.3.1</a>, fixes the issue.
 Everyone running affected version of PHP (as CGI) are encouraged to upgrade
 immediately. The new 4.3.1 release does not include any other changes,
 so upgrading from 4.3.0 is safe and painless.
</p>

<hr />

<?php print_link("http://www.php-con.com/return.php?i=ph2", make_image("news/phpcon_logo.png", "PHPCon East 2003", "right")); ?>

<h1>PHPCon East 2003 - (April 23-25, 2003)</h1>
<p>
 <span class="newsdate">[01-Feb-2003]</span>
 PHPCon announces PHPCon East 2003 in New York City. This conference
 features two days of technical learning with speakers such as
 Rasmus Lerdorf, Zeev Suraski, Michael Radwin, George Schlossnagle and
 Jeremy Zawodny. PHPCon East also adds a third, full day of tutorials
 offering practical, cogent PHP solutions and ideas including: MySQL
 and PHP; Building and Consuming Web Services with SOAP; Getting
 Started with PHP; High Performance PHP: Profiling and Benchmarking;
 and more!
</p>

<p>
 PHPCon East has discounts for early registration, students, non-profits,
 and Tutorial/Conference packages. Early Bird Deadline is March 31st. For
 more program information, <a href="http://www.php-con.com/return.php?i=ph2">visit
 the PHPCon website</a>.
</p>

<hr />

<h1>LinuxTag, Karlsruhe, July 10th - 13th</h1>
<p>
 <span class="newsdate">[30-January-2003]</span>
 LinuxTag e.V has once again put out a call for papers for this years conference
 event. Submit your ideas and proposals
 <a href="http://www.linuxtag.org/2003/en/conferences/cfp.html">here</a>. This
 year's theme looks at discussions that promote new ideas, delivers a broad
 overview, introduces new users to linux, or discusses the legal, moral and
 other implications of linux and free software.
</p>
 
<hr />

<?php print_link("http://phpconf.phpquebec.org/index.php", make_image("news/conference_php_quebec.gif", "Conference PHP Quebec", "right") ); ?>

<h1>Conf&eacute;rence PHP Qu&eacute;bec 2003 - (Montr&eacute;al, March 20&amp;21rst, 2003)</h1>
<p>
 <span class="newsdate">[28-Jan-2003]</span>
 The PHP Qu&eacute;bec association announces the <a
 href="http://phpconf.phpquebec.com/">Conf&eacute;rence PHP Qu&eacute;bec 2003</a>.
 The conference will take place in the &Eacute;cole Polytechnique de Montr&eacute;al, 
 Qu&eacute;bec, Canada.
</p>

<p>
 The Conf&eacute;rence PHP Qu&eacute;bec features two days of conferences, with 
 outstanding customer cases from Canada, and cutting edge technical 
 sessions, hosted by international experts. An exhibitor room will
 showroom professional solutions.
</p>

<p>
 Learn more about those exciting days at 
 <a href="http://phpconf.phpquebec.org/index.php">phpconf.phpquebec.com</a>.
</p>

<hr />

<?php print_link("http://www.phpconference.com/", make_image("news/international_conference_2003_spring.gif", "Int'l PHP Conference", "right") ); ?>

<h1>International PHP Conference 2003 - Spring Edition (Amsterdam, May 8-9)</h1>
<p>
 <span class="newsdate">[13-Jan-2003]</span>
 Software &amp; Support Verlag announced the <a
 href="http://www.phpconference.com/">International PHP Conference 2003 - Spring
 Edition</a> - in Amsterdam. The dates for this event for PHP enthusiasts from
 all over the world will be May 8 and 9, 2003. The conference venue is the RAI
 conference center in Amsterdam.
</p>

<p>
 Like the International PHP Conferences in Frankfurt this conference will
 offer a first class program  to an international audience of PHP enthusiasts.
 We are happy to ask you to submit your <a
 href="http://www.phpconference.com/content/content2.php?CatID=0&amp;NewsID=354">proposals</a>
 for the session program.
</p>

<p>
 The topics are General PHP, PHP &amp; Business, PHP &amp; Databases, PHP
 Design, PHP Extensions, PHP &amp; XML and PHP-GTK.
</p>

<hr />

<h1>PEAR Out of Beta!</h1>
<p>
 <span class="newsdate">[11-Jan-2003]</span>
 The PEAR development team is proud to announce that
 <a href="http://pear.php.net/">PEAR</a> is finally out of its long
 beta period. As of PHP 4.3, the PEAR installer is installed by default.
 Unix support is considered stable, while Windows and Darwin are still
 of beta-quality.
</p>

<?php site_footer(); ?>
