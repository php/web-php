<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.strlen.php3', 'strlen'),
  'next' => array('function.strrchr.php3', 'strrchr'),
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
manualHeader('strtok');
?><H1
>strtok</H1
><P
>strtok -- tokenize string</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string strtok(string arg1, string arg2);<P
>     strtok() is used to tokenize a string.  That is, if you have a
     string like "This is an example string" you could tokenize this
     string into its individual words by using the space character as
     the token.
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
>Example 1. strtok() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php

    $string = "This is an example string";
    $tok = strtok($string," ");
    while($tok) {
        echo "Word=$tok&#60;br&#62;";
        $tok = strtok(" ");
    }

?&#62;</PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     Note that only the first call to strtok uses the string argument.
     Every subsequent call to strtok only needs the token to use, as
     it keeps track of where it is in the current string.  To start
     over, or to tokenize a new string you simply call strtok with the
     string argument again to initialize it.  Note that you may put
     multiple tokens in the token parameter.  The string will be
     tokenized when any one of the characters in the argument are
     found.

    </P
><P
>     See also <A
HREF="function.split.php3"
>split</A
> and
     <A
HREF="function.explode.php3"
>explode</A
>.

   </P
></DIV
><?php manualFooter('strtok');?>