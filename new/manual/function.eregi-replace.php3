<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.eregi.php3', 'eregi'),
  'next' => array('function.split.php3', 'split'),
  'up'   => array('ref.regex.php3', 'Regular expression functions'),
  'toc'  => array(
    array('ref.regex.php3#I(REF.REGEX)C(1,TITLE)', ''),
    array('function.ereg.php3', 'ereg'),
    array('function.ereg-replace.php3', 'ereg_replace'),
    array('function.eregi.php3', 'eregi'),
    array('function.eregi-replace.php3', 'eregi_replace'),
    array('function.split.php3', 'split'),
    array('function.sql-regcase.php3', 'sql_regcase'))));
manualHeader('eregi_replace');
?><H1
>eregi_replace</H1
><P
>eregi_replace -- replace regular expression case insensitive</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string eregi_replace(string pattern, string replacement, string string);<P
>     This function is identical to <A
HREF="function.ereg-replace.php3"
>ereg_replace</A
> save that
     this ignores case distinction when matching alphabetic characters.

    </P
><P
>     See also <A
HREF="function.ereg.php3"
>ereg</A
>, <A
HREF="function.eregi.php3"
>eregi</A
>, and <A
HREF="function.ereg-replace.php3"
>ereg_replace</A
>.

   </P
></DIV
><?php manualFooter('eregi_replace');?>