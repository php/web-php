<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration07.php3', 'Short-circuited boolean evaluation'),
  'next' => array('migration09.php3', 'Other incompatibilities'),
  'up'   => array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
  'toc'  => array(
    array('migration.php3#I(MIGRATION)C(1,TITLE)', ''),
    array('migration.php3#I(MIGRATION)C(1,SECT1)', 'About the incompatbilities in 3.0'),
    array('migration02.php3', 'Start/end tags'),
    array('migration03.php3', 'if..endif syntax'),
    array('migration04.php3', 'while syntax'),
    array('migration05.php3', 'Expression types'),
    array('migration06.php3', 'Error messages have changed'),
    array('migration07.php3', 'Short-circuited boolean evaluation'),
    array('migration08.php3', 'Function true/false return values'),
    array('migration09.php3', 'Other incompatibilities'))));
manualHeader('Function true/false return values');
?><H1
><A
NAME="I(MIGRATION)C(8,SECT1)"
>Function true/false return values</A
></H1
><P
>   Most internal functions have been rewritten so they return TRUE
   when successful and FALSE when failing, as opposed to 0 and -1 in
   PHP/FI 2.0, respectively.  The new behaviour allows for more
   logical code, like <TT
CLASS="LITERAL"
>$fp = fopen("/your/file") or
    fail("darn!");</TT
>.  Because PHP/FI 2.0 had no clear rules
   for what functions should return when they failed, most such
   scripts will probably have to be checked manually after using the
   2.0 to 3.0 convertor.
  </P
><P
>   <TABLE
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
>Example A-9. Migration from 2.0: return values, old code</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fp = fopen($file, "r");
if ($fp == -1);
    echo("Could not open $file for reading&#60;br&#62;\n");
endif;</PRE
></DIV
></TD
></TR
></TABLE
>
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
>Example A-10. Migration from 2.0: return values, new code</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fp = @fopen($file, "r") or print("Could not open $file for reading&#60;br&#62;\n");</PRE
></DIV
></TD
></TR
></TABLE
>

   
 </P
><?php manualFooter('Function true/false return values');?>