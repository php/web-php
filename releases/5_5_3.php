<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_5_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.3 Release Announcement");
?>

<h1>PHP 5.5.3 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 5.5.3. 
This release fixes a bug in the patch for CVE-2013-4248 in OpenSSL module.</p>

<p>All PHP users are encouraged to upgrade to this release.</p>

<p>For source downloads of PHP 5.5.3 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.5.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
