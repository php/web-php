<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.split.php3', 'split'),
  'next' => array('ref.strings.php3', 'String functions'),
  'up'   => array('ref.regex.php3', 'Regular expression functions'),
  'toc'  => array(
    array('ref.regex.php3#I(REF.REGEX)C(1,TITLE)', ''),
    array('function.ereg.php3', 'ereg'),
    array('function.ereg-replace.php3', 'ereg_replace'),
    array('function.eregi.php3', 'eregi'),
    array('function.eregi-replace.php3', 'eregi_replace'),
    array('function.split.php3', 'split'),
    array('function.sql-regcase.php3', 'sql_regcase'))));
manualHeader('sql_regcase');
?><H1
>sql_regcase</H1
><P
>sql_regcase -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string sql_regcase(string string);<P
>     Returns a valid regular expression which will match string,
     ignoring case. This expression is string with each character
     converted to a bracket expression; this bracket expression
     contains that character's uppercase and lowercase form if
     applicable, otherwise it contains the original character
     twice.
     <DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. sql_regcase() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo sql_regcase( "Foo bar" );</PRE
></DIV
>

     prints <PRE
CLASS="SCREEN"
>[Ff][Oo][Oo][ ][Bb][Aa][Rr]</PRE
>.

    </P
><P
>     This can be used to achieve case insensitive pattern matching in
     products which support only case sensitive regular expressions.
  
   </P
></DIV
><?php manualFooter('sql_regcase');?>