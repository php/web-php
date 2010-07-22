<?php
// $Id $
$_SERVER['BASE_PAGE'] = 'releases/5_2_14.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.14 Release Announcement");
?>

<h1>PHP 5.2.14 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.14. This release focuses on improving the
stability of the PHP 5.2.x branch with over 60 bug fixes, some of which
are security related.</p>

<p>
This release marks the end of the active support for PHP
5.2. Following this release the PHP 5.2 series will receive no further
active bug maintenance. Security fixes for PHP 5.2 might be published on a
case by cases basis. All users of PHP 5.2 are encouraged to upgrade to
PHP 5.3.</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.14:</b>
</p>
<ul>

	<li>Rewrote var_export() to use smart_str rather than output buffering, prevents data disclosure if a fatal error occurs.</li>
	<li>Fixed a possible interruption array leak in strrchr().(CVE-2010-2484)</li>
	<li>Fixed a possible interruption array leak in strchr(), strstr(), substr(), chunk_split(), strtok(), addcslashes(), str_repeat(), trim().</li>
	<li>Fixed a possible memory corruption in substr_replace().</li>
	<li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225).</li>
	<li>Fixed a possible stack exaustion inside fnmatch().</li>
	<li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug #51288).</li>
	<li>Fixed handling of session variable serialization on certain prefix characters.</li>
	<li>Fixed a possible arbitrary memory access inside sqlite extension. Reported by Mateusz Kocielski.</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.14 include:</b>
</p>
<ul>

	<li>Upgraded bundled PCRE to version 8.02.</li>
	<li>Updated timezone database to version 2010.5.</li>
	<li>Fixed bug #52238 (Crash when an Exception occured in iterator_to_array).</li>
	<li>Fixed bug #52237 (Crash when passing the reference of the property of a non-object).</li>
	<li>Fixed bug #52041 (Memory leak when writing on uninitialized variable returned from function).</li>
	<li>Fixed bug #51822 (Segfault with strange __destruct() for static class variables).</li>
	<li>Fixed bug #51552 (debug_backtrace() causes segmentation fault and/or memory issues).</li>
	<li>Fixed bug #49267 (Linking fails for iconv on MacOS: "Undefined symbols: _libiconv").</li>
</ul>

<p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
migration guide available on <a
href="/migration53">http://php.net/migration53</a>, details the changes between
PHP 5.2 and PHP 5.3.</p>

<p>For a full list of changes in PHP 5.2.14 see the ChangeLog at
<http://www.php.net/ChangeLog-5.php#5.2.14>.</p>

<?php site_footer(); ?>
