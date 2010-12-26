<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/ref.strings.inc";
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
    0 => 'function.strpos.php',
    1 => 'strpos',
  ),
  'up' => 
  array (
    0 => 'ref.strings.php',
    1 => 'String Functions',
  ),
  'prev' => 
  array (
    0 => 'function.strpbrk.php',
    1 => 'strpbrk',
  ),
  'next' => 
  array (
    0 => 'function.strrchr.php',
    1 => 'strrchr',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="function.strpos" class="refentry">
 <div class="refnamediv">
  <h1 class="refname">strpos</h1>
  <p class="verinfo">(PHP 4, PHP 5)</p><p class="refpurpose"><span class="refname">strpos</span> &mdash; <span class="dc-title">Find position of first occurrence of a string</span></p>

 </div>
 
 <div class="refsect1 description">
  <h3 class="title">Description</h3>
  <div class="methodsynopsis dc-description">
   <span class="type">int</span> <span class="methodname"><b>strpos</b></span>
    ( <span class="methodparam"><span class="type">string</span> <tt class="parameter">$haystack</tt></span>
   , <span class="methodparam"><span class="type"><a href="language.pseudo-types.php#language.types.mixed" class="type mixed">mixed</a></span> <tt class="parameter">$needle</tt></span>
   [, <span class="methodparam"><span class="type">int</span> <tt class="parameter">$offset</tt><span class="initializer"> = 0</span></span>
  ] )</div>

  <p class="para rdfs-comment">
   Returns the numeric position of the first occurrence of
   <i><tt class="parameter">needle</tt></i> in the <i><tt class="parameter">haystack</tt></i>
   string.  Unlike the <span class="function"><a href="function.strrpos.php" class="function">strrpos()</a></span> before PHP 5, this
   function can take a full string as the <i><tt class="parameter">needle</tt></i>
   parameter and the entire string will be used.
  </p>
 </div>


 <div class="refsect1 parameters">
  <h3 class="title">Parameters</h3>
  <p class="para">
   <dl>

    <dt>

     <span class="term"><i><tt class="parameter">haystack</tt></i></span>
     <dd>

      <p class="para">
       The string to search in
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">needle</tt></i></span>
     <dd>

      <p class="para">
       If <i><tt class="parameter">needle</tt></i> is not a string, it is converted
       to an integer and applied as the ordinal value of a character.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">offset</tt></i></span>
     <dd>

      <p class="para">
       The optional <i><tt class="parameter">offset</tt></i> parameter allows you
       to specify which character in <i><tt class="parameter">haystack</tt></i> to
       start searching. The position returned is still relative to the
       beginning of <i><tt class="parameter">haystack</tt></i>.
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>


 <div class="refsect1 returnvalues">
  <h3 class="title">Return Values</h3>
  <p class="para">
   Returns the position as an integer. If <i><tt class="parameter">needle</tt></i> is
   not found, <span class="function"><b>strpos()</b></span> will return <span class="type"><a href="language.types.boolean.php" class="type boolean">boolean</a></span>
   <b><tt>FALSE</tt></b>.
  </p>
  <div class="warning"><b class="warning">Warning</b><p class="simpara">This function may
return Boolean <b><tt>FALSE</tt></b>, but may also return a non-Boolean value which
evaluates to <b><tt>FALSE</tt></b>, such as <i>0</i> or
&quot;&quot;. Please read the section on <a href="language.types.boolean.php" class="link">Booleans</a> for more
information. Use <a href="language.operators.comparison.php" class="link">the ===
operator</a> for testing the return value of this
function.</p></div>
 </div>


 <div class="refsect1 examples">
  <h3 class="title">Examples</h3>
  <p class="para">
   <div class="example">
    <p><b>Example #1 Using <i>===</i></b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;Note&nbsp;our&nbsp;use&nbsp;of&nbsp;===.&nbsp;&nbsp;Simply&nbsp;==&nbsp;would&nbsp;not&nbsp;work&nbsp;as&nbsp;expected<br />//&nbsp;because&nbsp;the&nbsp;position&nbsp;of&nbsp;'a'&nbsp;was&nbsp;the&nbsp;0th&nbsp;(first)&nbsp;character.<br /></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;not&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br />}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;and&nbsp;exists&nbsp;at&nbsp;position&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">"</span><span style="color: #007700">;<br />}<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example">
    <p><b>Example #2 Using !==</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;The&nbsp;!==&nbsp;operator&nbsp;can&nbsp;also&nbsp;be&nbsp;used.&nbsp;&nbsp;Using&nbsp;!=&nbsp;would&nbsp;not&nbsp;work&nbsp;as&nbsp;expected<br />//&nbsp;because&nbsp;the&nbsp;position&nbsp;of&nbsp;'a'&nbsp;is&nbsp;0.&nbsp;The&nbsp;statement&nbsp;(0&nbsp;!=&nbsp;false)&nbsp;evaluates&nbsp;<br />//&nbsp;to&nbsp;false.<br /></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">!==&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;and&nbsp;exists&nbsp;at&nbsp;position&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">"</span><span style="color: #007700">;<br />}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;not&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br />}<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example">
    <p><b>Example #3 Using an offset</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//&nbsp;We&nbsp;can&nbsp;search&nbsp;for&nbsp;the&nbsp;character,&nbsp;ignoring&nbsp;anything&nbsp;before&nbsp;the&nbsp;offset<br /></span><span style="color: #0000BB">$newstring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abcdef&nbsp;abcdef'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$newstring</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">//&nbsp;$pos&nbsp;=&nbsp;7,&nbsp;not&nbsp;0<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 notes">
  <h3 class="title">Notes</h3>
  <blockquote><p><b class="note">Note</b>: <span class="simpara">This function is
binary-safe.</span></p></blockquote>
 </div>


 <div class="refsect1 seealso">
  <h3 class="title">See Also</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"><span class="function"><a href="function.strrpos.php" class="function" rel="rdfs-seeAlso">strrpos()</a> - Find the position of the last occurrence of a substring in a string</span></li>
    <li class="member"><span class="function"><a href="function.stripos.php" class="function" rel="rdfs-seeAlso">stripos()</a> - Find position of first occurrence of a case-insensitive string</span></li>
    <li class="member"><span class="function"><a href="function.strripos.php" class="function" rel="rdfs-seeAlso">strripos()</a> - Find position of last occurrence of a case-insensitive string in a string</span></li>
    <li class="member"><span class="function"><a href="function.strrchr.php" class="function" rel="rdfs-seeAlso">strrchr()</a> - Find the last occurrence of a character in a string</span></li>
    <li class="member"><span class="function"><a href="function.substr.php" class="function" rel="rdfs-seeAlso">substr()</a> - Return part of a string</span></li>
    <li class="member"><span class="function"><a href="function.stristr.php" class="function" rel="rdfs-seeAlso">stristr()</a> - Case-insensitive strstr</span></li>
    <li class="member"><span class="function"><a href="function.strstr.php" class="function" rel="rdfs-seeAlso">strstr()</a> - Find first occurrence of a string</span></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>