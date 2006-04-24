<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'deas.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("SoC Ideas");
?>

<h1>Ideas for Google Summer of Code Projects</h1>

<a name="php"></a>
<h4>Core PHP</h4>

<ul>
 <li>Unicode conversion of all internal functions for PHP 6</li>
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
<h4>Documentation</h4>

<ul>
 <li>New indexer for Livedocs</li>
 <li>Better docbook compatibility for livedocs</li>
</ul>

<?php site_footer(); ?>
