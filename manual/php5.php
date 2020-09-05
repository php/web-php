<?php
$_SERVER['BASE_PAGE'] = 'manual/php5.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP Version 5 Documentation');
?>

<h1>Documentation for PHP 5</h1>

<h2>Introduction</h2>
<p>
 The PHP 5 documentation was removed from the PHP Manual in September 2020,
 approximately two years after PHP 5 reached its end of life. However, we have
 provided downloadable copies of the manual for anyone who would need it.
</p>

<h2>PHP 5 Manual</h2>
<p>
 An attempt has been made to preserve as much documentation related to PHP 5, as
 possible. Despite this, we don't have a nice, separate manual covering only PHP 5.
 The reason for this is how our documentation is structured. Even so, the archived copy
 describes more aspects of PHP 5 than actual manual described in September 2020 (e.g.
 it covers more PHP 5 extensions).
</p>

<p>
 To download a copy of the manual for PHP 5, see the <a href="http://doc.php.net/archives/">
 documentation archives</a>. Please, remember, that archived version <strong>should not
 </strong> be used in everyday development, unless you are developing PHP 5 applications.
 This version lacks many topics connected with newer PHP versions and it is not updated anymore.
</p>

<h2>Migrating to supported PHP version</h2>
<p>
 All users are strongly encouraged to upgrade their environments to  newest PHP version.
 Please, read our guides for <a href="http://php.net/manual/en/migration70.php">Migrating
 from PHP 5.6 to PHP 7.0</a> for more information.
</p>

<?php
site_footer();
