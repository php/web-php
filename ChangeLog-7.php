<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/changelogs.inc';
site_header("PHP 7 ChangeLog", array("current" => "docs", "css" => array("changelog.css"), "layout_span" => 12));
?>

<h1>PHP 7 ChangeLog</h1>

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
  <li>Fix bug #73956 (Link use CC instead of CXX).</li>
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
  <li>Implemented FR <?php bugl(72583); ?> (All data are fetched as strings).</li>
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
  <li>Implemented FR <?php bugl(72583); ?> (All data are fetched as strings).</li>
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
  <li><?php bugfix(73773); ?> (Seg fault when loading hostile phar).</li>
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
		<li><?php bugfix(73773); ?> (Seg fault when loading hostile phar).</li>
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
    <li>Implemented FR <?php bugl(72614); ?> (Support "nmake test" on building extensions by phpize).</li>
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
    <li>Fixed for #73240 (Write out of bounds at number_format).</li>
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
    <li>Fix bug #73190 (memcpy negative parameter _bc_new_num_ex).</li>
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
    <li>Implemented FR <?php bugl(55651); ?> (Option to ignore the returned FTP PASV address).</li>
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
    <li>Partially fixed #72506 (idn_to_ascii for UTS #46 incorrect for long domain names).</li>
    <li><?php bugfix(72533); ?> (locale_accept_from_http out-of-bounds access).</li>
    <li>Failure to call the parent constructor in a class extending Collator before invoking the parent methods will throw an instance of Error instead of resulting in a recoverable fatal error.</li>
    <li>Cloning a Transliterator object may will now throw an instance of Error instead of resulting in a fatal error if cloning the internal transliterator fails.</li>
    <li>Added IntlTimeZone::getWindowsID() and IntlTimeZone::getIDForWindowsID().</li>
    <li><?php bugfix(69374); ?> (IntlDateFormatter formatObject returns wrong utf8 value).</li>
    <li><?php bugfix(69398); ?> (IntlDateFormatter formatObject returns wrong value when time style is NONE).</li>
  </ul></li>
<li>JSON:
  <ul>
    <li>Introduced encoder struct instead of global which fixes bugs #66025 and #73254 related to pretty print indentation.</li>
    <li><?php bugfix(73113); ?> (Segfault with throwing JsonSerializable).</li>
    <li>Implemented earlier return when json_encode fails, fixes bugs #68992 (Stacking exceptions thrown by JsonSerializable) and #70275 (On recursion error, json_encode can eat up all system memory).</li>
    <li>Implemented FR <?php bugl(46600); ?> ("_empty_" key in objects).</li>
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
    <li><?php bugfix(72551); ?>, bug #72552 (In correct casting from size_t to int lead to heap overflow in mdecrypt_generic).</li>
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
    <li>Implemented FR <?php bugl(61204); ?> (Add elliptic curve support for OpenSSL).</li>
    <li>Implemented FR <?php bugl(67304); ?> (Added AEAD support [CCM and GCM modes] to openssl_encrypt and openssl_decrypt).</li>
    <li>Implemented error storing to the global queue and cleaning up the OpenSSL error queue (resolves bugs #68276 and #69882).</li>
  </ul></li>
<li>Pcntl:
  <ul>
    <li>Implemented asynchronous signal handling without TICKS.</li>
    <li>Added pcntl_signal_get_handler() that returns the current signal handler for a particular signal. Addresses FR <?php bugl(72409); ?>.</li>
    <li>Add signinfo to pcntl_signal() handler args (Bishop Bettini, David Walker)</li>
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
    <li>Implemented FR <?php bugl(72633); ?> (Postgres PDO lastInsertId() should work without specifying a sequence).</li>
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
    <li>Implemented FR <?php bugl(31021); ?> (pg_last_notice() is needed to get all notice messages).</li>
    <li>Implemented FR <?php bugl(48532); ?> (Allow pg_fetch_all() to index numerically).</li>
  </ul></li>
<li>Readline:
  <ul>
    <li><?php bugfix(72538); ?> (readline_redisplay crashes php).</li>
  </ul></li>
<li>Reflection:
  <ul>
    <li>Undo backwards compatiblity break in ReflectionType-&gt;__toString() and deprecate via documentation instead.</li>
    <li>Reverted prepending \ for class names.</li>
    <li>Implemented request #38992 (invoke() and invokeArgs() static method calls should match). (cmb).</li>
    <li>Add ReflectionNamedType::getName(). This method should be used instead of ReflectionType::__toString()</li>
    <li>Prepend \ for class names and ? for nullable types returned from ReflectionType::__toString().</li>
    <li><?php bugfix(72661); ?> (ReflectionType::__toString crashes with iterable).</li>
    <li><?php bugfix(72222); ?> (ReflectionClass::export doesn't handle array constants).</li>
    <li>Failure to retrieve a reflection object or retrieve an object property will now throw an instance of Error instead of resulting in a fatal error.</li>
    <li>Fix #72209 (ReflectionProperty::getValue() doesn't fail if object doesn't match type).</li>
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
    <li>Improved fix for bug #68063 (Empty session IDs do still start sessions).</li>
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
    <li><?php bugfix(73452); ?> (Segfault (Regression for #69152)).</li>
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
    <li>Implemented FR <?php bugl(72653); ?> (SQLite should allow opening with empty filename).</li>
    <li><?php bugfix(70628); ?> (Clearing bindings on an SQLite3 statement doesn't work).</li>
    <li>Implemented FR <?php bugl(71159); ?> (Upgraded bundled SQLite lib to 3.9.2).</li>
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
    <li>Implemented FR <?php bugl(55716); ?> (Add an option to pass a custom stream context to get_headers()).</li>
    <li>Additional validation for parse_url() for login/pass components).</li>
    <li>Implemented FR <?php bugl(69359); ?> (Provide a way to fetch the current environment variables).</li>
    <li>unpack() function accepts an additional optional argument $offset.</li>
    <li>Implemented #51879 stream context socket option tcp_nodelay (Joe)</li>
  </ul></li>
<li>Streams:
  <ul>
    <li><?php bugfix(73586); ?> (php_user_filter::$stream is not set to the stream the filter is working on).</li>
    <li><?php bugfix(72853); ?> (stream_set_blocking doesn't work).</li>
    <li><?php bugfix(72743); ?> (Out-of-bound read in php_stream_filter_create).</li>
    <li>Implemented FR <?php bugl(27814); ?> (Multiple small packets send for HTTP request).</li>
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
  <li>Implemented FR <?php bugl(72633); ?> (Postgres PDO lastInsertId() should work without specifying a sequence).</li>
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
  <li>Implemented FR <?php bugl(72614); ?> (Support "nmake test" on building extensions by phpize).</li>
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
  <li>Implemented FR <?php bugl(72653); ?> (SQLite should allow opening with empty filename).</li>
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
  <li><?php bugfix(70451); ?>, #70452 (Inconsistencies in return values of IntlChar methods).</li>
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
  <li><?php bugfix(47803); ?>, #69526 (Executing prepared statements is succesfull only for the first two statements).</li>
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
  <li>Implemented FR <?php bugl(55651); ?> (Option to ignore the returned FTP PASV address).</li>
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
  <li>Implemented FR <?php bugl(55467); ?> (phpinfo: PHP Variables with $ and single quotes).</li>
  <li>Added ?? operator.</li>
  <li>Added &lt;=&gt; operator.</li>
  <li>Added \u{xxxxx} Unicode Codepoint Escape Syntax.</li>
  <li>Fixed oversight where define() did not support arrays yet const syntax did.</li>
  <li>Use "integer" and "float" instead of "long" and "double" in ZPP, type hint and conversion error messages.</li>
  <li>Implemented FR <?php bugl(55428); ?> (E_RECOVERABLE_ERROR when output buffering in output buffering handler).</li>
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
  <li>Implemented FR <?php bugl(69089); ?> (Added DateTime::RFC3339_EXTENDED to output in RFC3339 Extended format which includes fraction of seconds).</li>
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
  <li>Implemented FR <?php bugl(67106); ?> (Split main fpm config).</li>
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
  <li>Implemented FR <?php bugl(70438); ?> (Add IV parameter for openssl_seal and openssl_open).</li>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure). (CVE-2015-8867)</li>
  <li><?php bugfix(69882); ?> (OpenSSL error "key values mismatch" after openssl_pkcs12_read with extra cert).</li>
  <li>Added "alpn_protocols" SSL context option allowing encrypted client/server streams to negotiate alternative protocols using the ALPN TLS extension when built against OpenSSL 1.0.2 or newer. Negotiated protocol information is accessible through stream_get_meta_data() output.</li>
  <li>Removed "CN_match" and "SNI_server_name" SSL context options. Use automatic detection or the "peer_name" option instead.</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(70386); ?> (Can't compile on NetBSD because of missing WCONTINUED and WIFCONTINUED).</li>
  <li><?php bugfix(60509); ?> (pcntl_signal doesn't decrease ref-count of old handler when setting SIG_DFL).</li>
  <li>Implemented FR <?php bugl(68505); ?> (Added wifcontinued and wcontinued).</li>
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
  <li>Implemented FR <?php bugl(67886); ?> (SplPriorityQueue/SplHeap doesn't expose extractFlags nor curruption state).</li>
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
  <li>Implemented FR <?php bugl(70112); ?> (Allow "dirname" to go up various times).</li>
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

<?php site_footer(); ?>
