<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.quotemeta.php3', 'QuoteMeta'),
  'next' => array('function.rawurlencode.php3', 'rawurlencode'),
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
manualHeader('rawurldecode');
?><H1
>rawurldecode</H1
><P
>rawurldecode -- decode URL-encoded strings</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string rawurldecode(string str);<P
>     Returns a string in which the sequences with percent
     (<TT
CLASS="LITERAL"
>%</TT
>) signs followed by two hex digits have been
     replaced with literal characters.  For example, the string
     <PRE
CLASS="SCREEN"
>foo%20bar%40baz</PRE
> decodes into
     <PRE
CLASS="SCREEN"
>foo bar@baz</PRE
>.

   </P
></DIV
><?php manualFooter('rawurldecode');?>