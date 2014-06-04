<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/1999.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 1999", array("cache" => true));
?>

<h1>News Archive - 1999</h1>

<p>
 Here are the most important news items we have published in 1999 on PHP.net.
</p>

<hr>

<h1>The Mars Polar Lander and PHP</h1>
<p>
 <span class="newsdate">[03-Dec-1999]</span>
 It is scheduled to land on Mars at 12:14 PM Pacific time December 3 and PHP is helping
 to bring the experience to the world. The web site <a href="http://www.marspolarlander.com">
 www.marspolarlander.com</a> is powered by a combination of PHP, MySQL and Perl scripts.
 <a href="http://www.netapp.com/tech_library/3071.html">There is an architecture
 description here</a>. This architecture document doesn't say very much about PHP other
 than the fact that PHP is used as the Web scripting language, but it has an interesting
 description of how they built a large scaleable system and it proves nicely that PHP
 is up to the task of being part of such a large-scale deployment.
</p>

<hr>

<h1>PHP 4.0 Beta 3 is out!</h1>
<p>
 <span class="newsdate">[17-Nov-1999]</span>
 Three months after PHP 4.0 Beta 2 was released, Beta 3 is finally here.
 This release has a lot of changes, including a "pure" automake/libtool-based
 build system, Java support and lots of other stuff.
 All 4.0 beta users are encouraged to upgrade.
</p>

<hr>

<h1>LinuxWorld Editors' Choice Awards</h1>
<p>
 <span class="newsdate">[31-Jul-1999]</span>
 PHP is a Finalist in the LinuxWorld Editors' Choice Awards to be presented
 on Aug.11 in San Jose, CA. PHP is up against QT from Troll Tech in the
 "Programming Library/Tools" category.
</p>

<hr>

<h1>PHP 4.0 Beta 1 is out!</h1>
<p>
 <span class="newsdate">[23-Jul-1999]</span>
 The long awaited beta of the new generation of PHP is here.
</p>

<hr>

<h1>PHP Tutorials at O'Reilly Open Source Software Convention</h1>
<p>
 <span class="newsdate">[02-Jul-1999]</span>
 Rasmus Lerdorf and Jim Winstead will be giving a pair of three-hour
 tutorials at <a href="http://conferences.oreilly.com/">O'Reilly's
 Open Source Software Convention</a> on August 21, 1999, in Monterey,
 California.
</p>

<hr>

<h1>PHP 3.0.11 has been released!</h1>
<p>
 <span class="newsdate">[27-Jun-1999]</span>
 Hot on the heels of 3.0.10, along comes another release
 to fix a few problems on Windows and some Unix platforms. If 3.0.10
 worked for you, there's probably no need to upgrade. 3.0.10 featured
 bug fixes, including the last of the fsockopen() and URL fopen()
 problems, we hope. The dbm database abstraction layer had the mode
 flag for dba_open() brought into line with dbm_open(), which means
 "w" will not create a non-existent database (use "c" instead). The
 documentation has also been moved into its own repository, and the
 generated HTML documentation is included in the tar.gz instead of the
 SGML source. For a more complete list of all of the changes, see the
 ChangeLog.
</p>

<hr>

<h1>PHP 3.0.9 has been released!</h1>
<p>
 <span class="newsdate">[06-June-1999]</span>
 More bug fixes, including many in the OCI8 module, and an important fix
 for fgets() on socket connections. Also added support for PCRE
 (Perl-compatible Regular Expressions library), t1lib (PostScript Type-1
 fonts with GD), and mhash. For a more complete list of all of the
 changes, see the ChangeLog.
</p>

<hr>

<h1>PHP Related Books are Available</h1>
<p>
 <span class="newsdate">[12-May-1999]</span>
 Get ready for a wave of PHP related books to hit the shelves!
 We don't know exactly how many there are going to be yet, but
 two are already available.
</p>

<hr>

<h1>Zend has been announced</h1>
<p>
 <span class="newsdate">[04-Jan-1999]</span>
 <strong>Zend</strong>, a new optimized engine for PHP has been
 <a href="http://www.zend.com/PR.html">announced</a>. Visit the
 <a href="http://www.zend.com/">Zend Web site</a> for more
 information!
</p>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));

