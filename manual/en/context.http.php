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
    1 => 'en',
  ),
  'this' => 
  array (
    0 => 'context.http.php',
    1 => 'HTTP context options',
  ),
  'up' => 
  array (
    0 => 'context.php',
    1 => 'Context options and parameters',
  ),
  'prev' => 
  array (
    0 => 'context.socket.php',
    1 => 'Socket context options',
  ),
  'next' => 
  array (
    0 => 'context.ftp.php',
    1 => 'FTP context options',
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
  <h1 class="refname">HTTP context options</h1>
  <p class="refpurpose"><span class="refname">HTTP context options</span> &mdash; <span class="dc-title">HTTP context option listing</span></p>

 </div>
 
 <div class="refsect1 description" id="refsect1-context.http-description">
  <h3 class="title">Description</h3>
  <p class="para">
   Context options for <em>http://</em> and <em>https://</em>
   transports.
  </p>
 </div>


 <div class="refsect1 options" id="refsect1-context.http-options">
  <h3 class="title">Options</h3>
  <p class="para">
   <dl>

    <dt id="context.http.method">
     <span class="term">
      <em><code class="parameter">method</code></em>
      <span class="type"><a href="language.types.string.php" class="type string">string</a></span>
     </span>
     <dd>

      <p class="para">
       <strong><code>GET</code></strong>, <strong><code>POST</code></strong>, or
       any other HTTP method supported by the remote server.
      </p>
      <p class="para">
       Defaults to <strong><code>GET</code></strong>.
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
       Additional headers to be sent during request. Values
       in this option will override other values (such as
       <em>User-agent:</em>, <em>Host:</em>,
       and <em>Authentication:</em>).
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
       Value to send with <em>User-Agent:</em> header. This value will
       only be used if user-agent is <em class="emphasis">not</em> specified
       in the <em>header</em> context option above.
      </p>
      <p class="para">
       By default the
       <a href="filesystem.configuration.php#ini.user-agent" class="link">user_agent</a>
       <var class="filename">php.ini</var> setting is used.
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
       Additional data to be sent after the headers. Typically used
       with POST or PUT requests.
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
       URI specifying address of proxy server. (e.g.
       <em>tcp://proxy.example.com:5100</em>).
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
       When set to <strong><code>TRUE</code></strong>, the entire URI will be used when
       constructing the request.  (i.e.
       <em>GET http://www.example.com/path/to/file.html HTTP/1.0</em>).
       While this is a non-standard request format, some
       proxy servers require it.
      </p>
      <p class="para">
       Defaults to <strong><code>FALSE</code></strong>.
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
       Follow <em>Location</em> header redirects. Set to
       <em>0</em> to disable.
      </p>
      <p class="para">
       Defaults to <em>1</em>.
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
       The max number of redirects to follow. Value <em>1</em> or
       less means that no redirects are followed.
      </p>
      <p class="para">
       Defaults to <em>20</em>.
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
       HTTP protocol version.
      </p>
      <p class="para">
       Defaults to <em>1.0</em>.
      </p>
      <blockquote class="note"><p><strong class="note">Note</strong>: 
       <p class="para">
        PHP prior to 5.3.0 does not implement chunked transfer decoding.
        If this value is set to <em>1.1</em> it is your
        responsibility to be <em>1.1</em> compliant.
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
       Read timeout in seconds, specified by a <span class="type"><a href="language.types.float.php" class="type float">float</a></span>
       (e.g. <em>10.5</em>).
      </p>
      <p class="para">
       By default the
       <a href="filesystem.configuration.php#ini.default-socket-timeout" class="link">default_socket_timeout</a>
       <var class="filename">php.ini</var> setting is used.
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
       Fetch the content even on failure status codes.
      </p>
      <p class="para">
       Defaults to <strong><code>FALSE</code></strong>.
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>

 
 <div class="refsect1 changelog" id="refsect1-context.http-changelog">
  <h3 class="title">Changelog</h3>
  <p class="para">
   <table class="doctable informaltable">
    
     <thead>
      <tr>
       <th>Version</th>
       <th>Description</th>
      </tr>

     </thead>

     <tbody class="tbody">
      <tr>
       <td>5.3.4</td>
       <td>
        Added <em><code class="parameter">follow_location</code></em>.
       </td>
      </tr>

      <tr>
       <td>5.3.0</td>
       <td>
        The <em><code class="parameter">protocol_version</code></em> supports chunked transfer
        decoding when set to <em>1.1</em>.
       </td>
      </tr>

      <tr>
       <td>5.2.10</td>
       <td>
        Added <em><code class="parameter">ignore_errors</code></em>.
       </td>
      </tr>

      <tr>
       <td>5.2.10</td>
       <td>
        The <em><code class="parameter">header</code></em> can now be an numerically indexed <span class="type"><a href="language.types.array.php" class="type array">array</a></span>.
       </td>
      </tr>

      <tr>
       <td>5.2.1</td>
       <td>
        Added <em><code class="parameter">timeout</code></em>.
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        Added HTTPS proxying through HTTP proxies.
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        Added <em><code class="parameter">max_redirects</code></em>.
       </td>
      </tr>

      <tr>
       <td>5.1.0</td>
       <td>
        Added <em><code class="parameter">protocol_version</code></em>.
       </td>
      </tr>

     </tbody>
    
   </table>

  </p>
 </div>

 
 <div class="refsect1 examples" id="refsect1-context.http-examples">
  <h3 class="title">Examples</h3>
  <p class="para">
   <div class="example" id="context.http.example-post">
    <p><strong>Example #1 Fetch a page and send POST data</strong></p>
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
    <p><strong>Example #2 Ignore redirects but fetch headers and content </strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br><br>$url&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"http://www.example.org/header.php"</span><span style="color: #007700">;<br><br></span><span style="color: #0000BB">$opts&nbsp;</span><span style="color: #007700">=&nbsp;array(</span><span style="color: #DD0000">'http'&nbsp;</span><span style="color: #007700">=&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;array(<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'method'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'GET'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'max_redirects'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'0'</span><span style="color: #007700">,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'ignore_errors'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'1'<br>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">)<br>);<br><br></span><span style="color: #0000BB">$context&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">stream_context_create</span><span style="color: #007700">(</span><span style="color: #0000BB">$opts</span><span style="color: #007700">);<br></span><span style="color: #0000BB">$stream&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">fopen</span><span style="color: #007700">(</span><span style="color: #0000BB">$url</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'r'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$context</span><span style="color: #007700">);<br><br></span><span style="color: #FF8000">//&nbsp;header&nbsp;information&nbsp;as&nbsp;well&nbsp;as&nbsp;meta&nbsp;data<br>//&nbsp;about&nbsp;the&nbsp;stream<br></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">stream_get_meta_data</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">));<br><br></span><span style="color: #FF8000">//&nbsp;actual&nbsp;data&nbsp;at&nbsp;$url<br></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">stream_get_contents</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">));<br></span><span style="color: #0000BB">fclose</span><span style="color: #007700">(</span><span style="color: #0000BB">$stream</span><span style="color: #007700">);<br></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>


 <div class="refsect1 notes" id="refsect1-context.http-notes">
  <h3 class="title">Notes</h3>
  <blockquote class="note"><p><strong class="note">Note</strong>: 
   <strong>Underlying socket stream context options</strong><br>
   <span class="simpara">
    Additional context options may be supported by the
    <a href="transports.inet.php" class="link">underlying transport</a>
    For <em>http://</em> streams, refer to context
    options for the <em>tcp://</em> transport.  For
    <em>https://</em> streams, refer to context options
    for the <em>ssl://</em> transport.
   </span>
  </p></blockquote>
  <blockquote class="note"><p><strong class="note">Note</strong>: 
   <strong>HTTP status line</strong><br>
   <span class="simpara">
    When this stream wrapper follows a redirect, the
    <em>wrapper_data</em> returned by
     <span class="function"><a href="function.stream-get-meta-data.php" class="function">stream_get_meta_data()</a></span> might not necessarily contain
    the HTTP status line that actually applies to the content data at index
    <em>0</em>.
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
    The first request returned a <em>301</em> (permanent redirect),
    so the stream wrapper automatically followed the redirect to get a
    <em>200</em> response (index = <em>4</em>).
   </span>
  </p></blockquote>
 </div>


 <div class="refsect1 seealso" id="refsect1-context.http-seealso">
  <h3 class="title">See Also</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"><a href="wrappers.http.php" class="xref">http://</a></li>
    <li class="member"><a href="context.socket.php" class="xref">Socket context options</a></li>
    <li class="member"><a href="context.ssl.php" class="xref">SSL context options</a></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>