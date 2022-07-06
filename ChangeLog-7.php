<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-7.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['7.4', '7.3', '7.2', '7.1', '7.0'];
changelog_header(7, $MINOR_VERSIONS);
?>
<a id="PHP_7_4"></a>

<section class="version" id="7.4.30"><!-- {{{ 7.4.30 -->
<h3>Version 7.4.30</h3>
<b><?php release_date('09-Jun-2022'); ?></b>
<ul><li>mysqlnd:
<ul>
  <li><?php bugfix(81719); ?>: mysqlnd/pdo password buffer overflow. (CVE-2022-31626)</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(81720); ?>: Uninitialized array in pg_query_params(). (CVE-2022-31625)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.29"><!-- {{{ 7.4.29 -->
<h3>Version 7.4.29</h3>
<b><?php release_date('14-Apr-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>No source changes to this release. This update allows for re-building the
  Windows binaries against upgraded dependencies which have received security
  updates.</li>
</ul></li>
<li>Date:
<ul>
  <li>Updated to latest IANA timezone database (2022a).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.28"><!-- {{{ 7.4.28 -->
<h3>Version 7.4.28</h3>
<b><?php release_date('17-Feb-2022'); ?></b>
<ul><li>Filter:
<ul>
  <li>Fix #81708: UAF due to php_filter_float() failing for ints (CVE-2021-21708)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.27"><!-- {{{ 7.4.27 -->
<h3>Version 7.4.27</h3>
<b><?php release_date('16-Dec-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81626); ?> (Error on use static:: in __сallStatic() wrapped to Closure::fromCallable()).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(81513); ?> (Future possibility for heap overflow in FPM zlog).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71316); ?> (libpng warning from imagecreatefromstring).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(75725); ?> (./configure: detecting RAND_egd).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74604); ?> (Out of bounds in php_pcre_replace_impl).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81618); ?> (dns_get_record fails on FreeBSD for missing type).</li>
  <li><?php bugfix(81659); ?> (stream_get_contents() may unnecessarily overallocate).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.26"><!-- {{{ 7.4.26 -->
<h3>Version 7.4.26</h3>
<b><?php release_date('18-Nov-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81518); ?> (Header injection via default_mimetype / default_charset).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(81500); ?> (Interval serialization regression since 7.3.14 / 7.4.2).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(76167); ?> (mbstring may use pointer from some previous request).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(81494); ?> (Stopped unbuffered query does not throw error).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(81424); ?> (PCRE2 10.35 JIT performance regression).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(54340); ?> (Memory corruption with user_filter).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(79971); ?> (special character is breaking the path in xml function). (CVE-2021-21707)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.25"><!-- {{{ 7.4.25 -->
<h3>Version 7.4.25</h3>
<b><?php release_date('21-Oct-2021'); ?></b>
<ul><li>DOM:
<ul>
  <li><?php bugfix(81433); ?> (DOMElement::setIdAttribute() called twice may remove ID).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79576); ?> ("TYPE *" shows unhelpful message when type is not defined).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(78987); ?> (High memory usage during encoding detection).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(61700); ?> (FILTER_FLAG_IPV6/FILTER_FLAG_NO_PRIV|RES_RANGE failing).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(81026); ?> (PHP-FPM oob R/W in root process leading to privilege escalation) (CVE-2021-21703).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80663); ?> (Recursive SplFixedArray::setSize() may cause double-free).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(81475); ?> (stream_isatty emits warning with attached stream wrapper).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(70962); ?> (XML_OPTION_SKIP_WHITE strips embedded whitespace).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(81490); ?> (ZipArchive::extractTo() may leak memory).</li>
  <li><?php bugfix(77978); ?> (Dirname ending in colon unzips to wrong dir).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.24"><!-- {{{ 7.4.24 -->
<h3>Version 7.4.24</h3>
<b><?php release_date('23-Sep-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81302); ?> (Stream position after stream filter removed).</li>
  <li><?php bugfix(81346); ?> (Non-seekable streams don't update position after write).</li>
  <li><?php bugfix(73122); ?> (Integer Overflow when concatenating strings).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(53580); ?> (During resize gdImageCopyResampled cause colors change).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81353); ?> (segfault with preloading and statically bound closure).</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(81407); ?> (shmop_open won't attach and causes php to crash).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71542); ?> (disk_total_space does not work with relative paths).</li>
  <li><?php bugfix(81400); ?> (Unterminated string in dns_get_record() results).</li>
</ul></li>
<li>SysVMsg:
<ul>
  <li><?php bugfix(78819); ?> (Heap Overflow in msg_send).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(81351); ?> (xml_parse may fail, but has no error code).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(81420); ?> (ZipArchive::extractTo extracts outside of destination). (CVE-2021-21706)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.23"><!-- {{{ 7.4.23 -->
<h3>Version 7.4.23</h3>
<b><?php release_date('26-Aug-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(72595); ?> (php_output_handler_append illegal write access).</li>
  <li><?php bugfix(66719); ?> (Weird behaviour when using get_called_class() with call_user_func()).</li>
  <li><?php bugfix(81305); ?> (Built-in Webserver Drops Requests With "Upgrade" Header).</li>
</ul></li>
<li>BCMath:
<ul>
  <li><?php bugfix(78238); ?> (BCMath returns "-0").</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(80849); ?> (HTTP Status header truncation).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(51498); ?> (imagefilledellipse does not work for large circles).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74544); ?> (Integer overflow in mysqli_real_escape_string()).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(81327); ?> (Error build openssl extension on php 7.4.22).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(81252); ?> (PDO_ODBC doesn't account for SQL_NO_TOTAL).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(81211); ?>: Symlinks are followed when creating PHAR archive.(cmb)</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(81283); ?> (shmop can't read beyond 2147483647 bytes).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72146); ?> (Integer overflow on substr_replace).</li>
  <li><?php bugfix(81265); ?> (getimagesize returns 0 for 256px ICO images).</li>
  <li><?php bugfix(74960); ?> (Heap buffer overflow via str_repeat).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(81294); ?> (Segfault when removing a filter).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.22"><!-- {{{ 7.4.22 -->
<h3>Version 7.4.22</h3>
<b><?php release_date('29-Jul-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81145); ?> (copy() and stream_copy_to_stream() fail for +4GB files).</li>
  <li><?php bugfix(81163); ?> (incorrect handling of indirect vars in __sleep).</li>
  <li><?php bugfix(80728); ?> (PHP built-in web server resets timeout when it can kill the process).</li>
  <li><?php bugfix(73630); ?> (Built-in Webserver - overwrite $_SERVER['request_uri']).</li>
  <li><?php bugfix(80173); ?> (Using return value of zend_assign_to_variable() is not safe).</li>
  <li><?php bugfix(73226); ?> (--r[fcez] always return zero exit code).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72809); ?> (Locale::lookup() wrong result with canonicalize option).</li>
  <li><?php bugfix(68471); ?> (IntlDateFormatter fails for "GMT+00:00" timezone).</li>
  <li><?php bugfix(74264); ?> (grapheme_strrpos() broken for negative offsets).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(52093); ?> (openssl_csr_sign truncates $serial).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(81101); ?> (PCRE2 10.37 shows unexpected result).</li>
  <li><?php bugfix(81243); ?> (Too much memory is allocated for preg_replace()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81223); ?> (flock() only locks first byte of file).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.21"><!-- {{{ 7.4.21 -->
<h3>Version 7.4.21</h3>
<b><?php release_date('01-Jul-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81068); ?> (Double free in realpath_cache_clean()).</li>
  <li><?php bugfix(76359); ?> (open_basedir bypass through adding "..").</li>
  <li><?php bugfix(81090); ?> (Typed property performance degradation with .= operator).</li>
  <li><?php bugfix(81070); ?> (Integer underflow in memory limit comparison).</li>
  <li><?php bugfix(81122); ?> (SSRF bypass in FILTER_VALIDATE_URL). (CVE-2021-21705)</li>
</ul></li>
<li>Bzip2:
<ul>
  <li><?php bugfix(81092); ?> (fflush before stream_filter_remove corrupts stream).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76694); ?> (native Windows cert verification uses CN as server name).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(76448); ?> (Stack buffer overflow in firebird_info_cb). (CVE-2021-21704)</li>
  <li><?php bugfix(76449); ?> (SIGSEGV in firebird_handle_doer). (CVE-2021-21704)</li>
  <li><?php bugfix(76450); ?> (SIGSEGV in firebird_stmt_execute). (CVE-2021-21704)</li>
  <li><?php bugfix(76452); ?> (Crash while parsing blob data in firebird_fetch_blob). (CVE-2021-21704)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81048); ?> (phpinfo(INFO_VARIABLES) "Array to string conversion").</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.20"><!-- {{{ 7.4.20 -->
<h3>Version 7.4.20</h3>
<b><?php release_date('03-Jun-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80929); ?> (Method name corruption related to repeated calls to call_user_func_array).</li>
  <li><?php bugfix(80960); ?> (opendir() warning wrong info when failed on Windows).</li>
  <li><?php bugfix(67792); ?> (HTTP Authorization schemes are treated as case-sensitive).</li>
  <li><?php bugfix(80972); ?> (Memory exhaustion on invalid string offset).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(65800); ?> (Events port mechanism).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(80901); ?> (Info leak in ftp extension).</li>
  <li><?php bugfix(79100); ?> (Wrong FTP error messages).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(81032); ?> (GD install is affected by external libgd installation).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(81011); ?> (mb_convert_encoding removes references from arrays).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(80460); ?> (ODBC doesn't account for SQL_NO_TOTAL indicator).</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(81037); ?> (PDO discards error message text from prepared statement).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(44643); ?> (bound parameters ignore explicit type definitions).</li>
</ul></li>
<li>pgsql:
<ul>
  <li>Fixed php_pgsql_fd_cast() wrt. php_stream_can_cast().</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80933); ?> (SplFileObject::DROP_NEW_LINE is broken for NUL and CR).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80900); ?> (switch statement behavior inside function).</li>
  <li><?php bugfix(81015); ?> (Opcache optimization assumes wrong part of ternary operator in if-condition).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(73246); ?> (XMLReader: encoding length not checked).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(80863); ?> (ZipArchive::extractTo() ignores references).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.19"><!-- {{{ 7.4.19 -->
<h3>Version 7.4.19</h3>
<b><?php release_date('06-May-2021'); ?></b>
<ul><li>PDO_pgsql:
<ul>
  <li>Reverted bug fix for #80892 (PDO::PARAM_INT is treated the same as PDO::PARAM_STR).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.18"><!-- {{{ 7.4.18 -->
<h3>Version 7.4.18</h3>
<b><?php release_date('29-Apr-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80781); ?> (Error handler that throws ErrorException infinite loop).</li>
  <li><?php bugfix(75776); ?> (Flushing streams with compression filter is broken).</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(80817); ?> (dba_popen() may cause segfault during RSHUTDOWN).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(66783); ?> (UAF when appending DOMDocument to element).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(80024); ?> (Duplication of info about inherited socket after pool removing).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(80880); ?> (SSL_read on shutdown, ftp/proc_open).</li>
</ul></li>
<li>Imap:
<ul>
  <li><?php bugfix(80710); ?> (imap_mail_compose() header injection).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80763); ?> (msgfmt_format() does not accept DateTime references).</li>
</ul></li>
<li>LibXML:
<ul>
  <li><?php bugfix(51903); ?> (simplexml_load_file() doesn't use HTTP headers).</li>
  <li><?php bugfix(73533); ?> (Invalid memory access in php_libxml_xmlCheckUTF8).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(80713); ?> (SegFault when disabling ATTR_EMULATE_PREPARES and MySQL 8.0).</li>
  <li><?php bugfix(80837); ?> (Calling stmt_store_result after fetch doesn't throw an error).</li>
  <li><?php bugfix(78680); ?> (mysqlnd's mysql_clear_password does not transmit null-terminated password).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80805); ?> (create simple class and get error in opcache.so).</li>
  <li><?php bugfix(80950); ?> (Variables become null in if statements).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(79812); ?> (Potential integer overflow in pcntl_exec()).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(80866); ?> (preg_split ignores limit flag when pattern with \K has 0-width fullstring match).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(80783); ?> (PDO ODBC truncates BLOB records at every 256th byte).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(80892); ?> (PDO::PARAM_INT is treated the same as PDO::PARAM_STR).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(80757); ?> (Exit code is 0 when could not open file).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(80774); ?> (session_name() problem with backslash).</li>
  <li><?php bugfix(80889); ?> (Cannot set save handler when save_handler is invalid).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69668); ?> (SOAP special XML characters in namespace URIs not encoded).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78719); ?> (http wrapper silently ignores long Location headers).</li>
  <li><?php bugfix(80771); ?> (phpinfo(INFO_CREDITS) displays nothing in CLI).</li>
  <li><?php bugfix(80838); ?> (HTTP wrapper waits for HTTP 1 response after HTTP 101).</li>
  <li><?php bugfix(80915); ?> (Taking a reference to $_SERVER hides its values from phpinfo()).</li>
  <li><?php bugfix(80654); ?> (file_get_contents() maxlen fails above (2**31)-1 bytes).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74779); ?> (x() and y() truncating floats to integers).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80682); ?> (opcache doesn't honour pcre.jit option).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80747); ?> (Providing RSA key size &lt; 512 generates key that crash PHP).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(75850); ?> (Unclear error message wrt. __halt_compiler() w/o semicolon) (cmb)</li>
  <li><?php bugfix(70091); ?> (Phar does not mark UTF-8 filenames in ZIP archives).</li>
  <li><?php bugfix(53467); ?> (Phar cannot compress large archives).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80719); ?> (Iterating after failed ArrayObject::setIteratorClass() causes Segmentation fault).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(80648); ?> (Fix for bug 79296 should be based on runtime version).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.4.16"><!-- {{{ 7.4.16 -->
<h3>Version 7.4.16</h3>
<b><?php release_date('04-Mar-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80706); ?> (mail(): Headers after Bcc headers may be ignored).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(78680); ?> (mysqlnd's mysql_clear_password does not transmit null-terminated password).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74779); ?> (x() and y() truncating floats to integers).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80682); ?> (opcache doesn't honour pcre.jit option).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80747); ?> (Providing RSA key size &lt; 512 generates key that crash PHP).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(75850); ?> (Unclear error message wrt. __halt_compiler() w/o semicolon) (cmb)</li>
  <li><?php bugfix(70091); ?> (Phar does not mark UTF-8 filenames in ZIP archives).</li>
  <li><?php bugfix(53467); ?> (Phar cannot compress large archives).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80719); ?> (Iterating after failed ArrayObject::setIteratorClass() causes Segmentation fault).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80654); ?> (file_get_contents() maxlen fails above (2**31)-1 bytes).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(80648); ?> (Fix for bug 79296 should be based on runtime version).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.15"><!-- {{{ 7.4.15 -->
<h3>Version 7.4.15</h3>
<b><?php release_date('04-Feb-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80523); ?> (bogus parse error on &gt;4GB source code).</li>
  <li><?php bugfix(80384); ?> (filter buffers entire read until file closed).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(80595); ?> (Resetting POSTFIELDS to empty array breaks request).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(80376); ?> (last day of the month causes runway cpu usage.</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(67983); ?> (mysqlnd with MYSQLI_OPT_INT_AND_FLOAT_NATIVE fails to interpret bit columns).</li>
  <li><?php bugfix(64638); ?> (Fetching resultsets from stored procedure with cursor fails).</li>
  <li><?php bugfix(72862); ?> (segfault using prepared statements on stored procedures that use a cursor).</li>
  <li><?php bugfix(77935); ?> (Crash in mysqlnd_fetch_stmt_row_cursor when calling an SP with a cursor).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77565); ?> (Incorrect locator detection in ZIP-based phars).</li>
  <li><?php bugfix(69279); ?> (Compressed ZIP Phar extractTo() creates garbage files).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(80672); ?> (Null Dereference in SoapClient). (CVE-2021-21702)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.14"><!-- {{{ 7.4.14 -->
<h3>Version 7.4.14</h3>
<b><?php release_date('07-Jan-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74558); ?> (Can't rebind closure returned by Closure::fromCallable()).</li>
  <li><?php bugfix(80345); ?> (PHPIZE configuration has outdated PHP_RELEASE_VERSION).</li>
  <li><?php bugfix(72964); ?> (White space not unfolded for CC/Bcc headers).</li>
  <li><?php bugfix(80362); ?> (Running dtrace scripts can cause php to crash).</li>
  <li><?php bugfix(80393); ?> (Build of PHP extension fails due to configuration gap with libtool).</li>
  <li><?php bugfix(80402); ?> (configure filtering out -lpthread).</li>
  <li><?php bugfix(77069); ?> (stream filter loses final block of data).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(77961); ?> (finfo_open crafted magic parsing SIGABRT).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(69625); ?> (FPM returns 200 status on request without SCRIPT_FILENAME env).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80425); ?> (MessageFormatAdapter::getArgTypeList redefined).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80368); ?> (OpenSSL extension fails to build against LibreSSL due to lack of OCB support).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(73809); ?> (Phar Zip parse crash - mmap fail).</li>
  <li><?php bugfix(75102); ?> (`PharData` says invalid checksum for valid tar).</li>
  <li><?php bugfix(77322); ?> (PharData::addEmptyDir('/') Possible integer overflow).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(80458); ?> (PDOStatement::fetchAll() throws for upsert queries).</li>
  <li><?php bugfix(63185); ?> (nextRowset() ignores MySQL errors with native prepared statements).</li>
  <li><?php bugfix(78152); ?> (PDO::exec() - Bad error handling with multiple commands).</li>
  <li><?php bugfix(70066); ?> (Unexpected "Cannot execute queries while other unbuffered queries").</li>
  <li><?php bugfix(71145); ?> (Multiple statements in init command triggers unbuffered query error).</li>
  <li><?php bugfix(76815); ?> (PDOStatement cannot be GCed/closeCursor-ed when a PROCEDURE resultset SIGNAL).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77423); ?> (FILTER_VALIDATE_URL accepts URLs with invalid userinfo). (CVE-2020-7071)</li>
  <li><?php bugfix(80366); ?> (Return Value of zend_fstat() not Checked).</li>
  <li><?php bugfix(80411); ?> (References to null-serialized object break serialize()).</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77594); ?> (ob_tidyhandler is never reset).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(48725); ?> (Support for flushing in zlib stream).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.13"><!-- {{{ 7.4.13 -->
<h3>Version 7.4.13</h3>
<b><?php release_date('26-Nov-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80280); ?> (ADD_EXTENSION_DEP() fails for ext/standard and ext/date).</li>
  <li><?php bugfix(80258); ?> (Windows Deduplication Enabled, randon permission errors).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(62474); ?> (com_event_sink crashes on certain arguments).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80268); ?> (loadHTML() truncates at NUL bytes).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79177); ?> (FFI doesn't handle well PHP exceptions within callback).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(64076); ?> (imap_sort() does not return FALSE on failure).</li>
  <li><?php bugfix(76618); ?> (segfault on imap_reopen).</li>
  <li><?php bugfix(80239); ?> (imap_rfc822_write_address() leaks memory).</li>
  <li>Fixed minor regression caused by fixing bug <?php bugl(80220); ?>.</li>
  <li><?php bugfix(80242); ?> (imap_mail_compose() segfaults for multipart with rfc822).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(79375); ?> (mysqli_store_result does not report error from lock wait timeout).</li>
  <li><?php bugfix(76525); ?> (mysqli::commit does not throw if MYSQLI_REPORT_ERROR enabled and mysqlnd used).</li>
  <li><?php bugfix(72413); ?> (mysqlnd segfault (fetch_row second parameter typemismatch)).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(44618); ?> (Fetching may rely on uninitialized data).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(79643); ?> (PHP with Opcache crashes when a file with specific name is included).</li>
  <li>Fixed run-time binding of preloaded dynamically declared function.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79983); ?> (openssl_encrypt / openssl_decrypt fail with OCB mode).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(66528); ?> (No PDOException or errorCode if database becomes unavailable before PDO::commit).</li>
  <li><?php bugfix(65825); ?> (PDOStatement::fetch() does not throw exception on broken server connection).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(70461); ?> (disable md5 code when it is not supported in net-snmp).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80266); ?> (parse_url silently drops port number 0).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.12"><!-- {{{ 7.4.12 -->
<h3>Version 7.4.12</h3>
<b><?php release_date('29-Oct-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80061); ?> (Copying large files may have suboptimal performance).</li>
  <li><?php bugfix(79423); ?> (copy command is limited to size of file it can copy).</li>
  <li><?php bugfix(80126); ?> (Covariant return types failing compilation).</li>
  <li><?php bugfix(80186); ?> (Segfault when iterating over FFI object).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(80185); ?> (jdtounix() fails after 2037).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(80213); ?> (imap_mail_compose() segfaults on certain $bodies).</li>
  <li><?php bugfix(80215); ?> (imap_mail_compose() may modify by-val parameters).</li>
  <li><?php bugfix(80220); ?> (imap_mail_compose() may leak memory).</li>
  <li><?php bugfix(80223); ?> (imap_mail_compose() leaks envelope on malformed bodies).</li>
  <li><?php bugfix(80216); ?> (imap_mail_compose() does not validate types/encodings).</li>
  <li><?php bugfix(80226); ?> (imap_sort() leaks sortpgm memory).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(80115); ?> (mysqlnd.debug doesn't recognize absolute paths with slashes).</li>
  <li><?php bugfix(80107); ?> (mysqli_query() fails for ~16 MB long query when compression is enabled).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(78470); ?> (odbc_specialcolumns() no longer accepts $nullable).</li>
  <li><?php bugfix(80147); ?> (BINARY strings may not be properly zero-terminated).</li>
  <li><?php bugfix(80150); ?> (Failure to fetch error message).</li>
  <li><?php bugfix(80152); ?> (odbc_execute() moves internal pointer of $params).</li>
  <li><?php bugfix(46050); ?> (odbc_next_result corrupts prepared resource).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80083); ?> (Optimizer pass 6 removes variables used for ibm_db2 data binding).</li>
  <li><?php bugfix(80194); ?> (Assertion failure during block assembly of unreachable free with leading nop).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Updated to PCRE 10.35.</li>
  <li><?php bugfix(80118); ?> (Erroneous whitespace match with JIT only).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(67465); ?> (NULL Pointer dereference in odbc_handle_preparer).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80114); ?> (parse_url does not accept URLs with port 0).</li>
  <li><?php bugfix(76943); ?> (Inconsistent stream_wrapper_restore() errors).</li>
  <li><?php bugfix(76735); ?> (Incorrect message in fopen on invalid mode).</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77040); ?> (tidyNode::isHtml() is completely broken).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.11"><!-- {{{ 7.4.11 -->
<h3>Version 7.4.11</h3>
<b><?php release_date('01-Oct-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79699); ?> (PHP parses encoded cookie names so malicious `__Host-` cookies can be sent). (CVE-2020-7070)</li>
  <li><?php bugfix(79979); ?> (passing value to by-ref param via CUFA crashes).</li>
  <li><?php bugfix(80037); ?> (Typed property must not be accessed before initialization when __get() declared).</li>
  <li><?php bugfix(80048); ?> (Bug <?php bugl(69100); ?> has not been fixed for Windows).</li>
  <li><?php bugfix(80049); ?> (Memleak when coercing integers to string via variadic argument).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(80007); ?> (Potential type confusion in unixtojd() parameter parsing).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(64130); ?> (COM obj parameters passed by reference are not updated).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80002); ?> (calc free space for new interned string is wrong).</li>
  <li><?php bugfix(80046); ?> (FREE for SWITCH_STRING optimized away).</li>
  <li><?php bugfix(79825); ?> (opcache.file_cache causes SIGSEGV when custom opcode handlers changed).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79601); ?> (Wrong ciphertext/tag in AES-CCM encryption for a 12 bytes IV). (CVE-2020-7069)</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(80027); ?> (Terrible performance using $query-&gt;fetch on queries with many bind parameters).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(47021); ?> (SoapClient stumbles over WSDL delivered with "Transfer-Encoding: chunked").</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79986); ?> (str_ireplace bug with diacritics characters).</li>
  <li><?php bugfix(80077); ?> (getmxrr test bug).</li>
  <li><?php bugfix(72941); ?> (Modifying bucket-&gt;data by-ref has no effect any longer).</li>
  <li><?php bugfix(80067); ?> (Omitting the port in bindto setting errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.10"><!-- {{{ 7.4.10 -->
<h3>Version 7.4.10</h3>
<b><?php release_date('03-Sep-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79884); ?> (PHP_CONFIG_FILE_PATH is meaningless).</li>
  <li><?php bugfix(77932); ?> (File extensions are case-sensitive).</li>
  <li><?php bugfix(79806); ?> (realpath() erroneously resolves link to link).</li>
  <li><?php bugfix(79895); ?> (PHP_CHECK_GCC_ARG does not allow flags with equal sign).</li>
  <li><?php bugfix(79919); ?> (Stack use-after-scope in define()).</li>
  <li><?php bugfix(79934); ?> (CRLF-only line in heredoc causes parsing error).</li>
  <li><?php bugfix(79947); ?> (Memory leak on invalid offset type in compound assignment).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(48585); ?> (com_load_typelib holds reference, fails on second call).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(75785); ?> (Many errors from exif_read_data).</li>
</ul></li>
<li>Gettext:
<ul>
  <li><?php bugfix(70574); ?> (Tests fail due to relying on Linux fallback behavior for gettext()).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed memory leaks.</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(73060); ?> (php failed with error after temp folder cleaned up).</li>
  <li><?php bugfix(79917); ?> (File cache segfault with a static variable in inherited method).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(64705); ?> (errorInfo property of PDOException is null when PDO::__construct() fails).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79724); ?> (Return type does not match in ext/session/mod_mm.c).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79930); ?> (array_merge_recursive() crashes when called with array with single reference).</li>
  <li><?php bugfix(79944); ?> (getmxrr always returns true on Alpine linux).</li>
  <li><?php bugfix(79951); ?> (Memory leak in str_replace of empty string).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(79922); ?> (Crash after multiple calls to xml_parser_free()).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.9"><!-- {{{ 7.4.9 -->
<h3>Version 7.4.9</h3>
<b><?php release_date('06-Aug-2020'); ?></b>
<ul><li>Apache:
<ul>
  <li><?php bugfix(79030); ?> (Upgrade apache2handler's php_apache_sapi_get_request_time to return usec).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(63208); ?> (BSTR to PHP string conversion not binary safe).</li>
  <li><?php bugfix(63527); ?> (DCOM does not work with Username, Password parameter).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(79740); ?> (serialize() and unserialize() methods can not be called statically).</li>
  <li><?php bugfix(79783); ?> (Segfault in php_str_replace_common).</li>
  <li><?php bugfix(79778); ?> (Assertion failure if dumping closure with unresolved static variable).</li>
  <li><?php bugfix(79779); ?> (Assertion failure when assigning property of string offset by reference).</li>
  <li><?php bugfix(79792); ?> (HT iterators not removed if empty array is destroyed).</li>
  <li><?php bugfix(78598); ?> (Changing array during undef index RW error segfaults).</li>
  <li><?php bugfix(79784); ?> (Use after free if changing array during undef var during array write fetch).</li>
  <li><?php bugfix(79793); ?> (Use after free if string used in undefined index warning is changed).</li>
  <li><?php bugfix(79862); ?> (Public non-static property in child should take priority over private static).</li>
  <li><?php bugfix(79877); ?> (getimagesize function silently truncates after a null byte) (cmb)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(79756); ?> (finfo_file crash (FILEINFO_MIME)).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(55857); ?> (ftp_size on large files).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(79787); ?> (mb_strimwidth does not trim string).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79797); ?> (Use of freed hash key in the phar_parse_zipfile function). (CVE-2020-7068)</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(79487); ?> (::getStaticProperties() ignores property modifications).</li>
  <li><?php bugfix(69804); ?> (::getStaticPropertyValue() throws on protected props).</li>
  <li><?php bugfix(79820); ?> (Use after free when type duplicated into ReflectionProperty gets resolved).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70362); ?> (Can't copy() large 'data://' with open_basedir).</li>
  <li><?php bugfix(78008); ?> (dns_check_record() always return true on Alpine).</li>
  <li><?php bugfix(79839); ?> (array_walk() does not respect property types).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.4.8"><!-- {{{ 7.4.8 -->
<h3>Version 7.4.8</h3>
<b><?php release_date('09-Jul-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79595); ?> (zend_init_fpu() alters FPU precision).</li>
  <li><?php bugfix(79650); ?> (php-win.exe 100% cpu lockup).</li>
  <li><?php bugfix(79668); ?> (get_defined_functions(true) may miss functions).</li>
  <li><?php bugfix(79683); ?> (Fake reflection scope affects __toString()).</li>
  <li>Fixed possibly unsupported timercmp() usage.</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(79687); ?> (Sony picture - PHP Warning - Make, Model, MakerNotes).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(79681); ?> (mime_content_type/finfo returning incorrect mimetype).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(73527); ?> (Invalid memory access in php_filter_strip).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(79676); ?> (imagescale adds black border with IMG_BICUBIC).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(62890); ?> (default_socket_timeout=-1 causes connection to timeout).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li><?php bugfix(79664); ?> (PDOStatement::getColumnMeta fails on empty result set).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(73926); ?> (phpdbg will not accept input on restart execution).</li>
  <li><?php bugfix(73927); ?> (phpdbg fails with windows error prompt at "watch array").</li>
  <li>Fixed several mostly Windows related phpdbg bugs.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(79710); ?> (Reproducible segfault in error_handler during GC involved an SplFileObject).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74267); ?> (segfault with streams and invalid data).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.7"><!-- {{{ 7.4.7 -->
<h3>Version 7.4.7</h3>
<b><?php release_date('11-Jun-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79599); ?> (coredump in set_error_handler).</li>
  <li><?php bugfix(79566); ?> (Private SHM is not private on Windows).</li>
  <li><?php bugfix(79489); ?> (.user.ini does not inherit).</li>
  <li><?php bugfix(79600); ?> (Regression in 7.4.6 when yielding an array based generator).</li>
  <li><?php bugfix(79657); ?> ("yield from" hangs when invalid value encountered).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79571); ?> (FFI: var_dumping unions may segfault).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(79615); ?> (Wrong GIF header written in GD GIFEncode).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(79596); ?> (MySQL FLOAT truncates to int some locales).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(79588); ?> (Boolean opcache settings ignore on/off values).</li>
  <li><?php bugfix(79548); ?> (Preloading segfault with inherited method using static variable).</li>
  <li><?php bugfix(79603); ?> (RTD collision with opcache).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79561); ?> (dns_get_record() fails with DNS_ALL).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.4.6"><!-- {{{ 7.4.6 -->
<h3>Version 7.4.6</h3>
<b><?php release_date('14-May-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78434); ?> (Generator yields no items after valid() call).</li>
  <li><?php bugfix(79477); ?> (casting object into array creates references).</li>
  <li><?php bugfix(79514); ?> (Memory leaks while including unexistent file).</li>
  <li><?php bugfix(79470); ?> (PHP incompatible with 3rd party file system on demand).</li>
  <li><?php bugfix(78784); ?> (Unable to interact with files inside a VFS for Git repository).</li>
  <li><?php bugfix(78875); ?> (Long variables cause OOM and temp files are not cleaned). (CVE-2019-11048).</li>
  <li><?php bugfix(78876); ?> (Long variables in multipart/form-data cause OOM and temp files are not cleaned). (CVE-2019-11048).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(78221); ?> (DOMNode::normalize() doesn't remove empty text nodes).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(79336); ?> (ext/exif/tests/bug79046.phpt fails on Big endian arch).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(79491); ?> (Search for .user.ini extends up to root dir).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(79441); ?> (Segfault in mb_chr() if internal encoding is unsupported).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79497); ?> (stream_socket_client() throws an unknown error sometimes with &lt;1s timeout).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded to PCRE2 10.34.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79503); ?> (Memory leak on duplicate metadata).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(79528); ?> (Different object of the same xml between 7.4.5 and 7.4.4).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69264); ?> (__debugInfo() ignored while extending SPL classes).</li>
  <li><?php bugfix(67369); ?> (ArrayObject serialization drops the iterator class).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79468); ?> (SIGSEGV when closing stream handle with a stream filter appended).</li>
  <li><?php bugfix(79447); ?> (Serializing uninitialized typed properties with __sleep should not throw).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.5"><!-- {{{ 7.4.5 -->
<h3>Version 7.4.5</h3>
<b><?php release_date('16-Apr-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79364); ?> (When copy empty array, next key is unspecified).</li>
  <li><?php bugfix(78210); ?> (Invalid pointer address).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79199); ?> (curl_copy_handle() memory leak).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(79396); ?> (DateTime hour incorrect during DST jump forward).</li>
  <li><?php bugfix(74940); ?> (DateTimeZone loose comparison always true).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php implemented(77062); ?> (Allow numeric [UG]ID in FPM listen.{owner,group}) (Andre Nathan)</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(79200); ?> (Some iconv functions cut Windows-1258).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(79412); ?> (Opcache chokes and uses 100% CPU on specific script).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79413); ?> (session_create_id() fails for active sessions).</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(79427); ?> (Integer Overflow in shmop_open()).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(61597); ?> (SXE properties may lack attributes and content).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(79357); ?> (SOAP request segfaults when any request parameter is missing).</li>
</ul></li>
<li>Spl:
<ul>
  <li><?php bugfix(75673); ?> (SplStack::unserialize() behavior).</li>
  <li><?php bugfix(79393); ?> (Null coalescing operator failing with SplFixedArray).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79330); ?> (shell_exec() silently truncates after a null byte).</li>
  <li><?php bugfix(79410); ?> (system() swallows last chunk if it is exactly 4095 bytes without newline).</li>
  <li><?php bugfix(79465); ?> (OOB Read in urldecode()). (CVE-2020-7067)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(79296); ?> (ZipArchive::open fails on empty file).</li>
  <li><?php bugfix(79424); ?> (php_zip_glob uses gl_pathc after call to globfree).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.4"><!-- {{{ 7.4.4 -->
<h3>Version 7.4.4</h3>
<b><?php release_date('19-Mar-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79329); ?> (get_headers() silently truncates after a null byte) (CVE-2020-7066)</li>
  <li><?php bugfix(79244); ?> (php crashes during parsing INI file).</li>
  <li><?php bugfix(63206); ?> (restore_error_handler does not restore previous errors mask).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(66322); ?> (COMPersistHelper::SaveToFile can save to wrong location).</li>
  <li><?php bugfix(79242); ?> (COM error constants don't match com_exception codes on x86).</li>
  <li><?php bugfix(79247); ?> (Garbage collecting variant objects segfaults).</li>
  <li><?php bugfix(79248); ?> (Traversing empty VT_ARRAY throws com_exception).</li>
  <li><?php bugfix(79299); ?> (com_print_typeinfo prints duplicate variables).</li>
  <li><?php bugfix(79332); ?> (php_istreams are never freed).</li>
  <li><?php bugfix(79333); ?> (com_print_typeinfo() leaks memory).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79019); ?> (Copied cURL handles upload empty file).</li>
  <li><?php bugfix(79013); ?> (Content-Length missing when posting a curlFile with curl).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(77569); ?>: (Write Access Violation in DomImplementation).</li>
  <li><?php bugfix(79271); ?> (DOMDocumentType::$childNodes is NULL).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(79311); ?> (enchant_dict_suggest() fails on big endian architecture).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(79282); ?> (Use-of-uninitialized-value in exif) (CVE-2020-7064).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(79283); ?> (Segfault in libmagic patch contains a buffer overflow).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77653); ?> (operator displayed instead of the real error message).</li>
  <li><?php bugfix(79014); ?> (PHP-FPM &amp; Primary script unknown).</li>
</ul></li>
<li>MBstring:
<ul>
  <li><?php bugfix(79371); ?> (mb_strtolower (UTF-32LE): stack-buffer-overflow at php_unicode_tolower_full) (CVE-2020-7065).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(64032); ?> (mysqli reports different client_version).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php implemented(79275); ?> (Support auth_plugin_caching_sha2_password on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(79252); ?> (preloading causes php-fpm to segfault during exit).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(79188); ?> (Memory corruption in preg_replace/preg_replace_callback and unicode).</li>
  <li><?php bugfix(79241); ?> (Segmentation fault on preg_match()).</li>
  <li><?php bugfix(79257); ?> (Duplicate named groups (?J) prefer last alternative even if not matched).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(79038); ?> (PDOStatement::nextRowset() leaks column values).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(79062); ?> (Property with heredoc default value returns false for getDocComment).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(79294); ?> (::columnType() may fail after SQLite3Stmt::reset()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79254); ?> (getenv() w/o arguments not showing changes).</li>
  <li><?php bugfix(79265); ?> (Improper injection of Host header when using fopen for http requests).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(79315); ?> (ZipArchive::addFile doesn't honor start/length parameters).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.3"><!-- {{{ 7.4.3 -->
<h3>Version 7.4.3</h3>
<b><?php release_date('20-Feb-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79146); ?> (cscript can fail to run on some systems).</li>
  <li><?php bugfix(79155); ?> (Property nullability lost when using multiple property definition).</li>
  <li><?php bugfix(78323); ?> (Code 0 is returned on invalid options).</li>
  <li><?php bugfix(78989); ?> (Delayed variance check involving trait segfaults).</li>
  <li><?php bugfix(79174); ?> (cookie values with spaces fail to round-trip).</li>
  <li><?php bugfix(76047); ?> (Use-after-free when accessing already destructed backtrace arguments).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(79247); ?> (Garbage collecting variant objects segfaults).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79078); ?> (Hypothetical use-after-free in curl_multi_add_handle()).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79096); ?> (FFI Struct Segfault).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(79112); ?> (IMAP extension can't find OpenSSL libraries at configure time).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(79212); ?> (NumberFormatter::format() may detect wrong type).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(79191); ?> (Error in SoapClient ctor disables DOMDocument::save()).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(79149); ?> (SEGV in mb_convert_encoding with non-string encodings).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(78666); ?> (Properties may emit a warning on var_dump()).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(79084); ?> (mysqlnd may fetch wrong column indexes with MYSQLI_BOTH).</li>
  <li><?php bugfix(79011); ?> (MySQL caching_sha2_password Access denied for password with more than 20 chars).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(79114); ?> (Eval class during preload causes class to be only half available).</li>
  <li><?php bugfix(79128); ?> (Preloading segfaults if preload_user is used).</li>
  <li><?php bugfix(79193); ?> (Incorrect type inference for self::$field =&amp; $field).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79145); ?> (openssl memory leak).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79082); ?> (Files added to tar with Phar::buildFromIterator have all-access permissions). (CVE-2020-7063)</li>
  <li><?php bugfix(79171); ?> (heap-buffer-overflow in phar_extract_file). (CVE-2020-7061)</li>
  <li><?php bugfix(76584); ?> (PharFileInfo::decompress not working).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(79115); ?> (ReflectionClass::isCloneable call reflected class __destruct).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79221); ?> (Null Pointer Dereference in PHP Session Upload Progress). (CVE-2020-7062)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78902); ?> (Memory leak when using stream_filter_append).</li>
  <li><?php bugfix(78969); ?> (PASSWORD_DEFAULT should match PASSWORD_BCRYPT instead of being null).</li>
</ul></li>
<li>Testing:
<ul>
  <li><?php bugfix(78090); ?> (bug45161.phpt takes forever to finish).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(70078); ?> (XSL callbacks with nodes as parameter leak memory).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Add ZipArchive::CM_LZMA2 and ZipArchive::CM_XZ constants (since libzip 1.6.0).</li>
  <li>Add ZipArchive::RDONLY (since libzip 1.0.0).</li>
  <li>Add ZipArchive::ER_* missing constants.</li>
  <li>Add ZipArchive::LIBZIP_VERSION constant.</li>
  <li><?php bugfix(73119); ?> (Wrong return for ZipArchive::addEmptyDir Method).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.2"><!-- {{{ 7.4.2 -->
<h3>Version 7.4.2</h3>
<b><?php release_date('23-Jan-2020'); ?></b>
<ul><li>Core:
<ul>
  <li>Preloading support on Windows has been disabled.</li>
  <li><?php bugfix(79022); ?> (class_exists returns True for classes that are not ready to be used).</li>
  <li><?php bugfix(78929); ?> (plus signs in cookie values are converted to spaces).</li>
  <li><?php bugfix(78973); ?> (Destructor during CV freeing causes segfault if opline never saved).</li>
  <li><?php bugfix(78776); ?> (Abstract method implementation from trait does not check "static").</li>
  <li><?php bugfix(78999); ?> (Cycle leak when using function result as temporary).</li>
  <li><?php bugfix(79008); ?> (General performance regression with PHP 7.4 on Windows).</li>
  <li><?php bugfix(79002); ?> (Serializing uninitialized typed properties with __sleep makes unserialize throw).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79033); ?> (Curl timeout error with specific url and post).</li>
  <li><?php bugfix(79063); ?> (curl openssl does not respect PKG_CONFIG_PATH).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(79015); ?> (undefined-behavior in php_date.c).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(78808); ?> ([LMDB] MDB_MAP_FULL: Environment mapsize limit reached).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(79046); ?> (NaN to int cast undefined behavior in exif).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(74170); ?> (locale information change after mime_content_type).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(79067); ?> (gdTransformAffineCopy() may use unitialized values).</li>
  <li><?php bugfix(79068); ?> (gdTransformAffineCopy() changes interpolation method).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(79029); ?> (Use After Free's in XMLReader / XMLWriter).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(79037); ?> (global buffer-overflow in `mbfl_filt_conv_big5_wchar`). (CVE-2020-7060)</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(78961); ?> (erroneous optimization of re-assigned $GLOBALS).</li>
  <li><?php bugfix(78950); ?> (Preloading trait method with static variables).</li>
  <li><?php bugfix(78903); ?> (Conflict in RTD key for closures results in crash).</li>
  <li><?php bugfix(78986); ?> (Opcache segfaults when inheriting ctor from immutable into mutable class).</li>
  <li><?php bugfix(79040); ?> (Warning Opcode handlers are unusable due to ASLR).</li>
  <li><?php bugfix(79055); ?> (Typed property become unknown with OPcache file cache).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(78402); ?> (Converting null to string in error message is bad DX).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(78983); ?> (pdo_pgsql config.w32 cannot find libpq-fe.h).</li>
  <li><?php bugfix(78980); ?> (pgsqlGetNotify() overlooks dead connection).</li>
  <li><?php bugfix(78982); ?> (pdo_pgsql returns dead persistent connection).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79091); ?> (heap use-after-free in session_create_id()).</li>
  <li><?php bugfix(79031); ?> (Session unserialization problem).</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(78538); ?> (shmop memory leak).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(79056); ?> (sqlite does not respect PKG_CONFIG_PATH during compilation).</li>
</ul></li>
<li>Spl:
<ul>
  <li><?php bugfix(78976); ?> (SplFileObject::fputcsv returns -1 on failure).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79099); ?> (OOB read in php_strip_tags_ex). (CVE-2020-7059)</li>
  <li><?php bugfix(79000); ?> (Non-blocking socket stream reports EAGAIN as error).</li>
  <li><?php bugfix(54298); ?> (Using empty additional_headers adding extraneous CRLF).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.1"><!-- {{{ 7.4.1 -->
<h3>Version 7.4.1</h3>
<b><?php release_date('18-Dec-2019'); ?></b>
<ul><li>Bcmath:
<ul>
  <li><?php bugfix(78878); ?> (Buffer underflow in bc_shift_addsub). (CVE-2019-11046).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(78862); ?> (link() silently truncates after a null byte on Windows). (CVE-2019-11044).</li>
  <li><?php bugfix(78863); ?> (DirectoryIterator class silently truncates after a null byte). (CVE-2019-11045).</li>
  <li><?php bugfix(78943); ?> (mail() may release string with refcount==1 twice). (CVE-2019-11049).</li>
  <li><?php bugfix(78810); ?> (RW fetches do not throw "uninitialized property" exception).</li>
  <li><?php bugfix(78868); ?> (Calling __autoload() with incorrect EG(fake_scope) value).</li>
  <li><?php bugfix(78296); ?> (is_file fails to detect file).</li>
  <li><?php bugfix(78883); ?> (fgets(STDIN) fails on Windows).</li>
  <li><?php bugfix(78898); ?> (call_user_func(['parent', ...]) fails while other succeed).</li>
  <li><?php bugfix(78904); ?> (Uninitialized property triggers __get()).</li>
  <li><?php bugfix(78926); ?> (Segmentation fault on Symfony cache:clear).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(78849); ?> (GD build broken with -D SIGNED_COMPARE_SLOW).</li>
  <li><?php bugfix(78923); ?> (Artifacts when convoluting image with transparency).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78793); ?> (Use-after-free in exif parsing under memory sanitizer). (CVE-2019-11050).</li>
  <li><?php bugfix(78910); ?> (Heap-buffer-overflow READ in exif). (CVE-2019-11047).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76601); ?> (Partially working php-fpm ater incomplete reload).</li>
  <li><?php bugfix(78889); ?> (php-fpm service fails to start).</li>
  <li><?php bugfix(78916); ?> (php-fpm 7.4.0 don't send mail via mail()).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php implemented(78912); ?> (INTL Support for accounting format).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(78823); ?> (ZLIB_LIBS not added to EXTRA_LIBS).</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed $x = (bool)$x; with opcache (should emit undeclared variable notice).</li>
  <li><?php bugfix(78935); ?> (Preloading removes classes that have dependencies).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(78853); ?> (preg_match() may return integer &gt; 1).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(78895); ?> (Reflection detects abstract non-static class as abstract static. IS_IMPLICIT_ABSTRACT is not longer used).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77638); ?> (var_export'ing certain class instances segfaults).</li>
  <li><?php bugfix(78840); ?> (imploding $GLOBALS crashes).</li>
  <li><?php bugfix(78833); ?> (Integer overflow in pack causes out-of-bound access).</li>
  <li><?php bugfix(78814); ?> (strip_tags allows / in tag name =&gt; whitelist bypass).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.4.0"><!-- {{{ 7.4.0 -->
<h3>Version 7.4.0</h3>
<b><?php release_date('28-Nov-2019'); ?></b>
<ul>
<li>Core:
  <ul>
    <li>Implemented RFC: <a href="https://wiki.php.net/rfc/deprecate_curly_braces_array_access">Deprecate curly brace syntax for accessing array elements and string offsets</a>.</li>
    <li>Implemented RFC: <a href="https://wiki.php.net/rfc/deprecations_php_7_4">Deprecations for PHP 7.4</a>.</li>
    <li><?php bugfix(52752); ?> (Crash when lexing).</li>
    <li><?php bugfix(60677); ?> (CGI doesn't properly validate shebang line contains #!).</li>
    <li><?php bugfix(71030); ?> (Self-assignment in list() may have inconsistent behavior).</li>
    <li><?php bugfix(72530); ?> (Use After Free in GC with Certain Destructors).</li>
    <li><?php bugfix(75921); ?> (Inconsistent: No warning in some cases when stdObj is created on the fly).</li>
    <li><?php implemented(76148); ?> (Add array_key_exists() to the list of specially compiled functions).</li>
    <li><?php bugfix(76430); ?> (__METHOD__ inconsistent outside of method).</li>
    <li><?php bugfix(76451); ?> (Aliases during inheritance type checks affected by opcache).</li>
    <li><?php implemented(77230); ?> (Support custom CFLAGS and LDFLAGS from environment).</li>
    <li><?php bugfix(77345); ?> (Stack Overflow caused by circular reference in garbage collection).</li>
    <li><?php bugfix(77812); ?> (Interactive mode does not support PHP 7.3-style heredoc).</li>
    <li><?php bugfix(77877); ?> (call_user_func() passes $this to static methods).</li>
    <li><?php bugfix(78066); ?> (PHP eats the first byte of a program that comes from process substitution).</li>
    <li><?php bugfix(78151); ?> (Segfault caused by indirect expressions in PHP 7.4a1).</li>
    <li><?php bugfix(78154); ?> (SEND_VAR_NO_REF does not always send reference).</li>
    <li><?php bugfix(78182); ?> (Segmentation fault during by-reference property assignment).</li>
    <li><?php bugfix(78212); ?> (Segfault in built-in webserver).</li>
    <li><?php bugfix(78220); ?> (Can't access OneDrive folder).</li>
    <li><?php bugfix(78226); ?> (Unexpected __set behavior with typed properties).</li>
    <li><?php bugfix(78239); ?> (Deprecation notice during string conversion converted to exception hangs).</li>
    <li><?php bugfix(78335); ?> (Static properties/variables containing cycles report as leak).</li>
    <li><?php bugfix(78340); ?> (Include of stream wrapper not reading whole file).</li>
    <li><?php bugfix(78344); ?> (Segmentation fault on zend_check_protected).</li>
    <li><?php bugfix(78356); ?> (Array returned from ArrayAccess is incorrectly unpacked as argument).</li>
    <li><?php bugfix(78379); ?> (Cast to object confuses GC, causes crash).</li>
    <li><?php bugfix(78386); ?> (fstat mode has unexpected value on PHP 7.4).</li>
    <li><?php bugfix(78396); ?> (Second file_put_contents in Shutdown hangs script).</li>
    <li><?php bugfix(78406); ?> (Broken file includes with user-defined stream filters).</li>
    <li><?php bugfix(78438); ?> (Corruption when __unserializing deeply nested structures).</li>
    <li><?php bugfix(78441); ?> (Parse error due to heredoc identifier followed by digit).</li>
    <li><?php bugfix(78454); ?> (Consecutive numeric separators cause OOM error).</li>
    <li><?php bugfix(78460); ?> (PEAR installation failure).</li>
    <li><?php bugfix(78531); ?> (Crash when using undefined variable as object).</li>
    <li><?php bugfix(78535); ?> (auto_detect_line_endings value not parsed as bool).</li>
    <li><?php bugfix(78604); ?> (token_get_all() does not properly tokenize FOO&lt;?php with short_open_tag=0).</li>
    <li><?php bugfix(78614); ?> (Does not compile with DTRACE anymore).</li>
    <li><?php bugfix(78620); ?> (Out of memory error).</li>
    <li><?php bugfix(78632); ?> (method_exists() in php74 works differently from php73 in checking priv. methods).</li>
    <li><?php bugfix(78644); ?> (SEGFAULT in ZEND_UNSET_OBJ_SPEC_VAR_CONST_HANDLER).</li>
    <li><?php bugfix(78658); ?> (Memory corruption using Closure::bindTo).</li>
    <li><?php bugfix(78656); ?> (Parse errors classified as highest log-level).</li>
    <li><?php bugfix(78662); ?> (stream_write bad error detection).</li>
    <li><?php bugfix(78768); ?> (redefinition of typedef zend_property_info).</li>
    <li><?php bugfix(78788); ?> (./configure generates invalid php_version.h).</li>
    <li>Fixed incorrect usage of QM_ASSIGN instruction. It must not return IS_VAR. As a side effect, this allowed passing left hand list() "by reference", instead of compile-time error.</li>
  </ul>

<li>CLI:
  <ul>
    <li>The built-in CLI server now reports the request method in log files.</li>
  </ul>

<li>COM:
  <ul>
    <li>Deprecated registering of case-insensitive constants from typelibs.</li>
    <li><?php bugfix(78650); ?> (new COM Crash).</li>
    <li><?php bugfix(78694); ?> (Appending to a variant array causes segfault).</li>
  </ul>

<li>CURL:
  <ul>
    <li><?php bugfix(76480); ?> (Use curl_multi_wait() so that timeouts are respected).</li>
    <li><?php implemented(77711); ?> (CURLFile should support UNICODE filenames).</li>
    <li>Deprecated CURLPIPE_HTTP1.</li>
    <li>Deprecated $version parameter of curl_version().</li>
  </ul>

<li>Date:
  <ul>
    <li>Updated timelib to 2018.02.</li>
    <li><?php bugfix(69044); ?> (discrepency between time and microtime).</li>
    <li><?php bugfix(70153); ?> (\DateInterval incorrectly unserialized).</li>
    <li><?php bugfix(75232); ?> (print_r of DateTime creating side-effect).</li>
    <li><?php bugfix(78383); ?> (Casting a DateTime to array no longer returns its properties).</li>
    <li><?php bugfix(78751); ?> (Serialising DatePeriod converts DateTimeImmutable).</li>
  </ul>

<li>Exif:
  <ul>
    <li><?php bugfix(78333); ?> (Exif crash (bus error) due to wrong alignment and invalid cast).</li>
    <li><?php bugfix(78256); ?> (heap-buffer-overflow on exif_process_user_comment). (CVE-2019-11042)</li>
    <li><?php bugfix(78222); ?> (heap-buffer-overflow on exif_scan_thumbnail). (CVE-2019-11041)</li>
  </ul>

<li>Fileinfo:
  <ul>
    <li><?php bugfix(78075); ?> (finfo_file treats JSON file as text/plain).</li>
    <li><?php bugfix(78183); ?> (finfo_file shows wrong mime-type for .tga file).</li>
  </ul>

<li>Filter:
  <ul>
    <li>The filter extension no longer has the --with-pcre-dir on Unix builds, allowing the extension to be once more compiled as shared using ./configure.</li>
    <li>Added min_range and max_range options for FILTER_VALIDATE_FLOAT.</li>
  </ul>

<li>FFI:
  <ul>
    <li>Added FFI extension.</li>
    <li><?php bugfix(78488); ?> (OOB in ZEND_FUNCTION(ffi_trampoline)).</li>
    <li><?php bugfix(78543); ?> (is_callable() on FFI\CData throws Exception).</li>
    <li><?php bugfix(78716); ?> (Function name mangling is wrong for some parameter types).</li>
    <li><?php bugfix(78762); ?> (Failing FFI::cast() may leak memory).</li>
    <li><?php bugfix(78761); ?> (Zend memory heap corruption with preload and casting).</li>
    <li><?php implemented(78270); ?> (Support __vectorcall convention with FFI).</li>
    <li>Added missing FFI::isNull().</li>
  </ul>

<li>FPM:
  <ul>
    <li><?php implemented(72510); ?> (systemd service should be hardened).</li>
    <li><?php bugfix(74083); ?> (master PHP-fpm is stopped on multiple reloads).</li>
    <li><?php bugfix(78334); ?> (fpm log prefix message includes wrong stdout/stderr notation).</li>
    <li><?php bugfix(78599); ?> (env_path_info underflow in fpm_main.c can lead to RCE). (CVE-2019-11043)</li>
  </ul>

<li>GD:
  <ul>
    <li>Implemented the scatter filter (IMG_FILTER_SCATTER).</li>
    <li>The bundled libgd behaves now like system libgd wrt. IMG_CROP_DEFAULT never falling back to IMG_CROP_SIDES.</li>
    <li>The default $mode parameter of imagecropauto() has been changed to IMG_CROP_DEFAULT; passing -1 is now deprecated.</li>
    <li>Added support for aspect ratio preserving scaling to a fixed height for imagescale().</li>
    <li>Added TGA read support.</li>
    <li><?php bugfix(73291); ?> (imagecropauto() $threshold differs from external libgd).</li>
    <li><?php bugfix(76324); ?> (cannot detect recent versions of freetype with pkg-config).</li>
    <li><?php bugfix(78314); ?> (missing freetype support/functions with external gd).</li>
  </ul>

<li>GMP:
  <ul>
    <li><?php bugfix(78574); ?> (broken shared build).</li>
  </ul>

<li>Hash:
  <ul>
    <li>Implemented RFC: <a href="https://wiki.php.net/rfc/permanent_hash_ext">The hash extension is now an integral part of PHP and cannot be disabled</a>.</li>
    <li><?php implemented(71890); ?> (crc32c checksum algorithm).</li>
  </ul>

<li>Iconv:
  <ul>
    <li><?php bugfix(78342); ?> (Bus error in configure test for iconv //IGNORE).</li>
    <li><?php bugfix(78642); ?> (Wrong libiconv version displayed).</li>
  </ul>

<li>Libxml:
  <ul>
    <li><?php bugfix(78279); ?> (libxml_disable_entity_loader settings is shared between requests (cgi-fcgi)).</li>
  </ul>

<li>InterBase:
  <ul>
    <li>Unbundled the InterBase extension and moved it to PECL.</li>
  </ul>

<li>Intl:
  <ul>
    <li>Raised requirements to ICU ≥ 50.1.</li>
    <li>Changed ResourceBundle to implement Countable.</li>
    <li>Changed default of $variant parameter of idn_to_ascii() and idn_to_utf8().</li>
  </ul>

<li>LDAP:
  <ul>
    <li>Deprecated ldap_control_paged_result_response and ldap_control_paged_result</li>
  </ul>

<li>LiteSpeed:
  <ul>
    <li>Updated to LiteSpeed SAPI V7.5 (Fixed clean shutdown).</li>
    <li>Updated to LiteSpeed SAPI V7.4.3 (increased response header count limit from 100 to 1000, added crash handler to cleanly shutdown PHP request, added CloudLinux mod_lsapi mode).</li>
    <li><?php bugfix(76058); ?> (After "POST data can't be buffered", using php://input makes huge tmp files).</li>
  </ul>

<li>MBString:
  <ul>
    <li><?php bugfix(77907); ?> (mb-functions do not respect default_encoding).</li>
    <li><?php bugfix(78579); ?> (mb_decode_numericentity: args number inconsistency).</li>
    <li><?php bugfix(78609); ?> (mb_check_encoding() no longer supports stringable objects).</li>
  </ul>

<li>MySQLi:
  <ul>
    <li><?php bugfix(67348); ?> (Reading $dbc-&gt;stat modifies $dbc-&gt;affected_rows).</li>
    <li><?php bugfix(76809); ?> (SSL settings aren't respected when persistent connections are used).</li>
    <li><?php bugfix(78179); ?> (MariaDB server version incorrectly detected).</li>
    <li><?php bugfix(78213); ?> (Empty row pocket).</li>
  </ul>

<li>MySQLnd:
  <ul>
    <li>Fixed connect_attr issues and added the _server_host connection attribute.</li>
    <li><?php bugfix(60594); ?> (mysqlnd exposes 160 lines of stats in phpinfo).</li>
  </ul>

<li>ODBC:
  <ul>
    <li><?php bugfix(78473); ?> (odbc_close() closes arbitrary resources).</li>
  </ul>

<li>Opcache:
  <ul>
    <li>Implemented <a href="https://wiki.php.net/rfc/preload">preloading RFC</a>.</li>
    <li>Add opcache.preload_user INI directive.</li>
    <li>Added new INI directive opcache.cache_id (Windows only).</li>
    <li><?php bugfix(78106); ?> (Path resolution fails if opcache disabled during request).</li>
    <li><?php bugfix(78175); ?> (Preloading segfaults at preload time and at runtime).</li>
    <li><?php bugfix(78202); ?> (Opcache stats for cache hits are capped at 32bit NUM).</li>
    <li><?php bugfix(78271); ?> (Invalid result of if-else).</li>
    <li><?php bugfix(78341); ?> (Failure to detect smart branch in DFA pass).</li>
    <li><?php bugfix(78376); ?> (Incorrect preloading of constant static properties).</li>
    <li><?php bugfix(78429); ?> (opcache_compile_file(__FILE__); segfaults).</li>
    <li><?php bugfix(78512); ?> (Cannot make preload work).</li>
    <li><?php bugfix(78514); ?> (Preloading segfaults with inherited typed property).</li>
    <li><?php bugfix(78654); ?> (Incorrectly computed opcache checksum on files with non-ascii characters).</li>
  </ul>

<li>OpenSSL:
  <ul>
    <li>Added TLS 1.3 support to streams including new tlsv1.3 stream.</li>
    <li>Added openssl_x509_verify function.</li>
    <li>openssl_random_pseudo_bytes() now throws in error conditions.</li>
    <li>Changed the default config path (Windows only).</li>
    <li><?php bugfix(78231); ?> (Segmentation fault upon stream_socket_accept of exported socket-to-stream).</li>
    <li><?php bugfix(78391); ?> (Assertion failure in openssl_random_pseudo_bytes).</li>
    <li><?php bugfix(78775); ?> (TLS issues from HTTP request affecting other encrypted connections).</li>
  </ul>

<li>Pcntl:
  <ul>
    <li><?php bugfix(77335); ?> (PHP is preventing SIGALRM from specifying SA_RESTART).</li>
  </ul>

<li>PCRE:
  <ul>
    <li><?php implemented(77094); ?> (Support flags in preg_replace_callback).</li>
    <li><?php bugfix(72685); ?> (Repeated UTF-8 validation of same string in UTF-8 mode).</li>
    <li><?php bugfix(73948); ?> (Preg_match_all should return NULLs on trailing optional capture groups).</li>
    <li><?php bugfix(78338); ?> (Array cross-border reading in PCRE).</li>
    <li><?php bugfix(78349); ?> (Bundled pcre2 library missing LICENCE file).</li>
  </ul>

<li>PDO:
  <ul>
    <li><?php implemented(71885); ?> (Allow escaping question mark placeholders). https://wiki.php.net/rfc/pdo_escape_placeholders</li>
    <li><?php bugfix(77849); ?> (Disable cloning of PDO handle/connection objects).</li>
    <li><?php implemented(78033); ?> (PDO - support username and password specified in DSN).</li>
  </ul>

<li>PDO_Firebird:
  <ul>
    <li><?php implemented(65690); ?> (PDO_Firebird should also support dialect 1).</li>
    <li><?php implemented(77863); ?> (PDO firebird support type Boolean in input parameters).</li>
  </ul>

<li>PDO_MySQL:
  <ul>
    <li><?php bugfix(41997); ?> (SP call yields additional empty result set).</li>
    <li><?php bugfix(78623); ?> (Regression caused by "SP call yields additional empty result set").</li>
  </ul>

<li>PDO_OCI:
  <ul>
    <li>Support Oracle Database tracing attributes ACTION, MODULE, CLIENT_INFO, and CLIENT_IDENTIFIER.</li>
    <li><?php implemented(76908); ?> (PDO_OCI getColumnMeta() not implemented).</li>
  </ul>

<li>PDO_SQLite:
  <ul>
    <li>Implemented sqlite_stmt_readonly in PDO_SQLite.</li>
    <li>Raised requirements to SQLite 3.5.0.</li>
    <li><?php bugfix(78192); ?> (SegFault when reuse statement after schema has changed).</li>
    <li><?php bugfix(78348); ?> (Remove -lrt from pdo_sqlite.so).</li>
  </ul>

<li>Phar:
  <ul>
    <li><?php bugfix(77919); ?> (Potential UAF in Phar RSHUTDOWN).</li>
  </ul>

<li>phpdbg:
  <ul>
    <li><?php bugfix(76596); ?> (phpdbg support for display_errors=stderr).</li>
    <li><?php bugfix(76801); ?> (too many open files).</li>
    <li><?php bugfix(77800); ?> (phpdbg segfaults on listing some conditional breakpoints).</li>
    <li><?php bugfix(77805); ?> (phpdbg build fails when readline is shared).</li>
  </ul>

<li>Recode:
  <ul>
    <li>Unbundled the recode extension.</li>
  </ul>

<li>Reflection:
  <ul>
    <li><?php bugfix(76737); ?> (Unserialized reflection objects are broken, they shouldn't be serializable).</li>
    <li><?php bugfix(78263); ?> (\ReflectionReference::fromArrayElement() returns null while item is a reference).</li>
    <li><?php bugfix(78410); ?> (Cannot "manually" unserialize class that is final and extends an internal one).</li>
    <li><?php bugfix(78697); ?> (ReflectionClass::implementsInterface - inaccurate error message with traits).</li>
    <li><?php bugfix(78774); ?> (ReflectionNamedType on Typed Properties Crash).</li>
  </ul>

<li>Session:
  <ul>
    <li><?php bugfix(78624); ?> (session_gc return value for user defined session handlers).</li>
  </ul>

<li>SimpleXML:
  <ul>
    <li><?php implemented(65215); ?> (SimpleXMLElement could register as implementing Countable).</li>
    <li><?php bugfix(75245); ?> (Don't set content of elements with only whitespaces).</li>
  </ul>

<li>Sockets:
  <ul>
    <li><?php bugfix(67619); ?> (Validate length on socket_write).</li>
    <li><?php bugfix(78665); ?> (Multicasting may leak memory).</li>
  </ul>

<li>sodium:
  <ul>
    <li><?php bugfix(77646); ?> (sign_detached() strings not terminated).</li>
    <li><?php bugfix(78510); ?> (Partially uninitialized buffer returned by sodium_crypto_generichash_init()).</li>
    <li><?php bugfix(78516); ?> (password_hash(): Memory cost is not in allowed range).</li>
  </ul>

<li>SPL:
  <ul>
    <li><?php bugfix(77518); ?> (SeekableIterator::seek() should accept 'int' typehint as documented).</li>
    <li><?php bugfix(78409); ?> (Segfault when creating instance of ArrayIterator without constructor).</li>
    <li><?php bugfix(78436); ?> (Missing addref in SplPriorityQueue EXTR_BOTH mode).</li>
    <li><?php bugfix(78456); ?> (Segfault when serializing SplDoublyLinkedList).</li>
  </ul>

<li>SQLite3:
  <ul>
    <li>Unbundled libsqlite.</li>
    <li>Raised requirements to SQLite 3.7.4.</li>
    <li>Forbid (un)serialization of SQLite3, SQLite3Stmt and SQLite3Result.</li>
    <li>Added support for the SQLite @name notation.</li>
    <li>Added SQLite3Stmt::getSQL() to retrieve the SQL of the statement.</li>
    <li><?php implemented(70950); ?> (Make SQLite3 Online Backup API available).</li>
  </ul>

<li>Standard:
  <ul>
    <li>Implemented RFC <a href="https://wiki.php.net/rfc/password_registry">password hashing registry</a>.</li>
    <li>Implemented RFC where password_hash() has <a href="https://wiki.php.net/rfc/sodium.argon.hash">argon2i(d) implementations</a> from ext/sodium when PHP is built without libargon.</li>
    <li><?php implemented(38301); ?> (field enclosure behavior in fputcsv).</li>
    <li><?php implemented(51496); ?> (fgetcsv should take empty string as an escape).</li>
    <li><?php bugfix(73535); ?> (php_sockop_write() returns 0 on error, can be used to trigger Denial of Service).</li>
    <li><?php bugfix(74764); ?> (Bindto IPv6 works with file_get_contents but fails with stream_socket_client).</li>
    <li><?php bugfix(76859); ?> (stream_get_line skips data if used with data-generating filter).</li>
    <li><?php implemented(77377); ?> (No way to handle CTRL+C in Windows).</li>
    <li><?php bugfix(77930); ?> (stream_copy_to_stream should use mmap more often).</li>
    <li><?php implemented(78177); ?> (Make proc_open accept command array).</li>
    <li><?php bugfix(78208); ?> (password_needs_rehash() with an unknown algo should always return true).</li>
    <li><?php bugfix(78241); ?> (touch() does not handle dates after 2038 in PHP 64-bit).</li>
    <li><?php bugfix(78282); ?> (atime and mtime mismatch).</li>
    <li><?php bugfix(78326); ?> (improper memory deallocation on stream_get_contents() with fixed length buffer).</li>
    <li><?php bugfix(78346); ?> (strip_tags no longer handling nested php tags).</li>
    <li><?php bugfix(78506); ?> (Error in a php_user_filter::filter() is not reported).</li>
    <li><?php bugfix(78549); ?> (Stack overflow due to nested serialized input).</li>
    <li><?php bugfix(78759); ?> (array_search in $GLOBALS).</li>
  </ul>

<li>Testing:
  <ul>
    <li><?php bugfix(78684); ?> (PCRE bug72463_2 test is sending emails on Linux).</li>
  </ul>

<li>Tidy:
  <ul>
    <li>Added TIDY_TAG_* constants for HTML5 elements.</li>
    <li><?php bugfix(76736); ?> (wrong reflection for tidy_get_head, tidy_get_html, tidy_get_root, and tidy_getopt)</li>
  </ul>

<li>WDDX:
  <ul>
    <li>Deprecated and unbundled the WDDX extension.</li>
  </ul>

<li>Zip:
  <ul>
    <li><?php bugfix(78641); ?> (addGlob can modify given remove_path value).</li>
  </ul>
</ul>

<!-- }}} --></section>

<a id="PHP_7_3"></a>

<section class="version" id="7.3.33"><!-- {{{ 7.3.33 -->
<h3>Version 7.3.33</h3>
<b><?php release_date('18-Nov-2021'); ?></b>
<ul><li>XML:
<ul>
  <li><?php bugfix(79971); ?> (special character is breaking the path in xml function). (CVE-2021-21707)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.32"><!-- {{{ 7.3.32 -->
<h3>Version 7.3.32</h3>
<b><?php release_date('28-Oct-2021'); ?></b>
<ul><li>FPM:
<ul>
  <li><?php bugfix(81026); ?> (PHP-FPM oob R/W in root process leading to privilege escalation). (CVE-2021-21703)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.31"><!-- {{{ 7.3.31 -->
<h3>Version 7.3.31</h3>
<b><?php release_date('23-Sep-2021'); ?></b>
<ul><li>Zip:
<ul>
  <li><?php bugfix(81420); ?> (ZipArchive::extractTo extracts outside of destination). (CVE-2021-21706)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.30"><!-- {{{ 7.3.30 -->
<h3>Version 7.3.30</h3>
<b><?php release_date('26-Aug-2021'); ?></b>
<ul><li>Phar:
<ul>
  <li><?php bugfix(81211); ?>: Symlinks are followed when creating PHAR archive.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.29"><!-- {{{ 7.3.29 -->
<h3>Version 7.3.29</h3>
<b><?php release_date('01-Jul-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81122); ?>: SSRF bypass in FILTER_VALIDATE_URL. (CVE-2021-21705)</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(76448); ?>: Stack buffer overflow in firebird_info_cb. (CVE-2021-21704)</li>
  <li><?php bugfix(76449); ?>: SIGSEGV in firebird_handle_doer. (CVE-2021-21704)</li>
  <li><?php bugfix(76450); ?>: SIGSEGV in firebird_stmt_execute. (CVE-2021-21704)</li>
  <li><?php bugfix(76452); ?>: Crash while parsing blob data in firebird_fetch_blob. (CVE-2021-21704)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.28"><!-- {{{ 7.3.28 -->
<h3>Version 7.3.28</h3>
<b><?php release_date('29-Apr-2021'); ?></b>
<ul><li>Imap:
<ul>
  <li><?php bugfix(80710); ?> (imap_mail_compose() header injection).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.27"><!-- {{{ 7.3.27 -->
<h3>Version 7.3.27</h3>
<b><?php release_date('04-Feb-2021'); ?></b>
<ul><li>SOAP:
<ul>
  <li><?php bugfix(80672); ?> (Null Dereference in SoapClient). (CVE-2021-21702)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.26"><!-- {{{ 7.3.26 -->
<h3>Version 7.3.26</h3>
<b><?php release_date('07-Jan-2021'); ?></b>
<ul><li>Standard:
<ul>
  <li><?php bugfix(77423); ?> (FILTER_VALIDATE_URL accepts URLs with invalid userinfo). (CVE-2020-7071)</li>
  <li><?php bugfix(80457); ?> (stream_get_contents() fails with maxlength=-1 or default).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.25"><!-- {{{ 7.3.25 -->
<h3>Version 7.3.25</h3>
<b><?php release_date('26-Nov-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80280); ?> (ADD_EXTENSION_DEP() fails for ext/standard and ext/date).</li>
  <li><?php bugfix(80258); ?> (Windows Deduplication Enabled, randon permission errors).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(62474); ?> (com_event_sink crashes on certain arguments).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80268); ?> (loadHTML() truncates at NUL bytes).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(64076); ?> (imap_sort() does not return FALSE on failure).</li>
  <li><?php bugfix(76618); ?> (segfault on imap_reopen).</li>
  <li><?php bugfix(80239); ?> (imap_rfc822_write_address() leaks memory).</li>
  <li>Fixed minor regression caused by fixing bug <?php bugl(80220); ?>.</li>
  <li><?php bugfix(80242); ?> (imap_mail_compose() segfaults for multipart with rfc822).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80310); ?> (ext-intl with icu4c 68.1: use of undeclared identifier 'TRUE').</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(44618); ?> (Fetching may rely on uninitialized data).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(70461); ?> (disable md5 code when it is not supported in net-snmp).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80266); ?> (parse_url silently drops port number 0).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.24"><!-- {{{ 7.3.24 -->
<h3>Version 7.3.24</h3>
<b><?php release_date('29-Oct-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79423); ?> (copy command is limited to size of file it can copy).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(80185); ?> (jdtounix() fails after 2037).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(80213); ?> (imap_mail_compose() segfaults on certain $bodies).</li>
  <li><?php bugfix(80215); ?> (imap_mail_compose() may modify by-val parameters).</li>
  <li><?php bugfix(80220); ?> (imap_mail_compose() may leak memory).</li>
  <li><?php bugfix(80223); ?> (imap_mail_compose() leaks envelope on malformed bodies).</li>
  <li><?php bugfix(80216); ?> (imap_mail_compose() does not validate types/encodings).</li>
  <li><?php bugfix(80226); ?> (imap_sort() leaks sortpgm memory).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(80115); ?> (mysqlnd.debug doesn't recognize absolute paths with slashes).</li>
  <li><?php bugfix(80107); ?> (mysqli_query() fails for ~16 MB long query when compression is enabled).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(78470); ?> (odbc_specialcolumns() no longer accepts $nullable).</li>
  <li><?php bugfix(80147); ?> (BINARY strings may not be properly zero-terminated).</li>
  <li><?php bugfix(80150); ?> (Failure to fetch error message).</li>
  <li><?php bugfix(80152); ?> (odbc_execute() moves internal pointer of $params).</li>
  <li><?php bugfix(46050); ?> (odbc_next_result corrupts prepared resource).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80083); ?> (Optimizer pass 6 removes variables used for ibm_db2 data binding).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(67465); ?> (NULL Pointer dereference in odbc_handle_preparer).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80114); ?> (parse_url does not accept URLs with port 0).</li>
  <li><?php bugfix(76943); ?> (Inconsistent stream_wrapper_restore() errors).</li>
  <li><?php bugfix(76735); ?> (Incorrect message in fopen on invalid mode).</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77040); ?> (tidyNode::isHtml() is completely broken).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.23"><!-- {{{ 7.3.23 -->
<h3>Version 7.3.23</h3>
<b><?php release_date('01-Oct-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80048); ?> (Bug <?php bugl(69100); ?> has not been fixed for Windows).</li>
  <li><?php bugfix(80049); ?> (Memleak when coercing integers to string via variadic argument).</li>
  <li><?php bugfix(79699); ?> (PHP parses encoded cookie names so malicious `__Host-` cookies can be sent). (CVE-2020-7070)</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(80007); ?> (Potential type confusion in unixtojd() parameter parsing).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(64130); ?> (COM obj parameters passed by reference are not updated).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(80002); ?> (calc free space for new interned string is wrong).</li>
  <li><?php bugfix(79825); ?> (opcache.file_cache causes SIGSEGV when custom opcode handlers changed).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79601); ?> (Wrong ciphertext/tag in AES-CCM encryption for a 12 bytes IV). (CVE-2020-7069)</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(80027); ?> (Terrible performance using $query-&gt;fetch on queries with many bind parameters).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(47021); ?> (SoapClient stumbles over WSDL delivered with "Transfer-Encoding: chunked").</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79986); ?> (str_ireplace bug with diacritics characters).</li>
  <li><?php bugfix(80077); ?> (getmxrr test bug).</li>
  <li><?php bugfix(72941); ?> (Modifying bucket-&gt;data by-ref has no effect any longer).</li>
  <li><?php bugfix(80067); ?> (Omitting the port in bindto setting errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.22"><!-- {{{ 7.3.22 -->
<h3>Version 7.3.22</h3>
<b><?php release_date('03-Sep-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79884); ?> (PHP_CONFIG_FILE_PATH is meaningless).</li>
  <li><?php bugfix(77932); ?> (File extensions are case-sensitive).</li>
  <li><?php bugfix(79806); ?> (realpath() erroneously resolves link to link).</li>
  <li><?php bugfix(79895); ?> (PHP_CHECK_GCC_ARG does not allow flags with equal sign).</li>
  <li><?php bugfix(79919); ?> (Stack use-after-scope in define()).</li>
  <li><?php bugfix(79934); ?> (CRLF-only line in heredoc causes parsing error).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(48585); ?> (com_load_typelib holds reference, fails on second call).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(75785); ?> (Many errors from exif_read_data).</li>
</ul></li>
<li>Gettext:
<ul>
  <li><?php bugfix(70574); ?> (Tests fail due to relying on Linux fallback behavior for gettext()).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed memory leaks.</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(73060); ?> (php failed with error after temp folder cleaned up).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(64705); ?> (errorInfo property of PDOException is null when PDO::__construct() fails).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79930); ?> (array_merge_recursive() crashes when called with array with single reference).</li>
  <li><?php bugfix(79944); ?> (getmxrr always returns true on Alpine linux).</li>
  <li><?php bugfix(79951); ?> (Memory leak in str_replace of empty string).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(79922); ?> (Crash after multiple calls to xml_parser_free()).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.21"><!-- {{{ 7.3.21 -->
<h3>Version 7.3.21</h3>
<b><?php release_date('06-Aug-2020'); ?></b>
<ul><li>Apache:
<ul>
  <li><?php bugfix(79030); ?> (Upgrade apache2handler's php_apache_sapi_get_request_time to return usec).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(79877); ?> (getimagesize function silently truncates after a null byte).</li>
  <li><?php bugfix(79778); ?> (Assertion failure if dumping closure with unresolved static variable).</li>
  <li><?php bugfix(79792); ?> (HT iterators not removed if empty array is destroyed).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(63208); ?> (BSTR to PHP string conversion not binary safe).</li>
  <li><?php bugfix(63527); ?> (DCOM does not work with Username, Password parameter).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(79741); ?> (curl_setopt CURLOPT_POSTFIELDS asserts on object with declared properties).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(79756); ?> (finfo_file crash (FILEINFO_MIME)).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(55857); ?> (ftp_size on large files).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(79787); ?> (mb_strimwidth does not trim string).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79797); ?> (Use of freed hash key in the phar_parse_zipfile function). (CVE-2020-7068)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70362); ?> (Can't copy() large 'data://' with open_basedir).</li>
  <li><?php bugfix(79817); ?> (str_replace() does not handle INDIRECT elements).</li>
  <li><?php bugfix(78008); ?> (dns_check_record() always return true on Alpine).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.20"><!-- {{{ 7.3.20 -->
<h3>Version 7.3.20</h3>
<b><?php release_date('09-Jul-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79650); ?> (php-win.exe 100% cpu lockup).</li>
  <li><?php bugfix(79668); ?> (get_defined_functions(true) may miss functions).</li>
  <li>Fixed possibly unsupported timercmp() usage.</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(79687); ?> (Sony picture - PHP Warning - Make, Model, MakerNotes).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(73527); ?> (Invalid memory access in php_filter_strip).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(79676); ?> (imagescale adds black border with IMG_BICUBIC).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(62890); ?> (default_socket_timeout=-1 causes connection to timeout).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li><?php bugfix(79664); ?> (PDOStatement::getColumnMeta fails on empty result set).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(79710); ?> (Reproducible segfault in error_handler during GC involved an SplFileObject).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74267); ?> (segfault with streams and invalid data).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.19"><!-- {{{ 7.3.19 -->
<h3>Version 7.3.19</h3>
<b><?php release_date('11-Jun-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79566); ?> (Private SHM is not private on Windows).</li>
  <li><?php bugfix(79489); ?> (.user.ini does not inherit).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(79615); ?> (Wrong GIF header written in GD GIFEncode).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(79596); ?> (MySQL FLOAT truncates to int some locales).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(79535); ?> (PHP crashes with specific opcache.optimization_level).</li>
  <li><?php bugfix(79588); ?> (Boolean opcache settings ignore on/off values).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79561); ?> (dns_get_record() fails with DNS_ALL).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.18"><!-- {{{ 7.3.18 -->
<h3>Version 7.3.18</h3>
<b><?php release_date('14-May-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78875); ?> (Long filenames cause OOM and temp files are not cleaned). (CVE-2019-11048)</li>
  <li><?php bugfix(78876); ?> (Long variables in multipart/form-data cause OOM and temp files are not cleaned). (CVE-2019-11048)</li>
  <li><?php bugfix(79434); ?> (PHP 7.3 and PHP-7.4 crash with NULL-pointer dereference on !CS constant).</li>
  <li><?php bugfix(79477); ?> (casting object into array creates references).</li>
  <li><?php bugfix(79470); ?> (PHP incompatible with 3rd party file system on demand).</li>
  <li><?php bugfix(78784); ?> (Unable to interact with files inside a VFS for Git repository).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(78221); ?> (DOMNode::normalize() doesn't remove empty text nodes).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(79491); ?> (Search for .user.ini extends up to root dir).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(79441); ?> (Segfault in mb_chr() if internal encoding is unsupported).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79497); ?> (stream_socket_client() throws an unknown error sometimes with &lt;1s timeout).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79503); ?> (Memory leak on duplicate metadata).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(79528); ?> (Different object of the same xml between 7.4.5 and 7.4.4).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79468); ?> (SIGSEGV when closing stream handle with a stream filter appended).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.17"><!-- {{{ 7.3.17 -->
<h3>Version 7.3.17</h3>
<b><?php release_date('16-Apr-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79364); ?> (When copy empty array, next key is unspecified).</li>
  <li><?php bugfix(78210); ?> (Invalid pointer address).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79199); ?> (curl_copy_handle() memory leak).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(79396); ?> (DateTime hour incorrect during DST jump forward).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(79200); ?> (Some iconv functions cut Windows-1258).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(79412); ?> (Opcache chokes and uses 100% CPU on specific script).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79413); ?> (session_create_id() fails for active sessions).</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(79427); ?> (Integer Overflow in shmop_open()).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(61597); ?> (SXE properties may lack attributes and content).</li>
</ul></li>
<li>Spl:
<ul>
  <li><?php bugfix(75673); ?> (SplStack::unserialize() behavior).</li>
  <li><?php bugfix(79393); ?> (Null coalescing operator failing with SplFixedArray).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79330); ?> (shell_exec() silently truncates after a null byte).</li>
  <li><?php bugfix(79465); ?> (OOB Read in urldecode()). (CVE-2020-7067)</li>
  <li><?php bugfix(79410); ?> (system() swallows last chunk if it is exactly 4095 bytes without newline).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(79296); ?> (ZipArchive::open fails on empty file).</li>
  <li><?php bugfix(79424); ?> (php_zip_glob uses gl_pathc after call to globfree).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.16"><!-- {{{ 7.3.16 -->
<h3>Version 7.3.16</h3>
<b><?php release_date('19-Mar-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(63206); ?> (restore_error_handler does not restore previous errors mask).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(66322); ?> (COMPersistHelper::SaveToFile can save to wrong location).</li>
  <li><?php bugfix(79242); ?> (COM error constants don't match com_exception codes on x86).</li>
  <li><?php bugfix(79248); ?> (Traversing empty VT_ARRAY throws com_exception).</li>
  <li><?php bugfix(79299); ?> (com_print_typeinfo prints duplicate variables).</li>
  <li><?php bugfix(79332); ?> (php_istreams are never freed).</li>
  <li><?php bugfix(79333); ?> (com_print_typeinfo() leaks memory).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(77569); ?>: (Write Access Violation in DomImplementation).</li>
  <li><?php bugfix(79271); ?> (DOMDocumentType::$childNodes is NULL).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(79311); ?> (enchant_dict_suggest() fails on big endian architecture).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(79282); ?> (Use-of-uninitialized-value in exif). (CVE-2020-7064)</li>
</ul></li>
<li>MBstring:
<ul>
  <li><?php bugfix(79371); ?> (mb_strtolower (UTF-32LE): stack-buffer-overflow at php_unicode_tolower_full). (CVE-2020-7065)</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(64032); ?> (mysqli reports different client_version).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(79188); ?> (Memory corruption in preg_replace/preg_replace_callback and unicode).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(79038); ?> (PDOStatement::nextRowset() leaks column values).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(79062); ?> (Property with heredoc default value returns false for getDocComment).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(79294); ?> (::columnType() may fail after SQLite3Stmt::reset()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79329); ?> (get_headers() silently truncates after a null byte). (CVE-2020-7066)</li>
  <li><?php bugfix(79254); ?> (getenv() w/o arguments not showing changes).</li>
  <li><?php bugfix(79265); ?> (Improper injection of Host header when using fopen for http requests).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.15"><!-- {{{ 7.3.15 -->
<h3>Version 7.3.15</h3>
<b><?php release_date('20-Feb-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(71876); ?> (Memory corruption htmlspecialchars(): charset `*' not supported).</li>
  <li><?php bugfix(79146); ?> (cscript can fail to run on some systems).</li>
  <li><?php bugfix(78323); ?> (Code 0 is returned on invalid options).</li>
  <li><?php bugfix(76047); ?> (Use-after-free when accessing already destructed backtrace arguments).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79078); ?> (Hypothetical use-after-free in curl_multi_add_handle()).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(79212); ?> (NumberFormatter::format() may detect wrong type).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(79191); ?> (Error in SoapClient ctor disables DOMDocument::save()).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(79154); ?> (mb_convert_encoding() can modify $from_encoding).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(79084); ?> (mysqlnd may fetch wrong column indexes with MYSQLI_BOTH).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79145); ?> (openssl memory leak).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79082); ?> (Files added to tar with Phar::buildFromIterator have all-access permissions). (CVE-2020-7063)</li>
  <li><?php bugfix(79171); ?> (heap-buffer-overflow in phar_extract_file). (CVE-2020-7061)</li>
  <li><?php bugfix(76584); ?> (PharFileInfo::decompress not working).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(79115); ?> (ReflectionClass::isCloneable call reflected class __destruct).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79221); ?> (Null Pointer Dereference in PHP Session Upload Progress). (CVE-2020-7062)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(79151); ?> (heap use after free caused by spl_dllist_it_helper_move_forward).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78902); ?> (Memory leak when using stream_filter_append).</li>
</ul></li>
<li>Testing:
<ul>
  <li><?php bugfix(78090); ?> (bug45161.phpt takes forever to finish).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(70078); ?> (XSL callbacks with nodes as parameter leak memory).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.14"><!-- {{{ 7.3.14 -->
<h3>Version 7.3.14</h3>
<b><?php release_date('23-Jan-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78999); ?> (Cycle leak when using function result as temporary).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(79033); ?> (Curl timeout error with specific url and post).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(79015); ?> (undefined-behavior in php_date.c).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(78808); ?> ([LMDB] MDB_MAP_FULL: Environment mapsize limit reached).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(74170); ?> (locale information change after mime_content_type).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(78923); ?> (Artifacts when convoluting image with transparency).</li>
  <li><?php bugfix(79067); ?> (gdTransformAffineCopy() may use unitialized values).</li>
  <li><?php bugfix(79068); ?> (gdTransformAffineCopy() changes interpolation method).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(79029); ?> (Use After Free's in XMLReader / XMLWriter).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(79037); ?> (global buffer-overflow in `mbfl_filt_conv_big5_wchar`). (CVE-2020-7060)</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(79040); ?> (Warning Opcode handlers are unusable due to ASLR).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(78402); ?> (Converting null to string in error message is bad DX).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(78983); ?> (pdo_pgsql config.w32 cannot find libpq-fe.h).</li>
  <li><?php bugfix(78980); ?> (pgsqlGetNotify() overlooks dead connection).</li>
  <li><?php bugfix(78982); ?> (pdo_pgsql returns dead persistent connection).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79091); ?> (heap use-after-free in session_create_id()).</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(78538); ?> (shmop memory leak).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79099); ?> (OOB read in php_strip_tags_ex). (CVE-2020-7059)</li>
  <li><?php bugfix(54298); ?> (Using empty additional_headers adding extraneous CRLF).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.13"><!-- {{{ 7.3.13 -->
<h3>Version 7.3.13</h3>
<b><?php release_date('18-Dec-2019'); ?></b>
<ul><li>Bcmath:
<ul>
  <li><?php bugfix(78878); ?> (Buffer underflow in bc_shift_addsub). (CVE-2019-11046)</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(78862); ?> (link() silently truncates after a null byte on Windows). (CVE-2019-11044)</li>
  <li><?php bugfix(78863); ?> (DirectoryIterator class silently truncates after a null byte). (CVE-2019-11045)</li>
  <li><?php bugfix(78943); ?> (mail() may release string with refcount==1 twice). (CVE-2019-11049)</li>
  <li><?php bugfix(78787); ?> (Segfault with trait overriding inherited private shadow property).</li>
  <li><?php bugfix(78868); ?> (Calling __autoload() with incorrect EG(fake_scope) value).</li>
  <li><?php bugfix(78296); ?> (is_file fails to detect file).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78793); ?> (Use-after-free in exif parsing under memory sanitizer). (CVE-2019-11050)</li>
  <li><?php bugfix(78910); ?> (Heap-buffer-overflow READ in exif) (CVE-2019-11047).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(78849); ?> (GD build broken with -D SIGNED_COMPARE_SLOW).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Upgraded bundled Oniguruma to 6.9.4.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed potential ASLR related invalid opline handler issues.</li>
  <li>Fixed $x = (bool)$x; with opcache (should emit undeclared variable notice).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(78853); ?> (preg_match() may return integer &gt; 1).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78759); ?> (array_search in $GLOBALS).</li>
  <li><?php bugfix(77638); ?> (var_export'ing certain class instances segfaults).</li>
  <li><?php bugfix(78840); ?> (imploding $GLOBALS crashes).</li>
  <li><?php bugfix(78833); ?> (Integer overflow in pack causes out-of-bound access).</li>
  <li><?php bugfix(78814); ?> (strip_tags allows / in tag name =&gt; whitelist bypass).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.12"><!-- {{{ 7.3.12 -->
<h3>Version 7.3.12</h3>
<b><?php release_date('21-Nov-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78658); ?> (Memory corruption using Closure::bindTo).</li>
  <li><?php bugfix(78656); ?> (Parse errors classified as highest log-level).</li>
  <li><?php bugfix(78752); ?> (Segfault if GC triggered while generator stack frame is being destroyed).</li>
  <li><?php bugfix(78689); ?> (Closure::fromCallable() doesn't handle [Closure, '__invoke']).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(78694); ?> (Appending to a variant array causes segfault).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70153); ?> (\DateInterval incorrectly unserialized).</li>
  <li><?php bugfix(78751); ?> (Serialising DatePeriod converts DateTimeImmutable).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78642); ?> (Wrong libiconv version displayed).</li>
</ul></li>
<li>OpCache:
<ul>
  <li><?php bugfix(78654); ?> (Incorrectly computed opcache checksum on files with non-ascii characters).</li>
  <li><?php bugfix(78747); ?> (OpCache corrupts custom extension result).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(78775); ?> (TLS issues from HTTP request affecting other encrypted connections).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(78697); ?> (ReflectionClass::ImplementsInterface - inaccurate error message with traits).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(78665); ?> (Multicasting may leak memory).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.11"><!-- {{{ 7.3.11 -->
<h3>Version 7.3.11</h3>
<b><?php release_date('24-Oct-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78535); ?> (auto_detect_line_endings value not parsed as bool).</li>
  <li><?php bugfix(78620); ?> (Out of memory error).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(78442); ?> ('Illegal component' on exif_read_data since PHP7) (Kalle)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(78599); ?> (env_path_info underflow in fpm_main.c can lead to RCE). (CVE-2019-11043)</li>
  <li><?php bugfix(78413); ?> (request_terminate_timeout does not take effect after fastcgi_finish_request).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(78633); ?> (Heap buffer overflow (read) in mb_eregi).</li>
  <li><?php bugfix(78579); ?> (mb_decode_numericentity: args number inconsistency).</li>
  <li><?php bugfix(78609); ?> (mb_check_encoding() no longer supports stringable objects).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(76809); ?> (SSL settings aren't respected when persistent connections are used).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(78525); ?> (Memory leak in pdo when reusing native prepared statements).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(78272); ?> (calling preg_match() before pcntl_fork() will freeze child process).</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(78623); ?> (Regression caused by "SP call yields additional empty result set").</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(78624); ?> (session_gc return value for user defined session handlers).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76342); ?> (file_get_contents waits twice specified timeout).</li>
  <li><?php bugfix(78612); ?> (strtr leaks memory when integer keys are used and the subject string shorter).</li>
  <li><?php bugfix(76859); ?> (stream_get_line skips data if used with data-generating filter).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(78641); ?> (addGlob can modify given remove_path value).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.10"><!-- {{{ 7.3.10 -->
<h3>Version 7.3.10</h3>
<b><?php release_date('26-Sep-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78220); ?> (Can't access OneDrive folder).</li>
  <li><?php bugfix(77922); ?> (Double release of doc comment on inherited shadow property).</li>
  <li><?php bugfix(78441); ?> (Parse error due to heredoc identifier followed by digit).</li>
  <li><?php bugfix(77812); ?> (Interactive mode does not support PHP 7.3-style heredoc).</li>
</ul></li>
<li>FastCGI:
<ul>
  <li><?php bugfix(78469); ?> (FastCGI on_accept hook is not called when using named pipes on Windows).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(78334); ?> (fpm log prefix message includes wrong stdout/stderr notation).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Ensure IDNA2003 rules are used with idn_to_ascii() and idn_to_utf8() when requested.</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(78559); ?> (Heap buffer overflow in mb_eregi).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed connect_attr issues and added the _server_host connection attribute.</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(78473); ?> (odbc_close() closes arbitrary resources).</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(41997); ?> (SP call yields additional empty result set).</li>
</ul></li>
<li>sodium:
<ul>
  <li><?php bugfix(78510); ?> (Partially uninitialized buffer returned by sodium_crypto_generichash_init()).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.9"><!-- {{{ 7.3.9 -->
<h3>Version 7.3.9</h3>
<b><?php release_date('29-Aug-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78363); ?> (Buffer overflow in zendparse).</li>
  <li><?php bugfix(78379); ?> (Cast to object confuses GC, causes crash).</li>
  <li><?php bugfix(78412); ?> (Generator incorrectly reports non-releasable $this as GC child).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(77946); ?> (Bad cURL resources returned by curl_multi_info_read()).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(78333); ?> (Exif crash (bus error) due to wrong alignment and invalid cast).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77185); ?> (Use-after-free in FPM master event handling).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78342); ?> (Bus error in configure test for iconv //IGNORE).</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated to LiteSpeed SAPI V7.5 (Fixed clean shutdown).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(78380); ?> (Oniguruma 6.9.3 fixes CVEs). (CVE-2019-13224)</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(78179); ?> (MariaDB server version incorrectly detected).</li>
  <li><?php bugfix(78213); ?> (Empty row pocket).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77191); ?> (Assertion failure in dce_live_ranges() when silencing is used).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69100); ?> (Bus error from stream_copy_to_stream (file -&gt; SSL stream) with invalid length).</li>
  <li><?php bugfix(78282); ?> (atime and mtime mismatch).</li>
  <li><?php bugfix(78326); ?> (improper memory deallocation on stream_get_contents() with fixed length buffer).</li>
  <li><?php bugfix(78346); ?> (strip_tags no longer handling nested php tags).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.8"><!-- {{{ 7.3.8 -->
<h3>Version 7.3.8</h3>
<b><?php release_date('01-Aug-2019'); ?></b>
<ul><li>Core:
<ul>
  <li>Added syslog.filter=raw option.</li>
  <li><?php bugfix(78212); ?> (Segfault in built-in webserver).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(69044); ?> (discrepency between time and microtime).</li>
  <li>Updated timelib to 2018.02.</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78256); ?> (heap-buffer-overflow on exif_process_user_comment). (CVE-2019-11042)</li>
  <li><?php bugfix(78222); ?> (heap-buffer-overflow on exif_scan_thumbnail). (CVE-2019-11041)</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(78039); ?> (FTP with SSL memory leak).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(78279); ?> (libxml_disable_entity_loader settings is shared between requests (cgi-fcgi)).</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated to LiteSpeed SAPI V7.4.3 (increased response header count limit from 100 to 1000, added crash handler to cleanly shutdown PHP request, added CloudLinux mod_lsapi mode).</li>
  <li><?php bugfix(76058); ?> (After "POST data can't be buffered", using php://input makes huge tmp files).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(78231); ?> (Segmentation fault upon stream_socket_accept of exported socket-to-stream).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(78341); ?> (Failure to detect smart branch in DFA pass).</li>
  <li><?php bugfix(78189); ?> (file cache strips last character of uname hash).</li>
  <li><?php bugfix(78202); ?> (Opcache stats for cache hits are capped at 32bit NUM).</li>
  <li><?php bugfix(78271); ?> (Invalid result of if-else).</li>
  <li><?php bugfix(78291); ?> (opcache_get_configuration doesn't list all directives).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(78338); ?> (Array cross-border reading in PCRE).</li>
  <li><?php bugfix(78197); ?> (PCRE2 version check in configure fails for "##.##-xxx" version strings).</li>
</ul></li>
<li>PDO_Sqlite:
<ul>
  <li><?php bugfix(78192); ?> (SegFault when reuse statement after schema has changed).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77919); ?> (Potential UAF in Phar RSHUTDOWN).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(78297); ?> (Include unexistent file memory leak).</li>
</ul></li>
<li>SQLite:
<ul>
  <li>Upgraded to SQLite 3.28.0.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78241); ?> (touch() does not handle dates after 2038 in PHP 64-bit).</li>
  <li><?php bugfix(78269); ?> (password_hash uses weak options for argon2).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.3.7"><!-- {{{ 7.3.7 -->
<h3>Version 7.3.7</h3>
<b><?php release_date('04-Jul-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76980); ?> (Interface gets skipped if autoloader throws an exception).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(78025); ?> (segfault when accessing properties of DOMDocumentType).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(77956); ?> (When mysqli.allow_local_infile = Off, use a meaningful error message).</li>
  <li><?php bugfix(38546); ?> (bindParam incorrect processing of bool types).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(77955); ?> (Random segmentation fault in mysqlnd from php-fpm).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(78015); ?> (Incorrect evaluation of expressions involving partials arrays in SCCP).</li>
  <li><?php bugfix(78106); ?> (Path resolution fails if opcache disabled during request).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(78079); ?> (openssl_encrypt_ccm.phpt fails with OpenSSL 1.1.1c).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(78050); ?> (SegFault phpdbg + opcache on include file twice).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(78038); ?> (Socket_select fails when resource array contains references).</li>
</ul></li>
<li>Sodium:
<ul>
  <li><?php bugfix(78114); ?> (segfault when calling sodium_* functions from eval).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77135); ?> (Extract with EXTR_SKIP should skip $this).</li>
  <li><?php bugfix(77937); ?> (preg_match failed).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(76345); ?> (zip.h not found).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.3.6"><!-- {{{ 7.3.6 -->
<h3>Version 7.3.6</h3>
<b><?php release_date('30-May-2019'); ?></b>
<ul><li>cURL:
<ul>
  <li><?php implemented(72189); ?> (Add missing CURL_VERSION_* constants).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(77909); ?> (DatePeriod::__construct() with invalid recurrence count value).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77988); ?> (heap-buffer-overflow on php_jpg_get16) (CVE-2019-11040).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77934); ?> (php-fpm kill -USR2 not working).</li>
  <li><?php bugfix(77921); ?> (static.php.net doesn't work anymore).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77943); ?> (imageantialias($image, false); does not work).</li>
  <li><?php bugfix(77973); ?> (Uninitialized read in gdImageCreateFromXbm) (CVE-2019-11038).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78069); ?> (Out-of-bounds read in iconv.c:_php_iconv_mime_decode() due to integer overflow) (CVE-2019-11039).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(77843); ?> (Use after free with json serializer).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed possible crashes, because of inconsistent PCRE cache and opcache SHM reset.</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(77944); ?> (Wrong meta pdo_type for bigint on LLP64).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(75186); ?> (Inconsistent reflection of Closure:::__invoke()).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(77911); ?> (Wrong warning for session.sid_bits_per_character).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(77945); ?> (Segmentation fault when constructing SoapClient with WSDL_CACHE_BOTH).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(77024); ?> (SplFileObject::__toString() may return array).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(77967); ?> (Bypassing open_basedir restrictions via file uris).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77931); ?> (Warning for array_map mentions wrong type).</li>
  <li><?php bugfix(78003); ?> (strip_tags output change since PHP 7.3).</li>
</ul></li>
</ul>
<!-- }}} --></section>
<section class="version" id="7.3.5"><!-- {{{ 7.3.5 -->
<h3>Version 7.3.5</h3>
<b><?php release_date('02-May-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77903); ?> (ArrayIterator stops iterating after offsetSet call).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(77794); ?> (Incorrect Date header format in built-in server).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77950); ?> (Heap-buffer-overflow in _estrndup via exif_process_IFD_TAG) (CVE-2019-11036).</li>
</ul></li>
<li>Interbase:
<ul>
  <li><?php bugfix(72175); ?> (Impossibility of creating multiple connections to Interbase with php 7.x).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(77895); ?> (IntlDateFormatter::create fails in strict mode if $locale = null).</li>
</ul></li>
<li>litespeed:
<ul>
  <li>LiteSpeed SAPI 7.3.1, better process management, new API function litespeed_finish_request().</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(77869); ?> (Core dump when using server controls) (mcmic)</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(77821); ?> (Potential heap corruption in TSendMail()).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php implemented(72777); ?> (Implement regex stack limits for mbregex functions).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(77773); ?> (Unbuffered queries leak memory - MySQLi / mysqlnd).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(77827); ?> (preg_match does not ignore \r in regex flags).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(77849); ?> (Disable cloning of PDO handle/connection objects).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76801); ?> (too many open files).</li>
  <li><?php bugfix(77800); ?> (phpdbg segfaults on listing some conditional breakpoints).</li>
  <li><?php bugfix(77805); ?> (phpdbg build fails when readline is shared).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(77772); ?> (ReflectionClass::getMethods(null) doesn't work).</li>
  <li><?php bugfix(77882); ?> (Different behavior: always calls destructor).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77793); ?> (Segmentation fault in extract() when overwriting reference with itself).</li>
  <li><?php bugfix(77844); ?> (Crash due to null pointer in parse_ini_string with INI_SCANNER_TYPED).</li>
  <li><?php bugfix(77853); ?> (Inconsistent substr_compare behaviour with empty haystack).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.3.4"><!-- {{{ 7.3.4 -->
<h3>Version 7.3.4</h3>
<b><?php release_date('04-Apr-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77738); ?> (Nullptr deref in zend_compile_expr).</li>
  <li><?php bugfix(77660); ?> (Segmentation fault on break 2147483648).</li>
  <li><?php bugfix(77652); ?> (Anonymous classes can lose their interface information).</li>
  <li><?php bugfix(77345); ?> (Stack Overflow caused by circular reference in garbage collection).</li>
  <li><?php bugfix(76956); ?> (Wrong value for 'syslog.filter' documented in php.ini).</li>
</ul></li>
<li>Apache2Handler:
<ul>
  <li><?php bugfix(77648); ?> (BOM in sapi/apache2handler/php_functions.c).</li>
</ul></li>
<li>Bcmath:
<ul>
  <li><?php bugfix(77742); ?> (bcpow() implementation related to gcc compiler optimization).</li>
</ul></li>
<li>CLI Server:
<ul>
  <li><?php bugfix(77722); ?> (Incorrect IP set to $_SERVER['REMOTE_ADDR'] on the localhost).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77578); ?> (Crash when php unload).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77753); ?> (Heap-buffer-overflow in php_ifd_get32s). (CVE-2019-11034)</li>
  <li><?php bugfix(77831); ?> (Heap-buffer-overflow in exif_iif_add_value). (CVE-2019-11035)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77677); ?> (FPM fails to build on AIX due to missing WCOREDUMP).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77700); ?> (Writing truecolor images as GIF ignores interlace flag).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(77597); ?> (mysqli_fetch_field hangs scripts).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77743); ?> (Incorrect pi node insertion for jmpznz with identical successors).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(76127); ?> (preg_split does not raise an error on invalid UTF-8).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77697); ?> (Crash on Big_Endian platform).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(77767); ?> (phpdbg break cmd aliases listed in help do not match actual aliases).</li>
</ul></li>
<li>sodium:
<ul>
  <li><?php bugfix(77646); ?> (sign_detached() strings not terminated).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Added sqlite3.defensive INI directive.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77664); ?> (Segmentation fault when using undefined constant in custom wrapper).</li>
  <li><?php bugfix(77669); ?> (Crash in extract() when overwriting extracted array).</li>
  <li><?php bugfix(76717); ?> (var_export() does not create a parsable value for PHP_INT_MIN).</li>
  <li><?php bugfix(77765); ?> (FTP stream wrapper should set the directory as executable).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.3.3"><!-- {{{ 7.3.3 -->
<h3>Version 7.3.3</h3>
<b><?php release_date('07-Mar-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77589); ?> (Core dump using parse_ini_string with numeric sections).</li>
  <li><?php bugfix(77329); ?> (Buffer Overflow via overly long Error Messages).</li>
  <li><?php bugfix(77494); ?> (Disabling class causes segfault on member access).</li>
  <li><?php bugfix(77498); ?> (Custom extension Segmentation fault when declare static property).</li>
  <li><?php bugfix(77530); ?> (PHP crashes when parsing `(2)::class`).</li>
  <li><?php bugfix(77546); ?> (iptcembed broken function).</li>
  <li><?php bugfix(77630); ?> (rename() across the device may allow unwanted access during processing). (CVE-2019-9637)</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77621); ?> (Already defined constants are not properly reported).</li>
  <li><?php bugfix(77626); ?> (Persistence confusion in php_com_import_typelib()).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77509); ?> (Uninitialized read in exif_process_IFD_in_TIFF). (CVE-2019-9641)</li>
  <li><?php bugfix(77540); ?> (Invalid Read on exif_process_SOFn). (CVE-2019-9640)</li>
  <li><?php bugfix(77563); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9638)</li>
  <li><?php bugfix(77659); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9639)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77514); ?> (mb_ereg_replace() with trailing backslash adds null byte).</li>
</ul></li>
<li>MySQL:
<ul>
  <li>Disabled LOCAL INFILE by default, can be enabled using php.ini directive mysqli.allow_local_infile for mysqli, or PDO::MYSQL_ATTR_LOCAL_INFILE attribute for pdo_mysql.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(77390); ?> (feof might hang on TLS streams in case of fragmented TLS records).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Support Oracle Database tracing attributes ACTION, MODULE, CLIENT_INFO, and CLIENT_IDENTIFIER.</li>
</ul></li>
<li>PHAR:
<ul>
  <li><?php bugfix(77396); ?> (Null Pointer Dereference in phar_create_or_parse_filename).</li>
  <li><?php bugfix(77586); ?> (phar_tar_writeheaders_int() buffer overflow).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76596); ?> (phpdbg support for display_errors=stderr).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(51068); ?> (DirectoryIterator glob:// don't support current path relative queries).</li>
  <li><?php bugfix(77431); ?> (openFile() silently truncates after a null byte).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77552); ?> (Unintialized php_stream_statbuf in stat functions).</li>
  <li><?php bugfix(77612); ?> (setcookie() sets incorrect SameSite header if all of its options filled).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.3.2"><!-- {{{ 7.3.2 -->
<h3>Version 7.3.2</h3>
<b><?php release_date('07-Feb-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77369); ?> (memcpy with negative length via crafted DNS response). (CVE-2019-9022)</li>
  <li><?php bugfix(77387); ?> (Recursion detection broken when printing GLOBALS).</li>
  <li><?php bugfix(77376); ?> ("undefined function" message no longer includes namespace).</li>
  <li><?php bugfix(77357); ?> (base64_encode / base64_decode doest not work on nested VM).</li>
  <li><?php bugfix(77339); ?> (__callStatic may get incorrect arguments).</li>
  <li><?php bugfix(77317); ?> (__DIR__, __FILE__, realpath() reveal physical path for subst virtual drive).</li>
  <li><?php bugfix(77263); ?> (Segfault when using 2 RecursiveFilterIterator).</li>
  <li><?php bugfix(77447); ?> (PHP 7.3 built with ASAN crashes in zend_cpu_supports_avx2).</li>
  <li><?php bugfix(77484); ?> (Zend engine crashes when calling realpath in invalid working dir).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(76675); ?> (Segfault with H2 server push).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(77346); ?> (webm files incorrectly detected as application/octet-stream).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77430); ?> (php-fpm crashes with Main process exited, code=dumped, status=11/SEGV).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73281); ?> (imagescale(…, IMG_BILINEAR_FIXED) can cause black border).</li>
  <li><?php bugfix(73614); ?> (gdImageFilledArc() doesn't properly draw pies).</li>
  <li><?php bugfix(77272); ?> (imagescale() may return image resource on failure).</li>
  <li><?php bugfix(77391); ?> (1bpp BMPs may fail to be loaded).</li>
  <li><?php bugfix(77479); ?> (imagewbmp() segfaults with very large images).</li>
</ul></li>
<li>ldap:
<ul>
  <li><?php bugfix(77440); ?> (ldap_bind using ldaps or ldap_start_tls()=exception in libcrypto-1_1-x64.dll).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77428); ?> (mb_ereg_replace() doesn't replace a substitution variable).</li>
  <li><?php bugfix(77454); ?> (mb_scrub() silently truncates after a null byte).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(77308); ?> (Unbuffered queries memory leak).</li>
  <li><?php bugfix(75684); ?> (In mysqlnd_ext_plugin.h the plugin methods family has no external visibility).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77266); ?> (Assertion failed in dce_live_ranges).</li>
  <li><?php bugfix(77257); ?> (value of variable assigned in a switch() construct gets lost).</li>
  <li><?php bugfix(77434); ?> (php-fpm workers are segfaulting in zend_gc_addre).</li>
  <li><?php bugfix(77361); ?> (configure fails on 64-bit AIX when opcache enabled).</li>
  <li><?php bugfix(77287); ?> (Opcache literal compaction is incompatible with EXT opcodes).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(77338); ?> (get_browser with empty string).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(77273); ?> (array_walk_recursive corrupts value types leading to PDO failure).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(77289); ?> (PDO MySQL segfaults with persistent connection).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(77410); ?> (Segmentation Fault when executing method with an empty parameter).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(76839); ?> (socket_recvfrom may return an invalid 'from' address on MacOS).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(77298); ?> (segfault occurs when add property to unserialized empty ArrayObject).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77395); ?> (segfault about array_multisort).</li>
  <li><?php bugfix(77439); ?> (parse_str segfaults when inserting item into existing array).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.3.1"><!-- {{{ 7.3.1 -->
<h3>Version 7.3.1</h3>
<b><?php release_date('10-Jan-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76654); ?> (Build failure on Mac OS X on 32-bit Intel).</li>
  <li><?php bugfix(71041); ?> (zend_signal_startup() needs ZEND_API).</li>
  <li><?php bugfix(76046); ?> (PHP generates "FE_FREE" opcode on the wrong line).</li>
  <li><?php bugfix(77291); ?> (magic methods inherited from a trait may be ignored).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(77264); ?> (curl_getinfo returning microseconds, not seconds).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77177); ?> (Serializing or unserializing COM objects crashes).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(77184); ?> (Unsigned rational numbers are written out as signed rationals).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77195); ?> (Incorrect error handling of imagecreatefromjpeg()).</li>
  <li><?php bugfix(77198); ?> (auto cropping has insufficient precision).</li>
  <li><?php bugfix(77200); ?> (imagecropauto(…, GD_CROP_SIDES) crops left but not right).</li>
  <li><?php bugfix(77269); ?> (efree() on uninitialized Heap data in imagescale leads to use-after-free). (CVE-2016-10166)</li>
  <li><?php bugfix(77270); ?> (imagecolormatch Out Of Bounds Write on Heap). (CVE-2019-6977)</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(77367); ?> (Negative size parameter in mb_split). (CVE-2019-9025)</li>
  <li><?php bugfix(77370); ?> (Buffer overflow on mb regex functions - fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77371); ?> (heap buffer overflow in mb regex functions - compile_string_node). (CVE-2019-9023)</li>
  <li><?php bugfix(77381); ?> (heap buffer overflow in multibyte match_at). (CVE-2019-9023)</li>
  <li><?php bugfix(77382); ?> (heap buffer overflow due to incorrect length in expand_case_fold_string). (CVE-2019-9023)</li>
  <li><?php bugfix(77385); ?> (buffer overflow in fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77394); ?> (Buffer overflow in multibyte case folding - unicode). (CVE-2019-9023)</li>
  <li><?php bugfix(77418); ?> (Heap overflow in utf32be_mbc_to_code). (CVE-2019-9023)</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(76804); ?> (oci_pconnect with OCI_CRED_EXT not working).</li>
  <li>Added oci_set_call_timeout() for call timeouts.</li>
  <li>Added oci_set_db_operation() for the DBOP end-to-end-tracing attribute.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77215); ?> (CFG assertion failure on multiple finalizing switch frees in one block).</li>
  <li><?php bugfix(77275); ?> (OPcache optimization problem for ArrayAccess-&gt;offsetGet).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(77193); ?> (Infinite loop in preg_replace_callback).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Handle invalid index passed to PDOStatement::fetchColumn() as error.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77247); ?> (heap buffer overflow in phar_detect_phar_fname_ext). (CVE-2019-9021)</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(77088); ?> (Segfault when using SoapClient with null options).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(77136); ?> (Unsupported IPV6_RECVPKTINFO constants on macOS).</li>
</ul></li>
<li>Sodium:
<ul>
  <li><?php bugfix(77297); ?> (SodiumException segfaults on PHP 7.3).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(77359); ?> (spl_autoload causes segfault).</li>
  <li><?php bugfix(77360); ?> (class_uses causes segfault).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(77051); ?> (Issue with re-binding on SQLite3).</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(77242); ?> (heap out of bounds read in xmlrpc_decode()). (CVE-2019-9020)</li>
  <li><?php bugfix(77380); ?> (Global out of bounds read in xmlrpc base64 code). (CVE-2019-9024)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.3.0"><!-- {{{ 7.3.0 -->
<h3>Version 7.3.0</h3>
<b><?php release_date('06-Dec-2018'); ?></b>
<ul><li>Core:
<ul>
  <li>Improved PHP GC.</li>
  <li>Redesigned the old ext_skel program written in PHP, run: 'php ext_skel.php' for all options. This means there are no dependencies, thus making it work on Windows out of the box.</li>
  <li>Removed support for BeOS.</li>
  <li>Add PHP_VERSION to phpinfo() &lt;title/&gt;.</li>
  <li>Add net_get_interfaces().</li>
  <li>Implemented flexible heredoc and nowdoc syntax, per RFC https://wiki.php.net/rfc/flexible_heredoc_nowdoc_syntaxes.</li>
  <li>Added support for references in list() and array destructuring, per RFC https://wiki.php.net/rfc/list_reference_assignment.</li>
  <li>Improved effectiveness of ZEND_SECURE_ZERO for NetBSD and systems without native similar feature.</li>
  <li>Added syslog.facility and syslog.ident INI entries for customizing syslog logging.</li>
  <li><?php bugfix(75683); ?> (Memory leak in zend_register_functions() in ZTS mode).</li>
  <li><?php bugfix(75031); ?> (support append mode in temp/memory streams).</li>
  <li><?php bugfix(74860); ?> (Uncaught exceptions not being formatted properly when error_log set to "syslog").</li>
  <li><?php bugfix(75220); ?> (Segfault when calling is_callable on parent).</li>
  <li><?php bugfix(69954); ?> (broken links and unused config items in distributed ini files).</li>
  <li><?php bugfix(74922); ?> (Composed class has fatal error with duplicate, equal const properties).</li>
  <li><?php bugfix(63911); ?> (identical trait methods raise errors during composition).</li>
  <li><?php bugfix(75677); ?> (Clang ignores fastcall calling convention on variadic function).</li>
  <li><?php bugfix(54043); ?> (Remove inconsitency of internal exceptions and user defined exceptions).</li>
  <li><?php bugfix(53033); ?> (Mathematical operations convert objects to integers).</li>
  <li><?php bugfix(73108); ?> (Internal class cast handler uses integer instead of float).</li>
  <li><?php bugfix(75765); ?> (Fatal error instead of Error exception when base class is not found).</li>
  <li><?php bugfix(76198); ?> (Wording: "iterable" is not a scalar type).</li>
  <li><?php bugfix(76137); ?> (config.guess/config.sub do not recognize RISC-V).</li>
  <li><?php bugfix(76427); ?> (Segfault in zend_objects_store_put).</li>
  <li><?php bugfix(76422); ?> (ftruncate fails on files &gt; 2GB).</li>
  <li><?php bugfix(76509); ?> (Inherited static properties can be desynchronized from their parent by ref).</li>
  <li><?php bugfix(76439); ?> (Changed behaviour in unclosed HereDoc).</li>
  <li><?php bugfix(63217); ?> (Constant numeric strings become integers when used as ArrayAccess offset).</li>
  <li><?php bugfix(33502); ?> (Some nullary functions don't check the number of arguments).</li>
  <li><?php bugfix(76392); ?> (Error relocating sapi/cli/php: unsupported relocation type 37).</li>
  <li>The declaration and use of case-insensitive constants has been deprecated.</li>
  <li>Added syslog.filter INI entry for syslog filtering.</li>
  <li><?php bugfix(76667); ?> (Segfault with divide-assign op and __get + __set).</li>
  <li><?php bugfix(76030); ?> (RE2C_FLAGS rarely honoured) (Cristian Rodríguez)</li>
  <li>Fixed broken zend_read_static_property (Laruence)</li>
  <li><?php bugfix(76773); ?> (Traits used on the parent are ignored for child classes).</li>
  <li><?php bugfix(76767); ?> (‘asm’ operand has impossible constraints in zend_operators.h).</li>
  <li><?php bugfix(76752); ?> (Crash in ZEND_COALESCE_SPEC_TMP_HANDLER - assertion in _get_zval_ptr_tmp failed).</li>
  <li><?php bugfix(76820); ?> (Z_COPYABLE invalid definition).</li>
  <li><?php bugfix(76510); ?> (file_exists() stopped working for phar://).</li>
  <li><?php bugfix(76869); ?> (Incorrect bypassing protected method accessibilty check).</li>
  <li><?php bugfix(72635); ?> (Undefined class used by class constant in constexpr generates fatal error).</li>
  <li><?php bugfix(76947); ?> (file_put_contents() blocks the directory of the file (__DIR__)).</li>
  <li><?php bugfix(76979); ?> (define() error message does not mention resources as valid values).</li>
  <li><?php bugfix(76825); ?> (Undefined symbols ___cpuid_count).</li>
  <li><?php bugfix(77110); ?> (undefined symbol zend_string_equal_val in C++ build).</li>
  <li><?php bugfix(77231); ?> (Segfault when using convert.quoted-printable-encode filter).</li>
</ul></li>
<li>BCMath:
<ul>
  <li><?php implemented(67855); ?> (No way to get current scale in use).</li>
  <li><?php bugfix(66364); ?> (BCMath bcmul ignores scale parameter).</li>
  <li><?php bugfix(75164); ?> (split_bc_num() is pointless).</li>
  <li><?php bugfix(75169); ?> (BCMath errors/warnings bypass PHP's error handling).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(44217); ?> (Output after stdout/stderr closed cause immediate exit with status 0).</li>
  <li><?php bugfix(77111); ?> (php-win.exe corrupts unicode symbols from cli parameters).</li>
</ul></li>
<li>cURL:
<ul>
  <li>Expose curl constants from curl 7.50 to 7.61.</li>
  <li><?php bugfix(74125); ?> (Fixed finding CURL on systems with multiarch support).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php implemented(74668); ?>: Add DateTime::createFromImmutable() method.</li>
  <li><?php bugfix(75222); ?> (DateInterval microseconds property always 0).</li>
  <li><?php bugfix(68406); ?> (calling var_dump on a DateTimeZone object modifies it).</li>
  <li><?php bugfix(76131); ?> (mismatch arginfo for date_create).</li>
  <li>Updated timelib to 2018.01RC1 to address several bugs:</li>
  <li><?php bugfix(75577); ?> (DateTime::createFromFormat does not accept 'v' format specifier).</li>
  <li><?php bugfix(75642); ?> (Wrap around behaviour for microseconds is not working).</li>
  <li><?php bugfix(77097); ?> (DateTime::diff gives wrong diff when the actual diff is less than 1 second).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(75264); ?> (compiler warnings emitted).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(76285); ?> (DOMDocument::formatOutput attribute sometimes ignored).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(77095); ?> (slowness regression in 7.2/7.3 (compared to 7.1)).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Added the 'add_slashes' sanitization mode (FILTER_SANITIZE_ADD_SLASHES).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Added fpm_get_status function.</li>
  <li><?php bugfix(62596); ?> (getallheaders() missing with PHP-FPM).</li>
  <li><?php bugfix(69031); ?> (Long messages into stdout/stderr are truncated incorrectly) - added new log related FPM configuration options: log_limit, log_buffering and decorate_workers_output.</li>
</ul></li>
<li>ftp:
<ul>
  <li><?php bugfix(77151); ?> (ftp_close(): SSL_read on shutdown).</li>
</ul></li>
<li>GD:
<ul>
  <li>Added support for WebP in imagecreatefromstring().</li>
</ul></li>
<li>GMP:
<ul>
  <li>Export internal structures and accessor helpers for GMP object.</li>
  <li>Added gmp_binomial(n, k).</li>
  <li>Added gmp_lcm(a, b).</li>
  <li>Added gmp_perfect_power(a).</li>
  <li>Added gmp_kronecker(a, b).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(53891); ?> (iconv_mime_encode() fails to Q-encode UTF-8 string).</li>
  <li><?php bugfix(77147); ?> (Fixing 60494 ignored ICONV_MIME_DECODE_CONTINUE_ON_ERROR).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77153); ?> (imap_open allows to run arbitrary shell commands via mailbox parameter). (CVE-2018-19518)</li>
  <li><?php bugfix(77020); ?> (null pointer dereference in imap_mail).</li>
</ul></li>
<li>Interbase:
<ul>
  <li><?php bugfix(75453); ?> (Incorrect reflection for ibase_[p]connect).</li>
  <li><?php bugfix(76443); ?> (php+php_interbase.dll crash on module_shutdown).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(75317); ?> (UConverter::setDestinationEncoding changes source instead of destination).</li>
  <li><?php bugfix(76829); ?> (Incorrect validation of domain on idn_to_utf8() function).</li>
</ul></li>
<li>JSON:
<ul>
  <li>Added JSON_THROW_ON_ERROR flag.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Added ldap_exop_refresh helper for EXOP REFRESH operation with dds overlay.</li>
  <li>Added full support for sending and parsing ldap controls.</li>
  <li><?php bugfix(49876); ?> (Fix LDAP path lookup on 64-bit distros).</li>
</ul></li>
<li>libxml2:
<ul>
  <li><?php bugfix(75871); ?> (use pkg-config where available).</li>
</ul></li>
<li>litespeed:
<ul>
  <li><?php bugfix(75248); ?> (Binary directory doesn't get created when building only litespeed SAPI).</li>
  <li><?php bugfix(75251); ?> (Missing program prefix and suffix).</li>
</ul></li>
<li>MBstring:
<ul>
  <li>Updated to Oniguruma 6.9.0.</li>
  <li><?php bugfix(65544); ?> (mb title case conversion-first word in quotation isn't capitalized).</li>
  <li><?php bugfix(71298); ?> (MB_CASE_TITLE misbehaves with curled apostrophe/quote).</li>
  <li><?php bugfix(73528); ?> (Crash in zif_mb_send_mail).</li>
  <li><?php bugfix(74929); ?> (mbstring functions version 7.1.1 are slow compared to 5.3 on Windows).</li>
  <li><?php bugfix(76319); ?> (mb_strtolower with invalid UTF-8 causes segmentation fault).</li>
  <li><?php bugfix(76574); ?> (use of undeclared identifiers INT_MAX and LONG_MAX).</li>
  <li><?php bugfix(76594); ?> (Bus Error due to unaligned access in zend_ini.c OnUpdateLong).</li>
  <li><?php bugfix(76706); ?> (mbstring.http_output_conv_mimetypes is ignored).</li>
  <li><?php bugfix(76958); ?> (Broken UTF7-IMAP conversion).</li>
  <li><?php bugfix(77025); ?> (mb_strpos throws Unknown encoding or conversion error).</li>
  <li><?php bugfix(77165); ?> (mb_check_encoding crashes when argument given an empty array).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(76386); ?> (Prepared Statement formatter truncates fractional seconds from date/time column).</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Removed support for ODBCRouter.</li>
  <li>Removed support for Birdstep.</li>
  <li><?php bugfix(77079); ?> (odbc_fetch_object has incorrect type signature).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76466); ?> (Loop variable confusion).</li>
  <li><?php bugfix(76463); ?> (var has array key type but not value type).</li>
  <li><?php bugfix(76446); ?> (zend_variables.c:73: zend_string_destroy: Assertion `!(zval_gc_flags((str)-&gt;gc)).</li>
  <li><?php bugfix(76711); ?> (OPcache enabled triggers false-positive "Illegal string offset").</li>
  <li><?php bugfix(77058); ?> (Type inference in opcache causes side effects).</li>
  <li><?php bugfix(77092); ?> (array_diff_key() - segmentation fault).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Added openssl_pkey_derive function.</li>
  <li>Add min_proto_version and max_proto_version ssl stream options as well as related constants for possible TLS protocol values.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Implemented https://wiki.php.net/rfc/pcre2-migration.</li>
  <li>Upgrade PCRE2 to 10.32.</li>
  <li><?php bugfix(75355); ?> (preg_quote() does not quote # control character).</li>
  <li><?php bugfix(76512); ?> (\w no longer includes unicode characters).</li>
  <li><?php bugfix(76514); ?> (Regression in preg_match makes it fail with PREG_JIT_STACKLIMIT_ERROR).</li>
  <li><?php bugfix(76909); ?> (preg_match difference between 7.3 and &lt; 7.3).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php implemented(69592); ?> (allow 0-column rowsets to be skipped automatically).</li>
  <li>Expose TDS version as \PDO::DBLIB_ATTR_TDS_VERSION attribute on \PDO instance.</li>
  <li>Treat DATETIME2 columns like DATETIME.</li>
  <li><?php bugfix(74243); ?> (allow locales.conf to drive datetime format).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(74462); ?> (PDO_Firebird returns only NULLs for results with boolean for FIREBIRD &gt;= 3.0).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(74631); ?> (PDO_PCO with PHP-FPM: OCI environment initialized before PHP-FPM sets it up).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li>Add support for additional open flags</li>
</ul></li>
<li>pgsql:
<ul>
  <li>Added new error constants for pg_result_error(): PGSQL_DIAG_SCHEMA_NAME, PGSQL_DIAG_TABLE_NAME, PGSQL_DIAG_COLUMN_NAME, PGSQL_DIAG_DATATYPE_NAME, PGSQL_DIAG_CONSTRAINT_NAME and PGSQL_DIAG_SEVERITY_NONLOCALIZED.</li>
  <li><?php bugfix(77047); ?> (pg_convert has a broken regex for the 'TIME WITHOUT TIMEZONE' data type).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74991); ?> (include_path has a 4096 char limit in some cases).</li>
  <li><?php bugfix(65414); ?> (deal with leading slash when adding files correctly).</li>
  <li><?php bugfix(77022); ?> (PharData always creates new files with mode 0666).</li>
  <li><?php bugfix(77143); ?> (Heap Buffer Overflow (READ: 4) in phar_parse_pharfile). (CVE-2018-20783)</li>
</ul></li>
<li>readline:
<ul>
  <li>Added completion_append_character and completion_suppress_append options to readline_info() if linked against libreadline.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(74941); ?> (session fails to start after having headers sent).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(54973); ?> (SimpleXML casts integers wrong).</li>
  <li><?php bugfix(76712); ?> (Assignment of empty string creates extraneous text node).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(67619); ?> (Validate length on socket_write).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(75464); ?> (Wrong reflection on SoapClient::__setSoapHeaders).</li>
  <li><?php bugfix(70469); ?> (SoapClient generates E_ERROR even if exceptions=1 is used).</li>
  <li><?php bugfix(50675); ?> (SoapClient can't handle object references correctly).</li>
  <li><?php bugfix(76348); ?> (WSDL_CACHE_MEMORY causes Segmentation fault).</li>
  <li><?php bugfix(77141); ?> (Signedness issue in SOAP when precision=-1).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74977); ?> (Appending AppendIterator leads to segfault).</li>
  <li><?php bugfix(75173); ?> (incorrect behavior of AppendIterator::append in foreach loop).</li>
  <li><?php bugfix(74372); ?> (autoloading file with syntax error uses next autoloader, may hide parse error).</li>
  <li><?php bugfix(75878); ?> (RecursiveTreeIterator::setPostfix has wrong signature).</li>
  <li><?php bugfix(74519); ?> (strange behavior of AppendIterator).</li>
  <li><?php bugfix(76131); ?> (mismatch arginfo for splarray constructor).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Updated bundled libsqlite to 3.24.0.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Added is_countable() function.</li>
  <li>Added support for the SameSite cookie directive, including an alternative signature for setcookie(), setrawcookie() and session_set_cookie_params().</li>
  <li>Remove superfluous warnings from inet_ntop()/inet_pton().</li>
  <li><?php bugfix(75916); ?> (DNS_CAA record results contain garbage).</li>
  <li>Fixed unserialize(), to disable creation of unsupported data structures through manually crafted strings.</li>
  <li><?php bugfix(75409); ?> (accept EFAULT in addition to ENOSYS as indicator that getrandom() is missing).</li>
  <li><?php bugfix(74719); ?> (fopen() should accept NULL as context).</li>
  <li><?php bugfix(69948); ?> (path/domain are not sanitized in setcookie).</li>
  <li><?php bugfix(75996); ?> (incorrect url in header for mt_rand).</li>
  <li>Added hrtime() function, to get high resolution time.</li>
  <li><?php bugfix(48016); ?> (stdClass::__setState is not defined although var_export() uses it).</li>
  <li><?php bugfix(76136); ?> (stream_socket_get_name should enclose IPv6 in brackets).</li>
  <li><?php bugfix(76688); ?> (Disallow excessive parameters after options array).</li>
  <li><?php bugfix(76713); ?> (Segmentation fault caused by property corruption).</li>
  <li><?php bugfix(76755); ?> (setcookie does not accept "double" type for expire time).</li>
  <li><?php bugfix(76674); ?> (improve array_* failure messages exposing what was passed instead of an array).</li>
  <li><?php bugfix(76803); ?> (ftruncate changes file pointer).</li>
  <li><?php bugfix(76818); ?> (Memory corruption and segfault).</li>
  <li><?php bugfix(77081); ?> (ftruncate() changes seek pointer in c mode).</li>
</ul></li>
<li>Testing:
<ul>
  <li><?php implemented(62055); ?> (Make run-tests.php support --CGI-- sections).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Support using tidyp instead of tidy.</li>
  <li><?php bugfix(74707); ?> (Tidy has incorrect ReflectionFunction param counts for functions taking tidy).</li>
  <li>Fixed arginfo for tidy::__construct().</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(76437); ?> (token_get_all with TOKEN_PARSE flag fails to recognise close tag).</li>
  <li><?php bugfix(75218); ?> (Change remaining uncatchable fatal errors for parsing into ParseError).</li>
  <li><?php bugfix(76538); ?> (token_get_all with TOKEN_PARSE flag fails to recognise close tag with newline).</li>
  <li><?php bugfix(76991); ?> (Incorrect tokenization of multiple invalid flexible heredoc strings).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(71592); ?> (External entity processing never fails).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Added zlib/level context option for compress.zlib wrapper.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<a id="PHP_7_2"></a>

<section class="version" id="7.2.34"><!-- {{{ 7.2.34 -->
<h3>Version 7.2.34</h3>
<b><?php release_date('01-Oct-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79699); ?> (PHP parses encoded cookie names so malicious `__Host-` cookies can be sent). (CVE-2020-7070)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79601); ?> (Wrong ciphertext/tag in AES-CCM encryption for a 12 bytes IV). (CVE-2020-7069)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.33"><!-- {{{ 7.2.33 -->
<h3>Version 7.2.33</h3>
<b><?php release_date('06-Aug-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79877); ?> (getimagesize function silently truncates after a null byte) (cmb)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79797); ?> (Use of freed hash key in the phar_parse_zipfile function). (CVE-2020-7068)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.32"><!-- {{{ 7.2.32 -->
<h3>Version 7.2.32</h3>
<b><?php release_date('09-Jul-2020'); ?></b>
<ul><li>Windows:
<ul>
  <li>Rebuild of official Windows binaries with patched libcurl. No PHP source changes.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.2.31"><!-- {{{ 7.2.31 -->
<h3>Version 7.2.31</h3>
<b><?php release_date('14-May-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78875); ?> (Long filenames cause OOM and temp files are not cleaned). (CVE-2019-11048)</li>
  <li><?php bugfix(78876); ?> (Long variables in multipart/form-data cause OOM and temp files are not cleaned). (CVE-2019-11048)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.30"><!-- {{{ 7.2.30 -->
<h3>Version 7.2.30</h3>
<b><?php release_date('16-Apr-2020'); ?></b>
<ul><li>Standard:
<ul>
  <li><?php bugfix(79468); ?> (SIGSEGV when closing stream handle with a stream filter appended).</li>
  <li><?php bugfix(79330); ?> (shell_exec() silently truncates after a null byte).</li>
  <li><?php bugfix(79465); ?> (OOB Read in urldecode()).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.2.29"><!-- {{{ 7.2.29 -->
<h3>Version 7.2.29</h3>
<b><?php release_date('19-Mar-2020'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(79329); ?> (get_headers() silently truncates after a null byte) (CVE-2020-7066) (cmb)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(79282); ?> (Use-of-uninitialized-value in exif) (CVE-2020-7064) (Nikita)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.28"><!-- {{{ 7.2.28 -->
<h3>Version 7.2.28</h3>
<b><?php release_date('20-Feb-2020'); ?></b>
<ul><li>DOM:
<ul>
  <li><?php bugfix(77569); ?>: (Write Access Violation in DomImplementation).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(79082); ?> (Files added to tar with Phar::buildFromIterator have all-access permissions). (CVE-2020-7063)</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79221); ?> (Null Pointer Dereference in PHP Session Upload Progress). (CVE-2020-7062)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.27"><!-- {{{ 7.2.27 -->
<h3>Version 7.2.27</h3>
<b><?php release_date('23-Jan-2020'); ?></b>
<ul><li>Mbstring:
<ul>
  <li><?php bugfix(79037); ?> (global buffer-overflow in `mbfl_filt_conv_big5_wchar`). (CVE-2020-7060)</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(79091); ?> (heap use-after-free in session_create_id()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(79099); ?> (OOB read in php_strip_tags_ex). (CVE-2020-7059)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.26"><!-- {{{ 7.2.26 -->
<h3>Version 7.2.26</h3>
<b><?php release_date('18-Dec-2019'); ?></b>
<ul><li>Bcmath:
<ul>
  <li><?php bugfix(78878); ?> (Buffer underflow in bc_shift_addsub). (CVE-2019-11046)</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(78862); ?> (link() silently truncates after a null byte on Windows). (CVE-2019-11044)</li>
  <li><?php bugfix(78863); ?> (DirectoryIterator class silently truncates after a null byte). (CVE-2019-11045)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78793); ?> (Use-after-free in exif parsing under memory sanitizer). (CVE-2019-11050)</li>
  <li><?php bugfix(78910); ?> (Heap-buffer-overflow READ in exif). (CVE-2019-11047)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(78849); ?> (GD build broken with -D SIGNED_COMPARE_SLOW).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(78804); ?> (Segmentation fault in Locale::filterMatches).</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed $x = (bool)$x; with opcache (should emit undeclared variable notice).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78759); ?> (array_search in $GLOBALS).</li>
  <li><?php bugfix(78833); ?> (Integer overflow in pack causes out-of-bound access).</li>
  <li><?php bugfix(78814); ?> (strip_tags allows / in tag name =&gt; whitelist bypass).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.2.25"><!-- {{{ 7.2.25 -->
<h3>Version 7.2.25</h3>
<b><?php release_date('21-Nov-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78656); ?> (Parse errors classified as highest log-level).</li>
  <li><?php bugfix(78752); ?> (Segfault if GC triggered while generator stack frame is being destroyed).</li>
  <li><?php bugfix(78689); ?> (Closure::fromCallable() doesn't handle [Closure, '__invoke']).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(78694); ?> (Appending to a variant array causes segfault).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70153); ?> (\DateInterval incorrectly unserialized).</li>
  <li><?php bugfix(78751); ?> (Serialising DatePeriod converts DateTimeImmutable).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78642); ?> (Wrong libiconv version displayed). (gedas at martynas, cmb).</li>
</ul></li>
<li>OpCache:
<ul>
  <li><?php bugfix(78654); ?> (Incorrectly computed opcache checksum on files with non-ascii characters).</li>
  <li><?php bugfix(78747); ?> (OpCache corrupts custom extension result).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(78775); ?> (TLS issues from HTTP request affecting other encrypted connections).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(78697); ?> (ReflectionClass::ImplementsInterface - inaccurate error message with traits).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(78665); ?> (Multicasting may leak memory).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.2.24"><!-- {{{ 7.2.24 -->
<h3>Version 7.2.24</h3>
<b><?php release_date('24-Oct-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78535); ?> (auto_detect_line_endings value not parsed as bool).</li>
  <li><?php bugfix(78620); ?> (Out of memory error).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(78442); ?> ('Illegal component' on exif_read_data since PHP7) (Kalle)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(78599); ?> (env_path_info underflow in fpm_main.c can lead to RCE). (CVE-2019-11043)</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(78579); ?> (mb_decode_numericentity: args number inconsistency).</li>
  <li><?php bugfix(78609); ?> (mb_check_encoding() no longer supports stringable objects).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(76809); ?> (SSL settings aren't respected when persistent connections are used).</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(78623); ?> (Regression caused by "SP call yields additional empty result set").</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(78624); ?> (session_gc return value for user defined session handlers).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76342); ?> (file_get_contents waits twice specified timeout).</li>
  <li><?php bugfix(78612); ?> (strtr leaks memory when integer keys are used and the subject string shorter).</li>
  <li><?php bugfix(76859); ?> (stream_get_line skips data if used with data-generating filter).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(78641); ?> (addGlob can modify given remove_path value).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.23"><!-- {{{ 7.2.23 -->
<h3>Version 7.2.23</h3>
<b><?php release_date('26-Sep-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78220); ?> (Can't access OneDrive folder).</li>
  <li><?php bugfix(78412); ?> (Generator incorrectly reports non-releasable $this as GC child).</li>
</ul></li>
<li>FastCGI:
<ul>
  <li><?php bugfix(78469); ?> (FastCGI on_accept hook is not called when using named pipes on Windows).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed connect_attr issues and added the _server_host connection attribute.</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(78473); ?> (odbc_close() closes arbitrary resources).</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(41997); ?> (SP call yields additional empty result set).</li>
</ul></li>
<li>sodium:
<ul>
  <li><?php bugfix(78510); ?> (Partially uninitialized buffer returned by sodium_crypto_generichash_init()).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(72884); ?> (SplObject isCloneable() returns true but errs on clone).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.2.22"><!-- {{{ 7.2.22 -->
<h3>Version 7.2.22</h3>
<b><?php release_date('29-Aug-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(78363); ?> (Buffer overflow in zendparse).</li>
  <li><?php bugfix(78379); ?> (Cast to object confuses GC, causes crash).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(77946); ?> (Bad cURL resources returned by curl_multi_info_read()).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(78333); ?> (Exif crash (bus error) due to wrong alignment and invalid cast).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78342); ?> (Bus error in configure test for iconv //IGNORE).</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated to LiteSpeed SAPI V7.5 (Fixed clean shutdown).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(78179); ?> (MariaDB server version incorrectly detected).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77191); ?> (Assertion failure in dce_live_ranges() when silencing is used).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69100); ?> (Bus error from stream_copy_to_stream (file -&gt; SSL stream) with invalid length).</li>
  <li><?php bugfix(78282); ?> (atime and mtime mismatch).</li>
  <li><?php bugfix(78326); ?> (improper memory deallocation on stream_get_contents() with fixed length buffer).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="7.2.21"><!-- {{{ 7.2.21 -->
<h3>Version 7.2.21</h3>
<b><?php release_date('01-Aug-2019'); ?></b>
<ul><li>Date:
<ul>
  <li><?php bugfix(69044); ?> (discrepency between time and microtime).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78256); ?> (heap-buffer-overflow on exif_process_user_comment). (CVE-2019-11042)</li>
  <li><?php bugfix(78222); ?> (heap-buffer-overflow on exif_scan_thumbnail). (CVE-2019-11041)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(78183); ?> (finfo_file shows wrong mime-type for .tga file).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(77124); ?> (FTP with SSL memory leak).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(78279); ?> (libxml_disable_entity_loader settings is shared between requests (cgi-fcgi)).</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated to LiteSpeed SAPI V7.4.3 (increased response header count limit from 100 to 1000, added crash handler to cleanly shutdown PHP request, added CloudLinux mod_lsapi mode).</li>
  <li><?php bugfix(76058); ?> (After "POST data can't be buffered", using php://input makes huge tmp files).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(78231); ?> (Segmentation fault upon stream_socket_accept of exported socket-to-stream).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(78189); ?> (file cache strips last character of uname hash).</li>
  <li><?php bugfix(78202); ?> (Opcache stats for cache hits are capped at 32bit NUM).</li>
  <li><?php bugfix(78291); ?> (opcache_get_configuration doesn't list all directives).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77919); ?> (Potential UAF in Phar RSHUTDOWN).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(78297); ?> (Include unexistent file memory leak).</li>
</ul></li>
<li>PDO_Sqlite:
<ul>
  <li><?php bugfix(78192); ?> (SegFault when reuse statement after schema has changed).</li>
</ul></li>
<li>SQLite:
<ul>
  <li>Upgraded to SQLite 3.28.0.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(78241); ?> (touch() does not handle dates after 2038 in PHP 64-bit).</li>
  <li><?php bugfix(78269); ?> (password_hash uses weak options for argon2).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(78173); ?> (XML-RPC mutates immutable objects during encoding).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.20"><!-- {{{ 7.2.20 -->
<h3>Version 7.2.20</h3>
<b><?php release_date('04-Jul-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76980); ?> (Interface gets skipped if autoloader throws an exception).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(78025); ?> (segfault when accessing properties of DOMDocumentType).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(77956); ?> (When mysqli.allow_local_infile = Off, use a meaningful error message).</li>
  <li><?php bugfix(38546); ?> (bindParam incorrect processing of bool types).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(78106); ?> (Path resolution fails if opcache disabled during request).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(78079); ?> (openssl_encrypt_ccm.phpt fails with OpenSSL 1.1.1c).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(78038); ?> (Socket_select fails when resource array contains references).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77135); ?> (Extract with EXTR_SKIP should skip $this).</li>
  <li><?php bugfix(77937); ?> (preg_match failed).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(76345); ?> (zip.h not found).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.19"><!-- {{{ 7.2.19 -->
<h3>Version 7.2.19</h3>
<b><?php release_date('30-May-2019'); ?></b>
<ul><li>Date:
<ul>
  <li><?php bugfix(77909); ?> (DatePeriod::__construct() with invalid recurrence count value).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77988); ?> (heap-buffer-overflow on php_jpg_get16) (CVE-2019-11040).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77934); ?> (php-fpm kill -USR2 not working).</li>
  <li><?php bugfix(77921); ?> (static.php.net doesn't work anymore).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77943); ?> (imageantialias($image, false); does not work).</li>
  <li><?php bugfix(77973); ?> (Uninitialized read in gdImageCreateFromXbm) (CVE-2019-11038).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78069); ?> (Out-of-bounds read in iconv.c:_php_iconv_mime_decode() due to integer overflow) (CVE-2019-11039).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(77843); ?> (Use after free with json serializer).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed possible crashes, because of inconsistent PCRE cache and opcache SHM reset.</li>
</ul></li>
<li>PDO_MySQL:
<ul>
  <li><?php bugfix(77944); ?> (Wrong meta pdo_type for bigint on LLP64).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(75186); ?> (Inconsistent reflection of Closure:::__invoke()).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(77911); ?> (Wrong warning for session.sid_bits_per_character).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(77024); ?> (SplFileObject::__toString() may return array).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(77967); ?> (Bypassing open_basedir restrictions via file uris).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.18"><!-- {{{ 7.2.18 -->
<h3>Version 7.2.18</h3>
<b><?php release_date('02-May-2019'); ?></b>
<ul><li>CLI:
<ul>
  <li><?php bugfix(77794); ?> (Incorrect Date header format in built-in server).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77950); ?> (Heap-buffer-overflow in _estrndup via exif_process_IFD_TAG) (CVE-2019-11036).</li>
</ul></li>
<li>Interbase:
<ul>
  <li><?php bugfix(72175); ?> (Impossibility of creating multiple connections to Interbase with php 7.x).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(77895); ?> (IntlDateFormatter::create fails in strict mode if $locale = null).</li>
</ul></li>
<li>litespeed:
<ul>
  <li>LiteSpeed SAPI 7.3.1, better process management, new API function litespeed_finish_request().</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(77821); ?> (Potential heap corruption in TSendMail()).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(77827); ?> (preg_match does not ignore \r in regex flags).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(77849); ?> (Disable cloning of PDO handle/connection objects).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76801); ?> (too many open files).</li>
  <li><?php bugfix(77800); ?> (phpdbg segfaults on listing some conditional breakpoints).</li>
  <li><?php bugfix(77805); ?> (phpdbg build fails when readline is shared).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(77772); ?> (ReflectionClass::getMethods(null) doesn't work).</li>
  <li><?php bugfix(77882); ?> (Different behavior: always calls destructor).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77680); ?> (recursive mkdir on ftp stream wrapper is incorrect).</li>
  <li><?php bugfix(77844); ?> (Crash due to null pointer in parse_ini_string with INI_SCANNER_TYPED).</li>
  <li><?php bugfix(77853); ?> (Inconsistent substr_compare behaviour with empty haystack).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.17"><!-- {{{ 7.2.17 -->
<h3>Version 7.2.17</h3>
<b><?php release_date('04-Apr-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77738); ?> (Nullptr deref in zend_compile_expr).</li>
  <li><?php bugfix(77660); ?> (Segmentation fault on break 2147483648).</li>
  <li><?php bugfix(77652); ?> (Anonymous classes can lose their interface information).</li>
  <li><?php bugfix(77676); ?> (Unable to run tests when building shared extension on AIX).</li>
</ul></li>
<li>Bcmath:
<ul>
  <li><?php bugfix(77742); ?> (bcpow() implementation related to gcc compiler optimization).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77578); ?> (Crash when php unload).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(50020); ?> (DateInterval:createDateFromString() silently fails).</li>
  <li><?php bugfix(75113); ?> (Added DatePeriod::getRecurrences() method).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77753); ?> (Heap-buffer-overflow in php_ifd_get32s). (CVE-2019-11034)</li>
  <li><?php bugfix(77831); ?> (Heap-buffer-overflow in exif_iif_add_value). (CVE-2019-11035)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77677); ?> (FPM fails to build on AIX due to missing WCOREDUMP).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77700); ?> (Writing truecolor images as GIF ignores interlace flag).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(77597); ?> (mysqli_fetch_field hangs scripts).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77691); ?> (Opcache passes wrong value for inline array push assignments).</li>
  <li><?php bugfix(77743); ?> (Incorrect pi node insertion for jmpznz with identical successors).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(77767); ?> (phpdbg break cmd aliases listed in help do not match actual aliases).</li>
</ul></li>
<li>sodium:
<ul>
  <li><?php bugfix(77646); ?> (sign_detached() strings not terminated).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Added sqlite3.defensive INI directive.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77664); ?> (Segmentation fault when using undefined constant in custom wrapper).</li>
  <li><?php bugfix(77669); ?> (Crash in extract() when overwriting extracted array).</li>
  <li><?php bugfix(76717); ?> (var_export() does not create a parsable value for PHP_INT_MIN).</li>
  <li><?php bugfix(77765); ?> (FTP stream wrapper should set the directory as executable).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.16"><!-- {{{ 7.2.16 -->
<h3>Version 7.2.16</h3>
<b><?php release_date('07-Mar-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77589); ?> (Core dump using parse_ini_string with numeric sections).</li>
  <li><?php bugfix(77630); ?> (rename() across the device may allow unwanted access during processing). (CVE-2019-9637)</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77621); ?> (Already defined constants are not properly reported).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77509); ?> (Uninitialized read in exif_process_IFD_in_TIFF). (CVE-2019-9641)</li>
  <li><?php bugfix(77540); ?> (Invalid Read on exif_process_SOFn). (CVE-2019-9640)</li>
  <li><?php bugfix(77563); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9638)</li>
  <li><?php bugfix(77659); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9639)</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Support Oracle Database tracing attributes ACTION, MODULE, CLIENT_INFO, and CLIENT_IDENTIFIER.</li>
</ul></li>
<li>PHAR:
<ul>
  <li><?php bugfix(77396); ?> (Null Pointer Dereference in phar_create_or_parse_filename).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(51068); ?> (DirectoryIterator glob:// don't support current path relative queries).</li>
  <li><?php bugfix(77431); ?> (openFile() silently truncates after a null byte).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77552); ?> (Unintialized php_stream_statbuf in stat functions).</li>
</ul></li>
<li>MySQL:
<ul>
  <li>Disabled LOCAL INFILE by default, can be enabled using php.ini directive mysqli.allow_local_infile for mysqli, or PDO::MYSQL_ATTR_LOCAL_INFILE attribute for pdo_mysql.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.15"><!-- {{{ 7.2.15 -->
<h3>Version 7.2.15</h3>
<b><?php release_date('07-Feb-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77339); ?> (__callStatic may get incorrect arguments).</li>
  <li><?php bugfix(77494); ?> (Disabling class causes segfault on member access).</li>
  <li><?php bugfix(77530); ?> (PHP crashes when parsing `(2)::class`).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(76675); ?> (Segfault with H2 server push).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73281); ?> (imagescale(…, IMG_BILINEAR_FIXED) can cause black border).</li>
  <li><?php bugfix(73614); ?> (gdImageFilledArc() doesn't properly draw pies).</li>
  <li><?php bugfix(77272); ?> (imagescale() may return image resource on failure).</li>
  <li><?php bugfix(77391); ?> (1bpp BMPs may fail to be loaded).</li>
  <li><?php bugfix(77479); ?> (imagewbmp() segfaults with very large images).</li>
</ul></li>
<li>ldap:
<ul>
  <li><?php bugfix(77440); ?> (ldap_bind using ldaps or ldap_start_tls()=exception in libcrypto-1_1-x64.dll).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77454); ?> (mb_scrub() silently truncates after a null byte).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(75684); ?> (In mysqlnd_ext_plugin.h the plugin methods family has no external visibility).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77361); ?> (configure fails on 64-bit AIX when opcache enabled).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(77390); ?> (feof might hang on TLS streams in case of fragmented TLS records).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(77273); ?> (array_walk_recursive corrupts value types leading to PDO failure).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(76839); ?> (socket_recvfrom may return an invalid 'from' address on MacOS).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(77395); ?> (segfault about array_multisort).</li>
  <li><?php bugfix(77439); ?> (parse_str segfaults when inserting item into existing array).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.14"><!-- {{{ 7.2.14 -->
<h3>Version 7.2.14</h3>
<b><?php release_date('10-Jan-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77369); ?> (memcpy with negative length via crafted DNS response). (CVE-2019-9022)</li>
  <li><?php bugfix(71041); ?> (zend_signal_startup() needs ZEND_API).</li>
  <li><?php bugfix(76046); ?> (PHP generates "FE_FREE" opcode on the wrong line).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(77177); ?> (Serializing or unserializing COM objects crashes).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(77097); ?> (DateTime::diff gives wrong diff when the actual diff is less than 1 second).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(77184); ?> (Unsigned rational numbers are written out as signed rationals).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77269); ?> (efree() on uninitialized Heap data in imagescale leads to use-after-free). (CVE-2016-10166)</li>
  <li><?php bugfix(77270); ?> (imagecolormatch Out Of Bounds Write on Heap). (CVE-2019-6977)</li>
  <li><?php bugfix(77195); ?> (Incorrect error handling of imagecreatefromjpeg()).</li>
  <li><?php bugfix(77198); ?> (auto cropping has insufficient precision).</li>
  <li><?php bugfix(77200); ?> (imagecropauto(…, GD_CROP_SIDES) crops left but not right).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77020); ?> (null pointer dereference in imap_mail).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77370); ?> (Buffer overflow on mb regex functions - fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77371); ?> (heap buffer overflow in mb regex functions - compile_string_node). (CVE-2019-9023)</li>
  <li><?php bugfix(77381); ?> (heap buffer overflow in multibyte match_at). (CVE-2019-9023)</li>
  <li><?php bugfix(77382); ?> (heap buffer overflow due to incorrect length in expand_case_fold_string). (CVE-2019-9023)</li>
  <li><?php bugfix(77385); ?> (buffer overflow in fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77394); ?> (Buffer overflow in multibyte case folding - unicode). (CVE-2019-9023)</li>
  <li><?php bugfix(77418); ?> (Heap overflow in utf32be_mbc_to_code). (CVE-2019-9023)</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(76804); ?> (oci_pconnect with OCI_CRED_EXT not working).</li>
  <li>Added oci_set_call_timeout() for call timeouts.</li>
  <li>Added oci_set_db_operation() for the DBOP end-to-end-tracing attribute.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77215); ?> (CFG assertion failure on multiple finalizing switch frees in one block).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Handle invalid index passed to PDOStatement::fetchColumn() as error.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77247); ?> (heap buffer overflow in phar_detect_phar_fname_ext). (CVE-2019-9021)</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(77136); ?> (Unsupported IPV6_RECVPKTINFO constants on macOS).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(77051); ?> (Issue with re-binding on SQLite3).</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(77242); ?> (heap out of bounds read in xmlrpc_decode()). (CVE-2019-9020)</li>
  <li><?php bugfix(77380); ?> (Global out of bounds read in xmlrpc base64 code). (CVE-2019-9024)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.13"><!-- {{{ 7.2.13 -->
<h3>Version 7.2.13</h3>
<b><?php release_date('06-Dec-2018'); ?></b>
<ul><li>ftp:
<ul>
  <li><?php bugfix(77151); ?> (ftp_close(): SSL_read on shutdown).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(77111); ?> (php-win.exe corrupts unicode symbols from cli parameters).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(77095); ?> (slowness regression in 7.2/7.3 (compared to 7.1)).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(77147); ?> (Fixing 60494 ignored ICONV_MIME_DECODE_CONTINUE_ON_ERROR).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(77231); ?> (Segfault when using convert.quoted-printable-encode filter).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77153); ?> (imap_open allows to run arbitrary shell commands via mailbox parameter). (CVE-2018-19518)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(77079); ?> (odbc_fetch_object has incorrect type signature).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77058); ?> (Type inference in opcache causes side effects).</li>
  <li><?php bugfix(77092); ?> (array_diff_key() - segmentation fault).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77022); ?> (PharData always creates new files with mode 0666).</li>
  <li><?php bugfix(77143); ?> (Heap Buffer Overflow (READ: 4) in phar_parse_pharfile). (CVE-2018-20783)</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(77047); ?> (pg_convert has a broken regex for the 'TIME WITHOUT TIMEZONE' data type).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(50675); ?> (SoapClient can't handle object references correctly).</li>
  <li><?php bugfix(76348); ?> (WSDL_CACHE_MEMORY causes Segmentation fault).</li>
  <li><?php bugfix(77141); ?> (Signedness issue in SOAP when precision=-1).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(67619); ?> (Validate length on socket_write).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.12"><!-- {{{ 7.2.12 -->
<h3>Version 7.2.12</h3>
<b><?php release_date('08-Nov-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76846); ?> (Segfault in shutdown function after memory limit error).</li>
  <li><?php bugfix(76946); ?> (Cyclic reference in generator not detected).</li>
  <li><?php bugfix(77035); ?> (The phpize and ./configure create redundant .deps file).</li>
  <li><?php bugfix(77041); ?> (buildconf should output error messages to stderr) (Mizunashi Mana)</li>
</ul></li>
<li>Date:
<ul>
  <li>Upgraded timelib to 2017.08.</li>
  <li><?php bugfix(75851); ?> (Year component overflow with date formats "c", "o", "r" and "y").</li>
  <li><?php bugfix(77007); ?> (fractions in `diff()` are not correctly normalized).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(76948); ?> (Failed shutdown/reboot or end session in Windows).</li>
  <li><?php bugfix(76954); ?> (apache_response_headers removes last character from header name).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(76972); ?> (Data truncation due to forceful ssl socket shutdown).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76942); ?> (U_ARGUMENT_TYPE_MISMATCH).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(76936); ?> (Objects cannot access their private attributes while handling reflection errors).</li>
  <li><?php bugfix(66430); ?> (ReflectionFunction::invoke does not invoke closure with object scope).</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Some base64 outputs were truncated; this is not the case any more.</li>
  <li>block sizes &gt;= 256 bytes are now supposed by sodium_pad() even when an old version of libsodium has been installed.</li>
  <li><?php bugfix(77008); ?> (sodium_pad() could read (but not return nor write) uninitialized memory when trying to pad an empty input).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76965); ?> (INI_SCANNER_RAW doesn't strip trailing whitespace).</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77027); ?> (tidy::getOptDoc() not available on Windows).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(30875); ?> (xml_parse_into_struct() does not resolve entities).</li>
  <li>Add support for getting SKIP_TAGSTART and SKIP_WHITE options.</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(75282); ?> (xmlrpc_encode_request() crashes).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.11"><!-- {{{ 7.2.11 -->
<h3>Version 7.2.11</h3>
<b><?php release_date('11-Oct-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76800); ?> (foreach inconsistent if array modified during loop).</li>
  <li><?php bugfix(76901); ?> (method_exists on SPL iterator passthrough method corrupts memory).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(76480); ?> (Use curl_multi_wait() so that timeouts are respected).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(66828); ?> (iconv_mime_encode Q-encoding longer than it should be).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76832); ?> (ZendOPcache.MemoryBase periodically deleted by the OS).</li>
  <li><?php bugfix(76796); ?> (Compile-time evaluation of disabled function in opcache causes segfault).</li>
</ul></li>
<li>POSIX:
<ul>
  <li><?php bugfix(75696); ?> (posix_getgrnam fails to print details of group).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74454); ?> (Wrong exception being thrown when using ReflectionMethod).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73457); ?> (Wrong error message when fopen FTP wrapped fails to open data connection).</li>
  <li><?php bugfix(74764); ?> (Bindto IPv6 works with file_get_contents but fails with stream_socket_client).</li>
  <li><?php bugfix(75533); ?> (array_reduce is slow when $carry is large array).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(76886); ?> (Can't build xmlrpc with expat).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(75273); ?> (php_zlib_inflate_filter() may not update bytes_consumed).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.10"><!-- {{{ 7.2.10 -->
<h3>Version 7.2.10</h3>
<b><?php release_date('13-Sep-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76754); ?> (parent private constant in extends class memory leak).</li>
  <li><?php bugfix(72443); ?> (Generate enabled extension).</li>
  <li><?php bugfix(75797); ?> (Memory leak when using class_alias() in non-debug mode).</li>
</ul></li>
<li>Apache2:
<ul>
  <li><?php bugfix(76582); ?> (XSS due to the header Transfer-Encoding: chunked). (CVE-2018-17082)</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fixed arginfo for bzcompress.</li>
</ul></li>
<li>gettext:
<ul>
  <li><?php bugfix(76517); ?> (incorrect restoring of LDFLAGS).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(68180); ?> (iconv_mime_decode can return extra characters in a header).</li>
  <li><?php bugfix(63839); ?> (iconv_mime_decode_headers function is skipping headers).</li>
  <li><?php bugfix(60494); ?> (iconv_mime_decode does ignore special characters).</li>
  <li><?php bugfix(55146); ?> (iconv_mime_decode_headers() skips some headers).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74484); ?> (MessageFormatter::formatMessage memory corruption with 11+ named placeholders).</li>
</ul></li>
<li>libxml:
<ul>
  <li><?php bugfix(76777); ?> ("public id" parameter of libxml_set_external_entity_loader callback undefined).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(76704); ?> (mb_detect_order return value varies based on argument type).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76747); ?> (Opcache treats path containing "test.pharma.tld" as a phar file).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76705); ?> (unusable ssl =&gt; peer_fingerprint in stream_context_create()).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76595); ?> (phpdbg man page contains outdated information).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(68825); ?> (Exception in DirectoryIterator::getLinkTarget()).</li>
  <li><?php bugfix(68175); ?> (RegexIterator pregFlags are NULL instead of 0).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76778); ?> (array_reduce leaks memory if callback throws exception).</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(65988); ?> (Zlib version check fails when an include/zlib/ style dir is passed to the --with-zlib configure option).</li>
  <li><?php bugfix(76709); ?> (Minimal required zlib library is 1.2.0.4).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.9"><!-- {{{ 7.2.9 -->
<h3>Version 7.2.9</h3>
<b><?php release_date('16-Aug-2018'); ?></b>
<ul><li>Calendar:
<ul>
  <li><?php bugfix(52974); ?> (jewish.c: compile error under Windows with GBK charset).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(76366); ?> (References in sub-array for filtering breaks the filter).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(76488); ?> (Memory leak when fetching a BLOB field).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(75402); ?> (Possible Memory Leak using PDO::CURSOR_SCROLL option).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(76665); ?> (SQLite3Stmt::bindValue() with SQLITE3_FLOAT doesn't juggle).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73817); ?> (Incorrect entries in get_html_translation_table).</li>
  <li><?php bugfix(68553); ?> (array_column: null values in $index_key become incrementing keys in result).</li>
  <li><?php bugfix(76643); ?> (Segmentation fault when using `output_add_rewrite_var`).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(76524); ?> (ZipArchive memory leak (OVERWRITE flag and empty archive)).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.8"><!-- {{{ 7.2.8 -->
<h3>Version 7.2.8</h3>
<b><?php release_date('19-Jul-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76534); ?> (PHP hangs on 'illegal string offset on string references with an error handler).</li>
  <li><?php bugfix(76520); ?> (Object creation leaks memory when executed over HTTP).</li>
  <li><?php bugfix(76502); ?> (Chain of mixed exceptions and errors does not serialize properly).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(76462); ?> (Undefined property: DateInterval::$f).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(76409); ?> (heap use after free in _php_stream_free). (CVE-2018-12882)</li>
  <li><?php bugfix(76423); ?> (Int Overflow lead to Heap OverFlow in exif_thumbnail_extract of exif.c). (CVE-2018-14883)</li>
  <li><?php bugfix(76557); ?> (heap-buffer-overflow (READ of size 48) while reading exif data). (CVE-2018-14851)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(73342); ?> (Vulnerability in php-fpm by changing stdin to non-blocking).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(74670); ?> (Integer Underflow when unserializing GMP and possible other classes).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76556); ?> (get_debug_info handler for BreakIterator shows wrong type).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(76532); ?> (Integer overflow and excessive memory usage in mb_strimwidth).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76477); ?> (Opcache causes empty return value).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(76548); ?> (pg_fetch_result did not fetch the next row).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li>Fix arginfo wrt. optional/required parameters.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(76536); ?> (PHP crashes with core dump when throwing exception in error handler).</li>
  <li><?php bugfix(75231); ?> (ReflectionProperty#getValue() incorrectly works with inherited classes).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76505); ?> (array_merge_recursive() is duplicating sub-array keys).</li>
  <li><?php bugfix(71848); ?> (getimagesize with $imageinfo returns false).</li>
</ul></li>
<li>Win32:
<ul>
  <li><?php bugfix(76459); ?> (windows linkinfo lacks openbasedir check). (CVE-2018-15132)</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(76461); ?> (OPSYS_Z_CPM defined instead of OPSYS_CPM).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.7"><!-- {{{ 7.2.7 -->
<h3>Version 7.2.7</h3>
<b><?php release_date('21-Jun-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76337); ?> (segfault when opcache enabled + extension use zend_register_class_alias).</li>
</ul></li>
<li>CLI Server:
<ul>
  <li><?php bugfix(76333); ?> (PHP built-in server does not find files if root path contains special characters).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76296); ?> (openssl_pkey_get_public does not respect open_basedir).</li>
  <li><?php bugfix(76174); ?> (openssl extension fails to build with LibreSSL 2.7).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(76367); ?> (NoRewindIterator segfault 11).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76410); ?> (SIGV in zend_mm_alloc_small).</li>
  <li><?php bugfix(76335); ?> ("link(): Bad file descriptor" with non-ASCII path).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.6"><!-- {{{ 7.2.6 -->
<h3>Version 7.2.6</h3>
<b><?php release_date('24-May-2018'); ?></b>
<ul><li>EXIF:
<ul>
  <li><?php bugfix(76164); ?> (exif_read_data zend_mm_heap corrupted).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76075); ?> --with-fpm-acl wrongly tries to find libacl on FreeBSD.</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74385); ?> (Locale::parseLocale() broken with some arguments).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76205); ?> (PHP-FPM sporadic crash when running Infinitewp).</li>
  <li><?php bugfix(76275); ?> (Assertion failure in file cache when unserializing empty try_catch_array).</li>
  <li><?php bugfix(76281); ?> (Opcache causes incorrect "undefined variable" errors).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed arginfo of array_replace(_recursive) and array_merge(_recursive).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(74892); ?> (Url Rewriting (trans_sid) not working on urls that start with "#").</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.5"><!-- {{{ 7.2.5 -->
<h3>Version 7.2.5</h3>
<b><?php release_date('26-Apr-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75722); ?> (Convert valgrind detection to configure option).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(76131); ?> (mismatch arginfo for date_create).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(76130); ?> (Heap Buffer Overflow (READ: 1786) in exif_iif_add_value). (CVE-2018-10549)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68440); ?> (ERROR: failed to reload: execvp() failed: Argument list too long).</li>
  <li>Fixed incorrect write to getenv result in FPM reload.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(52070); ?> (imagedashedline() - dashed line sometimes is not visible).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(76249); ?> (stream filter convert.iconv leads to infinite loop on invalid sequence). (CVE-2018-10546)</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76153); ?> (Intl compilation fails with icu4c 61.1).</li>
</ul></li>
<li>ldap:
<ul>
  <li><?php bugfix(76248); ?> (Malicious LDAP-Server Response causes Crash). (CVE-2018-10548)</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(75944); ?> (Wrong cp1251 detection).</li>
  <li><?php bugfix(76113); ?> (mbstring does not build with Oniguruma 6.8.1).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(76088); ?> (ODBC functions are not available by default on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76094); ?> (Access violation when using opcache).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76129); ?> (fix for CVE-2018-5712 may not be complete). (CVE-2018-10547)</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76143); ?> (Memory corruption: arbitrary NUL overwrite).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(76131); ?> (mismatch arginfo for splarray constructor).</li>
</ul></li>
<li>standard:
<ul>
  <li><?php bugfix(74139); ?> (mail.add_x_header default inconsistent with docs).</li>
  <li><?php bugfix(75996); ?> (incorrect url in header for mt_rand).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.4"><!-- {{{ 7.2.4 -->
<h3>Version 7.2.4</h3>
<b><?php release_date('29-Mar-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76025); ?> (Segfault while throwing exception in error_handler).</li>
  <li><?php bugfix(76044); ?> ('date: illegal option -- -' in ./configure on FreeBSD).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(75605); ?> (Dumpable FPM child processes allow bypassing opcache access controls). (CVE-2018-10545)</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed ftp_pasv arginfo.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73957); ?> (signed integer conversion in imagescale()).</li>
  <li><?php bugfix(76041); ?> (null pointer access crashed php).</li>
  <li>Fixed imagesetinterpolation arginfo.</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(75867); ?> (Freeing uninitialized pointer).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(62545); ?> (wrong unicode mapping in some charsets).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75969); ?> (Assertion failure in live range DCE due to block pass misoptimization).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed openssl_* arginfos.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li><?php bugfix(75873); ?> (pcntl_wexitstatus returns incorrect on Big_Endian platform (s390x)).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76085); ?> (Segmentation fault in buildFromIterator when directory name contains a \n).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75961); ?> (Strange references behavior).</li>
  <li>Fixed some arginfos.</li>
  <li><?php bugfix(76068); ?> (parse_ini_string fails to parse "[foo]\nbar=1|&gt;baz" with segfault).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.3"><!-- {{{ 7.2.3 -->
<h3>Version 7.2.3</h3>
<b><?php release_date('01-Mar-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75864); ?> ("stream_isatty" returns wrong value on s390x).</li>
</ul></li>
<li>Apache2Handler:
<ul>
  <li><?php bugfix(75882); ?> (a simple way for segfaults in threadsafe php just with configuration).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75857); ?> (Timezone gets truncated when formatted).</li>
  <li><?php bugfix(75928); ?> (Argument 2 for `DateTimeZone::listIdentifiers()` should accept `null`).</li>
  <li><?php bugfix(68406); ?> (calling var_dump on a DateTimeZone object modifies it).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(49876); ?> (Fix LDAP path lookup on 64-bit distros).</li>
</ul></li>
<li>libxml2:
<ul>
  <li><?php bugfix(75871); ?> (use pkg-config where available).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75838); ?> (Memory leak in pg_escape_bytea()).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(54289); ?> (Phar::extractTo() does not accept specific directories to be extracted).</li>
  <li><?php bugfix(65414); ?> (deal with leading slash while adding files correctly).</li>
  <li><?php bugfix(65414); ?> (deal with leading slash when adding files correctly).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(73725); ?> (Unable to retrieve value of varchar(max) type).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75729); ?> (opcache segfault when installing Bitrix).</li>
  <li><?php bugfix(75893); ?> (file_get_contents $http_response_header variable bugged with opcache).</li>
  <li><?php bugfix(75938); ?> (Modulus value not stored in variable).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74519); ?> (strange behavior of AppendIterator).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75916); ?> (DNS_CAA record results contain garbage).</li>
  <li><?php bugfix(75981); ?> (stack-buffer-overflow while parsing HTTP response). (CVE-2018-7584)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.2"><!-- {{{ 7.2.2 -->
<h3>Version 7.2.2</h3>
<b><?php release_date('01-Feb-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75742); ?> (potential memleak in internal classes's static members).</li>
  <li><?php bugfix(75679); ?> (Path 260 character problem).</li>
  <li><?php bugfix(75614); ?> (Some non-portable == in shell scripts).</li>
  <li><?php bugfix(75786); ?> (segfault when using spread operator on generator passed by reference).</li>
  <li><?php bugfix(75799); ?> (arg of get_defined_functions is optional).</li>
  <li><?php bugfix(75396); ?> (Exit inside generator finally results in fatal error).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(75794); ?> (getenv() crashes on Windows 7.2.1 when second parameter is false).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(75774); ?> (imap_append HeapCorruction).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75720); ?> (File cache not populated after SHM runs full).</li>
  <li><?php bugfix(75687); ?> (var 8 (TMP) has array key type but not value type).</li>
  <li><?php bugfix(75698); ?> (Using @ crashes php7.2-fpm).</li>
  <li><?php bugfix(75579); ?> (Interned strings buffer overflow may cause crash).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(75616); ?> (PDO extension doesn't allow to be built shared on Darwin).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(75615); ?> (PDO Mysql module can't be built as module).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75671); ?> (pg_version() crashes when called on a connection to cockroach).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(75775); ?> (readline_read_history segfaults with empty file).</li>
</ul></li>
<li>SAPI:
<ul>
  <li><?php bugfix(75735); ?> ([embed SAPI] Segmentation fault in sapi_register_post_entry).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70469); ?> (SoapClient generates E_ERROR even if exceptions=1 is used).</li>
  <li><?php bugfix(75502); ?> (Segmentation fault in zend_string_release).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75717); ?> (RecursiveArrayIterator does not traverse arrays by reference).</li>
  <li><?php bugfix(75242); ?> (RecursiveArrayIterator doesn't have constants from parent class).</li>
  <li><?php bugfix(73209); ?> (RecursiveArrayIterator does not iterate object properties).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75781); ?> (substr_count incorrect result).</li>
  <li><?php bugfix(75653); ?> (array_values don't work on empty array).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Display headers (buildtime) and library (runtime) versions in phpinfo (with libzip &gt;= 1.3.1).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.1"><!-- {{{ 7.2.1 -->
<h3>Version 7.2.1</h3>
<b><?php release_date('04-Jan-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75573); ?> (Segmentation fault in 7.1.12 and 7.0.26).</li>
  <li><?php bugfix(75384); ?> (PHP seems incompatible with OneDrive files on demand).</li>
  <li><?php bugfix(75525); ?> (Access Violation in vcruntime140.dll).</li>
  <li><?php bugfix(74862); ?> (Unable to clone instance when private __clone defined).</li>
  <li><?php bugfix(75074); ?> (php-process crash when is_file() is used with strings longer 260 chars).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(73830); ?> (Directory does not exist).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(64938); ?> (libxml_disable_entity_loader setting is shared between requests).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(75571); ?> (Potential infinite loop in gdImageCreateFromGifCtx). (CVE-2018-5711)</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75608); ?> ("Narrowing occurred during type inference" error).</li>
  <li><?php bugfix(75579); ?> (Interned strings buffer overflow may cause crash).</li>
  <li><?php bugfix(75570); ?> ("Narrowing occurred during type inference" error).</li>
  <li><?php bugfix(75556); ?> (Invalid opcode 138/1/1).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74183); ?> (preg_last_error not returning error code after error).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(74782); ?> (Reflected XSS in .phar 404 page). (CVE-2018-5712)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75511); ?> (fread not free unused buffer).</li>
  <li><?php bugfix(75514); ?> (mt_rand returns value outside [$min,$max]+ on 32-bit) (Remi)</li>
  <li><?php bugfix(75535); ?> (Inappropriately parsing HTTP response leads to PHP segment fault). (CVE-2018-14884)</li>
  <li><?php bugfix(75409); ?> (accept EFAULT in addition to ENOSYS as indicator that getrandom() is missing).</li>
  <li><?php bugfix(73124); ?> (php_ini_scanned_files() not reporting correctly).</li>
  <li><?php bugfix(75574); ?> (putenv does not work properly if parameter contains non-ASCII unicode character).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(75540); ?> (Segfault with libzip 1.3.1).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.2.0"><!-- {{{ 7.2.0 -->
<h3>Version 7.2.0</h3>
<b><?php release_date('30-Nov-2017'); ?></b>
<ul><li>BCMath:
<ul>
  <li><?php bugfix(46564); ?> (bcmod truncates fractionals).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(74849); ?> (Process is started as interactive shell in PhpStorm).</li>
  <li><?php bugfix(74979); ?> (Interactive shell opening instead of script execution with -f flag).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(60471); ?> (Random "Invalid request (unexpected EOF)" using a router script).</li>
</ul></li>
<li>Core:
<ul>
  <li>Added ZEND_COUNT, ZEND_GET_CLASS, ZEND_GET_CALLED_CLASS, ZEND_GET_TYPE, ZEND_FUNC_NUM_ARGS, ZEND_FUNC_GET_ARGS instructions, to implement corresponding builtin functions.</li>
  <li>"Countable" interface is moved from SPL to Core.</li>
  <li>Added ZEND_IN_ARRAY instruction, implementing optimized in_array() builtin function, through hash lookup in flipped array.</li>
  <li>Removed IS_TYPE_IMMUTABLE (it's the same as COPYABLE &amp; !REFCOUNTED).</li>
  <li>Removed the sql.safe_mode directive.</li>
  <li>Removed support for Netware.</li>
  <li>Renamed ReflectionClass::isIterateable() to ReflectionClass::isIterable() (alias original name for BC).</li>
  <li><?php bugfix(54535); ?> (WSA cleanup executes before MSHUTDOWN).</li>
  <li><?php implemented(69791); ?> (Disallow mail header injections by extra headers) (Yasuo)</li>
  <li><?php implemented(49806); ?> (proc_nice() for Windows).</li>
  <li>Fix pthreads detection when cross-compiling (ffontaine)</li>
  <li>Fixed memory leaks caused by exceptions thrown from destructors. (Bob, Dmitry).</li>
  <li><?php bugfix(73215); ?> (uniqid() should use better random source).</li>
  <li><?php implemented(72768); ?> (Add ENABLE_VIRTUAL_TERMINAL_PROCESSING flag for php.exe).</li>
  <li>Implemented "Convert numeric keys in object/array casts" RFC, fixes bugs <?php bugl(53838); ?>, <?php bugl(61655); ?>, <?php bugl(66173); ?>, <?php bugl(70925); ?>, <?php bugl(72254); ?>, etc.</li>
  <li>Implemented "Deprecate and Remove Bareword (Unquoted) Strings" RFC.</li>
  <li>Raised minimum supported Windows versions to Windows 7/Server 2008 R2.</li>
  <li>Implemented minor optimization in array_keys/array_values().</li>
  <li>Added PHP_OS_FAMILY constant to determine on which OS we are.</li>
  <li><?php bugfix(73987); ?> (Method compatibility check looks to original definition and not parent).</li>
  <li><?php bugfix(73991); ?> (JSON_OBJECT_AS_ARRAY not respected).</li>
  <li><?php bugfix(74053); ?> (Corrupted class entries on shutdown when a destructor spawns another object).</li>
  <li><?php bugfix(73971); ?> (Filename got limited to MAX_PATH on Win32 when scan directory).</li>
  <li><?php bugfix(72359); ?>, bug <?php bugl(72451); ?>, bug <?php bugl(73706); ?>, bug <?php bugl(71115); ?> and others related to interned strings handling in TS builds.</li>
  <li>Implemented "Trailing Commas In List Syntax" RFC for group use lists only.</li>
  <li><?php bugfix(74269); ?> (It's possible to override trait property with different loosely-equal value).</li>
  <li><?php bugfix(61970); ?> (Restraining __construct() access level in subclass gives a fatal error).</li>
  <li><?php bugfix(63384); ?> (Cannot override an abstract method with an abstract method).</li>
  <li><?php bugfix(74607); ?> (Traits enforce different inheritance rules).</li>
  <li>Fixed misparsing of abstract unix domain socket names.</li>
  <li>Change PHP_OS_FAMILY value from "OSX" to "Darwin".</li>
  <li>Allow loading PHP/Zend extensions by name in ini files (extension=&lt;name&gt;).</li>
  <li>Added object type annotation.</li>
  <li><?php bugfix(74815); ?> (crash with a combination of INI entries at startup).</li>
  <li><?php bugfix(74836); ?> (isset on zero-prefixed numeric indexes in array broken).</li>
  <li>Added new VM instuctions ISSET_ISEMPTY_CV and UNSET_CV. Previously they were implemented as ISSET_ISEMPTY_VAR and UNSET_VAR variants with ZEND_QUICK_SET flag.</li>
  <li><?php bugfix(49649); ?> (unserialize() doesn't handle changes in property visibility).</li>
  <li><?php bugfix(74866); ?> (extension_dir = "./ext" now use current directory for base).</li>
  <li><?php implemented(74963); ?> (Improved error message on fetching property of non-object).</li>
  <li><?php bugfix(75142); ?> (buildcheck.sh check for autoconf version needs to be updated for v2.64).</li>
  <li><?php bugfix(74878); ?> (Data race in ZTS builds).</li>
  <li><?php bugfix(75515); ?> ("stream_copy_to_stream" doesn't stream anymore).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(75093); ?> (OpenSSL support not detected).</li>
  <li>Better fix for <?php bugl(74125); ?> (use pkg-config instead of curl-config).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(55407); ?> (Impossible to prototype DateTime::createFromFormat).</li>
  <li><?php implemented(71520); ?> (Adding the DateTime constants to the DateTimeInterface interface).</li>
  <li><?php bugfix(75055); ?> (Out-Of-Bounds Read in timelib_meridian()). (CVE-2017-16642)</li>
  <li><?php bugfix(75149); ?> (redefinition of typedefs ttinfo and t1info).</li>
  <li><?php bugfix(75222); ?> (DateInterval microseconds property always 0).</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(72885); ?> (flatfile: dba_fetch() fails to read replaced entry).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php implemented(74837); ?> (Implement Countable for DomNodeList and DOMNamedNodeMap).</li>
</ul></li>
<li>EXIF:
<ul>
  <li>Added support for vendor specific tags for the following formats: Samsung, DJI, Panasonic, Sony, Pentax, Minolta, Sigma/Foveon, AGFA, Kyocera, Ricoh &amp; Epson.</li>
  <li><?php bugfix(72682); ?> (exif_read_data() fails to read all data for some images).</li>
  <li><?php bugfix(71534); ?> (Type confusion in exif_read_data() leading to heap overflow in debug mode).</li>
  <li><?php bugfix(68547); ?> (Exif Header component value check error).</li>
  <li><?php bugfix(66443); ?> (Corrupt EXIF header: maximum directory nesting level reached for some cameras).</li>
  <li>Fixed Redhat bug #1362571 (PHP not returning full results for exif_read_data function).</li>
  <li><?php implemented(65187); ?> (exif_read_data/thumbnail: add support for stream resource).</li>
  <li>Deprecated the read_exif_data() alias.</li>
  <li><?php bugfix(74428); ?> (exif_read_data(): "Illegal IFD size" warning occurs with correct exif format).</li>
  <li><?php bugfix(72819); ?> (EXIF thumbnails not read anymore).</li>
  <li><?php bugfix(62523); ?> (php crashes with segfault when exif_read_data called).</li>
  <li><?php bugfix(50660); ?> (exif_read_data(): Illegal IFD offset (works fine with other exif readers).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Upgrade bundled libmagic to 5.31.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Configuration to limit fpm slow log trace callers.</li>
  <li><?php bugfix(75212); ?> (php_value acts like php_admin_value).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Implement MLSD for structured listing of directories.</li>
  <li>Added ftp_append() function.</li>
</ul></li>
<li>GD:
<ul>
  <li>Implemented imageresolution as getter and setter (Christoph)</li>
  <li><?php bugfix(74744); ?> (gd.h: stdarg.h include missing for va_list use in gdErrorMethod).</li>
  <li><?php bugfix(75111); ?> (Memory disclosure or DoS via crafted .bmp image).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(70896); ?> (gmp_fact() silently ignores non-integer input).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Changed HashContext from resource to object.</li>
  <li>Disallowed usage of non-cryptographic hash functions with HMAC and PBKDF2.</li>
  <li><?php bugfix(75284); ?> (sha3 is not supported on bigendian machine).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(72324); ?> (imap_mailboxmsginfo() return wrong size).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(63790); ?> (test using Spoofchecker which may be unavailable).</li>
  <li><?php bugfix(75378); ?> ([REGRESSION] IntlDateFormatter::parse() does not change $position argument).</li>
</ul></li>
<li>JSON:
<ul>
  <li>Add JSON_INVALID_UTF8_IGNORE and JSON_INVALID_UTF8_SUBSTITUTE options for json_encode and json_decode to ignore or replace invalid UTF-8 byte sequences - it addresses request <?php bugl(65082); ?>.</li>
  <li><?php bugfix(75185); ?> (Buffer overflow in json_decode() with JSON_INVALID_UTF8_IGNORE or JSON_INVALID).</li>
  <li><?php bugfix(68567); ?> (JSON_PARTIAL_OUTPUT_ON_ERROR can result in JSON with null key).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php implemented(69445); ?> (Support for LDAP EXOP operations)</li>
  <li>Fixed support for LDAP_OPT_SERVER_CONTROLS and LDAP_OPT_CLIENT_CONTROLS in ldap_get_option</li>
  <li>Fixed passing an empty array to ldap_set_option for client or server controls.</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php implemented(66024); ?> (mb_chr() and mb_ord()).</li>
  <li><?php implemented(65081); ?> (mb_scrub()).</li>
  <li><?php implemented(69086); ?> (enhancement for mb_convert_encoding() that handles multibyte replacement char nicely).</li>
  <li>Added array input support to mb_convert_encoding().</li>
  <li>Added array input support to mb_check_encoding().</li>
  <li><?php bugfix(69079); ?> (enhancement for mb_substitute_character).</li>
  <li>Update to oniguruma version 6.3.0.</li>
  <li><?php bugfix(69267); ?> (mb_strtolower fails on titlecase characters).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>The deprecated mcrypt extension has been moved to PECL.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added global optimisation passes based on data flow analysis using Single Static Assignment (SSA) form: Sparse Conditional Constant Propagation (SCCP), Dead Code Elimination (DCE), and removal of unused local variables (Nikita, Dmitry)</li>
  <li>Fixed incorect constant conditional jump elimination.</li>
  <li><?php bugfix(75230); ?> (Invalid opcode 49/1/8 using opcache).</li>
  <li>Fixed bug (assertion fails with extended info generated).</li>
  <li>Fixed bug (Phi sources removel).</li>
  <li><?php bugfix(75370); ?> (Webserver hangs on valid PHP text).</li>
  <li><?php bugfix(75357); ?> (segfault loading WordPress wp-admin).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Use TLS_ANY for default ssl:// and tls:// negotiation.</li>
  <li>Fix leak in openssl_spki_new().</li>
  <li>Added openssl_pkcs7_read() and pk7 parameter to openssl_pkcs7_verify().</li>
  <li>Add ssl security_level stream option to support OpenSSL security levels. (Jakub Zelenka).</li>
  <li>Allow setting SNI cert and private key in separate files.</li>
  <li><?php bugfix(74903); ?> (openssl_pkcs7_encrypt() uses different EOL than before).</li>
  <li>Automatically load OpenSSL configuration file.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Added support for PCRE JIT fast path API.</li>
  <li><?php bugfix(61780); ?> (Inconsistent PCRE captures in match results).</li>
  <li><?php bugfix(74873); ?> (Minor BC break: PCRE_JIT changes output of preg_match()).</li>
  <li><?php bugfix(75089); ?> (preg_grep() is not reporting PREG_BAD_UTF8_ERROR after first input string).</li>
  <li><?php bugfix(75223); ?> (PCRE JIT broken in 7.2).</li>
  <li><?php bugfix(75285); ?> (Broken build when system libpcre don't have jit support).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74196); ?> (phar does not correctly handle names containing dots).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(73234); ?> (Emulated statements let value dictate parameter type).</li>
  <li>Add "Sent SQL" to debug dump for emulated prepares.</li>
  <li>Add parameter types for national character set strings.</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(73396); ?> (bigint columns are returned as strings).</li>
  <li>Expose DB-Library version as \PDO::DBLIB_ATTR_VERSION attribute on \PDO instance.</li>
  <li>Add test coverage for bug <?php bugl(72969); ?>.</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(74537); ?> (Align --with-pdo-oci configure option with --with-oci8 syntax).</li>
</ul></li>
<li>PDO_Sqlite:
<ul>
  <li>Switch to sqlite3_prepare_v2() and sqlite3_close_v2() functions (rasmus)</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Added extended_value to opcode dump output.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(73461); ?> (Prohibit session save handler recursion).</li>
  <li>PR <?php githubissuel('php/php-src', 2233); ?> Removed register_globals related code and "!" can be used as $_SESSION key name.</li>
  <li>Improved bug <?php bugl(73100); ?> fix. 'user' save handler can only be set by session_set_save_handler()</li>
  <li><?php bugfix(74514); ?> (5 session functions incorrectly warn when calling in read-only/getter mode).</li>
  <li><?php bugfix(74936); ?> (session_cache_expire/cache_limiter/save_path() trigger a warning in read mode).</li>
  <li><?php bugfix(74941); ?> (session fails to start after having headers sent).</li>
</ul></li>
<li>Sodium:
<ul>
  <li>New cryptographic extension</li>
  <li>Added missing bindings for libsodium &gt; 1.0.13.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71412); ?> (Incorrect arginfo for ArrayIterator::__construct).</li>
  <li>Added spl_object_id().</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Implement writing to blobs.</li>
  <li>Update to Sqlite 3.20.1.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69442); ?> (closing of fd incorrect when PTS enabled).</li>
  <li><?php bugfix(74300); ?> (unserialize accepts two plus/minus signs for float number exponent part).</li>
  <li>Compatibility with libargon2 versions 20161029 and 20160821.</li>
  <li><?php bugfix(74737); ?> (mysqli_get_client_info reflection info).</li>
  <li>Add support for extension name as argument to dl().</li>
  <li><?php bugfix(74851); ?> (uniqid() without more_entropy performs badly).</li>
  <li><?php bugfix(74103); ?> (heap-use-after-free when unserializing invalid array size). (CVE-2017-12932)</li>
  <li><?php bugfix(75054); ?> (A Denial of Service Vulnerability was found when performing deserialization).</li>
  <li><?php bugfix(75170); ?> (mt_rand() bias on 64-bit machines).</li>
  <li><?php bugfix(75221); ?> (Argon2i always throws NUL at the end).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Default ssl/single_dh_use and ssl/honor_cipher_order to true.</li>
</ul></li>
<li>XML:
<ul>
  <li>Moved utf8_encode() and utf8_decode() to the Standard extension.</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li>Use Zend MM for allocation in bundled libxmlrpc (Joe)</li>
</ul></li>
<li>ZIP:
<ul>
  <li>Add support for encrypted archives.</li>
  <li>Use of bundled libzip is deprecated, --with-libzip option is recommended.</li>
  <li><?php bugfix(73803); ?> (Reflection of ZipArchive does not show public properties).</li>
  <li>ZipArchive implements countable, added ZipArchive::count() method.</li>
  <li>Fix segfault in php_stream_context_get_option call.</li>
  <li><?php bugfix(75143); ?> (new method setEncryptionName() seems not to exist in ZipArchive).</li>
</ul></li>
<li>zlib:
<ul>
  <li>Expose inflate_get_status() and inflate_get_read_len() functions.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<a id="PHP_7_1"></a>
<section class="version" id="7.1.33"><!-- {{{ 7.1.33 -->
<h3>Version 7.1.33</h3>
<b><?php release_date('24-Oct-2019'); ?></b>
<ul><li>FPM:
<ul>
  <li><?php bugfix(78599); ?> (env_path_info underflow in fpm_main.c can lead to RCE). (CVE-2019-11043)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.32"><!-- {{{ 7.1.32 -->
<h3>Version 7.1.32</h3>
<b><?php release_date('29-Aug-2019'); ?></b>
<ul><li>mbstring:
<ul>
  <li>Fixed CVE-2019-13224 (don't allow different encodings for onig_new_deluxe) (stas)</li>
</ul></li>
<li>pcre:
<ul>
  <li><?php bugfix(75457); ?> (heap use-after-free in pcrelib) (cmb)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.31"><!-- {{{ 7.1.31 -->
<h3>Version 7.1.31</h3>
<b><?php release_date('01-Aug-2019'); ?></b>
<ul><li>SQLite:
<ul>
  <li>Upgraded to SQLite 3.28.0.</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(78256); ?> (heap-buffer-overflow on exif_process_user_comment). (CVE-2019-11042)</li>
  <li><?php bugfix(78222); ?> (heap-buffer-overflow on exif_scan_thumbnail). (CVE-2019-11041)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77919); ?> (Potential UAF in Phar RSHUTDOWN).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.30"><!-- {{{ 7.1.30 -->
<h3>Version 7.1.30</h3>
<b><?php release_date('30-May-2019'); ?></b>
<ul><li>EXIF:
<ul>
  <li><?php bugfix(77988); ?> (heap-buffer-overflow on php_jpg_get16) (CVE-2019-11040).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77973); ?> (Uninitialized read in gdImageCreateFromXbm) (CVE-2019-11038).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(78069); ?> (Out-of-bounds read in iconv.c:_php_iconv_mime_decode() due to integer overflow) (CVE-2019-11039).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(77967); ?> (Bypassing open_basedir restrictions via file uris).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.29"><!-- {{{ 7.1.29 -->
<h3>Version 7.1.29</h3>
<b><?php release_date('02-May-2019'); ?></b>
<ul><li>EXIF:
<ul>
  <li><?php bugfix(77950); ?> (Heap-buffer-overflow in _estrndup via exif_process_IFD_TAG) (CVE-2019-11036).</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(77821); ?> (Potential heap corruption in TSendMail()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.28"><!-- {{{ 7.1.28 -->
<h3>Version 7.1.28</h3>
<b><?php release_date('04-Apr-2019'); ?></b>
<ul><li>EXIF:
<ul>
  <li><?php bugfix(77753); ?> (Heap-buffer-overflow in php_ifd_get32s). (CVE-2019-11034)</li>
  <li><?php bugfix(77831); ?> (Heap-buffer-overflow in exif_iif_add_value). (CVE-2019-11035)</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Added sqlite3.defensive INI directive.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.27"><!-- {{{ 7.1.27 -->
<h3>Version 7.1.27</h3>
<b><?php release_date('07-Mar-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77630); ?> (rename() across the device may allow unwanted access during processing). (CVE-2019-9637)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(77509); ?> (Uninitialized read in exif_process_IFD_in_TIFF). (CVE-2019-9641)</li>
  <li><?php bugfix(77540); ?> (Invalid Read on exif_process_SOFn). (CVE-2019-9640)</li>
  <li><?php bugfix(77563); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9638)</li>
  <li><?php bugfix(77659); ?> (Uninitialized read in exif_process_IFD_in_MAKERNOTE). (CVE-2019-9639)</li>
</ul></li>
<li>PHAR:
<ul>
  <li><?php bugfix(77396); ?> (Null Pointer Dereference in phar_create_or_parse_filename).</li>
  <li><?php bugfix(77586); ?> (phar_tar_writeheaders_int() buffer overflow).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(77431); ?> (openFile() silently truncates after a null byte).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.26"><!-- {{{ 7.1.26 -->
<h3>Version 7.1.26</h3>
<b><?php release_date('10-Jan-2019'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77369); ?> (memcpy with negative length via crafted DNS response). (CVE-2019-9022)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(77269); ?> (efree() on uninitialized Heap data in imagescale leads to use-after-free). (CVE-2016-10166)</li>
  <li><?php bugfix(77270); ?> (imagecolormatch Out Of Bounds Write on Heap). (CVE-2019-6977)</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77020); ?> (null pointer dereference in imap_mail).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77370); ?> (Buffer overflow on mb regex functions - fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77371); ?> (heap buffer overflow in mb regex functions - compile_string_node). (CVE-2019-9023)</li>
  <li><?php bugfix(77381); ?> (heap buffer overflow in multibyte match_at). (CVE-2019-9023)</li>
  <li><?php bugfix(77382); ?> (heap buffer overflow due to incorrect length in expand_case_fold_string). (CVE-2019-9023)</li>
  <li><?php bugfix(77385); ?> (buffer overflow in fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77394); ?> (Buffer overflow in multibyte case folding - unicode). (CVE-2019-9023)</li>
  <li><?php bugfix(77418); ?> (Heap overflow in utf32be_mbc_to_code). (CVE-2019-9023)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77247); ?> (heap buffer overflow in phar_detect_phar_fname_ext). (CVE-2019-9021)</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(77242); ?> (heap out of bounds read in xmlrpc_decode()). (CVE-2019-9020)</li>
  <li><?php bugfix(77380); ?> (Global out of bounds read in xmlrpc base64 code). (CVE-2019-9024)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.1.25"><!-- {{{ 7.1.25 -->
<h3>Version 7.1.25</h3>
<b><?php release_date('06-Dec-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(71041); ?> (zend_signal_startup() needs ZEND_API).</li>
  <li><?php bugfix(77231); ?> (Segfault when using convert.quoted-printable-encode filter).</li>
</ul></li>
<li>ftp:
<ul>
  <li><?php bugfix(77151); ?> (ftp_close(): SSL_read on shutdown).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(77147); ?> (Fixing 60494 ignored ICONV_MIME_DECODE_CONTINUE_ON_ERROR).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77153); ?> (imap_open allows to run arbitrary shell commands via mailbox parameter). (CVE-2018-19518)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(77079); ?> (odbc_fetch_object has incorrect type signature).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(77058); ?> (Type inference in opcache causes side effects).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77022); ?> (PharData always creates new files with mode 0666).</li>
  <li><?php bugfix(77143); ?> (Heap Buffer Overflow (READ: 4) in phar_parse_pharfile). (CVE-2018-20783)</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(77047); ?> (pg_convert has a broken regex for the 'TIME WITHOUT TIMEZONE' data type).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(76348); ?> (WSDL_CACHE_MEMORY causes Segmentation fault).</li>
  <li><?php bugfix(77141); ?> (Signedness issue in SOAP when precision=-1).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(67619); ?> (Validate length on socket_write).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.24"><!-- {{{ 7.1.24 -->
<h3>Version 7.1.24</h3>
<b><?php release_date('08-Nov-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76946); ?> (Cyclic reference in generator not detected).</li>
  <li><?php bugfix(77035); ?> (The phpize and ./configure create redundant .deps file).</li>
  <li><?php bugfix(77041); ?> (buildconf should output error messages to stderr) (Mizunashi Mana)</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75851); ?> (Year component overflow with date formats "c", "o", "r" and "y").</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(76948); ?> (Failed shutdown/reboot or end session in Windows).</li>
  <li><?php bugfix(76954); ?> (apache_response_headers removes last character from header name).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(76972); ?> (Data truncation due to forceful ssl socket shutdown).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76942); ?> (U_ARGUMENT_TYPE_MISMATCH).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76965); ?> (INI_SCANNER_RAW doesn't strip trailing whitespace).</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77027); ?> (tidy::getOptDoc() not available on Windows).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(30875); ?> (xml_parse_into_struct() does not resolve entities).</li>
  <li>Add support for getting SKIP_TAGSTART and SKIP_WHITE options.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.23"><!-- {{{ 7.1.23 -->
<h3>Version 7.1.23</h3>
<b><?php release_date('11-Oct-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76901); ?> (method_exists on SPL iterator passthrough method corrupts memory).</li>
  <li><?php bugfix(76846); ?> (Segfault in shutdown function after memory limit error).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(76480); ?> (Use curl_multi_wait() so that timeouts are respected).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(66828); ?> (iconv_mime_encode Q-encoding longer than it should be).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76832); ?> (ZendOPcache.MemoryBase periodically deleted by the OS).</li>
</ul></li>
<li>POSIX:
<ul>
  <li><?php bugfix(75696); ?> (posix_getgrnam fails to print details of group).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74454); ?> (Wrong exception being thrown when using ReflectionMethod).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73457); ?> (Wrong error message when fopen FTP wrapped fails to open data connection).</li>
  <li><?php bugfix(74764); ?> (Bindto IPv6 works with file_get_contents but fails with stream_socket_client).</li>
  <li><?php bugfix(75533); ?> (array_reduce is slow when $carry is large array).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(75273); ?> (php_zlib_inflate_filter() may not update bytes_consumed).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.22"><!-- {{{ 7.1.22 -->
<h3>Version 7.1.22</h3>
<b><?php release_date('13-Sep-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76754); ?> (parent private constant in extends class memory leak).</li>
  <li><?php bugfix(72443); ?> (Generate enabled extension).</li>
</ul></li>
<li>Apache2:
<ul>
  <li><?php bugfix(76582); ?> (XSS due to the header Transfer-Encoding: chunked). (CVE-2018-17082)</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fixed arginfo for bzcompress.</li>
</ul></li>
<li>gettext:
<ul>
  <li><?php bugfix(76517); ?> (incorrect restoring of LDFLAGS).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(68180); ?> (iconv_mime_decode can return extra characters in a header).</li>
  <li><?php bugfix(63839); ?> (iconv_mime_decode_headers function is skipping headers).</li>
  <li><?php bugfix(60494); ?> (iconv_mime_decode does ignore special characters).</li>
  <li><?php bugfix(55146); ?> (iconv_mime_decode_headers() skips some headers).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74484); ?> (MessageFormatter::formatMessage memory corruption with 11+ named placeholders).</li>
</ul></li>
<li>libxml:
<ul>
  <li><?php bugfix(76777); ?> ("public id" parameter of libxml_set_external_entity_loader callback undefined).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(76704); ?> (mb_detect_order return value varies based on argument type).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76747); ?> (Opcache treats path containing "test.pharma.tld" as a phar file).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76705); ?> (unusable ssl =&gt; peer_fingerprint in stream_context_create()).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76595); ?> (phpdbg man page contains outdated information).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(68825); ?> (Exception in DirectoryIterator::getLinkTarget()).</li>
  <li><?php bugfix(68175); ?> (RegexIterator pregFlags are NULL instead of 0).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76778); ?> (array_reduce leaks memory if callback throws exception).</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(65988); ?> (Zlib version check fails when an include/zlib/ style dir is passed to the --with-zlib configure option).</li>
  <li><?php bugfix(76709); ?> (Minimal required zlib library is 1.2.0.4).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.21"><!-- {{{ 7.1.21 -->
<h3>Version 7.1.21</h3>
<b><?php release_date('16-Aug-2018'); ?></b>
<ul><li>Calendar:
<ul>
  <li><?php bugfix(52974); ?> (jewish.c: compile error under Windows with GBK charset).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(76366); ?> (References in sub-array for filtering breaks the filter).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(76488); ?> (Memory leak when fetching a BLOB field).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(75402); ?> (Possible Memory Leak using PDO::CURSOR_SCROLL option).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(76665); ?> (SQLite3Stmt::bindValue() with SQLITE3_FLOAT doesn't juggle).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(68553); ?> (array_column: null values in $index_key become incrementing keys in result).</li>
  <li><?php bugfix(73817); ?> (Incorrect entries in get_html_translation_table).</li>
  <li><?php bugfix(76643); ?> (Segmentation fault when using `output_add_rewrite_var`).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(76524); ?> (ZipArchive memory leak (OVERWRITE flag and empty archive)).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.20"><!-- {{{ 7.1.20 -->
<h3>Version 7.1.20</h3>
<b><?php release_date('19-Jul-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76534); ?> (PHP hangs on 'illegal string offset on string references with an error handler).</li>
  <li><?php bugfix(76502); ?> (Chain of mixed exceptions and errors does not serialize properly).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(76462); ?> (Undefined property: DateInterval::$f).</li>
</ul></li>
<li>exif:
<ul>
  <li><?php bugfix(76423); ?> (Int Overflow lead to Heap OverFlow in exif_thumbnail_extract of exif.c). (CVE-2018-14883)</li>
  <li><?php bugfix(76557); ?> (heap-buffer-overflow (READ of size 48) while reading exif data). (CVE-2018-14851)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(73342); ?> (Vulnerability in php-fpm by changing stdin to non-blocking).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(74670); ?> (Integer Underflow when unserializing GMP and possible other classes).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76556); ?> (get_debug_info handler for BreakIterator shows wrong type).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(76532); ?> (Integer overflow and excessive memory usage in mb_strimwidth).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(76548); ?> (pg_fetch_result did not fetch the next row).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li>Fix arginfo wrt. optional/required parameters.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(76536); ?> (PHP crashes with core dump when throwing exception in error handler).</li>
  <li><?php bugfix(75231); ?> (ReflectionProperty#getValue() incorrectly works with inherited classes).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76505); ?> (array_merge_recursive() is duplicating sub-array keys).</li>
  <li><?php bugfix(71848); ?> (getimagesize with $imageinfo returns false).</li>
</ul></li>
<li>Win32:
<ul>
  <li><?php bugfix(76459); ?> (windows linkinfo lacks openbasedir check). (CVE-2018-15132)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.19"><!-- {{{ 7.1.19 -->
<h3>Version 7.1.19</h3>
<b><?php release_date('22-Jun-2018'); ?></b>
<ul><li>CLI Server:
<ul>
  <li><?php bugfix(76333); ?> (PHP built-in server does not find files if root path contains special characters).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76296); ?> (openssl_pkey_get_public does not respect open_basedir).</li>
  <li><?php bugfix(76174); ?> (openssl extension fails to build with LibreSSL 2.7).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(76367); ?> (NoRewindIterator segfault 11).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(76335); ?> ("link(): Bad file descriptor" with non-ASCII path).</li>
  <li><?php bugfix(76383); ?> (array_map on $GLOBALS returns IS_INDIRECT).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.18"><!-- {{{ 7.1.18 -->
<h3>Version 7.1.18</h3>
<b><?php release_date('24-May-2018'); ?></b>
<ul><li>FPM:
<ul>
  <li><?php bugfix(76075); ?> --with-fpm-acl wrongly tries to find libacl on FreeBSD.</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74385); ?> (Locale::parseLocale() broken with some arguments).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76205); ?> (PHP-FPM sporadic crash when running Infinitewp).</li>
  <li><?php bugfix(76275); ?> (Assertion failure in file cache when unserializing empty try_catch_array).</li>
  <li><?php bugfix(76281); ?> (Opcache causes incorrect "undefined variable" errors).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed arginfo for array_replace(_recursive) and array_merge(_recursive).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.17"><!-- {{{ 7.1.17 -->
<h3>Version 7.1.17</h3>
<b><?php release_date('26-Apr-2018'); ?></b>
<ul><li>Date:
<ul>
  <li><?php bugfix(76131); ?> (mismatch arginfo for date_create).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(76130); ?> (Heap Buffer Overflow (READ: 1786) in exif_iif_add_value). (CVE-2018-10549)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68440); ?> (ERROR: failed to reload: execvp() failed: Argument list too long).</li>
  <li>Fixed incorrect write to getenv result in FPM reload.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(52070); ?> (imagedashedline() - dashed line sometimes is not visible).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(76249); ?> (stream filter convert.iconv leads to infinite loop on invalid sequence). (CVE-2018-10546)</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(76153); ?> (Intl compilation fails with icu4c 61.1).</li>
</ul></li>
<li>ldap:
<ul>
  <li><?php bugfix(76248); ?> (Malicious LDAP-Server Response causes Crash). (CVE-2018-10548)</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(75944); ?> (Wrong cp1251 detection).</li>
  <li><?php bugfix(76113); ?> (mbstring does not build with Oniguruma 6.8.1).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76129); ?> (fix for CVE-2018-5712 may not be complete). (CVE-2018-10547)</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(76143); ?> (Memory corruption: arbitrary NUL overwrite).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(76131); ?> (mismatch arginfo for splarray constructor).</li>
</ul></li>
<li>standard:
<ul>
  <li><?php bugfix(75996); ?> (incorrect url in header for mt_rand).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.16"><!-- {{{ 7.1.16 -->
<h3>Version 7.1.16</h3>
<b><?php release_date('29-Mar-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(76025); ?> (Segfault while throwing exception in error_handler).</li>
  <li><?php bugfix(76044); ?> ('date: illegal option -- -' in ./configure on FreeBSD).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(75605); ?> (Dumpable FPM child processes allow bypassing opcache access controls). (CVE-2018-10545)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73957); ?> (signed integer conversion in imagescale()).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(76088); ?> (ODBC functions are not available by default on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76074); ?> (opcache corrupts variable in for-loop).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76085); ?> (Segmentation fault in buildFromIterator when directory name contains a \n).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74139); ?> (mail.add_x_header default inconsistent with docs).</li>
  <li><?php bugfix(76068); ?> (parse_ini_string fails to parse "[foo]\nbar=1|&gt;baz" with segfault).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.15"><!-- {{{ 7.1.15 -->
<h3>Version 7.1.15</h3>
<b><?php release_date('01-Mar-2018'); ?></b>
<ul><li>Apache2Handler:
<ul>
  <li><?php bugfix(75882); ?> (a simple way for segfaults in threadsafe php just with configuration).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75857); ?> (Timezone gets truncated when formatted).</li>
  <li><?php bugfix(75928); ?> (Argument 2 for `DateTimeZone::listIdentifiers()` should accept `null`).</li>
  <li><?php bugfix(68406); ?> (calling var_dump on a DateTimeZone object modifies it).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75838); ?> (Memory leak in pg_escape_bytea()).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(73725); ?> (Unable to retrieve value of varchar(max) type).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(49876); ?> (Fix LDAP path lookup on 64-bit distros).</li>
</ul></li>
<li>libxml2:
<ul>
  <li><?php bugfix(75871); ?> (use pkg-config where available).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(65414); ?> (deal with leading slash when adding files correctly).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74519); ?> (strange behavior of AppendIterator).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75916); ?> (DNS_CAA record results contain garbage).</li>
  <li><?php bugfix(75981); ?> (stack-buffer-overflow while parsing HTTP response). (CVE-2018-7584)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.14"><!-- {{{ 7.1.14 -->
<h3>Version 7.1.14</h3>
<b><?php release_date('01-Feb-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75679); ?> (Path 260 character problem).</li>
  <li><?php bugfix(75786); ?> (segfault when using spread operator on generator passed by reference).</li>
  <li><?php bugfix(75799); ?> (arg of get_defined_functions is optional).</li>
  <li><?php bugfix(75396); ?> (Exit inside generator finally results in fatal error).</li>
  <li><?php bugfix(75079); ?> (self keyword leads to incorrectly generated TypeError when in closure in trait).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(75794); ?> (getenv() crashes on Windows 7.2.1 when second parameter is false).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(75774); ?> (imap_append HeapCorruction).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75720); ?> (File cache not populated after SHM runs full).</li>
  <li><?php bugfix(75579); ?> (Interned strings buffer overflow may cause crash).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75671); ?> (pg_version() crashes when called on a connection to cockroach).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(75775); ?> (readline_read_history segfaults with empty file).</li>
</ul></li>
<li>SAPI:
<ul>
  <li><?php bugfix(75735); ?> ([embed SAPI] Segmentation fault in sapi_register_post_entry).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70469); ?> (SoapClient generates E_ERROR even if exceptions=1 is used).</li>
  <li><?php bugfix(75502); ?> (Segmentation fault in zend_string_release).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75717); ?> (RecursiveArrayIterator does not traverse arrays by reference).</li>
  <li><?php bugfix(75242); ?> (RecursiveArrayIterator doesn't have constants from parent class).</li>
  <li><?php bugfix(73209); ?> (RecursiveArrayIterator does not iterate object properties).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75781); ?> (substr_count incorrect result).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.13"><!-- {{{ 7.1.13 -->
<h3>Version 7.1.13</h3>
<b><?php release_date('04-Jan-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75573); ?> (Segmentation fault in 7.1.12 and 7.0.26).</li>
  <li><?php bugfix(75384); ?> (PHP seems incompatible with OneDrive files on demand).</li>
  <li><?php bugfix(74862); ?> (Unable to clone instance when private __clone defined).</li>
  <li><?php bugfix(75074); ?> (php-process crash when is_file() is used with strings longer 260 chars).</li>
</ul></li>
<li>CLI Server:
<ul>
  <li><?php bugfix(60471); ?> (Random "Invalid request (unexpected EOF)" using a router script).</li>
  <li><?php bugfix(73830); ?> (Directory does not exist).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(64938); ?> (libxml_disable_entity_loader setting is shared between requests).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(75571); ?> (Potential infinite loop in gdImageCreateFromGifCtx). (CVE-2018-5711)</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75608); ?> ("Narrowing occurred during type inference" error).</li>
  <li><?php bugfix(75579); ?> (Interned strings buffer overflow may cause crash).</li>
  <li><?php bugfix(75570); ?> ("Narrowing occurred during type inference" error).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74183); ?> (preg_last_error not returning error code after error).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(74782); ?> (Reflected XSS in .phar 404 page). (CVE-2018-5712)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75511); ?> (fread not free unused buffer).</li>
  <li><?php bugfix(75514); ?> (mt_rand returns value outside [$min,$max]+ on 32-bit) (Remi)</li>
  <li><?php bugfix(75535); ?> (Inappropriately parsing HTTP response leads to PHP segment fault). (CVE-2018-14884)</li>
  <li><?php bugfix(75409); ?> (accept EFAULT in addition to ENOSYS as indicator that getrandom() is missing).</li>
  <li><?php bugfix(73124); ?> (php_ini_scanned_files() not reporting correctly).</li>
  <li><?php bugfix(75574); ?> (putenv does not work properly if parameter contains non-ASCII unicode character).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(75540); ?> (Segfault with libzip 1.3.1).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.1.12"><!-- {{{ 7.1.12 -->
<h3>Version 7.1.12</h3>
<b><?php release_date('23-Nov-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75420); ?> (Crash when modifing property name in __isset for BP_VAR_IS).</li>
  <li><?php bugfix(75368); ?> (mmap/munmap trashing on unlucky allocations).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(75287); ?> (Builtin webserver crash after chdir in a shutdown function).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(53070); ?> (enchant_broker_get_path crashes if no path is set).</li>
  <li><?php bugfix(75365); ?> (Enchant still reports version 1.1.0).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(75301); ?> (Exif extension has built in revision version).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(65148); ?> (imagerotate may alter image dimensions).</li>
  <li><?php bugfix(75437); ?> (Wrong reflection on imagewebp).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(75317); ?> (UConverter::setDestinationEncoding changes source instead of destination).</li>
</ul></li>
<li>interbase:
<ul>
  <li><?php bugfix(75453); ?> (Incorrect reflection for ibase_[p]connect).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(75434); ?> (Wrong reflection for mysqli_fetch_all function).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed valgrind issue.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(75363); ?> (openssl_x509_parse leaks memory).</li>
  <li><?php bugfix(75307); ?> (Wrong reflection for openssl_open function).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75373); ?> (Warning Internal error: wrong size calculation).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75419); ?> (Default link incorrectly cleared/linked by pg_close()).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(75464); ?> (Wrong reflection on SoapClient::__setSoapHeaders).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(75299); ?> (Wrong reflection on inflate_init and inflate_add).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.11"><!-- {{{ 7.1.11 -->
<h3>Version 7.1.11</h3>
<b><?php release_date('26-Oct-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75241); ?> (Null pointer dereference in zend_mm_alloc_small()).</li>
  <li><?php bugfix(75236); ?> (infinite loop when printing an error-message).</li>
  <li><?php bugfix(75252); ?> (Incorrect token formatting on two parse errors in one request).</li>
  <li><?php bugfix(75220); ?> (Segfault when calling is_callable on parent).</li>
  <li><?php bugfix(75290); ?> (debug info of Closures of internal functions contain garbage argument names).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75055); ?> (Out-Of-Bounds Read in timelib_meridian()). (CVE-2017-16642)</li>
</ul></li>
<li>Apache2Handler:
<ul>
  <li><?php bugfix(75311); ?> (error: 'zend_hash_key' has no member named 'arKey' in apache2handler).</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(75303); ?> (sha3 hangs on bigendian).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(75318); ?> (The parameter of UConverter::getAliases() is not optional).</li>
</ul></li>
<li>litespeed:
<ul>
  <li><?php bugfix(75248); ?> (Binary directory doesn't get created when building only litespeed SAPI).</li>
  <li><?php bugfix(75251); ?> (Missing program prefix and suffix).</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72535); ?> (arcfour encryption stream filter crashes php).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(75018); ?> (Data corruption when reading fields of bit type).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed incorrect reference counting.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75255); ?> (Request hangs and not finish).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(75207); ?> (applied upstream patch for CVE-2016-1283).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(75177); ?> (Type 'bit' is fetched as unexpected string).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73629); ?> (SplDoublyLinkedList::setIteratorMode masks intern flags).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.10"><!-- {{{ 7.1.10 -->
<h3>Version 7.1.10</h3>
<b><?php release_date('28-Sep-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75042); ?> (run-tests.php issues with EXTENSION block).</li>
</ul></li>
<li>BCMath:
<ul>
  <li><?php bugfix(44995); ?> (bcpowmod() fails if scale != 0).</li>
  <li><?php bugfix(46781); ?> (BC math handles minus zero incorrectly).</li>
  <li><?php bugfix(54598); ?> (bcpowmod() may return 1 if modulus is 1).</li>
  <li><?php bugfix(75178); ?> (bcpowmod() misbehaves for non-integer base or modulus).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(70470); ?> (Built-in server truncates headers spanning over TCP packets).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(75093); ?> (OpenSSL support not detected).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(75124); ?> (gdImageGrayScale() may produce colors).</li>
  <li><?php bugfix(75139); ?> (libgd/gd_interpolation.c:1786: suspicious if ?).</li>
</ul></li>
<li>Gettext:
<ul>
  <li><?php bugfix(73730); ?> (textdomain(null) throws in strict mode).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(75090); ?> (IntlGregorianCalendar doesn't have constants from parent class).</li>
  <li><?php bugfix(75193); ?> (segfault in collator_convert_object_to_string).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(74631); ?> (PDO_PCO with PHP-FPM: OCI environment initialized before PHP-FPM sets it up).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75155); ?> (AppendIterator::append() is broken when appending another AppendIterator).</li>
  <li><?php bugfix(75173); ?> (incorrect behavior of AppendIterator::append in foreach loop).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75152); ?> (signed integer overflow in parse_iv).</li>
  <li><?php bugfix(75097); ?> (gethostname fails if your host name is 64 chars long).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.9"><!-- {{{ 7.1.9 -->
<h3>Version 7.1.9</h3>
<b><?php release_date('31-Aug-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74947); ?> (Segfault in scanner on INF number).</li>
  <li><?php bugfix(74954); ?> (null deref and segfault in zend_generator_resume()).</li>
  <li><?php bugfix(74725); ?> (html_errors=1 breaks unhandled exceptions).</li>
  <li><?php bugfix(75063); ?> (Main CWD initialized with wrong codepage).</li>
  <li><?php bugfix(75349); ?> (NAN comparison).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(74125); ?> (Fixed finding CURL on systems with multiarch support).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75002); ?> (Null Pointer Dereference in timelib_time_clone).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(74993); ?> (Wrong reflection on some locale_* functions).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(71606); ?> (Segmentation fault mb_strcut with HTML-ENTITIES encoding).</li>
  <li><?php bugfix(62934); ?> (mb_convert_kana() does not convert iteration marks).</li>
  <li><?php bugfix(75001); ?> (Wrong reflection on mb_eregi_replace).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74968); ?> (PHP crashes when calling mysqli_result::fetch_object with an abstract class).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Expose oci_unregister_taf_callback() (Tianfang Yang)</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74980); ?> (Narrowing occurred during type inference).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74991); ?> (include_path has a 4096 char limit in some cases).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74949); ?> (null pointer dereference in _function_string).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(74892); ?> (Url Rewriting (trans_sid) not working on urls that start with "#").</li>
  <li><?php bugfix(74833); ?> (SID constant created with wrong module number).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(74950); ?> (nullpointer deref in simplexml_element_getDocNamespaces).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75049); ?> (spl_autoload_unregister can't handle spl_autoload_functions results).</li>
  <li><?php bugfix(74669); ?> (Unserialize ArrayIterator broken).</li>
  <li><?php bugfix(74977); ?> (Appending AppendIterator leads to segfault).</li>
  <li><?php bugfix(75015); ?> (Crash in recursive iterator destructors).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75075); ?> (unpack with X* causes infinity loop).</li>
  <li><?php bugfix(74103); ?> (heap-use-after-free when unserializing invalid array size). (CVE-2017-12932)</li>
  <li><?php bugfix(75054); ?> (A Denial of Service Vulnerability was found when performing deserialization).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(73793); ?> (WDDX uses wrong decimal seperator).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(74975); ?> (Incorrect xmlrpc serialization for classes with declared properties).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.1.8"><!-- {{{ 7.1.8 -->
<h3>Version 7.1.8</h3>
<b><?php release_date('03-Aug-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74832); ?> (Loading PHP extension with already registered function name leads to a crash).</li>
  <li><?php bugfix(74780); ?> (parse_url() broken when query string contains colon).</li>
  <li><?php bugfix(74761); ?> (Unary operator expected error on some systems).</li>
  <li><?php bugfix(73900); ?> (Use After Free in unserialize() SplFixedArray).</li>
  <li><?php bugfix(74923); ?> (Crash when crawling through network share).</li>
  <li><?php bugfix(74913); ?> (fixed incorrect poll.h include).</li>
  <li><?php bugfix(74906); ?> (fixed incorrect errno.h include).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74852); ?> (property_exists returns true on unknown DateInterval property).</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(74625); ?> (Integer overflow in oci_bind_array_by_name).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74623); ?> (Infinite loop in type inference when using HTMLPurifier).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74798); ?> (pkcs7_en/decrypt does not work if \x0a is used in content).</li>
  <li>Added OPENSSL_DONT_ZERO_PAD_KEY constant to prevent key padding and fix bug <?php bugl(71917); ?> (openssl_open() returns junk on envelope &lt; 16 bytes) and bug <?php bugl(72362); ?> (OpenSSL Blowfish encryption is incorrect for short keys).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(69356); ?> (PDOStatement::debugDumpParams() truncates query).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73471); ?> (PHP freezes with AppendIterator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(74883); ?> (SQLite3::__construct() produces "out of memory" exception with invalid flags).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(73173); ?> (huge memleak when wddx_unserialize).</li>
  <li><?php bugfix(74145); ?> (wddx parsing empty boolean tag leads to SIGSEGV). (CVE-2017-11143)</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(73944); ?> (dictionary option of inflate_init() does not work).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.7"><!-- {{{ 7.1.7 -->
<h3>Version 7.1.7</h3>
<b><?php release_date('06-Jul-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74738); ?> (Multiple [PATH=] and [HOST=] sections not properly parsed).</li>
  <li><?php bugfix(74658); ?> (Undefined constants in array properties result in broken properties).</li>
  <li>Fixed misparsing of abstract unix domain socket names.</li>
  <li><?php bugfix(74603); ?> (PHP INI Parsing Stack Buffer Overflow Vulnerability). (CVE-2017-11628)</li>
  <li><?php bugfix(74101); ?> (Unserialize Heap Use-After-Free (READ: 1) in zval_get_type). (CVE-2017-12934)</li>
  <li><?php bugfix(74111); ?> (Heap buffer overread (READ: 1) finish_nested_data from unserialize). (CVE-2017-12933)</li>
  <li><?php bugfix(74819); ?> (wddx_deserialize() heap out-of-bound read via php_parse_date()). (CVE-2017-11145)</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74639); ?> (implement clone for DatePeriod and DateInterval).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(69373); ?> (References to deleted XPath query results).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74435); ?> (Buffer over-read into uninitialized memory). (CVE-2017-7890)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73473); ?> (Stack Buffer Overflow in msgfmt_parse_message). (CVE-2017-11362)</li>
  <li><?php bugfix(74705); ?> (Wrong reflection on Collator::getSortKey and collator_get_sort_key).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Add oniguruma upstream fix (CVE-2017-9224, CVE-2017-9226, CVE-2017-9227, CVE-2017-9228, CVE-2017-9229)</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Add TAF callback (PR <?php githubissuel('php/php-src', 2459); ?>).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74663); ?> (Segfault with opcache.memory_protect and validate_timestamp).</li>
  <li>Revert opcache.enable_cli to default disabled.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74720); ?> (pkcs7_en/decrypt does not work if \x1a is used in content).</li>
  <li><?php bugfix(74651); ?> (negative-size-param (-1) in memcpy in zif_openssl_seal()). (CVE-2017-11144)</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Support Instant Client 12.2 in --with-pdo-oci configure option.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74673); ?> (Segfault when cast Reflection object to string with undefined constant).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74478); ?> (null coalescing operator failing with SplFixedArray).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(74598); ?> (ftp:// wrapper ignores context arg).</li>
</ul></li>
<li>PHAR:
<ul>
  <li><?php bugfix(74386); ?> (Phar::__construct reflection incorrect).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(74679); ?> (Incorrect conversion array with WSDL_CACHE_MEMORY).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74556); ?> (stream_socket_get_name() returns '\0').</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.6"><!-- {{{ 7.1.6 -->
<h3>Version 7.1.6</h3>
<b><?php release_date('07-Jun-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74600); ?> (crash (SIGSEGV) in _zend_hash_add_or_update_i).</li>
  <li><?php bugfix(74546); ?> (SIGILL in ZEND_FETCH_CLASS_CONSTANT_SPEC_CONST_CONST).</li>
  <li><?php bugfix(74589); ?> (__DIR__ wrong for unicode character).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74468); ?> (wrong reflection on Collator::sortWithSortKeys).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74547); ?> (mysqli::change_user() doesn't accept null as $database argument w/strict_types).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74596); ?> (SIGSEGV with opcache.revalidate_path enabled).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(51918); ?> (Phar::webPhar() does not handle requests sent through PUT and DELETE method).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(74490); ?> (readline() moves the cursor to the beginning of the line).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74510); ?> (win32/sendmail.c anchors CC header but not BCC).</li>
</ul></li>
<li>xmlreader:
<ul>
  <li><?php bugfix(74457); ?> (Wrong reflection on XMLReader::expand).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.5"><!-- {{{ 7.1.5 -->
<h3>Version 7.1.5</h3>
<b><?php release_date('11-May-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74408); ?> (Endless loop bypassing execution time limit).</li>
  <li><?php bugfix(74353); ?> (Segfault when killing within bash script trap code).</li>
  <li><?php bugfix(74340); ?> (Magic function __get has different behavior in php 7.1.x).</li>
  <li><?php bugfix(74188); ?> (Null coalescing operator fails for undeclared static class properties).</li>
  <li><?php bugfix(74444); ?> (multiple catch freezes in some cases).</li>
  <li><?php bugfix(74410); ?> (stream_select() is broken on Windows Nanoserver).</li>
  <li><?php bugfix(74337); ?> (php-cgi.exe crash on facebook callback).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74404); ?> (Wrong reflection on DateTimeZone::getTransitions).</li>
  <li><?php bugfix(74080); ?> (add constant for RFC7231 format datetime).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(74416); ?> (Wrong reflection on DOMNode::cloneNode).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(74379); ?> (syntax error compile error in libmagic/apprentice.c).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74343); ?> (compile fails on solaris 11 with system gd2 library).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(74376); ?> (Invalid free of persistent results on error/connection loss).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(65683); ?> (Intl does not support DateTimeImmutable).</li>
  <li><?php bugfix(74298); ?> (IntlDateFormatter-&gt;format() doesn't return microseconds/fractions).</li>
  <li><?php bugfix(74433); ?> (wrong reflection for Normalizer methods).</li>
  <li><?php bugfix(74439); ?> (wrong reflection for Locale methods).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74456); ?> (Segmentation error while running a script in CLI mode).</li>
  <li><?php bugfix(74431); ?> (foreach infinite loop).</li>
  <li><?php bugfix(74442); ?> (Opcached version produces a nested array).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(73833); ?> (null character not allowed in openssl_pkey_get_private).</li>
  <li><?php bugfix(73711); ?> (Segfault in openssl_pkey_new when generating DSA or DH key).</li>
  <li><?php bugfix(74341); ?> (openssl_x509_parse fails to parse ASN.1 UTCTime without seconds).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74383); ?> (phar method parameters reflection correction).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(74489); ?> (readline() immediately returns false in interactive console mode).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72071); ?> (setcookie allows max-age to be negative).</li>
  <li><?php bugfix(74361); ?> (Compaction in array_rand() violates COW).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74429); ?> (Remote socket URI with unique persistence identifier broken).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.4"><!-- {{{ 7.1.4 -->
<h3>Version 7.1.4</h3>
<b><?php release_date('13-Apr-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74149); ?> (static embed SAPI linkage error).</li>
  <li><?php bugfix(73370); ?> (falsely exits with "Out of Memory" when using USE_ZEND_ALLOC=0).</li>
  <li><?php bugfix(73960); ?> (Leak with instance method calling static method with referenced return).</li>
  <li><?php bugfix(69676); ?> (Resolution of self::FOO in class constants not correct).</li>
  <li><?php bugfix(74265); ?> (Build problems after 7.0.17 release: undefined reference to `isfinite').</li>
  <li><?php bugfix(74302); ?> (yield fromLABEL is over-greedy).</li>
</ul></li>
<li>Apache:
<ul>
  <li>Reverted patch for bug <?php bugl(61471); ?>, fixes bug <?php bugl(74318); ?>.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(72096); ?> (Swatch time value incorrect for dates before 1970).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(74004); ?> (LIBXML_NOWARNING flag ingnored on loadHTML*).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(74230); ?> (iconv fails to fail on surrogates).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74250); ?> (OPcache compilation performance regression in PHP 5.6/7 with huge classes).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72333); ?> (fwrite() on non-blocking SSL sockets doesn't work).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(71003); ?> (Expose MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT to PDO interface).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74058); ?> (ArrayObject can not notice changes).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(74217); ?> (Allow creation of deterministic sqlite functions).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74216); ?> (Correctly fail on invalid IP address ports).</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(74240); ?> (deflate_add can allocate too much memory).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.3"><!-- {{{ 7.1.3 -->
<h3>Version 7.1.3</h3>
<b><?php release_date('16-Mar-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74157); ?> (Segfault with nested generators).</li>
  <li><?php bugfix(74164); ?> (PHP hangs when an invalid value is dynamically passed to typehinted by-ref arg).</li>
  <li><?php bugfix(74093); ?> (Maximum execution time of n+2 seconds exceed not written in error_log).</li>
  <li><?php bugfix(73989); ?> (PHP 7.1 Segfaults within Symfony test suite).</li>
  <li><?php bugfix(74084); ?> (Out of bound read - zend_mm_alloc_small).</li>
  <li><?php bugfix(73807); ?> (Performance problem with processing large post request). (CVE-2017-11142)</li>
  <li><?php bugfix(73998); ?> (array_key_exists fails on arrays created by get_object_vars).</li>
  <li><?php bugfix(73954); ?> (NAN check fails on Alpine Linux with musl).</li>
  <li><?php bugfix(73677); ?> (Generating phar.phar core dump with gcc ASAN enabled build).</li>
</ul></li>
<li>Apache:
<ul>
  <li><?php bugfix(61471); ?> (Incomplete POST does not timeout but is passed to PHP).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(73837); ?> ("new DateTime()" sometimes returns 1 second ago value).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(69860); ?> (php-fpm process accounting is broken with keepalive).</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(73127); ?> (gost-crypto hash incorrect if input data contains long 0xFF sequence).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74031); ?> (ReflectionFunction for imagepng is missing last two parameters).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(74021); ?> (fetch_array broken data. Data more then MEDIUMBLOB).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74019); ?> (Segfault with list).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74022); ?> (PHP Fast CGI crashes when reading from a pfx file).</li>
  <li><?php bugfix(74099); ?> (Memory leak with openssl_encrypt()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74005); ?> (mail.add_x_header causes RFC-breaking lone line feed).</li>
  <li><?php bugfix(74041); ?> (substr_count with length=0 broken).</li>
  <li><?php bugfix(73118); ?> (is_callable callable name reports misleading value for anonymous classes).</li>
  <li><?php bugfix(74105); ?> (PHP on Linux should use /dev/urandom when getrandom is not available).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(73496); ?> (Invalid memory access in zend_inline_hash_func).</li>
  <li><?php bugfix(74090); ?> (stream_get_contents maxlength&gt;-1 returns empty string).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.2"><!-- {{{ 7.1.2 -->
<h3>Version 7.1.2</h3>
<b><?php release_date('16-Feb-2017'); ?></b>
<ul><li>Core:
<ul>
  <li>Improved GENERATOR_CREATE opcode handler.</li>
  <li><?php bugfix(73877); ?> (readlink() returns garbage for UTF-8 paths).</li>
  <li><?php bugfix(73876); ?> (Crash when exporting **= in expansion of assign op).</li>
  <li><?php bugfix(73962); ?> (bug with symlink related to cyrillic directory).</li>
  <li><?php bugfix(73969); ?> (segfault in debug_print_backtrace).</li>
  <li><?php bugfix(73994); ?> (arginfo incorrect for unpack).</li>
  <li><?php bugfix(73973); ?> (assertion error in debug_zval_dump).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(54382); ?> (getAttributeNodeNS doesn't get xmlns* attributes).</li>
</ul></li>
<li>DTrace:
<ul>
  <li><?php bugfix(73965); ?> (DTrace reported as enabled when disabled).</li>
</ul></li>
<li>FCGI:
<ul>
  <li><?php bugfix(73904); ?> (php-cgi fails to load -c specified php.ini file).</li>
  <li><?php bugfix(72898); ?> (PHP_FCGI_CHILDREN is not included in phpinfo()).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(69865); ?> (php-fpm does not close stderr when using syslog).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73968); ?> (Premature failing of XBM reading).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(69993); ?> (test for gmp.h needs to test machine includes).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Added hash_hkdf() function.</li>
  <li><?php bugfix(73961); ?> (environmental build dependency in hash sha3 source).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73956); ?> (Link use CC instead of CXX).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(73933); ?> (error/segfault with ldap_mod_replace and opcache).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(73949); ?> (leak in mysqli_fetch_object).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(69899); ?> (segfault on close() after free_result() with mysqlnd).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(73983); ?> (crash on finish work with phar in cli + opcache).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(71519); ?> (add serial hex to return value array).</li>
  <li><?php bugfix(73692); ?> (Compile ext/openssl with openssl 1.1.0 on Win).</li>
  <li><?php bugfix(73978); ?> (openssl_decrypt triggers bug in PDO).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php implemented(72583); ?> (All data are fetched as strings).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(73959); ?> (lastInsertId fails to throw an exception for wrong sequence name).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(70417); ?> (PharData::compress() doesn't close temp file).</li>
</ul></li>
<li>posix:
<ul>
  <li><?php bugfix(71219); ?> (configure script incorrectly checks for ttyname_r).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(69582); ?> (session not readable by root in CLI).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73896); ?> (spl_autoload() crashes when calls magic _call()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69442); ?> (closing of fd incorrect when PTS enabled).</li>
  <li><?php bugfix(47021); ?> (SoapClient stumbles over WSDL delivered with "Transfer-Encoding: chunked").</li>
  <li><?php bugfix(72974); ?> (imap is undefined service on AIX).</li>
  <li><?php bugfix(72979); ?> (money_format stores wrong length AIX).</li>
  <li><?php bugfix(73374); ?> (intval() with base 0 should detect binary).</li>
  <li><?php bugfix(69061); ?> (mail.log = syslog contains double information).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(70103); ?> (ZipArchive::addGlob ignores remove_all_path option).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.1"><!-- {{{ 7.1.1 -->
<h3>Version 7.1.1</h3>
<b><?php release_date('19-Jan-2017'); ?></b>
<ul>
	<li>
	Core
	<ul>
		<li><?php bugfix(73792); ?> (invalid foreach loop hangs script).</li>
		<li><?php bugfix(73686); ?> (Adding settype()ed values to ArrayObject results in references).</li>
		<li><?php bugfix(73663); ?> ("Invalid opcode 65/16/8" occurs with a variable created with list()).</li>
		<li><?php bugfix(73727); ?> (ZEND_MM_BITSET_LEN is "undefined symbol" in zend_bitset.h).</li>
		<li><?php bugfix(73753); ?> (unserialized array pointer not advancing).</li>
		<li><?php bugfix(73783); ?> (SIG_IGN doesn't work when Zend Signals is enabled).</li>
		<li><?php bugfix(73825); ?> (Heap out of bounds read on unserialize in finish_nested_data()). (CVE-2016-10161)</li>
		<li><?php bugfix(73831); ?> (NULL Pointer Dereference while unserialize php object). (CVE-2016-10162)</li>
		<li><?php bugfix(73832); ?> (Use of uninitialized memory in unserialize()). (CVE-2017-5340)</li>
		<li><?php bugfix(73092); ?> (Unserialize use-after-free when resizing object's properties hash table). (CVE-2016-7479)</li>
	</ul>
	</li>
	<li>
	CLI
	<ul>
		<li><?php bugfix(72555); ?> (CLI output(japanese) on Windows).</li>
	</ul>
	</li>
	<li>
	COM
	<ul>
		<li><?php bugfix(73679); ?> (DOTNET read access violation using invalid codepage).</li>
	</ul>
	</li>
	<li>
	DOM
	<ul>
		<li><?php bugfix(67474); ?> (getElementsByTagNameNS filter on default ns).</li>
	</ul>
	</li>
	<li>
	EXIF
	<ul>
		<li><?php bugfix(73737); ?> (FPE when parsing a tag format). (CVE-2016-10158)</li>
	</ul>
	</li>
	<li>
	GD
	<ul>
		<li><?php bugfix(73869); ?> (Signed Integer Overflow gd_io.c). (CVE-2016-10168)</li>
		<li><?php bugfix(73868); ?> (DOS vulnerability in gdImageCreateFromGd2Ctx()). (CVE-2016-10167)</li>
	</ul>
	</li>
	<li>
	mbstring
	<ul>
		<li><?php bugfix(73646); ?> (mb_ereg_search_init null pointer dereference).</li>
	</ul>
	</li>
	<li>
	MySQLi
	<ul>
		<li><?php bugfix(73462); ?> (Persistent connections don't set $connect_errno).</li>
	</ul>
	</li>
	<li>
	mysqlnd
	<ul>
		<li>Optimized handling of BIT fields - less memory copies and lower memory usage.</li>
		<li><?php bugfix(73800); ?> (sporadic segfault with MYSQLI_OPT_INT_AND_FLOAT_NATIVE).</li>
	</ul>
	</li>
	<li>
	opcache
	<ul>
		<li><?php bugfix(73789); ?> (Strange behavior of class constants in switch/case block).</li>
		<li><?php bugfix(73746); ?> (Method that returns string returns UNKNOWN:0 instead).</li>
		<li><?php bugfix(73654); ?> (Segmentation fault in zend_call_function).</li>
		<li><?php bugfix(73668); ?> ("SIGFPE Arithmetic exception" in opcache when divide by minus 1).</li>
		<li><?php bugfix(73847); ?> (Recursion when a variable is redefined as array).</li>
	</ul>
	</li>
	<li>
	PDO Firebird
	<ul>
		<li><?php bugfix(72931); ?> (PDO_FIREBIRD with Firebird 3.0 not work on returning statement).</li>
	</ul>
	</li>
	<li>Phar:
	<ul>
		<li><?php bugfix(73773); ?> (Seg fault when loading hostile phar). (CVE-2017-11147)</li>
		<li><?php bugfix(73768); ?> (Memory corruption when loading hostile phar). (CVE-2016-10160)</li>
		<li><?php bugfix(73764); ?> (Crash while loading hostile phar archive). (CVE-2016-10159)</li>
	</ul></li>
	<li>
	phpdbg
	<ul>
		<li><?php bugfix(73794); ?> (Crash (out of memory) when using run and # command separator).</li>
		<li><?php bugfix(73704); ?> (phpdbg shows the wrong line in files with shebang).</li>
	</ul>
	</li>
	<li>
	SQLite3
	<ul>
		<li>Reverted fix for <?php bugfix(73530); ?> (Unsetting result set may reset other result set).</li>
	</ul>
	</li>
	<li>
	Standard
	<ul>
		<li><?php bugfix(73594); ?> (dns_get_record does not populate $additional out parameter).</li>
		<li><?php bugfix(70213); ?> (Unserialize context shared on double class lookup).</li>
		<li><?php bugfix(73154); ?> (serialize object with __sleep function crash).</li>
		<li><?php bugfix(70490); ?> (get_browser function is very slow).</li>
		<li><?php bugfix(73265); ?> (Loading browscap.ini at startup causes high memory usage).</li>
		<li>(add subject to mail log).</li>
		<li><?php bugfix(31875); ?> (get_defined_functions additional param to exclude disabled functions).</li>
	</ul>
	</li>
	<li>
	zlib
	<ul>
		<li><?php bugfix(73373); ?> (deflate_add does not verify that output was not truncated).</li>
	</ul>
	</li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.1.0"><!-- {{{ 7.1.0 -->
<h3>Version 7.1.0</h3>
<b><?php release_date('01-Dec-2016'); ?></b>
<ul><li>Core:
  <ul>
    <li>Added nullable types.</li>
    <li>Added DFA optimization framework based on e-SSA form.</li>
    <li>Added specialized opcode handlers (e.g. ZEND_ADD_LONG_NO_OVERFLOW).</li>
    <li>Added [] = as alternative construct to list() =.</li>
    <li>Added void return type.</li>
    <li>Added support for negative string offsets in string offset syntax and various string functions.</li>
    <li>Added a form of the list() construct where keys can be specified.</li>
    <li>Implemented safe execution timeout handling, that prevents random crashes after "Maximum execution time exceeded" error.</li>
    <li>Implemented the RFC `Support Class Constant Visibility`.</li>
    <li>Implemented the RFC `Catching multiple exception types`.</li>
    <li>Implemented logging to syslog with dynamic error levels.</li>
    <li><?php implemented(72614); ?> (Support "nmake test" on building extensions by phpize).</li>
    <li>Implemented RFC: Iterable.</li>
    <li>Implemented RFC: Closure::fromCallable (Danack)</li>
    <li>Implemented RFC: Replace "Missing argument" warning with "\ArgumentCountError" exception.</li>
    <li>Implemented RFC: Fix inconsistent behavior of $this variable.</li>
    <li><?php bugfix(73585); ?> (Logging of "Internal Zend error - Missing class information" missing class name).</li>
    <li>Fixed memory leak(null coalescing operator with Spl hash).</li>
    <li><?php bugfix(72736); ?> (Slow performance when fetching large dataset with mysqli / PDO).</li>
    <li><?php bugfix(72978); ?> (Use After Free Vulnerability in unserialize()). (CVE-2016-9936)</li>
    <li><?php bugfix(72482); ?> (Ilegal write/read access caused by gdImageAALine overflow).</li>
    <li><?php bugfix(72696); ?> (imagefilltoborder stackoverflow on truecolor images). (CVE-2016-9933)</li>
    <li><?php bugfix(73350); ?> (Exception::__toString() cause circular references).</li>
    <li><?php bugfix(73329); ?> ((Float)"Nano" == NAN).</li>
    <li><?php bugfix(73288); ?> (Segfault in __clone &gt; Exception.toString &gt; __get).</li>
    <li>Fixed for <?php bugl(73240); ?> (Write out of bounds at number_format).</li>
    <li>Fix pthreads detection when cross-compiling (ffontaine)</li>
    <li><?php bugfix(73337); ?> (try/catch not working with two exceptions inside a same operation).</li>
    <li><?php bugfix(73156); ?> (segfault on undefined function).</li>
    <li><?php bugfix(73163); ?> (PHP hangs if error handler throws while accessing undef const in default value).</li>
    <li><?php bugfix(73172); ?> (parse error: Invalid numeric literal).</li>
    <li><?php bugfix(73181); ?> (parse_str() without a second argument leads to crash).</li>
    <li><?php bugfix(73025); ?> (Heap Buffer Overflow in virtual_popen of zend_virtual_cwd.c).</li>
    <li><?php bugfix(73058); ?> (crypt broken when salt is 'too' long).</li>
    <li><?php bugfix(72944); ?> (Null pointer deref in zval_delref_p).</li>
    <li><?php bugfix(72943); ?> (assign_dim on string doesn't reset hval).</li>
    <li><?php bugfix(72598); ?> (Reference is lost after array_slice()).</li>
    <li><?php bugfix(72703); ?> (Out of bounds global memory read in BF_crypt triggered by password_verify).</li>
    <li><?php bugfix(72813); ?> (Segfault with __get returned by ref).</li>
    <li><?php bugfix(72767); ?> (PHP Segfaults when trying to expand an infinite operator).</li>
    <li>TypeError messages for arg_info type checks will now say "must be ... or null" where the parameter or return type accepts null.</li>
    <li><?php bugfix(72857); ?> (stream_socket_recvfrom read access violation).</li>
    <li><?php bugfix(72663); ?> (Create an Unexpected Object and Don't Invoke __wakeup() in Deserialization).</li>
    <li><?php bugfix(72681); ?> (PHP Session Data Injection Vulnerability).</li>
    <li><?php bugfix(72742); ?> (memory allocator fails to realloc small block to large one).</li>
    <li>Fixed URL rewriter. It would not rewrite '//example.com/' URL unconditionally. URL rewrite target hosts whitelist is implemented.</li>
    <li><?php bugfix(72641); ?> (phpize (on Windows) ignores PHP_PREFIX).</li>
    <li><?php bugfix(72683); ?> (getmxrr broken).</li>
    <li><?php bugfix(72629); ?> (Caught exception assignment to variables ignores references).</li>
    <li><?php bugfix(72594); ?> (Calling an earlier instance of an included anonymous class fatals).</li>
    <li><?php bugfix(72581); ?> (previous property undefined in Exception after deserialization).</li>
    <li><?php bugfix(72543); ?> (Different references behavior comparing to PHP 5).</li>
    <li><?php bugfix(72347); ?> (VERIFY_RETURN type casts visible in finally).</li>
    <li><?php bugfix(72216); ?> (Return by reference with finally is not memory safe).</li>
    <li><?php bugfix(72215); ?> (Wrong return value if var modified in finally).</li>
    <li><?php bugfix(71818); ?> (Memory leak when array altered in destructor).</li>
    <li><?php bugfix(71539); ?> (Memory error on $arr[$a] =&amp; $arr[$b] if RHS rehashes).</li>
    <li>Added new constant PHP_FD_SETSIZE.</li>
    <li>Added optind parameter to getopt().</li>
    <li>Added PHP to SAPI error severity mapping for logs.</li>
    <li><?php bugfix(71911); ?> (Unable to set --enable-debug on building extensions by phpize on Windows).</li>
    <li><?php bugfix(29368); ?> (The destructor is called when an exception is thrown from the constructor).</li>
    <li>Implemented RFC: RNG Fixes.</li>
    <li>Implemented email validation as per RFC 6531.</li>
    <li><?php bugfix(72513); ?> (Stack-based buffer overflow vulnerability in virtual_file_ex).</li>
    <li><?php bugfix(72573); ?> (HTTP_PROXY is improperly trusted by some PHP libraries and applications).</li>
    <li><?php bugfix(72523); ?> (dtrace issue with reflection (failed test)).</li>
    <li><?php bugfix(72508); ?> (strange references after recursive function call and "switch" statement).</li>
    <li><?php bugfix(72441); ?> (Segmentation fault: RFC list_keys).</li>
    <li><?php bugfix(72395); ?> (list() regression).</li>
    <li><?php bugfix(72373); ?> (TypeError after Generator function w/declared return type finishes).</li>
    <li><?php bugfix(69489); ?> (tempnam() should raise notice if falling back to temp dir).</li>
    <li>Fixed UTF-8 and long path support on Windows.</li>
    <li><?php bugfix(53432); ?> (Assignment via string index access on an empty string converts to array).</li>
    <li><?php bugfix(62210); ?> (Exceptions can leak temporary variables).</li>
    <li><?php bugfix(62814); ?> (It is possible to stiffen child class members visibility).</li>
    <li><?php bugfix(69989); ?> (Generators don't participate in cycle GC).</li>
    <li><?php bugfix(70228); ?> (Memleak if return in finally block).</li>
    <li><?php bugfix(71266); ?> (Missing separation of properties HT in foreach etc).</li>
    <li><?php bugfix(71604); ?> (Aborted Generators continue after nested finally).</li>
    <li><?php bugfix(71572); ?> (String offset assignment from an empty string inserts null byte).</li>
    <li><?php bugfix(71897); ?> (ASCII 0x7F Delete control character permitted in identifiers).</li>
    <li><?php bugfix(72188); ?> (Nested try/finally blocks losing return value).</li>
    <li><?php bugfix(72213); ?> (Finally leaks on nested exceptions).</li>
    <li><?php bugfix(47517); ?> (php-cgi.exe missing UAC manifest).</li>
    <li>Change statement and fcall extension handlers to accept frame.</li>
    <li>Number operators taking numeric strings now emit E_NOTICEs or E_WARNINGs when given malformed numeric strings.</li>
    <li>(int), intval() where $base is 10 or unspecified, settype(), decbin(), decoct(), dechex(), integer operators and other conversions now always respect scientific notation in numeric strings.</li>
    <li>Raise a compile-time warning on octal escape sequence overflow.</li>
  </ul></li>
<li>Apache2handler:
  <ul>
    <li>Enable per-module logging in Apache 2.4+.</li>
  </ul></li>
<li>BCmath:
  <ul>
    <li><?php bugfix(73190); ?> (memcpy negative parameter _bc_new_num_ex).</li>
  </ul></li>
<li>Bz2:
  <ul>
    <li><?php bugfix(72837); ?> (integer overflow in bzdecompress caused heap corruption).</li>
    <li><?php bugfix(72613); ?> (Inadequate error handling in bzread()).</li>
  </ul></li>
<li>Calendar:
  <ul>
    <li>Fix integer overflows (Joshua Rogers)</li>
    <li><?php bugfix(67976); ?> (cal_days_month() fails for final month of the French calendar).</li>
    <li><?php bugfix(71894); ?> (AddressSanitizer: global-buffer-overflow in zif_cal_from_jd).</li>
  </ul></li>
<li>CLI Server:
  <ul>
    <li><?php bugfix(73360); ?> (Unable to work in root with unicode chars).</li>
    <li><?php bugfix(71276); ?> (Built-in webserver does not send Date header).</li>
  </ul></li>
<li>COM:
  <ul>
    <li><?php bugfix(73126); ?> (Cannot pass parameter 1 by reference).</li>
    <li><?php bugfix(69579); ?> (Invalid free in extension trait).</li>
    <li><?php bugfix(72922); ?> (COM called from PHP does not return out parameters).</li>
    <li><?php bugfix(72569); ?> (DOTNET/COM array parameters broke in PHP7).</li>
    <li><?php bugfix(72498); ?> (variant_date_from_timestamp null dereference).</li>
  </ul></li>
<li>Curl:
  <ul>
    <li>Implement support for handling HTTP/2 Server Push.</li>
    <li>Add curl_multi_errno(), curl_share_errno() and curl_share_strerror() functions.</li>
    <li><?php bugfix(72674); ?> (Heap overflow in curl_escape).</li>
    <li><?php bugfix(72541); ?> (size_t overflow lead to heap corruption). (Stas).</li>
    <li><?php bugfix(71709); ?> (curl_setopt segfault with empty CURLOPT_HTTPHEADER).</li>
    <li><?php bugfix(71929); ?> (CURLINFO_CERTINFO data parsing error).</li>
  </ul></li>
<li>Date:
  <ul>
    <li><?php bugfix(69587); ?> (DateInterval properties and isset).</li>
    <li><?php bugfix(73426); ?> (createFromFormat with 'z' format char results in incorrect time).</li>
    <li><?php bugfix(45554); ?> (Inconsistent behavior of the u format char).</li>
    <li><?php bugfix(48225); ?> (DateTime parser doesn't set microseconds for "now").</li>
    <li><?php bugfix(52514); ?> (microseconds are missing in DateTime class).</li>
    <li><?php bugfix(52519); ?> (microseconds in DateInterval are missing).</li>
    <li><?php bugfix(60089); ?> (DateTime::createFromFormat() U after u nukes microtime).</li>
    <li><?php bugfix(64887); ?> (Allow DateTime modification with subsecond items).</li>
    <li><?php bugfix(68506); ?> (General DateTime improvments needed for microseconds to become useful).</li>
    <li><?php bugfix(73109); ?> (timelib_meridian doesn't parse dots correctly).</li>
    <li><?php bugfix(73247); ?> (DateTime constructor does not initialise microseconds property).</li>
    <li><?php bugfix(73147); ?> (Use After Free in PHP7 unserialize()).</li>
    <li><?php bugfix(73189); ?> (Memcpy negative size parameter php_resolve_path).</li>
    <li><?php bugfix(66836); ?> (DateTime::createFromFormat 'U' with pre 1970 dates fails parsing).</li>
    <li>Invalid serialization data for a DateTime or DatePeriod object will now throw an instance of Error from __wakeup() or __set_state() instead of resulting in a fatal error.</li>
    <li>Timezone initialization failure from serialized data will now throw an instance of Error from __wakeup() or __set_state() instead of resulting in a fatal error.</li>
    <li>Export date_get_interface_ce() for extension use.</li>
    <li><?php bugfix(63740); ?> (strtotime seems to use both sunday and monday as start of week).</li>
  </ul></li>
<li>Dba:
  <ul>
    <li><?php bugfix(70825); ?> (Cannot fetch multiple values with group in ini file).</li>
    <li>Data modification functions (e.g.: dba_insert()) now throw an instance of Error instead of triggering a catchable fatal error if the key is does not contain exactly two elements.</li>
  </ul></li>
<li>DOM:
  <ul>
    <li><?php bugfix(73150); ?> (missing NULL check in dom_document_save_html).</li>
    <li><?php bugfix(66502); ?> (DOM document dangling reference).</li>
    <li>Invalid schema or RelaxNG validation contexts will throw an instance of Error instead of resulting in a fatal error.</li>
    <li>Attempting to register a node class that does not extend the appropriate base class will now throw an instance of Error instead of resulting in a fatal error.</li>
    <li>Attempting to read an invalid or write to a readonly property will throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>DTrace:
  <ul>
    <li>Disabled PHP call tracing by default (it makes significant overhead). This may be enabled again using envirionment variable USE_ZEND_DTRACE=1.</li>
  </ul></li>
<li>EXIF:
  <ul>
    <li><?php bugfix(72735); ?> (Samsung picture thumb not read (zero size)).</li>
    <li><?php bugfix(72627); ?> (Memory Leakage In exif_process_IFD_in_TIFF).</li>
    <li><?php bugfix(72603); ?> (Out of bound read in exif_process_IFD_in_MAKERNOTE).</li>
    <li><?php bugfix(72618); ?> (NULL Pointer Dereference in exif_process_user_comment).</li>
  </ul></li>
<li>Filter:
  <ul>
    <li><?php bugfix(72972); ?> (Bad filter for the flags FILTER_FLAG_NO_RES_RANGE and FILTER_FLAG_NO_PRIV_RANGE).</li>
    <li><?php bugfix(73054); ?> (default option ignored when object passed to int filter).</li>
    <li><?php bugfix(71745); ?> (FILTER_FLAG_NO_RES_RANGE does not cover whole 127.0.0.0/8 range).</li>
  </ul></li>
<li>FPM:
  <ul>
    <li><?php bugfix(72575); ?> (using --allow-to-run-as-root should ignore missing user).</li>
  </ul></li>
<li>FTP:
  <ul>
    <li><?php bugfix(70195); ?> (Cannot upload file using ftp_put to FTPES with require_ssl_reuse).</li>
    <li><?php implemented(55651); ?> (Option to ignore the returned FTP PASV address).</li>
  </ul></li>
<li>GD:
  <ul>
    <li><?php bugfix(73213); ?> (Integer overflow in imageline() with antialiasing).</li>
    <li><?php bugfix(73272); ?> (imagescale() is not affected by, but affects imagesetinterpolation()).</li>
    <li><?php bugfix(73279); ?> (Integer overflow in gdImageScaleBilinearPalette()).</li>
    <li><?php bugfix(73280); ?> (Stack Buffer Overflow in GD dynamicGetbuf).</li>
    <li><?php bugfix(50194); ?> (imagettftext broken on transparent background w/o alphablending).</li>
    <li><?php bugfix(73003); ?> (Integer Overflow in gdImageWebpCtx of gd_webp.c).</li>
    <li><?php bugfix(53504); ?> (imagettfbbox gives incorrect values for bounding box).</li>
    <li><?php bugfix(73157); ?> (imagegd2() ignores 3rd param if 4 are given).</li>
    <li><?php bugfix(73155); ?> (imagegd2() writes wrong chunk sizes on boundaries).</li>
    <li><?php bugfix(73159); ?> (imagegd2(): unrecognized formats may result in corrupted files).</li>
    <li><?php bugfix(73161); ?> (imagecreatefromgd2() may leak memory).</li>
    <li><?php bugfix(67325); ?> (imagetruecolortopalette: white is duplicated in palette).</li>
    <li><?php bugfix(66005); ?> (imagecopy does not support 1bit transparency on truecolor images).</li>
    <li><?php bugfix(72913); ?> (imagecopy() loses single-color transparency on palette images).</li>
    <li><?php bugfix(68716); ?> (possible resource leaks in _php_image_convert()).</li>
    <li><?php bugfix(72709); ?> (imagesetstyle() causes OOB read for empty $styles).</li>
    <li><?php bugfix(72697); ?> (select_colors write out-of-bounds).</li>
    <li><?php bugfix(72730); ?> (imagegammacorrect allows arbitrary write access).</li>
    <li><?php bugfix(72596); ?> (imagetypes function won't advertise WEBP support).</li>
    <li><?php bugfix(72604); ?> (imagearc() ignores thickness for full arcs).</li>
    <li><?php bugfix(70315); ?> (500 Server Error but page is fully rendered).</li>
    <li><?php bugfix(43828); ?> (broken transparency of imagearc for truecolor in blendingmode).</li>
    <li><?php bugfix(72512); ?> (gdImageTrueColorToPaletteBody allows arbitrary write/read access).</li>
    <li><?php bugfix(72519); ?> (imagegif/output out-of-bounds access).</li>
    <li><?php bugfix(72558); ?> (Integer overflow error within _gdContributionsAlloc()).</li>
    <li><?php bugfix(72482); ?> (Ilegal write/read access caused by gdImageAALine overflow).</li>
    <li><?php bugfix(72494); ?> (imagecropauto out-of-bounds access).</li>
    <li><?php bugfix(72404); ?> (imagecreatefromjpeg fails on selfie).</li>
    <li><?php bugfix(43475); ?> (Thick styled lines have scrambled patterns).</li>
    <li><?php bugfix(53640); ?> (XBM images require width to be multiple of 8).</li>
    <li><?php bugfix(64641); ?> (imagefilledpolygon doesn't draw horizontal line).</li>
  </ul></li>
<li>Hash:
  <ul>
    <li>Added SHA3 fixed mode algorithms (224, 256, 384, and 512 bit).</li>
    <li>Added SHA512/256 and SHA512/224 algorithms.</li>
  </ul></li>
<li>iconv:
  <ul>
    <li><?php bugfix(72320); ?> (iconv_substr returns false for empty strings).</li>
  </ul></li>
<li>IMAP:
  <ul>
    <li><?php bugfix(73418); ?> (Integer Overflow in "_php_imap_mail" leads to crash).</li>
    <li>An email address longer than 16385 bytes will throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>Interbase:
  <ul>
    <li><?php bugfix(73512); ?> (Fails to find firebird headers as don't use fb_config output).</li>
  </ul></li>
<li>Intl:
  <ul>
    <li><?php bugfix(73007); ?> (add locale length check).</li>
    <li><?php bugfix(73218); ?> (add mitigation for ICU int overflow).</li>
    <li><?php bugfix(65732); ?> (grapheme_*() is not Unicode compliant on CR LF sequence).</li>
    <li><?php bugfix(73007); ?> (add locale length check).</li>
    <li><?php bugfix(72639); ?> (Segfault when instantiating class that extends IntlCalendar and adds a property).</li>
    <li><?php bugfix(72658); ?> (Locale::lookup() / locale_lookup() hangs if no match found).</li>
    <li>Partially fixed <?php bugl(72506); ?> (idn_to_ascii for UTS #46 incorrect for long domain names).</li>
    <li><?php bugfix(72533); ?> (locale_accept_from_http out-of-bounds access).</li>
    <li>Failure to call the parent constructor in a class extending Collator before invoking the parent methods will throw an instance of Error instead of resulting in a recoverable fatal error.</li>
    <li>Cloning a Transliterator object may will now throw an instance of Error instead of resulting in a fatal error if cloning the internal transliterator fails.</li>
    <li>Added IntlTimeZone::getWindowsID() and IntlTimeZone::getIDForWindowsID().</li>
    <li><?php bugfix(69374); ?> (IntlDateFormatter formatObject returns wrong utf8 value).</li>
    <li><?php bugfix(69398); ?> (IntlDateFormatter formatObject returns wrong value when time style is NONE).</li>
  </ul></li>
<li>JSON:
  <ul>
    <li>Introduced encoder struct instead of global which fixes bugs <?php bugl(66025); ?> and <?php bugl(73254); ?> related to pretty print indentation.</li>
    <li><?php bugfix(73113); ?> (Segfault with throwing JsonSerializable).</li>
    <li>Implemented earlier return when json_encode fails, fixes bugs <?php bugl(68992); ?> (Stacking exceptions thrown by JsonSerializable) and <?php bugl(70275); ?> (On recursion error, json_encode can eat up all system memory).</li>
    <li><?php implemented(46600); ?> ("_empty_" key in objects).</li>
    <li>Exported JSON parser API including json_parser_method that can be used for implementing custom logic when parsing JSON.</li>
    <li>Escaped U+2028 and U+2029 when JSON_UNESCAPED_UNICODE is supplied as json_encode options and added JSON_UNESCAPED_LINE_TERMINATORS to restore the previous behaviour.</li>
  </ul></li>
<li>LDAP:
  <ul>
    <li>Providing an unknown modification type to ldap_batch_modify() will now throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>Mbstring:
  <ul>
    <li><?php bugfix(73532); ?> (Null pointer dereference in mb_eregi).</li>
    <li><?php bugfix(66964); ?> (mb_convert_variables() cannot detect recursion).</li>
    <li><?php bugfix(72992); ?> (mbstring.internal_encoding doesn't inherit default_charset).</li>
    <li><?php bugfix(66797); ?> (mb_substr only takes 32-bit signed integer).</li>
    <li><?php bugfix(72711); ?> (`mb_ereg` does not clear the `$regs` parameter on failure).</li>
    <li><?php bugfix(72691); ?> (mb_ereg_search raises a warning if a match zero-width).</li>
    <li><?php bugfix(72693); ?> (mb_ereg_search increments search position when a match zero-width).</li>
    <li><?php bugfix(72694); ?> (mb_ereg_search_setpos does not accept a string's last position).</li>
    <li><?php bugfix(72710); ?> (`mb_ereg` causes buffer overflow on regexp compile error).</li>
    <li>Deprecated mb_ereg_replace() eval option.</li>
    <li><?php bugfix(69151); ?> (mb_ereg should reject ill-formed byte sequence).</li>
    <li><?php bugfix(72405); ?> (mb_ereg_replace - mbc_to_code (oniguruma) - oob read access).</li>
    <li><?php bugfix(72399); ?> (Use-After-Free in MBString (search_re)).</li>
    <li>mb_ereg() and mb_eregi() will now throw an instance of ParseError if an invalid PHP expression is provided and the 'e' option is used.</li>
  </ul></li>
<li>Mcrypt:
  <ul>
    <li>Deprecated ext/mcrypt.</li>
    <li><?php bugfix(72782); ?> (Heap Overflow due to integer overflows).</li>
    <li><?php bugfix(72551); ?>, bug <?php bugl(72552); ?> (In correct casting from size_t to int lead to heap overflow in mdecrypt_generic).</li>
    <li>mcrypt_encrypt() and mcrypt_decrypt() will throw an instance of Error instead of resulting in a fatal error if mcrypt cannot be initialized.</li>
  </ul></li>
<li>Mysqli:
  <ul>
    <li>Attempting to read an invalid or write to a readonly property will throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>Mysqlnd:
  <ul>
    <li><?php bugfix(64526); ?> (Add missing mysqlnd.* parameters to php.ini-*).</li>
    <li><?php bugfix(71863); ?> (Segfault when EXPLAIN with "Unknown column" error when using MariaDB).</li>
    <li><?php bugfix(72701); ?> (mysqli_get_host_info() wrong output).</li>
  </ul></li>
<li>OCI8:
  <ul>
    <li><?php bugfix(71148); ?> (Bind reference overwritten on PHP 7).</li>
    <li>Fixed invalid handle error with Implicit Result Sets.</li>
    <li><?php bugfix(72524); ?> (Binding null values triggers ORA-24816 error).</li>
  </ul></li>
<li>ODBC:
  <ul>
    <li><?php bugfix(73448); ?> (odbc_errormsg returns trash, always 513 bytes).</li>
  </ul></li>
<li>Opcache:
  <ul>
    <li><?php bugfix(73583); ?> (Segfaults when conditionally declared class and function have the same name).</li>
    <li><?php bugfix(69090); ?> (check cached files permissions)</li>
    <li><?php bugfix(72982); ?> (Memory leak in zend_accel_blacklist_update_regexp() function).</li>
    <li><?php bugfix(72949); ?> (Typo in opcache error message).</li>
    <li><?php bugfix(72762); ?> (Infinite loop while parsing a file with opcache enabled).</li>
    <li><?php bugfix(72590); ?> (Opcache restart with kill_all_lockers does not work).</li>
  </ul></li>
<li>OpenSSL:
  <ul>
    <li><?php bugfix(73478); ?> (openssl_pkey_new() generates wrong pub/priv keys with Diffie Hellman).</li>
    <li><?php bugfix(73276); ?> (crash in openssl_random_pseudo_bytes function).</li>
    <li><?php bugfix(73072); ?> (Invalid path SNI_server_certs causes segfault).</li>
    <li><?php bugfix(72360); ?> (ext/openssl build failure with OpenSSL 1.1.0).</li>
    <li>Bumped a minimal version to 1.0.1.</li>
    <li>Dropped support for SSL2.</li>
    <li><?php implemented(61204); ?> (Add elliptic curve support for OpenSSL).</li>
    <li><?php implemented(67304); ?> (Added AEAD support [CCM and GCM modes] to openssl_encrypt and openssl_decrypt).</li>
    <li>Implemented error storing to the global queue and cleaning up the OpenSSL error queue (resolves bugs <?php bugl(68276); ?> and <?php bugl(69882); ?>).</li>
  </ul></li>
<li>Pcntl:
  <ul>
    <li>Implemented asynchronous signal handling without TICKS.</li>
    <li>Added pcntl_signal_get_handler() that returns the current signal handler for a particular signal. Addresses FR <?php bugl(72409); ?>.</li>
    <li>Add siginfo to pcntl_signal() handler args (Bishop Bettini, David Walker)</li>
  </ul></li>
<li>PCRE:
  <ul>
    <li><?php bugfix(73483); ?> (Segmentation fault on pcre_replace_callback).</li>
    <li><?php bugfix(73612); ?> (preg_*() may leak memory).</li>
    <li><?php bugfix(73392); ?> (A use-after-free in zend allocator management).</li>
    <li><?php bugfix(73121); ?> (Bundled PCRE doesn't compile because JIT isn't supported on s390).</li>
    <li><?php bugfix(72688); ?> (preg_match missing group names in matches).</li>
    <li>Downgraded to PCRE 8.38.</li>
    <li><?php bugfix(72476); ?> (Memleak in jit_stack).</li>
    <li><?php bugfix(72463); ?> (mail fails with invalid argument).</li>
    <li>Upgraded to PCRE 8.39.</li>
  </ul></li>
<li>PDO:
  <ul>
    <li><?php bugfix(72788); ?> (Invalid memory access when using persistent PDO connection).</li>
    <li><?php bugfix(72791); ?> (Memory leak in PDO persistent connection handling).</li>
    <li><?php bugfix(60665); ?> (call to empty() on NULL result using PDO::FETCH_LAZY returns false).</li>
  </ul></li>
<li>PDO_DBlib:
  <ul>
    <li><?php bugfix(72414); ?> (Never quote values as raw binary data).</li>
    <li>Allow \PDO::setAttribute() to set query timeouts.</li>
    <li>Handle SQLDECIMAL/SQLNUMERIC types, which are used by later TDS versions.</li>
    <li>Add common PDO test suite.</li>
    <li>Free error and message strings when cleaning up PDO instances.</li>
    <li><?php bugfix(67130); ?> (\PDOStatement::nextRowset() should succeed when all rows in current rowset haven't been fetched).</li>
    <li>Ignore potentially misleading dberr values.</li>
    <li>Implemented stringify 'uniqueidentifier' fields.</li>
  </ul></li>
<li>PDO_Firebird:
  <ul>
    <li><?php bugfix(73087); ?>, <?php bugl(61183) ?>, <?php bugl(71494) ?> (Memory corruption in bindParam).</li>
    <li><?php bugfix(60052); ?> (Integer returned as a 64bit integer on X86_64).</li>
  </ul></li>
<li>PDO_pgsql:
  <ul>
    <li><?php bugfix(70313); ?> (PDO statement fails to throw exception).</li>
    <li><?php bugfix(72570); ?> (Segmentation fault when binding parameters on a query without placeholders).</li>
    <li><?php implemented(72633); ?> (Postgres PDO lastInsertId() should work without specifying a sequence).</li>
  </ul></li>
<li>Phar:
  <ul>
    <li><?php bugfix(72928); ?> (Out of bound when verify signature of zip phar in phar_parse_zipfile).</li>
    <li><?php bugfix(73035); ?> (Out of bound when verify signature of tar phar in phar_parse_tarfile).</li>
  </ul></li>
<li>phpdbg:
  <ul>
    <li>Added generator command for inspection of currently alive generators.</li>
  </ul></li>
<li>Postgres:
  <ul>
    <li><?php bugfix(73498); ?> (Incorrect SQL generated for pg_copy_to()).</li>
    <li><?php implemented(31021); ?> (pg_last_notice() is needed to get all notice messages).</li>
    <li><?php implemented(48532); ?> (Allow pg_fetch_all() to index numerically).</li>
  </ul></li>
<li>Readline:
  <ul>
    <li><?php bugfix(72538); ?> (readline_redisplay crashes php).</li>
  </ul></li>
<li>Reflection:
  <ul>
    <li>Undo backwards compatiblity break in ReflectionType-&gt;__toString() and deprecate via documentation instead.</li>
    <li>Reverted prepending \ for class names.</li>
    <li><?php implemented(38992); ?> (invoke() and invokeArgs() static method calls should match). (cmb).</li>
    <li>Add ReflectionNamedType::getName(). This method should be used instead of ReflectionType::__toString()</li>
    <li>Prepend \ for class names and ? for nullable types returned from ReflectionType::__toString().</li>
    <li><?php bugfix(72661); ?> (ReflectionType::__toString crashes with iterable).</li>
    <li><?php bugfix(72222); ?> (ReflectionClass::export doesn't handle array constants).</li>
    <li>Failure to retrieve a reflection object or retrieve an object property will now throw an instance of Error instead of resulting in a fatal error.</li>
    <li><?php bugfix(72209); ?> (ReflectionProperty::getValue() doesn't fail if object doesn't match type).</li>
  </ul></li>
<li>Session:
  <ul>
    <li><?php bugfix(73273); ?> (session_unset() empties values from all variables in which is $_session stored).</li>
    <li><?php bugfix(73100); ?> (session_destroy null dereference in ps_files_path_create).</li>
    <li><?php bugfix(68015); ?> (Session does not report invalid uid for files save handler).</li>
    <li><?php bugfix(72940); ?> (SID always return "name=ID", even if session cookie exist).</li>
    <li>Implemented session_gc() (Yasuo) https://wiki.php.net/rfc/session-create-id</li>
    <li>Implemented session_create_id() (Yasuo) https://wiki.php.net/rfc/session-gc</li>
    <li>Implemented RFC: Session ID without hashing. (Yasuo) https://wiki.php.net/rfc/session-id-without-hashing</li>
    <li><?php bugfix(72531); ?> (ps_files_cleanup_dir Buffer overflow).</li>
    <li>Custom session handlers that do not return strings for session IDs will now throw an instance of Error instead of resulting in a fatal error when a function is called that must generate a session ID.</li>
    <li>An invalid setting for session.hash_function will throw an instance of Error instead of resulting in a fatal error when a session ID is created.</li>
    <li><?php bugfix(72562); ?> (Use After Free in unserialize() with Unexpected Session Deserialization).</li>
    <li>Improved fix for bug <?php bugl(68063); ?> (Empty session IDs do still start sessions).</li>
    <li><?php bugfix(71038); ?> (session_start() returns TRUE on failure). Session save handlers must return 'string' always for successful read. i.e. Non-existing session read must return empty string. PHP 7.0 is made not to tolerate buggy return value.</li>
    <li><?php bugfix(71394); ?> (session_regenerate_id() must close opened session on errors).</li>
  </ul></li>
<li>SimpleXML:
  <ul>
    <li><?php bugfix(73293); ?> (NULL pointer dereference in SimpleXMLElement::asXML()).</li>
    <li><?php bugfix(72971); ?> (SimpleXML isset/unset do not respect namespace).</li>
    <li><?php bugfix(72957); ?> (Null coalescing operator doesn't behave as expected with SimpleXMLElement).</li>
    <li><?php bugfix(72588); ?> (Using global var doesn't work while accessing SimpleXML element).</li>
    <li>Creating an unnamed or duplicate attribute will throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>SNMP:
  <ul>
    <li><?php bugfix(72708); ?> (php_snmp_parse_oid integer overflow in memory allocation).</li>
    <li><?php bugfix(72479); ?> (Use After Free Vulnerability in SNMP with GC and unserialize()).</li>
  </ul></li>
<li>Soap:
  <ul>
    <li><?php bugfix(73538); ?> (SoapClient::__setSoapHeaders doesn't overwrite SOAP headers).</li>
    <li><?php bugfix(73452); ?> (Segfault (Regression for <?php bugl(69152); ?>)).</li>
    <li><?php bugfix(73037); ?> (SoapServer reports Bad Request when gzipped).</li>
    <li><?php bugfix(73237); ?> (Nested object in "any" element overwrites other fields).</li>
    <li><?php bugfix(69137); ?> (Peer verification fails when using a proxy with SoapClient).</li>
    <li><?php bugfix(71711); ?> (Soap Server Member variables reference bug).</li>
    <li><?php bugfix(71996); ?> (Using references in arrays doesn't work like expected).</li>
  </ul></li>
<li>SPL:
  <ul>
    <li><?php bugfix(73423); ?> (Reproducible crash with GDB backtrace).</li>
    <li><?php bugfix(72888); ?> (Segfault on clone on splFileObject).</li>
    <li><?php bugfix(73029); ?> (Missing type check when unserializing SplArray).</li>
    <li><?php bugfix(72646); ?> (SplFileObject::getCsvControl does not return the escape character).</li>
    <li><?php bugfix(72684); ?> (AppendIterator segfault with closed generator).</li>
    <li>Attempting to clone an SplDirectory object will throw an instance of Error instead of resulting in a fatal error.</li>
    <li>Calling ArrayIterator::append() when iterating over an object will throw an instance of Error instead of resulting in a fatal error.</li>
    <li><?php bugfix(55701); ?> (GlobIterator throws LogicException).</li>
  </ul></li>
<li>SQLite3:
  <ul>
    <li>Update to SQLite 3.15.1.</li>
    <li><?php bugfix(73530); ?> (Unsetting result set may reset other result set).</li>
    <li><?php bugfix(73333); ?> (2147483647 is fetched as string).</li>
    <li><?php bugfix(72668); ?> (Spurious warning when exception is thrown in user defined function).</li>
    <li><?php implemented(72653); ?> (SQLite should allow opening with empty filename).</li>
    <li><?php bugfix(70628); ?> (Clearing bindings on an SQLite3 statement doesn't work).</li>
    <li><?php implemented(71159); ?> (Upgraded bundled SQLite lib to 3.9.2).</li>
  </ul></li>
<li>Standard:
  <ul>
    <li><?php bugfix(73297); ?> (HTTP stream wrapper should ignore HTTP 100 Continue).</li>
    <li><?php bugfix(73303); ?> (Scope not inherited by eval in assert()).</li>
    <li><?php bugfix(73192); ?> (parse_url return wrong hostname).</li>
    <li><?php bugfix(73203); ?> (passing additional_parameters causes mail to fail).</li>
    <li><?php bugfix(73203); ?> (passing additional_parameters causes mail to fail).</li>
    <li><?php bugfix(72920); ?> (Accessing a private constant using constant() creates an exception AND warning).</li>
    <li><?php bugfix(65550); ?> (get_browser() incorrectly parses entries with "+" sign).</li>
    <li><?php bugfix(71882); ?> (Negative ftruncate() on php://memory exhausts memory).</li>
    <li><?php bugfix(55451); ?> (substr_compare NULL length interpreted as 0).</li>
    <li><?php bugfix(72278); ?> (getimagesize returning FALSE on valid jpg).</li>
    <li><?php bugfix(61967); ?> (unset array item in array_walk_recursive cause inconsistent array).</li>
    <li><?php bugfix(62607); ?> (array_walk_recursive move internal pointer).</li>
    <li><?php bugfix(69068); ?> (Exchanging array during array_walk -&gt; memory errors).</li>
    <li><?php bugfix(70713); ?> (Use After Free Vulnerability in array_walk()/ array_walk_recursive()).</li>
    <li><?php bugfix(72622); ?> (array_walk + array_replace_recursive create references from nothing).</li>
    <li><?php bugfix(72330); ?> (CSV fields incorrectly split if escape char followed by UTF chars).</li>
    <li>Implemented RFC: More precise float values.</li>
    <li>array_multisort now uses zend_sort instead zend_qsort.</li>
    <li><?php bugfix(72505); ?> (readfile() mangles files larger than 2G).</li>
    <li>assert() will throw a ParseError when evaluating a string given as the first argument if the PHP code is invalid instead of resulting in a catchable fatal error.</li>
    <li>Calling forward_static_call() outside of a class scope will now throw an instance of Error instead of resulting in a fatal error.</li>
    <li>Added is_iterable() function.</li>
    <li><?php bugfix(72306); ?> (Heap overflow through proc_open and $env parameter).</li>
    <li><?php bugfix(71100); ?> (long2ip() doesn't accept integers in strict mode).</li>
    <li><?php implemented(55716); ?> (Add an option to pass a custom stream context to get_headers()).</li>
    <li>Additional validation for parse_url() for login/pass components).</li>
    <li><?php implemented(69359); ?> (Provide a way to fetch the current environment variables).</li>
    <li>unpack() function accepts an additional optional argument $offset.</li>
    <li><?php implemented(51879); ?> stream context socket option tcp_nodelay (Joe)</li>
  </ul></li>
<li>Streams:
  <ul>
    <li><?php bugfix(73586); ?> (php_user_filter::$stream is not set to the stream the filter is working on).</li>
    <li><?php bugfix(72853); ?> (stream_set_blocking doesn't work).</li>
    <li><?php bugfix(72743); ?> (Out-of-bound read in php_stream_filter_create).</li>
    <li><?php implemented(27814); ?> (Multiple small packets send for HTTP request).</li>
    <li><?php bugfix(72764); ?> (ftps:// opendir wrapper data channel encryption fails with IIS FTP 7.5, 8.5).</li>
    <li><?php bugfix(72810); ?> (Missing SKIP_ONLINE_TESTS checks).</li>
    <li><?php bugfix(41021); ?> (Problems with the ftps wrapper).</li>
    <li><?php bugfix(54431); ?> (opendir() does not work with ftps:// wrapper).</li>
    <li><?php bugfix(72667); ?> (opendir() with ftp:// attempts to open data stream for non-existent directories).</li>
    <li><?php bugfix(72771); ?> (ftps:// wrapper is vulnerable to protocol downgrade attack).</li>
    <li><?php bugfix(72534); ?> (stream_socket_get_name crashes).</li>
    <li><?php bugfix(72439); ?> (Stream socket with remote address leads to a segmentation fault).</li>
  </ul></li>
<li>sysvshm:
  <ul>
    <li><?php bugfix(72858); ?> (shm_attach null dereference).</li>
  </ul></li>
<li>Tidy:
  <ul>
    <li>Implemented support for libtidy 5.0.0 and above.</li>
    <li>Creating a tidyNode manually will now throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>Wddx:
  <ul>
    <li><?php bugfix(73331); ?> (NULL Pointer Dereference in WDDX Packet Deserialization with PDORow). (CVE-2016-9934)</li>
    <li><?php bugfix(72142); ?> (WDDX Packet Injection Vulnerability in wddx_serialize_value()).</li>
    <li><?php bugfix(72749); ?> (wddx_deserialize allows illegal memory access).</li>
    <li><?php bugfix(72750); ?> (wddx_deserialize null dereference).</li>
    <li><?php bugfix(72790); ?> (wddx_deserialize null dereference with invalid xml).</li>
    <li><?php bugfix(72799); ?> (wddx_deserialize null dereference in php_wddx_pop_element).</li>
    <li><?php bugfix(72860); ?> (wddx_deserialize use-after-free).</li>
    <li><?php bugfix(73065); ?> (Out-Of-Bounds Read in php_wddx_push_element).</li>
    <li><?php bugfix(72564); ?> (boolean always deserialized as "true").</li>
    <li>A circular reference when serializing will now throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>XML:
  <ul>
    <li><?php bugfix(72135); ?> (malformed XML causes fault).</li>
    <li><?php bugfix(72714); ?> (_xml_startElementHandler() segmentation fault).</li>
    <li><?php bugfix(72085); ?> (SEGV on unknown address zif_xml_parse).</li>
  </ul></li>
<li>XMLRPC:
  <ul>
    <li><?php bugfix(72647); ?> (xmlrpc_encode() unexpected output after referencing array elements).</li>
    <li><?php bugfix(72606); ?> (heap-buffer-overflow (write) simplestring_addn simplestring.c).</li>
    <li>A circular reference when serializing will now throw an instance of Error instead of resulting in a fatal error.</li>
  </ul></li>
<li>Zip:
  <ul>
    <li><?php bugfix(68302); ?> (impossible to compile php with zip support).</li>
    <li><?php bugfix(72660); ?> (NULL Pointer dereference in zend_virtual_cwd).</li>
    <li><?php bugfix(72520); ?> (Stack-based buffer overflow vulnerability in php_stream_zip_opener).</li>
    <li>ZipArchive::addGlob() will throw an instance of Error instead of resulting in a fatal error if glob support is not available.</li>
  </ul></li>
</ul>
<!-- }}} --></section>

<a id="PHP_7_0"></a>
<section class="version" id="7.0.33"><!-- {{{ 7.0.33 -->
<h3>Version 7.0.33</h3>
<b><?php release_date('06-Dec-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77231); ?> (Segfault when using convert.quoted-printable-encode filter).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77020); ?> (null pointer dereference in imap_mail).</li>
  <li><?php bugfix(77153); ?> (imap_open allows to run arbitrary shell commands via mailbox parameter). (CVE-2018-19518)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77022); ?> (PharData always creates new files with mode 0666).</li>
  <li><?php bugfix(77143); ?> (Heap Buffer Overflow (READ: 4) in phar_parse_pharfile). (CVE-2018-20783)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.0.32"><!-- {{{ 7.0.32 -->
<h3>Version 7.0.32</h3>
<b><?php release_date('13-Sep-2018'); ?></b>
<ul><li>Apache2:
<ul>
  <li><?php bugfix(76582); ?> (XSS due to the header Transfer-Encoding: chunked). (CVE-2018-17082)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.31"><!-- {{{ 7.0.31 -->
<h3>Version 7.0.31</h3>
<b><?php release_date('19-Jul-2018'); ?></b>
<ul><li>Exif:
<ul>
  <li><?php bugfix(76423); ?> (Int Overflow lead to Heap OverFlow in exif_thumbnail_extract of exif.c). (CVE-2018-14883)</li>
  <li><?php bugfix(76557); ?> (heap-buffer-overflow (READ of size 48) while reading exif data). (CVE-2018-14851)</li>
</ul></li>
<li>Win32:
<ul>
  <li><?php bugfix(76459); ?> (windows linkinfo lacks openbasedir check). (CVE-2018-15132)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.0.30"><!-- {{{ 7.0.30 -->
<h3>Version 7.0.30</h3>
<b><?php release_date('26-Apr-2018'); ?></b>
<ul><li>Exif:
<ul>
  <li><?php bugfix(76130); ?> (Heap Buffer Overflow (READ: 1786) in exif_iif_add_value). (CVE-2018-10549)</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(76249); ?> (stream filter convert.iconv leads to infinite loop on invalid sequence). (CVE-2018-10546)</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(76248); ?> (Malicious LDAP-Server Response causes Crash). (CVE-2018-10548)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76129); ?> (fix for CVE-2018-5712 may not be complete). (CVE-2018-10547)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.29"><!-- {{{ 7.0.29 -->
<h3>Version 7.0.29</h3>
<b><?php release_date('29-Mar-2018'); ?></b>
<ul><li>FPM:
<ul>
  <li><?php bugfix(75605); ?> (Dumpable FPM child processes allow bypassing opcache access controls). (CVE-2018-10545)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.0.28"><!-- {{{ 7.0.28 -->
<h3>Version 7.0.28</h3>
<b><?php release_date('01-Mar-2018'); ?></b>
<ul><li>Standard:
<ul>
  <li><?php bugfix(75981); ?> (stack-buffer-overflow while parsing HTTP response). (CVE-2018-7584)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.27"><!-- {{{ 7.0.27 -->
<h3>Version 7.0.27</h3>
<b><?php release_date('04-Jan-2018'); ?></b>
<ul><li>CLI Server:
<ul>
  <li><?php bugfix(60471); ?> (Random "Invalid request (unexpected EOF)" using a router script).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(75384); ?> (PHP seems incompatible with OneDrive files on demand).</li>
  <li><?php bugfix(75573); ?> (Segmentation fault in 7.1.12 and 7.0.26).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(64938); ?> (libxml_disable_entity_loader setting is shared between requests).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(75571); ?> (Potential infinite loop in gdImageCreateFromGifCtx). (CVE-2018-5711)</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75579); ?> (Interned strings buffer overflow may cause crash).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74183); ?> (preg_last_error not returning error code after error).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(74782); ?> (Reflected XSS in .phar 404 page). (CVE-2018-5712)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75535); ?> (Inappropriately parsing HTTP response leads to PHP segment fault). (CVE-2018-14884)</li>
  <li><?php bugfix(75409); ?> (accept EFAULT in addition to ENOSYS as indicator that getrandom() is missing).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(75540); ?> (Segfault with libzip 1.3.1).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.0.26"><!-- {{{ 7.0.26 -->
<h3>Version 7.0.26</h3>
<b><?php release_date('23-Nov-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75420); ?> (Crash when modifing property name in __isset for BP_VAR_IS).</li>
  <li><?php bugfix(75368); ?> (mmap/munmap trashing on unlucky allocations).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(75287); ?> (Builtin webserver crash after chdir in a shutdown function).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(53070); ?> (enchant_broker_get_path crashes if no path is set).</li>
  <li><?php bugfix(75365); ?> (Enchant still reports version 1.1.0).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(75301); ?> (Exif extension has built in revision version).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(65148); ?> (imagerotate may alter image dimensions).</li>
  <li><?php bugfix(75437); ?> (Wrong reflection on imagewebp).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(75317); ?> (UConverter::setDestinationEncoding changes source instead of destination).</li>
</ul></li>
<li>interbase:
<ul>
  <li><?php bugfix(75453); ?> (Incorrect reflection for ibase_[p]connect).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(75434); ?> (Wrong reflection for mysqli_fetch_all function).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed valgrind issue.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(75373); ?> (Warning Internal error: wrong size calculation).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(75363); ?> (openssl_x509_parse leaks memory).</li>
  <li><?php bugfix(75307); ?> (Wrong reflection for openssl_open function).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li><?php bugfix(75419); ?> (Default link incorrectly cleared/linked by pg_close()).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(75464); ?> (Wrong reflection on SoapClient::__setSoapHeaders).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(75299); ?> (Wrong reflection on inflate_init and inflate_add).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.25"><!-- {{{ 7.0.25 -->
<h3>Version 7.0.25</h3>
<b><?php release_date('26-Oct-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75241); ?> (Null pointer dereference in zend_mm_alloc_small()).</li>
  <li><?php bugfix(75236); ?> (infinite loop when printing an error-message).</li>
  <li><?php bugfix(75252); ?> (Incorrect token formatting on two parse errors in one request).</li>
  <li><?php bugfix(75220); ?> (Segfault when calling is_callable on parent).</li>
  <li><?php bugfix(75290); ?> (debug info of Closures of internal functions contain garbage argument names).</li>
</ul></li>
<li>Apache2Handler:
<ul>
  <li><?php bugfix(75311); ?> (error: 'zend_hash_key' has no member named 'arKey' in apache2handler).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(75055); ?> (Out-Of-Bounds Read in timelib_meridian()). (CVE-2017-16642)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(75318); ?> (The parameter of UConverter::getAliases() is not optional).</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72535); ?> (arcfour encryption stream filter crashes php).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed incorrect reference counting.</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(75207); ?> (applied upstream patch for CVE-2016-1283).</li>
</ul></li>
<li>litespeed:
<ul>
  <li><?php bugfix(75248); ?> (Binary directory doesn't get created when building only litespeed SAPI).</li>
  <li><?php bugfix(75251); ?> (Missing program prefix and suffix).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73629); ?> (SplDoublyLinkedList::setIteratorMode masks intern flags).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.24"><!-- {{{ 7.0.24 -->
<h3>Version 7.0.24</h3>
<b><?php release_date('28-Sep-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75042); ?> (run-tests.php issues with EXTENSION block).</li>
</ul></li>
<li>BCMath:
<ul>
  <li><?php bugfix(44995); ?> (bcpowmod() fails if scale != 0).</li>
  <li><?php bugfix(46781); ?> (BC math handles minus zero incorrectly).</li>
  <li><?php bugfix(54598); ?> (bcpowmod() may return 1 if modulus is 1).</li>
  <li><?php bugfix(75178); ?> (bcpowmod() misbehaves for non-integer base or modulus).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(70470); ?> (Built-in server truncates headers spanning over TCP packets).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(75093); ?> (OpenSSL support not detected).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(75124); ?> (gdImageGrayScale() may produce colors).</li>
  <li><?php bugfix(75139); ?> (libgd/gd_interpolation.c:1786: suspicious if ?).</li>
</ul></li>
<li>Gettext:
<ul>
  <li><?php bugfix(73730); ?> (textdomain(null) throws in strict mode).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(75090); ?> (IntlGregorianCalendar doesn't have constants from parent class).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(74631); ?> (PDO_PCO with PHP-FPM: OCI environment initialized before PHP-FPM sets it up).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75173); ?> (incorrect behavior of AppendIterator::append in foreach loop).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75097); ?> (gethostname fails if your host name is 64 chars long).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.23"><!-- {{{ 7.0.23 -->
<h3>Version 7.0.23</h3>
<b><?php release_date('31-Aug-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74947); ?> (Segfault in scanner on INF number).</li>
  <li><?php bugfix(74954); ?> (null deref and segfault in zend_generator_resume()).</li>
  <li><?php bugfix(74725); ?> (html_errors=1 breaks unhandled exceptions).</li>
  <li><?php bugfix(75349); ?> (NAN comparison).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(74125); ?> (Fixed finding CURL on systems with multiarch support).</li>
</ul></li>
<li>Date:
<ul>
<li><?php bugfix(75002); ?> (Null Pointer Dereference in timelib_time_clone).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(74993); ?> (Wrong reflection on some locale_* functions).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(71606); ?> (Segmentation fault mb_strcut with HTML-ENTITIES encoding).</li>
  <li><?php bugfix(62934); ?> (mb_convert_kana() does not convert iteration marks).</li>
  <li><?php bugfix(75001); ?> (Wrong reflection on mb_eregi_replace).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74968); ?> (PHP crashes when calling mysqli_result::fetch_object with an abstract class).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Expose oci_unregister_taf_callback() (Tianfang Yang)</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74991); ?> (include_path has a 4096 char limit in some cases).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74949); ?> (null pointer dereference in _function_string).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(74833); ?> (SID constant created with wrong module number).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(74950); ?> (nullpointer deref in simplexml_element_getDocNamespaces).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(75049); ?> (spl_autoload_unregister can't handle spl_autoload_functions results).</li>
  <li><?php bugfix(74669); ?> (Unserialize ArrayIterator broken).</li>
  <li><?php bugfix(75015); ?> (Crash in recursive iterator destructors).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(75075); ?> (unpack with X* causes infinity loop).</li>
  <li><?php bugfix(74103); ?> (heap-use-after-free when unserializing invalid array size). (CVE-2017-12932)</li>
  <li><?php bugfix(75054); ?> (A Denial of Service Vulnerability was found when performing deserialization).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(73793); ?> (WDDX uses wrong decimal seperator).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(74975); ?> (Incorrect xmlrpc serialization for classes with declared properties).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.22"><!-- {{{ 7.0.22 -->
<h3>Version 7.0.22</h3>
<b><?php release_date('03-Aug-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74832); ?> (Loading PHP extension with already registered function name leads to a crash).</li>
  <li><?php bugfix(74780); ?> (parse_url() borken when query string contains colon).</li>
  <li><?php bugfix(74761); ?> (Unary operator expected error on some systems).</li>
  <li><?php bugfix(73900); ?> (Use After Free in unserialize() SplFixedArray).</li>
  <li><?php bugfix(74913); ?> (fixed incorrect poll.h include).</li>
  <li><?php bugfix(74906); ?> (fixed incorrect errno.h include).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74852); ?> (property_exists returns true on unknown DateInterval property).</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(74625); ?> (Integer overflow in oci_bind_array_by_name).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74840); ?> (Opcache overwrites argument of GENERATOR_RETURN within finally).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(69356); ?> (PDOStatement::debugDumpParams() truncates query).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73471); ?> (PHP freezes with AppendIterator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(74883); ?> (SQLite3::__construct() produces "out of memory" exception with invalid flags).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(73173); ?> (huge memleak when wddx_unserialize).</li>
  <li><?php bugfix(74145); ?> (wddx parsing empty boolean tag leads to SIGSEGV). (CVE-2017-11143)</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(73944); ?> (dictionary option of inflate_init() does not work).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.21"><!-- {{{ 7.0.21 -->
<h3>Version 7.0.21</h3>
<b><?php release_date('06-Jul-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74738); ?> (Multiple [PATH=] and [HOST=] sections not properly parsed).</li>
  <li><?php bugfix(74658); ?> (Undefined constants in array properties result in broken properties).</li>
  <li>Fixed misparsing of abstract unix domain socket names.</li>
  <li><?php bugfix(74101); ?> (Unserialize Heap Use-After-Free (READ: 1) in zval_get_type). (CVE-2017-12934)</li>
  <li><?php bugfix(74111); ?> (Heap buffer overread (READ: 1) finish_nested_data from unserialize). (CVE-2017-12933)</li>
  <li><?php bugfix(74603); ?> (PHP INI Parsing Stack Buffer Overflow Vulnerability). (CVE-2017-11628)</li>
  <li><?php bugfix(74819); ?> (wddx_deserialize() heap out-of-bound read via php_parse_date()). (CVE-2017-11145)</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(69373); ?> (References to deleted XPath query results).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74435); ?> (Buffer over-read into uninitialized memory). (CVE-2017-7890)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73473); ?> (Stack Buffer Overflow in msgfmt_parse_message). (CVE-2017-11362)</li>
  <li><?php bugfix(74705); ?> (Wrong reflection on Collator::getSortKey and collator_get_sort_key).</li>
  <li><?php bugfix(73634); ?> (grapheme_strpos illegal memory access).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Add oniguruma upstream fix (CVE-2017-9224, CVE-2017-9226, CVE-2017-9227, CVE-2017-9228, CVE-2017-9229)</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Add TAF callback (PR <?php githubissuel('php/php-src', 2459); ?>).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74663); ?> (Segfault with opcache.memory_protect and validate_timestamp).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74651); ?> (negative-size-param (-1) in memcpy in zif_openssl_seal()). (CVE-2017-11144)</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74087); ?> (Segmentation fault in PHP7.1.1(compiled using the bundled PCRE library)).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Support Instant Client 12.2 in --with-pdo-oci configure option.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(74673); ?> (Segfault when cast Reflection object to string with undefined constant).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(74478); ?> (null coalescing operator failing with SplFixedArray).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74708); ?> (Invalid Reflection signatures for random_bytes and random_int).</li>
  <li><?php bugfix(73648); ?> (Heap buffer overflow in substr).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(74598); ?> (ftp:// wrapper ignores context arg).</li>
</ul></li>
<li>PHAR:
<ul>
  <li><?php bugfix(74386); ?> (Phar::__construct reflection incorrect).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(74679); ?> (Incorrect conversion array with WSDL_CACHE_MEMORY).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74556); ?> (stream_socket_get_name() returns '\0').</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="7.0.20"><!-- {{{ 7.0.20 -->
<h3>Version 7.0.20</h3>
<b><?php release_date('08-Jun-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74600); ?> (crash (SIGSEGV) in _zend_hash_add_or_update_i).</li>
  <li><?php bugfix(74546); ?> (SIGILL in ZEND_FETCH_CLASS_CONSTANT_SPEC_CONST_CONST).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74468); ?> (wrong reflection on Collator::sortWithSortKeys).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74547); ?> (mysqli::change_user() doesn't accept null as $database argument w/strict_types).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74596); ?> (SIGSEGV with opcache.revalidate_path enabled).</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(51918); ?> (Phar::webPhar() does not handle requests sent through PUT and DELETE method).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74510); ?> (win32/sendmail.c anchors CC header but not BCC).</li>
</ul></li>
<li>xmlreader:
<ul>
  <li><?php bugfix(74457); ?> (Wrong reflection on XMLReader::expand).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.19"><!-- {{{ 7.0.19 -->
<h3>Version 7.0.19</h3>
<b><?php release_date('11-May-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(74188); ?> (Null coalescing operator fails for undeclared static class properties).</li>
  <li><?php bugfix(74408); ?> (Endless loop bypassing execution time limit).</li>
  <li><?php bugfix(74410); ?> (stream_select() is broken on Windows Nanoserver).</li>
  <li><?php bugfix(74337); ?> (php-cgi.exe crash on facebook callback).</li>
  <li>Patch for bug <?php bugl(74216); ?> was reverted.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74404); ?> (Wrong reflection on DateTimeZone::getTransitions).</li>
  <li><?php bugfix(74080); ?> (add constant for RFC7231 format datetime).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(74416); ?> (Wrong reflection on DOMNode::cloneNode).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(74379); ?> (syntax error compile error in libmagic/apprentice.c).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74343); ?> (compile fails on solaris 11 with system gd2 library).</li>
</ul></li>
<li>intl:
<ul>
  <li><?php bugfix(74433); ?> (wrong reflection for Normalizer methods).</li>
  <li><?php bugfix(74439); ?> (wrong reflection for Locale methods).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74432); ?> (mysqli_connect adding ":3306" to $host if $port parameter not given).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Added support for MySQL 8.0 types.</li>
  <li><?php bugfix(74376); ?> (Invalid free of persistent results on error/connection loss).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(73833); ?> (null character not allowed in openssl_pkey_get_private).</li>
  <li><?php bugfix(73711); ?> (Segfault in openssl_pkey_new when generating DSA or DH key).</li>
  <li><?php bugfix(74341); ?> (openssl_x509_parse fails to parse ASN.1 UTCTime without seconds).</li>
  <li>Added OpenSSL 1.1.0 support.</li>
</ul></li>
<li>phar:
<ul>
  <li><?php bugfix(74383); ?> (phar method parameters reflection correction).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74409); ?> (Reflection information for ini_get_all() is incomplete).</li>
  <li><?php bugfix(72071); ?> (setcookie allows max-age to be negative).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74429); ?> (Remote socket URI with unique persistence identifier broken).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(74413); ?> (incorrect reflection for SQLite3::enableExceptions).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.18"><!-- {{{ 7.0.18 -->
<h3>Version 7.0.18</h3>
<b><?php release_date('13-Apr-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73370); ?> (falsely exits with "Out of Memory" when using USE_ZEND_ALLOC=0).</li>
  <li><?php bugfix(73960); ?> (Leak with instance method calling static method with referenced return).</li>
  <li><?php bugfix(74265); ?> (Build problems after 7.0.17 release: undefined reference to `isfinite').</li>
  <li><?php bugfix(74302); ?> (yield fromLABEL is over-greedy).</li>
</ul></li>
<li>Apache:
<ul>
  <li>Reverted patch for bug <?php bugl(61471); ?>, fixes bug <?php bugl(74318); ?>.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(72096); ?> (Swatch time value incorrect for dates before 1970).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(74004); ?> (LIBXML_NOWARNING flag ingnored on loadHTML*).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(74230); ?> (iconv fails to fail on surrogates).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72333); ?> (fwrite() on non-blocking SSL sockets doesn't work).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(71003); ?> (Expose MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT to PDO interface).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(74216); ?> (Correctly fail on invalid IP address ports).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(74240); ?> (deflate_add can allocate too much memory).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.17"><!-- {{{ 7.0.17 -->
<h3>Version 7.0.17</h3>
<b><?php release_date('16-Mar-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73989); ?> (PHP 7.1 Segfaults within Symfony test suite).</li>
  <li><?php bugfix(74084); ?> (Out of bound read - zend_mm_alloc_small).</li>
  <li><?php bugfix(73807); ?> (Performance problem with processing large post request). (CVE-2017-11142)</li>
  <li><?php bugfix(73998); ?> (array_key_exists fails on arrays created by get_object_vars).</li>
  <li><?php bugfix(73954); ?> (NAN check fails on Alpine Linux with musl).</li>
  <li><?php bugfix(74039); ?> (is_infinite(-INF) returns false).</li>
  <li><?php bugfix(73677); ?> (Generating phar.phar core dump with gcc ASAN enabled build).</li>
</ul></li>
<li>Apache:
<ul>
  <li><?php bugfix(61471); ?> (Incomplete POST does not timeout but is passed to PHP).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(72719); ?> (Relative datetime format ignores weekday on sundays only).</li>
  <li><?php bugfix(73294); ?> (DateTime wrong when date string is negative).</li>
  <li><?php bugfix(73489); ?> (wrong timestamp when call setTimeZone multi times with UTC offset).</li>
  <li><?php bugfix(73858); ?> (first/last day of' flag is not being reset).</li>
  <li><?php bugfix(73942); ?> ($date-&gt;modify('Friday this week') doesn't return a Friday if $date is a Sunday).</li>
  <li><?php bugfix(74057); ?> (wrong day when using "this week" in strtotime).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(69860); ?> (php-fpm process accounting is broken with keepalive).</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(73127); ?> (gost-crypto hash incorrect if input data contains long 0xFF sequence).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74031); ?> (ReflectionFunction for imagepng is missing last two parameters).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(74021); ?> (fetch_array broken data. Data more then MEDIUMBLOB).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(74152); ?> (if statement says true to a null variable).</li>
  <li><?php bugfix(74019); ?> (Segfault with list).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74022); ?> (PHP Fast CGI crashes when reading from a pfx file).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(74148); ?> (ReflectionFunction incorrectly reports the number of arguments).</li>
  <li><?php bugfix(74005); ?> (mail.add_x_header causes RFC-breaking lone line feed).</li>
  <li><?php bugfix(73118); ?> (is_callable callable name reports misleading value for anonymous classes).</li>
  <li><?php bugfix(74105); ?> (PHP on Linux should use /dev/urandom when getrandom is not available).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(73496); ?> (Invalid memory access in zend_inline_hash_func).</li>
  <li><?php bugfix(74090); ?> (stream_get_contents maxlength&gt;-1 returns empty string).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.16"><!-- {{{ 7.0.16 -->
<h3>Version 7.0.16</h3>
<b><?php release_date('16-Feb-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73916); ?> (zend_print_flat_zval_r doesn't consider reference).</li>
  <li><?php bugfix(73876); ?> (Crash when exporting **= in expansion of assign op).</li>
  <li><?php bugfix(73969); ?> (segfault in debug_print_backtrace).</li>
  <li><?php bugfix(73973); ?> (assertion error in debug_zval_dump).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(54382); ?> (getAttributeNodeNS doesn't get xmlns* attributes).</li>
</ul></li>
<li>DTrace:
<ul>
  <li><?php bugfix(73965); ?> (DTrace reported as enabled when disabled).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67583); ?> (double fastcgi_end_request on max_children limit).</li>
  <li><?php bugfix(69865); ?> (php-fpm does not close stderr when using syslog).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73968); ?> (Premature failing of XBM reading).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(69993); ?> (test for gmp.h needs to test machine includes).</li>
</ul></li>
<li>Intl:
<ul>
<li><?php bugfix(73956); ?> (Link use CC instead of CXX).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(73933); ?> (error/segfault with ldap_mod_replace and opcache).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(73949); ?> (leak in mysqli_fetch_object).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(69899); ?> (segfault on close() after free_result() with mysqlnd).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(73983); ?> (crash on finish work with phar in cli + opcache).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(71519); ?> (add serial hex to return value array).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php implemented(72583); ?> (All data are fetched as strings).</li>
</ul></li>
<li>PDO_PgSQL:
<ul>
  <li><?php bugfix(73959); ?> (lastInsertId fails to throw an exception for wrong sequence name).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(70417); ?> (PharData::compress() doesn't close temp file).</li>
</ul></li>
<li>posix:
<ul>
  <li><?php bugfix(71219); ?> (configure script incorrectly checks for ttyname_r).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(69582); ?> (session not readable by root in CLI).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73896); ?> (spl_autoload() crashes when calls magic _call()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69442); ?> (closing of fd incorrect when PTS enabled).</li>
  <li><?php bugfix(47021); ?> (SoapClient stumbles over WSDL delivered with "Transfer-Encoding: chunked").</li>
  <li><?php bugfix(72974); ?> (imap is undefined service on AIX).</li>
  <li><?php bugfix(72979); ?> (money_format stores wrong length AIX).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(70103); ?> (ZipArchive::addGlob ignores remove_all_path option).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.15"><!-- {{{ 7.0.15 -->
<h3>Version 7.0.15</h3>
<b><?php release_date('19-Jan-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73792); ?> (invalid foreach loop hangs script).</li>
  <li><?php bugfix(73663); ?> ("Invalid opcode 65/16/8" occurs with a variable created with list()).</li>
  <li><?php bugfix(73585); ?> (Logging of "Internal Zend error - Missing class information" missing class name).</li>
  <li><?php bugfix(73753); ?> (unserialized array pointer not advancing).</li>
  <li><?php bugfix(73825); ?> (Heap out of bounds read on unserialize in finish_nested_data()). (CVE-2016-10161)</li>
  <li><?php bugfix(73831); ?> (NULL Pointer Dereference while unserialize php object). (CVE-2016-10162)</li>
  <li><?php bugfix(73832); ?> (Use of uninitialized memory in unserialize()). (CVE-2017-5340)</li>
  <li><?php bugfix(73092); ?> (Unserialize use-after-free when resizing object's properties hash table). (CVE-2016-7479)</li>
  <li><?php bugfix(69425); ?> (Use After Free in unserialize()).</li>
  <li><?php bugfix(72731); ?> (Type Confusion in Object Deserialization).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(73679); ?> (DOTNET read access violation using invalid codepage).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(67474); ?> (getElementsByTagNameNS filter on default ns).</li>
</ul></li>
<li>EXIF:
<ul>
<li><?php bugfix(73737); ?> (FPE when parsing a tag format). (CVE-2016-10158)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73869); ?> (Signed Integer Overflow gd_io.c). (CVE-2016-10168)</li>
  <li><?php bugfix(73868); ?> (DOS vulnerability in gdImageCreateFromGd2Ctx()). (CVE-2016-10167)</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(70513); ?> (GMP Deserialization Type Confusion Vulnerability).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(73462); ?> (Persistent connections don't set $connect_errno).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li>Fixed issue with decoding BIT columns when having more than one rows in the result set. 7.0+ problem.</li>
  <li><?php bugfix(73800); ?> (sporadic segfault with MYSQLI_OPT_INT_AND_FLOAT_NATIVE).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(73612); ?> (preg_*() may leak memory).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(72931); ?> (PDO_FIREBIRD with Firebird 3.0 not work on returning statement).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(73773); ?> (Seg fault when loading hostile phar). (CVE-2017-11147)</li>
  <li><?php bugfix(73768); ?> (Memory corruption when loading hostile phar). (CVE-2016-10160)</li>
  <li><?php bugfix(73764); ?> (Crash while loading hostile phar archive). (CVE-2016-10159)</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(73615); ?> (phpdbg without option never load .phpdbginit at startup).</li>
  <li>Fixed issue getting executable lines from custom wrappers.</li>
  <li><?php bugfix(73704); ?> (phpdbg shows the wrong line in files with shebang).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(46103); ?> (ReflectionObject memory leak).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(73586); ?> (php_user_filter::$stream is not set to the stream the filter is working on).</li>
</ul></li>
<li>SQLite3:
<ul>
<li>Reverted fix for <?php bugl(73530); ?> (Unsetting result set may reset other result set).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73594); ?> (dns_get_record does not populate $additional out parameter).</li>
  <li><?php bugfix(70213); ?> (Unserialize context shared on double class lookup).</li>
  <li><?php bugfix(73154); ?> (serialize object with __sleep function crash).</li>
  <li><?php bugfix(70490); ?> (get_browser function is very slow).</li>
  <li><?php bugfix(73265); ?> (Loading browscap.ini at startup causes high memory usage).</li>
  <li><?php bugfix(31875); ?> (get_defined_functions additional param to exclude disabled functions).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(73373); ?> (deflate_add does not verify that output was not truncated).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.14"><!-- {{{ 7.0.14 -->
<h3>Version 7.0.14</h3>
<b><?php release_date('08-Dec-2016'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed memory leak(null coalescing operator with Spl hash).</li>
  <li><?php bugfix(72736); ?> (Slow performance when fetching large dataset with mysqli / PDO).</li>
  <li><?php bugfix(72978); ?> (Use After Free Vulnerability in unserialize()). (CVE-2016-9936)</li>
</ul></li>
<li>Calendar:
<ul>
  <li>(Fix integer overflows).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(69587); ?> (DateInterval properties and isset).</li>
</ul></li>
<li>DTrace:
<ul>
  <li>Disabled PHP call tracing by default (it makes significant overhead). This may be enabled again using envirionment variable USE_ZEND_DTRACE=1.</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(73526); ?> (php_json_encode depth issue).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(64526); ?> (Add missing mysqlnd.* parameters to php.ini-*).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(73448); ?> (odbc_errormsg returns trash, always 513 bytes).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69090); ?> (check cached files permissions).</li>
  <li><?php bugfix(73546); ?> (Logging for opcache has an empty file name).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(73483); ?> (Segmentation fault on pcre_replace_callback).</li>
  <li><?php bugfix(73392); ?> (A use-after-free in zend allocator management).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(73087); ?>, <?php bugl(61183) ?>, <?php bugl(71494) ?> (Memory corruption in bindParam).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(73580); ?> (Phar::isValidPharFilename illegal memory access).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(73498); ?> (Incorrect SQL generated for pg_copy_to()).</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(73538); ?> (SoapClient::__setSoapHeaders doesn't overwrite SOAP headers).</li>
  <li><?php bugfix(73452); ?> (Segfault (Regression for <?php bugl(69152) ?>)).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73423); ?> (Reproducible crash with GDB backtrace).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(73530); ?> (Unsetting result set may reset other result set).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73297); ?> (HTTP stream wrapper should ignore HTTP 100 Continue).</li>
  <li><?php bugfix(73645); ?> (version_compare illegal write access).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(73631); ?> (Invalid read when wddx decodes empty boolean element). (CVE-2016-9935)</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72135); ?> (malformed XML causes fault).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.13"><!-- {{{ 7.0.13 -->
<h3>Version 7.0.13</h3>
<b><?php release_date('10-Nov-2016'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73350); ?> (Exception::__toString() cause circular references).</li>
  <li><?php bugfix(73181); ?> (parse_str() without a second argument leads to crash).</li>
  <li><?php bugfix(66773); ?> (Autoload with Opcache allows importing conflicting class name to namespace).</li>
  <li><?php bugfix(66862); ?> ((Sub-)Namespaces unexpected behaviour).</li>
  <li>Fix pthreads detection when cross-compiling.</li>
  <li><?php bugfix(73337); ?> (try/catch not working with two exceptions inside a same operation).</li>
  <li><?php bugfix(73338); ?> (Exception thrown from error handler causes valgrind warnings (and crashes)).</li>
  <li><?php bugfix(73329); ?> ((Float)"Nano" == NAN).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73213); ?> (Integer overflow in imageline() with antialiasing).</li>
  <li><?php bugfix(73272); ?> (imagescale() is not affected by, but affects imagesetinterpolation()).</li>
  <li><?php bugfix(73279); ?> (Integer overflow in gdImageScaleBilinearPalette()).</li>
  <li><?php bugfix(73280); ?> (Stack Buffer Overflow in GD dynamicGetbuf).</li>
  <li><?php bugfix(72482); ?> (Ilegal write/read access caused by gdImageAALine overflow).</li>
  <li><?php bugfix(72696); ?> (imagefilltoborder stackoverflow on truecolor images). (CVE-2016-9933)</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(73418); ?> (Integer Overflow in "_php_imap_mail" leads to crash).</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(71148); ?> (Bind reference overwritten on PHP 7).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li>Properly allow for stdin input from a file.</li>
  <li>Add -s command line option / stdin command for reading script from stdin.</li>
  <li>Ignore non-executable opcodes in line mode of phpdbg_end_oplog().</li>
  <li><?php bugfix(70776); ?> (Simple SIGINT does not have any effect with -rr).</li>
  <li><?php bugfix(71234); ?> (INI files are loaded even invoked as -n --version).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(73273); ?> (session_unset() empties values from all variables in which is $_session stored).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(73037); ?> (SoapServer reports Bad Request when gzipped).</li>
  <li><?php bugfix(73237); ?> (Nested object in "any" element overwrites other fields).</li>
  <li><?php bugfix(69137); ?> (Peer verification fails when using a proxy with SoapClient)</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(73333); ?> (2147483647 is fetched as string).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73203); ?> (passing additional_parameters causes mail to fail).</li>
  <li><?php bugfix(71241); ?> (array_replace_recursive sometimes mutates its parameters).</li>
  <li><?php bugfix(73192); ?> (parse_url return wrong hostname).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(73331); ?> (NULL Pointer Dereference in WDDX Packet Deserialization with PDORow). (CVE-2016-9934)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.12"><!-- {{{ 7.0.12 -->
<h3>Version 7.0.12</h3>
<?php release_date('13-Oct-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(73025); ?> (Heap Buffer Overflow in virtual_popen of zend_virtual_cwd.c).</li>
  <li><?php bugfix(72703); ?> (Out of bounds global memory read in BF_crypt triggered by password_verify).</li>
  <li><?php bugfix(73058); ?> (crypt broken when salt is 'too' long).</li>
  <li><?php bugfix(69579); ?> (Invalid free in extension trait).</li>
  <li><?php bugfix(73156); ?> (segfault on undefined function).</li>
  <li><?php bugfix(73163); ?> (PHP hangs if error handler throws while accessing undef const in default value).</li>
  <li><?php bugfix(73172); ?> (parse error: Invalid numeric literal).</li>
  <li><?php bugfix(73240); ?> (Write out of bounds at number_format).</li>
  <li><?php bugfix(73147); ?> (Use After Free in PHP7 unserialize()).</li>
  <li><?php bugfix(73189); ?> (Memcpy negative size parameter php_resolve_path).</li>
</ul></li>
<li>BCmath:
<ul>
<li><?php bugfix(73190); ?> (memcpy negative parameter _bc_new_num_ex).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(73126); ?> (Cannot pass parameter 1 by reference).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(73091); ?> (Unserializing DateInterval object may lead to __toString invocation).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(73150); ?> (missing NULL check in dom_document_save_html).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(72972); ?> (Bad filter for the flags FILTER_FLAG_NO_RES_RANGE and FILTER_FLAG_NO_PRIV_RANGE).</li>
  <li><?php bugfix(73054); ?> (default option ignored when object passed to int filter).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(67325); ?> (imagetruecolortopalette: white is duplicated in palette).</li>
  <li><?php bugfix(50194); ?> (imagettftext broken on transparent background w/o alphablending).</li>
  <li><?php bugfix(73003); ?> (Integer Overflow in gdImageWebpCtx of gd_webp.c).</li>
  <li><?php bugfix(53504); ?> (imagettfbbox gives incorrect values for bounding box).</li>
  <li><?php bugfix(73157); ?> (imagegd2() ignores 3rd param if 4 are given).</li>
  <li><?php bugfix(73155); ?> (imagegd2() writes wrong chunk sizes on boundaries).</li>
  <li><?php bugfix(73159); ?> (imagegd2(): unrecognized formats may result in corrupted files).</li>
  <li><?php bugfix(73161); ?> (imagecreatefromgd2() may leak memory).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73218); ?> (add mitigation for ICU int overflow).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(66797); ?> (mb_substr only takes 32-bit signed integer).</li>
  <li><?php bugfix(66964); ?> (mb_convert_variables() cannot detect recursion).</li>
  <li><?php bugfix(72992); ?> (mbstring.internal_encoding doesn't inherit default_charset).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(72489); ?> (PHP Crashes When Modifying Array Containing MySQLi Result Data).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(72982); ?> (Memory leak in zend_accel_blacklist_update_regexp() function).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(73072); ?> (Invalid path SNI_server_certs causes segfault).</li>
  <li><?php bugfix(73276); ?> (crash in openssl_random_pseudo_bytes function).</li>
  <li><?php bugfix(73275); ?> (crash in openssl_encrypt function).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(73121); ?> (Bundled PCRE doesn't compile because JIT isn't supported on s390).</li>
  <li><?php bugfix(73174); ?> (heap overflow in php_pcre_replace_impl).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(72414); ?> (Never quote values as raw binary data).</li>
  <li>Allow \PDO::setAttribute() to set query timeouts.</li>
  <li>Handle SQLDECIMAL/SQLNUMERIC types, which are used by later TDS versions.</li>
  <li>Add common PDO test suite.</li>
  <li>Free error and message strings when cleaning up PDO instances.</li>
  <li><?php bugfix(67130); ?> (\PDOStatement::nextRowset() should succeed when all rows in current rowset haven't been fetched).</li>
  <li>Ignore potentially misleading dberr values.</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(72996); ?> (phpdbg_prompt.c undefined reference to DL_LOAD).</li>
  <li>Fixed next command not stopping when leaving function.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(68015); ?> (Session does not report invalid uid for files save handler).</li>
  <li><?php bugfix(73100); ?> (session_destroy null dereference in ps_files_path_create).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(73293); ?> (NULL pointer dereference in SimpleXMLElement::asXML()).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(71711); ?> (Soap Server Member variables reference bug).</li>
  <li><?php bugfix(71996); ?> (Using references in arrays doesn't work like expected).</li>
</ul></li>
<li>SPL:
<ul>
<li><?php bugfix(73257); ?>, <?php bugfix(73258); ?> (SplObjectStorage unserialize allows use of non-object as key).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Updated bundled SQLite3 to 3.14.2.</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(70752); ?> (Depacking with wrong password leaves 0 length files).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.11"><!-- {{{ 7.0.11 -->
<h3>Version 7.0.11</h3>
<?php release_date('15-Sep-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72944); ?> (Null pointer deref in zval_delref_p).</li>
  <li><?php bugfix(72943); ?> (assign_dim on string doesn't reset hval).</li>
  <li><?php bugfix(72911); ?> (Memleak in zend_binary_assign_op_obj_helper).</li>
  <li><?php bugfix(72813); ?> (Segfault with __get returned by ref).</li>
  <li><?php bugfix(72767); ?> (PHP Segfaults when trying to expand an infinite operator).</li>
  <li><?php bugfix(72854); ?> (PHP Crashes on duplicate destructor call).</li>
  <li><?php bugfix(72857); ?> (stream_socket_recvfrom read access violation).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(72922); ?> (COM called from PHP does not return out parameters).</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(70825); ?> (Cannot fetch multiple values with group in ini file).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(70195); ?> (Cannot upload file using ftp_put to FTPES with require_ssl_reuse).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72709); ?> (imagesetstyle() causes OOB read for empty $styles).</li>
  <li><?php bugfix(66005); ?> (imagecopy does not support 1bit transparency on truecolor images).</li>
  <li><?php bugfix(72913); ?> (imagecopy() loses single-color transparency on palette images).</li>
  <li><?php bugfix(68716); ?> (possible resource leaks in _php_image_convert()).</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(72320); ?> (iconv_substr returns false for empty strings).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(72852); ?> (imap_mail null dereference).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(65732); ?> (grapheme_*() is not Unicode compliant on CR LF sequence).</li>
  <li><?php bugfix(73007); ?> (add locale length check). (CVE-2016-7416)</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(72293); ?> (Heap overflow in mysqlnd related to BIT fields). (CVE-2016-7412)</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed invalid handle error with Implicit Result Sets.</li>
  <li><?php bugfix(72524); ?> (Binding null values triggers ORA-24816 error).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(72949); ?> (Typo in opcache error message).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(72788); ?> (Invalid memory access when using persistent PDO connection).</li>
  <li><?php bugfix(72791); ?> (Memory leak in PDO persistent connection handling).</li>
  <li><?php bugfix(60665); ?> (call to empty() on NULL result using PDO::FETCH_LAZY returns false).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li>Implemented stringify 'uniqueidentifier' fields.</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php implemented(72633); ?> (Postgres PDO lastInsertId() should work without specifying a sequence).</li>
  <li><?php bugfix(72759); ?> (Regression in pgo_pgsql).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(72928); ?> (Out of bound when verify signature of zip phar in phar_parse_zipfile). (CVE-2016-7414)</li>
  <li><?php bugfix(73035); ?> (Out of bound when verify signature of tar phar in phar_parse_tarfile).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(72846); ?> (getConstant for a array constant with constant values returns NULL/NFC/UKNOWN).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(72724); ?> (PHP7: session-uploadprogress kills httpd).</li>
  <li><?php bugfix(72940); ?> (SID always return "name=ID", even if session cookie exist).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(72971); ?> (SimpleXML isset/unset do not respect namespace).</li>
  <li><?php bugfix(72957); ?> (Null coalescing operator doesn't behave as expected with SimpleXMLElement).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73029); ?> (Missing type check when unserializing SplArray). (CVE-2016-7417)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(55451); ?> (substr_compare NULL length interpreted as 0).</li>
  <li><?php bugfix(72278); ?> (getimagesize returning FALSE on valid jpg).</li>
  <li><?php bugfix(65550); ?> (get_browser() incorrectly parses entries with "+" sign).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(72853); ?> (stream_set_blocking doesn't work).</li>
  <li><?php bugfix(72764); ?> (ftps:// opendir wrapper data channel encryption fails with IIS FTP 7.5, 8.5).</li>
  <li><?php bugfix(71882); ?> (Negative ftruncate() on php://memory exhausts memory).</li>
</ul></li>
<li>SQLite3:
<ul>
<li>Downgraded bundled SQLite to 3.8.10.2, see <?php bugl(73068); ?></li>
</ul></li>
<li>Sysvshm:
<ul>
  <li><?php bugfix(72858); ?> (shm_attach null dereference).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(72860); ?> (wddx_deserialize use-after-free). (CVE-2016-7413)</li>
  <li><?php bugfix(73065); ?> (Out-Of-Bounds Read in php_wddx_push_element). (CVE-2016-7418)</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72085); ?> (SEGV on unknown address zif_xml_parse).</li>
  <li><?php bugfix(72714); ?> (_xml_startElementHandler() segmentation fault).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(68302); ?> (impossible to compile php with zip support).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.10"><!-- {{{ 7.0.10 -->
<h3>Version 7.0.10</h3>
<?php release_date('18-Aug-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72629); ?> (Caught exception assignment to variables ignores references).</li>
  <li><?php bugfix(72594); ?> (Calling an earlier instance of an included anonymous class fatals).</li>
  <li><?php bugfix(72581); ?> (previous property undefined in Exception after deserialization).</li>
  <li><?php bugfix(72496); ?> (Cannot declare public method with signature incompatible with parent private method).</li>
  <li><?php bugfix(72024); ?> (microtime() leaks memory).</li>
  <li><?php bugfix(71911); ?> (Unable to set --enable-debug on building extensions by phpize on Windows).</li>
  <li>Fixed bug causing ClosedGeneratorException being thrown into the calling code instead of the Generator yielding from.</li>
  <li><?php implemented(72614); ?> (Support "nmake test" on building extensions by phpize).</li>
  <li><?php bugfix(72641); ?> (phpize (on Windows) ignores PHP_PREFIX).</li>
  <li>Fixed potential segfault in object storage freeing in shutdown sequence.</li>
  <li><?php bugfix(72663); ?> (Create an Unexpected Object and Don't Invoke __wakeup() in Deserialization). (CVE-2016-7124)</li>
  <li><?php bugfix(72681); ?> (PHP Session Data Injection Vulnerability). (CVE-2016-7125)</li>
  <li><?php bugfix(72683); ?> (getmxrr broken).</li>
  <li><?php bugfix(72742); ?> (memory allocator fails to realloc small block to large one). (CVE-2016-7133)</li>
</ul></li>
<li>Bz2:
<ul>
  <li><?php bugfix(72837); ?> (integer overflow in bzdecompress caused heap corruption).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(67976); ?> (cal_days_month() fails for final month of the French calendar).</li>
  <li><?php bugfix(71894); ?> (AddressSanitizer: global-buffer-overflow in zif_cal_from_jd).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(72569); ?> (DOTNET/COM array parameters broke in PHP7).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(71709); ?> (curl_setopt segfault with empty CURLOPT_HTTPHEADER).</li>
  <li><?php bugfix(71929); ?> (CURLINFO_CERTINFO data parsing error).</li>
  <li><?php bugfix(72674); ?> (Heap overflow in curl_escape). (CVE-2016-7134)</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(66502); ?> (DOM document dangling reference).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72735); ?> (Samsung picture thumb not read (zero size)).</li>
  <li><?php bugfix(72627); ?> (Memory Leakage In exif_process_IFD_in_TIFF). (CVE-2016-7128)</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(71745); ?> (FILTER_FLAG_NO_RES_RANGE does not cover whole 127.0.0.0/8 range).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(72575); ?> (using --allow-to-run-as-root should ignore missing user).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72596); ?> (imagetypes function won't advertise WEBP support).</li>
  <li><?php bugfix(72604); ?> (imagearc() ignores thickness for full arcs).</li>
  <li><?php bugfix(70315); ?> (500 Server Error but page is fully rendered).</li>
  <li><?php bugfix(43828); ?> (broken transparency of imagearc for truecolor in blendingmode).</li>
  <li><?php bugfix(66555); ?> (Always false condition in ext/gd/libgd/gdkanji.c).</li>
  <li><?php bugfix(68712); ?> (suspicious if-else statements).</li>
  <li><?php bugfix(72697); ?> (select_colors write out-of-bounds). (CVE-2016-7126)</li>
  <li><?php bugfix(72730); ?> (imagegammacorrect allows arbitrary write access). (CVE-2016-7127)</li>
  <li><?php bugfix(72494); ?> (imagecropauto out-of-bounds access)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72639); ?> (Segfault when instantiating class that extends IntlCalendar and adds a property).</li>
  <li>Partially fixed <?php bugfix(72506); ?> (idn_to_ascii for UTS #46 incorrect for long domain names).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(72691); ?> (mb_ereg_search raises a warning if a match zero-width).</li>
  <li><?php bugfix(72693); ?> (mb_ereg_search increments search position when a match zero-width).</li>
  <li><?php bugfix(72694); ?> (mb_ereg_search_setpos does not accept a string's last position).</li>
  <li><?php bugfix(72710); ?> (`mb_ereg` causes buffer overflow on regexp compile error).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li><?php bugfix(72782); ?> (Heap Overflow due to integer overflows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(72590); ?> (Opcache restart with kill_all_lockers does not work).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(72688); ?> (preg_match missing group names in matches).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(70313); ?> (PDO statement fails to throw exception).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(72222); ?> (ReflectionClass::export doesn't handle array constants).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(72588); ?> (Using global var doesn't work while accessing SimpleXML element).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(72708); ?> (php_snmp_parse_oid integer overflow in memory allocation).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(55701); ?> (GlobIterator throws LogicException).</li>
  <li><?php bugfix(72646); ?> (SplFileObject::getCsvControl does not return the escape character).</li>
  <li><?php bugfix(72684); ?> (AppendIterator segfault with closed generator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(72668); ?> (Spurious warning when exception is thrown in user defined function).</li>
  <li><?php bugfix(72571); ?> (SQLite3::bindValue, SQLite3::bindParam crash).</li>
  <li><?php implemented(72653); ?> (SQLite should allow opening with empty filename).</li>
  <li>Updated to SQLite3 3.13.0.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72622); ?> (array_walk + array_replace_recursive create references from nothing).</li>
  <li><?php bugfix(72152); ?> (base64_decode $strict fails to detect null byte).</li>
  <li><?php bugfix(72263); ?> (base64_decode skips a character after padding in strict mode).</li>
  <li><?php bugfix(72264); ?> (base64_decode $strict fails with whitespace between padding).</li>
  <li><?php bugfix(72330); ?> (CSV fields incorrectly split if escape char followed by UTF chars).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(41021); ?> (Problems with the ftps wrapper).</li>
  <li><?php bugfix(54431); ?> (opendir() does not work with ftps:// wrapper).</li>
  <li><?php bugfix(72667); ?> (opendir() with ftp:// attempts to open data stream for non-existent directories).</li>
  <li><?php bugfix(72771); ?> (ftps:// wrapper is vulnerable to protocol downgrade attack).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(72647); ?> (xmlrpc_encode() unexpected output after referencing array elements).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(72564); ?> (boolean always deserialized as "true").</li>
  <li><?php bugfix(72142); ?> (WDDX Packet Injection Vulnerability in wddx_serialize_value()).</li>
  <li><?php bugfix(72749); ?> (wddx_deserialize allows illegal memory access). (CVE-2016-7129)</li>
  <li><?php bugfix(72750); ?> (wddx_deserialize null dereference). (CVE-2016-7130)</li>
  <li><?php bugfix(72790); ?> (wddx_deserialize null dereference with invalid xml). (CVE-2016-7131)</li>
  <li><?php bugfix(72799); ?> (wddx_deserialize null dereference in php_wddx_pop_element). (CVE-2016-7132)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(72660); ?> (NULL Pointer dereference in zend_virtual_cwd).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.9"><!-- {{{ 7.0.9 -->
<h3>Version 7.0.9</h3>
<?php release_date('21-Jul-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72508); ?> (strange references after recursive function call and "switch" statement).</li>
  <li><?php bugfix(72513); ?> (Stack-based buffer overflow vulnerability in virtual_file_ex). (CVE-2016-6289)</li>
  <li><?php bugfix(72573); ?> (HTTP_PROXY is improperly trusted by some PHP libraries and applications). (CVE-2016-5385)</li>
</ul></li>
<li>bz2:
<ul>
  <li><?php bugfix(72613); ?> (Inadequate error handling in bzread()). (CVE-2016-5399)</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(72484); ?> (SCRIPT_FILENAME shows wrong path if the user specify router.php).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(72498); ?> (variant_date_from_timestamp null dereference).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(72541); ?> (size_t overflow lead to heap corruption).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66836); ?> (DateTime::createFromFormat 'U' with pre 1970 dates fails parsing).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(72603); ?> (Out of bound read in exif_process_IFD_in_MAKERNOTE). (CVE-2016-6291)</li>
  <li><?php bugfix(72618); ?> (NULL Pointer Dereference in exif_process_user_comment). (CVE-2016-6292)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(43475); ?> (Thick styled lines have scrambled patterns).</li>
  <li><?php bugfix(53640); ?> (XBM images require width to be multiple of 8).</li>
  <li><?php bugfix(64641); ?> (imagefilledpolygon doesn't draw horizontal line).</li>
  <li><?php bugfix(72512); ?> (gdImageTrueColorToPaletteBody allows arbitrary write/read access).</li>
  <li><?php bugfix(72519); ?> (imagegif/output out-of-bounds access).</li>
  <li><?php bugfix(72558); ?> (Integer overflow error within _gdContributionsAlloc()). (CVE-2016-6207)</li>
  <li><?php bugfix(72482); ?> (Ilegal write/read access caused by gdImageAALine overflow).</li>
  <li><?php bugfix(72494); ?> (imagecropauto out-of-bounds access).</li>
</ul></li>
<li>Intl:
<ul>

  <li><?php bugfix(72533); ?> (locale_accept_from_http out-of-bounds access). (CVE-2016-6294)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(72405); ?> (mb_ereg_replace - mbc_to_code (oniguruma) - oob read access).</li>
  <li><?php bugfix(72399); ?> (Use-After-Free in MBString (search_re)).</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72551); ?>, bug <?php bugl(72552) ?> (Incorrect casting from size_t to int lead to heap overflow in mdecrypt_generic).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(72570); ?> (Segmentation fault when binding parameters on a query without placeholders).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(72476); ?> (Memleak in jit_stack).</li>
  <li><?php bugfix(72463); ?> (mail fails with invalid argument).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(72538); ?> (readline_redisplay crashes php).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72505); ?> (readfile() mangles files larger than 2G).</li>
  <li><?php bugfix(72306); ?> (Heap overflow through proc_open and $env parameter).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(72531); ?> (ps_files_cleanup_dir Buffer overflow).</li>
  <li><?php bugfix(72562); ?> (Use After Free in unserialize() with Unexpected Session Deserialization).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(72479); ?> (Use After Free Vulnerability in SNMP with GC and unserialize()). (CVE-2016-6295)</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(72439); ?> (Stream socket with remote address leads to a segmentation fault).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(72606); ?> (heap-buffer-overflow (write) simplestring_addn simplestring.c). (CVE-2016-6296)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(72520); ?> (Stack-based buffer overflow vulnerability in php_stream_zip_opener). (CVE-2016-6297)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.8"><!-- {{{ 7.0.8 -->
<h3>Version 7.0.8</h3>
<?php release_date('23-Jun-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72218); ?> (If host name cannot be resolved then PHP 7 crashes).</li>
  <li><?php bugfix(72221); ?> (segfault, past-the-end access).</li>
  <li><?php bugfix(72268); ?> (Integer Overflow in nl2br()).</li>
  <li><?php bugfix(72275); ?> (Integer Overflow in json_encode()/json_decode()/ json_utf8_to_utf16()).</li>
  <li><?php bugfix(72400); ?> (Integer Overflow in addcslashes/addslashes).</li>
  <li><?php bugfix(72403); ?> (Integer Overflow in Length of String-typed ZVAL).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(63740); ?> (strtotime seems to use both sunday and monday as start of week).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(72308); ?> (fastcgi_finish_request and logging environment variables).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72298); ?> (pass2_no_dither out-of-bounds access).</li>
  <li><?php bugfix(72337); ?> (invalid dimensions can lead to crash).</li>
  <li><?php bugfix(72339); ?> (Integer Overflow in _gd2GetHeader() resulting in heap overflow). (CVE-2016-5766)</li>
  <li><?php bugfix(72407); ?> (NULL Pointer Dereference at _gdScaleVert).</li>
  <li><?php bugfix(72446); ?> (Integer Overflow in gdImagePaletteToTrueColor() resulting in heap overflow). (CVE-2016-5767)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(70484); ?> (selectordinal doesn't work with named parameters).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(72402); ?> (_php_mb_regex_ereg_replace_exec - double free). (CVE-2016-5768)</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72455); ?> (Heap Overflow due to integer overflows). (CVE-2016-5769)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72140); ?> (segfault after calling ERR_free_strings()).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(72143); ?> (preg_replace uses int instead of size_t).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(71573); ?> (Segfault (core dumped) if paramno beyond bound).</li>
  <li><?php bugfix(72294); ?> (Segmentation fault/invalid pointer in connection with pgsql_stmt_dtor).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(72321); ?> (invalid free in phar_extract_file()). (CVE-2016-4473)</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(72284); ?> (phpdbg fatal errors with coverage).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(72195); ?> (pg_pconnect/pg_connect cause use-after-free).</li>
  <li><?php bugfix(72197); ?> (pg_lo_create arbitrary read).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72017); ?> (range() with float step produces unexpected result).</li>
  <li><?php bugfix(72193); ?> (dns_get_record returns array containing elements of type 'unknown').</li>
  <li><?php bugfix(72229); ?> (Wrong reference when serialize/unserialize an object).</li>
  <li><?php bugfix(72300); ?> (ignore_user_abort(false) has no effect).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(72340); ?> (Double Free Courruption in wddx_deserialize). (CVE-2016-5772)</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72206); ?> (xml_parser_create/xml_parser_free leaks mem).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(72155); ?> (use-after-free caused by get_zval_xmlrpc_type).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(72258); ?> (ZipArchive converts filenames to unrecoverable form).</li>
  <li><?php bugfix(72434); ?> (ZipArchive class Use After Free Vulnerability in PHP's GC algorithm and unserialize). (CVE-2016-5773)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.7"><!-- {{{ 7.0.7 -->
<h3>Version 7.0.7</h3>
<?php release_date('26-May-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72162); ?> (use-after-free - error_reporting).</li>
  <li>Add compiler option to disable special case function calls.</li>
  <li><?php bugfix(72101); ?> (crash on complex code).</li>
  <li><?php bugfix(72100); ?> (implode() inserts garbage into resulting string when joins very big integer).</li>
  <li><?php bugfix(72057); ?> (PHP Hangs when using custom error handler and typehint).</li>
  <li><?php bugfix(72038); ?> (Function calls with values to a by-ref parameter don't always throw a notice).</li>
  <li><?php bugfix(71737); ?> (Memory leak in closure with parameter named $this).</li>
  <li><?php bugfix(72059); ?> (?? is not allowed on constant expressions).</li>
  <li><?php bugfix(72159); ?> (Imported Class Overrides Local Class Name).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(68658); ?> (Define CURLE_SSL_CACERT_BADFILE).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(72157); ?> (use-after-free caused by dba_open).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72227); ?> (imagescale out-of-bounds read). (CVE-2013-7456)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(64524); ?> (Add intl.use_exceptions to php.ini-*).</li>
  <li><?php bugfix(72241); ?> (get_icu_value_internal out-of-bounds read). (CVE-2016-5093)</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(72069); ?> (Behavior \JsonSerializable different from json_encode).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(72164); ?> (Null Pointer Dereference - mb_ereg_replace).</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(71600); ?> (oci_fetch_all segfaults when selecting more than eight columns).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(72014); ?> (Including a file with anonymous classes multiple times leads to fatal error).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72165); ?> (Null pointer dereference - openssl_csr_new).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li><?php bugfix(72154); ?> (pcntl_wait/pcntl_waitpid array internal structure overwrite).</li>
</ul></li>
<li>POSIX:
<ul>
  <li><?php bugfix(72133); ?> (php_posix_group_to_array crashes if gr_passwd is NULL).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(72028); ?> (pg_query_params(): NULL converts to empty string).</li>
  <li><?php bugfix(71062); ?> (pg_convert() doesn't accept ISO 8601 for datatype timestamp).</li>
  <li><?php bugfix(72151); ?> (mysqli_fetch_object changed behaviour). Patch to <?php bugl(71820) ?> is reverted.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(72174); ?> (ReflectionProperty#getValue() causes __isset call).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(71972); ?> (Cyclic references causing session_start(): Failed to decode session object).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Added socket_export_stream() function for getting a stream compatible resource from a socket resource.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(72051); ?> (The reference in CallbackFilterIterator doesn't work as expected).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(68849); ?> (bindValue is not using the right data type).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72075); ?> (Referencing socket resources breaks stream_select).</li>
  <li><?php bugfix(72031); ?> (array_column() against an array of objects discards all values matching null).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.6"><!-- {{{ 7.0.6 -->
<h3>Version 7.0.6</h3>
<?php release_date('28-Apr-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(71930); ?> (_zval_dtor_func: Assertion `(arr)-&gt;gc.refcount &lt;= 1' failed).</li>
  <li><?php bugfix(71922); ?> (Crash on assert(new class{})).</li>
  <li><?php bugfix(71914); ?> (Reference is lost in "switch").</li>
  <li><?php bugfix(71871); ?> (Interfaces allow final and abstract functions).</li>
  <li><?php bugfix(71859); ?> (zend_objects_store_call_destructors operates on realloced memory, crashing).</li>
  <li><?php bugfix(71841); ?> (EG(error_zval) is not handled well).</li>
  <li><?php bugfix(71750); ?> (Multiple Heap Overflows in php_raw_url_encode/ php_url_encode).</li>
  <li><?php bugfix(71731); ?> (Null coalescing operator and ArrayAccess).</li>
  <li><?php bugfix(71609); ?> (Segmentation fault on ZTS with gethostbyname).</li>
  <li><?php bugfix(71414); ?> (Inheritance, traits and interfaces).</li>
  <li><?php bugfix(71359); ?> (Null coalescing operator and magic).</li>
  <li><?php bugfix(71334); ?> (Cannot access array keys while uksort()).</li>
  <li><?php bugfix(69659); ?> (ArrayAccess, isset() and the offsetExists method).</li>
  <li><?php bugfix(69537); ?> (__debugInfo with empty string for key gives error).</li>
  <li><?php bugfix(62059); ?> (ArrayObject and isset are not friends).</li>
  <li><?php bugfix(71980); ?> (Decorated/Nested Generator is Uncloseable in Finally).</li>
</ul></li>
<li>BCmath:
<ul>
  <li><?php bugfix(72093); ?> (bcpowmod accepts negative scale and corrupts _one_ definition). (CVE-2016-4537, CVE-2016-4538)</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(71831); ?> (CURLOPT_NOPROXY applied as long instead of string).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(71889); ?> (DateInterval::format Segmentation fault).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72094); ?> (Out of bounds heap read access in exif header processing). (CVE-2016-4542, CVE-2016-4543, CVE-2016-4544)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71912); ?> (libgd: signedness vulnerability). (CVE-2016-3074)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(71516); ?> (IntlDateFormatter looses locale if pattern is set via constructor).</li>
  <li><?php bugfix(70455); ?> (Missing constant: IntlChar::NO_NUMERIC_VALUE).</li>
  <li><?php bugfix(70451); ?>, <?php bugl(70452); ?> (Inconsistencies in return values of IntlChar methods).</li>
  <li><?php bugfix(68893); ?> (Stackoverflow in datefmt_create).</li>
  <li><?php bugfix(66289); ?> (Locale::lookup incorrectly returns en or en_US if locale is empty).</li>
  <li><?php bugfix(70484); ?> (selectordinal doesn't work with named parameters).</li>
  <li><?php bugfix(72061); ?> (Out-of-bounds reads in zif_grapheme_stripos with negative offset). (CVE-2016-4540, CVE-2016-4541)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(63171); ?> (Script hangs after max_execution_time).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71843); ?> (null ptr deref ZEND_RETURN_SPEC_CONST_HANDLER).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(52098); ?> (Own PDOStatement implementation ignore __call()).</li>
  <li><?php bugfix(71447); ?> (Quotes inside comments not properly handled).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(71943); ?> (dblib_handle_quoter needs to allocate an extra byte).</li>
  <li>Add DBLIB-specific attributes for controlling timeouts.</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(62498); ?> (pdo_pgsql inefficient when getColumnMeta() is used).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(71820); ?> (pg_fetch_object binds parameters before call constructor).</li>
  <li><?php bugfix(71998); ?> (Function pg_insert does not insert when column type = inet).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(71986); ?> (Nested foreach assign-by-reference creates broken variables).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71838); ?> (Deserializing serialized SPLObjectStorage-Object can't access properties in PHP).</li>
  <li><?php bugfix(71735); ?> (Double-free in SplDoublyLinkedList::offsetSet).</li>
  <li><?php bugfix(67582); ?> (Cloned SplObjectStorage with overwritten getHash fails offsetExists()).</li>
  <li><?php bugfix(52339); ?> (SPL autoloader breaks class_exists()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72116); ?> (array_fill optimization breaks implementation).</li>
  <li><?php bugfix(71995); ?> (Returning the same var twice from __sleep() produces broken serialized data).</li>
  <li><?php bugfix(71940); ?> (Unserialize crushes on restore object reference).</li>
  <li><?php bugfix(71969); ?> (str_replace returns an incorrect resulting array after a foreach by reference).</li>
  <li><?php bugfix(71891); ?> (header_register_callback() and register_shutdown_function()).</li>
  <li><?php bugfix(71884); ?> (Null pointer deref (segfault) in stream_context_get_default).</li>
  <li><?php bugfix(71840); ?> (Unserialize accepts wrongly data).</li>
  <li><?php bugfix(71837); ?> (Wrong arrays behaviour).</li>
  <li><?php bugfix(71827); ?> (substr_replace bug, string length).</li>
  <li><?php bugfix(67512); ?> (php_crypt() crashes if crypt_r() does not exist or _REENTRANT is not defined).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72099); ?> (xml_parse_into_struct segmentation fault). (CVE-2016-4539)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(71923); ?> (integer overflow in ZipArchive::getFrom*). (CVE-2016-3078)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.5"><!-- {{{ 7.0.5 -->
<h3>Version 7.0.5</h3>
<?php release_date('31-Mar-2016'); ?>
<ul><li>Core:
<ul>
  <li>Huge pages disabled by default.</li>
  <li>Added ability to enable huge pages in Zend Memory Manager through the environment variable USE_ZEND_ALLOC_HUGE_PAGES=1.</li>
  <li><?php bugfix(71756); ?> (Call-by-reference widens scope to uninvolved functions when used in switch).</li>
  <li><?php bugfix(71729); ?> (Possible crash in zend_bin_strtod, zend_oct_strtod, zend_hex_strtod).</li>
  <li><?php bugfix(71695); ?> (Global variables are reserved before execution).</li>
  <li><?php bugfix(71629); ?> (Out-of-bounds access in php_url_decode in context php_stream_url_wrap_rfc2397).</li>
  <li><?php bugfix(71622); ?> (Strings used in pass-as-reference cannot be used to invoke C::$callable()).</li>
  <li><?php bugfix(71596); ?> (Segmentation fault on ZTS with date function (setlocale)).</li>
  <li><?php bugfix(71535); ?> (Integer overflow in zend_mm_alloc_heap()).</li>
  <li><?php bugfix(71470); ?> (Leaked 1 hashtable iterators).</li>
  <li><?php bugfix(71575); ?> (ISO C does not allow extra &lsquo;;&rsquo; outside of a function).</li>
  <li><?php bugfix(71724); ?> (yield from does not count EOLs).</li>
  <li><?php bugfix(71767); ?> (ReflectionMethod::getDocComment returns the wrong comment).</li>
  <li><?php bugfix(71806); ?> (php_strip_whitespace() fails on some numerical values).</li>
  <li><?php bugfix(71624); ?> (`php -R` (PHP_MODE_PROCESS_STDIN) is broken).</li>
</ul></li>
<li>CLI Server:
<ul>
  <li><?php bugfix(69953); ?> (Support MKCALENDAR request method).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(71694); ?> (Support constant CURLM_ADDED_ALREADY).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(71635); ?> (DatePeriod::getEndDate segfault).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(71527); ?> (Buffer over-write in finfo_open with malformed magic file). (CVE-2015-8865)</li>
</ul></li>
<li>libxml:
<ul>
  <li><?php bugfix(71536); ?> (Access Violation crashes php-cgi.exe).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(71906); ?> (AddressSanitizer: negative-size-param (-1) in mbfl_strcut). (CVE-2016-4073)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(47803); ?>, <?php bugl(69526); ?> (Executing prepared statements is succesfull only for the first two statements).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(71659); ?> (segmentation fault in pcre running twig tests).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(54648); ?> (PDO::MSSQL forces format of datetime fields).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71625); ?> (Crash in php7.dll with bad phar filename).</li>
  <li><?php bugfix(71317); ?> (PharData fails to open specific file).</li>
  <li><?php bugfix(71860); ?> (Invalid memory write in phar on filename with \0 in name). (CVE-2016-4072)</li>
</ul></li>
<li>phpdbg:
<ul>
  <li>Fixed crash when advancing (except step) inside an internal function.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(71683); ?> (Null pointer dereference in zend_hash_str_find_bucket).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(71704); ?> (php_snmp_error() Format String Vulnerability). (CVE-2016-4071)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71617); ?> (private properties lost when unserializing ArrayObject).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71660); ?> (array_column behaves incorrectly after foreach by reference).</li>
  <li><?php bugfix(71798); ?> (Integer Overflow in php_raw_url_encode). (CVE-2016-4070)</li>
</ul></li>
<li>Zip:
<ul>
  <li>Update bundled libzip to 1.1.2.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.4"><!-- {{{ 7.0.4 -->
<h3>Version 7.0.4</h3>
<?php release_date('03-Mar-2016'); ?>
<ul><li>Core:
<ul>
  <li>Fixed bug (Low probability segfault in zend_arena).</li>
  <li><?php bugfix(71441); ?> (Typehinted Generator with return in try/finally crashes).</li>
  <li><?php bugfix(71442); ?> (forward_static_call crash).</li>
  <li><?php bugfix(71443); ?> (Segfault using built-in webserver with intl using symfony).</li>
  <li><?php bugfix(71449); ?> (An integer overflow bug in php_implode()).</li>
  <li><?php bugfix(71450); ?> (An integer overflow bug in php_str_to_str_ex()).</li>
  <li><?php bugfix(71474); ?> (Crash because of VM stack corruption on Magento2).</li>
  <li><?php bugfix(71485); ?> (Return typehint on internal func causes Fatal error when it throws exception).</li>
  <li><?php bugfix(71529); ?> (Variable references on array elements don't work when using count).</li>
  <li><?php bugfix(71601); ?> (finally block not executed after yield from).</li>
  <li><?php bugfix(71637); ?> (Multiple Heap Overflow due to integer overflows in xml/filter_url/addcslashes). (CVE-2016-4344, CVE-2016-4345, CVE-2016-4346)</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(71559); ?> (Built-in HTTP server, we can download file in web by bug).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(71523); ?> (Copied handle with new option CURLOPT_HTTPHEADER crashes while curl_multi_exec).</li>
  <li>Fixed memory leak in curl_getinfo().</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(71525); ?> (Calls to date_modify will mutate timelib_rel_time, causing date_date_set issues).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(71434); ?> (finfo throws notice for specific python file).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(62172); ?> (FPM not working with Apache httpd 2.4 balancer/fcgi setup).</li>
  <li><?php bugfix(71269); ?> (php-fpm dumped core).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71584); ?> (Possible use-after-free of ZCG(cwd) in Zend Opcache).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(71537); ?> (PCRE segfault from Opcache).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li>Fixed inherited functions from unspecified files being included in phpdbg_get_executable().</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(71610); ?> (Type Confusion Vulnerability - SOAP / make_http_soap_request()). (CVE-2016-3185)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71603); ?> (compact() maintains references in php7).</li>
  <li><?php bugfix(70720); ?> (strip_tags improper php code parsing).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(71501); ?> (xmlrpc_encode_request ignores encoding option).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(71561); ?> (NULL pointer dereference in Zip::ExtractTo).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.3"><!-- {{{ 7.0.3 -->
<h3>Version 7.0.3</h3>
<?php release_date('04-Feb-2016'); ?>
<ul><li>Core:
<ul>
  <li>Added support for new HTTP 451 code.</li>
  <li><?php bugfix(71039); ?> (exec functions ignore length but look for NULL termination).</li>
  <li><?php bugfix(71089); ?> (No check to duplicate zend_extension).</li>
  <li><?php bugfix(71201); ?> (round() segfault on 64-bit builds).</li>
  <li><?php bugfix(71221); ?> (Null pointer deref (segfault) in get_defined_vars via ob_start).</li>
  <li><?php bugfix(71248); ?> (Wrong interface is enforced).</li>
  <li><?php bugfix(71273); ?> (A wrong ext directory setup in php.ini leads to crash).</li>
  <li><?php bugfix(71275); ?> (Bad method called on cloning an object having a trait).</li>
  <li><?php bugfix(71297); ?> (Memory leak with consecutive yield from).</li>
  <li><?php bugfix(71300); ?> (Segfault in zend_fetch_string_offset).</li>
  <li><?php bugfix(71314); ?> (var_export(INF) prints INF.0).</li>
  <li><?php bugfix(71323); ?> (Output of stream_get_meta_data can be falsified by its input).</li>
  <li><?php bugfix(71336); ?> (Wrong is_ref on properties as exposed via get_object_vars()).</li>
  <li><?php bugfix(71459); ?> (Integer overflow in iptcembed()).</li>
</ul></li>
<li>Apache2handler:
<ul>
  <li>Fix &gt;2G Content-Length headers in apache2handler.</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(71227); ?> (Can't compile php_curl statically).</li>
  <li><?php bugfix(71225); ?> (curl_setopt() fails to set CURLOPT_POSTFIELDS with reference to CURLFile).</li>
</ul></li>
<li>GD:
<ul>
  <li>Improved fix for bug <?php bugl(70976) ?>.</li>
</ul></li>
<li>Interbase:
<ul>
  <li><?php bugfix(71305); ?> (Crash when optional resource is omitted).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(71249); ?> (ldap_mod_replace/ldap_mod_add store value as string "Array").</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(71397); ?> (mb_send_mail segmentation fault).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(71475); ?> (openssl_seal() uninitialized memory usage).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded bundled PCRE library to 8.38. (CVE-2015-8383, CVE-2015-8386, CVE-2015-8387, CVE-2015-8389, CVE-2015-8390, CVE-2015-8391, CVE-2015-8393, CVE-2015-8394)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71354); ?> (Heap corruption in tar/zip/phar parser). (CVE-2016-4342)</li>
  <li><?php bugfix(71331); ?> (Uninitialized pointer in phar_make_dirstream()). (CVE-2016-4343)</li>
  <li><?php bugfix(71391); ?> (NULL Pointer Dereference in phar_tar_setupmetadata()).</li>
  <li><?php bugfix(71488); ?> (Stack overflow when decompressing tar archives). (CVE-2016-2554)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70979); ?> (crash with bad soap request).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71204); ?> (segfault if clean spl_autoload_funcs while autoloading).</li>
  <li><?php bugfix(71202); ?> (Autoload function registered by another not activated immediately).</li>
  <li><?php bugfix(71311); ?> (Use-after-free vulnerability in SPL(ArrayObject, unserialize)).</li>
  <li><?php bugfix(71313); ?> (Use-after-free vulnerability in SPL(SplObjectStorage, unserialize)).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71287); ?> (Error message contains hexadecimal instead of decimal number).</li>
  <li><?php bugfix(71264); ?> (file_put_contents() returns unexpected value when filesystem runs full).</li>
  <li><?php bugfix(71245); ?> (file_get_contents() ignores "header" context option if it's a reference).</li>
  <li><?php bugfix(71220); ?> (Null pointer deref (segfault) in compact via ob_start).</li>
  <li><?php bugfix(71190); ?> (substr_replace converts integers in original $search array to strings).</li>
  <li><?php bugfix(71188); ?> (str_replace converts integers in original $search array to strings).</li>
  <li><?php bugfix(71132); ?>, <?php bugl(71197) ?> (range() segfaults).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(71335); ?> (Type Confusion in WDDX Packet Deserialization).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.2"><!-- {{{ 7.0.2 -->
<h3>Version 7.0.2</h3>
<?php release_date('07-Jan-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(71165); ?> (-DGC_BENCH=1 doesn't work on PHP7).</li>
  <li><?php bugfix(71163); ?> (Segmentation Fault: cleanup_unfinished_calls).</li>
  <li><?php bugfix(71109); ?> (ZEND_MOD_CONFLICTS("xdebug") doesn't work).</li>
  <li><?php bugfix(71092); ?> (Segmentation fault with return type hinting).</li>
  <li>Fixed bug memleak in header_register_callback.</li>
  <li><?php bugfix(71067); ?> (Local object in class method stays in memory for each call).</li>
  <li><?php bugfix(66909); ?> (configure fails utf8_to_mutf7 test).</li>
  <li><?php bugfix(70781); ?> (Extension tests fail on dynamic ext dependency).</li>
  <li><?php bugfix(71089); ?> (No check to duplicate zend_extension).</li>
  <li><?php bugfix(71086); ?> (Invalid numeric literal parse error within highlight_string() function).</li>
  <li><?php bugfix(71154); ?> (Incorrect HT iterator invalidation causes iterator reuse).</li>
  <li><?php bugfix(52355); ?> (Negating zero does not produce negative zero).</li>
  <li><?php bugfix(66179); ?> (var_export() exports float as integer).</li>
  <li><?php bugfix(70804); ?> (Unary add on negative zero produces positive zero).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(71144); ?> (Sementation fault when using cURL with ZTS).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed key leak with invalid resource.</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(71063); ?> (filter_input(INPUT_ENV, ..) does not work).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php implemented(55651); ?> (Option to ignore the returned FTP PASV address).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(70755); ?> (fpm_log.c memory leak and buffer overflow). (CVE-2016-5114)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(70976); ?> (Memory Read via gdImageRotateInterpolated Array Index Out of Bounds). (CVE-2016-1903)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(71066); ?> (mb_send_mail: Program terminated with signal SIGSEGV, Segmentation fault).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71127); ?> (Define in auto_prepend_file is overwrite).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(71178); ?> (preg_replace with arrays creates [0] in replace array if not already set).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(71094); ?> (readline_completion_function corrupts static array on second TAB).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(71122); ?> (Session GC may not remove obsolete session data).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71077); ?> (ReflectionMethod for ArrayObject constructor returns wrong number of parameters).</li>
  <li><?php bugfix(71153); ?> (Performance Degradation in ArrayIterator with large arrays).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71270); ?> (Heap BufferOver Flow in escapeshell functions). (CVE-2016-1904)</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(70661); ?> (Use After Free Vulnerability in WDDX Packet Deserialization).</li>
  <li><?php bugfix(70741); ?> (Session WDDX Packet Deserialization Type Confusion Vulnerability).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(70728); ?> (Type Confusion Vulnerability in PHP_to_XMLRPC_worker).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.1"><!-- {{{ 7.0.1 -->
<h3>Version 7.0.1</h3>
<?php release_date('17-Dec-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(71105); ?> (Format String Vulnerability in Class Name Error Message). (CVE-2015-8617)</li>
  <li><?php bugfix(70831); ?> (Compile fails on system with 160 CPUs).</li>
  <li><?php bugfix(71006); ?> (symbol referencing errors on Sparc/Solaris).</li>
  <li><?php bugfix(70997); ?> (When using parentClass:: instead of parent::, static context changed).</li>
  <li><?php bugfix(70970); ?> (Segfault when combining error handler with output buffering).</li>
  <li><?php bugfix(70967); ?> (Weird error handling for __toString when Error is thrown).</li>
  <li><?php bugfix(70958); ?> (Invalid opcode while using ::class as trait method paramater default value).</li>
  <li><?php bugfix(70944); ?> (try{ } finally{} can create infinite chains of exceptions).</li>
  <li><?php bugfix(70931); ?> (Two errors messages are in conflict).</li>
  <li><?php bugfix(70904); ?> (yield from incorrectly marks valid generator as finished).</li>
  <li><?php bugfix(70899); ?> (buildconf failure in extensions).</li>
  <li><?php bugfix(61751); ?> (SAPI build problem on AIX: Undefined symbol: php_register_internal_extensions).</li>
  <li>Fixed \int (or generally every scalar type name with leading backslash) to not be accepted as type name.</li>
  <li>Fixed exception not being thrown immediately into a generator yielding from an array.</li>
  <li><?php bugfix(70987); ?> (static::class within Closure::call() causes segfault).</li>
  <li><?php bugfix(71013); ?> (Incorrect exception handler with yield from).</li>
  <li>Fixed double free in error condition of format printer.</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(71005); ?> (Segfault in php_cli_server_dispatch_router()).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(71020); ?> (Use after free in Collator::sortWithSortKeys). (CVE-2015-8616)</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(68077); ?> (LOAD DATA LOCAL INFILE / open_basedir restriction).</li>
  <li><?php bugfix(68344); ?> (MySQLi does not provide way to disable peer certificate validation) by introducing MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT connection flag.</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed LOB implementation size_t/zend_long mismatch reported by gcov.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71024); ?> (Unable to use PHP 7.0 x64 side-by-side with PHP 5.6 x32 on the same server).</li>
  <li><?php bugfix(70991); ?> (zend_file_cache.c:710: error: array type has incomplete element type).</li>
  <li><?php bugfix(70977); ?> (Segmentation fault with opcache.huge_code_pages=1).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(60052); ?> (Integer returned as a 64bit integer on X64_86).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li>Fixed stderr being written to stdout.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(71018); ?> (ReflectionProperty::setValue() behavior changed).</li>
  <li><?php bugfix(70982); ?> (setStaticPropertyValue behaviors inconsistently with 5.6).</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(70993); ?> (Array key references break argument processing).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71028); ?> (Undefined index with ArrayIterator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(71049); ?> (SQLite3Stmt::execute() releases bound parameter instead of internal buffer).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70999); ?> (php_random_bytes: called object is not a function).</li>
  <li><?php bugfix(70960); ?> (ReflectionFunction for array_unique returns wrong number of parameters).</li>
</ul></li>
<li>Streams/Socket:
<ul>
  <li>Add IPV6_V6ONLY constant / make it usable in stream contexts.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.0"><!-- {{{ 7.0.0 -->
<h3>Version 7.0.0</h3>
<?php release_date('03-Dec-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70947); ?> (INI parser segfault with INI_SCANNER_TYPED).</li>
  <li><?php bugfix(70914); ?> (zend_throw_or_error() format string vulnerability).</li>
  <li><?php bugfix(70912); ?> (Null ptr dereference instantiating class with invalid array property).</li>
  <li><?php bugfix(70895); ?>, <?php bugl(70898); ?> (null ptr deref and segfault with crafted calable).</li>
  <li><?php bugfix(70249); ?> (Segmentation fault while running PHPUnit tests on phpBB 3.2-dev).</li>
  <li><?php bugfix(70805); ?> (Segmentation faults whilst running Drupal 8 test suite).</li>
  <li><?php bugfix(70842); ?> (Persistent Stream Segmentation Fault).</li>
  <li><?php bugfix(70862); ?> (Several functions do not check return code of php_stream_copy_to_mem()).</li>
  <li><?php bugfix(70863); ?> (Incorect logic to increment_function for proxy objects).</li>
  <li><?php bugfix(70323); ?> (Regression in zend_fetch_debug_backtrace() can cause segfaults).</li>
  <li><?php bugfix(70873); ?> (Regression on private static properties access).</li>
  <li><?php bugfix(70748); ?> (Segfault in ini_lex () at Zend/zend_ini_scanner.l).</li>
  <li><?php bugfix(70689); ?> (Exception handler does not work as expected).</li>
  <li><?php bugfix(70430); ?> (Stack buffer overflow in zend_language_parser()).</li>
  <li><?php bugfix(70782); ?> (null ptr deref and segfault (zend_get_class_fetch_type)).</li>
  <li><?php bugfix(70785); ?> (Infinite loop due to exception during identical comparison).</li>
  <li><?php bugfix(70630); ?> (Closure::call/bind() crash with ReflectionFunction-&gt; getClosure()).</li>
  <li><?php bugfix(70662); ?> (Duplicate array key via undefined index error handler).</li>
  <li><?php bugfix(70681); ?> (Segfault when binding $this of internal instance method to null).</li>
  <li><?php bugfix(70685); ?> (Segfault for getClosure() internal method rebind with invalid $this).</li>
  <li>Added zend_internal_function.reserved[] fields.</li>
  <li><?php bugfix(70557); ?> (Memleak on return type verifying failed).</li>
  <li><?php bugfix(70555); ?> (fun_get_arg() on unsetted vars return UNKNOW).</li>
  <li><?php bugfix(70548); ?> (Redundant information printed in case of uncaught engine exception).</li>
  <li><?php bugfix(70547); ?> (unsetting function variables corrupts backtrace).</li>
  <li><?php bugfix(70528); ?> (assert() with instanceof adds apostrophes around class name).</li>
  <li><?php bugfix(70481); ?> (Memory leak in auto_global_copy_ctor() in ZTS build).</li>
  <li><?php bugfix(70431); ?> (Memory leak in php_ini.c).</li>
  <li><?php bugfix(70478); ?> (**= does no longer work).</li>
  <li><?php bugfix(70398); ?> (SIGSEGV, Segmentation fault zend_ast_destroy_ex).</li>
  <li><?php bugfix(70332); ?> (Wrong behavior while returning reference on object).</li>
  <li><?php bugfix(70300); ?> (Syntactical inconsistency with new group use syntax).</li>
  <li><?php bugfix(70321); ?> (Magic getter breaks reference to array property).</li>
  <li><?php bugfix(70187); ?> (Notice: unserialize(): Unexpected end of serialized data).</li>
  <li><?php bugfix(70145); ?> (From field incorrectly parsed from headers).</li>
  <li><?php bugfix(70370); ?> (Bundled libtool.m4 doesn't handle FreeBSD 10 when building extensions).</li>
  <li>Fixed bug causing exception traces with anon classes to be truncated.</li>
  <li><?php bugfix(70397); ?> (Segmentation fault when using Closure::call and yield).</li>
  <li><?php bugfix(70299); ?> (Memleak while assigning object offsetGet result).</li>
  <li><?php bugfix(70288); ?> (Apache crash related to ZEND_SEND_REF).</li>
  <li><?php bugfix(70262); ?> (Accessing array crashes PHP 7.0beta3).</li>
  <li><?php bugfix(70258); ?> (Segfault if do_resize fails to allocated memory).</li>
  <li><?php bugfix(70253); ?> (segfault at _efree () in zend_alloc.c:1389).</li>
  <li><?php bugfix(70240); ?> (Segfault when doing unset($var());).</li>
  <li><?php bugfix(70223); ?> (Incrementing value returned by magic getter).</li>
  <li><?php bugfix(70215); ?> (Segfault when __invoke is static).</li>
  <li><?php bugfix(70207); ?> (Finally is broken with opcache).</li>
  <li><?php bugfix(70173); ?> (ZVAL_COPY_VALUE_EX broken for 32bit Solaris Sparc).</li>
  <li><?php bugfix(69487); ?> (SAPI may truncate POST data).</li>
  <li><?php bugfix(70198); ?> (Checking liveness does not work as expected).</li>
  <li><?php bugfix(70241); ?>, <?php bugl(70293); ?> (Skipped assertions affect Generator returns).</li>
  <li><?php bugfix(70239); ?> (Creating a huge array doesn't result in exhausted, but segfault).</li>
  <li>Fixed "finally" issues.</li>
  <li><?php bugfix(70098); ?> (Real memory usage doesn't decrease).</li>
  <li><?php bugfix(70159); ?> (__CLASS__ is lost in closures).</li>
  <li><?php bugfix(70156); ?> (Segfault in zend_find_alias_name).</li>
  <li><?php bugfix(70124); ?> (null ptr deref / seg fault in ZEND_HANDLE_EXCEPTION).</li>
  <li><?php bugfix(70117); ?> (Unexpected return type error).</li>
  <li><?php bugfix(70106); ?> (Inheritance by anonymous class).</li>
  <li><?php bugfix(69674); ?> (SIGSEGV array.c:953).</li>
  <li><?php bugfix(70164); ?> (__COMPILER_HALT_OFFSET__ under namespace is not defined).</li>
  <li><?php bugfix(70108); ?> (sometimes empty $_SERVER['QUERY_STRING']).</li>
  <li><?php bugfix(70179); ?> ($this refcount issue).</li>
  <li><?php bugfix(69896); ?> ('asm' operand has impossible constraints).</li>
  <li><?php bugfix(70183); ?> (null pointer deref (segfault) in zend_eval_const_expr).</li>
  <li><?php bugfix(70182); ?> (Segfault in ZEND_ASSIGN_DIV_SPEC_CV_UNUSED_HANDLER).</li>
  <li><?php bugfix(69793); ?> (Remotely triggerable stack exhaustion via recursive method calls).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(70121); ?> (unserialize() could lead to unexpected methods execution / NULL pointer deref).</li>
  <li><?php bugfix(70089); ?> (segfault at ZEND_FETCH_DIM_W_SPEC_VAR_CONST_HANDLER ()).</li>
  <li><?php bugfix(70057); ?> (Build failure on 32-bit Mac OS X 10.6.8: recursive inlining).</li>
  <li><?php bugfix(70012); ?> (Exception lost with nested finally block).</li>
  <li><?php bugfix(69996); ?> (Changing the property of a cloned object affects the original).</li>
  <li><?php bugfix(70083); ?> (Use after free with assign by ref to overloaded objects).</li>
  <li><?php bugfix(70006); ?> (cli - function with default arg = STDOUT crash output).</li>
  <li><?php bugfix(69521); ?> (Segfault in gc_collect_cycles()).</li>
  <li>Improved zend_string API.</li>
  <li><?php bugfix(69955); ?> (Segfault when trying to combine [] and assign-op on ArrayAccess object).</li>
  <li><?php bugfix(69957); ?> (Different ways of handling div/mod/intdiv).</li>
  <li><?php bugfix(69900); ?> (Too long timeout on pipes).</li>
  <li><?php bugfix(69872); ?> (uninitialised value in strtr with array).</li>
  <li><?php bugfix(69868); ?> (Invalid read of size 1 in zend_compile_short_circuiting).</li>
  <li><?php bugfix(69849); ?> (Broken output of apache_request_headers).</li>
  <li><?php bugfix(69840); ?> (iconv_substr() doesn't work with UTF-16BE).</li>
  <li><?php bugfix(69823); ?> (PHP 7.0.0alpha1 segmentation fault when exactly 33 extensions are loaded).</li>
  <li><?php bugfix(69805); ?> (null ptr deref and seg fault in zend_resolve_class_name).</li>
  <li><?php bugfix(69802); ?> (Reflection on Closure::__invoke borks type hint class name).</li>
  <li><?php bugfix(69761); ?> (Serialization of anonymous classes should be prevented).</li>
  <li><?php bugfix(69551); ?> (parse_ini_file() and parse_ini_string() segmentation fault).</li>
  <li><?php bugfix(69781); ?> (phpinfo() reports Professional Editions of Windows 7/8/8.1/10 as "Business").</li>
  <li><?php bugfix(69835); ?> (phpinfo() does not report many Windows SKUs).</li>
  <li><?php bugfix(69889); ?> (Null coalesce operator doesn't work for string offsets).</li>
  <li><?php bugfix(69891); ?> (Unexpected array comparison result).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(69893); ?> (Strict comparison between integer and empty string keys crashes).</li>
  <li><?php bugfix(69767); ?> (Default parameter value with wrong type segfaults).</li>
  <li><?php bugfix(69756); ?> (Fatal error: Nesting level too deep - recursive dependency ? with ===).</li>
  <li><?php bugfix(69758); ?> (Item added to array not being removed by array_pop/shift ).</li>
  <li><?php bugfix(68475); ?> (Add support for $callable() sytnax with 'Class::method').</li>
  <li><?php bugfix(69485); ?> (Double free on zend_list_dtor).</li>
  <li><?php bugfix(69427); ?> (Segfault on magic method __call of private method in superclass).</li>
  <li>Improved __call() and __callStatic() magic method handling. Now they are called in a stackless way using ZEND_CALL_TRAMPOLINE opcode, without additional stack frame.</li>
  <li>Optimized strings concatenation.</li>
  <li>Fixed weird operators behavior. Division by zero now emits warning and returns +/-INF, modulo by zero and intdid() throws an exception, shifts by negative offset throw exceptions. Compile-time evaluation of division by zero is disabled.</li>
  <li><?php bugfix(69371); ?> (Hash table collision leads to inaccessible array keys).</li>
  <li><?php bugfix(68933); ?> (Invalid read of size 8 in zend_std_read_property).</li>
  <li><?php bugfix(68252); ?> (segfault in Zend/zend_hash.c in function _zend_hash_del_el).</li>
  <li><?php bugfix(65598); ?> (Closure executed via static autoload incorrectly marked as static).</li>
  <li><?php bugfix(66811); ?> (Cannot access static::class in lambda, writen outside of a class).</li>
  <li><?php bugfix(69568); ?> (call a private function in closure failed).</li>
  <li>Added PHP_INT_MIN constant.</li>
  <li>Added Closure::call() method.</li>
  <li><?php bugfix(67959); ?> (Segfault when calling phpversion('spl')).</li>
  <li>Implemented the RFC `Catchable "Call to a member function bar() on a non-object"`.</li>
  <li>Added options parameter for unserialize allowing to specify acceptable classes (https://wiki.php.net/rfc/secure_unserialize).</li>
  <li><?php bugfix(63734); ?> (Garbage collector can free zvals that are still referenced).</li>
  <li>Removed ZEND_ACC_FINAL_CLASS, promoting ZEND_ACC_FINAL as final class modifier.</li>
  <li>is_long() &amp; is_integer() is now an alias of is_int().</li>
  <li><?php implemented(55467); ?> (phpinfo: PHP Variables with $ and single quotes).</li>
  <li>Added ?? operator.</li>
  <li>Added &lt;=&gt; operator.</li>
  <li>Added \u{xxxxx} Unicode Codepoint Escape Syntax.</li>
  <li>Fixed oversight where define() did not support arrays yet const syntax did.</li>
  <li>Use "integer" and "float" instead of "long" and "double" in ZPP, type hint and conversion error messages.</li>
  <li><?php implemented(55428); ?> (E_RECOVERABLE_ERROR when output buffering in output buffering handler).</li>
  <li>Removed scoped calls of non-static methods from an incompatible $this context.</li>
  <li>Removed support for #-style comments in ini files.</li>
  <li>Removed support for assigning the result of new by reference.</li>
  <li>Invalid octal literals in source code now produce compile errors, fixes PHPSadness #31.</li>
  <li>Removed dl() function on fpm-fcgi.</li>
  <li>Removed support for hexadecimal numeric strings.</li>
  <li>Removed obsolete extensions and SAPIs. See the full list in UPGRADING.</li>
  <li>Added NULL byte protection to exec, system and passthru.</li>
  <li>Added error_clear_last() function.</li>
  <li><?php bugfix(68797); ?> (Number 2.2250738585072012e-308 converted incorrectly).</li>
  <li>Improved zend_qsort(using hybrid sorting algo) for better performance, and also renamed zend_qsort to zend_sort.</li>
  <li>Added stable sorting algo zend_insert_sort.</li>
  <li>Improved zend_memnchr(using sunday algo) for better performance.</li>
  <li>Implemented the RFC `Scalar Type Decalarations v0.5`.</li>
  <li>Implemented the RFC `Group Use Declarations`.</li>
  <li>Implemented the RFC `Continue Output Buffering`.</li>
  <li>Implemented the RFC `Constructor behaviour of internal classes`.</li>
  <li>Implemented the RFC `Fix "foreach" behavior`.</li>
  <li>Implemented the RFC `Generator Delegation`.</li>
  <li>Implemented the RFC `Anonymous Class Support`.</li>
  <li>Implemented the RFC `Context Sensitive Lexer`.</li>
  <li><?php bugfix(69511); ?> (Off-by-one buffer overflow in php_sys_readlink).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(68291); ?> (404 on urls with '+').</li>
  <li><?php bugfix(66606); ?> (Sets HTTP_CONTENT_TYPE but not CONTENT_TYPE).</li>
  <li><?php bugfix(70264); ?> (CLI server directory traversal).</li>
  <li><?php bugfix(69655); ?> (php -S changes MKCALENDAR request method to MKCOL).</li>
  <li><?php bugfix(64878); ?> (304 responses return Content-Type header).</li>
  <li>Refactor MIME type handling to use a hash table instead of linear search.</li>
  <li>Update the MIME type list from the one shipped by Apache HTTPD.</li>
  <li>Added support for SEARCH WebDav method.</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(69939); ?> (Casting object to bool returns false).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(70330); ?> (Segmentation Fault with multiple "curl_copy_handle").</li>
  <li><?php bugfix(70163); ?> (curl_setopt_array() type confusion).</li>
  <li><?php bugfix(70065); ?> (curl_getinfo() returns corrupted values).</li>
  <li><?php bugfix(69831); ?> (Segmentation fault in curl_getinfo).</li>
  <li><?php bugfix(68937); ?> (Segfault in curl_multi_exec).</li>
  <li>Removed support for unsafe file uploads.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70245); ?> (strtotime does not emit warning when 2nd parameter is object or string).</li>
  <li><?php bugfix(70266); ?> (DateInterval::__construct.interval_spec is not supposed to be optional).</li>
  <li><?php bugfix(70277); ?> (new DateTimeZone($foo) is ignoring text after null byte).</li>
  <li>Fixed day_of_week function as it could sometimes return negative values internally.</li>
  <li>Removed $is_dst parameter from mktime() and gmmktime().</li>
  <li>Removed date.timezone warning (https://wiki.php.net/rfc/date.timezone_warning_removal).</li>
  <li>Added "v" DateTime format modifier to get the 3-digit version of fraction of seconds.</li>
  <li><?php implemented(69089); ?> (Added DateTime::RFC3339_EXTENDED to output in RFC3339 Extended format which includes fraction of seconds).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(62490); ?> (dba_delete returns true on missing item (inifile)).</li>
  <li><?php bugfix(68711); ?> (useless comparisons).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(70558); ?> ("Couldn't fetch" error in DOMDocument::registerNodeClass()).</li>
  <li><?php bugfix(70001); ?> (Assigning to DOMNode::textContent does additional entity encoding).</li>
  <li><?php bugfix(69846); ?> (Segmenation fault (access violation) when iterating over DOMNodeList).</li>
  <li>Made DOMNode::textContent writeable.</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(70385); ?> (Buffer over-read in exif_read_data with TIFF IFD tag byte value of 32 bytes).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66242); ?> (libmagic: don't assume char is signed).</li>
</ul></li>
<li>Filter:
<ul>
  <li>New FILTER_VALIDATE_DOMAIN and better RFC conformance for FILTER_VALIDATE_URL.</li>
  <li><?php bugfix(67167);?> 	(Wrong return value from FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(70538); ?> ("php-fpm -i" crashes).</li>
  <li><?php bugfix(70279); ?> (HTTP Authorization Header is sometimes passed to newer reqeusts).</li>
  <li><?php bugfix(68945); ?> (Unknown admin values segfault pools).</li>
  <li><?php bugfix(65933); ?> (Cannot specify config lines longer than 1024 bytes).</li>
  <li><?php implemented(67106); ?> (Split main fpm config).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(69082); ?> (FTPS support on Windows).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(53156); ?> (imagerectangle problem with point ordering).</li>
  <li><?php bugfix(66387); ?> (Stack overflow with imagefilltoborder). (CVE-2015-8874)</li>
  <li><?php bugfix(70102); ?> (imagecreatefromwebm() shifts colors).</li>
  <li><?php bugfix(66590); ?> (imagewebp() doesn't pad to even length).</li>
  <li><?php bugfix(66882); ?> (imagerotate by -90 degrees truncates image by 1px).</li>
  <li><?php bugfix(70064); ?> (imagescale(..., IMG_BICUBIC) leaks memory).</li>
  <li><?php bugfix(69024); ?> (imagescale segfault with palette based image).</li>
  <li><?php bugfix(53154); ?> (Zero-height rectangle has whiskers).</li>
  <li><?php bugfix(67447); ?> (imagecrop() add a black line when cropping).</li>
  <li><?php bugfix(68714); ?> (copy 'n paste error).</li>
  <li><?php bugfix(66339); ?> (PHP segfaults in imagexbm).</li>
  <li><?php bugfix(70047); ?> (gd_info() doesn't report WebP support).</li>
  <li>Replace libvpx with libwebp for bundled libgd.</li>
  <li><?php bugfix(61221); ?> (imagegammacorrect function loses alpha channel).</li>
  <li>Made fontFetch's path parser thread-safe.</li>
  <li>Removed T1Lib support.</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(70284); ?> (Use after free vulnerability in unserialize() with GMP).</li>
</ul></li>
<li>hash:
<ul>
  <li><?php bugfix(70312); ?> (HAVAL gives wrong hashes in specific cases).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(70158); ?> (Building with static imap fails).</li>
  <li><?php bugfix(69998); ?> (curl multi leaking memory).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(70453); ?> (IntlChar::foldCase() incorrect arguments and missing constants).</li>
  <li><?php bugfix(70454); ?> (IntlChar::forDigit second parameter should be optional).</li>
  <li>Removed deprecated aliases datefmt_set_timezone_id() and IntlDateFormatter::setTimeZoneID().</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(62010); ?> (json_decode produces invalid byte-sequences).</li>
  <li><?php bugfix(68546); ?> (json_decode() Fatal error: Cannot access property started with '\0').</li>
  <li>Replace non-free JSON parser with a parser from Jsond extension, fixes <?php bugl(63520); ?> (JSON extension includes a problematic license statement).</li>
  <li><?php bugfix(68938); ?> (json_decode() decodes empty string without error).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(47222); ?> (Implement LDAP_OPT_DIAGNOSTIC_MESSAGE).</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated LiteSpeed SAPI code from V5.5 to V6.6.</li>
</ul></li>
<li>libxml:
<ul>
  <li>Fixed handling of big lines in error messages with libxml &gt;= 2.9.0.</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li><?php bugfix(70625); ?> (mcrypt_encrypt() won't return data when no IV was specified under RC4).</li>
  <li><?php bugfix(69833); ?> (mcrypt fd caching not working).</li>
  <li>Fixed possible read after end of buffer and use after free.</li>
  <li>Removed mcrypt_generic_end() alias.</li>
  <li>Removed mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb(), mcrypt_ofb().</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(32490); ?> (constructor of mysqli has wrong name).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(70949); ?> (SQL Result Sets With NULL Can Cause Fatal Memory Errors).</li>
  <li><?php bugfix(70384); ?> (mysqli_real_query():Unknown type 245 sent by the server).</li>
  <li><?php bugfix(70456); ?> (mysqlnd doesn't activate TCP keep-alive when connecting to a server).</li>
  <li><?php bugfix(70572); ?> segfault in mysqlnd_connect.</li>
  <li><?php bugfix(69796); ?> (mysqli_stmt::fetch doesn't assign null values to bound variables).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed memory leak with LOBs.</li>
  <li><?php bugfix(68298); ?> (OCI int overflow).</li>
  <li>Corrected oci8 hash destructors to prevent segfaults, and a few other fixes.</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69975); ?> (PHP segfaults when accessing nvarchar(max) defined columns. (CVE-2015-8879)</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70656); ?> (require() statement broken after opcache_reset() or a few hours of use).</li>
  <li><?php bugfix(70843); ?> (Segmentation fault on MacOSX with opcache.file_cache_only=1).</li>
  <li><?php bugfix(70724); ?> (Undefined Symbols from opcache.so on Mac OS X 10.10).</li>
  <li>Fixed compatibility with Windows 10 (see also bug <?php bugl(70652); ?>).</li>
  <li>Attmpt to fix "Unable to reattach to base address" problem.</li>
  <li><?php bugfix(70423); ?> (Warning Internal error: wrong size calculation).</li>
  <li><?php bugfix(70237); ?> (Empty while and do-while segmentation fault with opcode on CLI enabled).</li>
  <li><?php bugfix(70111); ?> (Segfault when a function uses both an explicit return type and an explicit cast).</li>
  <li><?php bugfix(70058); ?> (Build fails when building for i386).</li>
  <li><?php bugfix(70022); ?> (Crash with opcache using opcache.file_cache_only=1).</li>
  <li>Removed opcache.load_comments configuration directive. Now doc comments loading costs nothing and always enabled.</li>
  <li><?php bugfix(69838); ?> (Wrong size calculation for function table).</li>
  <li><?php bugfix(69688); ?> (segfault with eval and opcache fast shutdown).</li>
  <li>Added experimental (disabled by default) file based opcode cache.</li>
  <li>Fixed bug with try blocks being removed when extended_info opcode generation is turned on.</li>
  <li><?php bugfix(68644); ?> (strlen incorrect : mbstring + func_overload=2 +UTF-8 + Opcache).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Require at least OpenSSL version 0.9.8.</li>
  <li><?php bugfix(68312); ?> (Lookup for openssl.cnf causes a message box).</li>
  <li><?php bugfix(55259); ?> (openssl extension does not get the DH parameters from DH key resource).</li>
  <li><?php bugfix(70395); ?> (Missing ARG_INFO for openssl_seal()).</li>
  <li><?php bugfix(60632); ?> (openssl_seal fails with AES).</li>
  <li><?php implemented(70438); ?> (Add IV parameter for openssl_seal and openssl_open).</li>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure). (CVE-2015-8867)</li>
  <li><?php bugfix(69882); ?> (OpenSSL error "key values mismatch" after openssl_pkcs12_read with extra cert).</li>
  <li>Added "alpn_protocols" SSL context option allowing encrypted client/server streams to negotiate alternative protocols using the ALPN TLS extension when built against OpenSSL 1.0.2 or newer. Negotiated protocol information is accessible through stream_get_meta_data() output.</li>
  <li>Removed "CN_match" and "SNI_server_name" SSL context options. Use automatic detection or the "peer_name" option instead.</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(70386); ?> (Can't compile on NetBSD because of missing WCONTINUED and WIFCONTINUED).</li>
  <li><?php bugfix(60509); ?> (pcntl_signal doesn't decrease ref-count of old handler when setting SIG_DFL).</li>
  <li><?php implemented(68505); ?> (Added wifcontinued and wcontinued).</li>
  <li>Added rusage support to pcntl_wait() and pcntl_waitpid().</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(70232); ?> (Incorrect bump-along behavior with \K and empty string match).</li>
  <li><?php bugfix(70345); ?> (Multiple vulnerabilities related to PCRE functions).</li>
  <li><?php bugfix(70232); ?> (Incorrect bump-along behavior with \K and empty string match).</li>
  <li><?php bugfix(53823); ?> (preg_replace: * qualifier on unicode replace garbles the string).</li>
  <li><?php bugfix(69864); ?> (Segfault in preg_replace_callback).</li>
  <li>Removed support for the /e (PREG_REPLACE_EVAL) modifier.</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(70861); ?> (Segmentation fault in pdo_parse_params() during Drupal 8 test suite).</li>
  <li><?php bugfix(70389); ?> (PDO constructor changes unrelated variables).</li>
  <li><?php bugfix(70272); ?> (Segfault in pdo_mysql).</li>
  <li><?php bugfix(70221); ?> (persistent sqlite connection + custom function segfaults).</li>
  <li><?php bugfix(59450); ?> (./configure fails with "Cannot find php_pdo_driver.h").</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(69757); ?> (Segmentation fault on nextRowset).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68424); ?> (Add new PDO mysql connection attr to control multi statements option).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(70308); ?> (PDO::ATTR_PREFETCH is ignored).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(69752); ?> (PDOStatement::execute() leaks memory with DML Statements when closeCuror() is u).</li>
  <li>Removed PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT attribute in favor of ATTR_EMULATE_PREPARES).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69720); ?> (Null pointer dereference in phar_get_fp_offset()).</li>
  <li><?php bugfix(70433); ?> (Uninitialized pointer in phar_make_dirstream when zip entry filename is "/").</li>
  <li>Improved fix for bug <?php bugl(69441); ?>.</li>
  <li><?php bugfix(70019); ?> (Files extracted from archive may be placed outside of destination directory).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(70614); ?> (incorrect exit code in -rr mode with Exceptions).</li>
  <li><?php bugfix(70532); ?> (phpdbg must respect set_exception_handler).</li>
  <li><?php bugfix(70531); ?> (Run and quit mode (-qrr) should not fallback to interactive mode).</li>
  <li><?php bugfix(70533); ?> (Help overview (-h) does not rpint anything under Windows).</li>
  <li><?php bugfix(70449); ?> (PHP won't compile on 10.4 and 10.5 because of missing constants).</li>
  <li><?php bugfix(70214); ?> (FASYNC not defined, needs sys/file.h include).</li>
  <li><?php bugfix(70138); ?> (Segfault when displaying memory leaks).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(70650); ?> (Wrong docblock assignment).</li>
  <li><?php bugfix(70674); ?> (ReflectionFunction::getClosure() leaks memory when used for internal functions).</li>
  <li>Fixed bug causing bogus traces for ReflectionGenerator::getTrace().</li>
  <li>Fixed inheritance chain of Reflector interface.</li>
  <li>Added ReflectionGenerator class.</li>
  <li>Added reflection support for return types and type declarations.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(70876); ?> (Segmentation fault when regenerating session id with strict mode).</li>
  <li><?php bugfix(70529); ?> (Session read causes "String is not zero-terminated" error).</li>
  <li><?php bugfix(70013); ?> (Reference to $_SESSION is lost after a call to session_regenerate_id()).</li>
  <li><?php bugfix(69952); ?> (Data integrity issues accessing superglobals by reference).</li>
  <li><?php bugfix(67694); ?> (Regression in session_regenerate_id()).</li>
  <li><?php bugfix(68941); ?> (mod_files.sh is a bash-script).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70940); ?> (Segfault in soap / type_to_string).</li>
  <li><?php bugfix(70900); ?> (SoapClient systematic out of memory error).</li>
  <li><?php bugfix(70875); ?> (Segmentation fault if wsdl has no targetNamespace attribute).</li>
  <li><?php bugfix(70715); ?> (Segmentation fault inside soap client).</li>
  <li><?php bugfix(70709); ?> (SOAP Client generates Segfault).</li>
  <li><?php bugfix(70388); ?> (SOAP serialize_function_call() type confusion / RCE).</li>
  <li><?php bugfix(70081); ?> (SoapClient info leak / null pointer dereference via multiple type confusions).</li>
  <li><?php bugfix(70079); ?> (Segmentation fault after more than 100 SoapClient calls).</li>
  <li><?php bugfix(70032); ?> (make_http_soap_request calls zend_hash_get_current_key_ex(,,,NULL).</li>
  <li><?php bugfix(68361); ?> (Segmentation fault on SoapClient::__getTypes).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70959); ?> (ArrayObject unserialize does not restore protected fields).</li>
  <li><?php bugfix(70853); ?> (SplFixedArray throws exception when using ref variable as index).</li>
  <li><?php bugfix(70868); ?> (PCRE JIT and pattern reuse segfault).</li>
  <li><?php bugfix(70730); ?> (Incorrect ArrayObject serialization if unset is called in serialize()).</li>
  <li><?php bugfix(70573); ?> (Cloning SplPriorityQueue leads to memory leaks).</li>
  <li><?php bugfix(70303); ?> (Incorrect constructor reflection for ArrayObject).</li>
  <li><?php bugfix(70068); ?> (Dangling pointer in the unserialization of ArrayObject items).</li>
  <li><?php bugfix(70166); ?> (Use After Free Vulnerability in unserialize() with SPLArrayObject).</li>
  <li><?php bugfix(70168); ?> (Use After Free Vulnerability in unserialize() with SplObjectStorage).</li>
  <li><?php bugfix(70169); ?> (Use After Free Vulnerability in unserialize() with SplDoublyLinkedList).</li>
  <li><?php bugfix(70053); ?> (MutlitpleIterator array-keys incompatible change in PHP 7).</li>
  <li><?php bugfix(69970); ?> (Use-after-free vulnerability in spl_recursive_it_move_forward_ex()).</li>
  <li><?php bugfix(69845); ?> (ArrayObject with ARRAY_AS_PROPS broken).</li>
  <li>Changed ArrayIterator implementation using zend_hash_iterator_... API. Allowed modification of iterated ArrayObject using the same behavior as proposed in `Fix "foreach" behavior`. Removed "Array was modified outside object and internal position is no longer valid" hack.</li>
  <li><?php implemented(67886); ?> (SplPriorityQueue/SplHeap doesn't expose extractFlags nor curruption state).</li>
  <li><?php bugfix(66405); ?> (RecursiveDirectoryIterator::CURRENT_AS_PATHNAME breaks the RecursiveIterator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(70571); ?> (Memory leak in sqlite3_do_callback).</li>
  <li><?php bugfix(69972); ?> (Use-after-free vulnerability in sqlite3SafetyCheckSickOrOk()).</li>
  <li><?php bugfix(69897); ?> (segfault when manually constructing SQLite3Result).</li>
  <li><?php bugfix(68260); ?> (SQLite3Result::fetchArray declares wrong required_num_args).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed count on symbol tables.</li>
  <li><?php bugfix(70963); ?> (Unserialize shows UNKNOWN in result).</li>
  <li><?php bugfix(70910); ?> (extract() breaks variable references).</li>
  <li><?php bugfix(70808); ?> (array_merge_recursive corrupts memory of unset items).</li>
  <li><?php bugfix(70667); ?> (strtr() causes invalid writes and a crashes).</li>
  <li><?php bugfix(70668); ?> (array_keys() doesn't respect references when $strict is true).</li>
  <li>Implemented the RFC `Random Functions Throwing Exceptions in PHP 7`.</li>
  <li><?php bugfix(70487); ?> (pack('x') produces an error).</li>
  <li><?php bugfix(70342); ?> (changing configuration with ignore_user_abort(true) isn't working).</li>
  <li><?php bugfix(70295); ?> (Segmentation fault with setrawcookie).</li>
  <li><?php bugfix(67131); ?> (setcookie() conditional for empty values not met).</li>
  <li><?php bugfix(70365); ?> (Use-after-free vulnerability in unserialize() with SplObjectStorage).</li>
  <li><?php bugfix(70366); ?> (Use-after-free vulnerability in unserialize() with SplDoublyLinkedList).</li>
  <li><?php bugfix(70250); ?> (extract() turns array elements to references).</li>
  <li><?php bugfix(70211); ?> (php 7 ZEND_HASH_IF_FULL_DO_RESIZE use after free).</li>
  <li><?php bugfix(70208); ?> (Assert breaking access on objects).</li>
  <li><?php bugfix(70140); ?> (str_ireplace/php_string_tolower - Arbitrary Code Execution).</li>
  <li><?php implemented(70112); ?> (Allow "dirname" to go up various times).</li>
  <li><?php bugfix(36365); ?> (scandir duplicates file name at every 65535th file).</li>
  <li><?php bugfix(70096); ?> (Repeated iptcembed() adds superfluous FF bytes).</li>
  <li><?php bugfix(70018); ?> (exec does not strip all whitespace).</li>
  <li><?php bugfix(69983); ?> (get_browser fails with user agent of null).</li>
  <li><?php bugfix(69976); ?> (Unable to parse "all" urls with colon char).</li>
  <li><?php bugfix(69768); ?> (escapeshell*() doesn't cater to !).</li>
  <li><?php bugfix(62922); ?> (Truncating entire string should result in string).</li>
  <li><?php bugfix(69723); ?> (Passing parameters by reference and array_column).</li>
  <li><?php bugfix(69523); ?> (Cookie name cannot be empty).</li>
  <li><?php bugfix(69325); ?> (php_copy_file_ex does not pass the argument).</li>
  <li><?php bugfix(69299); ?> (Regression in array_filter's $flag argument in PHP 7).</li>
  <li>Removed call_user_method() and call_user_method_array() functions.</li>
  <li>Fixed user session handlers (See rfc:session.user.return-value).</li>
  <li>Added intdiv() function.</li>
  <li>Improved precision of log() function for base 2 and 10.</li>
  <li>Remove string category support in setlocale().</li>
  <li>Remove set_magic_quotes_runtime() and its alias magic_quotes_runtime().</li>
  <li><?php bugfix(65272); ?> (flock() out parameter not set correctly in windows).</li>
  <li>Added preg_replace_callback_array function.</li>
  <li>Deprecated salt option to password_hash.</li>
  <li><?php bugfix(69686); ?> (password_verify reports back error on PHP7 will null string).</li>
  <li>Added Windows support for getrusage().</li>
  <li>Removed hardcoded limit on number of pipes in proc_open().</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(70361); ?> (HTTP stream wrapper doesn't close keep-alive connections).</li>
  <li><?php bugfix(68532); ?> (convert.base64-encode omits padding bytes).</li>
  <li>Removed set_socket_blocking() in favor of its alias stream_set_blocking().</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(69430); ?> (token_get_all has new irrecoverable errors).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(70309); ?> (XmlReader read generates extra output).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(70526); ?> (xmlrpc_set_type returns false on success).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(70678); ?> (PHP7 returns true when false is expected).</li>
  <li><?php bugfix(70535); ?> (XSLT: free(): invalid pointer).</li>
  <li><?php bugfix(69782); ?> (NULL pointer dereference).</li>
  <li><?php bugfix(64776); ?> (The XSLT extension is not thread safe).</li>
  <li>Removed xsl.security_prefs ini option.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Added deflate_init(), deflate_add(), inflate_init(), inflate_add() functions allowing incremental/streaming compression/decompression.</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(70322); ?> (ZipArchive::close() doesn't indicate errors).</li>
  <li><?php bugfix(70350); ?> (ZipArchive::extractTo allows for directory traversal when creating directories). (CVE-2014-9767)</li>
  <li>Added ZipArchive::setCompressionName and ZipArchive::setCompressionIndex methods.</li>
  <li>Update bundled libzip to 1.0.1.</li>
  <li><?php bugfix(67161); ?> (ZipArchive::getStream() returns NULL for certain file).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<?php
changelog_footer(7, $MINOR_VERSIONS);
