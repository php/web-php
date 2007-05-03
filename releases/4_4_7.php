<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.7 Release Announcement");
?>

<h1>PHP 4.4.7 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of
PHP 4.4.7.  This release continues to improve the security and the stability of
the 4.4 branch and all users are strongly encouraged to upgrade to it as soon
as possible.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 4.4.7:</b>
</p>
<ul>
	<li>Fixed CVE-2007-1001, GD wbmp used with invalid image size (by Ivan Fratric)</li>
	<li>Fixed asciiz byte truncation inside mail() (MOPB-33 by Stefan Esser)</li>
	<li>Fixed a bug in mb_parse_str() that can be used to activate register_globals (MOPB-26 by Stefan Esser)</li>
	<li>Fixed unallocated memory access/double free in in array_user_key_compare() (MOPB-24 by Stefan Esser)</li>
	<li>Fixed a double free inside session_regenerate_id() (MOPB-22 by Stefan Esser)</li>
	<li>Added missing open_basedir &amp; safe_mode checks to zip:// and bzip:// wrappers. (MOPB-21 by Stefan Esser).</li>
	<li>Limit nesting level of input variables with max_input_nesting_level as fix for (MOPB-03 by Stefan Esser)</li>
	<li>XSS in phpinfo() (MOPB-8 by Stefan Esser)</li>
	<li>Fixed CRLF injection inside ftp_putcmd(). (by loveshell[at]Bug.Center.Team)</li>
	<li>Fixed a possible super-global overwrite inside import_request_variables(). (by Stefano Di Paola, Stefan Esser)</li>
	<li>Fixed a remotely trigger-able buffer overflow inside bundled libxmlrpc library. (by Stanislav Malyshev)</li>
</ul>

<p>
While majority of the issues outlined above are local, few issues such as the
XML-RPC overflows can be triggered remotely and therefor should be considered
critical. If you use the XML-RPC extension consider upgrading as soon as
possible.
</p>

<p>
<b>Other improvements of PHP 4.4.7 include:</b>
</p>
<ul>
	<li>About 10 bug fixes.</li>
</ul>

<p>
 For a full list of changes in PHP 4.4.7, see the <a href="/ChangeLog-4.php#4.4.7">ChangeLog</a>.
</p>


<?php site_footer(); ?>
