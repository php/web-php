<?
require("shared.inc");
commonHeader("PHP 3.0 -> 3.0.16 Changes");
?>

<h3>April 05, 2000, Version 3.0.16</h3>

<ul>
<li>Fixed semaphore problem (Sascha)<br>
  Reported by: ilia@astrive.com
<li>Fixed pcre, dbase dupe symbol problems (Sascha)
<li>Fixed pcre, regex, dbase relocation problems (Sascha)
<li>Added UCD-SNMP 4.1.x support (Sascha)
<li>Make it possible to set both the socket and the port at the same time
  in mysql_[p]connect() (Rasmus)
<li>Fixed exec() and friends and make them return last line of output 
  again.  (Rasmus)
<li>Added check and support for JPEG format available in gd-1.8+ (Rasmus)
<li>Fixed Solid 2.3 support on glibc2 systems (Stig)
<li>Enhanced resolution of microtime() on OS/2 by using the high resolution timer
  API. (Brian Havard)
</ul>

<h3>February 25, 2000, Version 3.0.15</h3>

<ul>
<li>Fixed crash in preg_match_all(). (Andrei)
<li>Backported safe_mode_protected_env_vars and safe_mode_allowed_env_vars INI
  directives from PHP 4.0 (Zeev)
<li>Added Matthew Herman's FTP module patch for compatibility with Microsoft
  FTP service. (Andrew Skalski)
<li>Fixed crash in strip_tags() and related functions.
<li>Fixed passthru() to no longer return any value. (Andrei)
<li>base64_decode() will decode POST data correct. (Thies)
  Patch submitted by: Turadg Aleahmad <turadg@wise.berkeley.edu>
<li>Fixed a bug in the XML module that could cause crashes (Zeev)
<li>Fixed a long historical bug in the API function call_user_function(),
  that could cause crashes in functions that made use of it (e.g.,
  XML module functions) (Zeev)
<li>Fixed possible buffer-overflow in base64_decode(). (Thies)
<li>Fixed possible buffer-overflow in setcookie(). (Thies)
<li>Added ImageWbmp() for outputting WAP's Wireless Bitmaps (markonen)
<li>Support for LZW-compressed GIFs with gd 1.5, gd/freetype cleanups (markonen)
<li>Added IMAP modified UTF-7 encode/decode routines (Andrew Skalski)
<li>Add .ini option to set the default charset for the default text/html mime
  type that php serves up (Rasmus)
</ul>


<h3>January 11, 2000, Version 3.0.14</h3>

<ul>
<li> Fixed broken GD autoconf check - GIF support was not detected unless libpng
  and libz were both installed on the system (Rasmus)
<li> Fix safe-mode problem in popen() (Kristian)
<li> Fix safe-mode problem when resource had multiple consecutive /'s (Rasmus)
<li> Remove written permission clause from license
</ul>

<h3>January 1, 2000, Version 3.0.13</h3>

<ul>
<li>Fixed timezone conflict on AIX (Sascha)
<li>Fixed mysql_errno() problem when compiled against MySQL 3.23.x (Rasmus)
<li>Fixed buffer overruns in iptcembed(). (Thies)
<li>OCI8 now returns NULL values in LONG columns correct. (Thies) 
<li>Check for broken apxs (Rasmus)
<li>explode() is now binary-safe. (Thies)
<li>strpos() is now binary-safe. (Thies)
<li>Add configure command to phpinfo() output (Stig)
<li>added sketchy support for GNU recode 3.5 (Kristian)
<li>Added tmpfile() function (Stig)
<li>fixed trim(), chop(), ltrim(), etc. to remove NULL characters as 
  well. (Colin Viebrock)
<li>krsort() added, although someone forgot to mention it ... (Thies)
<li>Upgraded regex library to alpha3.8 (Sascha)
<li>RFC-854 fix for internal FTP-Code. Commands have to end in "\r\n" (Thies) 
<li>GD-1.7.x detection (Rasmus)
<li>added patch to functions/mime.c so that form submit with lynx and old IE
  works properly (closes bug #2362, code by ash@ash.de)
<li>tempnam() now uses mkstemp() if available (Stig)
<li>serialize()/var_dump() now honor the precision set in php3.ini for
  double-values. (Thies)
<li>Add mysql_change_user() function (Rasmus)
<li>Fixed garbage returned at the end of certain Sybase-Columns (Thies)
  Patch submitted by: neal@wanlink.com
<li>XML_Parse_Into_Struct() no longer eats data. (Thies)
<li>Added portable access to stdio streams by using the 
  "php://stream-name" syntax (Sascha)
<li>Fixed zombie problem when using backquotes. eg: $x = `ls /`; (Thies)
<li>Locale settings are restored correctly at request end if they
  were changed in the script (Jouni)
<li>Fixed wrong values returned by gmmktime() and its inconsistent behaviour.
  Now gmmktime([args]) == mktime([args]) + date('Z', mktime([args])) should
  always be true (Jouni)
<li>Proper handling of the slightly different behavior of Fdf Toolkit 4.0 (U. Steinmann)
<li>Fixed LOB/Persistent-Connection related OCI8-Crash (Thies)
<li>Added a function for applying a gamma correction to a GD image
  Example: imagegammacorrect($im,1.8,2.2); (markonen)
<li>Added a function for applying a gamma correction to a HTML color value
  Example: $maccolor = gamma_correct_tag("#cccccc",2.2,1.8); (markonen)
<li>Ora_Fetch_Into now resets the returned array in all cases (Thies)
<li>Fixed SEGV in mcal make_event_object() and
  typo in mcal_list_alarms() (Andrew Skalski)
<li>Fixed memory leak in pdf_open_memory_image() (Uwe Steinmann)
<li>Added FTP support (Andrew Skalski)
<li>Added optional allowable_tags arguments to strip_tags(),
  gzgetss() and fgetss() to allow you to specify a string of tags
  that are not to be stripped (Rasmus)
<li>Fix longstanding Apache .conf nested directive problem (Rasmus)
<li>OCI8 fix for fetching empty LOBs (Thies)
<li>OCI8 supports appending and positioning when saving LOBs (Thies)
<li>Added Mcal support (Mark Musone)
<li>OCI8 doesn't use define callbacks any longer. (Thies)
<li>Safe-Mode fix for oci8 savefile() function. (Thies)
<li>Added ldap_get_values_len function (Stig Venaas)
<li>Added more functions to posix module (Kristian).
<li>Close loophole that allowed virtual() to be used on a PHP file
  without an error (Ken Coar)
<li>Add versioning support for shared library (Sascha)
<li>Fix bug with '%' in error_log() strings when run as Apache module (Ken Coar)
<li>Return false from mysql_query() and mysql_db_query() in case saving the
  result set data fails (Zeev)
<li>Make --with-apache --with-xml pick up Apache-bundled expat lib (Rasmus)
<li>Carry special Apache CFLAGS into PHP build for apxs build
  This should fix any PHP/mod_ssl compile issues (Rasmus)
<li>Fixed a crash that would occur if wddx_deserialize did not receive
  a valid packet (Andrey)
<li>Fixed sem_get() on AIX (Sascha)
<li>Removed --with-shared-apache to avoid problems with Apache 1.3.9 (Sascha)
<li>Improved speed of uniqid() by using the combined LCG and removing
  the extra usleep() (Sascha)
<li>Introduced general combined linear congruential generator (Sascha)
<li>OciFetchInto now resets the returned array in all cases (Thies)
<li>Fixed flushing of cached information to disk in DBA's DB2 module (Sascha)
<li>DiskFreeSpace() fix (Thies)
<li>pdflib 2.01 support (Uwe Steinmann)
<li>fixed mem-leak in sysv-shm (Thies)
<li>Add IMSP module (Chuck Hagenbuch)
<li>Add gd-1.6.x PNG functions (Rasmus from drew@elysium.ltd.uk)
<li>Fix [s]printf 0-padding issues (Rasmus)
<li>Fix a crash bug in number_format(), in case of very large numbers (Zeev)
</ul>

<h3>July 28, 1999, Version 3.0.12</h3>
<ul>
<li>gmktime/mktime DST fix (RL and Jim)
<li>Add imap_search (Chuck Hagenbuch)
<li>Added locale support for Perl Compatible Regexp functions (Andrey)
<li>fix crash on invalid URLs in fopen wrappers (Sascha)
<li>Add support for gd1.6 (disables the ImageCreateFromGif and ImageGif
  functions because gd1.6 no longer supports GIF format files) (Jim)
<li>Fixed popen and pclose functions on Windows. (Jim)
<li>Fixed subprocess creation on Windows when used with IIS (Jim, Dave Cramer)
<li>Support for Swatch(r) Beat(tm), also known as Internet Time.
Use by including "B" in the date() or gmdate() format string. (markonen)
<li>added gmstrftime() (like strftime() but prints out in GMT not local
	  time) (David Sklar)
<li>A hack to allow 4bit antialiasing by modifying Freetype2 source (markonen)
<li>Initial Freetype2 support. You need to use the 1.2 compatibility
	    API <truetype.h> for now.. (markonen)
<li>added strtotime() function from <nsayer@quack.kfu.com> with some
		  modifications (Andrey)
<li>fix some problems in the socket buffering system (Sascha)
<li>allow subsecond precision in timeout parameter to fsockopen (Sascha)
<li>OCI8 - got rid of most Callback-Code (there's a bug in the Oracle 
 Client-Libraries). (Thies) 
<li>OCI8 - added OCISetPrefetch($stmt,$rows) for automatic prefetching of
 data. (Thies)
<li>make buildable on OS/2 (Brian Havard <brianh@kheldar.apana.org.au>)
<li>added Chad Cunningham's patches for Mac OS X Server compatibility (markonen)
<li>added ldap_error(), ldap_errno() and ldap_err2str() functions (kk)
<li>fix --with-shared-apache (Sascha)
<b>NOTE</b>: Use of this is deprecated. Refer to INSTALL.DSO instead.
Future releases do not support this option.
<li>support for accessing the raw POST data when its content-type isn't
 already understood by PHP (Jim)
<li>fix pgsql_fetch_array/pgsql_fetch_object (Sascha)
<li>detect missing getrlimit function (Jim Jag.)
<li>fix diskfreespace() on Windows post-OSR2 again (Jim)
<li>added Chuck Hagenbuch's imap_getmailboxes(), imap_getsubscribed(),
    and imap error queues; added preliminary support for persistent IMAP
    connections.  &lt;askalski@chekinc.com&gt;
</ul>

<h3>June 27, 1999, Version 3.0.11</h3>
<ul>
<li>detect missing getpgid function, fix posix_getsid (Jim)
<li>fix diskspacefree() on Win95 pre-OSR2 (Jim)
<li>fix APXS argument order (Sascha)
<li>decrease lexer memory footprint (see #1600) (alanc@soar.berkeley.edu, Sascha)
<li>add dbase_replace_record() (Greg <greg@darkphoton.com>, Sascha)
<li>bringing preg_split() behavior in line with split() (Andrey)
<li>fix APXS build on AIX (Rasmus)
</ul>

<h3>June 25, 1999, Version 3.0.10</h3>
<ul>
<li>fix base64_decode to match RFC 2045 semantics (Sascha & bfranklin@dct.com)
<li>fix potential segfault in tempnam() (Sascha)
<li>fix buffer overruns in dbase_get_record() (Sascha)
<li>workaround for negative 1-digit numbers not returned correct via OCI8 (Thies)
<li>fix APXS linking wrt to static libraries (Sascha)
<li>OCIExecute would sometimes return true on error (Thies)
<li>Made dba_open modes consistant with those from dbm_open. Specifically,
  'w' is read/write but will NOT auto-create a non-existant file.
  To do this, use 'c' which is read/write and auto-create. (Jim Jagielski)
<li>reverted split() to work the same way as pre 3.0.9 versions (Andrey)
<li>moved easter_date and easter_days to the calendar extension (Jim)
<li>fix VPATH APXS build process (Sascha)
<li>make workaround for UCD SNMP deallocate problem optional (Sascha)
  (see the documentation for a more verbose description)
<li>make fgetcsv() understand multi-line fields and embedded quotes (RL & Nick 
  Talbott)
<li>Add extension_loaded() function (Jim)
<li>fix URL wrapper functions to play nicely with the socket code (Sascha)
<li>fix persistent definitions of constants in the mcrypt module (Sascha)
<li>Fix gmmktime() problems (RL and Cole Tuininga)
<li>Added support for "localhost:/path/to/socket" syntax for mysql_connect
  (Thanks to Orion Poplawski <orion@bvt.com>.)
<li>Added support for file-upload arrays and put file-upload vars into
  HTTP_POST_VARS (Brian)
<li>fix a string allocation bug introduced in 3.0.8 in the MySQL module (Sascha)
<li>overhaul of Hyperwave module, mainly code clean ups, some bug fixes
<li>fixed a bug in preg_split() that would return nothing if nothing
  matched (Andrey)
<li>fixed a bug in preg_replace() that had to do with "\\" at the end
  of the replacement string (Andrey)
<li>open_basedir now resolves symlinks in the configuration (S. Steffann)
<li>added 'Z' flag to date(): timezone offset in seconds (C. Viebrock)
<li>added 'L' flag to date(): 1 if it's a leap year, 0 if it isn't (C. Viebrock)
<li>fixed 't' flag in date() (J. Ahto)
<li>added support for upcoming pdflib 2.0 (U. Steinmann)
<li>mail() on Win32 will only add Date: and From: headers if not supplied
  by the caller. (F. Kromann)
</ul>

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
