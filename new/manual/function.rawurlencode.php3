<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rawurldecode.php3', 'rawurldecode'),
  'next' => array('function.setlocale.php3', 'setlocale'),
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
manualHeader('rawurlencode');
?><H1
>rawurlencode</H1
><P
>rawurlencode -- URL-encode according to RFC1738</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string rawurlencode(string str);<P
>     Returns a string in which all non-alphanumeric characters except
     <PRE
CLASS="SCREEN"
>-_.</PRE
> have been replaced with a percent
     (<TT
CLASS="LITERAL"
>%</TT
>) sign followed by two hex digits.  This is
     the encoding described in RFC1738 for protecting literal
     characters from being interpreted as special URL delimiters, and
     for protecting URL's from being mangled by transmission media
     with character conversions (like some email systems).  For
     example, if you want to include a password in a ftp url:
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
>Example 1. rawurlencode() example 1</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo '&#60;A HREF="ftp://user:', rawurlencode ('foo @+%/'),
     '@ftp.my.com/x.txt"&#62;';</PRE
></DIV
></TD
></TR
></TABLE
>

     Or, if you pass information in a path info component of the url:

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
>Example 2. rawurlencode() example 2</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo '&#60;A HREF="http://x.com/department_list_script/',
     rawurlencode ('sales and marketing/Miami'), '"&#62;';</PRE
></DIV
></TD
></TR
></TABLE
>

   </P
></DIV
><?php manualFooter('rawurlencode');?>