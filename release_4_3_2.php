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

<h2>Bugfix release</h2>

<p>This bug fix release solves a lot of bugs found in PHP 4.3.1 and earlier versions.
   PHP 4.3.2 includes among others the following fixes, additions and improvements:
<ul>
 <li>Fixed several integer overflows.</li> 
 <li>Fixed several 64-bit problems.</li>
 <li>Added new Apache 2.0 SAPI module (sapi/apache2handler, enabled with --with-apxs2).</li>
 <li>Improved dba extension.</li>
 <li>Improved thttpd SAPI module.</li>
 <li>Syncronized bundled GD library with GD 2.0.12 .</li>
 <li>Dropped support for GDLIB version 1.x.x (php_gd.dll) on Windows.</li>
 <li>Added unix man page for CLI version of PHP.</li>
 <li>Added "disable_classes" php.ini option to allow administrators to disable certain classes for security reasons.</li>
</ul>
For a full list of changes in PHP 4.3.2, see the
<a href="/ChangeLog-4.php">NEWS</a> file.
</p>

<?php commonFooter(); ?>
