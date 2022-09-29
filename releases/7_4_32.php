<?php
$_SERVER['BASE_PAGE'] = 'releases/7_4_32.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 7.4.32 Release Announcement');
?>
<h1>PHP 7.4.32 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 7.4.32. This is a security release.</p>

<p>This release addresses an infinite recursion with specially
constructed phar files, and prevents a clash with variable name mangling for
the __Host/__Secure HTTP headers.</p>

<p>All PHP 7.4 users are encouraged to upgrade to this version.</p>

<p>For source downloads of PHP 7.4.32 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.4.32">ChangeLog</a>.
</p>
<?php site_footer();
