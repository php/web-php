<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ChangeLog-4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/changelogs.inc';
site_header("PHP 4 ChangeLog", array("current" => "docs", "css" => array("changelog.css"), "layout_span" => 12));
?>

<h1>PHP 4 ChangeLog</h1>

<section class="version" id="4.4.9"><!-- {{{ 4.4.9 -->
<h3>Version 4.4.9</h3>
<?php release_date("07-Aug-2008"); ?>
<ul>
<li>Updated PCRE to version 7.7.</li>
<li>Fixed overflow in memnstr().</li>
<li>Fixed crash in imageloadfont when an invalid font is given.</li>
<li>Fixed open_basedir handling issue in the curl extension.</li>
<li><?php bugfix(27421); ?> (mbstring.func_overload set in .htaccess becomes global).</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.4.8"><!-- {{{ 4.4.8 -->
<h3>Version 4.4.8</h3>
<?php release_date("03-Jan-2008"); ?>
<ul>
<li>Improved fix for MOPB-02-2007.</li>
<li>Fixed an integer overflow inside chunk_split(). Identified by Gerhard Wagner.</li>
<li>Fixed integer overlow in str[c]spn().</li>
<li>Fixed regression in glob when open_basedir is on introduced by #41655 fix.</li>
<li>Fixed money_format() not to accept multiple %i or %n tokens.</li>
<li>Added "max_input_nesting_level" php.ini option to limit nesting level of input variables. Fix for MOPB-03-2007.</li>
<li>Fixed INFILE LOCAL option handling with MySQL - now not allowed when open_basedir or safe_mode is active.</li>
<li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378).</li>
<li><?php bugfix(43010); ?> (Fixed regression in imagearc with two equivelent angles).</li>
<li><?php bugfix(41765); ?> (Recode crashes/does not work on amd64).</li>
<li><?php bugfix(41630); ?> (segfault when an invalid color index is present in the image data).</li>
<li><?php bugfix(41628); ?> (PHP settings leak between Virtual Hosts in Apache 1.3).</li>
<li><?php bugfix(38798); ?> (OpenSSL init corrected in php5 but not in php4).</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.4.7"><!-- {{{ 4.4.7 -->
<h3>Version 4.4.7</h3>
<?php release_date("03-May-2007"); ?>
<ul>
<li>Fixed MOPB-33-2007 (PHP mail() Message ASCIIZ Byte Truncation).</li>
<li>Fixed MOPB-32-2007 (Double free inside session_decode()).</li>
<li>Fixed MOPB-26-2007 (mb_parse_str() can be used to activate register_globals).</li>
<li>Fixed MOPB-24-2007 (Fixed unallocated memory access/double free in in array_user_key_compare()).</li>
<li>Fixed MOPB-22-2007 (PHP session_regenerate_id() Double Free Vulnerability).</li>
<li>Fixed MOPB-21-2007 (An open_basedir/safe_mode bypass inside the compress.bzip2 wraper).</li>
<li>Fixed MOPB-8-2007 (XSS in phpinfo()).</li>
<li>Fixed CVE-2007-1001 (GD wbmp used with invalid image size).</li>
<li>Fixed CVE-2007-0455 (Buffer overflow in gdImageStringFTEx, used by imagettf function).</li>
<li><?php bugfix(41252); ?> (Calling mcrypt_generic without first calling mcrypt_generic_init crashes).</li>
<li><?php bugfix(40998); ?> (long session array keys are truncated).</li>
<li><?php bugfix(40915); ?> (addcslashes unexpected behavior with binary input).</li>
<li><?php bugfix(40831); ?> (cURL extension doesn't clean up the buffer of reused handle).</li>
<li><?php bugfix(40747); ?> (possible crash in session when save_path is out of open_basedir).</li>
<li><?php bugfix(38236); ?> (Binary data gets corrupted on multipart/formdata POST).</li>
<li>Fixed huge CPU usage in imagearc when used with large angles (libgd bug #74).</li>
<li>Fixed CRLF injection inside ftp_putcmd().</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.4.6"><!-- {{{ 4.4.6 -->
<h3>Version 4.4.6</h3>
<?php release_date("01-Mar-2007"); ?>
<ul>
<li>Updated PCRE to version 7.0.</li>
<li>Fixed segfault in ext/session when register_globals=On.</li>
<li><?php bugfix(40635); ?> (segfault in cURL extension).</li>
<li><?php bugfix(40611); ?> (possible cURL memory error).</li>
<li><?php bugfix(40578); ?> (imagettftext() multithreading issue).</li>
<li><?php bugfix(40502); ?> (ext/interbase compile failure).</li>
<li><?php bugfix(40286); ?> (PHP fastcgi with PHP_FCGI_CHILDREN don't kill children when parent is killed).</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.4.5"><!-- {{{ 4.4.5 -->
<h3>Version 4.4.5</h3>
<?php release_date("14-Feb-2007"); ?>
<ul>
<li>Upgraded PEAR to 1.5.0.</li>
<li>Updated PCRE to version 6.7.</li>
<li>Moved extensions to PECL: ext/ovrimos</li>
<li>Added a meta tag to phpinfo() output to prevent search engines from indexing the page.</li>
<li>Backported a fix in the configure tests to detect the "rounding fuzz".</li>
<li>Backported fix for ext/imap compilation failure with recent c-client versions.</li>
<li>Fixed missing open_basedir check inside chdir() function.</li>
<li><?php bugfix(40335); ?> (Compile fails when using GCC 4.1.1/binutils 2.17).</li>
<li><?php bugfix(39971); ?> (pg_insert/pg_update do not allow now() to be used for timestamp fields).</li>
<li><?php bugfix(39890); ?> (using autoconf 2.6x and --with-layout=GNU breaks PEAR install path).</li>
<li><?php bugfix(39819); ?> (Using $this not in object context can cause segfaults).</li>
<li><?php bugfix(39653); ?> (ext/dba doesn't check for db-4.5 and db-4.4 when db4 support is enabled).</li>
<li><?php bugfix(39583); ?> (ftp_put() does not change transfer mode to ASCII).</li>
<li><?php bugfix(39458); ?> (ftp_nlist() returns false on empty dirs).</li>
<li><?php bugfix(39354); ?> (Allow building of curl extension against libcurl 7.16.0).</li>
<li><?php bugfix(39034); ?> (curl_exec() with return transfer returns TRUE on empty files).</li>
<li><?php bugfix(38963); ?> (Fixed a possible open_basedir bypass in tempnam()).</li>
<li><?php bugfix(38882); ?> (ldap_connect causes segfault with newer versions of OpenLDAP).</li>
<li><?php bugfix(38859); ?> (parse_url() fails if passing '@' in passwd).</li>
<li><?php bugfix(38722); ?> (Calling undefined method prints insufficient error message).</li>
<li><?php bugfix(38534); ?> (segfault when calling setlocale() in userspace session handler).</li>
<li><?php bugfix(38450); ?> (constructor is not called for classes used in userspace stream wrappers).</li>
<li><?php bugfix(38378); ?> (wddx_serialize_value() generates no wellformed xml).</li>
<li><?php bugfix(37812); ?> (aggregate_methods_by_list fails to take certain methods).</li>
<li><?php bugfix(36975); ?> (natcasesort() causes array_pop() to misbehave).</li>
<li><?php bugfix(36248); ?> (CURLOPT_HEADERFUNCTION, couldn't set the function in the class).</li>
<li><?php bugfix(34066); ?> (recursive array_walk causes segfault).</li>
</ul>

There is a <a href="release_4_4_4.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.4.4"><!-- {{{ 4.4.4 -->
<h3>Version 4.4.4</h3>
<?php release_date("17-Aug-2006"); ?>
<ul>
<li>Fixed memory_limit on 64bit systems.</li>
<li>Fixed overflow on 64bit systems in str_repeat() and wordwrap().</li>
<li>Disabled CURLOPT_FOLLOWLOCATION in curl when open_basedir or safe_mode are enabled.</li>
<li>Fixed a memory corruption error with an invalid foreach() call.</li>
<li><?php bugfix(38431); ?> (xmlrpc_get_type() crashes PHP on objects).</li>
<li><?php bugfix(38377); ?> (session_destroy() gives warning after session_regenerate_id()).</li>
<li><?php bugfix(38322); ?> (reading past array in sscanf() leads to arbitary code execution).</li>
<li><?php bugfix(38278); ?> (session_cache_expire()'s value does not match phpinfo's session.cache_expire).</li>
<li><?php bugfix(38251); ?> (socket_select() and invalid arguments).</li>
<li><?php bugfix(38183); ?> (disable_classes=Foobar causes disabled class to be called Foo).</li>
<li><?php bugfix(38112); ?> (corrupted gif segfaults).</li>
<li><?php bugfix(37265); ?> (Added missing safe_mode &amp; open_basedir checks to imap_body()).</li>
<li><?php bugfix(29538); ?> (number_format and problem with 0).</li>
</ul>

There is a <a href="release_4_4_4.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.4.3"><!-- {{{ 4.4.3 -->
<h3>Version 4.4.3</h3>
<?php release_date("03-Aug-2006"); ?>
<ul>
<li>Added control character checks for cURL extension's open_basedir/safe_mode checks.</li>
<li>Added overflow checks to wordwrap() function.</li>
<li>Added a check for special characters in the session name.</li>
<li>Improved safe_mode check for the error_log() function.</li>
<li>Updated PCRE to version 6.6.</li>
<li>Fixed handling of extremely long paths inside tempnam() function.</li>
<li>Fixed XSS inside phpinfo() with long inputs.</li>
<li>Fixed a possible buffer overflow inside create_named_pipe() for Win32 systems in libmysql.c.</li>
<li><?php bugfix(37720); ?> (merge_php_config scrambles values).</li>
<li><?php bugfix(37569); ?> (WDDX incorrectly encodes high-ascii characters).</li>
<li><?php bugfix(37510); ?> (session_regenerate_id changes session_id() even on failure).</li>
<li><?php bugfix(37360); ?> (Memory errors with a corrupt GIF file).</li>
<li><?php bugfix(37348); ?> (Make PEAR install ignore open_basedir).</li>
<li><?php bugfix(37346); ?> (Crashes when using an invalid colormap format).</li>
<li><?php bugfix(37162); ?> (wddx does not build as a shared extension).</li>
<li><?php bugfix(37046); ?> (foreach breaks static scope).</li>
<li><?php bugfix(37045); ?> (Fixed check for special chars for http redirects).</li>
<li><?php bugfix(36857); ?> (Added support for partial content fetching to the HTTP streams wrapper).</li>
<li><?php bugfix(36776); ?> (node_list_wrapper_dtor segfault).</li>
<li><?php bugfix(36459); ?> (Incorrect adding PHPSESSID to links, which contains \r\n).</li>
<li><?php bugfix(36458); ?> (sleep() accepts negative values).</li>
<li><?php bugfix(36242); ?> (Possible memory corruption in stream_select()).</li>
<li><?php bugfix(36223); ?> (curl bypasses open_basedir restrictions).</li>
<li><?php bugfix(36205); ?> (Memory leaks on duplicate cookies).</li>
<li><?php bugfix(36148); ?> (unpack("H*hex", $data) is adding an extra character to the end of the string).</li>
<li><?php bugfix(36017); ?> (fopen() crashes PHP when opening a URL).</li>
</ul>

There is a <a href="release_4_4_3.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.4.2"><!-- {{{ 4.4.2 -->
<h3>Version 4.4.2</h3>
<?php release_date("11-Jan-2006"); ?>
<ul>
<li>Added missing safe_mode/open_basedir checks into cURL extension.</li>
<li>Backported missing imap_mailcompose() fixes from PHP 5.x.</li>
<li>Prevent header injection by limiting each header to a single line.</li>
<li>Fixed possible XSS inside error reporting functionality.</li>
<li>Fixed Apache 2 regression with sub-request handling on non-linux systems.</li>
<li><?php bugfix(35817); ?> (unpack() does not decode odd number of hexadecimal values).</li>
<li><?php bugfix(35735); ?> ($EGREP not defined in configure).</li>
<li><?php bugfix(35669); ?> (imap_mail_compose() crashes with multipart-multiboundary-email).</li>
<li><?php bugfix(35655); ?> (whitespace following end of heredoc is lost).</li>
<li><?php bugfix(35646); ?> (%{mod_php_memory_usage}n is not reset after exit).</li>
<li><?php bugfix(35594); ?> (Multiple calls to getopt() may result in a crash).</li>
<li><?php bugfix(35571); ?> (Fixed crash in Apache 2 SAPI when more then one php script is loaded via SSI include).</li>
<li><?php bugfix(35536); ?> (mysql_field_type() doesn't handle NEWDECIMAL).</li>
<li><?php bugfix(35410); ?> (wddx_deserialize() doesn't handle large ints as keys properly).</li>
<li><?php bugfix(35341); ?> (Fix for bug #33760 breaks build with older curl).</li>
<li><?php bugfix(35278); ?> (Multiple virtual() calls crash Apache 2 php module).</li>
<li><?php bugfix(35257); ?> (Calling ob_flush after creating an ob callback causes segfault).</li>
<li><?php bugfix(35079); ?> (stream_set_blocking(true) toggles, not enables blocking).</li>
<li><?php bugfix(35078); ?> (configure does not find ldap_start_tls_s).</li>
<li><?php bugfix(35071); ?> (Wrong fopen mode used in GD safe-mode checks).</li>
<li><?php bugfix(35067); ?>, <?php bugfix(35063); ?> (key(),current() need to work by reference).</li>
<li><?php bugfix(35062); ?> (socket_read() produces warnings on non blocking sockets).</li>
<li><?php bugfix(35059); ?> (Apache2 crash with mod_rewrite).</li>
<li><?php bugfix(35009); ?> (ZTS: Persistent resource destruct crashes when extension is compiled as shared).</li>
<li><?php bugfix(34996); ?> (ImageTrueColorToPalette() crashes when ncolors is zero).</li>
<li><?php bugfix(34851); ?> (SO_RECVTIMEO and SO_SNDTIMEO socket options expect integer parameter on Windows).</li>
<li><?php bugfix(34830); ?> (the 5th argument of mb_send_mail does not work).</li>
<li><?php bugfix(34359); ?> (Possible crash inside fopen http wrapper).</li>
<li><?php bugfix(33963); ?> (mssql_bind() fails on input parameters).</li>
<li><?php bugfix(33760); ?> (cURL needs CRYPTO_callback functions to prevent locking).</li>
<li><?php bugfix(33720); ?> (mb_encode_mimeheader does not work for multibyte chars).</li>
<li><?php bugfix(33523); ?> (Memory leak in xmlrpc_encode_request()).</li>
<li><?php bugfix(33201); ?> (Crash when fetching some data types).</li>
<li><?php bugfix(33153); ?> (crash in mssql_next result).</li>
<li><?php bugfix(32009); ?> (crash when mssql_bind() is called more than once).</li>
<li><?php bugfix(31971); ?> (ftp_login fails on some SSL servers).</li>
<li><?php bugfix(30760); ?> (Remove MessageBox on win32 for E_CORE errors if display_startup_error is off).</li>
<li><?php bugfix(27678); ?> (number_format() crashes with large numbers).</li>

</ul>

There is a <a href="release_4_4_2.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.4.1"><!-- {{{ 4.4.1 -->
<h3>Version 4.4.1</h3>
<?php release_date("31-Oct-2005"); ?>
<ul>
<li>Added missing safe_mode checks for image* functions and cURL.</li>
<li>Added missing safe_mode/open_basedir checks for file uploads.</li>
<li>Fixed a memory corruption bug regarding included files.</li>
<li>Fixed possible INI setting leak via virtual() in Apache 2 sapi.</li>
<li>Fixed possible crash and/or memory corruption in import_request_variables().</li>
<li>Fixed potential GLOBALS overwrite via import_request_variables().</li>
<li>Fixed possible GLOBALS variable override when register_globals are ON.</li>
<li>Fixed possible register_globals toggle via parse_str().</li>
<li>Added "new_link" parameter to mssql_connect(). Bug #34369.</li>
<li><?php bugfix(34850); ?> (--program-suffix and --program-prefix not included in man page names).</li>
<li><?php bugfix(34790); ?> (preg_match_all(), named capturing groups, variable assignment/return =&gt; crash).</li>
<li><?php bugfix(34742); ?> (ftp wrapper failures caused from segmented command transfer).</li>
<li><?php bugfix(34704); ?> (Infinite recursion due to corrupt JPEG).</li>
<li><?php bugfix(34645); ?> (ctype corrupts memory when validating large numbers).</li>
<li><?php bugfix(34565); ?> (mb_send_mail does not fetch mail.force_extra_parameters).</li>
<li><?php bugfix(34557); ?> (php -m exits with "error" 1).</li>
<li><?php bugfix(34456); ?> (Possible crash inside pspell extension).</li>
<li><?php bugfix(34311); ?> (unserialize() crashes with chars above 191 dec).</li>
<li><?php bugfix(34307); ?> (on_modify handler not called to set the default value if setting from php.ini was invalid).</li>
<li><?php bugfix(34302); ?> (date('W') do not return leading zeros for week 1 to 9).</li>
<li><?php bugfix(34277); ?> (array_filter() crashes with references and objects).</li>
<li><?php bugfix(34191); ?> (ob_gzhandler does not enforce trailing \0).</li>
<li><?php bugfix(34156); ?> (memory usage remains elevated after memory limit is reached).</li>
<li><?php bugfix(34148); ?> (+,- and . not supported as parts of scheme).</li>
<li><?php bugfix(34137); ?> (assigning array element by reference causes binary mess).  </li>
<li><?php bugfix(34068); ?> (Numeric string as array key not cast to integer in wddx_deserialize()).</li>
<li><?php bugfix(34064); ?> (arr[] as param to function is allowed only if function receives argument by reference).</li>
<li><?php bugfix(33989); ?> (extract($GLOBALS,EXTR_REFS) crashes PHP).</li>
<li><?php bugfix(33987); ?> (php script as ErrorDocument causes crash in Apache 2). </li>
<li><?php bugfix(33940); ?> (array_map() fails to pass by reference when called recursively).</li>
<li><?php bugfix(33690); ?> (Crash setting some ini directives in httpd.conf).</li>
<li><?php bugfix(33673); ?> (Added detection for partially uploaded files).</li>
<li><?php bugfix(33648); ?> (Using --with-regex=system causes compile failure).</li>
<li><?php bugfix(33558); ?> (Warning with nested calls to functions returning by reference).</li>
<li><?php bugfix(33383); ?> (crash when retrieving empty LOBs).</li>
<li><?php bugfix(33156); ?> (cygwin version of setitimer doesn't accept ITIMER_PROF).</li>
<li><?php bugfix(32937); ?> (open_basedir looses trailing / in the limiter).</li>
<li><?php bugfix(32589); ?> (possible crash inside imap_mail_compose() function).</li>
<li><?php bugfix(32179); ?> (xmlrpc_encode() segfaults with recursive references).</li>
<li><?php bugfix(32160); ?> (copying a file into itself leads to data loss).</li>
<li><?php bugfix(31158); ?> (array_splice on $GLOBALS crashes).</li>
<li><?php bugfix(29983); ?> (PHP does not explicitly set mime type &amp; charset).</li>
<li><?php bugfix(29253); ?> (array_diff with $GLOBALS argument fails).</li>
<li><?php bugfix(21306); ?> (ext/sesssion: catch bailouts of write handler during RSHUTDOWN).</li>
</ul>

There is a <a href="release_4_4_1.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.4.0"><!-- {{{ 4.4.0 -->
<h3>Version 4.4.0</h3>
<?php release_date("11-Jul-2005"); ?>
<ul>
<li>Added man pages for "phpize" and "php-config" scripts.</li>
<li>Added support for .cc files in extensions.</li>
<li>Added the sorting flag SORT_LOCALE_STRING to the sort() functions which makes them sort based on the current locale.</li>
<li>Changed sha1_file() and md5_file() functions to use streams instead of low level IO.</li>
<li>Fixed memory corruptions when using references in a wrong way.</li>
<li>Fixed memory corruption in pg_copy_from() in case the as_null parameter was passed.</li>
<li>Fixed memory corruption in stristr().</li>
<li><?php bugfix(32685); ?>, <?php bugfix(29423); ?> (Segfault when using assignment by reference within function).</li>
<li><?php bugfix(33242); ?> (Mangled error message when stream fails).</li>
<li><?php bugfix(33222); ?> (segfault when CURL handle is closed in a callback).</li>
<li><?php bugfix(33214); ?> (odbc_next_result does not signal SQL errors with 2-statement SQL batches).</li>
<li><?php bugfix(33210); ?> (relax jpeg recursive loop protection).</li>
<li><?php bugfix(33200); ?> (preg_replace(): magic_quotes_sybase=On makes 'e' modifier misbehave).</li>
<li><?php bugfix(33150); ?> (shtool: insecure temporary file creation).</li>
<li><?php bugfix(33072); ?> (Add a safemode/open_basedir check for runtime save_path change).</li>
<li><?php bugfix(33070); ?> (Improved performance of bzdecompress() by several orders of magnitude).</li>
<li><?php bugfix(33057); ?> (Don't send extraneous entity-headers on a 304 as per RFC 2616 section 10.3.5).</li>
<li><?php bugfix(33019); ?> (socket errors cause memory leaks in php_strerror()).</li>
<li><?php bugfix(33017); ?> ("make distclean" gives an error with VPATH build).</li>
<li><?php bugfix(33013); ?> ("next month" was handled wrong while parsing dates).</li>
<li><?php bugfix(32974); ?> (pcntl calls malloc() from a signal handler).</li>
<li><?php bugfix(32944); ?> (Disabling session.use_cookies doesn't prevent reading session cookies).</li>
<li><?php bugfix(32936); ?> (http redirects URLs are not checked for control chars).</li>
<li><?php bugfix(32932); ?> (Oracle LDAP: ldap_get_entries invalid pointer).</li>
<li><?php bugfix(32904); ?> (pg_get_notify() ignores result_type parameter).</li>
<li><?php bugfix(32813); ?> (parse_url() does not handle scheme-only urls properly).</li>
<li><?php bugfix(32810); ?> (temporary files not using plain file wrapper).</li>
<li><?php bugfix(32802); ?> (General cookie overrides more specific cookie).</li>
<li><?php bugfix(32800); ?>, <?php bugfix(32830); ?> (ext/odbc: Problems with 64bit systems).</li>
<li><?php bugfix(32773); ?> (GMP functions break when second parameter is 0).</li>
<li><?php bugfix(32742); ?> (segmentation fault when the stream with a wrapper is not closed).</li>
<li><?php bugfix(32730); ?> (ext/crack.c fails to compile with cracklib-2.8.3).</li>
<li><?php bugfix(32670); ?> (foreach() does not issue warning on unset array arg).</li>
<li><?php bugfix(32699); ?> (pg_affected_rows() was defined when it was not available).</li>
<li><?php bugfix(32682); ?> (ext/mssql: Error on module shutdown when called from activescript).</li>
<li><?php bugfix(32647); ?> (Using register_shutdown_function() with invalid callback can crash PHP).</li>
<li><?php bugfix(32591); ?> (ext/mysql: Unsatisfied symbol: ntohs with HP-UX).</li>
<li><?php bugfix(32589); ?> (Possible crash inside imap_mail_compose, with charsets).</li>
<li><?php bugfix(32587); ?> (Apache2: errors sent to error_log do not include timestamps).</li>
<li><?php bugfix(32567); ?> (ext/gmp fails to compile in threadsafe mode).</li>
<li><?php bugfix(32538); ?> (ext/swf/swf.c does not compile with gcc-3.4.x or newer).</li>
<li><?php bugfix(32530); ?> (chunk_split() does not append endstr if chunklen is longer then the original string).</li>
<li><?php bugfix(32491); ?> (File upload error - unable to create a temporary file).</li>
<li><?php bugfix(32311); ?> (mb_encode_mimeheader() does not properly escape characters).</li>
<li><?php bugfix(32245); ?> (xml_parser_free() in a function assigned to the xml parser gives a segfault).</li>
<li><?php bugfix(32116); ?> (mysql compressed connection doesn't work under windows).</li>
<li><?php bugfix(31887); ?> (ISAPI: Custom 5xx error does not return correct HTTP response message).</li>
<li><?php bugfix(31583); ?> (php_std_date() uses short day names in non-y2k_compliance mode).</li>
<li><?php bugfix(31213); ?> (Sideeffects caused by fix of bug <?php bugfix(29493); ?>).</li>
<li><?php bugfix(30052); ?> (Crash on shutdown after odbc_pconnect()).</li>
<li><?php bugfix(29975); ?> (memory leaks when set_error_handler() is used inside error handler).</li>
<li><?php bugfix(29944); ?> (Function defined in switch, crashes).</li>
<li><?php bugfix(29338); ?> (unencoded spaces get ignored after certain tags).</li>
<li><?php bugfix(28605); ?> (Need to use -[m]ieee option for Alpha CPUs).</li>
<li><?php bugfix(28377); ?> (debug_backtrace is intermittently passing args).</li>
</ul>

There is a <a href="release_4_4_0.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.11"><!-- {{{ 4.3.11 -->
<h3>Version 4.3.11</h3>
<?php release_date("31-Mar-2005"); ?>
<ul>
<li>Added Oracle Instant Client support</li>
<li>Added checks for negative values to gmp_sqrt(), gmp_powm(), gmp_sqrtrem() and gmp_fact() to prevent SIGFPE</li>
<li>Changed phpize not to require libtool</li>
<li>Updated bundled libmbfl library (used for multibyte functions)</li>
<li>Fixed several leaks in ext/browscap and sapi/embed</li>
<li>Fixed several leaks in ext/filepro</li>
<li>Fixed build system to always use bundled libtool files</li>
<li>Fixed MacOSX shared extensions crashing on Apache startup</li>
<li><?php bugfix(32373); ?> (segfault in bzopen() if supplied path to non-existent file).</li>
<li><?php bugfix(32340); ?> (insert_before($node,NULL) does not return).</li>
<li><?php bugfix(32200); ?> (Prevent using both --with-apxs2 and --with-apxs2filter).</li>
<li><?php bugfix(32114); ?> (DOM crashing when attribute appended to Document).</li>
<li><?php bugfix(32063); ?> (mb_convert_encoding ignores named entity 'alpha').</li>
<li><?php bugfix(31960); ?> (msql_fetch_row() and msql_fetch_array() dropping columns with NULL values).</li>
<li><?php bugfix(31936); ?> (set_h_errno() is redefined incompatibly).</li>
<li><?php bugfix(31911); ?> (mb_decode_mimeheader() is case-sensitive to hex escapes).</li>
<li><?php bugfix(31858); ?> (--disable-cli does not force --without-pear).</li>
<li><?php bugfix(31842); ?> (*date('r') does not return RFC2822 conforming date string).</li>
<li><?php bugfix(31797); ?> (exif_read_data() uses too low nesting limit).</li>
<li><?php bugfix(31796); ?> (readline completion handler does not handle empty return values).</li>
<li><?php bugfix(31792); ?> (getrusage() does not provide ru_nswap value).</li>
<li><?php bugfix(31754); ?> (dbase_open() fails for mode = 1).</li>
<li><?php bugfix(31705); ?> (parse_url() does not recognize http://foo.com#bar).</li>
<li><?php bugfix(31684); ?> (dio_tcsetattr(): misconfigured termios settings).</li>
<li><?php bugfix(31699); ?> (unserialize() float problem on non-English locales).</li>
<li><?php bugfix(31623); ?> (OCILogin does not support password grace period).</li>
<li><?php bugfix(31580); ?> (fgetcsv() problematic with "" escape sequences).</li>
<li><?php bugfix(31527); ?> (crash in msg_send() when non-string is stored without being serialized).</li>
<li><?php bugfix(31514); ?> (open_basedir uses path_translated rather then cwd for . translation).</li>
<li><?php bugfix(31480); ?> (Possible infinite loop in imap_mail_compose()).</li>
<li><?php bugfix(31479); ?> (Fixed crash in chunk_split(), when chunklen &gt; strlen).</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *).</li>
<li><?php bugfix(31454); ?> (session_set_save_handler crashes PHP when supplied non-existent object ref).</li>
<li><?php bugfix(31444); ?> (Memory leak in zend_language_scanner.c).</li>
<li><?php bugfix(31442); ?> (unserialize broken on 64-bit systems).</li>
<li><?php bugfix(31440); ?> ($GLOBALS can be overwritten via GPC when  register_globals is enabled).</li>
<li><?php bugfix(31413); ?> (curl POSTFIELDS crashes on 64-bit platforms).</li>
<li><?php bugfix(31396); ?> (compile fails with gd 2.0.33 without freetype).</li>
<li><?php bugfix(31371); ?> (highlight_file() trims new line after heredoc).</li>
<li><?php bugfix(31270); ?> (missing safe_mode/open_basedir check in swf_openfile()).</li>
<li><?php bugfix(31174); ?> (compile warning in url.c).</li>
<li><?php bugfix(31159); ?> (COM object access is not working).</li>
<li><?php bugfix(31142); ?> (imap_mail_compose() fails to generate correct output).</li>
<li><?php bugfix(31398); ?> (When magic_guotes_gpc are enabled filenames with ' get cutoff).</li>
<li><?php bugfix(31288); ?> (Possible crash in mysql_fetch_field(), if mysql_list_fields() was not called previously).</li>
<li><?php bugfix(31120); ?> (mssql_query returns false on successful inserts and  stored procedures).</li>
<li><?php bugfix(31107); ?>, <?php bugfix(31110); ?>, <?php bugfix(31111); ?>, <?php bugfix(31249); ?> (Compile failure of zend_strtod.c).</li>
<li><?php bugfix(31106); ?> (Fixed crash in overloaded objects).</li>
<li><?php bugfix(31103); ?> (Better error message when c-client cannot be found).</li>
<li><?php bugfix(31101); ?> (missing kerberos header file path with --with-openssl).</li>
<li><?php bugfix(31072); ?> (var_export() does not output an array element with an empty string key).</li>
<li><?php bugfix(31060); ?> (imageftbbox() does not use linespacing parameter).</li>
<li><?php bugfix(31056); ?> (php_std_date() returns invalid formatted date if  y2k_compliance is On).</li>
<li><?php bugfix(31055); ?> (apache2filter: per request leak proportional to the full path of the request URI).</li>
<li><?php bugfix(30726); ?> (-.1 like numbers are not being handled correctly).</li>
<li><?php bugfix(30609); ?> (cURL functions bypass open_basedir).</li>
<li><?php bugfix(30573); ?> (compiler warnings in libmbfl due to invalid type cast).</li>
<li><?php bugfix(30549); ?> (incorrect character translations for some ISO8859 charsets).</li>
<li><?php bugfix(30446); ?> (apache2handler: virtual() includes files out of sequence)</li>
<li><?php bugfix(30430); ?> (odbc_next_result() doesn't bind values and that results  in segfault).</li>
<li><?php bugfix(30120); ?> (imagettftext() and imagettfbbox() accept too many parameters).</li>
<li><?php bugfix(29733); ?> (printf() handles repeated placeholders wrong).</li>
<li><?php bugfix(29424); ?> (width and height inverted for JPEG2000 files).</li>
<li><?php bugfix(28976); ?> (mail(): use "From:" from headers if sendmail_from is empty).</li>
<li><?php bugfix(28930); ?> (PHP sources pick wrong header files generated by bison).</li>
<li><?php bugfix(28804); ?> (ini-file section parsing pattern is buggy).</li>
<li><?php bugfix(28803); ?> (enabled debug causes bailout errors with CLI on AIX because of fflush() called on already closed filedescriptor).</li>
<li><?php bugfix(28451); ?> (corrupt EXIF headers have unlimited recursive IFD directory entries).</li>
<li><?php bugfix(28220); ?> (mb_strwidth() returns wrong width values for some handful chars).</li>
<li><?php bugfix(28086); ?> (crash inside overload() function).</li>
<li><?php bugfix(28074); ?> (FastCGI: stderr should be written in a FCGI stderr stream).</li>
<li><?php bugfix(28067); ?> (partially incorrect utf8 to htmlentities mapping).</li>
<li><?php bugfix(27633); ?> (Double \r problem on ftp_get in ASCII mode on Win32).</li>
<li><?php bugfix(18613); ?> (Multiple OUs in x509 certificate not handled properly).</li>
<li><?php bugfix(7782); ?> (Cannot use PATH_INFO fully with php isapi).</li>
</ul>

There is a <a href="release_4_3_11.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.10"><!-- {{{ 4.3.10 -->
<h3>Version 4.3.10</h3>
<?php release_date("14-Dec-2004"); ?>
<ul>
<li>Added the %F modifier to *printf to render a non-locale-aware representation of a float with the . as decimal separator.</li>
<li>Fixed a bug in addslashes() handling of the '\0' character.</li>
<li>Backported Marcus' foreach() speedup patch from PHP 5.x.</li>
<li>Fixed potential problems with unserializing invalid serialize data.</li>
<li><?php bugfix(31034); ?> (Problem with non-existing iconv header file).</li>
<li><?php bugfix(31024); ?> (Crash in fgetcsv() with negative length).</li>
<li><?php bugfix(31019); ?> (Logic error mssql library checking).</li>
<li><?php bugfix(30995); ?> (snmp extension does not build with net-snmp 5.2).</li>
<li><?php bugfix(30990); ?> (allow popen() on *NIX to accept 'b' flag).</li>
<li><?php bugfix(30826); ?> (Certain reference relations cannot be unserialized properly).</li>
<li><?php bugfix(30750); ?> (Meaningful error message when upload directory is not  accessible).</li>
<li><?php bugfix(30739); ?> (imagefill does not set back alphablending mode).</li>
<li><?php bugfix(30672); ?> (Problem handling exif data in jpeg images at unusual places).</li>
<li><?php bugfix(30658); ?> (Ensure that temporary files created by GD are removed).</li>
<li><?php bugfix(30654); ?> (oci8 persistent connection is deleted from hash if there was exclusive connection with the same credentials).</li>
<li><?php bugfix(30613); ?> (Prevent infinite recursion in url redirection).</li>
<li><?php bugfix(30587); ?> (array_multisort doesn't separate zvals before changing them).</li>
<li><?php bugfix(30475); ?> (curl_getinfo() may crash in some situations).</li>
<li><?php bugfix(30442); ?> (segfault when parsing ?getvariable[][ ).</li>
<li><?php bugfix(30388); ?> (rename across filesystems loses ownership and permission info).</li>
<li><?php bugfix(30282); ?> (segfault when using unknown/unsupported session.save_handler and/or session.serialize_handler).</li>
<li><?php bugfix(30281); ?> (Prevent non-wbmp images from being detected as such).</li>
<li><?php bugfix(30276); ?> (Possible crash in ctype_digit on large numbers).</li>
<li><?php bugfix(30229); ?> (imagerectangle and imagefilledrectangle do work well with alpha channel, corners are drawn twice).</li>
<li><?php bugfix(30224); ?> (Sybase date strings are sometimes not null terminated).</li>
<li><?php bugfix(30133); ?> (get_current_user() crashes on Windows).</li>
<li><?php bugfix(30057); ?> (did not detect IPV6 on FreeBSD 4.1).</li>
<li><?php bugfix(30027); ?> (Possible crash inside ftp_get()).</li>
<li><?php bugfix(29805); ?> (HTTP Authentication Issues).</li>
<li><?php bugfix(29418); ?> (double free when openssl_csr_new fails)..</li>
<li><?php bugfix(28598); ?> (Lost support for MS Symbol fonts).</li>
<li><?php bugfix(28325); ?> (Circular references not properly serialized).</li>
<li><?php bugfix(28228); ?> (NULL decimal separator is not being handled correctly).</li>
<li><?php bugfix(27469); ?> (serialize() objects of incomplete class).</li>

</ul>

There is a <a href="release_4_3_10.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.9"><!-- {{{ 4.3.9 -->
<h3>Version 4.3.9</h3>
<?php release_date("22-Sep-2004"); ?>
<ul>
<li>GPC input processing fixes.</li>
<li>Implemented periodic PCRE compiled regexp cache cleanup, to avoid memory exhaustion.</li>
<li>Fixed bug with raw_post_data not getting set.</li>
<li>Fixed a file-descriptor leak with phpinfo() and other 'special' URLs.</li>
<li>Rewritten UNIX and Windows install help files.</li>
<li>Updated PCRE to provide better error handling in certain cases.</li>
<li>NSAPI: added "bucket" parameter to list of non-php.ini-keys of php4_execute for doing performance stats without warnings in server-log.</li>
<li>Fixed leap year checking with idate().</li>
<li>Fixed strip_tags() to correctly handle '\0' characters.</li>
<li>Fixed funny forking effect in FastCGI when PHP_FCGI_CHILDREN was not set.</li>
<li><?php bugfix(30050); ?> (Possible crash inside php_shutdown_config()).</li>
<li><?php bugfix(29882); ?> (isset crashes on arrays).</li>
<li><?php bugfix(29753); ?> (mcal_fetch_event() allows 2nd argument to be optional).</li>
<li><?php bugfix(29727); ?> (Added missing CURL authentication directives).</li>
<li><?php bugfix(29719); ?> (fgetcsv() has problem parsing strings ending with escaped enclosures).</li>
<li><?php bugfix(29607); ?> (highlighting code with HEREDOC produces invalid output).</li>
<li><?php bugfix(29599); ?> (domxml_error segfaults another apache module).</li>
<li><?php bugfix(29594); ?> (Use PHP's own tmpfile() implementation).</li>
<li><?php bugfix(29581); ?> (Typo inside php.ini comments for mysql.trace_mode).</li>
<li><?php bugfix(29493); ?> (extract(array, EXTR_REFS) misbehaves with elements referred twice or more times).</li>
<li><?php bugfix(29443); ?> (Sanity check for wbmp detection).</li>
<li><?php bugfix(29369); ?> (Uploaded files with ' or " in their names get their names truncated at those characters).</li>
<li><?php bugfix(29349); ?> (imagecreatefromstring() crashes with external GD library).</li>
<li><?php bugfix(29333); ?> (output_buffering+trans_sess_id can corrupt output).</li>
<li><?php bugfix(29226); ?> (ctype_* functions missing validation of numeric string representations).</li>
<li><?php bugfix(29209); ?> (imap_fetchbody() doesn't check message index).</li>
<li><?php bugfix(29116); ?> (Zend constant warning uses memory after free).</li>
<li><?php bugfix(29114); ?> (Potential double free in php_stat).</li>
<li><?php bugfix(29075); ?> (strnatcmp() incorrectly handles whitespace).</li>
<li><?php bugfix(29049); ?> (array sorting via user function/method does not validate it).</li>
<li><?php bugfix(29038); ?> (extract() with EXTR_PREFIX_SAME prefixes empty strings).</li>
<li><?php bugfix(29034); ?> (wordwrap() returns a boolean when passed empty string).</li>
<li><?php bugfix(28974); ?> (overflow in array_slice(), array_splice(), substr, substr_replace(), strspn(), strcspn()).</li>
<li><?php bugfix(28897); ?> (ibase: -1 returned as -0.000 for 64-bit scaled int).</li>
<li><?php bugfix(28879); ?> (Implicit/Explicit array creation inconsistency when using Resources, Arrays, or Objects as indices).</li>
<li><?php bugfix(28878); ?> (Setting of inikey's in obj.conf fails).</li>
<li><?php bugfix(28868); ?> (Internal wrapper registry not thread safe).</li>
<li><?php bugfix(28818); ?> (Apache 2 sapis do not export st_dev).</li>
<li><?php bugfix(28800); ?> (strings beginning with "inf" improperly converted).</li>
<li><?php bugfix(28723); ?> (Fixed mbstring config.m4 to work on OSes where test command does not support -e parameter).</li>
<li><?php bugfix(28692); ?> (\0 in Authenticate header passed via safe_mode).</li>
<li><?php bugfix(28670); ?> (WWW-Authentication header mangling with PCRE in safe_mode adds extra spaces).</li>
<li><?php bugfix(28668); ?> (glob() does not work with relative paths on Windows).</li>
<li><?php bugfix(28649); ?> (Proper glob() return value on Linux when there are no matches).</li>
<li><?php bugfix(28633); ?> (sprintf incorrectly adding padding to floats).</li>
<li><?php bugfix(28627); ?> (When multiple MySQL links are used default link is leaked).</li>
<li><?php bugfix(28525); ?> (gmp_powm() does not work with hexadecimal string modulo represented as a string).</li>
<li><?php bugfix(28512); ?> (Allocate enough space to store MSSQL data).</li>
<li><?php bugfix(28466); ?> (mbstring_convert_variables() array separation problem).</li>
<li><?php bugfix(28175); ?> (Allow bundled GD to compile against freetype 2.1.2).</li>

</ul>
There is a <a href="release_4_3_9.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.8"><!-- {{{ 4.3.8 -->
<h3>Version 4.3.8</h3>
<?php release_date("13-Jul-2004"); ?>
<ul>
<li>Fixed strip_tags() to correctly handle '\0' characters. (Stefan)</li>
<li>Improved stability during startup when memory_limit is used. (Stefan)</li>
<li>Replace alloca() with emalloc() for better stack protection. (Ilia)</li>
<li>Added missing safe_mode checks inside ftok and itpc. (Ilia)</li>
<li><?php bugfix(28963); ?> Fixed address allocation routine in IMAP extension. (Ilia)</li>
<li><?php bugfix(28632); ?> Prevent open_basedir bypass via MySQL's LOAD DATA LOCAL. (Ilia)</li>
</ul>

There is a <a href="release_4_3_8.php">separate announcement</a> available for this release.<br>
<!-- }}} --></section>

<section class="version" id="4.3.7"><!-- {{{ 4.3.7 -->
<h3>Version 4.3.7</h3>
<?php release_date("03-Jun-2004"); ?>
<ul>
<li>Upgraded bundled GD library to 2.0.23. (Ilia)</li>
<li>Changed user error handler mechanism to relay to built-in error handler if it returns false. (Andrei)</li>
<li>Fixed command line escaping routines for win32. (Ilia)</li>
<li>Fixed problems with *printf() functions and '%f' formatting. (Marcus)</li>
<li>Fixed possible crash inside pg_copy_(to|from) function if delimiter is more then 1 character long. (Ilia)</li>
<li>Fixed crash inside cpdf_place_inline_image() when working with true-color images. (Ilia)</li>
<li>Fixed handling of return values from stored procedures in mssql_execute() with multiple result sets returned. (Frank)</li>
<li>Fixed logic bug in session_register() which allowed registering _SESSION and/or HTTP_SESSION_VARS. (Sara)</li>
<li><?php bugfix(28597); ?> (xmlrpc_encode_request() incorrectly encodes chars in 200-210 range). (fernando dot nemec at folha dot com dot br, Ilia)</li>
<li><?php bugfix(28569); ?> (informix connection id is not thread safe). (novicky at aarongroup dot cz, Ard)</li>
<li><?php bugfix(28564); ?> (Problem building informix as a shared extension).  (roques at mti dot ag, Ilia)</li>
<li><?php bugfix(28508); ?> (Do not make hypot() available if not supported by libc). (Ilia)</li>
<li><?php bugfix(28506); ?> (Allow negative start angle in imagearc and imagefilledarc). (Pierre)</li>
<li><?php bugfix(28456); ?> (Problem with enclosed / in uploaded files). (Antony)</li>
<li><?php bugfix(28386); ?> (wordwrap() wraps lines 1 character too soon). (Ilia)</li>
<li><?php bugfix(28374); ?> (Possible unterminated loop inside _php_pgsql_trim_message()). (Ilia)</li>
<li><?php bugfix(28355); ?> (glob() does not return error on Linux when it does not have permission to open the directory). (Ilia)</li>
<li><?php bugfix(28289); ?> (incorrect resolving of relative paths by glob() in windows). (Ilia)</li>
<li><?php bugfix(28229); ?> (run-tests tripped up by spaces in names). (Marcus)</li>
<li><?php bugfix(28228); ?> (number_format() does not allow empty decimal separator). (Ilia)</li>
<li><?php bugfix(28196); ?> (missing error constants in cURL extension). (Ilia)</li>
<li><?php bugfix(28187); ?> (parse_url() not handling embedded IPv6 in URLs). (Sara)</li>
<li><?php bugfix(28175); ?> (build problem for people using FreeType 2.1.0-2.1.2). (Ilia)</li>
<li><?php bugfix(28147); ?> (Crash with drawing anti-aliased lines). (Derick)</li>
<li><?php bugfix(28122); ?> (dba_open db3: Permission denied). (Marcus)</li>
<li><?php bugfix(28112); ?> (sqlite_query() crashing apache on malformed query). (Ilia, Marcus)</li>
<li><?php bugfix(28055); ?> (timeout duration too long in feof()/pfsockopen() liveness checks). (Wez)</li>
<li><?php bugfix(28087); ?> (Do not force mysql.trace_mode to 0 on every request). (Ilia)</li>
<li><?php bugfix(28042); ?> (greek letters in html to entity mapping not correct). (Derick)</li>
<li><?php bugfix(28007); ?> (compile mssql extension with old versions of FreeTDS fails). (Frank)</li>
<li><?php bugfix(27995); ?> (imagefilltoborder() stops the fill process prematurely). (Ilia)</li>
<li><?php bugfix(27810); ?> (don't use php's pemalloc in ext/pcre). (Joe Orton)</li>
<li><?php bugfix(23220); ?> (SSL: fatal protocol error when talking to IIS). (Wez)</li>

</ul>
There is a <a href="release_4_3_7.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.6"><!-- {{{ 4.3.6 -->
<h3>Version 4.3.6</h3>
<?php release_date("15-Apr-2004"); ?>
<ul>
<li>Updated bundled PDFLib library to version 5.0.3p1 in Windows distribution. (Edin)</li>
<li>Synchronized bundled GD library with GD 2.0.22. (Ilia)</li>
<li>Fixed a crash in multi-threaded environments when a thread is shutdown by the web server. (Stas)</li>
<li>Fixed a bug that prevented building of the GD extension against external GD lib 1.X. (Ilia, Edin, Nick Talbott).</li>
<li><?php bugfix(27963); ?> (Session lifetime setting may leak between requests). (Ilia)</li>
<li><?php bugfix(27849); ?> (configure craps out on trivial syntax error). (Derick)</li>
<li><?php bugfix(27822); ?> (is_resource() returns TRUE for closed resources). (Derick)</li>
<li><?php bugfix(27819); ?> (problems returning reference to a reference parameter). (Ilia)</li>
<li><?php bugfix(27809); ?> (ftp_systype returns null on some ftp servers). (Ilia)</li>
<li><?php bugfix(27802); ?> (default number of children to 8 when PHP_FCGI_CHILDREN is not defined). (Ilia)</li>
<li><?php bugfix(27780); ?> (strtotime(+1 xxx) returns a wrong date/time). (Derick)</li>
<li><?php bugfix(27769); ?> (domxml_xmltree crashes). (Rob)</li>
<li><?php bugfix(27764); ?> (Get return value from a stored procedure not returning any result sets). (Frank)</li>
<li><?php bugfix(27762); ?> (SCO Openserver doesn't have S_ISSOCK). (Wez)</li>
<li><?php bugfix(27743); ?> (Make sure Money types are converted and returned correctly). (Frank)</li>
<li><?php bugfix(27732); ?> (Fixed compilation bug inside php_sab_info.h). (Ilia)</li>
<li><?php bugfix(27731); ?> (error_reporting() inside @ block fails to set error_reporting level). (Ilia)</li>
<li><?php bugfix(27719); ?> (mktime issues on and around DST changeover). (Rasmus)</li>
<li><?php bugfix(27717); ?> (Test Failures when compiled on 64-bit mode). (Ard, Derick)</li>
<li><?php bugfix(27687); ?> (Bug Adding Default Charset to 'text/*' Content-Type Header). (Marcus)</li>
<li><?php bugfix(27663); ?> (compile failure with cURL 7.11.1). (Ilia)</li>
<li><?php bugfix(27646); ?> (Cannot serialize/unserialize non-finite numeric values). (Marcus)</li>
<li><?php bugfix(26757); ?> (session.save_path default is bogus for win32). (Wez)</li>
<li><?php bugfix(26589); ?> (Crash inside mssql extension when selecting many columns of type money). (Frank)</li>
<li><?php bugfix(25547); ?> (error_handler and array index with function call). cschneid at cschneid dot com)</li>

</ul>
There is a <a href="release_4_3_6.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.5"><!-- {{{ 4.3.5 -->
<h3>Version 4.3.5</h3>
<?php release_date("26-Mar-2004"); ?>
<ul>

<li>Fixed possible crash using an invalid color index with a palette image in imagecolortransparent (Pierre)</li>
<li>Fixed php-cgi to not ignore command-line switches when run in a web context. This fixes our test cases allowing INI with GET sections to work (Rasmus)</li>
<li>Fixed getopt() so it works without $_SERVER (Rasmus, bfrance)</li>
<li>Fixed crash in php_ini_scanned_files() when no additional INI files were actually parsed. (Jon)</li>
<li>Fixed possible crashes inside socket extension, due to missing check inside allocation functions. (Ilia)</li>
<li>Fixed zero bytes memory allocation when no extra ini files are found in the --with-config-file-scan-dir specified directory. (Eric Colinet, Derick)</li>
<li>Changed "allow_url_fopen" php.ini option to be PHP_INI_SYSTEM. (Sara)</li>
<li>Improved the sybase_ct module: (Timm)
 <ul>
  <li>Added ability to define a message handler not only globally, but also per connection.</li>
  <li>Added "sybct.packet_size" php.ini option.</li>
  <li>Changed "sybct.login_timeout" php.ini option changeable at runtime.</li>
  <li>Fixed memory leak in sybase_set_message_handler().</li>
  </ul></li>
<li>Synchronized bundled GD library with GD 2.0.17</li>
<li>Upgraded PCRE library to version 4.5. (Andrei)</li>
<li>Updated bundled PostgreSQL library to version 7.4 in Windows distribution. (Edin)</li>
<li>Added support for --program-prefix and --program-suffix configure options. (Jani)</li>
<li>Added a warning when creating temp stream fails with ftp_(n)list(). (Sara)</li>
<li>Fixed header handler in NSAPI SAPI module (header-&gt;replace was ignored, send_default_content_type now sends value from php.ini). (Uwe Schindler)</li>
<li><?php bugfix(27633); ?> (Incorrect EOL translation by ftp_get() in ASCII mode). (Ilia)</li>
<li><?php bugfix(27600); ?> (GCC 3.0.4 does not like __attribute__ directive). (Sascha)</li>
<li><?php bugfix(27590); ?> (crash during shutdown when freeing persistent resources in ZTS mode). (Ilia)</li>
<li><?php bugfix(27582); ?> (possible crashes in imagefilltoborder()). (Pierre)</li>
<li><?php bugfix(27580); ?> (pre-initialization errors in ap2 handler are not being written to vhost error log). (Ilia)</li>
<li><?php bugfix(27559); ?> (Corrected open_basedir resolving logic). (Ilia)</li>
<li><?php bugfix(27530); ?> (broken http auth when safe_mode is on and PCRE is disabled). (Ilia)</li>
<li><?php bugfix(27509); ?> (broken getaddrinfo() causes fsockopen() error). (Sara)</li>
<li><?php bugfix(27505); ?> (htmlentities() does not handle BIG5 correctly). (Ilia, ywliu at hotmail dot com)</li>
<li><?php bugfix(27498); ?> (bogus safe_mode error on nonexistent directories for chdir() and opendir() functions). (Ilia)</li>
<li><?php bugfix(27460); ?> (base64_decode() does not handle extra padding). (Ilia, naish at klanen dot net)</li>
<li><?php bugfix(27443); ?> (defined() returns wrong type). (Derick)</li>
<li><?php bugfix(27437); ?> (wrong freetype include inside GD library). (Ilia)</li>
<li><?php bugfix(27424); ?> (headers missing on flush() in apache 2 SAPIs). (Ilia)</li>
<li><?php bugfix(27421); ?> (mbstring.func_overload should be system ini setting). (Ilia)</li>
<li><?php bugfix(27384); ?> (unpack() misbehaves with 1 char string). (GeorgeS)</li>
<li><?php bugfix(27383); ?> (Potential crash inside fopen_wrapper, while parsing response code). (Ilia)</li>
<li><?php bugfix(27354); ?> (Modulus operator crashes PHP). (Derick)</li>
<li><?php bugfix(27341); ?> (HEAD requests fail to return data). (Ilia)</li>
<li><?php bugfix(27337); ?> (missing sapi_shutdown() in sapi/isapi causes memory leak). (Jani, msisolak at yahoo dot com)</li>
<li><?php bugfix(27328); ?> (ftp extension relies on 32-bit longs). (Sara)</li>
<li><?php bugfix(27300); ?> (Improved regex for pg_convert()). (benjcarson at digitaljunkies dot ca, Ilia)</li>
<li><?php bugfix(27295); ?> (memory leak inside sscanf()). (Ilia)</li>
<li><?php bugfix(27293); ?> (two crashes inside image2wbmp()). (Ilia)</li>
<li><?php bugfix(27291); ?> (get_browser matches browscap.ini patterns incorrectly). (Jay)</li>
<li><?php bugfix(27278); ?> (*printf() functions treat arguments as if passed by reference). (Ilia)</li>
<li><?php bugfix(27238); ?> (iptcparse() function misses some fields). (Pierre)</li>
<li><?php bugfix(27235); ?> (Interbase NUMERIC x.0 field returns empty string on 0). (Ard)</li>
<li><?php bugfix(27196); ?> (Missing content_length initialization in apache 2 sapis). (Ilia, pdoru at kappa dot ro)</li>
<li><?php bugfix(27183); ?> (userland stream wrapper segfaults on stream_write). (Moriyoshi)</li>
<li><?php bugfix(27175); ?> (tzset() is not being called by PHP on startup). (Ilia, sagawa at sohgoh dot net)</li>
<li><?php bugfix(27172); ?> (Possible floating point exception in gmp_powm()). (Ilia)</li>
<li><?php bugfix(27171); ?> (crash inside gmp_hamdist()). (Jani)</li>
<li><?php bugfix(27157); ?> (Compile Failure on Solaris 8). (Timm)</li>
<li><?php bugfix(27149); ?> (broken CLOB support in oci8 extension). (Antony)</li>
<li><?php bugfix(27135); ?> (Possible crash inside mb_strlen()). (Moriyoshi)</li>
<li><?php bugfix(27104); ?> (CLI/CGI SAPI module variable name conflict). (Marcus)</li>
<li><?php bugfix(27058); ?> (crash in sybase_connect() with 2 arguments). (Ilia)</li>
<li><?php bugfix(27056); ?> (ints used instead of longs inside some GD functions). (Ilia)</li>
<li><?php bugfix(27040); ?> (passing an array of form-fields to CURLOPT_POSTFIELDS does not work). (Ilia, Jani)</li>
<li><?php bugfix(27037); ?> (fixed possible crash in apache2handler output code). (Ilia)</li>
<li><?php bugfix(27026); ?> (Added "cgi.nph" php.ini option to allow forcing of the 'Status: 200' header that is not normally needed). (Ilia)</li>
<li><?php bugfix(27011); ?> (64bit int/long confusion in preg_match*() functions). (Ilia)</li>
<li><?php bugfix(27007); ?> (missing connection closure when connect fails in pgsql). (Ilia)</li>
<li><?php bugfix(26974); ?> (rename() doesn't check the destination file against safe_mode/open_basedir). (Ilia)</li>
<li><?php bugfix(26973); ?> (*printf() '+' modifier broken). (Jani)</li>
<li><?php bugfix(26969); ?> (--with-openssl=shared build fails). (Jani)</li>
<li><?php bugfix(26968); ?> (Segfault with Interbase module built as shared). (Ard)</li>
<li><?php bugfix(26949); ?> (rand(min,max) always returns min when ZTS enabled). (Jani)</li>
<li><?php bugfix(26937); ?> (Warning in xml.c). (Jani)</li>
<li><?php bugfix(26927); ?> (preg_quote() does not escape \0). (Ilia)</li>
<li><?php bugfix(26923); ?> (ext/imap: pam and crypt libraries missing when build as shared extension). (Jani)</li>
<li><?php bugfix(26909); ?> (crash in imap_mime_header_decode() when no encoding is used). (Ilia)</li>
<li><?php bugfix(26896); ?> (ext/ftp does not work as shared extension). (Jani)</li>
<li><?php bugfix(26892); ?> (ORA-21301 in ocinewcollection() call). (Antony)</li>
<li><?php bugfix(26878); ?> (problem with multiple references to the same variable with different types). (Ilia)</li>
<li><?php bugfix(26864); ?> (pg_(update|delete) ignore PGSQL_DML_EXEC option). (Ilia)</li>
<li><?php bugfix(26862); ?> (ob_flush() followed by output_reset_rewrite_vars() may result in data loss). (Ilia, scottmacvicar at ntlworld dot com)</li>
<li><?php bugfix(26847); ?> (memory leak in mail() when to/subject contain only spaces). (Ilia)</li>
<li><?php bugfix(26814); ?> (When included file has a parse error, terminate script execution). (Ilia)</li>
<li><?php bugfix(26777); ?> (ext/interbase: Let DB handle NULL params). (Ard)</li>
<li><?php bugfix(26772); ?>, #26967 (file operations return NULL instead of FALSE). (Wez, Ilia)</li>
<li><?php bugfix(26758); ?> (FastCGI exits immediately with status 255). (Ilia, tcarter at noggin dot com dot au)</li>
<li><?php bugfix(26755); ?> (CLI now overrides php.ini settings and switches off output buffering). (Edin)</li>
<li><?php bugfix(26753); ?> (zend_fetch_list_dtor_id() doesn't check NULL strings). (Jani, Markus dot Lidel at shadowconnect dot com)</li>
<li><?php bugfix(26752); ?> (Silent unterminated loop when length parameter for fgets(), fread() and fgetss() is 0). (Ilia)</li>
<li><?php bugfix(26751); ?> (PHP can't find the MySQL socket on a case sensitive file system). (Derick)</li>
<li><?php bugfix(26703); ?> (Certain characters inside strings incorrectly treated as keywords). (vrana [at] php [dot] net, Ilia)</li>
<li><?php bugfix(26699); ?> (mbstring doesn't identify "binary" as a valid encoding). (nirva-php at ishiboo dot com, Moriyoshi)</li>
<li><?php bugfix(26667); ?> (Added safety checks to ip2long()). (Ilia)</li>
<li><?php bugfix(26653); ?> (open_basedir incorrectly resolved on win32). (Ilia, scottmacvicar at ntlworld dot com)</li>
<li><?php bugfix(26639); ?> (mb_convert_variables() clutters variables beyond the references). (Moriyoshi)</li>
<li><?php bugfix(26635); ?> (fixed look up for fonts in the current directory w/ZTS). (Ilia)</li>
<li><?php bugfix(26625); ?> (pg_convert sets NULL incorrectly for character data types). (Ilia)</li>
<li><?php bugfix(26604); ?> (Apache2 SAPIs implicitly disable Keep-Alive). (Ilia)</li>
<li><?php bugfix(26595); ?> (ext/domxml: XSLT_NAMESPACE undeclared). (Christian)</li>
<li><?php bugfix(26565); ?> (strtotime("this month") resolving to the wrong month). (Jani)</li>
<li><?php bugfix(26564); ?> (ncurses5 has headers in PREFIX/include/ncurses/). (Jani)</li>
<li><?php bugfix(26548); ?> (ext/session: Malformed HTTP dates headers). (Derick)</li>
<li><?php bugfix(26531); ?> (ext/domxml: get_elements_by_tag_name() wildcard fails). (Rob Richards)</li>
<li><?php bugfix(26488); ?> (Missing declaration of CRTSCTS in ext/dio/dio.c). (Jani)</li>
<li><?php bugfix(26467); ?> (flock() does not force the "wouldblock" parameter to be passed by reference). (Wez)</li>
<li><?php bugfix(26463); ?> (Incorrect handling of semicolons after heredoc). (Ilia)</li>
<li><?php bugfix(26462); ?> (phpize + ext/bcmath -&gt; compile error). (Jani)</li>
<li><?php bugfix(26461); ?> (-lssl missing from LIBS). (Jani)</li>
<li><?php bugfix(26458); ?> (var_dump(), var_export(), debug_zval_dump() not binary safe for array keys). (Ilia)</li>
<li><?php bugfix(26447); ?> (--with-openssl=shared causes compile errors). (Jani)</li>
<li><?php bugfix(26446); ?> (domxml_open_file() returns an empty error-Array). (Rob)</li>
<li><?php bugfix(26440); ?> (MFH missing context options). (Ilia)</li>
<li><?php bugfix(26438); ?> (error in thttpd SAPI installation). (Jani)</li>
<li><?php bugfix(26415); ?> (Updated bundled OpenSSL DLLs in the Windows distribution to 0.9.7c). (Edin)</li>
<li><?php bugfix(26407); ?> (Result set fetching broken around transactions). (Timm)</li>
<li><?php bugfix(26391); ?> (parse_url() destroys strings that contain a character in range of \x80-\xff)). (Moriyoshi)</li>
<li><?php bugfix(26384); ?> (crash in domxslt-&gt;process()). (Christian)</li>
<li><?php bugfix(26381); ?> (rand() without srand() doesn't work with certain php.ini). (Jani)</li>
<li><?php bugfix(26376); ?> (typo in ext/odbc/config.m4: DBMaker test fails). (Jani)</li>
<li><?php bugfix(26355); ?> (flock() doesn't initialize the wouldblock argument). (Ilia)</li>
<li><?php bugfix(26309); ?> (Fixed argument parsing for imageftbbox()). (Ilia)</li>
<li><?php bugfix(26304); ?> (Unexpected data loss when opening dba file). (Marcus)</li>
<li><?php bugfix(26285); ?> (escapeshellarg() uses wrong quotes on windows). (Ilia)</li>
<li><?php bugfix(26267); ?> (gmp_random() leaks memory and does not produce random numbers). (Jani)</li>
<li><?php bugfix(26253); ?> (ext/tokenizer: build as shared extension fails). (Jani)</li>
<li><?php bugfix(26235); ?> (yp_first/yp_next do not specify correct key length). (Ilia)</li>
<li><?php bugfix(26216); ?> ("getimagesize(): stream does not support seeking" when using remote files). (Marcus)</li>
<li><?php bugfix(26201); ?> (crash in ibase_trans() on invalid link handle). (Ilia)</li>
<li><?php bugfix(26198); ?> (strtotime() handling of M/F Y date format). (Ilia)</li>
<li><?php bugfix(26194); ?> (iconv() not properly defined with libiconv). (Steph, Frank, Moriyoshi)</li>
<li><?php bugfix(26176); ?> (Fixed handling of numeric keys in INI files). (Ilia)</li>
<li><?php bugfix(26168); ?> (shtool availability check in phpize). (robbat2 at gentoo dot org, Ilia)</li>
<li><?php bugfix(26148); ?> (Print the notice before modifying variable on type mismatch). (morten-bugs dot php dot net at afdelingp dot dk, Ilia)</li>
<li><?php bugfix(26128); ?> (mbstring prints out wrong information on phpinfo()). (Moriyoshi)</li>
<li><?php bugfix(26113); ?> (remove leftover local file when ftp_get/ftp_nb_get fails). (Ilia)</li>
<li><?php bugfix(26105); ?> (Compile failure on GCC version 3.0.X). (Ilia)</li>
<li><?php bugfix(26103); ?> (ext/mime_magic causes compile failure in ext/mssql). (Jani)</li>
<li><?php bugfix(26097); ?> (gdImageColorClosestAlpha() returns incorrect results). (sprice at wisc dot edu, Ilia)</li>
<li><?php bugfix(26042); ?> (memory leak if mcrypt_generic_deinit() is not called after every mcrypt_generic_init() call). (Ilia)</li>
<li><?php bugfix(26025); ?> (Segfault on glob() without GLOB_NOCHECK or GLOB_NOMAGIC under *BSD platforms). (Moriyoshi)</li>
<li><?php bugfix(26005); ?> (Random "cannot change the session ini settings" errors). (Jani, jsnajdr at kerio dot com)</li>
<li><?php bugfix(26003); ?> (Make fgetcsv() binary safe). (Ilia, Moriyoshi)</li>
<li><?php bugfix(25963); ?> (PostgreSQL error message include \n characters). (Marcus, Ilia)</li>
<li><?php bugfix(25939); ?> (feof() not working correctly for sockets). (Wez)</li>
<li><?php bugfix(25916); ?> (get_browser() -&gt; PHP Fatal error: Nesting level too deep - recursive dependency?). (Uwe Schindler)</li>
<li><?php bugfix(25794); ?> (Cannot open existing hash db3 file with write" ext/dba). (Marcus)</li>
<li><?php bugfix(25753); ?> (php.ini settings "leak" from vhosts/.htaccess files). (Patch by: rover at tob dot ru)</li>
<li><?php bugfix(25694); ?> (round() and number_format() give inconsistent results). (Ilia)</li>
<li><?php bugfix(25664); ?> (calling ITypeInfo::Invoke with bogus params). (Wez)</li>
<li><?php bugfix(25581); ?> (getimagesize () return incorrect values on bitmap (os2) files). (Marcus)</li>
<li><?php bugfix(25329); ?> (sqlite_create_function with method and reference to $this). (Marcus).</li>
<li><?php bugfix(24773); ?> (unsetting string as array causes a crash). (Sara)</li>
<li><?php bugfix(24773); ?> (Unsetting string offsets crashes PHP). (Moriyoshi, Sara)</li>
<li><?php bugfix(24582); ?> (extensions can't be loaded dynamically in Solaris/iPlanet). (Jani)</li>
<li><?php bugfix(23467); ?> (date('T') outputs incorrect Time Zone). (Jani, scottmacvicar at ntlworld dot com)</li>
<li><?php bugfix(22403); ?> (PHP crashes when executing a sql procedure without parameters). (Timm)</li>
<li><?php bugfix(22127); ?> (Invalid response code when force-cgi-redirect safety mechanism is triggered). (Ilia, scottmacvicar at ntlworld dot com)</li>
<li><?php bugfix(21760); ?> (Use of uninitialized pointer inside php_read()). (Ilia, uce at ftc dot gov)</li>
<li><?php bugfix(21513); ?> (shutdown functions not executed if timed out). (Zeev)</li>
<li><?php bugfix(21070); ?> (ftp_genlist/ANSI-tmpfile() fail w/ some platform). (Sara)</li>

</ul>
There is a <a href="release_4_3_5.php">separate announcement</a> available for this release.<br>


<!-- }}} --></section>

<section class="version" id="4.3.4"><!-- {{{ 4.3.4 -->
<h3>Version 4.3.4</h3>
<?php release_date("03-Nov-2003"); ?>
<ul>
<li>Made MCVE extension available on win32. (Jani)</li>
<li>Upgraded bundled libfcgi and made FastCGI support viable on Win32. (Sascha)</li>
<li>Added apache_get_version() function. (Ilia)</li>
<li>Fixed disk_total_space() and disk_free_space() under FreeBSD. (Jon Parise)</li>
<li>Fixed crash bug when non-existing save/serializer handler was used. (Jani)</li>
<li>Fixed memory leak in gethostbynamel() if an error occurs. (Sara)</li>
<li>Fixed FastCGI being unable to bind to a specific IP. (Sascha)</li>
<li>Fixed multibyte regex engine to properly handle ".*" pattern under POSIX compatible mode. (K.Kosako &lt;kosako at sofnec.co.jp&gt;, Moriyoshi)</li>
<li><?php bugfix(25955); ?> (Compile failure on MacOSX 10.3 Panther). (Marko, Dan)</li>
<li><?php bugfix(25923); ?> (mail() modifies the to &amp; subject arguments). (Ilia)</li>
<li><?php bugfix(25922); ?> (Crash in error handler when 5th argument is modified). (Ilia) </li>
<li><?php bugfix(25918); ?> (Possible crash in mime_content_type()). (Ilia)</li>
<li><?php bugfix(25900); ?> (document-&gt;get_elements_by_tag_name with default xmlns). (Rob)</li>
<li><?php bugfix(25895); ?> (Incorrect detection of safe_mode limited ini options). (Ilia)</li>
<li><?php bugfix(25888); ?> (Crash of php.exe when xpath_eval of a namespace). (Rob)</li>
<li><?php bugfix(25836); ?> (last key of multi-dimensional array passed via GPC not being escaped when magic_quotes_gpc is on). (Ilia)</li>
<li><?php bugfix(25825); ?> (tzset() was not called to reset libc environment on request shutdown). (Wez)</li>
<li><?php bugfix(25814); ?> (Make flock() return correct value when 3rd argument is used). (Ilia)</li>
<li><?php bugfix(25800); ?> (parse_url() could not parse urls with empty port). (Ilia)</li>
<li><?php bugfix(25780); ?> (ext/session: invalid "session.cookie_lifetime" makes session_start() to crash in win32). (Jani)</li>
<li><?php bugfix(25777); ?> (Do not rtrim() of text fields fetched from mssql). (Ilia)</li>
<li><?php bugfix(25770); ?> (Segfault with PHP and bison 1.875). (eggert@gnu.org, Marcus)</li>
<li><?php bugfix(25764); ?> (ldap_get_option() crashes with unbound ldap link). (Jani)</li>
<li><?php bugfix(25758); ?> (var_export does not escape ' &amp; \ inside array keys). (Ilia)</li>
<li><?php bugfix(25752); ?> (ext/ncurses: ncurses.h instead of curses.h with BSD). (Jani)</li>
<li><?php bugfix(25746); ?> (Do not bail out when unable to chdir original dir on systems with broken getcwd()). (Ilia)</li>
<li><?php bugfix(25745); ?> (ctype functions fail with non-ascii characters). (Moriyoshi)</li>
<li><?php bugfix(25744); ?> (make ZTS build of ext/sybase compile). (Ilia)</li>
<li><?php bugfix(25738); ?> (alloca() related issues on the Darwin platform). (Moriyoshi)</li>
<li><?php bugfix(25708); ?> (extract($GLOBALS, EXTR_REFS) mangles $GLOBALS). (Moriyoshi)</li>
<li><?php bugfix(25707); ?> (html_entity_decode() over-decodes &amp;lt;). (Moriyoshi)</li>
<li><?php bugfix(25703); ?> (openssl configure check failed). (Jani)</li>
<li><?php bugfix(25701); ?> (On flush() set headers_sent in apache2handler). (Ilia)</li>
<li><?php bugfix(25671); ?> (str_replace() corrupts subarrays). (Sara)</li>
<li><?php bugfix(25669); ?> (eregi() with non-ascii characters). (Moriyoshi)</li>
<li><?php bugfix(25665); ?> (var_dump() hangs on Nan and INF). (Ilia)</li>
<li><?php bugfix(25648); ?> (xslt_set_encoding() not detected correctly). (Jani)</li>
<li><?php bugfix(25636); ?> (SNMP Session not closed on success). (Ilia, patch by: nesslage at mwsc dot edu)</li>
<li><?php bugfix(25635); ?> (Make "make tests" to fail due to invalid include_path). (Ilia)</li>
<li><?php bugfix(25604); ?> (HAVE_SNMP_PARSE_OID undefined with phpize build). (Jani)</li>
<li><?php bugfix(25583); ?> (Incorrect handling of paths starting with "/" on win32 inside glob() function). (Ilia)</li>
<li><?php bugfix(25570); ?> (Possible crash in apache2handler when zend_bailout called outside of zend_try {} block). (Ilia)</li>
<li><?php bugfix(25558); ?> (ext/dbase: reverted fix for bug <?php bugl(23463); ?>). (Vlad)</li>
<li><?php bugfix(25530); ?> (checkdate() incorrectly handles floats). (Ilia)</li>
<li><?php bugfix(25525); ?> (ldap_explode_dn() crashes when passed invalid dn). (Sara, patch by: mikael dot suvi at trigger dot ee)</li>
<li><?php bugfix(25504); ?> (pcre_match_all() crashes when passed only 2 parameters). (Jani)</li>
<li><?php bugfix(25483); ?> (ext/informix: bogus -469 error from ifx_query()). (Jani, patch by: denisov at kubsu dot ru)</li>
<li><?php bugfix(25463); ?> (ext/cpdf: compile failure with bundled GD)</li>
<li><?php bugfix(25429); ?> (fix copying of stdin using copy() function). (Ilia)</li>
<li><?php bugfix(25424); ?> (ext/informix: lvarchar not supported in win32). (Jani)</li>
<li><?php bugfix(25404); ?> (ext/pgsql: open transactions not closed when script ends). (Marcus)</li>
<li><?php bugfix(25385); ?> (ob_gzhandler(): typo in sapi_add_header_ex() call). (Jani)</li>
<li><?php bugfix(25378); ?> (unserialize() crashes with invalid data). (Jani)</li>
<li><?php bugfix(25372); ?> (sscanf() does not work with %X). (Jani)</li>
<li><?php bugfix(25348); ?> ("make install" fails with --enable-short-tags). (Jani)</li>
<li><?php bugfix(25343); ?> (is_dir() gives warning on FreeBSD). (Jani)</li>
<li><?php bugfix(25333); ?> (Possible body corruption &amp; crash in win32 mail()). (Ilia)</li>
<li><?php bugfix(25316); ?> (Possible infinite loop inside _php_stream_write()). (Ilia)</li>
<li><?php bugfix(25314); ?> (FTP_ASCII mode behaving like binary from Win-&gt;Unix). (Sara)</li>
<li><?php bugfix(25308); ?> (php -m crashes when zend extensions are loaded). (Stas)</li>
<li><?php bugfix(25307); ?> (Crash with WDDX serializer). (Sascha, Jani)</li>
<li><?php bugfix(25295); ?> (QNX6: php_ini.c:414: 'alphasort' undeclared). (Jani)</li>
<li><?php bugfix(25294); ?> (ext/ftp: NLST failure leads to crash on exit). (Sara, Rob)</li>
<li><?php bugfix(25293); ?> (Output correct EOL to error_log). (Ilia)</li>
<li><?php bugfix(25239); ?> (ftp_fopen_wrapper not RFC compliant). (Sara)</li>
<li><?php bugfix(25218); ?> ("deflate" compressed pages had a gzip header). (Stefan)</li>
<li><?php bugfix(25211); ?> (image.c compile failure with AIX). (Marcus)</li>
<li><?php bugfix(25166); ?> (WDDX serializer handler missing in win32). (Jani)</li>
<li><?php bugfix(25109); ?> (Possible crash when fetching field names in pgsql). (Ilia)</li>
<li><?php bugfix(25106); ?> (Added more stringent checks on bzopen() mode). (Ilia)</li>
<li><?php bugfix(25070); ?> (unlock session files on win32 before closing them). (Ilia)</li>
<li><?php bugfix(24402); ?> (Compile failure with gettext 0.12.x). (Jani)</li>
<li><?php bugfix(23488); ?> (zlib.output_compression overrides Vary header). (Stefan)</li>
<li><?php bugfix(23326); ?> (ext/domxml: Attributes via append_child not supported). (Melvyn)</li>
<li><?php bugfix(21220); ?> (Wrong Apache version shown in phpinfo() output). (Jani)</li>
<li><?php bugfix(18534); ?> (ifx_close() leaves open session). (nobbie@php.net)</li>
<li><?php bugfix(14049); ?> (realpath() returns invalid results for non-existent paths). (Ilia)</li>
</ul>
There is a <a href="release_4_3_4.php">separate announcement</a> available for this release.<br>

<!-- }}} --></section>

<section class="version" id="4.3.3"><!-- {{{ 4.3.3 -->
<h3>Version 4.3.3</h3>
<?php release_date("25-Aug-2003"); ?>
<ul>
<li>Synchronized bundled GD library with GD 2.0.15. (Ilia)</li>
<li>Upgraded the bundled Expat library to version 1.95.6. (Jani)</li>
<li>Upgraded the bundled PCRE library to version 4.3. (Andrei)</li>
<li>Improved the engine to use POSIX/socket IO where feasible. (Sascha)</li>
<li>Improved the NSAPI SAPI module (Uwe Schindler)
 <ul>
	<li>php4_init (magnus.conf): new parameter to set alternate path to php.ini. (php_ini="/path/to/php.ini")</li>
	<li>php4_execute (obj.conf): support for additional php.ini values. Allows different settings per virtual server. (See sapi/nsapi/nsapi-readme.txt for more information)</li>
	<li>Added support for virtual().</li>
	<li>Added nsapi_request_headers() and nsapi_response_headers() with aliases for apache compatibility.</li>
	<li>Added "nsapi.read_timeout" php.ini option. </li>
	<li>Synced $_SERVER variables to be similar to Apache variables.</li>
	<li>Added possibility to use PHP to generate HTTP error pages (404 Not Found..)</li>
	<li>Added possibility to use PHP to generate directory listings for directories without index.html</li>
 </ul>
</li>
<li>Improved the IMAP extension (Ilia)
 <ul>
	<li>Added imap_timeout() function. (bug <?php bugl(24161); ?>)</li>
	<li>Added optional 'charset' parameter to imap_search() and imap_sort(). (bug <?php bugl(22505); ?>)</li>
 </ul>
</li>	
<li>Improved the InterBase extension (Daniela)
 <ul>
	<li>Added transaction constants: IBASE_REC_VERSION, IBASE_REC_NO_VERSION, IBASE_WRITE, IBASE_WAIT and IBASE_CONCURRENCY. (bugs <?php bugl(8797); ?>, <?php bugl(23887); ?>)</li>
	<li>Made numeric/decimal datatype handling work on any platform.</li>
 </ul>
</li>
<li>Added DBA handler 'inifile' to support ini files. (Marcus)</li>
<li>Added a "DEBUG" note to 'php -v' output when --enable-debug is used. (Derick)</li>
<li>Added long options into CLI &amp; CGI (e.g. --version). (Marcus)</li>
<li>Added a new parameter to preg_match*() that can be used to specify the starting offset in the subject string to match from. (Andrei)</li>
<li>Fixed possible integer overflows in:
 <ul>
	<li>base64_encode(). (Moriyoshi)</li>
	<li>bundled GD library. (Ilia)</li>
 </ul>
</li>
<li>Fixed "mysql.connect_timeout" php.ini option to be settable with ini_set(). (Rasmus)</li>
<li>Fixed ext/yaz to not log if "yaz.log_file" php.ini option is not set. (Adam)</li>
<li>Fixed a bug in bundled libmysql (mysql bug <a href="http://bugs.mysql.com/564">564</a>). (Georg)</li>
<li>Fixed ext/exif to honor "magic_quotes_runtime" php.ini option. (Marcus)</li>
<li>Fixed FastCGI IIS document root problem. (Shane)</li>
<li>Fixed corruption of multibyte character including 0x5c as second byte in multipart/form-data. (Rui)</li>
<li>Fixed possible crash in imagerotate() when an invalid color index is used for background color. (Pierre-Alain Joye)</li>
<li>Fixed a bug that under certain circumstances could invalidate safe_mode. (Ilia)</li>
<li>Fixed certificate version and allowed setting of the serial number in openssl_csr_sign(). (Stefan Roehrich)</li>
<li>Fixed each() to be binary safe for keys. (Zeev)</li>
<li><?php bugfix(25093); ?> (Various leaks due to non-freed queries). (Ilia)</li>
<li><?php bugfix(25084); ?> (Make refer check not dependant on register_globals). (Ilia)</li>
<li><?php bugfix(25081); ?> (odbc_fetch_array() may mangle numeric fields). (Ilia)</li>
<li><?php bugfix(25044); ?> (header("Location:") changing HTTP status). (Marcus)</li>
<li><?php bugfix(25037); ?> (Possible infinite loop inside SendText()). (Ilia)</li>
<li><?php bugfix(25007); ?> (rand() &amp; mt_rand() seed RNG every call). (Jani)</li>
<li><?php bugfix(24989); ?> (external libexpat conflicts with bundled libexpat). (Jani)</li>
<li><?php bugfix(24980); ?> (array_reduce() uses first element as default running total). (Ilia)</li>
<li><?php bugfix(24977); ?> (Revert mysql_select_db optimization). (Ilia)</li>
<li><?php bugfix(24958); ?> (Incorrect handling of 404s). (Ilia, Justin)</li>
<li><?php bugfix(24951); ?> (ob_flush() needlessly destroys output handler). (Ilia)</li>
<li><?php bugfix(24936); ?> (ext/fdf not linked properly as shared extension). (Jani)</li>
<li><?php bugfix(24909); ?> (Bad random numbers with ZTS builds on Solaris). (Ilia)</li>
<li><?php bugfix(24897); ?> (inconsistent behavior of shuffle() &amp; array_multisort()). (Ilia, Jani)</li>
<li><?php bugfix(24883); ?> (variables_order and gpc_order being ignored). (Ilia)</li>
<li><?php bugfix(24873); ?> (incorrect handling of / inside open_basedir). (Ilia)</li>
<li><?php bugfix(24871); ?> (methods misidentified as constructors). (Ilia)</li>
<li><?php bugfix(24827); ?> (ob_gzhandler overrides Vary header). (Ilia)</li>
<li><?php bugfix(24792); ?> (--enable-zend-multibyte causes random segfaults with ZTS). (fujimoto)</li>
<li><?php bugfix(24783); ?> (foreach($ar as $key =&gt; $val), $key not binary safe). (Zeev)</li>
<li><?php bugfix(24760); ?> (non-default SNMP port number not working). (Jani)</li>
<li><?php bugfix(24752); ?> (Unhandled "uniqueidentifier" field type). (Ilia, s.sonnenberg[at]coolspot.de)</li>
<li><?php bugfix(24710); ?> (Crash when $obj-&gt;{0} is used). (Zeev)</li>
<li><?php bugfix(24663); ?> (\n. sequences were not being escaped). (Ilia)</li>
<li><?php bugfix(24640); ?> (var_export() and var_dump() can not output large floats). (Marcus)</li>
<li><?php bugfix(24629); ?> (FreeBSD select() does not like large microseconds values). (Mirco Bauer).</li>
<li><?php bugfix(24609); ?> (ext/domxml: segfault when using replace node across different docs). (Rob Richards)</li>
<li><?php bugfix(24594); ?> (Rewrite of the imagefill() function). (Pierre-Alain Joye)</li>
<li><?php bugfix(24592); ?> (NULL related crash in session extension). (Sascha)</li>
<li><?php bugfix(24573); ?> (debug_backtrace() crashes if $this set to null). (Jani)</li>
<li><?php bugfix(24560); ?> (parse_url() incorrectly handling certain file:// based schemas). (Ilia)</li>
<li><?php bugfix(24557); ?> (make fclose() respect refcount on the resource). (Wez, Ilia)</li>
<li><?php bugfix(24537); ?> (apache2 compile misses some include directories). (Jani)</li>
<li><?php bugfix(24535); ?> (ext/mysql: crash when retrieving data from unbuffered result after the original connection has been changed). (Ilia)</li>
<li><?php bugfix(24519); ?> (aggregate_methods_by_list() does not increment refcount).</li>
<li><?php bugfix(24313); ?> (file_exists() warning on non-existent files when open_basedir is used). (Ilia)</li>
<li><?php bugfix(24312); ?> (base64_decode() does not skip 0xF0-0xFF characters). (gereon.steffens[at]onvista.de, Ilia)</li>
<li><?php bugfix(24284); ?> (Fixed memory leak inside pg_ping()). (Ilia)</li>
<li><?php bugfix(24249); ?> (fdf_add_doc_javascript() not available on Windows). (Edin)</li>
<li><?php bugfix(24224); ?> (ibase_blob_get() overflow). (Ard)</li>
<li><?php bugfix(24223); ?> (missing variable initialization in bundled gd). (Ilia)</li>
<li><?php bugfix(24220); ?> (range() didn't handle numeric strings correctly). (Ilia)</li>
<li><?php bugfix(24210); ?> (not detecting assume_default_colors - typo). (Sara)</li>
<li><?php bugfix(24198); ?> (Invalid recursion detection in array_merge_recurcive()). (Ilia)</li>
<li><?php bugfix(24177); ?> (Status not set correctly after flush() in Apache 2). (Ilia)</li>
<li><?php bugfix(24155); ?> (gdImageRotate270 incorrectly use x parameter for y axis). (tom@gksystems.com, Ilia)</li>
<li><?php bugfix(24150); ?> (crash in imap_fetch_overview() &amp; imap_rfc822_write_address()). (Ilia)</li>
<li><?php bugfix(24142); ?> (workaround for a gcc bug affecting round()). (Marcus, Ilia)</li>
<li><?php bugfix(24063); ?> (serialize() missing 0 after the . on scientific notation). (Marcus, Ilia)</li>
<li><?php bugfix(24063); ?> (scientific notation broken in *printf()). (Ilia)</li>
<li><?php bugfix(24060); ?> (ncurses_del_panel() causes segfault). (Georg)</li>
<li><?php bugfix(24054); ?> (Integer overflow failure with GCC/x86 for *=). (Sascha)</li>
<li><?php bugfix(24028); ?> (Reading raw post message by php://input failed). (Jani)</li>
<li><?php bugfix(24009); ?> (FastCGI handling of file not found). (Shane)</li>
<li><?php bugfix(24007); ?> (Problem with register_globals &amp; arrays). (Ilia)</li>
<li><?php bugfix(23951); ?> (constants in static initializers clobbered by inheritance). (Wez, Zend Engine)</li>
<li><?php bugfix(23936); ?> (ext/interbase: fail to select and fetch). (Ard)</li>
<li><?php bugfix(23913); ?> (make rename() work across partitions on *nix). (Ilia)</li>
<li><?php bugfix(23912); ?> (Invalid CSS in phpinfo() output). (Ilia)</li>
<li><?php bugfix(23902); ?> (NULL in CGI header output). (Shane)</li>
<li><?php bugfix(23898); ?> (Proper handling of NULLs in odbc_result, odbc_fetch_into and odbc_result_all). (Ilia)</li>
<li><?php bugfix(23897); ?> (Fixed a check for mbfilter_ru.h). (aleks@m2media.ru, Ilia)</li>
<li><?php bugfix(23894); ?> (sprintf() decimal specifiers problem). (Moriyoshi)</li>
<li><?php bugfix(23888); ?> (Missing input validation for flags parameter). (Ilia)</li>
<li><?php bugfix(23808); ?> (broken imagecopymerge()). (Pierre-Alain Joye)</li>
<li><?php bugfix(23798); ?> (Spaces were not being stripped from Bcc header). (Ilia)</li>
<li><?php bugfix(23792); ?> (imagerotate() problems with limited pallet, the function will always return true color image from now on). (Pierre-Alain Joye)</li>
<li><?php bugfix(23779); ?> (mysql_connect(): disable local infile option if php.ini option "open_basedir" is set). (Georg)</li>
<li><?php bugfix(23769); ?> (In FreeBSD glob() gives wrong result when pattern not found). (Hartmut)</li>
<li><?php bugfix(23733); ?> (Coredump on startup with Oracle 9+). (Edin)</li>
<li><?php bugfix(23685); ?> (fake values returned when OID value is an empty string). (Jani)</li>
<li><?php bugfix(23664); ?> (FastCGI socket listening). (Shane)</li>
<li><?php bugfix(23509); ?> (exit code lost when exit() called from register_shutdown_function()). (Ilia)</li>
<li><?php bugfix(23463); ?> (added Dbase2 version check). (Vlad Krupin)</li>
<li><?php bugfix(23285); ?> (Potential Stack overflow in zendlex). (Wez)</li>
<li><?php bugfix(23104); ?> (hash position of static arrays not being reset). (Ilia)</li>
<li><?php bugfix(23038); ?>, <?php bugl(23574); ?> (aggregate() related leaks and crashes). (Andrei)</li>
<li><?php bugfix(22947); ?> (Ack() inside win32/sendmail.c may stall in certain situations). (Ilia)</li>
<li><?php bugfix(22690); ?> (ob_start() did not work with create_function() callbacks). (Marcus)</li>
<li><?php bugfix(22592); ?> (Cascading assignments to strings with curly braces broken). (Stas)</li>
<li><?php bugfix(22245); ?> (References inside $_SESSION not being handled). (Ilia)</li>
<li><?php bugfix(22154); ?> (Possible crash when memory_limit is reached and output buffering in addition to session.use_trans_sid is used). (Ilia)</li>
<li><?php bugfix(22072); ?> (Apache2 sapis do not detect aborted connections). (Ilia)</li>
<li><?php bugfix(21958); ?> (workaround for unusual realpath() on AIX &amp; Tru64). (Ilia)</li>
<li><?php bugfix(21957); ?> (serialize() mangles objects with __sleep). (Ilia)</li>
<li><?php bugfix(21918); ?> (strange behavior of mixed type in array-keys). (Marcus)</li>
<li><?php bugfix(21855); ?> (Threading issue on HP-UX). (Roshan Naik, Andi, Moriyoshi)</li>
<li><?php bugfix(21611); ?> (version_compare() does not support "p" as suffix). (Stefan Walk)</li>
<li><?php bugfix(21074); ?> (Apache2: "ErrorDocument xxx /error.php" broken). (Jani)</li>
<li><?php bugfix(20896); ?> (-s -w modes with php-cli cause php to hang). (Ilia)</li>
<li><?php bugfix(19613); ?> (putenv("VAR=") does not empty VAR on win32). (Zeev)</li>
<li><?php bugfix(18744); ?> (blob_add() has max limit of 64k). (Ard)</li>
<li><?php bugfix(18291); ?> (escapeshellcmd() can now handle quoted arguments). (Ilia)</li>
<li><?php bugfix(17414); ?> (pthreads bug workaround). (timo.teras[at]iki.fi)</li>
<li><?php bugfix(13142); ?> (strtotime not handling "M d H:i:s Y" format). (Ilia)</li>
<li><?php bugfix(11924); ?> (ibase_query(), ibase_execute() mangled passed parameters). (Jani)</li>
<li><?php bugfix(7014); ?> (crash in _php_ibase_error() after request shutdown). (Ard)</li>
</ul>
More information on this release on <a href="/releases.php#4.3.3">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.3.2"><!-- {{{ 4.3.2 -->
<h3>Version 4.3.2</h3>
<?php release_date("29-May-2003"); ?>
<ul>
<li>Syncronized bundled GD library with GD 2.0.12. (Ilia)</li>
<li>Removed support for GDLIB version 1.x.x (php_gd.dll) on Windows. (Edin)</li>
<li>Enabled read-only GIF support in the bundled GDLIB (php_gd2.dll) on Windows. (Sebastian, Edin)</li>
<li>
  Improved dba extension (Marcus)
  <ul>
   <li>Added support for internal error handling of Berkeley db libraries.</li>
   <li>Disallowed Berkeley db versions 4.1.0 to 4.1.24 due to locking problems.</li>
   <li>Disallowed linkage of Berkeley db submodules against libraries with different major versions.</li>
   <li>Disallowed configuring of more than one Berkeley db handler.</li>
   <li>Reenabled dba_popen() with new persistent STDIO streams.</li>
  </ul>
</li>
<li>Added a new Apache 2.0 SAPI module (sapi/apache2handler) based on the old version (sapi/apache2filter). (Ian Holsman, Justin Erenkrantz)</li>
<li>Added "disable_classes" php.ini option to allow administrators to disable certain classes for security reasons. (Harald)</li>
<li>Added man page for CLI version of PHP. (Marcus)</li>
<li>Added --clean option into phpize. (Jani)</li>
<li>Added --ldflags option into php-config. (Jani)</li>
<li>Added imagesavealpha() and imageistruecolor() functions. (Pierre)</li>
<li>Added XBM support for bundled GD library. (Marcus)</li>
<li>Added session_regenerate_id() function. (Sascha)</li>
<li>Added zlib_get_coding_type() function which returns the coding type used for output compression. (Moriyoshi)</li>
<li>Added OCIPasswordChange() which allows renewing expired Oracle users. (Maxim)</li>
<li>Added memory_get_usage(). Only available when PHP is configured with --enable-memory-limit. (Andrey)</li>
<li>Added improved JPEG 2000 support for getimagesize(). (Marcus, Adam Wright)</li>
<li>Added XBM and WBMP support for getimagesize(). (Marcus)</li>
<li>Added KOI8-R, CP866, and CP1251 support for htmlentities(). (Antony Dovgal, Moriyoshi)</li>
<li>Added domdocument-&gt;free() to free XML-documents from memory. (Rob Richards)</li>
<li>Fixed a bug in error reporting with the CLI for start-up errors. (Derick)</li>
<li>Fixed spurious fsync calls during socket communication. (Sascha)</li>
<li>Fixed a possible vhost issue in thttpd. (Sascha, dgl@dgl.cx)</li>
<li>Fixed including from HTTP URLs. (Sascha)</li>
<li>Fixed a lot of memory leaks in domxml. (Rob Richards, Chregu)</li>
<li>Fixed a bug in GD's truecolor TTF handling. (Derick)</li>
<li>Fixed several 64-bit problems. (Dave)</li>
<li>Fixed several errors in hwapi extension. Objects weren't handled properly. (Uwe)</li>
<li><?php bugfix(23788); ?> (str|preg_replace() clobber the array elements). (Ilia)</li>
<li><?php bugfix(23765); ?> (file uploads ignored due to case sensitivity). (Sara)</li>
<li><?php bugfix(23738); ?> (ifx_copy_blob() crash). (Jani)</li>
<li><?php bugfix(23661); ?> (mysql_fetch_array() gives no warning when an invalid argument was passed as result_type). (Derick)</li>
<li><?php bugfix(23619); ?> (set_error_handler() registered handler not called for object instances). (Jani, waboring@qualys.com)</li>
<li><?php bugfix(23606); ?> (Unable to build --with-db4 (db4.1.25)). (Marcus)</li>
<li><?php bugfix(23567); ?> (pfsockopen() returns dead connections). (Wez)</li>
<li><?php bugfix(23539); ?> (curl_exec() produces strange results). (daniel@haxx.se)</li>
<li><?php bugfix(23527); ?> (PostScript Type 1 fonts do not render properly). (nid@home.se, Ilia)</li>
<li><?php bugfix(23402); ?> (crash with improper use of mssql_bind()). (Frank)</li>
<li><?php bugfix(23371); ?> (configure falsely detects c-client using SSL). (Jani)</li>
<li><?php bugfix(23340); ?> (fopen on multiple URLs causes memory corruption). (Wez)</li>
<li><?php bugfix(23298); ?> (serialize cuts off floats &amp; doubles). (Ilia, Marcus)</li>
<li><?php bugfix(23232); ?> (safe_mode does not honor PHP_AUTH_* in apache2). (Ilia)</li>
<li><?php bugfix(23225); ?> (money_format() didn't handle erroneous return of strfmon). (Ilia, marcot@tabini.ca)</li>
<li><?php bugfix(23201); ?> (set_file_buffer() crashes with stdio streams). (Ilia)</li>
<li><?php bugfix(23188); ?> (CDB databases created with 'c' mode do not work). (Marcus)</li>
<li><?php bugfix(23187); ?> (memory leaks in sybase_connect/sybase_pconnect). (Ilia)</li>
<li><?php bugfix(23162); ?> (user_error() crashs if error message &gt; 1024 bytes). (Jay, Marcus, Moriyoshi)</li>
<li><?php bugfix(23152); ?> ($http_response_header empty on invalid URLs). (Ilia)</li>
<li><?php bugfix(23102); ?> (integer overflow in exif_iif_add_value()). (Ilia)</li>
<li><?php bugfix(23099); ?> (ext/interbase: libgds.so: undefined reference to 'crypt'). (Jani)</li>
<li><?php bugfix(23093); ?> (highlight_string() crashed with __FUNCTION__). (Jani)</li>
<li><?php bugfix(23080); ?> (socket_strerror() crashes on win32). (Moriyoshi)</li>
<li><?php bugfix(23071); ?> (when DST in effect, date("T") crashed PHP). (Scott MacVicar, Jani)</li>
<li><?php bugfix(23069); ?> (tempnam creates readonly file [win32]). (Wez)</li>
<li><?php bugfix(23009); ?> (pg_select with timestamp). (Marcus, Jay)</li>
<li><?php bugfix(23008); ?> (ldap_start_tls() not available on Windows). (Edin)</li>
<li><?php bugfix(23004); ?> (When ftp_close() is called, send QUIT to the ftp server). (Ilia)</li>
<li><?php bugfix(22989); ?> (sendmail not found by configure). (igyu@ionsphere.org)</li>
<li><?php bugfix(22987); ?> (missing perror() check in configure). (Jani)</li>
<li><?php bugfix(22965); ?> (Crash in gd lib's ImageFillToBorder()). (Ilia)</li>
<li><?php bugfix(22939); ?> (crash in imap_header_info()). (Ilia)</li>
<li><?php bugfix(22844); ?> (Changing bool value via -d or ini_set(), On would be Off). (Ilia)</li>
<li><?php bugfix(22786); ?> (Crash when trying to call DomAttribute's set_namespace method). (Chregu)</li>
<li><?php bugfix(22775); ?> (Fatal errors exit with status 0 with CGI/CLI). (Jani)</li>
<li><?php bugfix(22774); ?> (PHP crashes when exiting (long XML doc)). (Rob Richards)</li>
<li><?php bugfix(22751); ?> (Compile error in gdcache.c when external libgd is used).  (Jani)</li>
<li><?php bugfix(22721); ?> (Poor file() performance on systems without mmap). (Wez)</li>
<li><?php bugfix(22709); ?> (Crash in interbase when database unavailable). (Vladimir Michl)</li>
<li><?php bugfix(22681); ?> (Crash when reading from invalid file pointer). (Ilia)</li>
<li><?php bugfix(22672); ?> (User not logged under Apache2). (Ian) </li>
<li><?php bugfix(22616); ?> (Wrong order of -lssl and -lcrypto with IMAP). (Jani)</li>
<li><?php bugfix(22613); ?> (imagettfbox() does not add the kerning distance to the running position). (Ilia)</li>
<li><?php bugfix(22585); ?> (Do not terminate the script on minor errors). (Ilia)</li>
<li><?php bugfix(22550); ?> (overflow protection for upload_max_filesize ini option). (Ilia)</li>
<li><?php bugfix(22544); ?> (writing transparency to truecolor png images). (Ilia)</li>
<li><?php bugfix(22538); ?> (failed stat on stdio/stdin/stderr streams). (Wez, Ilia)</li>
<li><?php bugfix(22530); ?> (append_child does not unlink node). (Chregu)</li>
<li><?php bugfix(22520); ?> (mcrypt_generic_deinit() was not available on Windows). (Edin)</li>
<li><?php bugfix(22508); ?> (Added protection against circular HTML redirects). (Ilia)</li>
<li><?php bugfix(22473); ?> (ISAPI Secure Server variables not available). (Christian Swoboda)</li>
<li><?php bugfix(22402); ?> (opening of ftp for read/write could fail due to invalid return code handling). (Ilia)</li>
<li><?php bugfix(22384); ?> (FNM_CASEFOLD is not available). (Hartmut)</li>
<li><?php bugfix(22382); ?> (fgetcsv() did not handle \" correctly). (Ilia)</li>
<li><?php bugfix(22376); ?> (wrong httpd.conf modified when using INSTALL_ROOT). (Jani)</li>
<li><?php bugfix(22363); ?> (combinations of fwrite(), fread() and fseek() produce unexpected results). (Wez)</li>
<li><?php bugfix(22355); ?> (PHP would remove folding from Subject &amp; To fields). (Ilia)</li>
<li><?php bugfix(22330); ?> (overloaded strrpos() gives wrong results). (david@santinoli.com, Moriyoshi)</li>
<li><?php bugfix(22312); ?> (crash on failed connection when curl_getinfo() was called). (Phil Oleson &lt;poleson@verio.net&gt;)</li>
<li><?php bugfix(22308); ?> (optimized passthru, code is now ~40 times faster). (Ilia)</li>
<li><?php bugfix(22306); ?> (pg_lo_seek($h, 0, PGSQL_SEEK_SET) succeeds but returns false). (Jani)</li>
<li><?php bugfix(22301); ?> (htmlspecialchars() crashes Apache on Tru64). (Ilia)</li>
<li><?php bugfix(22299); ?> (gethostbyname() with non-existing domain crashed on MacOSX). (Jani)</li>
<li><?php bugfix(22283); ?> (possible crash when opening relative URLs). (Ilia)</li>
<li><?php bugfix(22238); ?> (stream_select() clobbers fifos under win9x). (Wez)</li>
<li><?php bugfix(22234); ?> (copy() fails if source file has 0 length). (Moriyoshi)</li>
<li><?php bugfix(22227); ?> (printf() field limiters broke between 4.2.3 and 4.3.0). (Moriyoshi)</li>
<li><?php bugfix(22224); ?> (implode() changes object references in array). (Moriyoshi)</li>
<li><?php bugfix(22221); ?> (bad rows count in the result object for postgresql). (Marc)</li>
<li><?php bugfix(22207); ?> (e notation in *printf would be missing a 0 when there is no exponent). (Ilia)</li>
<li><?php bugfix(22220); ?> ("php_admin_value open_basedir none" does not work). (Jani)</li>
<li><?php bugfix(22191); ?> (frontbase build broken with old version of frontbase). (Ilia)</li>
<li><?php bugfix(22187); ?> (spprintf function did not handle floats correctly). (Ilia)</li>
<li><?php bugfix(22149); ?> (incorrect insertion of session id when tabs are used to separate tag elements). (Ilia)</li>
<li><?php bugfix(22141); ?> (removed undocumented Boyer str_replace() method). (Sara)</li>
<li><?php bugfix(22103); ?> (Added gdImageEllipse and replaced old gdImageFilledEllipse with a better implementation). (Pierre)</li>
<li><?php bugfix(22088); ?> (array_shift() left next index to be +1 too much). (Jani)</li>
<li><?php bugfix(22083); ?> (MySQL charset directory problem on Windows). (Edin)</li>
<li><?php bugfix(22059); ?> (ftp_chdir() causes segfault). (Sara)</li>
<li><?php bugfix(22048); ?> (crash in imap_header() when the e-mail contains an abnormally large number of special characters). (Ilia)</li>
<li><?php bugfix(22042); ?> (pg_result_seek() would never seek to the 1st row in the result due to always seeking to row next to the one requested). (Ilia)</li>
<li><?php bugfix(22031); ?> (Made curl_write() &amp; curl_write_header() binary safe). (Ilia)</li>
<li><?php bugfix(22022); ?> (Crash in imap_mail_compose() if the body is an empty array). (Ilia)</li>
<li><?php bugfix(22017); ?> (date() does not support negative timestamps on win32). (Ilia)</li>
<li><?php bugfix(22008); ?> (strip_tags() eliminates too much). (Moriyoshi)</li>
<li><?php bugfix(22004); ?> (Overload extension and _call() breaks classes). (Shane)</li>
<li><?php bugfix(21998); ?> (array_pop() did not reset the current array position). (Jani)</li>
<li><?php bugfix(21978); ?>, <?php bugl(21036); ?> (win32 mail(), bcc: gets interpreted as cc:). (Sara)</li>
<li><?php bugfix(21885); ?> (move_uploaded_file() does not ignore open_basedir). (Wez)</li>
<li><?php bugfix(21820); ?> ("$arr['foo']" generates bogus E_NOTICE, should be E_PARSE). (Jani)</li>
<li><?php bugfix(21815); ?> (fpassthru() ignored buffered data but complained anyway). (Wez)</li>
<li><?php bugfix(21809); ?> (select would not always timeout during socket shutdown). (Wez)</li>
<li><?php bugfix(21751); ?> (default output buffer could not be deleted). (Marcus)</li>
<li><?php bugfix(21725); ?> (return behaviour differs between include and require). (Zeev)</li>
<li><?php bugfix(21713); ?> (include remote files leaks descriptors on Solaris). (Wez)</li>
<li><?php bugfix(21708); ?> (ucwords() trouble again). (Moriyoshi)</li>
<li><?php bugfix(21689); ?> (fgetcsv() suppresses some characters before a separator). (Masahiro, Moriyoshi)</li>
<li><?php bugfix(21912); ?>, <?php bugl(21676); ?> (getimagesize() failed for remote files). (Wez)</li>
<li><?php bugfix(21597); ?> (made glob() understand Windows paths). (Edin)</li>
<li><?php bugfix(21549); ?> (problem with Ingres II persistent connections). (Jani)</li>
<li><?php bugfix(21544); ?> (Extended checks for where FreeTDS is installed). (Frank)</li>
<li><?php bugfix(21534); ?> (typo in gmp_gcdext() causes incorrect results). (Sara)</li>
<li><?php bugfix(21531); ?> (file_exists() and other filestat functions report errors when the requested file/directory does not exists). (Sara)</li>
<li><?php bugfix(21529); ?> (memory corruption by fsockopen()). (Ilia)</li>
<li><?php bugfix(21525); ?> (bind_textdomain_codeset() now available on Windows). (Edin)</li>
<li><?php bugfix(21523); ?> (number_format() could cause a memory allocation for a negative memory size in situations where the sprintf implementation of the host system generated less decimal places than were requested). (Wez)</li>
<li><?php bugfix(21518); ?> (imagecreatefromstring() crashed with invalid image files). (Ilia)</li>
<li><?php bugfix(21511); ?> (config.status warning). (Jani)</li>
<li><?php bugfix(21498); ?> (mysql_pconnect connection problems). (Georg)</li>
<li><?php bugfix(21453); ?> (improper handling of non-terminated &lt; by strip_tags()). (Ilia)</li>
<li><?php bugfix(21445); ?> (gd unable to open fonts). (Ilia)</li>
<li><?php bugfix(21443); ?> (improper handling of ? surrounded by spaces in get_browser()). (Ilia)</li>
<li><?php bugfix(21442); ?> (crash in mail() on Windows when 1st parameter is empty). (Edin)</li>
<li><?php bugfix(21410); ?> (fixed handling of NULL or "" files on Win32). (Ilia)</li>
<li><?php bugfix(21378); ?> (COM code crashes after update 4.2.1 to 4.3.0). (Harald)</li>
<li><?php bugfix(21338); ?> (html_entity_decode() crashed when "" is passed). (Ilia)</li>
<li><?php bugfix(21310); ?> (Solaris has issues with getcwd() needing read permissions on directories instead of just execute). (Wez, jflemer)</li>
<li><?php bugfix(21297); ?> (in CLI/CGI on the #! it would leave a \n when the code encounters \r\n). (Ilia)</li>
<li><?php bugfix(21268); ?> (session_decode() returned FALSE on success). (Ilia)</li>
<li><?php bugfix(21267); ?> (opening URLs that result in redirection to a relative path was failing). (Ilia)</li>
<li><?php bugfix(21229); ?> (missing 3rd argument to php_module_startup). (Ilia)</li>
<li><?php bugfix(21228); ?> (broken check for ob_gzhandler and made ob_start() return the correct value). (Ilia)</li>
<li><?php bugfix(21226); ?> (parse_url handling of urls without a path). (Ilia)</li>
<li><?php bugfix(21224); ?> (apache configure fails when using --enable-versioning). (Jani)</li>
<li><?php bugfix(21169); ?> (Compile Failure and lots of warnings on UnixWare). (Derick)</li>
<li><?php bugfix(21131); ?> (fopen() with mode 'a+' and rewind() doesn't work). (Wez)</li>
<li><?php bugfix(21007); ?> (html_errors off text-only output in phpinfo). (Marcus)</li>
<li><?php bugfix(20857); ?> (snmpset() failed always, patch by: rs@epost.de). (Jani)</li>
<li><?php bugfix(20802); ?> (PHP would die silently when memory limit reached). (Ilia)</li>
<li><?php bugfix(20715); ?> (odbc could not be compiled as shared extension). (Jani)</li>
<li><?php bugfix(20641); ?> (Numeric/decimal datatype overflow in ext/interbase on Win32). (Daniela)</li>
<li><?php bugfix(20503); ?> (imagesetbrush() not available on Windows). (Edin)</li>
<li><?php bugfix(20282); ?> (COM memory leak). (Harald)</li>
<li><?php bugfix(20256); ?> (snprintf() not defined on some systems). (Jani)</li>
<li><?php bugfix(19919); ?> (crash in sapi_apache_header_handler under heavy load). (George)</li>
<li><?php bugfix(19795); ?> (Problems with strnatcmp() / strnatcasecmp()). (Moriyoshi)</li>
<li><?php bugfix(17868); ?> (multiple &lt;!--include--&gt; used to include PHP files crashes). (Ilia)</li>
<li><?php bugfix(17448); ?> (Print the message when OCI_SUCCESS_WITH_INFO is returned). (Maxim)</li>
<li><?php bugfix(17098); ?> (make Apache2 aware that PHP scripts should not be cached). (Ilia)</li>
<li><?php bugfix(16798); ?> (Compile failure with LOB support for Oracle version &lt; 8.1). (Maxim)</li>
<li><?php bugfix(14532); ?> (fixed connection_status() to return 2 for timeouts). (Jani)</li>
<li><?php bugfix(14245); ?> ('make install' fails on AIX when using --with-apxs). (Jani)</li>
<li><?php bugfix(13757); ?> (CGI: passing query string on command line broken). (Shane)</li>
<li><?php bugfix(13561); ?> (--without-pear disabled phpize/php-config install). (Jani)</li>
<li><?php bugfix(13551); ?> (bcmath functions applying scale incorrectly). (Sara)</li>
</ul>
More information on this release on <a href="/releases.php#4.3.2">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.3.1"><!-- {{{ 4.3.1 -->
<h3>Version 4.3.1</h3>
<?php release_date("17-Feb-2003"); ?>
<ul>
<li>Fixed serious security vulnerability in CGI SAPI. (Shane)</li>
</ul>
More information on this release on <a href="/releases.php#4.3.1">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.3.0"><!-- {{{ 4.3.0 -->
<h3>Version 4.3.0</h3>
<?php release_date("27-Dec-2002"); ?>
<ul>
<li>If you don't specify building any other SAPI "make install" will install the
  CGI SAPI binary in {PREFIX}/bin/php. If you want to install CLI SAPI in that
  location use "make install-cli" after "make install" or add --disable-cgi
  to your configure options. In the Windows distribution CLI SAPI is included
  in the "cli" folder. (Edin)</li>
<li>Removed extensions: (Jan, Jani, Sebastian)
  <ul>
  <li>ext/aspell</li>
  <li>ext/ccvs</li>
  <li>ext/cybercash</li>
  <li>ext/icap</li>
  <li>sapi/fastcgi</li>
  <li>sapi/fhttpd</li>
  </ul>
</li>
<li>Moved extensions to PECL (http://pear.php.net/): (James, Derick)
  <ul>
  <li>ext/vpopmail</li>
  <li>ext/cybermut</li>
  </ul>
</li>
<li>Make PHP_AUTH_* variables not available in safe mode under Apache when an
  external basic auth mechanism is used. (Philip)</li>
<li>Added sha1() and sha1_file() for US Secure Hash Algorithm 1. (Stefan Esser)</li>
<li>Aliased dba_popen() to dba_open() until 4.3.2 when persistent STDIO streams
  are introduced. (Andrei)</li>
<li>Fixed a security bug in the bundled MySQL library. (Georg, Stefan)</li>
<li>ZLIB extension is now built-in in the Windows distribution.
  External extension (php_zlib.dll) has been removed. (Edin)</li>
<li>Fixed a bug in ISO-8601 week calculation</li>
<li>Fixed a crash when using invalid color index with imagecolortransparent()
  (Pierre-Alain Joye).</li>
<li><?php bugfix(20987); ?> (no handling for client certificates). (Ilia)</li>
<li><?php bugfix(21039); ?> (crash when not supplying an IV to mcrypt_generic_init).
  (Derick)</li>
<li><?php bugfix(20936); ?> (openssl_pkey_get was broken). (jeroen@derks.it, Wez)</li>
<li><?php bugfix(20927); ?> (wordwrap crash). (Ilia)</li>
<li><?php bugfix(20796); ?> (when register_globals is on &amp; arrays with same names are
  passed via get/post/cookie the data inside $_GET/$_POST/$_COOKIE can would be
  corrupted). (Ilia)</li>
<li><?php bugfix(20725); ?> (if the upload directory cannot be written to, the POST data
  after the uploaded file is lost). (Ilia)</li>
<li><?php bugfix(20865); ?> (array_key_exists() fails to find NULL key). (Ilia)</li>
<li><?php bugfix(20812); ?> (ftp_get returned NULL on success, instead of TRUE). (Ilia)</li>
<li><?php bugfix(20785); ?> (crash when using pdf_open_memory_image() to load a
  true-color image). (Ilia)</li>
<li>Fixed a crash when converting between true-color images (png/jpeg) and
  gd1/gd2 image formats, png/jpeg -&gt; gd1/gd2 -&gt; png/jpeg conversion now
  works correctly. (Ilia, Pierre-Alain Joye).</li>
<li>Fixed a memory leak in the bundled GD library inside 
  gdImageTrueColorToPalette(). (Ilia)</li>
<li><?php bugfix(12776); ?> (array_walk crash). (Moriyoshi)</li>
<li><?php bugfix(20934); ?> (htmlspecialchars returns latin1 from UTF-8). (Moriyoshi)</li>
<li>Fixed bugs <?php bugl(20270); ?>, <?php bugl(15702); ?>, <?php bugl(18600); ?> (segfaults in ext/java). (Tony J. White)</li>
<li>Made bcmath extension thread safe. (Sander)</li>
<li><?php bugfix(19566); ?> (get_declared_classes() segfaults). (Moriyoshi, Marcus, Andi)</li>
<li><?php bugfix(20381); ?> (array_merge_recursive mangles input arrays). (Moriyoshi)</li>
<li>Added -n command switch to cli and cgi version which allows to skip php.ini
  parsing at startup. (Marcus, Wez)</li>
<li><?php bugfix(19689); ?> (absolute paths like /test/dir/ not working correctly).
  (Ilia)</li>
<li>Added "neutral" language entry to mbstring spec. (Moriyoshi)</li>
<li>Changed bundled gd library to consider php.ini option memory_limit. (Marcus)</li>
<li>Modified log() to accept multiple bases. (Jason)</li>
<li>Fixed bugs <?php bugl(16190); ?>/<?php bugl(18746); ?>xt/db: flatfile support with windows). (Marcus)</li>
<li>Added gd_info() which returns an array of gd support information. (Marcus)</li>
<li>Implemented features/changes requested in Bug <?php bugl(16960); ?> (Timm):
  <ul>
  <li>Added a new function sybase_unbuffered_query()</li>
  <li>Added a new function sybase_fetch_assoc()</li>
  <li>Added sybase_set_message_handler() which enables users to handle
    server messages in a callback function</li>
  <li>Added an ini entry for deadlock retries - retrying deadlocks can cause
    transaction state to break (sybct.deadlock_retry_count,
    defaults to -1 "forever").</li>
  <li>Fixed sybase_fetch_object() not to return objects with numeric members</li>
  <li>Fixed issues with identical fieldnames</li>
  <li>Made sybase_fetch_*() functions return correct datatypes</li>
  <li>Made phpinfo() section more verbose</li>
  <li>Made sybase_query() error messages more verbose</li>
  </ul>
</li>
<li><?php bugfix(19935); ?> (made OpenSSL file system operations abide by safe_mode
  &amp; open_basedir restrictions). (Ilia)</li>
<li><?php bugfix(18868); ?> (improved the check for availability of realpath()). (Ilia)</li>
<li>Fixed width/height detection of bmp images using getimagesize() function on
  big endian systems and added code to retrieve bmp bit depth. (Ilia)</li>
<li><?php bugfix(20035); ?> (line counting error when script starts with #! in 
  cgi/cli/fastcgi sapis). (Ilia)</li>
<li><?php bugfix(20235); ?> (incorrect handling of symlinks on ZTS build). (Ilia)</li>
<li>Added sanity checks to headers_sent() &amp; image_type_to_mime_type(). (Ilia)</li>
<li>Added an aditional parameter to the jdtojewish() function which makes
  the function return the symbolic hebrew name. (Moshe Doron, Derick)</li>
<li><?php bugfix(20169); ?> (implode() clobbers first argument). (Moriyoshi)</li>
<li>Improved dba extension (Marcus)
  <ul>
  <li>Added dba_handlers() that returns an array of installed handlers and
    dba_list() that returns an associative array of open database files. </li>
  <li>Added bundled cdb support wich can be activated by --with-cdb without a
    path. The bundled version supports cdb_make that allows writing cdb files.</li>
  <li>Added optional skip parameter to dba_fetch() to support multiple key-value
    pairs with the same key for cdb handler.</li>
  <li>Added locking for those handlers that do not have their own locking.</li>
  <li>Added support for magic_quotes_runtime php.ini option.</li>
  <li>Added flatfile support what finally makes ext/db deprecated.</li>
  </ul>
</li>
<li>Added imagerotate() which is available only when bundled libgd is used.
  (Pierre-Alain Joye, Ilia)</li>
<li><?php bugfix(17497); ?> (mssql extension crashes if magic_quotes_runtime is on).
  (Sterling)</li>
<li>Remove $_FILES from $_REQUEST (import_request_variables is not modified), 
  this didn't work properly in the first place, and added confusion. (Sterling)</li>
<li>Fix the socket_read() function on win32 to work in normal mode (reading to
  the end of a line), as well as binary mode. (Sterling)</li>
<li><?php bugfix(20110); ?> (added sanity check to prevent include/require functions
  from trying to include directories). (Ilia)</li>
<li><?php bugfix(20108); ?> (segmentation fault on printf("%1.1s", "string")). (Ilia)</li>
<li>Added dbx_escape_string() function to dbx module. (Marc)</li>
<li>Added Oracle (oci8) support to dbx module. (Marc)</li>
<li>Updated FDF extension to work with Adode fdftk 5.0. (Hartmut)</li>
<li>Added mb_strtolower() and mb_strtoupper(). (Moriyoshi)</li>
<li>Fixed an infinite loop in setlocale() when only invalid locale names
  were passed in the array. (patch by Pal Loberg, pallo[at]initio.no)</li>
<li>Fixed bugs <?php bugl(19156); ?> and <?php bugl(19544); ?> (COM extension leaks memory and keeps
  components referenced). (Harald)</li>
<li>Added fribidi_get_charsets() and fribidi_charset_info() functions. (Tal)</li>
<li>Added Oracle TIMESTAMP type to oci8 extension. (Thies)</li>
<li>Fixed fgets($fp) to read until EOL when length parameter is not set. (Wez)</li>
<li>Changed registry entries under "HKLM\SOFTWARE\PHP\Per Directory Values" to
  work also with administrative directives such as safe_mode, open_basedir,
  etc. (Claudio Felber)</li>
<li>Added str_word_count() function which counts words inside a string. (Ilia)</li>
<li>Added PGSQL_CONNECT_FORCE_NEW option to pg_connect() (Yasuo)</li>
<li>Added ICONV_IMPL and ICONV_VERSION constants to iconv extension to
  indicate which iconv implementation is used. (Moriyoshi)</li>
<li><?php bugfix(4232); ?> (Added %e &amp; %E support to printf/sprintf). (Ilia)</li>
<li><?php bugfix(17580); ?> (Allow ini parser to parse files &gt;16K). (Ilia)</li>
<li><?php bugfix(19649); ?> (Sanity checks for browscap.ini parser). (Ilia)</li>
<li>Added experimental patch to address problem with floats on various locales.
  (Bug <?php bugl(17079); ?>). (Ilia)</li>
<li><?php bugfix(19280); ?> (imap_header fails with many To: addresses). (Ilia)</li>
<li>Added mb_regex_set_options(). The Options parameters of various mbregex
  functions are now deprecated. (Moriyoshi)</li>
<li><?php bugfix(19482); ?> (Segfault with PCRE and locale). (Andrei)</li>
<li>Made ImageTruecolorToPalette() in bundled GD2 library actually work. (Rasmus)</li>
<li>Fixed ImageCopy() in bundled GD2 library to handle copying from truecolor to
  palette-based. (Wez, Rasmus)</li>
<li>Added read-only GIF support for bundled GD2 library. (Rasmus)</li>
<li>Made several adjustments to xslt extension (David Viner, Lehnar, Melvyn)
  <ul>
  <li>Added xslt_set_object and xslt_setopt function</li>
  <li>Changed backend interaction with Sablotron library</li>
  <li>Fixed leak with error_print</li>
  <li>Made xslt_make_array() always set NULL on last index to signal array end.</li>
  </ul>
</li>
<li>Changed the glue argument in implode() to be optional. If not specified,
  defaults to "". (Sterling)</li>
<li>Fixed fields argument to contain correct info for xslt_set_error_handler().
  (Patch by Lenar Lohmus)</li>
<li>Added --with-config-file-scan-dir compile-time switch which specifies a
  directory which will be scanned for *.ini files. (Rasmus)</li>
<li>Added ob_get_clean() and ob_get_flush(). (Yasuo)</li>
<li>Added ftp_ssl_connect() to ext/ftp for FTP over SSL support. (Stefan Esser)</li>
<li>Made a few additions and changes to Apache 2 sapi. (Ilia)
  <ul>
  <li>Added apache_response_headers(), apache_note(), apache_getenv() and
    apache_setenv() functions.</li>
  <li>Added more detailed error reporting to apache_lookup_uri() and virtual().</li>
  <li>Renamed getallheaders() to apache_request_headers() and made an alias for BC.</li>
  <li>Added php_apache_sapi_getenv() and php_apache_sapi_get_stat().</li>
  <li>Added syntax-highlighting handling (.phps)</li>
  </ul>
</li>
<li>Fixed strstr(), strchr() and strrchr() to be binary safe. (Andrey)</li>
<li>Added array_diff_assoc() and array_intersect_assoc(). (Andrey)</li>
<li><?php bugfix(17825); ?> (ob_start() chunk size option didn't work well). (Yasuo)</li>
<li>Fixed output buffer infinite loop when buffer_size became 0. (Marcus, Wez)</li>
<li>Added getopt() for parsing command line options and arguments. (Jon)</li>
<li>Added pg_fetch_assoc(), pg_fetch_all(), pg_ping(), pg_meta_data(), pg_convert(), 
  pg_insert(), pg_select(), pg_update(), pg_delete(), pg_result_seek(),
  pg_unescape_bytea(), pg_get_notify() and pg_get_pid(). (Yasuo)</li>
<li><?php bugfix(17281); ?> (Sanity checks for encoding sessions). (Ilia)</li>
<li><?php bugfix(16995); ?> and <?php bugl(19392); ?> (Prevent crash if $HTTP_SESSION_VARS != ARRAY).
  (Ilia)</li>
<li><?php bugfix(19292); ?> (open_basedir restriction problem). (Rasmus)</li>
<li><?php bugfix(19366); ?> (gdImageFill crashes when x &amp; y are outside of 
  the image's boundries). (Ilia)</li>
<li><?php bugfix(13936); ?> (__FILE__ constant didn't contain full path). (Ilia)</li>
<li>PHP now has a new stream system that allows it to do some clever stuff with
  fopen() and fsockopen().  As a result:
  <ul>
  <li>URL wrappers natively supports https:// URLs if you have compiled
    OpenSSL support into PHP (shared extension does not support this).</li>
  <li>Added support for fopen("ftps://...", ...) which allows to connect to FTP 
    servers via SSL. (Stefan Esser)</li>
  <li>fsockopen() adds support for ssl:// and tls:// connections via TCP/IP</li>
  <li>copy($srcfilename, $destfilename) can now be used with URL wrappers</li>
  <li>zlib wrappers/streams can be used even on systems without
  fopencookie()</li>
  <li>Changed 'zlib:' fopen wrapper to 'compress.zlib://' and deprecate
    'zlib:' to avoid ambiguities when filenames have ':' characters. (Wez)</li>
  <li>Added 'compress.bzip2://' stream and wrapper support.</li>
  <li>Added user-space streams - it is now possible to define a class in PHP
    code and register it as a URL wrapper. (stream_register_wrapper)</li>
  <li>Most extensions now support streams when passing files, which means
    that those extensions will now also support URL wrappers. (Wez)</li>
  <li>Added URL-wrapper support to exif. (Marcus)</li>
  <li>Added memory stream support. (Marcus)</li>
  <li>Renamed:
    <ul>
      <li>socket_set_timeout()  -&gt; stream_set_timeout()</li>
      <li>socket_set_blocking() -&gt; stream_set_blocking()</li>
      <li>set_file_buffer()     -&gt; stream_set_write_buffer()</li>
      <li>socket_get_status()   -&gt; stream_get_meta_data()</li>
	</ul>
    As these functions can (in theory) work on any type of stream. (Wez)</li>
  <li>Raw POST data is now available as "php://input" stream. (Hartmut)</li>
  <li>fopen("php://output", "wb") returns a stream that writes to the output
    buffer (like echo and print). (Wez)</li>
  <li>Added stream_context_create(), stream_context_set_params() and
    stream_context_set_option and added an optional fourth parameter to
    fopen() which accepts a stream context.  Contexts allow sharing of
    information between streams (a kind of "session") and setting
	notification callbacks. (Wez)</li>
  <li>Made the "User-Agent" header sent by http:// and https:// wrappers
	configurable in php.ini or via a stream context. (Sterling)</li>
  <li>Added stream_filter_prepend() and stream_filter_append() which apply
    a filter to either the top or the bottom of a stream filter stack.
    Implemented "string.rot13" filter as an example; more filters are
	expected to follow in later releases and other extensions. (Wez)</li>
  <li>Added stream_select() which works like socket_select but works on
    streams returned by fopen(), fsockopen() and pfsockopen() instead.
	(Wez)</li>
  <li>Added STDIN, STDOUT and STDERR constants for CLI sapi reflecting opened
    streams to their respective standard I/O counterparts. (Edin)</li>
  <li>Added php.ini option "auto_detect_line_endings" which enables PHP to
    detect Macintosh, Unix and Dos end-of-line characters in fgets() and
	file(). Fixes bugs <?php bugl(16521); ?> and <?php bugl(16708); ?>. (Wez)</li>
  <li>Fixed include(), require() and GD functions to work with remote files
    under win32.</li>
  <li><?php bugfix(18609); ?> (ImageCreateFromJPEG can't fetch from a URL). (Wez)</li>
  </ul>
</li>
<li><?php bugfix(18022); ?> (fopen does not work with php://stdin anymore on Solaris).
  (Wez)</li>
<li>Added php.ini option "default_socket_timeout" to set the timeout limit for 
  PHP network streams. (kalowsky, ilia@prohost.org, Wez)</li>
<li>Added file_get_contents() which returns the contents of a file as a string. 
  This function also supports the URL wrappers. (Wez)</li>
<li><?php bugfix(19595); ?> (Missing functions for GD2 format handling). (Edin)</li>
<li><?php bugfix(19633); ?> (Wrong directories in ext/ldap/config.m4). (Derick)</li>
<li>Fixed bugs <?php bugl(17274); ?> and <?php bugl(19627); ?> (segfault in sem_remove). (Wez)</li>
<li>Added mb_convert_case() function to the mbstring extension which can convert
  strings between upper, lower and title case using Unicode mappings.
  <?php bugfix(19257); ?> (strtolower &amp; strtoupper does not work for UTF-8 strings).
  (Wez)</li>
<li><?php bugfix(18521); ?> (htmlentities didn't warn about unsupported charsets). (Wez)</li>
<li><?php bugfix(11643); ?> (Session related, fix SID redefinition). (Ilia)</li>
<li><?php bugfix(18556); ?> (Scripting Engine, problem with locales like tr_TR). (Ilia)</li>
<li>Changed y2k_compliance to default to 1 now. (Sascha)</li>
<li>Added platform independent socket error constants for better error handling. (Jason)</li>
<li>Update output of phpinfo() to use more CSS to reduce the file size, do
  proper HTML escaping, and make it XHTML compliant. (Colin)</li>
<li>Fixed compile errors in the FriBidi extension (Bug <?php bugl(16414); ?>). (Tal)</li>
<li>Fixed bugs <?php bugl(7472); ?>, <?php bugl(12120); ?> and <?php bugl(12989); ?> as well as other potential problems
  with strip_tags() function. (Ilia)</li>
<li>Fixed bugs <?php bugl(17570); ?> and <?php bugl(17957); ?> (Regexps related). (Andrei, Ilia)</li>
<li>Fixed bugs <?php bugl(18167); ?> and <?php bugl(16859); ?> (SEGV with session_decode). (Ilia)</li>
<li>Fixed bugs <?php bugl(19573); ?> and <?php bugl(13472); ?> (Session, XHTML compliance and trans_sid). 
  (Sascha)</li>
<li><?php bugfix(19570); ?> (last character was missing in get_html_translation_table). 
  (Wez)</li>
<li>Upgraded PCRE to version 3.9. (Wez)</li>
<li>Fixed bug in OCIResult() which returned garbage when called on 
  empty result-sets. (Thies)</li>
<li>Added ability to use Perl-style ${n} subpattern references in the
  replacement string for preg_replace() (bug <?php bugl(18442); ?>). (Andrei)</li>
<li>Fixed array_merge_recursive() to avoid problems with merging cyclical
  arrays (bug <?php bugl(16064); ?>). (Andrei)</li>
<li>Made function_exists() work properly with disabled functions. (Andrei)</li>
<li>Added ability to extract() variables as references via OR'able EXTR_REFS
  flag. (Andrei)</li>
<li>Fixed a build failure with the OCI8 extension on Tru64.
  (Patch by Michael Mauch, micahel.mauch@gmx.de)</li>
<li>Added --disable-all configure option. (Jani)</li>
<li>Backported debug_backtrace() from ZendEngine2. (Thies)</li>
<li>Added html-free phpinfo() output for CLI. (Jan)</li>
<li>Fixed socket_recvfrom() to be binary safe. (Jason)</li>
<li>Changed mail() to use escape_shell_cmd() to allow multiple extra parameters 
  to the invocation of the mailer as used in the fifth parameter. (Derick)</li>
<li>Changed cURL extension to require cURL version 7.9.8 (Derick)</li>
<li>Added zend_execute_internal which is called like zend_execute but for
  internal functions. (Thies)</li>
<li>Changed pg_connection_status(), pg_connection_reset(), pg_connection_busy(),
  pg_result_status() and pg_result_error() to silently return FALSE when 
  resource is not passed to them. (Yasuo)</li>
<li>Fixed some mysql compile failures on 64 bit-OS. (Georg)</li>
<li>Added warnings for deprecated mysql functions:
  <ul>
  <li>mysql_create_db() </li>
  <li>mysql_drop_db() </li>
  <li>mysql_escape_string()</li>
  </ul>
</li>
<li>Added XsltObject-&lt;result_dump_mem($result) for returning xslt-result directly
  into a string and XsltObject-&lt;result_dump_file($result,$file[,$compression]) 
  for dumping into a file. (morus.walter@web.de, chregu)</li>
<li>Made mime_magic and ZIP extensions available on Windows. (Edin)</li>
<li>Added xslt_backend_version() and xslt_backend_name() for getting
  information about the processor backend. (chregu)</li>
<li>Added ImageColorMatch() and ImageLayerEffect() functions which are only 
  available when using the bundled GD library. (ttoohey)</li>
<li>Made major improvents to the pcntl extension. (Jason)
  <ul>
  <li>Greatly improved performance (signal callback mechanism uses ticks)</li>
  <li>Implemented object signal callback ability by using array($obj, $method)</li>
  <li>Added a restart parameter to pcntl_signal, which allows you to disable
    the default of system call restarting</li>
  </ul>
</li>
<li>Changed DomNode-&gt;next_sibling() and DomNode-&gt;previous_sibling() to return
  NULL instead of false (W3C specs). (chregu)</li>
<li>Changed DomNode-&gt;insert_before() and DomNode-&gt;append_child() to conform to
  W3C specs (moving not copying nodes, accepting NULL as 2nd param). (chregu)</li>
<li>Added DomNode-&gt;set_namespace(uri[,prefix]) (chregu)</li>
<li>Fixed shuffle() to properly generate all possibilities. (Patch provided by
  Adam &lt;adam@trachtenberg.com&gt;)</li>
<li>Fixed DomNode-&gt;insert_before() to behave according to W3C spec
  ie. new_child is moved, not copied. (chregu)</li>
<li>Added some namespace support with DomNode-&gt;add_namespace(uri, prefix)
  and DomDocument-&gt;create_element_ns(uri, nodename) (chregu)</li>
<li>Added optional parameter to DomElement-&gt;node_name() for retrieving fully 
  qualified name (ie. namespace prefix). (chregu)</li>
<li>Changed DomNode-&gt;child_nodes() to return empty array instead of false if no
  child nodes are found. (chregu)</li>
<li>Fixed a bug with handling the Expect header. (Patch by ilia@prohost.org)</li>
<li>Fixed a bug in ODBC where closing the module caused a crash in the Windows 
  executable. (kalowsky)</li>
<li>Fixed memory leaks in pack() and unpack(). (Patch by ilia@prohost.org)</li>
<li>Added URLs to error messages which direct to a page describing the error or 
  function in question. (Derick, Wez, Marcus)</li>
<li>Added odbc_data_source() functionality to identify DB ServerName, and a 
  description of it gathered from the DSN. (kalowsky)</li>
<li>Fixed copy() to return TRUE with 0 byte files. (Patch by ilia@prohost.org)</li>
<li>Added ob_list_handlers() which returns an array of all active output
  handlers. (Marcus)</li>
<li>Added mbstring encoding/decoding "HTML-ENTITIES". (Marcus)</li>
<li>Added parameter 'L' for mb_http_input() to retrieve input encoding as a
  comma separated string. (Marcus)</li>
<li>Added the ability for declare() compiler modifications to occur globally
  by using an empty statement. (Jason, Zend Engine)
  i.e.  
  <pre>
        //Globally enables the ticks modifier for the whole program
        declare (ticks=1);

        //Enables the ticks modifier for just the lexical block containing
        //"statement".
        declare (ticks=1) {
           statement;
        }
  </pre>
</li>
<li>Brought strtotime() "next" keyword handling in line with documentation and
  its glibc cousin. (Rasmus)</li>
<li>Fixed str_rot13() to not mangle source string. (Rasmus)</li>
<li>Fixed imap_get_quota() to work with multiple returned resources as per
  the RFC 2087 and bug <?php bugl(14673); ?>. (kalowsky, Sander Steffann)</li>
<li>Added MarkerNote decoding to exif_read_data() for several Cameras. (Marcus)</li>
<li>Disabled zlib.output_compression for "image/" content-type
  headers which can be changed during script execution. (Stefan)</li>
<li>Added new asynchronous FTP functions. (Stefan)</li>
<li>Added optional 5th parameter to FTP functions to support resuming. (Stefan)</li>
<li>Added optional 2nd parameter to print_r() to make it return the variable
  representation instead of echoing it. (Derick)</li>
<li>Added mysql_ping(), mysql_real_escape_string(), mysql_character_set_name(), 
  mysql_thread_id(), mysql_stat() and mysql_list_processes(). (Zak, Georg)</li>
<li>Added safe_mode &amp; open_basedir checks for pg_lo_export(). (Yasuo)</li>
<li>Added open_basedir check for pg_lo_import(). (Yasuo)</li>
<li>Fixed infinite recursion crash bug in ticks. (Jason)</li>
<li>Added php.ini option "mysql.connect_timeout" to set the timeout limit for 
  mysql_connect() and mysql_pconnect(). (Georg)</li>
<li>Added optional parameter "flags" to mysql_connect() and mysql_pconnect() 
  which can be used to set usage of idle timeout and different protocols,
  SSL and compressed. (Georg)</li>
<li>Added automatic rollback to ext/mysql for non committed transactions. (Georg)</li>
<li>Fixed cases where preg_split() incorrectly terminated final element if it 
  contained null bytes. (Andrei)</li>
<li>Added persistent connections/pipelining to thttpd. (Sascha)</li>
<li>Fixed two potential blocking issues in thttpd. (Sascha)</li>
<li>Fixed broken header file detection on Solaris. (Sascha)</li>
<li>Improved nss/socket-related symbol/library detection. (Jani, Sascha)</li>
<li>Made iconv() work well with both libiconv and libgconv. (Moriyoshi, Yasuo)</li>
<li>Fixed socket_set_timeout() on win32. (Jason, Edin, Jani)</li>
<li>Added domxml_node_namespace_uri(). (Rui Lopes)</li>
<li>Fixed win32 memory leak in /ext/sockets that would occur on any error 
  condition. Also fixed host resolution error messages on win32. (Jason)</li>
<li>Added optional 3rd parameter 'recursive' to ftp_rawlist() which will
  do 'LIST -R' instead of 'LIST'. (Jani)</li>
<li>Changed getimagesize() to always set unknown fields to 0 and added support
  for iff imagetype. (Marcus)</li>
<li>Added runtime Apache2 thread check to ensure we don't run a non-threaded
  PHP inside a threaded Apache2 MPM.  (Rasmus)</li>
<li>Made getimagesize() and exif_read_data() to return also the mime-type and 
  exif_thumbnail() to return also the image-type. (Marcus)</li>
<li>Added image_type_to_mime_type() which converts image-types to mime-types.
  (Marcus)</li>
<li>Made GD functions to only exist if they are available in libgd. Now the 
  availability can be tested with function_exists(). (Derick)</li>
<li>Added an optional parameter to the header() function which overrides the HTTP
  response code. (Derick)</li>
<li>Changed the order of which modules are unloaded to the reverse order of
  which they were loaded. (Derick, Zend Engine)</li>
<li>Added preliminary SAX-Input support. It's now possible to build a DomDocument
  with SAX-Events. (chregu)</li>
<li>Bundled GD library 2.0.1 with php (ext/gd/libgd) (Rasmus, Jani, Markus, Edin)</li>
<li>Fixed bzopen() crash in thread-safe mode. (Andrei)</li>
<li>Added better error-messages (3rd parameter) and validating of DTDs (2nd
  parameter) to domxml_open_mem() and domxml_open_file(). (Christian)</li>
<li>Added domxml_doc_validate() for validating existing DomDocuments with a DTD.
  (Christian)</li>
<li>Added ability to capture string offsets in preg_match_*() results.
  (David Brown, Andrei)</li>
<li>Fixed set_error_handler() to accept methods as callbacks and also report
  invalid callbacks. (Andrei)</li>
<li>Fixed a memory corruption bug in overload extension. (Andrei)</li>
<li>Fixed error handling in fsockopen() on win32. (Jason)</li>
<li>Added win32 support for the timeout parameter of fsockopen(). (Jason)</li>
<li>Fixed shuffle() to provide equal distribution of values. (Andrei)</li>
<li>Added --with-mysql-sock configure option which can be used to override
  the unix socket location. (e.g. NFS compiles, etc.) (James Cox)</li>
<li>Fixed is_a() to properly work on extension registered classes. (Andrei)</li>
<li>Added new constants: PHP_PREFIX and PHP_SHLIB_SUFFIX. (Stig)</li>
<li>Added pctnl_alarm() function. (Edin)</li>
<li>If zlib.output_compression is enabled and a page is compressed 
  a "Vary: Accept-Encoding" header is now added. (Stefan)</li>
<li>Renamed getallheaders() to apache_request_headers() and kept getallheaders() 
  as an alias to it. Also added apache_response_headers() which returns the 
  current response headers from Apache. (Rasmus)</li>
<li>Added missing AddRef() calls in the COM extension. This should fix weird 
  behaviour (in particular with ADODB). (Harald)</li>
<li>Fixed segfault in version_compare(). (Stig)</li>
<li>Added compressed Flash MX files support to getimagesize(). (Derick)</li>
<li>Added ability to capture string offsets in preg_split() results.
  (David Brown, Andrei)</li>
<li>Fixed a crash bug in token_get_all(). (Andrei)</li>
<li>Implemented glob() for Unix/Win32. (Hartmut, Edin, Markus)</li>
<li>Added domxml_doc_set_root() to change the root node. (Lukas Schroeder)</li>
<li>Fixed a crash bug in stripslashes() when working in sybase mode. (Rasmus)</li>
<li>Added experimental support for Simplified Chinese, Traditional Chinese and
  Korean encodings into mbstring. (Rui)</li>
<li>Misc. Win32 mail() enhancements: support 'From:' header (msisolak@yahoo.com),
  support Bcc header, case-insensitive headers, enhanced error reporting,
  automatic proper line ending conversion, fixed crash with Cc, fixed buffer
  overflows with $header. (Markus)</li>
<li>Improved IMAP extension performance. (adam.kauffman@mindspring.com,
  rjs3@andrew.cmu.edu, Jon)</li>
<li>Added optional 5th parameter to domxml_xslt_process(). When set, profiling
  information is saved to the specified file. (chregu)</li>
<li>Added MD5 support for crypt() on Windows. (Edin)</li>
<li>Fixed resource bug in LDAP extension. (Stig Venaas)</li>
<li>Fixed crash in output buffering when buffer is overwritten in a callback. 
  (Yasuo)</li>
<li>Added output_add_rewrite_var() and output_remove_rewrite_var() to inject
  and remove variables from the URL-Rewriter. (Thies)</li>
<li>The Windows build can now be configured more comfortably, for example 
  when dealing with built-in extensions. (Sebastian)</li>
<li>Added large OID value (2^31 to 2^32) support for pg_lo_import(),
  pg_lo_unlink(), pg_lo_open() and pg_lo_export(). (Yasuo)</li>
<li>Fixed mixing OCIPlogon() and OCINLogon() to not leak Oracle-Sessions. (Thies)</li>
<li>Added php.ini options for EXIF extension to encode and decode Unicode/JIS
  user comments. (Marcus)</li>
<li>Changed the "-c" CLI/CGI option to allow both 'filename' and 
  'path to php.ini'. (Yasuo)</li>
<li>Added version information to the .dll and .exe files created under Windows.
  (jtate)</li>
<li>Added __FUNCTION__ and __CLASS__ constants. (Jani, Zend Engine)</li>
<li>Added optional 2nd parameter for pg_result_status() to specify return type. 
  (Yasuo)</li>
<li>Added "log_errors_max_len" php.ini option which controls maximum length for 
  error messages. (Marcus)</li>
<li>Added "ignore_repeated_errors" and "ignore_repeated_source" php.ini options
  which can be used to disable logging of repeated error messages. (Marcus)</li>
<li>Made pg_last_notice() work correctly. (Yasuo)</li>
<li>Added "pgsql.ignore_notice" and "pgsql.log_notice" php.ini options. (Yasuo)</li>
<li>Added "zlib.output_compression_level" php.ini option. (Stig)</li>
<li>Added support for --with-apxs build on Mac OS X / Darwin. (markonen)</li>
<li>Added support for dynamically loaded extensions on OS X / Darwin. 
  NOTE: This requires Apache 1.3.25 or later. (kalowsky, markonen)</li>
<li>Fixed CR/LF processing in quoted_printable_decode() on Win32. (kir)</li>
<li>Made crack extension available on Win32. Cracklib libraries for Win32 are
  available at http://www.jtatesoftware.com/cracklib/. (jtate)</li>
<li>Added mysql_info() function. (Jan)</li>
<li>Added mysql_list_processes() and mysql_stat() functions. (Georg)</li>
<li>Fixed memory allocation problem on systems that have iconv() support in libc.
  (Yasuo)</li>
<li>Made var_dump() handle recursive structures better. (Yasuo, Derick)</li>
<li>Added exif_imagetype() function. (Marcus)</li>
<li>New improved build system. Among other improvements, replaces the slow 
  recursive make with one global Makefile and eases the integration of proper
  dependencies. Automake is only needed for its aclocal tool. The build 
  process is now more portable and less resource-consuming. (Sascha)</li>
</ul>
More information on this release on <a href="/releases.php#4.3.0">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.2.3"><!-- {{{ 4.2.3 -->
<h3>Version 4.2.3</h3>
<?php release_date("06-Sep-2002"); ?>
<ul>
<li>Enable UTF8 modifier support for PCRE on win32. (Wez, Edin)</li>
<li>Enabled strcoll() on win32. (Markus)</li>
<li>Fixed possible ASCII control char injection in mail(). (Stefan Esser)</li>
<li>Fixed a potential crash bug in import_request_variables() (Zeev)</li>
<li>Fixed several problems with directory functions on Windows. (Steph)</li>
<li>Fixed xbithack bug in Apache module. (Rasmus)</li>
<li>Fixed a bug that prevented touch() from working on various platforms.  (Steph)</li>
<li>Fixed ob_gzhandler()'s handling of requests that do have the Accept-Encoding header, but do not allow compression. (Zeev)</li>
<li>Fixed several bugs in the multithreaded version that could cause random parse errors, especially on machines with multiple CPUs. (Zeev, Zend Engine)</li>
<li>Fixed a build problem in bcmath. (Alan)</li>
<li>Fixed several bzip2 issues. (Andrei, kalowsky)</li>
<li>Fixed several COM issues. (Harald)</li>
<li>Various exif fixes. (Marcus)</li>
<li>Fixed domxml_xslt_process() and domxml_get_element_by_id() and several other issues in DOMXML. (Christian)</li>
<li>Fixed DOMXML crash on removing previously created attributes. (Christian)</li>
<li>Fixed crash when converting $GLOBALS to an object. (Zeev, Zend Engine)</li>
<li>Fixed ImageCreateFromGD2Part() (Jani)</li>
<li>Fixed a build issue in the IMAP extension under IRIX. (kalowsky)</li>
<li>Fixed a bug in imap_last_error() (Jani)</li>
<li>Various mbstring fixes. (Yasuo, Rui)</li>
<li>Fixed a build problem in the mcal extension. (Jani)</li>
<li>Made MySQL rollback open transactions when the request ends. (Georg)</li>
<li>Fixed a crash in the shutdown order of the ODBC module. (kalowsky)</li>
<li>Fixed PCRE build problems. (troels@arvin.dk)</li>
<li>Fixed a crash in pg_lo_write() (Yasuo)</li>
<li>Fixed posix_isatty() and posix_ttyname(). (Markus)</li>
<li>Fixed accidental pg_lo_import() API change. (Yasuo)</li>
<li>Fixed ereg_replace() crash when the backreference number was greater than the number of captured subpatterns. (oliver@billix.franken.de)</li>
<li>Fixed array_rand() on thread-safe platforms such as Windows. (Edin)</li>
<li>Report the right exit code after a call to exit(). (Edin)</li>
</ul>
More information on this release on <a href="/releases.php#4.2.3">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.2.2"><!-- {{{ 4.2.2 -->
<h3>Version 4.2.2</h3>
<?php release_date("22-Jul-2002"); ?>
<ul>
<li>Fixed serious security vulnerability. (Stefan Esser)</li>
</ul>
More information on this release on <a href="/releases.php#4.2.2">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.2.1"><!-- {{{ 4.2.1 -->
<h3>Version 4.2.1</h3>
<?php release_date("13-May-2002"); ?>
<ul>
<li>Added safe-mode checks to show_source(), parse_ini_file() and rmdir(). Also
 fixed security problems with safe_mode_include_dir directive. (Rasmus)</li>
<li>Changed HTTP upload code to accept 0 byte file uploads. (Zeev)</li>
<li>Major update of domxml. New functions, better DOM compliance and bug fixes:
  <ul>
    <li>
      Changed the old $node-&gt;append_child() to $node-&gt;append_sibling() since
      the new append_child() behaves correctly (= W3C standard).
    </li>
    <li>
      Added domxml functions:
      <ul>
        <li>domxml_elem_get_elements_by_tagname()</li>
        <li>domxml_doc_get_elements_by_tagname()</li>
        <li>domxml_doc_get_element_by_id()</li>
        <li>domxml_elem_remove_attribute()</li>
        <li>domxml_elem_get_attribute_node()</li>
      </ul>
    </li>
    <li>
      Fixed a segfault in domxml_unlink(). 
    </li>
    <li>
      Added formatting option to domxml_dump_mem(). 
    </li>
  </ul>
  (Uwe, jtate, Chregu)</li>
<li>Fixed a bug in socket_select() that could cause unexpected behavior when
  using a statement like $w = $e = array($sock); This change unfortunately
  prevents the use of constant values (e.g. NULL) for the socket array
  paramaters. Instead, use a temporary variable or an expression with the
  leftmost member being a temporary variable. ex.:
  socket_select($w, $r, $e = NULL, 10); (Jason)</li>
<li>Fixed crashes in the session serializer. (Stas)</li>
<li>Fixed malformed atime/mtime with touch(). (Yasuo)</li>
<li>Fixed a couple of bugs in array_sum() and array_merge(). (Andrei)</li>
<li>Fixed SJIS directory name handling under Windows. (Rui)</li>
<li>Fixed empty mb_output_handler() output when Content-Type is specified.
  (Yasuo)</li>
<li>Fixed the false logic in ext/session which made SID constant not to be
  defined when cookies are disabled. (Sascha)</li>
<li>Fixed possible crash bug in HTTP uploads. (Patch: Lucas Schroeder)</li>
<li>Fixed possible NULL-pointer dereferencing in the COM extension which
  caused 'Error in php_OLECHAR_to_char()' warnings on various places.
  Also modified the API to consistently return NULL in case of an error.
  (Alan, Harald)</li>
<li>Fixed a bug in the COM extension that caused outproc servers to 'hang'
  because of a missing Release() call. (Alan, Harald)</li>
</ul>
More information on this release on <a href="/releases.php#4.2.1">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.2.0"><!-- {{{ 4.2.0 -->
<h3>Version 4.2.0</h3>
<?php release_date("22-Apr-2002"); ?>
<ul>
<li>ATTENTION!! register_globals defaults to 'off' now !!!</li>
<li>Note: Apache2 support is EXPERIMENTAL.</li>
<li>Moved ext/mailparse to PECL. See <a href="http://thebrainroom.com/opensource/php/">http://thebrainroom.com/opensource/php/</a>
for more information and to download the extension. (Wez/Jim)</li>
<li>Fixed pg_last_notice() crash. (Yasuo)</li>
<li>Modified the mysql extension to disable 'LOAD LOCAL' when safe mode is
enabled. (Jason)</li>
<li>Fixed HTTP file upload support to handle big files better. (Jani)</li>
<li>Major modifications to the Sockets Extension and its API (Jason):
  <ul>
  <li>Fixed numerous bugs.</li>
  <li>Added automatic host lookup capability to all functions that take addr's.
example: socket_connect($sock, 'www.yahoo.com', 80);</li>
  <li>Corrected and standardized host lookup errors</li>
  <li>Modified socket_recv() behavior. [$r=socket_recv($sock, $buf, $len, $flags)]</li>
  <li>Added socket_set_block() which changes a socket into blocking IO mode</li>
  <li>Modified socket_last_error() to not clear the last error</li>
  <li>Added socket_clear_error() which clears the last error on a socket</li>
  <li>Removed all code pertaining to fd_sets (socket_fd_*)</li>
  <li>Modified/Improved socket_select() to accept array of resources instead of fd_sets. example:
    <pre>
    &lt;?php<br>
    $wfds=$rfds=array($sock1, $sock2, $sock3, $sock7);<br>
    $r=socket_select($rfds, $wfds, NULL, 1);<br>
    print "Ready to read:\n"; var_dump($rfds);<br>
    ?&gt;<br>
    </pre></li>
  </ul></li>
<li>Fixed segfault in ibase_close() if user does not free the resultset.
Bugs <?php bugl(15419); ?>, <?php bugl(15992); ?>. (daniela)</li>
<li>Fixed pg_last_notice() crash. (Yasuo)</li>
<li>Added optional 3rd parameter "int encoding_mode" to gzencode() and fixed
parameters to conform documentation. (Stefan)</li>
<li>Changed read_exif_data() to be an alias of exif_read_data(). (Marcus)</li>
<li>Added exif_tagname() function which returns the names of tags and
exif_thumbnail() function to extract embedded thumbnails. (Marcus)</li>
<li>Fixed iconv support with FreeBSD. (kalowsky)</li>
<li>Cleaned up the posix extension: (Markus)
<ul>
  <li>Removed unwanted warning messages</li>
  <li>Added posix_errno() and posix_strerror() for fetching error messages</li>
  <li>Changed the way posix_getgrnam() and posix_getgrgid() return their values
(breaks BC but makes more sense)</li>
  <li>Does not include functions in symbol table which aren't supported on host
system.</li>
</ul></li>
<li>Added TIFF support for getimagesize() and read_exif_data(). (Marcus)</li>
<li>Changed the Velocis extension namespace to Birdstep to reflect new product
name. Added aliases for BC. (James)</li>
<li>Added safe_mode checks for opendir(). (jflemer)</li>
<li>Changed the 2nd parameter in pgsql_fetch_*() functions to support NULL if
all 3 parameters are supplied, but you do not want to provide a row number.
(Derick)</li>
<li>Improved iconv() when using libc's iconv. (Yasuo)</li>
<li>Added PHP_SAPI constant which contains the name of running SAPI. (Edin)</li>
<li>Added ob_get_status() which returns an array of buffers with their status.
(Yasuo)</li>
<li>Fixed a crash bug in ob_end_*() functions. ob_end_*() will not delete
buffers that may not be deleted. (Yasuo)</li>
<li>Added 3rd parameter "bool erase" to ob_start(). If FALSE, the buffer may not
be deleted until script finishes. (Yasuo)</li>
<li>Changed ob_*() functions to return TRUE for success, FALSE for failure.
(Yasuo)</li>
<li>Added sybase_ct support to dbx module. (Marc)</li>
<li>Fixed error message handling with PostgreSQL 7.2. (Rui)</li>
<li>Added object aggregation capability, see aggregation_*() functions. (Andrei)</li>
<li>Added debug_zval_dump() which works similarly to var_dump, but displays
extra internal information such as refcounts and true type names. (Jason)</li>
<li>Added Andrei's tokenizer extension. (Stig)</li>
<li>Fixed a bug in the COM extension which caused php to crash in
php_COM_get_ids_of_names(). (Paul, Harald)</li>
<li>Removed ext/satellite. It is now part of PEAR. (eriksson)</li>
<li>Changed php.ini directive 'safe_mode_include_dir' to accept a (semi)colon
separated path (like 'include_path') rather than a single directory.
(jflemer)</li>
<li>Added is_a() function that can be used to test whether object is of a certain
class or is derived from it. (Andrei, Zend Engine)</li>
<li>Added optional parameter to highlight_string() and highlight_file() which
makes these functions to return a highlighted string instead of dumping
it to standard output. (Derick)</li>
<li>Added EXTR_IF_EXISTS and EXTR_PREFIX_IF_EXISTS flags to extract(). (Rasmus)</li>
<li>Fixed a segfault in pg_pconnect(). If PostgreSQL server is restarted, broken
connection is detected and reconnected. (Yasuo)</li>
<li>Fixed --enable-safe-mode configure option. (Yasuo)</li>
<li>Added function domxml_dump_node($doc,$node). Dumps a node plus all children
into a string. (chregu)</li>
<li>Added function domxml_node_get_content(). (chregu)</li>
<li>Added function domxml_dump_file($filename,[$compression]). Dumps XML to
a file and uses compression, if specified. (chregu)</li>
<li>Added exslt integration to domxml extension (<a href="http://exslt.org/">http://exslt.org/</a> for details).
Configure with --with-dom-exslt[=DIR] (and --with-dom-xslt).
(chregu,jaroslaw)</li>
<li>Fixed session_unset() to not touch any globals if register_globals is off.
(Thies)</li>
<li>Added 3 new optional parameters to OCIFetchStatement(). They control
the number of rows to skip at the beginning of the cursor, the
maximun numer of rows that should be fetched and the format of the
returned array. (Thies)</li>
<li>Updated the XSLT extension to support Sablotron 0.8. (Petr Cimprich)</li>
<li>Fixed a bug in preg_match() and preg_match_all() when matching strings
contain null bytes. (Andrei)</li>
<li>Added xpath_register_ns() function. This makes it possible to issue XPath
queries with namespaces like for example: "//namespace:sampletag".
(Chris Jarecki)</li>
<li>Added multi-byte enabled regular expression functions. (Rui)</li>
<li>Added optional second parameter to count() which can be used to specify
either normal or recursive counting. (patch by Vlad Bosinceanu &lt;<a href="mailto:glipy@fx.ro">glipy@fx.ro</a>&gt;)</li>
<li>Added mb_get_info() to get internal settings of mbstring. (Rui)</li>
<li>Added async query functions to PostgreSQL module. (Yasuo)</li>
<li>Added pg_copy_to()/pg_copy_from() for PostgreSQL module. (Youichi, Yasuo)</li>
<li>Added IPv6 support for FTP extension. (Stig Venaas)</li>
<li>Improved the speed of wordwrap() significantly. (Jim)</li>
<li>Fixed pow()'s incorrect behaviour when dealing with powers of 0. (Jim)</li>
<li>Added is_finite(), is_infinite() and is_nan(). (Jim)</li>
<li>Fixed segfault in wordwrap() when wrapping to zero width and using
multi-character break or trying to force cut (bug <?php bugl(12768); ?>). (Jim)</li>
<li>Fixed several bugs in dbase extension (dbase_pack() truncate file to right
size, fix <?php bugl(6852) ?> #1 and #2). (Vlad)</li>
<li>Fixed bug in krsort() where an extra character was being compared. (Andi)</li>
<li>Fixed bug that made pspell include pspell.h from a wrong location. (Vlad)</li>
<li>Added function overload in mbstring to add multibyte support for
string and mail functions. (Rui)</li>
<li>Added flags parameter to preg_grep(). The only flag currently is
PREG_GREP_INVERT that will make the function return entries that
did not match. (Andrei)</li>
<li>Fixed several crash bugs in the xslt extension. (Markus, Derick)</li>
<li>Fixed problem with dbase not returning very large (larger than long)
integers properly. (Vlad)</li>
<li>Added concepts to IRCG: bailout-on-trivial issue, write output to
files, fetch a resource upon connection end. (Sascha)</li>
<li>Fixed POST-related bugs in thttpd, added QUERY_STRING, HTTP_HOST,
HTTP_ACCEPT_LANGUAGE to the script environment, improved patch
to send correct MIME types, and added support for /nocache/. (Sascha)</li>
<li>Fixed several bugs and memleaks in the domxml extension. (Markus)</li>
<li>Added var_export() which outputs a representation of a variable as reusable
PHP code. (Derick)</li>
<li>Added -w option to the CGI-version to strip all comments and whitespace
from the script. (Thies)</li>
<li>Added support for SO_RCVTIMEO and SO_SNDTIMEO to ext/sockets. (Jason)</li>
<li>Added ob_get_level() which returns the nesting level of the output buffering
mechanism. (Yasuo, Derick)</li>
<li>Added ob_flush() and ob_clean() functions which flush and clean an output
buffer without destroying the buffer. (Derick)</li>
<li>Added new optional parameter to mysql_connect() which forces a new database
link to be created. (Markus, Derick)</li>
<li>Added ldap_sort() function. (Stig Venaas)</li>
<li>Added md5_file() function which calculates the MD5 sum of a file.
Patch by Alessandro Astarita &lt;<a href="mailto:aleast@capri.it">aleast@capri.it</a>&gt; (Derick)</li>
<li>Added support for parsing recordsets contained in WDDX packets. (Andrei)</li>
<li>Renamed key_exists() to array_key_exists(). (Derick)</li>
<li>Fixed ImageColorsForIndex() and ImageColorAt() to work for TrueColor
images. (Rasmus)</li>
<li>Added support for bind_textdomain_codeset(). &lt;<a href="mailto:rudib@email.si">rudib@email.si</a>&gt;</li>
<li>Added generic Win 32 API extension. (jmoore)</li>
<li>Removed warning message about NONEXISTENT character set from mysql_connect()
when the server's default character set != latin1. (MySQL Team)</li>
<li>Added Direct I/O extension for lowlevel access to the POSIX layer. (Sterling)</li>
<li>Added SAPI module for the WebJames server on RISC OS. (Alex Waugh)</li>
<li>Fixed ldap_add() and ldap_modify() functions to throw a warning with illegal
value arrays. Previously segfaulted or added wrong value. (Stig Venaas)</li>
<li>Added udm_check_charset() function into mnoGoSearch extension. (gluke)</li>
<li>Fixed mnoGoSearch extension to support mnogosearch-3.2.x. (gluke)</li>
<li>Made fbsql_num_rows() to return the correct value on all select statements.
(Frank)</li>
<li>Added array_chunk() function which splits an array into chunks of specified
size. (Andrei)</li>
<li>Fixed $HTTP_RAW_POST_DATA to be populated on a missing content-type when
always_populate_raw_post_data is on. (Rasmus)</li>
<li>Added session_cache_expire() function. (patch by &lt;<a href="mailto:anuradha@gnu.org">anuradha@gnu.org</a>&gt;) (Andrei)</li>
<li>Added array_fill() function. (Rasmus)</li>
<li>Made Authorization header to be hidden from phpinfo() output in safe_mode.
(Rasmus)</li>
<li>Re-instated safe-mode realm mangling. (Rasmus)</li>
<li>Fixed a bug in preg_replace() that would change the type of the replacement
array entries to string. (Andrei)</li>
<li>Added user-space object overloading extension. (Andrei)</li>
<li>Added ldap_start_tls() function. (Stig Venaas, patch by &lt;<a href="mailto:kuenne@rentec.com">kuenne@rentec.com</a>&gt;)</li>
<li>Changed rand() and mt_rand() to be seed automatically if srand() or
mt_srand() has not been called. (Sterling)</li>
<li>Changed the seed options to srand() and mt_srand() to be optional. If the
seed is not specified the most random seed possible is generated. (Sterling)</li>
<li>Added array_change_key_case() function which returns an array with all
string keys lowercased or uppercased. (Edin)</li>
<li>Added parameter to ircg_pconnect to suppress treating non-fatal errors
as fatal, and added conversion of Windows quotes to &amp;quot;. (Sascha)</li>
<li>Added pcntl_exec() function which behaves similar to the system execve.
(Jason)</li>
<li>Fixed segfault and check for truecolor image in ImageColorAt(). (Rasmus)</li>
<li>Fixed nl2br() to handle all styles of line-endings in one string.
(Boian, Derick)</li>
<li>Added mcrypt_generic_deinit() to replace mcrypt_generic_end(). (Derick)</li>
<li>Added apache_setenv() function for injecting variables into Apache's
subprocess_env table. (Rasmus)</li>
<li>Added support for 'int', 'bool', 'float' and 'null' in settype(). (Jeroen)</li>
<li>Added IPv6 support to gethostbyaddr().
(Patch by Matthias Wimmer &lt;<a href="mailto:matthias@charente.de">matthias@charente.de</a>&gt; and venaas)</li>
<li>Fixed LONG_VARCHAR type crashing in ODBC extension. Patch by Walter Franzini.
(kalowsky)</li>
<li>Changed in_array() and search_array() to allow the needle to be an array
in itself. (Andrei)</li>
<li>Added ini_get_all() function which returns all registered ini entries
or entries for the specified extension. (Jani)</li>
<li>Added support for chinese encodings in htmlentities() and htmlspecialchars().
(Patch by Alan Knowles &lt;<a href="mailto:alan_k@hklc.com">alan_k@hklc.com</a>&gt; and Wez)</li>
<li>Improved support for autoconf-2.50+/libtool 1.4b+. (Jan Kneschke, Sascha)</li>
</ul>
More information on this release on <a href="/releases.php#4.2.0">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.1.2"><!-- {{{ 4.1.2 -->
<h3>Version 4.1.2</h3>
<?php release_date("27-Feb-2002"); ?>
<ul>
<li>Fixed start up failure when mm save handler is used and there is multiple 
  SAPIs are working at the same time. (Yasuo)</li>
<li>Fixed the Roxen SAPI (Yasuo)</li>
<li>Fixed a buffer overflow in the RFC-1867 file upload code (Stefan)</li>
<li>Fixed a crash in the session module (Yasuo)</li>
<li>Fixed a crash in the pspell module (Yasuo)</li>
<li>Changed the default output encoding of mbstring 'pass' to fix 
  initialization problem (Rui)</li>
</ul>
More information on this release on <a href="/releases.php#4.1.2">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.1.1"><!-- {{{ 4.1.1 -->
<h3>Version 4.1.1</h3>
<?php release_date("26-Dec-2001"); ?>
<ul>
<li>Fixed incompatibility with Windows .NET / IIS 6 - may improve stability
  under other versions of IIS. (Zeev)</li>
<li>Fixed bug that caused crashes or error notices on shutdown on threaded
  platforms. (Zeev)</li>
<li> Fixed several crash bugs in the xslt extension. (Markus, Derick)</li>
<li>Fixed problem with dbase not returning very large (larger than long)
  integers properly. (Vlad)</li>
<li>Fixed several bugs and memleaks in the domxml extension. (Markus)</li>
<li>Fixed bug in gmmktime() which was one hour off during standard time -
  bug <?php bugl(9878); ?>. Patch by bfoddy@mediaone.net. (jmoore)</li>
<li>Fixed bug in gmdate() timezone handling on Windows - bug <?php bugl(13885); ?>. (jmoore)</li>
<li>Fixed several crash bugs in the mcrypt extension. (Derick)</li>
<li>Made the mcrypt extension compile with the libmcrypt 2.2 series again.
  (Sterling)</li>
<li>Fixed a bug where the is_file() family of functions would in-correctly give
  an error when they were given filenames that didn't exist. (Sterling)</li>
<li>Fixed a bug in the strtotime() function where it was incorrectly recognizing
  GMT +0100 and GMT -0100. (Derick)</li>
</ul>
More information on this release on <a href="/releases.php#4.1.1">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.1.0"><!-- {{{ 4.1.0 -->
<h3>Version 4.1.0</h3>
<?php release_date("10-Dec-2001"); ?>
<ul>
<li>Worked around a bug in the MySQL client library that could cause PHP to hang
  when using unbuffered queries. (Zeev)</li>
<li>Fixed a bug which caused set_time_limit() to affect all subsequent requests
  to running Apache child process. (Zeev)</li>
<li>Removed the sablotron extension in favor of the new XSLT extension.
  (Sterling)</li>
<li>Fixed a bug in WDDX deserialization that would sometimes corrupt the root
  element if it was a scalar one. (Andrei)</li>
<li>Make ImageColorAt() and ImageColorsForIndex() work with TrueColor images.
  (Rasmus)</li>
<li>Fixed a bug in preg_match_all() that would return results under improper 
  indices in certain cases. (Andrei)</li>
<li>Fixed a crash in str_replace() that would happen if search parameter was an
  array and one of the replacements resulted in subject string being empty.
  (Andrei)</li>
<li>Fixed MySQL extension to work with MySQL 4.0. (Jani)</li>
<li>Fixed a crash bug within Cobalt systems. Patch by tomc@tripac.com.
(Jani)</li>
<li>Bundled Dan Libby's xmlrpc-epi extension.</li>
<li>Introduced extension version numbers. (Stig)</li>
<li>Added version_compare() function. (Stig)</li>
<li>Fixed pg_last_notice() (could cause random crashes in PostgreSQL
  applications, even if they didn't use pg_last_notice()). (Zeev)</li>
<li>Fixed DOM-XML's error reporting, so E_WARNING errors are given instead of
  E_ERROR error's, this allows you to trap errors thrown by DOMXML functions.
  (Sterling)</li>
<li>Fixed a bug in the mcrypt extension, where list destructors were not
  properly being allocated. (Sterling)</li>
<li>Better Interbase blob, null and error handling. (Patch by Jeremy Bettis)</li>
<li>Fixed a crash bug in array_map() if the input arrays had string or
  non-sequential keys. Also modified it so that if a single array is passed,
  its keys are preserved in the resulting array. (Andrei)</li>
<li>Fixed a crash in dbase_replace_record. (Patch by robin.marlow@dps-int.com)</li>
<li>Fixed a crash in msql_result(). (Zeev)</li>
<li>Added support for single dimensional SafeArrays and Enumerations.
  Added com_isenum() function to check if a component implements an
  enumeration. (Alan, Harald)</li>
<li>Fixed a bug in dbase_get_record() and dbase_get_record_with_names().
  boolean fields are now returned correctly.
  Patch by Lawrence E. Widman &lt;widman@cardiothink.com&gt; (Jani)</li>
<li>Added --version option to php-config. (Stig)</li>
<li>Improved support for thttpd-2.21b by incorporating patches for all known
  bugs. (Sascha)</li>
<li>Added ircg_get_username, a roomkey argument to ircg_join, error fetching
  infrastructure, a tokenizer to speed up message processing, and fixed
  a lot of bugs in the IRCG extension. (Sascha)</li>
<li>Improved speed of the serializer/deserializer. (Thies, Sascha)</li>
<li>Floating point numbers are better detected when converting from strings.
  (Zeev, Zend Engine)</li>
<li>Replaced php.ini-optimized with php.ini-recommended.  As the name implies,
  it's warmly recommended to use this file as the basis for your PHP
  configuration, rather than php.ini-dist.  (Zeev)</li>
<li>Restore xpath_eval() and php_xpathptr_eval() for 4.0.7. There
  are still some known leaks. (Joey)</li>
<li>Added import_request_variables(), to allow users to safely import form
  variables to the global scope (Zeev)</li>
<li>Introduced a new $_REQUEST array, which includes any GET, POST or COOKIE
  variables.  Like the other new variables, this variable is also available
  regardless of the context.  (Andi &amp; Zeev)</li>
<li>Introduced $_GET, $_POST, $_COOKIE, $_SERVER and $_ENV variables, which
  deprecate the old $HTTP_*_VARS arrays.  In addition to be much shorter to
  type - these variables are also available regardless of the scope, and 
  there's no need to import them using the 'global' statement.  (Andi &amp; Zeev)</li>
<li>Added vprintf() and vsprintf() functions that allow passing all arguments
  after format as an array. (Andrei)</li>
<li>Added support for GD2 image type for ImageCreateFromString() (Jani)</li>
<li>Added ImageCreateFromGD(), ImageCreateFromGD2(), ImageCreateFromGD2part(),
  ImageGD() and ImageGD2() functions (Jani)</li>
<li>addcslashes now warns when charlist is invalid. The returned string
  remained the same (Jeroen)</li>
<li>Added optional extra argument to gmp_init(). The extra argument
  indicates which number base gmp should use when converting a
  string to the gmp-number. (Troels)</li>
<li>Added the Cyrus-IMAP extension, which allows a direct interface to Cyrus' 
  more advanced capabilities. (Sterling)</li>
<li>Enhance read_exif_data() to support multiple comment tags (Rasmus)</li>
<li>Fixed a crash bug in array_map() when NULL callback was passed in. (Andrei)</li>
<li>Change from E_ERROR to E_WARNING in the exif extension (Rasmus)</li>
<li>New pow() implementation, which returns an integer when possible,
  and warnings on wrong input (jeroen)</li>
<li>Added optional second parameter to trim, chop and ltrim. You can
  now specify which characters to trim (jeroen)</li>
<li>Hugely improved the performance of the thread-safe version of PHP, especially
  under Windows (Andi &amp; Zeev)</li> 
<li>Improved request-shutdown performance significantly (Andi &amp; Zeev, Zend
  Engine)</li>
<li>Added a few new math functions. (Jesus)</li>
<li>Bump bundled expat to 1.95.2 (Thies)</li>
<li>Improved the stability of OCIPlogon() after a database restart. (Thies)</li>
<li>Fixed __FILE__ in the CGI &amp; Java servlet modes when used in the main script.
  It only worked correctly in included files before this fix (Andi)</li>
<li>Improved the Zend hash table implementation to be much faster (Andi, Zend
  Engine)</li>
<li>Updated PHP's file open function (used by include()) to check in the calling
  script's directory in case the file can't be found in the include_path (Andi)</li>
<li>Fixed a corruption bug that could cause constants to become corrupted, and
  possibly prevent resources from properly being cleaned up at the end of
  a request (Zeev)</li>
<li>Added optional use of Boyer-Moore algorithm to str_replace() (Sascha)</li>
<li>Fixed and improved shared-memory session storage module (Sascha)</li>
<li>Add config option (always_populate_raw_post_data) which when enabled
  will always populate $HTTP_RAW_POST_DATA regardless of the post mime
  type (Rasmus)</li>
<li>Added support for socket and popen file types to ftp_fput (Jason)</li>
<li>Fixed various memory leaks in the LDAP extension (Stig Venaas)</li>
<li>Improved interactive mode - it is now available in all builds of PHP, without
  any significant slowdown (Zeev, Zend Engine)</li>
<li>Fixed crash in iptcparse() if the supplied data was bogus. (Thies)</li>
<li>Fixed return value for a failed snmpset() - now returns false  (Rasmus)</li>
<li>Added hostname:port support to snmp functions (nbougues@axialys.net, Rasmus)</li>
<li>Added fdf_set_encoding() function (Masaki YATSU, Rasmus)</li>
<li>Reversed the destruction-order of resources.  This fixes the reported OCI8 
  "failed to rollback outstanding transactions!" message (Thies, Zend Engine)</li>
<li>Added option for returning XMLRPC fault packets. (Matt Allen, Sascha
  Schumann)</li>
<li>Improved range() function to support range('a','z') and range(9,0) types of
  ranges. (Rasmus)</li>
<li>Added getmygid() and safe_mode_gid ini directive to allow safe mode to do
  a gid check instead of a uid check. (James E. Flemer, Rasmus)</li>
<li>Made assert() accept the array(&amp;$obj, 'methodname') syntax. (Thies)</li>
<li>Made sure that OCI8 outbound variables are always zero-terminated. (Thies)</li>
<li>Fixed a bug that allowed users to spawn processes while using the 5th
  parameter to mail(). (Derick)</li>
<li>Added nl_langinfo() (when OS provides it) that returns locale.</li>
<li>Fixed a major memory corruption bug in the thread safe version. (Zeev)</li>
<li>Fixed a crash when using the CURLOPT_WRITEHEADER option. (Sterling)</li>
<li>Added optional suffix removal parameter to basename(). (Hartmut)</li>
<li>Added new parameter UDM_PARAM_VARDIR ha in Udm_Set_Agent_Param() function to
  support alternative search data directory.  This requires mnogoSearch 3.1.13
  or later.</li>
<li>Fixed references in sessions. This doesn't work when using the WDDX
  session-serializer. Also improved speed of sessions. (Thies)</li>
<li>Added new experimental module pcntl (Process Control). (Jason)</li>
<li>Fixed a bug when com.allow_dcom is set to false. (phanto)</li>
<li>Added a further parameter to the constructor to load typelibs from file when
  instantiating components (e.g. DCOM Components without local registration).
  (phanto)</li>
<li>Added the possibility to specify typelibs by full name in the typelib file
  (Alan Brown)</li>
<li>Renamed the ZZiplib extension to the Zip extension, function names have also
  changed accordingly, functionality, has stayed constant. (Sterling)</li>
<li>Made the length argument (argument 2) to pg_loread() optional, if not
  specified data will be read in 1kb chunks. (Sterling)</li>
<li>Added a third argument to pg_lowrite() which is the length of the data to
  write. (Sterling)</li>
<li>Added the CONNECTION_ABORTED, CONNECTION_TIMEOUT and CONNECTION_NORMAL
  constants. (Zak)</li>
<li>Assigning to a string offset beyond the end of the string now automatically
  increases the string length by padding it with spaces, and performs the
  assignment. (Zeev, Zend Engine)</li>
<li>Added warnings in case an uninitialized string offset is read. (Zeev, Zend
  Engine)</li>
<li>Fixed a couple of overflow bugs in case of very large negative integer
  numbers. (Zeev, Zend Engine)</li>
<li>Fixed a crash bug in the string-offsets implementation (Zeev, Zend Engine)</li>
<li>Improved the implementation of parent::method_name() for classes which use
  run-time inheritance. (Zeev, Zend Engine)</li>
<li>Added 'W' flag to date() function to return week number of year using ISO
  8601 standard. (Colin)</li>
<li>Made the PostgreSQL driver do internal row counting when iterating through
  result sets. (gvz@2scale.net)</li>
<li>Updated ext/mysql/libmysql to version 3.23.39; Portability fixes, minor
  bug fixes. (tim@mysql.com)</li>
<li>Added get_defined_constants() function to return an associative array of
  constants mapped to their values. (Sean)</li>
<li>New mailparse extension for parsing and manipulating MIME mail. (Wez)</li>
<li>Define HAVE_CONFIG_H when building standalone DSO extensions. (Stig)</li>
<li>Added the 'u' modifier to printf/sprintf which prints unsigned longs.
  (Derick)</li>
<li>Improved IRIX compatibility. (Sascha)</li>
<li>Fixed crash bug in bzopen() when specifying an invalid file. (Andi)</li>
<li>Fixed bugs in the mcrypt extension that caused crashes. (Derick)</li>
<li>Added the IMG_ARC_ROUNDED option for the ImageFilledArc() function, which
  specified that the drawn curve should be rounded. (Sterling)</li>
<li>Updated the sockets extension to use resources instead of longs for the
  socket descriptors.  The socket functions have been renamed to conform with
  the PHP standard instead of their C counterparts.  The sockets extension is 
  now usable under Win32. (Daniel)</li>
<li>Added disk_total_space() to return the total size of a filesystem.
  (Patch from Steven Bower)</li>
<li>Renamed diskfreespace() to disk_free_space() to conform to established
  naming conventions. (Jon)</li>
<li>Fixed <?php bugl(2181); ?>. Now zero is returned instead of an unset value for
  7-bit encoding and plain text body type. (Vlad)</li>
<li>Fixed a bug in call_user_*() functions that would not allow calling
  functions/methods that accepted parameters by reference. (Andrei)</li>
<li>Added com_release($obj) and com_addref($obj) functions and the related class
  members $obj-&gt;Release() and $obj-&gt;AddRef() to gain more control over the used
  COM components. (phanto)</li>
<li>Added an additional parameter to dotnet_load to specify the codepage (phanto)</li>
<li>Added peak memory logging. Use --enable-memory-limit to create a new Apache
  1.x logging directive "{mod_php_memory_usage}n" which will log the peak
  amount of memory used by the script. (Thies)</li>
<li>Made fstat() and stat() provide identical output by returning a numerical and
  string indexed array. (Jason)</li>
<li>Fixed memory leak upon re-registering constants. (Sascha, Zend Engine)</li>
</ul>
More information on this release on <a href="/releases.php#4.1.0">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.6"><!-- {{{ 4.0.6 -->
<h3>Version 4.0.6</h3>
<?php release_date("23-Jun-2001"); ?>
<ul>
<li>Fixed memory fragmention problem which could lead to web server processes
  growing much more than they should. (Andi, Zend Engine)</li>
<li>Made $HTTP_SESSION_VARS['foo'] and $foo be references to the same value
  when register_globals is on. (Andrei)</li>
<li>Fixed disk_free_space() and disk_total_space() under FreeBSD. (Jon)</li>
<li>Fixed readfile/passthru losing resources during connection abort (Sascha)</li>
<li>Fixed bug in the mcrypt extension that caused segfaults when using a key
  that is too large for the used algorithm, and a bug that caused
  mcrypt_generic() to segfault PHP (Derick)</li>
<li>Fixed getopt so that it accepts command line arguments in the form
  -&lt;opt&gt;&lt;arg&gt; and -&lt;opt&gt; &lt;arg&gt;. (Jmoore)</li>
<li>Fixed race in writing session files (Sascha)</li>
<li>Fixed a possible crash in the PHP CGI when no input file is
  specified (Zeev)</li>
<li>Added is_callable() function that can be used to find out whether
  its argument is a valid callable construct. (Andrei)</li>
<li>Fixed a rare possible crash when generating extended information. (Dmitri
  Dmitrienko, Zend Engine)</li>
<li>Improved virtual() to support PHP-enabled URIs. (Zeev)</li>
<li>Fixed undefined behavior when using floating point keys in array()
  expressions. (Zeev, Zend Engine)</li>
<li>Fixed a possible crash in case of parse errors in include files or eval
  statements. (Zeev, Zend Engine)</li>
<li>Added --with-layout configure option. (Stig)</li>
<li>Improved interactive mode - supports function calls, and works in
  multithreaded builds. (Zeev, Zend Engine)</li>
<li>Fixed a crash bug in interactive mode. (Zeev, Zend Engine)</li>
<li>Added pg_last_notice() function. (Rasmus from suggestion by Dirk@rackspace.com)</li>
<li>Fixed a bug in preg_split() that would incorrectly limit the number of
  results when used along with PREG_SPLIT_NO_EMPTY flag. (Andrei)</li>
<li>Added connection error support to mysql_error() and mysql_errno(). (Jason)</li>
<li>Added support to getimagesize to return dimensions of BMP and PSD
  files. (Derick)</li>
<li>Added heuristic to kill stale IRC connections, message scanner caching, and
  nickname escaping to IRCG, suppress option to ircg_msg(), and statistics to
  IRCG phpinfo() output. (Sascha)</li>
<li>Added Japanese multibyte string functions support. (Rui)</li>
<li>Added Mac OS X "\r" line ending support. (Andi, Zend Engine)</li>
<li>Fixed a bug regarding the $PHP_SELF being incorrectly registered when
  force-cgi-redirect was not enabled. (Sterling)</li>
<li>pfpro extension now supports version 3 of the Verisign SDK. (John Donagher)</li>
<li>Udm_Cat_List and Udm_Cat_Path functions has been added.</li>
<li>Added key_exists() to check if a given key or index exists in an
  array or object. (David Croft)</li>
<li>Modify the cURL extension to compile only with the latest cURL release.  
  Backwards compatibility with regards to the extension api has not been 
  broken. (Sterling)</li>
<li>Added the ability to use user-defined callbacks with cURL. (Sterling)</li>
<li>Added the SSL_VERIFYPEER, CAINFO, MAXREDIRS, FILETIME, RANDOM_FILE, EGDSOCKET
  and CONNECTTIMEOUT options to curl_setopt(). (Sterling)</li>
<li>Added support for persistent connections with cURL. (Sterling)</li>
<li>Fixed a problem in cURL with file descriptors being allocated, but never 
  closed. (Sterling)</li>
<li>Fixed interactive mode (-a). It works again with the same limitations it
  has always had. (Andi, Zend Engine)</li>
<li>Improved memory manager to use less memory and provide better memory overflow
  detection abilities in debug mode. (Andi, Zend Engine)</li>
<li>Fixed resource leaks when resources were being cast to numbers. (Zeev, Zend
  Engine)</li>
<li>Fixed foreach() to not crash when being sent an invalid argument. (Andi, Zend
  Engine)</li>
<li>Fixed a bug in opendir() under Windows when trying to open a non-exisiting
  directory. (Andi)</li>
<li>Fixed popen() and the exec family under Win32 (Unable to fork issue). (Daniel)</li>
<li>Make the printf family of functions binary clean. (Rasmus)</li>
<li>Fixed WDDX serialization to HTML-escape key/variable names so as not to
  break the XML packet. (Andrei)</li>
<li>Made WDDX extension enabled by default. (Andrei)</li>
<li>Added -C command-line option to avoid chdir to the script's directory. (Stig)</li>
<li>Fixed a bug with /e modifier in preg_replace(), that would not correctly
  replace two-digit references if single digit references were present
  before them. This fixed bug <?php bugl(10218); ?>. (Andrei)</li>
<li>Added temporary LOB support in OCI8. (Patch by David Benson)</li>
<li>Fixed crash in pathinfo()</li>
<li>OCI8 now supports binding of collections. (Patch by Andy Sautins
  &lt;asautins@veripost.net&gt;)</li>
<li>Added GD 2.0.1 support for truecolor and alpha channels, plus some other gd
  functions, both old and new - see docs for more info. (Wez)</li>
<li>Added S/MIME sign/verify encrypt/decrypt functions to openssl extension,
  along with some other certificate manipulation and interrogation functions.
  See docs for more info. (Wez)</li>
<li>printf argnum (parameter swapping) support. (Morten Poulsen, Rasmus)</li>
<li>Add DIRECTORY_SEPARATOR constant ('/' on UNIX, '\' on Windows). (Stig)</li>
<li>Added small change to php_odbc module, to check for failed SQLDisconnects
  and to close any outstanding transactions if the call fails, then disconnect
  again. (lurcher)</li>
<li>Modified get_parent_class() and get_class_methods() to accept a class name as
  well as a class instance. (Andrei, Zend Engine)</li>
<li>Added support for UNC style paths. (\\server\share\file,
  //server/share/file). (Daniel, TSRM)</li>
<li>Added dbx module (database abstraction) to the repository. (Marc)</li>
<li>Using ITypeInfo instead of IDispatch if possible. This makes DCOM calls
  and even COM calls much faster.
  All ini settings are now prefixed by 'com.'.
  Now you need not provide a path to the file containing the typelib, you can
  also provide the GUID of the TypeLib - entry or an IID for preloading
  type - information. (phanto)</li>
<li>Rewrite of domxml. It's now mostly DOM Level 2 conform. (Uwe)</li>
<li>Added array_map() function that applies a callback to the elements
  of given arrays and returns the result. It can also be used with a
  null callback to transpose arrays. (Andrei)</li>
<li>Added array_filter(), which allows filtering of array elements via
  the specified callback. (Andrei)</li>
<li>Fixed all relevant array functions to avoid moving the internal array
  pointer during operations. (Andrei)</li>
<li>Added mysql_unbuffered_query(), which is useful for very large result sets.
  (Zeev)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.6">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.5"><!-- {{{ 4.0.5 -->
<h3>Version 4.0.5</h3>
<?php release_date("30-Apr-2001"); ?>
<ul>
<li>IMPORTANT: removed /F modifier handling from preg_replace(). Instead
  one should use new preg_replace_callback() function. (Andrei)</li>
<li>Added new php.ini directive: arg_separator.input which is used to tell
  PHP which characters are considered as argument separators in URLs. 
  Renamed php.ini directive: arg_separator -&gt; arg_separator.output (Jani)</li>
<li>Added FastCGI SAPI module. (Ben Mansell)</li>
<li>Added array_reduce(), which allows iterative reduction of an array
  to a single value via a callback function. (Andrei)</li>
<li>The imageloadfont function of the gd extension should be not platform
  dependent after this fix. (alex@zend.com)</li>
<li>Fixed a compatibility problem in some file functions (fgets, fputs, fread,
  fwrite). The ANSI standard says that if a file is opened in read/write
  mode, fseek() should be called before switching from reading to writing
  and vice versa. (alex@zend.com)</li>
<li>Fixed argument checking for call_user_func* functions and allowed
  specifying array($obj, 'method') syntax for call_user_func_array. (Andrei)</li>
<li>Fixed parent::method() to also work with runtime bindings.
  (Zeev, Zend Engine)</li>
<li>Implemented high-performance zlib-based output compression - see
  zlib.output_compression INI directive. (Zeev)</li>
<li>Improved ob_gzhandler() to support chunked output buffering - it's 
  recommended to use it with 4KB chunks. (Zeev)</li>
<li>Fixed chunked output buffering. (Zeev)</li>
<li>Forced call_user_method() and call_user_method_array() to take the
  object argument by reference. (Andrei)</li>
<li>Fixed binding of ROWIDs in OCI8. (Thies)</li>
<li>Added PEAR/Cache as a generic Caching System. (Sebastian, PEAR/Cache)</li>
<li>Added IMAP quota support (imap_set_quota, imap_get_quota), enabled/added via
  c-client2000. (kalowsky)</li>
<li>Upgraded PCRE to version 3.4. (Andrei)</li>
<li>Added array_search which works similar to in_array but returns
  the key instead of a boolean. (jason@php.net)</li>
<li>Fixed pgsql transaction support. (Stig, PEAR/DB)</li>
<li>Added new object VARIANT() to encapsulate values for use with
  the COM and DOTNET module. Therefore it is now possible to pass
  values by reference, convert php values to extended variant types (currency,
  date, idispatch, iunknown, ...) and define the codepage that should
  be used for unicode - conversion.</li>
<li>Improved overall speed of IRCG, added URL handling to message scanner.
  (Sascha)</li>
<li>Fixed some modules to allow using output-buffering. (Thies)</li>
<li>Added the chroot() function. (Derick)</li>
<li>PostgreSQL now does a rollback at the end of a request on every
  persistent connection. This is done by doing an "empty" transaction
  on the connection. This was advised by someone from the PostgreSQL
  core-team. (Thies)</li>
<li>Fixed PostgeSQL pg_connect() bug. We would sometimes close the default
  link by accident. (Patch by: aja@nlgroup.ca)</li>
<li>Improved OCI8 dead-session detection. (Patch by: George Schlossnagle)</li>
<li>Fixed get_meta_tags() multiline bug <?php bugl(4556); ?>. (Sean)</li>
<li>Prefer random() over *rand48(). (JimJag)</li>
<li>Sped up WDDX serialization 2x. (Andrei)</li>
<li>Added a new parameter to mail() which appends aditional command line
  parameters to the mail program. (Derick)</li>
<li>Added Udm_Clear_Search_Limits mnoGoSearch extension function. (gluke)</li>
<li>Fixed mnogosearch protos. Fixed mnogosearch functions return values.
  A bug with capital letters break search has been fixed. (gluke)</li>
<li>Static methods can now be called via call_user_method_* functions, e.g.
  call_user_method('method', 'class'), and also array('class', 'method')
  constructs (for array_walk(), for example). (Andrei, Zend Engine)</li>
<li>microtime() under Windows now returns accurate values. (James)</li>
<li>Added PREG_SPLIT_DELIM_CAPTURE flag to preg_split() that allows for Perl-like
  functionality of capturing parenthesized delimiter expression. (Andrei)</li>
<li>Fixed strip_tags() to not strip a lone &gt; character. (Rasmus)</li>
<li>When using the ob_gzhandler() PHP now automagically also sets the
  Content-Lengh correctly which enables browsers to use the HTTP
  Keep-Alive feature. (Thies)</li>
<li>Improved handling of preg_replace() /F modifier so that it's possible to
  specify array($obj, 'method') construct as a replacement function. (Andrei)</li>
<li>Added mysql_get_client_info(), mysql_get_server_info(),
  mysql_get_proto_info(), and mysql_get_host_info() functions. (Sean)</li>
<li>Major change of the php pdf api. It could break some functions though
  backwards compatibility was tried to maintain. Adding some still
  missing functions as well. (Uwe)</li>
<li>Added mnoGoSearch extension - <a href="http://search.mnogo.ru">http://search.mnogo.ru</a>. (Sergey K)</li>
<li>Allow URL encoding in DB usernames and passwords. (Stig, PEAR)</li>
<li>Added raiseError and setErrorHandling methods to PEAR class. (Stig, PEAR)</li>
<li>Added support for converting images from JPG/PNG on the fly with the GD
  extension, which is usefull for creating dynamic WAP-sites. (Derick)</li>
<li>Updated ext/mysql/libmysql to version 3.23.32; bug fixes. (tim@mysql.com)</li>
<li>Fixed possible crash in all (non-pcre) regex functions. (Thies)</li>
<li>Improved str_replace() to accept an array for any parameter - similar
  to preg_replace(). (Andrei)</li>
<li>Fixed extract() to properly prefix numeric keys when EXTR_PREFIX_ALL is
  used. (Andrei)</li>
<li>Added EXTR_PREFIX_INVALID flag to extract() to automatically prefix
  string keys that do not constitute valid variable names. (Andrei)</li>
<li>BeOS patch from svanegmond@bang.dhs.org, modified somewhat by Rasmus.</li>
<li>Fixed the Apache module to overwrite PATH_TRANSLATED with SCRIPT_FILENAME,
  only if PATH_TRANSLATED is not previously set. (Zeev)</li>
<li>Fixed crash bug in highlight_string(). (Rasmus)</li>
<li>Added URL support for getimagesize() function. (Jani)</li>
<li>Added xslt_set_scheme_handler() function. (carmelo@akooe.com)</li>
<li>Added the pg_lolseek and pg_lotell functions. (Derick)</li>
<li>Fixed wrong breaking with the wordwrap function. (Derick)</li>
<li>Fixed 'O' and 'r' flags of date() to have correct sign for timezone
  offset. (Andrei)</li>
<li>Changed 'Z' flag to date() to always return timezone offset with
  negative sign if it's west of UTC. (Andrei)</li>
<li>Added the HTML_Processor class which provides common functions for 
  processing HTML. (Sterling)</li>
<li>Added localeconv() and strcoll() functions for localization. (Sean)</li>
<li>Added the xslt_set_base function. (Sterling)</li>
<li>Added support for Zeus 3.3.8.</li>
<li>Added odbc_error() and odbc_errormsg() functions. (Stig)</li>
<li>New extension for vpopmail - <a href="http://www.inter7.com/vpopmail">http://www.inter7.com/vpopmail</a>,
  give it a try, but keep in mind that it is not ready for production 
  environments. (David Croft, Boian Bonev)</li>
<li>Added sybase_get_last_message() to the Sybase CT module. (Jan Fedak)</li>
<li>Made ldap_list(), ldap_read() and ldap_search() do parallel search when
  first parameter is an array of link identifiers. (Stig Venaas)</li>
<li>Made fopen() of HTTP URL follow redirects, $http_response_header will
  contain all headers with empty string as delimiter. (Stig Venaas)</li>
<li>Added Console_Getopt class for parsing command-line args. (Andrei, PEAR)</li>
<li>Added an experimental version of the ZZipLib extension which provides the
  ability to read zip files. (Sterling)</li>
<li>Allow access to uploaded files in safe_mode. Beware that you can only
  read the file. If you copy it to new location the copy will not have the
  right UID and you script won't be able to access that copy. (Thies)</li>
<li>Changed extract() to check that prefixed name is a valid one. (Andrei)</li>
<li>Changed extract() to return the number of variables extracted. (Andrei)</li>
<li>Added ldap_rename() function. (Stig Venaas)</li>
<li>Made ldap_set_option() support controls. (Stig Venaas)</li>
<li>Changed ldap_search() and added functions ldap_parse_result(),
  ldap_first_reference(), ldap_next_reference() and ldap_parse_reference()
  to cope with LDAPv3 stuff like referrals and references. (Stig Venaas)</li>
<li>Fixed date('r') overflow.</li>
<li>Made the php.ini path reported in phpinfo() always point to the absolute
  path that was opened. (Zeev)</li>
<li>Made the INI mechanism thread safe. (Zeev, Zend Engine)</li>
<li>Changed setlocale() to use LC_* constants. (Jani)</li>
<li>ctype functions now follow the extension naming conventions. (Hartmut)</li>
<li>Added iconv() function (using libc or libiconv). (Stig)</li>
<li>Added ODBC_TYPE constant. (Stig)</li>
<li>Added the call_user_method_array function which allows you to call a method
  with an arbitrary number of parameters. (Sterling)</li>
<li>ext/odbc: IBM DB2 patch by Walter Franzini. (walter@sys-net.it)</li>
<li>Added extension for the cracklib library. (Alexander Feldman)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.5">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.4"><!-- {{{ 4.0.4 -->
<h3>Version 4.0.4</h3>
<?php release_date("19-Dec-2000"); ?>
<ul>
<li>Allow assigning a newly created object by reference. This is needed only if 
  your constructor makes other data structures reference the $this object (for 
  example, $GLOBALS["foobar"] =&amp; $this;)
  The new syntax is $obj =&amp; new MyClass(); (Andi, Zend Engine)</li>
<li><pre>Allow for three expression types to be sent to functions which are requesting
  the function argument to be passed by reference (only c. was previously
  supported):
  a. func(new myclass());
  b. func(func2()); where func2() returns a reference, i.e. is defined as
     function &amp;func2(...)
     {
      ...
     }
  c. func($var); where func() is defined as function func(&amp;$var) {...}
  You CAN'T count on any other expressions to be passable by reference.
  (Andi, Zend Engine)</pre></li>
<li>Made ldap_get_entries() return an array even if there are no entries
  in search result. (Jani)</li>
<li>Fixed bad mod_perl interaction which caused segfaults when using LFS (Sascha)</li>
<li>const CONSTNAME now gets recognized. Before the patch only @const CONSTNAME 
  description was recognized.</li>
<li>Added the is_null() function that will return true if a variable is of
  type null. (Sterling)</li>
<li>Fixed a bug which made readdir() unusable in some systems. (Jani)</li>
<li>Added the get_defined_functions() function which returns a list of all 
  currently defined functions. (Sterling)</li>
<li>Added the get_defined_vars() function which returns an associative array
  of all variables defined in the current scope and their subsequent values.
  (Sterling) </li>
<li>Added the call_user_func_array() function which gives you the ability to
  call a user function by passing an array of parameters as the second
  argument. (Sterling)</li>
<li>Added the constant() function which returns the value of a constant given
  the constant's name. (Sterling)</li>
<li>Implemented support for Perl-style matching regexp delimiters in PCRE.
  You can use &lt;{[( and )]}&gt; to delimit your expressions now. (Andrei)</li>
<li>Introduced new 'F' modifier in PCRE that lets you specify a function
  name in the replacement argument to preg_replace() that will be called
  at run-time to provide the replacement string. It is passed an array of
  matched pattern and subpatterns. (Andrei)</li>
<li>Put an end to Bug <?php bugl(4615); ?> (kalowsky &amp; Eric Veldhuyzen)</li>
<li>Fixed realpath() in Virtual Directory mode (Daniel)</li>
<li>Integrated the Phil Nelson's bc math library routines into PHP, now that
  the license allows it (Phil Nelson)</li>
<li>Added the xslt_set_error_handler() function to the Sablotron extension.
  (Sterling)</li>
<li>Improved Sablotron's error handling system allowing you to catch all
  errors before they are outputted to the screen. (Sterling)</li>
<li>Added OpenSSL extension (Stig Venaas)</li>
<li>Fixed/created support for Solid 3.0 databases (kalowsky)</li>
<li>Fixed support for Solid 2.3 databases (kalowsky)</li>
<li>quoted_printable_decode() function is made RFC-2045 compliant. (Kir)</li>
<li>Modified preg_grep() to always return the results with keys from the original
  array. (Andrei)</li>
<li>Modified preg_replace() to accept Perl-style $n backreferences in addition
  to \\n ones. (Andrei)</li>
<li>Modified preg_replace() to ignore backreferences that refer to
  non-existing subpatterns. (Andrei)</li>
<li>Fixed column-title buffer-overflow in OCIFetchStatement(). (Thies)</li>
<li>Added 'output_handler' INI directive (Zeev)</li>
<li>Fixed some buglets in the output buffering mechanism (Zeev)</li>
<li>Added transparent gzip compression support (Jade Nicoletti, Zeev)</li>
<li>Major overhaul of domxml. Added basic XPath support as well (Uwe)</li>
<li>Added 'r' flag to date() which generates an RFC822 formatted date, e.g.
  "Thu,  9 Nov 2000 16:33:01 -0500" (Colin)</li>
<li>In CGI mode, $HTTP_SERVER_VARS now includes all of the environment variables
  as well (Zeev)</li>
<li>Allow user to use mysql_use_result in mysql queries (Stas)</li>
<li>Fixed a memory leak that would occur when restarting Apache often
  (mookid@sigent.ru)</li>
<li>Fixed a bug that prevented $argv and $argc from being defined in the command
  line version of PHP (Stas)</li>
<li>Fixed a bug that prevented a changed compile-time extension_dir from
  affecting modules that were loaded via php.ini (Zeev)</li>
<li>Fixed a bug in ftp_mkdir() when used on ftp server which doesn't return
  the full path (Jani)</li>
<li>Added ImageCreateFromString() which creates an image stream out of 
  e.g. a MySQL blob. (Mathieu)</li>
<li>Fixed a crash bug in imagewbmp() (Jani)</li>
<li>Changed the sablot configuration file so that if you use any version of
  Sablotron below 0.44 you must use Sablotron's built-in Expat libraries.
  (Sterling)</li>
<li>Added basic authentication support to thttpd (Sascha)</li>
<li>Added support for the Caudium webserver (<a href="http://caudium.net/">http://caudium.net/</a>). It's based
  on the Roxen SAPI module. Many bugs have been identified and fixed. (David)</li>
<li>Fixed mysql_close(), pg_close(), msql_close() and sybase_close() - they
  weren't properly closing the SQL connections (Zeev)</li>
<li>Fixed crypt() to supply random seed if none is given (Andi)</li>
<li>Made print_r() support recursive data structures, e.g. $GLOBALS. (Zeev)</li>
<li>Fixed a bug that caused PHP not to properly flush its output buffer, if more
  than one output buffer was used. (Zeev)</li>
<li>Fixed a bug that could draw the shutdown sequence of the PHP Apache module
  into an endless loop, under certain circumstances.  It could cause Apache
  processes under Solaris to get stuck, especially when using output
  buffering. (Zeev)</li>
<li>Added support for serializing references (Stas)</li>
<li>Fixed conflict with OpenLDAP and Oracle 8.1.x (Jani)</li>
<li>parse_ini_file() supports a new optional 2nd argument that instructs it
  to divide the directives to arrays according to the sections in which they
  reside (Zeev)</li>
<li>parse_ini_file() is now thread-safe, and supported under Windows (Zeev)</li>
<li>Unified aborted-connection semantics of all SAPI modules (Sascha)</li>
<li>URL-opened files now store the HTTP response header in $http_response_header
  (Zeev)</li>
<li>Fixed array_rand() to shuffle results when the number of requested
  elements is the same as the number of elements in the array. (Andrei)</li>
<li>Added replace parameter to header() (Sascha)</li>
<li>Fixed handling of single quotes in transparent session-id mode (Sascha)</li>
<li>Fixed "php://*" fopen handler (Sascha)</li>
<li>Made rename work in threadsafe enviroments (Daniel)</li>
<li>Made session_destroy() close files before unlinking (Daniel)</li>
<li>Added array_sum() function. (Andrei)</li>
<li>Fixed a bug in session.c. The php_session_save_current_state did not check
  if mod_data is NULL and such situation is possible if the user calls 
  session_module_name with a parameter. (alex@zend.com)</li>
<li>Added IIS Admin extension. (Frank)</li>
<li>OCIBindByName() now does better parameter-checking. (Thies)</li>
<li>Made read() binary-safe in sockets.c (Chris Vandomelen)</li>
<li>Made array_intersect() and array_diff() not alter order (Stig Venaas)</li>
<li>Made ldap_connect() accept URL in host parameter when using OpenLDAP
  2.x. To use SSL, use ldaps://host/ as URL. (Stig Venaas)</li>
<li>Made resource type names visible, e.g. var_dump() and
  get_resource_type() display "file" for file resources. (Andrei)</li>
<li>Added the curl_getinfo() function to find out information about a CURL
  transfer.  This function requires cURL 7.4.0 or above. (Sterling)</li>
<li>Added the CURLOPT_KRB4, CURLOPT_INTERFACE, CURLOPT_QUOTE, CURLOPT_POSTQUOTE,
  CURLOPT_QUOTE and CURLOPT_HTTPPROXYTUNNELL options. (Sterling)</li>
<li>Renamed the shm_* functions to shmop_* (Derick)</li>
<li>Updated ext/mysql/libmysql to version 3.23 (tim@mysql.com)</li>
<li>Added ldap_get_option() and ldap_set_option() functions (Stig Venaas)</li>
<li>Fixed a crash in CGI mode, in case no file was provided 
  (Daniel Beulshausen&amp; Zeev)</li>
<li>Fixed possible crash bug in imap_fetchstructure() (Jani)</li>
<li>Fixed possible crash bug in imap_open() (Jani &amp; Mark Musone)</li>
<li>Added url_rewriter.tags configuration directive (Sascha)</li>
<li>Added CORBA client extension, ready for use (eriksson@php.net)</li>
<li>Fixed memory leak in x-httpd-source mode (Jason Greene)</li>
<li>Changed ext/gd not to be enabled by default (Jani)</li>
<li>Make increment of empty string ("") behave like in PHP 3 and result in "1"
  (Andi, Zend Engine)</li>
<li>Added POST handler for Adobe FDF format (Hartmut)</li>
<li>Added transparent read and write .gz-files on glibc based systems
  using the 'zlib:' fopen wrapper (Hartmut)</li>
<li>Fixed a problem in the configuration parser (two null bytes were added
  to each ENCAPSULATED TC_STRING) (alex@zend.com)</li>
<li>Added HMAC support in the mhash module (nmav@altera.gr)</li>
<li>Added module for Ovrimos sql server (nmav@altera.gr)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.4">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.3"><!-- {{{ 4.0.3 -->
<h3>Version 4.0.3</h3>
<?php release_date("11-Oct-2000"); ?>
<ul>
<li>Fixed a possible crash in -a interactive mode (Zeev, Zend Engine)</li>
<li>Added mysql_escape_string() (Peter A. Savitch and &amp; Brian Wang)</li>
<li>Fixed many possible crash bugs with improper use of the printf() family of
  functions (Andi)</li>
<li>Fixed a problem that allowed users to override admin_value's and admin_flag's
  (Zeev)</li>
<li>Fixed PostgreSQL module to work when the link handle is omitted (Zeev)</li>
<li>Fixed returning of empty LOB fields in OCI8. (Thies)</li>
<li>Added Calendar module to default Win32 build (Andi)</li>
<li>Added FTP module to default Win32 build (Andi)</li>
<li>Fixed crash in the POSIX getrlimit() function (alex@zend.com)</li>
<li>Fixed dirname() under certain conditions (Andi)</li>
<li>Added --with-imap-ssl to support SSL'ized imap library in RH7 and others
  (Rasmus)</li>
<li>Fixed possible crash bug in parse_url() (Andi)</li>
<li>Added support for trans sid under Win32 (Daniel)</li>
<li>IPv6 support in fopen (Stig Venaas)</li>
<li>Added the shmop extension. It allows more general ways of shared memory
  access. (thanks to Ilia Alshanestky &lt;iliaa@home.com&gt; and Slava Poliakov
  &lt;slavapl@mailandnews.com&gt; (Derick)</li>
<li>Added the ability for CURLOPT_POSTFIELDS to accept an associative array of 
  HTTP POST variables and values. (Sterling)</li>
<li>Added the CURLOPT_HTTPHEADER option to curl_setopt(). (Sterling)</li>
<li>Added the curl_error() and curl_errno() functions. (Sterling)</li>
<li>Changed ext/db not to be enabled by default (Jani)</li>
<li>Fixed building Apache SAPI module on SCO UnixWare (Sascha)</li>
<li>Fixed writing empty session sets to shared memory (tcarroll@chc-chimes.com)</li>
<li>Added support for BSD/OS make (Sascha)</li>
<li>Added improved URL rewriter (Sascha)</li>
<li>Fixed readdir_r() use on Solaris (Sascha)</li>
<li>Improved HTTP headers for private-caching (jon@csh.rit.edu, Sascha)</li>
<li>Added new function session_cache_limiter (jon@csh.rit.edu, Sascha)</li>
<li>Added ftp_exec to the ftp functions (thanks to &lt;jhennebicq@i-d.net&gt;)
  (Derick)</li>
<li>PEAR: add last executed query as debug info in DB errors (Stig)</li>
<li>PEAR: allow multiple modes in PEAR_Error (Stig)</li>
<li>Made the Sybase CT module thread safe (Zeev)</li>
<li>Added second argument to array_reverse() that indicatese whether
  the original array keys should be preserved. (Andrei)</li>
<li>Clean up htmlspecialchars/htmlentities inconsistencies. (Rasmus)</li>
<li>PEAR: renamed DB_GETMODE_* to DB_FETCHMODE_*, added setFetchMode()
  in DB_common to set the default mode, added some MySQL tests (Stig)</li>
<li>Made eval() and several other runtime-evaluated code portions report the
  nature and location of errors more accurately (Stas)</li>
<li>Added an optional parameter to wordwrap that cuts a string if the length of a
  word is longer than the maximum allowed. (Derick)</li>
<li>Added functions pg_put_line and pg_end_copy (Dirk Elmendorf)</li>
<li>Added second parameter for parse_str to save result (John Bafford)</li>
<li>Fixed bug with curl places extra data in the output. (medvitz@medvitz.net)</li>
<li>Added the pathinfo() function. (Sterling)</li>
<li>Updated sybase_ct module and its sybase_query to use high performance API.
  (Joey)</li>
<li>Added a more configurable error reporting interface to DB. (Stig)</li>
<li>Added is_uploaded_file() and move_uploaded_file() (Zeev)</li>
<li>Added several directives to php.ini - post_max_size, file_uploads,
  display_startup_errors - see php.ini-dist for further information (Zeev)</li>
<li>Worked around a bug in the libc5 implementation of readdir() (Stas)</li>
<li>Fixed some potential OpenBSD and NetBSD crash bugs when opening files. (Andi)</li>
<li>Added EscapeShellArg() function (Rasmus)</li>
<li>Added a php.ini option session.use_trans_sid to enable/disable trans-sid.
  (Sterling)</li>
<li>Added the Sablotron extension for XSL parsing. (Sterling)</li>
<li>Fixed a bug in checkdate() which caused &lt; 1 years to be valid (Jani)</li>
<li>Added support for an optional output handler function for output
  buffering.  This enables transparent rendering of XML through XSL,
  transparent compression, etc. (Zeev)</li>
<li>Added support for user defined 'tick' callback functions. This helps
  emulate background processing. (Andrei)</li>
<li>Fixed problem with having $this as the XML parser object. (Andrei)</li>
<li>Internal opened_path variable now uses the Zend memory manager so that full
  paths of files won't leak on unclean shutdown (Andi)</li>
<li>Removed support of print $obj automatically calling the __string_value()
  method. Instead define yourself a method such as toString() and use
  print $obj-&gt;toString() (Andi, Zend Engine)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.3">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.2"><!-- {{{ 4.0.2 -->
<h3>Version 4.0.2</h3>
<?php release_date("29-Aug-2000"); ?>
<ul>
<li>Added PHP API for Zend's ticks. (Stig)</li>
<li>PHP 3 regression testing framework re-born (Stig)</li>
<li>Added php_uname() function (Stig)</li>
<li>Made a minor change to allow building with OpenLDAP 2.0 (Stig Venaas)</li>
<li>Fixed a bug in preg_replace() that would truncate subject string if the
  first argument was en empty array. (Andrei)</li>
<li>Added ob_get_length function (Stig)</li>
<li>Fixed a bug that did not respect limit parameter in preg_replace() when
  using /e modifier. (Andrei)</li>
<li>Added ability for each xml_set_*_handler() function to take the
  array($obj, 'method') syntax for the handler argument as well
  as the normal function name. (Andrei)</li>
<li>Updated array_walk() to be able to accept array($obj, 'method')
  syntax for the walk function. (Andrei)</li>
<li>Fixed segfault with fgets(), fgetcsv(), fgetss(), and fread() when
  called with negative length argument. (Torben)</li>
<li>Fixed by-reference parameters passing for xml_ functions and for scanf
  functions (Stas)</li>
<li>Added experimental Oracle LDAP SDK support. 8.1.6 or later needed. Configure
  with something like --with-ldap=/usr/local/oracle/product/8.1.6 (Stig Venaas)</li>
<li>Fixed memory leaks in eval();  A script that used eval() extensively, could
  end up consuming very large amounts of memory during execution (Zeev, Zend
  Engine)</li>
<li>Fixed memory_limit feature, which did not work properly in previous versions
  (Zeev, Zend Engine)</li>
<li>Fixed stdout support with the swf extension. (Sterling)</li>
<li>Fixed byte order for ip2long and long2ip (Stas)</li>
<li>Fixed dbase_add_record. (Sterling)</li>
<li>Added support for libmcrypt 2.4.4 (Derick)</li>
<li>Added strncasecmp function (Andi, Zend Engine)</li>
<li>Fixed FTP module to accept multiline server replies (Jani)</li>
<li>Fixed switch which only has a single default rule. (Andi, Zend Engine)</li>
<li>Fixed problem with nested foreach()'s. (Andi, Zend Engine)</li>
<li>The CCVS module is now stable and compiling. It compiles as a CGI and into
  Apache cleanly without warnings. (Brendan W. McAdams)</li>
<li>Fixed mSQL_close(). (nick@loman.net)</li>
<li>Made return() in a require()'d file work like return() in an include()'d
  file (Andi &amp; Zeev, Zend Engine)</li>
<li>Changed require_once() to work using the same table as include_once()
  (Andi &amp; Zeev, Zend Engine)</li>
<li>Fixed PostgreSQL module to work when the link handle is omitted (Zeev)</li>
<li>Fixed the Sybase modules to work properly with PHP 4.0 (Zeev)</li>
<li>Fixed CLOB handling in OCI8 driver when using variable-width
  character sets. (Thies)</li>
<li>Added 4th optional parameter to sybase_[p]connect to specify the charset
  for the connection (alf@alpha.ulatina.ac.cr)</li>
<li>Fixed support for current thttpd releases. (Sascha)</li>
<li>Added support for kerberized IMAP library using --with-kerberos 
  (Rasmus, Sascha)</li>
<li>Virtualize realpath, chmod, chown and utime (Stas)</li>
<li>Support content-encoding headers in file upload MIME parts
  (Ragnar Kj&oslash;rstad)</li>
<li>Fixed warning when shutting down OCINLogon() connections. (Thies)</li>
<li>Fixed \n in session variables bug on Win32 (Stas)</li>
<li>OCIError() would sometimes not report failed connections. (Thies)</li>
<li>Fixed HEAD request bug on an Apache ErrorDocument redirect and preserve
  the status code across the redirect as well.  (Rasmus)</li>
<li>Added Olympus-specific tags to read_exif_data() (Rasmus)</li>
<li>Fixed bug in imap_fetchheader() where using FT_PREFETCHTEXT didn't return
  the body. Bug <?php bugl(4447); ?>. (Jani)</li>
<li>Fixed exec() returning "\0" when output is empty</li>
<li>Added XML_Parser class in PEAR (Stig)</li>
<li>Added "make test" target in pear/ and added some regression tests (Stig)</li>
<li>Fixed bug in strip_tags function as per bug <?php bugl(5857); ?> (Rasmus)</li>
<li>Fixed reading of IPTC via GetImageInfo() for certain JPEG files. (Thies)</li>
<li>Improved the output-buffering functions to be re-entrant (Zeev)</li>
<li>Made ldap_add(), ldap_modify(), ldap_mod_add(), ldap_mod_replace()
  binary-safe. Original patch: Terrence Miao &lt;terrence_miao@email.com&gt; (Jani)</li>
<li>CGI aka. command line version has now an option '-l' for syntax check
  without execution (Hartmut)</li>
<li>Fixed bug in ldap_get_values_len() which makes it NULL-safe. (Jani)</li>
<li>Bug-report and fix submitted by Michel Alexeline &lt;alexel@dr15.cnrs.fr&gt;</li>
<li>Make ext_skel create a Makefile.in set up to handle shared extension
  support automatically (Rasmus)</li>
<li>Fixed php_realpath not to die on non-existing files (needed for touch())
  (Stas and china@thewrittenword.com)</li>
<li>Fixed get_browser() function (Stas)</li>
<li>Fixed symbol clash which caused a DSO problem on OpenBSD (Rob Black and
  anil@recoil.org)</li>
<li>Added new function: ldap_compare(). (Jani)</li>
<li>Fixed a bug in ldap_get_entries() and ldap_get_attributes(). (Jani)</li>
<li>Ported DB to new error reporting scheme in PEAR. (Stig)</li>
<li>Added sybase and ibase DB backends in PEAR. (Sterling)</li>
<li>New PEAR package Payment_Verisign for use with the Payflow Pro
  (pfpro) extension. (David Croft)</li>
<li>Added CURL support. (Sterling)</li>
<li>Catch users trying to set "compatibility" parameter in PDF, which is not
  supported from user-land. (Joey)</li>
<li>Fixed dbase_add_record. (Sterling)</li>
<li>Added new function wordwrap() to wordwrap long strings from Chris
  Russel &lt;russel@yorku.ca&gt; (David Croft)</li>
<li>Added four additional arguments: attrsonly, sizelimit, timelimit, deref which
  were missing in ldap_search(), ldap_list() and ldap_read() functions (Jani)</li>
<li>Fixed a bug in ldap_search/list/read() which prevented returning the partial
  results when 'Sizelimit exceeded' error occurred. (Jani Taskinen)</li>
<li>Fixed preg_replace() to automatically escape quotes in matched
  strings when using /e modifier. (Andrei)</li>
<li>Itanium patch (Steve Robb)</li>
<li>Set default include_path so PEAR files can be reached (Stig)</li>
<li>Added "pear" executable, requires CGI version installed (Stig)</li>
<li>Added extension ii for Ingres II native support. See README in ext/ingres_ii
  directory. (David H)</li>
<li>Added Win32 project for the Interbase module (Zeev)</li>
<li>Added ability to perform calls to the parent class without explicitly
  specifying its name, using parent::func_name(...) (Zeev, Zend Engine)</li>
<li>You can now call Ora_Error() without prameters to get the reason
  for a failed connection attempt. (Kirill Maximov)</li>
<li>New extension "pfpro" for interface with Verisign Payflow Pro (David Croft)</li>
<li>Added IMG_GIF, IMG_JPG, IMG_JPEG, IMG_PNG and IMG_WBMP constants for
  imagetypes() function (Rasmus)</li>
<li>Added ImageTypes() function which returns a bitfield with the supported
  image formats.  1=gif, 2=jpeg, 4=png and 8=wbmp (Rasmus)</li>
<li>Make it possible to specify an empty string as a thousands-seperator
  in number_format() (Rasmus)</li>
<li>Shared module support for LDAP extension (Troels Arvin)</li>
<li>Fixed a bug with imap_mail where apache would segfault if the rpath
  parameter was specified.</li>
<li>Use dashes and short day name in cookies since some browsers seem picky
  about this (Rasmus)</li>
<li>Added pspell module. (Vlad)</li>
<li>Added 3 additional arguments to the user-defined error handler - the file
  name and line number in which the error occured, and the context (local
  variables) of the code in which the error occured (Zeev, Zend Engine)</li>
<li>Improved the error handling code to handle an error in a user-defined error
  handling function (Zeev, Zend Engine)</li>
<li>Fixed leak when using string offsets in the array() construct.
  (Andi, Zend Engine)</li>
<li>Fixed corruption problem when changing deeply nested values in objects.
  (Andi &amp; Zeev, Zend Engine)</li>
<li>Improved array_multisort() to be able to specify sort type as well sort
  order. Incidentally, it can be used to sort multi-dimensional arrays
  as well. (Andrei)</li>
<li>Fixed a possible data corruption in case of a huge amount of aborted requests
  (Zeev)</li>
<li>Apache module would sometimes close a wrong file-descriptor. (Sascha)</li>
<li>Fixed use of alternative storage handlers in the session module. (Sascha)</li>
<li>Updated str_pad() to be able to pad on left/right/both sides. (Andrei)</li>
<li>Fixed crash in gzopen(). (Thies)</li>
<li>Multiple character set support in gdttf.c (Rob Goodwin)</li>
<li>When using HTTP auth from PHP, fill in the %u custom log field so the
  authenticated used id will get logged in the Apache access_log (Rasmus)</li>
<li>Support for pdflib 3.01. (Uwe)</li>
<li>FDF Data is handled properly and can be accessed by reading
  HTTP_RAW_POST_DATA. (Uwe)</li>
<li>Added new 'O' format modifier that will output the GMT offset as "[+-]HHMM"
  (eg: Pacific time is -0700).  This is useful for things such as Date: mail
  headers. (Mike W)</li>
<li>Fixed crash on OCI?Logon() failure. (Thies)</li>
<li>Make the special Header("http/...") response be case insensitive like 3.0
  (Rasmus)</li>
<li>Allow cybercash to compile as a DL module. (Sterling)</li>
<li>Fixed the dbase_create function. (Sterling)</li>
<li>Fixed a problem under some versions of Windows that could cause PHP to hang
  on startup if errors occured, e.g. in the php.ini file (Zeev)</li>
<li>Fixed opendir() again.  It should actually work well continuously now (Zeev)</li>
<li>Added three additional arguments to be sent to a user-defined error handler -
  the filename and line number in which the error occured, and the context
  (the local variables) of the error (Zeev, Zend Engine)</li>
<li>Improved the error handling code to handle an error in a user-defined error
  handling function (Zeev, Zend Engine)</li>
<li>Added an optional parameter to preg_replace() that can be used to
  specify how many replacements to make. (Andrei)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.2">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.1"><!-- {{{ 4.0.1 -->
<h3>Version 4.0.1</h3>
<?php release_date("28-Jun-2000"); ?>
<ul>
<li>Fixed a possible crash in the LDAP modify code. (Eric Kilfoil)</li>
<li>Fixed a bug in opendir(), which prevented readdir() from working properly if
  the $dir argument wasn't explicitly specified (Zeev)</li>
<li>Made --enable-discard-path work again. (Andi) </li>
<li>Removed 8KB limit on line length of the file() function (Zeev)</li>
<li>Disabled dl() when PHP is being used as a module inside a multithreaded web
  server - it didn't work before, and caused weird results (Zeev)</li>
<li>Added the ImageColorClosestHWB(), ImageCopyMerge() and ImagePaletteCopy() 
  functions. (Sterling)</li>
<li>Added ImageCreateFromWBMP() function. (Jouni)</li>
<li>Fixed problems with POST requests under the NSAPI module. (Roberto Biancardi)</li>
<li>Added spliti() function. (Thies)</li>
<li>Fixed serializer behaviour with regards to serializing objects whose class
  definition was not available in the deserializing context. (Sascha)</li>
<li>Improve memory cache performance and increase cache size. (Stas, Zend Engine)</li>
<li>Added a crc32 checksum function - used by the UdmSearch search engine
  and currently run through a system call.  This will speed up the UdmSearch
  php frontend significantly. (Rasmus)</li>
<li>Modified in_array() to not touch array pointer. (Andrei)</li>
<li>Added restore_error_handler(). (Zeev, Zend engine)</li>
<li>Fixed erroneous file names and line numbers in error situations under the
  multithreaded version of PHP - most noticeably Win32 (Zeev, Zend Engine)</li>
<li>Fixed problem with CGI crashing on certain servers especially Windows Apache
  &amp; O'Reilly website (Andi)</li>
<li>Added Pi3Web SAPI module; run ./configure --with-pi3web to enable this.
  (Holger; zimpel@t-online.de)</li>
<li>Enhanced WDDX functions to call __sleep() and __wakeup() when working on
  objects. (Andrei)</li>
<li>Changed WDDX to serialize arrays as structs only if needed. (Thies)</li>
<li>Implemented max_execution_time under Win32 (Zeev)</li>
<li>Updated strtotime() to handle many more formats. It now has complete
  feature parity with GNU date command. (Andrei)</li>
<li>Added support for multiple arguments in unset(). (Faisal, Zend Engine)</li>
<li>Functions that expect a resource but are passed something else now return 
  NULL instead of FALSE. (Thies, Zend Engine)</li>
<li>Fixed gmmktime(), on certain systems it incorrectly adjusted for the timezone
  offset and daylight savings time. (Andrei)</li>
<li>Moved VC++ Win32 project and workspace files to the win32 directory
  (Zeev)</li>
<li>Fixed checkdate() to not return true on non-numeric arguments (Rasmus)</li>
<li>Added --enable-c9x-inline option for compilers which support the new C9x
  standard. If you encounter undefined references to i_zend_is_true and
  other symbols, you should enable this.  (Sascha, Zend Library)</li>
<li>Fixed a problem in ldap_add() and ldap_modify(), sometimes added trailing
  garbage to the values (Stig Venaas) </li>
<li>Fixed a problem with dbmopen() not handing 'c' correctly with dbm/db/ndbm
  databases. (JimJag)</li>
<li>Fixed a crash in number_format() when used with locales. (Andrei)</li>
<li>Fixed an initialization problem in the MS-SQL problem that could cause
  a crash in mssql_query() (Zeev)</li>
<li>Upgraded PCRE to version 3.2 and fixed a bug when anchored pattern
  matched an empty string. (Andrei)</li>
<li>Fixed a bug that prevented PHP from paying attention to the extension_dir
  directive with extensions that were loaded from the php.ini file (Zeev)</li>
<li>Changed set_error_handler() to return the name of the previously defined
  error handler, if any (Zeev, Zend Engine)</li>
<li>Declared &lt;? php_track_vars ?&gt; officially dead.  It didn't work in PHP 4.0.0
  either, but now it's gone for good (Zeev)</li>
<li>Make convert_cyr_string() binary safe and stop it from corrupting other
  PHP variables. (Andi)</li>
<li>Added functions array_unique, array_intersect and array_diff (Stig Venaas)</li>
<li>Fixed problem when using uninitialized values in comparisons with strings.
  They behave as empty strings again just like in PHP 3.
  (Andi &amp; Zeev, Zend Engine)</li>
<li>Fixed 'Z' flag in date() to adjust for daylight savings time. (Andrei)</li>
<li>Fixed var_dump() not to modify the internal order of array elements (Zeev)</li>
<li>Fixed stripcslashes() to remove to strip \ in unknown escapes instead of
  leaving it. (Andrei)</li>
<li>Changed WDDX to always serialize arrays as structs. (Andrei)</li>
<li>Fixed include_once() to issue a warning in case the supplied file name is
  not found (Zeev, Zend Engine)</li>
<li>Fixed a bug in get_declared_classes() which could return the same class
  multiple times under certain circumstances (Zeev, Zend Engine)</li>
<li>Fixed a bug in rawurldecode() that would cause in rawurldecode() corrupting
  its argument (Zeev)</li>
<li>Parse errors (or other errors) in the php.ini files under Windows will no
  longer mess up the HTTP headers in CGI mode and are now displayed in a
  message box (Zeev)</li>
<li>Fixed a crash in OCIFetchStatement() when trying to read after all data
  has already been read. (Thies)</li>
<li>fopen_wrappers() are now extensible via modules (Hartmut Holzgraefe)</li>
<li>Make trim strip \0 to match php 3 (Rasmus)</li>
<li>Added function imagecreatefromxbm(). (Jouni)</li>
<li>Added function imagewbmp(). (Jouni, based on patch from Rune Nordb&oslash;e
  Skillingstad)</li>
<li>Added str_pad() for padding a string with an arbitrary string on left or
  right. (Andrei)</li>
<li>Made the short_tags, asp_tags and allow_call_time_pass_reference INI
  directives work on a per-directory basis as well, e.g. from .htaccess
  files. (Zeev)</li>
<li>Added fflush() function. (Eric Huss)</li>
<li>Fixed a problem with static variables, default function arguments and class
  member variables, that contained array values. (Andi &amp; Zeev, Zend Engine)</li>
<li>Fixed virtual() when used with output buffering (Marc Pohl)</li>
<li>Clean up constants in flock() function and add optional 3rd arg which
  is set to true on EWOULDBLOCK (Rasmus)</li>
<li>Added functions pg_loimport(), pg_loexport(). (Jouni)</li>
<li>Added SWF support to getimagesize() function (Derick Rethans)</li>
<li>Added support for both indexed and non-indexed arrays of file uploads
  eg. name="file[]" type="file" (Rasmus)</li>
<li>Added create_function(), which gives the ability to create functions
  on-the-fly (Zeev, Zend Engine)</li>
<li>Added support for comparisons of arrays (with arrays) and objects (with
  objects);  The equality operator (==) performs an unordered comparison,
  whereas the identity operator (===) performs an ordered comparison (Zeev,
  Zend Engine)</li>
<li>Allow all functions that receive user-defined function callbacks to accept
  an array that contains an object and a method name, in place of a function
  name, e.g. usort($array, array($obj, "ObjSort")) (Zeev, Zend Engine)</li>
<li>Added set_error_handler() to allow custom error handling functions,
  instead of the built-in error handling code (Zeev, Zend Engine)</li>
<li>Renamed user_error() to trigger_error();  user_error() remains
  defined for compatibility (Zeev, Zend Engine)</li>
<li>Fixed the global/static statements to require a trailing terminating
  semi-colon ';'. (Andi, Zend Engine)</li>
<li>Cleaned up PCRE extension and made it binary-safe. (Andrei)</li>
<li>Added third argument to in_array(). If it's true, then in_array()
  will use strict comparison instead of the default one. (Andrei)</li>
<li>Added pg_trace() and pg_untrace (Dominic J. Eidson &amp; Zeev)</li>
<li>ignore_user_abort=Off is now default. (Thies)</li>
<li>Added array_merge_recursive() that will recursively merge values
  under the same keys. (Andrei)</li>
<li>fixed crash in OCIParse when parsing invalid SQL. (Thies)</li>
<li>Fixed a bug in mysql_connect() that made it ignore the socket argument, in
  case of non-persistent connects (Zeev)</li>
<li>Added disable_functions php.ini directive, to allow administrators to disable
  certain functions for security reasons (Zeev)</li>
<li>Fixed sessions on Win32. When setting the directory depth parameter in
  save_path you need to now delimit it with a ';' instead of ':', e.g
  "5;/tmp" instead of "5:/tmp" (Andi)</li>
<li>Changed the Apache handler's return status to 'Declined' when a requested
  PHP file could not be found.  Returning 'Not Found' caused problems
  in the ErrorDocument handler stage in that $REDIRECT_REDIRECT_ERROR_NOTES
  was not getting set at all.  Moving to 'Declined' should fix this and I
  can't see any other side effects.  (Rasmus)</li>
<li>Fixed scanning decimal numbers in internationalized environments. They should
  always be in standard US format e.g. 23.3. (Andi, Zend Engine)</li>
<li>Added second argument to preg_quote() which allows quoting of
  one additional character, usually the regex delimiter. (Andrei)</li>
<li>Uncommitted outstanding OCI8 transactions are now rolled back
  before the connection is closed. (Thies)</li>
<li>ignore_user_abort() &amp; friends should now work in CGI mode as well.
  (Patch by daniel.braun@ercom.fr)</li>
<li>Added extension YAZ (dickmeiss).</li>
<li>Fixed a crash bug triggered by certain cases of class redeclarations
  (Stas &amp; Zeev, Zend Engine)</li>
<li>Fixed min()/max() segfault. (Andrei)</li>
<li>New module for reading EXIF header data from JPEG files.  Most digital
  cameras will embed all sorts of information about a picture inside the
  jpeg images it generates.  (Rasmus)</li>
<li>Fixed basename() bug where "file.ext///" would not return the same
  as "/path/file.ext///" (Rasmus)</li>
<li>Added the swf_ortho function. (Sterling)</li>
<li>Moved to virtual current working directory support. This highly improves the
  functionality and stability of multi-threaded versions of PHP (Andi, Sascha)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.1">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0.0"><!-- {{{ 4.0.0 -->
<h3>Version 4.0.0 Release</h3>
<?php release_date("22-May-2000"); ?>
<ul>
<li>Allow the writing of flash files to stdout.</li>
<li>Fixed a crash bug in .phps syntax-highlighted files (Andi)</li>
<li>Improved round() to allow specification of rounding precision.
  (Andrei, Todd Kirby &lt;kirbyt@yahoo.com&gt;)</li>
<li>Added SORT_REGULAR, SORT_NUMERIC, SORT_STRING flags that can be used with
  non-user sort functions for precise sorting behavior. (Andrei)</li>
<li>Fixed two 64-bit issues (startup crash, gethostbyaddr). (Sascha)</li>
<li>NULL values are now preserved in the return value of mysql_fetch_array()
  and mysql_fetch_object(). (Andrei)</li>
<li>Ported InterBase module finally from PHP 3 to PHP 4. Full support for
  InterBase 6. (Jouni)</li>
<li>Added swf_definepoly for drawing polygons to the SWF functions. (Sterling)</li>
<li>Ported imagegammacorrect from PHP3 to PHP4. (Sterling)</li>
<li>Added array_rand() function. (Andrei)</li>
</ul>
More information on this release on <a href="/releases.php#4.0.0">our Releases page</a>.<br>

<!-- }}} --></section>

<section class="version" id="4.0RC2">
<h3>Version 4.0, Release Candidate 2</h3>
<?php release_date("08-May-2000"); ?>
<ul>
<li>NSAPI WIN32 Module compilable, untested (Shane)</li>
<li>Apache WIN32 Module compilable and lightly tested. (Shane)</li>
<li>Enabled assert() by default in php.ini-dist. (Andrei)</li>
<li>Put in safeguards in case dynamic code evaluation in assert() and
  preg_replace() with /e modifier fails. (Andrei)</li>
<li>Fixed infinite recursion when serializing $GLOBALS[] in WDDX. (Andrei)</li>
<li>Made WDDX serialization properly escape &amp;lt;, &amp;gt;, and &amp;. Also speeded up
  the serialization in general. (Andrei)</li>
<li>Moved install-local to install-sapi for clarity. (Joey)</li>
<li>Improved extension build framework. Refer to README.SELF-CONTAINED-EXTENSIONS
  for an introduction. (Sascha)</li>
<li>ImagePolygon() is no longer limited by a maximum number of polygons.
  (Marc Pohl)</li>
<li>Added configure time checking for bcmath package. (Joey, Sascha)</li>
<li>Added get_declared_classes(). (Andrei, Zend Engine)</li>
<li>Added initial NSAPI module from Jayakumar Muthukumarasamy. (Rasmus)</li>
<li>Added the SWF module which allows you to create Macromedia Flash files via 
  libswf. (Sterling)</li>
<li>Improved UNIX build system to support more vendor make tools (Sascha)</li>
<li>Updated natural comparison/sorting algorithm by Martin Pool
  &lt;mbp@humbug.org.au&gt;. (Andrei)</li>
<li>Fixed a crash in array_multisort() that happened when empty arrays
  were passed to it. (Andrei)</li>
<li>Added substr_count() from Peter Kovacs. (Andrei)</li>
<li>Added an optional third argument to fseek to indicate where to seek from.
  (Andrei)</li>
<li>OCIBindByName() will no longer complain about bindlength beeing zero. (Thies)</li>
<li>Converted the IMAP module to the high performance API (Zeev)</li>
<li>The fgetcsv() function now handles embedded end-of-line in a quoted field
  (Nick Talbott)</li>
<li>Added user_error(), to allow explicitly generate error messages from scripts
  (Zeev, Zend Engine)</li>
<li>Fixed a problem in long2ip() that occasionally returned incorrect IP address.
  (Evan, Andrei)</li>
<li>Fixed many memory leaks in the IMAP module (Stas, Andi, Zeev)</li>
<li>Fixed bug in number_format (Jon Forsberg)</li>
<li>Make error_prepend_string and error_append_string work (Rasmus)</li>
<li>array_walk() now automatically resets the array. (Andrei)</li>
<li>Added natural comparison/sorting routines strnatcmp(), strnatcasecmp(),
  natsort(), and natcasesort(). These are useful for comparing and sorting
  strings that contain numbers. Based on the code from Martin Pool
  &lt;mbp@humbug.org.au&gt;. See http://www.linuxcare.com.au/projects/natsort/
  for more info on natural sorting. (Andrei)</li>
<li>Zeus Webserver support (version 3.3.6+) for ISAPI (Ben Mansell)</li>
<li>Fixed several problems with the PATH_TRANSLATED and PHP_SELF under Apache
  (Paul Gregg &amp; Zeev)</li>
<li>Ported ldap_get_values_len() function from PHP3 to PHP4. (Sterling)</li>
<li>Fixed a problem in include_once() with non constant arguments (Andi &amp; Zeev,
  Zend Engine)</li>
<li>Added php.ini-optimized (Zeev)</li>
<li>Ported ldap_errno(), ldap_err2str() and ldap_error() from PHP3 to PHP4.
  (Sterling)</li>
<li>WDDX now defaults to ISO-8859-1. (Thies)</li>
<li>Fixed crash resulting from IMAP's error handling (Stas)</li>
<li>Added $HTTP_POST_FILES[filename][tmp_name] - it was previously impossible to
  retrieve the temporary name of an uploaded file using $HTTP_POST_FILES[]
  (Zeev)</li>
<li>Made the IMAP and LDAP modules compilable under Windows and thread-safe
  (Zeev)</li>
<li>Fixed a problem when dealing with large POST blocks in CGI mode (Zeev)</li>
<li>Added session_get_cookie_params() function. (Sterling)</li>
<li>Fixed return of stristr() to no longer always be lowercased. (Andrei)</li>
<li>Changed the Windows version of PHP so that a php.ini file is no
  longer mandatory (Zeev)</li>
<li>session_start() is now more verbose if headers cannot be send. (Thies)</li>
<li>Fixed a memory leak when using assign-op bitwise operators on strings (Zeev,
  Zend Engine)</li>
<li>Added support for reading properties that require arguments in the COM
  module - writing to them will only be supported in PHP 4.1 (Zeev)</li>
<li>Fixed a very old legacy memory leak in the COM module (Zeev)</li>
<li>Fixed problems with object-overloading support - noteably, COM and Java
  (Zeev, Zend Engine)</li>
<li>Fixed an overrun in WDDX. (Thies)</li>
<li>Fixed a crash bug with modules loaded through dl() not properly freeing their
  resources (Zeev, Zend Engine)</li>
<li>Added localtime() function. (Sterling)</li>
<li>Added the 'I' format option for the date function, this option will return
  true or false depending on whether or not daylight savings time is in effect.
(Sterling)</li>
<li>Added gmstrftime() function. (Sterling)</li>
<li>snmp_walkoid is now an alias for snmp_realwalk. (Sterling)</li>
<li>Fixed a bug that could cause a crash when using 'global' inside large include
  files (Stas, Zend Engine)</li>
<li>Added --enable-libgcc switch to force linking against libgcc (Sascha)</li>
<li>Fixed dynamic loading where extension_dir had no trailing slash (Sascha)</li>
<li>Fixed dynamic loading on OpenBSD (Sascha)</li>
<li>Improved POSIX threads check. ZTS works now on at least Linux, Solaris, 
  FreeBSD and OpenBSD (Sascha, TSRM)</li>
<li>Added !== operator support. (Torben, Zend Engine)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0RC1">
<h3>Version 4.0, Release Candidate 1</h3>
<?php release_date("27-Mar-2000"); ?>
<ul>
<li>Added support for UCD-SNMP 4.1.x (Sascha)</li>
<li>Fixed a data corruption bug in mysql_result(), if used in table.fieldname
  mode (Zeev)</li>
<li>Fixed a crash problem in func_num_args(), func_get_arg() and func_get_args()
  when used as function arguments (Andi, Zend Engine)</li>
<li>Added get_class_methods(string classname) function. (Andrei)</li>
<li>Added 'I' switch to test whether or not DST is active. (Sterling)</li>
<li>Fixed a data corruption bug in mysql_result(), if used in table.fieldname
  mode (Zeev)</li>
<li>Modified the registry INI entry reader (Win32) to work with drive letters.
  For example, if you wish to wish to specify INI entries for C:\foo\bar, you
  should create HKLM\PHP\Per Directory Values\C\foo\bar in the registry, and add
  string values for each directive you want to override in this directory (Zeev)</li>
<li>Fixed extract() for EXTR_PREFIX_SAME and EXTR_SKIP cases. (Andrei)</li>
<li>stristr() no longer modifies it's arguments. (Thies)</li>
<li>Don't default to iso-8859-1 since this confuses some browsers. (Rasmus)</li>
<li>Make it possible to specify both a port and a socket
  in mysql_[p]connect.  (Rasmus)</li>
<li>Added --disable-pic for disabling generating PIC for shared objects
  on platforms which support it (i.e. Linux) (Sascha)</li>
<li>serialize()/unserialize() now call __sleep() and __wakeup() when
  working on objects. (Thies)</li>
<li>renamed to_string() method to __string_value() for consistency.
  (Thies, Zend Engine)</li>
<li>Fixed a bug in the third argument to define()</li>
<li>Added is_numeric() that returns true if the argument is a number
  or a numeric string. (Andrei)</li>
<li>domxml now supports libxml 2.0 Beta and drops support for older versions,
  due to massive changes in libxml</li>
<li>fixed possible crash in unserialize() if serialized data was
  corrupted. (Thies)</li>
<li>Changed $HTTP_STATE_VARS to $HTTP_SESSION_VARS. Use only the latter
  version now! (Andrei)</li>
<li>Added GD-JPEG Support (Rasmus)</li>
<li>Prevent from loading dynamic PHP modules which were compiled with different
  debug and thread safety modes than PHP, which resulted in a crash (Andi)</li>
<li>connection_aborted() and friends work again (Thies)</li>
<li>Upgraded to libtool 1.3.4 (Sascha)</li>
<li>UNIX configure creates config.nice in the build directory now which allows
  easy reuse of configuration options (Sascha)</li>
<li>Added support for embedded MySQL client library. Unless you specify a path
  to --with-mysql, the bundled MySQL client library will be used (Sascha)</li>
<li>Added include_once() and require_once() functionality (Andi, Zend Engine)</li>
<li>Removed support for pdflib &lt; 3.0 (Uwe)</li>
<li>Added auto-registration of everything in $HTTP_SESSION_VARS[] if
  register_globals is turned off. (Andrei)</li>
<li>Cleaned up extension namespace (Stig)</li>
<li>OCINLogon() sessions are now closed again. (Thies)</li>
<li>Added ip2long() and long2ip(),
  courtesy of Faisal Nasim &lt;faisal@nasim.org&gt; (Andrei)</li>
<li>Added ftruncate() and fstat(),
  courtesy of Faisal Nasim &lt;faisal@nasim.org&gt; (Andrei)</li>
<li>Added parse_ini_file().  Currently implemented in non thread safe version
  of PHP, and currently lacks section support (Zeev)</li>
<li>"none" is now equivalent with "" in Apache config directives (Stig)</li>
<li>OCINLogon no longer crashes. (Thies)</li>
<li>Fixed comparisons of (string) "nan" with (string) "nan". (Thies, Zend Engine)</li>
<li>Switched back to the old $HTTP_*_VARS[] behavior - $HTTP_GET_VARS["foo"]
  and $foo are no longer references to each other, but separate variables
  like they were prior to PHP 4.0 Beta 4 (Zeev)</li>
<li>Fixed Sybase-DB compilation (Zeev)</li>
<li>Fixed a (fairly common) situation where error_reporting values would not be
  properly restored after a call to error_reporting(), in between requests
  (Zeev)</li>
<li>The various $HTTP_*_VARS[] are now protected, and cannot be manipulated by
  user input (Zeev)</li>
<li>Added ini_set() as an alias to ini_alter() (Zeev)</li>
<li>The string None is now recognized as a keyword by the php.ini processor, and
  can be used to denote an empty string (Zeev)</li>
<li>Added get_class_vars(string class_name) and get_object_vars(object obj)
  functions. (Andrei, Zend Engine)</li>
<li>Added pdf_set_parameter(), pdf_skew(), pdf_show_boxed() (Uwe)</li>
<li>Fixed comparison of (string) "inf" with (string) "inf", which was erroneously
  returning false (Zeev)</li>
<li>Implemented default_charset and default_mimetype config directives (Stig)</li>
<li>Ported T1lib support from PHP3. (Jouni)</li>
<li>Fixed -DEAPI inheritance from APXS. (Sascha)</li>
<li>Fixed possible crash in module-shutdown. (Thies)</li>
<li>Fixed safe_mode_protected_env_vars INI directive (Zeev)</li>
<li>Fixed getrusage() (Sascha)</li>
<li>Fixed OCI8 crash when returning cursors from stored-procedures. (Thies)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0b4l1">
<h3>Version 4.0, Beta 4 Patch Level 1</h3>
<?php release_date("21-Feb-2000"); ?>
<ul>
<li>Fixed crash when magic_quotes were switched off. (Thies)</li>
<li>Support for pdflib 2.30 (Uwe)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0b4">
<h3>Version 4.0, Beta 4</h3>
<?php release_date("20-Feb-2000"); ?>
<ul>
<li>Introduced $HTTP_POST_FILES[], that contains information about files uploaded
  through HTTP upload (Zeev)</li>
<li>Made PHP work under Microsoft Personal Web Server, under both Windows NT
  workstation and Windows 95 (Zeev)</li>
<li>Made multipart/form-data content obey to the variables_order directive (Zeev)</li>
<li>Updated the browscap module to work with PHP 4.0 (Zeev)</li>
<li>Recover gracefully in ISAPI after the client prematurely presses STOP (Andi)</li>
<li>Fixed bug in unset() on array offsets which are referenced more than once
  (Andi, Zend Engine)</li>
<li>Improved ISAPI module - it should no longer be necessary to set PHP as
  an ISAPI filter, only as an ISAPI extension, unless you wish to perform
  authentication using PHP.  This didn't yet get enough testing, but it
  should work (Zeev)</li>
<li>Fixed RFC1867 file upload under Windows (Zeev)</li>
<li>Initital support for pdflib 2.20 (Uwe)</li>
<li>Added PostgreSQL support for DB (Rui Hirokawa &lt;louis@cityfujisawa.ne.jp&gt;)</li>
<li>Re-introduced "none" for disabling auto_prepend/append_file (Stig)</li>
<li>Added DB/storage (Stig, PEAR)</li>
<li>Introduced DB warnings (Stig, PEAR)</li>
<li>Fixed overrun in strip_tags (Stas)</li>
<li>Fixed crash in strip_tags() and related functions. (Thies)</li>
<li>Workaround for bogus POST-Data from IE/Mac. (Thies)
  Patch by Alain Malek &lt;alain@virtua.ch&gt;</li>
<li>Finished the server abstraction layer;  All of the PHP code is now shared
  across different servers (Apache, CGI, IIS, etc.), except for thin
  interface modules (Zeev)</li>
<li>Added NULL-support in gettype(). (Thies)</li>
<li>base64_decode() will decode POST data correct. (Thies)
  Patch submitted by: Turadg Aleahmad &lt;turadg@wise.berkeley.edu&gt;</li>
<li>Much more work on domxml. Build xml tree, create xml doc works (Uwe)</li>
<li>Made foreach() work on objects. (Thies, Zend Engine)</li>
<li>Added domxml extension based on libxml, still little functionality (Uwe)</li>
<li>Fixed memory corruption in fgetss(), strip_tags() and gzgetss() (Zeev)</li>
<li>Updated calendar dynamic library to work with PHP 4. (Evan)</li>
<li>Added strncmp() function, courtesy of Walter. (Andrei)</li>
<li>Made the output of var_dump() more informative. (Thies)</li>
<li>Fixed some OCIBindByName() problems. (Thies)</li>
<li>Protect the ISAPI module against exceptions.  Stack overflows in scripts are
  now nicely detected and handled (Zeev)</li>
<li>Fixed possible buffer-overflow in base64_decode. (Thies)</li>
<li>Fixed possible buffer-overflow in setcookie(). (Thies)</li>
<li>Fixed signal() bug that could cause the Apache master process to
  die. (Thies)</li>
<li>Added session_set_cookie_params() function. (Andrei)</li>
<li>If header information is sent after output has already been sent, the warning
  message will now state the filename and line number at which the first output
  was made (Zeev)</li>
<li>Added the XML Expat library to the standard PHP source distribution thanks
  to its author James Clark (Andi &amp; Zeev)</li>
<li>Added XML support to the default Win32 build (Andi &amp; Zeev)</li>
<li>Added socket_get_status() function. Renamed set_socket_timeout() to 
  socket_set_timeout() and set_socket_blocking() to socket_set_blocking(). (Andrei)</li>
<li>Added realpath() function. (Andrei)</li>
<li>mktime interprets years in the range 0-70 now as 2000-2070. You can
  continue to specify the complete year (i.e. 1920) (Sascha)</li>
<li>Added the ability to control the environment variables the user is allowed
  to change in Safe Mode, using INI directives (Zeev)</li>
<li>Fixed a crash bug in strtr() working on large input strings (Zeev)</li>
<li>Ora_GetColumn()/Ora_FetchInto() now return NULL for NULL-Columns. (Thies)</li>
<li>OCI8 now supports binding of NULL-values. Module cleanups. (Thies)</li>
<li>Added ability to set timeout on socket read operations through
  set_socket_timeout() function. (Andrei)</li>
<li>Added implicit_flush INI directive (Zeev)</li>
<li>Added implicit_flush() to control whether flush() should be called
  implicitly after any output (Zeev)</li>
<li>Fixed a crash in pfsockopen() (Zeev)</li>
<li>Fixed a possible crash in phpinfo() (Zeev)</li>
<li>Added register_argc_argv INI directive, to allow to selectively disable
  the declaration of the $argv and $argc variables for increased
  performance (Zeev)</li>
<li>Added $HTTP_ENV_VARS[] and $HTTP_SERVER_VARS[] support, which similarly
  to $HTTP_GET_VARS[], contain environment and server variables.  Setting
  register_globals to Off will now also prevent registration of the
  environment and server variables into the global scope (Zeev)</li>
<li>Renamed gpc_globals INI directive to register_globals (Zeev)</li>
<li>Introduced variables_order that deprecates gpc_order, and allows control
  over the server and environment variables, in addition to GET/POST/Cookies
  (Zeev)</li>
<li>new function cpdf_set_document_limits() (Uwe)</li>
<li>Applied safe-mode patch to popen(). (Patch by Kristian K&ouml;hntopp)</li>
<li>str_repeat() now returns correct length. (Thies)</li>
<li>Don't assume libz and libpng are installed for the GD checks (Rasmus)</li>
<li>Implemented support for &lt;boolean&gt; and &lt;null&gt; types according
  to WDDX version 1.0 (Andrei)</li>
<li>Made var_dump()/serialize()/unserialize() NULL aware. (Thies)</li>
<li>Added new NULL constant (Zeev, Zend Engine)</li>
<li>Fixed -c support in the standalone CGI binary (Zeev)</li>
<li>Increased PHP's performance by 5-15% using a new memory cache (Andi &amp; Zeev,
  Zend Engine)</li>
<li>Improved the php.ini reader to support constants and bitwise operators (Zeev)</li>
<li>Fixed strrev() to no longer modify arg1. (Thies)</li>
<li>Fixed buffer overruns in iptcembed(). (Thies)</li>
<li>Fixed a bug in ODBC error reporting (Zeev)</li>
<li>Added PHP_Logo_GUID() and Zend_Logo_GUID() functions, that return the GUIDs
  of the PHP and Zend logos used in phpinfo() (Zeev)</li>
<li>Added GNU Pth support (Sascha, TSRM library)</li>
<li>Removed select(), fd_set() and fd_isset() - will be reimplemented soon! (Thies)</li>
<li>Improved Win32 performance significantly by using different mutexes (Zeev,
  TSRM library)</li>
<li>Made quotemeta() and preg_quote() binary-safe. (Andrei)</li>
<li>Added UDP support in fsockopen(). (Evan)</li>
<li>Added --disable-pear option (Andrei)</li>
<li>Renamed libzend repository to Zend (Zeev)</li>
<li>Added support for thttpd (Sascha)</li>
<li>Added session.cache_limiter and cache_expire options (Sascha)</li>
<li>Restored the PHP_VERSION and PHP_OS constants (Zeev)</li>
<li>Added get_loaded_extensions(), extension_loaded(), and
  get_extension_funcs() functions. (Andrei)</li>
<li>Added date/time stamping to PHP error log file. (Andrei, Joey)</li>
<li>Added is_subclass_of() function (Andrei, Zend Engine)</li>
<li>Implemented count_chars(). (Thies)</li>
<li>Added class_exists() function (Andrei, Zend Engine)</li>
<li>Made strspn() and strcspn() binary-safe. (Andrei)</li>
<li>Added array_multisort() function. (Andrei)</li>
<li>Made pageinfo.c thread-safe (Sascha)</li>
<li>Made implode() binary-safe (Andrei)</li>
<li>Made strstr(), stristr(), and ucwords() binary-safe() (Andrei)</li>
<li>Made strtoupper(), strtolower(), substr_replace() binary-safe. (Andrei)</li>
<li>Fixed a crash in the Apache syntax highlighting mode (Zeev)</li>
<li>Report all ODBC error's not just the one on the top of the stack (lurcher)</li>
<li>OCI8 now returns NULL values in LONG columns correct. (Thies)</li>
<li>Added support for a C-like assert() function. (Thies)</li>
<li>Added CyberCash support. (Evan)</li>
<li>Made explode() binary-safe. (Thies)</li>
<li>Made strpos() binary-safe. (Thies)</li>
<li>Added XML_Set_Object() function, now you can use the XML-Parser from
  within an object. (Thies)</li>
<li>Session vars are now decoded into $HTTP_STATE_VARS[] array and the
  globals, depending on track_vars and gpc_globals settings (Andrei)</li>
<li>Added get_used_files() function - returns a hash mapping the use()'d files
  to their full path (Zeev)</li>
<li>PHP 4 scripts will now obey the max_execution_time setting and actually
  time out (Rasmus)</li>
<li>Added configure command to phpinfo() output (Stig)</li>
<li>Added optional socket path to the mysql_?connect() functions (Rasmus)</li>
<li>Made mysql and gd work as shared extensions again (Stig)</li>
<li>Make the global GET/POST/Cookie variables and their $HTTP_*_VARS[] counterparts
  be references to each other (Zeev)</li>
<li>Added support for the 'use' keyword - behaves like 'require', but will not
  use the same file more than once (Andi &amp; Zeev, Zend Engine)</li>
<li>Added check to see if a persistent connection is still valid with the
  ODBC interface before reusing (nick@easysoft.com)</li>
<li>Added DBMaker support (patch by Pax Tsai &lt;paxtsai@lion.syscom.com.tw&gt;)</li>
<li>Renamed "PECL" to "PEAR" (PHP Extension and Add-on Repository) (Stig)</li>
<li>buildconf now uses build.mk (Stig)</li>
<li>Disable symlinks to urls (Rasmus)</li>
<li>Informix driver now reflects version of ESQL/C used  (Danny)</li>
<li>Modified session_register() to take variable number of arguments (Andrei)</li>
<li>Fixed file descriptor leak in thread safe mode (Zeev, Zend Engine)</li>
<li>Added select(), fd_set() and fd_isset() (Evan)</li>
<li>cpdf support has been ported from php3, needs ClibPDF 2.x (Uwe)</li>
<li>Fixed a leak when using automatic output buffering (Zeev)</li>
<li>Introduced PECL - PHP Extension and Code Library
  (prounounced "pickle") (Stig)</li>
<li>Fixed inconsistencies in the implementation of here-docs (Andi &amp; Zeev, Zend 
  library)</li>
<li>Fixed a problem with constant class-member initializations (Andi &amp; Zeev,
  Zend Engine)</li>
<li>Fixed float-compare in min(),max(),a[r]sort(),[r]sort() (Thies)</li>
<li>Implemented get_html_translation_table() function (Thies)</li>
<li>Implemented array_flip() function. Returns input-array with key, value
  flipped (Thies)</li>
<li>Added Berkeley DB3 support in DBA (Sascha)</li>
<li>Implemented 2-Arg version of strtr($str,$translation_array). This can be used
  to revert what htmlspecialchars() did (Thies)</li>
<li>Fixed mem-overwrite in XML_Parse_Into_Struct (Thies)</li>
<li>Added substr_replace() function (Andrei)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0b3">
<h3>Version 4.0 Beta 3</h3>
<?php release_date("16-Nov-1999"); ?>
<ul>
<li>ucfirst()/ucwords() no longer modify arg1 (Thies)</li>
<li>Fixed strtr() not to modify arg1 (Thies)</li>
<li>Added Win32 build files for Informix driver and make it
  compile with ZTS (danny)</li>
<li>Added tmpfile() function (Stig)</li>
<li>Upgraded regex library to alpha3.8 (Sascha)</li>
<li>Fixed selecting nested-tables in OCI8. (Thies)</li>
<li>RFC-854 fix for internal FTP-Code. Commands have to end in "\r\n" (Thies)</li>
<li>Fixed OpenLink ODBC support (Stig)</li>
<li>min(),max(),a[r]sort(),[r]sort(),k[r]sort() now work consistent with the 
  language-core. (Thies)</li>
<li>tempnam() now uses mkstemp() if available (Stig)</li>
<li>serialize() and var_dump() now honor the precision as set in php.ini
  for doubles. (Thies)</li>
<li>Improved the Win32 COM module to support [out] parameters (Boris Wedl)</li>
<li>Fixed garbage returned at the end of certain Sybase-Columns (Thies)
  Patch submitted by: neal@wanlink.com</li>
<li>Added Microsoft SQL Server module for Win32 (Frank)</li>
<li>Added support for forcing a variable number of internal function arguments
  by reference. (Andi &amp; Zeev, Zend Engine)</li>
<li>Implemented getprotoby{name,number} (Evan)</li>
<li>Added array_pad() function. (Andrei)</li>
<li>Added new getservby{name,port} functions. (Evan)</li>
<li>Added session.cookie_path and session.cookie_domain (Sascha)</li>
<li>Continue processing PHP_INI_SYSTEM knownDirectives after extension=
  (Sam Ruby)</li>
<li>Enable IBM DB2 support - Tested against DB2 6.1 UDB on Linux (Rasmus)</li>
<li>Added new str_repeat() function. (Andrei)</li>
<li>Output-Buffering system is now Thread-Safe. (Thies)</li>
<li>implemented OCI8 $lob-&gt;WriteToFile() function - very useful for streaming
  large amounts of LOB-Data without to need of a huge buffer. (Thies)</li>
<li>Added session.use_cookies option (Sascha)</li>
<li>Added getcwd() function. (Thies)</li>
<li>XML_Parse_Into_Struct no longer eats data. (Thies)</li>
<li>Fixed parse_url('-') crash. (Thies)</li>
<li>added === operator support. (Andi &amp; Thies, Zend Engine)</li>
<li>unserialize() now gives a notice when passed invalid data. (Thies)</li>
<li>Fixed shuffle() so that it no longer breaks on Solaris. (Andrei)</li>
<li>Added is_resource(), is_bool() functions. (Thies)</li>
<li>Cleaned up File-Module (Thies)</li>
<li>Upgraded math-funtions to use new Zend function API (Thies)</li>
<li>Fixed zombie problem in shell_exec() and $a = `some_command`
  constructs. (Thies)</li>
<li>Thies introduced ZEND_FETCH_RESOURCE2 (Danny).</li>
<li>Added Informix driver to list of maintained extensions. (Danny).</li>
<li>Informix driver : Changed ifx.ec to use the new high-performance
  ZEND API. (Danny)</li>
<li>IXF_LIBDIR environment variable specifies alternate Informix library
  path for configure (Danny).</li>
<li>Fixed gmmktime() so that the following should always be true:
  gmmktime([args]) == mktime([args]) + date('Z', mktime([args])) (Jouni)</li>
<li>setlocale doesn't anymore screw up things if you forgot to change it back
  to the original settings. (Jouni)</li>
<li>Switched to new system where ChangeLog is automagically updated from commit
  messages. NEWS file is now the place for public announcements. (Andrei)</li>
<li>Fixed refcount problem in XML module. (Thies)</li>
<li>Fixed crash in HTTP_RAW_POST_DATA handling (Thies)</li>
<li>You can use resources as array-indices again (Thies, Zend Engine)</li>
<li>Fixed pg_fetch_array() with three arguments (Sascha)
  Patch submitted by: brian@soda.berkeley.edu</li>
<li>Upgraded a lot internal functions to use new Zend function API (Thies)</li>
<li>fdf support ported; not completely tested with latest version 4.0 for
  glibc (Uwe)</li>
<li>OCI8 connections are now kept open as long as they are referenced (Thies)</li>
<li>Cleaned up Directory-Module (Thies)</li>
<li>Small fix in Ora_Close (Thies)</li>
<li>Ported range() and shuffle() from PHP 3 to PHP 4 (Andrei)</li>
<li>Fixed header("HTTP/..."); behaviour (Sascha)</li>
<li>Improved UNIX build system. Now utilizes libtool (Sascha)</li>
<li>Upgrade some more internal functions to use new Zend function API. (Thies, 
  Zend Engine)</li>
<li>Fixed backwards incompatibility with ereg() (Thies)</li>
<li>Updated Zend garbage collection with a much more thorough method.
  (Andi, Zend Engine)</li>
<li>Added the ability to use variable references in the array() construct.
  For example, array("foo" =&gt; &amp;$foo). (Andi, Zend Engine)</li>
<li>Added array_reverse() function (Andrei)</li>
<li>Some more XML fixes/cleanups (Thies)</li>
<li>Updated preg_replace() so that if any argument passed in is an array
  it will make a copy of each entry before converting it to string so that
  the original is intact. If the subject is an array then it will preserve
  the keys in the output as well (Andrei) </li>
<li>Updated OCI8 to use the new high-performance Zend function API. (Thies)</li>
<li>Configure speedup (Stig)</li>
<li>Fixed LOB/Persistent-Connection related OCI8-Crash (Thies)</li>
<li>Generalized server-API build procedure on UNIX (Stig)</li>
<li>Added '--disable-rpath' option (Sascha)</li>
<li>Added AOLserver SAPI module (Sascha)</li>
<li>Fixed XML Callbacks. (Thies)</li>
<li>Updated ODBC to use the new high-performance Zend function API (kara)</li>
<li>Updated zlib to use the new high-performance Zend function API. (Stefan)</li>
<li>Updated preg_split() to allow returning only non-empty pieces (Andrei)</li>
<li>Updated PCRE to use the new high-performance Zend function API (Andrei)</li>
<li>Updated session, dba, mhash, mcrypt, sysvshm, sysvsem, gettext modules to use
  the new high-performance Zend function API (Sascha)</li>
<li>Extended var_dump to handle resource type somewhat (Andrei)</li>
<li>Updated WDDX to use the new high-performance Zend function API (Andrei)</li>
<li>Updated XML to use the new high-performance Zend function API. (Thies)</li>
<li>Updated Oracle to use the new high-performance Zend function API. (Thies)</li>
<li>Improved the performance of the MySQL module significantly by using the new
  high-performance Zend function API. (Zeev)</li>
<li>Added support for the Easysoft ODBC-ODCB Bridge (martin@easysoft.com)</li>
<li>Fixed bug in odbc_setoption, getParameter call incorrect (martin@easysoft.com)</li>
<li>Ora_Fetch_Into now resets the returned array in all cases (Thies) </li>
<li>Fixed NULL-Column problem in Oracle-Driver (Thies)</li>
<li>Added extra metadata functions to ODBC, SQLTables etc (nick@easysoft.com)</li>
<li>Fixed SEGV in mcal make_event_object() and
  typo in mcal_list_alarms() (Andrew Skalski)</li>
<li>Fixed Ora_PLogon (Thies)</li>
<li>Resourcified Oracle (Thies)</li>
<li>Implemented object serialization/deserialization in WDDX (Andrei)</li>
<li>Added krsort() function (Thies)</li>
<li>Added func_num_args(), func_get_arg() and func_get_args() for standard
  access to variable number of arguments functions (Zeev)</li>
<li>Added FTP support (Andrew Skalski)</li>
<li>Added optional allowable_tags arguments to strip_tags(), gzgetss() and
  fgetss() to allow you to specify a string of tags that are not to be
  stripped  (Rasmus)</li>
<li>Upgraded var_dump() to take multiple arguments (Andrei)</li>
<li>Resourcified XML (Thies)</li>
<li>Fixed a memory leak in the Apache per-directory directives handler (Zeev)</li>
<li>Added array_count_values() function. (Thies)</li>
<li>snmp, pgsql, mysql and gd modules can be built as dynamically loaded 
  modules (Greg)</li>
<li>OCI8 fix for fetching empty LOBs (Thies)</li>
<li>Added user-level callbacks for session module (Sascha)</li>
<li>Added support for unknown POST content types (Zeev)</li>
<li>Added "wddx" serialization handler for session module (Sascha)
  (automatically enabled, if you compile with --with-wddx)</li>
<li>Fixed unserializing objects (Thies)</li>
<li>PHP 4.0 now serializes Objects as 'O' (not understood by PHP 3.0), but
  unserializes PHP 3.0 serialized objects as expected. (Thies)</li>
<li>Made serialize/unserialize work on classes. If the class is known at 
  unserialize() time, you'll get back a fully working object! (Thies)</li>
<li>Reworked preg_* functions according to the new PCRE API, which also made
  them behave much more like Perl ones (Andrei)</li>
<li>Made it possible to specify external location of PCRE library (Andrei)</li>
<li>Updated bundled PCRE library to version 2.08 (Andrei)</li>
<li>count()/is_array/is_object... speedups. (Thies)</li>
<li>OCI8 supports appending and positioning when saving LOBs (Thies)</li>
<li>Added metaphone support (Thies)</li>
<li>OCI8 doesn't use define callbacks any longer. (Thies) </li>
<li>OCI8 Driver now supports LOBs like PHP 3.0. (Thies)</li>
<li>var_dump now dumps the properties of an object (Thies)</li>
<li>Rewrote the GET/POST/Cookie data reader to support multi-dimensional
  arrays! (Zeev)</li>
<li>Renamed allow_builtin_links to expose_php (defaults to On).  This directive
  tells PHP whether it may expose its existence to the outside world, e.g.
  by adding itself to the Web server header (Zeev)</li>
<li>Added support for transparent session id propagation (Sascha)</li>
<li>Made WDDX serialize object properties properly (Andrei)</li>
<li>Fixed WDDX mem leak when undefined variable is passed in
  for serialization (Andrei)</li>
<li>Added session_unset() function (Andrei)</li>
<li>Fixed double session globals shutdown crash (Andrei)</li>
<li>Fixed crash related to ignore_user_abort ini entry (Andrei)</li>
<li>Added support for external entropy sources for session id creation 
  (on Unices /dev/random and /dev/urandom) (Sascha)</li>
<li>Added gpc_globals variable directive to php.ini.  By default it is On, but
  if it is set to Off, GET, POST and Cookie variables will not be inserted
  to the global scope.  Mostly makes sense when coupled with track_vars (Zeev)</li>
<li>Added versioning support for shared library (Sascha)
  This allows concurrent use of PHP 3.0 and PHP 4.0 as Apache modules. See
  the end of the INSTALL file for more information.</li>
<li>Added second parameter to array_keys which specifies search value
  for which the key should be returned (Andrei)</li>
<li>Resourcified Informix driver (Danny)</li>
<li>New resource handling for odbc, renamed to php_odbc.[ch]</li>
<li>Make set_time_limit() work on Unix (Rasmus)</li>
<li>Added connection handling support (Rasmus)</li>
<li>Improved the Sybase-CT module to make use of resources (Zeev)</li>
<li>Improved the mSQL module to make use of resources (Zeev)</li>
<li>Changed mysql_query() and mysql_db_query() to return false in case of saving
  the result set data fails (Zeev)</li>
<li>Improved the resource mechanism - resources were not getting freed as soon
  as they could (Zeev)</li>
<li>Added shared memory module for session data storage (Sascha)</li>
<li>Fixed session.auto_start (Sascha)</li>
<li>Fixed several problems with output buffering and HEAD requests (Zeev)</li>
<li>Fixed HTTP Status code issue with ISAPI module (Zeev)</li>
<li>Fixed a problem that prevented $GLOBALS from working properly (Zeev, Zend
  library)</li>
<li>Ported newest GetImageSize (Thies)</li>
<li>Added session compile support in Win32 (Andi)</li>
<li>Added -d switch to the CGI binary that allows overriding php.ini values
  from the command line (Zeev)</li>
<li>Fixed a crash that would occur if wddx_deserialize did not receive
  a valid packet (Andrei)</li>
<li>Fixed a bugglet when redefining a class at run-time (Andi, Zend Engine)</li>
<li>Fixed sem_get() on AIX (Sascha)</li>
<li>Fixed fopen() to work with URL's in Win32 (Andi &amp; Zeev)</li>
<li>Fixed include_path for Win32 (Andi, Zend Engine)</li>
<li>Fixed bug in ISAPI header sending function (Charles)</li>
<li>Fixed memory leak when using undefined values (Andi &amp; Zeev, Zend Engine)</li>
<li>Added output_buffering directive to php.ini, to enable output buffering
  for all PHP scripts - default is off (Zeev).</li>
<li>Fixed some more class inheritance issues (Zeev, Zend Engine)</li>
<li>Fixed Apache build wrt to shared modules on FreeBSD/Linux (Sascha)</li>
<li>Added session.extern_referer_chk which checks whether session ids were
  referred to by an external site and eliminates them (Sascha)</li>
<li>Improved session id generation (Sascha)</li>
<li>Improved speed of uniqid() by using the combined LCG and removing
  the extra usleep() (Sascha)</li>
<li>Introduced general combined linear congruential generator (Sascha)</li>
<li>Made ldap_close back into an alias for ldap_unbind (Andrei)</li>
<li>OciFetchInto now resets the returned array in all cases (Thies)</li>
<li>Fixed mysql_errno() to work with recent versions of MySQL (Zeev)</li>
<li>Fixed a problem with define() and boolean values (Zeev)</li>
<li>Fixed inclusion of gd/freetype functions (Sascha)</li>
<li>Fixed persistency of MHASH_* constants (Sascha)</li>
<li>Oracle is now ZTS-Safe (Thies)</li>
<li>Fixed flushing of cached information to disk in DBA's DB2 module (Sascha)</li>
<li>OCI8 is now ZTS-Safe (Thies)</li>
<li>Fixed is_writeable/is_writable problem; they are both defined now (Andrei)</li>
<li>Imported PHP 3.0 diskfreespace() function (Thies)</li>
<li>Fixed thread-safety issues in the MySQL module (Zeev)</li>
<li>Fixed thread-safe support for dynamic modules (Zeev)</li>
<li>Fixed Sybase CT build process (Zeev)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0b2">
<h3>Version 4.0 Beta 2</h3>
<?php release_date("09-Aug-1999"); ?>
<ul>
<li>Fixed a problem when sending HTTP/1.x header lines using header() (Zeev)</li>
<li>Win32 builds now include the ODBC module built-in (Zeev)</li>
<li>Fixed SYSV-SHM interface (Thies).</li>
<li>Updated hyperwave module, made it thread safe</li>
<li>Updated pdflib module, version 0.6 of pdflib no longer supported</li>
<li>Updated fdf module</li>
<li>Built-in phpinfo() links are now turned off by default.  They can be turned
  on using the allow_builtin_links INI directive (Zeev)</li>
<li>Changed phpinfo() to list modules that have no info function (Zeev)</li>
<li>Modified array_walk() function so that the userland callback is passed
  a key and possible user data in addition to the value (Andrei)</li>
<li>Fixed ldap_search(), ldap_read() and ldap_list() (Zeev)</li>
<li>Fixed Apache information in phpinfo() (sam@breakfree.com)</li>
<li>Improved register_shutdown_function() - you may now supply arguments that
  will be passed to the shutdown function (Zeev)</li>
<li>Improved call_user_func() and call_user_method() - they now support passing
  arguments by reference (Zeev)</li>
<li>Fixed usort() and uksort() (Zeev)</li>
<li>Fixed md5() in the Apache module (Thies)</li>
<li>Introduced build process for dynamic modules (Stig)</li>
<li>Improved ISAPI module to supprt large server variables (Zeev)</li>
<li>Imported PHP 3.0 fixes for problem with PHP as a dynamic module and Redhat
  libc2.1 in zlib module (Stefan)</li>
<li>Fixed sybase_fetch_object() (Zeev)</li>
<li>Made the IMAP module work with PHP 4.0 (Zeev)</li>
<li>Fixed a problem with include()/require() of URLs (Sascha, Zeev)</li>
<li>Fixed a bug in implode() that caused it to corrupt its arguments (Zeev)</li>
<li>Added get_class($obj), get_parent_class($obj) and method_exists($obj,"name")
  (Andi &amp; Zeev)</li>
<li>Fixed various inheritance problems (Andi &amp; Zeev, Zend Engine)</li>
<li>Children now inherit their parent's constructor, if they do not supply a
  constructor of their own.</li>
<li>Fixed runtime inheritance of classes (parent methods/properties were
  overriding their children) (Zeev, Zend Engine)</li>
<li>Fixed backwards incompatibility with the "new" operator (Andi, Zend Engine)</li>
<li>Fixed bugs in uksort() and ksort() sort ordering (Andrei)</li>
<li>Fixed a memory leak when using assignment-op operators with lvalue of type
  string (Zeev, Zend Engine)</li>
<li>Fixed a problem in inheritance from classes that are defined in include()d
  files (Zeev, Zend Engine)</li>
<li>Fixed a problem with the PHP error handler that could result in a crash
  on certain operating systems (Zeev)</li>
<li>Apache php_flag values only recognized 'On' (case sensitive) - changed
  to case insensitive (Zeev)</li>
<li>Fixed a memory leak with switch statement containing return statements
  (Andi &amp; Zeev, Zend Engine)</li>
<li>Fixed a crash problem in switch statements that had a string offset
  as a conditional (Andi &amp; Zeev, Zend Engine)</li>
<li>Imported PHP 3.0 fixes for rand() and mt_rand() (Rasmus)</li>
<li>Added function entries for strip_tags() and similar_text() (Andrei)</li>
<li>Fixed a bug in WDDX that would cause a crash if a number was passed in
  instead of a variable name (Andrei)</li>
<li>Ported strtotime() function from PHP 3.0 (Andrei)</li>
<li>Merged in gdttf stuff from PHP 3.0 (Sascha)</li>
<li>buildconf now checks your installation (Stig)</li>
<li>XML module now built dynamically with --with-xml=shared (Stig)</li>
<li>Added a check for freetype.h - fixed build on RedHat 6.0 (Zeev)</li>
<li>Fixed array_walk() to work in PHP 4.0 (Andrei)</li>
<li>Ported all remaining date() format options from PHP 3.0 (Andrei)</li>
<li>$php_errormsg now works (Andrei)</li>
<li>Added locale support for Perl Compatible Regexp functions (Andrei)</li>
<li>Informix module ported (Danny)</li>
<li>Remove --with-shared-apache (Sascha)</li>
<li>Added patch for reverse lookup table in base64_decode (Sascha)
  Submitted by bfranklin@dct.com</li>
<li>Merged in PHP 3.0 version of str_replace (Sascha)</li>
<li>Added DBA module (Sascha)</li>
<li>Added session id detection within REQUEST_URI (Sascha)</li>
<li>Merged in HP-UX/ANSI compatibility switch from PHP 3.0 (Sascha)</li>
<li>Fixed rpath handling for utilitites built during Apache build (Sascha)</li>
<li>Added missing E_ error level constants (Zeev, Zend Engine)</li>
<li>Fixed a bug in sending multiple HTTP Cookies under Apache (Zeev)</li>
<li>Fixed implicit connect on the MySQL, mSQL, PostgreSQL and Sybase
  modules (Zeev)</li>
<li>Gave PHP 4.0's SNMP extension all the functionality of PHP 3.0.12 (SteveL)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="4.0b1">
<h3>Version 4.0 Beta 1</h3>
<?php release_date("19-Jul-1999"); ?>
<ul>
<li>First public beta of PHP 4.0</li>
</ul>

<?php site_footer(); ?>
