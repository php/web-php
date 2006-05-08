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
 <li>Expand PEAR::MDB2_Schema to cover all aspects of schema evolution
  <a href="http://pooteeweet.org/files/phptek06/database_schema_deployment.pdf">[1]</a>
 </li>
 <li>New package to read, create or modify OpenDocument files</li>
 <li>Create a 5.1+ port of MDB2</li>
</ul>

<a name="pecl"></a>
<h4>Pecl</h4>

<ul>
 <li>Opcode optimizer for APC</li>
 <li>PHP Aspect rewrite</li>
 <li>Transaction Manager - Possible mentor Andi</li>
 <li>OCR Extension - Possible mentor Andi</li>
 <li>Script pre-processor - e.g. Support for C-like #define statements</li>
 <li>Named Pipe stream protocol transport</li>
 <li>SCTP stream protocol transport</li>
</ul>

<a name="docs"></a>
<h4>Documentation / <a href="http://wiki.phpdoc.info/LiveDocs">Livedocs</a></h4>

<ul>
 <li>New indexer for Livedocs</li>
 <li>Better docbook compatibility for livedocs</li>
</ul>

<a name="other"></a>
<h4>Other</h4>

<ul>
 <li>re2php - Add PHP Support to <a href="http://re2c.sf.net/">re2c</a></li>
 <li>ANTLR - Add PHP Code Generation Target to <a href="http://www.antlr.org/v3/index.html">ANTLR 3</a>
</ul>

<?php site_footer(); ?>
