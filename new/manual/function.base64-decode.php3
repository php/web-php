<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.base64-encode.php3', 'base64_encode'),
  'next' => array('appendixes.php3', 'Appendixes'),
  'up'   => array('ref.url.php3', 'URL functions'),
  'toc'  => array(
    array('ref.url.php3#I(REF.URL)C(1,TITLE)', ''),
    array('function.parse-url.php3', 'parse_url'),
    array('function.urldecode.php3', 'urldecode'),
    array('function.urlencode.php3', 'urlencode'),
    array('function.base64-encode.php3', 'base64_encode'),
    array('function.base64-decode.php3', 'base64_decode'))));
manualHeader('base64_decode');
?><H1
>base64_decode</H1
><P
>base64_decode -- decodes data encoded with MIME base64</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string base64_decode(string encoded_data);<P
>     <B
CLASS="FUNCTION"
>base64_decode()</B
> decodes
     <TT
CLASS="PARAMETER"
><I
>encoded_data</I
></TT
> and returns the original
     data.  The returned data may be binary.

    </P
><P
>     See also:
     <A
HREF="function.base64-encode.php3"
><B
CLASS="FUNCTION"
>base64_encode()</B
></A
>,
     RFC-2045 section 6.8.

   </P
></DIV
><?php manualFooter('base64_decode');?>