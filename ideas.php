<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ideas.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("SoC Ideas");
?>

<h1>Ideas for Google Summer of Code Projects</h1>

<a name="php"></a>
<h4>Core PHP</h4>

<ul>
 <li>Unicode conversion of all internal functions for PHP 6</li>
</ul>

<a name="qa"></a>
<h4>Quality Assurance</h4>

<ul>
 <li>
  Develop the <a href="http://gcov.php.net">gcov.php.net</a> site (improve usability, send automatic e-mails
  to developers on new regression or memory leak, enable site to receive and display data from multiple
  sources,...). Some ideas/code: <a href="http://cvs.php.net/viewcvs.cgi/php-gcov-web/">[1]</a>
  <a href="http://mega.ist.utl.pt/~ncpl/phptest/">[2]</a>
  <a href="http://mega.ist.utl.pt/~ncpl/cvs/viewcvs.cgi/phpqa/">[3]</a>
 </li>
</ul>

<a name="pear"></a>
<h4>Pear</h4>

<ul>
 <li>PHP 4 to PHP 5 (and PHP 6?) conversion script</li>
</ul>

<a name="pecl"></a>
<h4>Pecl</h4>

<ul>
 <li>Opcode optimizer for APC</li>
 <li>PHP Aspect rewrite</li>
</ul>

<a name="docs"></a>
<h4>Documentation / <a href="http://wiki.phpdoc.info/LiveDocs">Livedocs</a></h4>

<ul>
 <li>New indexer for Livedocs</li>
 <li>Better docbook compatibility for livedocs</li>
</ul>

<?php site_footer(); ?>
