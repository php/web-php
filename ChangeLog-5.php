<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ChangeLog-5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5 ChangeLog");
function bugfix($number) { echo "Fixed bug "; bugl($number); }
function bugl($number)   { echo "<a href=\"http://bugs.php.net/$number\">#$number</a>"; }
?>

<h1>PHP 5 ChangeLog</h1>

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
<li> Fixed bug #28096 (stream_socket_accept() doesn't work with ssl). (Wez)
</li>
<li> Fixed bug #28007 (compile mssql extension with old versions of FreeTDS
  fails). (Frank)
</li>
<li> Fixed bug #27997 (SPL: Crash with getInnerIterator()). (Marcus)
</li>
<li> Fixed bug #27974 (COM doesn't pass array parameters). (Wez)
</li>
<li> Fixed bug #27928 (sqlite incorrectly handles invalid filenames). (Ilia)
</li>
<li> Fixed bug $27923 (in some cases using foreach() to iterate over values
  led to a false error message about the key being a reference). (Adam)
</li>
<li> Fixed bug #27865 (STDIN, STDOUT, STDERR are dup()d under CLI). (Wez)
</li>
<li> Fixed bug #27821 (xml_parse() segfaults when xml_set_object() is called from
  class method). (Andi, Rob)
</li>
<li> Fixed bug #27742 (WDSL SOAP Parsing Schema bug). (Dmitry)
</li>
<li> Fixed bug #27722 (Segfault on schema without targetNamespace). (Dmitry)
</li>
<li> Fixed bug #27719 (mktime issues on and around DST changeover). (Rasmus)
</li>
<li> Fixed bug #27681 (soap extension fails without HAVE_TM_GMTOFF). (Dmitry)
</li>
<li> Fixed bug #27641 (Object cloning in ze1_compatibility_mode was reimplemented)
  (Dmitry, Andi)
</li>
<li> Fixed bug #27628 (Simplify the process of making a POST request via stream
  context). (Ilia)
</li>
<li> Fixed bug #27619 (filters not applied to pre-buffered stream data). (Sara)
</li>
<li> Fixed bug #27519 (Reflection_Function constructor crashes with non-existant 
  function's name). (Marcus)
</li>
<li> Fixed bug #27469 (serialize() objects of incomplete class). (Dmitry)
</li>
<li> Fixed bug #27457 (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li> Fixed bug #27397 (debug_backtrace() not showing function arguments). (Zeev)
</li>
<li> Fixed bug #27283 (The last catch statement was sometimes skipped). (Andi)
</li>
<li> Fixed bug #26441 (When __set() returned a value it corrupted it). (Andi)
</li>
<li> Fixed bug #19749 (shouldn't mmap() files larger than memory_limit). (Wez)
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
<li>Fixed bug #27606 (Expression must be a modifiable lvalue compiler error).
  (Derick)
</li>
<li>Fixed bug #27597 (pg_fetch_array not returning false). (Marcus)
</li>
<li>Fixed bug #27586 (ArrayObject::getIterator crashes with [] assignment). 
  (Marcus)
</li>
<li>Fixed bug #27537 (Objects pointing to each other segfaults). (Dmitry)
</li>
<li>Fixed bug #27535 (Problem with object freeing mechanism). (Dmitry)
</li>
<li>Fixed bug #27504 (Visibility bugs in call_user_function()). (Dmitry)
</li>
<li>Fixed bug #27457 (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li>Fixed bug #27338 (memory leak inside tsrm_virtual_cwd.c on win32). (Ilia)
</li>
<li>Fixed bug #27291 (get_browser matches browscap.ini patterns incorrectly). 
  (Jay)
</li>
<li>Fixed bug #27287 (wddx segfaults during deserialization). (Moriyoshi)
</li>
<li>Fixed bug #27263 (session extension crashes when unserializing referenced
  values / objects). (Moriyoshi)
</li>
<li>Fixed bug #27237 (Working with simplexml crashes apache2). (Rob)
</li>
<li>Fixed bug #27227 (Mixed case class names causes Fatal Error in Constructor 
  call). (Marcus)
</li>
<li>Fixed bug #27125 (strval() doesn't work for objects with __toString()).
  (Marcus)
</li>
<li>Fixed bug #27123 (Fix crash caused by bug in get_object_vars()). (Andi)
</li>
<li>Fixed bug #26677 (mbstring compile errors with IRIX compiler).
  (K.Kosako <kosako at sofnec dot co dot jp>, Rui, Moriyoshi)
</li>
<li>Fixed bug #26206 (register_long_arrays breaks superglobals). (Zeev)
</li>
<li>Fixed bug #25724 (argv and argc not defined). (Zeev)
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
<li>Fixed bug #27145 (Unmangle private/protected property names before printing
them inside error messages). (Ilia)</li>
<li>Fixed bug #27103 (preg_split('//u') incorrectly splits UTF-8 strings into
octets). (Moriyoshi)</li>
<li>Fixed bug #27042 (SPL: SeekableIterator seek() broken). (Marcus)</li>
<li>Fixed bug #27008 (Every class method can be called as static). (Marcus)</li>
<li>Fixed bug #26938 (exec() has problems reading long lines).
(Ilia, runekl[at]opoint[dot]com</li>
<li>Fixed bug #26947 (ext/dom: Crash when using DomDocument::getElementById()).
(Christian)</li>
<li>Fixed bug #26911 (crash in sqlite extension when fetching data from empty
queries). (Ilia)</li>
<li>Fixed bug #26844 (ext/mime_magic: magic file validation broken). (Jani)</li>
<li>Fixed bug #26819 (http_build_query() crashes on NULL output). (Ilia)</li>
<li>Fixed bug #26817 (http_build_query() does not handle private &amp; protected
object properties correctly). (Ilia)</li>
<li>Fixed bug #26815 (foreach of (DOM) childnodes crashes when Xinclude is used).
(Rob)</li>
<li>Fixed bug #26796 (SQLite causes crashes with other extensions *connect()
calls). (Marcus)</li>
<li>Fixed bug #26762 (unserialize() produces lowercase classnames). (Marcus)</li>
<li>Fixed bug #26743 (getElementsByTagName doesn't work properly). (Rob)</li>
<li>Fixed bug #26736 (__autoload not invoked for parent classes). (Marcus)</li>
<li>Fixed bug #26723 (domNode::appendChild() changes child node namespace). (Rob)</li>
<li>Fixed bug #26697 (calling class_exists() on a nonexistent class in __autoload
results in segfault). (Marcus)</li>
<li>Fixed bug #26696 (string index in a switch() crashes with multiple matches).
(Andi)</li>
<li>Fixed bug #26695 (Reflection API does not recognize mixed-case class hints).
(Marcus)</li>
<li>Fixed bug #26690 (make xsltProcessor-&gt;transformToUri use streams wrappers).
(Ilia)</li>
<li>Fixed bug #26680 (Added version check in mysqli_report_index). (Georg)</li>
<li>Fixed bug #26675 (Segfault on ArrayAccess use). (Marcus)</li>
<li>Fixed bug #26640 (__autoload() not invoked by Reflection classes). (Jani)</li>
<li>Fixed bug #26543 (call_user_func() broken for self, parent). (Stanislav)</li>
<li>Fixed bug #26077 (memory leak when new() result is not assigned and no
constructor is defined). (Stanislav)</li>
<li>Fixed bug #26065 (Crash when nesting classes). (Marcus)</li>
<li>Fixed bug #25816 (disallow arrays in class constants). (Stanislav)</li>
<li>Fixed bug #25329 (sqlite_create_function with method and reference to $this).
(Marcus)</li>
<li>Fixed bug #25038 (call_user_func() issues a warning if function throws an
exception). (Marcus)</li>
<li>Fixed bug #24608 (__set not triggered when overloading with array).
(Stanislav)</li>
<li>Fixed bug #24243 (enabling browscap causes segfault). (Wez)</li>
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
