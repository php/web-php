<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ChangeLog-5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5 ChangeLog");
function bugfix($number) { echo "Fixed bug "; bugl($number); }
function bugl($number)   { echo "<a href=\"http://bugs.php.net/$number\">#$number</a>"; }
?>

<h1>PHP 5 ChangeLog</h1>
<a name="5.1.0"></a>
<h3>Version 5.1.0</h3>
<b>24-Nov-2005</b>
<ul>
<li>Added support for class constants and static members for internal classes.  (Dmitry, Michael Wallner)</li>
<li>Added "new_link" parameter to mssql_connect() (Bug <?php bugl(34369); ?>). (Frank)</li>
<li>Added missing safe_mode checks for image* functions and cURL. (Ilia)</li>
<li>Added missing safe_mode/open_basedir checks for file uploads. (Ilia)</li>
<li>Added PDO_MYSQL_ATTR_USE_BUFFERED_QUERY parameter for pdo_mysql. (Ilia)</li>
<li>Added date_timezone_set() function to set the timezone that the date  functions will use. (Derick)</li>
<li>Added pg_fetch_all_columns() function to fetch all values of a column from a  result cursor. (Ilia)</li>
<li>Added support for LOCK_EX flag for file_put_contents(). (Ilia)</li>
<li>Added bindto socket context option. (Ilia)</li>
<li>Added offset parameter to the stream_copy_to_stream() function. (Ilia)</li>
<li>Added offset &amp; length parameters to substr_count() function. (Ilia)</li>
<li>Added man pages for "phpize" and "php-config" scripts. (Jakub Vrana)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added PHP_INT_MAX and PHP_INT_SIZE as predefined constants. (Andrey)</li>
<li>Added user opcode API that allow overloading of opcode handlers. (Dmitry)</li>
<li>Added an optional remove old session parameter to session_regenerate_id(). (Ilia)</li>
<li>Added array type hinting. (Dmitry)</li>
<li>Added the tidy_get_opt_doc() function to return documentation for  configuration options in tidy. (Patch by: nlopess@php.net)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added imageconvolution() function which can be used to apply a custom 3x3  matrix convolution to an image. (Pierre)</li>
<li>Added optional first parameter to XsltProcessor::registerPHPFunctions to  only allow certain functions to be called from XSLT. (Christian)</li>
<li>Added the ability to override the autotools executables used by the  buildconf script via the PHP_AUTOCONF and PHP_AUTOHEADER environmental  variables. (Jon)</li>
<li>Added several new functions to support the PostgreSQL v3 protocol introduced  in PostgreSQL 7.4. (Christopher)
  <ul>
  <li>pg_transaction_status() - in-transaction status of a database connection.</li>
  <li>pg_query_params() - execution of parameterized queries.</li>
  <li>pg_prepare() - prepare named queries.</li>
  <li>pg_execute() - execution of named prepared queries.</li>
  <li>pg_send_query_params() - async equivalent of pg_query_params().</li>
  <li>pg_send_prepare() - async equivalent of pg_prepare().</li>
  <li>pg_send_execute() - async equivalent of pg_execute().</li>
  <li>pg_result_error_field() - highly detailed error information, most importantly the SQLSTATE error code.</li>
  <li>pg_set_error_verbosity() - set verbosity of errors.</li>
  </ul></li>
<li>Added optional fifth parameter "count" to preg_replace_callback() and  preg_replace() to count the number of replacements made. FR <?php bugl(32275); ?>. (Andrey)</li>
<li>Added optional third parameter "charlist" to str_word_count() which contains  characters to be considered as word part. FR <?php bugl(31560); ?>. (Andrey, Ilia)</li>
<li>Added interface Serializable. (Stanislav, Marcus)</li>
<li>Added pg_field_type_oid() PostgreSQL function. (mauroi at digbang dot com)</li>
<li>Added zend_declare_property_...() and zend_update_property_...() API  functions for bool, double and binary safe strings. (Hartmut)</li>
<li>Added possibility to access INI variables from within .ini file. (Andrei)</li>
<li>Added variable $_SERVER['REQUEST_TIME'] containing request start time. (Ilia)</li>
<li>Added optional float parameter to gettimeofday(). (Ilia)</li>
<li>Added apache_reset_timeout() Apache1 function. (Rasmus)</li>
<li>Added sqlite_fetch_column_types() 3rd argument for arrays. (Ilia)</li>
<li>Added optional offset parameter to stream_get_contents() and  file_get_contents(). (Ilia)</li>
<li>Added optional maxlen parameter to file_get_contents(). (Ilia)</li>
<li>Added SAPI hook to get the current request time. (Rasmus)</li>
<li>Added new functions:
  <ul>
  <li>array_diff_key() (Andrey)</li>
  <li>array_diff_ukey() (Andrey)</li>
  <li>array_intersect_key() (Christiano Duarte)</li>
  <li>array_intersect_ukey() (Christiano Duarte)</li>
  <li>array_product() (Andrey)</li>
  <li>DomDocumentFragment::appendXML() (Christian)</li>
  <li>fputcsv() (David Sklar)</li>
  <li>htmlspecialchars_decode() (Ilia)</li>
  <li>inet_pton() (Sara)</li>
  <li>inet_ntop() (Sara)</li>
  <li>mysqli::client_info property (Georg)</li>
  <li>posix_access() (Magnus)</li>
  <li>posix_mknod() (Magnus)</li>
  <li>SimpleXMLElement::registerXPathNamespace() (Christian)</li>
  <li>stream_context_get_default() (Wez)</li>
  <li>stream_socket_enable_crypto() (Wez)</li>
  <li>stream_wrapper_unregister() (Sara)</li>
  <li>stream_wrapper_restore() (Sara)</li>
  <li>stream_filter_remove() (Sara)</li>
  <li>time_sleep_until() (Ilia)</li>
  </ul></li>
<li>Added DomDocument::$recover property for parsing not well-formed XML  Documents. (Christian)   
<li>Added Cursor support for MySQL 5.0.x in mysqli (Georg)</li>
<li>Added proxy support to ftp wrapper via http. (Sara)</li>
<li>Added MDTM support to ftp_url_stat. (Sara)</li>
<li>Added zlib stream filter support. (Sara)</li>
<li>Added bz2 stream filter support. (Sara)</li>
<li>Added max_redirects context option that specifies how many HTTP  redirects to follow. (Ilia)</li>
<li>Added support of parameter=>value arrays to  xsl_xsltprocessor_set_parameter(). (Tony)</li>
<li>Improved PHP extension loading mechanism with support for module  dependencies and conflicts. (Jani, Dmitry)</li>
<li>Improved interactive mode of PHP CLI (php -a). (Johannes, Marcus)</li>
<li>Improved performance of:
  <ul>
  <li>general execution/compilation. (Andi, Thies, Sterling, Dmitry, Marcus)</li>
  <li>switch() statement. (Dmitry)</li>
  <li>several array functions. (Marcus)</li>
  <li>virtual path handling by adding a realpath() cache. (Andi)</li>
  <li>variable fetches. (Andi)</li>
  <li>magic method invocations. (Marcus)</li>
  </ul></li>
<li>Improved support for embedded server in mysqli. (Georg)</li>
<li>Improved mysqli extension. (Georg)</li>
  <ul>
  <li>added constructor for mysqli_stmt and mysqli_result classes</li>
  <li>added new function mysqli_get_charset()</li>
  <li>added new function mysqli_set_charset()</li>
  <li>added new class mysqli_driver</li>
  <li>added new class mysqli_warning</li>
  <li>added new class mysqli_exception</li>
  <li>added new class mysqli_sql_exception</li>
  </ul></li>
<li>Improved SPL extension. (Marcus)
  <ul>
  <li>Moved RecursiveArrayIterator from examples into extension</li>
  <li>Moved RecursiveFilterIterator from examples into extension</li>
  <li>Added SplObjectStorage</li>
  <li>Made all SPL constants class constants</li>
  <li>Renamed CachingRecursiveIterator to RecursiveCachingIterator to follow Recursive&lt;*&gt;Iterator naming scheme.</li>
  <li>added standard hierarchy of Exception classes</li>
  <li>added interface Countable</li>
  <li>added interfaces Subject and SplObserver</li>
  <li>added spl_autoload*() functions</li>
  <li>converted several 5.0 examples into c code</li>
  <li>added class SplFileObject</li>
  <li>added possibility to use a string with class_parents() and class_implements(). (Andrey)</li>
  </ul><li>
<li>Changed type hints to allow "null" as default value for class and array.  (Marcus, Derick, Dmitry)</li>
<li>Changed SQLite extension to be a shared module in Windows distribution. (Edin)</li>
<li>Changed "instanceof" and "catch" operators, is_a() and is_subclass_of()  functions to not call __autoload(). (Dmitry)</li>
<li>Changed sha1_file() and md5_file() functions to use streams instead of low level IO. (Uwe)</li>
<li>Changed abstract private methods to be not allowed anymore. (Stas)</li>
<li>Changed stream_filter_(ap|pre)pend() to return resource. (Sara)</li>
<li>Changed mysqli_exception and sqlite_exception to use RuntimeException as  base if SPL extension is present. (Georg, Marcus)</li>
<li>Upgraded bundled libraries:
  <ul>
  <li>PCRE library to version 6.2. (Andrei)</li>
  <li>SQLite 3 library in ext/pdo_sqlite to 3.2.7. (Ilia)</li>
  <li>SQLite 2 library in ext/sqlite to 2.8.16. (Ilia)</li>
  </ul></li>
<li>Upgraded bundled libraries in Windows distribution. (Edin)
  <ul>
  <li>zlib 1.2.3</li>
  <li>curl 7.14.0</li>
  <li>openssl 0.9.8</li>
  <li>ming 0.3b</li>
  <li>libpq (PostgreSQL) 8.0.1</li>
  </ul></li>
<li>Implemented feature request <?php bugl(33452); ?> (Year belonging to ISO week). (Derick)</li>
<li>Allowed return by reference from internal functions. (Marcus, Andi, Dmitry)</li>
<li>Rewrote strtotime() with support for timezones and many new formats.  Implements feature requests <?php bugl(21399); ?>, <?php bugl(26694); ?>, <?php bugl(28088); ?>, <?php bugl(29150); ?>, <?php bugl(29585); ?> and  <?php bugl(29595); ?>. (Derick)</li>
<li>Moved extensions to PECL:
  <ul>
  <li>ext/cpdf        (Tony, Derick)</li>
  <li>ext/dio         (Jani, Derick)</li>
  <li>ext/fam         (Jani, Derick)</li>
  <li>ext/ingres_ii   (Jani, Derick)</li>
  <li>ext/mnogosearch (Jani, Derick)</li>
  <li>ext/w32api      (Jani, Derick)</li>
  <li>ext/yp          (Jani, Derick)</li>
  <li>ext/mcve        (Jani, Derick, Pierre)</li>
  <li>ext/oracle      (Jani, Derick)</li>
  <li>ext/ovrimos     (Jani, Derick, Pierre)</li>
  <li>ext/pfpro       (Jani, Derick, Pierre)</li>
  <li>ext/dbx         (Jani, Derick)</li>
  <li>ext/ircg        (Jani, Derick)</li>
  </ul></li>
<li>Removed php_check_syntax() function which never worked properly. (Ilia)</li>
<li>Removed garbage manager in Zend Engine which results in more aggressive  freeing of data. (Dmitry, Andi)</li>
<li>Fixed "make test" to work for phpized extensions. (Hartmut, Jani)</li>
<li>Fixed Apache 2 regression with sub-request handling on non-linux systems. (Ilia, Tony)</li>
<li>Fixed PDO shutdown problem (possible infinite loop running rollback on  shutdown). (Wez)</li>
<li>Fixed PECL bug <?php bugl(3714); ?> (PDO: beginTransaction doesn't work if you're in  auto-commit mode). (Wez)</li>
<li>Fixed ZTS destruction. (Marcus)</li>
<li>Fixed __get/__set to allow recursive calls for different properties. (Dmitry)</li>
<li>Fixed a bug where stream_get_meta_data() did not return the "uri" element  for files opened with tmpname(). (Derick)</li>
<li>Fixed a problem with SPL iterators aggregating the inner iterator. (Marcus)</li>
<li>Fixed an error in mysqli_fetch_fields (returned NULL instead of an array  when row number &gt; field_count). (Georg)</li>
<li>Fixed bug in mysql::client_version(). (Georg)</li>
<li>Fixed bug in mysqli extension with unsigned int(11) being represented as  signed integer in PHP instead of string in 32bit systems. (Andrey)</li>
<li>Fixed bug with $HTTP_RAW_POST_DATA not getting set. (Brian)</li>
<li>Fixed crash inside stream_get_line() when length parameter equals 0. (Ilia)</li>
<li>Fixed ext/mysqli to allocate less memory when fetching bound params of type (MEDIUM|LONG)BLOB/(MEDIUM|LONG)TEXT. (Andrey)</li>
<li>Fixed extension initialization to respect dependencies between extensions. (Wez)</li>
<li>Fixed failing queries (FALSE returned) with mysqli_query() on 64 bit systems. (Andrey)</li>
<li>Fixed fgetcsv() and fputcsv() inconsistency. (Dmitry)</li>
<li>Fixed inheritance check to control return by reference and pass by  reference correctly (ArrayAccess can no longer support references correctly). (Marcus, Andi, Dmitry)</li>
<li>Fixed initializing and argument checking for posix_mknod(). (Derick)</li>
<li>Fixed memory corruption in ImageTTFText() with 64bit systems. (Andrey)</li>
<li>Fixed memory corruption in pg_copy_from() in case the as_null parameter was passed. (Derick)</li>
<li>Fixed memory corruption in stristr(). (Derick)</li>
<li>Fixed possible GLOBALS variable override when register_globals are ON. (Ilia, Stefan)</li>
<li>Fixed possible INI setting leak via virtual() in Apache 2 sapi. (Ilia)</li>
<li>Fixed possible register_globals toggle via parse_str(). (Ilia, Stefan)</li>
<li>Fixed potential GLOBALS overwrite via import_request_variables() and  possible crash and/or memory corruption. (Ilia)</li>
<li>Fixed segfaults when CURL callback functions throw exception. (Tony)</li>
<li>Fixed support for shared extensions on AIX. (Dmitry)</li>
<li><?php bugfix(35342); ?> (isset(DOMNodeList->length) returns false). (Rob)</li>
<li><?php bugfix(35341); ?> (Fix for bug <?php bugl(33760); ?> breaks build with older curl). (Tony)</li>
<li><?php bugfix(35336); ?> (crash on PDO::FETCH_CLASS + __set()). (Tony)</li>
<li><?php bugfix(35303); ?> (PDO prepare() crashes with invalid parameters). (Ilia)</li>
<li><?php bugfix(35293); ?> (PDO segfaults when using persistent connections). (Tony)</li>
<li><?php bugfix(35278); ?> (Multiple virtual() calls crash Apache 2 php module). (Ilia)</li>
<li><?php bugfix(35273); ?> (Error in mapping soap - java types). (Dmitry)</li>
<li><?php bugfix(35249); ?> (compile failure when ext/readline is compiled as shared). (Jani)</li>
<li><?php bugfix(35248); ?> (sqlite_query() doesn't set error_msg when return value is  being used). (Ilia) 
<li><?php bugfix(35243); ?> (php_mblen() crashes when compiled with thread-safety on  Linux). (Patch: shulmanb at il dot ibm dot com, Jani)</li>
<li><?php bugfix(35239); ?> (Objects can lose references). (Dmitry)</li>
<li><?php bugfix(35229); ?> (call_user_func() crashes when argument_stack is nearly  full). (Dmitry)</li>
<li><?php bugfix(35197); ?> (Destructor is not called). (Tony)</li>
<li><?php bugfix(35179); ?> (tokenizer extension needs T_HALT_COMPILER). (Greg)</li>
<li><?php bugfix(35176); ?> (include()/require()/*_once() produce wrong error messages  about main()). (Dmitry)</li>
<li><?php bugfix(35147); ?> (__HALT_COMPILER() breaks with --enable-zend-multibyte). (Dmitry, Moriyoshi)</li>
<li><?php bugfix(35143); ?> (gettimeofday() ignores current time zone). (Derick)</li>
<li><?php bugfix(35142); ?> (SOAP Client/Server Complex Object Support). (Dmitry)</li>
<li><?php bugfix(35135); ?> (PDOStatment without related PDO object may crash). (Ilia)</li>
<li><?php bugfix(35091); ?> (SoapClient leaks memory). (Dmitry)</li>
<li><?php bugfix(35079); ?> (stream_set_blocking(true) toggles, not enables blocking). (askalski at gmail dot com, Tony)</li>
<li><?php bugfix(35078); ?> (configure does not find ldap_start_tls_s). (Jani)</li>
<li><?php bugfix(35046); ?> (phpinfo() uses improper css enclosure). (Ilia)</li>
<li>Fixed bugs <?php bugl(35022); ?>, <?php bugl(35019); ?> (Regression in the behavior of key() and  current() functions). (Ilia)</li>
<li><?php bugfix(35017); ?> (Exception thrown in error handler may cause unexpected  behavior). (Dmitry)</li>
<li><?php bugfix(35014); ?> (array_product() always returns 0). (Ilia)</li>
<li><?php bugfix(35009); ?> (ZTS: Persistent resource destruct crashes when extension  is compiled as shared). (Dmitry)</li>
<li><?php bugfix(34996); ?> (ImageTrueColorToPalette() crashes when ncolors is zero). (Tony)</li>
<li><?php bugfix(34982); ?> (array_walk_recursive() modifies elements outside function scope). (Dmitry)</li>
<li><?php bugfix(34977); ?> (Compile failure on MacOSX due to use of varargs.h). (Tony)</li>
<li><?php bugfix(34968); ?> (bz2 extension fails on to build on some win32 setups). (Ilia)</li>
<li><?php bugfix(34965); ?> (tidy is not binary safe). (Mike)</li>
<li><?php bugfix(34957); ?> (PHP doesn't respect ACLs for access checks). (Wez)</li>
<li><?php bugfix(34950); ?> (Unable to get WSDL through proxy). (Dmitry)</li>
<li><?php bugfix(34938); ?> (dns_get_record() doesn't resolve long hostnames and  leaks). (Tony)</li>
<li><?php bugfix(34905); ?> (Digest authentication does not work with Apache 1). (Ilia)</li>
<li><?php bugfix(34902); ?> (mysqli::character_set_name() - undefined method). (Tony)</li>
<li><?php bugfix(34899); ?> (Fixed sqlite extension compile failure). (Ilia)</li>
<li><?php bugfix(34893); ?> (PHP5.1 overloading, Cannot access private property). (Dmitry)</li>
<li><?php bugfix(34884); ?> (Possible crash in ext/sqlite when sqlite.assoc_case is  being used). (Tony, Ilia)</li>
<li><?php bugfix(34879); ?> (str_replace, array_map corrupt negative array indexes on  64-bit platforms). (Dmitry)</li>
<li><?php bugfix(34873); ?> (Segmentation Fault on foreach in object). (Dmitry)</li>
<li><?php bugfix(34856); ?> (configure fails to detect libiconv's type). (Tony)</li>
<li><?php bugfix(34855); ?> (ibase_service_attach() segfault on AMD64).  (irie at gmx dot de, Tony)</li>
<li><?php bugfix(34851); ?> (SO_RECVTIMEO and SO_SNDTIMEO socket options expect  integer parameter on Windows). (Mike)</li>
<li><?php bugfix(34850); ?> (--program-suffix and --program-prefix not included in  man page names). (Jani)</li>
<li><?php bugfix(34821); ?> (zlib encoders fail on widely varying binary data on  windows). (Mike, Ilia)</li>
<li><?php bugfix(34818); ?> (several functions crash when invalid mysqli_link object  is passed). (Tony)</li>
<li><?php bugfix(34810); ?> (mysqli::init() and others use wrong $this pointer without  checks). (Tony)</li>
<li><?php bugfix(34809); ?> (FETCH_INTO in PDO crashes without a destination object). (Ilia)</li>
<li><?php bugfix(34802); ?> (Fixed crash on object instantiation failure). (Ilia)</li>
<li><?php bugfix(34796); ?> (missing SSL linking in ext/ftp when configured as shared). (Jani)</li>
<li><?php bugfix(34790); ?> (preg_match_all(), named capturing groups, variable  assignment/return =&gt; crash). (Dmitry)</li>
<li><?php bugfix(34788); ?> (SOAP Client not applying correct namespace to generated  values). (Dmitry)</li>
<li><?php bugfix(34787); ?> (SOAP Client not handling boolean types correctly). (Dmitry)</li>
<li><?php bugfix(34786); ?> (2 @ results in change to error_reporting() to random  value) (Dmitry, Tony)</li>
<li><?php bugfix(34785); ?> (subclassing of mysqli_stmt does not work). (Georg)</li>
<li><?php bugfix(34782); ?> (token_get_all() gives wrong result). (Dmitry)</li>
<li><?php bugfix(34777); ?> (Crash in dblib when fetching non-existent error info). (Ilia)</li>
<li><?php bugfix(34771); ?> (strtotime() fails with 1-12am/pm). (Derick)</li>
<li><?php bugfix(34767); ?> (Zend Engine 1 Compatibility not copying objects  correctly). (Dmitry)</li>
<li><?php bugfix(34758); ?> (PDO_DBLIB did not implement rowCount()). (Ilia)</li>
<li><?php bugfix(34757); ?> (iconv_substr() gives "Unknown error" when offset &gt; string length). (Tony)</li>
<li><?php bugfix(34742); ?> (ftp wrapper failures caused from segmented command  transfer). (Ilia)</li>
<li><?php bugfix(34725); ?> (CLI segmentation faults during cleanup). (Dmitry)</li>
<li><?php bugfix(34723); ?> (array_count_values() strips leading zeroes). (Tony)</li>
<li><?php bugfix(34712); ?> (zend.ze1_compatibility_mode = on segfault). (Dmitry)</li>
<li><?php bugfix(34704); ?> (Infinite recursion due to corrupt JPEG). (Marcus)</li>
<li><?php bugfix(34678); ?> (__call(), is_callable() and static methods). (Dmitry)</li>
<li><?php bugfix(34676); ?> (missing support for strtotime("midnight") and  strtotime("noon")). (Derick)</li>
<li><?php bugfix(34645); ?> (ctype corrupts memory when validating large numbers). (Ilia)</li>
<li><?php bugfix(34643); ?> (wsdl default value has no effect). (Dmitry)</li>
<li><?php bugfix(34623); ?> (Crash in pdo_mysql on longtext fields). (Ilia)</li>
<li><?php bugfix(34617); ?> (zend_deactivate: objects_store used after  zend_objects_store_destroy is called). (Dmitry)</li>
<li><?php bugfix(34590); ?> (User defined PDOStatement class can't implement  methods). (Marcus)</li>
<li><?php bugfix(34584); ?> (Segfault with SPL autoload handler). (Marcus)</li>
<li><?php bugfix(34581); ?> (crash with mod_rewrite). (Tony, Ilia)</li>
<li><?php bugfix(34565); ?> (mb_send_mail does not fetch  mail.force_extra_parameters). (Marco, Ilia)</li>
<li><?php bugfix(34557); ?> (php -m exits with "error" 1). (Johannes)</li>
<li><?php bugfix(34518); ?> (Unset doesn't separate container in CV). (Dmitry)</li>
<li><?php bugfix(34505); ?> (Possible memory corruption when unmangling properties  with empty names). (Tony)</li>
<li><?php bugfix(34478); ?> (Incorrect parsing of url's fragment (#...)). (Dmitry)</li>
<li><?php bugfix(34467); ?> (foreach + __get + __set inconsistency). (Dmitry)</li>
<li><?php bugfix(34456); ?> (Possible crash inside pspell extension). (Ilia)</li>
<li><?php bugfix(34453); ?> (parsing http://www.w3.org/2001/xml.xsd exception). (Dmitry)</li>
<li><?php bugfix(34450); ?> (Segfault when calling mysqli_close() in destructor). (Tony)</li>
<li><?php bugfix(34449); ?> (ext/soap: XSD_ANYXML functionality not exposed). (Dmitry)</li>
<li><?php bugfix(34420); ?> (Possible crash inside curl_multi_remove_handle()). (Ilia)</li>
<li><?php bugfix(34358); ?> (Fatal error: Cannot re-assign $this). (Dmitry)</li>
<li><?php bugfix(34331); ?> (php crashes when variables_order is empty). (Ilia)</li>
<li><?php bugfix(34321); ?> (Possible crash in filter code). (Ilia)</li>
<li><?php bugfix(34311); ?> (unserialize() crashes with chars above 191 dec). (Nuno)</li>
<li><?php bugfix(34310); ?> (foreach($arr as $c->d =&gt; $x) crashes). (Dmitry)</li>
<li><?php bugfix(34307); ?> (on_modify handler not called to set the default value if  setting from php.ini was invalid). (Andrei)     
<li><?php bugfix(34306); ?> (wddx_serialize_value() crashes with long array keys). (Jani)</li>
<li><?php bugfix(34304); ?> (date() doesn't have a modifier for ISO Week Day). (Derick)</li>
<li><?php bugfix(34302); ?> (date('W') do not return leading zeros for week 1 to 9).  (Derick)</li>
<li><?php bugfix(34299); ?> (ReflectionClass::isInstantiable() returns true for abstract classes). (Marcus)</li>
<li><?php bugfix(34284); ?> (CLI phpinfo showing html on _SERVER["argv"]). (Jani)</li>
<li><?php bugfix(34277); ?> (array_filter() crashes with references and objects).  (Dmitry)</li>
<li><?php bugfix(34276); ?> (setAttributeNS doesn't work with default namespace). (Rob)</li>
<li><?php bugfix(34260); ?> (Segfault with callbacks (array_map) + overloading). (Dmitry)</li>
<li><?php bugfix(34257); ?> (lib64 not handled correctly in ming extension). (Marcus)</li>
<li><?php bugfix(34221); ?> (Compiling xmlrpc as shared fails other parts). (Jani)</li>
<li><?php bugfix(34216); ?> (Segfault with autoload). (Marcus)</li>
<li><?php bugfix(34199); ?> (if($obj)/if(!$obj) inconsistency because of cast handler). (Dmitry, Alex)</li>
<li><?php bugfix(34191); ?> (ob_gzhandler does not enforce trailing \0). (Ilia)</li>
<li><?php bugfix(34156); ?> (memory usage remains elevated after memory limit is  reached). (Ilia)</li>
<li><?php bugfix(34148); ?> (+,- and . not supported as parts of scheme). (Ilia)</li>
<li><?php bugfix(34137); ?> (assigning array element by reference causes binary mess). (Dmitry) 
<li><?php bugfix(34103); ?> (line numbering not maintained in dom document). (Rob)</li>
<li><?php bugfix(34078); ?> (Reflection API problems in methods with boolean or  null default values). (Tony)</li>
<li><?php bugfix(34068); ?> (Numeric string as array key not cast to integer in  wddx_deserialize()). (Ilia)</li>
<li><?php bugfix(34064); ?> (arr[] as param to function in class gives invalid  opcode). (Dmitry)</li>
<li><?php bugfix(34062); ?> (Crash in catch block when many arguments are used). (Dmitry)</li>
<li><?php bugfix(34052); ?> (date('U') returns %ld not unix timestamp). (Nuno)</li>
<li><?php bugfix(34045); ?> (Buffer overflow with serialized object). (Dmitry)</li>
<li><?php bugfix(34001); ?> (pdo_mysql truncates numeric fields at 4 chars). (Ilia)</li>
<li><?php bugfix(33999); ?> (object remains object when cast to int). (Dmitry)</li>
<li><?php bugfix(33996); ?> (No information given for fatal error on passing invalid  value to typed argument). (Dmitry)</li>
<li><?php bugfix(33989); ?> (extract($GLOBALS,EXTR_REFS) crashes PHP). (Dmitry)</li>
<li><?php bugfix(33987); ?> (php script as ErrorDocument causes crash in Apache 2).  (Ilia)</li>
<li><?php bugfix(33967); ?> (misuse of Exception constructor doesn't display  errorfile). (Jani)</li>
<li><?php bugfix(33966); ?> (Wrong use of reflectionproperty causes a segfault). (Tony)</li>
<li><?php bugfix(33963); ?> (mssql_bind() fails on input parameters). (Frank)</li>
<li><?php bugfix(33958); ?> (duplicate cookies and magic_quotes=off may cause a crash). (Ilia)</li>
<li><?php bugfix(33957); ?> (gmdate('W')/date('W') sometimes returns wrong week number). (Derick)</li>
<li><?php bugfix(33940); ?> (array_map() fails to pass by reference when called  recursively). (Dmitry)</li>
<li><?php bugfix(33917); ?> (number_format() output with &gt; 1 char separators). (Jani)</li>
<li><?php bugfix(33904); ?> (input array keys being escaped when magic quotes is off). (Ilia)</li>
<li><?php bugfix(33903); ?> (spl_autoload_register class method). (Marcus)</li>
<li><?php bugfix(33899); ?> (CLI: setting extension_dir=some/path extension=foobar.so  does not work). (Jani)</li>
<li><?php bugfix(33882); ?> (CLI was looking for php.ini in wrong path). (Hartmut)</li>
<li><?php bugfix(33869); ?> (strtotime() problem with "+1days" format). (Ilia) 
<li><?php bugfix(33841); ?> (pdo sqlite driver forgets to update affected column  count on execution of prepared statments). (Ilia)</li>
<li><?php bugfix(33837); ?> (Informix ESQL version numbering schema changed). (Jani)</li>
<li><?php bugfix(33829); ?> (mime_content_type() returns text/plain for gzip and bzip  files). (Derick)</li>
<li><?php bugfix(33802); ?> (throw Exception in error handler causes crash). (Dmitry)</li>
<li><?php bugfix(33771); ?> (error_reporting falls to 0 when @ was used inside  try/catch block). (Tony)</li>
<li><?php bugfix(33760); ?> (cURL needs to implement CRYPTO_callback functions to  prevent locking). (Mike, Ilia)</li>
<li><?php bugfix(33732); ?> (Wrong behavior of constants in class and interface  extending). (Dmitry)</li>
<li><?php bugfix(33723); ?> (php_value overrides php_admin_value). (Dmitry)</li>
<li><?php bugfix(33720); ?> (mb_encode_mimeheader does not work for multibyte  chars). (Rui)</li>
<li><?php bugfix(33710); ?> (ArrayAccess objects does not initialize $this). (Dmitry)</li>
<li><?php bugfix(33690); ?> (Crash setting some ini directives in httpd.conf). (Rasmus)</li>
<li><?php bugfix(33673); ?> (Added detection for partially uploaded files). (Ilia)</li>
<li><?php bugfix(33605); ?> (substr_compare() crashes with negative offset and length). (Tony)</li>
<li><?php bugfix(33597); ?> (setcookie() "expires" date format doesn't comply with RFC). (Tony)</li>
<li><?php bugfix(33588); ?> (LDAP: RootDSE query not possible). (Jani)</li>
<li><?php bugfix(33578); ?> (strtotime() problem with "Oct17" format). (Derick)</li>
<li><?php bugfix(33578); ?> (strtotime() doesn't understand "11 Oct" format). (Derick)</li>
<li><?php bugfix(33562); ?> (date("") crashes). (Derick)</li>
<li><?php bugfix(33558); ?> (warning with nested calls to functions returning by  reference). (Dmitry)</li>
<li><?php bugfix(33536); ?> (strtotime() defaults to now even on non time string). (Derick)</li>
<li><?php bugfix(33532); ?> (Different output for strftime() and date()). (Derick)</li>
<li><?php bugfix(33523); ?> (Memory leak in xmlrpc_encode_request()). (Ilia)</li>
<li><?php bugfix(33520); ?> (crash if safe_mode is on and session.save_path is changed). (Dmitry)</li>
<li><?php bugfix(33512); ?> (Add missing support for isset()/unset() overloading to  complement the property get/set methods). (Dmitry)</li>
<li><?php bugfix(33491); ?> (crash after extending MySQLi internal class). (Tony)</li>
<li><?php bugfix(33475); ?> (cURL handle is not closed on curl_close(). (Ilia)</li>
<li><?php bugfix(33469); ?> (Compile error undefined reference to ifx_checkAPI). (Jani)</li>
<li><?php bugfix(33433); ?> (strtoll not available on Tru64). (Jani, Derick)</li>
<li><?php bugfix(33427); ?> (ext/odbc: check if unixODBC header file exists). (Jani)</li>
<li><?php bugfix(33415); ?> (strtotime() related bugs). (Derick)</li>
<li><?php bugfix(33414); ?> (Comprehensive list of incorrect days returned after  strtotime() / date() tests). (Derick)</li>
<li><?php bugfix(33389); ?> (double free() when exporting a ReflectionClass). (Marcus)</li>
<li><?php bugfix(33383); ?> (crash when retrieving empty LOBs). (Tony)</li>
<li><?php bugfix(33382); ?> (array_reverse() fails after *sort()),  introduced by  zend_hash_sort() optimizations in HEAD. (Tony)</li>
<li><?php bugfix(33340); ?> (CLI Crash when calling php:function from XSLT). (Rob)</li>
<li><?php bugfix(33326); ?> (Cannot build extensions with phpize on Macosx). (Jani)</li>
<li><?php bugfix(33318); ?> (throw 1; results in Invalid opcode 108/1/8). (Dmitry)</li>
<li><?php bugfix(33312); ?> (ReflectionParameter methods do not work correctly). (Dmitry)</li>
<li><?php bugfix(33299); ?> (php:function no longer handles returned dom objects).  (Rob, Joe Orton)</li>
<li><?php bugfix(33286); ?> (nested array_walk() calls and user array compare functions broken; FCI cache). (Andrei, patch from m.bretz@metropolis-ag.de)</li>
<li><?php bugfix(33277); ?> (private method accessed by child class). (Dmitry)</li>
<li><?php bugfix(33268); ?> (iconv_strlen() works only with a parameter of &lt; 3 in length). (Ilia)</li>
<li><?php bugfix(33257); ?> (array_splice() inconsistent when passed function instead of variable). (Dmitry)</li>
<li><?php bugfix(33243); ?> (ze1_compatibility_mode does not work as expected). (Dmitry)</li>
<li><?php bugfix(33242); ?> (Mangled error message when stream fails). (Derick)</li>
<li><?php bugfix(33222); ?> (segfault when CURL handle is closed in a callback). (Tony)</li>
<li><?php bugfix(33214); ?> (odbc_next_result does not signal SQL errors with  2-statement SQL batches). (rich at kastle dot com, Tony)</li>
<li><?php bugfix(33212); ?> ([GCC 4]: 'zend_error_noreturn' aliased to external symbol  'zend_error'). (Dmitry)</li>
<li><?php bugfix(33210); ?> (relax jpeg recursive loop protection). (Ilia)</li>
<li><?php bugfix(33201); ?> (Crash when fetching some data types). (Frank)</li>
<li><?php bugfix(33200); ?> (preg_replace(): magic_quotes_sybase=On makes 'e' modifier  misbehave). (Jani)</li>
<li><?php bugfix(33185); ?> (--enable-session=shared does not build). (Jani)</li>
<li><?php bugfix(33171); ?> (foreach enumerates private fields declared in base  classes). (Dmitry)</li>
<li><?php bugfix(33167); ?> (Possible crash inside pg_fetch_array()). (Ilia)</li>
<li><?php bugfix(33164); ?> (Soap extension incorrectly detects HTTP/1.1). (Ilia)</li>
<li><?php bugfix(33156); ?> (cygwin version of setitimer doesn't accept ITIMER_PROF). (Nuno)</li>
<li><?php bugfix(33153); ?> (crash in mssql_next result). (Frank)</li>
<li><?php bugfix(33150); ?> (shtool: insecure temporary file creation). (Jani)</li>
<li><?php bugfix(33136); ?> (method offsetSet in class extended from ArrayObject crash PHP). (Marcus)</li>
<li><?php bugfix(33125); ?> (imagecopymergegray() produces mosaic rainbow effect).  (Pierre)</li>
<li><?php bugfix(33116); ?> (crash when assigning class name to global variable in  __autoload). (Dmitry)</li>
<li><?php bugfix(33090); ?> (mysqli_prepare() doesn't return an error). (Georg)</li>
<li><?php bugfix(33076); ?> (str_ireplace() incorrectly counts result string length and may cause segfault). (Tony)</li>
<li><?php bugfix(33072); ?> (Add a safemode/open_basedir check for runtime  "session.save_path" change using session_save_path() function). (Rasmus)</li>
<li><?php bugfix(33070); ?> (Improved performance of bzdecompress() by several orders  of magnitude). (Ilia)</li>
<li><?php bugfix(33059); ?> (crash when moving xml attribute set in dtd). (Ilia)</li>
<li><?php bugfix(33057); ?> (Don't send extraneous entity-headers on a 304 as per  RFC 2616 section 10.3.5) (Rasmus, Choitel)</li>
<li><?php bugfix(33019); ?> (socket errors cause memory leaks in php_strerror()). (jwozniak23 at poczta dot onet dot pl, Tony).
<li><?php bugfix(33017); ?> ("make distclean" gives an error with VPATH build). (Jani)</li>
<li><?php bugfix(33013); ?> ("next month" was handled wrong while parsing dates).  (Derick)</li>
<li><?php bugfix(32993); ?> (implemented Iterator function current() don't throw  exception). (Dmitry)</li>
<li><?php bugfix(32981); ?> (ReflectionMethod::getStaticVariables() causes apache2.0.54 seg fault). (Dmitry)</li>
<li><?php bugfix(32956); ?> (mysql_bind_result() doesn't support MYSQL_TYPE_NULL).  (Georg)</li>
<li><?php bugfix(32947); ?> (Incorrect option for mysqli default password). (Georg)</li>
<li><?php bugfix(32944); ?> (Disabling session.use_cookies doesn't prevent reading  session cookies). (Jani, Tony)</li>
<li><?php bugfix(32941); ?> (Sending structured SOAP fault kills a php). (Dmitry)</li>
<li><?php bugfix(32937); ?> (open_basedir looses trailing / in the limiter). (Adam Conrad)</li>
<li><?php bugfix(32936); ?> (http redirects URLs are not checked for control chars). (Ilia)</li>
<li><?php bugfix(32933); ?> (Cannot extend class "SQLiteDatabase"). (Marcus)</li>
<li><?php bugfix(32932); ?> (Oracle LDAP: ldap_get_entries(), invalid pointer). (Jani)</li>
<li><?php bugfix(32930); ?> (class extending DOMDocument doesn't clone properly). (Rob)</li>
<li><?php bugfix(32924); ?> (file included with "auto_prepend_file" can be included  with require_once() or include_once()). (Stas)</li>
<li><?php bugfix(32904); ?> (pg_get_notify() ignores result_type parameter). (Tony)</li>
<li><?php bugfix(32852); ?> (Crash with singleton and __destruct when  zend.ze1_compatibility_mode = On). (Dmitry)</li>
<li><?php bugfix(32833); ?> (Invalid opcode). (Dmitry)</li>
<li><?php bugfix(32813); ?> (parse_url() does not handle scheme-only urls properly). (Ilia)</li>
<li><?php bugfix(32810); ?> (temporary files not using plain file wrapper). (Ilia)</li>
<li><?php bugfix(32809); ?> (Missing T1LIB support on Windows). (Edin)</li>
<li><?php bugfix(32802); ?> (General cookie overrides more specific cookie). (Ilia)</li>
<li>Fixed bugs <?php bugl(32800); ?>, <?php bugl(32830); ?> (ext/odbc: Problems with 64bit systems). (Jani)</li>
<li><?php bugfix(32799); ?> (crash: calling the corresponding global var during the  destruct). (Dmitry)</li>
<li><?php bugfix(32776); ?> (SOAP doesn't support one-way operations). (Dmitry)</li>
<li><?php bugfix(32773); ?> (GMP functions break when second parameter is 0). (Stas)</li>
<li><?php bugfix(32759); ?> (incorrect determination of default value (COM)). (Wez)</li>
<li><?php bugfix(32758); ?> (Cannot access safearray properties in VB6 objects). (Wez)</li>
<li><?php bugfix(32755); ?> (Segfault in replaceChild() when DocumentFragment has no  children). (Rob)</li>
<li><?php bugfix(32753); ?> (Undefined constant SQLITE_NOTADB). (Ilia)</li>
<li><?php bugfix(32742); ?> (segmentation fault when the stream with a wrapper is not closed). (Tony, Dmitry)</li>
<li><?php bugfix(32699); ?> (pg_affected_rows() was defined when it was not available). (Derick)</li>
<li><?php bugfix(32686); ?> (Require/include file in destructor causes segfault). (Marcus)</li>
<li><?php bugfix(32682); ?> (ext/mssql: Error on module shutdown when called from  activescript). (Frank)</li>
<li><?php bugfix(32674); ?> (exception in iterator causes crash). (Dmitry)</li>
<li><?php bugfix(32660); ?> (Assignment by reference causes crash when field access is  overloaded (__get)). (Dmitry)</li>
<li><?php bugfix(32647); ?> (Using register_shutdown_function() with invalid callback  can crash PHP). (Jani)</li>
<li><?php bugfix(32615); ?> (Segfault in replaceChild() using fragment when  previousSibling is NULL). (Rob)</li>
<li><?php bugfix(32613); ?> (ext/snmp: use of snmp_shutdown() causes snmpapp.conf  access errors). (Jani, ric at arizona dot edu)</li>
<li><?php bugfix(32608); ?> (html_entity_decode() converts single quotes even if  ENT_NOQUOTES is given). (Ilia)</li>
<li><?php bugfix(32596); ?> (Segfault/Memory Leak by getClass (etc) in __destruct). (Dmitry)</li>
<li><?php bugfix(32591); ?> (ext/mysql: Unsatisfied symbol: ntohs with HP-UX). (Jani)</li>
<li><?php bugfix(32589); ?> (possible crash inside imap_mail_compose() function). (Ilia)</li>
<li><?php bugfix(32589); ?> (Possible crash inside imap_mail_compose, with charsets). (Ilia)</li>
<li><?php bugfix(32587); ?> (Apache2: errors sent to error_log do not include  timestamps). (Jani)</li>
<li><?php bugfix(32560); ?> (configure looks for incorrect db2 library). (Tony)</li>
<li><?php bugfix(32553); ?> (mmap loads only the 1st 2000000 bytes on Win32). (Ilia)</li>
<li><?php bugfix(32533); ?> (proc_get_status() returns the incorrect process status). (Ilia)</li>
<li><?php bugfix(32530); ?> (chunk_split() does not append endstr if chunklen is longer then the original string). (Ilia)</li>
<li><?php bugfix(32491); ?> (File upload error - unable to create a temporary file). (Uwe Schindler)</li>
<li><?php bugfix(32455); ?> (wrong setting property to unset value). (Dmitry)</li>
<li><?php bugfix(32429); ?> (method_exists() always return TRUE if __call method  exists). (Dmitry)</li>
<li><?php bugfix(32428); ?> (The @ warning error suppression operator is broken). (Dmitry)</li>
<li><?php bugfix(32427); ?> (Interfaces are not allowed 'static' access modifier). (Dmitry)</li>
<li><?php bugfix(32405); ?> (mysqli::fetch() returns bad data - 64bit problem). (Andrey)</li>
<li><?php bugfix(32296); ?> (get_class_methods() output has changed between 5.0.2 and  5.0.3). (Dmitry)</li>
<li><?php bugfix(32282); ?> (Segfault in mysqli_fetch_array on 64-bit). (Georg)</li>
<li><?php bugfix(32245); ?> (xml_parser_free() in a function assigned to the xml  parser gives a segfault). (Rob)</li>
<li><?php bugfix(32179); ?> (xmlrpc_encode() segfaults with recursive references). (Tony)</li>
<li><?php bugfix(32171); ?> (Userspace stream wrapper crashes PHP). (Tony, Dmitry)</li>
<li><?php bugfix(32160); ?> (copying a file into itself leads to data loss). (Ilia)</li>
<li><?php bugfix(32139); ?> (SOAP client does not auto-handle base64 encoding). (Ilia)</li>
<li><?php bugfix(32109); ?> ($_POST is not populated in multi-threaded environment).  (Moriyoshi)</li>
<li><?php bugfix(32080); ?> (segfault when assigning object to itself with  zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(32021); ?> (Crash caused by range('', 'z')). (Derick)</li>
<li><?php bugfix(32013); ?> (ext/mysqli bind_result causes fatal error: memory limit). (Andrey)</li>
<li><?php bugfix(32010); ?> (Memory leak in mssql_fetch_batch). (fmk)</li>
<li><?php bugfix(32009); ?> (crash when mssql_bind() is called more than once). (Frank)</li>
<li><?php bugfix(31971); ?> (ftp_login fails on some SSL servers). (frantisek at augusztin dot com)</li>
<li><?php bugfix(31887); ?> (ISAPI: Custom 5xx error does not return correct HTTP  response message). (Jani)</li>
<li><?php bugfix(31828); ?> (Crash with zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(31668); ?> (multi_query works exactly every other time - multi query  d/e flag global and not per connection). (Andrey)</li>
<li><?php bugfix(31636); ?> (another crash when echoing a COM object). (Wez)</li>
<li><?php bugfix(31583); ?> (php_std_date() uses short day names in non-y2k_compliance mode). (mike at php dot net)</li>
<li><?php bugfix(31525); ?> (object reference being dropped. $this getting lost). (Stas, Dmitry)</li>
<li><?php bugfix(31502); ?> (Wrong deserialization from session when using WDDX  serializer). (Dmitry) 
<li><?php bugfix(31478); ?> (segfault with empty() / isset()). (Moriyoshi)</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31363); ?> (broken non-blocking flock()). (ian at snork dot net)</li>
<li><?php bugfix(31358); ?> (Older GCC versions do not provide portable va_copy()). (Jani)</li>
<li><?php bugfix(31341); ?> (escape on curly inconsistent). (Dmitry)</li>
<li><?php bugfix(31256); ?> (PHP_EVAL_LIBLINE configure macro does not handle  -pthread). (Jani)</li>
<li><?php bugfix(31213); ?> (Side effects caused by fix of bug <?php bugl(29493); ?>). (Dmitry)</li>
<li><?php bugfix(31177); ?> (memory leaks and corruption because of incorrect  refcounting). (Dmitry)</li>
<li><?php bugfix(31158); ?> (array_splice on $GLOBALS crashes). (Dmitry)</li>
<li><?php bugfix(31054); ?> (safe_mode &amp; open_basedir checks only check first   include_path value). (Ilia)</li>
<li><?php bugfix(31033); ?> (php:function(string, nodeset) with xsl:key crashes PHP). (Rob)</li>
<li><?php bugfix(30961); ?> (Wrong line number in ReflectionClass getStartLine()). (Dmitry)</li>
<li><?php bugfix(30889); ?> (Conflict between __get/__set and ++ operator). (Dmitry)</li>
<li><?php bugfix(30833); ?> (array_count_values() modifying input array). (Tony)</li>
<li><?php bugfix(30828); ?> (debug_backtrace() reports incorrect class in overridden  methods). (Dmitry)</li>
<li><?php bugfix(30820); ?> (static member conflict with $this->member silently  ignored). (Dmitry)</li>
<li><?php bugfix(30819); ?> (Better support for LDAP SASL bind). (Jani)</li>
<li><?php bugfix(30791); ?> (magic methods (__sleep/__wakeup/__toString) call  __call if object is overloaded). (Dmitry)</li>
<li><?php bugfix(30707); ?> (Segmentation fault on exception in method).  (Stas, Dmitry)</li>
<li><?php bugfix(30702); ?> (cannot initialize class variable from class constant).  (Dmitry)</li>
<li><?php bugfix(30578); ?> (Output buffers flushed before calling __destruct()  functions). (Jani)</li>
<li><?php bugfix(30519); ?> (Interface not existing says Class not found). (Dmitry)</li>
<li><?php bugfix(30407); ?> (Strange behavior of default arguments). (Dmitry)</li>
<li><?php bugfix(30394); ?> (Assignment operators yield wrong result with __get/__set). (Dmitry)</li>
<li><?php bugfix(30332); ?> (zend.ze1_compatibility_mode isn't fully compatible with  array_push()). (Dmitry)</li>
<li><?php bugfix(30162); ?> (Catching exception in constructor causes lose of  $this). (Dmitry)</li>
<li><?php bugfix(30140); ?> (Problem with array in static properties). (Dmitry)</li>
<li><?php bugfix(30126); ?> (Enhancement for error message for abstract classes). (Marcus)</li>
<li><?php bugfix(30096); ?> (gmmktime does not return the current time). (Derick)</li>
<li><?php bugfix(30080); ?> (Passing array or non array of objects). (Dmitry)</li>
<li><?php bugfix(30052); ?> (Crash on shutdown after odbc_pconnect()). (Edin)</li>
<li><?php bugfix(29983); ?> (PHP does not explicitly set mime type &amp; charset). (Ilia)</li>
<li><?php bugfix(29975); ?> (memory leaks when set_error_handler() is used inside error handler). (Tony)</li>
<li><?php bugfix(29971); ?> (variables_order behavior). (Dmitry)</li>
<li><?php bugfix(29944); ?> (Function defined in switch, crashes). (Dmitry)</li>
<li><?php bugfix(29896); ?> (Backtrace argument list out of sync). (Dmitry)</li>
<li><?php bugfix(29728); ?> (Reflection API Feature: Default parameter value). (Marcus)</li>
<li><?php bugfix(29689); ?> (default value of protected member overrides default value of private and other private variable problems in inherited classes). (Stas)</li>
<li><?php bugfix(29683); ?> (headers_list() returns empty array). (Tony)</li>
<li><?php bugfix(29583); ?> (crash when echoing a COM object). (M.Sisolak, Wez)</li>
<li><?php bugfix(29522); ?> (accessing properties without connection). (Georg)</li>
<li><?php bugfix(29361); ?> (var_export() producing invalid code). (Derick)</li>
<li><?php bugfix(29338); ?> (unencoded spaces get ignored after certain tags). (Ilia)</li>
<li><?php bugfix(29335); ?> (fetch functions now use MYSQLI_BOTH as default). (Georg)</li>
<li><?php bugfix(29334); ?> (win32 mail() provides incorrect Date: header). (Jani)</li>
<li><?php bugfix(29311); ?> (calling parent constructor in mysqli). (Georg)</li>
<li><?php bugfix(29268); ?> (__autoload() not called with Reflection->getClass()). (Dmitry)</li>
<li><?php bugfix(29256); ?> (SOAP HTTP Error when envelop size is more than 24345  bytes). (Dmitry, Wez)</li>
<li><?php bugfix(29253); ?> (array_diff with $GLOBALS argument fails). (Dmitry)</li>
<li><?php bugfix(29236); ?> (memory error when wsdl-cache is enabled). (Dmitry)</li>
<li><?php bugfix(29210); ?> (Function: is_callable - no support for private and  protected classes). (Dmitry)</li>
<li><?php bugfix(29109); ?> (SoapFault exception: [WSDL] Out of memory). (Dmitry)</li>
<li><?php bugfix(29104); ?> (Function declaration in method doesn't work). (Dmitry)</li>
<li><?php bugfix(29061); ?> (soap extension segfaults). (Dmitry)</li>
<li><?php bugfix(29015); ?> (Incorrect behavior of member vars(non string ones)-numeric mem vars and others). (Dmitry)</li>
<li><?php bugfix(28985); ?> (__getTypes() returning nothing on complex WSDL). (Dmitry)</li>
<li><?php bugfix(28969); ?> (Wrong data encoding of special characters). (Dmitry)</li>
<li><?php bugfix(28839); ?> (SIGSEGV in interactive mode (php -a)). (kameshj at fastmail dot fm)</li>
<li><?php bugfix(28605); ?> (Need to use -[m]ieee option for Alpha CPUs). (Jani)</li>
<li><?php bugfix(28568); ?> (SAPI::known_post_content_types is not thread safe). (Moriyoshi)</li>
<li><?php bugfix(28377); ?> (debug_backtrace is intermittently passing args). (Dmitry)</li>
<li><?php bugfix(28355); ?> (glob wont error if dir is not readable). (Hartmut)</li>
<li><?php bugfix(28072); ?> (static array with some constant keys will be incorrectly  ordered). (Dmitry)</li>
<li><?php bugfix(27908); ?> (xml default_handlers not being called). (Rob)</li>
<li><?php bugfix(27598); ?> (list() array key assignment causes HUGE memory leak). (Dmitry)</li>
<li><?php bugfix(27268); ?> (Bad references accentuated by clone). (Dmitry)</li>
<li><?php bugfix(26456); ?> (Wrong results from Reflection-API getDocComment() when called via STDIN). (Dmitry)</li>
<li><?php bugfix(25922); ?> (In error handler, modifying 5th arg (errcontext) may  result in seg fault). (Dmitry)</li>
<li><?php bugfix(25359); ?> (array_multisort() doesn't work in a function if array is  global or reference). (Dmitry)</li>
<li><?php bugfix(22836); ?> (returning reference to uninitialized variable). (Dmitry)</li>
<li><?php bugfix(21306); ?> (ext/sesssion: catch bailouts of write handler during  RSHUTDOWN). (Jani, Xuefer at 21cn dot com)</li>
<li><?php bugfix(15854); ?> (boolean ini options may be incorrectly displayed as Off  when they are On). (Tony)</li>
<li>Fixed bugs <?php bugl(14561); ?>, <?php bugl(20382); ?>, <?php bugl(26090); ?>, <?php bugl(26320); ?>, <?php bugl(28024); ?>, <?php bugl(30532); ?>, <?php bugl(32086); ?>, <?php bugl(32270); ?>, <?php bugl(32555); ?>, <?php bugl(32588); ?>, <?php bugl(33056); ?> (strtotime() related bugs). (Derick)</li>
</ul>

<a name="5.0.5"></a>
<h3>Version 5.0.5</h3>
<b>05-Sep-2005</b>
<ul>
<li>Upgraded PCRE library to version 5.0. (Andrei)</li>
<li>Removed php_check_syntax() function which never worked properly. (Ilia)</li>
<li>Added new function mysqli_set_charset(). (Georg)</li>
<li>Added man pages for "phpize" and "php-config" scripts. (Jakub Vrana)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added PHP_INT_MAX and PHP_INT_SIZE as predefined constants. (Andrey)</li>
<li>Changed sha1_file() and md5_file() functions to use streams instead of
  low level IO. (Uwe)</li>
<li>Changed ming to support official 0.2a and 0.3 library versions. (Marcus)</li>
<li>Fixed failing queries problem (FALSE returned) with mysqli_query() on 64 bit.
  (Andrey)</li>
<li>Fixed memory corruption in pg_copy_from() in case the as_null parameter was
  passed. (Derick)</li>
<li>Fixed ext/mysqli to allocate less memory when fetching bound params
  of type (MEDIUM|LONG)BLOB/(MEDIUM|LONG)TEXT. (Andrey)</li>
<li>Fixed memory corruption in ImageTTFText() with 64bit systems. (Andrey)</li>
<li>Fixed memory corruption in stristr(). (Derick)</li>
<li>Fixed segfaults when CURL callback functions throw exception. (Tony)</li>
<li>Fixed various reentrancy bugs in user-sort functions, solves bugs <?php bugl(33286); ?> and
  <?php bugl(33295); ?>. (Mike Bretz)</li>
<li><?php bugfix(34307); ?> (on_modify handler not called to set the default value if
  setting from php.ini was invalid). (Andrei)</li>
<li><?php bugfix(34302); ?> (date('W') do not return leading zeros for week 1 to 9).
  (Derick)</li>
<li><?php bugfix(34299); ?> (ReflectionClass::isInstantiable() returns true for abstract
  classes). (Marcus)</li>
<li><?php bugfix(34277); ?> (array_filter() crashes with references and objects).
  (Dmitry)</li>
<li><?php bugfix(34260); ?> (Segfault with callbacks (array_map) + overloading).
  (Dmitry)</li>
<li><?php bugfix(34137); ?> (assigning array element by reference causes binary mess).
  (Dmitry) 
<li><?php bugfix(34078); ?> (Reflection API problems in methods with boolean or 
  null default values). (Tony)</li>
<li><?php bugfix(34064); ?> (arr[] as param to function is allowed only if function 
  receives argument by reference). (Dmitry)</li>
<li><?php bugfix(34062); ?> (Crash in catch block when many arguments are used).
  (Dmitry)</li>
<li><?php bugfix(33989); ?> (extract($GLOBALS,EXTR_REFS) crashes PHP). (Dmitry)</li>
<li><?php bugfix(33940); ?> (array_map() fails to pass by reference when called
  recursively). (Dmitry)</li>
<li><?php bugfix(33853); ?> (php:function call __autoload with lowercase param). (Marcus)</li>
<li><?php bugfix(33802); ?> (throw Exception in error handler causes crash). (Dmitry)</li>
<li><?php bugfix(33723); ?> (php_value overrides php_admin_value). (Dmitry)</li>
<li><?php bugfix(33710); ?> (ArrayAccess objects doen't initialize $this). (Dmitry)</li>
<li><?php bugfix(33588); ?> (LDAP: RootDSE query not possible). (Jani)</li>
<li><?php bugfix(33558); ?> (warning with nested calls to functions returning by
  reference). (Dmitry)</li>
<li><?php bugfix(33520); ?> (crash if safe_mode is on and session.save_path is changed).
  (Dmitry)</li>
<li><?php bugfix(33491); ?> (crash after extending MySQLi internal class). (Tony)</li>
<li><?php bugfix(33340); ?> (CLI Crash when calling php:function from XSLT). (Rob)</li>
<li><?php bugfix(33277); ?> (private method accessed by child class). (Dmitry)</li>
<li><?php bugfix(33268); ?> (iconv_strlen() works only with a parameter of < 3 in 
  length). (Ilia)</li>
<li><?php bugfix(33263); ?> (mysqli_real_escape doesn't work in __construct) (Georg)</li>
<li><?php bugfix(33257); ?> (array_splice() inconsistent when passed function instead
  of variable). (Dmitry)</li>
<li><?php bugfix(33243); ?> (ze1_compatibility_mode does not work as expected). (Dmitry)</li>
<li><?php bugfix(33242); ?> (Mangled error message when stream fails). (Derick)</li>
<li><?php bugfix(33222); ?> (segfault when CURL handle is closed in a callback). (Tony)</li>
<li><?php bugfix(33214); ?> (odbc_next_result does not signal SQL errors with 
  2-statement SQL batches). (rich at kastle dot com, Tony)</li>
<li><?php bugfix(33210); ?> (relax jpeg recursive loop protection). (Ilia)</li>
<li><?php bugfix(33200); ?> (preg_replace(): magic_quotes_sybase=On makes 'e' modifier
  misbehave). (Jani)</li>
<li><?php bugfix(33185); ?> (--enable-session=shared does not build). (Jani)</li>
<li><?php bugfix(33171); ?> (foreach enumerates private fields declared in base
  classes). (Dmitry)</li>
<li><?php bugfix(33164); ?> (Soap extension incorrectly detects HTTP/1.1). (Ilia)</li>
<li><?php bugfix(33156); ?> (cygwin version of setitimer doesn't accept ITIMER_PROF).
  (Nuno)</li>
<li><?php bugfix(33116); ?> (crash when assigning class name to global variable in
  __autoload). (Dmitry)</li>
<li><?php bugfix(33090); ?> (mysqli_prepare() doesn't return an error). (Georg)</li>
<li><?php bugfix(33076); ?> (str_ireplace() incorrectly counts result string length 
  and may cause segfault). (Tony)</li>
<li><?php bugfix(33072); ?> (Add a safemode/open_basedir check for runtime
  "session.save_path" change using session_save_path() function). (Rasmus)</li>
<li><?php bugfix(33070); ?> (Improved performance of bzdecompress() by several orders
  of magnitude). (Ilia)</li>
<li><?php bugfix(33059); ?> (crash when moving xml attribute set in dtd). (Ilia)</li>
<li><?php bugfix(33057); ?> (Don't send extraneous entity-headers on a 304 as per
  RFC 2616 section 10.3.5) (Rasmus, Choitel)</li>
<li><?php bugfix(33019); ?> (socket errors cause memory leaks in php_strerror()). 
  (jwozniak23 at poczta dot onet dot pl, Tony).
<li><?php bugfix(33017); ?> ("make distclean" gives an error with VPATH build). (Jani)</li>
<li><?php bugfix(33013); ?> ("next month" was handled wrong while parsing dates).
  (Derick)</li>
<li><?php bugfix(32981); ?> (ReflectionMethod::getStaticVariables() causes apache2.0.54
  seg fault). (Dmitry)</li>
<li><?php bugfix(32956); ?> (mysql_bind_result() doesn't support MYSQL_TYPE_NULL). (Georg)</li>
<li><?php bugfix(32947); ?> (Incorrect option for mysqli default password). (Georg)</li>
<li><?php bugfix(32944); ?> (Disabling session.use_cookies doesn't prevent reading 
  session cookies). (Jani, Tony)</li>
<li><?php bugfix(32941); ?> (Sending structured SOAP fault kills a php). (Dmitry)</li>
<li><?php bugfix(32936); ?> (http redirects URLs are not checked for control chars). (Ilia)</li>
<li><?php bugfix(32933); ?> (Cannot extend class "SQLiteDatabase"). (Marcus)</li>
<li><?php bugfix(32932); ?> (Oracle LDAP: ldap_get_entries(), invalid pointer). (Jani)</li>
<li><?php bugfix(32930); ?> (class extending DOMDocument doesn't clone properly). (Rob)</li>
<li><?php bugfix(32904); ?> (pg_get_notify() ignores result_type parameter). (Tony)</li>
<li><?php bugfix(32852); ?> (Crash with singleton and __destruct when
  zend.ze1_compatibility_mode = On). (Dmitry)</li>
<li><?php bugfix(32813); ?> (parse_url() does not handle scheme-only urls properly). (Ilia)</li>
<li><?php bugfix(32810); ?> (temporary files not using plain file wrapper). (Ilia)</li>
<li><?php bugfix(32809); ?> (Missing T1LIB support on Windows). (Edin)</li>
<li><?php bugfix(32802); ?> (General cookie overrides more specific cookie). (Ilia)</li>
<li>Fixed bugs <?php bugl(32800); ?>, <?php bugl(32830); ?> (ext/odbc: Problems with 64bit systems). (Jani)</li>
<li><?php bugfix(32799); ?> (crash: calling the corresponding global var during the
  destruct). (Dmitry)</li>
<li><?php bugfix(32776); ?> (SOAP doesn't support one-way operations). (Dmitry)</li>
<li><?php bugfix(32773); ?> (GMP functions break when second parameter is 0). (Stas)</li>
<li><?php bugfix(32759); ?> (incorrect determination of default value (COM)). (Wez)</li>
<li><?php bugfix(32758); ?> (Cannot access safearray properties in VB6 objects). (Wez)</li>
<li><?php bugfix(32755); ?> (Segfault in replaceChild() when DocumentFragment has
  no children). (Rob)</li>
<li><?php bugfix(32753); ?> (Undefined constant SQLITE_NOTADB). (Ilia)</li>
<li><?php bugfix(32742); ?> (segmentation fault when the stream with a wrapper 
  is not closed). (Tony, Dmitry)</li>
<li><?php bugfix(32699); ?> (pg_affected_rows() was defined when it was not available).
  (Derick)</li>
<li><?php bugfix(32686); ?> (Require/include file in destructor causes segfault).
  (Marcus)</li>
<li><?php bugfix(32682); ?> (ext/mssql: Error on module shutdown when called from
  activescript). (Frank)</li>
<li><?php bugfix(32674); ?> (exception in iterator causes crash). (Dmitry)</li>
<li><?php bugfix(32660); ?> (Assignment by reference causes crash when field access is
  overloaded (__get)). (Dmitry)</li>
<li><?php bugfix(32647); ?> (Using register_shutdown_function() with invalid callback
  can crash PHP). (Jani)</li>
<li><?php bugfix(32615); ?> (Segfault in replaceChild() using fragment when 
  previousSibling is NULL). (Rob)</li>
<li><?php bugfix(32613); ?> (ext/snmp: use of snmp_shutdown() causes snmpapp.conf 
  access errors). (Jani, ric at arizona dot edu)</li>
<li><?php bugfix(32608); ?> (html_entity_decode() converts single quotes even if
  ENT_NOQUOTES is given). (Ilia)</li>
<li><?php bugfix(32596); ?> (Segfault/Memory Leak by getClass (etc) in __destruct).
  (Dmitry)</li>
<li><?php bugfix(32591); ?> (ext/mysql: Unsatisfied symbol: ntohs with HP-UX). (Jani)</li>
<li><?php bugfix(32589); ?> (Possible crash inside imap_mail_compose, with charsets).
  (Ilia)</li>
<li><?php bugfix(32587); ?> (Apache2: errors sent to error_log do not include
  timestamps). (Jani)</li>
<li><?php bugfix(32560); ?> (configure looks for incorrect db2 library). (Tony)</li>
<li><?php bugfix(32553); ?> (mmap loads only the 1st 2000000 bytes on Win32). (Ilia)</li>
<li><?php bugfix(32533); ?> (proc_get_status() returns the incorrect process status). (Ilia)</li>
<li><?php bugfix(32530); ?> (chunk_split() does not append endstr if chunklen is  
  longer then the original string). (Ilia)</li>
<li><?php bugfix(32491); ?> (File upload error - unable to create a temporary file).
  (Uwe Schindler)</li>
<li><?php bugfix(32405); ?> (mysqli::fetch() returns bad data - 64bit problem). (Andrey)</li>
<li><?php bugfix(32282); ?> (Segfault in mysqli_fetch_array on 64-bit). (Georg)</li>
<li><?php bugfix(32296); ?> (get_class_methods() output has changed between 5.0.2 and
  5.0.3). (Dmitry)</li>
<li><?php bugfix(32245); ?> (xml_parser_free() in a function assigned to the xml parser
  gives a segfault). (Rob)</li>
<li><?php bugfix(32171); ?> (Userspace stream wrapper crashes PHP). (Tony, Dmitry)</li>
<li><?php bugfix(32080); ?> (segfault when assigning object to itself with
  zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(32013); ?> (ext/mysqli bind_result causes fatal error: memory
  limit). (Andrey)</li>
<li><?php bugfix(31887); ?> (ISAPI: Custom 5xx error does not return correct HTTP 
  response message). (Jani)</li>
<li><?php bugfix(31828); ?> (Crash with zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(31668); ?> (multi_query works exactly every other time - multi query
  d/e flag global and not per connection). (Andrey)</li>
<li><?php bugfix(31636); ?> (another crash when echoing a COM object). (Wez)</li>
<li><?php bugfix(31583); ?> (php_std_date() uses short day names in non-y2k_compliance 
  mode). (mike at php dot net)</li>
<li><?php bugfix(31525); ?> (object reference being dropped. $this getting lost).
  (Stas, Dmitry)</li>
<li><?php bugfix(31502); ?> (Wrong deserialization from session when using WDDX
  serializer). (Dmitry) 
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31363); ?> (broken non-blocking flock()). ian at snork dot net
<li><?php bugfix(31213); ?> (Sideeffects caused by fix of bug <?php bugl(29493); ?>. (Dmitry)</li>
<li><?php bugfix(31158); ?> (array_splice on $GLOBALS crashes). (Dmitry)</li>
<li><?php bugfix(30961); ?> (Wrong linenumber in ReflectionClass getStartLine()).
  (Dmitry)</li>
<li><?php bugfix(30889); ?> (Conflict between __get/__set and ++ operator). (Dmitry)</li>
<li><?php bugfix(30833); ?> (array_count_values() modifying input array). (Tony)</li>
<li><?php bugfix(30828); ?> (debug_backtrace() reports incorrect class in overridden
  methods). (Dmitry)</li>
<li><?php bugfix(30820); ?> (static member conflict with $this->member silently
  ignored). (Dmitry)</li>
<li><?php bugfix(30819); ?> (Better support for LDAP SASL bind). (Jani)</li>
<li><?php bugfix(30791); ?> (magic methods (__sleep/__wakeup/__toString) call __call if
  object is overloaded). (Dmitry)</li>
<li><?php bugfix(30707); ?> (Segmentation fault on exception in method). (Stas, Dmitry)</li>
<li><?php bugfix(30702); ?> (cannot initialize class variable from class constant).
  (Dmitry)</li>
<li><?php bugfix(30519); ?> (Interface not existing says Class not found). (Dmitry)</li>
<li><?php bugfix(30394); ?> (Assignment operators yield wrong result with __get/__set).
  (Dmitry)</li>
<li><?php bugfix(30332); ?> (zend.ze1_compatibility_mode isnt fully compatable with
  array_push()). (Dmitry)</li>
<li><?php bugfix(30162); ?> (Catching exception in constructor causes lose of $this).
  (Dmitry)</li>
<li><?php bugfix(30140); ?> (Problem with array in static properties). (Dmitry)</li>
<li><?php bugfix(30126); ?> (Enhancement for error message for abstract classes). 
  (Marcus)</li>
<li><?php bugfix(30080); ?> (Passing array or non array of objects). (Dmitry)</li>
<li><?php bugfix(29975); ?> (memory leaks when set_error_handler() is used inside error 
  handler). (Tony)</li>
<li><?php bugfix(29971); ?> (variables_order behaviour). (Dmitry)</li>
<li><?php bugfix(29944); ?> (Function defined in switch, crashes). (Dmitry)</li>
<li><?php bugfix(29896); ?> (Backtrace argument list out of sync). (Dmitry)</li>
<li><?php bugfix(29683); ?> (headers_list() returns empty array). (Tony)</li>
<li><?php bugfix(29583); ?> (crash when echoing a COM object). (M.Sisolak, Wez)</li>
<li><?php bugfix(29338); ?> (unencoded spaces get ignored after certain tags). (Ilia)</li>
<li><?php bugfix(29210); ?> (Function: is_callable - no support for private and
  protected classes). (Dmitry)</li>
<li><?php bugfix(29104); ?> (Function declaration in method doesn't work). (Dmitry)</li>
<li><?php bugfix(29015); ?> (Incorrect behavior of member vars(non string ones)-numeric
  mem vars und others). (Dmitry)</li>
<li><?php bugfix(28839); ?> (SIGSEGV in interactive mode (php -a)).
  (kameshj at fastmail dot fm)</li>
<li><?php bugfix(28605); ?> (Need to use -[m]ieee option for Alpha CPUs). (Jani)</li>
<li><?php bugfix(28377); ?> (debug_backtrace is intermittently passing args). (Dmitry)</li>
<li><?php bugfix(27598); ?> (list() array key assignment causes HUGE memory leak).
  (Dmitry)</li>
<li><?php bugfix(26456); ?> (Wrong results from Reflection-API getDocComment() when
  called via STDIN). (Dmitry)</li>
<li><?php bugfix(25922); ?> (In error handler, modifying 5th arg (errcontext) may result
  in seg fault). (Dmitry)</li>
<li><?php bugfix(22836); ?> (returning reference to uninitialized variable). (Dmitry)</li>
<li><?php bugfix(29689); ?> (default value of protected member overrides default value of private) 
  and other private variable problems in inherited classes (Stas)</li>
<li><?php bugfix(29253); ?> (array_diff with $GLOBALS argument fails). (Dmitry)</li>
<li>Abstract private methods are no longer allowed (Stas)</li>
</ul>

<a name="5.0.4"></a>
<h3>Version 5.0.4</h3>
<b>31-Mar-2005</b>
<ul>
<li>Added SNMPv2 support. (harrie)</li>
<li>Added Oracle Instant Client support. (cjbj at hotmail dot com, Tony)</li>
<li>Added length and charsetnr for field array and object in mysqli. (Georg)</li>
<li>Added checks for negative values to gmp_sqrt(), gmp_powm(), gmp_sqrtrem()
  and gmp_fact() to prevent SIGFPE. (Tony)</li>
<li>Changed foreach() to throw an exception if IteratorAggregate::getIterator()
  does not return an Iterator. (Marcus)</li>
<li>Changed phpize not to require libtool. (Jani)</li>
<li>Updated bundled oniguruma library (used for multibyte regular expression)
  to 3.7.0. (Moriyoshi)</li>
<li>Updated bundled libmbfl library (used for multibyte functions). (Moriyoshi)<br>Fixed bugs:
  <ul>
    <li>Bug <?php bugl(32063); ?> (mb_convert_encoding ignores named entity 'alpha')</li>
    <li>Bug <?php bugl(31911); ?> (mb_decode_mimeheader() is case-sensitive to hex escapes)</li>
    <li>Bug <?php bugl(30573); ?> (compiler warnings in libmbfl due to invalid type cast)</li>
    <li>Bug <?php bugl(30549); ?> (incorrect character translations for some ISO8859 charsets)</li>
  </ul>
<li>Fixed bug preventing from building oci8 as shared. 
  (stanislav dot voroniy at portavita dot nl, Tony)</li>
<li>Fixed a bug in mysql_affected_rows and mysql_stmt_affected_rows when the
  api function returns -1 (Georg)</li>
<li>Fixed several leaks in ext/browscap and sapi/embed. (Andrei)</li>
<li>Fixed several leaks in ext/filepro. (Tony)</li>
<li>Fixed build system to always use bundled libtool files. (Jani)</li>
<li>Fixed a bug in mysqli_stmt_execute() (type conversion with NULL values).
  (Georg)</li>
<li>Fixed segfault in mysqli_fetch_field_direct() when invalid field offset 
  is passed. (Tony)</li>
<li>Fixed posix_getsid() &amp; posix_getpgid() to return sid &amp; pgid instead 
  of true. (Tony)</li>
<li><?php bugfix(32394); ?> (offsetUnset() segfaults in a foreach). (Marcus)</li>
<li><?php bugfix(32373); ?> (segfault in bzopen() if supplied path to non-existent 
  file). (Tony)</li>
<li><?php bugfix(32326); ?> (Check values of Connection/Transfer-Encoding 
  case-incentively in SOAP extension). (Ilia)</li>
<li><?php bugfix(32290); ?> (call_user_func_array() calls wrong class method within 
  child class). (Marcus)</li>
<li><?php bugfix(32238); ?> (spl_array.c: void function cannot return value). (Johannes)</li>
<li><?php bugfix(32210); ?> (proc_get_status() sets "running" always to true). (Ilia)</li>
<li><?php bugfix(32200); ?> (Prevent using both --with-apxs2 and --with-apxs2filter).
  (Jani)</li>
<li><?php bugfix(32134); ?> (Overloading offsetGet/offsetSet). (Marcus)</li>
<li><?php bugfix(32130); ?> (ArrayIterator::seek() does not throw an Exception on 
  invalid index). (Marcus)</li>
<li><?php bugfix(32115); ?> (dateTime SOAP encoding of timezone incorrect). (Dmitry)</li>
<li><?php bugfix(32081); ?> (in mysqli default socket value is not being used). (Ilia)</li>
<li><?php bugfix(32021); ?> (Crash caused by range('', 'z')). (Derick)</li>
<li><?php bugfix(32011); ?> (Fragments which replaced Nodes are not globaly useable).
  (Rob)</li>
<li><?php bugfix(32001); ?> (xml_parse_into_struct() function exceeds maximum 
  execution time). (Rob, Moriyoshi)</li>
<li><?php bugfix(31980); ?> (Unicode exif data not available on Windows). (Edin)</li>
<li><?php bugfix(31792); ?> (getrusage() does not provide ru_nswap value). (Ilia)</li>
<li><?php bugfix(31960); ?> (msql_fetch_row() and msql_fetch_array() dropping columns
  with NULL values). (Daniel Convissor)</li>
<li><?php bugfix(31878); ?> (Segmentation fault using clone keyword on nodes). (Rob)</li>
<li><?php bugfix(31858); ?> (--disable-cli does not force --without-pear). (Jani)</li>
<li><?php bugfix(31842); ?> (*date('r') does not return RFC2822 conforming date string).
  (Jani)</li>
<li><?php bugfix(31832); ?> (SOAP encoding problem with complex types in WSDL mode with
  multiple parts). (Dmitry)</li>
<li><?php bugfix(31797); ?> (exif_read_data() uses too low nesting limit). (Ilia)</li>
<li><?php bugfix(31796); ?> (readline completion handler does not handle empty return
  values). (Ilia)</li>
<li><?php bugfix(31755); ?> (Cannot create SOAP header in no namespace). (Dmitry)</li>
<li><?php bugfix(31754); ?> (dbase_open() fails for mode = 1). (Mehdi, Derick)</li>
<li><?php bugfix(31751); ?> (pg_parameter_status() missing on Windows). (Edin)</li>
<li><?php bugfix(31747); ?> (SOAP Digest Authentication doesn't work with 
  "HTTP/1.1 100 Continue" response). (Dmitry)</li>
<li><?php bugfix(31732); ?> (mb_get_info() causes segfault when no parameters 
  specified). (Tony)</li>
<li><?php bugfix(31710); ?> (Wrong return values for mysqli_autocommit/commit/rollback).
  (Georg)</li>
<li><?php bugfix(31705); ?> (parse_url() does not recognize http://foo.com#bar). (Ilia)</li>
<li><?php bugfix(31695); ?> (Cannot redefine endpoint when using WSDL). (Dmitry)</li>
<li><?php bugfix(31684); ?> (dio_tcsetattr(): misconfigured termios settings).
  (elod at itfais dot com)</li>
<li><?php bugfix(31683); ?> (changes to $name in __get($name) override future 
  parameters). (Dmitry)</li>
<li><?php bugfix(31699); ?> (unserialize() float problem on non-English locales). (Ilia)</li>
<li><?php bugfix(31562); ?> (__autoload() problem with static variables). (Marcus)</li>
<li><?php bugfix(31651); ?> (ReflectionClass::getDefaultProperties segfaults with arrays).
  (Marcus)</li>
<li><?php bugfix(31623); ?> (OCILogin does not support password grace period).
  (daniel dot beet at accuratesoftware dot com, Tony)</li>
<li><?php bugfix(31527); ?> (crash in msg_send() when non-string is stored without
  being serialized). (Ilia)</li>
<li><?php bugfix(31515); ?> (Improve performance of scandir() by factor of 10 or so). (Ilia)</li>
<li><?php bugfix(31514); ?> (open_basedir uses path_translated rather then cwd for .
  translation). (Ilia)</li>
<li><?php bugfix(31480); ?> (Possible infinite loop in imap_mail_compose()). (Ilia)</li>
<li><?php bugfix(31479); ?> (Fixed crash in chunk_split(), when chunklen &gt; strlen). (Ilia)</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31454); ?> (session_set_save_handler crashes PHP when supplied 
  non-existent object ref). (Tony)</li>
<li><?php bugfix(31444); ?> (Memory leak in zend_language_scanner.c).
  (hexer at studentcenter dot org)</li>
<li><?php bugfix(31442); ?> (unserialize broken on 64-bit systems). (Marcus)</li>
<li><?php bugfix(31440); ?> ($GLOBALS can be overwritten via GPC when register_globals
  is enabled). (Ilia)</li>
<li><?php bugfix(31422); ?> (No Error-Logging on SoapServer-Side). (Dmitry)</li>
<li><?php bugfix(31413); ?> (curl POSTFIELDS crashes on 64-bit platforms). (Joe)</li>
<li><?php bugfix(31396); ?> (compile fails with gd 2.0.33 without freetype). (Jani)</li>
<li><?php bugfix(31371); ?> (highlight_file() trims new line after heredoc). (Ilia)</li>
<li><?php bugfix(31361); ?> (simplexml/domxml segfault when adding node twice). (Rob)</li>
<li><?php bugfix(31348); ?> (CachingIterator::rewind() leaks). (Marcus)</li>
<li><?php bugfix(31346); ?> (ArrayIterator::next segfaults). (Marcus)</li>
<li><?php bugfix(31190); ?> (Unexpected warning then exception is thrown from 
  call_user_func_array()). (phpbugs at domain51 dot net, Dmitry)</li>
<li><?php bugfix(31142); ?> (imap_mail_compose() fails to generate correct output). (Ilia)</li>
<li><?php bugfix(31139); ?> (XML Parser Functions seem to drop &amp; when parsing). (Rob)</li>
<li><?php bugfix(31398); ?> (When magic_guotes_gpc are enabled filenames with ' get cutoff).
  (Ilia)</li>
<li><?php bugfix(31288); ?> (Possible crash in mysql_fetch_field(), if mysql_list_fields() 
  was not called previously). (Ilia)</li>
<li><?php bugfix(31107); ?>, <?php bugfix(31110); ?>, <?php bugfix(31111); ?>, <?php bugfix(31249); ?> (Compile failure of zend_strtod.c).
  (Jani)</li>
<li><?php bugfix(31110); ?> (PHP 4.3.10 does not compile on Tru64 UNIX 5.1B). (Derick)</li>
<li><?php bugfix(31107); ?> (Compile failure on Solaris 9 (Intel) and gcc 3.4.3). (Derick)</li>
<li><?php bugfix(31103); ?> (Better error message when c-client cannot be found). (Ilia)</li>
<li><?php bugfix(31101); ?> (missing kerberos header file path with --with-openssl). (Jani)</li>
<li><?php bugfix(31098); ?> (isset() / empty() incorrectly return true in dereference of
  a string type). (Moriyoshi)</li>
<li><?php bugfix(31087); ?> (broken php_url_encode_hash macro). (Ilia)</li>
<li><?php bugfix(31072); ?> (var_export() does not output an array element with an empty
  string key). (Derick)</li>
<li><?php bugfix(31060); ?> (imageftbbox() does not use linespacing parameter). (Jani)</li>
<li><?php bugfix(31056); ?> (php_std_date() returns invalid formatted date if 
  y2k_compliance is On). (Ilia)</li>
<li><?php bugfix(31055); ?> (apache2filter: per request leak proportional to the full
  path of the request URI). (kameshj at fastmail dot fm)</li>
<li><?php bugfix(30901); ?> (can't send cookies with soap envelop). (Dmitry)</li>
<li><?php bugfix(30871); ?> (Misleading warning message for array_combine()). (Andrey)</li>
<li><?php bugfix(30868); ?> (evaluated pointer comparison in mbregex causes compile
  failure). (Moriyoshi)</li>
<li><?php bugfix(30862); ?> (Static array with boolean indexes). (Marcus)</li>
<li><?php bugfix(30726); ?> (-.1 like numbers are not being handled correctly). (Ilia)</li>
<li><?php bugfix(30725); ?> (PHP segfaults when an exception is thrown in getIterator() 
  within foreach). (Marcus)</li>
<li><?php bugfix(30609); ?> (cURL functions bypass open_basedir). (Jani)</li>
<li><?php bugfix(30446); ?> (apache2handler: virtual() includes files out of sequence)</li>
<li><?php bugfix(30430); ?> (odbc_next_result() doesn't bind values and that results 
  in segfault). (pdan-php at esync dot org, Tony)</li>
<li><?php bugfix(30266); ?> (Invalid opcode 137/1/8). (Marcus)</li>
<li><?php bugfix(30120); ?> (imagettftext() and imagettfbbox() accept too many
  parameters). (Jani)</li>
<li><?php bugfix(30106); ?> (SOAP cannot not parse 'ref' element. Causes Uncaught
  SoapFault exception). (Dmitry)</li>
<li><?php bugfix(29989); ?> (type re_registers redefined in oniguruma.h). (Moriyoshi)
<li><?php bugfix(28803); ?> (enabled debug causes bailout errors with CLI on AIX 
  because of fflush() called on already closed filedescriptor). (Tony)</li>
<li><?php bugfix(29767); ?> (Weird behaviour of __set($name, $value)). (Dmitry)</li>
<li><?php bugfix(29733); ?> (printf() handles repeated placeholders wrong).
  (bugs dot php dot net at bluetwanger dot de, Ilia)</li>
<li><?php bugfix(29424); ?> (width and height inverted for JPEG2000 files). (Ilia)</li>
<li><?php bugfix(29329); ?> (configure for mysqli with shared doesn't work). (Georg)</li>
<li><?php bugfix(29136); ?> (make test libtool failure on MacOSX). (Jani)</li>
<li><?php bugfix(28976); ?> (mail(): use "From:" from headers if sendmail_from is empty).
  (Jani)</li>
<li><?php bugfix(28930); ?> (PHP sources pick wrong header files generated by bison).
  (eggert at gnu dot org, Jani)</li>
<li><?php bugfix(28840); ?> (__destruct of a class that extends mysqli not called).
  (Marcus)</li>
<li><?php bugfix(28804); ?> (ini-file section parsing pattern is buggy).
  (wendland at scan-plus dot de)</li>
<li><?php bugfix(28451); ?> (corrupt EXIF headers have unlimited recursive IFD directory
  entries). (Andrei)</li>
<li><?php bugfix(28444); ?> (Cannot access undefined property for object with overloaded
  property access). (Dmitry)</li>
<li><?php bugfix(28442); ?> (Changing a static variables in a class changes it across 
  sub/super classes.) (Marcus)</li>
<li><?php bugfix(28324); ?> (HTTP_SESSION_VARS appear when register_long_arrays is 
  Off). (Tony)</li>
<li><?php bugfix(28074); ?> (FastCGI: stderr should be written in a FCGI stderr stream).
  (chris at ex-parrot dot com)</li>
<li><?php bugfix(28067); ?> (partially incorrect utf8 to htmlentities mapping). (Derick,
  Benjamin Greiner)</li>
<li><?php bugfix(28041); ?> (SOAP HTTP Digest Access Authentication). (Dmitry)</li>
<li><?php bugfix(27633); ?> (Double \r problem on ftp_get in ASCII mode on Win32). (Ilia)</li>
<li><?php bugfix(18613); ?> (Multiple OUs in x509 certificate not handled properly).
  (Jani)</li>
</ul>

<a name="5.0.3"></a>
<h3>Version 5.0.3</h3>
<b>15-Dec-2004</b>
<ul>
<li>Added the %F modifier to *printf to render a non-locale-aware representation of a float with the . as decimal seperator. (Derick)</li>
<li>Fixed error handling in mysqli_multi_query. (Georg)</li>
<li>Extended the functionality of is_subclass_of() to accept either a class name or an object as first parameter. (Andrey)</li>
<li>Fixed potential problems with unserializing invalid serialize data. (Marcus)</li>
<li><?php bugfix(31034); ?> (Problem with non-existing iconv header file). (Derick) </li>
<li><?php bugfix(30995); ?> (snmp extension does not build with net-snmp 5.2). (Ilia) </li>
<li><?php bugfix(30994); ?> (SOAP server unable to handle request with references).  (Dmitry) </li>
<li><?php bugfix(30990); ?> (allow popen() on *NIX to accept 'b' flag). (Ilia) </li>
<li><?php bugfix(30967); ?> (properties in extended mysqli classes don't work). (Georg) </li>
<li><?php bugfix(30928); ?> (When Using WSDL, SoapServer doesn't handle private or protected properties). (Dmitry) </li>
<li><?php bugfix(30922); ?> (reflective functions crash PHP when interfaces extend themselves). (Tony, Dmitry) </li>
<li><?php bugfix(30904); ?> (segfault when recording soapclient into session). (Tony, Dmitry) </li>
<li><?php bugfix(30890); ?> (MySQLi testsuite) </li>
<li><?php bugfix(30856); ?> (ReflectionClass::getStaticProperties segfaults). (Marcus) </li>
<li><?php bugfix(30832); ?> ("!" stripped off comments in xml parser). (Rob) </li>
<li><?php bugfix(30799); ?> (SoapServer doesn't handle private or protected properties).  (Dmitry) </li>
<li><?php bugfix(30783); ?> (Apache crash when using ReflectionFunction:: getStaticVariables()). (Marcus) </li>
<li><?php bugfix(30750); ?> (Meaningful error message when upload directory is not accessible). (Ilia) </li>
<li><?php bugfix(30685); ?> (Malformed SOAPClient http header reequest). (Dmitry) </li>
<li><?php bugfix(30672); ?> (Problem handling exif data in jpeg images at unusual places). (Marcus) </li>
<li><?php bugfix(30658); ?> (Ensure that temporary files created by GD are removed).  (Ilia) </li>
<li><?php bugfix(30645); ?> (def. multi result set support for mysql_connect). (Georg) </li>
<li><?php bugfix(30637); ?> (compile with pear error). (Antony) </li>
<li><?php bugfix(30587); ?> (array_multisort doesn't separate zvals before changing them). (Tony) </li>
<li><?php bugfix(30572); ?> (crash when comparing SimpleXML attribute to a boolean).  (Andi) </li>
<li><?php bugfix(30566); ?> (attribute namespace URIs are inconsistent when parsing).  (Rob) </li>
<li><?php bugfix(30490); ?> (PEAR installation fails). (Antony) </li>
<li><?php bugfix(30475); ?> (curl_getinfo() may crash in some situations). (Ilia) </li>
<li><?php bugfix(30442); ?> (segfault when parsing ?getvariable[][ ). (Tony) </li>
<li><?php bugfix(30388); ?> (rename across filesystems loses ownership and permission info). (Tony) </li>
<li><?php bugfix(30387); ?> (stream_socket_client async connect was broken).  (vnegrier at esds dot com, Wez).  </li>
<li><?php bugfix(30381); ?> (Strange results with get_class_vars()). (Marcus) </li>
<li><?php bugfix(30375); ?> (cal_info() does not work without a parameter). (Ilia) </li>
<li><?php bugfix(30362); ?> (stream_get_line() not handling end string correctly).  (Ilia) </li>
<li><?php bugfix(30359); ?> (SOAP client requests have no port in "Host" field).  (Dmitry) </li>
<li><?php bugfix(30356); ?> (str_ireplace() does not work on all strings). (Ilia) </li>
<li><?php bugfix(30344); ?> (Reflection::getModifierNames() returns too long strings).  (Marcus) </li>
<li><?php bugfix(30329); ?> (Error Fetching http body, No Content-Length, connection closed or chunked data). (Dmitry) </li>
<li><?php bugfix(30282); ?> (segfault when using unknown/unsupported session.save_handler and/or session.serialize_handler). (Tony) </li>
<li><?php bugfix(30281); ?> (Prevent non-wbmp images from being detected as such).  (Ilia) </li>
<li><?php bugfix(30276); ?> (Possible crash in ctype_digit on large numbers). (Ilia) </li>
<li><?php bugfix(30230); ?> (exception handler not working with objects). (Marcus) </li>
<li><?php bugfix(30224); ?> (Sybase date strings are sometimes not null terminated).  (Ilia) </li>
<li><?php bugfix(30175); ?> (SOAP results aren't parsed correctly). (Dmitry) </li>
<li><?php bugfix(30147); ?> (OO sqlite_fetch_object did not reset error handler). (Wez) </li>
<li><?php bugfix(30133); ?> (get_current_user() crashes on Windows). (Edin) </li>
<li><?php bugfix(30061); ?> (xml_set_start_namespace_decl_handler not called). (Rob) </li>
<li><?php bugfix(30057); ?> (did not detect IPV6 on FreeBSD 4.1). (Wez) </li>
<li><?php bugfix(30042); ?> (strtotime does not use second param). (Derick) </li>
<li><?php bugfix(30027); ?> (Possible crash inside ftp_get()).  (cfield at affinitysolutions dot com) </li>
<li><?php bugfix(29954); ?> (array_reduce segfaults when initial value is array). (Tony) </li>
<li><?php bugfix(29883); ?> (isset gives invalid values on strings). (Tony, Dmitry) </li>
<li><?php bugfix(29801); ?> (Set limit on the size of mmapable data). (Ilia) </li>
<li><?php bugfix(29557); ?> (strtotime error). (Derick) </li>
<li><?php bugfix(29418); ?> (double free when openssl_csr_new fails).  (Kamesh Jayachandran).  </li>
<li><?php bugfix(29385); ?> (Soapserver always uses std class). (David, Dmitry) </li>
<li><?php bugfix(29211); ?> (SoapClient doesn't request wsdl through proxy). (Rob) </li>
<li><?php bugfix(28817); ?> (Var problem when extending domDocument). (Georg) </li>
<li><?php bugfix(28599); ?> (strtotime fails with zero base time). (Derick) </li>
<li><?php bugfix(28598); ?> (Lost support for MS Symbol fonts). (Pierre) </li>
<li><?php bugfix(28220); ?> (mb_strwidth() returns wrong width values for some hangul characters). (Moriyoshi) </li>
<li><?php bugfix(28228); ?> (NULL decimal separator is not being handled correctly).  (Ilia) </li>
<li><?php bugfix(28209); ?> (strtotime("now")). (Derick) </li>
<li><?php bugfix(27798); ?> (private / protected variables not exposed by get_object_vars() inside class). (Marcus) </li>
<li><?php bugfix(27728); ?> (Can't return within a zend_try {} block or the previous bailout state isn't restored. (Andi) </li>
<li><?php bugfix(27183); ?> (Userland stream wrapper segfaults on stream_write).  (Christian) </li>
</ul>

<a name="5.0.2"></a>
<h3>Version 5.0.2</h3>
<b>23-Sep-2004</b>
<ul>
<li> Added new boolean (fourth) parameter to array_slice() that turns on the preservation of keys in the returned array. (Derick) </li>
<li> Added the sorting flag SORT_LOCALE_STRING to the sort() functions which makes them sort based on the current locale. (Derick) </li>
<li> Added interface_exists() and make class_exists() only return true for real classes. (Andrey) </li>
<li> Added PHP_EOL constant that contains the OS way of representing newlines.  (Paul Hudson, Derick) </li>
<li> Implemented periodic PCRE compiled regexp cache cleanup, to avoid memory exhaustion. (Andrei) </li>
<li> Renamed SoapClient->__call() to SoapClinet->__soapCall(). (Dmitry) </li>
<li> Fixed bug with raw_post_data not getting set (Brian) </li>
<li> Fixed a file-descriptor leak with phpinfo() and other 'special' URLs (Zeev) </li>
<li> <?php bugfix(30209); ?> (ReflectionClass::getMethod() lowercases attribute).  (Marcus) </li>
<li> <?php bugfix(30182); ?> (SOAP module processing WSDL file dumps core). (Dmitry) </li>
<li> <?php bugfix(30045); ?> (Cannot pass big integers (> 2147483647) in SOAP requests).  (Dmitry) </li>
<li> <?php bugfix(29985); ?> (unserialize()/ __PHP_Incomplete_class does not report correctly class name). (Marcus, Tony) </li>
<li> <?php bugfix(29945); ?> (simplexml_load_file URL limitation 255 char). (Rob) </li>
<li> <?php bugfix(29873); ?> (No defines around pcntl_*priority definitions). (Derick) </li>
<li> <?php bugfix(29844); ?> (SOAP doesn't return the result of a valid SOAP request).  (Dmitry) </li>
<li> <?php bugfix(29842); ?> (soapclient return null value). (Dmitry) </li>
<li> <?php bugfix(29839); ?> (incorrect convert (xml:lang to lang)). (Dmitry) </li>
<li> <?php bugfix(29830); ?> (SoapServer::setClass() should not export non-public methods). (Dmitry) </li>
<li> <?php bugfix(29828); ?> (Interfaces no longer work). (Marcus) </li>
<li> <?php bugfix(29821); ?> (Fixed possible crashes in convert_uudecode() on invalid data). (Ilia) </li>
<li> <?php bugfix(29808); ?> (array_count_values() breaks with numeric strings). (Ilia) </li>
<li> <?php bugfix(29805); ?> (HTTP Authentication Issues). (Uwe Schindler) </li>
<li> <?php bugfix(29795); ?> (SegFault with Soap and Amazon's Web Services). (Dmitry) </li>
<li> <?php bugfix(29737); ?> (ip2long should return -1 if IP is 255.255.255.255 and FALSE on error). (Tony) </li>
<li> <?php bugfix(29711); ?> (Changed ext/xml to default to UTF-8 output). (Rob) </li>
<li> <?php bugfix(29678); ?> (opendir() with ftp:// wrapper segfaults if path does not have trailing slash). (Ilia) </li>
<li> <?php bugfix(29657); ?> (xml_* functions throw non descriptive error).  (Christian, Rob) </li>
<li> <?php bugfix(29656); ?> (segfault on result and statement properties). (Georg) </li>
<li> <?php bugfix(29566); ?> (foreach/string handling strangeness (crash)). (Dmitry) </li>
<li> <?php bugfix(29447); ?> (Reflection API issues). (Marcus) </li>
<li> <?php bugfix(29296); ?> (Added sslv2 and sslv3 transports). (Wez) </li>
<li> <?php bugfix(29283); ?> (Invalid statement handle in mysqli on execute). (Georg) </li>
<li> <?php bugfix(29913); ?> (parse_url() is now binary safe). (Ilia) </li>
<li> <?php bugfix(27994); ?> (segfault with Soapserver when WSDL-Cache is enabled).  (Dmitry) </li>
<li> <?php bugfix(27791); ?> (Apache 2.0 SAPI build against Apache 2 HEAD). (Joe Orton, Derick) </li>
<li> <?php bugfix(26737); ?> (private/protected properties not serialized when user declared method __sleep() exists). E_NOTICE thrown when __sleep() returns name of non-existing member. (Andrey, Curt)</li>
</ul>

<hr />

<a name="5.0.1"></a>
<h3>Version 5.0.1</h3>
<b>12-Aug-2004</b>
<ul>
<li> Changed destructor mechanism so that destructors are called prior to request shutdown. (Marcus) </li>
<li> Rewritten UNIX and Windows install help files. (Documentation Team) </li>
<li> Updated several libraries bundled with the windows release which now includes libxml2-2.6.11, libxslt-1.1.7 and iconv-1.9.1. (Rob, Edin) </li>
<li> Improved and moved ActiveScript SAPI to PECL.  (Wez) </li>
<li> Fixed unloading of dynamically loaded extensions.  (Marcus, kameshj at fastmail dot fm) </li> 
<li> Fixed ReflectionClass::getMethod() and ReflectionClass::getProperty() to raise an ReflectionException instead of returning NULL on failure.  (Sebastian) </li>
<li> Fixed convert.* filters to consume remaining buckets_in on flush. (Sara) </li>
<li> Fixed bug in mysqli->client_version. (Georg) </li>
<li><?php bugfix(29606); ?> (php_strip_whitespace() prints to stdout rather then returning the value). (Ilia) </li>
<li><?php bugfix(29577); ?> (MYSQLI_CLIENT_FOUND_ROWS undefined) (Georg) </li>
<li><?php bugfix(29573); ?> (Segmentation fault, when exception thrown within PHP function called from XSLT). (Christian) </li>
<li><?php bugfix(29522); ?> (accessing properties without connection) (Georg) </li>
<li><?php bugfix(29505); ?> (get_class_vars() severely broken when used with arrays).  (Marcus) </li>
<li><?php bugfix(29490); ?> (.Net object instantiation failed). (Michael Sisolak).  </li>
<li><?php bugfix(29474); ?> (win32: usleep() doesn't work). (Wez) </li>
<li><?php bugfix(29449); ?> (win32: feof() hangs on empty tcp stream). (Wez) </li>
<li><?php bugfix(29437); ?> (Possible crash inside array_walk_recursive()). (Ilia) </li>
<li><?php bugfix(29431); ?> (crash when parsing invalid address; invalid address returned by stream_socket_recvfrom(), stream_socket_getname()). (Wez) </li>
<li><?php bugfix(29409); ?> (Segfault in PHP functions called from XSLT). (Rob) </li>
<li><?php bugfix(29395); ?> (sqlite_escape_string() returns bogus data on empty strings). (Ilia, Tony) </li>
<li><?php bugfix(29392); ?> (com_dotnet crashes when echo'ing an object). (Wez) </li>
<li><?php bugfix(29368); ?> (The destructor is called when an exception is thrown from the constructor). (Marcus) </li>
<li><?php bugfix(29354); ?> (Exception constructor marked as both public and protected).  (Marcus) </li>
<li><?php bugfix(29342); ?> (strtotime() does not handle empty date string properly).  (Ilia) </li>
<li><?php bugfix(29340); ?> (win32 build produces invalid php_ifx.dll). (Edin) </li>
<li><?php bugfix(29335); ?> (fetch functions now use MYSQLI_BOTH as default) (Georg) </li>
<li><?php bugfix(29291); ?> (get_class_vars() return names with NULLs). (Marcus) </li>
<li><?php bugfix(29264); ?> (gettext extension not working). (Edin) </li>
<li><?php bugfix(29258); ?> (variant_date_from_timestamp() does not honour timezone).  (Wez) </li>
<li><?php bugfix(29256); ?> (error when sending large packets on a socket). (Dmitry) </li>
<li><?php bugfix(29236); ?> (memory error when wsdl-cache is enabled). (Dmitry) </li>
<li><?php bugfix(29147); ?> (Compile Error in mnoGoSearch functions). (Sergey, Antony) </li>
<li><?php bugfix(29132); ?> ($_SERVER["PHP_AUTH_USER"] isn't defined). (Stefan) </li>
<li><?php bugfix(29119); ?> (html_entity_decode() misbehaves with UTF-8). (Moriyoshi) </li>
<li><?php bugfix(29109); ?> (SoapFault exception: [WSDL] Out of memory). (Dmitry) </li>
<li><?php bugfix(29061); ?> (soap extension segfaults). (Dmitry) </li>
<li><?php bugfix(28985); ?> (__getTypes() returning nothing on complex WSDL). (Dmitry) </li>
<li><?php bugfix(28969); ?> (Wrong data encoding of special characters). (Dmitry) </li>
<li><?php bugfix(28895); ?> (ReflectionClass::isAbstract always returns false). (Marcus) </li>
<li><?php bugfix(28829); ?> (Thread-unsafety in bcmath elementary values). (Sara) </li>
<li><?php bugfix(28464); ?> (catch() does not catch exceptions by interfaces). (Marcus) </li>
</ul>

<hr />

<a name="5.0.0"></a>
<h3>Version 5.0.0</h3>
<b>13-Jul-2004</b>
<ul>
<li>Updated PCRE to provide better error handling in certain cases. (Andrei)</li>
<li>Changed doc comments to require a single white space after '/**'. (Marcus)</li>
<li>Fixed strip_tags() to correctly handle '\0' characters. (Stefan)</li>
<li><?php bugfix(29019); ?> (Database not closing). (Marcus)</li>
<li><?php bugfix(29008); ?> (array_combine() does not handle non-numeric/string keys). (Ilia)</li>
<li><?php bugfix(28999); ?> (fixed behaviour of exec() to work as it did in 4.X). (Ilia)</li>
<li><?php bugfix(28895); ?> (ReflectionClass::isAbstract always returns false). (Marcus)</li>
<li><?php bugfix(28868); ?> (Internal filter registry not thread safe). (Sara)</li>
<li><?php bugfix(28851); ?> (call_user_func_array has typo in error message). (Marcus)</li>
<li><?php bugfix(28831); ?> (ArrayObject::offsetGet() does the work of offsetUnset()). (Marcus)</li>
<li><?php bugfix(28822); ?> (ArrayObject::offsetExists() works inverted). (Marcus)</li>
<li><?php bugfix(28789); ?> (ReflectionProperty getValue() fails on public static members). (Marcus)</li>
<li><?php bugfix(28771); ?> (Segfault when using xslt and clone). (Rob)</li>
<li><?php bugfix(28751); ?> (SoapServer does not call _autoload()). (Dmitry)</li>
<li><?php bugfix(28739); ?> (array_*diff() and array_*intersect() not clearing the fci cache before work). (Andrey)</li>
<li><?php bugfix(28721); ?> (appendChild() and insertBefore() unset DOMText).(Rob)</li>
<li><?php bugfix(28702); ?> (SOAP does not parse WSDL service address correctly). (Dmitry)</li>
<li><?php bugfix(28699); ?> (Reflection api bugs). (Marcus)</li>
<li><?php bugfix(28694); ?> (ReflectionExtension::getFunctions() crashes PHP). (Marcus)</li>
<li><?php bugfix(28512); ?> (Allocate enough space to store MSSQL data). (Frank)</li>
<li><?php bugfix(28325); ?> (Circular references not properly serialised). (Moriyoshi)</li>
</ul>

<hr />

<a name="5.0.0RC3"></a>
<h3>Version 5.0.0 Release Candidate 3</h3>
<b>8-Jun-2004</b>
<ul>
<li>Moved the PDFLib extension to PECL. (Wez)</li>
<li>Added MySQL 4.1.2-alpha and 4.1.3-beta support to MySQLI extension. (Georg)</li>
<li>Added support for dumping private/protected properties to var_dump().  (Andrey)</li>
<li>Added count() support for COM arrays. (Wez)</li>
<li>Added Firebird/InterBase UDF source that allows PHP functions to be called from SQL (Ard)</li>
<li>Changed user error handler mechanism to relay to built-in error handler if it returns false. (Andrei) </li>
<li>Changed class type hints for function parameters to not allow the passing of NULL values. (Andi)</li>
<li>Changed tidy_node to tidyNode and removed tidy_exception. (John)</li>
<li>Fixed ip2long() to return FALSE if an IP address passed to this function is not valid. (Derick)</li>
<li>Fixed memory leak in memory manager. (Andi)</li>
<li>Fixed problem with exceptions returning from include(). (Dmitry)</li>
<li><?php bugfix(28641); ?> (Instance of Interface). (Marcus)</li>
<li><?php bugfix(28430); ?> (Extending mysqli class). (Georg)</li>
<li><?php bugfix(28311); ?> (Transparency detection code is off by 1). (Ilia, pikeman at pikeman dot sytes dot net)</li>
<li><?php bugfix(28304); ?> (Missing bounds check inside imagefilter()). (Ilia)</li>
<li><?php bugfix(28300); ?> (Userspace stream/filter names forced to lowercase). (Sara)</li>
<li><?php bugfix(28287); ?> (stream_*_register() not calling __autoload()). (Sara)</li>
<li><?php bugfix(28267); ?> (php_image_filter_contrast calls gdImageBrightness). (Ilia)</li>
<li><?php bugfix(28239); ?> (No results returned on SOAP call, no error given). (Dmitry)</li>
<li><?php bugfix(28205); ?> (num_rows property for statement object). (Georg)</li>
<li><?php bugfix(28161); ?> (COM: Array style properties could not be accessed). (Wez)</li>
<li><?php bugfix(28125); ?> (ArrayObject leaks when accessing elements). (Marcus)</li>
<li><?php bugfix(28100); ?> (NULL parameter support for mysqli_ssl_set). (Georg)</li>
<li><?php bugfix(28099); ?> (ArrayObject doesn't implement ArrayAccess). (Marcus)</li>
<li><?php bugfix(27929); ?> (SPL: change visibility of ArrayIterator::__construct). (Marcus)</li>
<li><?php bugfix(27640); ?> (memory leak of registered_zend_ini_directives).  (Dmitry)</li>
<li><?php bugfix(27063); ?> (SPL: ArrayObject does not handle PPP correctly). (Marcus)</li>
</ul>

<hr />


<a name="5.0.0RC2"></a>
<h3>Version 5.0.0 Release Candidate 2</h3>
<b>25-Apr-2004</b>
<ul>
<li> Implementing an interface/abstract method with the wrong prototype is now
  a fatal error. (Zeev)
</li>
<li> Reimplemented zend.ze1_compatibility_mode to have better PHP 4 compliance.
  (Dmitry, Andi)
</li>
<li> Under CLI, fclose() on php://stdin, php://stdout and php://stderr will now
  close the real stream.  Please update your CLI scripts to use STDIN, STDOUT
  and STDERR constants instead of fopen()/fclose(). (Wez)
</li>
<li> Moved yaz extension to PECL. (Wez)
</li>
<li> Added pty support to proc_open(). (Wez)
</li>
<li> Added possibility to check in which extension an internal class was defined 
  in using reflection API. (Marcus)
</li>
<li> Changed tidy error handling to no longer use exceptions and 
  renamed the "error_buf" property to errorBuffer. (John)
</li>
<li> Changed class and method names to use studlyCaps convention. (Marcus)
</li>
<li> Changed language parser to throw errors when a non-empty signature is used in
  a destructor definition. (Marcus)
</li>
<li> Changed HTTP file uploads not to throw E_WARNINGs and E_NOTICEs. The error 
  value in the $_FILES global should be used for error handling. (Derick)
</li>
<li> Changed __construct() to always take precedence over old style constructor.
  (Dmitry)
</li>
<li> Fixed handling of return values from storred procedures in mssql_execute()
  with multiple result sets returned. (Frank)
</li>
<li> <?php bugfix(28096); ?> (stream_socket_accept() doesn't work with ssl). (Wez)
</li>
<li> <?php bugfix(28007); ?> (compile mssql extension with old versions of FreeTDS
  fails). (Frank)
</li>
<li> <?php bugfix(27997); ?> (SPL: Crash with getInnerIterator()). (Marcus)
</li>
<li> <?php bugfix(27974); ?> (COM doesn't pass array parameters). (Wez)
</li>
<li> <?php bugfix(27928); ?> (sqlite incorrectly handles invalid filenames). (Ilia)
</li>
<li> <?php bugfix(27923); ?> (in some cases using foreach() to iterate over values
  led to a false error message about the key being a reference). (Adam)
</li>
<li> <?php bugfix(27865); ?> (STDIN, STDOUT, STDERR are dup()d under CLI). (Wez)
</li>
<li> <?php bugfix(27821); ?> (xml_parse() segfaults when xml_set_object() is called from
  class method). (Andi, Rob)
</li>
<li> <?php bugfix(27742); ?> (WDSL SOAP Parsing Schema bug). (Dmitry)
</li>
<li> <?php bugfix(27722); ?> (Segfault on schema without targetNamespace). (Dmitry)
</li>
<li> <?php bugfix(27719); ?> (mktime issues on and around DST changeover). (Rasmus)
</li>
<li> <?php bugfix(27681); ?> (soap extension fails without HAVE_TM_GMTOFF). (Dmitry)
</li>
<li> <?php bugfix(27641); ?> (Object cloning in ze1_compatibility_mode was reimplemented)
  (Dmitry, Andi)
</li>
<li> <?php bugfix(27628); ?> (Simplify the process of making a POST request via stream
  context). (Ilia)
</li>
<li> <?php bugfix(27619); ?> (filters not applied to pre-buffered stream data). (Sara)
</li>
<li> <?php bugfix(27519); ?> (Reflection_Function constructor crashes with non-existant 
  function's name). (Marcus)
</li>
<li> <?php bugfix(27469); ?> (serialize() objects of incomplete class). (Dmitry)
</li>
<li> <?php bugfix(27457); ?> (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li> <?php bugfix(27397); ?> (debug_backtrace() not showing function arguments). (Zeev)
</li>
<li> <?php bugfix(27283); ?> (The last catch statement was sometimes skipped). (Andi)
</li>
<li> <?php bugfix(26441); ?> (When __set() returned a value it corrupted it). (Andi)
</li>
<li> <?php bugfix(19749); ?> (shouldn't mmap() files larger than memory_limit). (Wez)
</li>
</ul>

<hr />

<a name="5.0.0RC1"></a>
<h3>Version 5.0.0 Release Candidate 1</h3>
<b>18-Mar-2004</b>
<ul>
<li>Fixed numerous bugs with the just-in-time auto-global initialization, that
  could cause $_SERVER, $argv/$argc and other variables not to work properly.
  (Zeev)
</li>
<li>Fixed data corruption with constant assignments to object properties. (Zeev)
</li>
<li>Changed __toString() to be called automatically only with print and echo
  statements. (Andi)
</li>
<li>Replaced the exec_finished hook by the zend_post_deactive hook for
  extensions. The new hook will be run after the symbol table and destructors
  are run. (Derick)
</li>
<li>Fixed possible crash when internal get_method() is not defined. (Andi)
</li>
<li>Fixed calling methods using call_user_func() in conjunction with 
  the array("Class","Method") syntax to use the scope of the PHP user function.
  (Dmitry)
</li>
<li>Fixed php-cgi to not ignore command-line switches when run in a web context.
  This fixes our test cases allowing INI with GET sections to work. (Rasmus)
</li>
<li>Fixed getopt() so it works without $_SERVER. (Rasmus, bfrance)
</li>
<li>Added support for PHP 4 style object comparisons which is enabled in
  ze1_compatiblity_mode. (Andi)
</li>
<li>Added support for PHP 4 style object conversion to long, double, and boolean
  values which is enabled in ze1_compatibility_mode. (Andi, Stas)
</li>
<li>Allow object oriented extensions to overload comparison functions and other
  operations. Solves problems using SimpleXML values. (Andi, Zeev)
</li>
<li>Fixed crash when accessing a class constant with a value which in turn is
  also a constant. (Dmitry)
</li>
<li>Fixed object's truth value conversion. It is always true unless
  ze1_compatibility_mode is on in which it behaves like in PHP 4. (Stas)
</li>
<li>Improved out of memory handling in new memory manager. (Stas)
</li>
<li>Fixed crash when an object references itself during destructor call. (Andi)
</li>
<li>Fixed crash in foreach() when iterating over object properties or a method's
  return values. (Andi)
</li>
<li>Fixed crash when an exception is thrown in a destructor. Such exceptions are
  now ignored as destruction happens out of context at no definite time. (Andi)
</li>
<li>Fixed crashes in exception handling. (Dmitry, Andi)
</li>
<li>Changed prototype checks so that they aren't done on constructors. (Andi)
</li>
<li>Changed prototype checks to output an E_STRICT message instead of
  an E_COMPILE_ERROR. (Andi)
</li>
<li>Changed Iterator::has_more() to Iterator::valid(). (Marcus)
</li>
<li>Upgraded bundled oniguruma library to version 2.2.2. (Rui, Moriyoshi)
</li>
<li>Added mb_list_encoding() to return an array with all mbstring supported
  encodings. (Derick)
</li>
<li>Added support for more ISO8601 datetime formats in strtotime(). (Moriyoshi)
  . Timezone specifier (ex. "20040301T02:00:00+19:00")
  . Week specifier (ex. "1997W021")
</li>
<li>Renamed php.ini option "zend2.implicit_clone" to 
  "zend.ze1_compatibility_mode" as it doesn't only affect implicit cloning.
  (Andi, Zeev)
</li>
<li>Methods that override parent methods are now subject to prototype checking,
  and have to be compatible with the method they're overriding - this check is 
  disabled in compatibility mode. (Andi, Zeev)
</li>
<li>Fixed crash in php_ini_scanned_files() when no additional INI files were
  actually parsed. (Jon)
</li>
<li>Fixed bug in gdImageFilledRectangle in the bundled GD library, that required
  x1 < x2 and y1 < y2 for coordinates. (Derick)
</li>
<li>Fixed crash with foreach() and temporary objects($obj->method()->a ...) where
  method returns a non-referenced object. (Andi, Zeev)
</li>
<li>Fixed problem preventing startup errors from being displayed. (Marcus)
</li>
<li>Fixed start-up problem if both SPL and SimpleXML were enabled. The double
  initialization of apache 1.3 was causing problems here. (Marcus, Derick)
</li>
<li><?php bugfix(27606); ?> (Expression must be a modifiable lvalue compiler error).
  (Derick)
</li>
<li><?php bugfix(27597); ?> (pg_fetch_array not returning false). (Marcus)
</li>
<li><?php bugfix(27586); ?> (ArrayObject::getIterator crashes with [] assignment). 
  (Marcus)
</li>
<li><?php bugfix(27537); ?> (Objects pointing to each other segfaults). (Dmitry)
</li>
<li><?php bugfix(27535); ?> (Problem with object freeing mechanism). (Dmitry)
</li>
<li><?php bugfix(27504); ?> (Visibility bugs in call_user_function()). (Dmitry)
</li>
<li><?php bugfix(27457); ?> (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li><?php bugfix(27338); ?> (memory leak inside tsrm_virtual_cwd.c on win32). (Ilia)
</li>
<li><?php bugfix(27291); ?> (get_browser matches browscap.ini patterns incorrectly). 
  (Jay)
</li>
<li><?php bugfix(27287); ?> (wddx segfaults during deserialization). (Moriyoshi)
</li>
<li><?php bugfix(27263); ?> (session extension crashes when unserializing referenced
  values / objects). (Moriyoshi)
</li>
<li><?php bugfix(27237); ?> (Working with simplexml crashes apache2). (Rob)
</li>
<li><?php bugfix(27227); ?> (Mixed case class names causes Fatal Error in Constructor 
  call). (Marcus)
</li>
<li><?php bugfix(27125); ?> (strval() doesn't work for objects with __toString()).
  (Marcus)
</li>
<li><?php bugfix(27123); ?> (Fix crash caused by bug in get_object_vars()). (Andi)
</li>
<li><?php bugfix(26677); ?> (mbstring compile errors with IRIX compiler).
  (K.Kosako <kosako at sofnec dot co dot jp>, Rui, Moriyoshi)
</li>
<li><?php bugfix(26206); ?> (register_long_arrays breaks superglobals). (Zeev)
</li>
<li><?php bugfix(25724); ?> (argv and argc not defined). (Zeev)
</li>
</ul>

<hr />

<a name="5.0.0b4"></a>
<h3>Version 5.0.0 Beta 4</h3>
<b>12-Feb-2004</b>
<ul>
<li>Changed exceptions so that they must now inherit from the built-in Exception
class. This allows for a general catch(Exception $e) statement to catch all
exceptions. (Andi, Zeev)</li>
<li>Added SPL extension. (Marcus, Derick)</li>
<li>Added checks for invalid characters in a cookie name and cookie data
into set[raw]cookie(). (Brian)</li>
<li>Added support for ++ and += (and similar) to SimpleXML. (Andi, Zeev)</li>
<li>Added infrastructure for ++ and += (and similar) to object overloading
modules. (Andi, Zeev)</li>
<li>Added error message when trying to re-assign to $this variable. (Zeev, Andi)</li>
<li>Added support for an interface to extend another interface. (Zeev)</li>
<li>Added new pspell functions: (Brian)</li>
  <ul>
    <li>pspell_config_dict_dir()</li>
    <li>pspell_config_data_dir()</li>
  </ul>
<li>Added new Interbase functions: (Ard)</li>
  <ul>
    <li>ibase_service_attach() and ibase_service_detach().</li>
    <li>ibase_backup() and ibase_restore().</li>
    <li>ibase_maintain_db(), ibase_db_info() and ibase_server_info().</li>
  </ul>
<li>Added context option "http"/"request_fulluri" to send entire URI in request
which is required format for some proxies. (Sara)</li>
<li>Added optional third parameter 'strict' to array_keys(). (Andrey)</li>
<li>Added stream_lock() method to userspace streams interface. (Hartmut, Wez)</li>
<li>Added xsltprocessor-&gt;registerPHPFunctions(). (Christian)</li>
<li>Readded support for using classes before they are declared according to
the behavior in PHP 4. This won't work with classes who are using PHP 5
features such as interfaces. (Zeev, Andi)</li>
<li>Completely overhauled SimpleXML extension. (Marcus, Rob, Sterling)</li>
<li>Upgraded bundled SQLite library to version 2.8.11. (Ilia, Wez)</li>
<li>Improved destructor implementation to always call destructors on clean
shutdown. An order of destruction is not guaranteed. (Zeev, Andi)</li>
<li>Redesigned exception support. This fixes many bugs in the previous design
such as nested try's and problems with overloaded extensions. (Zeev, Andi)</li>
<li>Redesigned clone by adding a clone keyword (clone $obj) and copying all
properties before __clone() is called. Also allows calling parent __clone
function by using parent::__clone(). (Zeev, Andi)</li>
<li>Fixed interfaces to check for function return-by-reference equality when
inheriting and implementing interfaces. (Andi, Zeev)</li>
<li>Fixed foreach() to respect property visibility. (Marcus)</li>
<li>Fixed problem with parse error in include() file not stopping PHP's
execution. (Ilia)</li>
<li>Fixed var_export() to show public, protected and private modifiers properly.
(Derick)</li>
<li>Fixed problems with longlong values in mysqli. (Georg)</li>
<li>Fixed class name case preserving of user defined classes. (Marcus)</li>
<li><?php bugfix(27145); ?> (Unmangle private/protected property names before printing
them inside error messages). (Ilia)</li>
<li><?php bugfix(27103); ?> (preg_split('//u') incorrectly splits UTF-8 strings into
octets). (Moriyoshi)</li>
<li><?php bugfix(27042); ?> (SPL: SeekableIterator seek() broken). (Marcus)</li>
<li><?php bugfix(27008); ?> (Every class method can be called as static). (Marcus)</li>
<li><?php bugfix(26938); ?> (exec() has problems reading long lines).
(Ilia, runekl[at]opoint[dot]com</li>
<li><?php bugfix(26947); ?> (ext/dom: Crash when using DomDocument::getElementById()).
(Christian)</li>
<li><?php bugfix(26911); ?> (crash in sqlite extension when fetching data from empty
queries). (Ilia)</li>
<li><?php bugfix(26844); ?> (ext/mime_magic: magic file validation broken). (Jani)</li>
<li><?php bugfix(26819); ?> (http_build_query() crashes on NULL output). (Ilia)</li>
<li><?php bugfix(26817); ?> (http_build_query() does not handle private &amp; protected
object properties correctly). (Ilia)</li>
<li><?php bugfix(26815); ?> (foreach of (DOM) childnodes crashes when Xinclude is used).
(Rob)</li>
<li><?php bugfix(26796); ?> (SQLite causes crashes with other extensions *connect()
calls). (Marcus)</li>
<li><?php bugfix(26762); ?> (unserialize() produces lowercase classnames). (Marcus)</li>
<li><?php bugfix(26743); ?> (getElementsByTagName doesn't work properly). (Rob)</li>
<li><?php bugfix(26736); ?> (__autoload not invoked for parent classes). (Marcus)</li>
<li><?php bugfix(26723); ?> (domNode::appendChild() changes child node namespace). (Rob)</li>
<li><?php bugfix(26697); ?> (calling class_exists() on a nonexistent class in __autoload
results in segfault). (Marcus)</li>
<li><?php bugfix(26696); ?> (string index in a switch() crashes with multiple matches).
(Andi)</li>
<li><?php bugfix(26695); ?> (Reflection API does not recognize mixed-case class hints).
(Marcus)</li>
<li><?php bugfix(26690); ?> (make xsltProcessor-&gt;transformToUri use streams wrappers).
(Ilia)</li>
<li><?php bugfix(26680); ?> (Added version check in mysqli_report_index). (Georg)</li>
<li><?php bugfix(26675); ?> (Segfault on ArrayAccess use). (Marcus)</li>
<li><?php bugfix(26640); ?> (__autoload() not invoked by Reflection classes). (Jani)</li>
<li><?php bugfix(26543); ?> (call_user_func() broken for self, parent). (Stanislav)</li>
<li><?php bugfix(26077); ?> (memory leak when new() result is not assigned and no
constructor is defined). (Stanislav)</li>
<li><?php bugfix(26065); ?> (Crash when nesting classes). (Marcus)</li>
<li><?php bugfix(25816); ?> (disallow arrays in class constants). (Stanislav)</li>
<li><?php bugfix(25329); ?> (sqlite_create_function with method and reference to $this).
(Marcus)</li>
<li><?php bugfix(25038); ?> (call_user_func() issues a warning if function throws an
exception). (Marcus)</li>
<li><?php bugfix(24608); ?> (__set not triggered when overloading with array).
(Stanislav)</li>
<li><?php bugfix(24243); ?> (enabling browscap causes segfault). (Wez)</li>
</ul>

<hr />

<a name="5.0.0b3"></a>
<h3>Version 5.0.0 Beta 3</h3>
<b>21-Dec-2003</b>
<ul>
<li>Bundled new tidy extension (John, Wez)</li>
<li>Upgraded PCRE library to version 4.5. (Andrei)</li>
<li>Dropped Windows 95 support. (Andi)</li>
<li>Moved extensions to PECL:</li>
 <ul>
  <li>ext/crack (Jani, Derick)</li>
  <li>ext/db (Jani, Derick)</li>
  <li>ext/mcal (Jani, Derick)</li>
  <li>ext/qtdom (Jani, Derick)</li>
  <li>ext/notes (Wez)</li>
 </ul>
<li>Added 'c' modifier to date() which returns the date in the ISO
8601 format.  (Derick, Manuzhai)</li>
<li>Added an optional parameter to microtime() to get the time as
float. (Andrey)</li>
<li>Added MacRoman encoding support to htmlentities(). (Derick,
Marcus Bointon)</li>
<li>Added possibility to call PHP functions as XSLT-functions.
(Christian)</li>
<li>Added possibility to prevent PHP from registering variables when
input filter.  support is used. (Derick)</li>
<li>Added iconv stream filter (convert.iconv.*). (Moriyoshi)</li>
<li>Added EXSLT support in ext/xsl. (Christian)</li>
<li>Added qdbm handler for dba extension. (mg at iceni dot pl, Marcus)</li>
<li>Added new functions:</li>
 <ul>
  <li>dba_key_split() to split inifile keys in an array. (Marcus)</li>
  <li>time_nanosleep() signal safe sleep (Magnus, Ilia)</li>
  <li>headers_list(). (Sara)</li>
  <li>php_strip_whitespace(). strip whitespace &amp; comments from a
  script. (Ilia)</li>
  <li>php_check_syntax(). check php script for parse errors. (Ilia)</li>
  <li>image_type_to_extension(). return extension based on image type.
  (Ilia)</li>
  <li>stream_socket_sendto() and stream_socket_recvfrom(). (Wez)</li>
  <li>iconv_mime_decode_headers(). (Moriyoshi)</li>
  <li>get_declared_interfaces(). (Andrey, Marcus)</li>
  <li>sqlite_fetch_column_types(). (Ilia)</li>
 </ul>
<li>Added proxy support to http:// wrapper. (Sara)</li>
<li>Added rename(), rmdir() and mkdir() support to userstreams.
(Sara)</li>
<li>Added rename(), rmdir() and mkdir() support to ftp:// wrapper.
(Sara)</li>
<li>Changed rename(), rmdir() and mkdir() to be routed via streams
API. (Sara)</li>
<li>Changed stat() and family to be routed via streams API. (Sara)</li>
<li>Fixed include_once() / require_once() on Windows to honor
case-insensitivity; of files. (Andi)</li>
<li>Fixed get_declared_classes() to return only classes. (Andrey,
Marcus)</li>
<li>Fixed __autoload() to preserve case of the passed class name.
(Andi)</li>
<li><?php bugfix(26615); ?> () (runekl at opoint dot com, Derick)</li>
<li><?php bugfix(26591); ?> ("__autoload threw an exception" during an
uncaught). (Marcus)</li>
<li><?php bugfix(26534); ?> (stream_get_meta_data() -&gt; Access Violation).
(Wez)</li>
<li><?php bugfix(26528); ?> (HTML entities are not being decoded by
xml_parse()/xml_parse_into_struct()). (Ilia)</li>
<li><?php bugfix(26182); ?> (Object properties created redundantly). (Andi)</li>
<li><?php bugfix(26156); ?> (REPLACE_ZVAL_VALUE works on uninit stack-based
zvals). (Moriyoshi)</li>
<li><?php bugfix(26083); ?> (Non-working write support in ext/dom). (Ilia)</li>
<li><?php bugfix(26072); ?> (--disable-libxml does not work). (Jani)</li>
<li><?php bugfix(26001); ?> (serialize crashes when accessing an overloaded
object that has no properties (NULL hashtable)). (Wez)</li>
<li><?php bugfix(25664); ?> (COM crashes when calling a Delphi implementations
of ITypeInfo). (Wez)</li>
<li><?php bugfix(24837); ?> (Incorrect behaviour of PPP using foreach).
(Marcus)</li>
<li><?php bugfix(24693); ?> (Allow session.use_trans_sid to be
enabled/disabled from inside the script). (Ilia)</li>
<li><?php bugfix(24394); ?> (Serializing cross-referenced objects causes
segfault). (Moriyoshi)</li>
</ul>

<hr />

<a name="5.0.0b2"></a>
<h3>Version 5.0.0 Beta 2</h3>
<b>30-Oct-2003</b>
<ul>
<li>Lots and lots of changes in the Zend Engine 2 since beta 1:
 <ul>
  <li>Added Iterators</li>
  <li>Improved memory manager</li>
  <li>Added Reflection API</li>
  <li>Removed the not so working namespaces support</li>
  <li>Removed support for expressions within constant declerations.</li>
  <li>You can read about most changes in ZEND_CHANGES under the Zend
  directory.</li>
 </ul>
<li>Improved the DBX extension: (Marc)</li>
 <ul>
  <li>Added DBX_RESULT_UNBUFFERED flag for dbx_query().</li>
  <li>Added dbx_fetch_row()</li>
  <li>Added SQLite support.</li>
 </ul>
<li>Improved the Interbase extension: (Ard Biesheuvel)</li>
 <ul>
  <li>Added support for multiple databases into ibase_trans()</li>
  <li>Added support for CREATE DATABASE, SET TRANSACTION and EXECUTE
  PROCEDURE statements into ibase_query()</li>
  <li>Added ibase_commit_ret() and ibase_rollback_ret()</li>
  <li>Added ibase_drop_db()</li>
  <li>Added ibase_gen_id()</li>
  <li>Added ibase_name_result()</li>
  <li>Added ibase_errcode()</li>
  <li>Added ibase_affected_rows() and ibase_num_params()</li>
  <li>Added ibase_param_info()</li>
  <li>Added ibase_wait_event()</li>
  <li>Added ibase_set_event_handler() and ibase_free_event_handler()</li>
 </ul>
<li>Added new COM extension with integrated .Net support. (Wez)</li>
<li>Added new functions:</li>
 <ul>
  <li>setrawcookie(). (Brian)</li>
  <li>pg_version(). (Marcus)</li>
  <li>dbase_get_header_info(). (Zak)</li>
  <li>snmp_read_mib(). (Jani)</li>
  <li>http_build_query(). (Sara)</li>
  <li>ftp_alloc(). (Sara)</li>
  <li>array_udiff(). (Andrey)</li>
  <li>array_udiff_assoc(). (Andrey)</li>
  <li>array_udiff_uassoc(). (Andrey)</li>
  <li>array_diff_uassoc(). (Andrey)</li>
  <li>convert_uuencode(). (Ilia)</li>
  <li>convert_uudecode(). (Ilia)</li>
  <li>substr_compare(). (Ilia)</li>
  <li>pcntl_wait(). (GeorgeS)</li>
 </ul>
<li>Added "resume_pos" context option to "ftp://" wrapper. (Sara)</li>
<li>Added optional parameter to OCIWriteTemporaryLob() to specify
the type of LOB (Patch by Novicky Marek &lt;novicky@aarongroup.cz&gt;).
(Thies)</li>
<li>Added reflection API. (Andrei, George, Timm)</li>
<li>Changed length parameter in fgetcsv() to be optional. (Moriyoshi)</li>
<li>Fixed IPv6 support in MacOSX Panther. (Dan, Marko)</li>
<li>Fixed fgetcsv() to correctly handle international (non-ascii)
characters. (Moriyoshi)</li>
<li>Fixed support for &lt;![CDATA[]]&gt; fields within XML documents
in ext/xml. (Sterling)</li>
<li>Fixed visibility of __construct and __clone. (Marcus)</li>
<li><?php bugfix(26003); ?> (fgetcsv() not binary-safe on null bytes).
(Moriyoshi)</li>
<li><?php bugfix(25756); ?> (SimpleXML's validate_schema_file() broken).
(Moriyoshi)</li>
<li><?php bugfix(25581); ?> (getimagesize() returns incorrect values on
bitmap (os2) files). (Marcus)</li>
<li><?php bugfix(25494); ?> (array_merge*() allows non-arrays as argument).
(Jay)</li>
<li><?php bugfix(24766); ?> (strange result array from unpack()). (Moriyoshi)</li>
<li><?php bugfix(24729); ?> ($obj = new $className; causes crash when
$className is not set). (Marcus)</li>
<li><?php bugfix(24565); ?> (cannot read array elements received via
$_REQUEST). (Zeev)</li>
<li><?php bugfix(24445); ?> (get_parent_class() returns different values).
(Sterling, Stanislav)</li>
<li><?php bugfix(24403); ?> (preg_replace() problem: Using $this when not
in object context). (Zeev)</li>
<li><?php bugfix(24399); ?> (PEAR DB isError crash [instanceof_function
fault?]).  (Sterling, Marcus)</li>
<li><?php bugfix(24396); ?> (foreach ($k=>$v), the key $k is missing). (Zeev)</li>
<li><?php bugfix(24279); ?> (__get() crash when no value is returned). (Ilia)</li>
<li><?php bugfix(22367); ?> (undefined variable has a value). (Zeev)</li>
<li><?php bugfix(19859); ?> (allow fast_call_user_function to support __call).
(Stanislav)</li>
<li><?php bugfix(17997); ?> (Warning when switch() and reference are combined).
(Zeev)</li>
<li><?php bugfix(17988); ?> (strtotime failed to parse postgresql timestamp).
(Derick)</li>
</ul>

<hr />

<a name="5.0.0b1"></a>
<h3>Version 5.0.0 Beta 1</h3>
<b>29-Jun-2003</b>
<ul>
<li>Switch to using Zend Engine 2, which includes numerous engine level improvements.  
A full list is available at <a href="http://www.php.net/zend-engine-2.php">http://www.php.net/zend-engine-2.php</a>.
</li>
<li>The SQLite (<a href="http://www.hwaci.com/sw/sqlite/">http://www.hwaci.com/sw/sqlite/</a>) extension is now bundled and 
enabled by default. (Wez, Marcus, Tal)</li>
<li>Improved the speed of internal functions that use callbacks by 40% due to a 
new internal fast_call_user_function() function. (Sterling)</li>
<li>Completely Overhauled XML support (Rob, Sterling, Chregu, Marcus)
 <ul>
  <li>Brand new Simplexml extension</li>
  <li>New DOM extension</li>
  <li>New XSL extension</li>
  <li>Moved the old DOM-XML and XSLT extensions to PECL</li>
  <li>ext/xml can now use both libxml2 and expat to parse XML</li>
  <li>Removed bundled expat</li>
 </ul>
</li>
<li>Removed the bundled MySQL client library. (Sterling)</li>
<li>New php.ini options:
  <ul>
   <li>"session.hash_function" and "session.hash_bits_per_character". (Sascha)</li>
   <li>"mail.force_extra_paramaters". (Derick)</li>
   <li>"register_long_arrays". (Zeev)</li>
  </ul>
</li>
<li>Improved the streams support: (Wez, Sara, Ilia)
 <ul>
  <li>Improved performance of readfile(), fpassthru() and some internal streams
  operations under Win32.</li>
  <li>stream_socket_client() - similar to fsockopen(), but more powerful.</li>
  <li>stream_socket_server() - Creates a server socket.</li>
  <li>stream_socket_accept() - Accept a client connection.</li>
  <li>stream_socket_get_name() - Get local or remote name of socket.</li>
  <li>stream_copy_to_stream()</li>
  <li>stream_get_line() - Reads either the specified number of bytes or until 
  the ending string is found.</li>
  <li>Added context property to userspace streams object.</li>
  <li>Added generic crypto interface for streams (supports dynamic loading of 
  OpenSSL)</li>
  <li>Added lightweight streaming input abstraction to the Zend Engine scanners
  to provide uniform support for include()'ing data from PHP streams across
  all platforms.</li>
  <li>Added 'string.base64' stream filter.</li>
  <li>Renamed stream_register_wrapper() to stream_wrapper_register().</li>
  <li>Added "ftp://" wrapper support to opendir(), stat() and unlink().</li>
  <li>Added context options 'method', 'header' and 'content' for "http://" fopen 
  wrapper.</li>
 </ul>
</li>
<li>Improved the GD extension: (Pierre-Alain Joye, Ilia)
 <ul>
  <li>imagefilter() - Apply different filters to image. (Only available 
  with bundled GD library)</li>
  <li>Antialiased drawing support:
   <ul>
    <li>imageantialias() - (de)active antialias</li>
    <li>imageline() and imagepolygon() antialias support</li>
   </ul>
  </li>
 </ul>
</li>
<li>Changed the length parameter in fgetss() to be optional. (Moriyoshi)</li>
<li>Changed ini parser to allow for handling of quoted multi-line values. (Ilia)</li>
<li>Changed get_extension_funcs() to return list of the built-in Zend Engine 
functions if "zend" is specified as the module name. (Ilia)</li>
<li>Changed array_search() to accept also objects as a needle. (Moriyoshi)</li>
<li>Changed ext/mcrypt to require libmcrypt version 2.5.6 or greater. (Derick)</li>
<li>Changed uniqid() parameters to be optional and allow any prefix length. (Marcus)</li>
<li>Added new iconv functions. (Moriyoshi)
 <ul>
  <li>iconv_strlen()</li>
  <li>iconv_substr()</li>
  <li>iconv_strpos()</li>
  <li>iconv_strrpos()</li>
  <li>iconv_mime_decode()</li>
  <li>iconv_mime_encode()</li>
 </ul>
</li>
<li>Added misc. new functions:
 <ul>
  <li>ldap_sasl_bind(). (peter_c60@hotmail.com, Jani)</li>
  <li>imap_getacl(). (Dan, Holger Burbach)</li>
  <li>file_put_contents(). (Sterling)</li>
  <li>proc_nice() - Changes priority of the current process. (Ilia)</li>
  <li>pcntl_getpriority() and pcntl_setpriority(). (Ilia)</li>
  <li>idate(), date_sunrise() and date_sunset(). (Moshe Doron)</li>
  <li>strpbrk() - Searches a string for a list of characters. (Ilia)</li>
  <li>get_headers() - Returns headers sent by the server of the specified URL. (Ilia)</li>
  <li>str_split() - Breaks down a string into an array of elements based on length. (Ilia)</li>
  <li>array_walk_recursive(). (Ilia)</li>
  <li>array_combine(). (Andrey)</li>
 </ul>
</li>
<li>Added optional parameter to get_browser() to make it return an array. (Jay)</li>
<li>Added optional parameter to openssl_sign() to specify the hashing algorithm.(scott@planetscott.ca, Derick)</li>
<li>Added optional parameter to sha1(), sha1_file(), md5() and md5_file() which 
makes them return the digest as binary data. (Michael Bretterklieber, Derick)</li>
<li>Added optional parameter to mkdir() to make directory creation recursive. (Ilia)</li>
<li>Added optional parameter to file() which makes the result array not contain
the line endings and to skip empty lines. (Ilia)</li>
<li>Added new range() functionality:
 <ul>
  <li>Support for float modifier. (Ilia)</li>
  <li>Detection of numeric values inside strings passed as high &amp; low. (Ilia)</li>
  <li>Proper handle the situations where high == low. (Ilia)</li>
  <li>Added an optional step parameter. (Jon)</li>
 </ul>
</li>
<li>Added encoding detection feature for expat XML parser. (Adam Dickmeiss, Moriyoshi)</li>
<li>Added missing multibyte (unicode) support and numeric entity support to 
html_entity_decode(). (Moriyoshi)</li>
<li>Added IPv6 support to ext/sockets. (Sara)</li>
<li>Added input filter support. See README.input_filter for more info. (Rasmus)</li>
<li>Added a replace count for str_[i]replace(), see <?php bugl(8218); ?>. (Sara)</li>
<li>Fixed is_executable() to be available also on Windows. (Shane)</li>
<li>Fixed dirname() and strip_tags() to be binary-safe. (Moriyoshi)</li>
<li><?php bugfix(24098); ?> (crash in pathinfo()). (Ilia)</li>
<li><?php bugfix(21985); ?> and <?php bugl(22064); ?> (various mb_send_mail() issues). (Moriyoshi)</li>
<li><?php bugfix(21600); ?> (Assign by reference function call changes variable 
contents). (Zeev)</li>
</ul>

<?php site_footer(); ?>
