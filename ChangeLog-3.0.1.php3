<?
require("shared.inc");
commonHeader("PHP 3.0 -> 3.0.1 Changes");
?>

<ul>

July 04 1998 Version 3.0.1
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