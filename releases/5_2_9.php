<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_9.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.9 Release Announcement");
?>

<h1>PHP 5.2.9 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.9. This release focuses on improving the stability of
the PHP 5.2.x branch with over 50 bug fixes, several of which are security related. 
All users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.9:</b>
</p>
<ul>
	<li>Fixed security issue in imagerotate(), background colour isn't validated correctly with a non truecolour image. Reported by Hamid Ebadi, APA Laboratory (Fixes CVE-2008-5498). (Scott)</li>
	<li>Fixed a crash on extract in zip when files or directories entry names contain  a relative path. (Pierre)</li>
	<li>Fixed explode() behavior with empty string to respect negative limit. (Shire)</li>
	<li>Fixed a segfault when malformed string is passed to json_decode(). (Scott)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.9 include:</b>
</p>
<ul>
	<li>Added optional sorting type flag parameter to array_unique(). Default is SORT_REGULAR. (Andrei)</li>
	<li>Fixed bug #45996 (libxml2 2.7 causes breakage with character data in xml_parse()). (Rob)</li>
	<li>A number of fixes in the mbstring extension (Moriyoshi)</li>
	<li>Fixed bug #44336 (Improve pcre UTF-8 string matching performance). (frode at coretrek dot com, Nuno)</li>
	<li>Fixed bug #46699 (xml_parse crash when parser is namespace aware). (Rob)</li>
	<li>Fixed bug #46748 (Segfault when an SSL error has more than one error). (Scott)</li>
	<li>Fixed bug #46889 (Memory leak in strtotime()). (Derick)</li>
	<li>Fixed bug #47049 (SoapClient::__soapCall causes a segmentation fault). (Dmitry)</li>
	<li>Fixed bug #47165 (Possible memory corruption when passing return value by reference). (Dmitry)</li>
	<li>Fixed bug #47282 (FILTER_VALIDATE_EMAIL is marking valid email addresses as invalid). (Ilia)</li>
	<li>Fixed bug #47422 (modulus operator returns incorrect results on 64 bit linux). (Matt)</li>
	<li>Over 50 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.9.
</p>

<p>
 For a full list of changes in PHP 5.2.9, see the <a href="/ChangeLog-5.php#5.2.9">ChangeLog</a>.
</p>


<?php site_footer(); ?>
