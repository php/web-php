<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_12.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.12 Release Announcement");
?>

<h1>PHP 5.2.12 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.12. This release focuses on improving the stability of
the PHP 5.2.x branch with over 60 bug fixes, some of which are security related. 
All users of PHP 5.2 are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.12:</b>
</p>
<ul>
	<li>Fixed a safe_mode bypass in tempnam() identified by Grzegorz Stachowiak. (CVE-2009-3557, Rasmus)</li>
	<li>Fixed a open_basedir bypass in posix_mkfifo() identified by Grzegorz Stachowiak. (CVE-2009-3558, Rasmus)</li>
	<li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion, identified by Bogdan Calin. (CVE-2009-4017, Ilia)</li>
	<li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check, identified by Stefan Esser. (CVE-2009-4143, Stas)</li>
	<li>Fixed bug #49785 (insufficient input string validation of htmlspecialchars()). (CVE-2009-4142, Moriyoshi, hello at iwamot dot com)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.12 include:</b>
</p>
<ul>
	<li>Fixed unnecessary invocation of setitimer when timeouts have been disabled. (Arvind Srinivasan)</li>
	<li>Fixed crash in com_print_typeinfo when an invalid typelib is given. (Pierre)</li>
	<li>Fixed crash in SQLiteDatabase::ArrayQuery() and SQLiteDatabase::SingleQuery() when calling using Reflection. (Felipe)</li>
	<li>Fixed crash when instantiating PDORow and PDOStatement through Reflection. (Felipe)</li>
	<li>Fixed memory leak in openssl_pkcs12_export_to_file(). (Felipe)</li>
	<li>Fixed bug #50207 (segmentation fault when concatenating very large strings on 64bit linux). (Ilia)</li>
	<li>Fixed bug #50162 (Memory leak when fetching timestamp column from Oracle database). (Felipe)</li>
	<li>Fixed bug #50006 (Segfault caused by uksort()). (Felipe)</li>
	<li>Fixed bug #50005 (Throwing through Reflection modified Exception object makes segmentation fault). (Felipe)</li>
	<li>Fixed bug #49174 (crash when extending PDOStatement and trying to set queryString property). (Felipe) </li>
	<li>Fixed bug #49098 (mysqli segfault on error). (Rasmus)</li>

	<li>Over 50 other bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.12.
</p>

<p>
 For a full list of changes in PHP 5.2.12, see the <a href="/ChangeLog-5.php#5.2.12">ChangeLog</a>.
</p>

<?php site_footer(); ?>
