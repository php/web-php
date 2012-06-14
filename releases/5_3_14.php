<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_14.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.14 Release Announcement");
?>

<h1>PHP 5.3.14 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.14. This release fixes two security related
issues. All users of PHP 5.3 are encouraged to upgrade to this release.</p>

<p>PHP 5.3.14 fixes an security issue in the implementation of crypt() and a
heap overflow in the Phar extension. Over 30 bugs were fixed</p>

<p>Please note that php://fd is now only available if the CLI SAPI is used</p>

<p>For source downloads of PHP 5.3.14 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.3.14">ChangeLog</a>.
</p>

<?php site_footer(); ?>
