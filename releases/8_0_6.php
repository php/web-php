<?php
$_SERVER['BASE_PAGE'] = 'releases/8_0_6.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.0.6 Release Announcement');
?>
<h1>PHP 8.0.6 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
8.0.6. This release reverts a bug related to PDO_pgsql that was
introduced in PHP 8.0.5.</p>

<p>PHP 8.0 users that use PDO_pgsql are encouraged to upgrade to this version.</p>

<p>For source downloads of PHP 8.0.6 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.0.6">ChangeLog</a>.
</p>
<?php site_footer();
