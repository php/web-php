<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.echo.php3', 'echo'),
  'next' => array('function.flush.php3', 'flush'),
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
manualHeader('explode');
?><H1
>explode</H1
><P
>explode -- split a string by string</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array explode(string separator, string string);<P
>&#13;     Returns an array of strings containing the elements separated by
     <TT
CLASS="REPLACEABLE"
><I
>separator</I
></TT
>.
     
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
>Example 1. explode() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$pizza = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);</PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See also <A
HREF="function.split.php3"
>split</A
> and
     <A
HREF="function.implode.php3"
>implode</A
>.

   </P
></DIV
><?php manualFooter('explode');?>