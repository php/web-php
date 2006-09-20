<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.5 Release Announcement");
?>

<h1>PHP 4.3.5 Release Announcement</h1>

<p>[ <a href="/releases/4_3_5_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 PHP Development Team is proud to announce the release of <a href="/downloads.php">PHP 4.3.5</a>.
 This is primarily a bug fix release, without any new features or additions. PHP 4.3.5
 is by far the most stable release of PHP to date and it is recommended that 
 all users upgrade to this release whenever possible.
</p>

<h2>Bugfix release</h2>

<p>
 PHP 4.3.5 contains, among others, following important fixes, additions and improvements:
</p>

<ul>
 <li>Fixed INI leak between Apache virtual hosts.</li>
 <li>Fixed crashes inside fgetcsv() and make the function binary safe.</li>
 <li>Fixed compilation with early versions of GCC 3.0.</li>
 <li>Fixed a bug that prevented feof() from working correctly with sockets.</li>
 <li>Improved the matching algorithm inside the get_browser() function.</li>
 <li>Fixed resolving of open_basedir on Win32 systems.</li>
 <li>Fixed incorrect errors for non-existent directories when safe_mode is enabled.</li>
 <li>Bundled OpenSSL dlls on Win32 upgraded to 0.9.7c</li>
 <li>Updated bundled PostgreSQL library to version 7.4 in Windows distribution.</li>
 <li>Bundled PCRE library upgraded to 4.5</li>
 <li>Synchronized bundled GD library with GD 2.0.17</li>
 <li>A number of fixes for 64bit systems.</li>

 <li>Aside from the above mentioned fixes, this release resolves over 140 various bugs and implementational problems.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.5, see the
 <a href="/ChangeLog-4.php#4.3.5">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
