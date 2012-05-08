<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_4_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.3 Release Announcement");
?>

<h1>PHP 5.4.3 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.4.3. This release delivers two security fixes.
All users of PHP 5.4 are encouraged to upgrade to this release</p>

<p>PHP 5.4.3 completes a fix for a vulnerability in CGI-based setups
(CVE-2012-2311). Note: mod_php and php-fpm are not vulnerable to this
attack.</p>

<p>A buffer overflow vulnerability in the apache_request_headers()
was fixed (CVE-2012-2329).</p>

<p>For source downloads of PHP 5.4.3 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.4.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
