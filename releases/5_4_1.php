<?php
$_SERVER['BASE_PAGE'] = 'releases/5_4_1.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 5.4.1 Release Announcement");
?>

<h1>PHP 5.4.1 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of
PHP 5.4.1. This release focuses on improving the stability of the
PHP 5.4 branch with over 60 bug fixes, some of which are security related.</p>

<p>Security Enhancements for PHP 5.4.1:</p>

<ul>
  <li>Fixed bug #54374 (Insufficient validating of upload name leading to
    corrupted $_FILES indices). (CVE-2012-1172). (Stas, lekensteyn at
    gmail dot com, Pierre)</li>
  <li>Add open_basedir checks to readline_write_history and readline_read_history.
    (Rasmus, reported by Mateusz Goik)</li>
</ul>

<p>Key enhancements in PHP 5.4.1 include:</p>

<ul>
  <li>Added debug info handler to DOM objects. (Gustavo, Joey Smith)</li>
  <li>Fixed bug #61172 (Add Apache 2.4 support). (Chris Jones)</li>
</ul>

<p>For a full list of changes in PHP 5.4.1, see the <a
href="/ChangeLog-5.php#5.4.1">ChangeLog</a>. For source downloads please visit
our <a href="/downloads.php">downloads page</a>, Windows binaries can be found
on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.</p>

<p>All users of PHP are strongly encouraged to upgrade to PHP 5.4.1.</p>

<?php site_footer(); ?>
