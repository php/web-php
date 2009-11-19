<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_3_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.1 Release Announcement");
?>

<h1>PHP 5.3.1 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate release of PHP
5.3.1. This is a maintenance release in the 5.3 series, which includes a
large number of bug fixes.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.3.1:</b>
</p>
<ul>
  <li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion.</li>
  <li>Added missing sanity checks around exif processing.</li>
  <li>Fixed a safe_mode bypass in tempnam().</li>
  <li>Fixed a open_basedir bypass in posix_mkfifo().</li>
  <li>Fixed bug #50063 (safe_mode_include_dir fails).</li>
  <li>Fixed bug #44683 (popen crashes when an invalid mode is passed).</li> 
</ul>

<p>
<b>Key Bug Fixes in PHP 5.3.1 include:</b>
</p>
<ul>
  <li>Fixed crash in com_print_typeinfo when an invalid typelib is given.</li>
  <li>Fixed crash in SQLiteDatabase::ArrayQuery() and SQLiteDatabase::SingleQuery() when calling using Reflection.</li>
  <li>Fixed crash when instantiating PDORow and PDOStatement through Reflection.</li>
  <li>Fixed bug #49910 (no support for ././@LongLink for long filenames in phar
  tar support).</li>
  <li>Fixed bug #49908 (throwing exception in __autoload crashes when interface is not defined).</li>
  <li>Around 100 other bug fixes</li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide
available <a href="http://php.net/migration53">here</a>, detailing
the changes between those releases and PHP 5.3.
</p>

<p>
 For a full list of changes in PHP 5.3.1, see the
 <a href="/ChangeLog-5.php#5.3.1">ChangeLog</a>.
</p>

<?php site_footer(); ?>
