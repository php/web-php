<?php
commonHeader("PHP 4 ChangeLog");
?>

<A NAME="4.0.4">
<h3>Version 4.0.4</h3>
<B>19-Dec-2000</B>
<UL>
<LI>Allow assigning a newly created object by reference. This is needed only if 
  your constructor makes other data structures reference the $this object (for 
  example, $GLOBALS["foobar"] =&amp; $this;)
  The new syntax is $obj =&amp; new MyClass(); (Andi, Zend Engine)
<LI><pre>Allow for three expression types to be sent to functions which are requesting
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
  (Andi, Zend Engine)</pre>
<LI>Made ldap_get_entries() return an array even if there are no entries
  in search result. (Jani)
<LI>Fixed bad mod_perl interaction which caused segfaults when using LFS (Sascha)
<LI>const CONSTNAME now gets recognized. Before the patch only @const CONSTNAME 
  description was recognized.
<LI>Added the is_null() function that will return true if a variable is of
  type null. (Sterling)
<LI>Fixed a bug which made readdir() unusable in some systems. (Jani)
<LI>Added the get_defined_functions() function which returns a list of all 
  currently defined functions. (Sterling)
<LI>Added the get_defined_vars() function which returns an associative array
  of all variables defined in the current scope and their subsequent values.
  (Sterling) 
<LI>Added the call_user_func_array() function which gives you the ability to
  call a user function by passing an array of parameters as the second
  argument. (Sterling)
<LI>Added the constant() function which returns the value of a constant given
  the constant's name. (Sterling)
<LI>Implemented support for Perl-style matching regexp delimiters in PCRE.
  You can use &lt;{[( and )]}&gt; to delimit your expressions now. (Andrei)
<LI>Introduced new 'F' modifier in PCRE that lets you specify a function
  name in the replacement argument to preg_replace() that will be called
  at run-time to provide the replacement string. It is passed an array of
  matched pattern and subpatterns. (Andrei)
<LI>Put an end to BUG#4615 (kalowsky &amp; Eric Veldhuyzen)
<LI>Fixed realpath() in Virtual Directory mode (Daniel)
<LI>Integrated the Phil Nelson's bc math library routines into PHP, now that
  the license allows it (Phil Nelson &lt;phil@cs.wwu.edu&gt;)
<LI>Added the xslt_set_error_handler() function to the Sablotron extension.
  (Sterling)
<LI>Improved Sablotron's error handling system allowing you to catch all
  errors before they are outputted to the screen. (Sterling)
<LI>Added OpenSSL extension (Stig Venaas)
<LI>Fixed/created support for Solid 3.0 databases (kalowsky)
<LI>Fixed support for Solid 2.3 databases (kalowsky)
<LI>quoted_printable_decode() function is made RFC-2045 compliant. (Kir)
<LI>Modified preg_grep() to always return the results with keys from the original
  array. (Andrei)
<LI>Modified preg_replace() to accept Perl-style $n backreferences in addition
  to \\n ones. (Andrei)
<LI>Modified preg_replace() to ignore backreferences that refer to
  non-existing subpatterns. (Andrei)
<LI>Fixed column-title buffer-overflow in OCIFetchStatement(). (Thies)
<LI>Added 'output_handler' INI directive (Zeev)
<LI>Fixed some buglets in the output buffering mechanism (Zeev)
<LI>Added transparent gzip compression support (Jade Nicoletti, Zeev)
<LI>Major overhaul of domxml. Added basic XPath support as well (Uwe)
<LI>Added 'r' flag to date() which generates an RFC822 formatted date, e.g.
  "Thu,  9 Nov 2000 16:33:01 -0500" (Colin)
<LI>In CGI mode, $HTTP_SERVER_VARS now includes all of the environment variables
  as well (Zeev)
<LI>Allow user to use mysql_use_result in mysql queries (Stas)
<LI>Fixed a memory leak that would occur when restarting Apache often
  (mookid@sigent.ru)
<LI>Fixed a bug that prevented $argv and $argc from being defined in the command
  line version of PHP (Stas)
<LI>Fixed a bug that prevented a changed compile-time extension_dir from
  affecting modules that were loaded via php.ini (Zeev)
<LI>Fixed a bug in ftp_mkdir() when used on ftp server which doesn't return
  the full path (Jani)
<LI>Added ImageCreateFromString() which creates an image stream out of 
  e.g. a MySQL blob. (Mathieu)
<LI>Fixed a crash bug in imagewbmp() (Jani)
<LI>Changed the sablot configuration file so that if you use any version of
  Sablotron below 0.44 you must use Sablotron's built-in Expat libraries.
  (Sterling)
<LI>Added basic authentication support to thttpd (Sascha)
<LI>Added support for the Caudium webserver (http://caudium.net/). It's based
  on the Roxen SAPI module. Many bugs have been identified and fixed. (David)
<LI>Fixed mysql_close(), pg_close(), msql_close() and sybase_close() - they
  weren't properly closing the SQL connections (Zeev)
<LI>Fixed crypt() to supply random seed if none is given (Andi)
<LI>Made print_r() support recursive data structures, e.g. $GLOBALS. (Zeev)
<LI>Fixed a bug that caused PHP not to properly flush its output buffer, if more
  than one output buffer was used. (Zeev)
<LI>Fixed a bug that could draw the shutdown sequence of the PHP Apache module
  into an endless loop, under certain circumstances.  It could cause Apache
  processes under Solaris to get stuck, especially when using output
  buffering. (Zeev)
<LI>Added support for serializing references (Stas)
<LI>Fixed conflict with OpenLDAP and Oracle 8.1.x (Jani)
<LI>parse_ini_file() supports a new optional 2nd argument that instructs it
  to divide the directives to arrays according to the sections in which they
  reside (Zeev)
<LI>parse_ini_file() is now thread-safe, and supported under Windows (Zeev)
<LI>Unified aborted-connection semantics of all SAPI modules (Sascha)
<LI>URL-opened files now store the HTTP response header in $http_response_header
  (Zeev)
<LI>Fixed array_rand() to shuffle results when the number of requested
  elements is the same as the number of elements in the array. (Andrei)
<LI>Added replace parameter to header() (Sascha)
<LI>Fixed handling of single quotes in transparent session-id mode (Sascha)
<LI>Fixed "php://*" fopen handler (Sascha)
<LI>Made rename work in threadsafe enviroments (Daniel)
<LI>Made session_destroy() close files before unlinking (Daniel)
<LI>Added array_sum() function. (Andrei)
<LI>Fixed a bug in session.c. The php_session_save_current_state did not check
  if mod_data is NULL and such situation is possible if the user calls 
  session_module_name with a parameter. (alex@zend.com)
<LI>Added IIS Admin extension. (Frank)
<LI>OCIBindByName() now does better parameter-checking. (Thies)
<LI>Made read() binary-safe in sockets.c (Chris Vandomelen)
<LI>Made array_intersect() and array_diff() not alter order (Stig Venaas)
<LI>Made ldap_connect() accept URL in host parameter when using OpenLDAP
  2.x. To use SSL, use ldaps://host/ as URL. (Stig Venaas)
<LI>Made resource type names visible, e.g. var_dump() and
  get_resource_type() display "file" for file resources. (Andrei)
<LI>Added the curl_getinfo() function to find out information about a CURL
  transfer.  This function requires cURL 7.4.0 or above. (Sterling)
<LI>Added the CURLOPT_KRB4, CURLOPT_INTERFACE, CURLOPT_QUOTE, CURLOPT_POSTQUOTE,
  CURLOPT_QUOTE and CURLOPT_HTTPPROXYTUNNELL options. (Sterling)
<LI>Renamed the shm_* functions to shmop_* (Derick)
<LI>Updated ext/mysql/libmysql to version 3.23 (tim@mysql.com)
<LI>Added ldap_get_option() and ldap_set_option() functions (Stig Venaas)
<LI>Fixed a crash in CGI mode, in case no file was provided 
  (Daniel Beulshausen&amp; Zeev)
<LI>Fixed possible crash bug in imap_fetchstructure() (Jani)
<LI>Fixed possible crash bug in imap_open() (Jani &amp; Mark Musone)
<LI>Added url_rewriter.tags configuration directive (Sascha)
<LI>Added CORBA client extension, ready for use (eriksson@php.net)
<LI>Fixed memory leak in x-httpd-source mode (Jason Greene)
<LI>Changed ext/gd not to be enabled by default (Jani)
<LI>Make increment of empty string ("") behave like in PHP 3 and result in "1"
  (Andi, Zend Engine)
<LI>Added POST handler for Adobe FDF format (Hartmut)
<LI>Added transparent read and write .gz-files on glibc based systems
  using the 'zlib:' fopen wrapper (Hartmut)
<LI>Fixed a problem in the configuration parser (two null bytes were added
  to each ENCAPSULATED TC_STRING) (alex@zend.com)
<LI>Added HMAC support in the mhash module (nmav@altera.gr)
<LI>Added module for Ovrimos sql server (nmav@altera.gr)
</UL>

<A NAME="4.0.3"></A>
<h3>Version 4.0.3</h3>
<B>11-Oct-2000</B>
<UL>
<LI>Fixed a possible crash in -a interactive mode (Zeev, Zend Engine)
<LI>Added mysql_escape_string() (Peter A. Savitch and & Brian Wang)
<LI>Fixed many possible crash bugs with improper use of the printf() family of
  functions (Andi)
<LI>Fixed a problem that allowed users to override admin_value's and admin_flag's
  (Zeev)
<LI>Fixed PostgreSQL module to work when the link handle is omitted (Zeev)
<LI>Fixed returning of empty LOB fields in OCI8. (Thies)
<LI>Added Calendar module to default Win32 build (Andi)
<LI>Added FTP module to default Win32 build (Andi)
<LI>Fixed crash in the POSIX getrlimit() function (alex@zend.com)
<LI>Fixed dirname() under certain conditions (Andi)
<LI>Added --with-imap-ssl to support SSL'ized imap library in RH7 and others
  (Rasmus)
<LI>Fixed possible crash bug in parse_url() (Andi)
<LI>Added support for trans sid under Win32 (Daniel)
<LI>IPv6 support in fopen (Stig Venaas)
<LI>Added the shmop extension. It allows more general ways of shared memory
  access. (thanks to Ilia Alshanestky &lt;iliaa@home.com&gt; and Slava Poliakov
  &lt;slavapl@mailandnews.com&gt; (Derick)
<LI>Added the ability for CURLOPT_POSTFIELDS to accept an associative array of 
  HTTP POST variables and values. (Sterling)
<LI>Added the CURLOPT_HTTPHEADER option to curl_setopt(). (Sterling)
<LI>Added the curl_error() and curl_errno() functions. (Sterling)
<LI>Changed ext/db not to be enabled by default (Jani)
<LI>Fixed building Apache SAPI module on SCO UnixWare (Sascha)
<LI>Fixed writing empty session sets to shared memory (tcarroll@chc-chimes.com)
<LI>Added support for BSD/OS make (Sascha)
<LI>Added improved URL rewriter (Sascha)
<LI>Fixed readdir_r() use on Solaris (Sascha)
<LI>Improved HTTP headers for private-caching (jon@csh.rit.edu, Sascha)
<LI>Added new function session_cache_limiter (jon@csh.rit.edu, Sascha)
<LI>Added ftp_exec to the ftp functions (thanks to &lt;jhennebicq@i-d.net&gt;)
  (Derick)
<LI>PEAR: add last executed query as debug info in DB errors (Stig)
<LI>PEAR: allow multiple modes in PEAR_Error (Stig)
<LI>Made the Sybase CT module thread safe (Zeev)
<LI>Added second argument to array_reverse() that indicatese whether
  the original array keys should be preserved. (Andrei)
<LI>Clean up htmlspecialchars/htmlentities inconsistencies. (Rasmus)
<LI>PEAR: renamed DB_GETMODE_* to DB_FETCHMODE_*, added setFetchMode()
  in DB_common to set the default mode, added some MySQL tests (Stig)
<LI>Made eval() and several other runtime-evaluated code portions report the
  nature and location of errors more accurately (Stas)
<LI>Added an optional parameter to wordwrap that cuts a string if the length of a
  word is longer than the maximum allowed. (Derick)
<LI>Added functions pg_put_line and pg_end_copy (Dirk Elmendorf)
<LI>Added second parameter for parse_str to save result (John Bafford)
<LI>Fixed bug with curl places extra data in the output. (medvitz@medvitz.net)
<LI>Added the pathinfo() function. (Sterling)
<LI>Updated sybase_ct module and its sybase_query to use high performance API.
  (Joey)
<LI>Added a more configurable error reporting interface to DB. (Stig)
<LI>Added is_uploaded_file() and move_uploaded_file() (Zeev)
<LI>Added several directives to php.ini - post_max_size, file_uploads,
  display_startup_errors - see php.ini-dist for further information (Zeev)
<LI>Worked around a bug in the libc5 implementation of readdir() (Stas)
<LI>Fixed some potential OpenBSD and NetBSD crash bugs when opening files. (Andi)
<LI>Added EscapeShellArg() function (Rasmus)
<LI>Added a php.ini option session.use_trans_sid to enable/disable trans-sid.
  (Sterling)
<LI>Added the Sablotron extension for XSL parsing. (Sterling)
<LI>Fixed a bug in checkdate() which caused &lt; 1 years to be valid (Jani)
<LI>Added support for an optional output handler function for output
  buffering.  This enables transparent rendering of XML through XSL,
  transparent compression, etc. (Zeev)
<LI>Added support for user defined 'tick' callback functions. This helps
  emulate background processing. (Andrei)
<LI>Fixed problem with having $this as the XML parser object. (Andrei)
<LI>Internal opened_path variable now uses the Zend memory manager so that full
  paths of files won't leak on unclean shutdown (Andi)
<LI>Removed support of print $obj automatically calling the __string_value()
  method. Instead define yourself a method such as toString() and use
  print $obj->toString() (Andi, Zend Engine)
</UL>

<HR noshade>

<A NAME="4.0.2"></A>
<h3>Version 4.0.2</h3>
<B>29-Aug-2000</B>
<UL>
<LI>Added PHP API for Zend's ticks. (Stig)
<LI>PHP 3 regression testing framework re-born (Stig)
<LI>Added php_uname() function (Stig)
<LI>Made a minor change to allow building with OpenLDAP 2.0 (Stig Venaas)
<LI>Fixed a bug in preg_replace() that would truncate subject string if the
  first argument was en empty array. (Andrei)
<LI>Added ob_get_length function (Stig)
<LI>Fixed a bug that did not respect limit parameter in preg_replace() when
  using /e modifier. (Andrei)
<LI>Added ability for each xml_set_*_handler() function to take the
  array($obj, 'method') syntax for the handler argument as well
  as the normal function name. (Andrei)
<LI>Updated array_walk() to be able to accept array($obj, 'method')
  syntax for the walk function. (Andrei)
<LI>Fixed segfault with fgets(), fgetcsv(), fgetss(), and fread() when
  called with negative length argument. (Torben)
<LI>Fixed by-reference parameters passing for xml_ functions and for scanf
  functions (Stas)
<LI>Added experimental Oracle LDAP SDK support. 8.1.6 or later needed. Configure
  with something like --with-ldap=/usr/local/oracle/product/8.1.6 (Stig Venaas)
<LI>Fixed memory leaks in eval();  A script that used eval() extensively, could
  end up consuming very large amounts of memory during execution (Zeev, Zend
  Engine)
<LI>Fixed memory_limit feature, which did not work properly in previous versions
  (Zeev, Zend Engine)
<LI>Fixed stdout support with the swf extension. (Sterling)
<LI>Fixed byte order for ip2long and long2ip (Stas)
<LI>Fixed dbase_add_record. (Sterling)
<LI>Added support for libmcrypt 2.4.4 (Derick)
<LI>Added strncasecmp function (Andi, Zend Engine)
<LI>Fixed FTP module to accept multiline server replies (Jani)
<LI>Fixed switch which only has a single default rule. (Andi, Zend Engine)
<LI>Fixed problem with nested foreach()'s. (Andi, Zend Engine)
<LI>The CCVS module is now stable and compiling. It compiles as a CGI and into
  Apache cleanly without warnings. (Brendan W. McAdams)
<LI>Fixed mSQL_close(). (nick@loman.net)
<LI>Made return() in a require()'d file work like return() in an include()'d
  file (Andi & Zeev, Zend Engine)
<LI>Changed require_once() to work using the same table as include_once()
  (Andi & Zeev, Zend Engine)
<LI>Fixed PostgreSQL module to work when the link handle is omitted (Zeev)
<LI>Fixed the Sybase modules to work properly with PHP 4.0 (Zeev)
<LI>Fixed CLOB handling in OCI8 driver when using variable-width
  character sets. (Thies)
<LI>Added 4th optional parameter to sybase_[p]connect to specify the charset
  for the connection (alf@alpha.ulatina.ac.cr)
<LI>Fixed support for current thttpd releases. (Sascha)
<LI>Added support for kerberized IMAP library using --with-kerberos 
  (Rasmus, Sascha)
<LI>Virtualize realpath, chmod, chown and utime (Stas)
<LI>Support content-encoding headers in file upload MIME parts
  (Ragnar Kjørstad)
<LI>Fixed warning when shutting down OCINLogon() connections. (Thies)
<LI>Fixed \n in session variables bug on Win32 (Stas)
<LI>OCIError() would sometimes not report failed connections. (Thies)
<LI>Fixed HEAD request bug on an Apache ErrorDocument redirect and preserve
  the status code across the redirect as well.  (Rasmus)
<LI>Added Olympus-specific tags to read_exif_data() (Rasmus)
<LI>Fixed bug in imap_fetchheader() where using FT_PREFETCHTEXT didn't return
  the body. Bug #4447. (Jani)
<LI>Fixed exec() returning "\0" when output is empty
<LI>Added XML_Parser class in PEAR (Stig)
<LI>Added "make test" target in pear/ and added some regression tests (Stig)
<LI>Fixed bug in strip_tags function as per bug #5857 (Rasmus)
<LI>Fixed reading of IPTC via GetImageInfo() for certain JPEG files. (Thies)
<LI>Improved the output-buffering functions to be re-entrant (Zeev)
<LI>Made ldap_add(), ldap_modify(), ldap_mod_add(), ldap_mod_replace()
  binary-safe. Original patch: Terrence Miao &lt;terrence_miao@email.com&gt; (Jani)
<LI>CGI aka. command line version has now an option '-l' for syntax check
  without execution (Hartmut)
<LI>Fixed bug in ldap_get_values_len() which makes it NULL-safe. (Jani)
<LI>Bug-report and fix submitted by Michel Alexeline &lt;alexel@dr15.cnrs.fr&gt;
<LI>Make ext_skel create a Makefile.in set up to handle shared extension
  support automatically (Rasmus)
<LI>Fixed php_realpath not to die on non-existing files (needed for touch())
  (Stas and china@thewrittenword.com)
<LI>Fixed get_browser() function (Stas)
<LI>Fixed symbol clash which caused a DSO problem on OpenBSD (Rob Black and
  anil@recoil.org)
<LI>Added new function: ldap_compare(). (Jani)
<LI>Fixed a bug in ldap_get_entries() and ldap_get_attributes(). (Jani)
<LI>Ported DB to new error reporting scheme in PEAR. (Stig)
<LI>Added sybase and ibase DB backends in PEAR. (Sterling)
<LI>New PEAR package Payment_Verisign for use with the Payflow Pro
  (pfpro) extension. (David Croft)
<LI>Added CURL support. (Sterling)
<LI>Catch users trying to set "compatibility" parameter in PDF, which is not
  supported from user-land. (Joey)
<LI>Fixed dbase_add_record. (Sterling)
<LI>Added new function wordwrap() to wordwrap long strings from Chris
  Russel &lt;russel@yorku.ca&gt; (David Croft)
<LI>Added four additional arguments: attrsonly, sizelimit, timelimit, deref which
  were missing in ldap_search(), ldap_list() and ldap_read() functions (Jani)
<LI>Fixed a bug in ldap_search/list/read() which prevented returning the partial
  results when 'Sizelimit exceeded' error occurred. (Jani Taskinen)
<LI>Fixed preg_replace() to automatically escape quotes in matched
  strings when using /e modifier. (Andrei)
<LI>Itanium patch (Steve Robb)
<LI>Set default include_path so PEAR files can be reached (Stig)
<LI>Added "pear" executable, requires CGI version installed (Stig)
<LI>Added extension ii for Ingres II native support. See README in ext/ingres_ii
  directory. (David H)
<LI>Added Win32 project for the Interbase module (Zeev)
<LI>Added ability to perform calls to the parent class without explicitly
  specifying its name, using parent::func_name(...) (Zeev, Zend Engine)
<LI>You can now call Ora_Error() without prameters to get the reason
  for a failed connection attempt. (Kirill Maximov)
<LI>New extension "pfpro" for interface with Verisign Payflow Pro (David Croft)
<LI>Added IMG_GIF, IMG_JPG, IMG_JPEG, IMG_PNG and IMG_WBMP constants for
  imagetypes() function (Rasmus)
<LI>Added ImageTypes() function which returns a bitfield with the supported
  image formats.  1=gif, 2=jpeg, 4=png and 8=wbmp (Rasmus)
<LI>Make it possible to specify an empty string as a thousands-seperator
  in number_format() (Rasmus)
<LI>Shared module support for LDAP extension (Troels Arvin)
<LI>Fixed a bug with imap_mail where apache would segfault if the rpath
  parameter was specified.
<LI>Use dashes and short day name in cookies since some browsers seem picky
  about this (Rasmus)
<LI>Added pspell module. (Vlad)
<LI>Added 3 additional arguments to the user-defined error handler - the file
  name and line number in which the error occured, and the context (local
  variables) of the code in which the error occured (Zeev, Zend Engine)
<LI>Improved the error handling code to handle an error in a user-defined error
  handling function (Zeev, Zend Engine)
<LI>Fixed leak when using string offsets in the array() construct.
  (Andi, Zend Engine)
<LI>Fixed corruption problem when changing deeply nested values in objects.
  (Andi & Zeev, Zend Engine)
<LI>Improved array_multisort() to be able to specify sort type as well sort
  order. Incidentally, it can be used to sort multi-dimensional arrays
  as well. (Andrei)
<LI>Fixed a possible data corruption in case of a huge amount of aborted requests
  (Zeev)
<LI>Apache module would sometimes close a wrong file-descriptor. (Sascha)
<LI>Fixed use of alternative storage handlers in the session module. (Sascha)
<LI>Updated str_pad() to be able to pad on left/right/both sides. (Andrei)
<LI>Fixed crash in gzopen(). (Thies)
<LI>Multiple character set support in gdttf.c (Rob Goodwin)
<LI>When using HTTP auth from PHP, fill in the %u custom log field so the
  authenticated used id will get logged in the Apache access_log (Rasmus)
<LI>Support for pdflib 3.01. (Uwe)
<LI>FDF Data is handled properly and can be accessed by reading
  HTTP_RAW_POST_DATA. (Uwe)
<LI>Added new 'O' format modifier that will output the GMT offset as "[+-]HHMM"
  (eg: Pacific time is -0700).  This is useful for things such as Date: mail
  headers. (Mike W)
<LI>Fixed crash on OCI?Logon() failure. (Thies)
<LI>Make the special Header("http/...") response be case insensitive like 3.0
  (Rasmus)
<LI>Allow cybercash to compile as a DL module. (Sterling)
<LI>Fixed the dbase_create function. (Sterling)
<LI>Fixed a problem under some versions of Windows that could cause PHP to hang
  on startup if errors occured, e.g. in the php.ini file (Zeev)
<LI>Fixed opendir() again.  It should actually work well continuously now (Zeev)
<LI>Added three additional arguments to be sent to a user-defined error handler -
  the filename and line number in which the error occured, and the context
  (the local variables) of the error (Zeev, Zend Engine)
<LI>Improved the error handling code to handle an error in a user-defined error
  handling function (Zeev, Zend Engine)
<LI>Added an optional parameter to preg_replace() that can be used to
  specify how many replacements to make. (Andrei)
</UL>

<HR noshade>

<A NAME="4.0.1"></A>
<h3>Version 4.0.1</h3>
<B>28-Jun-2000</B>
<UL>
<LI>Fixed a possible crash in the LDAP modify code. (Eric Kilfoil)
<LI>Fixed a bug in opendir(), which prevented readdir() from working properly if
  the $dir argument wasn't explicitly specified (Zeev)
<LI>Made --enable-discard-path work again. (Andi) 
<LI>Removed 8KB limit on line length of the file() function (Zeev)
<LI>Disabled dl() when PHP is being used as a module inside a multithreaded web
  server - it didn't work before, and caused weird results (Zeev)
<LI>Added the ImageColorClosestHWB(), ImageCopyMerge() and ImagePaletteCopy() 
  functions. (Sterling)
<LI>Added ImageCreateFromWBMP() function. (Jouni)
<LI>Fixed problems with POST requests under the NSAPI module. (Roberto Biancardi)
<LI>Added spliti() function. (Thies)
<LI>Fixed serializer behaviour with regards to serializing objects whose class
  definition was not available in the deserializing context. (Sascha)
<LI>Improve memory cache performance and increase cache size. (Stas, Zend Engine)
<LI>Added a crc32 checksum function - used by the UdmSearch search engine
  and currently run through a system call.  This will speed up the UdmSearch
  php frontend significantly. (Rasmus)
<LI>Modified in_array() to not touch array pointer. (Andrei)
<LI>Added restore_error_handler(). (Zeev, Zend engine)
<LI>Fixed erroneous file names and line numbers in error situations under the
  multithreaded version of PHP - most noticeably Win32 (Zeev, Zend Engine)
<LI>Fixed problem with CGI crashing on certain servers especially Windows Apache
  & O'Reilly website (Andi)
<LI>Added Pi3Web SAPI module; run ./configure --with-pi3web to enable this.
  (Holger; zimpel@t-online.de)
<LI>Enhanced WDDX functions to call __sleep() and __wakeup() when working on
  objects. (Andrei)
<LI>Changed WDDX to serialize arrays as structs only if needed. (Thies)
<LI>Implemented max_execution_time under Win32 (Zeev)
<LI>Updated strtotime() to handle many more formats. It now has complete
  feature parity with GNU date command. (Andrei)
<LI>Added support for multiple arguments in unset(). (Faisal, Zend Engine)
<LI>Functions that expect a resource but are passed something else now return 
  NULL instead of FALSE. (Thies, Zend Engine)
<LI>Fixed gmmktime(), on certain systems it incorrectly adjusted for the timezone
  offset and daylight savings time. (Andrei)
<LI>Moved VC++ Win32 project and workspace files to the win32 directory
  (Zeev)
<LI>Fixed checkdate() to not return true on non-numeric arguments (Rasmus)
<LI>Added --enable-c9x-inline option for compilers which support the new C9x
  standard. If you encounter undefined references to i_zend_is_true and
  other symbols, you should enable this.  (Sascha, Zend Library)
<LI>Fixed a problem in ldap_add() and ldap_modify(), sometimes added trailing
  garbage to the values (Stig Venaas) 
<LI>Fixed a problem with dbmopen() not handing 'c' correctly with dbm/db/ndbm
  databases. (JimJag)
<LI>Fixed a crash in number_format() when used with locales. (Andrei)
<LI>Fixed an initialization problem in the MS-SQL problem that could cause
  a crash in mssql_query() (Zeev)
<LI>Upgraded PCRE to version 3.2 and fixed a bug when anchored pattern
  matched an empty string. (Andrei)
<LI>Fixed a bug that prevented PHP from paying attention to the extension_dir
  directive with extensions that were loaded from the php.ini file (Zeev)
<LI>Changed set_error_handler() to return the name of the previously defined
  error handler, if any (Zeev, Zend Engine)
<LI>Declared &lt;? php_track_vars ?&gt; officially dead.  It didn't work in PHP 4.0.0
  either, but now it's gone for good (Zeev)
<LI>Make convert_cyr_string() binary safe and stop it from corrupting other
  PHP variables. (Andi)
<LI>Added functions array_unique, array_intersect and array_diff (Stig Venaas)
<LI>Fixed problem when using uninitialized values in comparisons with strings.
  They behave as empty strings again just like in PHP 3.
  (Andi & Zeev, Zend Engine)
<LI>Fixed 'Z' flag in date() to adjust for daylight savings time. (Andrei)
<LI>Fixed var_dump() not to modify the internal order of array elements (Zeev)
<LI>Fixed stripcslashes() to remove to strip \ in unknown escapes instead of
  leaving it. (Andrei)
<LI>Changed WDDX to always serialize arrays as structs. (Andrei)
<LI>Fixed include_once() to issue a warning in case the supplied file name is
  not found (Zeev, Zend Engine)
<LI>Fixed a bug in get_declared_classes() which could return the same class
  multiple times under certain circumstances (Zeev, Zend Engine)
<LI>Fixed a bug in rawurldecode() that would cause in rawurldecode() corrupting
  its argument (Zeev)
<LI>Parse errors (or other errors) in the php.ini files under Windows will no
  longer mess up the HTTP headers in CGI mode and are now displayed in a
  message box (Zeev)
<LI>Fixed a crash in OCIFetchStatement() when trying to read after all data
  has already been read. (Thies)
<LI>fopen_wrappers() are now extensible via modules (Hartmut Holzgraefe)
<LI>Make trim strip \0 to match php 3 (Rasmus)
<LI>Added function imagecreatefromxbm(). (Jouni)
<LI>Added function imagewbmp(). (Jouni, based on patch from Rune Nordbøe
  Skillingstad)
<LI>Added str_pad() for padding a string with an arbitrary string on left or
  right. (Andrei)
<LI>Made the short_tags, asp_tags and allow_call_time_pass_reference INI
  directives work on a per-directory basis as well, e.g. from .htaccess
  files. (Zeev)
<LI>Added fflush() function. (Eric Huss)
<LI>Fixed a problem with static variables, default function arguments and class
  member variables, that contained array values. (Andi & Zeev, Zend Engine)
<LI>Fixed virtual() when used with output buffering (Marc Pohl)
<LI>Clean up constants in flock() function and add optional 3rd arg which
  is set to true on EWOULDBLOCK (Rasmus)
<LI>Added functions pg_loimport(), pg_loexport(). (Jouni)
<LI>Added SWF support to getimagesize() function (Derick Rethans)
<LI>Added support for both indexed and non-indexed arrays of file uploads
  eg. name="file[]" type="file" (Rasmus)
<LI>Added create_function(), which gives the ability to create functions
  on-the-fly (Zeev, Zend Engine)
<LI>Added support for comparisons of arrays (with arrays) and objects (with
  objects);  The equality operator (==) performs an unordered comparison,
  whereas the identity operator (===) performs an ordered comparison (Zeev,
  Zend Engine)
<LI>Allow all functions that receive user-defined function callbacks to accept
  an array that contains an object and a method name, in place of a function
  name, e.g. usort($array, array($obj, "ObjSort")) (Zeev, Zend Engine)
<LI>Added set_error_handler() to allow custom error handling functions,
  instead of the built-in error handling code (Zeev, Zend Engine)
<LI>Renamed user_error() to trigger_error();  user_error() remains
  defined for compatibility (Zeev, Zend Engine)
<LI>Fixed the global/static statements to require a trailing terminating
  semi-colon ';'. (Andi, Zend Engine)
<LI>Cleaned up PCRE extension and made it binary-safe. (Andrei)
<LI>Added third argument to in_array(). If it's true, then in_array()
  will use strict comparison instead of the default one. (Andrei)
<LI>Added pg_trace() and pg_untrace (Dominic J. Eidson & Zeev)
<LI>ignore_user_abort=Off is now default. (Thies)
<LI>Added array_merge_recursive() that will recursively merge values
  under the same keys. (Andrei)
<LI>fixed crash in OCIParse when parsing invalid SQL. (Thies)
<LI>Fixed a bug in mysql_connect() that made it ignore the socket argument, in
  case of non-persistent connects (Zeev)
<LI>Added disable_functions php.ini directive, to allow administrators to disable
  certain functions for security reasons (Zeev)
<LI>Fixed sessions on Win32. When setting the directory depth parameter in
  save_path you need to now delimit it with a ';' instead of ':', e.g
  "5;/tmp" instead of "5:/tmp" (Andi)
<LI>Changed the Apache handler's return status to 'Declined' when a requested
  PHP file could not be found.  Returning 'Not Found' caused problems
  in the ErrorDocument handler stage in that $REDIRECT_REDIRECT_ERROR_NOTES
  was not getting set at all.  Moving to 'Declined' should fix this and I
  can't see any other side effects.  (Rasmus)
<LI>Fixed scanning decimal numbers in internationalized environments. They should
  always be in standard US format e.g. 23.3. (Andi, Zend Engine)
<LI>Added second argument to preg_quote() which allows quoting of
  one additional character, usually the regex delimiter. (Andrei)
<LI>Uncommitted outstanding OCI8 transactions are now rolled back
  before the connection is closed. (Thies)
<LI>ignore_user_abort() & friends should now work in CGI mode as well.
  (Patch by daniel.braun@ercom.fr)
<LI>Added extension YAZ (dickmeiss).
<LI>Fixed a crash bug triggered by certain cases of class redeclarations
  (Stas & Zeev, Zend Engine)
<LI>Fixed min()/max() segfault. (Andrei)
<LI>New module for reading EXIF header data from JPEG files.  Most digital
  cameras will embed all sorts of information about a picture inside the
  jpeg images it generates.  (Rasmus)
<LI>Fixed basename() bug where "file.ext///" would not return the same
  as "/path/file.ext///" (Rasmus)
<LI>Added the swf_ortho function. (Sterling)
<LI>Moved to virtual current working directory support. This highly improves the
  functionality and stability of multi-threaded versions of PHP (Andi, Sascha)
</UL>

<HR noshade>

<A NAME="4.0.0"></A>
<h3>Version 4.0.0 Release</h3>
<B>22-May-2000</B>
<UL>
<LI>Allow the writing of flash files to stdout.
<LI>Fixed a crash bug in .phps syntax-highlighted files (Andi)
<LI>Improved round() to allow specification of rounding precision.
  (Andrei, Todd Kirby &lt;kirbyt@yahoo.com&gt;)
<LI>Added SORT_REGULAR, SORT_NUMERIC, SORT_STRING flags that can be used with
  non-user sort functions for precise sorting behavior. (Andrei)
<LI>Fixed two 64-bit issues (startup crash, gethostbyaddr). (Sascha)
<LI>NULL values are now preserved in the return value of mysql_fetch_array()
  and mysql_fetch_object(). (Andrei)
<LI>Ported InterBase module finally from PHP 3 to PHP 4. Full support for
  InterBase 6. (Jouni)
<LI>Added swf_definepoly for drawing polygons to the SWF functions. (Sterling)
<LI>Ported imagegammacorrect from PHP3 to PHP4. (Sterling)
<LI>Added array_rand() function. (Andrei)
</UL>

<HR noshade>

<h3>Version 4.0, Release Candidate 2</h3>
<B>08-May-2000</B>
<UL>
<LI>NSAPI WIN32 Module compilable, untested (Shane)
<LI>Apache WIN32 Module compilable and lightly tested. (Shane)
<LI>Enabled assert() by default in php.ini-dist. (Andrei)
<LI>Put in safeguards in case dynamic code evaluation in assert() and
  preg_replace() with /e modifier fails. (Andrei)
<LI>Fixed infinite recursion when serializing $GLOBALS[] in WDDX. (Andrei)
<LI>Made WDDX serialization properly escape &lt;, &gt;, and &. Also speeded up
  the serialization in general. (Andrei)
<LI>Moved install-local to install-sapi for clarity. (Joey)
<LI>Improved extension build framework. Refer to README.SELF-CONTAINED-EXTENSIONS
  for an introduction. (Sascha)
<LI>ImagePolygon() is no longer limited by a maximum number of polygons.
  (Marc Pohl)
<LI>Added configure time checking for bcmath package. (Joey, Sascha)
<LI>Added get_declared_classes(). (Andrei, Zend Engine)
<LI>Added initial NSAPI module from Jayakumar Muthukumarasamy. (Rasmus)
<LI>Added the SWF module which allows you to create Macromedia Flash files via 
  libswf. (Sterling)
<LI>Improved UNIX build system to support more vendor make tools (Sascha)
<LI>Updated natural comparison/sorting algorithm by Martin Pool
  &lt;mbp@humbug.org.au&gt;. (Andrei)
<LI>Fixed a crash in array_multisort() that happened when empty arrays
  were passed to it. (Andrei)
<LI>Added substr_count() from Peter Kovacs. (Andrei)
<LI>Added an optional third argument to fseek to indicate where to seek from.
  (Andrei)
<LI>OCIBindByName() will no longer complain about bindlength beeing zero. (Thies)
<LI>Converted the IMAP module to the high performance API (Zeev)
<LI>The fgetcsv() function now handles embedded end-of-line in a quoted field
  (Nick Talbott)
<LI>Added user_error(), to allow explicitly generate error messages from scripts
  (Zeev, Zend Engine)
<LI>Fixed a problem in long2ip() that occasionally returned incorrect IP address.
  (Evan, Andrei)
<LI>Fixed many memory leaks in the IMAP module (Stas, Andi, Zeev)
<LI>Fixed bug in number_format (Jon Forsberg)
<LI>Make error_prepend_string and error_append_string work (Rasmus)
<LI>array_walk() now automatically resets the array. (Andrei)
<LI>Added natural comparison/sorting routines strnatcmp(), strnatcasecmp(),
  natsort(), and natcasesort(). These are useful for comparing and sorting
  strings that contain numbers. Based on the code from Martin Pool
  &lt;mbp@humbug.org.au&gt;. See http://www.linuxcare.com.au/projects/natsort/
  for more info on natural sorting. (Andrei)
<LI>Zeus Webserver support (version 3.3.6+) for ISAPI (Ben Mansell)
<LI>Fixed several problems with the PATH_TRANSLATED and PHP_SELF under Apache
  (Paul Gregg & Zeev)
<LI>Ported ldap_get_values_len() function from PHP3 to PHP4. (Sterling)
<LI>Fixed a problem in include_once() with non constant arguments (Andi & Zeev,
  Zend Engine)
<LI>Added php.ini-optimized (Zeev)
<LI>Ported ldap_errno(), ldap_err2str() and ldap_error() from PHP3 to PHP4.
  (Sterling)
<LI>WDDX now defaults to ISO-8859-1. (Thies)
<LI>Fixed crash resulting from IMAP's error handling (Stas)
<LI>Added $HTTP_POST_FILES[filename][tmp_name] - it was previously impossible to
  retrieve the temporary name of an uploaded file using $HTTP_POST_FILES[]
  (Zeev)
<LI>Made the IMAP and LDAP modules compilable under Windows and thread-safe
  (Zeev)
<LI>Fixed a problem when dealing with large POST blocks in CGI mode (Zeev)
<LI>Added session_get_cookie_params() function. (Sterling)
<LI>Fixed return of stristr() to no longer always be lowercased. (Andrei)
<LI>Changed the Windows version of PHP so that a php.ini file is no
  longer mandatory (Zeev)
<LI>session_start() is now more verbose if headers cannot be send. (Thies)
<LI>Fixed a memory leak when using assign-op bitwise operators on strings (Zeev,
  Zend Engine)
<LI>Added support for reading properties that require arguments in the COM
  module - writing to them will only be supported in PHP 4.1 (Zeev)
<LI>Fixed a very old legacy memory leak in the COM module (Zeev)
<LI>Fixed problems with object-overloading support - noteably, COM and Java
  (Zeev, Zend Engine)
<LI>Fixed an overrun in WDDX. (Thies)
<LI>Fixed a crash bug with modules loaded through dl() not properly freeing their
  resources (Zeev, Zend Engine)
<LI>Added localtime() function. (Sterling)
<LI>Added the 'I' format option for the date function, this option will return
  true or false depending on whether or not daylight savings time is in effect.
(Sterling)
<LI>Added gmstrftime() function. (Sterling)
<LI>snmp_walkoid is now an alias for snmp_realwalk. (Sterling)
<LI>Fixed a bug that could cause a crash when using 'global' inside large include
  files (Stas, Zend Engine)
<LI>Added --enable-libgcc switch to force linking against libgcc (Sascha)
<LI>Fixed dynamic loading where extension_dir had no trailing slash (Sascha)
<LI>Fixed dynamic loading on OpenBSD (Sascha)
<LI>Improved POSIX threads check. ZTS works now on at least Linux, Solaris, 
  FreeBSD and OpenBSD (Sascha, TSRM)
<LI>Added !== operator support. (Torben, Zend Engine)
</UL>

<HR noshade>

<h3>Version 4.0, Release Candidate 1</h3>
<B>27-Mar-2000</B>
<UL>
<LI>Added support for UCD-SNMP 4.1.x (Sascha)
<LI>Fixed a data corruption bug in mysql_result(), if used in table.fieldname
  mode (Zeev)
<LI>Fixed a crash problem in func_num_args(), func_get_arg() and func_get_args()
  when used as function arguments (Andi, Zend Engine)
<LI>Added get_class_methods(string classname) function. (Andrei)
<LI>Added 'I' switch to test whether or not DST is active. (Sterling)
<LI>Fixed a data corruption bug in mysql_result(), if used in table.fieldname
  mode (Zeev)
<LI>Modified the registry INI entry reader (Win32) to work with drive letters.
  For example, if you wish to wish to specify INI entries for C:\foo\bar, you
  should create HKLM\PHP\Per Directory Values\C\foo\bar in the registry, and add
  string values for each directive you want to override in this directory (Zeev)
<LI>Fixed extract() for EXTR_PREFIX_SAME and EXTR_SKIP cases. (Andrei)
<LI>stristr() no longer modifies it's arguments. (Thies)
<LI>Don't default to iso-8859-1 since this confuses some browsers. (Rasmus)
<LI>Make it possible to specify both a port and a socket
  in mysql_[p]connect.  (Rasmus)
<LI>Added --disable-pic for disabling generating PIC for shared objects
  on platforms which support it (i.e. Linux) (Sascha)
<LI>serialize()/unserialize() now call __sleep() and __wakeup() when
  working on objects. (Thies)
<LI>renamed to_string() method to __string_value() for consistency.
  (Thies, Zend Engine)
<LI>Fixed a bug in the third argument to define()
<LI>Added is_numeric() that returns true if the argument is a number
  or a numeric string. (Andrei)
<LI>domxml now supports libxml 2.0 Beta and drops support for older versions,
  due to massive changes in libxml
<LI>fixed possible crash in unserialize() if serialized data was
  corrupted. (Thies)
<LI>Changed $HTTP_STATE_VARS to $HTTP_SESSION_VARS. Use only the latter
  version now! (Andrei)
<LI>Added GD-JPEG Support (Rasmus)
<LI>Prevent from loading dynamic PHP modules which were compiled with different
  debug and thread safety modes than PHP, which resulted in a crash (Andi)
<LI>connection_aborted() and friends work again (Thies)
<LI>Upgraded to libtool 1.3.4 (Sascha)
<LI>UNIX configure creates config.nice in the build directory now which allows
  easy reuse of configuration options (Sascha)
<LI>Added support for embedded MySQL client library. Unless you specify a path
  to --with-mysql, the bundled MySQL client library will be used (Sascha)
<LI>Added include_once() and require_once() functionality (Andi, Zend Engine)
<LI>Removed support for pdflib &lt; 3.0 (Uwe)
<LI>Added auto-registration of everything in $HTTP_SESSION_VARS[] if
  register_globals is turned off. (Andrei)
<LI>Cleaned up extension namespace (Stig)
<LI>OCINLogon() sessions are now closed again. (Thies)
<LI>Added ip2long() and long2ip(),
  courtesy of Faisal Nasim &lt;faisal@nasim.org&gt; (Andrei)
<LI>Added ftruncate() and fstat(),
  courtesy of Faisal Nasim &lt;faisal@nasim.org&gt; (Andrei)
<LI>Added parse_ini_file().  Currently implemented in non thread safe version
  of PHP, and currently lacks section support (Zeev)
<LI>"none" is now equivalent with "" in Apache config directives (Stig)
<LI>OCINLogon no longer crashes. (Thies)
<LI>Fixed comparisons of (string) "nan" with (string) "nan". (Thies, Zend Engine)
<LI>Switched back to the old $HTTP_*_VARS[] behavior - $HTTP_GET_VARS["foo"]
  and $foo are no longer references to each other, but separate variables
  like they were prior to PHP 4.0 Beta 4 (Zeev)
<LI>Fixed Sybase-DB compilation (Zeev)
<LI>Fixed a (fairly common) situation where error_reporting values would not be
  properly restored after a call to error_reporting(), in between requests
  (Zeev)
<LI>The various $HTTP_*_VARS[] are now protected, and cannot be manipulated by
  user input (Zeev)
<LI>Added ini_set() as an alias to ini_alter() (Zeev)
<LI>The string None is now recognized as a keyword by the php.ini processor, and
  can be used to denote an empty string (Zeev)
<LI>Added get_class_vars(string class_name) and get_object_vars(object obj)
  functions. (Andrei, Zend Engine)
<LI>Added pdf_set_parameter(), pdf_skew(), pdf_show_boxed() (Uwe)
<LI>Fixed comparison of (string) "inf" with (string) "inf", which was erroneously
  returning false (Zeev)
<LI>Implemented default_charset and default_mimetype config directives (Stig)
<LI>Ported T1lib support from PHP3. (Jouni)
<LI>Fixed -DEAPI inheritance from APXS. (Sascha)
<LI>Fixed possible crash in module-shutdown. (Thies)
<LI>Fixed safe_mode_protected_env_vars INI directive (Zeev)
<LI>Fixed getrusage() (Sascha)
<LI>Fixed OCI8 crash when returning cursors from stored-procedures. (Thies)
</UL>

<HR noshade>

<h3>Version 4.0, Beta 4 Patch Level 1</h3>
<B>21-Feb-2000</B>
<UL>
<LI>Fixed crash when magic_quotes were switched off. (Thies)
<LI>Support for pdflib 2.30 (Uwe)
</UL>

<HR noshade>

<h3>Version 4.0, Beta 4</h3>
<B>20-Feb-2000</B>
<UL>
<LI>Introduced $HTTP_POST_FILES[], that contains information about files uploaded
  through HTTP upload (Zeev)
<LI>Made PHP work under Microsoft Personal Web Server, under both Windows NT
  workstation and Windows 95 (Zeev)
<LI>Made multipart/form-data content obey to the variables_order directive (Zeev)
<LI>Updated the browscap module to work with PHP 4.0 (Zeev)
<LI>Recover gracefully in ISAPI after the client prematurely presses STOP (Andi)
<LI>Fixed bug in unset() on array offsets which are referenced more than once
  (Andi, Zend Engine)
<LI>Improved ISAPI module - it should no longer be necessary to set PHP as
  an ISAPI filter, only as an ISAPI extension, unless you wish to perform
  authentication using PHP.  This didn't yet get enough testing, but it
  should work (Zeev)
<LI>Fixed RFC1867 file upload under Windows (Zeev)
<LI>Initital support for pdflib 2.20 (Uwe)
<LI>Added PostgreSQL support for DB (Rui Hirokawa &lt;louis@cityfujisawa.ne.jp&gt;)
<LI>Re-introduced "none" for disabling auto_prepend/append_file (Stig)
<LI>Added DB/storage (Stig, PEAR)
<LI>Introduced DB warnings (Stig, PEAR)
<LI>Fixed overrun in strip_tags (Stas)
<LI>Fixed crash in strip_tags() and related functions. (Thies)
<LI>Workaround for bogus POST-Data from IE/Mac. (Thies)
  Patch by Alain Malek &lt;alain@virtua.ch&gt;
<LI>Finished the server abstraction layer;  All of the PHP code is now shared
  across different servers (Apache, CGI, IIS, etc.), except for thin
  interface modules (Zeev)
<LI>Added NULL-support in gettype(). (Thies)
<LI>base64_decode() will decode POST data correct. (Thies)
  Patch submitted by: Turadg Aleahmad &lt;turadg@wise.berkeley.edu&gt;
<LI>Much more work on domxml. Build xml tree, create xml doc works (Uwe)
<LI>Made foreach() work on objects. (Thies, Zend Engine)
<LI>Added domxml extension based on libxml, still little functionality (Uwe)
<LI>Fixed memory corruption in fgetss(), strip_tags() and gzgetss() (Zeev)
<LI>Updated calendar dynamic library to work with PHP 4. (Evan)
<LI>Added strncmp() function, courtesy of Walter. (Andrei)
<LI>Made the output of var_dump() more informative. (Thies)
<LI>Fixed some OCIBindByName() problems. (Thies)
<LI>Protect the ISAPI module against exceptions.  Stack overflows in scripts are
  now nicely detected and handled (Zeev)
<LI>Fixed possible buffer-overflow in base64_decode. (Thies)
<LI>Fixed possible buffer-overflow in setcookie(). (Thies)
<LI>Fixed signal() bug that could cause the Apache master process to
  die. (Thies)
<LI>Added session_set_cookie_params() function. (Andrei)
<LI>If header information is sent after output has already been sent, the warning
  message will now state the filename and line number at which the first output
  was made (Zeev)
<LI>Added the XML Expat library to the standard PHP source distribution thanks
  to its author James Clark (Andi & Zeev)
<LI>Added XML support to the default Win32 build (Andi & Zeev)
<LI>Added socket_get_status() function. Renamed set_socket_timeout() to 
  socket_set_timeout() and set_socket_blocking() to socket_set_blocking(). (Andrei)
<LI>Added realpath() function. (Andrei)
<LI>mktime interprets years in the range 0-70 now as 2000-2070. You can
  continue to specify the complete year (i.e. 1920) (Sascha)
<LI>Added the ability to control the environment variables the user is allowed
  to change in Safe Mode, using INI directives (Zeev)
<LI>Fixed a crash bug in strtr() working on large input strings (Zeev)
<LI>Ora_GetColumn()/Ora_FetchInto() now return NULL for NULL-Columns. (Thies)
<LI>OCI8 now supports binding of NULL-values. Module cleanups. (Thies)
<LI>Added ability to set timeout on socket read operations through
  set_socket_timeout() function. (Andrei)
<LI>Added implicit_flush INI directive (Zeev)
<LI>Added implicit_flush() to control whether flush() should be called
  implicitly after any output (Zeev)
<LI>Fixed a crash in pfsockopen() (Zeev)
<LI>Fixed a possible crash in phpinfo() (Zeev)
<LI>Added register_argc_argv INI directive, to allow to selectively disable
  the declaration of the $argv and $argc variables for increased
  performance (Zeev)
<LI>Added $HTTP_ENV_VARS[] and $HTTP_SERVER_VARS[] support, which similarly
  to $HTTP_GET_VARS[], contain environment and server variables.  Setting
  register_globals to Off will now also prevent registration of the
  environment and server variables into the global scope (Zeev)
<LI>Renamed gpc_globals INI directive to register_globals (Zeev)
<LI>Introduced variables_order that deprecates gpc_order, and allows control
  over the server and environment variables, in addition to GET/POST/Cookies
  (Zeev)
<LI>new function cpdf_set_document_limits() (Uwe)
<LI>Applied safe-mode patch to popen(). (Patch by Kristian Köhntopp)
<LI>str_repeat() now returns correct length. (Thies)
<LI>Don't assume libz and libpng are installed for the GD checks (Rasmus)
<LI>Implemented support for &lt;boolean&gt; and &lt;null&gt; types according
  to WDDX version 1.0 (Andrei)
<LI>Made var_dump()/serialize()/unserialize() NULL aware. (Thies)
<LI>Added new NULL constant (Zeev, Zend Engine)
<LI>Fixed -c support in the standalone CGI binary (Zeev)
<LI>Increased PHP's performance by 5-15% using a new memory cache (Andi & Zeev,
  Zend Engine)
<LI>Improved the php.ini reader to support constants and bitwise operators (Zeev)
<LI>Fixed strrev() to no longer modify arg1. (Thies)
<LI>Fixed buffer overruns in iptcembed(). (Thies)
<LI>Fixed a bug in ODBC error reporting (Zeev)
<LI>Added PHP_Logo_GUID() and Zend_Logo_GUID() functions, that return the GUIDs
  of the PHP and Zend logos used in phpinfo() (Zeev)
<LI>Added GNU Pth support (Sascha, TSRM library)
<LI>Removed select(), fd_set() and fd_isset() - will be reimplemented soon! (Thies)
<LI>Improved Win32 performance significantly by using different mutexes (Zeev,
  TSRM library)
<LI>Made quotemeta() and preg_quote() binary-safe. (Andrei)
<LI>Added UDP support in fsockopen(). (Evan)
<LI>Added --disable-pear option (Andrei)
<LI>Renamed libzend repository to Zend (Zeev)
<LI>Added support for thttpd (Sascha)
<LI>Added session.cache_limiter and cache_expire options (Sascha)
<LI>Restored the PHP_VERSION and PHP_OS constants (Zeev)
<LI>Added get_loaded_extensions(), extension_loaded(), and
  get_extension_funcs() functions. (Andrei)
<LI>Added date/time stamping to PHP error log file. (Andrei, Joey)
<LI>Added is_subclass_of() function (Andrei, Zend Engine)
<LI>Implemented count_chars(). (Thies)
<LI>Added class_exists() function (Andrei, Zend Engine)
<LI>Made strspn() and strcspn() binary-safe. (Andrei)
<LI>Added array_multisort() function. (Andrei)
<LI>Made pageinfo.c thread-safe (Sascha)
<LI>Made implode() binary-safe (Andrei)
<LI>Made strstr(), stristr(), and ucwords() binary-safe() (Andrei)
<LI>Made strtoupper(), strtolower(), substr_replace() binary-safe. (Andrei)
<LI>Fixed a crash in the Apache syntax highlighting mode (Zeev)
<LI>Report all ODBC error's not just the one on the top of the stack (lurcher)
<LI>OCI8 now returns NULL values in LONG columns correct. (Thies)
<LI>Added support for a C-like assert() function. (Thies)
<LI>Added CyberCash support. (Evan)
<LI>Made explode() binary-safe. (Thies)
<LI>Made strpos() binary-safe. (Thies)
<LI>Added XML_Set_Object() function, now you can use the XML-Parser from
  within an object. (Thies)
<LI>Session vars are now decoded into $HTTP_STATE_VARS[] array and the
  globals, depending on track_vars and gpc_globals settings (Andrei)
<LI>Added get_used_files() function - returns a hash mapping the use()'d files
  to their full path (Zeev)
<LI>PHP 4 scripts will now obey the max_execution_time setting and actually
  time out (Rasmus)
<LI>Added configure command to phpinfo() output (Stig)
<LI>Added optional socket path to the mysql_?connect() functions (Rasmus)
<LI>Made mysql and gd work as shared extensions again (Stig)
<LI>Make the global GET/POST/Cookie variables and their $HTTP_*_VARS[] counterparts
  be references to each other (Zeev)
<LI>Added support for the 'use' keyword - behaves like 'require', but will not
  use the same file more than once (Andi & Zeev, Zend Engine)
<LI>Added check to see if a persistent connection is still valid with the
  ODBC interface before reusing (nick@easysoft.com)
<LI>Added DBMaker support (patch by Pax Tsai &lt;paxtsai@lion.syscom.com.tw&gt;)
<LI>Renamed "PECL" to "PEAR" (PHP Extension and Add-on Repository) (Stig)
<LI>buildconf now uses build.mk (Stig)
<LI>Disable symlinks to urls (Rasmus)
<LI>Informix driver now reflects version of ESQL/C used  (Danny)
<LI>Modified session_register() to take variable number of arguments (Andrei)
<LI>Fixed file descriptor leak in thread safe mode (Zeev, Zend Engine)
<LI>Added select(), fd_set() and fd_isset() (Evan)
<LI>cpdf support has been ported from php3, needs ClibPDF 2.x (Uwe)
<LI>Fixed a leak when using automatic output buffering (Zeev)
<LI>Introduced PECL - PHP Extension and Code Library
  (prounounced "pickle") (Stig)
<LI>Fixed inconsistencies in the implementation of here-docs (Andi & Zeev, Zend 
  library)
<LI>Fixed a problem with constant class-member initializations (Andi & Zeev,
  Zend Engine)
<LI>Fixed float-compare in min(),max(),a[r]sort(),[r]sort() (Thies)
<LI>Implemented get_html_translation_table() function (Thies)
<LI>Implemented array_flip() function. Returns input-array with key, value
  flipped (Thies)
<LI>Added Berkeley DB3 support in DBA (Sascha)
<LI>Implemented 2-Arg version of strtr($str,$translation_array). This can be used
  to revert what htmlspecialchars() did (Thies)
<LI>Fixed mem-overwrite in XML_Parse_Into_Struct (Thies)
<LI>Added substr_replace() function (Andrei)
</UL>

<HR noshade>

<H3>Version 4.0 Beta 3</H3>
<B>16-Nov-1999<B>
<UL>
<LI>ucfirst()/ucwords() no longer modify arg1 (Thies)
<LI>Fixed strtr() not to modify arg1 (Thies)
<LI>Added Win32 build files for Informix driver and make it
  compile with ZTS (danny)
<LI>Added tmpfile() function (Stig)
<LI>Upgraded regex library to alpha3.8 (Sascha)
<LI>Fixed selecting nested-tables in OCI8. (Thies)
<LI>RFC-854 fix for internal FTP-Code. Commands have to end in "\r\n" (Thies)
<LI>Fixed OpenLink ODBC support (Stig)
<LI>min(),max(),a[r]sort(),[r]sort(),k[r]sort() now work consistent with the 
  language-core. (Thies)
<LI>tempnam() now uses mkstemp() if available (Stig)
<LI>serialize() and var_dump() now honor the precision as set in php.ini
  for doubles. (Thies)
<LI>Improved the Win32 COM module to support [out] parameters (Boris Wedl)
<LI>Fixed garbage returned at the end of certain Sybase-Columns (Thies)
  Patch submitted by: neal@wanlink.com
<LI>Added Microsoft SQL Server module for Win32 (Frank)
<LI>Added support for forcing a variable number of internal function arguments
  by reference. (Andi & Zeev, Zend Engine)
<LI>Implemented getprotoby{name,number} (Evan)
<LI>Added array_pad() function. (Andrei)
<LI>Added new getservby{name,port} functions. (Evan)
<LI>Added session.cookie_path and session.cookie_domain (Sascha)
<LI>Continue processing PHP_INI_SYSTEM knownDirectives after extension=
  (Sam Ruby)
<LI>Enable IBM DB2 support - Tested against DB2 6.1 UDB on Linux (Rasmus)
<LI>Added new str_repeat() function. (Andrei)
<LI>Output-Buffering system is now Thread-Safe. (Thies)
<LI>implemented OCI8 $lob->WriteToFile() function - very useful for streaming
  large amounts of LOB-Data without to need of a huge buffer. (Thies)
<LI>Added session.use_cookies option (Sascha)
<LI>Added getcwd() function. (Thies)
<LI>XML_Parse_Into_Struct no longer eats data. (Thies)
<LI>Fixed parse_url('-') crash. (Thies)
<LI>added === operator support. (Andi & Thies, Zend Engine)
<LI>unserialize() now gives a notice when passed invalid data. (Thies)
<LI>Fixed shuffle() so that it no longer breaks on Solaris. (Andrei)
<LI>Added is_resource(), is_bool() functions. (Thies)
<LI>Cleaned up File-Module (Thies)
<LI>Upgraded math-funtions to use new Zend function API (Thies)
<LI>Fixed zombie problem in shell_exec() and $a = `some_command`
  constructs. (Thies)
<LI>Thies introduced ZEND_FETCH_RESOURCE2 (Danny).
<LI>Added Informix driver to list of maintained extensions. (Danny).
<LI>Informix driver : Changed ifx.ec to use the new high-performance
  ZEND API. (Danny)
<LI>IXF_LIBDIR environment variable specifies alternate Informix library
  path for configure (Danny).
<LI>Fixed gmmktime() so that the following should always be true:
  gmmktime([args]) == mktime([args]) + date('Z', mktime([args])) (Jouni)
<LI>setlocale doesn't anymore screw up things if you forgot to change it back
  to the original settings. (Jouni)
<LI>Switched to new system where ChangeLog is automagically updated from commit
  messages. NEWS file is now the place for public announcements. (Andrei)
<LI>Fixed refcount problem in XML module. (Thies)
<LI>Fixed crash in HTTP_RAW_POST_DATA handling (Thies)
<LI>You can use resources as array-indices again (Thies, Zend Engine)
<LI>Fixed pg_fetch_array() with three arguments (Sascha)
  Patch submitted by: brian@soda.berkeley.edu
<LI>Upgraded a lot internal functions to use new Zend function API (Thies)
<LI>fdf support ported; not completely tested with latest version 4.0 for
  glibc (Uwe)
<LI>OCI8 connections are now kept open as long as they are referenced (Thies)
<LI>Cleaned up Directory-Module (Thies)
<LI>Small fix in Ora_Close (Thies)
<LI>Ported range() and shuffle() from PHP 3 to PHP 4 (Andrei)
<LI>Fixed header("HTTP/..."); behaviour (Sascha)
<LI>Improved UNIX build system. Now utilizes libtool (Sascha)
<LI>Upgrade some more internal functions to use new Zend function API. (Thies, 
  Zend Engine)
<LI>Fixed backwards incompatibility with ereg() (Thies)
<LI>Updated Zend garbage collection with a much more thorough method.
  (Andi, Zend Engine)
<LI>Added the ability to use variable references in the array() construct.
  For example, array("foo" => &$foo). (Andi, Zend Engine)
<LI>Added array_reverse() function (Andrei)
<LI>Some more XML fixes/cleanups (Thies)
<LI>Updated preg_replace() so that if any argument passed in is an array
  it will make a copy of each entry before converting it to string so that
  the original is intact. If the subject is an array then it will preserve
  the keys in the output as well (Andrei) 
<LI>Updated OCI8 to use the new high-performance Zend function API. (Thies)
<LI>Configure speedup (Stig)
<LI>Fixed LOB/Persistent-Connection related OCI8-Crash (Thies)
<LI>Generalized server-API build procedure on UNIX (Stig)
<LI>Added '--disable-rpath' option (Sascha)
<LI>Added AOLserver SAPI module (Sascha)
<LI>Fixed XML Callbacks. (Thies)
<LI>Updated ODBC to use the new high-performance Zend function API (kara)
<LI>Updated zlib to use the new high-performance Zend function API. (Stefan)
<LI>Updated preg_split() to allow returning only non-empty pieces (Andrei)
<LI>Updated PCRE to use the new high-performance Zend function API (Andrei)
<LI>Updated session, dba, mhash, mcrypt, sysvshm, sysvsem, gettext modules to use
  the new high-performance Zend function API (Sascha)
<LI>Extended var_dump to handle resource type somewhat (Andrei)
<LI>Updated WDDX to use the new high-performance Zend function API (Andrei)
<LI>Updated XML to use the new high-performance Zend function API. (Thies)
<LI>Updated Oracle to use the new high-performance Zend function API. (Thies)
<LI>Improved the performance of the MySQL module significantly by using the new
  high-performance Zend function API. (Zeev)
<LI>Added support for the Easysoft ODBC-ODCB Bridge (martin@easysoft.com)
<LI>Fixed bug in odbc_setoption, getParameter call incorrect (martin@easysoft.com)
<LI>Ora_Fetch_Into now resets the returned array in all cases (Thies) 
<LI>Fixed NULL-Column problem in Oracle-Driver (Thies)
<LI>Added extra metadata functions to ODBC, SQLTables etc (nick@easysoft.com)
<LI>Fixed SEGV in mcal make_event_object() and
  typo in mcal_list_alarms() (Andrew Skalski)
<LI>Fixed Ora_PLogon (Thies)
<LI>Resourcified Oracle (Thies)
<LI>Implemented object serialization/deserialization in WDDX (Andrei)
<LI>Added krsort() function (Thies)
<LI>Added func_num_args(), func_get_arg() and func_get_args() for standard
  access to variable number of arguments functions (Zeev)
<LI>Added FTP support (Andrew Skalski)
<LI>Added optional allowable_tags arguments to strip_tags(), gzgetss() and
  fgetss() to allow you to specify a string of tags that are not to be
  stripped  (Rasmus)
<LI>Upgraded var_dump() to take multiple arguments (Andrei)
<LI>Resourcified XML (Thies)
<LI>Fixed a memory leak in the Apache per-directory directives handler (Zeev)
<LI>Added array_count_values() function. (Thies)
<LI>snmp, pgsql, mysql and gd modules can be built as dynamically loaded 
  modules (Greg)
<LI>OCI8 fix for fetching empty LOBs (Thies)
<LI>Added user-level callbacks for session module (Sascha)
<LI>Added support for unknown POST content types (Zeev)
<LI>Added "wddx" serialization handler for session module (Sascha)
  (automatically enabled, if you compile with --with-wddx)
<LI>Fixed unserializing objects (Thies)
<LI>PHP 4.0 now serializes Objects as 'O' (not understood by PHP 3.0), but
  unserializes PHP 3.0 serialized objects as expected. (Thies)
<LI>Made serialize/unserialize work on classes. If the class is known at 
  unserialize() time, you'll get back a fully working object! (Thies)
<LI>Reworked preg_* functions according to the new PCRE API, which also made
  them behave much more like Perl ones (Andrei)
<LI>Made it possible to specify external location of PCRE library (Andrei)
<LI>Updated bundled PCRE library to version 2.08 (Andrei)
<LI>count()/is_array/is_object... speedups. (Thies)
<LI>OCI8 supports appending and positioning when saving LOBs (Thies)
<LI>Added metaphone support (Thies)
<LI>OCI8 doesn't use define callbacks any longer. (Thies) 
<LI>OCI8 Driver now supports LOBs like PHP 3.0. (Thies)
<LI>var_dump now dumps the properties of an object (Thies)
<LI>Rewrote the GET/POST/Cookie data reader to support multi-dimensional
  arrays! (Zeev)
<LI>Renamed allow_builtin_links to expose_php (defaults to On).  This directive
  tells PHP whether it may expose its existence to the outside world, e.g.
  by adding itself to the Web server header (Zeev)
<LI>Added support for transparent session id propagation (Sascha)
<LI>Made WDDX serialize object properties properly (Andrei)
<LI>Fixed WDDX mem leak when undefined variable is passed in
  for serialization (Andrei)
<LI>Added session_unset() function (Andrei)
<LI>Fixed double session globals shutdown crash (Andrei)
<LI>Fixed crash related to ignore_user_abort ini entry (Andrei)
<LI>Added support for external entropy sources for session id creation 
  (on Unices /dev/random and /dev/urandom) (Sascha)
<LI>Added gpc_globals variable directive to php.ini.  By default it is On, but
  if it is set to Off, GET, POST and Cookie variables will not be inserted
  to the global scope.  Mostly makes sense when coupled with track_vars (Zeev)
<LI>Added versioning support for shared library (Sascha)
  This allows concurrent use of PHP 3.0 and PHP 4.0 as Apache modules. See
  the end of the INSTALL file for more information.
<LI>Added second parameter to array_keys which specifies search value
  for which the key should be returned (Andrei)
<LI>Resourcified Informix driver (Danny)
<LI>New resource handling for odbc, renamed to php_odbc.[ch]
<LI>Make set_time_limit() work on Unix (Rasmus)
<LI>Added connection handling support (Rasmus)
<LI>Improved the Sybase-CT module to make use of resources (Zeev)
<LI>Improved the mSQL module to make use of resources (Zeev)
<LI>Changed mysql_query() and mysql_db_query() to return false in case of saving
  the result set data fails (Zeev)
<LI>Improved the resource mechanism - resources were not getting freed as soon
  as they could (Zeev)
<LI>Added shared memory module for session data storage (Sascha)
<LI>Fixed session.auto_start (Sascha)
<LI>Fixed several problems with output buffering and HEAD requests (Zeev)
<LI>Fixed HTTP Status code issue with ISAPI module (Zeev)
<LI>Fixed a problem that prevented $GLOBALS from working properly (Zeev, Zend
  library)
<LI>Ported newest GetImageSize (Thies)
<LI>Added session compile support in Win32 (Andi)
<LI>Added -d switch to the CGI binary that allows overriding php.ini values
  from the command line (Zeev)
<LI>Fixed a crash that would occur if wddx_deserialize did not receive
  a valid packet (Andrei)
<LI>Fixed a bugglet when redefining a class at run-time (Andi, Zend Engine)
<LI>Fixed sem_get() on AIX (Sascha)
<LI>Fixed fopen() to work with URL's in Win32 (Andi & Zeev)
<LI>Fixed include_path for Win32 (Andi, Zend Engine)
<LI>Fixed bug in ISAPI header sending function (Charles)
<LI>Fixed memory leak when using undefined values (Andi & Zeev, Zend Engine)
<LI>Added output_buffering directive to php.ini, to enable output buffering
  for all PHP scripts - default is off (Zeev).
<LI>Fixed some more class inheritance issues (Zeev, Zend Engine)
<LI>Fixed Apache build wrt to shared modules on FreeBSD/Linux (Sascha)
<LI>Added session.extern_referer_chk which checks whether session ids were
  referred to by an external site and eliminates them (Sascha)
<LI>Improved session id generation (Sascha)
<LI>Improved speed of uniqid() by using the combined LCG and removing
  the extra usleep() (Sascha)
<LI>Introduced general combined linear congruential generator (Sascha)
<LI>Made ldap_close back into an alias for ldap_unbind (Andrei)
<LI>OciFetchInto now resets the returned array in all cases (Thies)
<LI>Fixed mysql_errno() to work with recent versions of MySQL (Zeev)
<LI>Fixed a problem with define() and boolean values (Zeev)
<LI>Fixed inclusion of gd/freetype functions (Sascha)
<LI>Fixed persistency of MHASH_* constants (Sascha)
<LI>Oracle is now ZTS-Safe (Thies)
<LI>Fixed flushing of cached information to disk in DBA's DB2 module (Sascha)
<LI>OCI8 is now ZTS-Safe (Thies)
<LI>Fixed is_writeable/is_writable problem; they are both defined now (Andrei)
<LI>Imported PHP 3.0 diskfreespace() function (Thies)
<LI>Fixed thread-safety issues in the MySQL module (Zeev)
<LI>Fixed thread-safe support for dynamic modules (Zeev)
<LI>Fixed Sybase CT build process (Zeev)
</UL>

<HR noshade>

<H3>Version 4.0 Beta 2</H3>
<B>09-Aug-1999</B>
<UL>
<LI>Fixed a problem when sending HTTP/1.x header lines using header() (Zeev)
<LI>Win32 builds now include the ODBC module built-in (Zeev)
<LI>Fixed SYSV-SHM interface (Thies).
<LI>Updated hyperwave module, made it thread safe
<LI>Updated pdflib module, version 0.6 of pdflib no longer supported
<LI>Updated fdf module
<LI>Built-in phpinfo() links are now turned off by default.  They can be turned
  on using the allow_builtin_links INI directive (Zeev)
<LI>Changed phpinfo() to list modules that have no info function (Zeev)
<LI>Modified array_walk() function so that the userland callback is passed
  a key and possible user data in addition to the value (Andrei)
<LI>Fixed ldap_search(), ldap_read() and ldap_list() (Zeev)
<LI>Fixed Apache information in phpinfo() (sam@breakfree.com)
<LI>Improved register_shutdown_function() - you may now supply arguments that
  will be passed to the shutdown function (Zeev)
<LI>Improved call_user_func() and call_user_method() - they now support passing
  arguments by reference (Zeev)
<LI>Fixed usort() and uksort() (Zeev)
<LI>Fixed md5() in the Apache module (Thies)
<LI>Introduced build process for dynamic modules (Stig)
<LI>Improved ISAPI module to supprt large server variables (Zeev)
<LI>Imported PHP 3.0 fixes for problem with PHP as a dynamic module and Redhat
  libc2.1 in zlib module (Stefan)
<LI>Fixed sybase_fetch_object() (Zeev)
<LI>Made the IMAP module work with PHP 4.0 (Zeev)
<LI>Fixed a problem with include()/require() of URLs (Sascha, Zeev)
<LI>Fixed a bug in implode() that caused it to corrupt its arguments (Zeev)
<LI>Added get_class($obj), get_parent_class($obj) and method_exists($obj,"name")
  (Andi & Zeev)
<LI>Fixed various inheritance problems (Andi & Zeev, Zend Engine)
<LI>Children now inherit their parent's constructor, if they do not supply a
  constructor of their own.
<LI>Fixed runtime inheritance of classes (parent methods/properties were
  overriding their children) (Zeev, Zend Engine)
<LI>Fixed backwards incompatibility with the "new" operator (Andi, Zend Engine)
<LI>Fixed bugs in uksort() and ksort() sort ordering (Andrei)
<LI>Fixed a memory leak when using assignment-op operators with lvalue of type
  string (Zeev, Zend Engine)
<LI>Fixed a problem in inheritance from classes that are defined in include()d
  files (Zeev, Zend Engine)
<LI>Fixed a problem with the PHP error handler that could result in a crash
  on certain operating systems (Zeev)
<LI>Apache php_flag values only recognized 'On' (case sensitive) - changed
  to case insensitive (Zeev)
<LI>Fixed a memory leak with switch statement containing return statements
  (Andi & Zeev, Zend Engine)
<LI>Fixed a crash problem in switch statements that had a string offset
  as a conditional (Andi & Zeev, Zend Engine)
<LI>Imported PHP 3.0 fixes for rand() and mt_rand() (Rasmus)
<LI>Added function entries for strip_tags() and similar_text() (Andrei)
<LI>Fixed a bug in WDDX that would cause a crash if a number was passed in
  instead of a variable name (Andrei)
<LI>Ported strtotime() function from PHP 3.0 (Andrei)
<LI>Merged in gdttf stuff from PHP 3.0 (Sascha)
<LI>buildconf now checks your installation (Stig)
<LI>XML module now built dynamically with --with-xml=shared (Stig)
<LI>Added a check for freetype.h - fixed build on RedHat 6.0 (Zeev)
<LI>Fixed array_walk() to work in PHP 4.0 (Andrei)
<LI>Ported all remaining date() format options from PHP 3.0 (Andrei)
<LI>$php_errormsg now works (Andrei)
<LI>Added locale support for Perl Compatible Regexp functions (Andrei)
<LI>Informix module ported (Danny)
<LI>Remove --with-shared-apache (Sascha)
<LI>Added patch for reverse lookup table in base64_decode (Sascha)
  Submitted by bfranklin@dct.com
<LI>Merged in PHP 3.0 version of str_replace (Sascha)
<LI>Added DBA module (Sascha)
<LI>Added session id detection within REQUEST_URI (Sascha)
<LI>Merged in HP-UX/ANSI compatibility switch from PHP 3.0 (Sascha)
<LI>Fixed rpath handling for utilitites built during Apache build (Sascha)
<LI>Added missing E_ error level constants (Zeev, Zend Engine)
<LI>Fixed a bug in sending multiple HTTP Cookies under Apache (Zeev)
<LI>Fixed implicit connect on the MySQL, mSQL, PostgreSQL and Sybase
  modules (Zeev)
<LI>Gave PHP 4.0's SNMP extension all the functionality of PHP 3.0.12 (SteveL)
</UL>
  
<HR noshade>

<H3>Version 4.0 Beta 1</H3>
<B>19-Jul-1999</B>
<UL>
<LI>First public beta of PHP 4.0
</UL>



<?
commonFooter();
?>

