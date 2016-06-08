<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/changelogs.inc';
site_header("PHP 7 ChangeLog", array("current" => "docs", "css" => array("changelog.css"), "layout_span" => 12));
?>

<h1>PHP 7 ChangeLog</h1>

<section class="version" id="7.0.7"><!-- {{{ 7.0.7 -->
<h3>Version 7.0.7</h3>
<b><?php release_date('26-May-2016'); ?></b>
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
<li>Mysqli:
<ul>
  <li><?php bugfix(72151); ?> (mysqli_fetch_object changed behaviour).</li>
</ul></li>
</ul>
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
<b><?php release_date('28-Apr-2016'); ?></b>
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
<b><?php release_date('31-Mar-2016'); ?></b>
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
<b><?php release_date('03-Mar-2016'); ?></b>
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
<b><?php release_date('04-Feb-2016'); ?></b>
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
<b><?php release_date('07-Jan-2016'); ?></b>
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
<b><?php release_date('17-Dec-2015'); ?></b>
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
<b><?php release_date('03-Dec-2015'); ?></b>
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
  <li><?php bugfix(69975); ?> (PHP segfaults when accessing nvarchar(max) defined columns).</li>
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
