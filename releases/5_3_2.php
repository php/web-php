<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_3_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.2 Release Announcement");
?>

<h1>PHP 5.3.2 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate release of PHP
5.3.2. This is a maintenance release in the 5.3 series, which includes a
large number of bug fixes.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.3.2:</b>
</p>
<ul>
  <li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li>
  <li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li>
  <li>Fixed a possible open_basedir/safe_mode bypass in the session extension identified by Grzegorz Stachowiak. (Ilia)</li>
</ul>

<p>
<b>Key Bug Fixes in PHP 5.3.2 include:</b>
</p>
<ul>
  <li>Added support for SHA-256 and SHA-512 to php's crypt.</li>
  <li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check.</li>
  <li>Fixed bug #51059 (crypt crashes when invalid salt are given).</li>
  <li>Fixed bug #50940 Custom content-length set incorrectly in Apache sapis.</li>
  <li>Fixed bug #50847 (strip_tags() removes all tags greater then 1023 bytes long).</li>
  <li>Fixed bug #50723 (Bug in garbage collector causes crash).</li>
  <li>Fixed bug #50661 (DOMDocument::loadXML does not allow UTF-16).</li>
  <li>Fixed bug #50632 (filter_input() does not return default value if the variable does not exist).</li>
  <li>Fixed bug #50540 (Crash while running ldap_next_reference test
cases).</li>
  <li>Fixed bug #49851 (http wrapper breaks on 1024 char long headers).</li>
  <li>Over 60 other bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide
available <a href="http://php.net/migration53">here</a>, detailing
the changes between those releases and PHP 5.3.
</p>

<p>
 For a full list of changes in PHP 5.3.2, see the
 <a href="/ChangeLog-5.php#5.3.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
