<?
require("shared.inc");
commonHeader("PHP 3.0.1 -> 3.0.2 Changes");
?>



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