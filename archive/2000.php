<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2000.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2000", array("cache" => true));
?>

<h1>News Archive - 2000</h1>

<p>
 Here are the most important news items we have published in 2000 on PHP.net.
</p>

<hr>

<h1>PHP 4.0.4 Released</h1>
<p>
 <span class="newsdate">[19-Dec-2000]</span>
 This release includes improvements for a large number of defects
 and numerous enhancements in the PHP core, the language implementation and
 extensions. <a href="/downloads.php">Download</a>,
 <a href="ChangeLog-4.php#4.0.4">ChangeLog</a>.
</p>

<hr>

<h1>PHP 3.0.18 released</h1>
<p>
 <span class="newsdate">[21-Oct-2000]</span>
 PHP 3.0.18 was released. This is a bug-fix release, including fixes for file
 uploads and a backported imagetypes() function from PHP 4.0. The ChangeLog
 contains a full list of changes.
</p>

<hr>

<h1>Patch Level 1 available for PHP 4.0.3</h1>
<p>
 <span class="newsdate">[15-Oct-2000]</span>
 Due to two problems discovered in PHP 4.0.3, <a href="/downloads.php">PHP 4.0.3pl1
 is now available</a>. This release fixes an issue that prevented the
 Apache php_value mechanism from working correctly with .conf files, and a
 memory leak that was discovered in the module versions of PHP.
</p>

<hr>

<h1>PHP 4.0.3 Released</h1>
<p>
 <span class="newsdate">[11-Oct-2000]</span>
 <a href="/downloads.php">Version 4.0.3</a> includes several security-oriented
 fixes and enhancements, as well as several new features and bug fixes.
 It is strongly recommended for all users of PHP to upgrade to this version.
 You can read the <a href="/ChangeLog-4.php#4.0.3">changelog</a> here.
</p>

<hr>

<h1>Manual Search Tip</h1>
<p>
 <span class="newsdate">[06-Oct-2000]</span>
 You can now go directly to PHP manual pages with a URL such as
 <a href="http://php.net/strlen">php.net/strlen</a>.
</p>

<hr>

<h1>PHP 4.0.2 Released!</h1>
<p>
 <span class="newsdate">[29-Aug-2000]</span>
 The new version features new functions, many bug fixes, and increased
 performance. <a href="/downloads.php">Download now!</a> You can read the
 <a href="/ChangeLog-4.php#4.0.2">changelog</a> here.
</p>

<hr>

<h1>PHP 4.0.1 Patch Level 2 available</h1>
<p>
 <span class="newsdate">[30-June-2000]</span>
 <a href="/downloads.php">PHP 4.0.1pl2</a> addresses two bugs that were
 discovered in PHP 4.0.1, that prevent error_reporting() and readdir()
 from working properly.
</p>

<hr>

<h1>PHP 4.0.1 Released!</h1>
<p>
 <span class="newsdate">[28-June-2000]</span>
 The first maintenance release for PHP 4.0 is out. The new release features
 increased stability under Windows, improved error handling, several new features
 and lots of bug fixes. (the full list of changes is
 <a href="/ChangeLog-4.php#4.0.1">available</a>) It's a recommended upgrade
 for all PHP users. <a href="/downloads.php">Download now!</a>
</p>

<hr>

<h1>PHP 4.0.0 Released!</h1>
<p>
 <span class="newsdate">[22-May-2000]</span>
 It's here, it's ready, and it has the long awaited 'Release' tag. The successor of
 PHP 3.0 has finally been released. At this point, everyone is encouraged to begin
 upgrading their systems to use this version. <a href="/downloads.php">Download it
 now!</a>
</p>

<hr>

<h1>PHP 3.0.16 released</h1>
<p>
 <span class="newsdate">[05-Apr-2000]</span>
 PHP 3.0.16 was released. This is mostly a bug fix release which adds support for
 gd-1.8, ucd-snmp 4.1, and high-resolution timers on OS/2. OpenBSD support has been
 improved considerably. The source package and Win32 binaries are available from the
 PHP homepage. The ChangeLog contains a full list of changes.
</p>

<hr>

<h1>Zend Optimizer released!</h1>
<p>
 <span class="newsdate">[08-Mar-2000]</span>
 <a href="http://www.zend.com">Zend Technologies</a> has announced the
 availability of the Zend Optimizer for PHP 4.0 Beta 4. The optimizer is
 available for <a href="http://www.zend.com/store/products/zend-optimizer.php">free
 download</a>
</p>

<hr>

<h1>PHP Talks at ApacheCon</h1>
<p>
 <span class="newsdate">[24-Feb-2000]</span>
 Nathan Wallace, Craig Kohtz and Tobias Ratschiller are all giving
 presentations on PHP at ApacheCon, 8-10th March 2000, in Orlando,
 Florida. The topics include sessions and authentication, advanced PHP
 techniques, migrating from ASP to PHP and web design patterns. You can
 find more information about these talks <a
 href="http://www.apachecon.com/2000/US/html/sessions.html">here</a>.
</p>

<hr>

<h1>PHP Developers' Meeting</h1>
<p>
 <span class="newsdate">[17-Jan-2000]</span>
 On January 20th, 2000 the primary developers of PHP are meeting for a
 4-day session in Tel Aviv, Israel. The main goal is to organize the
 development effort. The developers of MySQL will also be in attendance
 to explore how the two projects can cooperate further to make the
 PHP/MySQL combination even stronger than it already is.
</p>

<hr>

<h1>PHP 3.0.13 has been released</h1>
<p>
 <span class="newsdate">[01-Jan-2000]</span>
 The long-awaited release of PHP 3.0 contains numerous bug fixes and a
 bonus of new features. Support for GNU recode, portable access to stdio
 streams, enhanced FTP support, support for Mcal and IMSP, as well as PNG
 functions for gd make this release a must for every user of PHP. The
 ChangeLog provides a complete list of changes.
</p>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));

