<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'cvsup.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
commonHeader("Using CVSup to maintain a local CVS repository");
?>

<h1>Using CVSup To Maintain A Local CVS Repository</h1>

<p>
 In addition to anonymous CVS, we also provide read-only access to
 our CVS repository by using CVSup. While CVSup is faster at updating
 large trees, it is not as widely available as the standard cvs client.
 We will describe now how you can use CVSup.
</p>

<ol>
 <li>
  Download the appropiate binary distribution from
  <a href="http://www.polstra.com/projects/freeware/CVSup/">the
  CVSup homepage</a>.
 </li>
 <li>
  Follow the instructions in the Install file of the binary distribution
 </li>
 <li>
  Create a php.cvsup file containing the following content:
  <pre>
*default host=CVSup.php.net
*default base=/usr/src/php
*default release=cvs
*default compress
*default tag=.
*default delete use-rel-suffix
php-src
  </pre>
  This will cause the php-src tree to be stored in <tt>/usr/src/php</tt>
  (you need to create that directory manually).
 </li>
 <li>
  At a command prompt, simply type:
  <pre>cvsup php.cvsup</pre>
 </li>
 <li>
  If you are behind a firewall, you might need to use:
  <pre>cvsup -P - php.cvsup</pre>
 </li>
 <li>
  To build PHP, you need to install a few utilities (GNU autoconf,
  libtool, bison). Cd into <tt>php-src</tt> and run
  <code>./buildconf</code>.
 </li>
</ol>

<?php commonFooter(); ?>
