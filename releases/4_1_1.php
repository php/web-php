<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_1_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.1.1 Release Announcement");
?>

<h1>PHP 4.1.1 Release Announcement</h1>

<p>
 Due to a few bugs in PHP 4.1.0, we decided to release PHP 4.1.1.  The bugs
 that were fixed are not major ones but minor ones, which could be annoying
 if you get bitten by them.
</p>

<p>
 Our recommendation is that people who already upgraded to PHP 4.1.0 do
 <strong>not</strong> upgrade to <a href="/downloads.php">PHP 4.1.1</a>,
 unless they're experiencing one of the described bugs.
</p>

<p>
 <strong>No</strong> new features or security updates are available
 in this release.
</p>

<p>Full list of fixes:</p>

<ul>
 <li>
  Fixed incompatibility with Windows .NET / IIS 6 - may improve stability
  under other versions of IIS. (Zeev)
 </li>
 <li>
  Fixed bug that caused crashes or error notices on shutdown on threaded
  platforms. (Zeev)
 </li>
 <li>Fixed several crash bugs in the xslt extension. (Markus, Derick)</li>
 <li>
  Fixed problem with dbase not returning very large (larger than long)
  integers properly. (Vlad)
 </li>
 <li>Fixed several bugs and memleaks in the domxml extension. (Markus)</li>
 <li>
  Fixed bug in gmmktime() which was one hour off during standard time -
  bug #9878. Patch by bfoddy@mediaone.net. (jmoore)
 </li>
 <li>Fixed bug in gmdate() timezone handling on Windows - bug #13885. (jmoore)</li>
 <li>Fixed several crash bugs in the mcrypt extension. (Derick)</li>
 <li>
  Made the mcrypt extension compile with the libmcrypt 2.2 series again.
  (Sterling)
 </li>
 <li>
  Fixed a bug where the is_file() family of functions would in-correctly give
  an error when they were given filenames that didn't exist. (Sterling)
 </li>
 <li>
  Fixed a bug in the strtotime() function where it was incorrectly recognizing
  GMT +0100 and GMT -0100. (Derick)
 </li>
</ul>

<?php site_footer(); ?>
