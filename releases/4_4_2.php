<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.2 Release Announcement");
?>

<h1>PHP 4.4.2. Release Announcement</h1>
<p>
The PHP Development Team would like to announce the immediate release of
<a href="/downloads.php">PHP 4.4.2</a>.
</p>
<p>
This is a bug fix release, which addresses some security problems too. The
major points that this release corrects are:
<ul>
<li>Prevent header injection by limiting each header to a single line.</li>
<li>Possible XSS inside error reporting functionality.</li>
<li>Missing safe_mode/open_basedir checks into cURL extension.</li>
<li>Apache 2 regression with sub-request handling on non-Linux systems.</li>
<li>key() and current() regression related to references.</li>
</ul>
</p>
<p>
This release also fixes about 30 other defects.
</p>
<p>
 For a full list of changes in PHP 4.4.2, see the
 <a href="/ChangeLog-4.php#4.4.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
