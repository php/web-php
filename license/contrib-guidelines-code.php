<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'license/contrib-guidelines-code.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("License Information", array("current" => "help"));
?>
<h2>PHP Contributor Guidelines for Code Developers</h2>

<p>
  Before you complete the form to request a Git account, you must understand and accept the principles under which PHP 
  itself is developed. These are summarised in the next paragraph.
</p>
<p>
  Any code contributed to PHP must be contributed under the PHP license (or a compatible BSD-style license). 
  PHP will be redistributed under the PHP license (currently  
  <a href="http://www.php.net/license/3_01.txt">version 3.01</a>). 
  This includes implementation code, test cases, utility scripts and tools - that is, all code associated 
  with the PHP project. If you contribute code that isn't entirely your own 
  (for example it may be partially derived from other Open Source software) you are asked to add a comment 
  into the source code to indicate the origin and the license of the original code. 
  If you are unsure of the license you are asked to confirm with the owner of the code that they are 
  happy for it to be contributed to PHP under the PHP license. 
</p>
<p>
  Specifically regarding GPL and LGPL source code:
</p>
<ul>
  <li>GPL or LGPL licensed code cannot be used as a basis for any derived work contributed to PHP.</li>
  <li>Extensions which link  GPL'd libraries will not be accepted.</li>
  <li>Extensions which link to LGPL libraries  will be strongly discouraged.</li>
</ul>


<h2>Guidelines for Related Projects</h2>

<p>
  For related projects, please refer to the Project websites:  
</p>
<ul>
  <li><a href="http://pecl.php.net/copyright.php">PECL</a></li>
  <li><a href="http://pear.php.net/copyright.php">PEAR</a></li>
  <li><a href="http://gtk.php.net/copyright.php">GTK</a></li>
</ul>

<?php site_footer();

