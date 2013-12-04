<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/refs.basic.vartype.inc";
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
    0 => 'book.var.php',
    1 => 'Variable handling',
  ),
  'up' => 
  array (
    0 => 'refs.basic.vartype.php',
    1 => 'Variable and Type Related Extensions',
  ),
  'prev' => 
  array (
    0 => 'class.reflectionexception.php',
    1 => 'ReflectionException',
  ),
  'next' => 
  array (
    0 => 'intro.var.php',
    1 => 'Introduction',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/book.var.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="book.var" class="book">
 
 <h1 class="title">Variable handling</h1>

 

 







 







 








<ul class="chunklist chunklist_book"><li><a href="intro.var.php">Introduction</a></li><li><a href="var.setup.php">Installing/Configuring</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="var.requirements.php">Requirements</a></li><li><a href="var.installation.php">Installation</a></li><li><a href="var.configuration.php">Runtime Configuration</a></li><li><a href="var.resources.php">Resource Types</a></li></ul></li><li><a href="var.constants.php">Predefined Constants</a></li><li><a href="ref.var.php">Variable handling Functions</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="function.boolval.php">boolval</a> — Get the boolean value of a variable</li><li><a href="function.debug-zval-dump.php">debug_zval_dump</a> — Dumps a string representation of an internal zend value to output</li><li><a href="function.doubleval.php">doubleval</a> — Alias of floatval</li><li><a href="function.empty.php">empty</a> — Determine whether a variable is empty</li><li><a href="function.floatval.php">floatval</a> — Get float value of a variable</li><li><a href="function.get-defined-vars.php">get_defined_vars</a> — Returns an array of all defined variables</li><li><a href="function.get-resource-type.php">get_resource_type</a> — Returns the resource type</li><li><a href="function.gettype.php">gettype</a> — Get the type of a variable</li><li><a href="function.import-request-variables.php">import_request_variables</a> — Import GET/POST/Cookie variables into the global scope</li><li><a href="function.intval.php">intval</a> — Get the integer value of a variable</li><li><a href="function.is-array.php">is_array</a> — Finds whether a variable is an array</li><li><a href="function.is-bool.php">is_bool</a> — Finds out whether a variable is a boolean</li><li><a href="function.is-callable.php">is_callable</a> — Verify that the contents of a variable can be called as a function</li><li><a href="function.is-double.php">is_double</a> — Alias of is_float</li><li><a href="function.is-float.php">is_float</a> — Finds whether the type of a variable is float</li><li><a href="function.is-int.php">is_int</a> — Find whether the type of a variable is integer</li><li><a href="function.is-integer.php">is_integer</a> — Alias of is_int</li><li><a href="function.is-long.php">is_long</a> — Alias of is_int</li><li><a href="function.is-null.php">is_null</a> — Finds whether a variable is NULL</li><li><a href="function.is-numeric.php">is_numeric</a> — Finds whether a variable is a number or a numeric string</li><li><a href="function.is-object.php">is_object</a> — Finds whether a variable is an object</li><li><a href="function.is-real.php">is_real</a> — Alias of is_float</li><li><a href="function.is-resource.php">is_resource</a> — Finds whether a variable is a resource</li><li><a href="function.is-scalar.php">is_scalar</a> — Finds whether a variable is a scalar</li><li><a href="function.is-string.php">is_string</a> — Find whether the type of a variable is string</li><li><a href="function.isset.php">isset</a> — Determine if a variable is set and is not NULL</li><li><a href="function.print-r.php">print_r</a> — Prints human-readable information about a variable</li><li><a href="function.serialize.php">serialize</a> — Generates a storable representation of a value</li><li><a href="function.settype.php">settype</a> — Set the type of a variable</li><li><a href="function.strval.php">strval</a> — Get string value of a variable</li><li><a href="function.unserialize.php">unserialize</a> — Creates a PHP value from a stored representation</li><li><a href="function.unset.php">unset</a> — Unset a given variable</li><li><a href="function.var-dump.php">var_dump</a> — Dumps information about a variable</li><li><a href="function.var-export.php">var_export</a> — Outputs or returns a parsable string representation of a variable</li></ul></li></ul></div><?php manual_footer(); ?>