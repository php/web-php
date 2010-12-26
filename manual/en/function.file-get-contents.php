<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/ref.filesystem.inc";
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
    0 => 'function.file-get-contents.php',
    1 => 'file_get_contents',
  ),
  'up' => 
  array (
    0 => 'ref.filesystem.php',
    1 => 'Filesystem Functions',
  ),
  'prev' => 
  array (
    0 => 'function.file-exists.php',
    1 => 'file_exists',
  ),
  'next' => 
  array (
    0 => 'function.file-put-contents.php',
    1 => 'file_put_contents',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="function.file-get-contents" class="refentry">
 <div class="refnamediv">
  <h1 class="refname">file_get_contents</h1> 
  <p class="verinfo">(PHP 4 &gt;= 4.3.0, PHP 5)</p><p class="refpurpose"><span class="refname">file_get_contents</span> &mdash; <span class="dc-title">Reads entire file into a string</span></p>

 </div>

 <div class="refsect1 description">
  <h3 class="title">Description</h3>
  <div class="methodsynopsis dc-description">
   <span class="type">string</span> <span class="methodname"><b>file_get_contents</b></span>
    ( <span class="methodparam"><span class="type">string</span> <tt class="parameter">$filename</tt></span>
   [, <span class="methodparam"><span class="type">bool</span> <tt class="parameter">$use_include_path</tt><span class="initializer"> = false</span></span>
   [, <span class="methodparam"><span class="type">resource</span> <tt class="parameter">$context</tt></span>
   [, <span class="methodparam"><span class="type">int</span> <tt class="parameter">$offset</tt><span class="initializer"> = -1</span></span>
   [, <span class="methodparam"><span class="type">int</span> <tt class="parameter">$maxlen</tt></span>
  ]]]] )</div>

  <p class="para rdfs-comment"> 
   This function is similar to <span class="function"><a href="function.file.php" class="function">file()</a></span>, except that
   <span class="function"><b>file_get_contents()</b></span> returns the file in a 
   <span class="type"><a href="language.types.string.php" class="type string">string</a></span>, starting at the specified <i><tt class="parameter">offset</tt></i> 
   up to <i><tt class="parameter">maxlen</tt></i> bytes. On failure, 
   <span class="function"><b>file_get_contents()</b></span> will return <b><tt>FALSE</tt></b>.
  </p>
  <p class="para">
   <span class="function"><b>file_get_contents()</b></span> is the preferred way to read the
   contents of a file into a string.  It will use memory mapping techniques if
   supported by your OS to enhance performance.
  </p>
  <blockquote><p><b class="note">Note</b>: 
   <p class="para">
    If you&#039;re opening a URI with special characters, such as spaces, you
    need to encode the URI with <span class="function"><a href="function.urlencode.php" class="function">urlencode()</a></span>.
   </p>
  </p></blockquote>
 </div>


 <div class="refsect1 parameters">
  <h3 class="title">Parameters</h3>
  <p class="para">
   <dl>

    <dt>

     <span class="term"><i><tt class="parameter">filename</tt></i></span>
     <dd>

      <p class="para">
       Name of the file to read.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">use_include_path</tt></i></span>
     <dd>

      <blockquote><p><b class="note">Note</b>: 
       <p class="para">
        As of PHP 5 the <b><tt>FILE_USE_INCLUDE_PATH</tt></b> can be used
        to trigger <a href="ini.core.php#ini.include-path" class="link">include path</a>
        search.
       </p>
      </p></blockquote>
      
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">context</tt></i></span>
     <dd>

      <p class="para">
       A valid context resource created with 
       <span class="function"><a href="function.stream-context-create.php" class="function">stream_context_create()</a></span>. If you don&#039;t need to use a
       custom context, you can skip this parameter by <b><tt>NULL</tt></b>.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">offset</tt></i></span>
     <dd>

      <p class="para">
       The offset where the reading starts on the original stream.
      </p>
     </dd>

    </dt>

    <dt>

     <span class="term"><i><tt class="parameter">maxlen</tt></i></span>
     <dd>

      <p class="para">
       Maximum length of data read. The default is to read until end
       of file is reached. Note that this parameter is applied to the 
       stream processed by the filters.
      </p>
     </dd>

    </dt>

   </dl>

  </p>
 </div>


 <div class="refsect1 returnvalues">
  <h3 class="title">Return Values</h3>
  <p class="para">
   The function returns the read data or <b><tt>FALSE</tt></b> on failure.
  </p>
 </div>


 <div class="refsect1 examples">
  <h3 class="title">Examples</h3>
  <p class="para">
   <div class="example">
    <p><b>Example #1 Get and output the source of the homepage of a website</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$homepage&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'http://www.example.com/'</span><span style="color: #007700">);<br />echo&nbsp;</span><span style="color: #0000BB">$homepage</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
   <div class="example">
    <p><b>Example #2 Searching within the include_path</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//&nbsp;&lt;=&nbsp;PHP&nbsp;5<br /></span><span style="color: #0000BB">$file&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'./people.txt'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">);<br /></span><span style="color: #FF8000">//&nbsp;&gt;&nbsp;PHP&nbsp;5<br /></span><span style="color: #0000BB">$file&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'./people.txt'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">FILE_USE_INCLUDE_PATH</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
   <div class="example">
    <p><b>Example #3 Reading a section of a file</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//&nbsp;Read&nbsp;14&nbsp;characters&nbsp;starting&nbsp;from&nbsp;the&nbsp;21st&nbsp;character<br /></span><span style="color: #0000BB">$section&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'./people.txt'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">NULL</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">NULL</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">20</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">14</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$section</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

    <div class="example-contents"><p>The above example will output
something similar to:</p></div>
    <div class="example-contents screen">
<div class="cdata"><pre>
string(14) &quot;lle Bjori Ro&quot; 
</pre></div>
    </div>
   </div>
   <div class="example">
    <p><b>Example #4 Using stream contexts</b></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//&nbsp;Create&nbsp;a&nbsp;stream<br /></span><span style="color: #0000BB">$opts&nbsp;</span><span style="color: #007700">=&nbsp;array(<br />&nbsp;&nbsp;</span><span style="color: #DD0000">'http'</span><span style="color: #007700">=&gt;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'method'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">"GET"</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'header'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">"Accept-language:&nbsp;en\r\n"&nbsp;</span><span style="color: #007700">.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">"Cookie:&nbsp;foo=bar\r\n"<br />&nbsp;&nbsp;</span><span style="color: #007700">)<br />);<br /><br /></span><span style="color: #0000BB">$context&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">stream_context_create</span><span style="color: #007700">(</span><span style="color: #0000BB">$opts</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;Open&nbsp;the&nbsp;file&nbsp;using&nbsp;the&nbsp;HTTP&nbsp;headers&nbsp;set&nbsp;above<br /></span><span style="color: #0000BB">$file&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'http://www.example.com/'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$context</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
 </div>

 
 <div class="refsect1 changelog">
  <h3 class="title">Changelog</h3>
  <p class="para">
   <table class="doctable informaltable">
    
     <thead valign="middle">
      <tr valign="middle">
       <th>Version</th>
       <th>Description</th>
      </tr>

     </thead>

     <tbody valign="middle" class="tbody">
      
      <tr valign="middle">
       <td align="left">5.1.0</td>
       <td align="left">
        Added the <i><tt class="parameter">offset</tt></i> and
        <i><tt class="parameter">maxlen</tt></i> parameters.
       </td>
      </tr>

      <tr valign="middle">
       <td align="left">5.0.0</td>
       <td align="left">
        Added context support.
       </td>
      </tr>

     </tbody>
    
   </table>

  </p>
 </div>


 <div class="refsect1 notes">
  <h3 class="title">Notes</h3>
  <blockquote><p><b class="note">Note</b>: <span class="simpara">This function is
binary-safe.</span></p></blockquote>
  <div class="tip"><b class="tip">Tip</b><p class="simpara">A URL can be used as a
filename with this function if the <a href="filesystem.configuration.php#ini.allow-url-fopen" class="link">fopen wrappers</a> have been enabled.
See <span class="function"><a href="function.fopen.php" class="function">fopen()</a></span> for more details on how to specify the
filename. See the <a href="wrappers.php" class="xref">Supported Protocols and Wrappers</a> for links to information
about what abilities the various wrappers have, notes on their usage,
and information on any predefined variables they may
provide.</p></div>
  <div class="warning"><b class="warning">Warning</b><p class="para">When using SSL, Microsoft IIS
will violate the protocol by closing the connection without sending a
<i>close_notify</i> indicator. PHP will report this as &quot;SSL: Fatal
Protocol Error&quot; when you reach the end of the data. To work around this, the
value of <a href="errorfunc.configuration.php#ini.error-reporting" class="link">error_reporting</a> should be
lowered to a level that does not include warnings.
PHP 4.3.7 and higher can detect buggy IIS server software when you open
the stream using the <i>https://</i> wrapper and will suppress the
warning. When using <span class="function"><a href="function.fsockopen.php" class="function">fsockopen()</a></span> to create an
<i>ssl://</i> socket, the developer is responsible for detecting
and suppressing this warning.</p></div>
 </div>


 <div class="refsect1 seealso">
  <h3 class="title">See Also</h3>
  <p class="para">
   <ul class="simplelist">
    <li class="member"><span class="function"><a href="function.file.php" class="function" rel="rdfs-seeAlso">file()</a> - Reads entire file into an array</span></li>
    <li class="member"><span class="function"><a href="function.fgets.php" class="function" rel="rdfs-seeAlso">fgets()</a> - Gets line from file pointer</span></li>
    <li class="member"><span class="function"><a href="function.fread.php" class="function" rel="rdfs-seeAlso">fread()</a> - Binary-safe file read</span></li>
    <li class="member"><span class="function"><a href="function.readfile.php" class="function" rel="rdfs-seeAlso">readfile()</a> - Outputs a file</span></li>
    <li class="member"><span class="function"><a href="function.file-put-contents.php" class="function" rel="rdfs-seeAlso">file_put_contents()</a> - Write a string to a file</span></li>
    <li class="member"><span class="function"><a href="function.stream-get-contents.php" class="function" rel="rdfs-seeAlso">stream_get_contents()</a> - Reads remainder of a stream into a string</span></li>
    <li class="member"><span class="function"><a href="function.stream-context-create.php" class="function" rel="rdfs-seeAlso">stream_context_create()</a> - Create a streams context</span></li>
    <li class="member"><a href="reserved.variables.httpresponseheader.php" class="link">$http_response_header</a></li>
   </ul>
  </p>
 </div>


</div><?php manual_footer(); ?>