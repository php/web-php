<?php
$_SERVER['BASE_PAGE'] = 'manual/php4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header('PHP Version 4 Documentation');
?>

<h1>Documentation for PHP 4</h1>

<h2>Introduction</h2>
<p>
 The PHP 4 documentation was removed from the PHP Manual in August 2014,
 approximately six years after PHP 4 reached its end of life. However, we have
 provided downloadable copies of the manual for anyone who would need it.
</p>

<h2>PHP 4 Manual</h2>
<p>
 An attempt has been made to preserve as much documentation related to PHP 4, as
 possible. Despite this, we don't have a nice, separate manual covering only PHP 4.
 The reason for this is how our documentation is structured. Even so, the archived copy
 describes more aspects of PHP 4 than actual manual described in August 2014 (e.g.
 it covers more PHP 4 extensions).
</p>

<p>
 To download a copy of the manual for PHP 4, see the <a href="http://doc.php.net/archives/">
 documentation archives</a>. Please, remember, that archived version <strong>should not
 </strong> be used in everyday development, unless you are developing PHP 4 applications.
 This version lacks many topics connected with newer PHP versions and it is not updated anymore.
</p>

<h2>Migrating to supported PHP version</h2>
<p>
 All users are strongly encouraged to upgrade their environments to  newest PHP version.
 Please, read our guides for <a href="http://php.net/manual/en/migration5.php">Migrating
 from PHP 4 to PHP 5.0.x</a> for more information.
</p>

<?php
site_footer();
