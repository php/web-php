<?php
$_SERVER['BASE_PAGE'] = 'releases/7_0_33.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 7.0.33 Release Announcement");
?>

<h1>PHP 7.0.33 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
7.0.33. Five security-related issues were fixed in this release.
All PHP 7.0 users are encouraged to upgrade to this version.
</p>

<p>For source downloads of PHP 7.0.33 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.0.33">ChangeLog</a>.
</p>

<p>Please note that according to the <a href="https://www.php.net/supported-versions.php">PHP version support timelines</a>,
PHP 7.0.33 is the last scheduled release of PHP 7.0 branch. There may be additional release if we discover
important security issues that warrant it, otherwise this release will be the final one in the PHP 7.0 branch.
If your PHP installation is based on PHP 7.0, it may be a good time to start making the plans for the upgrade
to PHP 7.1, PHP 7.2 or PHP 7.3.
</p>

<?php site_footer(); ?>
