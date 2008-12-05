<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.7 Release Announcement");
?>

<h1>PHP 5.2.7 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.7. This release focuses on improving the stability of
the PHP 5.2.x branch with over 120 bug fixes, several of which are security related. 
All users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.7:</b>
</p>
<ul>
	<li>Upgraded PCRE to version 7.8 (Fixes CVE-2008-2371)</li>
	<li>Fixed missing initialization of BG(page_uid) and BG(page_gid), reported by Maksymilian Arciemowicz.</li>		
	<li>Fixed incorrect php_value order for Apache configuration, reported by Maksymilian Arciemowicz.</li>
	<li>Fixed a crash inside gd with invalid fonts (Fixes CVE-2008-3658).</li>
	<li>Fixed a possible overflow inside memnstr (Fixes CVE-2008-3659).</li>
	<li>Fixed security issues detailed in CVE-2008-2665 and CVE-2008-2666.</li>
	<li>Fixed bug #45151 (Crash with URI/file..php (filename contains 2 dots)).(Fixes CVE-2008-3660)</li>
	<li>Fixed bug #42862 (IMAP toolkit crash: rfc822.c legacy routine buffer overflow). (Fixes CVE-2008-2829)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.7 include:</b>
</p>
<ul>
	<li>Fixed several memory leaks inside the readline and sqlite extensions</li>
	<li>A number of corrections relating to date parsing inside the date extension</li>
	<li>Fixed bugs relating to data retrieval in the PDO extension</li>
	<li>A series of crashes in various areas of code were resolved</li>
	<li>Several corrections were made to the strip_tags() function in terms of < and &lt;?XML handling</li>
	<li>A number of bugs were fixed in extract() function when EXTR_REFS flag is being used</li>
	<li>Added the ability to log PHP errors to the SAPI (Ex. Apache log) logging facility</li>
	<li>Over 170 bug fixes.</li></li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.7.
</p>

<p>
 For a full list of changes in PHP 5.2.7, see the <a href="/ChangeLog-5.php#5.2.7">ChangeLog</a>.
</p>


<?php site_footer(); ?>
