<?php
// $Id $
$_SERVER['BASE_PAGE'] = 'releases/5_2_16.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.16 Release Announcement");
?>

<h1>PHP 5.2.16 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.16. This release marks the end of support
for PHP 5.2. All users of PHP 5.2 are encouraged to upgrade to PHP 5.3.
</p>

<p>
This release focuses on addressing a regression in open_basedir implementation
introduced in 5.2.15 in addition to fixing a crash inside PDO::pgsql
on data retrieval when the server is down. All users who have upgraded to 5.2.15 and are
utilizing open_basedir are strongly encouraged to upgrade to 5.2.16 or 5.3.4.
</p>

<p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
migration guide available on <a href="/migration53">http://php.net/migration53</a>, details the changes between
PHP 5.2 and PHP 5.3.</p>

<p>For a full list of changes in PHP 5.2.16 see the ChangeLog at
<a href="/ChangeLog-5.php#5.2.16">http://www.php.net/ChangeLog-5.php#5.2.16</a>.</p>

<?php site_footer(); ?>
