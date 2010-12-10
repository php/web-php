<?php
// $Id $
$_SERVER['BASE_PAGE'] = 'releases/5_2_15.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.15 Release Announcement");
?>

<h1>PHP 5.2.15 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.15. This release marks the end of support
for PHP 5.2. All users of PHP 5.2 are encouraged to upgrade to PHP 5.3.
</p>

<p>
This release focuses on improving the security and stability of the 
PHP 5.2.x branch with a small number, of predominatly security fixes.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.15:</b>
</p>
<ul>
	<li>Fixed extract() to do not overwrite $GLOBALS and $this when using EXTR_OVERWRITE.</li>
	<li>Fixed crash in zip extract method (possible CWE-170).</li>
	<li>Fixed a possible double free in imap extension.</li>
	<li>Fixed possible flaw in open_basedir (CVE-2010-3436).</li>
	<li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment. (CVE-2010-3709).</li>
	<li>Fixed bug #52929 (Segfault in filter_var with FILTER_VALIDATE_EMAIL with large amount of data).</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.15 include:</b>
</p>
<ul>
	<li>Fixed bug #47643 (array_diff() takes over 3000 times longer than php 5.2.4).</li>
	<li>Fixed bug #44248 (RFC2616 transgression while HTTPS request through proxy with SoapClient object).</li>
</ul>

<p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
migration guide available on <a href="/migration53">http://php.net/migration53</a>, details the changes between
PHP 5.2 and PHP 5.3.</p>

<p>For a full list of changes in PHP 5.2.15 see the ChangeLog at
<a href="http://www.php.net/ChangeLog-5.php#5.2.15">http://www.php.net/ChangeLog-5.php#5.2.15</a>.</p>

<?php site_footer(); ?>
