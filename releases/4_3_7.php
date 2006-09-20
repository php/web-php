<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.7 Release Announcement");
?>

<h1>PHP 4.3.7 Release Announcement</h1>

<p>[ <a href="/releases/4_3_7_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 PHP Development Team is proud to announce the release of PHP <a href="/downloads.php">PHP 4.3.7</a>.
 This is a maintenance release that in addition to several non-critical bug fixes, addresses an input
 validation vulnerability in escapeshellcmd() and escapeshellarg() functions on the Windows platform.
 Users of PHP on Windows are encouraged to upgrade to this release as soon as possible.
</p>

<h2>Bugfix release</h2>

<p>
 Aside from the above mentioned issues this release includes the following important fixes:
</p>

<ul>
 <li>Synchronized bundled GD library with GD 2.0.23.</li>
 <li>Fixed a bug that prevented compilation of GD extensions against FreeType 2.1.0-2.1.2.</li>
 <li>Fixed thread safety issue with informix connection id.</li>
 <li>Fixed incorrect resolving of relative paths by glob() in windows.</li>
 <li>Fixed mapping of Greek letters to html entities.</li>
 <li>Fixed a bug that caused an on shutdown crash when using PHP with Apache 2.0.49.</li>
 <li>Fixed a number of crashes inside pgsql, cpdf and gd extensions.</li>

 <li>All in all this release fixes over 30 bugs that have been discovered and resolved
 since the 4.3.6 release.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.7, see the
 <a href="/ChangeLog-4.php#4.3.7">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
