<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strtr.php3', 'strtr'),
  'next' => array('function.ucfirst.php3', 'ucfirst'),
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
manualHeader('substr');
?><H1
>substr</H1
><P
>substr -- Return part of a string.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string substr(string string, int start, int length);<P
>     Substr returns the portion of <TT
CLASS="PARAMETER"
><I
>string</I
></TT
>
     specified by the <TT
CLASS="PARAMETER"
><I
>start</I
></TT
> and
     <TT
CLASS="PARAMETER"
><I
>length</I
></TT
> parameters.
     
    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>start</I
></TT
> is positive, the returned string
     will start at the <TT
CLASS="PARAMETER"
><I
>start</I
></TT
>'th character of
     <TT
CLASS="PARAMETER"
><I
>string</I
></TT
>. 
     
    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>start</I
></TT
> is negative, the returned string
     will start at the <TT
CLASS="PARAMETER"
><I
>start</I
></TT
>'th character
     from the end of <TT
CLASS="PARAMETER"
><I
>string</I
></TT
>.
     
    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>length</I
></TT
> is given and is positive,
     the string returned will end <TT
CLASS="PARAMETER"
><I
>length</I
></TT
>
     characters from <TT
CLASS="PARAMETER"
><I
>start</I
></TT
>. If this would
     result in a string with negative length, then the returned string 
     will contain the single character at <TT
CLASS="PARAMETER"
><I
>start</I
></TT
>.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>length</I
></TT
> is given and is negative,
     the string returned will end <TT
CLASS="PARAMETER"
><I
>length</I
></TT
>
     characters from the end of <TT
CLASS="PARAMETER"
><I
>string</I
></TT
>. If this would
     result in a string with negative length, then the returned string 
     will contain the single character at <TT
CLASS="PARAMETER"
><I
>start</I
></TT
>.
     
    </P
><P
>     See also <A
HREF="function.strrchr.php3"
>strrchr</A
> and
     <A
HREF="function.ereg.php3"
>ereg</A
>.

   </P
></DIV
><?php manualFooter('substr');?>