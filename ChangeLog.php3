<?
require("shared.inc");
commonHeader("PHP 3.0 -> 3.0.3 Changes");
?>

<h3>August 15, 1998 Version 3.0.3</h2>
<ul>
<li> Changed the name of fopen_basedir to open_basedir, to be a little more
  accurate about what it does.
<li> Added Hyperwave module
<li> Added config-option (php3_)enable_dl <on/off>. This enables/disables the
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
<li> Added config-option (php3_)fopen_basedir <path>. This limits the directory-
  tree scripts can open files in to <path>.
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
<li>Implemented shift left and shift right operators (<< and >>)
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
