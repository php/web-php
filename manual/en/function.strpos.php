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
  'alternatives' => 
  array (
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
  <p class="verinfo">(PHP 4, PHP 5)</p><p class="refpurpose"><span class="refname">strpos</span> &mdash; <span class="dc-title">Find the position of the first occurrence of a substring in a string</span></p>

 </div>
 
 <div class="refsect1 description" id="refsect1-function.strpos-description">
  <h3 class="title">Description</h3>
  <div class="methodsynopsis dc-description">
   <span class="type"><a href="language.pseudo-types.php#language.types.mixed" class="type mixed">mixed</a></span> <span class="methodname"><strong>strpos</strong></span>
    ( <span class="methodparam"><span class="type">string</span> <code class="parameter">$haystack</code></span>
   , <span class="methodparam"><span class="type"><a href="language.pseudo-types.php#language.types.mixed" class="type mixed">mixed</a></span> <code class="parameter">$needle</code></span>
   [, <span class="methodparam"><span class="type">int</span> <code class="parameter">$offset</code><span class="initializer"> = 0</span></span>
  ] )</div>

  <p class="para rdfs-comment">
   Find the numeric position of the first occurrence of
   <em><code class="parameter">needle</code></em> in the <em><code class="parameter">haystack</code></em> string.
  </p>
 </div>


 <div class="refsect1 parameters" id="refsect1-function.strpos-parameters">
  <h3 class="title">Parameters</h3>
  <p class="para">
   <dl>

    <dt>

     <span class="term"><em><code class="parameter">haystack</code></em></span>
     <dd>

      <p class="para">
       The string to search in.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><em><code class="parameter">needle</code></em></span>
     <dd>

      <p class="para">
       If <em><code class="parameter">needle</code></em> is not a string, it is converted
       to an integer and applied as the ordinal value of a character.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><em><code class="parameter">offset</code></em></span>
     <dd>

      <p class="para">
       If specified, search will start this number of characters counted from
       the beginning of the string. Unlike  <span class="function"><a href="function.strrpos.php" class="function">strrpos()</a></span> and
        <span class="function"><a href="function.strripos.php" class="function">strripos()</a></span>, the offset cannot be negative.
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>


 <div class="refsect1 returnvalues" id="refsect1-function.strpos-returnvalues">
  <h3 class="title">Return Values</h3>
  <p class="para">
   Returns the position of where the needle exists relative to the beginning of
   the <em><code class="parameter">haystack</code></em> string (independent of offset).
   Also note that string positions start at 0, and not 1.
  </p>
  <p class="para">
   Returns <strong><code>FALSE</code></strong> if the needle was not found.
  </p>
  <div class="warning"><strong class="warning">Warning</strong><p class="simpara">This function may
return Boolean <strong><code>FALSE</code></strong>, but may also return a non-Boolean value which
evaluates to <strong><code>FALSE</code></strong>. Please read the section on <a href="language.types.boolean.php" class="link">Booleans</a> for more
information. Use <a href="language.operators.comparison.php" class="link">the ===
operator</a> for testing the return value of this
function.</p></div>
 </div>


 <div class="refsect1 examples" id="refsect1-function.strpos-examples">
  <h3 class="title">Examples</h3>
  <p class="para">
   <div class="example" id="example-4886">
    <p><strong>Example #1 Using <em>===</em></strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br>$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;Note&nbsp;our&nbsp;use&nbsp;of&nbsp;===.&nbsp;&nbsp;Simply&nbsp;==&nbsp;would&nbsp;not&nbsp;work&nbsp;as&nbsp;expected<br>//&nbsp;because&nbsp;the&nbsp;position&nbsp;of&nbsp;'a'&nbsp;was&nbsp;the&nbsp;0th&nbsp;(first)&nbsp;character.<br></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;not&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br>}&nbsp;else&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;and&nbsp;exists&nbsp;at&nbsp;position&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">"</span><span style="color: #007700">;<br>}<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example" id="example-4887">
    <p><strong>Example #2 Using !==</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br>$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;The&nbsp;!==&nbsp;operator&nbsp;can&nbsp;also&nbsp;be&nbsp;used.&nbsp;&nbsp;Using&nbsp;!=&nbsp;would&nbsp;not&nbsp;work&nbsp;as&nbsp;expected<br>//&nbsp;because&nbsp;the&nbsp;position&nbsp;of&nbsp;'a'&nbsp;is&nbsp;0.&nbsp;The&nbsp;statement&nbsp;(0&nbsp;!=&nbsp;false)&nbsp;evaluates&nbsp;<br>//&nbsp;to&nbsp;false.<br></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">!==&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;and&nbsp;exists&nbsp;at&nbsp;position&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">"</span><span style="color: #007700">;<br>}&nbsp;else&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"The&nbsp;string&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;was&nbsp;not&nbsp;found&nbsp;in&nbsp;the&nbsp;string&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br>}<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example" id="example-4888">
    <p><strong>Example #3 Using an offset</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #FF8000">//&nbsp;We&nbsp;can&nbsp;search&nbsp;for&nbsp;the&nbsp;character,&nbsp;ignoring&nbsp;anything&nbsp;before&nbsp;the&nbsp;offset<br></span><span style="color: #0000BB">$newstring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abcdef&nbsp;abcdef'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$newstring</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">//&nbsp;$pos&nbsp;=&nbsp;7,&nbsp;not&nbsp;0<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 notes" id="refsect1-function.strpos-notes">
  <h3 class="title">Notes</h3>
  <blockquote class="note"><p><strong class="note">Note</strong>: <span class="simpara">This function is
binary-safe.</span></p></blockquote>
 </div>


 <div class="refsect1 seealso" id="refsect1-function.strpos-seealso">
  <h3 class="title">See Also</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"> <span class="function"><a href="function.stripos.php" class="function" rel="rdfs-seeAlso">stripos()</a> - Find the position of the first occurrence of a case-insensitive substring in a string</span></li>
    <li class="member"> <span class="function"><a href="function.strrpos.php" class="function" rel="rdfs-seeAlso">strrpos()</a> - Find the position of the last occurrence of a substring in a string</span></li>
    <li class="member"> <span class="function"><a href="function.strripos.php" class="function" rel="rdfs-seeAlso">strripos()</a> - Find the position of the last occurrence of a case-insensitive substring in a string</span></li>
    <li class="member"> <span class="function"><a href="function.strstr.php" class="function" rel="rdfs-seeAlso">strstr()</a> - Find the first occurrence of a string</span></li>
    <li class="member"> <span class="function"><a href="function.strpbrk.php" class="function" rel="rdfs-seeAlso">strpbrk()</a> - Search a string for any of a set of characters</span></li>
    <li class="member"> <span class="function"><a href="function.substr.php" class="function" rel="rdfs-seeAlso">substr()</a> - Return part of a string</span></li>
    <li class="member"> <span class="function"><a href="function.preg-match.php" class="function" rel="rdfs-seeAlso">preg_match()</a> - Perform a regular expression match</span></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>