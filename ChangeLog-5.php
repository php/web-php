<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ChangeLog-5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5 ChangeLog");
?>

<h1>PHP 5 ChangeLog</h1>

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
<li>Added a replace count for str_[i]replace(), see bug #8218. (Sara)</li>
<li>Fixed is_executable() to be available also on Windows. (Shane)</li>
<li>Fixed dirname() and strip_tags() to be binary-safe. (Moriyoshi)</li>
<li>Fixed bug #24098 (crash in pathinfo()). (Ilia)</li>
<li>Fixed bug #21985 and #22064 (various mb_send_mail() issues). (Moriyoshi)</li>
<li>Fixed bug #21600 (Assign by reference function call changes variable 
contents). (Zeev)</li>
</ul>

<?php site_footer(); ?>
