<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.parse-url.php3', 'parse_url'),
  'next' => array('function.urlencode.php3', 'urlencode'),
  'up'   => array('ref.url.php3', 'URL functions'),
  'toc'  => array(
    array('ref.url.php3#I(REF.URL)C(1,TITLE)', ''),
    array('function.parse-url.php3', 'parse_url'),
    array('function.urldecode.php3', 'urldecode'),
    array('function.urlencode.php3', 'urlencode'),
    array('function.base64-encode.php3', 'base64_encode'),
    array('function.base64-decode.php3', 'base64_decode'))));
manualHeader('urldecode');
?><H1
>urldecode</H1
><P
>urldecode -- decodes URL-encoded string</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string urldecode(string str);<P
>     Decodes any <TT
CLASS="LITERAL"
>%<TT
CLASS="REPLACEABLE"
><I
>##</I
></TT
></TT
>
     encoding in the given string.  The decoded string is returned.
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
>Example 1. urldecode() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$a = split ('&#38;', $querystring);
$i = 0;
while ($i &#60; count ($a)) {
  $b = split ('=', $a [$i]);
  echo 'Value for parameter ', htmlspecialchars (urldecode ($b [0])),
       ' is ', htmlspecialchars (urldecode ($b [1])), "&#60;BR&#62;";
  $i++;
}</PRE
></DIV
></TD
></TR
></TABLE
>
 
    </P
><P
>     See also <A
HREF="function.urlencode.php3"
>urlencode</A
></P
></DIV
><?php manualFooter('urldecode');?>