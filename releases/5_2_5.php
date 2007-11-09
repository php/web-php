<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.5 Release Announcement");
?>

<h1>PHP 5.2.5 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.5. This release focuses on improving the stability of
the PHP 5.2.x branch with over 60 bug fixes, several of which are security related. 
All users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.5:</b>
</p>
<ul>
	<li>Fixed dl() to only accept filenames. Reported by Laurent Gaffie.</li>
	<li>Fixed dl() to limit argument size to MAXPATHLEN (CVE-2007-4887). Reported by Laurent Gaffie.</li>
	<li>Fixed htmlentities/htmlspecialchars not to accept partial multibyte sequences. Reported by Rasmus Lerdorf</li>
	<li>Fixed possible triggering of buffer overflows inside glibc implementations of the fnmatch(), setlocale() and glob() functions. Reported by Laurent Gaffie.</li>
	<li>Fixed "mail.force_extra_parameters" php.ini directive not to be modifiable in .htaccess due to the security implications. Reported by SecurityReason.</li>
	<li>Fixed bug #42869 (automatic session id insertion adds sessions id to non-local forms).</li>
	<li>Fixed bug #41561 (Values set with php_admin_* in httpd.conf can be overwritten with ini_set()).</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.5 include:</b>
</p>
<ul>
	<li>Upgraded PCRE to version 7.3</li>
	<li>Updated timezone database to version 2007.9</li>
	<li>Added ability to control memory consumption between request using ZEND_MM_COMPACT environment variable.</li>
	<li>Improved speed of array_intersect_key(), array_intersect_assoc(), array_uintersect_assoc(), array_diff_key(), array_diff_assoc() and array_udiff_assoc() functions</li>
	<li>Fixed bug #43139 (PDO ignores ATTR_DEFAULT_FETCH_MODE in some cases with fetchAll())</li>
	<li>Fixed bug #42785 (json_encode() formats doubles according to locale rather then following standard syntax)</li>
	<li>Fixed bug #42549 (ext/mysql failed to compile with libmysql 3.23)</li>
	<li>Over 60 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.5.
</p>

<p>
 For a full list of changes in PHP 5.2.5, see the <a href="/ChangeLog-5.php#5.2.5">ChangeLog</a>.
</p>


<?php site_footer(); ?>
