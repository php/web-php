<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_29.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.29 Release Announcement");
?>

<h1>PHP 5.3.29 Release Announcement</h1>

     <p>The PHP development team announces the immediate availability of
     PHP 5.3.29. This release marks the <strong>end of life</strong> of the <strong>PHP 5.3 series</strong>.
     Future releases of this series are <strong>not planned</strong>. All PHP 5.3 users are
     encouraged to upgrade to the current stable version of PHP 5.5 or
     previous stable version of PHP 5.4, which are supported till at least
     2016 and 2015 respectively.</p>
     
     <p>PHP 5.3.29 contains about 25 potentially security related fixes
	     backported from PHP 5.4 and 5.5.</p>
     
     <p>For source downloads of PHP 5.3.29, please visit our <a href="http://www.php.net/downloads.php">downloads page</a>. Windows
     binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>. The list of changes is recorded in
     the <a href="http://www.php.net/ChangeLog-5.php#5.3.29">ChangeLog</a>.</p>
     
     <p>For helping your migration to newer versions please refer to our migration
     guides for updates from <a href="http://php.net/migration54">PHP 5.3 to
	     5.4</a> and from <a href="http://php.net/migration55">PHP 5.4 to 5.5</a>.</p>

<?php site_footer(); ?>
