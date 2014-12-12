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
    1 => 'ja',
  ),
  'this' => 
  array (
    0 => 'function.strpos.php',
    1 => 'strpos',
  ),
  'up' => 
  array (
    0 => 'ref.strings.php',
    1 => 'String 関数',
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
  <p class="verinfo">(PHP 4, PHP 5)</p><p class="refpurpose"><span class="refname">strpos</span> &mdash; <span class="dc-title">文字列内の部分文字列が最初に現れる場所を見つける</span></p>

 </div>
 
 <div class="refsect1 description" id="refsect1-function.strpos-description">
  <h3 class="title">説明</h3>
  <div class="methodsynopsis dc-description">
   <span class="type"><a href="language.pseudo-types.php#language.types.mixed" class="type mixed">mixed</a></span> <span class="methodname"><strong>strpos</strong></span>
    ( <span class="methodparam"><span class="type">string</span> <code class="parameter">$haystack</code></span>
   , <span class="methodparam"><span class="type"><a href="language.pseudo-types.php#language.types.mixed" class="type mixed">mixed</a></span> <code class="parameter">$needle</code></span>
   [, <span class="methodparam"><span class="type">int</span> <code class="parameter">$offset</code><span class="initializer"> = 0</span></span>
  ] )</div>

  <p class="para rdfs-comment">
   文字列 <em><code class="parameter">haystack</code></em> の中で、
   <em><code class="parameter">needle</code></em> が最初に現れる位置を探します。
  </p>
 </div>


 <div class="refsect1 parameters" id="refsect1-function.strpos-parameters">
  <h3 class="title">パラメータ</h3>
  <p class="para">
   <dl>

    <dt>

     <span class="term"><em><code class="parameter">haystack</code></em></span>
     <dd>

      <p class="para">
       検索を行う文字列。
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><em><code class="parameter">needle</code></em></span>
     <dd>

      <p class="para">
       <em><code class="parameter">needle</code></em> が文字列でない場合は、
       それを整数に変換し、その番号に対応する文字として扱います。
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><em><code class="parameter">offset</code></em></span>
     <dd>

      <p class="para">
       指定すると、文字列内での検索開始位置がその位置になります。
        <span class="function"><a href="function.strrpos.php" class="function">strrpos()</a></span> や
        <span class="function"><a href="function.strripos.php" class="function">strripos()</a></span> と異なり、負の数は指定できません。
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>


 <div class="refsect1 returnvalues" id="refsect1-function.strpos-returnvalues">
  <h3 class="title">返り値</h3>
  <p class="para">
   needle が見つかった位置を、
   <em><code class="parameter">haystack</code></em> 文字列の先頭 (offset の値とは無関係) からの相対位置で返します。
   文字列の開始位置は 0 であり、1 ではないことに注意しましょう。
  </p>
  <p class="para">
   needle が見つからない場合は <strong><code>FALSE</code></strong> を返します。
  </p>
  <div class="warning"><strong class="warning">警告</strong><p class="simpara">この関数は論理値
<strong><code>FALSE</code></strong> を返す可能性がありますが、<strong><code>FALSE</code></strong> として評価される値を返す可能性もあります。
詳細については <a href="language.types.boolean.php" class="link">論理値</a>の
セクションを参照してください。この関数の返り値を調べるには
<a href="language.operators.comparison.php" class="link">===演算子</a> を
使用してください。</p></div>
 </div>


 <div class="refsect1 examples" id="refsect1-function.strpos-examples">
  <h3 class="title">例</h3>
  <p class="para">
   <div class="example" id="example-4884">
    <p><strong>例1 <em>===</em> の使用</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br>$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;===&nbsp;を使用していることに注目しましょう。単純に&nbsp;==&nbsp;を使ったのでは<br>//&nbsp;期待通りに動作しません。なぜなら&nbsp;'a'&nbsp;が&nbsp;0&nbsp;番目&nbsp;(最初)&nbsp;の文字だからです。<br></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"文字列&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;は、文字列&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'&nbsp;の中で見つかりませんでした"</span><span style="color: #007700">;<br>}&nbsp;else&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"文字列&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;が文字列&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'&nbsp;の中で見つかりました"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;見つかった位置は&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">&nbsp;です"</span><span style="color: #007700">;<br>}<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example" id="example-4885">
    <p><strong>例2 !== の使用</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br>$mystring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$findme&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$mystring</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$findme</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;!==&nbsp;演算子も使用可能です。ここで&nbsp;!=&nbsp;を使っても期待通りに動作しません。<br>//&nbsp;なぜなら&nbsp;'a'&nbsp;が&nbsp;0&nbsp;番目の文字だからです。(0&nbsp;!=&nbsp;false)&nbsp;を評価すると<br>//&nbsp;false&nbsp;になってしまいます。<br></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">!==&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"文字列&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;が文字列&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'&nbsp;の中で見つかりました"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&nbsp;見つかった位置は&nbsp;</span><span style="color: #0000BB">$pos</span><span style="color: #DD0000">&nbsp;です"</span><span style="color: #007700">;<br>}&nbsp;else&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"文字列&nbsp;'</span><span style="color: #0000BB">$findme</span><span style="color: #DD0000">'&nbsp;は、文字列&nbsp;'</span><span style="color: #0000BB">$mystring</span><span style="color: #DD0000">'&nbsp;の中で見つかりませんでした"</span><span style="color: #007700">;<br>}<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>

   <div class="example" id="example-4886">
    <p><strong>例3 オフセットの使用</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #FF8000">//&nbsp;オフセット以前の内容を無視して文字を探すこともできます。<br></span><span style="color: #0000BB">$newstring&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abcdef&nbsp;abcdef'</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$pos&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strpos</span><span style="color: #007700">(</span><span style="color: #0000BB">$newstring</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'a'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">//&nbsp;$pos&nbsp;は&nbsp;0&nbsp;ではなく&nbsp;7&nbsp;となります。<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 notes" id="refsect1-function.strpos-notes">
  <h3 class="title">注意</h3>
  <blockquote class="note"><p><strong class="note">注意</strong>: <span class="simpara">この関数はバイナリデータに対応しています。
</span></p></blockquote>
 </div>


 <div class="refsect1 seealso" id="refsect1-function.strpos-seealso">
  <h3 class="title">参考</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"> <span class="function"><a href="function.stripos.php" class="function" rel="rdfs-seeAlso">stripos()</a> - 大文字小文字を区別せずに文字列が最初に現れる位置を探す</span></li>
    <li class="member"> <span class="function"><a href="function.strrpos.php" class="function" rel="rdfs-seeAlso">strrpos()</a> - 文字列中に、ある部分文字列が最後に現れる場所を探す</span></li>
    <li class="member"> <span class="function"><a href="function.strripos.php" class="function" rel="rdfs-seeAlso">strripos()</a> - 文字列中で、特定の(大文字小文字を区別しない)文字列が最後に現れた位置を探す</span></li>
    <li class="member"> <span class="function"><a href="function.strstr.php" class="function" rel="rdfs-seeAlso">strstr()</a> - 文字列が最初に現れる位置を見つける</span></li>
    <li class="member"> <span class="function"><a href="function.strpbrk.php" class="function" rel="rdfs-seeAlso">strpbrk()</a> - 文字列の中から任意の文字を探す</span></li>
    <li class="member"> <span class="function"><a href="function.substr.php" class="function" rel="rdfs-seeAlso">substr()</a> - 文字列の一部分を返す</span></li>
    <li class="member"> <span class="function"><a href="function.preg-match.php" class="function" rel="rdfs-seeAlso">preg_match()</a> - 正規表現によるマッチングを行う</span></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>