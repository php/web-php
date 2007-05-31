<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.3 Release Announcement");
?>

<h1>PHP 5.2.3 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability
of PHP 5.2.3. This release continues to improve the security and the
stability of the 5.X branch as well as addressing two regressions introduced
by the previous 5.2 releases. These regressions relate to the timeout
handling over non-blocking SSL connections and the lack of
HTTP_RAW_POST_DATA in certain conditions. All users are encouraged to
upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.3:</b>
</p>
<ul>
	<li>Fixed an integer overflow inside chunk_split() (by Gerhard Wagner, CVE-2007-2872)</li>
	<li>Fixed possible infinite loop in imagecreatefrompng. (by Xavier Roche, CVE-2007-2756)</li>
	<li>Fixed ext/filter Email Validation Vulnerability (MOPB-45 by Stefan Esser, CVE-2007-1900)</li>
	<li>Fixed bug #41492 (open_basedir/safe_mode bypass inside realpath()) (by bugs dot php dot net at chsc dot dk)</li>
	<li>Improved fix for CVE-2007-1887 to work with non-bundled sqlite2 lib.</li>
	<li>Added mysql_set_charset() to allow runtime altering of connection encoding.</li>
</ul>

<p>
<b>The key improvements of PHP 5.2.3 include:</b>
</p>
<ul>
	<li>Improved compilation of heredocs and interpolated strings.</li>
	<li>Optimized out a couple of per-request syscalls.</li>
	<li>Optimized digest generation in md5() and sha1() functions.</li>

	<li>Fixed bug #41236 (Regression in timeout handling of non-blocking SSL connections during reads and writes)</li>
	<li>Fixed bug #39542 (Behavior of require/include different to < 5.2.0)</li>
	<li>Fixed bug #41293 (Fixed creation of HTTP_RAW_POST_DATA when there is no default post handler)</li>
	<li>Fixed bug #41347 (checkdnsrr() segfaults on empty hostname)</li>
	<li>Fixed bug #41353 (crash in openssl_pkcs12_read() on invalid input)</li>
	<li>Fixed bug #41403 (json_decode cannot decode floats if localeconv decimal_point is not '.')</li>
	<li>Fixed bug #41421 (Uncaught exception from a stream wrapper segfaults)</li>
	<li>Fixed bug #41504 (json_decode() incorrectly decodes JSON arrays with empty string keys).</li>

	<li>Over 40 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.3.
</p>

<p>
 For a full list of changes in PHP 5.2.3, see the <a href="/ChangeLog-5.php#5.2.3">ChangeLog</a>.
</p>


<?php site_footer(); ?>
