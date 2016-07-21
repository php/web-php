<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_5_38.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.38 Release Announcement");
?>
     <h1>PHP 5.5.38 Release Announcement</h1>
     
	<p>
       The PHP development team announces the immediate availability of PHP 5.5.38. This is a security release that fixes
       some security related bugs.
    </p>
    
    <p>All PHP 5.5 users are encouraged to upgrade to this version.</p>

	<p>For source downloads of PHP 5.5.38 please visit our downloads page, Windows source and binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>. The list of changes is recorded in the <a href="http://php.net/ChangeLog-5.php#5.5.38">ChangeLog</a>.</p>

	<p>
	Note that according to <a href="http://www.php.net/supported-versions.php">our release schedule</a>, PHP 5.5.38 is the last release of the PHP 5.5 branch.
	There may be additional release if we discover important security issues that warrant it, otherwise this release will be the final one in the PHP 5.5 branch. If your PHP installation is based on PHP 5.5, it may be a good time to start making the plans for the upgrade to PHP 5.6 or PHP 7.0.
     </p>

<?php site_footer(); ?>
