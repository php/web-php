<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strtok.php3', 'strtok'),
  'next' => array('function.strrev.php3', 'strrev'),
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
manualHeader('strrchr');
?><H1
>strrchr</H1
><P
>strrchr -- Find the last occurrence of a character in a string.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string strrchr(string haystack, string needle);<P
>     This function returns the portion of
     <TT
CLASS="PARAMETER"
><I
>haystack</I
></TT
> which starts at the last occurrence of
     <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> and goes until the end of
     <TT
CLASS="PARAMETER"
><I
>haystack</I
></TT
>. 

    </P
><P
>     Returns false if <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> is not found.

    </P
><P
> 
     If <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> is not found, false is
     returned.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> contains more than one character,
     the first is used.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>needle</I
></TT
> is not a string, it is converted to 
     an integer and applied as the ordinal value of a character.

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
>Example 1. strrchr() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php
// get last directory in $PATH
$dir = substr( strrchr( $PATH, ":" ), 1 );

// get everything after last newline
$text = "Line 1\nLine 2\nLine 3";
$last = substr( strrchr( $text, 10 ), 1 );
?&#62;       
      </PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See also <A
HREF="function.substr.php3"
>substr</A
> and <A
HREF="function.strstr.php3"
>strstr</A
>.

   </P
></DIV
><?php manualFooter('strrchr');?>