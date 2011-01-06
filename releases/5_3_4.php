<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.4 Release Announcement");
?>

<h1>PHP 5.3.4 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate release of PHP
5.3.4. This is a maintenance release in the 5.3 series, which includes a
large number of bug fixes.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.3.4:</b>
</p>
<ul>
  <li>Fixed crash in zip extract method (possible CWE-170).</li>
  <li>Paths with NULL in them (foo\0bar.txt) are now considered as invalid (CVE-2006-7243).</li>
  <li>Fixed a possible double free in imap extension (Identified by Mateusz 
    Kocielski). (CVE-2010-4150).</li>
  <li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment.
    (CVE-2010-3709).</li>
  <li>Fixed possible flaw in open_basedir (CVE-2010-3436).</li>
  <li>Fixed MOPS-2010-24, fix string validation. (CVE-2010-2950).</li>
  <li>Fixed symbolic resolution support when the target is a DFS share.</li>
  <li>Fixed bug #52929 (Segfault in filter_var with FILTER_VALIDATE_EMAIL with
    large amount of data) (CVE-2010-3710).</li>
</ul>

<p>
<b>Key Bug Fixes in PHP 5.3.4 include:</b>
</p>
<ul>
  <li>Added stat support for zip stream.</li>
  <li>Added follow_location (enabled by default) option for the http stream 
    support.</li>
  <li>Added a 3rd parameter to get_html_translation_table. It now takes a charset hint, like htmlentities et al.</li>
  <li>Implemented FR #52348, added new constant ZEND_MULTIBYTE to detect
    zend multibyte at runtime.</li>
  <li>Multiple improvements to the FPM SAPI.</li>
  <li>Over 100 other bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide
available <a href="http://php.net/migration53">here</a>, detailing
the changes between those releases and PHP 5.3.
</p>

<p>
 For a full list of changes in PHP 5.3.4, see the
 <a href="/ChangeLog-5.php#5.3.4">ChangeLog</a>.
</p>

<?php site_footer(); ?>
