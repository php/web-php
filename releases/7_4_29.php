<?php
$_SERVER['BASE_PAGE'] = 'releases/7_4_29.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 7.4.29 Release Announcement');
?>
<h1>PHP 7.4.29 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 7.4.29. This is a security release for Windows users.</p>

<p>This is primarily a release for Windows users due to necessarily
upgrades to the OpenSSL and zlib dependencies in which security issues
have been found. All PHP 7.4 on Windows users are encouraged to upgrade
to this version.</p>

<p>For source downloads of PHP 7.4.29 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.4.29">ChangeLog</a>.
</p>
<?php site_footer();
