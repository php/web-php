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
    0 => 'refs.basic.vartype.php',
    1 => 'Variable and Type Related Extensions',
  ),
  'up' => 
  array (
    0 => 'funcref.php',
    1 => 'Function Reference',
  ),
  'prev' => 
  array (
    0 => 'changelog.strings.php',
    1 => 'Changelog',
  ),
  'next' => 
  array (
    0 => 'book.array.php',
    1 => 'Arrays',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/refs.basic.vartype.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="refs.basic.vartype" class="set">
   <h1 class="title">Variable and Type Related Extensions</h1>
   







   






   







   







   







   







   








   







   







   







  <ul class="chunklist chunklist_set"><li><a href="book.array.php">Arrays</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.array.php">Introduction</a></li><li><a href="array.setup.php">Installing/Configuring</a></li><li><a href="array.constants.php">Predefined Constants</a></li><li><a href="array.sorting.php">Sorting Arrays</a></li><li><a href="ref.array.php">Array Functions</a></li></ul></li><li><a href="book.classobj.php">Classes/Objects</a> — Class/Object Information<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.classobj.php">Introduction</a></li><li><a href="classobj.setup.php">Installing/Configuring</a></li><li><a href="classobj.constants.php">Predefined Constants</a></li><li><a href="classobj.examples.php">Examples</a></li><li><a href="ref.classobj.php">Classes/Object Functions</a></li></ul></li><li><a href="book.classkit.php">Classkit</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.classkit.php">Introduction</a></li><li><a href="classkit.setup.php">Installing/Configuring</a></li><li><a href="classkit.constants.php">Predefined Constants</a></li><li><a href="ref.classkit.php">Classkit Functions</a></li></ul></li><li><a href="book.ctype.php">Ctype</a> — Character type checking<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.ctype.php">Introduction</a></li><li><a href="ctype.setup.php">Installing/Configuring</a></li><li><a href="ctype.constants.php">Predefined Constants</a></li><li><a href="ref.ctype.php">Ctype Functions</a></li></ul></li><li><a href="book.filter.php">Filter</a> — Data Filtering<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.filter.php">Introduction</a></li><li><a href="filter.setup.php">Installing/Configuring</a></li><li><a href="filter.filters.php">Types of filters</a></li><li><a href="filter.constants.php">Predefined Constants</a></li><li><a href="filter.examples.php">Examples</a></li><li><a href="ref.filter.php">Filter Functions</a></li></ul></li><li><a href="book.funchand.php">Function Handling</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.funchand.php">Introduction</a></li><li><a href="funchand.setup.php">Installing/Configuring</a></li><li><a href="funchand.constants.php">Predefined Constants</a></li><li><a href="ref.funchand.php">Function handling Functions</a></li></ul></li><li><a href="book.objaggregation.php">Object Aggregation</a> — Object Aggregation/Composition [PHP 4]<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.objaggregation.php">Introduction</a></li><li><a href="objaggregation.examples.php">Examples</a></li><li><a href="ref.objaggregation.php">Object Aggregation Functions</a></li></ul></li><li><a href="book.quickhash.php">Quickhash</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.quickhash.php">Introduction</a></li><li><a href="quickhash.setup.php">Installing/Configuring</a></li><li><a href="quickhash.constants.php">Predefined Constants</a></li><li><a href="quickhash.examples.php">Examples</a></li><li><a href="class.quickhashintset.php">QuickHashIntSet</a> — The QuickHashIntSet class</li><li><a href="class.quickhashinthash.php">QuickHashIntHash</a> — The QuickHashIntHash class</li><li><a href="class.quickhashstringinthash.php">QuickHashStringIntHash</a> — The QuickHashStringIntHash class</li><li><a href="class.quickhashintstringhash.php">QuickHashIntStringHash</a> — The QuickHashIntStringHash class</li></ul></li><li><a href="book.reflection.php">Reflection</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.reflection.php">Introduction</a></li><li><a href="reflection.setup.php">Installing/Configuring</a></li><li><a href="reflection.constants.php">Predefined Constants</a></li><li><a href="reflection.examples.php">Examples</a></li><li><a href="reflection.extending.php">Extending</a></li><li><a href="class.reflection.php">Reflection</a> — The Reflection class</li><li><a href="class.reflectionclass.php">ReflectionClass</a> — The ReflectionClass class</li><li><a href="class.reflectionzendextension.php">ReflectionZendExtension</a> — The ReflectionZendExtension class</li><li><a href="class.reflectionextension.php">ReflectionExtension</a> — The ReflectionExtension class</li><li><a href="class.reflectionfunction.php">ReflectionFunction</a> — The ReflectionFunction class</li><li><a href="class.reflectionfunctionabstract.php">ReflectionFunctionAbstract</a> — The ReflectionFunctionAbstract class</li><li><a href="class.reflectionmethod.php">ReflectionMethod</a> — The ReflectionMethod class</li><li><a href="class.reflectionobject.php">ReflectionObject</a> — The ReflectionObject class</li><li><a href="class.reflectionparameter.php">ReflectionParameter</a> — The ReflectionParameter class</li><li><a href="class.reflectionproperty.php">ReflectionProperty</a> — The ReflectionProperty class</li><li><a href="class.reflector.php">Reflector</a> — The Reflector interface</li><li><a href="class.reflectionexception.php">ReflectionException</a> — The ReflectionException class</li></ul></li><li><a href="book.var.php">Variable handling</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.var.php">Introduction</a></li><li><a href="var.setup.php">Installing/Configuring</a></li><li><a href="var.constants.php">Predefined Constants</a></li><li><a href="ref.var.php">Variable handling Functions</a></li></ul></li></ul></div><?php manual_footer(); ?>