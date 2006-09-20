<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.6 Release Announcement");
?>

<h1>PHP 4.3.6 Release Announcement</h1>

<p>[ <a href="/releases/4_3_6_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 PHP Development Team is proud to announce the release of PHP <a href="/downloads.php">PHP 4.3.6</a>.
 This is is a bug fix release whose primary goal is to address two bugs which may 
 result in crashes in PHP builds with thread-safety enabled. All users of PHP 
 in a threaded environment (Windows) are strongly encouraged to upgrade to 
 this release.
</p>

<h2>Bugfix release</h2>

<p>
 Aside from the above mentioned issues this release includes the following important fixes:
</p>

<ul>
 <li>Updated bundled PDFLib library to version 5.0.3p1 in Windows distribution.</li>
 <li>Synchronized bundled GD library with GD 2.0.22.</li>
 <li>Fixed bugs that prevented building of the GD extension against the external GD library versions 1.2-1.8.</li>
 <li>Fixed a bugs resulting in leakage of session settings across requests.</li>
 <li>Fixed several daylight savings bugs inside the mktime and strtotime functions.</li>
 <li>Fixed a bug that prevented compilation of cURL extension against libcurl 7.11.1</li>
 <li>Fixed a number of crashes inside domxml and mssql extensions.</li>

 <li>All in all this release fixes approximately 25 bugs that have been discovered 
 since the 4.3.5 release.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.6, see the
 <a href="/ChangeLog-4.php#4.3.6">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
