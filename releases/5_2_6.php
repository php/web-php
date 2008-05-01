<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.6 Release Announcement");
?>

<h1>PHP 5.2.6 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.6. This release focuses on improving the stability of
the PHP 5.2.x branch with over 120 bug fixes, several of which are security related. 
All users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.6:</b>
</p>
<ul>
	<li>Fixed possible stack buffer overflow in the FastCGI SAPI identified by Andrei Nigmatulin.</li>
	<li>Fixed integer overflow in printf() identified by Maksymilian Aciemowicz.</li>
	<li>Fixed security issue detailed in CVE-2008-0599 identified by Ryan Permeh.</li>
	<li>Fixed a safe_mode bypass in cURL identified by Maksymilian Arciemowicz.</li>
	<li>Properly address incomplete multibyte chars inside escapeshellcmd() identified by Stefan Esser.</li>
	<li>Upgraded bundled PCRE to version 7.6</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.6 include:</b>
</p>
<ul>
	<li>Fixed two possible crashes inside the posix extension.</li>
	<li>Fixed bug #44069 (Huge memory usage with concatenation using . instead of .=)</li>
	<li>Fixed bug #44141 (private parent constructor callable through static function).</li>
	<li>Fixed bug #43589 (a possible infinite loop in bz2_filter.c).</li>
	<li>Fixed bug #43450 (Memory leak on some functions with implicit object __toString() call).</li>
	<li>Fixed bug #43201 (Crash on using uninitialized vals and __get/__set).</li>
	<li>Fixed bug #42978 (mismatch between number of bound params and values causes a crash in pdo_pgsql).</li>
	<li>Fixed bug #42937 (__call() method not invoked when methods are called on parent from child class).</li>
	<li>Fixed bug #42736 (xmlrpc_server_call_method() crashes).</li>
	<li>Fixed bug #42369 (Implicit conversion to string leaks memory).</li>
	<li>Fixed bug #41562 (SimpleXML memory issue).</li>
	<li>Over 120 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.6.
</p>

<p>
 For a full list of changes in PHP 5.2.6, see the <a href="/ChangeLog-5.php#5.2.6">ChangeLog</a>.
</p>


<?php site_footer(); ?>
