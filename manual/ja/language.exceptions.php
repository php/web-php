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
    1 => 'ja',
  ),
  'this' => 
  array (
    0 => 'language.exceptions.php',
    1 => '例外(exceptions)',
  ),
  'up' => 
  array (
    0 => 'langref.php',
    1 => '言語リファレンス',
  ),
  'prev' => 
  array (
    0 => 'language.namespaces.faq.php',
    1 => 'FAQ: 名前空間について知っておくべきこと',
  ),
  'next' => 
  array (
    0 => 'language.exceptions.extending.php',
    1 => '例外を拡張する',
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
 <h1>例外(exceptions)</h1>
<h2>目次</h2><ul class="chunklist chunklist_chapter"><li><a href="language.exceptions.extending.php">例外を拡張する</a></li></ul>


 <p class="para">
  PHP 5 は、他のプログラミング言語に似た例外モデルを有しています。
  PHP 内で例外が投げられ (&quot;<em>throw</em>&quot; され)、それが
  捕捉され (&quot;<em>catch</em>&quot; され) ます。発生した例外を
  捕捉するには、コードを <em>try</em> ブロックで囲みます。
  各 <em>try</em> ブロックには、対応する <em>catch</em>
  ブロックが存在する必要があります。異なる型の例外を捕捉するために
  複数の <em>catch</em> フロックを使用することができます。
  通常の実行時 (<em>try</em> ブロック内で例外が投げられなかった
  場合、あるいは投げられた例外に対応する <em>catch</em>
  ブロックが存在しなかった場合) は、<em>catch</em>
  ブロック内は処理されず、それ以降から処理が続けられます。
  <em>catch</em> ブロックの中から例外を投げる
  (あるいは投げなおす) こともできます。
 </p>
 <p class="para">
  例外が投げられた場合、その命令に続くコードは実行されず、
  PHP は最初にマッチする <em>catch</em> ブロックを探します。
  例外が捕捉されない場合、PHP は &quot;<em>Uncaught Exception ...</em>&quot;
  というメッセージとともに
  致命的なエラー(fatal error)を発行します。
  ただし、 <span class="function"><a href="function.set-exception-handler.php" class="function">set_exception_handler()</a></span> でハンドラが
  定義されている場合を除きます。
 </p>
  <p class="para">
   PHP 5.5 以降では、<em>catch</em> ブロックの後に
   <em>finally</em> ブロックも指定できるようになりました。
   <em>finally</em> ブロックの何かに書いたコードは、
   <em>try</em> および <em>catch</em> ブロックの後で常に実行されます。
   例外がスローさされたかどうかには関係ありません。
   <em>finally</em> ブロックを実行してから、通常の処理を続行します。
  </p>
  <p class="para">
   スローされるオブジェクトは、<a href="class.exception.php" class="classname">Exception</a> クラスあるいは
   <a href="class.exception.php" class="classname">Exception</a> のサブクラスのインスタンスでなければなりません。
   それ以外のオブジェクトをスローしようとすると
   PHP の Fatal Error が発生します。
  </p>
  <blockquote class="note"><p><strong class="note">注意</strong>: 
   <p class="para">
    PHP の内部関数の多くは
    <a href="errorfunc.configuration.php#ini.error-reporting" class="link">エラー報告</a>
    を使っており、例外を使っているのは新しい
    <a href="language.oop5.php" class="link">オブジェクト指向</a>
    の拡張モジュールのみです。
    しかし、<a href="class.errorexception.php" class="link">ErrorException</a>
    を使えば簡単にエラーを例外に変換することができます。
   </p>
  </p></blockquote>
  <div class="tip"><strong class="tip">ヒント</strong>
   <p class="para">
    <a href="intro.spl.php" class="link">Standard PHP Library (SPL)</a>
    には<a href="spl.exceptions.php" class="link">組み込みの例外</a>が数多く用意されています。
   </p>
  </div>
 <div class="example" id="example-268">
  <p><strong>例1 例外を投げるには</strong></p>
  <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">Exception</span><span style="color: #007700">(</span><span style="color: #DD0000">'ゼロによる除算。'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">/</span><span style="color: #0000BB">$x</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">5</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'捕捉した例外:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}<br><br></span><span style="color: #FF8000">//&nbsp;実行は継続される<br></span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"Hello&nbsp;World\n"</span><span style="color: #007700">;<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
  </div>

    <div class="example-contents"><p>上の例の出力は以下となります。</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
0.2
捕捉した例外: ゼロによる除算。
Hello World
</pre></div>
    </div>
 </div>
   <div class="example" id="example-269">
    <p><strong>例2 例外処理での <em>finally</em> ブロック</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!</span><span style="color: #0000BB">$x</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">Exception</span><span style="color: #007700">(</span><span style="color: #DD0000">'ゼロによる除算。'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">/</span><span style="color: #0000BB">$x</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">5</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'捕捉した例外:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;</span><span style="color: #0000BB">finally&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"First&nbsp;finally.\n"</span><span style="color: #007700">;<br>}<br><br>try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">inverse</span><span style="color: #007700">(</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">'捕捉した例外:&nbsp;'</span><span style="color: #007700">,&nbsp;&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br>}&nbsp;</span><span style="color: #0000BB">finally&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"Second&nbsp;finally.\n"</span><span style="color: #007700">;<br>}<br><br></span><span style="color: #FF8000">//&nbsp;処理を続行します<br></span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"Hello&nbsp;World\n"</span><span style="color: #007700">;<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>上の例の出力は以下となります。</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
0.2
First finally.
捕捉した例外: ゼロによる除算。
Second finally.
Hello World
</pre></div>
    </div>
   </div>
   <div class="example" id="example-270">
    <p><strong>例3 ネストした例外</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br><br></span><span style="color: #007700">class&nbsp;</span><span style="color: #0000BB">MyException&nbsp;</span><span style="color: #007700">extends&nbsp;</span><span style="color: #0000BB">Exception&nbsp;</span><span style="color: #007700">{&nbsp;}<br><br>class&nbsp;</span><span style="color: #0000BB">Test&nbsp;</span><span style="color: #007700">{<br>&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">testing</span><span style="color: #007700">()&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;try&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;throw&nbsp;new&nbsp;</span><span style="color: #0000BB">MyException</span><span style="color: #007700">(</span><span style="color: #DD0000">'foo!'</span><span style="color: #007700">);<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">MyException&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;改めてスロー<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">throw&nbsp;</span><span style="color: #0000BB">$e</span><span style="color: #007700">;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;catch&nbsp;(</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$e</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getMessage</span><span style="color: #007700">());<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>}<br><br></span><span style="color: #0000BB">$foo&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Test</span><span style="color: #007700">;<br></span><span style="color: #0000BB">$foo</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">testing</span><span style="color: #007700">();<br><br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>上の例の出力は以下となります。</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
string(4) &quot;foo!&quot;
</pre></div>
    </div>
   </div>
 
 

 </div>
<?php manual_footer(); ?>