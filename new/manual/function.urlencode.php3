<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.urldecode.php3', 'urldecode'),
  'next' => array('function.base64-encode.php3', 'base64_encode'),
  'up'   => array('ref.url.php3', 'URL functions'),
  'toc'  => array(
    array('ref.url.php3#I(REF.URL)C(1,TITLE)', ''),
    array('function.parse-url.php3', 'parse_url'),
    array('function.urldecode.php3', 'urldecode'),
    array('function.urlencode.php3', 'urlencode'),
    array('function.base64-encode.php3', 'base64_encode'),
    array('function.base64-decode.php3', 'base64_decode'))));
manualHeader('urlencode');
?><H1
>urlencode</H1
><P
>urlencode -- URL-encodes string</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string urlencode(string str);<P
>     Returns a string in which all non-alphanumeric characters except
     <TT
CLASS="LITERAL"
>-_.</TT
> have been replaced with a percent
     (<TT
CLASS="LITERAL"
>%</TT
>) sign followed by two hex digits and spaces
     encoded as plus (<TT
CLASS="LITERAL"
>+</TT
>) signs.  It is encoded the
     same way that the posted data from a WWW form is encoded, that is
     the same way as in
     <TT
CLASS="LITERAL"
>application/x-www-form-urlencoded</TT
> media type.
     This differs from the RFC1738 encoding (see <A
HREF="function.rawurlencode.php3"
>rawurlencode</A
> ) in that
     for historical reasons, spaces are encoded as plus (+ ) signs.
     This function is convenient when encoding a string to be used in
     a query part of an URL, as a convinient way to pass variables to
     the next page:

     <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. urlencode() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo '&#60;A HREF="mycgi?foo=', urlencode ($userinput), '"&#62;';</PRE
></DIV
></TD
></TR
></TABLE
>
 
    </P
><P
>     See also <A
HREF="function.urldecode.php3"
>urldecode</A
></P
></DIV
><?php manualFooter('urlencode');?>