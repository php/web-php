<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.6 Release Announcement");
?>

<h1>PHP 4.4.6 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of
PHP 4.4.6.  This release addresses a crash problem with the session extension
when register_globals is turned on that was introduced in PHP 4.4.5. This
release comes also with the new version 7.0 of PCRE and it addresses a number
of minor bugs.
</p>

<p>
 For a full list of changes in PHP 4.4.6, see the
 <a href="/ChangeLog-4.php#4.4.6">ChangeLog</a>.
</p>

<?php site_footer(); ?>
