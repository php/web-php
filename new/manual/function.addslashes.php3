<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.strings.php3', 'String functions'),
  'next' => array('function.chop.php3', 'Chop'),
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
manualHeader('AddSlashes');
?><H1
>AddSlashes</H1
><P
>AddSlashes -- quote string with slashes</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string addslashes(string str);<P
>     Returns a string with a backslashes before characters that need
     to be quoted in database queries etc.  These characters are
     single quote (<TT
CLASS="LITERAL"
>'</TT
>), double quote
     (<TT
CLASS="LITERAL"
>"</TT
>) and backslash (<TT
CLASS="LITERAL"
>\</TT
>).

    </P
><P
>     See also <A
HREF="function.stripslashes.php3"
>stripslashes</A
> and <A
HREF="function.quotemeta.php3"
>quotemeta</A
>.

   </P
></DIV
><?php manualFooter('AddSlashes');?>