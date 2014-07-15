<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'manual/php3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header('PHP Version 3 Documentation');
?>

<h1 style="text-align: center;">PHP Version 3</h1>

<h1>Table of Contents</h1>

<ol>
  <li><a href="#introduction">Introduction</a></li>
  <li><a href="#directives">Configuration Directives</a></li>
  <li><a href="#changed_behaviour">Changed behaviour</a></li>
  <li><a href="#misc">Miscellaneous</a></li>
  <li><a href="#migration">Migration</a></li>
  <li><a href="#debugger">Debugger</a></li>
  <li><a href="#internals">Internals</a></li>
</ol>
<hr>

<h2 id="introduction">Introduction</h2>

<p>
 The PHP 3 documentation was removed from the PHP Manual and placed here for
 historical purposes. An attempt was made to preserve all of the text although
 it's highly likely that some is missing. The last PHP 3 release (3.0.18) was
 made on October 20, 2000.
</p>

<p>
 See the <a href="http://museum.php.net/">PHP Museum</a> for downloads, and
 also read the <a href="http://php.net/history">history</a> for further
 information about PHP 3.
</p>

<h2 id="directives">Configuration Directives</h2>

<p>
 Most directives are prepended with php3_ instead of php_. These differences
 are not mentioned in this document.
</p>

<dl>
 <dt><span class="big">Changed</span></dt>
 <dd>
  <p>
   FTP configure option changed from <em>--with-ftp</em> to <em>--enable-ftp</em>
  </p>
 </dd>
 <dd>
  <p>
   The value of E_ALL is 63.
  </p>
 </dd>
 <dd>
  <p>
   The <em>asp_tags</em> directive was added in PHP 3.0.4.
  </p>
 </dd>
 <dd>
  <p>
   The E_* constants have no meaning in <em>php3.ini</em>, but numeric values do.
  </p>
 </dd>
</dl>

<dl>
 <dt><span class="big">Removed</span></dt>
 <dd>
  <p>
   <em>--with-imsp[=DIR]</em> includes IMSP support (DIR is IMSP's include dir and libimsp.a dir).
  </p>
 </dd>
 <dd>
  <p>
   <em>--with-mck[=DIR]</em> includes Cybercash MCK support. DIR is the cybercash mck build directory, 
   defaults to /usr/src/mck-3.2.0.3-linux
  </p>
 </dd>
 <dd>
  <p>
   <em>--with-mod-dav=DIR</em> includes DAV support through Apache's mod_dav, DIR is mod_dav's 
   installation directory (Apache module version only).
  </p>
 </dd>
 <dd>
  <p>
   If the <em>sybase.compatability_mode</em> directive is on, this will cause
   PHP to automatically assign types to results according to their Sybase
   type, instead of treating them all as strings.
  </p>
 </dd>
</dl>

<h2 id="changed_bahaviour">Changed Behaviour</h2>

<dl>
 <dt><span class="big">Return values</span></dt>
 <dd>
  <p>
   unset() returns 1.
  </p>
 </dd>
 <dd>
  <p>
   Multiple calls to setcookie() in the same script will be performed 
   in reverse order. And put the insert before the delete when trying 
   to delete one cookie before inserting another.
  </p>
 </dd>
 <dd>
  <p>
   eval() does not return a value.
  </p>
 </dd>
</dl>

<dl>
 <dt><span class="big">Function parameters</span></dt>
 <dd>
  <p>
   gettype() has a 'user function' return value.
  </p>
 </dd>
 <dd>
  <p>
   htmlspecialchars() added the second parameter in PHP 3.0.17.
  </p>
 </dd>
 <dd>
  <p>
   error_log()'s second parameter, message, goes through the debugger.
  </p>
 </dd>
 <dd>
  <p>
   empty() considers "0" as non-empty, a value that for example may come from an HTML form.
  </p>
 </dd>
</dl>

<dl>
 <dt><span class="big">Other</span></dt>
 <dd>
  <p>
   Variables are always assigned by value, as there are no references.
  </p>
 </dd>
 <dd>
  <p>
   Using arrays within HTML forms is limited to single dimensional arrays.
  </p>
 </dd>
 <dd>
  <p>
   When escaping characters in single quoted strings, an E_NOTICE level error is generated.
  </p>
 </dd>
 <dd>
  <p>
   Objects lose their class association throughout the process of serialization and unserialization.
  </p>
 </dd>
 <dd>
  <p>
   Functions must be defined before use. In other words, top to bottom.
  </p>
 </dd>
 <dd>
  <p>
   Variable number of arguments are not supported.
  </p>
 </dd>
 <dd>
  <p>
   Return may only be used within function blocks.
  </p>
 </dd>
</dl>

<h2 id="miscellaneous">Miscellaneous</h2>

<dl>
 <dd>
  <p>
   The PCRE modifier is not available.
  </p>
 </dd>
 <dd>
  <p>
   is_uploaded_file() exists as of PHP 3.0.16.
  </p>
 </dd>
 <dd>
  <p>
   BC Math is enabled by default, --disable-bcmath disables it.
  </p>
 </dd>
 <dd>
  <p>
   The behaviour of register_globals is always on, because the directive does not exist.
  </p>
 </dd>
 <dd>
  <p>
   The short_tags() function may be used to enable short tags (&lt;?).
  </p>
 </dd>
 <dd>
  <p>
   The CGI build has a 'make bench' tool for benchmarking the build. It will likely take
   over 30 seconds to run so be sure to allow the appropriate time limit.
  </p>
 </dd>
 <dd>
  <p>
   SAPI support is not available.
  </p>
 </dd>
 <dd>
  <p>
   The HTTP PUT method is allowed for saving files, which are handled similarly to POST method
   file saves. <em>$PHP_PUT_FILENAME</em> holds the location of the temporary file created, which 
   must be moved during the request else it will be deleted.
  </p>
 </dd>
 <dd>
  <p>
   ODBC is enabled by default, to disable use <em>--disable-unified-odbc</em>
  </p>
 </dd>
 <dd>
  <p>
   GD is enabled by default, to disable use <em>--without-gd</em>
  </p>
 </dd>
 <dd>
  <p>
   Installing PHP 3 in Apache:
  </p>
  <pre>
   AddModule mod_php3.c
   LoadModule php3_module modules/libphp3.so
   AddType application/x-httpd-php3 .php3
  </pre>
 </dd>
 <dd>
  <p>
   The SESAM extension is specific to PHP 3 and was removed.
  </p>
 </dd>
</dl>

<h2 id="migration">Migration</h2>

<p>
 There are a few migration specific documents involving PHP 3 but due to
 their size and structure they were not added to this document.
</p>

<h2 id="debugger">Debugger</h2>

<p>
 Information related to the debugger that comes standard with PHP 3 was
 not added to this document.
</p>

<h2 id="internals">Internals</h2>

<p>
 Information related to the internal workings of PHP 3 that is commonly used
 to create extensions was not added to this document.
</p>

<?php site_footer(); ?>