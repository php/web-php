<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Get Involved", array("current" => "community"));
?>

<aside class="tips">
<p>
 Ever wondered how the PHP.net project actually works and what it has to offer?
 Who is in charge and how decisions are made? The PHP.net project has a lot of
 things in the works and is always looking for new talent to join the project,
 share new ideas, discuss improvements, fix broken features, look after the
 websites, documentation, and so on and on...
</p>
</aside>

<h1>Get Involved</h1>

<p>
 There are many ways to be involved with PHP. Help is always needed and
 appreciated, and you can help in many ways: from running our test suite and
 sending in the results, through to sending a pull request for a new feature,
 editing the PHP manual to better describe a feature, or through a myriad of
 other methods.
</p>

<p>
 Hannes Magnusson wrote an article in the August 2010 issue of
 <a href="http://www.phparch.com/">php|architect</a> entitled
 <a href="/get-involved/community-in-action.php">Community in Action</a>, which
 describes the PHP community in detail and covers many ways you can contribute
 to PHP. He has kindly made it available on the PHP.net site, and it's well
 worth a read.
</p>

<p>
 More detailed information on a couple of ways you can get involved can be
 found below.
</p>

<hr />

<h2>Run the Test Suite</h2>

<p>
 <a href="/get-involved/run-the-tests.php">Running the test suite</a> helps the
 PHP QA team to look for patterns of test failures and use those to track down
 and fix bugs in PHP. Having a variety of people running the test suite on
 different operating systems and architectures for alpha, beta, RC and stable
 releases is a huge help in preventing and finding bugs and regressions.
</p>

<?php
site_footer();

/* vim: set et ts=4 sw=4 ft=php: : */

