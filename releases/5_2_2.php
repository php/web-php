<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.2 Release Announcement");
?>

<h1>PHP 5.2.2 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of PHP 5.2.2. 
This release continues to improve the security and the stability of the 5.X
branch and all users are strongly encouraged to upgrade to it as soon as possible.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.2:</b>
</p>
<ul>
	<li>Fixed CVE-2007-1001, GD wbmp used with invalid image size (by Ivan Fratric)</li>
	<li>Fixed a header injection via Subject and To parameters to the mail() function (MOPB-34 by Stefan Esser)</li>
	<li>Fixed asciiz byte truncation inside mail() (MOPB-33 by Stefan Esser)</li>
	<li>Fixed wrong length calculation in unserialize S type (MOPB-29 by Stefan Esser)</li>
	<li>Fixed a bug in mb_parse_str() that can be used to activate register_globals (MOPB-26 by Stefan Esser)</li>
	<li>Fixed unallocated memory access/double free in in array_user_key_compare() (MOPB-24 by Stefan Esser)</li>
	<li>Fixed a double free inside session_regenerate_id() (MOPB-22 by Stefan Esser)</li>
	<li>Added missing open_basedir &amp; safe_mode checks to zip:// and bzip:// wrappers. (MOPB-20, MOPB-21 by Stefan Esser).</li>
	<li>Fixed substr_compare and substr_count information leak (MOPB-14 by Stefan Esser) (Stas, Ilia)</li>
	<li>Limit nesting level of input variables with max_input_nesting_level as fix for (MOPB-03 by Stefan Esser)</li>
	<li>Fixed CRLF injection inside ftp_putcmd(). (by loveshell[at]Bug.Center.Team)</li>
	<li>Fixed a possible super-global overwrite inside import_request_variables(). (by Stefano Di Paola, Steffan Esser)</li>
	<li>Fixed a remotely trigger-able buffer overflow inside make_http_soap_request(). (by Ilia Alshanetsky)</li>
	<li>Fixed a buffer overflow inside user_filter_factory_create(). (by Ilia Alshanetsky)</li>
	<li>Fixed a remotely trigger-able buffer overflow inside bundled libxmlrpc library. (by Stanislav Malyshev)</li>
</ul>

<p>
While majority of the issues outlined above are local, in some circumstances given specific code paths they can be    
triggered externally. Therefor, we strongly recommend that if you use code utilizing the functions and extensions identified as
having had vulnerabilities in them, you consider upgrading your PHP.
</p>

<p>
<b>The key improvements of PHP 5.2.2 include:</b>
</p>
<ul>
	<li>Further improvements to the Memory Manager with the goal of improving realloc() performance.</li>
	<li>Bundled GD, SQLite and PCRE libraries were upgraded.</li>
	<li>Additional methods were added to SPL's DirectoryIterator and SplFileInfo classes.</li>
	<li>Over 120 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.2.
</p>

<p>
 For a full list of changes in PHP 5.2.2, see the <a href="/ChangeLog-5.php#5.2.2">ChangeLog</a>.
</p>


<?php site_footer(); ?>
