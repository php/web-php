<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-8.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['8.1', '8.0'];
changelog_header(8, $MINOR_VERSIONS);
?>
<a id="PHP_8_1"></a>

<section class="version" id="8.1.10"><!-- {{{ 8.1.10 -->
<h3>Version 8.1.10</h3>
<b><?php release_date('01-Sep-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed --CGI-- support of run-tests.php.</li>
  <li>Fixed incorrect double to long casting in latest clang.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9266); ?> (GC root buffer keeps growing when dtors are present).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8730); ?> (DateTime::diff miscalculation is same time zone of different type).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8964); ?> (DateTime object comparison after applying delta less than 1 second).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9106); ?>: (DateInterval 1.5s added to DateTimeInterface is rounded down since PHP 8.1.0).</li>
  <li><?php bugfix(81263); ?> (Wrong result from DateTimeImmutable::diff).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed LMDB driver memory leak on DB creation failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9155); ?> (dba_open("non-existing", "c-", "flatfile") segfaults).</li>
</ul></li>
<li>IMAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9309); ?> (Segfault when connection is used after imap_close()).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed IntlDateFormatter::formatObject() parameter type.</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9008); ?> (mb_detect_encoding(): wrong results with null $encodings).</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9033); ?> (Loading blacklist file can fail due to negative length).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9164); ?> (Segfault in zend_accel_class_hash_copy).</li>
</ul></li>
<li>PDO_SQLite:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9032); ?> (SQLite3 authorizer crashes on NULL values).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9032); ?> (SQLite3 authorizer crashes on NULL values).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8472); ?> (The resource returned by stream_socket_accept may have incorrect metadata).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8409); ?> (SSL handshake timeout leaves persistent connections hanging).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.9"><!-- {{{ 8.1.9 -->
<h3>Version 8.1.9</h3>
<b><?php release_date('04-Aug-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed potential overflow for the builtin server via the PHP_CLI_SERVER_WORKERS environment variable.</li>
  <li>Fixed <?php githubissuel('php/php-src', 8952); ?> (Intentionally closing std handles no longer possible).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8923); ?> (error_log on Windows can hold the file write lock).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8995); ?> (WeakMap object reference offset causing TypeError).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(80047); ?> (DatePeriod doesn't warn with custom DateTimeImmutable).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed zlog message prepend, free on incorrect address.</li>
  <li>Fixed possible double free on configuration loading failure. (Heiko Weber).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8848); ?> (imagecopyresized() error refers to the wrong argument).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build for ICU 69.x and onwards.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8847); ?> (PHP hanging infinitly at 100% cpu when check php syntax of a valid file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8030); ?> (Segfault with JIT and large match/switch statements).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8943); ?> (Fixed Reflection::getModifierNames() with readonly modifier).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed the crypt_sha256/512 api build with clang &gt; 12.</li>
  <li>Uses CCRandomGenerateBytes instead of arc4random_buf on macOs. (David Carlier).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9017); ?> (php_stream_sock_open_from_socket could return NULL).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.8"><!-- {{{ 8.1.8 -->
<h3>Version 8.1.8</h3>
<b><?php release_date('07-Jul-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8338); ?> (Intel CET is disabled unintentionally).</li>
  <li>Fixed leak in Enum::from/tryFrom for internal enums when using JIT</li>
  <li>Fixed calling internal methods with a static return type from extension code.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8655); ?> (Casting an object to array does not unwrap refcount=1 references).</li>
  <li>Fixed potential use after free in php_binary_init().</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed <?php githubissuel('php/php-src',8827); ?> (Intentionally closing std handles no longer possible).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8778); ?> (Integer arithmethic with large number variants fails).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed CURLOPT_TLSAUTH_TYPE is not treated as a string option.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(72963); ?> (Null-byte injection in CreateFromFormat and related functions).</li>
  <li><?php bugfix(74671); ?> (DST timezone abbreviation has incorrect offset).</li>
  <li><?php bugfix(77243); ?> (Weekdays are calculated incorrectly for negative years).</li>
  <li><?php bugfix(78139); ?> (timezone_open accepts invalid timezone string argument).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(81723); ?> (Heap buffer overflow in finfo_buffer). (CVE-2022-31627)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67764); ?> (fpm: syslog.ident don't work).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed imagecreatefromavif() memory leak.</li>
</ul></li>
<li>MBString:
<ul>
  <li>mb_detect_encoding recognizes all letters in Czech alphabet</li>
  <li>mb_detect_encoding recognizes all letters in Hungarian alphabet</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8685); ?> (pcre not ready at mbstring startup).</li>
  <li>Backwards-compatible mappings for 0x5C/0x7E in Shift-JIS are restored, after they had been changed in 8.1.0.</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fixed handling of single-key connection strings.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8591); ?> (tracing JIT crash after private instance method change).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(50293); ?> (Several openssl functions ignore the VCWD).</li>
  <li><?php bugfix(81713); ?> (NULL byte injection in several OpenSSL functions working with certificates).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Fixed handling of single-key connection strings.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8781); ?> (ZipArchive::close deletes zip file without updating stat cache).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.7"><!-- {{{ 8.1.7 -->
<h3>Version 8.1.7</h3>
<b><?php release_date('09-Jun-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8575); ?> (CLI closes standard streams too early).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(51934); ?> (strtotime plurals / incorrect time).</li>
  <li><?php bugfix(51987); ?> (Datetime fails to parse an ISO 8601 ordinal date (extended format)).</li>
  <li><?php bugfix(66019); ?> (DateTime object does not support short ISO 8601 time format - YYYY-MM-DDTHH)</li>
  <li><?php bugfix(68549); ?> (Timezones and offsets are not properly used when working with dates)</li>
  <li><?php bugfix(81565); ?> (date parsing fails when provided with timezones including seconds).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7758); ?> (Problems with negative timestamps and fractions).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed ACL build check on MacOS.</li>
  <li><?php bugfix(72185); ?>: php-fpm writes empty fcgi record causing nginx 502.</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li><?php bugfix(81719); ?>: mysqlnd/pdo password buffer overflow. (CVE-2022-31626)</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8461); ?> (tracing JIT crash after function/method change).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(79589); ?> (error:14095126:SSL routines:ssl3_read_n:unexpected eof while reading).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed Haiku build.</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(81720); ?>: Uninitialized array in pg_query_params(). (CVE-2022-31625)</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8578); ?> (Error on wrong parameter on SoapHeader constructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8538); ?> (SoapClient may strip parts of nmtokens).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8235); ?> (iterator_count() may run indefinitely).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8185); ?> (Crash during unloading of extension after dl() in ZTS).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed type for index in ZipArchive::replaceFile.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.6"><!-- {{{ 8.1.6 -->
<h3>Version 8.1.6</h3>
<b><?php release_date('12-May-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8310); ?> (Registry settings are no longer recognized).</li>
  <li>Fixed potential race condition during resource ID allocation.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8133); ?> (Preloading of constants containing arrays with enums segfaults).</li>
  <li>Fixed Haiku ZTS builds.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7752); ?> (DateTimeZone::getTransitions() returns insufficient data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8108); ?> (Timezone doesn't work as intended).</li>
  <li><?php bugfix(81660); ?> (DateTimeZone::getTransitions() returns invalid data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8289); ?> (Exceptions thrown within a yielded from iterator are not rethrown into the generator).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8433); ?> (Assigning function pointers to structs in FFI leaks).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76003); ?> (FPM /status reports wrong number of active processe).</li>
  <li><?php bugfix(77023); ?> (FPM cannot shutdown processes).</li>
  <li>Fixed comment in kqueue remove callback log message.</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(81714); ?> (segfault when serializing finalized HashContext).</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8218); ?> (ob_end_clean does not reset Content-Encoding header).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8364); ?> (msgfmt_format $values may not support references).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Number of error markers emitted for invalid UTF-8 text matches WHATWG specification. This is a return to the behavior of PHP 8.0 and earlier.</li>
</ul></li>
<li>MySQLi:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8267); ?> (MySQLi uses unsupported format specifier on Windows).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8366); ?> (ArrayIterator may leak when calling __construct()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8273); ?> (SplFileObject: key() returns wrong value).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed php://temp does not preserve file-position when switched to temporary file.</li>
</ul></li>
<li>zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8218); ?> (ob_end_clean does not reset Content-Encoding header).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.5"><!-- {{{ 8.1.5 -->
<h3>Version 8.1.5</h3>
<b><?php release_date('14-Apr-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8176); ?> (Enum values in property initializers leak).</li>
  <li>Fixed freeing of internal attribute arguments.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8070); ?> (memory leak of internal function attribute hash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8160); ?> (ZTS support on Alpine is broken).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed signedness confusion in php_filter_validate_domain().</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8115); ?> (Can't catch arg type deprecation when instantiating Intl classes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8142); ?> (Compilation error on cygwin).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7734); ?> (Fix IntlPartsIterator key off-by-one error and first key).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8208); ?> (mb_encode_mimeheader: $indent functionality broken).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8068); ?> (mysqli_fetch_object creates inaccessible properties).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8142); ?> (Compilation error on cygwin).</li>
</ul></li>
<li>PgSQL:
<ul>
  <li>Fixed result_type related stack corruption on LLP64 architectures.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8253); ?> (pg_insert() fails for references).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed Solaris builds.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8121); ?> (SplFileObject - seek and key with csv file inconsistent).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8192); ?> (Cannot override DirectoryIterator::current() without return typehint in 8.1).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8048); ?> (Force macOS to use statfs).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.4"><!-- {{{ 8.1.4 -->
<h3>Version 8.1.4</h3>
<b><?php release_date('17-Mar-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed Haiku ZTS build.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8059); ?> arginfo not regenerated for extension.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8083); ?> Segfault when dumping uncalled fake closure with static variables.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7958); ?> (Nested CallbackFilterIterator is leaking memory).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8074); ?> (Wrong type inference of range() result).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8140); ?> (Wrong first class callable by name optimization).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8082); ?> (op_arrays with temporary run_time_cache leak memory when observed).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed libpng warning when loading interlaced images.</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76109); ?> (Unsafe access to fpm scoreboard).</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7953); ?> (ob_clean() only does not set Content-Encoding).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7980); ?> (Unexpected result for iconv_mime_decode).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8128); ?> (mb_check_encoding wrong result for 7bit).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8058); ?> (NULL pointer dereference in mysqlnd package).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8080); ?> (ReflectionClass::getConstants() depends on def. order).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7953); ?> (ob_clean() only does not set Content-Encoding).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.3"><!-- {{{ 8.1.3 -->
<h3>Version 8.1.3</h3>
<b><?php release_date('17-Feb-2022'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81430); ?> (Attribute instantiation leaves dangling pointer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7896); ?> (Environment vars may be mangled on Windows).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7883); ?> (Segfault when INI file is not readable).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7867); ?> (FFI::cast() from pointer to array is broken).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fix #81708: UAF due to php_filter_float() failing for ints. (CVE-2021-21708)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed memory leak on invalid port.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7842); ?> (Invalid OpenMetrics response format returned by FPM status page.</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7902); ?> (mb_send_mail may delimit headers with LF only).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7972); ?> (MariaDB version prefix 5.5.5- is not stripped).</li>
</ul></li>
<li>pcntl:
<ul>
  <li>Fixed pcntl_rfork build for DragonFlyBSD.</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7978); ?> (sockets extension compilation errors).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7899); ?> (Regression in unpack for negative int value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7875); ?> (mails are sent even if failure to log throws exception).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.2"><!-- {{{ 8.1.2 -->
<h3>Version 8.1.2</h3>
<b><?php release_date('20-Jan-2022'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81216); ?> (Nullsafe operator leaks dynamic property name).</li>
  <li><?php bugfix(81684); ?> (Using null coalesce assignment with $GLOBALS["x"] produces opcode error).</li>
  <li><?php bugfix(81656); ?> (GCC-11 silently ignores -R).</li>
  <li><?php bugfix(81683); ?> (Misleading "access type ... must be public" error message on final or abstract interface methods).</li>
  <li><?php bugfix(81585); ?> (cached_chunks are not counted to real_size on shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7757); ?> (Multi-inherited final constant causes fatal error).</li>
  <li>Fixed zend_fibers.c build with ZEND_FIBER_UCONTEXT.</li>
  <li>Added riscv64 support for fibers.</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed FILTER_FLAG_NO_RES_RANGE flag.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7759); ?> (Incorrect return types for hash() and hash_hmac()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7826); ?> (Inconsistent argument name in hash_hmac_file and hash_file).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(81693); ?> (mb_check_encoding(7bit) segfaults).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(81658); ?> (MYSQL_OPT_LOAD_DATA_LOCAL_DIR not available in MariaDB).</li>
  <li>Introduced MYSQLI_IS_MARIADB.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7746); ?> (mysqli_sql_exception-&gt;getSqlState()).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug where large bigints may be truncated.</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7765); ?> (php_oci_cleanup_global_handles segfaults at second call).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(81679); ?> (Tracing JIT crashes on reattaching).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(81598); ?> (Cannot input unicode characters in PHP 8 interactive shell).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(81681); ?> (ReflectionEnum throwing exceptions).</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed error message allocation of PDO PgSQL.</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Avoid void* arithmetic in sockets/multicast.c on NetBSD.</li>
  <li>Fixed ext/sockets build on Haiku.</li>
</ul></li>
<li>Spl:
<ul>
  <li><?php bugfix(75917); ?> (SplFileObject::seek broken with CSV flags).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7809); ?> (Cloning a faked SplFileInfo object may segfault).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7748); ?> (gethostbyaddr outputs binary string).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7815); ?> (php_uname doesn't recognise latest Windows versions).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.1"><!-- {{{ 8.1.1 -->
<h3>Version 8.1.1</h3>
<b><?php release_date('02-Dec-2021'); ?></b>
<ul><li>IMAP:
<ul>
  <li><?php bugfix(81649); ?> (imap_(un)delete accept sequences, not single numbers).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Update bundled PCRE2 to 10.39.</li>
  <li><?php bugfix(74604); ?> (Out of bounds in php_pcre_replace_impl).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81659); ?> (stream_get_contents() may unnecessarily overallocate).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.0"><!-- {{{ 8.1.0 -->
<h3>Version 8.1.0</h3>
<b><?php release_date('25-Nov-2021'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed inclusion order for phpize builds on Windows.</li>
  <li>Added missing hashtable insertion APIs for arr/obj/ref.</li>
  <li><?php implemented(77372); ?> (Relative file path is removed from uploaded file).</li>
  <li><?php bugfix(81607); ?> (CE_CACHE allocation with concurrent access).</li>
  <li><?php bugfix(81507); ?> (Fiber does not compile on AIX).</li>
  <li><?php bugfix(78647); ?> (SEGFAULT in zend_do_perform_implementation_check).</li>
  <li><?php bugfix(81518); ?> (Header injection via default_mimetype / default_charset).</li>
  <li><?php bugfix(75941); ?> (Fix compile failure on Solaris with clang).</li>
  <li><?php bugfix(81380); ?> (Observer may not be initialized properly).</li>
  <li><?php bugfix(81514); ?> (Using Enum as key in WeakMap triggers GC + SegFault).</li>
  <li><?php bugfix(81520); ?> (TEST_PHP_CGI_EXECUTABLE badly set in run-tests.php).</li>
  <li><?php bugfix(81377); ?> (unset() of $GLOBALS sub-key yields warning).</li>
  <li><?php bugfix(81342); ?> (New ampersand token parsing depends on new line after it).</li>
  <li><?php bugfix(81280); ?> (Unicode characters in cli.prompt causes segfault).</li>
  <li><?php bugfix(81192); ?> ("Declaration should be compatible with" gives incorrect line number with traits).</li>
  <li><?php bugfix(78919); ?> (CLI server: insufficient cleanup if request startup fails).</li>
  <li><?php bugfix(81303); ?> (match error message improvements).</li>
  <li><?php bugfix(81238); ?> (Fiber support missing for Solaris Sparc).</li>
  <li><?php bugfix(81237); ?> (Comparison of fake closures doesn't work).</li>
  <li><?php bugfix(81202); ?> (powerpc64 build fails on fibers).</li>
  <li><?php bugfix(80072); ?> (Cyclic unserialize in TMPVAR operand may leak).</li>
  <li><?php bugfix(81163); ?> (__sleep allowed to return non-array).</li>
  <li><?php bugfix(75474); ?> (function scope static variables are not bound to a unique function).</li>
  <li><?php bugfix(53826); ?> (__callStatic fired in base class through a parent call if the method is private).</li>
  <li><?php bugfix(81076); ?> (incorrect debug info on Closures with implicit binds).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(81496); ?> (Server logs incorrect request method).</li>
</ul></li>
<li>COM:
<ul>
  <li>Dispatch using LANG_NEUTRAL instead of LOCALE_SYSTEM_DEFAULT.</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(81085); ?> (Support CURLOPT_SSLCERT_BLOB for cert strings).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(81458); ?> (Regression Incorrect difference after timezone change).</li>
  <li><?php bugfix(81500); ?> (Interval serialization regression since 7.3.14 / 7.4.2).</li>
  <li><?php bugfix(81504); ?> (Incorrect timezone transition details for POSIX data).</li>
  <li><?php bugfix(80998); ?> (Missing second with inverted interval).</li>
  <li>Speed up finding timezone offset information.</li>
  <li><?php bugfix(79580); ?> (date_create_from_format misses leap year).</li>
  <li><?php bugfix(80963); ?> (DateTimeZone::getTransitions() truncated).</li>
  <li><?php bugfix(80974); ?> (Wrong diff between 2 dates in different timezones).</li>
  <li><?php bugfix(80998); ?> (Missing second with inverted interval).</li>
  <li><?php bugfix(81097); ?> (DateTimeZone silently falls back to UTC when providing an offset with seconds).</li>
  <li><?php bugfix(81106); ?> (Regression in 8.1: add() now truncate -&gt;f).</li>
  <li><?php bugfix(81273); ?> (Date interval calculation not correct).</li>
  <li><?php bugfix(52480); ?> (Incorrect difference using DateInterval).</li>
  <li><?php bugfix(62326); ?> (date_diff() function returns false result).</li>
  <li><?php bugfix(64992); ?> (dst not handled past 2038).</li>
  <li><?php bugfix(65003); ?> (Wrong date diff).</li>
  <li><?php bugfix(66545); ?> (DateTime. diff returns negative values).</li>
  <li><?php bugfix(68503); ?> (date_diff on two dates with timezone set localised returns wrong results).</li>
  <li><?php bugfix(69806); ?> (Incorrect date from timestamp).</li>
  <li><?php bugfix(71700); ?> (Extra day on diff between begin and end of march 2016).</li>
  <li><?php bugfix(71826); ?> (DateTime::diff confuse on timezone 'Asia/Tokyo').</li>
  <li><?php bugfix(73460); ?> (Datetime add not realising it already applied DST change).</li>
  <li><?php bugfix(74173); ?> (DateTimeImmutable::getTimestamp() triggers DST switch in incorrect time).</li>
  <li><?php bugfix(74274); ?> (Handling DST transitions correctly).</li>
  <li><?php bugfix(74524); ?> (Date diff is bad calculated, in same time zone).</li>
  <li><?php bugfix(75167); ?> (DateTime::add does only care about backward DST transition, not forward).</li>
  <li><?php bugfix(76032); ?> (DateTime-&gt;diff having issues with leap days for timezones ahead of UTC).</li>
  <li><?php bugfix(76374); ?> (Date difference varies according day time).</li>
  <li><?php bugfix(77571); ?> (DateTime's diff DateInterval incorrect in timezones from UTC+01:00 to UTC+12:00).</li>
  <li><?php bugfix(78452); ?> (diff makes wrong in hour for Asia/Tehran).</li>
  <li><?php bugfix(79452); ?> (DateTime::diff() generates months differently between time zones).</li>
  <li><?php bugfix(79698); ?> (timelib mishandles future timestamps (triggered by 'zic -b slim')).</li>
  <li><?php bugfix(79716); ?> (Invalid date time created (with day "00")).</li>
  <li><?php bugfix(80610); ?> (DateTime calculate wrong with DateInterval).</li>
  <li><?php bugfix(80664); ?> (DateTime objects behave incorrectly around DST transition).</li>
  <li><?php bugfix(80913); ?> (DateTime(Immutable)::sub around DST yield incorrect time).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(81588); ?> (TokyoCabinet driver leaks memory).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(81433); ?> (DOMElement::setIdAttribute() called twice may remove ID).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79576); ?> ("TYPE *" shows unhelpful message when type is not defined).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(61700); ?> (FILTER_FLAG_IPV6/FILTER_FLAG_NO_PRIV|RES_RANGE failing).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(81513); ?> (Future possibility for heap overflow in FPM zlog).</li>
  <li><?php bugfix(81026); ?> (PHP-FPM oob R/W in root process leading to privilege escalation) (CVE-2021-21703).</li>
  <li>Added openmetrics status format.</li>
  <li>Enable process renaming on macOS.</li>
  <li>Added pm.max_spawn_rate option to configure max spawn child processes rate.</li>
  <li><?php bugfix(65800); ?> (Events port mechanism).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Convert resource&lt;ftp&gt; to object \FTP\Connection.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71316); ?> (libpng warning from imagecreatefromstring).</li>
  <li>Convert resource&lt;gd font&gt; to object \GdFont.</li>
  <li>Added support for Avif images</li>
</ul></li>
<li>hash:
<ul>
  <li><?php implemented(68109); ?> (Add MurmurHash V3).</li>
  <li><?php implemented(73385); ?> (Add xxHash support).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(81532); ?> (Change of $depth behaviour in json_encode() on PHP 8.1).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Convert resource&lt;ldap link&gt; to object \LDAP\Connection.</li>
  <li>Convert resource&lt;ldap result&gt; to object \LDAP\Result.</li>
  <li>Convert resource&lt;ldap result entry&gt; to object \LDAP\ResultEntry.</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(76167); ?> (mbstring may use pointer from some previous request).</li>
  <li><?php bugfix(81390); ?> (mb_detect_encoding() regression).</li>
  <li><?php bugfix(81349); ?> (mb_detect_encoding misdetcts ASCII in some cases).</li>
  <li><?php bugfix(81298); ?> (mb_detect_encoding() segfaults when 7bit encoding is specified).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(70372); ?> (Emulate mysqli_fetch_all() for libmysqlclient).</li>
  <li><?php bugfix(80330); ?> (Replace language in APIs and source code/docs).</li>
  <li><?php bugfix(80329); ?> (Add option to specify LOAD DATA LOCAL white list folder (including libmysql)).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(63327); ?> (Crash (Bus Error) in mysqlnd due to wrong alignment).</li>
  <li><?php bugfix(80761); ?> (PDO uses too much memory).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81409); ?> (Incorrect JIT code for ADD with a reference to array).</li>
  <li><?php bugfix(81255); ?> (Memory leak in PHPUnit with functional JIT).</li>
  <li><?php bugfix(80959); ?> (infinite loop in building cfg during JIT compilation).</li>
  <li><?php bugfix(81225); ?> (Wrong result with pow operator with JIT enabled).</li>
  <li><?php bugfix(81249); ?> (Intermittent property assignment failure with JIT enabled).</li>
  <li><?php bugfix(81256); ?> (Assertion `zv != ((void *)0)' failed for "preload" with JIT).</li>
  <li><?php bugfix(81133); ?> (building opcache with phpize fails).</li>
  <li><?php bugfix(81136); ?> (opcache header not installed).</li>
  <li>Added inheritance cache.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(81502); ?> ($tag argument of openssl_decrypt() should accept null/empty string).</li>
  <li>Bump minimal OpenSSL version to 1.0.2.</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(81424); ?> (PCRE2 10.35 JIT performance regression).</li>
  <li>Bundled PCRE2 is 10.37.</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(40913); ?> (PDO_MYSQL: PDO::PARAM_LOB does not bind to a stream for fetching a BLOB).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(80908); ?> (PDO::lastInsertId() return wrong).</li>
  <li><?php bugfix(81037); ?> (PDO discards error message text from prepared statement).</li>
</ul></li>
<li>PDO OCI:
<ul>
  <li><?php bugfix(77120); ?> (Support 'success with info' at connection).</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Implement PDO_ATTR_SERVER_VERSION and PDO_ATTR_SERVER_INFO for PDO::getAttribute().</li>
</ul></li>
<li>PDO PgSQL:
<ul>
  <li><?php bugfix(81343); ?> (pdo_pgsql: Inconsitent boolean conversion after calling closeCursor()).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li><?php bugfix(38334); ?> (Proper data-type support for PDO_SQLITE).</li>
</ul></li>
<li>PgSQL:
<ul>
  <li><?php bugfix(81509); ?> (pg_end_copy still expects a resource).</li>
  <li>Convert resource&lt;pgsql link&gt; to object \PgSql\Connection.</li>
  <li>Convert resource&lt;pgsql result&gt; to object \PgSql\Result.</li>
  <li>Convert resource&lt;pgsql large object&gt; to object \PgSql\Lob.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Use SHA256 by default for signature.</li>
  <li>Add support for OpenSSL_SHA256 and OpenSSL_SHA512 signature.</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(81135); ?> (unknown help topic causes assertion failure).</li>
</ul></li>
<li>PSpell:
<ul>
  <li>Convert resource&lt;pspell&gt; to object \PSpell\Dictionary.</li>
  <li>Convert resource&lt;pspell config&gt; to object \PSpell\Config.</li>
</ul></li>
<li>readline:
<ul>
  <li><?php bugfix(72998); ?> (invalid read in readline completion).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(81611); ?> (ArgumentCountError when getting default value from ReflectionParameter with new).</li>
  <li><?php bugfix(81630); ?> (PHP 8.1: ReflectionClass-&gt;getTraitAliases() crashes with Internal error).</li>
  <li><?php bugfix(81457); ?> (Enum: ReflectionMethod-&gt;getDeclaringClass() return a ReflectionClass).</li>
  <li><?php bugfix(81474); ?> (Make ReflectionEnum and related class non-final).</li>
  <li><?php bugfix(80821); ?> (ReflectionProperty::getDefaultValue() returns current value for statics).</li>
  <li><?php bugfix(80564); ?> (ReflectionProperty::__toString() renders current value, not default value).</li>
  <li><?php bugfix(80097); ?> (ReflectionAttribute is not a Reflector).</li>
  <li><?php bugfix(81200); ?> (no way to determine if Closure is static).</li>
  <li>Implement ReflectionFunctionAbstract::getClosureUsedVariables.</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(81407); ?> (shmop_open won't attach and causes php to crash).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(81325); ?> (Segfault in zif_simplexml_import_dom).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Implement SHA256 and SHA512 for security protocol.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Added the XChaCha20 stream cipher functions.</li>
  <li>Added the Ristretto255 functions, which are available in libsodium 1.0.18.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(66588); ?> (SplFileObject::fgetcsv incorrectly returns a row on premature EOF).</li>
  <li><?php bugfix(80663); ?> (Recursive SplFixedArray::setSize() may cause double-free).</li>
  <li><?php bugfix(81477); ?> (LimitIterator + SplFileObject regression in 8.0.1).</li>
  <li><?php bugfix(81112); ?> (Special json_encode behavior for SplFixedArray).</li>
  <li><?php bugfix(80945); ?> ("Notice: Undefined index" on unset() ArrayObject non-existing key).</li>
  <li><?php bugfix(80724); ?> (FilesystemIterator::FOLLOW_SYMLINKS remove KEY_AS_FILE from bitmask).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81441); ?> (gethostbyaddr('::1') returns ip instead of name after calling some other method).</li>
  <li><?php bugfix(81491); ?> (Incorrectly using libsodium for argon2 hashing).</li>
  <li><?php bugfix(81142); ?> (PHP 7.3+ memory leak when unserialize() is used on an associative array).</li>
  <li><?php bugfix(81111); ?> (Serialization is unexpectedly allowed on anonymous classes with __serialize()).</li>
  <li><?php bugfix(81137); ?> (hrtime breaks build on OSX before Sierra).</li>
  <li><?php bugfix(77627); ?> (method_exists on Closure::__invoke inconsistency).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(81475); ?> (stream_isatty emits warning with attached stream wrapper).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(79971); ?> (special character is breaking the path in xml function) (CVE-2021-21707).</li>
  <li><?php bugfix(70962); ?> (XML_OPTION_SKIP_WHITE strips embedded whitespace).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(81490); ?> (ZipArchive::extractTo() may leak memory).</li>
  <li><?php bugfix(77978); ?> (Dirname ending in colon unzips to wrong dir).</li>
  <li><?php bugfix(81420); ?> (ZipArchive::extractTo extracts outside of destination) (CVE-2021-21706).</li>
  <li><?php bugfix(80833); ?> (ZipArchive::getStream doesn't use setPassword).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<a id="PHP_8_0"></a>

<section class="version" id="8.0.23"><!-- {{{ 8.0.23 -->
<h3>Version 8.0.23</h3>
<b><?php release_date('01-Sep-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed incorrect double to long casting in latest clang.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed LMDB driver memory leak on DB creation failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9155); ?> (dba_open("non-existing", "c-", "flatfile") segfaults).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed IntlDateFormatter::formatObject() parameter type.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9033); ?> (Loading blacklist file can fail due to negative length).</li>
</ul></li>
<li>PDO_SQLite:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9032); ?> (SQLite3 authorizer crashes on NULL values).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9032); ?> (SQLite3 authorizer crashes on NULL values).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9017); ?> (php_stream_sock_open_from_socket could return NULL).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8472); ?> (The resource returned by stream_socket_accept may have incorrect metadata).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8409); ?> (SSL handshake timeout leaves persistent connections hanging).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.22"><!-- {{{ 8.0.22 -->
<h3>Version 8.0.22</h3>
<b><?php release_date('04-Aug-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed potential overflow for the builtin server via the PHP_CLI_SERVER_WORKERS environment variable.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8923); ?> (error_log on Windows can hold the file write lock).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8995); ?> (WeakMap object reference offset causing TypeError).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(80047); ?> (DatePeriod doesn't warn with custom DateTimeImmutable).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed LMDB driver hanging when attempting to delete a non-existing key.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed zlog message prepend, free on incorrect address.</li>
  <li>Fixed possible double free on configuration loading failure.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8848); ?> (imagecopyresized() error refers to the wrong argument).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build for ICU 69.x and onwards.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8847); ?> (PHP hanging infinitly at 100% cpu when check php syntaxe of a valid file).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed the crypt_sha256/512 api build with clang &gt; 12.</li>
  <li>Uses CCRandomGenerateBytes instead of arc4random_buf on macOs.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.21"><!-- {{{ 8.0.21 -->
<h3>Version 8.0.21</h3>
<b><?php release_date('07-Jul-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed potential use after free in php_binary_init().</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed <?php githubissuel('php/php-src',8827); ?> (Intentionally closing std handles no longer possible).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8778); ?> (Integer arithmethic with large number variants fails).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed CURLOPT_TLSAUTH_TYPE is not treated as a string option.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(74671); ?> (DST timezone abbreviation has incorrect offset).</li>
  <li><?php bugfix(77243); ?> (Weekdays are calculated incorrectly for negative years).</li>
  <li><?php bugfix(78139); ?> (timezone_open accepts invalid timezone string argument).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67764); ?> (fpm: syslog.ident don't work).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8685); ?> (pcre not ready at mbstring startup).</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fixed handling of single-key connection strings.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(50293); ?> (Several openssl functions ignore the VCWD).</li>
  <li><?php bugfix(81713); ?> (NULL byte injection in several OpenSSL functions working with certificates).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Fixed errorInfo() result on successful PDOStatement-&gt;execute().</li>
  <li>Fixed handling of single-key connection strings.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8781); ?> (ZipArchive::close deletes zip file without updating stat cache).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.20"><!-- {{{ 8.0.20 -->
<h3>Version 8.0.20</h3>
<b><?php release_date('09-Jun-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8575); ?> (CLI closes standard streams too early).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed Haiku ZTS builds.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8471); ?> (Segmentation fault when converting immutable and mutable DateTime instances created using reflection).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed ACL build check on MacOS.</li>
  <li><?php bugfix(72185); ?>: php-fpm writes empty fcgi record causing nginx 502.</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(81719); ?>: mysqlnd/pdo password buffer overflow. (CVE-2022-31626)</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8466); ?> (ini_get() is optimized out when the option does not exist).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed Haiku build.</li>
</ul></li>
<li>Pgsql:
<ul>
  <li><?php bugfix(81720); ?>: Uninitialized array in pg_query_params(). (CVE-2022-31625)</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8578); ?> (Error on wrong parameter on SoapHeader constructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8538); ?> (SoapClient may strip parts of nmtokens).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8235); ?> (iterator_count() may run indefinitely).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed type for index in ZipArchive::replaceFile.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.19"><!-- {{{ 8.0.19 -->
<h3>Version 8.0.19</h3>
<b><?php release_date('12-May-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8289); ?> (Exceptions thrown within a yielded from iterator are not rethrown into the generator).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7979); ?> (DatePeriod iterator advances when checking if valid).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8433); ?> (Assigning function pointers to structs in FFI leaks).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76003); ?> (FPM /status reports wrong number of active processe).</li>
  <li><?php bugfix(77023); ?> (FPM cannot shutdown processes).</li>
  <li>Fixed comment in kqueue remove callback log message.</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8218); ?> (ob_end_clean does not reset Content-Encoding header).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8364); ?> (msgfmt_format $values may not support references).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8267); ?> (MySQLi uses unsupported format specifier on Windows).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8366); ?> (ArrayIterator may leak when calling __construct()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8273); ?> (SplFileObject: key() returns wrong value).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed php://temp does not preserve file-position when switched to temporary file.</li>
</ul></li>
<li>zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8218); ?> (ob_end_clean does not reset Content-Encoding header).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.18"><!-- {{{ 8.0.18 -->
<h3>Version 8.0.18</h3>
<b><?php release_date('14-Apr-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed freeing of internal attribute arguments.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8070); ?> (memory leak of internal function attribute hash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8160); ?> (ZTS support on Alpine is broken).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed signedness confusion in php_filter_validate_domain().</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8142); ?> (Compilation error on cygwin).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8208); ?> (mb_encode_mimeheader: $indent functionality broken).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8068); ?> (mysqli_fetch_object creates inaccessible properties).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8142); ?> (Compilation error on cygwin).</li>
</ul></li>
<li>PgSQL:
<ul>
  <li>Fixed result_type related stack corruption on LLP64 architectures.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',8253); ?> (pg_insert() fails for references).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed Solaris builds.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8121); ?> (SplFileObject - seek and key with csv file inconsistent).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8048); ?> (Force macOS to use statfs).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.17"><!-- {{{ 8.0.17 -->
<h3>Version 8.0.17</h3>
<b><?php release_date('17-Mar-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed Haiku ZTS build.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed libpng warning when loading interlaced images.</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(76109); ?> (Unsafe access to fpm scoreboard).</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7953); ?> (ob_clean() only does not set Content-Encoding).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7980); ?> (Unexpected result for iconv_mime_decode).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8058); ?> (NULL pointer dereference in mysqlnd package).</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8074); ?> (Wrong type inference of range() result).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',8080); ?> (ReflectionClass::getConstants() depends on def. order).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7953); ?> (ob_clean() only does not set Content-Encoding).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.16"><!-- {{{ 8.0.16 -->
<h3>Version 8.0.16</h3>
<b><?php release_date('17-Feb-2022'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81430); ?> (Attribute instantiation leaves dangling pointer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7896); ?> (Environment vars may be mangled on Windows).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7867); ?> (FFI::cast() from pointer to array is broken).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fix #81708: UAF due to php_filter_float() failing for ints.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed memory leak on invalid port.</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7902); ?> (mb_send_mail may delimit headers with LF only).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7972); ?> (MariaDB version prefix 5.5.5- is not stripped).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed ext/sockets build on Haiku.</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7978); ?> (sockets extension compilation errors).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7875); ?> (mails are sent even if failure to log throws exception).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.15"><!-- {{{ 8.0.15 -->
<h3>Version 8.0.15</h3>
<b><?php release_date('20-Jan-2022'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81656); ?> (GCC-11 silently ignores -R).</li>
  <li><?php bugfix(81585); ?> (cached_chunks are not counted to real_size on shutdown).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed FILTER_FLAG_NO_RES_RANGE flag.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7759); ?> (Incorrect return types for hash() and hash_hmac()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src',7826); ?> (Inconsistent argument name in hash_hmac_file and hash_file).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug where large bigints may be truncated.</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src',7765); ?> (php_oci_cleanup_global_handles segfaults at second call).</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(81679); ?> (Tracing JIT crashes on reattaching).</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed error message allocation of PDO PgSQL.</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Avoid void* arithmetic in sockets/multicast.c on NetBSD.</li>
</ul></li>
<li>Spl:
<ul>
  <li><?php bugfix(75917); ?> (SplFileObject::seek broken with CSV flags).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.14"><!-- {{{ 8.0.14 -->
<h3>Version 8.0.14</h3>
<b><?php release_date('16-Dec-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81582); ?> (Stringable not implicitly declared if __toString() came from a trait).</li>
  <li><?php bugfix(81591); ?> (Fatal Error not properly logged in particular cases).</li>
  <li><?php bugfix(81626); ?> (Error on use static:: in __сallStatic() wrapped to Closure::fromCallable()).</li>
  <li><?php bugfix(81631); ?> (::class with dynamic class name may yield wrong line number).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(81513); ?> (Future possibility for heap overflow in FPM zlog).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71316); ?> (libpng warning from imagecreatefromstring).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(81649); ?> (imap_(un)delete accept sequences, not single numbers).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(75725); ?> (./configure: detecting RAND_egd).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74604); ?> (Out of bounds in php_pcre_replace_impl).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(81587); ?> (MultipleIterator Segmentation fault w/ SimpleXMLElement attached).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(81618); ?> (dns_get_record fails on FreeBSD for missing type).</li>
  <li><?php bugfix(81659); ?> (stream_get_contents() may unnecessarily overallocate).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.13"><!-- {{{ 8.0.13 -->
<h3>Version 8.0.13</h3>
<b><?php release_date('18-Nov-2021'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81518); ?> (Header injection via default_mimetype / default_charset).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(81500); ?> (Interval serialization regression since 7.3.14 / 7.4.2).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(81588); ?> (TokyoCabinet driver leaks memory).</li>
</ul></li>
<li>MBString:
<ul>
  <li><?php bugfix(76167); ?> (mbstring may use pointer from some previous request).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81512); ?> (Unexpected behavior with arrays and JIT).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(81424); ?> (PCRE2 10.35 JIT performance regression).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(79971); ?> (special character is breaking the path in xml function). (CVE-2021-21707)</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(81521); ?> (XMLReader::getParserProperty may throw with a valid property).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.12"><!-- {{{ 8.0.12 -->
<h3>Version 8.0.12</h3>
<b><?php release_date('21-Oct-2021'); ?></b>
<ul><li>CLI:
<ul>
  <li><?php bugfix(81496); ?> (Server logs incorrect request method).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(81435); ?> (Observer current_observed_frame may point to an old (overwritten) frame).</li>
  <li><?php bugfix(81380); ?> (Observer may not be initialized properly).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(81433); ?> (DOMElement::setIdAttribute() called twice may remove ID).</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79576); ?> ("TYPE *" shows unhelpful message when type is not defined).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(81026); ?> (PHP-FPM oob R/W in root process leading to privilege escalation) (CVE-2021-21703).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(78987); ?> (High memory usage during encoding detection).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(61700); ?> (FILTER_FLAG_IPV6/FILTER_FLAG_NO_PRIV|RES_RANGE failing).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81472); ?> (Cannot support large linux major/minor device number when read /proc/self/maps).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>ReflectionAttribute is no longer final.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(80663); ?> (Recursive SplFixedArray::setSize() may cause double-free).</li>
  <li><?php bugfix(81477); ?> (LimitIterator + SplFileObject regression in 8.0.1).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(69751); ?> (Change Error message of sprintf/printf for missing/typo position specifier).</li>
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



<section class="version" id="8.0.11"><!-- {{{ 8.0.11 -->
<h3>Version 8.0.11</h3>
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
  <li><?php bugfix(80833); ?> (ZipArchive::getStream doesn't use setPassword).</li>
  <li><?php bugfix(81420); ?> (ZipArchive::extractTo extracts outside of destination).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.10"><!-- {{{ 8.0.10 -->
<h3>Version 8.0.10</h3>
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
<li>Date:
<ul>
  <li><?php bugfix(64975); ?> (Error parsing when AM/PM not at the end).</li>
  <li><?php bugfix(78984); ?> (DateTimeZone accepting invalid UTC timezones).</li>
  <li><?php bugfix(79580); ?> (date_create_from_format misses leap year).</li>
  <li><?php bugfix(80409); ?> (DateTime::modify() loses time with 'weekday' parameter).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(51498); ?> (imagefilledellipse does not work for large circles).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(74544); ?> (Integer overflow in mysqli_real_escape_string()).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(81225); ?> (Wrong result with pow operator with JIT enabled).</li>
  <li><?php bugfix(81249); ?> (Intermittent property assignment failure with JIT enabled).</li>
  <li><?php bugfix(81206); ?> (Multiple PHP processes crash with JIT enabled).</li>
  <li><?php bugfix(81272); ?> (Segfault in var[] after array_slice with JIT).</li>
  <li><?php bugfix(81255); ?> (Memory leak in PHPUnit with functional JIT).</li>
  <li><?php bugfix(80959); ?> (Infinite loop in building cfg during JIT compilation) (Nikita, Dmitry)</li>
  <li><?php bugfix(81226); ?> (Integer overflow behavior is different with JIT enabled).</li>
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
  <li><?php bugfix(81211); ?>: Symlinks are followed when creating PHAR archive</li>
</ul></li>
<li>Shmop:
<ul>
  <li><?php bugfix(81283); ?> (shmop can't read beyond 2147483647 bytes).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(81325); ?> (Segfault in zif_simplexml_import_dom).</li>
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
  <li><?php bugfix(75850); ?> (Unclear error message wrt. __halt_compiler() w/o semicolon)</li>
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
