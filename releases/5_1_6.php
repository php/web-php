<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.6 Release Announcement");
?>

<h1>PHP 5.1.6 Release Announcement</h1>
<p>
This release is a re-release of PHP 5.1.5, which was missing the fix for memory_limit restriction
on 64 bit systems. If you rely on this functionality and use 64bit machines, you are advised to upgrade.
</p>

<p>
 For a full list of changes in PHP 5.1.6, see the
 <a href="/ChangeLog-5.php#5.1.6">ChangeLog</a>.
</p>

<?php site_footer(); ?>
