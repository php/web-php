<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.substr.php3', 'substr'),
  'next' => array('ref.url.php3', 'URL functions'),
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
manualHeader('ucfirst');
?><H1
>ucfirst</H1
><P
>ucfirst -- Make a string's first
    character uppercase.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string ucfirst(string str);<P
>     Capitalizes the first character of <TT
CLASS="PARAMETER"
><I
>str</I
></TT
> if 
     that character is alphabetic.

    </P
><P
>     Note that 'alphabetic' is determined by the current locale. For
     instance, in the default "C" locale characters such as umlaut-a
     (ä) will not be converted.

    </P
><P
>     See also <A
HREF="function.strtoupper.php3"
>strtoupper</A
> and
     <A
HREF="function.strtolower.php3"
>strtolower</A
>.

   </P
></DIV
><?php manualFooter('ucfirst');?>