<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strtoupper.php3', 'strtolower'),
  'next' => array('function.substr.php3', 'substr'),
  'up'   => array('ref.strings.php3', 'String functions'),
  'toc'  => array(
    array('ref.strings.php3#I(REF.STRINGS)C(1,TITLE)', ''),
    array('function.addslashes.php3', 'AddSlashes'),
    array('function.chop.php3', 'Chop'),
    array('function.chr.php3', 'Chr'),
    array('function.echo.php3', 'echo'),
    array('function.explode.php3', 'explode'),
    array('function.flush.php3', 'flush'),
    array('function.implode.php3', 'implode'),
    array('function.ord.php3', 'Ord'),
    array('function.print.php3', 'print'),
    array('function.printf.php3', 'printf'),
    array('function.quotemeta.php3', 'QuoteMeta'),
    array('function.rawurldecode.php3', 'rawurldecode'),
    array('function.rawurlencode.php3', 'rawurlencode'),
    array('function.setlocale.php3', 'setlocale'),
    array('function.sprintf.php3', 'sprintf'),
    array('function.stripslashes.php3', 'StripSlashes'),
    array('function.strlen.php3', 'strlen'),
    array('function.strtok.php3', 'strtok'),
    array('function.strrchr.php3', 'strrchr'),
    array('function.strrev.php3', 'strrev'),
    array('function.strstr.php3', 'strstr'),
    array('function.strtolower.php3', 'strtolower'),
    array('function.strtoupper.php3', 'strtolower'),
    array('function.strtr.php3', 'strtr'),
    array('function.substr.php3', 'substr'),
    array('function.ucfirst.php3', 'ucfirst'))));
manualHeader('strtr');
?><H1
>strtr</H1
><P
>strtr -- Translate certain characters.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string strtr(string str, string from, string to);<P
>     This function operates on <TT
CLASS="PARAMETER"
><I
>str</I
></TT
>, translating
     all occurrences of each character in <TT
CLASS="PARAMETER"
><I
>from</I
></TT
>
     to the corresponding character in <TT
CLASS="PARAMETER"
><I
>to</I
></TT
> and
     returning the result.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>from</I
></TT
> and <TT
CLASS="PARAMETER"
><I
>to</I
></TT
> are
     different lengths, the extra characters in the longer of the two
     are ignored.

     <DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. strtr() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php
$addr = strtr( "дец", "aao", $addr );
?&#62;       
      </PRE
></DIV
>

    </P
><P
>     See also <A
HREF="function.ereg-replace.php3"
>ereg-replace</A
>.

   </P
></DIV
><?php manualFooter('strtr');?>