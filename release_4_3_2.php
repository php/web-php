<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP 4.3.2 Release Announcement
</h1>

<p>[ <a href="/release_4_3_2_fr.php">Version Fran&ccedil;aise</a> ]&nbsp;</p>

<p>
 After a lengthy QA process, <a href="/downloads.php">PHP 4.3.2</a> is finally out!<br />
 This maintenance release solves a lot of bugs found in earlier PHP versions
 and is a <b>strongly</b> recommended upgrade for all users of PHP.
</p>

<h2>Bugfix release</h2>

<p>
 PHP 4.3.2 contains, among others, following important fixes, additions and improvements:
 <ul>
  <li>Fixes several potentially hazardous integer and buffer overflows.</li>
  <li>Fixes for several 64-bit problems.</li>
  <li>New Apache 2.0 SAPI module (sapi/apache2handler, enabled with --with-apxs2).</li>
  <li>New session_regenerate_id() function. (Important feature against malicious session planting).</li>
  <li>Improvements to dba extension.</li>
  <li>Improvements to thttpd SAPI module.</li>
  <li>Dropped support for GDLIB version 1.x.x (php_gd.dll) on Windows.</li>
  <li>An unix man page for CLI version of PHP.</li>
  <li>New "disable_classes" php.ini option to allow administrators to disable certain classes for security reasons.</li>
 </ul>
 For a full list of changes in PHP 4.3.2, see the <a href="/ChangeLog-4.php">NEWS</a> file.
</p>

<?php commonFooter(); ?>
