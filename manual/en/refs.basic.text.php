<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/funcref.inc";
$setup = array (
  'home' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'head' => 
  array (
    0 => 'UTF-8',
    1 => 'en',
  ),
  'this' => 
  array (
    0 => 'refs.basic.text.php',
    1 => 'Text Processing',
  ),
  'up' => 
  array (
    0 => 'funcref.php',
    1 => 'Function Reference',
  ),
  'prev' => 
  array (
    0 => 'function.session-pgsql-status.php',
    1 => 'session_pgsql_status',
  ),
  'next' => 
  array (
    0 => 'book.bbcode.php',
    1 => 'BBCode',
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/refs.basic.text.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="refs.basic.text" class="set">
   <h1 class="title">Text Processing</h1>
   








   









   








   







   









  <ul class="chunklist chunklist_set"><li><a href="book.bbcode.php">BBCode</a> — Bulletin Board Code<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.bbcode.php">Introduction</a></li><li><a href="bbcode.setup.php">Installing/Configuring</a></li><li><a href="bbcode.constants.php">Predefined Constants</a></li><li><a href="ref.bbcode.php">BBCode Functions</a></li></ul></li><li><a href="book.pcre.php">PCRE</a> — Regular Expressions (Perl-Compatible)<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.pcre.php">Introduction</a></li><li><a href="pcre.setup.php">Installing/Configuring</a></li><li><a href="pcre.constants.php">Predefined Constants</a></li><li><a href="pcre.examples.php">Examples</a></li><li><a href="pcre.pattern.php">PCRE Patterns</a></li><li><a href="ref.pcre.php">PCRE Functions</a></li></ul></li><li><a href="book.regex.php">POSIX Regex</a> — Regular Expression (POSIX Extended)<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.regex.php">Introduction</a></li><li><a href="regex.setup.php">Installing/Configuring</a></li><li><a href="regex.constants.php">Predefined Constants</a></li><li><a href="regex.examples.php">Examples</a></li><li><a href="ref.regex.php">POSIX Regex Functions</a></li></ul></li><li><a href="book.ssdeep.php">ssdeep</a> — ssdeep Fuzzy Hashing<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.ssdeep.php">Introduction</a></li><li><a href="ssdeep.setup.php">Installing/Configuring</a></li><li><a href="ssdeep.constants.php">Predefined Constants</a></li><li><a href="ref.ssdeep.php">ssdeep Functions</a></li></ul></li><li><a href="book.strings.php">Strings</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.strings.php">Introduction</a></li><li><a href="strings.setup.php">Installing/Configuring</a></li><li><a href="string.constants.php">Predefined Constants</a></li><li><a href="ref.strings.php">String Functions</a></li></ul></li></ul></div><?php manual_footer(); ?>