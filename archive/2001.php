<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2001.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2001", array("cache" => true));
?>

<h1>News Archive - 2001</h1>

<p>
 Here are the most important news items we have published in 2001 on PHP.net.
</p>

<hr>

<h1>PHP 4.1.0 Released!</h1>

<p>
 <span class="newsdate">[10-Dec-2001]</span>
 <a href="/downloads.php">PHP 4.1.0</a> is a key new release in the PHP 4 family.  It includes
 highly-improved performance, especially under Windows; a more security-friendly
 way of accepting form variables; output compression; and much, much more.  Read the full
 <a href="/release_4_1_0.php">release announcement</a>, or check out the
 <a href="/ChangeLog-4.php">changelog</a>. Windows binaries are also available.
</p>

<hr>

<h1>Windows Manual Survey Results</h1>

<p>
 <span class="newsdate">[27-Nov-2001]</span>
 After one week our Windows HTML Help Manual Survey is over now. We received nearly six hundred
 processable forms with many wishes and comments. Thanks for you all, who contributed to making
 the best help system for PHP on Windows. You can get more information about the ongoing
 project, including the detailed results of the survey at 
 <a href="http://weblabor.hu/php-doc-chm/">the project's own page</a>.
</p>

<hr>

<h1>PHP-GTK Documentation Update</h1>

<p>
 <span class="newsdate">[18-Oct-2001]</span>
 <a href="http://gtk.php.net/">PHP-GTK</a> 
 <a href="http://gtk.php.net/docs.php">documentation</a> is starting
 to be more filled out. The manual is now rebuilt every night and
 <a href="http://gtk.php.net/download-docs.php">downloadable versions</a> 
 of it in different formats are also available. If you have been working with
 PHP-GTK and would like to contribute to the documentation effort, please
 let us know. 
</p>

<hr>

<?php news_image("http://www.rackspace.com/?supbid=php.net", "rackspace.gif", "Rackspace"); ?>
<h1>Rackspace providing additional hosting for PHP project</h1>

<p>
 <span class="newsdate">[17-Sep-2001]</span>
 Thanks to the generous folks at <a
 href="http://www.rackspace.com/?supbid=php.net">Rackspace</a>, we have added additional
 capacity for hosting the PHP project's efforts. Currently, the machine they
 have provided is serving downloads for www.php.net and snaps.php.net. We will
 continue to re-balance our resource needs across all of the machines provided
 by our supporters.
</p>

<hr>

<h1>11.09.2001</h1>

<p>
 <span class="newsdate">[11-Sep-2001]</span>
 The worldwide PHP community is horrified by recent events and would like to
 offer its deepest sympathies to the friends and families of those who lost
 their lives. <a href="http://www.redcross.org/donate/donate.html">Support the
 Red Cross.</a>
</p>

<hr>

<h1>Manual notes are mirrored worldwide</h1>

<p>
 <span class="newsdate">[28-Aug-2001]</span>
 There is no need now to come to the main php.net server, if you would like
 to read the manual notes, as they are mirrored worldwide, and you can read
 them on all our mirror sites. You can get better response times by visiting
 the closest mirror. See the bottom of our pages.
</p>

<hr>

<?php news_image("http://www.php-conference.de/2001/index_en.php", "international_conference.gif", "International PHP Conference 2001"); ?>
<h1>International PHP Conference in Frankfurt (November 5-7, 2001)</h1>
<p>
 <span class="newsdate">[17-Aug-2001]</span>
 PHP enthusiasts from all over the world will meet three days to attend
 powerworkshops and sessions presented by the inventors of PHP, members
 of the core group and other well known people from the community.
 More information at <a href="http://www.php-conference.de/2001/index_en.php">www.php-conference.de</a>.
</p>

<hr>

<?php news_image("http://gtk.php.net/", "php-gtk-white.gif", "PHP-GTK"); ?>
<h1>PHP-GTK version 0.1 released</h1>

<p>
 <span class="newsdate">[02-Aug-2001]</span>
 The 0.1 release of PHP-GTK is now available. PHP-GTK is a PHP extension that
 provides an object-oriented interface to GTK+ toolkit and enables you to
 write client-side cross-platform GUI applications. Win32 binary version should
 be available a little later.
</p>
<p>
 Note that this version requires PHP CVS version to compile, but it can be run
 under 4.0.5 and later.
</p>
<p>
 A talk on PHP-GTK was presented by Andrei Zmievski and Frank Kromann at the 2001
 O'Reilly Open Source Conference in San Diego. The slides from the talk can be
 <a href="http://conf.php.net/sd-gtk">viewed online</a>.
 For more information, visit <a href="http://gtk.php.net/">the PHP-GTK website</a>.
</p>

<hr>

<h1>PHP Conference</h1>
<p>
 <span class="newsdate">[29-Jul-2001]</span>
 The first official PHP Conference, part of the
 <a href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source Convention</a>,
 brought the community together for
 <a href="http://conferences.oreillynet.com/cs/os2001/pub/w/os2001/sessions_php.html">sessions</a>
 and <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/php_tutorials.html">tutorials</a>
 designed to explore and strengthen PHP in
 the open source space. The conference
 was at the Sheraton San Diego Hotel and Marina
 in San Diego, California between July 23-27, 2001.
 Some presentations, you can see online:
</p>
<ul>
 <li>Rasmus Lerdorf's <a href="http://conf.php.net/or2001">PHP - Spinal Injection</a></li>
 <li>Thies Arntzen on <a href="http://conf.php.net/oci2">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
 <li>Andrei Zmievski and Frank M. Kromann with <a href="http://conf.php.net/sd-gtk">PHP-GTK</a></li>
 <li>Jon Parise on <a href="http://conf.php.net/pear2">The PHP Extension and Application Repository</a></li>
</ul>

<p>
 You can also download some papers from the
 <a href="ftp://ftp.oreilly.com/pub/conference/os2001/">O'Reilly FTP site</a>
</p>

<hr>

<h1>Integrated FAQ in the PHP Manual</h1>
<p>
 <span class="newsdate">[29-Jul-2001]</span>
 You don't need to go online anymore, to access the PHP FAQ,
 because we integrated it for you in the PHP Manual, so you can
 <a href="http://www.php.net/docs.php">download it</a> in
 various formats with the Manual packages, and
 <a href="http://www.php.net/manual/en/faq.php">annotate
 the pages online</a>, as you wish.
</p>

<hr>

<?php news_image("http://www.linuxtag.org/2001/english/30.html", "phplt.gif", "LinuxTag"); ?>

<h1>LinuxTag 2001 in Europe is over</h1>

<p>
 <span class="newsdate">[09-Jul-2001]</span>
 <a href="http://www.linuxtag.org/2001/english/30.html">LinuxTag 2001</a>
 took place in Stuttgart, Germany, between July 5th-8th. PHPUG.De has
 <a href="http://www.phpug.de/phplt_en.php4">a report</a> on the PHP events at LinuxTag.
</p>

<hr>

<?php news_image("http://promote.pair.com/direct.pl?php.net", "pair.gif", "pair Networks"); ?>
<h1>Mailing lists and CVS are up!</h1>

<p>
 <span class="newsdate">[1-Jul-2001]</span>
 The disturbances in the mailing lists and CVS services that happened in the last
 few weeks are now gone, hopefully for good. This is thanks to a brand new server donated
 by <a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a>. Thanks!
</p>

<hr>

<h1>PHP 4.0.6 Released!</h1>
<p>
 <span class="newsdate">[23-Jun-2001]</span>
 <a href="/downloads.php">PHP 4.0.6</a> is a maintenance release, that features
 many bug fixes from PHP 4.0.5, and is especially much more efficient in its
 memory requirements. Users that skipped the 4.0.5 upgrade may wish to jump
 directly from 4.0.4 to the much more stable 4.0.6. For a full list of changes,
 check out the <a href="/ChangeLog-4.php#4.0.6">Change Log</a>.
</p>

<hr>

<?php news_image("http://www.php-kongress.de/2001/index_en.php", "international_conference.gif", "PHP International Conference 2001"); ?>
<h1>PHP conventions in Europe</h1>
<p>
 <span class="newsdate">[14-Jun-2001]</span>
 The second International PHP Conference, taking place in Frankfurt, Germany
 this coming November has been announced. Further details are available on the
 <a href="http://www.php-kongress.de/2001/index_en.php">official Web site</a>.
</p>
<p>
 Also coming between July 5th-8th - <a
 href="http://www.linuxtag.org/2001/english/30.html">LinuxTag 2001</a>,
 in Stuttgart, Germany, with
 <a href="http://www.linuxtag.org/2001/english/showitem.php3?item=273&amp;lang=en">strong PHP presence</a>.
</p>

<hr>

<h1>PHP Conference</h1>
<p>
 <span class="newsdate">[01-May-2001]</span>
 The first official PHP Conference, part of the <a
 href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source
 Convention</a>, will bring the community together for
 <a href="http://conferences.oreillynet.com/cs/os2001/pub/w/os2001/sessions_php.html">sessions</a>
 and <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/php_tutorials.html">tutorials</a>
 designed to explore and strengthen PHP in the open source space. Take
 a look under the hood at everything PHP &mdash; from understanding PHP
 on wireless devices to participating in a discussion on the future of
 PHP featuring some of the core developers and luminaries from the PHP
 community. The conference runs July 23-27, 2001, at the Sheraton San
 Diego Hotel and Marina in San Diego, California.
</p>

<hr>

<h1>PHP 4.0.5 Released!</h1>
<p>
 <span class="newsdate">[30-Apr-2001]</span>
 <a href="/downloads.php">PHP 4.0.5</a> is a maintenance release, that
 features many bug fixes from PHP 4.0.4, as well as output compression, new
 experimental FastCGI support, and significantly improved thread-safe versions.
 For a full list of changes, check out the <a href="/ChangeLog-4.php#4.0.5">ChangeLog</a>.
</p>

<hr>

<h1>ApacheCon 2001 Over</h1>

<p>
 <span class="newsdate">[11-Apr-2001]</span>
 You may have missed the conference, but you can see some of the
 presentations online. Check out:
</p>
<ul>
 <li>Thies Arntzen on <a href="http://conf.php.net/oci">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
 <li>Stig Bakken on <a href="http://conf.php.net/pear">The PHP Extension and Application Repository</a></li>
 <li>Daniel Beckham and Brian Moon on <a href="http://dealnews.com/apachecon/">Caching Dynamic Web Content to Increase Dependability and Performance</a></li>
 <li>Rasmus Lerdorf's <a href="http://conf.php.net/ac2">Introduction to PHP</a></li>
 <li>Zeev Suraski on <a href="http://conf.php.net/pres/other/internals/">PHP 4 Internals</a></li> 
 <li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
</ul>

<hr>

<h1>ApacheCon 2001</h1>
<p> 
 <span class="newsdate">[07-Mar-2001]</span>
 Registration for <a href="http://apachecon.com/2001/US/">ApacheCon 2001</a>
 in Santa Clara on April 4-6, 2001 is underway! There's sessions about PHP from
 Luis Argerich, Thies Arntzen, Stig Bakken, Daniel Beckham, Tony Bryne, Rasmus
 Lerdorf, Brian Moon, Zeev Suraski and Nathan Wallace, as well as tons of
 sessions on other cool open-source projects. Early registration
 ends March 9, so act fast for discounted prices!
</p>

<hr>

<h1>New Site Design</h1>
<p>
 <span class="newsdate">[07-Mar-2001]</span>
 You might notice that things look a little different around
 here. We've streamlined the site, with a new design from the
 esteemed Colin Viebrock. Bear with us while we shake out the
 bugs that are surely lingering behind this new facade.
</p>

<hr>

<?php news_image("http://gtk.php.net/", "php-gtk-white.gif", "PHP-GTK"); ?>
<h1>Announcing PHP-GTK</h1>
<p>
 <span class="newsdate">[01-Mar-2001]</span>
 The first release of PHP-GTK is now available. PHP-GTK is a PHP extension that
 provides an object-oriented interface to the GTK+ toolkit and enables you to write
 client-side cross-platform GUI applications. For more information, visit
 <a href="http://gtk.php.net/">http://gtk.php.net/</a>.
</p>

<hr>

<h1>Patch Level 1 released for PHP 4.0.4</h1>
<p>
 <span class="newsdate">[11-Jan-2001]</span>
 Due to two security issues found in the Apache module version of PHP 4.0, PHP 4.0.4pl1
 has been released. This bug-fix release also fixes a few party-crashing bugs that
 were discovered in PHP 4.0.4.
</p>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
