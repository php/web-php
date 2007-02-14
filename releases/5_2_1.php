<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.1 Release Announcement");
?>

<h1>PHP 5.2.1 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of PHP 5.2.1. 
This release is a major stability and security enhancement of the 5.X branch, and all
users are strongly encouraged to upgrade to it as soon as possible.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.1:</b>
</p>
<ul>
	<li>Fixed possible safe_mode &amp; open_basedir bypasses inside the session extension.</li>
	<li>Prevent search engines from indexing the phpinfo() page.</li>
	<li>Fixed a number of input processing bugs inside the filter extension.</li>
	<li>Fixed unserialize() abuse on 64 bit systems with certain input strings.</li>
	<li>Fixed possible overflows and stack corruptions in the session extension.</li>
	<li>Fixed an underflow inside the internal sapi_header_op() function.</li>
	<li>Fixed allocation bugs caused by attempts to allocate negative values in some code paths.</li>
	<li>Fixed possible stack overflows inside zip, imap &amp; sqlite extensions.</li>
	<li>Fixed several possible buffer overflows inside the stream filters.</li>
	<li>Fixed non-validated resource destruction inside the shmop extension.</li>
	<li>Fixed a possible overflow in the str_replace() function.</li>
	<li>Fixed possible clobbering of super-globals in several code paths.</li>
	<li>Fixed a possible information disclosure inside the wddx extension.</li>
	<li>Fixed a possible string format vulnerability in *print() functions on 64 bit systems.</li>
	<li>Fixed a possible buffer overflow inside mail() and  ibase_{delete,add,modify}_user() functions.</li>
	<li>Fixed a string format vulnerability inside the odbc_result_all() function.</li>
	<li>Memory limit is now enabled by default.</li>
	<li>Added internal heap protection.</li>
	<li>Extended filter extension support for $_SERVER in CGI and apache2 SAPIs.</li>
</ul>

<p>
The majority of the security vulnerabilities discovered and resolved can in most cases be only abused by local users and cannot be triggered 
remotely. However, some of the above issues can be triggered remotely in certain situations, or exploited by malicious local users on shared hosting setups 
utilizing PHP as an Apache module. Therefore, we strongly advise all users of PHP, regardless of the version to upgrade to 5.2.1 release 
as soon as possible. PHP 4.4.5 with equivalent security corrections is <a href='4_4_5.php'>available</a> as well.
</p>

<p>
<b>The key improvements of PHP 5.2.1 include:</b>
</p>
<ul>
	<li>Several performance improvements in the engine, streams API and some Windows specific optimizations.</li>
	<li>PDO_MySQL now uses buffered queries by default and emulates prepared statements to bypass limitations of MySQL's prepared statement API.</li>
	<li>Many improvements and enhancements to the filter and zip extensions.</li>
	<li>Memory limit is now always enabled, this includes Windows builds, with a default limit of 128 megabytes.</li>
	<li>Added several performance optimizations using faster Win32 APIs (this change means that PHP no longer supports Windows 98).</li>
	<li>FastCGI speed optimized build of PHP for Windows made available for downloading.</li>
	<li>Over 180 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.1.
</p>

<p>
 For a full list of changes in PHP 5.2.1, see the <a href="/ChangeLog-5.php#5.2.1">ChangeLog</a>.
</p>

<?php site_footer(); ?>
