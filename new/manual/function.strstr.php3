<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strrev.php3', 'strrev'),
  'next' => array('function.strtolower.php3', 'strtolower'),
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
manualHeader('strstr');
?><H1
>strstr</H1
><P
>strstr -- Find first occurrence of a string.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string strstr(string haystack, string needle);<P
>     Returns all of <TT
CLASS="PARAMETER"
><I
>haystack</I
></TT
> from the first
     occurrence of <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> to the end.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> is not found, returns false.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> is not a string, it is converted to 
     an integer and applied as the ordinal value of a character.

    </P
><P
>     See also <A
HREF="function.strrchr.php3"
>strrchr</A
>,
     <A
HREF="function.substr.php3"
>substr</A
>, and <A
HREF="function.ereg.php3"
>ereg</A
>.

    </P
></DIV
><?php manualFooter('strstr');?>