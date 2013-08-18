<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_5_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.2 Release Announcement");
?>

<h1>PHP 5.5.2 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
5.5.2. About 20 bugs were fixed, including security issue in OpenSSL module (CVE-2013-4248) and session fixation problem (CVE-2011-4718).
All users of PHP are encouraged to upgrade to this release.</p>

<p>For source downloads of PHP 5.5.2 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.5.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
