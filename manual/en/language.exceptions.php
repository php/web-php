<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/langref.inc";
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
    0 => 'language.exceptions.php',
    1 => 'Exceptions',
  ),
  'up' => 
  array (
    0 => 'langref.php',
    1 => 'Language Reference',
  ),
  'prev' => 
  array (
    0 => 'language.namespaces.faq.php',
    1 => 'FAQ: things you need to know about namespaces',
  ),
  'next' => 
  array (
    0 => 'language.exceptions.extending.php',
    1 => 'Extending Exceptions',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/language.exceptions.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="language.exceptions" class="chapter">
  <h1>Exceptions</h1>
<h2>Table of Contents</h2><ul class="chunklist chunklist_chapter"><li><a href="language.exceptions.extending.php">Extending Exceptions</a></li></ul>


  <p class="para">
   PHP 5 has an exception model similar to that of other programming languages.
   An exception can be <em>throw</em>n, and caught
   (&quot;<em>catch</em>ed&quot;) within PHP. Code may be surrounded in a
   <em>try</em> block, to facilitate the catching of potential
   exceptions. Each <em>try</em> must have at least one
   corresponding <em>catch</em> block. Multiple
   <em>catch</em> blocks can be used to catch different classes of
   exceptions. Normal execution (when no exception is thrown within the
   <em>try</em> block, or when a <em>catch</em> matching
   the thrown exception&#039;s class is not present) will continue after that last
   <em>catch</em> block defined in sequence. Exceptions can be
   <em>throw</em>n (or re-thrown) within a <em>catch</em> block.
  </p>
  <p class="para">
   When an exception is thrown, code following the statement will not be
   executed, and PHP will attempt to find the first matching
   <em>catch</em> block. If an
   exception is not caught, a PHP Fatal Error will be issued with an
   &quot;<em>Uncaught Exception ...</em>&quot; message, unless a handler has
   been defined with  <span class="function"><a href="function.set-exception-handler.php" class="function">set_exception_handler()</a></span>.
  </p>
  <p class="para">
   In PHP 5.5 and later, a <em>finally</em> block may also be
   specified after the <em>catch</em> blocks. Code within the
   <em>finally</em> block will always be executed after the
   <em>try</em> and <em>catch</em> blocks, regardless of
   whether an exception has been thrown, and before normal execution resumes.
  </p>
  <p class="para">
   The thrown object must be an instance of the <a href="class.exception.php" class="classname">Exception</a>
   class or a subclass of <a href="class.exception.php" class="classname">Exception</a>. Trying to throw an
   object that is not will result in a PHP Fatal Error.
  </p>
  <blockquote class="note"><p><strong class="note">Note</strong>: 
   <p class="para">
    Internal PHP functions mainly use
    <a href="errorfunc.configuration.php#ini.error-reporting" class="link">Error reporting</a>, only modern
    <a href="language.oop5.php" class="link">Object oriented</a>
    extensions use exceptions. However, errors can be simply translated to
    exceptions with <a href="class.errorexception.php" class="link">ErrorException</a>.
   </p>
  </p></blockquote>
  <div class="tip"><strong class="tip">Tip</strong>
   <p class="para">
    The <a href="intro.spl.php" class="link">Standard PHP Library (SPL)</a> provides a
    good number of <a href="spl.exceptions.php" class="link">built-in exceptions</a>.
   </p>
  </div>
   <div class="example" id="example-269">
    <p><strong>Example #1 Throwing an Exception</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">Exception</span><span style="color: #007700">(</span><span style="color: #DD0000">'Division&nbsp;by&nbsp;zero.'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">/</span><span style="color: #0000BB">$x</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">5</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'Caught&nbsp;exception:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}<br><br></span><span style="color: #FF8000">//&nbsp;Continue&nbsp;execution<br></span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"Hello&nbsp;World\n"</span><span style="color: #007700">;<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>The above example will output:</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
0.2
Caught exception: Division by zero.
Hello World
</pre></div>
    </div>
   </div>
   <div class="example" id="example-270">
    <p><strong>Example #2 Exception handling with a <em>finally</em> block</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">Exception</span><span style="color: #007700">(</span><span style="color: #DD0000">'Division&nbsp;by&nbsp;zero.'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">/</span><span style="color: #0000BB">$x</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">5</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'Caught&nbsp;exception:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;</span><span style="color: #0000BB">finally&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"First&nbsp;finally.\n"</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'Caught&nbsp;exception:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;</span><span style="color: #0000BB">finally&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"Second&nbsp;finally.\n"</span><span style="color: #007700">;<br>}<br><br></span><span style="color: #FF8000">//&nbsp;Continue&nbsp;execution<br></span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"Hello&nbsp;World\n"</span><span style="color: #007700">;<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>The above example will output:</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
0.2
First finally.
Caught exception: Division by zero.
Second finally.
Hello World
</pre></div>
    </div>
   </div>
   <div class="example" id="example-271">
    <p><strong>Example #3 Nested Exception</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br><br></span><span style="color: #007700">class&nbsp;</span><span style="color: #0000BB">MyException&nbsp;</span><span style="color: #007700">extends&nbsp;</span><span style="color: #0000BB">Exception&nbsp;</span><span style="color: #007700">{&nbsp;}<br><br>class&nbsp;</span><span style="color: #0000BB">Test&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">testing</span><span style="color: #007700">()&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">MyException</span><span style="color: #007700">(</span><span style="color: #DD0000">'foo!'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">MyException&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;rethrow&nbsp;it<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">throw&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">());<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>}<br><br></span><span style="color: #0000BB">$foo&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Test</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$foo</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">testing</span><span style="color: #007700">();<br><br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>The above example will output:</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
string(4) &quot;foo!&quot;
</pre></div>
    </div>
   </div>
   
  

 </div>
<?php manual_footer(); ?>