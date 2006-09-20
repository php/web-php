<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.3 Release Announcement");
?>

<h1>PHP 5.1.3. Release Announcement</h1>
<p>
The PHP development team is proud to announce the release of <a href="/downloads.php">PHP 5.1.3</a>.
This release combines small number of feature enhancements with a significant amount of bug fixes and resolves a number of security issues.
All PHP users are encouraged to upgrade to this release as soon as possible.
</p>

<p>
The security issues resolved include the following:
<ul>
	<li>Disallow certain characters in session names.</li>
	<li>Fixed a buffer overflow inside the wordwrap() function.</li>
	<li>Prevent jumps to parent directory via the 2nd parameter of the tempnam() function.</li>
	<li>Enforce safe_mode for the source parameter of the copy() function.</li>
	<li>Fixed cross-site scripting inside the phpinfo() function.</li>
	<li>Fixed offset/length parameter validation inside the substr_compare() function.</li>
	<li>Fixed a heap corruption inside the session extension.</li>
	<li>Fixed a bug that would allow variable to survive unset().</li>
</ul>
</p>

<p>
The feature enhancements include the following notables:
<ul>
	<li>The use of the var keyword to declare properties no longer raises a deprecation E_STRICT.</li>
	<li>FastCGI interface was completely reimplemented.</li>
	<li>Multitude of improvements to the SPL, SimpleXML, GD, CURL and Reflection extensions.</li>
	<li>Support for many additional date formats added to the strtotime() function.</li>
	<li>A number of performance improvements added to the engine and the core extensions.</li>
	<li>Added imap_savebody() that allows message body to be written to a file.</li>
	<li>Added lchown() and lchgrp() to change user/group ownership of symlinks.</li>
	<li>Upgraded bundled PCRE library to version 6.6</li>
</ul>
</p>

<p>
The release also includes over 120 bug fixes with a focus on:
<ul>
	<li>Make auto_globals_jit work without too many INI changes.</li>
	<li>Fixed tiger hash algorithm generating wrong results on big endian platforms.</li>
	<li>Fixed a number of errors in the SOAP extension.</li>
	<li>Fixed recursion handling in the serialize() functionality.</li>
	<li>Make is_*() function account of open_basedir restrictions.</li>
	<li>Fixed a number of crashes in the DOM and PDO extensions.</li>
	<li>Addressed a number of regressions in the strtotime() function.</li>
	<li>Make memory_limit work in Win32 systems.</li>
	<li>Fixed a deadlock in the sqlite extension caused by the sqlite_fetch_column_types() function.</li>
	<li>Fixed memory leaks in the realpath() cache.</li>
</ul>
</p>

<p>
 For a full list of changes in PHP 5.1.3, see the
 <a href="/ChangeLog-5.php#5.1.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
