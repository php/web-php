<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/context.inc";
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
    0 => 'context.http.php',
    1 => 'HTTP コンテキストオプション',
  ),
  'up' => 
  array (
    0 => 'context.php',
    1 => 'コンテキストオプションとパラメータ',
  ),
  'prev' => 
  array (
    0 => 'context.socket.php',
    1 => 'ソケットコンテキストオプション',
  ),
  'next' => 
  array (
    0 => 'context.ftp.php',
    1 => 'FTP コンテキストオプション',
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
<div id="context.http" class="refentry">
 <div class="refnamediv">
  <h1 class="refname">HTTP コンテキストオプション</h1>
  <p class="refpurpose"><span class="refname">HTTP コンテキストオプション</span> &mdash; <span class="dc-title">HTTP コンテキストオプションの一覧</span></p>

 </div>
 
 <div class="refsect1 description" id="refsect1-context.http-description">
  <h3 class="title">説明</h3>
  <p class="para">
   <em>http://</em> および <em>https://</em>
   トランスポート用のコンテキストオプションです。
  </p>
 </div>


 <div class="refsect1 options" id="refsect1-context.http-options">
  <h3 class="title">オプション</h3>
  <p class="para">
   <dl>

    <dt id="context.http.method">
     <span class="term">
      <em><code class="parameter">method</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       リモートサーバーでサポートされる <strong><code>GET</code></strong>、
       <strong><code>POST</code></strong> あるいはその他の HTTP メソッド。
      </p>
      <p class="para">
       デフォルトは <strong><code>GET</code></strong> です。
      </p>
     </dd>

    </dt>

    <dt id="context.http.header">
     <span class="term">
      <em><code class="parameter">header</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       リクエストに付加されるヘッダ。ここで指定した値が
       (<em>User-agent:</em>、<em>Host:</em>、
       および <em>Authentication:</em> などの)
       他の値を上書きすることもあります。
      </p>
     </dd>

    </dt>

    <dt id="context.http.user-agent">
     <span class="term">
      <em><code class="parameter">user_agent</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       <em>User-Agent:</em> ヘッダとして送信する値。上で説明した
       <em>header</em> オプションで user-agent が
       定義されて<em class="emphasis">いない</em>場合のみ使用されます。
      </p>
      <p class="para">
       デフォルトでは、<var class="filename">php.ini</var> の
       <a href="filesystem.configuration.php#ini.user-agent" class="link">user_agent</a>
       の設定内容を使用します。
      </p>
     </dd>

    </dt>

    <dt id="context.http.content">
     <span class="term">
      <em><code class="parameter">content</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       ヘッダの後に送信する追加データ。通常、POST または PUT
       リクエストの際に使用されます。
      </p>
     </dd>

    </dt>

    <dt id="context.http.proxy">
     <span class="term">
      <em><code class="parameter">proxy</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       プロキシサーバーを示す URI (例: 
       <em>tcp://proxy.example.com:5100</em>)。
      </p>
     </dd>

    </dt>

    <dt id="context.http.request-fulluri">
     <span class="term">
      <em><code class="parameter">request_fulluri</code></em>
      <span class="type"><a href="language.types.boolean.php" class="type boolean">boolean</a></span>
     </span>
     <dd>

      <p class="para">
       <strong><code>TRUE</code></strong> を指定すると、リクエストを生成する際に完全な URI
       (<em>GET http://www.example.com/path/to/file.html HTTP/1.0</em>)
       が用いられます。これは標準のリクエストフォーマットではありませんが、
       このようなフォーマットを要求するプロキシサーバーも存在します。
      </p>
      <p class="para">
       デフォルトは <strong><code>FALSE</code></strong> です。
      </p>
     </dd>

    </dt>

    <dt id="context.http.follow-location">
     <span class="term">
      <em><code class="parameter">follow_location</code></em>
      <span class="type"><a href="language.types.integer.php" class="type integer">integer</a></span>
     </span>
     <dd>

      <p class="para">
       <em>Location</em> のリダイレクトをたどります。
       <em>0</em> で無効にできます。
      </p>
      <p class="para">
       デフォルトは <em>1</em> です。
      </p>
     </dd>

    </dt>

    <dt id="context.http.max-redirects">
     <span class="term">
      <em><code class="parameter">max_redirects</code></em>
      <span class="type"><a href="language.types.integer.php" class="type integer">integer</a></span>
     </span>
     <dd>

      <p class="para">
       リダイレクトをたどる最大数。値が <em>1</em> 以下の場合は
       リダイレクトをたどらないことを意味します。
      </p>
      <p class="para">
       デフォルトは <em>20</em> です。
      </p>
     </dd>

    </dt>

    <dt id="context.http.protocol-version">
     <span class="term">
      <em><code class="parameter">protocol_version</code></em>
      <span class="type"><a href="language.types.float.php" class="type float">float</a></span>
     </span>
     <dd>

      <p class="para">
       HTTP プロトコルのバージョン。
      </p>
      <p class="para">
       デフォルトは <em>1.0</em> です。
      </p>
      <blockquote class="note"><p><strong class="note">注意</strong>: 
       <p class="para">
        5.3.0 より前のバージョンの PHP では chunked transfer decoding を実装していません。
        この値を <em>1.1</em> に設定するなら、
        <em>1.1</em> 準拠にするのは自分の責任となります。
       </p>
      </p></blockquote>
     </dd>

    </dt>

    <dt id="context.http.timeout">
     <span class="term">
      <em><code class="parameter">timeout</code></em>
      <span class="type"><a href="language.types.float.php" class="type float">float</a></span>
     </span>
     <dd>

      <p class="para">
       読み込みタイムアウト秒数を <span class="type"><a href="language.types.float.php" class="type float">float</a></span> (例
       <em>10.5</em>) で指定します。
      </p>
      <p class="para">
       デフォルトでは <var class="filename">php.ini</var> 設定
       <a href="filesystem.configuration.php#ini.default-socket-timeout" class="link">default_socket_timeout</a>
       の値を使用します。
      </p>
     </dd>

    </dt>

    <dt id="context.http.ignore-errors">
     <span class="term">
      <em><code class="parameter">ignore_errors</code></em>
      <span class="type"><a href="language.types.boolean.php" class="type boolean">boolean</a></span>
     </span>
     <dd>

      <p class="para">
       ステータスコードが失敗を意味する場合でもコンテンツを取得します。
      </p>
      <p class="para">
       デフォルトは <strong><code>FALSE</code></strong> です。
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>

 
 <div class="refsect1 changelog" id="refsect1-context.http-changelog">
  <h3 class="title">変更履歴</h3>
  <p class="para">
   <table class="doctable informaltable">
    
     <thead>
      <tr>
       <th>バージョン</th>
       <th>説明</th>
      </tr>

     </thead>

     <tbody class="tbody">
      <tr>
       <td>5.3.4</td>
       <td>
        <em><code class="parameter">follow_location</code></em> が追加されました。
       </td>
      </tr>

      <tr>
       <td>5.3.0</td>
       <td>
        <em><code class="parameter">protocol_version</code></em> に
        <em>1.1</em> を設定した場合に、
        chuned transfer decoding をサポートするようになりました。
       </td>
      </tr>

      <tr>
       <td>5.2.10</td>
       <td>
        <em><code class="parameter">ignore_errors</code></em> が追加されました。
       </td>
      </tr>

      <tr>
       <td>5.2.10</td>
       <td>
        <em><code class="parameter">header</code></em> に数値添字の配列を使用できるようになりました。
       </td>
      </tr>

      <tr>
       <td>5.2.1</td>
       <td>
        <em><code class="parameter">timeout</code></em> が追加されました。
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        HTTP プロキシを使用した HTTPS のプロキシが追加されました。
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        <em><code class="parameter">max_redirects</code></em> が追加されました。
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        <em><code class="parameter">protocol_version</code></em> が追加されました。
       </td>
      </tr>

     </tbody>
    
   </table>

  </p>
 </div>

 
 <div class="refsect1 examples" id="refsect1-context.http-examples">
  <h3 class="title">例</h3>
  <p class="para">
   <div class="example" id="context.http.example-post">
    <p><strong>例1 ページの取得と POST データの送信</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br><br>$postdata&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">http_build_query</span><span style="color: #007700">(<br>&nbsp;&nbsp;&nbsp;&nbsp;array(<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'var1'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'some&nbsp;content'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'var2'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'doh'<br>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">)<br>);<br><br></span><span style="color: #0000BB">$opts&nbsp;</span><span style="color: #007700">=&nbsp;array(</span><span style="color: #DD0000">'http'&nbsp;</span><span style="color: #007700">=&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;array(<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'method'&nbsp;&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'POST'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'header'&nbsp;&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'Content-type:&nbsp;application/x-www-form-urlencoded'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'content'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$postdata<br>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">)<br>);<br><br></span><span style="color: #0000BB">$context&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">stream_context_create</span><span style="color: #007700">(</span><span style="color: #0000BB">$opts</span><span style="color: #007700">);<br><br></span><span style="color: #0000BB">$result&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'http://example.com/submit.php'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$context</span><span style="color: #007700">);<br><br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
  <p class="para">
   <div class="example" id="context.http.example-fetch-ignore-redirect">
    <p><strong>例2 リダイレクトを無視し、ヘッダとコンテンツの取得</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br><br>$url&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"http://www.example.org/header.php"</span><span style="color: #007700">;<br><br></span><span style="color: #0000BB">$opts&nbsp;</span><span style="color: #007700">=&nbsp;array(</span><span style="color: #DD0000">'http'&nbsp;</span><span style="color: #007700">=&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;array(<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'method'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'GET'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'max_redirects'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'0'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'ignore_errors'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'1'<br>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">)<br>);<br><br></span><span style="color: #0000BB">$context&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">stream_context_create</span><span style="color: #007700">(</span><span style="color: #0000BB">$opts</span><span style="color: #007700">);<br></span><span style="color: #0000BB">$stream&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">fopen</span><span style="color: #007700">(</span><span style="color: #0000BB">$url</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'r'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$context</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;ヘッダ情報およびストリームのメタデータ<br></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">stream_get_meta_data</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">));<br><br></span><span style="color: #FF8000">//&nbsp;$url&nbsp;の実際のデータ<br></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">stream_get_contents</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">));<br></span><span style="color: #0000BB">fclose</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">);<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 notes" id="refsect1-context.http-notes">
  <h3 class="title">注意</h3>
  <blockquote class="note"><p><strong class="note">注意</strong>: 
   <strong>基盤となるソケットストリームのコンテキストオプション</strong><br>
   <span class="simpara">
    これ以外のコンテキストオプションが
    <a href="transports.inet.php" class="link">基盤となるトランスポート</a>
    でサポートされています。
    <em>http://</em> ストリームの場合は、<em>tcp://</em>
    のコンテキストオプションを参照ください。
    <em>https://</em> ストリームの場合は、<em>ssl://</em>
    のコンテキストオプションを参照ください。
   </span>
  </p></blockquote>
  <blockquote class="note"><p><strong class="note">注意</strong>: 
   <strong>HTTP ステータスライン</strong><br>
   <span class="simpara">
    このストリームラッパーがリダイレクトをたどると、
     <span class="function"><a href="function.stream-get-meta-data.php" class="function">stream_get_meta_data()</a></span> が返す
    <em>wrapper_data</em> のインデックス <em>0</em>
    の内容が必ずしもそのコンテンツの HTTP ステータスラインであるとは限らなくなります。
   </span>
   <div class="example-contents screen">
<div class="cdata"><pre>
array (
  &#039;wrapper_data&#039; =&gt;
  array (
    0 =&gt; &#039;HTTP/1.0 301 Moved Permantenly&#039;,
    1 =&gt; &#039;Cache-Control: no-cache&#039;,
    2 =&gt; &#039;Connection: close&#039;,
    3 =&gt; &#039;Location: http://example.com/foo.jpg&#039;,
    4 =&gt; &#039;HTTP/1.1 200 OK&#039;,
    ...
</pre></div>
   </div>
   <span class="simpara">
    最初のリクエストが <em>301</em> (permanent redirect)
    を返したので、ストリームラッパーが自動的にリダイレクト先をたどり、レスポンス
    <em>200</em> (インデックス = <em>4</em>)
    を取得しました。
   </span>
  </p></blockquote>
 </div>


 <div class="refsect1 seealso" id="refsect1-context.http-seealso">
  <h3 class="title">参考</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"><a href="wrappers.http.php" class="xref">http://</a></li>
    <li class="member"><a href="context.socket.php" class="xref">ソケットコンテキストオプション</a></li>
    <li class="member"><a href="context.ssl.php" class="xref">SSL コンテキストオプション</a></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>