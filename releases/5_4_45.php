<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_4_45.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.45 Release Announcement");
?>

<h1>PHP 5.4.45 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
5.4.45. Ten security-related issues were fixed in this release.
All PHP 5.4 users are encouraged to upgrade to this version.
</p>

<p>For source downloads of PHP 5.4.45 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.4.45">ChangeLog</a>.
</p>

<p>Please note that according to the <a href="http://php.net/supported-versions.php">PHP version support timelines</a>, 
PHP 5.4.45 is the last scheduled release of PHP 5.4 branch. There may be additional release if we discover 
important security issues that warrant it, otherwise this release will be the final one in the PHP 5.4 branch. 
If your PHP installation is based on PHP 5.4, it may be a good time to start making the plans for the upgrade to PHP 5.5 or PHP 5.6.
</p> 

<?php site_footer(); ?>
