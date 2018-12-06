<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/7_3_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 7.3.0 Release Announcement");
?>

	<h1>PHP 7.3.0 Release Announcement</h1>

	<p>The PHP development team announces the immediate availability of PHP 7.3.0.
	This release marks the third feature update to the PHP 7 series.</p>

	<p>PHP 7.3.0 comes with numerous improvements and new features such as</p>

	<ul>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L171-L175">Flexible Heredoc and Nowdoc Syntax</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L510-L513">PCRE2 Migration</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L193-L238">Multiple MBString Improvements</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L377-L383">LDAP Controls Support</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L267-L274">Improved FPM Logging</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L706-L710">Windows File Deletion Improvements</a></li>
    <li><a href="https://github.com/php/php-src/blob/43329e85e682bed4919bb37c15acb8fb3e63175f/UPGRADING#L281-L341">Several Deprecations</a></li>
	</ul>

	<p>For source downloads of PHP 7.3.0 please visit our <a href="http://www.php.net/downloads">downloads</a> page
	Windows binaries can be found on the <a href="http://windows.php.net/download">PHP for Windows</a> site.
	The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-7.php#7.3.0">ChangeLog</a>.</p>

	<p>The <a href="http://php.net/manual/en/migration73.php">migration guide</a> is available in the PHP Manual, shortly.
	Please consult it for the detailed list of new features and backward incompatible changes.</p>

	<p>Many thanks to all the contributors and supporters!</p>

<?php site_footer(); ?>
