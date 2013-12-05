<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA ='
    <p>
      Ever wondered how the PHP.net project actually works and what it has to offer? 
      Who is in charge and how decisions are made? The PHP.net project has a lot of 
      things in the works and is always looking for new talent to join the project, 
      share new ideas, discuss improvements, fix broken features, look after the
      websites, documentation, and so on....
    </p>
';

site_header("Get Involved", array("current" => "community"));
?>

<h2>Contributing to PHP</h2>

<p>
 Anybody who programs in PHP can be a contributing member of the community
 that develops and deploys it; the task of deploying PHP, documentation and
 associated websites is a never ending one. With every release, or release
 candidate comes a wave of work, which takes a lot of organization and
 co-ordination.
</p>

<p>
 With the introduction of release managers comes a smoother release process,
 but help is still needed: testing release candidates, finding and squashing
 bugs in tests, documentation, and sources.
</p>

<h3>Four Best Ways to Contribute</h3>

<p>
 <ol>
  <li>Running test suites in <a href="http://qa.php.net/">RC</a>
      and <a href="http://php.net/releases">release</a> distributions of PHP</li>
  <li>Help finding and diagnosing failed tests, see
      the <a href="http://qa.php.net/write-test.php">phpt documentation</a></li>
  <li>Filing and resolving bug reports
      at <a href="http://bugs.php.net">bugs.php.net</a></li>
  <li>Help maintain and or translate documentation files
      at <a href="http://edit.php.net">edit.php.net</a></li>
 </ol>
</p>

<h3>Development of the PHP source</h3>

<p>
 Someone hoping to become involved in the maintenance and development of
 the source should be experienced in all of the areas mentioned above, as
 this creates a strong team; everyone knows how every other part of the
 project works. 
</p>

<p>
 You will also need experience in C programming as PHP is written entirely in C.
</p>

<p>
 Below are some useful links for developers:
  <ul>
   <li><a href="http://lxr.php.net">lxr</a> - an online interface to the
       PHP source, providing search facilities useful for programmers and researchers</li>
   <li><a href="https://wiki.php.net/rfc/howto">The RFC process</a> - the process
       by which developers can suggest and discuss new ideas with the community</li>
   <li><a href="/build-setup">Developer Setup Help</a> - some helpful information
       regarding setting up a development environment for PHP</li>
  </ul>
</p>

<?php
site_footer(array('sidebar'=>$SIDEBAR_DATA));

/* vim: set et ts=4 sw=4 ft=php: : */

