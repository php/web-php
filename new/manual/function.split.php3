<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.eregi-replace.php3', 'eregi_replace'),
  'next' => array('function.sql-regcase.php3', 'sql_regcase'),
  'up'   => array('ref.regex.php3', 'Regular expression functions'),
  'toc'  => array(
    array('ref.regex.php3#I(REF.REGEX)C(1,TITLE)', ''),
    array('function.ereg.php3', 'ereg'),
    array('function.ereg-replace.php3', 'ereg_replace'),
    array('function.eregi.php3', 'eregi'),
    array('function.eregi-replace.php3', 'eregi_replace'),
    array('function.split.php3', 'split'),
    array('function.sql-regcase.php3', 'sql_regcase'))));
manualHeader('split');
?><H1
>split</H1
><P
>split -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array split(string pattern, string string, int limit);<P
>     Returns an array of strings, each of which is a substring of
     string formed by splitting it on boundaries formed
     by pattern. If an error occurs, returns false.

    </P
><P
>     To get the first five fields from a line from
     <TT
CLASS="FILENAME"
>/etc/passwd</TT
>:
    <DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. split() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$passwd_list = split( ":", $passwd_line, 5 );</PRE
></DIV
>

   </P
></DIV
><?php manualFooter('split');?>