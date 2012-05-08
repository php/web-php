<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_13.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.13 Release Announcement");
?>

<h1>PHP 5.3.13 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.13. This release delivers a security fix.
All users of PHP 5.3 are encouraged to upgrade to this release</p>

<p>PHP 5.3.13 completes a fix for a vulnerability in CGI-based setups
(CVE-2012-2311). Note: mod_php and php-fpm are not vulnerable to this
attack.</p>

<p>For source downloads of PHP 5.3.13 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.3.13">ChangeLog</a>.</p>

<?php site_footer(); ?>
