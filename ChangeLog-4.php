<?php
require_once 'prepend.inc';
commonheader("PHP 4 ChangeLog");
?>

<h1>PHP 4 ChangeLog</h1>

<a name="4.1.2"></a>
<h3>Version 4.1.2</h3>
<b>27-Feb-2002</b>
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

<a name="4.1.1"></a>
<h3>Version 4.1.1</h3>
<b>26-Dec-2001</b>
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
  bug #9878. Patch by bfoddy@mediaone.net. (jmoore)</li>
<li>Fixed bug in gmdate() timezone handling on Windows - bug #13885. (jmoore)</li>
<li>Fixed several crash bugs in the mcrypt extension. (Derick)</li>
<li>Made the mcrypt extension compile with the libmcrypt 2.2 series again.
  (Sterling)</li>
<li>Fixed a bug where the is_file() family of functions would in-correctly give
  an error when they were given filenames that didn't exist. (Sterling)</li>
<li>Fixed a bug in the strtotime() function where it was incorrectly recognizing
  GMT +0100 and GMT -0100. (Derick)</li>
</ul>

<a name="4.1.0"></a>
<h3>Version 4.1.0</h3>
<b>10-Dec-2001</b>
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
  Patch by Lawrence E. Widman <widman@cardiothink.com> (Jani)</li>
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
  regardless of the context.  (Andi & Zeev)</li>
<li>Introduced $_GET, $_POST, $_COOKIE, $_SERVER and $_ENV variables, which
  deprecate the old $HTTP_*_VARS arrays.  In addition to be much shorter to
  type - these variables are also available regardless of the scope, and 
  there's no need to import them using the 'global' statement.  (Andi & Zeev)</li>
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
  under Windows (Andi & Zeev)</li> 
<li>Improved request-shutdown performance significantly (Andi & Zeev, Zend
  Engine)</li>
<li>Added a few new math functions. (Jesus)</li>
<li>Bump bundled expat to 1.95.2 (Thies)</li>
<li>Improved the stability of OCIPlogon() after a database restart. (Thies)</li>
<li>Fixed __FILE__ in the CGI & Java servlet modes when used in the main script.
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
<li>Made assert() accept the array(&$obj, 'methodname') syntax. (Thies)</li>
<li>Made sure that OCI8 outbound variables are always zero-terminated. (Thies)</li>
<li>Fixed a bug that allowed users to spawn processes while using the 5th
  parameter to mail(). (Derick)</li>
<li>Added nl_langinfo() (when OS provides it) that returns locale.
<li>Fixed a major memory corruption bug in the thread safe version. (Zeev)</li>
<li>Fixed a crash when using the CURLOPT_WRITEHEADER option. (Sterling)</li>
<li>Added optional suffix removal parameter to basename(). (Hartmut)</li>
<li>Added new parameter UDM_PARAM_VARDIR ha in Udm_Set_Agent_Param() function to
  support alternative search data directory.  This requires mnogoSearch 3.1.13
  or later.
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
<li>Fixed #2181. Now zero is returned instead of an unset value for
  7-bit encoding and plain text body type. (Vlad)</li>
<li>Fixed a bug in call_user_*() functions that would not allow calling
  functions/methods that accepted parameters by reference. (Andrei)</li>
<li>Added com_release($obj) and com_addref($obj) functions and the related class
  members $obj->Release() and $obj->AddRef() to gain more control over the used
  COM components. (phanto)</li>
<li>Added an additional parameter to dotnet_load to specify the codepage (phanto)</li>
<li>Added peak memory logging. Use --enable-memory-limit to create a new Apache
  1.x logging directive "{mod_php_memory_usage}n" which will log the peak
  amount of memory used by the script. (Thies)</li>
<li>Made fstat() and stat() provide identical output by returning a numerical and
  string indexed array. (Jason)</li>
<li>Fixed memory leak upon re-registering constants. (Sascha, Zend Engine)</li>
</ul>

<a name="4.0.6"></a>
<h3>Version 4.0.6</h3>
<b>23-Jun-2001</b>
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
  before them. This fixed bug #10218. (Andrei)</li>
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

<?php echo hdelim(); ?>

<a name="4.0.5"></a>
<h3>Version 4.0.5</h3>
<b>30-Apr-2001</b>
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
<li>Fixed get_meta_tags() multiline bug #4556. (Sean)</li>
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

<?php echo hdelim(); ?>

<a name="4.0.4"></a>
<h3>Version 4.0.4</h3>
<b>19-Dec-2000</b>
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
<li>Put an end to BUG#4615 (kalowsky &amp; Eric Veldhuyzen)</li>
<li>Fixed realpath() in Virtual Directory mode (Daniel)</li>
<li>Integrated the Phil Nelson's bc math library routines into PHP, now that
  the license allows it (Phil Nelson &lt;phil@cs.wwu.edu&gt;)</li>
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

<?php echo hdelim(); ?>

<a name="4.0.3"></a>
<h3>Version 4.0.3</h3>
<b>11-Oct-2000</b>
<ul>
<li>Fixed a possible crash in -a interactive mode (Zeev, Zend Engine)</li>
<li>Added mysql_escape_string() (Peter A. Savitch and & Brian Wang)</li>
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
  print $obj->toString() (Andi, Zend Engine)</li>
</ul>

<?php echo hdelim(); ?>

<a name="4.0.2"></a>
<h3>Version 4.0.2</h3>
<b>29-Aug-2000</b>
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
  file (Andi & Zeev, Zend Engine)</li>
<li>Changed require_once() to work using the same table as include_once()
  (Andi & Zeev, Zend Engine)</li>
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
  (Ragnar Kjørstad)</li>
<li>Fixed warning when shutting down OCINLogon() connections. (Thies)</li>
<li>Fixed \n in session variables bug on Win32 (Stas)</li>
<li>OCIError() would sometimes not report failed connections. (Thies)</li>
<li>Fixed HEAD request bug on an Apache ErrorDocument redirect and preserve
  the status code across the redirect as well.  (Rasmus)</li>
<li>Added Olympus-specific tags to read_exif_data() (Rasmus)</li>
<li>Fixed bug in imap_fetchheader() where using FT_PREFETCHTEXT didn't return
  the body. Bug #4447. (Jani)</li>
<li>Fixed exec() returning "\0" when output is empty</li>
<li>Added XML_Parser class in PEAR (Stig)</li>
<li>Added "make test" target in pear/ and added some regression tests (Stig)</li>
<li>Fixed bug in strip_tags function as per bug #5857 (Rasmus)</li>
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
  (Andi & Zeev, Zend Engine)</li>
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

<?php echo hdelim(); ?>

<a name="4.0.1"></a>
<h3>Version 4.0.1</h3>
<b>28-Jun-2000</b>
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
  & O'Reilly website (Andi)</li>
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
  (Andi & Zeev, Zend Engine)</li>
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
<li>Added function imagewbmp(). (Jouni, based on patch from Rune Nordbøe
  Skillingstad)</li>
<li>Added str_pad() for padding a string with an arbitrary string on left or
  right. (Andrei)</li>
<li>Made the short_tags, asp_tags and allow_call_time_pass_reference INI
  directives work on a per-directory basis as well, e.g. from .htaccess
  files. (Zeev)</li>
<li>Added fflush() function. (Eric Huss)</li>
<li>Fixed a problem with static variables, default function arguments and class
  member variables, that contained array values. (Andi & Zeev, Zend Engine)</li>
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
<li>Added pg_trace() and pg_untrace (Dominic J. Eidson & Zeev)</li>
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
<li>ignore_user_abort() & friends should now work in CGI mode as well.
  (Patch by daniel.braun@ercom.fr)</li>
<li>Added extension YAZ (dickmeiss).</li>
<li>Fixed a crash bug triggered by certain cases of class redeclarations
  (Stas & Zeev, Zend Engine)</li>
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

<?php echo hdelim(); ?>

<a name="4.0.0"></a>
<h3>Version 4.0.0 Release</h3>
<b>22-May-2000</b>
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

<?php echo hdelim(); ?>

<h3>Version 4.0, Release Candidate 2</h3>
<b>08-May-2000</b>
<ul>
<li>NSAPI WIN32 Module compilable, untested (Shane)</li>
<li>Apache WIN32 Module compilable and lightly tested. (Shane)</li>
<li>Enabled assert() by default in php.ini-dist. (Andrei)</li>
<li>Put in safeguards in case dynamic code evaluation in assert() and
  preg_replace() with /e modifier fails. (Andrei)</li>
<li>Fixed infinite recursion when serializing $GLOBALS[] in WDDX. (Andrei)</li>
<li>Made WDDX serialization properly escape &lt;, &gt;, and &. Also speeded up
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
  (Paul Gregg & Zeev)</li>
<li>Ported ldap_get_values_len() function from PHP3 to PHP4. (Sterling)</li>
<li>Fixed a problem in include_once() with non constant arguments (Andi & Zeev,
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

<?php echo hdelim(); ?>

<h3>Version 4.0, Release Candidate 1</h3>
<b>27-Mar-2000</b>
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

<?php echo hdelim(); ?>

<h3>Version 4.0, Beta 4 Patch Level 1</h3>
<b>21-Feb-2000</b>
<ul>
<li>Fixed crash when magic_quotes were switched off. (Thies)</li>
<li>Support for pdflib 2.30 (Uwe)</li>
</ul>

<?php echo hdelim(); ?>

<h3>Version 4.0, Beta 4</h3>
<b>20-Feb-2000</b>
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
  to its author James Clark (Andi & Zeev)</li>
<li>Added XML support to the default Win32 build (Andi & Zeev)</li>
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
<li>Applied safe-mode patch to popen(). (Patch by Kristian Köhntopp)</li>
<li>str_repeat() now returns correct length. (Thies)</li>
<li>Don't assume libz and libpng are installed for the GD checks (Rasmus)</li>
<li>Implemented support for &lt;boolean&gt; and &lt;null&gt; types according
  to WDDX version 1.0 (Andrei)</li>
<li>Made var_dump()/serialize()/unserialize() NULL aware. (Thies)</li>
<li>Added new NULL constant (Zeev, Zend Engine)</li>
<li>Fixed -c support in the standalone CGI binary (Zeev)</li>
<li>Increased PHP's performance by 5-15% using a new memory cache (Andi & Zeev,
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
  use the same file more than once (Andi & Zeev, Zend Engine)</li>
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
<li>Fixed inconsistencies in the implementation of here-docs (Andi & Zeev, Zend 
  library)</li>
<li>Fixed a problem with constant class-member initializations (Andi & Zeev,
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

<?php echo hdelim(); ?>

<h3>Version 4.0 Beta 3</h3>
<b>16-Nov-1999</b>
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
  by reference. (Andi & Zeev, Zend Engine)</li>
<li>Implemented getprotoby{name,number} (Evan)</li>
<li>Added array_pad() function. (Andrei)</li>
<li>Added new getservby{name,port} functions. (Evan)</li>
<li>Added session.cookie_path and session.cookie_domain (Sascha)</li>
<li>Continue processing PHP_INI_SYSTEM knownDirectives after extension=
  (Sam Ruby)</li>
<li>Enable IBM DB2 support - Tested against DB2 6.1 UDB on Linux (Rasmus)</li>
<li>Added new str_repeat() function. (Andrei)</li>
<li>Output-Buffering system is now Thread-Safe. (Thies)</li>
<li>implemented OCI8 $lob->WriteToFile() function - very useful for streaming
  large amounts of LOB-Data without to need of a huge buffer. (Thies)</li>
<li>Added session.use_cookies option (Sascha)</li>
<li>Added getcwd() function. (Thies)</li>
<li>XML_Parse_Into_Struct no longer eats data. (Thies)</li>
<li>Fixed parse_url('-') crash. (Thies)</li>
<li>added === operator support. (Andi & Thies, Zend Engine)</li>
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
  For example, array("foo" => &$foo). (Andi, Zend Engine)</li>
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
<li>Fixed fopen() to work with URL's in Win32 (Andi & Zeev)</li>
<li>Fixed include_path for Win32 (Andi, Zend Engine)</li>
<li>Fixed bug in ISAPI header sending function (Charles)</li>
<li>Fixed memory leak when using undefined values (Andi & Zeev, Zend Engine)</li>
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

<?php echo hdelim(); ?>

<h3>Version 4.0 Beta 2</h3>
<b>09-Aug-1999</b>
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
  (Andi & Zeev)</li>
<li>Fixed various inheritance problems (Andi & Zeev, Zend Engine)</li>
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
  (Andi & Zeev, Zend Engine)</li>
<li>Fixed a crash problem in switch statements that had a string offset
  as a conditional (Andi & Zeev, Zend Engine)</li>
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
  
<?php echo hdelim(); ?>

<h3>Version 4.0 Beta 1</h3>
<b>19-Jul-1999</b>
<ul>
<li>First public beta of PHP 4.0</li>
</ul>

<?php commonfooter(); ?>
