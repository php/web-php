<?php
$_SERVER['BASE_PAGE'] = 'releases/7_0_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 7.0.0 Release Announcement");
?>

     <h1>PHP 7.0.0 Release Announcement</h1>
     
     <p>The PHP development team announces the immediate availability of PHP
     7.0.0. This release marks the start of the new major PHP 7 series.
     </p>
     <p>
     PHP 7.0.0 comes with a new version of the Zend Engine, numerous improvements 
     and new features such as
     </p>
     <ul>
        <li>Improved performance: PHP 7 is up to twice as fast as PHP 5.6</li>
	<li>Significantly reduced memory usage</li>
        <li>Abstract Syntax Tree</li>
        <li>Consistent 64-bit support</li>
        <li>Improved Exception hierarchy</li>
	<li>Many fatal errors converted to Exceptions</li>
	<li>Secure random number generator</li>
        <li>Removed old and unsupported SAPIs and extensions</li>
        <li>The null coalescing operator (??)</li>
        <li>Return and Scalar Type Declarations</li>
        <li>Anonymous Classes</li>
	<li>Zero cost asserts</li>
     </ul>

     <p>For source downloads of PHP 7.0.0 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
     Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
     The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-7.php#7.0.0">ChangeLog</a>.
     </p>
     <p>
     The <a href="http://php.net/manual/migration70.php">migration guide</a> is available in the PHP Manual. Please consult
     it for the detailed list of new features and backward incompatible changes.
     </p>

     <p>
     The inconvenience of the release lateness in several time zones is caused by the need to ensure the
     compatibility with the latest OpenSSL 1.0.2e release. Thanks for the patience!
     </p>

     <p>
     It is not just a next major PHP version being released today.
     The release being introduced is an outcome of the almost two years development
     journey. It is a very special accomplishment of the core team. And, it is a
     result of incredible efforts of many active community members.
     Indeed, it is not just a final release being brought out today, it is the rise of
     a new PHP generation with an enormous potential.
     </p>

     <p>Congratulations everyone to this spectacular day for the PHP world!</p>
     <p>Grateful thanks to all the contributors and supporters!</p>
     
<?php site_footer(); ?>
