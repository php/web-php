<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_11.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.11 Release Announcement");
?>

<h1>PHP 5.3.11 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of
PHP 5.3.11. This release focuses on improving the stability of the
PHP 5.3 branch with over 60 bug fixes, some of which are security related.</p>

<p>Security Enhancements for PHP 5.3.11:</p>

<ul>
  <li>Fixed bug #61043 (Regression in magic_quotes_gpc fix for CVE-2012-0831).
    Reported by Stefan Esser. (Ondřej Surý)</li>
  <li>Fixed bug #54374 (Insufficient validating of upload name leading to 
    corrupted $_FILES indices). (CVE-2012-1172). (Stas, lekensteyn at
    gmail dot com, Pierre)</li>
  <li>Add open_basedir checks to readline_write_history and readline_read_history.
    (Rasmus, reported by Mateusz Goik)</li>
</ul>

<p>Key enhancements in PHP 5.3.11 include:</p>

<ul>
  <li>Added debug info handler to DOM objects. (Gustavo, Joey Smith)</li>
  <li>Fixed bug #61172 (Add Apache 2.4 support). (Chris Jones)</li>
</ul>

<p>For a full list of changes in PHP 5.3.11, see the <a 
href="/ChangeLog-5.php#5.3.11">ChangeLog</a>. For source downloads please visit
our <a href="/downloads.php">downloads page</a>, Windows binaries can be found
on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.</p>

<p>All users of PHP 5.3 are strongly encouraged to upgrade to PHP 5.3.11.</p>

<?php site_footer(); ?>
