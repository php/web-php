<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Get Involved", array("current" => "community"));
?>

<h2 class="content-title">Contributing to PHP</h2>
<div class="content-box">

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
</div>

<h3 class="content-title">Four Best Ways to Contribute</h3>

 <ol class="content-box listed">
  <li>Running test suites in <a href="http://qa.php.net/">RC</a>
      and <a href="http://php.net/releases">release</a> distributions of PHP</li>
  <li>Help finding and diagnosing failed tests, see
      the <a href="http://qa.php.net/write-test.php">phpt documentation</a></li>
  <li>Filing and resolving bug reports
      at <a href="http://bugs.php.net">bugs.php.net</a></li>
  <li>Help maintain and or translate documentation files
      at <a href="http://edit.php.net">edit.php.net</a>. Check out our
      <a href="http://doc.php.net/tutorial/">guide for contributors</a>.</li>
 </ol>

<h3 class="content-header">Development of the PHP source</h3>

<div class="content-box">
<p>
 Someone hoping to become involved in the maintenance and development of
 the source should be experienced in all of the areas mentioned above, as
 this creates a strong team; everyone knows how every other part of the
 project works. 
</p>

<p>
 You will also need experience in C programming as PHP is written entirely in C.
</p>
</div>


<?php
$SIDEBAR_DATA ='
<div class="panel"><a href="build-setup.php">Developer Setup Help</a></div>
<div class="panel">
  <div class="headline">Useful links for developers:</div>
  <div class="body">
    <ul>
     <li><a href="http://lxr.php.net">lxr</a> - an online interface to the
       PHP source, providing search facilities useful for programmers and researchers</li>
     <li><a href="https://wiki.php.net/rfc/howto">The RFC process</a> - the process
       by which developers can suggest and discuss new ideas with the community</li>
     <li><a href="/build-setup.php">Developer Setup Help</a> - some helpful information
       regarding setting up a development environment for PHP</li>
     <li><a href="/mailing-lists.php">Mailing List</a> - List of general and internal mailing lists
      used by PHP</li>
    </ul>
  </div>
</div>
';

site_footer(array('sidebar'=>$SIDEBAR_DATA));

/* vim: set et ts=4 sw=4 ft=php: : */

