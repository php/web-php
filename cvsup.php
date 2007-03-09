<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'cvsup.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>What is CVS?</h3>
<p>
 You can find more information about CVS, and
 download clients for most major platforms, at
 <a href="http://ximbiot.com/cvs/wiki/index.php">the CVS Wiki</a>.
</p>

<h3>PHP.net CVS access</h3>
<p>
 If you would like to grab PHP sources or other PHP.net
 hosted project data from PHP.net, read our 
 <a href="/anoncvs.php">anonymous CVS</a> instructions.
 If you would like to join PHP development or would like to
 contribute to the PHP documentation, contact the relevant
 group. You will need <a href="/cvs-php.php">your own CVS account</a>
 to contribute.
</p>

<h3>Source and binary snapshots</h3>
<p>
 You may also be interested in a PHP snapshot, see
 <a href="http://snaps.php.net/">snaps.php.net</a>.
 Compiled snapshots for Windows users are also included.
</p>
';
site_header("Using CVSup to maintain a local CVS repository");
?>

<h1>Using CVSup To Maintain A Local CVS Repository</h1>

<p>
 In addition to <a href="/anoncvs.php">anonymous CVS</a>, we also provide
 read-only access to our CVS repository by using CVSup. While CVSup is faster
 at updating large trees, it is not as widely available as the standard CVS
 client. We will describe now how you can use CVSup.
</p>

<ol>
 <li>
  Download the appropriate binary distribution from
  <a href="http://www.cvsup.org/">the CVSup homepage</a>.
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

<?php site_footer();
