<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_4_34.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.34 Release Announcement");
?>

<h1>PHP 5.4.34 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
5.4.34. 6 security-related bugs were fixed in this release, including fixes for
CVE-2014-3668, CVE-2014-3669 and CVE-2014-3670. Also, a fix for OpenSSL which 
produced regressions was reverted.

All PHP 5.4 users are encouraged to upgrade to this version.
</p>        

<p>For source downloads of PHP 5.4.34 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.4.34">ChangeLog</a>.
</p>

<?php site_footer(); ?>
