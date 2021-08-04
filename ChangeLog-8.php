<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-8.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['8.0'];
changelog_header(8, $MINOR_VERSIONS);
?>
<a id="PHP_8_0"></a>

<section class="version" id="8.0.9"><!-- {{{ 8.0.9 -->
<h3>Version 8.0.9</h3>
<b><?php release_date('29-Jul-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81145); ?> (copy() and stream_copy_to_stream() fail for +4GB files).</li>
  <li><?php bugfix(81163); ?> (incorrect handling of indirect vars in __sleep).</li>
  <li><?php bugfix(81159); ?> (Object to int warning when using an object as a string offset).</li>
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
<li>Reflection:
<ul>
  <li><?php bugfix(81208); ?> (Segmentation fault while create newInstance from attribute).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81223); ?> (flock() only locks first byte of file).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.8"><!-- {{{ 8.0.8 -->
<h3>Version 8.0.8</h3>
<b><?php release_date('01-Jul-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81076); ?> (incorrect debug info on Closures with implicit binds).</li>
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
<li>Fileinfo:
<ul>
  <li><?php bugfix(80197); ?> (implicit declaration of function 'magic_stream' is invalid).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(81119); ?> (GMP operators throw errors with wrong parameter names).</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(81088); ?> (error in regression test for oci_fetch_object() and oci_fetch_array()).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81051); ?> (Broken property type handling after incrementing reference).</li>
  <li><?php bugfix(80968); ?> (JIT segfault with return from required file).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(76694); ?> (native Windows cert verification uses CN as server name).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(80761); ?> (PDO uses too much memory).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(76448); ?> (Stack buffer overflow in firebird_info_cb). (CVE-2021-21704)</li>
  <li><?php bugfix(76449); ?> (SIGSEGV in firebird_handle_doer). (CVE-2021-21704)</li>
  <li><?php bugfix(76450); ?> (SIGSEGV in firebird_stmt_execute). (CVE-2021-21704)</li>
  <li><?php bugfix(76452); ?> (Crash while parsing blob data in firebird_fetch_blob). (CVE-2021-21704)</li>
</ul></li>
<li>readline:
<ul>
  <li><?php bugfix(72998); ?> (invalid read in readline completion).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81048); ?> (phpinfo(INFO_VARIABLES) "Array to string conversion").</li>
  <li><?php bugfix(77627); ?> (method_exists on Closure::__invoke inconsistency).</li>
</ul></li>
<li>Windows:
<ul>
  <li><?php bugfix(81120); ?> (PGO data for main PHP DLL are not used).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.7"><!-- {{{ 8.0.7 -->
<h3>Version 8.0.7</h3>
<b><?php release_date('03-Jun-2021'); ?></b>
<ul><li>Core:
<ul>
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
<li>Intl:
<ul>
  <li><?php bugfix(81019); ?> (Unable to clone NumberFormatter after failed parse()).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(81011); ?> (mb_convert_encoding removes references from arrays).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(80460); ?> (ODBC doesn't account for SQL_NO_TOTAL indicator).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81007); ?> (JIT "not supported" on 32-bit x86 -- build problem?).</li>
  <li><?php bugfix(81015); ?> (Opcache optimization assumes wrong part of ternary operator in if-condition).</li>
  <li><?php bugfix(81046); ?> (Literal compaction merges non-equal related literals).</li>
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



<section class="version" id="8.0.6"><!-- {{{ 8.0.6 -->
<h3>Version 8.0.6</h3>
<b><?php release_date('06-May-2021'); ?></b>
<ul><li>PDO_pgsql:
<ul>
  <li>Revert "<?php bugfix(80892); ?> (PDO::PARAM_INT is treated the same as PDO::PARAM_STR)"</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.5"><!-- {{{ 8.0.5 -->
<h3>Version 8.0.5</h3>
<b><?php release_date('29-Apr-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(75776); ?> (Flushing streams with compression filter is broken).</li>
  <li><?php bugfix(80811); ?> (Function exec without $output but with $restult_code parameter crashes).</li>
  <li><?php bugfix(80814); ?> (threaded mod_php won't load on FreeBSD: No space available for static Thread Local Storage).</li>
  <li>Changed PowerPC CPU registers used by Zend VM to work around GCC bug. Old registers (r28/r29) might be clobbered by _restgpr routine used for return from C function compiled with -Os.</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(80817); ?> (dba_popen() may cause segfault during RSHUTDOWN).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(66783); ?> (UAF when appending DOMDocument to element).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(80847); ?> (CData structs with fields of type struct can't be passed as C function argument).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(80024); ?> (Duplication of info about inherited socket after pool removing).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(80880); ?> (SSL_read on shutdown, ftp/proc_open).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(80800); ?> (imap_open() fails when the flags parameter includes CL_EXPUNGE).</li>
  <li><?php bugfix(80710); ?> (imap_mail_compose() header injection).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80763); ?> (msgfmt_format() does not accept DateTime references).</li>
</ul></li>
<li>LibXML:
<ul>
  <li><?php bugfix(73533); ?> (Invalid memory access in php_libxml_xmlCheckUTF8).</li>
  <li><?php bugfix(51903); ?> (simplexml_load_file() doesn't use HTTP headers).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(80837); ?> (Calling stmt_store_result after fetch doesn't throw an error).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80839); ?> (PHP problem with JIT).</li>
  <li><?php bugfix(80861); ?> (erronous array key overflow in 2D array with JIT).</li>
  <li><?php bugfix(80786); ?> (PHP crash using JIT).</li>
  <li><?php bugfix(80782); ?> (DASM_S_RANGE_VREG on PHP_INT_MIN-1).</li>
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
<li>Session:
<ul>
  <li><?php bugfix(80889); ?> (Cannot set save handler when save_handler is invalid).</li>
  <li><?php bugfix(80774); ?> (session_name() problem with backslash).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69668); ?> (SOAP special XML characters in namespace URIs not encoded).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80915); ?> (Taking a reference to $_SERVER hides its values from phpinfo()).</li>
  <li><?php bugfix(80914); ?> ('getdir' accidentally defined as an alias of 'dir').</li>
  <li><?php bugfix(80771); ?> (phpinfo(INFO_CREDITS) displays nothing in CLI).</li>
  <li><?php bugfix(78719); ?> (http wrapper silently ignores long Location headers).</li>
  <li><?php bugfix(80838); ?> (HTTP wrapper waits for HTTP 1 response after HTTP 101).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(80825); ?> (ZipArchive::isCompressionMethodSupported does not exist).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.3"><!-- {{{ 8.0.3 -->
<h3>Version 8.0.3</h3>
<b><?php release_date('04-Mar-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80706); ?> (mail(): Headers after Bcc headers may be ignored).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80600); ?> (DOMChildNode::remove() doesn't work on CharacterData nodes).</li>
</ul></li>
<li>Gettext:
<ul>
  <li><?php bugfix(53251); ?> (bindtextdomain with null dir doesn't return old value).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(78680); ?> (mysqlnd's mysql_clear_password does not transmit null-terminated password).</li>
  <li><?php bugfix(80713); ?> (SegFault when disabling ATTR_EMULATE_PREPARES and MySQL 8.0).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74779); ?> (x() and y() truncating floats to integers).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80634); ?> (write_property handler of internal classes is skipped on preloaded JITted code).</li>
  <li><?php bugfix(80682); ?> (opcache doesn't honour pcre.jit option).</li>
  <li><?php bugfix(80742); ?> (Opcache JIT makes some boolean logic unexpectedly be true).</li>
  <li><?php bugfix(80745); ?> (JIT produces Assert failure and UNKNOWN:0 var_dumps in code involving bitshifts).</li>
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
<li>Socket:
<ul>
  <li><?php bugfix(80723); ?> (Different sockets compare as equal (regression in 8.0)).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80719); ?> (Iterating after failed ArrayObject::setIteratorClass() causes Segmentation fault).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80654); ?> (file_get_contents() maxlen fails above (2**31)-1 bytes).</li>
  <li><?php bugfix(80718); ?> (ext/standard/dl.c fallback code path with syntax error).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.2"><!-- {{{ 8.0.2 -->
<h3>Version 8.0.2</h3>
<b><?php release_date('04-Feb-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80523); ?> (bogus parse error on &gt;4GB source code).</li>
  <li><?php bugfix(80384); ?> (filter buffers entire read until file closed).</li>
  <li><?php bugfix(80596); ?> (Invalid union type TypeError in anonymous classes).</li>
  <li><?php bugfix(80617); ?> (GCC throws warning about type narrowing in ZEND_TYPE_INIT_CODE).</li>
</ul></li>
<li>BCMath:
<ul>
  <li><?php bugfix(80545); ?> (bcadd('a', 'a') doesn't throw an exception).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(80595); ?> (Resetting POSTFIELDS to empty array breaks request).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(80376); ?> (last day of the month causes runway cpu usage).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80537); ?> (Wrong parameter type in DOMElement::removeAttributeNode stub).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(80584); ?> (0x and 0X are considered valid hex numbers by filter_var()).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(80560); ?> (Strings containing only a base prefix return 0 object).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80644); ?> (Missing resource causes subsequent get() calls to fail).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(67983); ?> (mysqlnd with MYSQLI_OPT_INT_AND_FLOAT_NATIVE fails to interpret bit columns).</li>
  <li><?php bugfix(64638); ?> (Fetching resultsets from stored procedure with cursor fails).</li>
  <li><?php bugfix(72862); ?> (segfault using prepared statements on stored procedures that use a cursor).</li>
  <li><?php bugfix(77935); ?> (Crash in mysqlnd_fetch_stmt_row_cursor when calling an SP with a cursor).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(80592); ?> (all floats are the same in ODBC parameters).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80422); ?> (php_opcache.dll crashes when using Apache 2.4 with JIT).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(80521); ?> (Parameters with underscores no longer recognized).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76929); ?> (zip-based phar does not respect phar.require_hash).</li>
  <li><?php bugfix(77565); ?> (Incorrect locator detection in ZIP-based phars).</li>
  <li><?php bugfix(69279); ?> (Compressed ZIP Phar extractTo() creates garbage files).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li>Reverted fix for bug <?php bugl(76813); ?> (Access violation near NULL on source operand).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(80672); ?> (Null Dereference in SoapClient). (CVE-2021-21702)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.1"><!-- {{{ 8.0.1 -->
<h3>Version 8.0.1</h3>
<b><?php release_date('07-Jan-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(80345); ?> (PHPIZE configuration has outdated PHP_RELEASE_VERSION).</li>
  <li><?php bugfix(72964); ?> (White space not unfolded for CC/Bcc headers).</li>
  <li><?php bugfix(80391); ?> (Iterable not covariant to mixed).</li>
  <li><?php bugfix(80393); ?> (Build of PHP extension fails due to configuration gap with libtool).</li>
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
<li>IMAP:
<ul>
  <li><?php bugfix(80438); ?> (imap_msgno() incorrectly warns and return false on valid UIDs in PHP 8).</li>
  <li>Fix a regression with valid UIDs in imap_savebody().</li>
  <li>Make warnings for invalid message numbers/UIDs between functions consistent.</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(80425); ?> (MessageFormatAdapter::getArgTypeList redefined).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(80404); ?> (Incorrect range inference result when division results in float).</li>
  <li><?php bugfix(80377); ?> (Opcache misses executor_globals).</li>
  <li><?php bugfix(80433); ?> (Unable to disable the use of the AVX command when using JIT).</li>
  <li><?php bugfix(80447); ?> (Strange out of memory error when running with JIT).</li>
  <li><?php bugfix(80480); ?> (Segmentation fault with JIT enabled).</li>
  <li><?php bugfix(80506); ?> (Immediate SIGSEGV upon ini_set("opcache.jit_debug", 1)).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80368); ?> (OpenSSL extension fails to build against LibreSSL due to lack of OCB support).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(80458); ?> (PDOStatement::fetchAll() throws for upsert queries).</li>
  <li><?php bugfix(63185); ?> (nextRowset() ignores MySQL errors with native prepared statements).</li>
  <li><?php bugfix(78152); ?> (PDO::exec() - Bad error handling with multiple commands).</li>
  <li><?php bugfix(66878); ?> (Multiple rowsets not returned unless PDO statement object is unset()).</li>
  <li><?php bugfix(70066); ?> (Unexpected "Cannot execute queries while other unbuffered queries").</li>
  <li><?php bugfix(71145); ?> (Multiple statements in init command triggers unbuffered query error).</li>
  <li><?php bugfix(76815); ?> (PDOStatement cannot be GCed/closeCursor-ed when a PROCEDURE resultset SIGNAL).</li>
  <li><?php bugfix(79872); ?> (Can't execute query with pending result sets).</li>
  <li><?php bugfix(79131); ?> (PDO does not throw an exception when parameter values are missing).</li>
  <li><?php bugfix(72368); ?> (PdoStatement-&gt;execute() fails but does not throw an exception).</li>
  <li><?php bugfix(62889); ?> (LOAD DATA INFILE broken).</li>
  <li><?php bugfix(67004); ?> (Executing PDOStatement::fetch() more than once prevents releasing resultset).</li>
  <li><?php bugfix(79132); ?> (PDO re-uses parameter values from earlier calls to execute()).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(73809); ?> (Phar Zip parse crash - mmap fail).</li>
  <li><?php bugfix(75102); ?> (`PharData` says invalid checksum for valid tar).</li>
  <li><?php bugfix(77322); ?> (PharData::addEmptyDir('/') Possible integer overflow).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(76813); ?> (Access violation near NULL on source operand).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(62004); ?> (SplFileObject: fgets after seek returns wrong line).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(80366); ?> (Return Value of zend_fstat() not Checked).</li>
  <li><?php bugfix(77423); ?> (FILTER_VALIDATE_URL accepts URLs with invalid userinfo). (CVE-2020-7071)</li>
</ul></li>
<li>Tidy:
<ul>
  <li><?php bugfix(77594); ?> (ob_tidyhandler is never reset).</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(80462); ?> (Nullsafe operator tokenize with TOKEN_PARSE flag fails).</li>
</ul></li>
<li>XML:
<ul>
  <li>XmlParser opaque object renamed to XMLParser for consistency with other XML objects.</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(48725); ?> (Support for flushing in zlib stream).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.0"><!-- {{{ 8.0.0 -->
<h3>Version 8.0.0</h3>
<b><?php release_date('26-Nov-2020'); ?></b>
<ul><li>BZ2:
<ul>
  <li><?php bugfix(71263); ?> (fread() does not report bzip2.decompress errors).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Allow debug server binding to an ephemeral port via `-S localhost:0`.</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(55847); ?> (DOTNET .NET 4.0 GAC new location).</li>
  <li><?php bugfix(62474); ?> (com_event_sink crashes on certain arguments).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(80007); ?> (Potential type confusion in unixtojd() parameter parsing).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(36365); ?> (scandir duplicates file name at every 65535th file).</li>
  <li><?php bugfix(49555); ?> (Fatal error "Function must be a string" message should be renamed).</li>
  <li><?php bugfix(62294); ?> (register_shutdown_function() does not correctly handle exit code).</li>
  <li><?php bugfix(62609); ?> (Allow implementing Traversable on abstract classes).</li>
  <li><?php bugfix(65274); ?> (Enhance undefined class constant error with class name).</li>
  <li><?php bugfix(65275); ?> (Calling exit() in a shutdown function does not change the exit value in CLI).</li>
  <li><?php bugfix(69084); ?> (Unclear error message when not implementing a renamed abstract trait function).</li>
  <li><?php bugfix(70839); ?> (Converting optional argument to variadic forbidden by LSP checks).</li>
  <li><?php bugfix(74558); ?> (Can't rebind closure returned by Closure::fromCallable()).</li>
  <li><?php bugfix(77561); ?> (Shebang line not stripped for non-primary script).</li>
  <li><?php bugfix(77619); ?> (Wrong reflection on MultipleIterator::__construct).</li>
  <li><?php bugfix(77966); ?> (Cannot alias a method named "namespace").</li>
  <li><?php bugfix(78236); ?> (convert error on receiving variables when duplicate [).</li>
  <li><?php bugfix(78770); ?> (Incorrect callability check inside internal methods).</li>
  <li><?php bugfix(79108); ?> (Referencing argument in a function makes it a reference in the stack trace).</li>
  <li><?php bugfix(79368); ?> ("Unexpected end of file" is not an acceptable error message).</li>
  <li><?php bugfix(79462); ?> (method_exists and property_exists incoherent behavior).</li>
  <li><?php bugfix(79467); ?> (data:// wrappers are writable).</li>
  <li><?php bugfix(79521); ?> (Check __set_state structure).</li>
  <li><?php bugfix(79790); ?> ("Illegal offset type" exception during AST evaluation not handled properly).</li>
  <li><?php bugfix(79791); ?> (Assertion failure when unsetting variable during binary op).</li>
  <li><?php bugfix(79828); ?> (Segfault when trying to access non-existing variable).</li>
  <li><?php bugfix(79841); ?> (Syntax error in configure / unescaped "[]" in php.m4).</li>
  <li><?php bugfix(79852); ?> (count(DOMNodeList) doesn't match count(IteratorIterator(DOMNodeList))).</li>
  <li><?php bugfix(79867); ?> (Promoted untyped properties should get null default value).</li>
  <li><?php bugfix(79897); ?> (Promoted constructor params with attribs cause crash).</li>
  <li><?php bugfix(79927); ?> (Generator doesn't throw exception after multiple yield from iterable).</li>
  <li><?php bugfix(79946); ?> (Build fails due to undeclared UINT32_C).</li>
  <li><?php bugfix(79948); ?> (Exit in auto-prepended file does not abort PHP execution).</li>
  <li><?php bugfix(80045); ?> (memleak after two set_exception_handler calls with __call).</li>
  <li><?php bugfix(80096); ?> (Segmentation fault with named arguments in nested call).</li>
  <li><?php bugfix(80109); ?> (Cannot skip arguments when extended debug is enabled).</li>
  <li><?php bugfix(80225); ?> (broken namespace usage in eval code).</li>
  <li><?php bugfix(80258); ?> (Windows Deduplication Enabled, randon permission errors).</li>
  <li><?php bugfix(80280); ?> (ADD_EXTENSION_DEP() fails for ext/standard and ext/date).</li>
  <li><?php bugfix(80334); ?> (assert() vs named parameters - confusing error).</li>
  <li><?php bugfix(80055); ?> (Abstract trait methods returning "self" cannot be fulfilled by traits).</li>
  <li>Fixed faulty generator cleanup with yield from.</li>
  <li>Implement #[Attr] Attribute syntax as per final vote in RFC https://wiki.php.net/rfc/shorter_attribute_syntax_change</li>
  <li><?php implemented(47074); ?> (phpinfo() reports "On" as 1 for the some extensions).</li>
  <li><?php implemented(72089); ?> (require() throws fatal error instead of exception).</li>
  <li>Removed the pdo_odbc.db2_instance_name php.ini directive.</li>
  <li>Use SSE2 instructions do locale independent strtolower.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Bumped required libcurl version to 7.29.0.</li>
  <li><?php bugfix(80121); ?> (Null pointer deref if CurlHandle directly instantiated).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Add property DOMXPath::$registerNodeNamespaces and constructor argument that allow global flag to configure query() or evaluate() calls.</li>
  <li><?php bugfix(79968); ?> (DOMChildNode API crash on unattached nodes).</li>
  <li><?php bugfix(80268); ?> (loadHTML() truncates at NUL bytes).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(60302); ?> (DateTime::createFromFormat should new static(), not new self()).</li>
  <li><?php bugfix(65547); ?> (Default value for sunrise/sunset zenith still wrong).</li>
  <li><?php bugfix(69044); ?> (discrepancy between time and microtime).</li>
  <li><?php bugfix(80057); ?> (DateTimeImmutable::createFromFormat() does not populate time).</li>
  <li><?php implemented(79903); ?> (datetime: new format "p", same as "P" but returning "Z" for UTC).</li>
</ul></li>
<li>Enchant:
<ul>
  <li>Add LIBENCHANT_VERSION macro.</li>
  <li>Add enchant_dict_add and enchant_dict_is_added functions.</li>
  <li>Deprecate enchant_broker_set_dict_path, enchant_broker_get_dict_path, enchant_dict_add_to_personal and enchant_dict_is_in_session.</li>
  <li>Use libenchant-2 when available.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Added FFI\CType::getName() method.</li>
  <li><?php bugfix(79177); ?> (FFI doesn't handle well PHP exceptions within callback).</li>
  <li><?php bugfix(79749); ?> (Converting FFI instances to bool fails).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Add pm.status_listen option.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Upgrade to libmagic 5.39.</li>
</ul></li>
<li>GD:
<ul>
  <li>Added imagegetinterpolation().</li>
  <li><?php bugfix(55005); ?> (imagepolygon num_points requirement).</li>
  <li>Made the $num_points parameter of php_imagepolygon optional.</li>
  <li>Removed deprecated image2wbmp().</li>
  <li>Removed deprecated png2wbmp() and jpeg2wbmp().</li>
  <li>Replaced gd resources with objects.</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(64076); ?> (imap_sort() does not return FALSE on failure).</li>
  <li><?php bugfix(76618); ?> (segfault on imap_reopen).</li>
  <li><?php bugfix(80213); ?> (imap_mail_compose() segfaults on certain $bodies).</li>
  <li><?php bugfix(80215); ?> (imap_mail_compose() may modify by-val parameters).</li>
  <li><?php bugfix(80216); ?> (imap_mail_compose() does not validate types/encodings).</li>
  <li><?php bugfix(80220); ?> (imap_mail_compose() may leak memory).</li>
  <li><?php bugfix(80223); ?> (imap_mail_compose() leaks envelope on malformed bodies).</li>
  <li><?php bugfix(80226); ?> (imap_sort() leaks sortpgm memory).</li>
  <li><?php bugfix(80239); ?> (imap_rfc822_write_address() leaks memory).</li>
  <li><?php bugfix(80242); ?> (imap_mail_compose() segfaults for multipart with rfc822).</li>
  <li>Fixed minor regression caused by fixing bug <?php bugl(80220); ?>.</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Dropped support for iconv without proper errno setting.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Removed deprecated INTL_IDNA_VARIANT_2003.</li>
</ul></li>
<li>JIT:
<ul>
  <li><?php bugfix(77857); ?> (Wrong result if executed with JIT).</li>
  <li><?php bugfix(79255); ?> (PHP cannot be compiled with enable JIT).</li>
  <li><?php bugfix(79582); ?> (Crash seen when opcache.jit=1235 and opcache.jit_debug=2).</li>
  <li><?php bugfix(79743); ?> (Fatal error when assigning to array property with JIT enabled).</li>
  <li><?php bugfix(79864); ?> (JIT segfault in Symfony OptionsResolver).</li>
  <li><?php bugfix(79888); ?> (Incorrect execution with JIT enabled).</li>
</ul></li>
<li>JSON:
<ul>
  <li>The JSON extension is now an integral part of PHP and cannot be disabled as per RFC: https://wiki.php.net/rfc/always_enable_json (tandre)</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed memory leaks.</li>
  <li>Removed deprecated ldap_sort.</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(76999); ?> (mb_regex_set_options() return current options).</li>
  <li>Removed the unused $is_hex parameter from mb_decode_numericentity().</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(76809); ?> (SSL settings aren't respected when persistent connections are used).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(60594); ?> (mysqlnd exposes 160 lines of stats in phpinfo).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Deprecated old OCI8 function aliases.</li>
  <li>Modernized oci_register_taf_callback() callable argument parsing implementation.</li>
  <li>Removed obsolete no-op function oci_internal_debug().</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(22986); ?> (odbc_connect() may reuse persistent connection).</li>
  <li><?php bugfix(44618); ?> (Fetching may rely on uninitialized data).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(76535); ?> (Opcache does not replay compile-time warnings).</li>
  <li><?php bugfix(78654); ?> (Incorrectly computed opcache checksum on files with non-ascii characters).</li>
  <li><?php bugfix(79665); ?> (ini_get() and opcache_get_configuration() inconsistency).</li>
  <li><?php bugfix(80030); ?> (Optimizer segfault with isset on static property with undef dynamic class name).</li>
  <li><?php bugfix(80175); ?> (PHP8 RC1 - JIT Buffer not working).</li>
  <li><?php bugfix(80184); ?> (Complex expression in while / if statements resolves to false incorrectly).</li>
  <li><?php bugfix(80255); ?> (Opcache bug (bad condition result) in 8.0.0rc1).</li>
  <li>Fixed run-time binding of preloaded dynamically declared function.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Added Cryptographic Message Syntax (CMS) support.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Don't ignore invalid escape sequences.</li>
  <li>Updated to PCRE2 10.35.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Changed default PDO error mode to exceptions.</li>
  <li><?php bugfix(77849); ?> (Disable cloning of PDO handle/connection objects).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(64937); ?> (Firebird PDO preprocessing sql).</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Added support for setting and getting the oracle OCI 18c call timeout.</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Bumped required libpq version to 9.1.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Bumped required libpq version to 9.1.</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(76596); ?> (phpdbg support for display_errors=stderr).</li>
  <li><?php bugfix(76801); ?> (too many open files).</li>
  <li><?php bugfix(77800); ?> (phpdbg segfaults on listing some conditional breakpoints).</li>
  <li><?php bugfix(77805); ?> (phpdbg build fails when readline is shared).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(64592); ?> (ReflectionClass::getMethods() returns methods out of scope).</li>
  <li><?php bugfix(69180); ?> (Reflection does not honor trait conflict resolution / method aliasing).</li>
  <li><?php bugfix(74939); ?> (Nested traits' aliased methods are lowercased).</li>
  <li><?php bugfix(77325); ?> (ReflectionClassConstant::$class returns wrong class when extending).</li>
  <li><?php bugfix(78697); ?> (ReflectionClass::implementsInterface - inaccurate error message with traits).</li>
  <li><?php bugfix(80190); ?> (ReflectionMethod::getReturnType() does not handle static as part of union type).</li>
  <li><?php bugfix(80299); ?> (ReflectionFunction-&gt;invokeArgs confused in arguments).</li>
  <li><?php bugfix(80370); ?> (getAttributes segfault on dynamic properties).</li>
  <li><?php implemented(79628); ?> (Add $filter parameter for ReflectionClass::getConstants and ReflectionClass::getReflectionConstants) (carusogabriel)</li>
  <li>Implement ReflectionProperty::hasDefaultValue and Reflection::getDefaultValue (beberlei)</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(70461); ?> (disable md5 code when it is not supported in net-snmp).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(65006); ?> (spl_autoload_register fails with multiple callables using self, same method).</li>
  <li><?php bugfix(65387); ?> (Circular references in SPL iterators are not garbage collected).</li>
  <li><?php bugfix(71236); ?> (Second call of spl_autoload_register() does nothing if it has no arguments).</li>
  <li><?php bugfix(79987); ?> (Memory leak in SplFileInfo because of missing zend_restore_error_handling()).</li>
  <li>SplFixedArray is now IteratorAggregate rather than Iterator.</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Added SQLite3::setAuthorizer() and respective class constants.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(73529); ?> (session_decode() silently fails on wrong input).</li>
  <li><?php bugfix(78624); ?> (session_gc return value for user defined session handlers).</li>
</ul></li>
<li>Shmop:
<ul>
  <li>Converted shmop resources to objects.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(63575); ?> (Root elements are not properly cloned).</li>
  <li><?php bugfix(75245); ?> (Don't set content of elements with only whitespaces).</li>
</ul></li>
<li>Sodium:
<ul>
  <li><?php bugfix(77646); ?> (sign_detached() strings not terminated).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Don't force rebuild of symbol table, when populating $http_response_header variable by the HTTP stream wrapper.</li>
  <li><?php bugfix(47983); ?> (mixed LF and CRLF line endings in mail()).</li>
  <li><?php bugfix(64060); ?> (lstat_stat_variation7.phpt fails on certain file systems).</li>
  <li><?php bugfix(75902); ?> (str_replace should warn when misused with nested arrays).</li>
  <li><?php bugfix(76859); ?> (stream_get_line skips data if used with data-generating filter).</li>
  <li><?php bugfix(77204); ?> (getimagesize(): Read error! should mention file path).</li>
  <li><?php bugfix(78385); ?> (parse_url() does not include 'query' when question mark is the last char).</li>
  <li><?php bugfix(79868); ?> (Sorting with array_unique gives unwanted result).</li>
  <li><?php bugfix(80256); ?> (file_get_contents strip first line with chunked encoding redirect).</li>
  <li><?php bugfix(80266); ?> (parse_url silently drops port number 0).</li>
  <li><?php bugfix(80290); ?> (Double free when ASSERT_CALLBACK is used with a dynamic message).</li>
  <li><?php implemented(78638); ?> (__PHP_Incomplete_Class should be final).</li>
  <li>Made quoting of cmd execution functions consistent.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Removed the unused $use_include_path parameter from tidy_repair_string().</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(80328); ?> (PhpToken::getAll() confusing name).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(76874); ?> (xml_parser_free() should never leak memory).</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Changed functions to accept/return XMLWriter objects instead of resources.</li>
  <li><?php implemented(79344); ?> (xmlwriter_write_attribute_ns: $prefix should be nullable).</li>
  <li>Removed return types from XMLWriter stubs.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Add "flags" options to ZipArchive::addGlob and addPattern methods keeping previous behavior having FL_OVERWRITE by default.</li>
  <li>Add ZipArchive::EM_UNKNOWN and ZipArchive::EM_TRAD_PKWARE constants.</li>
  <li>Add ZipArchive::isCompressionMethodSupported() and ZipArchive::isEncryptionMethodSupported() method (libzip 1.7.0).</li>
  <li>Add ZipArchive::replaceFile() method.</li>
  <li>Add ZipArchive::setCancelCallback method (since libzip 1.6.0).</li>
  <li>Add ZipArchive::setMtimeName and ZipArchive::setMtimeIndex methods.</li>
  <li>Add ZipArchive::setProgressCallback method (since libzip 1.3.0).</li>
  <li>Add lastId property to ZipArchive.</li>
  <li>Add optional "flags" parameter to ZipArchive::addEmptyDir, addFile and addFromString methods.</li>
  <li><?php bugfix(50678); ?> (files extracted by ZipArchive class lost their original modified time).</li>
  <li><?php bugfix(72374); ?> (remove_path strips first char of filename).</li>
  <li><?php implemented(77960); ?> (add compression / encryption options for ZipArchive::addGlob and ZipArchive::addPattern).</li>
  <li>ZipArchive::status and ZipArchive::statusSys properties and ZipArchive::getStatusString() method stay valid after the archive is closed.</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(71417); ?> (fread() does not report zlib.inflate errors).</li>
  <li><?php bugfix(78792); ?> (zlib.output_compression disabled by Content-Type: image/).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<?php
changelog_footer(8, $MINOR_VERSIONS);
