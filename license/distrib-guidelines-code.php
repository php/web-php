<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'license/distrib-guidelines-code.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("License Information", array("current" => "help"));
?>
<h2>PHP Distribution Guidelines</h2>

<p>
  The PHP code can be redistributed in source or binary form provided that
  the terms of the PHP license are respected (see   
  <a href="http://www.php.net/license/3_01.txt">version 3.01</a>).
</p>
<p>
  In plain English, this means that you have to include the full license text 
  in human-readable form with every distributed copy of PHP, whether source 
  or binary. One way of doing this is to put a copy of the PHP license into a 
  text file that you include with the source or binary package before  
  distribution. This ensures that the license information can be read 
  properly even when a binary is shipped.
  A text file containing license and copyright information is sometimes 
  given the filename "Notices", and may be referred to as a "Notices file".   
</p>
<p>
  Some files in the PHP codebase have been contributed under other licenses. 
  If you want to distribute these files, you also need to respect the terms 
  of those licenses.
  To check, look for the terms indicated in the license + copyright comment 
  block at the top of the source file.
</p>
<p>
  The license terms for such a file may require that its own license and copyright 
  information must be included with every distributed copy (including binaries). 
  This is quite a common requirement, which can be satisfied by adding the 
  appropriate license text into a text file for distribution purposes, like the 
  "Notices"-type of file suggested above. 
</p>
<p>
  A single "Notices" file could be used to hold the collection of license 
  and copyright information that applies to PHP in general (the PHP license) and 
  any files with additional licenses that you want to distribute (for example 
  Zend, TSRM etc.) 
  It is good practice to indicate which source file(s) a particular license 
  applies to.  
</p>     

<h3>Modified products derived from PHP</h3>
<p>
  You can distribute your own software product which has been derived 
  from PHP, in source or binary form, provided that: 
</p>
<ul>
 <li>
  relevant copyright information and license(s) from   
  the PHP codebase are distributed in human-readable form with 
  every copy, as described above.
 </li>
 <li>
  you don't use the name "PHP" without permission, either 
  to promote your own product or within your product's name  
  (see clauses #3 and #4 in the PHP license 
  <a href="http://www.php.net/license/3_01.txt">version 3.01</a>).
 </li>
</ul>

<?php site_footer();


