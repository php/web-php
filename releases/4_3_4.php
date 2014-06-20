<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.4 Release Announcement");
?>

<h1>PHP 4.3.4 Release Announcement</h1>

<p>[ <a href="/releases/4_3_4_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 After a lengthy QA process, <a href="/downloads.php">PHP 4.3.4</a> is finally out!<br>
 This is a medium size maintenance release, with a fair number of bug fixes. All users 
 are encouraged to upgrade to 4.3.4.
</p>

<h2>Bugfix release</h2>

<p>
 PHP 4.3.4 contains, among others, following important fixes, additions and improvements:
</p>

<ul>
 <li>Fixed disk_total_space() and disk_free_space() under FreeBSD.</li>
 <li>Fixed FastCGI support on Win32.</li>
 <li>Fixed FastCGI being unable to bind to a specific IP.</li>
 <li>Fixed several bugs in mail() implementation on win32.</li>
 <li>Fixed crashes in a number of functions.</li>
 <li>Fixed compile failure on MacOSX 10.3 Panther.</li>

 <li>Over 60 various bug fixes!</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.4, see the
 <a href="/ChangeLog-4.php#4.3.4">ChangeLog</a>.
</p>

<?php site_footer(); ?>
