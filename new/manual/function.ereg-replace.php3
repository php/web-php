<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ereg.php3', 'ereg'),
  'next' => array('function.eregi.php3', 'eregi'),
  'up'   => array('ref.regex.php3', 'Regular expression functions'),
  'toc'  => array(
    array('ref.regex.php3#I(REF.REGEX)C(1,TITLE)', ''),
    array('function.ereg.php3', 'ereg'),
    array('function.ereg-replace.php3', 'ereg_replace'),
    array('function.eregi.php3', 'eregi'),
    array('function.eregi-replace.php3', 'eregi_replace'),
    array('function.split.php3', 'split'),
    array('function.sql-regcase.php3', 'sql_regcase'))));
manualHeader('ereg_replace');
?><H1
>ereg_replace</H1
><P
>ereg_replace -- replace regular expression</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string ereg_replace(string pattern, string replacement, string string);<P
>     This function scans string for matches to pattern, then replaces
     the matched text with replacement.

    </P
><P
>     If pattern contains parenthesized substrings, replacement may
     contain substrings of the form
     <TT
CLASS="LITERAL"
>\\<TT
CLASS="REPLACEABLE"
><I
>digit</I
></TT
></TT
>, which will
     be replaced by the text matching the digit'th parenthesized
     substring; <TT
CLASS="LITERAL"
>\\0</TT
> will produce the entire
     contents of string.  Up to nine substrings may be
     used.  Parentheses may be nested, in which case they are counted
     by the opening parenthesis.  For example, the following code
     snippet prints "This was a test" three times:
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
>Example 1. ereg_replace() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$string = "This is a test";
echo ereg_replace( " is", " was", $string );
echo ereg_replace( "( )is", "\\1was", $string );
echo ereg_replace( "(( )is)", "\\2was", $string );</PRE
></DIV
></TD
></TR
></TABLE
>

     See also <A
HREF="function.ereg.php3"
>ereg</A
>, <A
HREF="function.eregi.php3"
>eregi</A
>, and <A
HREF="function.eregi-replace.php3"
>eregi_replace</A
>.

   </P
></DIV
><?php manualFooter('ereg_replace');?>