<?php
$_SERVER['BASE_PAGE'] = 'releases/5_4_42.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 5.4.42 Release Announcement");
?>

<h1>PHP 5.4.42 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
5.4.42. Six security-related issues in PHP were fixed in this release,
as well as several security issues in bundled sqlite library (CVE-2015-3414, CVE-2015-3415, CVE-2015-3416).

All PHP 5.4 users are encouraged to upgrade to this version.
</p>

<p>For source downloads of PHP 5.4.42 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-5.php#5.4.42">ChangeLog</a>.
</p>

<?php site_footer(); ?>
