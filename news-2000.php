<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'news-2000.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("News Archive - 2000");
?>

<h1>News Archive - 2000</h1>

<p>
 Here are the most important news items we have published in 2000 on PHP.net.
 For the latest news, <a href="/index.php">check the homepage</a>. For the 
 <a href="/news-2001.php">news archive of 2001</a>,
 <a href="/news-2002.php">2002</a>, or <a href="/news-2003.php">2003</a> see
 the respective pages.
</p>

<hr />

<h1>PHP 4.0.4 Released</h1>
<p>
 <span class="newsdate">[19-Dec-2000]</span>
 This release includes improvements for a large number of defects
 and numerous enhancements in the PHP core, the language implementation and
 extensions. <a href="/downloads.php">Download</a>,
 <a href="ChangeLog-4.php#4.0.4">ChangeLog</a>.
</p>

<hr />

<h1>PHP 3.0.18 released</h1>
<p>
 <span class="newsdate">[21-Oct-2000]</span>
 PHP 3.0.18 was released. This is a bug-fix release, including fixes for file
 uploads and a backported imagetypes() function from PHP 4.0. The ChangeLog
 contains a full list of changes.
</p>

<hr />

<h1>Patch Level 1 available for PHP 4.0.3</h1>
<p>
 <span class="newsdate">[15-Oct-2000]</span>
 Due to two problems discovered in PHP 4.0.3, <a href="/downloads.php">PHP 4.0.3pl1
 is now available</a>. This release fixes an issue that prevented the
 Apache php_value mechanism from working correctly with .conf files, and a
 memory leak that was discovered in the module versions of PHP.
</p>

<hr />

<h1>PHP 4.0.3 Released</h1>
<p>
 <span class="newsdate">[11-Oct-2000]</span>
 <a href="/downloads.php">Version 4.0.3</a> includes several security-oriented
 fixes and enhancements, as well as several new features and bug fixes.
 It is strongly recommended for all users of PHP to upgrade to this version.
 You can read the <a href="/ChangeLog-4.php#4.0.3">changelog</a> here.
</p>

<hr />

<h1>Manual Search Tip</h1>
<p>
 <span class="newsdate">[06-Oct-2000]</span>
 You can now go directly to PHP manual pages with a URL such as
 <a href="http://php.net/strlen">php.net/strlen</a>.
</p>

<hr />

<h1>PHP 4.0.2 Released!</h1>
<p>
 <span class="newsdate">[29-Aug-2000]</span>
 The new version features new functions, many bug fixes, and increased
 performance. <a href="/downloads.php">Download now!</a> You can read the
 <a href="/ChangeLog-4.php#4.0.2">changelog</a> here.
</p>

<hr />

<h1>PHP 4.0.1 Patch Level 2 available</h1>
<p>
 <span class="newsdate">[30-June-2000]</span>
 <a href="/downloads.php">PHP 4.0.1pl2</a> addresses two bugs that were
 discovered in PHP 4.0.1, that prevent error_reporting() and readdir()
 from working properly.
</p>

<hr />

<h1>PHP 4.0.1 Released!</h1>
<p>
 <span class="newsdate">[28-June-2000]</span>
 The first maintenance release for PHP 4.0 is out. The new release features
 increased stability under Windows, improved error handling, several new features
 and lots of bug fixes. (the full list of changes is
 <a href="/ChangeLog-4.php#4.0.1">available</a>) It's a recommended upgrade
 for all PHP users. <a href="/downloads.php">Download now!</a>
</p>

<hr />

<h1>PHP 4.0.0 Released!</h1>
<p>
 <span class="newsdate">[22-May-2000]</span>
 It's here, it's ready, and it has the long awaited 'Release' tag. The successor of
 PHP 3.0 has finally been released. At this point, everyone is encouraged to begin
 upgrading their systems to use this version. <a href="/downloads.php">Download it
 now!</a>
</p>

<hr />

<h1>PHP 3.0.16 released</h1>
<p>
 <span class="newsdate">[05-Apr-2000]</span>
 PHP 3.0.16 was released. This is mostly a bug fix release which adds support for
 gd-1.8, ucd-snmp 4.1, and high-resolution timers on OS/2. OpenBSD support has been
 improved considerably. The source package and Win32 binaries are available from the
 PHP homepage. The ChangeLog contains a full list of changes.
</p>

<?php site_footer(); ?>
