<?php
$_SERVER['BASE_PAGE'] = 'manual/php4.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP Version 4 Documentation');
?>

<h1>Documentation for PHP 4</h1>

<h2>Introduction</h2>
<p>
 The PHP 4 documentation was removed from the PHP Manual in August 2014,
 approximately six years after PHP 4 reached its end of life. However, we have
 provided downloadable copies of the manual for anyone who would need it, as well
 as a link to a hosted third-party version.
</p>

<h2>PHP 4 Manual</h2>
<p>
 An attempt has been made to preserve as much documentation related to PHP 4 as
 possible. Despite this, we don't have a nice, separate manual covering only PHP 4.
 The reason for this is how our documentation is structured. Even so, the linked copies
 describe more aspects of PHP 4 than the actual manual described in August 2014 (e.g.
 it covers more PHP 4 extensions).
</p>

<ul>
 <li>
  You can download a copy in the <a href="https://doc.php.net/archives/">documentation archives</a>.
 </li>
 <li>
  You can also find the <a href="https://php-legacy-docs.zend.com/manual/php4/en/index">PHP 4 legacy manual</a>
  on the Zend site, which was created from the official archives. This version of the manual is
  maintained by Zend and not the PHP Documentation Group. Any questions about its content should be reported
  via the "Report a Bug" links on the appropriate pages.
 </li>
</ul>

<p>
 Please remember that these documentation versions <strong>should not
 </strong> be used in everyday development, unless you are maintaining PHP 4 applications.
 These versions lacks many topics connected with newer PHP versions and are not updated anymore.
</p>

<h2>Migrating to supported PHP version</h2>
<p>
 All users are strongly encouraged to upgrade their environments to  newest PHP version.
 Please read our guides for <a href="https://www.php.net/manual/en/migration5.php">Migrating
 from PHP 4 to PHP 5.0.x</a> for more information.
</p>

<?php
site_footer();
