<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.0 Release Announcement");
?>

<h1>PHP 5.2.0 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate release of PHP
5.2.0. This release is a major improvement in the 5.X series, which includes a
large number of new features, bug fixes and security enhancements.
</p>

<p>
<b>The key features of PHP 5.2.0 include:</b>
</p>
<ul>
	<li>New memory manager for the Zend Engine with improved performance and a more accurate memory usage tracking.</li>
	<li>Input filtering extension was added and enabled by default.</li>
	<li>JSON extension was added and enabled by default.</li>
	<li>ZIP extension for creating and editing zip files was introduced.</li>
	<li>Hooks for tracking file upload progress were introduced.</li>
	<li>Introduced E_RECOVERABLE_ERROR error mode.</li>
	<li>Introduced DateTime and DateTimeZone objects with methods to manipulate date/time information.</li>
	<li>Upgraded bundled SQLite, PCRE libraries.</li>
	<li>Upgraded OpenSSL, MySQL and PostgreSQL client libraries for Windows installations.</li>
	<li>Many performance improvements.</li>
	<li>Over 200 bug fixes.</li>
</ul>
<p>
<b>Security Enhancements and Fixes in PHP 5.2.0:</b>
</p>
<ul>
	<li>Made PostgreSQL escaping functions in PostgreSQL and PDO extension keep track of character set encoding whenever possible.</li>
	<li>Added allow_url_include, set to Off by default to disallow use of URLs for include and require.</li>
	<li>Disable realpath cache when open_basedir and safe_mode are being used.</li>
	<li>Improved safe_mode enforcement for error_log() function.</li>
	<li>Fixed a possible buffer overflow in the underlying code responsible for htmlspecialchars() and htmlentities() functions.</li>
	<li>Added missing safe_mode and open_basedir checks for the cURL extension.</li>
	<li>Fixed overflow in str_repeat() &amp; wordwrap() functions on 64bit machines.</li>
	<li>Fixed handling of long paths inside the tempnam() function.</li>
	<li>Fixed safe_mode/open_basedir checks for session.save_path, allowing them to account for extra parameters.</li>
	<li>Fixed ini setting overload in the ini_restore() function.</li>
</ul>

<p>
All users of PHP, especially those using earlier PHP 5 releases are advised
to upgrade to this release as soon as possible. This release also obsoletes
the 5.1 branch of PHP.
</p>

<p>
For users upgrading from PHP 5.0 and PHP 5.1 there is an upgrading guide 
available <a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.0.
</p>

<p>
 For a full list of changes in PHP 5.2.0, see the
 <a href="/ChangeLog-5.php#5.2.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
