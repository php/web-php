<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.urlencode.php3', 'urlencode'),
  'next' => array('function.base64-decode.php3', 'base64_decode'),
  'up'   => array('ref.url.php3', 'URL functions'),
  'toc'  => array(
    array('ref.url.php3#I(REF.URL)C(1,TITLE)', ''),
    array('function.parse-url.php3', 'parse_url'),
    array('function.urldecode.php3', 'urldecode'),
    array('function.urlencode.php3', 'urlencode'),
    array('function.base64-encode.php3', 'base64_encode'),
    array('function.base64-decode.php3', 'base64_decode'))));
manualHeader('base64_encode');
?><H1
>base64_encode</H1
><P
>base64_encode -- encodes data with MIME base64</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string base64_encode(string data);<P
>     <B
CLASS="FUNCTION"
>base64_encode()</B
> returns
     <TT
CLASS="PARAMETER"
><I
>data</I
></TT
> encoded with base64.  This encoding
     is designed to make binary data survive transport through
     transport layers that are not 8-bit clean, such as mail bodies.

    </P
><P
>     Base64-encoded data takes about 33% more space than the original
     data.

    </P
><P
>     See also:
     <A
HREF="function.base64-decode.php3"
><B
CLASS="FUNCTION"
>base64_decode()</B
></A
>,
     RFC-2045 section 6.8.

   </P
></DIV
><?php manualFooter('base64_encode');?>