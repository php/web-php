<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.0 Release Announcement");
?>

<h1>PHP 5.1.0. Release Announcement</h1>
<p>
The PHP development team is proud to announce the release of PHP <a href="/downloads.php">PHP 5.1.0</a>.<br>
Some of the key features of <a href="/downloads.php">PHP 5.1.0</a> include:
</p>
<p>
<ul>
<li>A complete rewrite of date handling code, with improved timezone support.</li>
<li>Significant performance improvements compared to PHP 5.0.X.</li>
<li>PDO extension is now enabled by default.</li>
<li>Over 30 new functions in various extensions and built-in functionality.</li>
<li>Bundled libraries, PCRE and SQLite upgraded to latest versions.</li>
<li>Over 400 various bug fixes.</li>
<li>PEAR upgraded to version 1.4.5</li>
</ul>
</p>

<p>
 For a full list of changes in PHP 5.1.0, see the
 <a href="/ChangeLog-5.php#5.1.0">ChangeLog</a>.
</p>

<p>
In addition to new features, this release includes a number of important security fixes:
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
<li>Possible header injection in mb_send_mail() function via the &quot;To&quot; address, the first parameter of the function.</li>
</ul>
</p>

<p>
All users of PHP 5.0 and early adopters of 5.1 betas are strongly advised to upgrade to 5.1 as soon as 
possible. Furthermore, 5.1 branch obsoletes the 5.0 PHP branch.
</p>

<p><a href="/migration51">Upgrading Guide</a> is available to ease the transition from prior PHP versions.</p>

<?php site_footer(); ?>
