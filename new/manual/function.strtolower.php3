<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strstr.php3', 'strstr'),
  'next' => array('function.strtoupper.php3', 'strtolower'),
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
manualHeader('strtolower');
?><H1
>strtolower</H1
><P
>strtolower -- Make a string lowercase.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string strtolower(string str);<P
>     Returns <TT
CLASS="PARAMETER"
><I
>string</I
></TT
> with all alphabetic
     characters converted to lowercase.

    </P
><P
>     Note that 'alphabetic' is determined by the current locale. This
     means that in i.e. the default "C" locale, characters such as
     umlaut-A (Ä) will not be converted.

    </P
><P
>     See also <A
HREF="function.strtoupper.php3"
>strtoupper</A
>
     and <A
HREF="function.ucfirst.php3"
>ucfirst</A
>.

   </P
></DIV
><?php manualFooter('strtolower');?>