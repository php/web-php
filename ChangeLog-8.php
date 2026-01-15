<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-8.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['8.5', '8.4', '8.3', '8.2', '8.1', '8.0'];
changelog_header(8, $MINOR_VERSIONS);
?>

<a id="PHP_8_5"></a>

<section class="version" id="8.5.1"><!-- {{{ 8.5.1 -->
<h3>Version 8.5.1</h3>
<b><?php release_date('18-Dec-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Sync all boost.context files with release 1.86.0.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20435); ?> (SensitiveParameter doesn't work for named argument passing to variadic parameter).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20546); ?> (preserve_none attribute configure check on macOs issue).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20286); ?> (use-after-destroy during userland stream_close()).</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix memory leak when edge case is hit when registering xpath callback.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20395); ?> (querySelector and querySelectorAll requires elements in $selectors to be lowercase).</li>
  <li>Fix missing NUL byte check on C14NFile().</li>
</ul></li>
<li>Fibers:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20483); ?> (ASAN stack overflow with fiber.stack_size INI small value).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20426); ?> (Spoofchecker::setRestrictionLevel() error message suggests missing constants).</li>
</ul></li>
<li>Lexbor:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20501); ?> (\Uri\WhatWg\Url lose host after calling withPath() or withQuery()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20502); ?> (\Uri\WhatWg\Url crashes (SEGV) when parsing malformed URL due to Lexbor memory corruption).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix some deprecations on newer libxml versions regarding input buffer/parser handling.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20528); ?> (Regression breaks mysql connexion using an IPv6 address enclosed in square brackets).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20329); ?> (opcache.file_cache broken with full interned string buffer).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20553); ?> (PDO::FETCH_CLASSTYPE ignores $constructorArgs in PHP 8.5.0).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '8xr5-qppj-gvwj'); ?> (PDO quoting result null deref). (CVE-2025-14180)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20442); ?> (Phar does not respect case-insensitiveness of __halt_compiler() when reading stub).</li>
  <li>Fix broken return value of fflush() for phar file entries.</li>
  <li>Fix assertion failure when fseeking a phar file out of bounds.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed ZPP type violation in phpdbg_get_executable() and phpdbg_end_oplog().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20614); ?> (SplFixedArray incorrectly handles references in deserialization).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leak in array_diff() with custom type checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20583); ?> (Stack overflow in http_build_query via deep structures).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'www2-q4fc-65wf'); ?> (Null byte termination in dns_get_record()).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'h96m-rvf9-jgm2'); ?> (Heap buffer overflow in array_merge()). (CVE-2025-14178)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '3237-qqm7-mfv7'); ?> (Information Leak of Memory in getimagesize). (CVE-2025-14177)</li>
</ul></li>
<li>URI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20366); ?> (ext/uri incorrectly throws ValueError when encountering null byte).</li>
  <li>Fixed CVE-2025-67899 (uriparser through 0.9.9 allows unbounded recursion and stack consumption).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20439); ?> (xml_set_default_handler() does not properly handle special characters in attributes when passing data to callback).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix crash in property existence test.</li>
  <li>Don't truncate return value of zip_fread() with user sizes.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.5.0"><!-- {{{ 8.5.0 -->
<h3>Version 8.5.0</h3>
<b><?php release_date('20-Nov-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Added the #[\NoDiscard] attribute to indicate that a function's return value is important and should be consumed.</li>
  <li>Added the (void) cast to indicate that not using a value is intentional.</li>
  <li>Added get_error_handler(), get_exception_handler() functions.</li>
  <li>Added support for casts in constant expressions.</li>
  <li>Added the pipe (|&gt;) operator.</li>
  <li>Added the #[\DelayedTargetValidation] attribute to delay target errors for internal attributes from compile time to runtime.</li>
  <li>Added support for `final` with constructor property promotion.</li>
  <li>Added support for configuring the URI parser for the FTP/FTPS as well as the SSL/TLS stream wrappers as described in https://wiki.php.net/rfc/url_parsing_api#plugability.</li>
  <li>Added PHP_BUILD_PROVIDER constant.</li>
  <li>Added PHP_BUILD_DATE constant.</li>
  <li>Added support for Closures and first class callables in constant expressions.</li>
  <li>Add support for backtraces for fatal errors.</li>
  <li>Add clone-with support to the clone() function.</li>
  <li>Add RFC 3986 and WHATWG URL compliant APIs for URL parsing and manipulation (kocsismate, timwolla)</li>
  <li>Fixed AST printing for immediately invoked Closure.</li>
  <li>Properly handle __debugInfo() returning an array reference.</li>
  <li>Properly handle reference return value from __toString().</li>
  <li>Improved error message of UnhandledMatchError for zend.exception_string_param_max_len=0.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15753); ?> and <?php githubissuel('php/php-src', 16198); ?> (Bind traits before parent class).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17951); ?> (memory_limit is not always limited by max_memory_limit).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20183); ?> (Stale EG(opline_before_exception) pointer through eval).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20113); ?> (Missing new Foo(...) error in constant expressions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19844); ?> (Don't bail when closing resources on shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20177); ?> (Accessing overridden private property in get_object_vars() triggers assertion error).</li>
  <li>Fix OSS-Fuzz #447521098 (Fatal error during sccp shift eval).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20002); ?> (Broken build on *BSD with MSAN).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19352); ?> (Cross-compilation with musl C library).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19765); ?> (object_properties_load() bypasses readonly property checks).</li>
  <li>Fixed hard_timeout with --enable-zend-max-execution-timers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19839); ?> (Incorrect HASH_FLAG_HAS_EMPTY_IND flag on userland array).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19823); ?> (register_argc_argv deprecation emitted twice when using OPcache).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19480); ?> (error_log php.ini cannot be unset when open_basedir is configured).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19719); ?> (Allow empty statements before declare(strict_types)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19934); ?> (CGI with auto_globals_jit=0 causes uouv).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19613); ?> (Stale array iterator pointer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19679); ?> (zend_ssa_range_widening may fail to converge).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19681); ?> (PHP_EXPAND_PATH broken with bash 5.3.0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18850); ?> (Repeated inclusion of file with __halt_compiler() triggers "Constant already defined" warning).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19476); ?> (pipe operator fails to correctly handle returning by reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19081); ?> (Wrong lineno in property error with constructor property promotion).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17959); ?> (Relax missing trait fatal error to error exception).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18033); ?> (NULL-ptr dereference when using register_tick_function in destructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18026); ?> (Improve "expecting token" error for ampersand).</li>
  <li>The report_memleaks INI directive has been deprecated.</li>
  <li>Fixed OSS-Fuzz #439125710 (Pipe cannot be used in write context).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19548); ?> (Shared memory violation on property inheritance).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19544); ?> (GC treats ZEND_WEAKREF_TAG_MAP references as WeakMap references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18373); ?> (Don't substitute self/parent with anonymous class).</li>
  <li>Fix support for non-userland stream notifiers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19305); ?> (Operands may be being released during comparison).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19306); ?> (Generator can be resumed while fetching next value from delegated Generator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19326); ?> (Calling Generator::throw() on a running generator with a non-Generator delegate crashes).</li>
  <li>Fix OSS-Fuzz #427814452 (pipe compilation fails with assert).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16665); ?> (\array and \callable should not be usable in class_alias).</li>
  <li>Use `clock_gettime_nsec_np()` for high resolution timer on macOS if available.</li>
  <li>Make `clone()` a function.</li>
  <li>Introduced the TAILCALL VM, enabled by default when compiling with Clang&gt;=19 on x86_64 or aarch64.</li>
  <li>Enacted the follow-up phase of the "Path to Saner Increment/Decrement operators" RFC, meaning that incrementing non-numeric strings is now deprecated. (Girgias).</li>
  <li>Various closure binding issues are now deprecated.</li>
  <li>Constant redeclaration has been deprecated.</li>
  <li>Marks the stack as non-executable on Haiku.</li>
  <li>Deriving $_SERVER['argc'] and $_SERVER['argv'] from the query string is now deprecated.</li>
  <li>Using null as an array offset or when calling array_key_exists() is now deprecated.</li>
  <li>The disable_classes INI directive has been removed.</li>
  <li>The locally predefined variable $http_response_header is deprecated.</li>
  <li>Non-canonical cast names (boolean), (integer), (double), and (binary) have been deprecated.</li>
  <li>The $exclude_disabled parameter of the get_defined_functions() function has been deprecated, as it no longer has any effect since PHP 8.0.</li>
  <li>Terminating case statements with a semicolon instead of a colon has been deprecated.</li>
  <li>The backtick operator as an alias for shell_exec() has been deprecated.</li>
  <li>Returning null from __debugInfo() has been deprecated.</li>
  <li>Support #[\Override] on properties.</li>
  <li>Destructing non-array values (other than NULL) using [] or list() now emits a warning.</li>
  <li>Casting floats that are not representable as ints now emits a warning.</li>
  <li>Casting NAN to other types now emits a warning.</li>
  <li>Implement <?php githubissuel('php/php-src', 15680); ?> (Enhance zend_dump_op_array to properly represent non-printable characters in string literals).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17442); ?> (Engine UAF with reference assign and dtor).</li>
  <li>Do not use RTLD_DEEPBIND if dlmopen is available.</li>
</ul></li>
<li>BCMath:
<ul>
  <li>Simplify `bc_divide()` code.</li>
  <li>If the result is 0, n_scale is set to 0.</li>
  <li>If size of BC_VECTOR array is within 64 bytes, stack area is now used.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20006); ?> (Power of 0 of BcMath number causes UB).</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19810); ?> (Broken bzopen() stream mode validation).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Add --ini=diff to print INI settings changed from the builtin default.</li>
  <li>Drop support for -z CLI/CGI flag.</li>
  <li>Fixed <?php githubissuel('php/php-src', 17956); ?> - development server 404 page does not adapt to mobiles.</li>
  <li>Fix useless "Failed to poll event" error logs due to EAGAIN in CLI server with PHP_CLI_SERVER_WORKERS.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19461); ?> (Improve error message on listening error with IPv6 address).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed property access of PHP objects wrapped in variant.</li>
  <li>Fixed method calls for PHP objects wrapped in variant.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Added CURLFOLLOW_ALL, CURLFOLLOW_OBEYCODE and CURLFOLLOW_FIRSTONLY values for CURLOPT_FOLLOWLOCATION curl_easy_setopt option.</li>
  <li>Added curl_multi_get_handles().</li>
  <li>Added curl_share_init_persistent().</li>
  <li>Added CURLINFO_USED_PROXY, CURLINFO_HTTPAUTH_USED, and CURLINFO_PROXYAUTH_USED support to curl_getinfo.</li>
  <li>Add support for CURLINFO_CONN_ID in curl_getinfo() (thecaliskan)</li>
  <li>Add support for CURLINFO_QUEUE_TIME_T in curl_getinfo() (thecaliskan)</li>
  <li>Add support for CURLOPT_SSL_SIGNATURE_ALGORITHMS.</li>
  <li>The curl_close() function has been deprecated.</li>
  <li>The curl_share_close() function has been deprecated.</li>
  <li>Fix cloning of CURLOPT_POSTFIELDS when using the clone operator instead of the curl_copy_handle() function to clone a CurlHandle.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix undefined behaviour problems regarding integer overflow in extreme edge cases.</li>
  <li>The DATE_RFC7231 and DateTimeInterface::RFC7231 constants have been deprecated.</li>
  <li>Fixed date_sunrise() and date_sunset() with partial-hour UTC offset.</li>
  <li>Fixed <?php githubissuel('php/php-src', 17159); ?>: "P" format for ::createFromFormat swallows string literals.</li>
  <li>The __wakeup() magic method of DateTimeInterface, DateTime, DateTimeImmutable, DateTimeZone, DateInterval, and DatePeriod has been deprecated in favour of the __unserialize() magic method.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Added Dom\Element::$outerHTML.</li>
  <li>Added Dom\Element::insertAdjacentHTML().</li>
  <li>Added $children property to ParentNode implementations.</li>
  <li>Make cloning DOM node lists, maps, and collections fail.</li>
  <li>Added Dom\Element::getElementsByClassName().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18877); ?> (\Dom\HTMLDocument querySelectorAll selecting only the first when using ~ and :has).</li>
  <li>Fix getNamedItemNS() incorrect namespace check.</li>
</ul></li>
<li>Enchant:
<ul>
  <li>Added enchant_dict_remove_from_session().</li>
  <li>Added enchant_dict_remove().</li>
  <li>Fix missing empty string checks.</li>
</ul></li>
<li>EXIF:
<ul>
  <li>Add OffsetTime* Exif tags.</li>
  <li>Added support to retrieve Exif from HEIF file.</li>
  <li>Fix OSS-Fuzz #442954659 (zero-size box in HEIF file causes infinite loop).</li>
  <li>Fix OSS-Fuzz #442954659 (Crash in exif_scan_HEIF_header).</li>
  <li>Various hardening fixes to HEIF parsing.</li>
</ul></li>
<li>FileInfo:
<ul>
  <li>The finfo_close() function has been deprecated.</li>
  <li>The $context parameter of the finfo_buffer() function has been deprecated as it is ignored.</li>
  <li>Upgrade to file 5.46.</li>
  <li>Change return type of finfo_close() to true.</li>
</ul></li>
<li>Filter:
<ul>
  <li>Added support for configuring the URI parser for FILTER_VALIDATE_URL as described in https://wiki.php.net/rfc/url_parsing_api#plugability.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16993); ?> (filter_var_array with FILTER_VALIDATE_INT|FILTER_NULL_ON_FAILURE should emit warning for invalid filter usage).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19817); ?> (Decode SCRIPT_FILENAME issue in php 8.5).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19989); ?> (PHP 8.5 FPM access log lines also go to STDERR).</li>
  <li>Fixed <?php githubissuel('php/php-src', 17645); ?> (FPM with httpd ProxyPass does not decode script path).</li>
  <li>Make FPM access log limit configurable using log_limit.</li>
  <li>Fixed failed debug assertion when php_admin_value setting fails.</li>
  <li>Fixed <?php githubissuel('php/php-src', 8157); ?> (post_max_size evaluates .user.ini too late in php-fpm).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(68629); ?> (Transparent artifacts when using imagerotate).</li>
  <li><?php bugfix(64823); ?> (ZTS GD fails to find system TrueType font).</li>
  <li>Fix incorrect comparison with result of php_stream_can_cast().</li>
  <li>The imagedestroy() function has been deprecated.</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Extends the ICONV_CONST preprocessor for illumos/solaris.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Bumped ICU requirement to ICU &gt;= 57.1.</li>
  <li>IntlDateFormatter::setTimeZone()/datefmt_set_timezone() throws an exception with uninitialised classes or clone failure.</li>
  <li>Added DECIMAL_COMPACT_SHORT/DECIMAL_COMPACT_LONG for NumberFormatter class.</li>
  <li>Added Locale::isRightToLeft to check if a locale is written right to left.</li>
  <li>Added null bytes presence in locale inputs for Locale class.</li>
  <li>Added grapheme_levenshtein() function.</li>
  <li>Added Locale::addLikelySubtags/Locale::minimizeSubtags to handle adding/removing likely subtags to a locale.</li>
  <li>Added IntlListFormatter class to format a list of items with a locale, operands types and units.</li>
  <li>Added grapheme_strpos(), grapheme_stripos(), grapheme_strrpos(), grapheme_strripos(), grapheme_substr(), grapheme_strstr(), grapheme_stristr() and grapheme_levenshtein() functions add $locale parameter (Yuya Hamada).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11952); ?> (Fix locale strings canonicalization for IntlDateFormatter and NumberFormatter).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18566); ?> ([intl] Weird numeric sort in Collator).</li>
  <li>Fix return value on failure for resourcebundle count handler.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19307); ?> (PGO builds of shared ext-intl are broken).</li>
  <li>Intl's internal error mechanism has been modernized so that it indicates more accurately which call site caused what error. Moreover, some ext/date exceptions have been wrapped inside a IntlException now.</li>
  <li>The intl.error_level INI setting has been deprecated.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Allow ldap_get_option to retrieve global option by allowing NULL for connection instance ($ldap).</li>
</ul></li>
<li>MBstring:
<ul>
  <li>Updated Unicode data tables to Unicode 17.0.</li>
</ul></li>
<li>MySQLi:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 17900); ?> and <?php githubissuel('php/php-src', 8084); ?> (calling mysqli::__construct twice).</li>
  <li>The mysqli_execute() alias function has been deprecated.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Added mysqlnd.collect_memory_statistics to ini quick reference.</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Removed driver-specific build flags and support.</li>
  <li>Remove ODBCVER and assume ODBC 3.5.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Make OPcache non-optional (Arnaud, timwolla)</li>
  <li>Added opcache.file_cache_read_only.</li>
  <li>Updated default value of opcache.jit_hot_loop.</li>
  <li>Log a warning when opcache lock file permissions could not be changed.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20012); ?> (heap buffer overflow in jit).</li>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 17733); ?> (Avoid calling wrong function when reusing file caches across differing environments).</li>
  <li>Disallow changing opcache.memory_consumption when SHM is already set up.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15074); ?> (Compiling opcache statically into ZTS PHP fails).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17422); ?> (OPcache bypasses the user-defined error handler for deprecations).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19301); ?> (opcache build failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20081); ?> (access to uninitialized vars in preload_load()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20121); ?> (JIT broken in ZTS builds on MacOS 15).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19875); ?> (JIT 1205 segfault on large file compiled in subprocess).</li>
  <li>Fixed segfault in function JIT due to NAN to bool warning.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19984); ?> (Double-free of EG(errors)/persistent_script-&gt;warnings on persist of already persisted file).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19889); ?> (race condition in zend_runtime_jit(), zend_jit_hot_func()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19669); ?> (assertion failure in zend_jit_trace_type_to_info_ex).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19831); ?> (function JIT may not deref property value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19486); ?> (Incorrect opline after deoptimization).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19601); ?> (Wrong JIT stack setup on aarch64/clang).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19388); ?> (Broken opcache.huge_code_pages).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19657); ?> (Build fails on non-glibc/musl/freebsd/macos/win platforms).</li>
  <li>Fixed ZTS OPcache build on Cygwin.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19493); ?> (JIT variable not stored before YIELD).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Added openssl.libctx INI that allows to select the OpenSSL library context type and convert various parts of the extension to use the custom libctx.</li>
  <li>Add $digest_algo parameter to openssl_public_encrypt() and openssl_private_decrypt() functions.</li>
  <li>Implement #81724 (openssl_cms_encrypt only allows specific ciphers).</li>
  <li>Implement #80495 (Enable to set padding in openssl_(sign|verify).</li>
  <li>Implement #47728 (openssl_pkcs7_sign ignores new openssl flags).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19994); ?> (openssl_get_cipher_methods inconsistent with fetching).</li>
  <li>Fixed build when --with-openssl-legacy-provider set.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19369); ?> (8.5 | Regression in openssl_sign() - support for alias algorithms appears to be broken).</li>
  <li>The $key_length parameter for openssl_pkey_derive() has been deprecated.</li>
</ul></li>
<li>Output:
<ul>
  <li>Fixed calculation of aligned buffer size.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Extend pcntl_waitid with rusage parameter.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Remove PCRE2_EXTRA_ALLOW_LOOKAROUND_BSK from pcre compile options.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20095); ?> (Incorrect class name in deprecation message for PDO mixins).</li>
  <li>Driver specific methods and constants in the PDO class are now deprecated.</li>
  <li>The "uri:" DSN scheme has been deprecated due to security concerns with DSNs coming from remote URIs.</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Fetch larger block sizes and better handle SQL_NO_TOTAL when calling SQLGetData.</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Added Iterable support for PDO::pgsqlCopyFromArray.</li>
  <li>Implement <?php githubissuel('php/php-src', 15387); ?> Pdo\Pgsql::setAttribute(PDO::ATTR_PREFETCH, 0) or Pdo\Pgsql::prepare(…, [ PDO::ATTR_PREFETCH =&gt; 0 ]) make fetch() lazy instead of storing the whole result set in memory (Guillaume Outters)</li>
</ul></li>
<li>PDO_SQLITE:
<ul>
  <li>Add PDO\Sqlite::ATTR_TRANSACTION_MODE connection attribute.</li>
  <li>Implement <?php githubissuel('php/php-src', 17321); ?>: Add setAuthorizer to Pdo\Sqlite.</li>
  <li>PDO::sqliteCreateCollation now throws a TypeError if the callback has a wrong return type.</li>
  <li>Added Pdo_Sqlite::ATTR_BUSY_STATEMENT constant to check if a statement is currently executing.</li>
  <li>Added Pdo_Sqlite::ATTR_EXPLAIN_STATEMENT constant to set a statement in either EXPLAIN_MODE_PREPARED, EXPLAIN_MODE_EXPLAIN, EXPLAIN_MODE_EXPLAIN_QUERY_PLAN modes.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 13952); ?> (sqlite PDO::quote silently corrupts strings with null bytes) by throwing on null bytes.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Added pg_close_stmt to close a prepared statement while allowing its name to be reused.</li>
  <li>Added Iterable support for pgsql_copy_from.</li>
  <li>pg_connect checks if connection_string contains any null byte, pg_close_stmt check if the statement contains any null byte.</li>
  <li>Added pg_service to get the connection current service identifier.</li>
  <li>Fix segfaults when attempting to fetch row into a non-instantiable class name.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix potential buffer length truncation due to usage of type int instead of type size_t.</li>
  <li>Fixed memory leaks when verifying OpenSSL signature.</li>
</ul></li>
<li>POSIX:
<ul>
  <li>Added POSIX_SC_OPEN_MAX constant to get the number of file descriptors a process can handle.</li>
  <li>posix_ttyname() sets last_error to EBADF on invalid file descriptors, posix_isatty() raises E_WARNING on invalid file descriptors, posix_fpathconf checks invalid file descriptors.</li>
  <li>posix_kill and posix_setpgid throws a ValueError on invalid process_id.</li>
  <li>posix_setpgid throws a ValueError on invalid process_group_id, posix_setrlimit throws a ValueError on invalid soft_limit and hard_limit arguments.</li>
</ul></li>
<li>Random:
<ul>
  <li>Moves from /dev/urandom usage to arc4random_buf on Haiku.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Added ReflectionConstant::getExtension() and ::getExtensionName().</li>
  <li>Added ReflectionProperty::getMangledName() method.</li>
  <li>ReflectionConstant is no longer final.</li>
  <li>The setAccessible() methods of various Reflection objects have been deprecated, as those no longer have an effect.</li>
  <li>ReflectionClass::getConstant() for constants that do not exist has been deprecated.</li>
  <li>ReflectionProperty::getDefaultValue() for properties without default values has been deprecated.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12856); ?> (ReflectionClass::getStaticPropertyValue() returns UNDEF zval for uninitialized typed properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15766); ?> (ReflectionClass::__toString() should have better output for enums).</li>
  <li>Fix <?php githubissuel('php/php-src', 19691); ?> (getModifierNames() not reporting asymmetric visibility).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17927); ?> (Reflection: have some indication of property hooks in `_property_string()`).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19187); ?> (ReflectionNamedType::getName() prints nullable type when retrieved from ReflectionProperty::getSettableType()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20217); ?> (ReflectionClass::isIterable() incorrectly returns true for classes with property hooks).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18582); ?> and #81451: http_response_code() does not override the status code generated by header().</li>
</ul></li>
<li>Session:
<ul>
  <li>session_start() throws a ValueError on option argument if not a hashmap or a TypeError if read_and_close value is not compatible with int.</li>
  <li>Added support for partitioned cookies.</li>
  <li>Fix RC violation of session SID constant deprecation attribute.</li>
  <li>Fixed <?php githubissuel('php/php-src', 19197); ?>: build broken with ZEND_STRL usage with memcpy when implemented as macro.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12231); ?> (SimpleXML xpath should warn when returning other return types than node lists).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>snmpget, snmpset, snmp_get2, snmp_set2, snmp_get3, snmp_set3 and SNMP::__construct() throw an exception on invalid hostname, community timeout and retries arguments.</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Added support for configuring the URI parser for SoapClient::__doRequest() as described in https://wiki.php.net/rfc/url_parsing_api#plugability.</li>
  <li>Implement request #55503 (Extend __getTypes to support enumerations).</li>
  <li>Implement request #61105 (Support Soap 1.2 SoapFault Reason Text lang attribute).</li>
  <li><?php bugfix(49169); ?> (SoapServer calls wrong function, although "SOAP action" header is correct).</li>
  <li>Fix namespace handling of WSDL and XML schema in SOAP, fixing at least <?php githubissuel('php/php-src', 16320); ?> and bug #68576.</li>
  <li><?php bugfix(70951); ?> (Segmentation fault on invalid WSDL cache).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19773); ?> (SIGSEGV due to uninitialized soap_globals-&gt;lang_en).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19226); ?> (Segfault when spawning new thread in soap extension).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Added IPPROTO_ICMP/IPPROTO_ICMPV6 to create raw socket for ICMP usage.</li>
  <li>Added TCP_FUNCTION_BLK to change the TCP stack algorithm on FreeBSD.</li>
  <li>Added IP_BINDANY for a socket to bind to any address.</li>
  <li>Added SO_BUSY_POOL to reduce packets poll latency.</li>
  <li>Added UDP_SEGMENT support to optimise multiple large datagrams over UDP if the kernel and hardware supports it.</li>
  <li>Added SHUT_RD, SHUT_WR and SHUT_RDWR constants for socket_shutdown().</li>
  <li>Added TCP_FUNCTION_ALIAS, TCP_REUSPORT_LB_NUMA, TCP_REUSPORT_LB_NUMA_NODOM, TCP_REUSPORT_LB_CURDOM, TCP_BBR_ALGORITHM constants.</li>
  <li>socket_set_option() catches possible overflow with SO_RCVTIMEO/SO_SNDTIMEO with timeout setting on windows.</li>
  <li>socket_create_listen() throws an exception on invalid port value.</li>
  <li>socket_bind() throws an exception on invalid port value.</li>
  <li>socket_sendto() throws an exception on invalid port value.</li>
  <li>socket_addrinfo_lookup throws an exception on invalid hints value types.</li>
  <li>socket_addrinfo_lookup throws an exception if any of the hints value overflows.</li>
  <li>socket_addrinfo_lookup throws an exception if one or more hints entries has an index as numeric.</li>
  <li>socket_set_option with the options MCAST_LEAVE_GROUP/MCAST_LEAVE_SOURCE_GROUP will throw an exception if its value is not a valid array/object.</li>
  <li>socket_getsockname/socket_create/socket_bind handled AF_PACKET family socket.</li>
  <li>socket_set_option for multicast context throws a ValueError when the socket family is not of AF_INET/AF_INET6 family.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Fix overall theoretical overflows on zend_string buffer allocations.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20101); ?> (SplHeap/SplPriorityQueue serialization exposes INDIRECTs).</li>
  <li>Improve __unserialize() hardening for SplHeap/SplPriorityQueue.</li>
  <li>Deprecate ArrayObject and ArrayIterator with objects.</li>
  <li>Unregistering all autoloaders by passing the spl_autoload_call() function as a callback argument to spl_autoload_unregister() has been deprecated. Instead if this is needed, one should iterate over the return value of spl_autoload_functions() and call spl_autoload_unregister() on each value.</li>
  <li>The SplObjectStorage::contains(), SplObjectStorage::attach(), and SplObjectStorage::detach() methods have been deprecated in favour of SplObjectStorage::offsetExists(), SplObjectStorage::offsetSet(), and SplObjectStorage::offsetUnset() respectively.</li>
</ul></li>
<li>Sqlite:
<ul>
  <li>Added Sqlite3Stmt::busy to check if a statement is still being executed.</li>
  <li>Added Sqlite3Stmt::explain to produce an explain query plan from the statement.</li>
  <li>Added Sqlite3Result::fetchAll to return all results at once from a query.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Add HEIF/HEIC support to getimagesize.</li>
  <li>Added support for partitioned cookies.</li>
  <li>Implement #71517 (Implement SVG support for getimagesize() and friends).</li>
  <li>Implement <?php githubissuel('php/php-src', 19188); ?>: Add support for new INI mail.cr_lf_mode.</li>
  <li>Optimized PHP html_entity_decode function.</li>
  <li>Minor optimization to array_chunk().</li>
  <li>Optimized pack().</li>
  <li>Fixed crypt() tests on musl when using --with-external-libcrypt (Michael Orlitzky).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18062); ?> (is_callable(func(...), callable_name: $name) for first class callables returns wrong name).</li>
  <li>Added array_first() and array_last().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18823); ?> (setlocale's 2nd and 3rd argument ignores strict_types).</li>
  <li>Fixed exit code handling of sendmail cmd and added warnings.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18897); ?> (printf: empty precision is interpreted as precision 6, not as precision 0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20257); ?> (mail() heap overflow with an empty message in lf mode).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20201); ?> (AVIF images misdetected as HEIF after introducing HEIF support in getimagesize()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19926); ?> (reset internal pointer earlier while splicing array while COW violation flag is still set).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19801); ?> (leaks in var_dump() and debug_zval_dump()).</li>
  <li>Fixed <?php githubissuel('php/php-src', 14402); ?> (SplPriorityQueue, SplMinHeap, and SplMaxHeap lost their data on serialize()).</li>
  <li>Fixed <?php githubissuel('php/php-src', 19610); ?> (Deprecation warnings in functions taking as argument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19577); ?> (Avoid integer overflow when using a small offset and PHP_INT_MAX with LimitIterator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19153); ?> (#[\Attribute] validation should error on trait/interface/enum/abstract class).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19070); ?> (setlocale($type, NULL) should not be deprecated).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16649); ?> (UAF during array_splice).</li>
  <li>Passing strings which are not one byte long to ord() is now deprecated.</li>
  <li>Passing integers outside the interval [0, 255] to chr() is now deprecated.</li>
  <li>The socket_set_timeout() alias function has been deprecated.</li>
  <li>Passing null to readdir(), rewinddir(), and closedir() to use the last opened directory has been deprecated.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16889); ?> (stream_select() timeout useless for pipes on Windows).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19798); ?>: XP_SOCKET XP_SSL (Socket stream modules): Incorrect condition for Win32/Win64.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14506); ?> (Closing a userspace stream inside a userspace handler causes heap corruption).</li>
  <li>Avoid double conversion to string in php_userstreamop_readdir().</li>
</ul></li>
<li>Tests:
<ul>
  <li>Allow to shuffle tests even in non-parallel mode.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>tidy::__construct/parseFile/parseString methods throw an exception if the configuration argument is invalid.</li>
  <li>Fixed <?php githubissuel('php/php-src', 19021); ?> (improved tidyOptGetCategory detection).</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19507); ?> (Corrupted result after recursive tokenization during token_get_all()).</li>
</ul></li>
<li>URI:
<ul>
  <li>Add new URI extension.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10992); ?> (Improper long path support for relative paths).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16843); ?> (Windows phpize builds ignore source subfolders).</li>
  <li>Fix <?php githubissuel('php/php-src', 19722); ?> (_get_osfhandle asserts in debug mode when given a socket).</li>
</ul></li>
<li>XML:
<ul>
  <li>The xml_parser_free() function has been deprecated.</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Improved performance and reduce memory consumption.</li>
</ul></li>
<li>XSL:
<ul>
  <li>Implement request #30622 (make $namespace parameter functional).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>gzfile, gzopen and readgzfile, their "use_include_path" argument is now a boolean.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16883); ?> (gzopen() does not use the default stream context when opening HTTP URLs).</li>
  <li>Implemented <?php githubissuel('php/php-src', 17668); ?> (zlib streams should support locking).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed missing zend_release_fcall_info_cache on the following methods ZipArchive::registerProgressCallback() and ZipArchive::registerCancelCallback() on failure.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<a id="PHP_8_4"></a>

<section class="version" id="8.4.17"><!-- {{{ 8.4.17 -->
<h3>Version 8.4.17</h3>
<b><?php release_date('15-Jan-2026'); ?></b>
<ul><li>Core:
<ul>
  <li>Fix OSS-Fuzz #465488618 (Wrong assumptions when dumping function signature with dynamic class const lookup default argument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20695); ?> (Assertion failure in normalize_value() when parsing malformed INI input via parse_ini_string()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20714); ?> (Uncatchable exception thrown in generator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20352); ?> (UAF in php_output_handler_free via re-entrant ob_start() during error deactivation).</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20620); ?> (bzcompress overflow on large source size).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20722); ?> (Null pointer dereference in DOM namespace node cloning via clone on malformed objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20444); ?> (Dom\XMLDocument::C14N() seems broken compared to DOMDocument::C14N()).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20622); ?> (imagestring/imagestringup overflow).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix leak in umsg_format_helper().</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fix memory leak in ldap_set_options().</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20674); ?> (mb_decode_mimeheader does not handle separator).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed bug with pcntl_getcpuaffinity() on solaris regarding invalid process ids handling.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20732); ?> (Phar::LoadPhar undefined behavior when reading fails).</li>
  <li>Fix SplFileInfo::openFile() in write mode.</li>
  <li>Fix build on legacy OpenSSL 1.1.0 systems.</li>
  <li><?php bugfix(74154); ?> (Phar extractTo creates empty files).</li>
</ul></li>
<li>POSIX:
<ul>
  <li>Fixed crash on posix groups to php array creation on macos.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20678); ?> (resource created by GlobIterator crashes with fclose()).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20699); ?> (SQLite3Result fetchArray return array|false, null returned).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix error check for proc_open() command.</li>
  <li>Fix memory leak in mail() when header key is numeric.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20582); ?> (Heap Buffer Overflow in iptcembed).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fix OOB gzseek() causing assertion failure.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.16"><!-- {{{ 8.4.16 -->
<h3>Version 8.4.16</h3>
<b><?php release_date('18-Dec-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Sync all boost.context files with release 1.86.0.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20435); ?> (SensitiveParameter doesn't work for named argument passing to variadic parameter).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20286); ?> (use-after-destroy during userland stream_close()).</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix crashes when trying to instantiate uninstantiable classes via date static constructors.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix memory leak when edge case is hit when registering xpath callback.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20395); ?> (querySelector and querySelectorAll requires elements in $selectors to be lowercase).</li>
  <li>Fix missing NUL byte check on C14NFile().</li>
</ul></li>
<li>Fibers:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20483); ?> (ASAN stack overflow with fiber.stack_size INI small value).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20601); ?> (ftp_connect overflow on timeout).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20511); ?> (imagegammacorrect out of range input/output values).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20602); ?> (imagescale overflow with large height values).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20426); ?> (Spoofchecker::setRestrictionLevel() error message suggests missing constants).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix some deprecations on newer libxml versions regarding input buffer/parser handling.</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20491); ?> (SLES15 compile error with mbstring oniguruma).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20492); ?> (mbstring compile warning due to non-strings).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20528); ?> (Regression breaks mysql connexion using an IPv6 address enclosed in square brackets).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20329); ?> (opcache.file_cache broken with full interned string buffer).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '8xr5-qppj-gvwj'); ?> (PDO quoting result null deref). (CVE-2025-14180)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20442); ?> (Phar does not respect case-insensitiveness of __halt_compiler() when reading stub).</li>
  <li>Fix broken return value of fflush() for phar file entries.</li>
  <li>Fix assertion failure when fseeking a phar file out of bounds.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed ZPP type violation in phpdbg_get_executable() and phpdbg_end_oplog().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20614); ?> (SplFixedArray incorrectly handles references in deserialization).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leak in array_diff() with custom type checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20583); ?> (Stack overflow in http_build_query via deep structures).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'www2-q4fc-65wf'); ?> (Null byte termination in dns_get_record()).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'h96m-rvf9-jgm2'); ?> (Heap buffer overflow in array_merge()). (CVE-2025-14178)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '3237-qqm7-mfv7'); ?> (Information Leak of Memory in getimagesize). (CVE-2025-14177)</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20374); ?> (PHP with tidy and custom-tags).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20439); ?> (xml_set_default_handler() does not properly handle special characters in attributes when passing data to callback).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix crash in property existence test.</li>
  <li>Don't truncate return value of zip_fread() with user sizes.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.15"><!-- {{{ 8.4.15 -->
<h3>Version 8.4.15</h3>
<b><?php release_date('20-Nov-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19934); ?> (CGI with auto_globals_jit=0 causes uouv).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20073); ?> (Assertion failure in WeakMap offset operations on reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20085); ?> (Assertion failure when combining lazy object get_properties exception with foreach loop).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19844); ?> (Don't bail when closing resources on shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20177); ?> (Accessing overridden private property in get_object_vars() triggers assertion error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20270); ?> (Broken parent hook call with named arguments).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20183); ?> (Stale EG(opline_before_exception) pointer through eval).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 16317); ?> (DOM classes do not allow __debugInfo() overrides to work).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20281); ?> (\Dom\Document::getElementById() is inconsistent after nodes are removed).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fix possible memory leak when tag is empty.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19974); ?> (fpm_status_export_to_zval segfault for parallel execution).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20240); ?> (FTP with SSL: ftp_fput(): Connection timed out on successful writes).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20070); ?> (Return type violation in imagefilter when an invalid filter is provided).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak on error in locale_filter_matches().</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix not thread safe schema/relaxng calls.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8978); ?> (SSL certificate verification fails (port doubled)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20122); ?> (getColumnMeta() for JSON-column in MySQL).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20081); ?> (access to uninitialized vars in preload_load()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20121); ?> (JIT broken in ZTS builds on MacOS 15).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19875); ?> (JIT 1205 segfault on large file compiled in subprocess).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20012); ?> (heap buffer overflow in jit).</li>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 17733); ?> (Avoid calling wrong function when reusing file caches across differing environments).</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fix memory leak when first string conversion fails.</li>
  <li>Fix segfaults when attempting to fetch row into a non-instantiable class name.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix memory leak of argument in webPhar.</li>
  <li>Fix memory leak when setAlias() fails.</li>
  <li>Fix a bunch of memory leaks in phar_parse_zipfile() error handling.</li>
  <li>Fix file descriptor/memory leak when opening central fp fails.</li>
  <li>Fix memleak+UAF when opening temp stream in buildFromDirectory() fails.</li>
  <li>Fix potential buffer length truncation due to usage of type int instead of type size_t.</li>
  <li>Fix memory leak when openssl polyfill returns garbage.</li>
  <li>Fix file descriptor leak in phar_zip_flush() on failure.</li>
  <li>Fix memory leak when opening temp file fails while trying to open gzip-compressed archive.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20302); ?> (Freeing a phar alias may invalidate PharFileInfo objects).</li>
</ul></li>
<li>Random:
<ul>
  <li>Fix Randomizer::__serialize() w.r.t. INDIRECTs.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20217); ?> (ReflectionClass::isIterable() incorrectly returns true for classes with property hooks).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 16317); ?> (SimpleXML does not allow __debugInfo() overrides to work).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19798); ?>: XP_SOCKET XP_SSL (Socket stream modules): Incorrect condition for Win32/Win64.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19021); ?> (improved tidyOptGetCategory detection).</li>
  <li>Fix UAF in tidy when tidySetErrorBuffer() fails.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fix arginfo/zpp violations when LIBXML_SCHEMAS_ENABLED is not available.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 19722); ?> (_get_osfhandle asserts in debug mode when given a socket).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.14"><!-- {{{ 8.4.14 -->
<h3>Version 8.4.14</h3>
<b><?php release_date('23-Oct-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19765); ?> (object_properties_load() bypasses readonly property checks).</li>
  <li>Fixed hard_timeout with --enable-zend-max-execution-timers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19792); ?> (SCCP causes UAF for return value if both warning and exception are triggered).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19653); ?> (Closure named argument unpacking between temporary closures can cause a crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19839); ?> (Incorrect HASH_FLAG_HAS_EMPTY_IND flag on userland array).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19480); ?> (error_log php.ini cannot be unset when open_basedir is configured).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20002); ?> (Broken build on *BSD with MSAN).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fix useless "Failed to poll event" error logs due to EAGAIN in CLI server with PHP_CLI_SERVER_WORKERS.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix cloning of CURLOPT_POSTFIELDS when using the clone operator instead of the curl_copy_handle() function to clone a CurlHandle.</li>
  <li>Fix curl build and test failures with version 8.16.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 17159); ?>: "P" format for ::createFromFormat swallows string literals.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix macro name clash on macOS.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20022); ?> (docker-php-ext-install DOM failed).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19955); ?> (imagefttext() memory leak).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(67563); ?> (mysqli compiled with mysqlnd does not take ipv6 adress as parameter).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19669); ?> (assertion failure in zend_jit_trace_type_to_info_ex).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19831); ?> (function JIT may not deref property value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19889); ?> (race condition in zend_runtime_jit(), zend_jit_hot_func()).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix memory leak and invalid continuation after tar header writing fails.</li>
  <li>Fix memory leaks when creating temp file fails when applying zip signature.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19988); ?> (zend_string_init with NULL pointer in simplexml (UB)).</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19784); ?> (SoapServer memory leak).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20011); ?> (Array of SoapVar of unknown type causes crash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12265); ?> (Cloning an object breaks serialization recursion).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19701); ?> (Serialize/deserialize loses some data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19801); ?> (leaks in var_dump() and debug_zval_dump()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20043); ?> (array_unique assertion failure with RC1 array causing an exception on sort).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19926); ?> (reset internal pointer earlier while splicing array while COW violation flag is still set).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19570); ?> (unable to fseek in /dev/zero and /dev/null).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19248); ?> (Use strerror_r instead of strerror in main).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17345); ?> (Bug #35916 was not completely fixed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19705); ?> (segmentation when attempting to flush on non seekable stream.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20009); ?> (XMLReader leak on RelaxNG schema failure).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19688); ?> (Remove pattern overflow in zip addGlob()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19932); ?> (Memory leak in zip setEncryptionName()/setEncryptionIndex()).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.13"><!-- {{{ 8.4.13 -->
<h3>Version 8.4.13</h3>
<b><?php release_date('25-Sep-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18850); ?> (Repeated inclusion of file with __halt_compiler() triggers "Constant already defined" warning).</li>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 19542); ?> (Scanning of string literals &gt;=2GB will fail due to signed int overflow).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19544); ?> (GC treats ZEND_WEAKREF_TAG_MAP references as WeakMap references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19613); ?> (Stale array iterator pointer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19679); ?> (zend_ssa_range_widening may fail to converge).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19681); ?> (PHP_EXPAND_PATH broken with bash 5.3.0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19720); ?> (Assertion failure when error handler throws when accessing a deprecated constant).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19461); ?> (Improve error message on listening error with IPv6 address).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed date_sunrise() and date_sunset() with partial-hour UTC offset.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19706); ?> (dba stream resource mismanagement).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19612); ?> (Mitigate libxml2 tree dictionary bug).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed failed debug assertion when php_admin_value setting fails.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11952); ?> (Fix locale strings canonicalization for IntlDateFormatter and NumberFormatter).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19493); ?> (JIT variable not stored before YIELD).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19245); ?> (Success error message on TLS stream accept failure).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19485); ?> (potential use after free when using persistent pgsql connections).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed memory leaks when verifying OpenSSL signature.</li>
  <li>Fix memory leak in phar tar temporary file error handling code.</li>
  <li>Fix metadata leak when phar convert logic fails.</li>
  <li>Fix memory leak on failure in phar_convert_to_other().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19752); ?> (Phar decompression with invalid extension can cause UAF).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16649); ?> (UAF during array_splice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19577); ?> (Avoid integer overflow when using a small offset and PHP_INT_MAX with LimitIterator).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Remove incorrect call to zval_ptr_dtor() in user_wrapper_metadata().</li>
  <li>Fix OSS-Fuzz #385993744.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix memory leak in zip when encountering empty glob result.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.12"><!-- {{{ 8.4.12 -->
<h3>Version 8.4.12</h3>
<b><?php release_date('28-Aug-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19169); ?> build issue with C++17 and ZEND_STATIC_ASSERT macro.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19053); ?> (Duplicate property slot with hooks and interface property).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19044); ?> (Protected properties are not scoped according to their prototype).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18581); ?> (Coerce numeric string keys from iterators when argument unpacking).</li>
  <li>Fixed OSS-Fuzz #434346548 (Failed assertion with throwing __toString in binary const expr).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19305); ?> (Operands may be being released during comparison).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19303); ?> (Unpacking empty packed array into uninitialized array causes assertion failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19306); ?> (Generator can be resumed while fetching next value from delegated Generator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19326); ?> (Calling Generator::throw() on a running generator with a non-Generator delegate crashes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19280); ?> (Stale array iterator position on rehashing).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18736); ?> (Circumvented type check with return by ref + finally).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19065); ?> (Long match statement can segfault compiler during recursive SSA renaming).</li>
</ul></li>
<li>Calendar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19371); ?> (integer overflow in calendar.c).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fix theoretical issues with hrtime() not being available.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix incorrect comparison with result of php_stream_can_cast().</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix crash on clone failure.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memleak on failure in collator_get_sort_key().</li>
  <li>Fix return value on failure for resourcebundle count handler.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18529); ?> (additional inheriting of TLS int options).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19098); ?> (libxml&lt;2.13 segmentation fault caused by php_libxml_node_free).</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19397); ?> (mb_list_encodings() can cause crashes on shutdown).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Reset global pointers to prevent use-after-free in zend_jit_status().</li>
  <li>Fix issue with JIT restart and hooks.</li>
  <li>Fix crash with dynamic function defs in hooks during preload.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18986); ?> (OpenSSL backend: incorrect RAND_{load,write}_file() return value check).</li>
  <li>Fix error return check of EVP_CIPHER_CTX_ctrl().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19428); ?> (openssl_pkey_derive segfaults for DH derive with low key_length param).</li>
</ul></li>
<li>PDO Pgsql:
<ul>
  <li>Fixed dangling pointer access on _pdo_pgsql_trim_message helper.</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18640); ?> (heap-use-after-free ext/soap/php_encoding.c:299:32 in soap_check_zval_ref).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fix some potential crashes on incorrect argument value.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed OSS Fuzz #433303828 (Leak in failed unserialize() with opcache).</li>
  <li>Fix theoretical issues with hrtime() not being available.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19300); ?> (Nested array_multisort invocation with error breaks).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Free opened_path when opened_path_len &gt;= MAXPATHLEN.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.11"><!-- {{{ 8.4.11 -->
<h3>Version 8.4.11</h3>
<b><?php release_date('31-Jul-2025'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed jewishtojd overflow on year argument.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18833); ?> (Use after free with weakmaps dependent on destruction order).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18907); ?> (Leak when creating cycle in hook).</li>
  <li>Fix OSS-Fuzz #427814456.</li>
  <li>Fix OSS-Fuzz #428983568 and #428760800.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17204); ?> (-Wuseless-escape warnings emitted by re2c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19064); ?> (Undefined symbol 'execute_ex' on Windows ARM64).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix memory leaks when returning refcounted value from curl callback.</li>
  <li>Remove incorrect string release.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18979); ?> (Dom\XMLDocument::createComment() triggers undefined behavior with null byte).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18902); ?> ldap_exop/ldap_exop_sync assert triggered on empty request OID.</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18901); ?> (integer overflow mb_split).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18639); ?> (Internal class aliases can break preloading + JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18899); ?> (JIT function crash when emitting undefined variable warning and opline is not set yet).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14082); ?> (Segmentation fault on unknown address 0x600000000018 in ext/opcache/jit/zend_jit.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18898); ?> (SEGV zend_jit_op_array_hot with property hooks and preloading).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80770); ?> (It is not possible to get client peer certificate with stream_socket_server).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18958); ?> (Fatal error during shutdown after pcntl_rfork() or pcntl_forkx() with zend-max-execution-timers).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix stream double free in phar.</li>
  <li>Fix phar crash and file corruption with SplFileObject.</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18990); ?>, bug #81029, bug #47314 (SOAP HTTP socket not closing on object destruction).</li>
  <li>Fix memory leak when URL parsing fails in redirect.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19094); ?> (Attaching class with no Iterator implementation to MultipleIterator causes crash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix misleading errors in printf().</li>
  <li>Fix RCN violations in array functions.</li>
  <li>Fixed <?php githubissuel('php/php-src', 18976); ?> pack() overflow with h/H format and INT_MAX repeater value.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 13264); ?> (fgets() and stream_get_line() do not return false on filter fatal error).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix leak when path is too long in ZipArchive::extractTo().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.10"><!-- {{{ 8.4.10 -->
<h3>Version 8.4.10</h3>
<b><?php release_date('03-Jul-2025'); ?></b>
<ul><li>BcMath:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18641); ?> (Accessing a BcMath\Number property by ref crashes).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 17711); ?> and <?php githubissuel('php/php-src', 18022); ?> (Infinite recursion on deprecated attribute evaluation) and <?php githubissuel('php/php-src', 18464); ?> (Recursion protection for deprecation constants not released on bailout).</li>
  <li>Fixed <?php githubissuel('php/php-src', 18695); ?> (zend_ast_export() - float number is not preserved).</li>
  <li>Fix handling of references in zval_try_get_long().</li>
  <li>Do not delete main chunk in zend_gc.</li>
  <li>Fix compile issues with zend_alloc and some non-default options.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix memory leak when setting a list via curl_setopt fails.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix leaks with multiple calls to DatePeriod iterator current().</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18744); ?> (classList works not correctly if copy HTMLElement by clone keyword).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18662); ?> (fpm_get_status segfault).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14551); ?> (PGO build fails with xxhash).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak in intl_datetime_decompose() on failure.</li>
  <li>Fix memory leak in locale lookup on failure.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18743); ?> (Incompatibility in Inline TLS Assembly on Alpine 3.22).</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fix memory leak on php_odbc_fetch_hash() failure.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix memory leak of X509_STORE in php_openssl_setup_verify() on failure.</li>
  <li><?php bugfix(74796); ?> (Requests through http proxy set peer name).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hrwm-9436-5mv3'); ?> (pgsql extension does not check for errors during escaping). (CVE-2025-1735)</li>
  <li>Fix warning not being emitted when failure to cancel a query with pg_cancel_query().</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fix memory leak if WideCharToMultiByte() fails.</li>
</ul></li>
<li>PDO Sqlite:
<ul>
  <li>Fixed memory leak with Pdo_Sqlite::createCollation when the callback has an incorrect return type.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Add missing filter cleanups on phar failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18642); ?> (Signed integer overflow in ext/phar fseek).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix 'phpdbg --help' segfault on shutdown with USE_ZEND_ALLOC=0.</li>
</ul></li>
<li>Random:
<ul>
  <li>Fix reference type confusion and leak in user random engine.</li>
</ul></li>
<li>Readline:
<ul>
  <li>Fix memory leak when calloc() fails in php_readline_completion_cb().</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18597); ?> (Heap-buffer-overflow in zend_alloc.c when assigning string with UTF-8 bytes).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fix memory leaks in php_http.c when call_user_function() fails.</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '453j-q27h-5p8x'); ?> (NULL Pointer Dereference in PHP SOAP Extension via Large XML Namespace Prefix). (CVE-2025-6491)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '3cr5-j632-f35r'); ?> (Null byte termination in hostnames). (CVE-2025-1220)</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leak in tidy output handler on error.</li>
  <li>Fix tidyOptIsReadonly deprecation, using tidyOptGetCategory.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.8"><!-- {{{ 8.4.8 -->
<h3>Version 8.4.8</h3>
<b><?php release_date('05-Jun-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18480); ?> (array_splice with large values for offset/length arguments).</li>
  <li>Partially fixed <?php githubissuel('php/php-src', 18572); ?> (nested object comparisons leading to stack overflow).</li>
  <li>Fixed OSS-Fuzz #417078295.</li>
  <li>Fixed OSS-Fuzz #418106144.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18460); ?> (curl_easy_setopt with CURLOPT_USERPWD/CURLOPT_USERNAME/ CURLOPT_PASSWORD set the Authorization header when set to NULL).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18076); ?> (Since PHP 8, the date_sun_info() function returns inaccurate sunrise and sunset times, but other calculated times are correct) (JiriJozif).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18481); ?> (date_sunrise with unexpected nan value for the offset).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Backport lexbor/lexbor#274.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix various reference issues.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18529); ?> (ldap no longer respects TLS_CACERT from ldaprc in ldap_start_tls()).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18417); ?> (Windows SHM reattachment fails when increasing memory_consumption or jit_buffer_size).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18297); ?> (Exception not handled when jit guard is triggered).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18408); ?> (Snapshotted poly_func / poly_this may be spilled).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18567); ?> (Preloading with internal class alias triggers assertion failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18534); ?> (FPM exit code 70 with enabled opcache and hooked properties in traits).</li>
  <li>Fix leak of accel_globals-&gt;key.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix missing checks against php_set_blocking() in xp_ssl.c.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18421); ?> (Integer overflow with large numbers in LimitIterator).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17403); ?> (Potential deadlock when putenv fails).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18400); ?> (http_build_query type error is inaccurate).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18509); ?> (Dynamic calls to assert() ignore zend.assertions).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fix leak+crash with sapi_windows_set_ctrl_handler().</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18431); ?> (Registering ZIP progress callback twice doesn't work).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18438); ?> (Handling of empty data and errors in ZipArchive::addPattern).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.7"><!-- {{{ 8.4.7 -->
<h3>Version 8.4.7</h3>
<b><?php release_date('8-May-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18038); ?> (Lazy proxy calls magic methods twice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18209); ?> (Use-after-free in extract() with EXTR_REFS).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18268); ?> (Segfault in array_walk() on object with added property hooks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18304); ?> (Changing the properties of a DateInterval through dynamic properties triggers a SegFault).</li>
  <li>Fix some leaks in php_scandir.</li>
</ul></li>
<li>DBA:
<ul>
  <li>FIxed bug <?php githubissuel('php/php-src', 18247); ?> dba_popen() memory leak on invalid path.</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18309); ?> (ipv6 filter integer overflow).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed imagecrop() overflow with rect argument with x/width y/heigh usage in gdImageCrop().</li>
  <li>Fixed <?php githubissuel('php/php-src', 18243); ?> imagettftext() overflow/underflow on font size value.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix reference support for intltz_get_offset().</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17776); ?> (LDAP_OPT_X_TLS_* options can't be overridden).</li>
  <li>Fix NULL deref on high modification key.</li>
</ul></li>
<li>libxml:
<ul>
  <li>Fixed custom external entity loader returning an invalid resource leading to a confusing TypeError message.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18294); ?> (assertion failure zend_jit_ir.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18289); ?> (Fix segfault in JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18136); ?> (tracing JIT floating point register clobbering on Windows and ARM64).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix memory leak in openssl_sign() when passing invalid algorithm.</li>
  <li>Fix potential leaks when writing to BIO fails.</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18276); ?> (persistent connection - "zend_mm_heap corrupted" with setAttribute()) (SakiTakamachi).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17383); ?> (PDOException has wrong code and message since PHP 8.4) (SakiTakamachi).</li>
</ul></li>
<li>PDO Sqlite:
<ul>
  <li>Fix memory leak on error return of collation callback.</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fix uouv in pg_put_copy_end().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18322); ?> (SplObjectStorage debug handler mismanages memory).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18145); ?> (php8ts crashes in php_clear_stat_cache()).</li>
  <li>Fix resource leak in iptcembed() on error.</li>
</ul></li>
<li>Tests:
<ul>
  <li>Address deprecated PHP 8.4 session options to prevent test failures.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix uouv when handling empty options in ZipArchive::addGlob().</li>
  <li>Fix memory leak when handling a too long path in ZipArchive::addGlob().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.6"><!-- {{{ 8.4.6 -->
<h3>Version 8.4.6</h3>
<b><?php release_date('10-Apr-2025'); ?></b>
<ul><li>BCMath:
<ul>
  <li>Fixed pointer subtraction for scale.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed property hook backing value access in multi-level inheritance.</li>
  <li>Fixed accidentally inherited default value in overridden virtual properties.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17376); ?> (Broken JIT polymorphism for property hooks added to child class).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17913); ?> (ReflectionFunction::isDeprecated() returns incorrect results for closures created from magic __call()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17941); ?> (Stack-use-after-return with lazy objects and hooks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17988); ?> (Incorrect handling of hooked props without get hook in get_object_vars()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17998); ?> (Skipped lazy object initialization on primed SIMPLE_WRITE cache).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17998); ?> (Assignment to backing value in set hook of lazy proxy calls hook again).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17961); ?> (use-after-free during dl()'ed module class destruction).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15367); ?> (dl() of module with aliased class crashes in shutdown).</li>
  <li>Fixed OSS-Fuzz #403308724.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13193); ?> again (Significant performance degradation in 'foreach').</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed assertion violation when opening the same file with dba_open multiple times.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17991); ?> (Assertion failure dom_attr_value_write).</li>
  <li>Fix weird unpack behaviour in DOM.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18090); ?> (DOM: Svg attributes and tag names are being lowercased).</li>
  <li>Fix xinclude destruction of live attributes.</li>
</ul></li>
<li>Fuzzer:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18081); ?> (Memory leaks in error paths of fuzzer SAPI).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17984); ?> (calls with arguments as array with references).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18015); ?> (Error messages for ldap_mod_replace are confusing).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17989); ?> (mb_output_handler crash with unset http_output_conv_mimetypes).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15834); ?> (Segfault with hook "simple get" cache slot and minimal JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17966); ?> (Symfony JIT 1205 assertion failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18037); ?> (SEGV Zend/zend_execute.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18050); ?> (IN_ARRAY optimization in DFA pass is broken).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18113); ?> (stack-buffer-overflow ext/opcache/jit/ir/ir_sccp.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18112); ?> (NULL access with preloading and INI option).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18107); ?> (Opcache CFG jmp optimization with try-finally breaks the exception table).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix memory leak when destroying PDORow.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leaks in array_any() / array_all().</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(66049); ?> (Typemap can break parsing in parse_packet_soap leading to a segfault) .</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18018); ?> (RC1 data returned from offsetGet causes UAF in ArrayObject).</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17736); ?> (Assertion failure zend_reference_destroy()).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17836); ?> (zend_vm_gen.php shouldn't break on Windows line endings).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.5"><!-- {{{ 8.4.5 -->
<h3>Version 8.4.5</h3>
<b><?php release_date('13-Mar-2025'); ?></b>
<ul><li>BCMath:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17398); ?> (bcmul memory leak).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17623); ?> (Broken stack overflow detection for variable compilation).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17618); ?> (UnhandledMatchError does not take zend.exception_ignore_args=1 into account).</li>
  <li>Fix fallback paths in fast_long_{add,sub}_function.</li>
  <li>Fixed bug OSS-Fuzz #391975641 (Crash when accessing property backing value by reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17718); ?> (Calling static methods on an interface that has `__callStatic` is allowed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17713); ?> (ReflectionProperty::getRawValue() and related methods may call hooks of overridden properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17916); ?> (Final abstract properties should error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17866); ?> (zend_mm_heap corrupted error after upgrading from 8.4.3 to 8.4.4).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'rwp7-7vc6-8477'); ?> (Reference counting in php_request_shutdown causes Use-After-Free). (CVE-2024-11235)</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17609); ?> (Typo in error message: Dom\NO_DEFAULT_NS instead of Dom\HTML_NO_DEFAULT_NS).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17802); ?> (\Dom\HTMLDocument querySelector attribute name is case sensitive in HTML).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17847); ?> (xinclude destroys live node).</li>
  <li>Fix using Dom\Node with Dom\XPath callbacks.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17703); ?> (imagescale with both width and height negative values triggers only an Exception on width).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17772); ?> (imagepalettetotruecolor crash with memory_limit=2M).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fix FFI Parsing of Pointer Declaration Lists.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17643); ?> (FPM with httpd ProxyPass encoded PATH_INFO env).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17704); ?> (ldap_search fails when $attributes contains a non-packed array with numerical keys).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'wg4p-4hqh-c3g9'); ?> (Reocurrence of #72714).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'p3x9-6h7p-cgfc'); ?> (libxml streams use wrong `content-type` header when requesting a redirected resource). (CVE-2025-1219)</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17503); ?> (Undefined float conversion in mb_convert_variables).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17654); ?> (Multiple classes using same trait causes function JIT crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17577); ?> (JIT packed type guard crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17747); ?> (Exception on reading property in register-based FETCH_OBJ_R breaks JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17715); ?> (Null pointer deref in observer API when calling cases() method on preloaded enum).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17868); ?> (Cannot allocate memory with tracing JIT on 8.4.4).</li>
</ul></li>
<li>PDO_SQLite:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 17837); ?> ()::getColumnMeta() on unexecuted statement segfaults).</li>
  <li>Fix cycle leak in sqlite3 setAuthorizer().</li>
  <li>Fix memory leaks in pdo_sqlite callback registration.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17808); ?>: PharFileInfo refcount bug.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 17387); ?> (Trivial crash in phpdbg lexer).</li>
  <li>Fix memory leak in phpdbg calling registered function.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15902); ?> (Core dumped in ext/reflection/php_reflection.c).</li>
  <li>Fixed missing final and abstract flags when dumping properties.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72666); ?> (stat cache clearing inconsistent between file:// paths and plain paths).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17650); ?> (realloc with size 0 in user_filters.c).</li>
  <li>Fix memory leak on overflow in _php_stream_scandir().</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hgf5-96fm-v528'); ?> (Stream HTTP wrapper header check might omit basic auth header). (CVE-2025-1736)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '52jp-hrpf-2jff'); ?> (Stream HTTP wrapper truncate redirect location to 1024 bytes). (CVE-2025-1861)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'pcmh-g36c-qc44'); ?> (Streams HTTP wrapper does not fail for headers without colon). (CVE-2025-1734)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'v8xr-gpvj-cx9g'); ?> (Header parser of `http` stream wrapper does not handle folded headers). (CVE-2025-1217)</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed phpize for Windows 11 (24H2).</li>
  <li>Fixed <?php githubissuel('php/php-src', 17855); ?> (CURL_STATICLIB flag set even if linked with shared lib).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17745); ?> (zlib extension incorrectly handles object arguments).</li>
  <li>Fix memory leak when encoding check fails.</li>
  <li>Fix zlib support for large files.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.4"><!-- {{{ 8.4.4 -->
<h3>Version 8.4.4</h3>
<b><?php release_date('13-Feb-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17234); ?> (Numeric parent hook call fails with assertion).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16892); ?> (ini_parse_quantity() fails to parse inputs starting with 0x0b).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16886); ?> (ini_parse_quantity() fails to emit warning for 0x+0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17222); ?> (__PROPERTY__ magic constant does not work in all constant expression contexts).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17214); ?> (Relax final+private warning for trait methods with inherited final).</li>
  <li>Fixed NULL arithmetic during system program execution on Windows.</li>
  <li>Fixed potential OOB when checking for trailing spaces on Windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17408); ?> (Assertion failure Zend/zend_exceptions.c).</li>
  <li>Fix may_have_extra_named_args flag for ZEND_AST_UNPACK.</li>
  <li>Fix NULL arithmetic in System V shared memory emulation for Windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17597); ?> (#[\Deprecated] does not work for __call() and __callStatic()).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17397); ?> (Assertion failure ext/dom/php_dom.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17486); ?> (Incorrect error line numbers reported in Dom\HTMLDocument::createFromString).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17481); ?> (UTF-8 corruption in \Dom\HTMLDocument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17500); ?> (Segfault with requesting nodeName on nameless doctype).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17485); ?> (upstream fix, Self-closing tag on void elements shouldn't be a parse error/warning in \Dom\HTMLDocument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17572); ?> (getElementsByTagName returns collections with tagName-based indexing).</li>
</ul></li>
<li>Enchant:
<ul>
  <li>Fix crashes in enchant when passing null bytes.</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16800); ?> (ftp functions can abort with EINTR).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17349); ?> (Tiled truecolor filling looses single color transparency).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17373); ?> (imagefttext() ignores clipping rect for palette images).</li>
  <li>Ported fix for libgd 223 (gdImageRotateGeneric() does not properly interpolate).</li>
  <li>Added support for reading GIFs without colormap to bundled libgd.</li>
</ul></li>
<li>Gettext:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17400); ?> (bindtextdomain SEGV on invalid domain).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11874); ?> (intl causing segfault in docker images).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15981); ?> (Segfault with frameless jumps and minimal JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17307); ?> (Internal closure causes JIT failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17428); ?> (Assertion failure ext/opcache/jit/zend_jit_ir.c:8940).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17564); ?> (Potential UB when reading from / writing to struct padding).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed pcntl_setcpuaffinity exception type from ValueError to TypeError for the cpu mask argument with entries type different than int/string.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17122); ?> (memory leak in regex).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed a memory leak when the GC is used to free a PDOStatment.</li>
  <li>Fixed a crash in the PDO Firebird Statement destructor.</li>
  <li>Fixed UAFs when changing default fetch class ctor args.</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fixed build failure when the constant PGRES_TUPLES_CHUNK is not present in the system.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17518); ?> (offset overflow phar extractTo()).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix crashes in function registration + test.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fix type confusion with session SID constant.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17541); ?> (ext/session NULL pointer dereferencement during ID reset).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17409); ?> (Assertion failure Zend/zend_hash.c:1730).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17330); ?> (SNMP::setSecurity segfault on closed session).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15833); ?> (Segmentation fault (access null pointer) in ext/spl/spl_array.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17516); ?> (SplFileTempObject::getPathInfo() Undefined behavior on invalid class).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17447); ?> (Assertion failure when array popping a self addressing variable).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed clang compiler detection.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17139); ?> (Fix zip_entry_name() crash on invalid entry).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.3"><!-- {{{ 8.4.3 -->
<h3>Version 8.4.3</h3>
<b><?php release_date('16-Jan-2025'); ?></b>
<ul><li>BcMath:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17049); ?> (Correctly compare 0 and -0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17061); ?> (Now Number::round() does not remove trailing zeros).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17064); ?> (Correctly round rounding mode with zero edge case).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17275); ?> (Fixed the calculation logic of dividend scale).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug OSS-Fuzz #382922236 (Duplicate dynamic properties in hooked object iterator properties table).</li>
  <li>Fixed unstable get_iterator pointer for hooked classes in shm on Windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17106); ?> (ZEND_MATCH_ERROR misoptimization).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17162); ?> (zend_array_try_init() with dtor can cause engine UAF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17101); ?> (AST-&gt;string does not reproduce constructor property promotion correctly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17200); ?> (Incorrect dynamic prop offset in hooked prop iterator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17216); ?> (Trampoline crash on error).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Skip test if inifile is disabled.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17145); ?> (DOM memory leak).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17201); ?> (Dom\TokenList issues with interned string replace).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17224); ?> (UAF in importNode).</li>
</ul></li>
<li>Embed:
<ul>
  <li>Make build command for program using embed portable.</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79075); ?> (FFI header parser chokes on comments).</li>
  <li>Fix memory leak on ZEND_FFI_TYPE_CHAR conversion failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16013); ?> and bug #80857 (Big endian issues).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17039); ?> (PHP 8.4: Incorrect MIME content type).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13437); ?> (FPM: ERROR: scoreboard: failed to lock (already locked)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17112); ?> (Macro redefinitions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17208); ?> (bug64539-status-json-encoding.phpt fail on 32-bits).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16255); ?> (Unexpected nan value in ext/gd/libgd/gd_filter.c).</li>
  <li>Ported fix for libgd bug 276 (Sometimes pixels are missing when storing images as BMPs).</li>
</ul></li>
<li>Gettext:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17202); ?> (Segmentation fault ext/gettext/gettext.c bindtextdomain()).</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17047); ?> (UAF on iconv filter failure).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17280); ?> (ldap_search() fails when $attributes array has holes).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17223); ?> (Memory leak in libxml encoding handling).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17112); ?> (Macro redefinitions).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>opcache_get_configuration() properly reports jit_prof_threshold.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17140); ?> (Assertion failure in JIT trace exit with ZEND_FETCH_DIM_FUNC_ARG).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17151); ?> (Incorrect RC inference of op1 of FETCH_OBJ and INIT_METHOD_CALL).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17246); ?> (GC during SCCP causes segfault).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17257); ?> (UBSAN warning in ext/opcache/jit/zend_jit_vm_helpers.c).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fix memory leak in cleanup code of pcntl_exec() when a non stringable value is encountered past the first entry.</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17158); ?> (pg_fetch_result Shows Incorrect ArgumentCountError Message when Called With 1 Argument).</li>
  <li>Fixed further ArgumentCountError for calls with flexible number of arguments.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17137); ?> (Segmentation fault ext/phar/phar.c).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17040); ?> (SimpleXML's unset can break DOM objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17153); ?> (SimpleXML crash when using autovivification on document).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16276); ?> (socket_strerror overflow handling with INT_MIN).</li>
  <li>Fixed overflow on SO_LINGER values setting, strengthening values check on SO_SNDTIMEO/SO_RCVTIMEO for socket_set_option().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17198); ?> (SplFixedArray assertion failure with get_object_vars).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17225); ?> (NULL deref in spl_directory.c).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17037); ?> (UAF in user filter when adding existing filter name due to incorrect error handling).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16810); ?> (overflow on fopen HTTP wrapper timeout value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17067); ?> (glob:// wrapper doesn't cater to CWD for ZTS builds).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Hardened proc_open() against cmd.exe hijacking.</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 1718); ?> (unreachable program point in zend_hash).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.2"><!-- {{{ 8.4.2 -->
<h3>Version 8.4.2</h3>
<b><?php release_date('19-Dec-2024'); ?></b>
<ul><li>BcMath:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16978); ?> (Avoid unnecessary padding with leading zeros) (Saki Takamachi)</li>
</ul></li>
<li>Calendar:
<ul>
  <li>Fixed jdtogregorian overflow.</li>
  <li>Fixed cal_to_jd julian_days argument overflow.</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16991); ?> (Getting typeinfo of non DISPATCH variant segfaults).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fail early in *nix configuration build script.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16344); ?> (setRawValueWithoutLazyInitialization() and skipLazyInitialization() may change initialized proxy).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16727); ?> (Opcache bad signal 139 crash in ZTS bookworm (frankenphp)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16799); ?> (Assertion failure at Zend/zend_vm_execute.h:7469).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16630); ?> (UAF in lexer with encoding translation and heredocs).</li>
  <li>Fix is_zend_ptr() huge block comparison.</li>
  <li>Fixed potential OOB read in zend_dirname() on Windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15964); ?> (printf() can strip sign of -INF).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16802); ?> (open_basedir bypass using curl extension).</li>
  <li>Fix various memory leaks in curl mime handling.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16990); ?> (dba_list() is now zero-indexed instead of using resource ids) (kocsismate)</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16777); ?> (Calling the constructor again on a DOM object after it is in a document causes UAF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16906); ?> (Reloading document can cause UAF in iterator).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16432); ?> (PHP-FPM 8.2 SIGSEGV in fpm_get_status).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16932); ?> (wrong FPM status output).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16776); ?> (imagecreatefromstring overflow).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16890); ?> (array_sum() with GMP can loose precision (LLP64)).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16711); ?>: Segfault in mhash().</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16851); ?> (JIT_G(enabled) not set correctly on other threads).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16902); ?> (Set of opcache tests fail zts+aarch64).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16879); ?> (JIT dead code skipping does not update call_level).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Prevent unexpected array entry conversion when reading key.</li>
  <li>Fix various memory leaks related to openssl exports.</li>
  <li>Fix memory leak in php_openssl_pkey_from_zval().</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed memory leak of `setFetchMode()`.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16695); ?> (phar:// tar parser and zero-length file header blocks).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15208); ?> (Segfault with breakpoint map and phpdbg_clear()).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16998); ?> (UBSAN warning in rfc1867).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16808); ?> (Segmentation fault in RecursiveIteratorIterator -&gt;current() with a xml element input).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fix make check being invoked in ext/soap.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16905); ?> (Internal iterator functions can't handle UNDEF properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16957); ?> (Assertion failure in array_shift with self-referencing array).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed network connect poll interuption handling.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16849); ?> (Error dialog causes process to hang).</li>
  <li>Windows Server 2025 is now properly reported.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.4.1"><!-- {{{ 8.4.1 -->
<h3>Version 8.4.1</h3>
<b><?php release_date('21-Nov-2024'); ?></b>
<ul><li>BcMath:
<ul>
  <li>[RFC] Add bcfloor, bcceil and bcround to BCMath.</li>
  <li>Improve performance.</li>
  <li>Adjust bcround()'s $mode parameter to only accept the RoundingMode enum.</li>
  <li>Fixed LONG_MAX in BCMath ext.</li>
  <li>Fixed bcdiv() div by one.</li>
  <li>[RFC] Support object types in BCMath.</li>
  <li>bcpow() performance improvement.</li>
  <li>ext/bcmath: Check for scale overflow.</li>
  <li>[RFC] ext/bcmath: Added bcdivmod.</li>
  <li>Fix <?php githubissuel('php/php-src', 15968); ?> (Avoid converting objects to strings in operator calculations).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16265); ?> (Added early return case when result is 0) (Saki Takamachi).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16262); ?> (Fixed a bug where size_t underflows) (Saki Takamachi).</li>
  <li>Fixed <?php githubissuel('php/php-src', 16236); ?> (Fixed a bug in BcMath\Number::pow() and bcpow() when raising negative powers of 0) (Saki Takamachi).</li>
</ul></li>
<li>Core:
<ul>
  <li>Added zend_call_stack_get implementation for NetBSD, DragonFlyBSD, Solaris and Haiku.</li>
  <li>Enabled ifunc checks on FreeBSD from the 12.x releases.</li>
  <li>Changed the type of PHP_DEBUG and PHP_ZTS constants to bool.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13142); ?> (Undefined variable name is shortened when contains \0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13178); ?> (Iterator positions incorrect when converting packed array to hashed).</li>
  <li>Fixed zend fiber build for solaris default mode (32 bits).</li>
  <li>Fixed zend call stack size for macOs/arm64.</li>
  <li>Added support for Zend Max Execution Timers on FreeBSD.</li>
  <li>Ensure fiber stack is not backed by THP.</li>
  <li>Implement <?php githubissuel('php/php-src', 13609); ?> (Dump wrapped object in WeakReference class).</li>
  <li>Added sparc64 arch assembly support for zend fiber.</li>
  <li>Fixed <?php githubissuel('php/php-src', 13581); ?> no space available for TLS on NetBSD.</li>
  <li>Added fiber Sys-V loongarch64 support.</li>
  <li>Adjusted closure names to include the parent function's name.</li>
  <li>Improve randomness of uploaded file names and files created by tempnam().</li>
  <li>Added gc and shutdown callbacks to zend_mm custom handlers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14650); ?> (Compute the size of pages before allocating memory).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11928); ?> (The --enable-re2c-cgoto doesn't add the -g flag).</li>
  <li>Added the #[\Deprecated] attribute.</li>
  <li>Fixed <?php githubissuel('php/php-src', 11389); ?> (Allow suspending fibers in destructors).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14801); ?> (Fix build for armv7).</li>
  <li>Implemented property hooks RFC.</li>
  <li>Fix <?php githubissuel('php/php-src', 14978); ?> (The xmlreader extension phpize build).</li>
  <li>Throw Error exception when encountering recursion during comparison, rather than fatal error.</li>
  <li>Added missing cstddef include for C++ builds.</li>
  <li>Updated build system scripts config.guess to 2024-07-27 and config.sub to 2024-05-27.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15240); ?> (Infinite recursion in trait hook).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15140); ?> (Missing variance check for abstract set with asymmetric type).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15181); ?> (Disabled output handler is flushed again).</li>
  <li>Passing E_USER_ERROR to trigger_error() is now deprecated.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15292); ?> (Dynamic AVX detection is broken for MSVC).</li>
  <li>Using "_" as a class name is now deprecated.</li>
  <li>Exiting a namespace now clears seen symbols.</li>
  <li>The exit (and die) language constructs now behave more like a function. They can be passed liked callables, are affected by the strict_types declare statement, and now perform the usual type coercions instead of casting any non-integer value to a string. As such, passing invalid types to exit/die may now result in a TypeError being thrown.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15438); ?> (Hooks on constructor promoted properties without visibility are ignored).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15419); ?> (Missing readonly+hook incompatibility check for readonly classes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15187); ?> (Various hooked object iterator issues).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15456); ?> (Crash in get_class_vars() on virtual properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15501); ?> (Windows HAVE_&lt;header&gt;_H macros defined to 1 or undefined).</li>
  <li>Implemented asymmetric visibility for properties.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15644); ?> (Asymmetric visibility doesn't work with hooks).</li>
  <li>Implemented lazy objects RFC.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15686); ?> (Building shared iconv with external iconv library).</li>
  <li>Fixed missing error when adding asymmetric visibility to unilateral virtual property.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15693); ?> (Unnecessary include in main.c bloats binary).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15731); ?> (AllowDynamicProperties validation should error on enums).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16040); ?> (Use-after-free of object released in hook).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16026); ?> (Reuse of dtor fiber during shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15999); ?> (zend_std_write_property() assertion failure with lazy objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15960); ?> (Foreach edge cases with lazy objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16185); ?> (Various hooked object iterator issues).</li>
  <li>Fixed bug OSS-Fuzz #371445205 (Heap-use-after-free in attr_free).</li>
  <li>Fixed missing error when adding asymmetric visibility to static properties.</li>
  <li>Fixed bug OSS-Fuzz #71407 (Null-dereference WRITE in zend_lazy_object_clone).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16574); ?> (Incorrect error "undefined method" messages).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16577); ?> (EG(strtod_state).freelist leaks with opcache.preload).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16615); ?> (Assertion failure in zend_std_read_property).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16342); ?> (Added ReflectionProperty::isLazy()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16725); ?> (Incorrect access check for non-hooked props in hooked object iterator).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Deprecated the CURLOPT_BINARYTRANSFER constant.</li>
  <li>Bumped required libcurl version to 7.61.0.</li>
  <li>Added feature_list key to the curl_version() return value.</li>
  <li>Added constants CURL_HTTP_VERSION_3 (libcurl 7.66) and CURL_HTTP_VERSION_3ONLY (libcurl 7.88) as options for CURLOPT_HTTP_VERSION (Ayesh Karunaratne)</li>
  <li>Added CURLOPT_TCP_KEEPCNT to set the number of probes to send before dropping the connection.</li>
  <li>Added CURLOPT_PREREQFUNCTION Curl option to set a custom callback after the connection is established, but before the request is performed.</li>
  <li>Added CURLOPT_SERVER_RESPONSE_TIMEOUT, which was formerly known as CURLOPT_FTP_RESPONSE_TIMEOUT.</li>
  <li>The CURLOPT_DNS_USE_GLOBAL_CACHE option is now silently ignored.</li>
  <li>Added CURLOPT_DEBUGFUNCTION as a Curl option.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16359); ?> (crash with curl_setopt* CURLOPT_WRITEFUNCTION without null callback).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16723); ?> (CURLMOPT_PUSHFUNCTION issues).</li>
</ul></li>
<li>Date:
<ul>
  <li>Added DateTime[Immutable]::createFromTimestamp.</li>
  <li>Added DateTime[Immutable]::[get|set]Microsecond.</li>
  <li>Constants SUNFUNCS_RET_TIMESTAMP, SUNFUNCS_RET_STRING, and SUNFUNCS_RET_DOUBLE are now deprecated.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13773); ?> (DatePeriod not taking into account microseconds for end date).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Passing null or false to dba_key_split() is deprecated.</li>
</ul></li>
<li>Debugging:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15923); ?> (GDB: Python Exception &lt;class 'TypeError'&gt;: exceptions must derive from BaseException).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Added DOMNode::compareDocumentPosition().</li>
  <li>Implement #53655 (Improve speed of DOMNode::C14N() on large XML documents).</li>
  <li>Fix cloning attribute with namespace disappearing namespace.</li>
  <li>Implement DOM HTML5 parsing and serialization RFC.</li>
  <li>Fix DOMElement-&gt;prefix with empty string creates bogus prefix.</li>
  <li>Handle OOM more consistently.</li>
  <li>Implemented "Improve callbacks in ext/dom and ext/xsl" RFC.</li>
  <li>Added DOMXPath::quote() static method.</li>
  <li>Implemented opt-in ext/dom spec compliance RFC.</li>
  <li><?php bugfix(79701); ?> (getElementById does not correctly work with duplicate definitions).</li>
  <li>Implemented "New ext-dom features in PHP 8.4" RFC.</li>
  <li>Fixed <?php githubissuel('php/php-src', 14698); ?> (segfault on DOM node dereference).</li>
  <li>Improve support for template elements.</li>
  <li>Fix trampoline leak in xpath callables.</li>
  <li>Throw instead of silently failing when creating a too long text node in (DOM)ParentNode and (DOM)ChildNode.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15192); ?> (Segmentation fault in dom extension (html5_serializer)).</li>
  <li>Deprecated DOM_PHP_ERR constant.</li>
  <li>Removed DOMImplementation::getFeature().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15331); ?> (Element::$substitutedNodeValue test failed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15570); ?> (Segmentation fault (access null pointer) in ext/dom/html5_serializer.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13988); ?> (Storing DOMElement consume 4 times more memory in PHP 8.1 than in PHP 8.0).</li>
  <li>Fix XML serializer errata: xmlns="" serialization should be allowed.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15910); ?> (Assertion failure in ext/dom/element.c).</li>
  <li>Fix unsetting DOM properties.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16190); ?> (Using reflection to call Dom\Node::__construct causes assertion failure).</li>
  <li>Fix edge-case in DOM parsing decoding.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16465); ?> (Heap buffer overflow in DOMNode-&gt;getElementByTagName).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16594); ?> (Assertion failure in DOM -&gt; before).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Update to libmagic 5.45.</li>
  <li><?php bugfix(65106); ?> (PHP fails to compile ext/fileinfo).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Implement <?php githubissuel('php/php-src', 12385); ?> (flush headers without body when calling flush()).</li>
  <li>Added DragonFlyBSD system to the list which set FPM_BACKLOG_DEFAULT to SOMAXCONN.</li>
  <li>/dev/poll events.mechanism for Solaris/Illumos setting had been retired.</li>
  <li>Added memory peak to the scoreboard / status page.</li>
</ul></li>
<li>FTP:
<ul>
  <li>Removed the deprecated inet_ntoa call support.</li>
  <li><?php bugfix(63937); ?> (Upload speed 10 times slower with PHP).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix parameter numbers and missing alpha check for imagecolorset().</li>
  <li>imagepng/imagejpeg/imagewep/imageavif now throw an exception on invalid quality parameter.</li>
  <li>Check overflow/underflow for imagescale/imagefilter.</li>
  <li>Added gdImageClone to bundled libgd.</li>
</ul></li>
<li>Gettext:
<ul>
  <li>bind_textdomain_codeset, textdomain and d(*)gettext functions now throw an exception on empty domain.</li>
</ul></li>
<li>GMP:
<ul>
  <li>The GMP class is now final and cannot be extended anymore.</li>
  <li>RFC: Change GMP bool cast behavior.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Changed return type of hash_update() to true.</li>
  <li>Added HashContext::__debugInfo().</li>
  <li>Deprecated passing incorrect data types for options to ext/hash functions.</li>
  <li>Added SSE2 and SHA-NI implementation of SHA-256.</li>
  <li>Fix <?php githubissuel('php/php-src', 15384); ?> (Build fails on Alpine / Musl for amd64).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15742); ?> (php_hash_sha.h incompatible with C++).</li>
</ul></li>
<li>IMAP:
<ul>
  <li>Moved to PECL.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Added IntlDateFormatter::PATTERN constant.</li>
  <li>Fixed Numberformatter::__construct when the locale is invalid, now throws an exception.</li>
  <li>Added NumberFormatter::ROUND_TOWARD_ZERO and ::ROUND_AWAY_FROM_ZERO as aliases for ::ROUND_DOWN and ::ROUND_UP.</li>
  <li>Added NumberFormatter::ROUND_HALFODD.</li>
  <li>Added PROPERTY_IDS_UNARY_OPERATOR, PROPERTY_ID_COMPAT_MATH_START and PROPERTY_ID_COMPAT_MATH_CONTINUE constants.</li>
  <li>Added IntlDateFormatter::getIanaID/intltz_get_iana_id method/function.</li>
  <li>Set to C++17 standard for icu 74 and onwards.</li>
  <li>resourcebundle_get(), ResourceBundle::get(), and accessing offsets on a ResourceBundle object now throw: - TypeError for invalid offset types - ValueError for an empty string - ValueError if the integer index does not fit in a signed 32 bit integer</li>
  <li>ResourceBundle::get() now has a tentative return type of: ResourceBundle|array|string|int|null</li>
  <li>Added the new Grapheme function grapheme_str_split.</li>
  <li>Added IntlDateFormatter::parseToCalendar.</li>
  <li>Added SpoofChecker::setAllowedChars to set unicode chars ranges.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Added LDAP_OPT_X_TLS_PROTOCOL_MAX/LDAP_OPT_X_TLS_PROTOCOL_TLS1_3 constants.</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Added LIBXML_RECOVER constant.</li>
  <li>libxml_set_streams_context() now throws immediately on an invalid context instead of at the use-site.</li>
  <li>Added LIBXML_NO_XXE constant.</li>
</ul></li>
<li>MBString:
<ul>
  <li>Added mb_trim, mb_ltrim and mb_rtrim.</li>
  <li>Added mb_ucfirst and mb_lcfirst.</li>
  <li>Updated Unicode data tables to Unicode 15.1.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15824); ?> (mb_detect_encoding(): Argument $encodings contains invalid encoding "UTF8").</li>
  <li>Updated Unicode data tables to Unicode 16.0.</li>
</ul></li>
<li>Mysqli:
<ul>
  <li>The mysqli_ping() function and mysqli::ping() method are now deprecated, as the reconnect feature was removed in PHP 8.2.</li>
  <li>The mysqli_kill() function and mysqli::kill() method are now deprecated. If this functionality is needed a SQL "KILL" command can be used instead.</li>
  <li>The mysqli_refresh() function and mysqli::refresh() method are now deprecated. If this functionality is needed a SQL "FLUSH" command can be used instead.</li>
  <li>Passing explicitly the $mode parameter to mysqli_store_result() has been deprecated. As the MYSQLI_STORE_RESULT_COPY_DATA constant was only used in conjunction with this function it has also been deprecated.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13440); ?> (PDO quote bottleneck).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10599); ?> (Apache crash on Windows when using a self-referencing anonymous function inside a class with an active mysqli connection).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added large shared segments support for FreeBSD.</li>
  <li>If JIT is enabled, PHP will now exit with a fatal error on startup in case of JIT startup initialization issues.</li>
  <li>Increased the maximum value of opcache.interned_strings_buffer to 32767 on 64bit archs.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13834); ?> (Applying non-zero offset 36 to null pointer in zend_jit.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14361); ?> (Deep recursion in zend_cfg.c causes segfault).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14873); ?> (PHP 8.4 min function fails on typed integer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15490); ?> (Building of callgraph modifies preloaded symbols).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15178); ?> (Assertion in tracing JIT on hooks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15657); ?> (Segmentation fault in dasm_x86.h).</li>
  <li>Added opcache_jit_blacklist() function.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16009); ?> (Segmentation fault with frameless functions and undefined CVs).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16186); ?> (Assertion failure in Zend/zend_operators.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16572); ?> (Incorrect result with reflection in low-trigger JIT).</li>
  <li>Fixed <?php githubissuel('php/php-src', 16839); ?> (Error on building Opcache JIT for Windows ARM64).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80269); ?> (OpenSSL sets Subject wrong with extraattribs parameter).</li>
  <li>Implement request #48520 (openssl_csr_new - allow multiple values in DN).</li>
  <li>Introduced new serial_hex parameter to openssl_csr_sign.</li>
  <li>Added X509_PURPOSE_OCSP_HELPER and X509_PURPOSE_TIMESTAMP_SIGN constants.</li>
  <li>Bumped minimum required OpenSSL version to 1.1.1.</li>
  <li>Added compile-time option --with-openssl-legacy-provider to enable legacy provider.</li>
  <li>Added support for Curve25519 + Curve448 based keys.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13343); ?> (openssl_x509_parse should not allow omitted seconds in UTCTimes).</li>
  <li>Bumped minimum required OpenSSL version to 1.1.0.</li>
  <li>Implement <?php githubissuel('php/php-src', 13514); ?> PASSWORD_ARGON2 from OpenSSL 3.2.</li>
</ul></li>
<li>Output:
<ul>
  <li>Clear output handler status flags during handler initialization.</li>
  <li>Fixed bug with url_rewriter.hosts not used by output_add_rewrite_var().</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Added pcntl_setns for Linux.</li>
  <li>Added pcntl_getcpuaffinity/pcntl_setcpuaffinity.</li>
  <li>Updated pcntl_get_signal_handler signal id upper limit to be more in line with platforms limits.</li>
  <li>Added pcntl_getcpu for Linux/FreeBSD/Solaris/Illumos.</li>
  <li>Added pcntl_getqos_class/pcntl_setqos_class for macOs.</li>
  <li>Added SIGCKPT/SIGCKPTEXIT constants for DragonFlyBSD.</li>
  <li>Added FreeBSD's SIGTRAP handling to pcntl_siginfo_to_zval.</li>
  <li>Added POSIX pcntl_waitid.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16769); ?>: (pcntl_sigwaitinfo aborts on signal value as reference).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgrade bundled pcre2lib to version 10.43.</li>
  <li>Add "/r" modifier.</li>
  <li>Upgrade bundled pcre2lib to version 10.44.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16189); ?> (underflow on offset argument).</li>
  <li>Fix UAF issues with PCRE after request shutdown.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed setAttribute and getAttribute.</li>
  <li>Implemented PDO driver-specific subclasses RFC.</li>
  <li>Added support for PDO driver-specific SQL parsers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14792); ?> (Compilation failure on pdo_* extensions).</li>
  <li>mysqlnd: support ER_CLIENT_INTERACTION_TIMEOUT.</li>
  <li>The internal header php_pdo_int.h is no longer installed; it is not supposed to be used by PDO drivers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16167); ?> (Prevent mixing PDO sub-classes with different DSN).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16314); ?> ("Pdo\Mysql object is uninitialized" when opening a persistent connection).</li>
</ul></li>
<li>PDO_DBLIB:
<ul>
  <li>Fixed setAttribute and getAttribute.</li>
  <li>Added class Pdo\DbLib.</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fixed setAttribute and getAttribute.</li>
  <li>Feature: Add transaction isolation level and mode settings to pdo_firebird.</li>
  <li>Added class Pdo\Firebird.</li>
  <li>Added Pdo\Firebird::ATTR_API_VERSION.</li>
  <li>Added getApiVersion() and removed from getAttribute().</li>
  <li>Supported Firebird 4.0 datatypes.</li>
  <li>Support proper formatting of time zone types.</li>
  <li>Fixed <?php githubissuel('php/php-src', 15604); ?> (Always make input parameters nullable).</li>
</ul></li>
<li>PDO_MYSQL:
<ul>
  <li>Fixed setAttribute and getAttribute.</li>
  <li>Added class Pdo\Mysql.</li>
  <li>Added custom SQL parser.</li>
  <li>Fixed <?php githubissuel('php/php-src', 15949); ?> (PDO_MySQL not properly quoting PDO_PARAM_LOB binary data).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Added class Pdo\Odbc.</li>
</ul></li>
<li>PDO_PGSQL:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 12423); ?>, DSN credentials being prioritized over the user/password PDO constructor arguments.</li>
  <li>Fixed native float support with pdo_pgsql query results.</li>
  <li>Added class Pdo\Pgsql.</li>
  <li>Retrieve the memory usage of the query result resource.</li>
  <li>Added Pdo\Pgsql::setNoticeCallBack method to receive DB notices.</li>
  <li>Added custom SQL parser.</li>
  <li>Fixed <?php githubissuel('php/php-src', 15986); ?> (Double-free due to Pdo\Pgsql::setNoticeCallback()).</li>
  <li>Fixed <?php githubissuel('php/php-src', 12940); ?> (Using PQclosePrepared when available instead of the DEALLOCATE command to free statements resources).</li>
  <li>Remove PGSQL_ATTR_RESULT_MEMORY_SIZE constant as it is provided by the new PDO Subclass as Pdo\Pgsql::ATTR_RESULT_MEMORY_SIZE.</li>
</ul></li>
<li>PDO_SQLITE:
<ul>
  <li>Added class Pdo\Sqlite.</li>
  <li><?php bugfix(81227); ?> (PDO::inTransaction reports false when in transaction).</li>
  <li>Added custom SQL parser.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>array out of bounds, stack overflow handled for segfault handler on windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16041); ?> (Support stack limit in phpdbg).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Added the possibility to have no conditions for pg_select.</li>
  <li>Persistent connections support the PGSQL_CONNECT_FORCE_RENEW flag.</li>
  <li>Added pg_result_memory_size to get the query result memory usage.</li>
  <li>Added pg_change_password to alter an user's password.</li>
  <li>Added pg_put_copy_data/pg_put_copy_end to send COPY commands and signal the end of the COPY.</li>
  <li>Added pg_socket_poll to poll on the connection.</li>
  <li>Added pg_jit to get infos on server JIT support.</li>
  <li>Added pg_set_chunked_rows_size to fetch results per chunk.</li>
  <li>pg_convert/pg_insert/pg_update/pg_delete ; regexes are now cached.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12532); ?> (PharData created from zip has incorrect timestamp).</li>
</ul></li>
<li>POSIX:
<ul>
  <li>Added POSIX_SC_CHILD_MAX and POSIX_SC_CLK_TCK constants.</li>
  <li>Updated posix_isatty to set the error number on file descriptors.</li>
</ul></li>
<li>PSpell:
<ul>
  <li>Moved to PECL.</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15094); ?> (php_random_default_engine() is not C++ conforming).</li>
  <li>lcg_value() is now deprecated.</li>
</ul></li>
<li>Readline:
<ul>
  <li>Fixed readline_info, rl_line_buffer_length/rl_len globals on update.</li>
  <li><?php bugfix(51558); ?> (Shared readline build fails).</li>
  <li>Fixed UAF with readline_info().</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Implement <?php githubissuel('php/php-src', 12908); ?> (Show attribute name/class in ReflectionAttribute dump).</li>
  <li>Make ReflectionGenerator::getFunction() legal after generator termination.</li>
  <li>Added ReflectionGenerator::isClosed().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15718); ?> (Segfault on ReflectionProperty::get{Hook,Hooks}() on dynamic properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15694); ?> (ReflectionProperty::isInitialized() is incorrect for hooked properties).</li>
  <li>Add missing ReflectionProperty::hasHook[s]() methods.</li>
  <li>Add missing ReflectionProperty::isFinal() method.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16122); ?> (The return value of ReflectionFunction::getNamespaceName() and ReflectionFunction::inNamespace() for closures is incorrect).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16162); ?> (No ReflectionProperty::IS_VIRTUAL) (DanielEScherzer)</li>
  <li>Fixed the name of the second parameter of ReflectionClass::resetAsLazyGhost().</li>
</ul></li>
<li>Session:
<ul>
  <li>INI settings session.sid_length and session.sid_bits_per_character are now deprecated.</li>
  <li>Emit warnings for non-positive values of session.gc_divisor and negative values of session.gc_probability.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16590); ?> (UAF in session_encode()).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fix signature of simplexml_import_dom().</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Removed the deprecated inet_ntoa call support.</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Add support for clark notation for namespaces in class map.</li>
  <li>Mitigate #51561 (SoapServer with a extented class and using sessions, lost the setPersistence()).</li>
  <li><?php bugfix(49278); ?> (SoapClient::__getLastResponseHeaders returns NULL if wsdl operation !has output).</li>
  <li><?php bugfix(44383); ?> (PHP DateTime not converted to xsd:datetime).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11941); ?> (soap with session persistence will silently fail when "session" built as a shared object).</li>
  <li>Passing an int to SoapServer::addFunction() is now deprecated. If all PHP functions need to be provided flatten the array returned by get_defined_functions().</li>
  <li>The SOAP_FUNCTIONS_ALL constant is now deprecated.</li>
  <li><?php bugfix(61525); ?> (SOAP functions require at least one space after HTTP header colon).</li>
  <li>Implement request #47317 (SoapServer::__getLastResponse()).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Removed the deprecated inet_ntoa call support.</li>
  <li>Added the SO_EXECLUSIVEADDRUSE windows constant.</li>
  <li>Added the SOCK_CONN_DGRAM/SOCK_DCCP netbsd constants.</li>
  <li>Added multicast group support for ipv4 on FreeBSD.</li>
  <li>Added the TCP_SYNCNT constant for Linux to set number of attempts to send SYN packets from the client.</li>
  <li>Added the SO_EXCLBIND constant for exclusive socket binding on illumos/solaris.</li>
  <li>Updated the socket_create_listen backlog argument default value to SOMAXCONN.</li>
  <li>Added the SO_NOSIGPIPE constant to control the generation of SIGPIPE for macOs and FreeBSD.</li>
  <li>Added SO_LINGER_SEC for macOs, true equivalent of SO_LINGER in other platforms.</li>
  <li>Add close-on-exec on socket created with socket_accept on unixes.</li>
  <li>Added IP_PORTRANGE* constants for BSD systems to control ephemeral port ranges.</li>
  <li>Added SOCK_NONBLOCK/SOCK_CLOEXEC constants for socket_create and socket_create_pair to apply O_NONBLOCK/O_CLOEXEC flags to the newly created sockets.</li>
  <li>Added SO_BINDTOIFINDEX to bind a socket to an interface index.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Add support for AEGIS-128L and AEGIS-256.</li>
  <li>Enable AES-GCM on aarch64 with the ARM crypto extensions.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Implement SeekableIterator for SplObjectStorage.</li>
  <li>The SplFixedArray::__wakeup() method has been deprecated as it implements __serialize() and __unserialize() which need to be overwritten instead.</li>
  <li>Passing a non-empty string for the $escape parameter of: - SplFileObject::setCsvControl() - SplFileObject::fputcsv() - SplFileObject::fgetcsv() is now deprecated.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Implement <?php githubissuel('php/php-src', 12188); ?> (Indication for the int size in phpinfo()).</li>
  <li>Partly fix <?php githubissuel('php/php-src', 12143); ?> (Incorrect round() result for 0.49999999999999994).</li>
  <li>Fix <?php githubissuel('php/php-src', 12252); ?> (round(): Validate the rounding mode).</li>
  <li>Increase the default BCrypt cost to 12.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12592); ?> (strcspn() odd behaviour with NUL bytes and empty mask).</li>
  <li>Removed the deprecated inet_ntoa call support.</li>
  <li>Cast large floats that are within int range to int in number_format so the precision is not lost.</li>
  <li>Add support for 4 new rounding modes to the round() function.</li>
  <li>debug_zval_dump() now indicates whether an array is packed.</li>
  <li>Fix <?php githubissuel('php/php-src', 12143); ?> (Optimize round).</li>
  <li>Changed return type of long2ip to string from string|false.</li>
  <li>Fix <?php githubissuel('php/php-src', 12143); ?> (Extend the maximum precision round can handle by one digit).</li>
  <li>Added the http_get_last_response_headers() and http_clear_last_response_headers() that allows retrieving the same content as the magic $http_response_header variable.</li>
  <li>Add php_base64_encode_ex() API.</li>
  <li>Implemented "Raising zero to the power of negative number" RFC.</li>
  <li>Added array_find(), array_find_key(), array_all(), and array_any().</li>
  <li>Change highlight_string() and print_r() return type to string|true.</li>
  <li>Fix references in request_parse_body() options array.</li>
  <li>Add RoundingMode enum.</li>
  <li>Unserializing the uppercase 'S' tag is now deprecated.</li>
  <li>Enables crc32 auxiliary detection on OpenBSD.</li>
  <li>Passing a non-empty string for the $escape parameter of: - fputcsv() - fgetcsv() - str_getcsv() is now deprecated.</li>
  <li>The str_getcsv() function now throws ValueErrors when the $separator and $enclosure arguments are not one byte long, or if the $escape is not one byte long or the empty string. This aligns the behaviour to be identical to that of fputcsv() and fgetcsv().</li>
  <li>php_uname() now throws ValueErrors on invalid inputs.</li>
  <li>The "allowed_classes" option for unserialize() now throws TypeErrors and ValueErrors	if it is not an	array of class names.</li>
  <li>Implemented <?php githubissuel('php/php-src', 15685); ?> (improve proc_open error reporting on Windows).</li>
  <li>Add support for backed enums in http_build_query().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15982); ?> (Assertion failure with array_find when references are involved).</li>
  <li>Fixed parameter names of fpow() to be identical to pow().</li>
</ul></li>
<li>Streams:
<ul>
  <li>Implemented <?php githubissuel('php/php-src', 15155); ?> (Stream context is lost when custom stream wrapper is being filtered).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Failures in the constructor now throw exceptions rather than emitting warnings and having a broken object.</li>
  <li>Add tidyNode::getNextSibling() and tidyNode::getPreviousSibling().</li>
</ul></li>
<li>Windows:
<ul>
  <li>Update the icon of the Windows executables, e.g. php.exe.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16199); ?> (GREP_HEADER() is broken).</li>
</ul></li>
<li>XML:
<ul>
  <li>Added XML_OPTION_PARSE_HUGE parser option.</li>
  <li><?php bugfix(81481); ?> (xml_get_current_byte_index limited to 32-bit numbers on 64-bit builds).</li>
  <li>The xml_set_object() function has been deprecated.</li>
  <li>Passing non-callable strings to the xml_set_*_handler() functions is now deprecated.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Declares class constant types.</li>
  <li>Add XMLReader::fromStream(), XMLReader::fromUri(), XMLReader::fromString().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15123); ?> (var_dump doesn't actually work on XMLReader).</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Add XMLWriter::toStream(), XMLWriter::toUri(), XMLWriter::toMemory().</li>
</ul></li>
<li>XSL:
<ul>
  <li>Implement request #64137 (XSLTProcessor::setParameter() should allow both quotes to be used).</li>
  <li>Implemented "Improve callbacks in ext/dom and ext/xsl" RFC.</li>
  <li>Added XSLTProcessor::$maxTemplateDepth and XSLTProcessor::$maxTemplateVars.</li>
  <li>Fix trampoline leak in xpath callables.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Added ZipArchive::ER_TRUNCATED_ZIP added in libzip 1.11.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<a id="PHP_8_3"></a>

<section class="version" id="8.3.29"><!-- {{{ 8.3.29 -->
<h3>Version 8.3.29</h3>
<b><?php release_date('18-Dec-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Sync all boost.context files with release 1.86.0.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20435); ?> (SensitiveParameter doesn't work for named argument passing to variadic parameter).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20286); ?> (use-after-destroy during userland stream_close()).</li>
</ul></li>
<li>Bz2:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix crashes when trying to instantiate uninstantiable classes via date static constructors.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix missing NUL byte check on C14NFile().</li>
</ul></li>
<li>Fibers:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20483); ?> (ASAN stack overflow with fiber.stack_size INI small value).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20601); ?> (ftp_connect overflow on timeout).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20511); ?> (imagegammacorrect out of range input/output values).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20602); ?> (imagescale overflow with large height values).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20426); ?> (Spoofchecker::setRestrictionLevel() error message suggests missing constants).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix some deprecations on newer libxml versions regarding input buffer/parser handling.</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20491); ?> (SLES15 compile error with mbstring oniguruma).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20492); ?> (mbstring compile warning due to non-strings).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20528); ?> (Regression breaks mysql connexion using an IPv6 address enclosed in square brackets).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20329); ?> (opcache.file_cache broken with full interned string buffer).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '8xr5-qppj-gvwj'); ?> (PDO quoting result null deref). (CVE-2025-14180)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20442); ?> (Phar does not respect case-insensitiveness of __halt_compiler() when reading stub).</li>
  <li>Fix broken return value of fflush() for phar file entries.</li>
  <li>Fix assertion failure when fseeking a phar file out of bounds.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed ZPP type violation in phpdbg_get_executable() and phpdbg_end_oplog().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20614); ?> (SplFixedArray incorrectly handles references in deserialization).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leak in array_diff() with custom type checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20583); ?> (Stack overflow in http_build_query via deep structures).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'www2-q4fc-65wf'); ?> (Null byte termination in dns_get_record()).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'h96m-rvf9-jgm2'); ?> (Heap buffer overflow in array_merge()). (CVE-2025-14178)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '3237-qqm7-mfv7'); ?> (Information Leak of Memory in getimagesize). (CVE-2025-14177)</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20374); ?> (PHP with tidy and custom-tags).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20439); ?> (xml_set_default_handler() does not properly handle special characters in attributes when passing data to callback).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix crash in property existence test.</li>
  <li>Don't truncate return value of zip_fread() with user sizes.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fix assertion failures resulting in crashes with stream filter object parameters.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.28"><!-- {{{ 8.3.28 -->
<h3>Version 8.3.28</h3>
<b><?php release_date('20-Nov-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19934); ?> (CGI with auto_globals_jit=0 causes uouv).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20073); ?> (Assertion failure in WeakMap offset operations on reference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19844); ?> (Don't bail when closing resources on shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20177); ?> (Accessing overridden private property in get_object_vars() triggers assertion error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20183); ?> (Stale EG(opline_before_exception) pointer through eval).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 16317); ?> (DOM classes do not allow __debugInfo() overrides to work).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fix possible memory leak when tag is empty.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19974); ?> (fpm_status_export_to_zval segfault for parallel execution).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20240); ?> (FTP with SSL: ftp_fput(): Connection timed out on successful writes).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20070); ?> (Return type violation in imagefilter when an invalid filter is provided).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak on error in locale_filter_matches().</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix not thread safe schema/relaxng calls.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8978); ?> (SSL certificate verification fails (port doubled)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20122); ?> (getColumnMeta() for JSON-column in MySQL).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20081); ?> (access to uninitialized vars in preload_load()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20121); ?> (JIT broken in ZTS builds on MacOS 15).</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fix memory leak when first string conversion fails.</li>
  <li>Fix segfaults when attempting to fetch row into a non-instantiable class name.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix memory leak of argument in webPhar.</li>
  <li>Fix memory leak when setAlias() fails.</li>
  <li>Fix a bunch of memory leaks in phar_parse_zipfile() error handling.</li>
  <li>Fix file descriptor/memory leak when opening central fp fails.</li>
  <li>Fix memleak+UAF when opening temp stream in buildFromDirectory() fails.</li>
  <li>Fix potential buffer length truncation due to usage of type int instead of type size_t.</li>
  <li>Fix memory leak when openssl polyfill returns garbage.</li>
  <li>Fix file descriptor leak in phar_zip_flush() on failure.</li>
  <li>Fix memory leak when opening temp file fails while trying to open gzip-compressed archive.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20302); ?> (Freeing a phar alias may invalidate PharFileInfo objects).</li>
</ul></li>
<li>Random:
<ul>
  <li>Fix Randomizer::__serialize() w.r.t. INDIRECTs.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 16317); ?> (SimpleXML does not allow __debugInfo() overrides to work).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix shm corruption with coercion in options of unserialize().</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19798); ?>: XP_SOCKET XP_SSL (Socket stream modules): Incorrect condition for Win32/Win64.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19021); ?> (improved tidyOptGetCategory detection).</li>
  <li>Fix UAF in tidy when tidySetErrorBuffer() fails.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fix arginfo/zpp violations when LIBXML_SCHEMAS_ENABLED is not available.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 19722); ?> (_get_osfhandle asserts in debug mode when given a socket).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix memory leak when passing enc_method/enc_password is passed as option for ZipArchive::addGlob()/addPattern() and with consecutive calls.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.27"><!-- {{{ 8.3.27 -->
<h3>Version 8.3.27</h3>
<b><?php release_date('23-Oct-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19765); ?> (object_properties_load() bypasses readonly property checks).</li>
  <li>Fixed hard_timeout with --enable-zend-max-execution-timers.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19792); ?> (SCCP causes UAF for return value if both warning and exception are triggered).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19653); ?> (Closure named argument unpacking between temporary closures can cause a crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19839); ?> (Incorrect HASH_FLAG_HAS_EMPTY_IND flag on userland array).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19480); ?> (error_log php.ini cannot be unset when open_basedir is configured).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20002); ?> (Broken build on *BSD with MSAN).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fix useless "Failed to poll event" error logs due to EAGAIN in CLI server with PHP_CLI_SERVER_WORKERS.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix cloning of CURLOPT_POSTFIELDS when using the clone operator instead of the curl_copy_handle() function to clone a CurlHandle.</li>
  <li>Fix curl build and test failures with version 8.16.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 17159); ?>: "P" format for ::createFromFormat swallows string literals.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19885); ?> (dba_fetch() overflow on skip argument).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19955); ?> (imagefttext() memory leak).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(67563); ?> (mysqli compiled with mysqlnd does not take ipv6 adress as parameter).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix memory leak and invalid continuation after tar header writing fails.</li>
  <li>Fix memory leaks when creating temp file fails when applying zip signature.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19988); ?> (zend_string_init with NULL pointer in simplexml (UB)).</li>
</ul></li>
<li>Soap:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19784); ?> (SoapServer memory leak).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20011); ?> (Array of SoapVar of unknown type causes crash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12265); ?> (Cloning an object breaks serialization recursion).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19701); ?> (Serialize/deserialize loses some data).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19801); ?> (leaks in var_dump() and debug_zval_dump()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 20043); ?> (array_unique assertion failure with RC1 array causing an exception on sort).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19926); ?> (reset internal pointer earlier while splicing array while COW violation flag is still set).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19570); ?> (unable to fseek in /dev/zero and /dev/null).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19248); ?> (Use strerror_r instead of strerror in main).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17345); ?> (Bug #35916 was not completely fixed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19705); ?> (segmentation when attempting to flush on non seekable stream.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 20009); ?> (XMLReader leak on RelaxNG schema failure).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19688); ?> (Remove pattern overflow in zip addGlob()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19932); ?> (Memory leak in zip setEncryptionName()/setEncryptionIndex()).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19922); ?> (Double free on gzopen).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.26"><!-- {{{ 8.3.26 -->
<h3>Version 8.3.26</h3>
<b><?php release_date('25-Sep-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18850); ?> (Repeated inclusion of file with __halt_compiler() triggers "Constant already defined" warning).</li>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 19542); ?> (Scanning of string literals &gt;=2GB will fail due to signed int overflow).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19544); ?> (GC treats ZEND_WEAKREF_TAG_MAP references as WeakMap references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19613); ?> (Stale array iterator pointer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19679); ?> (zend_ssa_range_widening may fail to converge).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19681); ?> (PHP_EXPAND_PATH broken with bash 5.3.0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19720); ?> (Assertion failure when error handler throws when accessing a deprecated constant).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19461); ?> (Improve error message on listening error with IPv6 address).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed date_sunrise() and date_sunset() with partial-hour UTC offset.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19612); ?> (Mitigate libxml2 tree dictionary bug).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed failed debug assertion when php_admin_value setting fails.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19579); ?> (imagefilledellipse underflow on width argument).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11952); ?> (Fix locale strings canonicalization for IntlDateFormatter and NumberFormatter).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19245); ?> (Success error message on TLS stream accept failure).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19485); ?> (potential use after free when using persistent pgsql connections).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed memory leaks when verifying OpenSSL signature.</li>
  <li>Fix memory leak in phar tar temporary file error handling code.</li>
  <li>Fix metadata leak when phar convert logic fails.</li>
  <li>Fix memory leak on failure in phar_convert_to_other().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19752); ?> (Phar decompression with invalid extension can cause UAF).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16649); ?> (UAF during array_splice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19577); ?> (Avoid integer overflow when using a small offset and PHP_INT_MAX with LimitIterator).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Remove incorrect call to zval_ptr_dtor() in user_wrapper_metadata().</li>
  <li>Fix OSS-Fuzz #385993744.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19021); ?> build issue with libtidy in regard of tidyOptIsReadonly deprecation and TidyInternalCategory being available later than tidyOptGetCategory.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix memory leak in zip when encountering empty glob result.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.25"><!-- {{{ 8.3.25 -->
<h3>Version 8.3.25</h3>
<b><?php release_date('28-Aug-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19169); ?> build issue with C++17 and ZEND_STATIC_ASSERT macro.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18581); ?> (Coerce numeric string keys from iterators when argument unpacking).</li>
  <li>Fixed OSS-Fuzz #434346548 (Failed assertion with throwing __toString in binary const expr).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19305); ?> (Operands may be being released during comparison).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19303); ?> (Unpacking empty packed array into uninitialized array causes assertion failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19306); ?> (Generator can be resumed while fetching next value from delegated Generator).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19326); ?> (Calling Generator::throw() on a running generator with a non-Generator delegate crashes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18736); ?> (Circumvented type check with return by ref + finally).</li>
  <li>Fixed zend call stack size for macOs/arm64.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19065); ?> (Long match statement can segfault compiler during recursive SSA renaming).</li>
</ul></li>
<li>Calendar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19371); ?> (integer overflow in calendar.c).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fix theoretical issues with hrtime() not being available.</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix incorrect comparison with result of php_stream_can_cast().</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix crash on clone failure.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 19261); ?>: msgfmt_parse_message leaks on message creation failure.</li>
  <li>Fix return value on failure for resourcebundle count handler.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18529); ?> (additional inheriting of TLS int options).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19098); ?> (libxml&lt;2.13 segmentation fault caused by php_libxml_node_free).</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19397); ?> (mb_list_encodings() can cause crashes on shutdown).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Reset global pointers to prevent use-after-free in zend_jit_status().</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18986); ?> (OpenSSL backend: incorrect RAND_{load,write}_file() return value check).</li>
  <li>Fix error return check of EVP_CIPHER_CTX_ctrl().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19428); ?> (openssl_pkey_derive segfaults for DH derive with low key_length param).</li>
</ul></li>
<li>PDO Pgsql:
<ul>
  <li>Fixed dangling pointer access on _pdo_pgsql_trim_message helper.</li>
</ul></li>
<li>Readline:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19250); ?> and bug #51360 (Invalid conftest for rl_pending_input).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18640); ?> (heap-use-after-free ext/soap/php_encoding.c:299:32 in soap_check_zval_ref).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fix some potential crashes on incorrect argument value.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed OSS Fuzz #433303828 (Leak in failed unserialize() with opcache).</li>
  <li>Fix theoretical issues with hrtime() not being available.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 19300); ?> (Nested array_multisort invocation with error breaks).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Free opened_path when opened_path_len &gt;= MAXPATHLEN.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.24"><!-- {{{ 8.3.24 -->
<h3>Version 8.3.24</h3>
<b><?php release_date('31-Jul-2025'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed jewishtojd overflow on year argument.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18833); ?> (Use after free with weakmaps dependent on destruction order).</li>
  <li>Fix OSS-Fuzz #427814456.</li>
  <li>Fix OSS-Fuzz #428983568 and #428760800.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17204); ?> -Wuseless-escape warnings emitted by re2c.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix memory leaks when returning refcounted value from curl callback.</li>
  <li>Remove incorrect string release.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18902); ?> ldap_exop/ldap_exop_sync assert triggered on empty request OID.</li>
</ul></li>
<li>MbString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18901); ?> (integer overflow mb_split).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18873); ?> (OCI_RETURN_LOBS flag causes oci8 to leak memory).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18639); ?> (Internal class aliases can break preloading + JIT).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14082); ?> (Segmentation fault on unknown address 0x600000000018 in ext/opcache/jit/zend_jit.c).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(80770); ?> (It is not possible to get client peer certificate with stream_socket_server).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18958); ?> (Fatal error during shutdown after pcntl_rfork() or pcntl_forkx() with zend-max-execution-timers).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix stream double free in phar.</li>
  <li>Fix phar crash and file corruption with SplFileObject.</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18990); ?>, bug #81029, bug #47314 (SOAP HTTP socket not closing on object destruction).</li>
  <li>Fix memory leak when URL parsing fails in redirect.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 19094); ?> (Attaching class with no Iterator implementation to MultipleIterator causes crash).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix misleading errors in printf().</li>
  <li>Fix RCN violations in array functions.</li>
  <li>Fixed <?php githubissuel('php/php-src', 18976); ?> pack() overflow with h/H format and INT_MAX repeater value.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 13264); ?> (fgets() and stream_get_line() do not return false on filter fatal error).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix leak when path is too long in ZipArchive::extractTo().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.23"><!-- {{{ 8.3.23 -->
<h3>Version 8.3.23</h3>
<b><?php release_date('03-Jul-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18695); ?> (zend_ast_export() - float number is not preserved).</li>
  <li>Do not delete main chunk in zend_gc.</li>
  <li>Fix compile issues with zend_alloc and some non-default options.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix memory leak when setting a list via curl_setopt fails.</li>
  <li>Fix incorrect OpenSSL version detection.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fix leaks with multiple calls to DatePeriod iterator current().</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18662); ?> (fpm_get_status segfault).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14551); ?> (PGO build fails with xxhash).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak in intl_datetime_decompose() on failure.</li>
  <li>Fix memory leak in locale lookup on failure.</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fix memory leak on php_odbc_fetch_hash() failure.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18743); ?> (Incompatibility in Inline TLS Assembly on Alpine 3.22).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix memory leak of X509_STORE in php_openssl_setup_verify() on failure.</li>
  <li><?php bugfix(74796); ?> (Requests through http proxy set peer name).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hrwm-9436-5mv3'); ?> (pgsql extension does not check for errors during escaping). (CVE-2025-1735)</li>
  <li>Fix warning not being emitted when failure to cancel a query with pg_cancel_query().</li>
</ul></li>
<li>Phar:
<ul>
  <li>Add missing filter cleanups on phar failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18642); ?> (Signed integer overflow in ext/phar fseek).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix 'phpdbg --help' segfault on shutdown with USE_ZEND_ALLOC=0.</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fix memory leak if WideCharToMultiByte() fails.</li>
</ul></li>
<li>Random:
<ul>
  <li>Fix reference type confusion and leak in user random engine.</li>
</ul></li>
<li>Readline:
<ul>
  <li>Fix memory leak when calloc() fails in php_readline_completion_cb().</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fix memory leaks in php_http.c when call_user_function() fails.</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '453j-q27h-5p8x'); ?> (NULL Pointer Dereference in PHP SOAP Extension via Large XML Namespace Prefix). (CVE-2025-6491)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '3cr5-j632-f35r'); ?> (Null byte termination in hostnames). (CVE-2025-1220)</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leak in tidy output handler on error.</li>
  <li>Fix tidyOptIsReadonly deprecation, using tidyOptGetCategory.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.22"><!-- {{{ 8.3.22 -->
<h3>Version 8.3.22</h3>
<b><?php release_date('05-Jun-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18480); ?> (array_splice with large values for offset/length arguments).</li>
  <li>Partially fixed <?php githubissuel('php/php-src', 18572); ?> (nested object comparisons leading to stack overflow).</li>
  <li>Fixed OSS-Fuzz #417078295.</li>
  <li>Fixed OSS-Fuzz #418106144.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18460); ?> (curl_easy_setopt with CURLOPT_USERPWD/CURLOPT_USERNAME/ CURLOPT_PASSWORD set the Authorization header when set to NULL).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18076); ?> (Since PHP 8, the date_sun_info() function returns inaccurate sunrise and sunset times, but other calculated times are correct) (JiriJozif).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18481); ?> (date_sunrise with unexpected nan value for the offset).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix various reference issues.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18529); ?> (ldap no longer respects TLS_CACERT from ldaprc in ldap_start_tls()).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18417); ?> (Windows SHM reattachment fails when increasing memory_consumption or jit_buffer_size).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18567); ?> (Preloading with internal class alias triggers assertion failure).</li>
  <li>Fix leak of accel_globals-&gt;key.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix missing checks against php_set_blocking() in xp_ssl.c.</li>
</ul></li>
<li>PDO_OCI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18494); ?> (PDO OCI segfault in statement GC).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18421); ?> (Integer overflow with large numbers in LimitIterator).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17403); ?> (Potential deadlock when putenv fails).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18509); ?> (Dynamic calls to assert() ignore zend.assertions).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fix leak+crash with sapi_windows_set_ctrl_handler().</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18431); ?> (Registering ZIP progress callback twice doesn't work).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18438); ?> (Handling of empty data and errors in ZipArchive::addPattern).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.21"><!-- {{{ 8.3.21 -->
<h3>Version 8.3.21</h3>
<b><?php release_date('08-May-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18304); ?> (Changing the properties of a DateInterval through dynamic properties triggers a SegFault).</li>
  <li>Fix some leaks in php_scandir.</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18309); ?> (ipv6 filter integer overflow).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed imagecrop() overflow with rect argument with x/width y/heigh usage in gdImageCrop().</li>
  <li>Fixed <?php githubissuel('php/php-src', 18243); ?> imagettftext() overflow/underflow on font size value.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix reference support for intltz_get_offset().</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17776); ?> (LDAP_OPT_X_TLS_* options can't be overridden).</li>
  <li>Fix NULL deref on high modification key.</li>
</ul></li>
<li>libxml:
<ul>
  <li>Fixed custom external entity loader returning an invalid resource leading to a confusing TypeError message.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fix memory leak in openssl_sign() when passing invalid algorithm.</li>
  <li>Fix potential leaks when writing to BIO fails.</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 18276); ?> - persistent connection - "zend_mm_heap corrupted" with setAttribute() (SakiTakamachi).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18322); ?> (SplObjectStorage debug handler mismanages memory).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18145); ?> (php8ts crashes in php_clear_stat_cache()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18209); ?> (Use-after-free in extract() with EXTR_REFS).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18212); ?> (fseek with SEEK_CUR whence value and negative offset leads to negative stream position).</li>
  <li>Fix resource leak in iptcembed() on error.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fix uouv when handling empty options in ZipArchive::addGlob().</li>
  <li>Fix memory leak when handling a too long path in ZipArchive::addGlob().</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.20"><!-- {{{ 8.3.20 -->
<h3>Version 8.3.20</h3>
<b><?php release_date('10-Apr-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17961); ?> (use-after-free during dl()'ed module class destruction).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15367); ?> (dl() of module with aliased class crashes in shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13193); ?> again (Significant performance degradation in 'foreach').</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix weird unpack behaviour in DOM.</li>
  <li>Fix xinclude destruction of live attributes.</li>
</ul></li>
<li>Embed:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 8533); ?> (Unable to link dynamic libphp on Mac).</li>
</ul></li>
<li>Fuzzer:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18081); ?> (Memory leaks in error paths of fuzzer SAPI).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17984); ?> (calls with arguments as array with references).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix locale_compose and locale_lookup to work with their array argument with values as references.</li>
  <li>Fix dateformat_format when the time is an array of references.</li>
  <li>Fix UConverter::transcode with substitutes as references.</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17989); ?> (mb_output_handler crash with unset http_output_conv_mimetypes).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18112); ?> (NULL access with preloading and INI option).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 18107); ?> (Opcache CFG jmp optimization with try-finally breaks the exception table).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix memory leak when destroying PDORow.</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(66049); ?> (Typemap can break parsing in parse_packet_soap leading to a segfault) .</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 18018); ?> (RC1 data returned from offsetGet causes UAF in ArrayObject).</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17736); ?> (Assertion failure zend_reference_destroy()).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17836); ?> (zend_vm_gen.php shouldn't break on Windows line endings).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.19"><!-- {{{ 8.3.19 -->
<h3>Version 8.3.19</h3>
<b><?php release_date('13-Mar-2025'); ?></b>
<ul><li>BCMath:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17398); ?> (bcmul memory leak).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17623); ?> (Broken stack overflow detection for variable compilation).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17618); ?> (UnhandledMatchError does not take zend.exception_ignore_args=1 into account).</li>
  <li>Fix fallback paths in fast_long_{add,sub}_function.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17718); ?> (Calling static methods on an interface that has `__callStatic` is allowed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17797); ?> (zend_test_compile_string crash on invalid script path).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'rwp7-7vc6-8477'); ?> (Reference counting in php_request_shutdown causes Use-After-Free). (CVE-2024-11235)</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17847); ?> (xinclude destroys live node).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fix FFI Parsing of Pointer Declaration Lists.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17643); ?> (FPM with httpd ProxyPass encoded PATH_INFO env).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17772); ?> (imagepalettetotruecolor crash with memory_limit=2M).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17704); ?> (ldap_search fails when $attributes contains a non-packed array with numerical keys).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'wg4p-4hqh-c3g9'); ?> (Reocurrence of #72714).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'p3x9-6h7p-cgfc'); ?> (libxml streams use wrong `content-type` header when requesting a redirected resource). (CVE-2025-1219)</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17503); ?> (Undefined float conversion in mb_convert_variables).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17654); ?> (Multiple classes using same trait causes function JIT crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17577); ?> (JIT packed type guard crash).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17899); ?> (zend_test_compile_string with invalid path when opcache is enabled).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17868); ?> (Cannot allocate memory with tracing JIT).</li>
</ul></li>
<li>PDO_SQLite:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 17837); ?> ()::getColumnMeta() on unexecuted statement segfaults).</li>
  <li>Fix cycle leak in sqlite3 setAuthorizer().</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17808); ?>: PharFileInfo refcount bug.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Partially fixed bug <?php githubissuel('php/php-src', 17387); ?> (Trivial crash in phpdbg lexer).</li>
  <li>Fix memory leak in phpdbg calling registered function.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15902); ?> (Core dumped in ext/reflection/php_reflection.c).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72666); ?> (stat cache clearing inconsistent between file:// paths and plain paths).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17650); ?> (realloc with size 0 in user_filters.c).</li>
  <li>Fix memory leak on overflow in _php_stream_scandir().</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hgf5-96fm-v528'); ?> (Stream HTTP wrapper header check might omit basic auth header). (CVE-2025-1736)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '52jp-hrpf-2jff'); ?> (Stream HTTP wrapper truncate redirect location to 1024 bytes). (CVE-2025-1861)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'pcmh-g36c-qc44'); ?> (Streams HTTP wrapper does not fail for headers without colon). (CVE-2025-1734)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'v8xr-gpvj-cx9g'); ?> (Header parser of `http` stream wrapper does not handle folded headers). (CVE-2025-1217)</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed phpize for Windows 11 (24H2).</li>
  <li>Fixed <?php githubissuel('php/php-src', 17855); ?> (CURL_STATICLIB flag set even if linked with shared lib).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17745); ?> (zlib extension incorrectly handles object arguments).</li>
  <li>Fix memory leak when encoding check fails.</li>
  <li>Fix zlib support for large files.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.17"><!-- {{{ 8.3.17 -->
<h3>Version 8.3.17</h3>
<b><?php release_date('13-Feb-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16892); ?> (ini_parse_quantity() fails to parse inputs starting with 0x0b).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16886); ?> (ini_parse_quantity() fails to emit warning for 0x+0).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17214); ?> (Relax final+private warning for trait methods with inherited final).</li>
  <li>Fixed NULL arithmetic during system program execution on Windows.</li>
  <li>Fixed potential OOB when checking for trailing spaces on Windows.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17408); ?> (Assertion failure Zend/zend_exceptions.c).</li>
  <li>Fix may_have_extra_named_args flag for ZEND_AST_UNPACK.</li>
  <li>Fix NULL arithmetic in System V shared memory emulation for Windows.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17500); ?> (Segfault with requesting nodeName on nameless doctype).</li>
</ul></li>
<li>Enchant:
<ul>
  <li>Fix crashes in enchant when passing null bytes.</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16800); ?> (ftp functions can abort with EINTR).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17349); ?> (Tiled truecolor filling looses single color transparency).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17373); ?> (imagefttext() ignores clipping rect for palette images).</li>
  <li>Ported fix for libgd 223 (gdImageRotateGeneric() does not properly interpolate).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11874); ?> (intl causing segfault in docker images).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17469); ?> (UConverter::transcode always emit E_WARNING on invalid encoding).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17307); ?> (Internal closure causes JIT failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17564); ?> (Potential UB when reading from / writing to struct padding).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed a memory leak when the GC is used to free a PDOStatment.</li>
  <li>Fixed a crash in the PDO Firebird Statement destructor.</li>
  <li>Fixed UAFs when changing default fetch class ctor args.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17518); ?> (offset overflow phar extractTo()).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fix crashes in function registration + test.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fix type confusion with session SID constant.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17541); ?> (ext/session NULL pointer dereferencement during ID reset).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17409); ?> (Assertion failure Zend/zend_hash.c:1730).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17330); ?> (SNMP::setSecurity segfault on closed session).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17463); ?> (crash on SplTempFileObject::ftruncate with negative value).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17139); ?> (Fix zip_entry_name() crash on invalid entry).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.16"><!-- {{{ 8.3.16 -->
<h3>Version 8.3.16</h3>
<b><?php release_date('16-Jan-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17106); ?> (ZEND_MATCH_ERROR misoptimization).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17162); ?> (zend_array_try_init() with dtor can cause engine UAF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17101); ?> (AST-&gt;string does not reproduce constructor property promotion correctly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17211); ?> (observer segfault on function loaded with dl()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17216); ?> (Trampoline crash on error).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14709); ?> DatePeriod::__construct() overflow on recurrences.</li>
</ul></li>
<li>DBA:
<ul>
  <li>Skip test if inifile is disabled.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17224); ?> (UAF in importNode).</li>
</ul></li>
<li>Embed:
<ul>
  <li>Make build command for program using embed portable.</li>
</ul></li>
<li>FFI:
<ul>
  <li><?php bugfix(79075); ?> (FFI header parser chokes on comments).</li>
  <li>Fix memory leak on ZEND_FFI_TYPE_CHAR conversion failure.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16013); ?> and bug #80857 (Big endian issues).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16944); ?> (Fix filtering special IPv4 and IPv6 ranges, by using information from RFC 6890).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13437); ?> (FPM: ERROR: scoreboard: failed to lock (already locked)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17112); ?> (Macro redefinitions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17208); ?> (bug64539-status-json-encoding.phpt fail on 32-bits).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16255); ?> (Unexpected nan value in ext/gd/libgd/gd_filter.c).</li>
  <li>Ported fix for libgd bug 276 (Sometimes pixels are missing when storing images as BMPs).</li>
</ul></li>
<li>Gettext:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17202); ?> (Segmentation fault ext/gettext/gettext.c bindtextdomain()).</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17047); ?> (UAF on iconv filter failure).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17280); ?> (ldap_search() fails when $attributes array has holes).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17223); ?> (Memory leak in libxml encoding handling).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17112); ?> (Macro redefinitions).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>opcache_get_configuration() properly reports jit_prof_threshold.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17246); ?> (GC during SCCP causes segfault).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fix memory leak in cleanup code of pcntl_exec() when a non stringable value is encountered past the first entry.</li>
</ul></li>
<li>PgSql:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17158); ?> (pg_fetch_result Shows Incorrect ArgumentCountError Message when Called With 1 Argument).</li>
  <li>Fixed further ArgumentCountError for calls with flexible number of arguments.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17137); ?> (Segmentation fault ext/phar/phar.c).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17040); ?> (SimpleXML's unset can break DOM objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17153); ?> (SimpleXML crash when using autovivification on document).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16276); ?> (socket_strerror overflow handling with INT_MIN).</li>
  <li>Fixed overflow on SO_LINGER values setting, strengthening values check on SO_SNDTIMEO/SO_RCVTIMEO for socket_set_option().</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17225); ?> (NULL deref in spl_directory.c).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17037); ?> (UAF in user filter when adding existing filter name due to incorrect error handling).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16810); ?> (overflow on fopen HTTP wrapper timeout value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 17067); ?> (glob:// wrapper doesn't cater to CWD for ZTS builds).</li>
</ul></li>
<li>Windows:
<ul>
  <li>Hardened proc_open() against cmd.exe hijacking.</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 1718); ?> (unreachable program point in zend_hash).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.15"><!-- {{{ 8.3.15 -->
<h3>Version 8.3.15</h3>
<b><?php release_date('19-Dec-2024'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed jdtogregorian overflow.</li>
  <li>Fixed cal_to_jd julian_days argument overflow.</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16991); ?> (Getting typeinfo of non DISPATCH variant segfaults).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fail early in *nix configuration build script.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16727); ?> (Opcache bad signal 139 crash in ZTS bookworm (frankenphp)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16799); ?> (Assertion failure at Zend/zend_vm_execute.h:7469).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16630); ?> (UAF in lexer with encoding translation and heredocs).</li>
  <li>Fix is_zend_ptr() huge block comparison.</li>
  <li>Fixed potential OOB read in zend_dirname() on Windows.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16802); ?> (open_basedir bypass using curl extension).</li>
  <li>Fix various memory leaks in curl mime handling.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16777); ?> (Calling the constructor again on a DOM object after it is in a document causes UAF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16906); ?> (Reloading document can cause UAF in iterator).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16432); ?> (PHP-FPM 8.2 SIGSEGV in fpm_get_status).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16776); ?> (imagecreatefromstring overflow).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16890); ?> (array_sum() with GMP can loose precision (LLP64)).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16711); ?>: Segfault in mhash().</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16770); ?> (Tracing JIT type mismatch when returning UNDEF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16851); ?> (JIT_G(enabled) not set correctly on other threads).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16902); ?> (Set of opcache tests fail zts+aarch64).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Prevent unexpected array entry conversion when reading key.</li>
  <li>Fix various memory leaks related to openssl exports.</li>
  <li>Fix memory leak in php_openssl_pkey_from_zval().</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed memory leak of `setFetchMode()`.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16695); ?> (phar:// tar parser and zero-length file header blocks).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15208); ?> (Segfault with breakpoint map and phpdbg_clear()).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16998); ?> (UBSAN warning in rfc1867).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16808); ?> (Segmentation fault in RecursiveIteratorIterator -&gt;current() with a xml element input).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fix make check being invoked in ext/soap.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16905); ?> (Internal iterator functions can't handle UNDEF properties).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16957); ?> (Assertion failure in array_shift with self-referencing array).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed network connect poll interuption handling.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16849); ?> (Error dialog causes process to hang).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.14"><!-- {{{ 8.3.14 -->
<h3>Version 8.3.14</h3>
<b><?php release_date('21-Nov-2024'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16373); ?> (Shebang is not skipped for router script in cli-server started through shebang).</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '4w77-75f9-2c8w'); ?> (Heap-Use-After-Free in sapi_read_post_data Processing in CLI SAPI Interface).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed out of bound writes to SafeArray data.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16168); ?> (php 8.1 and earlier crash immediately when compiled with Xcode 16 clang on macOS 15).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16371); ?> (Assertion failure in Zend/zend_weakrefs.c:646).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16515); ?> (Incorrect propagation of ZEND_ACC_RETURN_REFERENCE for call trampoline).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16509); ?> (Incorrect line number in function redeclaration error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16508); ?> (Incorrect line number in inheritance errors of delayed early bound classes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16648); ?> (Use-after-free during array sorting).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16302); ?> (CurlMultiHandle holds a reference to CurlHandle if curl_multi_add_handle fails).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16454); ?> (Unhandled INF in date_sunset() with tiny $utcOffset).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14732); ?> (date_sun_info() fails for non-finite values).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16390); ?> (dba_open() can segfault for "pathless" streams).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16316); ?> (DOMXPath breaks when not initialized properly).</li>
  <li>Add missing hierarchy checks to replaceChild.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16336); ?> (Attribute intern document mismanagement).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16338); ?> (Null-dereference in ext/dom/node.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16473); ?> (dom_import_simplexml stub is wrong).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16533); ?> (Segfault when adding attribute to parent that is not an element).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16535); ?> (UAF when using document as a child).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16593); ?> (Assertion failure in DOM-&gt;replaceChild).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16595); ?> (Another UAF in DOM -&gt; cloneNode).</li>
</ul></li>
<li>EXIF:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16409); ?> (Segfault in exif_thumbnail when not dealing with a real file).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16397); ?> (Segmentation fault when comparing FFI object).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16523); ?> (FILTER_FLAG_HOSTNAME accepts ending hyphen).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16628); ?> (FPM logs are getting corrupted with this log statement).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16334); ?> (imageaffine overflow on matrix elements).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16427); ?> (Unchecked libavif return values).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16559); ?> (UBSan abort in ext/gd/libgd/gd_interpolation.c:1007).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed floating point exception bug with gmp_pow when using large exposant values. (David Carlier).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16411); ?> (gmp_export() can cause overflow).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16501); ?> (gmp_random_bits() can cause overflow).</li>
  <li>Fixed gmp_pow() overflow bug with large base/exponents.</li>
  <li>Fixed segfaults and other issues related to operator overloading with GMP objects.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'g665-fm4p-vhff'); ?> (OOB access in ldap_escape). (CVE-2024-8932)</li>
</ul></li>
<li>MBstring:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16361); ?> (mb_substr overflow on start/length arguments).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'h35g-vwh6-m678'); ?> (Leak partial content of the heap through heap buffer over-read). (CVE-2024-8929)</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16408); ?> (Array to string conversion warning emitted in optimizer).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16357); ?> (openssl may modify member types of certificate arrays).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16433); ?> (Large values for openssl_csr_sign() $days overflow).</li>
  <li>Fix various memory leaks on error conditions in openssl_x509_parse().</li>
</ul></li>
<li>PDO DBLIB:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the dblib quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the firebird quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16450); ?> (PDO_ODBC can inject garbage into field values).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16406); ?> (Assertion failure in ext/phar/phar.c:2808).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16174); ?> (Empty string is an invalid expression for ev).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16601); ?> (Memory leak in Reflection constructors).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16385); ?> (Unexpected null returned by session_set_cookie_params).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16290); ?> (overflow on cookie_lifetime ini value).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16318); ?> (Recursive array segfaults soap encoding).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16429); ?> (Segmentation fault access null pointer in SoapClient).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug with overflow socket_recvfrom $length argument.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16337); ?> (Use-after-free in SplHeap).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16464); ?> (Use-after-free in SplDoublyLinkedList::offsetSet()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16479); ?> (Use-after-free in SplObjectStorage::setInfo()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16478); ?> (Use-after-free in SplFixedArray::unset()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16588); ?> (UAF in Observer-&gt;serialize).</li>
  <li>Fix <?php githubissuel('php/php-src', 16477); ?> (Segmentation fault when calling __debugInfo() after failed SplFileObject::__constructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16589); ?> (UAF in SplDoublyLinked-&gt;serialize()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14687); ?> (segfault on SplObjectIterator instance).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16604); ?> (Memory leaks in SPL constructors).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16646); ?> (UAF in ArrayObject::unset() and ArrayObject::exchangeArray()).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16293); ?> (Failed assertion when throwing in assert() callback with bail enabled).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'c5f2-jwm7-mmq2'); ?> (Configuring a proxy in a stream context might allow for CRLF injection in URIs). (CVE-2024-11234)</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'r977-prxv-hc43'); ?> (Single byte overread with convert.quoted-printable-decode filter). (CVE-2024-11233)</li>
</ul></li>
<li>SysVMsg:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16592); ?> (msg_send() crashes when a type does not properly serialized).</li>
</ul></li>
<li>SysVShm:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16591); ?> (Assertion error in shm_put_var).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16292); ?> (Segmentation fault in ext/xmlreader/php_xmlreader.c).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16326); ?> (Memory management is broken for bad dictionaries.) (cmb)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.13"><!-- {{{ 8.3.13 -->
<h3>Version 8.3.13</h3>
<b><?php release_date('24-Oct-2024'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16240); ?>: jdtounix overflow on argument value.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16241); ?>: easter_days/easter_date overflow on year argument.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16263); ?>: jddayofweek overflow.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16234); ?>: jewishtojd overflow.</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16137); ?>: duplicate http headers when set several times by the client.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16054); ?> (Segmentation fault when resizing hash table iterator list while adding).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15905); ?> (Assertion failure for TRACK_VARS_SERVER).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15907); ?> (Failed assertion when promoting Serialize deprecation to exception).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15851); ?> (Segfault when printing backtrace during cleanup of nested generator frame).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15866); ?> (Core dumped in Zend/zend_generators.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16188); ?> (Assertion failure in Zend/zend_exceptions.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16233); ?> (Observer segfault when calling user function in internal function via trampoline).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16039); ?> (Segmentation fault (access null pointer) in ext/dom/parentnode/tree.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16149); ?> (Null pointer dereference in DOMElement-&gt;getAttributeNames()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16151); ?> (Assertion failure in ext/dom/parentnode/tree.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16150); ?> (Use after free in php_dom.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16152); ?> (Memory leak in DOMProcessingInstruction/DOMDocument).</li>
</ul></li>
<li>JSON:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15168); ?> (stack overflow in json_encode()).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16232); ?> (bitshift overflow on wbmp file content reading / fix backport from upstream).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12264); ?> (overflow/underflow on imagerotate degrees value) (David Carlier)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16274); ?> (imagescale underflow on RBG channels / fix backport from upstream).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16032); ?> (Various NULL pointer dereferencements in ldap_modify_batch()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16101); ?> (Segfault in ldap_list(), ldap_read(), and ldap_search() when LDAPs array is not a list).</li>
  <li>Fix <?php githubissuel('php/php-src', 16132); ?> (php_ldap_do_modify() attempts to free pointer not allocated by ZMM.).</li>
  <li>Fix <?php githubissuel('php/php-src', 16136); ?> (Memory leak in php_ldap_do_modify() when entry is not a proper dictionary).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16261); ?> (Reference invariant broken in mb_convert_variables()).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed stub for openssl_csr_new.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16189); ?> (underflow on offset argument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16184); ?> (UBSan address overflowed in ext/pcre/php_pcre.c).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15901); ?> (phpdbg: Assertion failure on i funcs).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16181); ?> (phpdbg: exit in exception handler reports fatal error).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16187); ?> (Assertion failure in ext/reflection/php_reflection.c).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15395); ?> (php-fpm: zend_mm_heap corrupted with cgi-fcgi request).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15837); ?> (Segmentation fault in ext/simplexml/simplexml.c).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16267); ?> (socket_strerror overflow on errno argument).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(73182); ?> (PHP SOAPClient does not support stream context HTTP headers in array form).</li>
  <li><?php bugfix(62900); ?> (Wrong namespace on xsd import error message).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15711); ?> (SoapClient can't convert BackedEnum to scalar value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16237); ?> (Segmentation fault when cloning SoapServer).</li>
  <li>Fix Soap leaking http_msg on error.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16256); ?> (Assertion failure in ext/soap/php_encoding.c:460).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16259); ?> (Soap segfault when classmap instantiation fails).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15918); ?> (Assertion failure in ext/spl/spl_fixedarray.c).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16053); ?> (Assertion failure in Zend/zend_hash.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15169); ?> (stack overflow when var serialization in ext/standard/var).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 15908); ?> and <?php githubissuel('php/php-src', 15026); ?> (leak / assertion failure in streams.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15980); ?> (Signed integer overflow in main/streams/streams.c).</li>
</ul></li>
<li>TSRM:
<ul>
  <li>Prevent closing of unrelated handles.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed minimal Windows version.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.12"><!-- {{{ 8.3.12 -->
<h3>Version 8.3.12</h3>
<b><?php release_date('26-Sep-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'p99j-rfp4-xqvq'); ?> (Bypass of CVE-2024-4577, Parameter Injection Vulnerability). (CVE-2024-8926)</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '94p6-54jq-9mwp'); ?> (cgi.force_redirect configuration is bypassable due to the environment variable collision). (CVE-2024-8927)</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15408); ?> (MSan false-positve on zend_max_execution_timer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15515); ?> (Configure error grep illegal option q).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15514); ?> (Configure error: genif.sh: syntax error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15565); ?> (--disable-ipv6 during compilation produces error EAI_SYSTEM not found).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15587); ?> (CRC32 API build error on arm 32-bit).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15330); ?> (Do not scan generator frames more than once).</li>
  <li>Fixed uninitialized lineno in constant AST of internal enums.</li>
</ul></li>
<li>Curl:
<ul>
  <li>FIxed bug <?php githubissuel('php/php-src', 15547); ?> (curl_multi_select overflow on timeout argument).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15551); ?> (Segmentation fault (access null pointer) in ext/dom/xml_common.h).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15654); ?> (Signed integer overflow in ext/dom/nodelist.c).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15752); ?> (Incorrect error message for finfo_file with an empty filename argument).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '865w-9rf3-2wh5'); ?> (Logs from childrens may be altered). (CVE-2024-9026)</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15432); ?> (Heap corruption when querying a vector).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15661); ?> (Access null pointer in Zend/Optimizer/zend_inference.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15658); ?> (Segmentation fault in Zend/zend_vm_execute.h).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '9pqp-7h25-4f32'); ?> (Erroneous parsing of multipart form data). (CVE-2024-8925)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15552); ?> (Signed integer overflow in ext/standard/scanf.c).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15628); ?> (php_stream_memory_get_buffer() not zero-terminated).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.11"><!-- {{{ 8.3.11 -->
<h3>Version 8.3.11</h3>
<b><?php release_date('29-Aug-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15020); ?> (Memory leak in Zend/Optimizer/escape_analysis.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15023); ?> (Memory leak in Zend/zend_ini.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13330); ?> (Append -Wno-implicit-fallthrough flag conditionally).</li>
  <li>Fix uninitialized memory in network.c.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15108); ?> (Segfault when destroying generator during shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15275); ?> (Crash during GC of suspended generator delegate).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed case when curl_error returns an empty string.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix UAF when removing doctype and using foreach iteration.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14286); ?> (ffi enum type (when enum has no name) make memory leak).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix crash when converting array data for array in shm in xxh3.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15087); ?> (IntlChar::foldCase()'s $option is not optional).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13817); ?> (Segmentation fault for enabled observers after pass 4).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13775); ?> (Memory leak possibly related to opcache SHM placement).</li>
</ul></li>
<li>Output:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15179); ?> (Segmentation fault (null pointer dereference) in ext/standard/url_scanner_ex.re).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fix bogus fallthrough path in firebird_handle_get_attribute().</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13199); ?> (EOF emits redundant prompt in phpdbg local console mode with libedit/readline).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15268); ?> (heap buffer overflow in phpdbg (zend_hash_num_elements() Zend/zend_hash.h)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15210); ?> use-after-free on watchpoint allocations.</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(55639); ?> (Digest autentication dont work).</li>
  <li>Fix SoapFault property destruction.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15252); ?> (SOAP XML broken since PHP 8.3.9 when using classmap constructor option).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix passing non-finite timeout values in stream functions.</li>
  <li>Fixed <?php githubissuel('php/php-src', 14780); ?> p(f)sockopen timeout overflow.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15028); ?> (Memory leak in ext/phar/stream.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15034); ?> (Integer overflow on stream_notification_callback byte_max parameter with files bigger than 2GB).</li>
  <li>Reverted fix for <?php githubissuel('php/php-src', 14930); ?> (Custom stream wrapper dir_readdir output truncated to 255 characters).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leaks in ext/tidy basedir restriction code.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.10"><!-- {{{ 8.3.10 -->
<h3>Version 8.3.10</h3>
<b><?php release_date('01-Aug-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13922); ?> (Fixed support for systems with sysconf(_SC_GETPW_R_SIZE_MAX) == -1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14626); ?> (Fix is_zend_ptr() for huge blocks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14590); ?> (Memory leak in FPM test gh13563-conf-bool-env.phpt.</li>
  <li>Fixed OSS-Fuzz #69765.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14741); ?> (Segmentation fault in Zend/zend_types.h).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14969); ?> (Use-after-free in property coercion with __toString()).</li>
</ul></li>
<li>Dom:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14702); ?> (DOMDocument::xinclude() crash).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14888); ?> (README.REDIST.BINS refers to non-existing LICENSE).</li>
</ul></li>
<li>Gd:
<ul>
  <li>ext/gd/tests/gh10614.phpt: skip if no PNG support.</li>
  <li>restored warning instead of fata error.</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14563); ?> (Build failure with libxml2 v2.13.0).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14550); ?> (No warning message when Zend DTrace is enabled that opcache.jit is implictly disabled).</li>
</ul></li>
<li>Output:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14808); ?> (Unexpected null pointer in Zend/zend_string.h with empty output buffer).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14712); ?> (Crash with PDORow access to null property).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14603); ?> (null string from zip entry).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14596); ?> (crashes with ASAN and ZEND_RC_DEBUG=1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14553); ?> (echo output trimmed at NULL byte).</li>
</ul></li>
<li>Shmop:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14537); ?> (shmop Windows 11 crashes the process).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14639); ?> (Member access within null pointer in ext/spl/spl_observer.c).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14775); ?> (range function overflow with negative step argument).</li>
  <li>Fix 32-bit wordwrap test failures.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14774); ?> (time_sleep_until overflow).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14930); ?> (Custom stream wrapper dir_readdir output truncated to 255 characters in PHP 8.3).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leak in tidy_repair_file().</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fix compatibility with libxml2 2.13.2.</li>
</ul></li>
<li>XML:
<ul>
  <li>Move away from to-be-deprecated libxml fields.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14834); ?> (Error installing PHP when --with-pear is used).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.9"><!-- {{{ 8.3.9 -->
<h3>Version 8.3.9</h3>
<b><?php release_date('04-Jul-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14315); ?> (Incompatible pointer type warnings).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12814); ?> (max_execution_time reached too early on MacOS 14 when running on Apple Silicon).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14387); ?> (Crash when stack walking in destructor of yielded from values during Generator-&gt;throw()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14456); ?> (Attempting to initialize class with private constructor calls destructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14510); ?> (memleak due to missing pthread_attr_destroy()-call).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14549); ?> (Incompatible function pointer type for fclose).</li>
</ul></li>
<li>BCMatch:
<ul>
  <li>Fixed bug (bcpowmod() with mod = -1 returns 1 when it must be 0).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14307); ?> (Test curl_basic_024 fails with curl 8.8.0).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14343); ?> (Memory leak in xml and dom).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14037); ?> (PHP-FPM ping.path and ping.response config vars are ignored in status pool).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix parameter numbers for imagecolorset().</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix reference handling in SpoofChecker.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Partially fix bug <?php githubissuel('php/php-src', 10599); ?> (Apache crash on Windows when using a self-referencing anonymous function inside a class with an active mysqli connection).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14267); ?> (opcache.jit=off does not allow enabling JIT at runtime).</li>
  <li>Fixed TLS access in JIT on FreeBSD/amd64.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11188); ?> (Error when building TSRM in ARM64).</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14367); ?> (incompatible SDWORD type with iODBC).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13681); ?> (segfault on watchpoint addition failure).</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(47925); ?> (PHPClient can't decompress response).</li>
  <li>Fix missing error restore code.</li>
  <li>Fix memory leak if calling SoapServer::setObject() twice.</li>
  <li>Fix memory leak if calling SoapServer::setClass() twice.</li>
  <li>Fix reading zlib ini settings in ext-soap.</li>
  <li>Fix memory leaks with string function name lookups.</li>
  <li><?php bugfix(69280); ?> (SoapClient classmap doesn't support fully qualified class name).</li>
  <li><?php bugfix(76232); ?> (SoapClient Cookie Header Semicolon).</li>
  <li>Fixed memory leaks when calling SoapFault::__construct() twice.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Fix memory leaks in ext/sodium on failure of some functions.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14290); ?> (Member access within null pointer in extension spl).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14483); ?> (Fixed off-by-one error in checking length of abstract namespace Unix sockets).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11078); ?> (PHP Fatal error triggers pointer being freed was not allocated and malloc: double free for ptr errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.8"><!-- {{{ 8.3.8 -->
<h3>Version 8.3.8</h3>
<b><?php release_date('06-Jun-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed buffer limit on Windows, replacing read call usage by _read.</li>
  <li>Fixed bug GHSA-3qgc-jrrr-25jv (Bypass of CVE-2012-1823, Argument Injection in PHP-CGI). (CVE-2024-4577)</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14189); ?> (PHP Interactive shell input state incorrectly handles quoted heredoc literals.).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13970); ?> (Incorrect validation of #[Attribute] flags type for non-compile-time expressions).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix crashes when entity declaration is removed while still having entity references.</li>
  <li>Fix references not handled correctly in C14N.</li>
  <li>Fix crash when calling childNodes next() when iterator is exhausted.</li>
  <li>Fix crash in ParentNode::append() when dealing with a fragment containing text nodes.</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug GHSA-w8qr-v226-r27w (Filter bypass in filter_var FILTER_VALIDATE_URL). (CVE-2024-5458)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 14175); ?> (Show decimal number instead of scientific notation in systemd status).</li>
</ul></li>
<li>Hash:
<ul>
  <li>ext/hash: Swap the checking order of `__has_builtin` and `__GNUC__` (Saki Takamachi)</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build regression on systems without C++17 compilers.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 14255); ?> (mysqli_fetch_assoc reports error from nested query).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14109); ?> (Fix accidental persisting of internal class constant in shm).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>The openssl_private_decrypt function in PHP, when using PKCS1 padding (OPENSSL_PKCS1_PADDING, which is the default), is vulnerable to the Marvin Attack unless it is used with an OpenSSL version that includes the changes from this pull request: https://github.com/openssl/openssl/pull/13817 (rsa_pkcs1_implicit_rejection). These changes are part of OpenSSL 3.2 and have also been backported to stable versions of various Linux distributions, as well as to the PHP builds provided for Windows since the previous release. All distributors and builders should ensure that this version is used to prevent PHP from being vulnerable.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug GHSA-9fcc-425m-g385 (Bypass of CVE-2024-1874). (CVE-2024-5585)</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14124); ?> (Segmentation fault with XML extension under certain memory limit).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14183); ?> (XMLReader::open() can't be overridden).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.7"><!-- {{{ 8.3.7 -->
<h3>Version 8.3.7</h3>
<b><?php release_date('09-May-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed zend_call_stack build with Linux/uclibc-ng without thread support.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13772); ?> (Invalid execute_data-&gt;opline pointers in observer fcall handlers when JIT is enabled).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13931); ?> (Applying zero offset to null pointer in Zend/zend_opcode.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13942); ?> (Align the behavior of zend-max-execution-timers with other timeout implementations).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14003); ?> (Broken cleanup of unfinished calls with callable convert parameters).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14013); ?> (Erroneous dnl appended in configure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10232); ?> (If autoloading occurs during constant resolution filename and lineno are identified incorrectly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13727); ?> (Missing void keyword).</li>
</ul></li>
<li>Fibers:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13903); ?> (ASAN false positive underflow when executing copy()).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13795); ?> (Test failing in ext/fileinfo/tests/bug78987.phpt on big-endian PPC).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13563); ?> (Setting bool values via env in FPM config fails).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build for icu 74 and onwards.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix shift out of bounds on 32-bit non-fast-path platforms.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13433); ?> (Segmentation Fault in zend_class_init_statics when using opcache.preload).</li>
  <li>Fixed incorrect assumptions across compilation units for static calls.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10495); ?> (feof on OpenSSL stream hangs indefinitely).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13984); ?> (Buffer size is now checked before memcmp).</li>
  <li>Fix <?php githubissuel('php/php-src', 13998); ?> (Manage refcount of agg_context-&gt;val correctly).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13836); ?> (Renaming a file in a Phar to an already existing filename causes a NULL pointer dereference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13833); ?> (Applying zero offset to null pointer in zend_hash.c).</li>
  <li>Fix potential NULL pointer dereference before calling EVP_SignInit.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13827); ?> (Null pointer access of type 'zval' in phpdbg_frame).</li>
</ul></li>
<li>Posix:
<ul>
  <li>Fix usage of reentrant functions in ext/posix.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13856); ?> (Member access within null pointer of type 'ps_files' in ext/session/mod_files.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13891); ?> (memleak and segfault when using ini_set with session.trans_sid_hosts).</li>
  <li>Fixed buffer _read/_write size limit on windows for the file mode.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed file_get_contents() on Windows fails with "errno=22 Invalid argument".</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13264); ?> (Part 1 - Memory leak on stream filter failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13860); ?> (Incorrect PHP_STREAM_OPTION_CHECK_LIVENESS case in ext/openssl/xp_ssl.c - causing use of dead socket).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11678); ?> (Build fails on musl 1.2.4 - lfs64).</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fix gcc-14 Wcalloc-transposed-args warnings.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.6"><!-- {{{ 8.3.6 -->
<h3>Version 8.3.6</h3>
<b><?php release_date('11-Apr-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 13569); ?> (GC buffer unnecessarily grows up to GC_MAX_BUF_SIZE when scanning WeakMaps).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13612); ?> (Corrupted memory in destructor with weak references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13446); ?> (Restore exception handler after it finishes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13784); ?> (AX_GCC_FUNC_ATTRIBUTE failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13670); ?> (GC does not scale well with a lot of objects created in destructor).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Add some missing ZPP checks.</li>
  <li>Fix potential memory leak in XPath evaluation results.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 11086); ?> (FPM: config test runs twice in daemonised mode).</li>
  <li>Fix incorrect check in fpm_shm_free().</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12019); ?> (add GDLIB_CFLAGS in feature tests).</li>
</ul></li>
<li>Gettext:
<ul>
  <li>Fixed sigabrt raised with dcgettext/dcngettext calls with gettext 0.22.5 with category set to LC_ALL.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13452); ?> (Fixed handshake response [mysqlnd]).</li>
  <li>Fix incorrect charset length in check_mb_eucjpms().</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 13508); ?> (JITed QM_ASSIGN may be optimized out when op1 is null).</li>
  <li>Fixed <?php githubissuel('php/php-src', 13712); ?> (Segmentation fault for enabled observers when calling trait method of internal trait when opcache is loaded).</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13544); ?> (Pre-PHP 8.2 compatibility for mt_srand with unknown modes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13690); ?> (Global Mt19937 is not properly reset in-between requests when MT_RAND_PHP is used).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13680); ?> (Segfault with session_decode and compilation error).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13685); ?> (Unexpected null pointer in zend_string.h).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11808); ?> (Live filesystem modified by tests).</li>
  <li>Fixed <?php githubissuel('php/php-src', 13402); ?> (Added validation of `\n` in $additional_headers of mail()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13203); ?> (file_put_contents fail on strings over 4GB on Windows).</li>
  <li>Fixed bug GHSA-pc52-254m-w9w7 (Command injection via array-ish $command parameter of proc_open). (CVE-2024-1874)</li>
  <li>Fixed bug GHSA-wpj3-hf5j-x4v4 (__Host-/__Secure- cookie bypass due to partial CVE-2022-31629 fix). (CVE-2024-2756)</li>
  <li>Fixed bug GHSA-h746-cjrr-wfmr (password_verify can erroneously return true, opening ATO risk). (CVE-2024-3096)</li>
  <li>Fixed bug GHSA-fjp9-9hwx-59fq (mb_encode_mimeheader runs endlessly for some inputs). (CVE-2024-2757)</li>
  <li>Fix bug <?php githubissuel('php/php-src', 13932); ?> (Attempt to fix mbstring on windows build) (msvc).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.4"><!-- {{{ 8.3.4 -->
<h3>Version 8.3.4</h3>
<b><?php release_date('14-Mar-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fix ZTS persistent resource crashes on shutdown.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix failing tests due to string changes in libcurl 8.6.0.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix unlikely memory leak in case of namespace removal with extremely deep trees.</li>
  <li>Fix reference access in dimensions for DOMNodeList and DOMNodeMap.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13344); ?> (finfo::buffer(): Failed identify data 0:(null), backport).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(75712); ?> (getenv in php-fpm should not read $_ENV, $_SERVER).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12019); ?> (detection of image formats in system gd library).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11950); ?> ([mysqlnd] Fixed not to set CR_MALFORMED_PACKET to error if CR_SERVER_GONE_ERROR is already set).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix various PDORow bugs.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13354); ?> (pg_execute/pg_send_query_params/pg_send_execute with null value passed by reference).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13531); ?> (Unable to resize SplfixedArray after being unserialized in PHP 8.2.15).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13279); ?> (Instable array during in-place modification in uksort).</li>
  <li>Fixed array key as hash to string (case insensitive) comparison typo for the second operand buffer size (albeit unused for now).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13517); ?> (Multiple test failures when building with --with-expat).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.3"><!-- {{{ 8.3.3 -->
<h3>Version 8.3.3</h3>
<b><?php release_date('15-Feb-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed timer leak in zend-max-execution-timers builds.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12349); ?> (linking failure on ARM with mold).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13097); ?> (Anonymous class reference in trigger_error / thrown Exception).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13177); ?> (PHP 8.3.2: final private constructor not allowed when used in trait).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13215); ?> (GCC 14 build failure).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix missing error check in curl_multi_init().</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12996); ?> (Incorrect SCRIPT_NAME with Apache ProxyPassMatch when plus in path).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10344); ?> (imagettfbbox(): Could not find/open font UNC path).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10614); ?> (imagerotate will turn the picture all black, when rotated 90).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix crashes with entity references and predefined entities.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12107); ?> (When running a stored procedure (that returns a result set) twice, PHP crashes).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13145); ?> (strtok() is not comptime).</li>
  <li>Fixed type inference of range().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13232); ?> (Segmentation fault will be reported when JIT is off but JIT_debug is still on).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed LibreSSL undefined reference when OPENSSL_NO_ENGINE not set. (David Carlier).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13119); ?> (Changed to convert float and double values ​​into strings using `H` format).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71465); ?> (PHAR doesn't know about litespeed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13037); ?> (PharData incorrectly extracts zip file).</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13138); ?> (Randomizer::pickArrayKeys() does not detect broken engines).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12504); ?> (Corrupted session written when there's a fatal error in autoloader).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13094); ?> (range(9.9, '0') causes segmentation fault).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13071); ?> (Copying large files using mmap-able source streams may exhaust available memory and fail).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.2"><!-- {{{ 8.3.2 -->
<h3>Version 8.3.2</h3>
<b><?php release_date('18-Jan-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12953); ?> (false positive SSA integrity verification failed when loading composer classmaps with more than 11k elements).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12999); ?> (zend_strnlen build when strnlen is unsupported).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12966); ?> (missing cross-compiling 3rd argument so Autoconf doesn't emit warnings).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12854); ?> (8.3 - as final trait-used method does not correctly report visibility in Reflection).</li>
</ul></li>
<li>Cli:
<ul>
  <li>Fix incorrect timeout in built-in web server when using router script and max_input_time.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12870); ?> (Creating an xmlns attribute results in a DOMException).</li>
  <li>Fix crash when toggleAttribute() is used without a document.</li>
  <li>Fix crash in adoptNode with attribute references.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13012); ?> (DOMNode::isEqualNode() is incorrect when attribute order is different).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9698); ?> (stream_wrapper_register crashes with FFI\CData).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12905); ?> (FFI::new interacts badly with observers).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 12943); ?> (IntlDateFormatter::__construct accepts 'C' as valid locale).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12936); ?> (hash() function hangs endlessly if using sha512 on strings &gt;= 4GiB).</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fix crash on Apache shutdown with persistent connections.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed oss-fuzz #64727 (JIT undefined array key warning may overwrite DIM with NULL when DIM is the same var as result).</li>
  <li>Added workaround for SELinux mprotect execheap issue. See https://bugzilla.kernel.org/show_bug.cgi?id=218258.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12987); ?> (openssl_csr_sign might leak new cert on error).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 12969); ?> (Fixed PDO::getAttribute() to get PDO::ATTR_STRINGIFY_FETCHES).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12767); ?> (Unable to turn on autocommit mode with setAttribute()).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed auto_reset_persistent handling and allow_persistent type.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12974); ?> (Apache crashes on shutdown when using pg_pconnect()).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77432); ?> (Segmentation fault on including phar file).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12962); ?> (Double free of init_file in phpdbg_prompt.c).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fix getting the address of an uninitialized property of a SimpleXMLElement resulting in a crash.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12929); ?> (SimpleXMLElement with stream_wrapper_register can segfault).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12980); ?> (tidynode.props.attribute is missing "Boolean Attributes" and empty attributes).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.1"><!-- {{{ 8.3.1 -->
<h3>Version 8.3.1</h3>
<b><?php release_date('21-Dec-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12758); ?> / <?php githubissuel('php/php-src', 12768); ?> (Invalid opline in OOM handlers within ZEND_FUNC_GET_ARGS and ZEND_BIND_STATIC).</li>
  <li>Fix various missing NULL checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12835); ?> (Leak of call-&gt;extra_named_params on internal __call).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12826); ?> (Weird pointers issue in nested loops).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12705); ?> (Segmentation fault in fpm_status_export_to_zval).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9348); ?> (FTP &amp; SSL session reuse).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed test failures for libxml2 2.12.0.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Avoid using uninitialised struct.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12791); ?> (Possible dereference of NULL in MySQLnd debug code).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed JIT bug (Function JIT emits "Uninitialized string offset" warning at the same time as invalid offset Error).</li>
  <li>Fixed JIT bug (JIT emits "Attempt to assign property of non-object" warning at the same time as Error is being thrown).</li>
</ul></li>
<li>PDO PGSQL:
<ul>
  <li>Fixed the default value of $fetchMode in PDO::pgsqlGetNotify() (kocsismate)</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12838); ?> ([SOAP] Temporary WSDL cache files not being deleted).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 12745); ?> (http_build_query() default null argument for $arg_separator is implicitly coerced to string).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.3.0"><!-- {{{ 8.3.0 -->
<h3>Version 8.3.0</h3>
<b><?php release_date('23-Nov-2023'); ?></b>
<ul><li>Bcmath:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 11761); ?> (removing trailing zeros from numbers) (jorgsowa)</li>
</ul></li>
<li>CLI:
<ul>
  <li>Added pdeathsig to builtin server to terminate workers when the master process is killed.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11104); ?> (STDIN/STDOUT/STDERR is not available for CLI without a script).</li>
  <li>Implement <?php githubissuel('php/php-src', 10024); ?> (support linting multiple files at once using php -l).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11388); ?> (Allow "final" modifier when importing a method from a trait).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11406); ?> (segfault with unpacking and magic method closure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9388); ?> (Improve unset property and __get type incompatibility error message).</li>
  <li>SA_ONSTACK is now set for signal handlers to be friendlier to other in-process code such as Go's cgo.</li>
  <li>SA_ONSTACK is now set when signals are disabled.</li>
  <li>Fix <?php githubissuel('php/php-src', 9649); ?>: Signal handlers now do a no-op instead of crashing when executed on threads not managed by TSRM.</li>
  <li>Added shadow stack support for fibers.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 9965); ?> (Fix accidental caching of default arguments with side effects).</li>
  <li>Implement <?php githubissuel('php/php-src', 10217); ?> (Use strlen() for determining the class_name length).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 8821); ?> (Improve line numbers for errors in constant expressions).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10083); ?> (Allow comments between &amp; and parameter).</li>
  <li>Zend Max Execution Timers is now enabled by default for ZTS builds on Linux.</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10469); ?> (Disallow .. in open_basedir paths set at runtime).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10168); ?>, <?php githubissuel('php/php-src', 10582); ?> (Various segfaults with destructors and VM return values).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10935); ?> (Use of trait doesn't redeclare static property if class has inherited it from its parent).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 11154); ?> (Negative indices on empty array don't affect next chosen index).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 8846); ?> (Implement delayed early binding for classes without parents).</li>
  <li>Fix bug #79836 (Segfault in concat_function).</li>
  <li>Fix bug #81705 (type confusion/UAF on set_error_handler with concat operation).</li>
  <li>Fix <?php githubissuel('php/php-src', 11348); ?> (Closure created from magic method does not accept named arguments).</li>
  <li>Fix <?php githubissuel('php/php-src', 11388); ?> (Allow "final" modifier when importing a method from a trait).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11406); ?> (segfault with unpacking and magic method closure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11507); ?> (String concatenation performance regression in 8.3).</li>
  <li>Fixed <?php githubissuel('php/php-src', 11488); ?> (Missing "Optional parameter before required" deprecation on union null type).</li>
  <li>Implement the #[\Override] attribute RFC.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11601); ?> (Incorrect handling of unwind and graceful exit exceptions).</li>
  <li>Added zend_call_stack_get implementation for OpenBSD.</li>
  <li>Add stack limit check in zend_eval_const_expr().</li>
  <li>Expose time spent collecting cycles in gc_status().</li>
  <li>Remove WeakMap entries whose key is only reachable through the entry value.</li>
  <li>Resolve open_basedir paths on INI update.</li>
  <li>Fixed oss-fuzz #60741 (Leak in open_basedir).</li>
  <li>Fixed segfault during freeing of some incompletely initialized objects due to OOM error (PDO, SPL, XSL).</li>
  <li>Introduced Zend guard recursion protection to fix __debugInfo issue.</li>
  <li>Fixed oss-fuzz #61712 (assertion failure with error handler during binary op).</li>
  <li>Fixed <?php githubissuel('php/php-src', 11847); ?> (DTrace enabled build is broken).</li>
  <li>Fixed OSS Fuzz #61865 (Undef variable in ++/-- for declared property that is unset in error handler).</li>
  <li>Fixed warning emitted when checking if a user stream is castable.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12123); ?> (Compile error on MacOS with C++ extension when using ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12189); ?> (#[Override] attribute in trait does not check for parent class implementations).</li>
  <li>Fixed OSS Fuzz #62294 (Unsetting variable after ++/-- on string variable warning).</li>
  <li>Fixed buffer underflow when compiling memoized expression.</li>
  <li>Fixed oss-fuzz #63802 (OP1 leak in error path of post inc/dec).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Added Curl options and constants up to (including) version 7.87.</li>
</ul></li>
<li>Date:
<ul>
  <li>Implement More Appropriate Date/Time Exceptions RFC.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 8388); ?> (DOMAttr unescapes character reference).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 11308); ?> (getElementsByTagName() is O(N^2)).</li>
  <li>Fix #79700 (wrong use of libxml oldNs leads to performance problem).</li>
  <li>Fix #77894 (DOMNode::C14N() very slow on generated DOMDocuments even after normalisation).</li>
  <li>Revert changes to DOMAttr::$value and DOMAttr::$nodeValue expansion.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11500); ?> (Namespace reuse in createElementNS() generates wrong output).</li>
  <li>Implemented DOMDocument::adoptNode(). Previously this always threw a "not yet implemented" exception.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 9628); ?> (Implicitly removing nodes from \DOMDocument breaks existing references).</li>
  <li>Added DOMNode::contains() and DOMNameSpaceNode::contains().</li>
  <li>Added DOMElement::getAttributeNames().</li>
  <li>Added DOMNode::getRootNode().</li>
  <li>Added DOMElement::className and DOMElement::id.</li>
  <li>Added DOMParentNode::replaceChildren().</li>
  <li>Added DOMNode::isConnected and DOMNameSpaceNode::isConnected.</li>
  <li>Added DOMNode::parentElement and DOMNameSpaceNode::parentElement.</li>
  <li>Added DOMNode::isEqualNode().</li>
  <li>Added DOMElement::insertAdjacentElement() and DOMElement::insertAdjacentText().</li>
  <li>Added DOMElement::toggleAttribute().</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11792); ?> (LIBXML_NOXMLDECL is not implemented or broken).</li>
  <li>adoptNode now respects the strict error checking property.</li>
  <li>Align DOMChildNode parent checks with spec.</li>
  <li><?php bugfix(80927); ?> (Removing documentElement after creating attribute node: possible use-after-free).</li>
  <li>Fix various namespace prefix conflict resolution bugs.</li>
  <li>Fix calling createAttributeNS() without prefix causing the default namespace of the element to change.</li>
  <li>Fixed <?php githubissuel('php/php-src', 11952); ?> (Confusing warning when blocking entity loading via libxml_set_external_entity_loader).</li>
  <li>Fix broken cache invalidation with deallocated and reallocated document node.</li>
  <li>Fix compile error when php_libxml.h header is included in C++.</li>
  <li><?php bugfix(47531); ?> (No way of removing redundant xmlns: declarations).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Removed unneeded codepaths in exif_process_TIFF_in_JPEG().</li>
</ul></li>
<li>FFI:
<ul>
  <li>Implement <?php githubissuel('php/php-src', 11934); ?> (Allow to pass CData into struct and/or union fields).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Upgrade bundled libmagic to 5.43.</li>
  <li>Fix <?php githubissuel('php/php-src', 11408); ?> (Unable to build PHP 8.3.0 alpha 1 / fileinfo extension).</li>
</ul></li>
<li>FPM:
<ul>
  <li>The status.listen shared pool now uses the same php_values (including expose_php) and php_admin_value as the pool it is shared with.</li>
  <li>Added warning to log when fpm socket was not registered on the expected path.</li>
  <li><?php bugfix(76067); ?> (system() function call leaks php-fpm listening sockets).</li>
  <li>Fixed <?php githubissuel('php/php-src', 12077); ?> (PHP 8.3.0RC1 borked socket-close-on-exec.phpt).</li>
</ul></li>
<li>GD:
<ul>
  <li>Removed imagerotate "ignore_transparent" argument since it has no effect.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Added pattern format error infos for numfmt_set_pattern.</li>
  <li>Added MIXED_NUMBERS and HIDDEN_OVERLAY constants for the Spoofchecker's class.</li>
  <li>Updated datefmt_set_timezone/IntlDateformatter::setTimezone returns type. (David Carlier).</li>
  <li>Updated IntlBreakInterator::setText return type.</li>
  <li>Updated IntlChar::enumCharNames return type.</li>
  <li>Removed the BC break on IntlDateFormatter::construct which threw an exception with an invalid locale.</li>
</ul></li>
<li>JSON:
<ul>
  <li>Added json_validate().</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Deprecate calling ldap_connect() with separate hostname and port.</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fix compile error with -Werror=incompatible-function-pointer-types and old libxml2.</li>
</ul></li>
<li>MBString:
<ul>
  <li>mb_detect_encoding is better able to identify the correct encoding for Turkish text.</li>
  <li>mb_detect_encoding's "non-strict" mode now behaves as described in the documentation. Previously, it would return false if the same byte (for example, the first byte) of the input string was invalid in all candidate encodings. More generally, it would eliminate candidate encodings from consideration when an invalid byte was seen, and if the same input byte eliminated all remaining encodings still under consideration, it would return false. On the other hand, if all candidate encodings but one were eliminated from consideration, it would return the last remaining one without regard for how many encoding errors might be encountered later in the string. This is different from the behavior described in the documentation, which says: "If strict is set to false, the closest matching encoding will be returned." (Alex Dowad)</li>
  <li>mb_strtolower, mb_strtotitle, and mb_convert_case implement conditional casing rules for the Greek letter sigma. For mb_convert_case, conditional casing only applies to MB_CASE_LOWER and MB_CASE_TITLE modes, not to MB_CASE_LOWER_SIMPLE and MB_CASE_TITLE_SIMPLE.</li>
  <li>mb_detect_encoding is better able to identify UTF-8 and UTF-16 strings with a byte-order mark.</li>
  <li>mb_decode_mimeheader interprets underscores in QPrint-encoded MIME encoded words as required by RFC 2047; they are converted to spaces. Underscores must be encoded as "=5F" in such MIME encoded words.</li>
  <li>mb_encode_mimeheader no longer drops NUL (zero) bytes when QPrint-encoding the input string. This previously caused strings in certain text encodings, especially UTF-16 and UTF-32, to be corrupted by mb_encode_mimeheader.</li>
  <li>Implement mb_str_pad() RFC.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11514); ?> (PHP 8.3 build fails with --enable-mbstring enabled).</li>
  <li>Fix use-after-free of mb_list_encodings() return value.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11992); ?> (utf_encodings.phpt fails on Windows 32-bit).</li>
</ul></li>
<li>mysqli:
<ul>
  <li>mysqli_fetch_object raises a ValueError instead of an Exception.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added start, restart and force restart time to opcache's phpinfo section.</li>
  <li>Fix <?php githubissuel('php/php-src', 9139); ?>: Allow FFI in opcache.preload when opcache.preload_user=root.</li>
  <li>Made opcache.preload_user always optional in the cli and phpdbg SAPIs.</li>
  <li>Allows W/X bits on page creation on FreeBSD despite system settings.</li>
  <li>Added memfd api usage, on Linux, for zend_shared_alloc_create_lock() to create an abstract anonymous file for the opcache's lock.</li>
  <li>Avoid resetting JIT counter handlers from multiple processes/threads.</li>
  <li>Fixed COPY_TMP type inference for references.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Added OPENSSL_CMS_OLDMIMETYPE and PKCS7_NOOLDMIMETYPE contants to switch between mime content types.</li>
  <li>Fixed <?php githubissuel('php/php-src', 11054); ?>: Reset OpenSSL errors when using a PEM public key.</li>
  <li>Added support for additional EC parameters in openssl_pkey_new.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>SA_ONSTACK is now set for pcntl_signal.</li>
  <li>Added SIGINFO constant.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Update bundled libpcre2 to 10.42.</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>pg_fetch_object raises a ValueError instead of an Exception.</li>
  <li>pg_cancel use thread safe PQcancel api instead.</li>
  <li>pg_trace new PGSQL_TRACE_SUPPRESS_TIMESTAMPS/PGSQL_TRACE_REGRESS_MODE contants support.</li>
  <li>pg_set_error_verbosity adding PGSQL_ERRORS_STATE constant.</li>
  <li>pg_convert/pg_insert E_WARNING on type errors had been converted to ValueError/TypeError exceptions.</li>
  <li>Added pg_set_error_context_visibility to set the context's visibility within the error messages.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fix memory leak in phar_rename_archive().</li>
</ul></li>
<li>POSIX:
<ul>
  <li>Added posix_sysconf.</li>
  <li>Added posix_pathconf.</li>
  <li>Added posix_fpathconf.</li>
  <li>Fixed zend_parse_arg_long's bool pointer argument assignment.</li>
  <li>Added posix_eaccess.</li>
</ul></li>
<li>Random:
<ul>
  <li>Added Randomizer::getBytesFromString().</li>
  <li>Added Randomizer::nextFloat(), ::getFloat(), and IntervalBoundary.</li>
  <li>Enable getrandom() for NetBSD (from 10.x).</li>
  <li>Deprecate MT_RAND_PHP.</li>
  <li>Fix Randomizer::getFloat() returning incorrect results under certain circumstances.</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 9470); ?> (ReflectionMethod constructor should not find private parent method).</li>
  <li>Fix <?php githubissuel('php/php-src', 10259); ?> (ReflectionClass::getStaticProperties doesn't need null return type).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 11141); ?> (Could not open input file: should be sent to stderr).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11529); ?> (Crash after dealing with an Apache request).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12192); ?> (SimpleXML infinite loop when getName() is called within foreach).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12208); ?> (SimpleXML infinite loop when a cast is used inside a foreach).</li>
  <li><?php bugfix(55098); ?> (SimpleXML iteration produces infinite loop).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Added SO_ATTACH_REUSEPORT_CBPF socket option, to give tighter control over socket binding for a cpu core.</li>
  <li>Added SKF_AD_QUEUE for cbpf filters.</li>
  <li>Added socket_atmark if send/recv needs using MSG_OOB.</li>
  <li>Added TCP_QUICKACK constant, to give tigher control over ACK delays.</li>
  <li>Added DONTFRAGMENT support for path MTU discovery purpose.</li>
  <li>Added AF_DIVERT for raw socket for divert ports.</li>
  <li>Added SOL_UPDLITE, UDPLITE_RECV_CSCOV and UDPLITE_SEND_CSCOV for updlite protocol support.</li>
  <li>Added SO_RERROR, SO_ZEROIZE and SO_SPLICE netbsd and openbsd constants.</li>
  <li>Added TCP_REPAIR for quietly close a connection.</li>
  <li>Added SO_REUSEPORT_LB freebsd constant.</li>
  <li>Added IP_BIND_ADDRESS_NO_PORT.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 11573); ?> (RecursiveDirectoryIterator::hasChildren is slow).</li>
</ul></li>
<li>Standard:
<ul>
  <li>E_NOTICEs emitted by unserialize() have been promoted to E_WARNING.</li>
  <li>unserialize() now emits a new E_WARNING if the input contains unconsumed bytes.</li>
  <li>Make array_pad's $length warning less confusing.</li>
  <li>E_WARNING emitted by strtok in the caase both arguments are not provided when starting tokenisation.</li>
  <li>password_hash() will now chain the original RandomException to the ValueError on salt generation failure.</li>
  <li>Fix <?php githubissuel('php/php-src', 10239); ?> (proc_close after proc_get_status always returns -1).</li>
  <li>Improve the warning message for unpack() in case not enough values were provided.</li>
  <li>Fix <?php githubissuel('php/php-src', 11010); ?> (parse_ini_string() now preserves formatting of unquoted strings starting with numbers when the INI_SCANNER_TYPED flag is specified).</li>
  <li>Fix <?php githubissuel('php/php-src', 10742); ?> (http_response_code emits no error when headers were already sent).</li>
  <li>Added support for rounding negative places in number_format().</li>
  <li>Prevent precision loss on formatting decimal integers in number_format().</li>
  <li>Added usage of posix_spawn for proc_open when supported by OS.</li>
  <li>Added $before_needle argument to strrchr().</li>
  <li>Fixed <?php githubissuel('php/php-src', 11982); ?> (str_getcsv returns null byte for unterminated enclosure).</li>
  <li>Fixed str_decrement() on "1".</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(51056); ?>: blocking fread() will block even if data is available.</li>
  <li>Added storing of the original path used to open xport stream.</li>
  <li>Implement <?php githubissuel('php/php-src', 8641); ?> (STREAM_NOTIFY_COMPLETED over HTTP never emitted).</li>
  <li>Fix bug <?php githubissuel('php/php-src', 10406); ?> (fgets on a redis socket connection fails on PHP 8.3).</li>
  <li>Implemented <?php githubissuel('php/php-src', 11242); ?> (_php_stream_copy_to_mem: Allow specifying a maximum length without allocating a buffer of that size).</li>
  <li><?php bugfix(52335); ?> (fseek() on memory stream behavior different than file).</li>
  <li><?php bugfix(76857); ?> (Can read "non-existant" files).</li>
</ul></li>
<li>XSLTProcessor:
<ul>
  <li><?php bugfix(69168); ?> (DomNode::getNodePath() returns invalid path).</li>
</ul></li>
<li>ZIP:
<ul>
  <li>zip extension version 1.22.0 for libzip 1.10.0.</li>
  <li>add new error macros (ER_DATA_LENGTH and ER_NOT_ALLOWED).</li>
  <li>add new archive global flags (ER_AFL_*).</li>
  <li>add ZipArchive::setArchiveFlag and ZipArchive::getArchiveFlag methods.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<a id="PHP_8_2"></a>

<section class="version" id="8.2.30"><!-- {{{ 8.2.30 -->
<h3>Version 8.2.30</h3>
<b><?php release_date('18-Dec-2025'); ?></b>
<ul><li>Curl:
<ul>
  <li>Fix curl build and test failures with version 8.16.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Reset global pointers to prevent use-after-free in zend_jit_status().</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '8xr5-qppj-gvwj'); ?> (PDO quoting result null deref). (CVE-2025-14180)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'www2-q4fc-65wf'); ?> (Null byte termination in dns_get_record()).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'h96m-rvf9-jgm2'); ?> (Heap buffer overflow in array_merge()). (CVE-2025-14178)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '3237-qqm7-mfv7'); ?> (Information Leak of Memory in getimagesize). (CVE-2025-14177)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.29"><!-- {{{ 8.2.29 -->
<h3>Version 8.2.29</h3>
<b><?php release_date('03-Jul-2025'); ?></b>
<ul><li>PGSQL:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hrwm-9436-5mv3'); ?> (pgsql extension does not check for errors during escaping). (CVE-2025-1735)</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '453j-q27h-5p8x'); ?> (NULL Pointer Dereference in PHP SOAP Extension via Large XML Namespace Prefix). (CVE-2025-6491)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '3cr5-j632-f35r'); ?> (Null byte termination in hostnames). (CVE-2025-1220)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.28"><!-- {{{ 8.2.28 -->
<h3>Version 8.2.28</h3>
<b><?php release_date('13-Mar-2025'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 17211); ?> (observer segfault on function loaded with dl()).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'wg4p-4hqh-c3g9'); ?> (Reocurrence of #72714).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'p3x9-6h7p-cgfc'); ?> (libxml streams use wrong `content-type` header when requesting a redirected resource). (CVE-2025-1219)</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hgf5-96fm-v528'); ?> (Stream HTTP wrapper header check might omit basic auth header). (CVE-2025-1736)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '52jp-hrpf-2jff'); ?> (Stream HTTP wrapper truncate redirect location to 1024 bytes). (CVE-2025-1861)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'pcmh-g36c-qc44'); ?> (Streams HTTP wrapper does not fail for headers without colon). (CVE-2025-1734)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'v8xr-gpvj-cx9g'); ?> (Header parser of `http` stream wrapper does not handle folded headers). (CVE-2025-1217)</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed phpize for Windows 11 (24H2).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.27"><!-- {{{ 8.2.27 -->
<h3>Version 8.2.27</h3>
<b><?php release_date('19-Dec-2024'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed jdtogregorian overflow.</li>
  <li>Fixed cal_to_jd julian_days argument overflow.</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16991); ?> (Getting typeinfo of non DISPATCH variant segfaults).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fail early in *nix configuration build script.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16727); ?> (Opcache bad signal 139 crash in ZTS bookworm (frankenphp)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16799); ?> (Assertion failure at Zend/zend_vm_execute.h:7469).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16630); ?> (UAF in lexer with encoding translation and heredocs).</li>
  <li>Fix is_zend_ptr() huge block comparison.</li>
  <li>Fixed potential OOB read in zend_dirname() on Windows.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix various memory leaks in curl mime handling.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16432); ?> (PHP-FPM 8.2 SIGSEGV in fpm_get_status).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16776); ?> (imagecreatefromstring overflow).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Revert gmp_pow() overly restrictive overflow checks.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16711); ?>: Segfault in mhash().</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16770); ?> (Tracing JIT type mismatch when returning UNDEF).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16851); ?> (JIT_G(enabled) not set correctly on other threads).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16902); ?> (Set of opcache tests fail zts+aarch64).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Prevent unexpected array entry conversion when reading key.</li>
  <li>Fix various memory leaks related to openssl exports.</li>
  <li>Fix memory leak in php_openssl_pkey_from_zval().</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed memory leak of `setFetchMode()`.</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16695); ?> (phar:// tar parser and zero-length file header blocks).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15208); ?> (Segfault with breakpoint map and phpdbg_clear()).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16998); ?> (UBSAN warning in rfc1867).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16808); ?> (Segmentation fault in RecursiveIteratorIterator -&gt;current() with a xml element input).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16959); ?> (snmget modifies the object_id array).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16905); ?> (Internal iterator functions can't handle UNDEF properties).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed network connect poll interuption handling.</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16849); ?> (Error dialog causes process to hang).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.26"><!-- {{{ 8.2.26 -->
<h3>Version 8.2.26</h3>
<b><?php release_date('21-Nov-2024'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16373); ?> (Shebang is not skipped for router script in cli-server started through shebang).</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '4w77-75f9-2c8w'); ?> (Heap-Use-After-Free in sapi_read_post_data Processing in CLI SAPI Interface).</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed out of bound writes to SafeArray data.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16168); ?> (php 8.1 and earlier crash immediately when compiled with Xcode 16 clang on macOS 15).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16371); ?> (Assertion failure in Zend/zend_weakrefs.c:646).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16515); ?> (Incorrect propagation of ZEND_ACC_RETURN_REFERENCE for call trampoline).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16509); ?> (Incorrect line number in function redeclaration error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16508); ?> (Incorrect line number in inheritance errors of delayed early bound classes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16648); ?> (Use-after-free during array sorting).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16302); ?> (CurlMultiHandle holds a reference to CurlHandle if curl_multi_add_handle fails).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16454); ?> (Unhandled INF in date_sunset() with tiny $utcOffset).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16037); ?> (Assertion failure in ext/date/php_date.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14732); ?> (date_sun_info() fails for non-finite values).</li>
</ul></li>
<li>DBA:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16390); ?> (dba_open() can segfault for "pathless" streams).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16316); ?> (DOMXPath breaks when not initialized properly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16473); ?> (dom_import_simplexml stub is wrong).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16533); ?> (Segfault when adding attribute to parent that is not an element).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16535); ?> (UAF when using document as a child).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16593); ?> (Assertion failure in DOM-&gt;replaceChild).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16595); ?> (Another UAF in DOM -&gt; cloneNode).</li>
</ul></li>
<li>EXIF:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16409); ?> (Segfault in exif_thumbnail when not dealing with a real file).</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16397); ?> (Segmentation fault when comparing FFI object).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16523); ?> (FILTER_FLAG_HOSTNAME accepts ending hyphen).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16628); ?> (FPM logs are getting corrupted with this log statement).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16334); ?> (imageaffine overflow on matrix elements).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16427); ?> (Unchecked libavif return values).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16559); ?> (UBSan abort in ext/gd/libgd/gd_interpolation.c:1007).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Fixed floating point exception bug with gmp_pow when using large exposant values. (David Carlier).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16411); ?> (gmp_export() can cause overflow).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16501); ?> (gmp_random_bits() can cause overflow).</li>
  <li>Fixed gmp_pow() overflow bug with large base/exponents.</li>
  <li>Fixed segfaults and other issues related to operator overloading with GMP objects.</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'g665-fm4p-vhff'); ?> (OOB access in ldap_escape). (CVE-2024-8932)</li>
</ul></li>
<li>MBstring:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16361); ?> (mb_substr overflow on start/length arguments).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'h35g-vwh6-m678'); ?> (Leak partial content of the heap through heap buffer over-read). (CVE-2024-8929)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16357); ?> (openssl may modify member types of certificate arrays).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16433); ?> (Large values for openssl_csr_sign() $days overflow).</li>
  <li>Fix various memory leaks on error conditions in openssl_x509_parse().</li>
</ul></li>
<li>PDO DBLIB:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the dblib quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the firebird quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16450); ?> (PDO_ODBC can inject garbage into field values).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16406); ?> (Assertion failure in ext/phar/phar.c:2808).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16174); ?> (Empty string is an invalid expression for ev).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16601); ?> (Memory leak in Reflection constructors).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16385); ?> (Unexpected null returned by session_set_cookie_params).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16290); ?> (overflow on cookie_lifetime ini value).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16429); ?> (Segmentation fault access null pointer in SoapClient).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug with overflow socket_recvfrom $length argument.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16337); ?> (Use-after-free in SplHeap).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16464); ?> (Use-after-free in SplDoublyLinkedList::offsetSet()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16479); ?> (Use-after-free in SplObjectStorage::setInfo()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16478); ?> (Use-after-free in SplFixedArray::unset()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16588); ?> (UAF in Observer-&gt;serialize).</li>
  <li>Fix <?php githubissuel('php/php-src', 16477); ?> (Segmentation fault when calling __debugInfo() after failed SplFileObject::__constructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16589); ?> (UAF in SplDoublyLinked-&gt;serialize()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14687); ?> (segfault on SplObjectIterator instance).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16604); ?> (Memory leaks in SPL constructors).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16646); ?> (UAF in ArrayObject::unset() and ArrayObject::exchangeArray()).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16293); ?> (Failed assertion when throwing in assert() callback with bail enabled).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'c5f2-jwm7-mmq2'); ?> (Configuring a proxy in a stream context might allow for CRLF injection in URIs). (CVE-2024-11234)</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'r977-prxv-hc43'); ?> (Single byte overread with convert.quoted-printable-decode filter). (CVE-2024-11233)</li>
</ul></li>
<li>SysVMsg:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16592); ?> (msg_send() crashes when a type does not properly serialized).</li>
</ul></li>
<li>SysVShm:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16591); ?> (Assertion error in shm_put_var).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16292); ?> (Segmentation fault in ext/xmlreader/php_xmlreader.c).</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16326); ?> (Memory management is broken for bad dictionaries.) (cmb)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.25"><!-- {{{ 8.2.25 -->
<h3>Version 8.2.25</h3>
<b><?php release_date('24-Oct-2024'); ?></b>
<ul><li>Calendar:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 16240); ?>: jdtounix overflow on argument value.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16241); ?>: easter_days/easter_date overflow on year argument.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16263); ?>: jddayofweek overflow.</li>
  <li>Fixed <?php githubissuel('php/php-src', 16234); ?>: jewishtojd overflow.</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16137); ?>: duplicate http headers when set several times by the client.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15712); ?>: zend_strtod overflow with precision INI set on large value.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15905); ?> (Assertion failure for TRACK_VARS_SERVER).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15907); ?> (Failed assertion when promoting Serialize deprecation to exception).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15851); ?> (Segfault when printing backtrace during cleanup of nested generator frame).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15866); ?> (Core dumped in Zend/zend_generators.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16188); ?> (Assertion failure in Zend/zend_exceptions.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16233); ?> (Observer segfault when calling user function in internal function via trampoline).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15582); ?>: Crash when not calling parent constructor of DateTimeZone.</li>
  <li>Fixed regression where signs after the first one were ignored while parsing a signed integer, with the DateTimeInterface::modify() function.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16039); ?> (Segmentation fault (access null pointer) in ext/dom/parentnode/tree.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16151); ?> (Assertion failure in ext/dom/parentnode/tree.c).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16232); ?> (bitshift overflow on wbmp file content reading / fix backport from upstream).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12264); ?> (overflow/underflow on imagerotate degrees value) (David Carlier)</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16274); ?> (imagescale underflow on RBG channels / fix backport from upstream).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16032); ?> (Various NULL pointer dereferencements in ldap_modify_batch()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16101); ?> (Segfault in ldap_list(), ldap_read(), and ldap_search() when LDAPs array is not a list).</li>
  <li>Fix <?php githubissuel('php/php-src', 16132); ?> (php_ldap_do_modify() attempts to free pointer not allocated by ZMM.).</li>
  <li>Fix <?php githubissuel('php/php-src', 16136); ?> (Memory leak in php_ldap_do_modify() when entry is not a proper dictionary).</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16261); ?> (Reference invariant broken in mb_convert_variables()).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed stub for openssl_csr_new.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16189); ?> (underflow on offset argument).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16184); ?> (UBSan address overflowed in ext/pcre/php_pcre.c).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15901); ?> (phpdbg: Assertion failure on i funcs).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16181); ?> (phpdbg: exit in exception handler reports fatal error).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16187); ?> (Assertion failure in ext/reflection/php_reflection.c).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15395); ?> (php-fpm: zend_mm_heap corrupted with cgi-fcgi request).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15837); ?> (Segmentation fault in ext/simplexml/simplexml.c).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 16267); ?> (socket_strerror overflow on errno argument).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(62900); ?> (Wrong namespace on xsd import error message).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16237); ?> (Segmentation fault when cloning SoapServer).</li>
  <li>Fix Soap leaking http_msg on error.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16256); ?> (Assertion failure in ext/soap/php_encoding.c:460).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16259); ?> (Soap segfault when classmap instantiation fails).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15613); ?> (overflow on unpack call hex string repeater).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15937); ?> (overflow on stream timeout option value).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 16053); ?> (Assertion failure in Zend/zend_hash.c).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bugs <?php githubissuel('php/php-src', 15908); ?> and <?php githubissuel('php/php-src', 15026); ?> (leak / assertion failure in streams.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15980); ?> (Signed integer overflow in main/streams/streams.c).</li>
</ul></li>
<li>TSRM:
<ul>
  <li>Prevent closing of unrelated handles.</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15868); ?> (Assertion failure in xml_parse_into_struct after exception).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.24"><!-- {{{ 8.2.24 -->
<h3>Version 8.2.24</h3>
<b><?php release_date('26-Sep-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed bug GHSA-p99j-rfp4-xqvq (Bypass of CVE-2024-4577, Parameter Injection Vulnerability). (CVE-2024-8926)</li>
  <li>Fixed bug GHSA-94p6-54jq-9mwp (cgi.force_redirect configuration is bypassable due to the environment variable collision). (CVE-2024-8927)</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15408); ?> (MSan false-positve on zend_max_execution_timer).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15515); ?> (Configure error grep illegal option q).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15514); ?> (Configure error: genif.sh: syntax error).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15565); ?> (--disable-ipv6 during compilation produces error EAI_SYSTEM not found).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15587); ?> (CRC32 API build error on arm 32-bit).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15330); ?> (Do not scan generator frames more than once).</li>
  <li>Fixed uninitialized lineno in constant AST of internal enums.</li>
</ul></li>
<li>Curl:
<ul>
  <li>FIxed bug <?php githubissuel('php/php-src', 15547); ?> (curl_multi_select overflow on timeout argument).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15551); ?> (Segmentation fault (access null pointer) in ext/dom/xml_common.h).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15752); ?> (Incorrect error message for finfo_file with an empty filename argument).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug GHSA-865w-9rf3-2wh5 (Logs from childrens may be altered). (CVE-2024-9026)</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15432); ?> (Heap corruption when querying a vector).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15661); ?> (Access null pointer in Zend/Optimizer/zend_inference.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15658); ?> (Segmentation fault in Zend/zend_vm_execute.h).</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug GHSA-9pqp-7h25-4f32 (Erroneous parsing of multipart form data). (CVE-2024-8925)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(73182); ?> (PHP SOAPClient does not support stream context HTTP headers in array form).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15552); ?> (Signed integer overflow in ext/standard/scanf.c).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15628); ?> (php_stream_memory_get_buffer() not zero-terminated).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.23"><!-- {{{ 8.2.23 -->
<h3>Version 8.2.23</h3>
<b><?php release_date('29-Aug-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15020); ?> (Memory leak in Zend/Optimizer/escape_analysis.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15023); ?> (Memory leak in Zend/zend_ini.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13330); ?> (Append -Wno-implicit-fallthrough flag conditionally).</li>
  <li>Fix uninitialized memory in network.c.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15108); ?> (Segfault when destroying generator during shutdown).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15275); ?> (Crash during GC of suspended generator delegate).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed case when curl_error returns an empty string.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix UAF when removing doctype and using foreach iteration.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14286); ?> (ffi enum type (when enum has no name) make memory leak).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix crash when converting array data for array in shm in xxh3.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15087); ?> (IntlChar::foldCase()'s $option is not optional).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13817); ?> (Segmentation fault for enabled observers after pass 4).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13775); ?> (Memory leak possibly related to opcache SHM placement).</li>
</ul></li>
<li>Output:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15179); ?> (Segmentation fault (null pointer dereference) in ext/standard/url_scanner_ex.re).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fix bogus fallthrough path in firebird_handle_get_attribute().</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13199); ?> (EOF emits redundant prompt in phpdbg local console mode with libedit/readline).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15268); ?> (heap buffer overflow in phpdbg (zend_hash_num_elements() Zend/zend_hash.h)).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15210); ?> use-after-free on watchpoint allocations.</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(55639); ?> (Digest autentication dont work).</li>
  <li>Fix SoapFault property destruction.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15252); ?> (SOAP XML broken since PHP 8.3.9 when using classmap constructor option).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix passing non-finite timeout values in stream functions.</li>
  <li>Fixed <?php githubissuel('php/php-src', 14780); ?> p(f)sockopen timeout overflow.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 15028); ?> (Memory leak in ext/phar/stream.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 15034); ?> (Integer overflow on stream_notification_callback byte_max parameter with files bigger than 2GB).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leaks in ext/tidy basedir restriction code.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.22"><!-- {{{ 8.2.22 -->
<h3>Version 8.2.22</h3>
<b><?php release_date('01-Aug-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13922); ?> (Fixed support for systems with sysconf(_SC_GETPW_R_SIZE_MAX) == -1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14626); ?> (Fix is_zend_ptr() for huge blocks).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14590); ?> (Memory leak in FPM test gh13563-conf-bool-env.phpt.</li>
  <li>Fixed OSS-Fuzz #69765.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14741); ?> (Segmentation fault in Zend/zend_types.h).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14969); ?> (Use-after-free in property coercion with __toString()).</li>
</ul></li>
<li>Dom:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14702); ?> (DOMDocument::xinclude() crash).</li>
</ul></li>
<li>Gd:
<ul>
  <li>ext/gd/tests/gh10614.phpt: skip if no PNG support.</li>
  <li>restored warning instead of fata error.</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14563); ?> (Build failure with libxml2 v2.13.0).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14550); ?> (No warning message when Zend DTrace is enabled that opcache.jit is implictly disabled).</li>
</ul></li>
<li>Output:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14808); ?> (Unexpected null pointer in Zend/zend_string.h with empty output buffer).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14712); ?> (Crash with PDORow access to null property).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14603); ?> (null string from zip entry).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14596); ?> (crashes with ASAN and ZEND_RC_DEBUG=1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14553); ?> (echo output trimmed at NULL byte).</li>
</ul></li>
<li>Shmop:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14537); ?> (shmop Windows 11 crashes the process).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14638); ?> (null dereference after XML parsing failure).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14639); ?> (Member access within null pointer in ext/spl/spl_observer.c).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix 32-bit wordwrap test failures.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14774); ?> (time_sleep_until overflow).</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fix memory leak in tidy_repair_file().</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fix compatibility with libxml2 2.13.2.</li>
</ul></li>
<li>XML:
<ul>
  <li>Move away from to-be-deprecated libxml fields.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14834); ?> (Error installing PHP when --with-pear is used).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.21"><!-- {{{ 8.2.21 -->
<h3>Version 8.2.21</h3>
<b><?php release_date('04-Jul-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14315); ?> (Incompatible pointer type warnings).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12814); ?> (max_execution_time reached too early on MacOS 14 when running on Apple Silicon).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14387); ?> (Crash when stack walking in destructor of yielded from values during Generator-&gt;throw()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14456); ?> (Attempting to initialize class with private constructor calls destructor).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14549); ?> (Incompatible function pointer type for fclose).</li>
</ul></li>
<li>BCMatch:
<ul>
  <li>Fixed bug (bcpowmod() with mod = -1 returns 1 when it must be 0).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14307); ?> (Test curl_basic_024 fails with curl 8.8.0).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14343); ?> (Memory leak in xml and dom).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14037); ?> (PHP-FPM ping.path and ping.response config vars are ignored in status pool).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix parameter numbers for imagecolorset().</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix reference handling in SpoofChecker.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Partially fix bug <?php githubissuel('php/php-src', 10599); ?> (Apache crash on Windows when using a self-referencing anonymous function inside a class with an active mysqli connection).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14267); ?> (opcache.jit=off does not allow enabling JIT at runtime).</li>
  <li>Fixed TLS access in JIT on FreeBSD/amd64.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11188); ?> (Error when building TSRM in ARM64).</li>
</ul></li>
<li>PDO ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14367); ?> (incompatible SDWORD type with iODBC).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13681); ?> (segfault on watchpoint addition failure).</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(47925); ?> (PHPClient can't decompress response).</li>
  <li>Fix missing error restore code.</li>
  <li>Fix memory leak if calling SoapServer::setObject() twice.</li>
  <li>Fix memory leak if calling SoapServer::setClass() twice.</li>
  <li>Fix reading zlib ini settings in ext-soap.</li>
  <li>Fix memory leaks with string function name lookups.</li>
  <li><?php bugfix(69280); ?> (SoapClient classmap doesn't support fully qualified class name).</li>
  <li><?php bugfix(76232); ?> (SoapClient Cookie Header Semicolon).</li>
  <li>Fixed memory leaks when calling SoapFault::__construct() twice.</li>
</ul></li>
<li>Sodium:
<ul>
  <li>Fix memory leaks in ext/sodium on failure of some functions.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14290); ?> (Member access within null pointer in extension spl).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14483); ?> (Fixed off-by-one error in checking length of abstract namespace Unix sockets).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11078); ?> (PHP Fatal error triggers pointer being freed was not allocated and malloc: double free for ptr errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.20"><!-- {{{ 8.2.20 -->
<h3>Version 8.2.20</h3>
<b><?php release_date('06-Jun-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed buffer limit on Windows, replacing read call usage by _read.</li>
  <li>Fixed bug GHSA-3qgc-jrrr-25jv (Bypass of CVE-2012-1823, Argument Injection in PHP-CGI). (CVE-2024-4577)</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14189); ?> (PHP Interactive shell input state incorrectly handles quoted heredoc literals.).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13970); ?> (Incorrect validation of #[Attribute] flags type for non-compile-time expressions).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14140); ?> (Floating point bug in range operation on Apple Silicon hardware).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix crashes when entity declaration is removed while still having entity references.</li>
  <li>Fix references not handled correctly in C14N.</li>
  <li>Fix crash when calling childNodes next() when iterator is exhausted.</li>
  <li>Fix crash in ParentNode::append() when dealing with a fragment containing text nodes.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14215); ?> (Cannot use FFI::load on CRLF header file with apache2handler).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug GHSA-w8qr-v226-r27w (Filter bypass in filter_var FILTER_VALIDATE_URL). (CVE-2024-5458)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 14175); ?> (Show decimal number instead of scientific notation in systemd status).</li>
</ul></li>
<li>Hash:
<ul>
  <li>ext/hash: Swap the checking order of `__has_builtin` and `__GNUC__` (Saki Takamachi)</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build regression on systems without C++17 compilers.</li>
</ul></li>
<li>Ini:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14100); ?> (Corrected spelling mistake in php.ini files).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix bug <?php githubissuel('php/php-src', 14255); ?> (mysqli_fetch_assoc reports error from nested query).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14109); ?> (Fix accidental persisting of internal class constant in shm).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>The openssl_private_decrypt function in PHP, when using PKCS1 padding (OPENSSL_PKCS1_PADDING, which is the default), is vulnerable to the Marvin Attack unless it is used with an OpenSSL version that includes the changes from this pull request: https://github.com/openssl/openssl/pull/13817 (rsa_pkcs1_implicit_rejection). These changes are part of OpenSSL 3.2 and have also been backported to stable versions of various Linux distributions, as well as to the PHP builds provided for Windows since the previous release. All distributors and builders should ensure that this version is used to prevent PHP from being vulnerable.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug GHSA-9fcc-425m-g385 (Bypass of CVE-2024-1874). (CVE-2024-5585)</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14124); ?> (Segmentation fault with XML extension under certain memory limit).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 14183); ?> (XMLReader::open() can't be overridden).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.19"><!-- {{{ 8.2.19 -->
<h3>Version 8.2.19</h3>
<b><?php release_date('09-May-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13772); ?> (Invalid execute_data-&gt;opline pointers in observer fcall handlers when JIT is enabled).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13931); ?> (Applying zero offset to null pointer in Zend/zend_opcode.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13942); ?> (Align the behavior of zend-max-execution-timers with other timeout implementations).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14003); ?> (Broken cleanup of unfinished calls with callable convert parameters).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 14013); ?> (Erroneous dnl appended in configure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10232); ?> (If autoloading occurs during constant resolution filename and lineno are identified incorrectly).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13727); ?> (Missing void keyword).</li>
</ul></li>
<li>Fibers:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13903); ?> (ASAN false positive underflow when executing copy()).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13563); ?> (Setting bool values via env in FPM config fails).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed build for icu 74 and onwards.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix shift out of bounds on 32-bit non-fast-path platforms.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed incorrect assumptions across compilation units for static calls.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10495); ?> (feof on OpenSSL stream hangs indefinitely).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13984); ?> (Buffer size is now checked before memcmp).</li>
  <li>Fix <?php githubissuel('php/php-src', 13998); ?> (Manage refcount of agg_context-&gt;val correctly).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13836); ?> (Renaming a file in a Phar to an already existing filename causes a NULL pointer dereference).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13833); ?> (Applying zero offset to null pointer in zend_hash.c).</li>
  <li>Fix potential NULL pointer dereference before calling EVP_SignInit.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13827); ?> (Null pointer access of type 'zval' in phpdbg_frame).</li>
</ul></li>
<li>Posix:
<ul>
  <li>Fix usage of reentrant functions in ext/posix.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13856); ?> (Member access within null pointer of type 'ps_files' in ext/session/mod_files.c).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13891); ?> (memleak and segfault when using ini_set with session.trans_sid_hosts).</li>
  <li>Fixed buffer _read/_write size limit on windows for the file mode.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed file_get_contents() on Windows fails with "errno=22 Invalid argument".</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13264); ?> (Part 1 - Memory leak on stream filter failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13860); ?> (Incorrect PHP_STREAM_OPTION_CHECK_LIVENESS case in ext/openssl/xp_ssl.c - causing use of dead socket).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11678); ?> (Build fails on musl 1.2.4 - lfs64).</li>
</ul></li>
<li>Treewide:
<ul>
  <li>Fix gcc-14 Wcalloc-transposed-args warnings.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.18"><!-- {{{ 8.2.18 -->
<h3>Version 8.2.18</h3>
<b><?php release_date('11-Apr-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13612); ?> (Corrupted memory in destructor with weak references).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13784); ?> (AX_GCC_FUNC_ATTRIBUTE failure).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13670); ?> (GC does not scale well with a lot of objects created in destructor).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Add some missing ZPP checks.</li>
  <li>Fix potential memory leak in XPath evaluation results.</li>
  <li>Fix phpdoc for DOMDocument load methods.</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fix incorrect check in fpm_shm_free().</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12019); ?> (add GDLIB_CFLAGS in feature tests).</li>
</ul></li>
<li>Gettext:
<ul>
  <li>Fixed sigabrt raised with dcgettext/dcngettext calls with gettext 0.22.5 with category set to LC_ALL.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13452); ?> (Fixed handshake response [mysqlnd]).</li>
  <li>Fix incorrect charset length in check_mb_eucjpms().</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 13508); ?> (JITed QM_ASSIGN may be optimized out when op1 is null).</li>
  <li>Fixed <?php githubissuel('php/php-src', 13712); ?> (Segmentation fault for enabled observers when calling trait method of internal trait when opcache is loaded).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix various PDORow bugs.</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13544); ?> (Pre-PHP 8.2 compatibility for mt_srand with unknown modes).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13690); ?> (Global Mt19937 is not properly reset in-between requests when MT_RAND_PHP is used).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13680); ?> (Segfault with session_decode and compilation error).</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13604); ?> (socket_getsockname returns random characters in the end of the socket name).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13531); ?> (Unable to resize SplfixedArray after being unserialized in PHP 8.2.15).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13685); ?> (Unexpected null pointer in zend_string.h).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11808); ?> (Live filesystem modified by tests).</li>
  <li>Fixed <?php githubissuel('php/php-src', 13402); ?> (Added validation of `\n` in $additional_headers of mail()).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13203); ?> (file_put_contents fail on strings over 4GB on Windows).</li>
  <li>Fixed bug GHSA-pc52-254m-w9w7 (Command injection via array-ish $command parameter of proc_open). (CVE-2024-1874)</li>
  <li>Fixed bug GHSA-wpj3-hf5j-x4v4 (__Host-/__Secure- cookie bypass due to partial CVE-2022-31629 fix). (CVE-2024-2756)</li>
  <li>Fixed bug GHSA-h746-cjrr-wfmr (password_verify can erroneously return true, opening ATO risk). (CVE-2024-3096)</li>
</ul></li>
<li>XML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13517); ?> (Multiple test failures when building with --with-expat).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.17"><!-- {{{ 8.2.17 -->
<h3>Version 8.2.17</h3>
<b><?php release_date('14-Mar-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fix ZTS persistent resource crashes on shutdown.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix failing tests due to string changes in libcurl 8.6.0.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix reference access in dimensions for DOMNodeList and DOMNodeMap.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13344); ?> (finfo::buffer(): Failed identify data 0:(null), backport).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(75712); ?> (getenv in php-fpm should not read $_ENV, $_SERVER).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12019); ?> (detection of image formats in system gd library).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11950); ?> ([mysqlnd] Fixed not to set CR_MALFORMED_PACKET to error if CR_SERVER_GONE_ERROR is already set).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13354); ?> (pg_execute/pg_send_query_params/pg_send_execute with null value passed by reference).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed array key as hash to string (case insensitive) comparison typo for the second operand buffer size (albeit unused for now).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.16"><!-- {{{ 8.2.16 -->
<h3>Version 8.2.16</h3>
<b><?php release_date('15-Feb-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed timer leak in zend-max-execution-timers builds.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12349); ?> (linking failure on ARM with mold).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13097); ?> (Anonymous class reference in trigger_error / thrown Exception).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13215); ?> (GCC 14 build failure).</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix missing error check in curl_multi_init().</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12996); ?> (Incorrect SCRIPT_NAME with Apache ProxyPassMatch when plus in path).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10344); ?> (imagettfbbox(): Could not find/open font UNC path).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10614); ?> (imagerotate will turn the picture all black, when rotated 90).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12107); ?> (When running a stored procedure (that returns a result set) twice, PHP crashes).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13232); ?> (Segmentation fault will be reported when JIT is off but JIT_debug is still on).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed LibreSSL undefined reference when OPENSSL_NO_ENGINE not set. (David Carlier).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 13119); ?> (Changed to convert float and double values ​​into strings using `H` format).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71465); ?> (PHAR doesn't know about litespeed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 13037); ?> (PharData incorrectly extracts zip file).</li>
</ul></li>
<li>Random:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13138); ?> (Randomizer::pickArrayKeys() does not detect broken engines).</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12504); ?> (Corrupted session written when there's a fatal error in autoloader).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 13071); ?> (Copying large files using mmap-able source streams may exhaust available memory and fail).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.15"><!-- {{{ 8.2.15 -->
<h3>Version 8.2.15</h3>
<b><?php release_date('18-Jan-2024'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12953); ?> (false positive SSA integrity verification failed when loading composer classmaps with more than 11k elements).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12966); ?> (missing cross-compiling 3rd argument so Autoconf doesn't emit warnings).</li>
</ul></li>
<li>Cli:
<ul>
  <li>Fix incorrect timeout in built-in web server when using router script and max_input_time.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9698); ?> (stream_wrapper_register crashes with FFI\CData).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12905); ?> (FFI::new interacts badly with observers).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed <?php githubissuel('php/php-src', 12943); ?> (IntlDateFormatter::__construct accepts 'C' as valid locale).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12936); ?> (hash() function hangs endlessly if using sha512 on strings &gt;= 4GiB).</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fix crash on Apache shutdown with persistent connections.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed oss-fuzz #64727 (JIT undefined array key warning may overwrite DIM with NULL when DIM is the same var as result).</li>
  <li>Added workaround for SELinux mprotect execheap issue. See https://bugzilla.kernel.org/show_bug.cgi?id=218258.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12987); ?> (openssl_csr_sign might leak new cert on error).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 12969); ?> (Fixed PDO::getAttribute() to get PDO::ATTR_STRINGIFY_FETCHES).</li>
</ul></li>
<li>PDO_ODBC:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12767); ?> (Unable to turn on autocommit mode with setAttribute()).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed auto_reset_persistent handling and allow_persistent type.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12974); ?> (Apache crashes on shutdown when using pg_pconnect()).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77432); ?> (Segmentation fault on including phar file).</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12962); ?> (Double free of init_file in phpdbg_prompt.c).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fix getting the address of an uninitialized property of a SimpleXMLElement resulting in a crash.</li>
</ul></li>
<li>Tidy:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12980); ?> (tidynode.props.attribute is missing "Boolean Attributes" and empty attributes).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.14"><!-- {{{ 8.2.14 -->
<h3>Version 8.2.14</h3>
<b><?php release_date('21-Dec-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed oss-fuzz #54325 (Use-after-free of name in var-var with malicious error handler).</li>
  <li>Fixed oss-fuzz #64209 (In-place modification of filename in php_message_handler_for_zend).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12758); ?> / <?php githubissuel('php/php-src', 12768); ?> (Invalid opline in OOM handlers within ZEND_FUNC_GET_ARGS and ZEND_BIND_STATIC).</li>
  <li>Fix various missing NULL checks.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12835); ?> (Leak of call-&gt;extra_named_params on internal __call).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed improbably integer overflow while parsing really large (or small) Unix timestamps.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12616); ?> (DOM: Removing XMLNS namespace node results in invalid default: prefix).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12705); ?> (Segmentation fault in fpm_status_export_to_zval).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9348); ?> (FTP &amp; SSL session reuse).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12635); ?> (Test bug69398.phpt fails with ICU 74.1).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12702); ?> (libxml2 2.12.0 issue building from src).</li>
  <li>Fixed test failures for libxml2 2.12.0.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Avoid using uninitialised struct.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12791); ?> (Possible dereference of NULL in MySQLnd debug code).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed JIT bug (Function JIT emits "Uninitialized string offset" warning at the same time as invalid offset Error).</li>
  <li>Fixed JIT bug (JIT emits "Attempt to assign property of non-object" warning at the same time as Error is being thrown).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(50713); ?> (openssl_pkcs7_verify() may ignore untrusted CAs).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12628); ?> (The gh11374 test fails on Alpinelinux).</li>
</ul></li>
<li>PDO PGSQL:
<ul>
  <li>Fixed the default value of $fetchMode in PDO::pgsqlGetNotify() (kocsismate)</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12763); ?> wrong argument type for pg_untrace.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12675); ?> (MEMORY_LEAK in phpdbg_prompt.c).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12838); ?> ([SOAP] Temporary WSDL cache files not being deleted).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12721); ?> (SplFileInfo::getFilename() segfault in combination with GlobIterator and no directory separator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12633); ?> (sqlite3_defensive.phpt fails with sqlite 3.44.0).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leak in syslog device handling.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12621); ?> (browscap segmentation fault when configured in the vhost).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12655); ?> (proc_open() does not take into account references in the descriptor array).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(79945); ?> (Stream wrappers in imagecreatefrompng causes segfault).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12661); ?> (Inconsistency in ZipArchive::addGlob remove_path Option Behavior).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.13"><!-- {{{ 8.2.13 -->
<h3>Version 8.2.13</h3>
<b><?php release_date('23-Nov-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed double-free of non-interned enum case name.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12457); ?> (Incorrect result of stripos with single character needle).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12468); ?> (Double-free of doc_comment when overriding static property via trait).</li>
  <li>Fixed segfault caused by weak references to FFI objects.</li>
  <li>Fixed max_execution_time: don't delete an unitialized timer.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12558); ?> (Arginfo soft-breaks with namespaced class return type if the class name starts with N).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix registerNodeClass with abstract class crashing.</li>
  <li>Add missing NULL pointer error check.</li>
  <li>Fix validation logic of php:function() callbacks.</li>
</ul></li>
<li>Fiber:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11121); ?> (ReflectionFiber segfault).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9921); ?> (Loading ext in FPM config does not register module handlers).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12232); ?> (FPM: segfault dynamically loading extension without opcache).</li>
  <li><?php bugfix(76922); ?> (FastCGI terminates conn after FCGI_GET_VALUES).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Removed the BC break on IntlDateFormatter::construct which threw an exception with an invalid locale.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added warning when JIT cannot be enabled.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8143); ?> (Crashes in zend_accel_inheritance_cache_find since upgrading to 8.1.3 due to corrupt on-disk file cache).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12489); ?> (Missing sigbio creation checking in openssl_cms_verify).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11374); ?> (Backport upstream fix, Different preg_match result with -d pcre.jit=0).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12392); ?> (Segmentation fault on SoapClient::__getTypes).</li>
  <li><?php bugfix(66150); ?> (SOAP WSDL cache race condition causes Segmentation Fault).</li>
  <li><?php bugfix(67617); ?> (SOAP leaves incomplete cache file on ENOSPC).</li>
  <li>Fix incorrect uri check in SOAP caching.</li>
  <li>Fix segfault and assertion failure with refcounted props and arrays.</li>
  <li>Fix potential crash with an edge case of persistent encoders.</li>
  <li><?php bugfix(75306); ?> (Memleak in SoapClient).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(75708); ?> (getimagesize with "&amp;$imageinfo" fails on StreamWrappers).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Add missing NULL pointer error check.</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Add missing NULL pointer error check.</li>
</ul></li>
<li>XSL:
<ul>
  <li>Add missing module dependency.</li>
  <li>Fix validation logic of php:function() callbacks.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.12"><!-- {{{ 8.2.12 -->
<h3>Version 8.2.12</h3>
<b><?php release_date('26-Oct-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12207); ?> (memory leak when class using trait with doc block).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12215); ?> (Module entry being overwritten causes type errors in ext/dom).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12273); ?> (__builtin_cpu_init check).</li>
  <li><?php bugfix(80092); ?> (ZTS + preload = segfault on shutdown).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Ensure a single Date header is present.</li>
</ul></li>
<li>CType:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11997); ?> (ctype_alnum 5 times slower in PHP 8.1 or greater).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Restore old namespace reconciliation behaviour.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8996); ?> (DOMNode serialization on PHP ^8.1).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11891); ?> (fileinfo returns text/xml for some svg files).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fix explicit FILTER_REQUIRE_SCALAR with FILTER_CALLBACK (ilutov)</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12186); ?> (segfault copying/cloning a finalized HashContext).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12243); ?> (segfault on IntlDateFormatter::construct).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12282); ?> (IntlDateFormatter::construct should throw an exception on an invalid locale).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12297); ?> (PHP Startup: Invalid library (maybe not a PHP library) 'mysqlnd.so' in Unknown on line).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed opcache_invalidate() on deleted file.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12380); ?> (JIT+private array property access inside closure accesses private property in child class).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11956); ?> (Backport upstream fix, PCRE regular expressions with JIT enabled gives different result).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12170); ?> (Can't use xpath with comments in SimpleXML).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12223); ?> (Entity reference produces infinite loop in var_dump/print_r).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12167); ?> (Unable to get processing instruction contents in SimpleXML).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12169); ?> (Unable to get comment contents in SimpleXML).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12190); ?> (binding ipv4 address with both address and port at 0).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fix return type of stub of xml_parse_into_struct().</li>
  <li>Fix memory leak when calling xml_parse_into_struct() twice.</li>
</ul></li>
<li>XSL:
<ul>
  <li>Fix type error on XSLTProcessor::transformToDoc return value with SimpleXML.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.11"><!-- {{{ 8.2.11 -->
<h3>Version 8.2.11</h3>
<b><?php release_date('28-Sep-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11937); ?> (Constant ASTs containing objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11790); ?> (On riscv64 require libatomic if actually needed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11876); ?>: ini_parse_quantity() accepts invalid quantities.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12073); ?> (Segfault when freeing incompletely initialized closures).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12060); ?> (Internal iterator rewind handler is called twice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12102); ?> (Incorrect compile error when using array access on TMP value in function call).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix memory leak when setting an invalid DOMDocument encoding.</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed build for NetBSD which still uses the old iconv signature.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12020); ?> (intl_get_error_message() broken after MessageFormatter::formatMessage() fails).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10270); ?> (Invalid error message when connection via SSL fails: "trying to connect via (null)").</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fixed memory leak with failed SQLPrepare.</li>
  <li>Fixed persistent procedural ODBC connections not getting closed.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(52751); ?> (XPath processing-instruction() function is not supported).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11972); ?> (RecursiveCallbackFilterIterator regression in 8.1.18).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11878); ?> (SQLite3 callback functions cause a memory leak with a callable array).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.10"><!-- {{{ 8.2.10 -->
<h3>Version 8.2.10</h3>
<b><?php release_date('31-Aug-2023'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11716); ?> (cli server crashes on SIGINT when compiled with ZEND_RC_DEBUG=1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10964); ?> (Improve man page about the built-in server).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11416); ?> (Crash with DatePeriod when uninitialised objects are passed in).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed strerror_r detection at configuration time.</li>
  <li>Fixed trait typed properties using a DNF type not being correctly bound.</li>
  <li>Fixed trait property types not being arena allocated if copied from an internal trait.</li>
  <li>Fixed deep copy of property DNF type during lazy class load.</li>
  <li>Fixed memory freeing of DNF types for non arena allocated types.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix DOMEntity field getter bugs.</li>
  <li>Fix incorrect attribute existence check in DOMElement::setAttributeNodeNS.</li>
  <li>Fix DOMCharacterData::replaceWith() with itself.</li>
  <li>Fix empty argument cases for DOMParentNode methods.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11791); ?> (Wrong default value of DOMDocument::xmlStandalone).</li>
  <li>Fix json_encode result on DOMDocument.</li>
  <li>Fix manually calling __construct() on DOM classes.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11830); ?> (ParentNode methods should perform their checks upfront).</li>
  <li>Fix viable next sibling search for replaceWith.</li>
  <li>Fix segfault when DOMParentNode::prepend() is called when the child disappears.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fix leaking definitions when using FFI::cdef()-&gt;new(...).</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix use-of-uninitialized-value in hash_pbkdf2(), fix missing $options parameter in signature.</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11440); ?> (authentication to a sha256_password account fails over SSL).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11438); ?> (mysqlnd fails to authenticate with sha256_password accounts using passwords longer than 19 characters).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11550); ?> (MySQL Statement has a empty query result when the response field has changed, also Segmentation fault).</li>
  <li>Fixed invalid error message "Malformed packet" when connection is dropped.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11715); ?> (opcache.interned_strings_buffer either has no effect or opcache_get_status() / phpinfo() is wrong).</li>
  <li>Avoid adding an unnecessary read-lock when loading script from shm if restart is in progress.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Revert behaviour of receiving SIGCHLD signals back to the behaviour before 8.1.22.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(81992); ?> (SplFixedArray::setSize() causes use-after-free).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Prevent int overflow on $decimals in number_format.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11870); ?> (Fix off-by-one bug when truncating tempnam prefix) (athos-ribeiro)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.2.9"><!-- {{{ 8.2.9 -->
<h3>Version 8.2.9</h3>
<b><?php release_date('03-Aug-2023'); ?></b>
<ul><li>Build:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11522); ?> (PHP version check fails with '-' separator).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fix interrupted CLI output causing the process to exit.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed oss-fuzz #60011 (Mis-compilation of by-reference nullsafe operator).</li>
  <li>Fixed line number of JMP instruction over else block.</li>
  <li>Fixed use-of-uninitialized-value with ??= on assert.</li>
  <li>Fixed oss-fuzz #60411 (Fix double-compilation of arrow-functions).</li>
  <li>Fixed build for FreeBSD before the 11.0 releases.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix crash when an invalid callback function is passed to CURLMOPT_PUSHFUNCTION.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11368); ?> (Date modify returns invalid datetime).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11600); ?> (Can't parse time strings which include (narrow) non-breaking space characters).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11854); ?> (DateTime:createFromFormat stopped parsing datetime with extra space).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11625); ?> (DOMElement::replaceWith() doesn't replace node with DOMDocumentFragment but just deletes node or causes wrapping &lt;&gt;&lt;/&gt; depending on libxml2 version).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11298); ?> (finfo returns wrong mime type for xz files).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fix context option check for "overwrite".</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10562); ?> (Memory leak and invalid state with consecutive ftp_nb_fget).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix most of the external libgd test failures.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak in MessageFormatter::format() on failure.</li>
</ul></li>
<li>Libxml:
<ul>
  <li>Fixed bug GHSA-3qrf-m4j2-pcrr (Security issue with external entity loading in XML without enabling it). (CVE-2023-3823)</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11300); ?> (license issue: restricted unicode license headers).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10914); ?> (OPCache with Enum and Callback functions results in segmentation fault).</li>
  <li>Prevent potential deadlock if accelerated globals cannot be allocated.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11498); ?> (SIGCHLD is not always returned from proc_open).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix	<?php githubissuel('php/php-src', 11587); ?> (After php8.1, when PDO::ATTR_EMULATE_PREPARES is true and PDO::ATTR_STRINGIFY_FETCHES is true, decimal zeros are no longer filled).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11492); ?> (Make test failure: ext/pdo_sqlite/tests/bug_42589.phpt).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Add missing check on EVP_VerifyUpdate() in phar util.</li>
  <li>Fixed bug GHSA-jqcx-ccgc-xwhv (Buffer mismanagement in phar_dir_read()). (CVE-2023-3824)</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9669); ?> (phpdbg -h options doesn't list the -z option).</li>
</ul></li>
<li>Session:
<ul>
  <li>Removed broken url support for transferring session ID.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix serialization of RC1 objects appearing in object graph twice.</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11735); ?> (Use-after-free when unregistering user stream wrapper from itself).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fix replaced error handling in SQLite3Stmt::__construct.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11548); ?> (Argument corruption when calling XMLReader::open or XMLReader::XML non-statically with observer active).</li>
</ul></li>
</ul>
<!-- }}} --></section>



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

<section class="version" id="8.1.34"><!-- {{{ 8.1.34 -->
<h3>Version 8.1.34</h3>
<b><?php release_date('18-Dec-2025'); ?></b>
<ul><li>Curl:
<ul>
  <li>Fix curl build and test failures with version 8.16.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Reset global pointers to prevent use-after-free in zend_jit_status().</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '8xr5-qppj-gvwj'); ?> (PDO quoting result null deref). (CVE-2025-14180)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'www2-q4fc-65wf'); ?> (Null byte termination in dns_get_record()).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'h96m-rvf9-jgm2'); ?> (Heap buffer overflow in array_merge()). (CVE-2025-14178)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '3237-qqm7-mfv7'); ?> (Information Leak of Memory in getimagesize). (CVE-2025-14177)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.33"><!-- {{{ 8.1.33 -->
<h3>Version 8.1.33</h3>
<b><?php release_date('03-Jul-2025'); ?></b>
<ul><li>PGSQL:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hrwm-9436-5mv3'); ?> (pgsql extension does not check for errors during escaping). (CVE-2025-1735)</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '453j-q27h-5p8x'); ?> (NULL Pointer Dereference in PHP SOAP Extension via Large XML Namespace Prefix). (CVE-2025-6491)</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', '3cr5-j632-f35r'); ?> (Null byte termination in hostnames). (CVE-2025-1220)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.32"><!-- {{{ 8.1.32 -->
<h3>Version 8.1.32</h3>
<b><?php release_date('13-Mar-2025'); ?></b>
<ul><li>LibXML:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'wg4p-4hqh-c3g9'); ?> (Reocurrence of #72714).</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'p3x9-6h7p-cgfc'); ?> (libxml streams use wrong `content-type` header when requesting a redirected resource). (CVE-2025-1219)</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed <?php githubsecurityl('php/php-src', 'hgf5-96fm-v528'); ?> (Stream HTTP wrapper header check might omit basic auth header). (CVE-2025-1736)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', '52jp-hrpf-2jff'); ?> (Stream HTTP wrapper truncate redirect location to 1024 bytes). (CVE-2025-1861)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'pcmh-g36c-qc44'); ?> (Streams HTTP wrapper does not fail for headers without colon). (CVE-2025-1734)</li>
  <li>Fixed <?php githubsecurityl('php/php-src', 'v8xr-gpvj-cx9g'); ?> (Header parser of `http` stream wrapper does not handle folded headers). (CVE-2025-1217)</li>
</ul></li>
<li>Windows:
<ul>
  <li>Fixed phpize for Windows 11 (24H2).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.31"><!-- {{{ 8.1.31 -->
<h3>Version 8.1.31</h3>
<b><?php release_date('21-Nov-2024'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '4w77-75f9-2c8w'); ?> (Heap-Use-After-Free in sapi_read_post_data Processing in CLI SAPI Interface).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'g665-fm4p-vhff'); ?> (OOB access in ldap_escape). (CVE-2024-8932)</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'h35g-vwh6-m678'); ?> (Leak partial content of the heap through heap buffer over-read). (CVE-2024-8929)</li>
</ul></li>
<li>PDO DBLIB:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the dblib quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>PDO Firebird:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', '5hqh-c84r-qjcv'); ?> (Integer overflow in the firebird quoter causing OOB writes). (CVE-2024-11236)</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'c5f2-jwm7-mmq2'); ?> (Configuring a proxy in a stream context might allow for CRLF injection in URIs). (CVE-2024-11234)</li>
  <li>Fixed bug <?php githubsecurityl('php/php-src', 'r977-prxv-hc43'); ?> (Single byte overread with convert.quoted-printable-decode filter). (CVE-2024-11233)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.30"><!-- {{{ 8.1.30 -->
<h3>Version 8.1.30</h3>
<b><?php release_date('26-Sep-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed bug GHSA-p99j-rfp4-xqvq (Bypass of CVE-2024-4577, Parameter Injection Vulnerability). (CVE-2024-8926)</li>
  <li>Fixed bug GHSA-94p6-54jq-9mwp (cgi.force_redirect configuration is bypassable due to the environment variable collision). (CVE-2024-8927)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug GHSA-865w-9rf3-2wh5 (Logs from childrens may be altered). (CVE-2024-9026)</li>
</ul></li>
<li>SAPI:
<ul>
  <li>Fixed bug GHSA-9pqp-7h25-4f32 (Erroneous parsing of multipart form data). (CVE-2024-8925)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.29"><!-- {{{ 8.1.29 -->
<h3>Version 8.1.29</h3>
<b><?php release_date('06-Jun-2024'); ?></b>
<ul><li>CGI:
<ul>
  <li>Fixed bug GHSA-3qgc-jrrr-25jv (Bypass of CVE-2012-1823, Argument Injection in PHP-CGI). (CVE-2024-4577)</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fixed bug GHSA-w8qr-v226-r27w (Filter bypass in filter_var FILTER_VALIDATE_URL). (CVE-2024-5458)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>The openssl_private_decrypt function in PHP, when using PKCS1 padding (OPENSSL_PKCS1_PADDING, which is the default), is vulnerable to the Marvin Attack unless it is used with an OpenSSL version that includes the changes from this pull request: https://github.com/openssl/openssl/pull/13817 (rsa_pkcs1_implicit_rejection). These changes are part of OpenSSL 3.2 and have also been backported to stable versions of various Linux distributions, as well as to the PHP builds provided for Windows since the previous release. All distributors and builders should ensure that this version is used to prevent PHP from being vulnerable.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fixed bug GHSA-9fcc-425m-g385 (Bypass of CVE-2024-1874). (CVE-2024-5585)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.28"><!-- {{{ 8.1.28 -->
<h3>Version 8.1.28</h3>
<b><?php release_date('11-Apr-2024'); ?></b>
<ul><li>Standard:
<ul>
  <li>Fixed bug GHSA-pc52-254m-w9w7 (Command injection via array-ish $command parameter of proc_open). (CVE-2024-1874)</li>
  <li>Fixed bug GHSA-wpj3-hf5j-x4v4 (__Host-/__Secure- cookie bypass due to partial CVE-2022-31629 fix). (CVE-2024-2756)</li>
  <li>Fixed bug GHSA-h746-cjrr-wfmr (password_verify can erroneously return true, opening ATO risk). (CVE-2024-3096)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.27"><!-- {{{ 8.1.27 -->
<h3>Version 8.1.27</h3>
<b><?php release_date('21-Dec-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed oss-fuzz #54325 (Use-after-free of name in var-var with malicious error handler).</li>
  <li>Fixed oss-fuzz #64209 (In-place modification of filename in php_message_handler_for_zend).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12758); ?> / <?php githubissuel('php/php-src', 12768); ?> (Invalid opline in OOM handlers within ZEND_FUNC_GET_ARGS and ZEND_BIND_STATIC).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12616); ?> (DOM: Removing XMLNS namespace node results in invalid default: prefix).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12705); ?> (Segmentation fault in fpm_status_export_to_zval).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12635); ?> (Test bug69398.phpt fails with ICU 74.1).</li>
</ul></li>
<li>LibXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12702); ?> (libxml2 2.12.0 issue building from src).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Avoid using uninitialised struct.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(50713); ?> (openssl_pkcs7_verify() may ignore untrusted CAs).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12628); ?> (The gh11374 test fails on Alpinelinux).</li>
</ul></li>
<li>PGSQL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12763); ?> wrong argument type for pg_untrace.</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12675); ?> (MEMORY_LEAK in phpdbg_prompt.c).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12633); ?> (sqlite3_defensive.phpt fails with sqlite 3.44.0).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix memory leak in syslog device handling.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12621); ?> (browscap segmentation fault when configured in the vhost).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12655); ?> (proc_open() does not take into account references in the descriptor array).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(79945); ?> (Stream wrappers in imagecreatefrompng causes segfault).</li>
</ul></li>
<li>Zip:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12661); ?> (Inconsistency in ZipArchive::addGlob remove_path Option Behavior).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.26"><!-- {{{ 8.1.26 -->
<h3>Version 8.1.26</h3>
<b><?php release_date('23-Nov-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12468); ?> (Double-free of doc_comment when overriding static property via trait).</li>
  <li>Fixed segfault caused by weak references to FFI objects.</li>
  <li>Fixed max_execution_time: don't delete an unitialized timer.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix registerNodeClass with abstract class crashing.</li>
  <li>Add missing NULL pointer error check.</li>
  <li>Fix validation logic of php:function() callbacks.</li>
</ul></li>
<li>Fiber:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11121); ?> (ReflectionFiber segfault).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9921); ?> (Loading ext in FPM config does not register module handlers).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12232); ?> (FPM: segfault dynamically loading extension without opcache).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Removed the BC break on IntlDateFormatter::construct which threw an exception with an invalid locale.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Added warning when JIT cannot be enabled.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8143); ?> (Crashes in zend_accel_inheritance_cache_find since upgrading to 8.1.3 due to corrupt on-disk file cache).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12489); ?> (Missing sigbio creation checking in openssl_cms_verify).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11374); ?> (Backport upstream fix, Different preg_match result with -d pcre.jit=0).</li>
</ul></li>
<li>SOAP:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12392); ?> (Segmentation fault on SoapClient::__getTypes).</li>
  <li><?php bugfix(66150); ?> (SOAP WSDL cache race condition causes Segmentation Fault).</li>
  <li><?php bugfix(67617); ?> (SOAP leaves incomplete cache file on ENOSPC).</li>
  <li>Fix incorrect uri check in SOAP caching.</li>
  <li>Fix segfault and assertion failure with refcounted props and arrays.</li>
  <li>Fix potential crash with an edge case of persistent encoders.</li>
  <li><?php bugfix(75306); ?> (Memleak in SoapClient).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(75708); ?> (getimagesize with "&amp;$imageinfo" fails on StreamWrappers).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li>Add missing NULL pointer error check.</li>
</ul></li>
<li>XMLWriter:
<ul>
  <li>Add missing NULL pointer error check.</li>
</ul></li>
<li>XSL:
<ul>
  <li>Add missing module dependency.</li>
  <li>Fix validation logic of php:function() callbacks.</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.25"><!-- {{{ 8.1.25 -->
<h3>Version 8.1.25</h3>
<b><?php release_date('26-Oct-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12207); ?> (memory leak when class using trait with doc block).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12215); ?> (Module entry being overwritten causes type errors in ext/dom).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12273); ?> (__builtin_cpu_init check).</li>
  <li><?php bugfix(80092); ?> (ZTS + preload = segfault on shutdown).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Ensure a single Date header is present.</li>
</ul></li>
<li>CType:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11997); ?> (ctype_alnum 5 times slower in PHP 8.1 or greater).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Restore old namespace reconciliation behaviour.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 8996); ?> (DOMNode serialization on PHP ^8.1).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11891); ?> (fileinfo returns text/xml for some svg files).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Fix explicit FILTER_REQUIRE_SCALAR with FILTER_CALLBACK (ilutov)</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12186); ?> (segfault copying/cloning a finalized HashContext).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12243); ?> (segfault on IntlDateFormatter::construct).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12282); ?> (IntlDateFormatter::construct should throw an exception on an invalid locale).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12297); ?> (PHP Startup: Invalid library (maybe not a PHP library) 'mysqlnd.so' in Unknown on line).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed opcache_invalidate() on deleted file.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12380); ?> (JIT+private array property access inside closure accesses private property in child class).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11956); ?> (Backport upstream fix, PCRE regular expressions with JIT enabled gives different result).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12170); ?> (Can't use xpath with comments in SimpleXML).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12223); ?> (Entity reference produces infinite loop in var_dump/print_r).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12167); ?> (Unable to get processing instruction contents in SimpleXML).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12169); ?> (Unable to get comment contents in SimpleXML).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12190); ?> (binding ipv4 address with both address and port at 0).</li>
</ul></li>
<li>XML:
<ul>
  <li>Fix return type of stub of xml_parse_into_struct().</li>
  <li>Fix memory leak when calling xml_parse_into_struct() twice.</li>
</ul></li>
<li>XSL:
<ul>
  <li>Fix type error on XSLTProcessor::transformToDoc return value with SimpleXML.</li>
</ul></li>
<li>Sockets:
<ul>
  <li>Fix socket_export_stream() with wrong protocol (twosee)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.24"><!-- {{{ 8.1.24 -->
<h3>Version 8.1.24</h3>
<b><?php release_date('28-Sep-2023'); ?></b>
<ul><li>Core:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11937); ?> (Constant ASTs containing objects).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11790); ?> (On riscv64 require libatomic if actually needed).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12073); ?> (Segfault when freeing incompletely initialized closures).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12060); ?> (Internal iterator rewind handler is called twice).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 12102); ?> (Incorrect compile error when using array access on TMP value in function call).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix memory leak when setting an invalid DOMDocument encoding.</li>
</ul></li>
<li>Iconv:
<ul>
  <li>Fixed build for NetBSD which still uses the old iconv signature.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 12020); ?> (intl_get_error_message() broken after MessageFormatter::formatMessage() fails).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10270); ?> (Invalid error message when connection via SSL fails: "trying to connect via (null)").</li>
</ul></li>
<li>ODBC:
<ul>
  <li>Fixed memory leak with failed SQLPrepare.</li>
  <li>Fixed persistent procedural ODBC connections not getting closed.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(52751); ?> (XPath processing-instruction() function is not supported).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11972); ?> (RecursiveCallbackFilterIterator regression in 8.1.18).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11878); ?> (SQLite3 callback functions cause a memory leak with a callable array).</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.23"><!-- {{{ 8.1.23 -->
<h3>Version 8.1.23</h3>
<b><?php release_date('31-Aug-2023'); ?></b>
<ul><li>CLI:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11716); ?> (cli server crashes on SIGINT when compiled with ZEND_RC_DEBUG=1).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10964); ?> (Improve man page about the built-in server).</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed strerror_r detection at configuration time.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11416); ?>: Crash with DatePeriod when uninitialised objects are passed in.</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fix DOMEntity field getter bugs.</li>
  <li>Fix incorrect attribute existence check in DOMElement::setAttributeNodeNS.</li>
  <li>Fix DOMCharacterData::replaceWith() with itself.</li>
  <li>Fix empty argument cases for DOMParentNode methods.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11791); ?> (Wrong default value of DOMDocument::xmlStandalone).</li>
  <li>Fix json_encode result on DOMDocument.</li>
  <li>Fix manually calling __construct() on DOM classes.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11830); ?> (ParentNode methods should perform their checks upfront).</li>
  <li>Fix segfault when DOMParentNode::prepend() is called when the child disappears.</li>
</ul></li>
<li>FFI:
<ul>
  <li>Fix leaking definitions when using FFI::cdef()-&gt;new(...).</li>
</ul></li>
<li>MySQLnd:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11440); ?> (authentication to a sha256_password account fails over SSL).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11438); ?> (mysqlnd fails to authenticate with sha256_password accounts using passwords longer than 19 characters).</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11550); ?> (MySQL Statement has a empty query result when the response field has changed, also Segmentation fault).</li>
  <li>Fixed invalid error message "Malformed packet" when connection is dropped.</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11715); ?> (opcache.interned_strings_buffer either has no effect or opcache_get_status() / phpinfo() is wrong).</li>
  <li>Avoid adding an unnecessary read-lock when loading script from shm if restart is in progress.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Revert behaviour of receiving SIGCHLD signals back to the behaviour before 8.1.22.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(81992); ?> (SplFixedArray::setSize() causes use-after-free).</li>
</ul></li>
<li>Standard:
<ul>
  <li>Prevent int overflow on $decimals in number_format.</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 11870); ?> (Fix off-by-one bug when truncating tempnam prefix) (athos-ribeiro)</li>
</ul></li>
</ul>
<!-- }}} --></section>



<section class="version" id="8.1.22"><!-- {{{ 8.1.22 -->
<h3>Version 8.1.22</h3>
<b><?php release_date('03-Aug-2023'); ?></b>
<ul><li>Build:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11522); ?> (PHP version check fails with '-' separator).</li>
</ul></li>
<li>CLI:
<ul>
  <li>Fix interrupted CLI output causing the process to exit.</li>
</ul></li>
<li>Core:
<ul>
  <li>Fixed oss-fuzz #60011 (Mis-compilation of by-reference nullsafe operator).</li>
  <li>Fixed use-of-uninitialized-value with ??= on assert.</li>
  <li>Fixed build for FreeBSD before the 11.0 releases.</li>
</ul></li>
<li>Curl:
<ul>
  <li>Fix crash when an invalid callback function is passed to CURLMOPT_PUSHFUNCTION.</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11368); ?> (Date modify returns invalid datetime).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11625); ?> (DOMElement::replaceWith() doesn't replace node with DOMDocumentFragment but just deletes node or causes wrapping &lt;&gt;&lt;/&gt; depending on libxml2 version).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11298); ?> (finfo returns wrong mime type for xz files).</li>
</ul></li>
<li>FTP:
<ul>
  <li>Fix context option check for "overwrite".</li>
  <li>Fixed bug <?php githubissuel('php/php-src', 10562); ?> (Memory leak and invalid state with consecutive ftp_nb_fget).</li>
</ul></li>
<li>GD:
<ul>
  <li>Fix most of the external libgd test failures.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Fix use-of-uninitialized-value in hash_pbkdf2(), fix missing $options parameter in signature.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Fix memory leak in MessageFormatter::format() on failure.</li>
</ul></li>
<li>Libxml:
<ul>
  <li>Fixed bug GHSA-3qrf-m4j2-pcrr (Security issue with external entity loading in XML without enabling it). (CVE-2023-3823)</li>
</ul></li>
<li>MBString:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11300); ?> (license issue: restricted unicode license headers).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 10914); ?> (OPCache with Enum and Callback functions results in segmentation fault).</li>
  <li>Prevent potential deadlock if accelerated globals cannot be allocated.</li>
</ul></li>
<li>PCNTL:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 11498); ?> (SIGCHLD is not always returned from proc_open).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Mangle PCRE regex cache key with JIT option.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11587); ?> (After php8.1, when PDO::ATTR_EMULATE_PREPARES is true and PDO::ATTR_STRINGIFY_FETCHES is true, decimal zeros are no longer filled).</li>
</ul></li>
<li>PDO SQLite:
<ul>
  <li>Fix <?php githubissuel('php/php-src', 11492); ?> (Make test failure: ext/pdo_sqlite/tests/bug_42589.phpt).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Add missing check on EVP_VerifyUpdate() in phar util.</li>
  <li>Fixed bug GHSA-jqcx-ccgc-xwhv (Buffer mismanagement in phar_dir_read()). (CVE-2023-3824)</li>
</ul></li>
<li>PHPDBG:
<ul>
  <li>Fixed bug <?php githubissuel('php/php-src', 9669); ?> (phpdbg -h options doesn't list the -z option).</li>
</ul></li>
<li>Session:
<ul>
  <li>Removed broken url support for transferring session ID.</li>
</ul></li>
<li>Standard:
<ul>
  <li>Fix serialization of RC1 objects appearing in object graph twice.</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Fix replaced error handling in SQLite3Stmt::__construct.</li>
</ul></li>
</ul>
<!-- }}} --></section>



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

<section class="version" id="8.0.30"><!-- {{{ 8.0.30 -->
<h3>Version 8.0.30</h3>
<b><?php release_date('03-Aug-2023'); ?></b>
<ul><li>Libxml:
<ul>
  <li>Fixed bug GHSA-3qrf-m4j2-pcrr (Security issue with external entity loading in XML without enabling it). (CVE-2023-3823)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Fixed bug GHSA-jqcx-ccgc-xwhv (Buffer mismanagement in phar_dir_read()). (CVE-2023-3824)</li>
</ul></li>
</ul>
<!-- }}} --></section>



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
