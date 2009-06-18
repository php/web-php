<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_10.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.10 Release Announcement");
?>

<h1>PHP 5.2.10 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.10. This release focuses on improving the stability of
the PHP 5.2.x branch with over 100 bug fixes, one of which is security related. 
All users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.10:</b>
</p>
<ul>
	<li>Fixed bug #48378 (exif_read_data() segfaults on certain corrupted .jpeg files). (Pierre)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.10 include:</b>
</p>
<ul>
	<li>Added "ignore_errors" option to http fopen wrapper. (David Zulke, Sara)</li>
	<li>Fixed memory corruptions while reading properties of zip files. (Ilia)</li>
	<li>Fixed memory leak in ob_get_clean/ob_get_flush. (Christian)</li>
	<li>Fixed segfault on invalid session.save_path. (Hannes)</li>
	<li>Fixed leaks in imap when a mail_criteria is used. (Pierre)</li>
	<li>Changed default value of array_unique()'s optional sorting type parameter back to SORT_STRING to fix backwards compatibility breakage introduced in PHP 5.2.9. (Moriyoshi)</li>
	<li>Fixed bug #47940 (memory leaks in imap_body). (Pierre, Jake Levitt)</li>
	<li>Fixed bug #47903 ("@" operator does not work with string offsets). (Felipe)</li>
	<li>Fixed bug #47644 (Valid integers are truncated with json_decode()). (Scott)</li>
	<li>Fixed bug #47564 (unpacking unsigned long 32bit big endian returns wrong result). (Ilia)</li>
	<li>Fixed bug #47365 (ip2long() may allow some invalid values on certain 64bit systems).</li>
	<li>Over 100 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.10.
</p>

<p>
 For a full list of changes in PHP 5.2.10, see the <a href="/ChangeLog-5.php#5.2.10">ChangeLog</a>.
</p>

<?php site_footer(); ?>
