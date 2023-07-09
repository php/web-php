<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-8.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['8.2', '8.1', '8.0'];
changelog_header(8, $MINOR_VERSIONS);
?>
<a id="PHP_8_2"></a>

<section class="version" id="8.2.8"><!-- {{{ 8.2.8 -->
<h3>Version 8.2.8</h3>
<b><?php release_date('06-Jul-2023'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11246); ?> (cli/get_set_process_title fails on MacOS).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed build for the riscv64 architecture/GCC 12.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11433); ?> (Unable to set CURLOPT_ACCEPT_ENCODING to NULL).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11455); ?> (Segmentation fault with custom object date properties).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 11288); ?> and <?php githubissuel('php/php-src', 11289); ?> and <?php githubissuel('php/php-src', 11290); ?> and <?php githubissuel('php/php-src', 9142); ?> (DOMExceptions and segfaults with replaceWith).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10234); ?> (Setting DOMAttr::textContent results in an empty attribute value).</li>
  <li>Fix return value in stub file for DOMNodeList::item.</li>
  <li>Fix spec compliance error with '*' namespace for DOMDocument::getElementsByTagNameNS.</li>
  <li>Fix DOMElement::append() and DOMElement::prepend() hierarchy checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11347); ?> (Memory leak when calling a static method inside an xpath query).</li>
  <li><?php bugfix(67440); ?> (append_node of a DOMDocumentFragment does not reconcile namespaces).</li>
  <li><?php bugfix(81642); ?> (DOMChildNode::replaceWith() bug when replacing a node with itself).</li>
  <li><?php bugfix(77686); ?> (Removed elements are still returned by getElementById).</li>
  <li><?php bugfix(70359); ?> (print_r() on DOMAttr causes Segfault in php_libxml_node_free_list()).</li>
  <li><?php bugfix(78577); ?> (Crash in DOMNameSpace debug info handlers).</li>
  <li>Fix lifetime issue with getAttributeNodeNS().</li>
  <li>Fix "invalid state error" with cloned namespace declarations.</li>
  <li><?php bugfix(55294); ?> and #47530 and #47847 (various namespace reconciliation issues).</li>
  <li><?php bugfix(80332); ?> (Completely broken array access functionality with DOMNamedNodeMap).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix allocation loop in zend_shared_alloc_startup().</li>
  <li>Access violation on smm_shared_globals with ALLOC_FALLBACK.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11336); ?> (php still tries to unlock the shared memory ZendSem with opcache.file_cache_only=1 but it was never locked).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9356); ?> Incomplete validation of IPv6 Address fields in subjectAltNames (James Lucas, Jakub Zelenka).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fix preg_replace_callback_array() pattern validation.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed intermittent segfault with pg_trace.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix cross-compilation check in phar generation for FreeBSD.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11338); ?> (SplFileInfo empty getBasename with more than one slash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix access on NULL pointer in array_merge_recursive().</li>
  <li>Fix exception handling in array_multisort().</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11451); ?> (Invalid associative array containing duplicate keys).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.7"><!-- {{{ 8.2.7 -->
<h3>Version 8.2.7</h3>
<b><?php release_date('08-Jun-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11152); ?> (Unable to alias namespaces containing reserved class names).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9068); ?> (Conditional jump or move depends on uninitialised value(s)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11189); ?> (Exceeding memory limit in zend_hash_do_resize leaves the array in an invalid state).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11063); ?> (Compilation error on old GCC versions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11222); ?> (foreach by-ref may jump over keys during a rehash).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11281); ?> (DateTimeZone::getName() does not include seconds in offset).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10834); ?> (exif_read_data() cannot read smaller stream wrapper chunk sizes).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10461); ?> (PHP-FPM segfault due to after free usage of child-&gt;ev_std(out|err)).</li>
  <li><?php bugfix(64539); ?> (FPM status page: query_string not properly JSON encoded).</li>
  <li>Fixed memory leak for invalid primary script file handle.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11180); ?> (hash_file() appears to be restricted to 3 arguments).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11160); ?> (Few tests failed building with new libxml 2.11.0).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 11217); ?> (Segfault in mb_strrpos / mb_strripos when using negative offset and ASCII encoding).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11134); ?> (Incorrect match default branch optimization).</li>
  <li>Fixed too wide OR and AND range inference.</li>
  <li>Fixed missing class redeclaration error with OPcache enabled.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11245); ?> (In some specific cases SWITCH with one default statement will cause segfault).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed maximum argument count of pcntl_forkx().</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed parameter parsing of pg_lo_export().</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11099); ?> (Generating phar.php during cross-compile can't be done).</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug GHSA-76gg-c692-v2mw (Missing error check and insufficient random bytes in HTTP Digest authentication for SOAP). (CVE-2023-3247)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8426); ?> (make test fail while soap extension build).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11178); ?> (Segmentation fault in spl_array_it_get_current_data (PHP 8.1.18)).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11138); ?> (move_uploaded_file() emits open_basedir warning for source file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11274); ?> (POST/PATCH request switches to GET after a HTTP 308 redirect).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10031); ?> ([Stream] STREAM_NOTIFY_PROGRESS over HTTP emitted irregularly for last chunk of data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11175); ?> (Stream Socket Timeout).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11177); ?> (ASAN UndefinedBehaviorSanitizer when timeout = -1 passed to stream_socket_accept/stream_socket_client).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.6"><!-- {{{ 8.2.6 -->
<h3>Version 8.2.6</h3>
<b><?php release_date('11-May-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fix inconsistent float negation in constant expressions.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8841); ?> (php-cli core dump calling a badly formed function).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10737); ?> (PHP 8.1.16 segfaults on line 597 of sapi/apache2handler/sapi_apache2.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11028); ?> (Heap Buffer Overflow in zval_undefined_cv.).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11108); ?> (Incorrect CG(memoize_mode) state after bailout in ??=).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug where the diff() method would not return the right result around DST changeover for date/times associated with a timezone identifier.</li>
  <li>Fixed out-of-range bug when converting to/from around the LONG_MIN unix timestamp.</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80602); ?> (Segfault when using DOMChildNode::before()).</li>
  <li>Fixed incorrect error handling in dom_zvals_to_fragment().</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9397); ?> (exif read : warnings and errors : Potentially invalid endianess, Illegal IFD size and Undefined index).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11071); ?> (TZData version not displayed anymore).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10968); ?> (Segfault in preg_replace_callback_array()).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10983); ?> (State-dependant segfault in ReflectionObject::getProperties).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Handle indirect zvals and use up-to-date properties in SplFixedArray::__serialize.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10990); ?> (mail() throws TypeError after iterating over $additional_headers array by reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9775); ?> (Duplicates returned by array_unique when using enums).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10406); ?> (feof() behavior change for UNIX based socket resources).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.5"><!-- {{{ 8.2.5 -->
<h3>Version 8.2.5</h3>
<b><?php release_date('13-Apr-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Added optional support for max_execution_time in ZTS/Linux builds (Kévin Dunglas)</li>
  <li>Fixed use-after-free in recursive AST evaluation.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8646); ?> (Memory leak PHP FPM 8.1).</li>
  <li>Re-add some CTE functions that were removed from being CTE by a mistake.</li>
  <li>Remove CTE flag from array_diff_ukey(), which was added by mistake.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10801); ?> (Named arguments in CTE functions cause a segfault).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8789); ?> (PHP 8.0.20 (ZTS) zend_signal_handler_defer crashes on apache).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10015); ?> (zend_signal_handler_defer crashes on apache shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10810); ?> (Fix NUL byte terminating Exception::__toString()).</li>
  <li>Fix potential memory corruption when mixing __callStatic() and FFI.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10747); ?> (Private and protected properties in serialized Date* objects throw).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10611); ?> (fpm_env_init_main leaks environ).</li>
  <li>Destroy file_handle in fpm_main.</li>
  <li><?php bugfix(74129); ?> (Incorrect SCRIPT_NAME with apache ProxyPassMatch when spaces are in path).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Propagate success status of ftp_close().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10521); ?> (ftp_get/ftp_nb_get resumepos offset is maximum 10GB).</li>
</ul></li>
<li>IMAP:
<ul>
  <li>Fix build failure with Clang 16.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8979); ?> (Possible Memory Leak with SSL-enabled MySQL connections).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed build for macOS to cater with pkg-config settings.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8065); ?> (opcache.consistency_checks &gt; 0 causes segfaults in PHP &gt;= 8.1.5 in fpm context).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Add missing error checks on file writing functions.</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10908); ?> (Bus error with PDO Firebird on RPI with 64 bit kernel and 32 bit userland).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10766); ?> (PharData archive created with Phar::Zip format does not keep files metadata (datetime)).</li>
  <li>Add missing error checks on EVP_MD_CTX_create() and EVP_VerifyInit().</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed missing and inconsistent error checks on SQLAllocHandle.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed typo in the array returned from pg_meta_data (extended mode).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10519); ?> (Array Data Address Reference Issue).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10907); ?> (Unable to serialize processed SplFixedArrays in PHP 8.2.4).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10844); ?> (ArrayIterator allows modification of readonly props).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10885); ?> (stream_socket_server context leaks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10052); ?> (Browscap crashes PHP 8.1.12 on request shutdown (apache2)).</li>
  <li>Fixed oss-fuzz #57392 (Buffer-overflow in php_fgetcsv() with \0 delimiter and enclosure).</li>
  <li>Fixed undefined behaviour in unpack().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.4"><!-- {{{ 8.2.4 -->
<h3>Version 8.2.4</h3>
<b><?php release_date('16-Mar-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed incorrect check condition in ZEND_YIELD.</li>
  <li>Fixed incorrect check condition in type inference.</li>
  <li>Fix incorrect check in zend_internal_call_should_throw().</li>
  <li>Fixed overflow check in OnUpdateMemoryConsumption.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9916); ?> (Entering shutdown sequence with a fiber suspended in a Generator emits an unavoidable fatal error or crashes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10437); ?> (Segfault/assertion when using fibers in shutdown function after bailout).</li>
  <li>Fixed SSA object type update for compound assignment opcodes.</li>
  <li>Fixed language scanner generation build.</li>
  <li>Fixed zend_update_static_property() calling zend_update_static_property_ex() misleadingly with the wrong return type.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10570); ?> (Fixed unknown string hash on property fetch with integer constant name).</li>
  <li>Fixed php_fopen_primary_script() call resulted on zend_destroy_file_handle() freeing dangling pointers on the handle as it was uninitialized.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed deprecation warning at compile time.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10270); ?> (Unable to return CURL_READFUNC_PAUSE in readfunc callback).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10447); ?> ('p' format specifier does not yield 'Z' for 00:00).</li>
  <li>Fix <?php githubissuel('php/php-src', 10152); ?> (Custom properties of Date's child classes are not serialised).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10747); ?> (Private and protected properties in serialized Date* objects throw).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed incorrect bitshifting and masking in ffi bitfield.</li>
</ul></li>
<li>Fiber:
<ul>
  <li>Fixed assembly on alpine x86.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10496); ?> (segfault when garbage collector is invoked inside of fiber).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10315); ?> (FPM unknown child alert not valid).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10385); ?> (FPM successful config test early exit).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Properly implement GMP::__construct().</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10647); ?> (Spoolchecker isSuspicious/areConfusable methods error code's argument always returning NULL0.</li>
</ul></li>
<li>JSON:
<ul>
  <li>Fixed JSON scanner and parser generation build.</li>
</ul></li>
<li>MBString:
<ul>
  <li>ext/mbstring: fix new_value length check.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10627); ?> (mb_convert_encoding crashes PHP on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix incorrect page_size check.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed php_openssl_set_server_dh_param() DH params errors handling.</li>
</ul></li>
<li>PDO OCI:
<ul>
  <li><?php bugfix(60994); ?> (Reading a multibyte CLOB caps at 8192 chars).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10715); ?> (heap buffer overflow on --run option misuse).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10672); ?> (pg_lo_open segfaults in the strict_types mode).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix incorrect check in phar tar parsing.</li>
</ul></li>
<li>Random:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10390); ?> (Do not trust arc4random_buf() on glibc).</li>
  <li>Fix <?php githubissuel('php/php-src', 10292); ?> (Made the default value of the first param of srand() and mt_srand() unknown).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10623); ?> (Reflection::getClosureUsedVariables opcode fix with variadic arguments).</li>
  <li>Fix Segfault when using ReflectionFiber suspended by an internal function.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed ps_files_cleanup_dir() on failure code paths with -1 instead of 0 as the latter was considered success by callers. (nielsdos).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8086); ?> (Introduce mail.mixed_lf_and_crlf INI).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10292); ?> (Made the default value of the first param of srand() and mt_srand() unknown).</li>
  <li>Fix incorrect check in cs_8559_5 in map_from_unicode().</li>
  <li>Fix bug <?php githubissuel('php/php-src', 9697); ?> for reset/end/next/prev() attempting to move pointer of properties table for certain internal classes such as FFI classes</li>
  <li>Fix incorrect error check in browsecap for pcre2_match().</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10370); ?> (File corruption in _php_stream_copy_to_stream_ex when using copy_file_range).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10548); ?> (copy() fails on cifs mounts because of incorrect copy_file_range() len).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leaks when attempting to open a non-existing file or a file over 4GB.</li>
  <li>Add missing error check on tidyLoadConfig.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed output_handler directive value's length which counted the string terminator.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.3"><!-- {{{ 8.2.3 -->
<h3>Version 8.2.3</h3>
<b><?php release_date('14-Feb-2023'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81744); ?> (Password_verify() always return true with some hash). (CVE-2023-0567)</li>
  <li><?php bugfix(81746); ?> (1-byte array overrun in common path resolve code). (CVE-2023-0568)</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug GHSA-54hq-v5wp-fqgv (DOS vulnerability when parsing multipart request body). (CVE-2023-0662)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.2"><!-- {{{ 8.2.2 -->
<h3>Version 8.2.2</h3>
<b><?php release_date('02-Feb-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10200); ?> (zif_get_object_vars: Assertion `!(((__ht)-&gt;u.flags &amp; (1&lt;&lt;2)) != 0)' failed).</li>
  <li>Fix <?php githubissuel('php/php-src', 10251); ?> (Assertion `(flag &amp; (1&lt;&lt;3)) == 0' failed).</li>
  <li>Fix <?php githubissuel('php/php-src', 10240); ?> (Assertion failure when adding more than 2**30 elements to an unpacked array).</li>
  <li>Fix <?php githubissuel('php/php-src', 9735); ?> (Fiber stack variables do not participate in cycle collector).</li>
  <li>Fix <?php githubissuel('php/php-src', 9675); ?> (Broken run_time_cache init for internal enum methods).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(77106); ?> (Missing separator in FPM FastCGI errors).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9981); ?> (FPM does not reset fastcgi.error_header).</li>
  <li><?php bugfix(68591); ?> (Configuration test does not perform UID lookups).</li>
  <li>Fixed memory leak when running FPM config test.</li>
  <li><?php bugfix(67244); ?> (Wrong owner:group for listening unix socket).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Handle exceptions from __toString in XXH3's initialization (nielsdos)</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10112); ?> (LDAP\Connection::__construct() refers to ldap_create()).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix inverted bailout value in zend_runtime_jit() (Max Kellermann).</li>
  <li>Fix access to uninitialized variable in accel_preload().</li>
  <li>Fix zend_jit_find_trace() crashes.</li>
  <li>Added missing lock for EXIT_INVALIDATE in zend_jit_trace_exit.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix wrong flags check for compression method in phar_object.c (nielsdos)</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix undefined behaviour in phpdbg_load_module_or_extension().</li>
  <li>Fix NULL pointer dereference in phpdbg_create_conditional_breal().</li>
  <li>Fix <?php githubissuel('php/php-src', 9710); ?>: phpdbg memory leaks by option "-h" (nielsdos)</li>
  <li>Fix phpdbg segmentation fault in case of malformed input (nielsdos)</li>
</ul></li>
<li>Posix:
<ul>
  <li>Fix memory leak in posix_ttyname() (girgias)</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10247); ?> (Theoretical file descriptor leak for /dev/urandom).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10187); ?> (Segfault in stripslashes() with arm64).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10214); ?> (Incomplete validation of object syntax during unserialize()).</li>
  <li>Fix substr_replace with slots in repl_ht being UNDEF.</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Fix missing check for xmlTextWriterEndElement (nielsdos)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.1"><!-- {{{ 8.2.1 -->
<h3>Version 8.2.1</h3>
<b><?php release_date('05-Jan-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9905); ?> (constant() behaves inconsistent when class is undefined).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9918); ?> (License information for xxHash is not included in README.REDIST.BINS file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9890); ?> (OpenSSL legacy providers not available on Windows).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9650); ?> (Can't initialize heap: [0x000001e7]).</li>
  <li>Fixed potentially undefined behavior in Windows ftok(3) emulation.</li>
  <li>Fixed <?php githubissuel('php/php-src', 9769); ?> (Misleading error message for unpacking of objects).</li>
</ul></li>
<li>Apache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9949); ?> (Partial content on incomplete POST request).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9959); ?> (Solaris port event mechanism is still broken after bug #66694).</li>
  <li><?php bugfix(68207); ?> (Setting fastcgi.error_header can result in a WARNING).</li>
  <li><?php bugfix(80669); ?> (FPM numeric user fails to set groups).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8517); ?> (Random crash of FPM master process in fpm_stdio_child_said).</li>
</ul></li>
<li>Imap:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10051); ?> (IMAP: there's no way to check if a IMAP\Connection is still open).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9535); ?> (The behavior of mb_strcut in mbstring has been changed in PHP8.1).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9968); ?> (Segmentation Fault during OPCache Preload).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9997); ?> (OpenSSL engine clean up segfault).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9064); ?> (PHP fails to build if openssl was built with --no-ec).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10000); ?> (OpenSSL test failures when OpenSSL compiled with no-dsa).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9298); ?> (Signal handler called after rshutdown leads to crash).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9971); ?> (Incorrect NUMERIC value returned from PDO_Firebird).</li>
</ul></li>
<li>PDO/SQLite:
<ul>
  <li><?php bugfix(81740); ?> (PDO::quote() may return unquoted string). (CVE-2022-31631)</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9932); ?> (session name silently fails with . and [).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9883); ?> (SplFileObject::__toString() reads next line).</li>
  <li>Fixed <?php githubissuel('php/php-src', 10011); ?> (Trampoline autoloader will get reregistered and cannot be unregistered).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(81742); ?> (open_basedir bypass in SQLite3 by using file URI).</li>
</ul></li>
<li>TSRM:
<ul>
  <li>Fixed Windows shmget() wrt. IPC_PRIVATE.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.0"><!-- {{{ 8.2.0 -->
<h3>Version 8.2.0</h3>
<b><?php release_date('08-Dec-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li><?php bugfix(81496); ?> (Server logs incorrect request method).</li>
  <li>Updated the mime-type table for the builtin-server.</li>
  <li>Fixed potential overflow for the builtin server via the PHP_CLI_SERVER_WORKERS environment variable.</li>
  <li>Fixed <?php githubissuel('php/php-src', 8575); ?> by changing STDOUT, STDERR and STDIN to not close on resource destruction.</li>
  <li>Implement built-in web server responding without body to HEAD request on a static resource.</li>
  <li>Implement built-in web server responding with HTTP status 405 to DELETE/PUT/PATCH request on a static resource.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9709); ?> (Null pointer dereference with -w/-s options).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8750); ?> (Can not create VT_ERROR variant type).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(81380); ?> (Observer may not be initialized properly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 7771); ?> (Fix filename/lineno of constant expressions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 7792); ?> (Improve class type in error messages).</li>
  <li>Support huge pages on MacOS.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8655); ?> (Casting an object to array does not unwrap refcount=1 references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8661); ?> (Nullsafe in coalesce triggers undefined variable warning).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 7821); ?> and <?php githubissuel('php/php-src', 8418); ?> (Allow arbitrary const expressions in backed enums).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8810); ?> (Incorrect lineno in backtrace of multi-line function calls).</li>
  <li>Optimised code path for newly created file with the stream plain wrapper.</li>
  <li>Uses safe_perealloc instead of perealloc for the ZEND_PTR_STACK_RESIZE_IF_NEEDED to avoid possible overflows.</li>
  <li>Reduced the memory footprint of strings returned by var_export(), json_encode(), serialize(), iconv_*(), mb_ereg*(), session_create_id(), http_build_query(), strstr(), Reflection*::__toString().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8995); ?> (WeakMap object reference offset causing TypeError).</li>
  <li>Added error_log_mode ini setting.</li>
  <li>Updated request startup messages.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 7900); ?> (Arrow function with never return type compile-time errors).</li>
  <li>Fixed incorrect double to long casting in latest clang.</li>
  <li>Added support for defining constants in traits.</li>
  <li>Stop incorrectly emitting false positive deprecation notice alongside unsupported syntax fatal error for `"{$g{'h'}}"`.</li>
  <li>Fix unexpected deprecated dynamic property warning, which occurred when exit() in finally block after an exception was thrown without catching.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9323); ?> (Crash in ZEND_RETURN/GC/zend_call_function) (Tim Starling)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9227); ?> (Trailing dots and spaces in filenames are ignored).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9285); ?> (Traits cannot be used in readonly classes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9186); ?> (@strict-properties can be bypassed using unserialization).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9500); ?> (Using dnf type with parentheses after readonly keyword results in a parse error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9516); ?> ((A&amp;B)|D as a param should allow AB or D. Not just A).</li>
  <li>Fixed observer class notify with Opcache file_cache_only=1.</li>
  <li>Fixes segfault with Fiber on FreeBSD i386 architecture.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9655); ?> (Pure intersection types cannot be implicitly nullable) (Girgias)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9589); ?> (dl() segfaults when module is already loaded).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9752); ?> (Generator crashes when interrupted during argument evaluation with extra named params).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9801); ?> (Generator crashes when memory limit is exceeded during initialization).</li>
  <li>Fixed a bug with preloaded enums possibly segfaulting.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9823); ?> (Don’t reset func in zend_closure_internal_handler).</li>
  <li>Fixed potential NULL pointer dereference Windows shm*() functions.</li>
  <li>Fix target validation for internal attributes with constructor property promotion.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9750); ?> (Generator memory leak when interrupted during argument evaluation.</li>
  <li>Move observer_declared_function_notify until after pass_two().</li>
  <li>Do not report MINIT stage internal class aliases in extensions.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Added support for CURLOPT_XFERINFOFUNCTION.</li>
  <li>Added support for CURLOPT_MAXFILESIZE_LARGE.</li>
  <li>Added new constants from cURL 7.62 to 7.80.</li>
  <li>New function curl_upkeep().</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 8458); ?> (DateInterval::createFromDateString does not throw if non-relative items are present).</li>
  <li><?php bugfix(52015); ?> (Allow including end date in DatePeriod iterations) (Daniel Egeberg, Derick)</li>
  <li>idate() now accepts format specifiers "N" (ISO Day-of-Week) and "o" (ISO Year).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8730); ?> (DateTime::diff miscalculation is same time zone of different type).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8964); ?> (DateTime object comparison after applying delta less than 1 second).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9106); ?> (DateInterval 1.5s added to DateTimeInterface is rounded down since PHP 8.1.0).</li>
  <li><?php bugfix(75035); ?> (Datetime fails to unserialize "extreme" dates).</li>
  <li><?php bugfix(80483); ?> (DateTime Object with 5-digit year can't unserialized).</li>
  <li><?php bugfix(81263); ?> (Wrong result from DateTimeImmutable::diff).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9431); ?> (DateTime::getLastErrors() not returning false when no errors/warnings).</li>
  <li>Fixed bug with parsing large negative numbers with the @ notation.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed LMDB driver hanging when attempting to delete a non-existing key (Girgias)</li>
  <li>Fixed LMDB driver memory leak on DB creation failure (Girgias)</li>
  <li>Fixed <?php githubissuel('php/php-src', 8856); ?> (dba: lmdb: allow to override the MDB_NOSUBDIR flag).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9090); ?> (Support assigning function pointers in FFI).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8805); ?> (finfo returns wrong mime type for woff/woff2 files).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Added FILTER_FLAG_GLOBAL_RANGE to filter Global IPs.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Emit error for invalid port setting.</li>
  <li>Added extra check for FPM proc dumpable on SELinux based systems.</li>
  <li>Added support for listening queue on macOS.</li>
  <li>Changed default for listen.backlog on Linux to -1.</li>
  <li>Added listen.setfib pool option to set route FIB on FreeBSD.</li>
  <li>Added access.suppress_path pool option to filter access log entries.</li>
  <li>Fixed on fpm scoreboard occasional warning on acquisition failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9754); ?> (SaltStack (using Python subprocess) hangs when running php-fpm 8.1.11).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fix datetime format string to follow POSIX spec in ftp_mdtm().</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(81739); ?>: OOB read due to insufficient input validation in imageloadfont(). (CVE-2022-31630)</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9308); ?> (GMP throws the wrong error when a GMP object is passed to gmp_init()).</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(81738); ?>: buffer overflow in hash_update() on long parameter. (CVE-2022-37454)</li>
</ul></li>
<li>Intl:
<ul>
  <li>Update all grandfathered language tags with preferred values</li>
  <li>Fixed <?php githubissuel('php/php-src', 7939); ?> (Cannot unserialize IntlTimeZone objects).</li>
  <li>Fixed build for ICU 69.x and onwards.</li>
  <li>Declared Transliterator::$id as readonly to unlock subclassing it.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9421); ?> (Incorrect argument number for ValueError in NumberFormatter).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9248); ?> (Segmentation fault in mb_strimwidth()).</li>
</ul></li>
<li>mysqli:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9841); ?> (mysqli_query throws warning despite using silenced error mode).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed potential heap corruption due to alignment mismatch.</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Added oci8.prefetch_lob_size directive to tune LOB query performance</li>
  <li>Support for building against Oracle Client libraries 10.1 and 10.2 has been dropped. Oracle Client libraries 11.2 or newer are now required.</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8300); ?> (User input not escaped when building connection string).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9347); ?> (Current ODBC liveness checks may be inadequate).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Allocate JIT buffer close to PHP .text segemnt to allow using direct IP-relative calls and jumps.</li>
  <li>Added initial support for JIT performance profiling generation for macOs Instrument.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8030); ?> (Segfault with JIT and large match/switch statements).</li>
  <li>Added JIT support improvement for macOs for segments and executable permission bit handling.</li>
  <li>Added JIT buffer allocation near the .text section on FreeNSD.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9371); ?> (Crash with JIT on mac arm64) (jdp1024/David Carlier)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9259); ?> (opcache.interned_strings_buffer setting integer overflow).</li>
  <li>Added indirect call reduction for jit on x86 architectures.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9164); ?> (Segfault in zend_accel_class_hash_copy).</li>
  <li>Fix opcache preload with observers enabled.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Discard poll calls on socket when no timeout/non blocking/MSG_DONTWAIT.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9310); ?> (SSL local_cert and local_pk do not respect open_basedir).</li>
  <li>Implement FR #76935 ("chacha20-poly1305" is an AEAD but does not work like AEAD).</li>
  <li>Added openssl_cipher_key_length function.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9517); ?> (Compilation error openssl extension related to PR <?php githubissuel('php/php-src', 9366); ?>).</li>
  <li>Fixed missing clean up of OpenSSL engine list - attempt to fix <?php githubissuel('php/php-src', 8620); ?>.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8430); ?> (OpenSSL compiled with no-md2, no-md4 or no-rmd160 does not build).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed pcntl_(get|set)priority error handling for MacOS.</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php implemented(77726); ?> (Allow null character in regex patterns).</li>
  <li>Updated bundled libpcre to 10.40.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9818); ?> (Initialize run time cache in PDO methods).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8576); ?> (Bad interpretation of length when char is UTF-8).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li><?php bugfix(80909); ?> (crash with persistent connections in PDO_ODBC).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8300); ?> (User input not escaped when building connection string).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9347); ?> (Current ODBC liveness checks may be inadequate).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9372); ?> (HY010 when binding overlong parameter).</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9411); ?> (PgSQL large object resource is incorrectly closed).</li>
</ul></li>
<li>Random:
<ul>
  <li>Added new random extension.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9067); ?> (random extension is not thread safe).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9055); ?> (segmentation fault if user engine throws).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9066); ?> (signed integer overflow).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9083); ?> (undefined behavior during shifting).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9088); ?>, <?php githubissuel('php/php-src', 9056); ?> (incorrect expansion of bytes when generating uniform integers within a given range).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9089); ?> (Fix memory leak on Randomizer::__construct() call twice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9212); ?> (PcgOneseq128XslRr64::jump() should not allow negative $advance).</li>
  <li>Changed Mt19937 to throw a ValueError instead of InvalidArgumentException for invalid $mode.</li>
  <li>Splitted Random\Randomizer::getInt() (without arguments) to Random\Randomizer::nextInt().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9235); ?> (non-existant $sequence parameter in stub for PcgOneseq128XslRr64::__construct()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9190); ?>, <?php githubissuel('php/php-src', 9191); ?> (undefined behavior for MT_RAND_PHP when handling large ranges).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9249); ?> (Xoshiro256StarStar does not reject the invalid all-zero state).</li>
  <li>Removed redundant RuntimeExceptions from Randomizer methods. The exceptions thrown by the engines will be exposed directly.</li>
  <li>Added extension specific Exceptions/Errors (RandomException, RandomError, BrokenRandomEngineError).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9415); ?> (Randomizer::getInt(0, 2**32 - 1) with Mt19937 always returns 1).</li>
  <li>Fixed Randomizer::getInt() consistency for 32-bit engines.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9464); ?> (build on older macOs releases).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9839); ?> (Pre-PHP 8.2 output compatibility for non-mt_rand() functions for MT_RAND_PHP).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Added ReflectionFunction::isAnonymous().</li>
  <li>Added ReflectionMethod::hasPrototype().</li>
  <li>Narrow ReflectionEnum::getBackingType() return type to ReflectionNamedType.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8932); ?> (ReflectionFunction provides no way to get the called class of a Closure).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 7787); ?> (Improve session write failure message for user error handlers).</li>
  <li>Fixed <?php githubissuel('php/php-src', 9200); ?> (setcookie has an obsolete expires date format).</li>
  <li>Fixed <?php githubissuel('php/php-src', 9584); ?> (Avoid memory corruption when not unregistering custom session handler).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9583); ?> (session_create_id() fails with user defined save handler that doesn't have a validateId() method).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9720); ?> (Null pointer dereference while serializing the response).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Added TCP_NOTSENT_LOWAT socket option.</li>
  <li>Added SO_MEMINFO socket option.</li>
  <li>Added SO_RTABLE socket option (OpenBSD), equivalent of SO_MARK (Linux).</li>
  <li>Added TCP_KEEPALIVE, TCP_KEEPIDLE, TCP_KEEPINTVL, TCP_KEEPCNT socket options.</li>
  <li>Added ancillary data support for FreeBSD.</li>
  <li>Added ancillary data support for NetBSD.</li>
  <li>Added SO_BPF_EXTENSIONS socket option.</li>
  <li>Added SO_SETFIB socket option.</li>
  <li>Added TCP_CONGESTION socket option.</li>
  <li>Added SO_ZEROCOPY/MSG_ZEROCOPY options.</li>
  <li>Added SOL_FILTER socket option for Solaris.</li>
  <li>Fixed socket constants regression as of PHP 8.2.0beta3.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Added sodium_crypto_stream_xchacha20_xor_ic().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Uses safe_erealloc instead of erealloc to handle heap growth for the SplHeap::insert method to avoid possible overflows.</li>
  <li>Widen iterator_to_array() and iterator_count()'s $iterator parameter to iterable.</li>
  <li><?php bugfix(69181); ?> (READ_CSV|DROP_NEW_LINE drops newlines within fields).</li>
  <li><?php bugfix(65069); ?> (GlobIterator incorrect handling of open_basedir check).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Changed sqlite3.defensive from PHP_INI_SYSTEM to PHP_INI_USER.</li>
</ul></li>
<li>Standard:
<ul>
  <li>net_get_interfaces() also reports wireless network interfaces on Windows.</li>
  <li>Finished AVIF support in getimagesize().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 7847); ?> (stripos with large haystack has bad performance).</li>
  <li>New function memory_reset_peak_usage().</li>
  <li>Fixed parse_url(): can not recognize port without scheme.</li>
  <li>Deprecated utf8_encode() and utf8_decode().</li>
  <li>Fixed the crypt_sha256/512 api build with clang &gt; 12.</li>
  <li>Uses safe_erealloc instead of erealloc to handle options in getopt to avoid possible overflows.</li>
  <li>Implemented FR <?php githubissuel('php/php-src', 8924); ?> (str_split should return empty array for empty string).</li>
  <li>Added ini_parse_quantity function to convert ini quantities shorthand notation to int.</li>
  <li>Enable arc4random_buf for Linux glibc 2.36 and onwards for the random_bytes.</li>
  <li>Uses CCRandomGenerateBytes instead of arc4random_buf on macOs. (David Carlier).</li>
  <li><?php bugfix(65489); ?> (glob() basedir check is inconsistent).</li>
  <li>Fixed <?php githubissuel('php/php-src', 9200); ?> (setcookie has an obsolete expires date format).</li>
  <li>Fixed <?php githubissuel('php/php-src', 9244); ?> (Segfault with array_multisort + array_shift).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9296); ?> (`ksort` behaves incorrectly on arrays with mixed keys).</li>
  <li>Marked crypt()'s $string parameter as #[\SensitiveParameter].</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9464); ?> (build on older macOs releases).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9518); ?> (Disabling IPv6 support disables unrelated constants).</li>
  <li>Revert "Fixed parse_url(): can not recognize port without scheme." (andypost)</li>
  <li>Fix crash reading module_entry after DL_UNLOAD() when module already loaded.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Set IP_BIND_ADDRESS_NO_PORT if available when connecting to remote host.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8548); ?> (stream_wrapper_unregister() leaks memory).</li>
  <li>Discard poll calls on socket when no timeout/non blocking/MSG_DONTWAIT.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9316); ?> ($http_response_header is wrong for long status line).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9590); ?> (stream_select does not abort upon exception or empty valid fd set).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9653); ?> (file copy between different filesystems).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9779); ?> (stream_copy_to_stream fails if dest in append mode).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Added preliminary support for (cross-)building for ARM64.</li>
</ul></li>
<li>XML:
<ul>
  <li>Added libxml_get_external_entity_loader() function.</li>
</ul></li>
<li>Zip:
<ul>
  <li>add ZipArchive::clearError() method</li>
  <li>add ZipArchive::getStreamName() method</li>
  <li>add ZipArchive::getStreamIndex() method</li>
  <li>On Windows, the Zip extension is now built as shared library (DLL) by default.</li>
  <li>Implement fseek for zip stream when possible with libzip 1.9.1.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<a id="PHP_8_1"></a>

<section class="version" id="8.1.21"><!-- {{{ 8.1.21 -->
<h3>Version 8.1.21</h3>
<b><?php release_date('06-Jul-2023'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11246); ?> (cli/get_set_process_title fails on MacOS).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed build for the riscv64 architecture/GCC 12.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11433); ?> (Unable to set CURLOPT_ACCEPT_ENCODING to NULL).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 11288); ?> and <?php githubissuel('php/php-src', 11289); ?> and <?php githubissuel('php/php-src', 11290); ?> and <?php githubissuel('php/php-src', 9142); ?> (DOMExceptions and segfaults with replaceWith).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10234); ?> (Setting DOMAttr::textContent results in an empty attribute value).</li>
  <li>Fix return value in stub file for DOMNodeList::item.</li>
  <li>Fix spec compliance error with '*' namespace for DOMDocument::getElementsByTagNameNS.</li>
  <li>Fix DOMElement::append() and DOMElement::prepend() hierarchy checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11347); ?> (Memory leak when calling a static method inside an xpath query).</li>
  <li><?php bugfix(67440); ?> (append_node of a DOMDocumentFragment does not reconcile namespaces).</li>
  <li><?php bugfix(81642); ?> (DOMChildNode::replaceWith() bug when replacing a node with itself).</li>
  <li><?php bugfix(77686); ?> (Removed elements are still returned by getElementById).</li>
  <li><?php bugfix(70359); ?> (print_r() on DOMAttr causes Segfault in php_libxml_node_free_list()).</li>
  <li><?php bugfix(78577); ?> (Crash in DOMNameSpace debug info handlers).</li>
  <li>Fix lifetime issue with getAttributeNodeNS().</li>
  <li>Fix "invalid state error" with cloned namespace declarations.</li>
  <li><?php bugfix(55294); ?> and #47530 and #47847 (various namespace reconciliation issues).</li>
  <li><?php bugfix(80332); ?> (Completely broken array access functionality with DOMNamedNodeMap).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix allocation loop in zend_shared_alloc_startup().</li>
  <li>Access violation on smm_shared_globals with ALLOC_FALLBACK.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11336); ?> (php still tries to unlock the shared memory ZendSem with opcache.file_cache_only=1 but it was never locked).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9356); ?> Incomplete validation of IPv6 Address fields in subjectAltNames (James Lucas, Jakub Zelenka).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed intermittent segfault with pg_trace.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix cross-compilation check in phar generation for FreeBSD.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11338); ?> (SplFileInfo empty getBasename with more than one slash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix access on NULL pointer in array_merge_recursive().</li>
  <li>Fix exception handling in array_multisort().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.20"><!-- {{{ 8.1.20 -->
<h3>Version 8.1.20</h3>
<b><?php release_date('08-Jun-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9068); ?> (Conditional jump or move depends on uninitialised value(s)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11189); ?> (Exceeding memory limit in zend_hash_do_resize leaves the array in an invalid state).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11222); ?> (foreach by-ref may jump over keys during a rehash).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11281); ?> (DateTimeZone::getName() does not include seconds in offset).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10834); ?> (exif_read_data() cannot read smaller stream wrapper chunk sizes).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10461); ?> (PHP-FPM segfault due to after free usage of child-&gt;ev_std(out|err)).</li>
  <li><?php bugfix(64539); ?> (FPM status page: query_string not properly JSON encoded).</li>
  <li>Fixed memory leak for invalid primary script file handle.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11180); ?> (hash_file() appears to be restricted to 3 arguments).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11160); ?> (Few tests failed building with new libxml 2.11.0).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11134); ?> (Incorrect match default branch optimization).</li>
  <li>Fixed too wide OR and AND range inference.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11245); ?> (In some specific cases SWITCH with one default statement will cause segfault).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed parameter parsing of pg_lo_export().</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11099); ?> (Generating phar.php during cross-compile can't be done).</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug GHSA-76gg-c692-v2mw (Missing error check and insufficient random bytes in HTTP Digest authentication for SOAP). (CVE-2023-3247)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8426); ?> (make test fail while soap extension build).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11178); ?> (Segmentation fault in spl_array_it_get_current_data (PHP 8.1.18)).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11138); ?> (move_uploaded_file() emits open_basedir warning for source file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11274); ?> (POST/PATCH request switches to GET after a HTTP 308 redirect).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10031); ?> ([Stream] STREAM_NOTIFY_PROGRESS over HTTP emitted irregularly for last chunk of data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11175); ?> (Stream Socket Timeout).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11177); ?> (ASAN UndefinedBehaviorSanitizer when timeout = -1 passed to stream_socket_accept/stream_socket_client).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.19"><!-- {{{ 8.1.19 -->
<h3>Version 8.1.19</h3>
<b><?php release_date('11-May-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fix inconsistent float negation in constant expressions.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8841); ?> (php-cli core dump calling a badly formed function).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10737); ?> (PHP 8.1.16 segfaults on line 597 of sapi/apache2handler/sapi_apache2.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11028); ?> (Heap Buffer Overflow in zval_undefined_cv.).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11108); ?> (Incorrect CG(memoize_mode) state after bailout in ??=).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(80602); ?> (Segfault when using DOMChildNode::before()).</li>
  <li>Fixed incorrect error handling in dom_zvals_to_fragment().</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9397); ?> (exif read : warnings and errors : Potentially invalid endianess, Illegal IFD size and Undefined index).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11071); ?> (TZData version not displayed anymore).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10968); ?> (Segfault in preg_replace_callback_array()).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10990); ?> (mail() throws TypeError after iterating over $additional_headers array by reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9775); ?> (Duplicates returned by array_unique when using enums).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.18"><!-- {{{ 8.1.18 -->
<h3>Version 8.1.18</h3>
<b><?php release_date('13-Apr-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Added optional support for max_execution_time in ZTS/Linux builds.</li>
  <li>Fixed use-after-free in recursive AST evaluation.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8646); ?> (Memory leak PHP FPM 8.1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10801); ?> (Named arguments in CTE functions cause a segfault).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8789); ?> (PHP 8.0.20 (ZTS) zend_signal_handler_defer crashes on apache).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10015); ?> (zend_signal_handler_defer crashes on apache shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10810); ?> (Fix NUL byte terminating Exception::__toString()).</li>
  <li>Fix potential memory corruption when mixing __callStatic() and FFI.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10583); ?> (DateTime modify with tz pattern should not update linked timezone).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10611); ?> (fpm_env_init_main leaks environ).</li>
  <li>Destroy file_handle in fpm_main.</li>
  <li><?php bugfix(74129); ?> (Incorrect SCRIPT_NAME with apache ProxyPassMatch when spaces are in path).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Propagate success status of ftp_close().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10521); ?> (ftp_get/ftp_nb_get resumepos offset is maximum 10GB).</li>
</ul></li>
<li>IMAP:
<ul>
  <li>Fix build failure with Clang 16.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8979); ?> (Possible Memory Leak with SSL-enabled MySQL connections).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed build for macOS to cater with pkg-config settings.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8065); ?> (opcache.consistency_checks &gt; 0 causes segfaults in PHP &gt;= 8.1.5 in fpm context).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Add missing error checks on file writing functions.</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10908); ?> (Bus error with PDO Firebird on RPI with 64 bit kernel and 32 bit userland).</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed missing and inconsistent error checks on SQLAllocHandle.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10766); ?> (PharData archive created with Phar::Zip format does not keep files metadata (datetime)).</li>
  <li>Add missing error checks on EVP_MD_CTX_create() and EVP_VerifyInit().</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed typo in the array returned from pg_meta_data (extended mode).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10519); ?> (Array Data Address Reference Issue).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10844); ?> (ArrayIterator allows modification of readonly props).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10885); ?> (stream_socket_server context leaks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10052); ?> (Browscap crashes PHP 8.1.12 on request shutdown (apache2)).</li>
  <li>Fixed oss-fuzz #57392 (Buffer-overflow in php_fgetcsv() with \0 delimiter and enclosure).</li>
  <li>Fixed undefined behaviour in unpack().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.17"><!-- {{{ 8.1.17 -->
<h3>Version 8.1.17</h3>
<b><?php release_date('16-Mar-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed incorrect check condition in ZEND_YIELD.</li>
  <li>Fixed incorrect check condition in type inference.</li>
  <li>Fixed overflow check in OnUpdateMemoryConsumption.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9916); ?> (Entering shutdown sequence with a fiber suspended in a Generator emits an unavoidable fatal error or crashes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10437); ?> (Segfault/assertion when using fibers in shutdown function after bailout).</li>
  <li>Fixed SSA object type update for compound assignment opcodes.</li>
  <li>Fixed language scanner generation build.</li>
  <li>Fixed zend_update_static_property() calling zend_update_static_property_ex() misleadingly with the wrong return type.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10570); ?> (Fixed unknown string hash on property fetch with integer constant name).</li>
  <li>Fixed php_fopen_primary_script() call resulted on zend_destroy_file_handle() freeing dangling pointers on the handle as it was uninitialized.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed deprecation warning at compile time.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10270); ?> (Unable to return CURL_READFUNC_PAUSE in readfunc callback).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10447); ?> ('p' format specifier does not yield 'Z' for 00:00).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed incorrect bitshifting and masking in ffi bitfield.</li>
</ul></li>
<li>Fiber:
<ul>
  <li>Fixed assembly on alpine x86.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10496); ?> (segfault when garbage collector is invoked inside of fiber).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10315); ?> (FPM unknown child alert not valid).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10385); ?> (FPM successful config test early exit).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10647); ?> (Spoolchecker isSuspicious/areConfusable methods error code's argument always returning NULL0.</li>
</ul></li>
<li>JSON:
<ul>
  <li>Fixed JSON scanner and parser generation build.</li>
</ul></li>
<li>MBString:
<ul>
  <li>ext/mbstring: fix new_value length check.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10627); ?> (mb_convert_encoding crashes PHP on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix incorrect page_size check.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed php_openssl_set_server_dh_param() DH params errors handling.</li>
</ul></li>
<li>PDO OCI:
<ul>
  <li><?php bugfix(60994); ?> (Reading a multibyte CLOB caps at 8192 chars).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10715); ?> (heap buffer overflow on --run option misuse).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10672); ?> (pg_lo_open segfaults in the strict_types mode).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix incorrect check in phar tar parsing.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10623); ?> (Reflection::getClosureUsedVariables opcode fix with variadic arguments).</li>
  <li>Fix Segfault when using ReflectionFiber suspended by an internal function.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed ps_files_cleanup_dir() on failure code paths with -1 instead of 0 as the latter was considered success by callers. (nielsdos).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10292); ?> (Made the default value of the first param of srand() and mt_srand() unknown).</li>
  <li>Fix incorrect check in cs_8559_5 in map_from_unicode().</li>
  <li>Fix bug <?php githubissuel('php/php-src', 9697); ?> for reset/end/next/prev() attempting to move pointer of properties table for certain internal classes such as FFI classes</li>
  <li>Fix incorrect error check in browsecap for pcre2_match().</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leaks when attempting to open a non-existing file or a file over 4GB.</li>
  <li>Add missing error check on tidyLoadConfig.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed output_handler directive value's length which counted the string terminator.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.16"><!-- {{{ 8.1.16 -->
<h3>Version 8.1.16</h3>
<b><?php release_date('14-Feb-2023'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81744); ?> (Password_verify() always return true with some hash).</li>
  <li><?php bugfix(81746); ?> (1-byte array overrun in common path resolve code).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug GHSA-54hq-v5wp-fqgv (DOS vulnerability when parsing multipart request body). (CVE-2023-0662)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.15"><!-- {{{ 8.1.15 -->
<h3>Version 8.1.15</h3>
<b><?php release_date('02-Feb-2023'); ?></b>
<ul><li>Apache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9949); ?> (Partial content on incomplete POST request).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10072); ?> (PHP crashes when execute_ex is overridden and a __call trampoline is used from internal code).</li>
  <li>Fix <?php githubissuel('php/php-src', 10251); ?> (Assertion `(flag &amp; (1&lt;&lt;3)) == 0' failed).</li>
  <li>Fix wrong comparison in block optimisation pass after opcode update.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9891); ?> (DateTime modify with unixtimestamp (@) must work like setTimestamp).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10218); ?> (DateTimeZone fails to parse time zones that contain the "+" character).</li>
</ul></li>
<li>Fiber:
<ul>
  <li>Fix assertion on stack allocation size.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9981); ?> (FPM does not reset fastcgi.error_header).</li>
  <li><?php bugfix(67244); ?> (Wrong owner:group for listening unix socket).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Handle exceptions from __toString in XXH3's initialization (nielsdos)</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10112); ?> (LDAP\Connection::__construct() refers to ldap_create()).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed: mb_strlen (and a couple of other mbstring functions) would wrongly treat 0x80, 0xFD, 0xFE, 0xFF, and certain other byte values as the first byte of a 2-byte SJIS character.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fix inverted bailout value in zend_runtime_jit() (Max Kellermann).</li>
  <li>Fix access to uninitialized variable in accel_preload().</li>
  <li>Fix zend_jit_find_trace() crashes.</li>
  <li>Added missing lock for EXIT_INVALIDATE in zend_jit_trace_exit.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix wrong flags check for compression method in phar_object.c (nielsdos)</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix undefined behaviour in phpdbg_load_module_or_extension().</li>
  <li>Fix NULL pointer dereference in phpdbg_create_conditional_breal().</li>
  <li>Fix <?php githubissuel('php/php-src', 9710); ?>: phpdbg memory leaks by option "-h" (nielsdos)</li>
  <li>Fix phpdbg segmentation fault in case of malformed input (nielsdos)</li>
</ul></li>
<li>Posix:
<ul>
  <li>Fix memory leak in posix_ttyname() (girgias)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 10187); ?> (Segfault in stripslashes() with arm64).</li>
  <li>Fix substr_replace with slots in repl_ht being UNDEF.</li>
</ul></li>
<li>TSRM:
<ul>
  <li>Fixed Windows shmget() wrt. IPC_PRIVATE.</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Fix missing check for xmlTextWriterEndElement (nielsdos)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.14"><!-- {{{ 8.1.14 -->
<h3>Version 8.1.14</h3>
<b><?php release_date('05-Jan-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9905); ?> (constant() behaves inconsistent when class is undefined).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9918); ?> (License information for xxHash is not included in README.REDIST.BINS file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9650); ?> (Can't initialize heap: [0x000001e7]).</li>
  <li>Fixed potentially undefined behavior in Windows ftok(3) emulation.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9699); ?> (DateTimeImmutable::diff differences in 8.1.10 onwards - timezone related).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9700); ?> (DateTime::createFromFormat: Parsing TZID string is too greedy).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9866); ?> (Time zone bug with \DateTimeInterface::diff()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9880); ?> (DateTime diff returns wrong sign on day count when using a timezone).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9959); ?> (Solaris port event mechanism is still broken after bug #66694).</li>
  <li><?php bugfix(68207); ?> (Setting fastcgi.error_header can result in a WARNING).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8517); ?> (Random crash of FPM master process in fpm_stdio_child_said).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9535); ?> (The behavior of mb_strcut in mbstring has been changed in PHP8.1).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9968); ?> (Segmentation Fault during OPCache Preload).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9064); ?> (PHP fails to build if openssl was built with --no-ec).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10000); ?> (OpenSSL test failures when OpenSSL compiled with no-dsa).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9298); ?> (Signal handler called after rshutdown leads to crash).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9971); ?> (Incorrect NUMERIC value returned from PDO_Firebird).</li>
</ul></li>
<li>PDO/SQLite:
<ul>
  <li><?php bugfix(81740); ?> (PDO::quote() may return unquoted string). (CVE-2022-31631)</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9932); ?> (session name silently fails with . and [).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9883); ?> (SplFileObject::__toString() reads next line).</li>
  <li>Fixed <?php githubissuel('php/php-src', 10011); ?> (Trampoline autoloader will get reregistered and cannot be unregistered).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(81742); ?> (open_basedir bypass in SQLite3 by using file URI).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.13"><!-- {{{ 8.1.13 -->
<h3>Version 8.1.13</h3>
<b><?php release_date('24-Nov-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9709); ?> (Null pointer dereference with -w/-s options).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9752); ?> (Generator crashes when interrupted during argument evaluation with extra named params).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9801); ?> (Generator crashes when memory limit is exceeded during initialization).</li>
  <li>Fixed potential NULL pointer dereference Windows shm*() functions.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9750); ?> (Generator memory leak when interrupted during argument evaluation.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9763); ?> (DateTimeZone ctr mishandles input and adds null byte if the argument is an offset larger than 100*60 minutes).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9754); ?> (SaltStack (using Python subprocess) hangs when running php-fpm 8.1.11).</li>
</ul></li>
<li>mysqli:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9841); ?> (mysqli_query throws warning despite using silenced error mode).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed potential heap corruption due to alignment mismatch.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8430); ?> (OpenSSL compiled with no-md2, no-md4 or no-rmd160 does not build).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9720); ?> (Null pointer dereference while serializing the response).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.12"><!-- {{{ 8.1.12 -->
<h3>Version 8.1.12</h3>
<b><?php release_date('27-Oct-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixes segfault with Fiber on FreeBSD i386 architecture.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8805); ?> (finfo returns wrong mime type for woff/woff2 files).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(81739); ?>: OOB read due to insufficient input validation in imageloadfont(). (CVE-2022-31630)</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(81738); ?>: buffer overflow in hash_update() on long parameter. (CVE-2022-37454)</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9683); ?> (Problem when ISO-2022-JP-MS is specified in mb_ encode_mimeheader).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added indirect call reduction for jit on x86 architectures.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9583); ?> (session_create_id() fails with user defined save handler that doesn't have a validateId() method).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9590); ?> (stream_select does not abort upon exception or empty valid fd set).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.11"><!-- {{{ 8.1.11 -->
<h3>Version 8.1.11</h3>
<b><?php release_date('29-Sep-2022'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81726); ?>: phar wrapper: DOS when using quine gzip file. (CVE-2022-31628)</li>
  <li><?php bugfix(81727); ?>: Don't mangle HTTP variable names that clash with ones that have a specific semantic meaning. (CVE-2022-31629)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9323); ?> (Crash in ZEND_RETURN/GC/zend_call_function) (Tim Starling)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9361); ?> (Segmentation fault on script exit #9379).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9447); ?> (Invalid class FQN emitted by AST dump for new and class constants in constant expressions).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(79451); ?> (DOMDocument-&gt;replaceChild on doctype causes double free).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8885); ?> (FPM access.log with stderr begins to write logs to error_log after daemon reload).</li>
  <li><?php bugfix(77780); ?> ("Headers already sent..." when previous connection was aborted).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9308); ?> (GMP throws the wrong error when a GMP object is passed to gmp_init()).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9421); ?> (Incorrect argument number for ValueError in NumberFormatter).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed pcre.jit on Apple Silicon.</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9411); ?> (PgSQL large object resource is incorrectly closed).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8932); ?> (ReflectionFunction provides no way to get the called class of a Closure).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9316); ?> ($http_response_header is wrong for long status line).</li>
</ul></li>
</ul>
<!-- }}} --></section>



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

<section class="version" id="8.0.29"><!-- {{{ 8.0.29 -->
<h3>Version 8.0.29</h3>
<b><?php release_date('08-Jun-2023'); ?></b>
<ul><li>Soap:
<ul>
  <li>Fixed bug GHSA-76gg-c692-v2mw (Missing error check and insufficient random bytes in HTTP Digest authentication for SOAP). (CVE-2023-3247)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.28"><!-- {{{ 8.0.28 -->
<h3>Version 8.0.28</h3>
<b><?php release_date('14-Feb-2023'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(81744); ?> (Password_verify() always return true with some hash).</li>
  <li><?php bugfix(81746); ?> (1-byte array overrun in common path resolve code).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug GHSA-54hq-v5wp-fqgv (DOS vulnerability when parsing multipart request body). (CVE-2023-0662)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.27"><!-- {{{ 8.0.27 -->
<h3>Version 8.0.27</h3>
<b><?php release_date('05-Jan-2023'); ?></b>
<ul><li>PDO/SQLite:
<ul>
  <li><?php bugfix(81740); ?> (PDO::quote() may return unquoted string). (CVE-2022-31631)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.26"><!-- {{{ 8.0.26 -->
<h3>Version 8.0.26</h3>
<b><?php release_date('24-Nov-2022'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9709); ?> (Null pointer dereference with -w/-s options).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9752); ?> (Generator crashes when interrupted during argument evaluation with extra named params).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9801); ?> (Generator crashes when memory limit is exceeded during initialization).</li>
  <li>Fixed potential NULL pointer dereference in Windows shm*() functions.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9750); ?> (Generator memory leak when interrupted during argument evaluation.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9763); ?> (DateTimeZone ctr mishandles input and adds null byte if the argument is an offset larger than 100*60 minutes).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9754); ?> (SaltStack (using Python subprocess) hangs when running php-fpm 8.1.11).</li>
</ul></li>
<li>mysqli:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9841); ?> (mysqli_query throws warning despite using silenced error mode).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8430); ?> (OpenSSL compiled with no-md2, no-md4 or no-rmd160 does not build).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 9720); ?> (Null pointer dereference while serializing the response).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.25"><!-- {{{ 8.0.25 -->
<h3>Version 8.0.25</h3>
<b><?php release_date('27-Oct-2022'); ?></b>
<ul><li>GD:
<ul>
  <li><?php bugfix(81739); ?>: OOB read due to insufficient input validation in imageloadfont(). (CVE-2022-31630)</li>
</ul></li>
<li>Hash:
<ul>
  <li><?php bugfix(81738); ?>: buffer overflow in hash_update() on long parameter. (CVE-2022-37454)</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9583); ?> (session_create_id() fails with user defined save handler that doesn't have a validateId() method).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9590); ?> (stream_select does not abort upon exception or empty valid fd set).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.0.24"><!-- {{{ 8.0.24 -->
<h3>Version 8.0.24</h3>
<b><?php release_date('29-Sep-2022'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9323); ?> (Crash in ZEND_RETURN/GC/zend_call_function) (Tim Starling)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9361); ?> (Segmentation fault on script exit #9379).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9407); ?> (LSP error in eval'd code refers to wrong class for static type).</li>
  <li><?php bugfix(81727); ?>: Don't mangle HTTP variable names that clash with ones that have a specific semantic meaning. (CVE-2022-31629)</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(79451); ?> (DOMDocument-&gt;replaceChild on doctype causes double free).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8885); ?> (FPM access.log with stderr begins to write logs to error_log after daemon reload).</li>
  <li><?php bugfix(77780); ?> ("Headers already sent..." when previous connection was aborted).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9308); ?> (GMP throws the wrong error when a GMP object is passed to gmp_init()).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9421); ?> (Incorrect argument number for ValueError in NumberFormatter).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(81726); ?>: phar wrapper: DOS when using quine gzip file. (CVE-2022-31628)</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9411); ?> (PgSQL large object resource is incorrectly closed).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8932); ?> (ReflectionFunction provides no way to get the called class of a Closure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9409); ?> (Private method is incorrectly dumped as "overwrites").</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9316); ?> ($http_response_header is wrong for long status line).</li>
</ul></li>
</ul>
<!-- }}} --></section>



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
