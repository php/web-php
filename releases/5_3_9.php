<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_9.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.9 Release Announcement");
?>

<h1>PHP 5.3.9 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.9. This release focuses on improving the
stability of the PHP 5.3.x branch with over 90 bug fixes, some of
which are security related.</p>

<p>Security Enhancements and Fixes in PHP 5.3.9:</p>

<ul>
  <li>Added max_input_vars directive to prevent attacks based on hash collisions. (CVE-2011-4885)</li>
  <li>Fixed bug #60150 (Integer overflow during the parsing of invalid exif
    header). (CVE-2011-4566)</li>
</ul>

<p>Key enhancements in PHP 5.3.9 include:</p>

<ul>
  <li>Fixed bug #55475 (is_a() triggers autoloader, new optional 3rd argument to
    is_a and is_subclass_of).</li>
  <li>Fixed bug #55609 (mysqlnd cannot be built shared)</li>
  <li>Many changes to the FPM SAPI module</li>
</ul>

<p>All users are strongly encouraged to upgrade to PHP 5.3.9.</p>

<?php site_footer(); ?>
