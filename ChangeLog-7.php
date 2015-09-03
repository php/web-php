<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ChangeLog-7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/changelogs.inc';
site_header("PHP 7 ChangeLog", array("current" => "docs", "css" => array("changelog.css"), "layout_span" => 12));
?>

<h1>PHP 7 ChangeLog</h1>

<section class="version" id="7.0.0RC1"><!-- {{{ 7.0.0RC1 -->
<h3>Version 7.0.0 RC1</h3>
<b>20-Aug-2015</b>
<ul><li>Core:
<ul>
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
  <li><?php bugfix(70241); ?>/#70293 (Skipped assertions affect Generator returns).</li>
  <li><?php bugfix(70239); ?> (Creating a huge array doesn't result in exhausted, but segfault).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(66606); ?> (Sets HTTP_CONTENT_TYPE but not CONTENT_TYPE).</li>
  <li><?php bugfix(70264); ?> (CLI server directory traversal).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70245); ?> (strtotime does not emit warning when 2nd parameter is object or string).</li>
  <li><?php bugfix(70266); ?> (DateInterval::__construct.interval_spec is not supposed to be optional).</li>
  <li><?php bugfix(70277); ?> (new DateTimeZone($foo) is ignoring text after null byte).</li>
</ul></li>
<li>MCrypt:
<ul>
  <li><?php bugfix(69833); ?> (mcrypt fd caching not working).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70237); ?> (Empty while and do-while segmentation fault with opcode on CLI enabled).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(70232); ?> (Incorrect bump-along behavior with \K and empty string match).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(70272); ?> (Segfault in pdo_mysql).</li>
  <li><?php bugfix(70221); ?> (persistent sqlite connection + custom function segfaults).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(70214); ?> (FASYNC not defined, needs sys/file.h include).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70250); ?> (extract() turns array elements to references).</li>
  <li><?php bugfix(70211); ?> (php 7 ZEND_HASH_IF_FULL_DO_RESIZE use after free).</li>
  <li><?php bugfix(70208); ?> (Assert breaking access on objects).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.0b3"><!-- {{{ 7.0.0b3 -->
<h3>Version 7.0.0 Beta 3</h3>
<b>06-Aug-2015</b>
<ul><li>Core:
<ul>
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
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(70163); ?> (curl_setopt_array() type confusion).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(70158); ?> (Building with static imap fails).</li>
  <li><?php bugfix(69998); ?> (curl multi leaking memory).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70111); ?> (Segfault when a function uses both an explicit return type and an explicit cast).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure).</li>
</ul></li>
<li>Phar:
<ul>
  <li>Improved fix for bug <?php bugl(69441) ?>.</li>
  <li><?php bugfix(70019); ?> (Files extracted from archive may be placed outside of destination directory).</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li><?php bugfix(70138); ?> (Segfault when displaying memory leaks).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70081); ?> (SoapClient info leak / null pointer dereference via multiple type confusions).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70068); ?> (Dangling pointer in the unserialization of ArrayObject items).</li>
  <li><?php bugfix(70166); ?> (Use After Free Vulnerability in unserialize() with SPLArrayObject).</li>
  <li><?php bugfix(70168); ?> (Use After Free Vulnerability in unserialize() with SplObjectStorage).</li>
  <li><?php bugfix(70169); ?> (Use After Free Vulnerability in unserialize() with SplDoublyLinkedList).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70140); ?> (str_ireplace/php_string_tolower - Arbitrary Code Excecution). (CVE-2015-6527)</li>
  <li>Implemented FR <?php bugl(70112); ?> (Allow "dirname" to go up various times).</li>
  <li><?php bugfix(36365); ?> (scandir duplicates file name at every 65535th file).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="7.0.0b2"><!-- {{{ 7.0.0b2 -->
<h3>Version 7.0.0 Beta 2</h3>
<b>23-Jul-2015</b>
<ul><li>Core:
<ul>
  <li><?php bugfix(70089); ?> (segfault at ZEND_FETCH_DIM_W_SPEC_VAR_CONST_HANDLER ()).</li>
  <li><?php bugfix(70057); ?> (Build failure on 32-bit Mac OS X 10.6.8: recursive inlining).</li>
  <li><?php bugfix(70012); ?> (Exception lost with nested finally block).</li>
  <li><?php bugfix(69996); ?> (Changing the property of a cloned object affects the original).</li>
  <li><?php bugfix(70083); ?> (Use after free with assign by ref to overloaded objects).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(70065); ?> (curl_getinfo() returns corrupted values).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(53156); ?> (imagerectangle problem with point ordering).</li>
  <li><?php bugfix(66387); ?> (Stack overflow with imagefilltoborder).</li>
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
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70058); ?> (Build fails when building for i386).</li>
  <li><?php bugfix(70022); ?> (Crash with opcache using opcache.file_cache_only=1).</li>
</ul></li>
<li>Soap:
<ul>
  <li><?php bugfix(70079); ?> (Segmentation fault after more than 100 SoapClient calls).</li>
  <li><?php bugfix(70032); ?> (make_http_soap_request calls zend_hash_get_current_key_ex(,,,NULL).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70053); ?> (MutlitpleIterator array-keys incompatible change in PHP 7).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70096); ?> (Repeated iptcembed() adds superfluous FF bytes).</li>
  <li><?php bugfix(70018); ?> (exec does not strip all whitespace).</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(69430); ?> (token_get_all has new irrecoverable errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>
<section class="version" id="7.0.0b1"><!-- {{{ 7.0.0b1 -->
<h3>Version 7.0.0 Beta 1</h3>
<b>11-Jun-2015</b>
<ul><li>Core:
<ul>
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
  <li>Implemented the RFC `Scalar Type Decalarations v0.5`.</li>
  <li>Implemented the RFC `Group Use Declarations`.</li>
  <li>Implemented the RFC `Continue Output Buffering`.</li>
  <li>Implemented the RFC `Constructor behaviour of internal classes`.</li>
  <li>Implemented the RFC `Fix "foreach" behavior`.</li>
  <li>Implemented the RFC `Generator Delegation`.</li>
  <li>Implemented the RFC `Anonymous Class Support`.</li>
  <li>Implemented the RFC `Context Sensitive Lexer`.</li>
  <li><?php bugfix(69511); ?> (Off-by-one buffer overflow in php_sys_readlink).</li>
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
  <li><?php bugfix(70006); ?> (cli - function with default arg = STDOUT crash output).</li>
  <li><?php bugfix(69521); ?> (Segfault in gc_collect_cycles()).</li>
  <li>Improved zend_string API (Francois Laupretre)</li>
  <li><?php bugfix(69955); ?> (Segfault when trying to combine [] and assign-op on ArrayAccess object).</li>
  <li><?php bugfix(69957); ?> (Different ways of handling div/mod/intdiv).</li>
  <li><?php bugfix(69900); ?> (Too long timeout on pipes).</li>
</ul></li>
<li>CLI server:
<ul>
  <li>Refactor MIME type handling to use a hash table instead of linear search.</li>
  <li>Update the MIME type list from the one shipped by Apache HTTPD.</li>
  <li>Added support for SEARCH WebDav method.</li>
  <li><?php bugfix(69655); ?> (php -S changes MKCALENDAR request method to MKCOL).</li>
  <li><?php bugfix(64878); ?> (304 responses return Content-Type header).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(69939); ?> (Casting object to bool returns false).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(68937); ?> (Segfault in curl_multi_exec).</li>
  <li>Removed support for unsafe file uploads.</li>
  <li><?php bugfix(69831); ?> (Segmentation fault in curl_getinfo).</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed day_of_week function as it could sometimes return negative values internally.</li>
  <li>Removed $is_dst parameter from mktime() and gmmktime().</li>
  <li>Removed date.timezone warning (https://wiki.php.net/rfc/date.timezone_warning_removal).</li>
  <li>Added "v" DateTime format modifier to get the 3-digit version of fraction of seconds.</li>
  <li>Implemented FR <?php bugl(69089); ?>: Added DateTime::RFC3339_EXTENDED to output in RFC3339 Extended format which includes fraction of seconds.</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(62490); ?> (dba_delete returns true on missing item (inifile)).</li>
  <li><?php bugfix(68711); ?> (useless comparisons).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Made DOMNode::textContent writeable.</li>
  <li><?php bugfix(69846); ?> (Segmenation fault (access violation) when iterating over DOMNodeList).</li>
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
  <li><?php bugfix(68945); ?> (Unknown admin values segfault pools).</li>
  <li><?php bugfix(65933); ?> (Cannot specify config lines longer than 1024 bytes).</li>
  <li>Implement request #67106 (Split main fpm config).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(69082); ?> (FTPS support on Windows).</li>
</ul></li>
<li>GD:
<ul>
  <li>Made fontFetch's path parser thread-safe.</li>
  <li>Removed T1Lib support.</li>
  <li><?php bugfix(61221); ?> (imagegammacorrect function loses alpha channel).</li>
</ul></li>
<li>Intl:
<ul>
  <li>Removed deprecated aliases datefmt_set_timezone_id() and IntlDateFormatter::setTimeZoneID().</li>
</ul></li>
<li>JSON:
<ul>
  <li>Replace non-free JSON parser with a parser from Jsond extension, fixes #63520 (JSON extension includes a problematic license statement).</li>
  <li><?php bugfix(68938); ?> (json_decode() decodes empty string without error).</li>
  <li><?php bugfix(68546); ?> (json_decode() Fatal error: Cannot access property started with '\0').</li>
  <li><?php bugfix(62010); ?> (json_decode produces invalid byte-sequences).</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(47222); ?> (Implement LDAP_OPT_DIAGNOSTIC_MESSAGE).</li>
</ul></li>
<li>libxml:
<ul>
  <li>Fixed handling of big lines in error messages with libxml &gt;= 2.9.0.</li>
</ul></li>
<li>LiteSpeed:
<ul>
  <li>Updated LiteSpeed SAPI code from V5.5 to V6.6.</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>Fixed possible read after end of buffer and use after free.</li>
  <li>Removed mcrypt_generic_end() alias.</li>
  <li>Removed mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb(), mcrypt_ofb().</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li>Fixed Bug #69796 (mysqli_stmt::fetch doesn't assign null values to bound variables).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Corrected oci8 hash destructors to prevent segfaults, and a few other fixes.</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69975); ?> (PHP segfaults when accessing nvarchar(max) defined columns).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69688); ?> (segfault with eval and opcache fast shutdown).</li>
  <li>Added experimental (disabled by default) file based opcode cache.</li>
  <li>Fixed bug with try blocks being removed when extended_info opcode generation is turned on.</li>
  <li><?php bugfix(68644); ?> (strlen incorrect : mbstring + func_overload=2 +UTF-8 + Opcache).</li>
  <li>Removed opcache.load_comments configuration directive. Now doc comments loading costs nothing and always enabled.</li>
  <li><?php bugfix(69838); ?> (Wrong size calculation for function table).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Added "alpn_protocols" SSL context option allowing encrypted client/server streams to negotiate alternative protocols using the ALPN TLS extension when built against OpenSSL 1.0.2 or newer. Negotiated protocol information is accessible through stream_get_meta_data() output.</li>
  <li>Removed "CN_match" and "SNI_server_name" SSL context options. Use automatic detection or the "peer_name" option instead.</li>
  <li><?php bugfix(69882); ?> (OpenSSL error "key values mismatch" after openssl_pkcs12_read with extra cert).</li>
</ul></li>
<li>pcntl:
<ul>
  <li><?php bugfix(60509); ?> (pcntl_signal doesn't decrease ref-count of old handler when setting SIG_DFL).</li>
  <li>Added wifcontinued and wcontinued.</li>
  <li>Added rusage support to pcntl_wait() and pcntl_waitpid().</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Removed support for the /e (PREG_REPLACE_EVAL) modifier.</li>
  <li><?php bugfix(69864); ?> (Segfault in preg_replace_callback).</li>
  <li><?php bugfix(53823); ?> (preg_replace: * qualifier on unicode replace garbles the string).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(59450); ?> (./configure fails with "Cannot find php_pdo_driver.h").</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68424); ?> (Add new PDO mysql connection attr to control multi statements option).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li>Removed PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT attribute in favor of ATTR_EMULATE_PREPARES).</li>
  <li><?php bugfix(69752); ?> (PDOStatement::execute() leaks memory with DML Statements when closeCuror() is u).</li>
</ul></li>
<li>Reflection:
<ul>
  <li>Fixed inheritance chain of Reflector interface.</li>
  <li>Added ReflectionGenerator class.</li>
  <li>Added reflection support for return types and type declarations.</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(67694); ?> (Regression in session_regenerate_id()).</li>
  <li><?php bugfix(68941); ?> (mod_files.sh is a bash-script).</li>
  <li><?php bugfix(69952); ?> (Data integrity issues accessing superglobals by reference).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(68361); ?> (Segmentation fault on SoapClient::__getTypes).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Changed ArrayIterator implementation using zend_hash_iterator_... API. Allowed modification of iterated ArrayObject using the same behavior as proposed in `Fix "foreach" behavior`. Removed "Array was modified outside object and internal position is no longer valid" hack.</li>
  <li>Implemented #67886 (SplPriorityQueue/SplHeap doesn't expose extractFlags nor curruption state).</li>
  <li><?php bugfix(66405); ?> (RecursiveDirectoryIterator::CURRENT_AS_PATHNAME breaks the RecursiveIterator).</li>
  <li><?php bugfix(69845); ?> (ArrayObject with ARRAY_AS_PROPS broken).</li>
  <li><?php bugfix(69970); ?> (Use-after-free vulnerability in spl_recursive_it_move_forward_ex()).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(68260); ?> (SQLite3Result::fetchArray declares wrong required_num_args).</li>
  <li><?php bugfix(69897); ?> (segfault when manually constructing SQLite3Result).</li>
  <li><?php bugfix(69972); ?> (Use-after-free vulnerability in sqlite3SafetyCheckSickOrOk()).</li>
</ul></li>
<li>Standard:
<ul>
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
  <li><?php bugfix(62922); ?> (Truncating entire string should result in string).</li>
  <li><?php bugfix(69983); ?> (get_browser fails with user agent of null).</li>
  <li><?php bugfix(69976); ?> (Unable to parse "all" urls with colon char).</li>
  <li><?php bugfix(69768); ?> (escapeshell*() doesn't cater to !).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(68532); ?> (convert.base64-encode omits padding bytes).</li>
  <li>Removed set_socket_blocking() in favor of its alias stream_set_blocking().</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(64776); ?> (The XSLT extension is not thread safe).</li>
  <li>Removed xsl.security_prefs ini option.</li>
</ul></li>
<li>Zlib:
<ul>
  <li>Added deflate_init(), deflate_add(), inflate_init(), inflate_add() functions allowing incremental/streaming compression/decompression.</li>
</ul></li>
<li>Zip:
<ul>
  <li>Added ZipArchive::setCompressionName and ZipArchive::setCompressionIndex methods.</li>
  <li>Update bundled libzip to 1.0.1.</li>
  <li><?php bugfix(67161); ?> (ZipArchive::getStream() returns NULL for certain file).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<?php site_footer(); ?>

