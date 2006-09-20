<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.1 Release Announcement");
?>

<h1>PHP 4.4.1. Release Announcement</h1>
<p>
The PHP Development Team would like to announce the immediate release of
<a href="/downloads.php">PHP 4.4.1</a>.
</p>
<p>
This is a bug fix release, which addresses some security problems too. The
security issues that this release fixes are:
<ul>
<li>Fixed a Cross Site Scripting (<a href='http://www.cgisecurity.com/articles/xss-faq.shtml'>XSS</a>)
	vulnerability in <a href='/phpinfo'>phpinfo</a>() that could
	lead f.e. to cookie exposure, when a phpinfo() script is accidently left
	on a production server.</li>
<li>Fixed multiple safe_mode/open_basedir bypass vulnerabilities in ext/curl
	and ext/gd that could lead to exposure of files normally not accessible due
	to safe_mode or open_basedir restrictions.</li>
<li>Fixed a possible $GLOBALS overwrite problem in file upload handling,
	extract() and import_request_variables() that could lead to unexpected
	security holes in scripts assumed secure. (For more information, see <a
	href='http://www.hardened-php.net/globals-problem'>here</a>).</li>
<li>Fixed a problem when a request was terminated due to memory_limit
	constraints during certain
	<a href='/parse_str'>parse_str</a>() calls. In some cases
	this can result in register_globals being turned on.</li>
<li>Fixed an issue with trailing slashes in allowed basedirs. They were ignored
	by open_basedir checks, so that specified basedirs were handled as prefixes
	and not as full directory names.</li>
<li>Fixed an issue with calling <a href='/virtual'>virtual</a>()
	on Apache 2. This allowed bypassing of certain configuration directives
	like safe_mode or open_basedir.</li>
<li>Updated to the latest pcrelib to fix a possible integer overflow
	vulnerability announced in <a href='http://cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2005-2491'>CAN-2005-2491</a>.</li>
</ul>
</p>
<p>
This release also fixes 35 other defects, where the most important is the
the fix that removes a notice when passing a by-reference result of a function
as a by-reference value to another function. (Bug #<a href='http://bugs.php.net/33558'>33558</a>).
</p>
<p>
 For a full list of changes in PHP 4.4.1, see the
 <a href="/ChangeLog-4.php#4.4.1">ChangeLog</a>.
</p>

<?php site_footer(); ?>
