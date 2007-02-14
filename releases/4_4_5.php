<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.5 Release Announcement");
?>

<h1>PHP 4.4.5 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of
PHP 4.4.5.  This release is a stability and security enhancement of the 4.4.X
branch, and all users are strongly encouraged to upgrade to it as soon as
possible.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 4.4.5:</b>
</p>
<ul>
<li>Fixed possible safe_mode &amp; open_basedir bypasses inside the session extension.</li>
<li>Fixed unserialize() abuse on 64 bit systems with certain input strings.</li>
<li>Fixed possible overflows and stack corruptions in the session extension.</li>
<li>Fixed an underflow inside the internal sapi_header_op() function.</li>
<li>Fixed possible overflows inside zip &amp; imap extensions.</li>
<li>Fixed non-validated resource destruction inside the shmop extension.</li>
<li>Fixed a possible overflow in the str_replace() function.</li>
<li>Fixed possible clobbering of super-globals in several code paths.</li>
<li>Fixed a possible information disclosure inside the wddx extension.</li>
<li>Fixed a possible string format vulnerability in *print() functions on 64 bit systems.</li>
<li>Fixed a possible buffer overflow inside ibase_{delete,add,modify}_user() function.</li>
<li>Fixed a string format vulnerability inside the odbc_result_all() function.</li>
<li>Fixed a possible buffer overflow inside mail() function on Windows.</li>
</ul>

<p>
The majority of the security vulnerabilities discovered and resolved can in
most cases be only abused by local users and cannot be triggered remotely.
However, some of the above issues can be triggered remotely in certain
situations, or exploited by malicious local users on shared hosting setups
utilizing PHP as an Apache module. Therefore, we strongly advise all users of
PHP, regardless of the version to upgrade to 4.4.5 release as soon as possible.
PHP 5.2.1 with equivalent security corrections is <a
href='5_2_1.php'>available</a> as well.
</p>

<p>
In addition to the security fixes, this release includes a number of
non-security related bug fixes.
</p>

<p>
 For a full list of changes in PHP 4.4.5, see the
 <a href="/ChangeLog-4.php#4.4.5">ChangeLog</a>.
</p>

<?php site_footer(); ?>
