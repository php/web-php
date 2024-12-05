<?php
include_once __DIR__ . '/../../include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once __DIR__ ."/toc/ref.strings.inc";
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
    0 => 'function.rtrim.php',
    1 => 'rtrim',
  ),
  'up' =>
  array (
    0 => 'ref.strings.php',
    1 => 'String Functions',
  ),
  'prev' =>
  array (
    0 => 'function.strpos.php',
    1 => 'strpos',
  ),
  'alternatives' =>
  array (
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

?>
<div id="function.rtrim" class="refentry">
    <div class="refnamediv">
        <h1 class="refname">rtrim</h1>
        <p class="verinfo">(PHP 4, PHP 5, PHP 7, PHP 8)</p><p class="refpurpose"><span class="refname">rtrim</span> &mdash; <span class="dc-title">Strip whitespace (or other characters) from the end of a string</span></p>

    </div>

    <div class="refsect1 description" id="refsect1-function.rtrim-description">
        <h3 class="title">Description</h3>
        <div class="methodsynopsis dc-description">
            <span class="methodname"><strong>rtrim</strong></span>(<span class="methodparam"><span class="type"><a href="language.types.string.php" class="type string">string</a></span> <code class="parameter">$string</code></span>, <span class="methodparam"><span class="type"><a href="language.types.string.php" class="type string">string</a></span> <code class="parameter">$characters</code><span class="initializer"> = &quot; \n\r\t\v\x00&quot;</span></span>): <span class="type"><a href="language.types.string.php" class="type string">string</a></span></div>

        <p class="simpara">
            This function returns a string with whitespace (or other characters) stripped from the
            end of <code class="parameter">string</code>.
        </p>
        <p class="simpara">
            Without the second parameter,
            <span class="function"><strong>rtrim()</strong></span> will strip these characters:
        </p>

        <ul class="itemizedlist">
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot; &quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>SP</abbr> character
      <code class="literal">0x20</code>, an ordinary space.
     </span>
            </li>
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot;\t&quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>HT</abbr> character
      <code class="literal">0x09</code>, a tab.
     </span>
            </li>
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot;\n&quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>LF</abbr> character
      <code class="literal">0x0A</code>, a new line (line feed).
     </span>
            </li>
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot;\r&quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>CR</abbr> character
      <code class="literal">0x0D</code>, a carriage return.
     </span>
            </li>
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot;\0&quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>NUL</abbr> character
      <code class="literal">0x00</code>, the NUL-byte.
     </span>
            </li>
            <li class="listitem">
     <span class="simpara">
      <code class="literal">&quot;\v&quot;</code>: <abbr title="American Standard Code for Information Interchange">ASCII</abbr> <abbr>VT</abbr>
      character <code class="literal">0x0B</code>, a vertical tab.
     </span>
            </li>
        </ul>

    </div>


    <div class="refsect1 parameters" id="refsect1-function.rtrim-parameters">
        <h3 class="title">Parameters</h3>
        <dl>

            <dt><code class="parameter">string</code></dt>
            <dd>
     <span class="simpara">
      The input string.
     </span>
            </dd>


            <dt><code class="parameter">characters</code></dt>
            <dd>

 <span class="simpara">
  Optionally, the stripped characters can also be specified using
  the <code class="parameter">characters</code> parameter.
  Simply list all characters that need to be stripped.
  With <code class="literal">..</code> it is possible to specify an incrementing range of characters.
 </span>

            </dd>

        </dl>
    </div>


    <div class="refsect1 returnvalues" id="refsect1-function.rtrim-returnvalues">
        <h3 class="title">Return Values</h3>
        <p class="simpara">
            Returns the modified string.
        </p>
    </div>


    <div class="refsect1 examples" id="refsect1-function.rtrim-examples">
        <h3 class="title">Examples</h3>
        <div class="example" id="example-4971">
            <p><strong>Example #1 Usage example of <span class="function"><strong>rtrim()</strong></span></strong></p>
            <div class="example-contents">
                <div class="phpcode"><code><span style="color: #000000"><span style="color: #0000BB">&lt;?php<br /><br />$text </span><span style="color: #007700">= </span><span style="color: #DD0000">"\t\tThese are a few words :) ...  "</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$binary </span><span style="color: #007700">= </span><span style="color: #DD0000">"\x09Example string\x0A"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$hello  </span><span style="color: #007700">= </span><span style="color: #DD0000">"Hello World"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$text</span><span style="color: #007700">, </span><span style="color: #0000BB">$binary</span><span style="color: #007700">, </span><span style="color: #0000BB">$hello</span><span style="color: #007700">);<br /><br />print </span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br /><br /></span><span style="color: #0000BB">$trimmed </span><span style="color: #007700">= </span><span style="color: #0000BB">rtrim</span><span style="color: #007700">(</span><span style="color: #0000BB">$text</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$trimmed</span><span style="color: #007700">);<br /><br /></span><span style="color: #0000BB">$trimmed </span><span style="color: #007700">= </span><span style="color: #0000BB">rtrim</span><span style="color: #007700">(</span><span style="color: #0000BB">$text</span><span style="color: #007700">, </span><span style="color: #DD0000">" \t."</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$trimmed</span><span style="color: #007700">);<br /><br /></span><span style="color: #0000BB">$trimmed </span><span style="color: #007700">= </span><span style="color: #0000BB">rtrim</span><span style="color: #007700">(</span><span style="color: #0000BB">$hello</span><span style="color: #007700">, </span><span style="color: #DD0000">"Hdle"</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$trimmed</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">// trim the ASCII control characters at the end of $binary<br />// (from 0 to 31 inclusive)<br /></span><span style="color: #0000BB">$clean </span><span style="color: #007700">= </span><span style="color: #0000BB">rtrim</span><span style="color: #007700">(</span><span style="color: #0000BB">$binary</span><span style="color: #007700">, </span><span style="color: #DD0000">"\x00..\x1F"</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$clean</span><span style="color: #007700">);<br /><br /></span><span style="color: #0000BB">?&gt;</span></span></code></div>
            </div>

            <div class="example-contents"><p>The above example will output:</p></div>
            <div class="example-contents screen">
                <div class="examplescode"><pre class="examplescode">string(32) &quot;        These are a few words :) ...  &quot;
string(16) &quot;    Example string
&quot;
string(11) &quot;Hello World&quot;

string(30) &quot;        These are a few words :) ...&quot;
string(26) &quot;        These are a few words :)&quot;
string(9) &quot;Hello Wor&quot;
string(15) &quot;    Example string&quot;</pre>
                </div>
            </div>
        </div>
        <div class="example" id="similar_text.example.swapping">
            <p><strong>Example #1 <span class="function"><strong>similar_text()</strong></span> argument swapping example</strong></p>
            <div class="example-contents"><p>
                    This example shows that swapping the <code class="parameter">string1</code> and
                    <code class="parameter">string2</code> argument may yield different results.
                </p></div>
            <div class="example-contents">
                <div class="phpcode"><code><span style="color: #000000"><span style="color: #0000BB">&lt;?php<br />$sim </span><span style="color: #007700">= </span><span style="color: #0000BB">similar_text</span><span style="color: #007700">(</span><span style="color: #DD0000">'bafoobar'</span><span style="color: #007700">, </span><span style="color: #DD0000">'barfoo'</span><span style="color: #007700">, </span><span style="color: #0000BB">$perc</span><span style="color: #007700">);<br />echo </span><span style="color: #DD0000">"similarity: </span><span style="color: #0000BB">$sim</span><span style="color: #DD0000"> (</span><span style="color: #0000BB">$perc</span><span style="color: #DD0000"> %)\n"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$sim </span><span style="color: #007700">= </span><span style="color: #0000BB">similar_text</span><span style="color: #007700">(</span><span style="color: #DD0000">'barfoo'</span><span style="color: #007700">, </span><span style="color: #DD0000">'bafoobar'</span><span style="color: #007700">, </span><span style="color: #0000BB">$perc</span><span style="color: #007700">);<br />echo </span><span style="color: #DD0000">"similarity: </span><span style="color: #0000BB">$sim</span><span style="color: #DD0000"> (</span><span style="color: #0000BB">$perc</span><span style="color: #DD0000"> %)\n"</span><span style="color: #007700">;</span></span></code></div>
            </div>

            <div class="example-contents"><p>The above example will output
                    something similar to:</p></div>
            <div class="example-contents screen">
                <div class="examplescode"><pre class="examplescode">similarity: 5 (71.428571428571 %)
similarity: 3 (42.857142857143 %)</pre>
                </div>
            </div>
        </div>
    </div>


    <div class="refsect1 seealso" id="refsect1-function.rtrim-seealso">
        <h3 class="title">See Also</h3>
        <ul class="simplelist">
            <li><span class="function"><a href="function.trim.php" class="function" rel="rdfs-seeAlso">trim()</a> - Strip whitespace (or other characters) from the beginning and end of a string</span></li>
            <li><span class="function"><a href="function.ltrim.php" class="function" rel="rdfs-seeAlso">ltrim()</a> - Strip whitespace (or other characters) from the beginning of a string</span></li>
        </ul>
    </div>
</div><?php manual_footer([]); ?>
