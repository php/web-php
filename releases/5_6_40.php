<?php
$_SERVER['BASE_PAGE'] = 'releases/5_6_40.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 5.6.40 Release Announcement");
?>

     <h1>PHP 5.6.40 Release Announcement</h1>

     <p>The PHP development team announces the immediate availability of PHP
     5.6.40. This is a security release. Several security bugs have been fixed
     in this release.

     All PHP 5.6 users are encouraged to upgrade to this version.
     </p>

     <p>For source downloads of PHP 5.6.40 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
     Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
     The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.6.40">ChangeLog</a>.
     </p>

     <p>Please note that according to the <a href="http://php.net/supported-versions.php">PHP version
support timelines</a>,
        PHP 5.6.40 is the last scheduled release of PHP 5.6 branch. There may be additional release if we
discover
        important security issues that warrant it, otherwise this release will be the final one in the PHP
5.6 branch.
        If your PHP installation is based on PHP 5.6, it may be a good time to start making the plans for
the upgrade
        to PHP 7.1, PHP 7.2 or PHP 7.3.
     </p>

<?php site_footer(); ?>
