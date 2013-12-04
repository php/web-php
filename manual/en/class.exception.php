<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/reserved.exceptions.inc";
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
    0 => 'class.exception.php',
    1 => 'Exception',
  ),
  'up' => 
  array (
    0 => 'reserved.exceptions.php',
    1 => 'Predefined Exceptions',
  ),
  'prev' => 
  array (
    0 => 'reserved.exceptions.php',
    1 => 'Predefined Exceptions',
  ),
  'next' => 
  array (
    0 => 'exception.construct.php',
    1 => 'Exception::__construct',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/class.exception.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="class.exception" class="reference">
 <h1 class="title">Exception</h1>
 
 
 <div class="partintro"><p class="verinfo">(PHP 5 &gt;= 5.1.0)</p>
 

  <div class="section" id="exception.intro">
   <h2 class="title">Introduction</h2>
   <p class="para">
    <span class="ooclass"><strong class="classname">Exception</strong></span> is the base class for
    all Exceptions.
   </p>
  </div>

 
  <div class="section" id="exception.synopsis">
   <h2 class="title">Class synopsis</h2>
 

   <div class="classsynopsis">
    <div class="ooclass"></div>
 

    <div class="classsynopsisinfo">
     <span class="ooclass">
      <strong class="classname">Exception</strong>
     </span>
     {</div>

 
    <div class="classsynopsisinfo classsynopsisinfo_comment">/* Properties */</div>
    <div class="fieldsynopsis">
     <span class="modifier">protected</span>
     <span class="type">string</span>
      <var class="varname"><a href="class.exception.php#exception.props.message">$<var class="varname">message</var></a></var>
    ;</div>

    <div class="fieldsynopsis">
     <span class="modifier">protected</span>
     <span class="type">int</span>
      <var class="varname"><a href="class.exception.php#exception.props.code">$<var class="varname">code</var></a></var>
    ;</div>

    <div class="fieldsynopsis">
     <span class="modifier">protected</span>
     <span class="type">string</span>
      <var class="varname"><a href="class.exception.php#exception.props.file">$<var class="varname">file</var></a></var>
    ;</div>

    <div class="fieldsynopsis">
     <span class="modifier">protected</span>
     <span class="type">int</span>
      <var class="varname"><a href="class.exception.php#exception.props.line">$<var class="varname">line</var></a></var>
    ;</div>


    <div class="classsynopsisinfo classsynopsisinfo_comment">/* Methods */</div>
    <div class="constructorsynopsis dc-description">
   <span class="modifier">public</span>  <span class="methodname"><a href="exception.construct.php" class="methodname">__construct</a></span>
    ([ <span class="methodparam"><span class="type">string</span> <code class="parameter">$message</code><span class="initializer"> = &quot;&quot;</span></span>
   [, <span class="methodparam"><span class="type">int</span> <code class="parameter">$code</code><span class="initializer"> = 0</span></span>
   [, <span class="methodparam"><span class="type"><a href="class.exception.php" class="type Exception">Exception</a></span> <code class="parameter">$previous</code><span class="initializer"> = <strong><code>NULL</code></strong></span></span>
  ]]] )</div>

    <div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">string</span> <span class="methodname"><a href="exception.getmessage.php" class="methodname">getMessage</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">Exception</span> <span class="methodname"><a href="exception.getprevious.php" class="methodname">getPrevious</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">mixed</span> <span class="methodname"><a href="exception.getcode.php" class="methodname">getCode</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">string</span> <span class="methodname"><a href="exception.getfile.php" class="methodname">getFile</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">int</span> <span class="methodname"><a href="exception.getline.php" class="methodname">getLine</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">array</span> <span class="methodname"><a href="exception.gettrace.php" class="methodname">getTrace</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">public</span> <span class="type">string</span> <span class="methodname"><a href="exception.gettraceasstring.php" class="methodname">getTraceAsString</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">public</span> <span class="type">string</span>  <span class="methodname"><a href="exception.tostring.php" class="methodname">__toString</a></span>
    ( <span class="methodparam">void</span>
   )</div>
<div class="methodsynopsis dc-description">
   <span class="modifier">final</span> <span class="modifier">private</span> <span class="type">void</span> <span class="methodname"><a href="exception.clone.php" class="methodname">__clone</a></span>
    ( <span class="methodparam">void</span>
   )</div>

   }</div>
 

 
  </div>
 

  <div class="section" id="exception.props">
   <h2 class="title">Properties</h2>
   <dl>

    <dt id="exception.props.message">
     <span class="term"><var class="varname"><var class="varname">message</var></var></span>
     <dd>

      <p class="para">The exception message</p>
     </dd>

    </dt>

    <dt id="exception.props.code">
     <span class="term"><var class="varname"><var class="varname">code</var></var></span>
     <dd>

      <p class="para">The exception code</p>
     </dd>

    </dt>

    <dt id="exception.props.file">
     <span class="term"><var class="varname"><var class="varname">file</var></var></span>
     <dd>

      <p class="para">The filename where the exception was created</p>
     </dd>

    </dt>

    <dt id="exception.props.line">
     <span class="term"><var class="varname"><var class="varname">line</var></var></span>
     <dd>

      <p class="para">The line where the exception was created</p>
     </dd>

    </dt>

   </dl>

  </div>

 
 </div>
 
 



 



 



 



 



 



 



 



 



 



 



 



 







 



 



 



 



 



 



 
<h2>Table of Contents</h2><ul class="chunklist chunklist_reference"><li><a href="exception.construct.php">Exception::__construct</a> — Construct the exception</li><li><a href="exception.getmessage.php">Exception::getMessage</a> — Gets the Exception message</li><li><a href="exception.getprevious.php">Exception::getPrevious</a> — Returns previous Exception</li><li><a href="exception.getcode.php">Exception::getCode</a> — Gets the Exception code</li><li><a href="exception.getfile.php">Exception::getFile</a> — Gets the file in which the exception occurred</li><li><a href="exception.getline.php">Exception::getLine</a> — Gets the line in which the exception occurred</li><li><a href="exception.gettrace.php">Exception::getTrace</a> — Gets the stack trace</li><li><a href="exception.gettraceasstring.php">Exception::getTraceAsString</a> — Gets the stack trace as a string</li><li><a href="exception.tostring.php">Exception::__toString</a> — String representation of the exception</li><li><a href="exception.clone.php">Exception::__clone</a> — Clone the exception</li></ul>
</div>
<?php manual_footer(); ?>