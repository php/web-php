<?
require("shared.inc");
commonHeader("PHP 3.0 -> 3.0.9 Changes");
?>
<h3>June 6 1999, Version 3.0.9</h3>
<ul>
<li>added preg_quote() function (Andrey)
<li>fixed OCI8 crash for "Fetch out of sequence". (Thies)
<li>fix deallocation bug in dba's db2 module (Sascha)
<li>add "--enable-dmalloc" option (Sascha)
<li>added workaround for 1-digit numbers not returned correct  via OCI8 (Thies)
<li>removed the limit for Ora_GetColumn/Ora_Fetch_Into again. (Thies C. Arntzen)
<li>fix WDDX buffer bug (Sascha)
<li>fixed Ora_GetColumn/Ora_Fetch_Into for LONG/LONG RAW (had to put in the 64K 
  limit again). (Thies C. Arntzen)
<li>added easter_date() function: returns timestamp of midnight on Easter
  of the given year (valid for years 1970-2037) (Colin Viebrock)
<li>added easter_days() function: returns number of days after March 21 on which
  Easter falls for a given year (Colin Viebrock)
<li>added 't' option to date() function: returns number of days in the
  current month (Colin Viebrock)
<li>enabled warning when header() is used after the headers have
  been sent in in non-debug builds (Jim)
<li>fixed connection and cursor shutdown in oracle-module (this is a fix for
  the previous fix). (Thies C. Arntzen)
<li>fixed shutting down of statements in OCI8 if user logs-off. (Thies C. Arntzen)
<li>fixed very rare crash in shutdown of oracle-cursors. (Thies C. Arntzen)
<li>added Perl Compatible Regular Expressions support (Andrey Zmievski)
<li>fixed a couple of bugs in split()
<li>cpdf module now supports adding hyperlinks, annotations and outline.
  Some testing was suggesful. (U. Steinmann)
<li>OCI8 now supports LONG/LONG RAW > 64K (Thies C. Arntzen)
<li>add connection timeout to p?fsockopen (Sascha)
<li>fix socket buffering subsystem for blocking sockets (Sascha)
<li>fix fopen-wrappers.c for url's (danny)
<li>fix fgets() semantics (Sascha)
<li>fix segfault in wddx_serialize_value (Sascha)
<li>add support for using PostScript Type 1 fonts for text in gd.c using T1lib
  (ftp://sunsite.unc.edu/pub/Linux/libs/graphics/t1lib-0.?.tar.gz) (Jouni Ahto) 
<li>add bin2hex (Sascha)
<li>add mhash support (see http://sasweb.de/mhash/ ) (Sascha)
</ul>
<h3>May 22 1999, Version 3.0.8</h3>
<ul>
<li> OCI8 fix for RAW and LONG RAW (Binary data) - sorry currently limited to
  64K (Thies C. Arntzen)
<li> Added support for pdf creation lib from FastIO, www.fastio.com
  This has not been tested, yet (U. Steinmann)
<li> Rewrite socket buffering subsystem (Sascha)
<li> Fix semaphore support on glibc-2.1 systems (Sascha)
<li> Add headers_sent() function which returns true if the http headers have been
  sent out already
<li> Ora_GetColumn and Ora_Fetch_Into can now return "LONG" and "LONG RAW"
  columns &gt; 64K (Thies C. Arntzen)
<li> Another str_replace() fix to check for a 0-length haystack (RL)
<li> Add range() and shuffle() functions (Jim)
<li> Fix glibc-2.1.x (RH6) related crashes (ssb)
<li> Fix md5 on 64-bit platforms (Sascha)
<li> Let exit/die set exit status in CGI version (Sascha)
<li> Make substr() binary-safe (RL)
<li> OCIError can now be called without any arguments to check the error of a failed
  OCILogon. (Thies C. Arntzen)
<li> added XML_Parse_Into_Struct. Parse XML without using callbacks - This makes
  life far easier when using the XML-Parser from classes etc.  (Thies C. Arntzen)
<li> Small fix in configure.in: doesn't try to add in Informix support anymore
  if INFORMIXDIR is set but --with-informix not specified (Jouni Ahto)
<li> add mcrypt module (Sascha)
<li> added REFCURSOR (including nested table) handling for OCI8. (Thies C. Arntzen)
<li> finalized new behaviour of hw_modifyobject() (U. Steinmann)
<li> added OCINLogon function (New-Logon) - if you need you "own-private" transaction context. (Thies C. Arntzen)
<li> GetImageSize now also returns the bits/sample ("bits") and samples/pixel ("cannels") -&gt;
  currently only works for JPEGs (Thies C. Arntzen)
<li> changed parameter evaluation of hw_modifyobject() (see docs) (U. Steinmann)
<li> fixed a sporadic crash when shutting down a request that used the ora_** calls. (Thies C. Arntzen)
<li> Add fgetcsv() function (RL from Nick Talbott)
<li> fixed mem-leak in ora_bind (Thies C. Arntzen)
<li> fixed length of bound variables returned from ora_bind. (Thies C. Arntzen)
<li> Added V1 of DBA (Sascha)
<li> made strtr() binary safe and faster. (Thies C. Arntzen)
<li> added Oracle-OCI8 persistent connections (Thies C. Arntzen)
<li> fixed OCIDefineByName crash. (Thies C. Arntzen)
<li> fixed some NULL-column related problems in OCI8-module. (Thies C. Arntzen)
<li> avoid stripping double slashes when fopen'ing files (Sascha)
<li> sql_regcase() change: only apply to alphabetic characters (Sascha)
<li> add snmprealwalk() (Sascha Schumann)
<li> fix serious bug in strftime() (Sascha Schumann)
<li> fix bug in ucwords() (Sascha Schumann)
<li> optimized fgets() and fread() (ssb)
<li> memory leak in operators.c fixed
<li> socket leak fixed (Sascha Schumann) 
<li> Fixed the XML bug that caused garbage behind attributes
<li> Some Informix driver improvements.
<li> PUT method support (RL from mlemos@acm.org)
<li> Add ldap_mod_add(), ldap_mod_del() and ldap_mod_replace() (Gerritt Thomson)
<li> Fix parameter count problem in odbc_setoption()
<li> Replace broken str_replace(). The fix in 3.0.7 was bogus (Sascha Schumann)
<li> Really fix implode() this time.  The fix in 3.0.7 was bogus (RL)
<li> Added more option to the date() function: (Colin Viebrock)
  'g' - hour, 12-hour format, no leading zeros
  'G' - hour, 24-hour format, no leading zeros
  'n' - month, numeric, no leading zeros
<li> Make fgetss() slightly smarter (RL)
<li> Add strip_tags() which uses the fgetss state-machine but acts on a string (RL)
<li> Add CRYPT_SALT_LENGTH constant (RL) 
</ul>

<h3>March 1 1999, Version 3.0.7</h3>
<ul>
<li> Added pdf_put_image and pdf_execute_image
<li> Initial work on an ImageMagick module - doesn't do anything yet
<li> Make configure script detect Netscape's LDAP SDK automagically
<li> Fixed Oracle-OCI8 module for windows.
<li> Add OCIRowCount function. (Number of affected rows for update-statements) 
<li> Add OCIDefineByName function.
<li> Change the behaviour of open_basedir. It's now possible to supply more
  than one directory. open_basedir paths from parent directories are now
  automatically inherited.
<li> fix rand() and mt_rand() to make the ranges work correctly
<li> htmlspecialchars() and htmlentities() are now binary safe.
<li> Add extract() function.
<li> Oracle-OCI8 driver now supports BLOBS/CLOBS and IN/OUT binding of local php 
  variables. 
<li> Clean up apxs build
<li> Add INSTALL.REDHAT file to walk RedHat users through the install
<li> Added YP/NIS module from Stephanie Wehner
<li> Added optional second argument to mysql_fetch_array();  MYSQL_ASSOC will
  cause the resulting array to contain the associative indices only,
  MYSQL_NUM will cause the array to contain the numeric indices only (like
  mysql_fetch_row()) and MYSQL_BOTH would cause them both to be defined
  (default).
<li> Backport the Zend debugging memory manager into the PHP 3.0.x tree.
<li> Add function_exists() function.
<li> Add another version of WDDX module 
  (we need to pick a single implementation here)
<li> Fixed includes for iODBC to support both the old and the new LGPL version
<li> Add flock() function
<li> Fix implode() bug - When imploding an array that contained unset() elements
  it wasn't correctly skipping past these
<li> Add connection_status() function.  This returns the raw bitfield which 
  indicates whether the script terminated due to a user abort, a timeout
  or normally.  Note that if ignore_user_abort is enabled, then both the 
  timeout state and the user abort state can be active
<li> Add connection_timeout() function.  This one can be called in a shutdown
  function to tell you if you got there because of a timeout
<li> Add ignore_user_abort() function and .ini/.conf directive of same name
<li> Fix connection abort detection code - It should now work reliably with 
  Apache.  Also added a user-level connection_aborted() function designed to
  let people check whether the user aborted the connection in a user-level
  shutdown function.
<li> Add pfsockopen() function
<li> Improvements in FreeType support: Macintosh fonts work, and non-antialiased
  output is considerably cleaner  <mka@satama.com>
<li> Fixed checkdate() function, range of valid years is now 0 to 32767
<li> Make sure XML element attributes have the right character encoding
<li> hw_insertdocument() returns object id now
<li> Add pdf_open() warning in configure and documentation
<li> Add diskfreespace() function
<li> Added aspell support
<li> Iptcparse would sometimes find a wrong tag.
<li> Force var_dump() to output headers
<li> Add optional 3th parameter to ora_fetchinto.
<li> Serialize and var_dump no longer show array elements that 
  have been unset.
<li> Add IptcEmbed() function (can replace an APP13-Marker in a JPEG file)
<li> Add OCI8 module for Windows
<li> Fix bug in pdf_close() function
<li> Add WDDX support (see http://www.wddx.org for more info)
<li> Add similar_text() function
<li> Constructors of parent classes weren't accessible to derived classes (as
  of 3.0.6).  Fixed.
<li> Introduce simple regex compilation cache
<li> Add gettimeofday() function
<li> Add getrusage() function
</ul>

<h3>December 24 1998, Version 3.0.6</h3>
<ul>
<li> Fix GetImageSize() to work with non-standard jpg images
<li> Add Mersenne Twister functions (mt_rand, mt_srand, etc)
<li> Add str_replace() function
<li> Add chunk_split() function
<li> Fixed a bug in the memory limit code, in cases where $php_errormsg was
  also used.
<li> Add iptcparse() function
<li> Adobe FDF supported
<li> getallheaders() NULL string fix &lt;michale@utko.fee.vutbr.cz&gt;
<li> Add all configuration directives to phpinfo() page
<li> Functions pack() and unpack() rewritten to be binary and buffer overrun
  safe and behave like the Perl functions for all implemented format codes.
<li> Ensured that msql_error() will not return error messages generated by
  previously-run scripts.
<li> Add base_convert() function
<li> Make sprintf() and printf() output binary safe
<li> Made gzgetc binary safe
<li> Add convert_cyr_string() and quoted_printable_decode() functions
<li> Fix ldap_free_result() core dump bug
<li> Add support for current OpenLDAP-2.0-devel library
<li> Add php3_asp_tags directive so it can be set from Apache config files
<li> Added UTF-8 support in the XML extension
<li> Make rand(min,max) safer on older platforms where the low-order bits have 
  short cycles.
<li> Added new pdf (Portable Document Format) module
<li> Added an XML parsing extension using James Clark's "expat" library
<li> Optimized parts of the token cache code.
<li> Terminate on out-of-memory errors.  Until now, PHP could crash in out of
  memory situations (clean-up, no real effect).
<li> Unterminated comments in include files were being reported with the wrong line
  number.  Fixed.
<li> Added ImageCopy() and ImageColorDeallocate(). ImageCopy() is about
  20% faster than ImageCopyResized(). ImageColorDeallocate() marks
  palette entries free for reuse (by &lt;mka@satama.com&gt;).
<li> In the CGI version, it was impossible to access resources (e.g. SQL links,
  images) from user-defined shutdown functions.  Fixed.
<li> Added optional third parameter to strpos() to specify the offset to
  start searching from.
<li> Fixed a crash bug in unset() when unsetting illegal variables (rare).
<li> Made ImageInterlace and ImageTransparentColor parameters optional, and made
  them return the current/new settings.
<li> Optimized GetImageSize() &lt;thies@digicol.de&gt;.
<li> Made odbc_autocommit() without args return status
<li> Added connect workaround for OpenLink ODBC
<li> Added minimal InterBase support. Tested only on 4.0 & Linux.
<li> Fixed some memory leaks and bogus error messages in the URL handler of
  the various file open functions.  Should only affect error handling
  in bad URLs.
<li>Added support for Empress RDBMS using unified ODBC inteface and Empress
  ODBC client driver (for Empress v8.10 and above).
</ul>

<h3>October 5 1998 Version 3.0.5</h3>
<ul>
<li> mysql_field_flags now reports all MySQL flags and the result is suitable
  for automatic parsing. Compatibility warning: The result format has
  changed. If you have scripts parsing the result of this function, you
  may need to adapt them.
<li>Made nl2br() binary safe (not that it's of much use).
<li>Fixed a bug in the API function getThis().  It affected mostly the dir
  functions, if nested within objects.
<li>Fixed a problem in require() in conjunction with switch(), and in some other
  cases.  Also fixed an identical problem with the call_user_function() API
  function.
<li>Removed -lpthread when compiling with MySQL support.  It caused various
  serious problems when compiled into Apache.
<li>Add serialize() and unserialize() functions from jkl@njet.net
<li>Fix in_addr_t check for systems with in_addr_t in netinet/in.h
<li>Add atan2() function
</ul>

<h3>Sept. 22, 1998 Version 3.0.4</h3>
<ul>
<li> Added uksort() - array key sort using a user defined comparison function.
<li> Added 'j' support to date() - generates the day of the month, without
  possible leading zeros.
<li> Added support for multiple crypt() encryptions if the system supports it
<li> Added optional support for ASP-style &lt;% %&gt; and &lt;%= tags
<li> Fixed data loss problems with very large numeric array indices on 64-bit
  platforms (e.g. DEC UNIX).
<li> 2 cursor_type parameters for ifx_query() and ifx_prepare changed
  to 1 (bitmask). Added a few constants for use in Informix module.
<li> Added php3.ini option ifx.charasvarchar. If set, trailing blanks
  are stripped from fixed-length char columns. (Makes life easier
  for people using Informix SE.)
<li> Static SNMP module which compiles with ucd-snmp 3.5.2
<li> fixed imap_header & header_info from crashing when a header line
  is > 1024 characters.
<li> Added patch for rfc822_parse_adr to return an array of objects instead
  of a single object.
<li> Informix Online 7.x & SE 7.x support now fairly complete and stable
<li> Add dbase_get_record_with_names() function
<li> Added a special case for open_basedir. When open_basedir is set to "."
  the directory in which the script is stored will be used as basedir.
<li> Include alloca.c in the distribution for platforms without alloca().
<li> Improved stripping of URL passwords from error messages - the length of the
  username/password isn't obvious now, and all protocols are handled properly
  (most importantly, http).
<li> Copying objects that had member functions with static variables produced
  undetermined results.  Fixed.
<li> Added function lstat() and cleaned up the status functions,
  added tests for file status functions (this may break on some plattforms)
<li> Fixed is_link() - it was returning always false.
<li> Fixed apache_note() - it was corrupting memory.
<li> New Function.  void get_meta_tags(string filename);  Parses filename until
  closing head tag and turns all meta tags into variables prefixed with 'meta_'.
  The below meta tag would produce $meta_test="some string here"<br>
    &lt;meta name="test" content="some string here"&gt;
<li> Generalized some internal functions in order to better support calling
  user-level functions from C code.  Fixes a few sporadic problems related
  to constructors inside eval() and more.
<li> Fixed an endless loop in explode(), strstr() and strpos() in case of an
  invalid empty delimiter.
<li> rand() now accepts two optional arguments, which denote the requested range
  of the generated number.  E.g., rand(3,7) would generate a random number
  between 3 and 7.
<li> Added M_PI constant.
<li> Added deg2rad() and rad2deg() for converting radians&lt;-&gt;degrees.
<li> ImageArc() misbehaved when given negative angles, fixed.
<li> Fixed a bug in ereg() that may have caused buglets under some circumstances.
<li> Added imap_status
<li> Shutdown functions, registered via register_shutdown_function(), could never
  generate output in the Apache module version.  Fixed.
<li> Brought IMAP docs into sync with acutal imap code
<li> imap_fetchstructure now takes in optional flags
<li> Fix potential core dumps in imap_append and imap_fetchtext_full
<li> Fix problem in SetCookie() function related to long cookies
<li> Add uasort() function to go along with usort (like sort() and asort())
<li> Add port number to Host header as per section 14.23 of the HTTP 1.1 RFC
<li> Fix imap_reopen to only take 2 arguments with an optional 3rd flags arg
<li> Add optional 2nd argument to imap_close
<li> Add CL_EXPUNGE flag to imap_open() flags
<li> Fix 4th arg on imap_append().  It was getting converted to a long by mistake.
<li> Fix shutdown warning in the LDAP module
<li> *COMPATIBILITY WARNING* imap_fetchstructure() "parametres" object and property
  name changed to "parameters" to match the documentation and to be consistent
  with the rest of the API.
<li> Delete uploaded temporary files automatically at the end of a request
<li> Add upload_max_filesize and correponsing php3_upload_max_filesize directive
  to control the maximum size of an uploaded file.  Setting this to 0 would
  completely eliminate file uploads.
<li> Force $PHP_SELF to PATH_INFO value when running in CGI FORCE_CGI_REDIRECT mode
<li> Add apache_lookup_uri() function which does an internal sub-request lookup
  and returns an object containing the request_rec fields for the URI.  (Yes,
  you have to be a bit of a gearhead to figure this one out)
<li> Fix a few signed char problems causing functions like ucfirst() not to work
  correctly with non-English charsets
<li> md5() function not binary safe - fixed
</ul>

<h3>August 15, 1998 Version 3.0.3</h2>
<ul>
<li> Changed the name of fopen_basedir to open_basedir, to be a little more
  accurate about what it does.
<li> Added Hyperwave module
<li> Added config-option (php3_)enable_dl &lt;on/off&gt;. This enables/disables the
  dl() function.  In safe-mode dl() is always disabled.
<li> Auto-prepended files were crashing under some circumstances - fixed.
<li> Win32 mail fixes provided by walton@nordicdms.com
<li> Comparing between arrays and/or objects now generates a warning (it always
  returns false, as it used to;  no comparison is made)
<li> Fixed a bug in the syntax highlighting code, that made ending-double-quotes
  appear twice under certain circumstances.
<li> Fix bug in filetype() function related to symlinks
<li> Started integrating Informix SE support to PHP configure/makefile setup.
<li> gdttf roundoff fixes from ellson@lucent.com
<li> Added initial Informix SE support files from Danny Heijl - This code still
  needs to be integrated into the PHP configure/makefile setup and the code
  itself needs more work.
<li> return in the global scope now terminates the execution of the current file.
<li> Added the ability to register shutdown function(s), via
  register_shutdown_function($function_name).
<li> Clean up const warnings
<li> Add write support to ftp fopen wrappers
<li> Add strspn() and strcspn() functions
<li> On systems without strerror use Apache version if compiling as Apache module
<li> The PHP start tag was being ignored under some circumstances - fixed.
<li> The db, dbase and filepro functions are now Safe-Mode aware.
<li> Added config-option (php3_)fopen_basedir &lt;path&gt;. This limits the directory-
  tree scripts can open files in to &lt;path&gt;.
<li> Fixed pg_loreadall that didn't always return all the contents in a PostgreSQL
  large object. Also, doesn't pass through anything if method is HEAD.
<li> configure fix to create target Apache module dir
<li> Fix core dump in imageTTFtext() function
<li> Added static IMAP support
<li> Syntax highlighting was generating additional whitespace - fixed.
<li> Added ucwords.  Works like ucfirst, but works on all words within a string.
<li> Added array_walk() - apply user function to every element of an array
<li> Added usort() - array sort that accepts a user defined comparison function!
<li> Added the ability to call user-level functions and object methods on demand
  from the C source using a completely generalized, slick API function.
  Miracles do happen every once in a while.
<li> Added constructors.  Don't even squeek about destructors! :) (we mean that)
<li> Make pg_lowrite() binary safe
<li> Fixed mod_charset option in ./setup
<li> Fixed rewinddir() and dir()::rewind() under Win32 (they didn't work before).
<li> Add Win32 COM support!  By-name referencing is supported using the IDispatch
  interface (automation).  Available functions - COM_Load(), COM_Invoke(),
  COM_PropGet() and COM_PropSet().
</ul>

<h3>July 18 1998 Version 3.0.2</h2>
<ul>
<li>Compile cleanups for *BSD
<li>Add support for the OpenLink ODBC Drivers
<li>Add PHP_SELF, PHP_AUTH_* and HTTP_*_VARS PHP variables to phpinfo() output
<li>Add workaround for broken makes
<li>Add Apache 1.3.1 support (some Apache header files were moved around)
<li>Added apache_note() function.
<li>Fix order of system libraries and detect libresolv correctly 
<li>Fixed a bug in the Sybase-DB module.  Several numeric field types were
  getting truncated when having large values.
<li>Added testpages for unified odbc
<li>Fix php -s seg fault when filename was missing
<li>Made getdate() without args default to current time
<li>Added ImageColorResolve() and some fixes to the freetype support.
<li>Added strcasecmp()
<li>Added error_prepend_string and error_append_string .ini and .conf directives
  to make it possible to configure the look of error messages displayed by PHP
  to some extent
<li>Added E_ERROR, E_WARNING, E_NOTICE, E_PARSE and E_ALL constants, that can be
  used in conjunction with error_reporting()
  (e.g. error_reporting(E_ERROR|E_WARNING|E_NOTICE);
<li>Fixed a crash problem with classes that contained function(s) with default
  values.
<li>Fixed a problem in the browscap module.  Browscap files weren't being read
  properly.
<li>Fix -L path in libphp3.module to make ApacheSSL compile without errors
<li>Fix StripSlashes so it correctly decodes a \0 to a NUL

</ul>


<h3>July 04 1998 Version 3.0.1</h3>
<ul>
<li>echo/print of empty strings don't trigger sending the header anymore.
<li>Implemented shift left and shift right operators (&lt;&lt; and &gt;&gt;)
<li>Compile fix for cc on HP-UX.
<li>Look for beta-version Solid libraries as well.
<li>Make GD module show more info in phpinfo().
<li>Compile fix for NextStep 3.0.
<li>Fix for Oracle extension on OSF/1.
<li>Fix gd 1.3 bug in ImageColorAt().
<li>pg_loread() hopefully handles binary data now.
<li>Turned off some warnings in dns.c
<li>Added ImageTTFBBox() and made ImageTTFText() return bounding box.
<li>Added constants for Ora_Bind()'s modes.
<li>Renamed all hash_*() routines to _php3_hash_*() to avoid clashes with other
  libraries.
<li>Changed uodbc default LONG behaviour: longreadlen 4096 bytes, binmode 1.
  The module now actually uses the php.ini settings.
<li>New PostgreSQL functions:  pg_fetch_row(), pg_fetch_array()
  and pg_fetch_object()
<li>Fix a segmentation fault when calling invalid functions in certain
  circumstances
<li>Fix bug that caused link-related functions to not pay attention to
  run-time safe mode setting (it was using whatever was set at compile time).
<li>Fix bug in exec() function when used in safe mode

</ul>

<? commonFooter(); ?>
