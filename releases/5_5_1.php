<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_5_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.1 Release Announcement");
?>

<h1>PHP 5.5.1 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate availability
of PHP <a href="http://php.net/downloads.php#v5.5.1">5.5.1</a>.
This release fixes several bugs.
</p>

<p>The PHP development team announces the immediate availability of PHP
5.5.1. About 20 bugs were fixed, including a security fix in the XML parser (Bug #65236).
All users of PHP are encouraged to upgrade to this release.</p>

<p>For source downloads of PHP 5.5.1 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.5.1">ChangeLog</a>.
</p>

<?php site_footer(); ?>
