<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_11.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.11 Release Announcement");
?>

<h1>PHP 5.2.11 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.11. This release focuses on improving the stability of
the PHP 5.2.x branch with over 75 bug fixes, some of which are security related. 
All users of PHP 5.2 are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.11:</b>
</p>
<ul>
	<li>Fixed certificate validation inside php_openssl_apply_verification_policy. (Ryan Sleevi, Ilia)</li>
	<li>Fixed sanity check for the color index in imagecolortransparent(). (Pierre)</li>
	<li>Added missing sanity checks around exif processing. (Ilia)</li>
	<li>Fixed bug #44683 (popen crashes when an invalid mode is passed). (Pierre)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.11 include:</b>
</p>
<ul>
	<li>Fixed regression in cURL extension that prevented flush of data to output defined as a file handle.</li>
	<li>A number of fixes for the FILTER_VALIDATE_EMAIL validation rule</li>
	<li>Fixed bug #49361 (wordwrap() wraps incorrectly on end of line boundaries).</li>
	<li>Fixed bug #48696 (ldap_read() segfaults with invalid parameters)</li>
	<li>Fixed bug #48645 (mb_convert_encoding() doesn't understand hexadecimal html-entities).</li>
	<li>Fixed bug #48619 (imap_search ALL segfaults).</li>
	<li>Fixed bug #48400 (imap crashes when closing stream opened with OP_PROTOTYPE flag).</li>
	<li>Fixed bug #47351 (Memory leak in DateTime).</li>
	<li>Over 60 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.11.
</p>

<p>
 For a full list of changes in PHP 5.2.11, see the <a href="/ChangeLog-5.php#5.2.11">ChangeLog</a>.
</p>

<?php site_footer(); ?>
