<?
require("shared.inc");
commonHeader("PHP 4.0.0 -> 4.0.1 Changes");
?>

<h3>June 28, 2000, Version 4.0.1</h3>

<ul>

<li>Fixed a possible crash in the LDAP modify code. (Eric Kilfoil)</li>
<li>Fixed a bug in opendir(), which prevented readdir() from working properly if</li>
  the $dir argument wasn't explicitly specified (Zeev)</li>
<li>Made --enable-discard-path work again. (Andi) </li>
<li>Removed 8KB limit on line length of the file() function (Zeev)</li>
<li>Disabled dl() when PHP is being used as a module inside a multithreaded web</li>
  server - it didn't work before, and caused weird results (Zeev)</li>
<li>Added the ImageColorClosestHWB(), ImageCopyMerge() and ImagePaletteCopy() </li>
  functions. (Sterling)</li>
<li>Added ImageCreateFromWBMP() function. (Jouni)</li>
<li>Fixed problems with POST requests under the NSAPI module. (Roberto Biancardi)</li>
<li>Added spliti() function. (Thies)</li>
<li>Fixed serializer behaviour with regards to serializing objects whose class</li>
  definition was not available in the deserializing context. (Sascha)</li>
<li>Improve memory cache performance and increase cache size. (Stas, Zend Engine)</li>
<li>Added a crc32 checksum function - used by the UdmSearch search engine</li>
  and currently run through a system call.  This will speed up the UdmSearch</li>
  php frontend significantly. (Rasmus)</li>
<li>Modified in_array() to not touch array pointer. (Andrei)</li>
<li>Added restore_error_handler(). (Zeev, Zend engine)</li>
<li>Fixed erroneous file names and line numbers in error situations under the</li>
  multithreaded version of PHP - most noticeably Win32 (Zeev, Zend Engine)</li>
<li>Fixed problem with CGI crashing on certain servers especially Windows Apache</li>
  & O'Reilly website (Andi)</li>
<li>Added Pi3Web SAPI module; run ./configure --with-pi3web to enable this.</li>
  (Holger; zimpel@t-online.de)</li>
<li>Enhanced WDDX functions to call __sleep() and __wakeup() when working on</li>
  objects. (Andrei)</li>
<li>Changed WDDX to serialize arrays as structs only if needed. (Thies)</li>
<li>Implemented max_execution_time under Win32 (Zeev)</li>
<li>Updated strtotime() to handle many more formats. It now has complete</li>
  feature parity with GNU date command. (Andrei)</li>
<li>Added support for multiple arguments in unset(). (Faisal, Zend Engine)</li>
<li>Functions that expect a resource but are passed something else now return </li>
  NULL instead of FALSE. (Thies, Zend Engine)</li>
<li>Fixed gmmktime(), on certain systems it incorrectly adjusted for the timezone</li>
  offset and daylight savings time. (Andrei)</li>
<li>Moved VC++ Win32 project and workspace files to the win32 directory</li>
  (Zeev)</li>
<li>Fixed checkdate() to not return true on non-numeric arguments (Rasmus)</li>
<li>Added --enable-c9x-inline option for compilers which support the new C9x</li>
  standard. If you encounter undefined references to i_zend_is_true and</li>
  other symbols, you should enable this.  (Sascha, Zend Library)</li>
<li>Fixed a problem in ldap_add() and ldap_modify(), sometimes added trailing</li>
  garbage to the values (Stig Venaas) </li>
<li>Fixed a problem with dbmopen() not handing 'c' correctly with dbm/db/ndbm</li>
  databases. (JimJag)</li>
<li>Fixed a crash in number_format() when used with locales. (Andrei)</li>
<li>Fixed an initialization problem in the MS-SQL problem that could cause</li>
  a crash in mssql_query() (Zeev)</li>
<li>Upgraded PCRE to version 3.2 and fixed a bug when anchored pattern</li>
  matched an empty string. (Andrei)</li>
<li>Fixed a bug that prevented PHP from paying attention to the extension_dir</li>
  directive with extensions that were loaded from the php.ini file (Zeev)</li>
<li>Changed set_error_handler() to return the name of the previously defined</li>
  error handler, if any (Zeev, Zend Engine)</li>
<li>Declared &lt;?php_track_vars?&gt; officially dead.  It didn't work in PHP 4.0.0</li>
  either, but now it's gone for good (Zeev)</li>
<li>Make convert_cyr_string() binary safe and stop it from corrupting other</li>
  PHP variables. (Andi)</li>
<li>Added functions array_unique, array_intersect and array_diff (Stig Venaas)</li>
<li>Fixed problem when using uninitialized values in comparisons with strings.</li>
  They behave as empty strings again just like in PHP 3.</li>
  (Andi & Zeev, Zend Engine)</li>
<li>Fixed 'Z' flag in date() to adjust for daylight savings time. (Andrei)</li>
<li>Fixed var_dump() not to modify the internal order of array elements (Zeev)</li>
<li>Fixed stripcslashes() to remove to strip \ in unknown escapes instead of</li>
  leaving it. (Andrei)</li>
<li>Changed WDDX to always serialize arrays as structs. (Andrei)</li>
<li>Fixed include_once() to issue a warning in case the supplied file name is</li>
  not found (Zeev, Zend Engine)</li>
<li>Fixed a bug in get_declared_classes() which could return the same class</li>
  multiple times under certain circumstances (Zeev, Zend Engine)</li>
<li>Fixed a bug in rawurldecode() that would cause in rawurldecode() corrupting</li>
  its argument (Zeev)</li>
<li>Parse errors (or other errors) in the php.ini files under Windows will no</li>
  longer mess up the HTTP headers in CGI mode and are now displayed in a</li>
  message box (Zeev)</li>
<li>Fixed a crash in OCIFetchStatement() when trying to read after all data</li>
  has already been read. (Thies)</li>
<li>fopen_wrappers() are now extensible via modules (Hartmut Holzgraefe)</li>
<li>Make trim strip \0 to match php 3 (Rasmus)</li>
<li>Added function imagecreatefromxbm(). (Jouni)</li>
<li>Added function imagewbmp(). (Jouni, based on patch from Rune Nordbøe</li>
  Skillingstad)</li>
<li>Added str_pad() for padding a string with an arbitrary string on left or</li>
  right. (Andrei)</li>
<li>Made the short_tags, asp_tags and allow_call_time_pass_reference INI</li>
  directives work on a per-directory basis as well, e.g. from .htaccess</li>
  files. (Zeev)</li>
<li>Added fflush() function. (Eric Huss)</li>
<li>Fixed a problem with static variables, default function arguments and class</li>
  member variables, that contained array values. (Andi & Zeev, Zend Engine)</li>
<li>Fix virtual() when used with output buffering (Marc Pohl)</li>
<li>Clean up constants in flock() function and add optional 3rd arg which</li>
  is set to true on EWOULDBLOCK (Rasmus)</li>
<li>Added functions pg_loimport(), pg_loexport(). (Jouni)</li>
<li>Added SWF support to getimagesize() function (Derick Rethans)</li>
<li>Added support for both indexed and non-indexed arrays of file uploads</li>
  eg. name="file[]" type="file" (Rasmus)</li>
<li>Added create_function(), which gives the ability to create functions</li>
  on-the-fly (Zeev, Zend Engine)</li>
<li>Added support for comparisons of arrays (with arrays) and objects (with</li>
  objects);  The equality operator (==) performs an unordered comparison,</li>
  whereas the identity operator (===) performs an ordered comparison (Zeev,</li>
  Zend Engine)</li>
<li>Allow all functions that receive user-defined function callbacks to accept</li>
  an array that contains an object and a method name, in place of a function</li>
  name, e.g. usort($array, array($obj, "ObjSort")) (Zeev, Zend Engine)</li>
<li>Added set_error_handler() to allow custom error handling functions,</li>
  instead of the built-in error handling code (Zeev, Zend Engine)</li>
<li>Renamed user_error() to trigger_error();  user_error() remains</li>
  defined for compatibility (Zeev, Zend Engine)</li>
<li>Fix the global/static statements to require a trailing terminating</li>
  semi-colon ';'. (Andi, Zend Engine)</li>
<li>Cleaned up PCRE extension and made it binary-safe. (Andrei)</li>
<li>Added third argument to in_array(). If it's true, then in_array()</li>
  will use strict comparison instead of the default one. (Andrei)</li>
<li>Added pg_trace() and pg_untrace (Dominic J. Eidson & Zeev)</li>
<li>ignore_user_abort=Off is now default. (Thies)</li>
<li>Added array_merge_recursive() that will recursively merge values</li>
  under the same keys. (Andrei)</li>
<li>fixed crash in OCIParse when parsing invalid SQL. (Thies)</li>
<li>Fixed a bug in mysql_connect() that made it ignore the socket argument, in</li>
  case of non-persistent connects (Zeev)</li>
<li>Added disable_functions php.ini directive, to allow administrators to disable</li>
  certain functions for security reasons (Zeev)</li>
<li>Fixed sessions on Win32. When setting the directory depth parameter in</li>
  save_path you need to now delimit it with a ';' instead of ':', e.g</li>
  "5;/tmp" instead of "5:/tmp" (Andi)</li>
<li>Changed the Apache handler's return status to 'Declined' when a requested</li>
  PHP file could not be found.  Returning 'Not Found' caused problems</li>
  in the ErrorDocument handler stage in that $REDIRECT_REDIRECT_ERROR_NOTES</li>
  was not getting set at all.  Moving to 'Declined' should fix this and I</li>
  can't see any other side effects.  (Rasmus)</li>
<li>Fixed scanning decimal numbers in internationalized environments. They should</li>
  always be in standard US format e.g. 23.3. (Andi, Zend Engine)</li>
<li>Added second argument to preg_quote() which allows quoting of</li>
  one additional character, usually the regex delimiter. (Andrei)</li>
<li>Uncommitted outstanding OCI8 transactions are now rolled back</li>
  before the connection is closed. (Thies)</li>
<li>ignore_user_abort() & friends should now work in CGI mode as well.</li>
  (Patch by daniel.braun@ercom.fr)</li>
<li>Added extension YAZ (dickmeiss).</li>
<li>Fixed a crash bug triggered by certain cases of class redeclarations</li>
  (Stanislav & Zeev, Zend Engine)</li>
<li>Fixed min()/max() segfault. (Andrei)</li>
<li>New module for reading EXIF header data from JPEG files.  Most digital</li>
  cameras will embed all sorts of information about a picture inside the</li>
  jpeg images it generates.  (Rasmus)</li>
<li>Fixed basename() bug where "file.ext///" would not return the same</li>
  as "/path/file.ext///" (Rasmus)</li>
<li>Added the swf_ortho function. (Sterling)</li>
<li>Moved to virtual current working directory support. This highly improves the</li>
  functionality and stability of multi-threaded versions of PHP (Andi, Sascha)</li>
</li>

</ul>

<?
commonFooter();
?>
