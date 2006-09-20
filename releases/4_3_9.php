<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_9.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.9 Release Announcement");
?>

<h1>PHP 4.3.9 Release Announcement</h1>
<p>[ <a href="/releases/4_3_9_fr.php">Version Fran&ccedil;aise</a> ]</p>
<p>
 PHP Development Team is proud to announce the immediate release of PHP <a href="/downloads.php">PHP 4.3.9</a>.
 This is a maintenance release that in addition to over 50 non-critical bug fixes, addresses a problem
 with GPC input processing. This release also re-introduces ability to write
 GIF images via the bundled GD extension.
 All Users of PHP are encouraged to upgrade to this release as soon as possible.
</p>

<h2>Bugfix release</h2>

<p>
 Aside from the above mentioned issues this release includes the following important fixes:
</p>

<ul>
 <li>Implemented periodic PCRE compiled regexp cache cleanup, to avoid memory exhaustion</li>
 <li>Fixed strip_tags() to correctly handle '\0' characters.</li>
 <li>Rewritten UNIX and Windows install help files.</li>
 <li>Fixed a file-descriptor leak with phpinfo() and other 'special' URLs.</li>
 <li>Fixed possible crash inside php_shutdown_config().</li>
 <li>Fixed isset crashes on arrays.</li>
 <li>Fixed imagecreatefromstring() crashes with external GD library.</li>
 <li>Fixed fgetcsv() parsing of strings ending with escaped enclosures.</li>
 <li>Fixed overflow in array_slice(), array_splice(), substr(), substr_replace(), strspn(), strcspn().</li>
 <li>Fixed '\0' in Authenticate header passed via safe_mode.</li>
 <li>Allow bundled GD to compile against freetype 2.1.2.</li>

 
 <li>All in all this release fixes over 50 bugs that have been discovered and resolved
 since the 4.3.8 release.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.9, see the
 <a href="/ChangeLog-4.php#4.3.9">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
