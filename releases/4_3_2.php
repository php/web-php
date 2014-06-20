<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.2 Release Announcement");
?>

<h1>PHP 4.3.2 Release Announcement</h1>

<p>[ <a href="/releases/4_3_2_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 After a lengthy QA process, <a href="/downloads.php">PHP 4.3.2</a> is finally out!<br>
 This maintenance release solves a lot of bugs found in earlier PHP versions
 and is a <strong>strongly</strong> recommended upgrade for all users of PHP.
</p>

<h2>Bugfix release</h2>

<p>
 PHP 4.3.2 contains, among others, following important fixes, additions and improvements:
</p>

<ul>
 <li>Fixes several potentially hazardous integer and buffer overflows.</li>
 <li>Fixes for several 64-bit problems.</li>
 <li>
  New Apache 2.0 SAPI module (sapi/apache2handler,
  enabled with --with-apxs2).
 </li>
 <li>
  New session_regenerate_id() function. (Important feature
  against malicious session planting).
 </li>
 <li>Improvements to dba extension.</li>
 <li>Improvements to thttpd SAPI module.</li>
 <li>Dropped support for GDLIB version 1.x.x (php_gd.dll) on Windows.</li>
 <li>An unix man page for CLI version of PHP.</li>
 <li>
  New "disable_classes" php.ini option to allow administrators to
  disable certain classes for security reasons.
 </li>
 <li>..and a <strong>HUGE</strong> amount of other bug fixes!</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.2, see the
 <a href="/ChangeLog-4.php#4.3.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
