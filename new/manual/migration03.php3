<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration02.php3', 'Start/end tags'),
  'next' => array('migration04.php3', 'while syntax'),
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
manualHeader('if..endif syntax');
?><H1
><A
NAME="I(MIGRATION)C(3,SECT1)"
>if..endif syntax</A
></H1
><P
>   The `alternative' way to write if/elseif/else statements, using if();
   elseif(); else; endif; cannot be efficiently implemented without
   adding a large amount of complexity to the 3.0 parser.  Because of
   this, the syntax has been changed:
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
>Example A-5. Migration: old if..endif syntax</B
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($foo);
    echo "yep\n";
elseif ($bar);
    echo "almost\n";
else;
    echo "nope\n";
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
>Example A-6. Migration: new if..endif syntax</B
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($foo):
    echo "yep\n";
elseif ($bar):
    echo "almost\n";
else:
    echo "nope\n";
endif;</PRE
></DIV
></TD
></TR
></TABLE
>

   Notice that the semicolons have been replaced by colons in all
   statements but the one terminating the expression (endif).

 </P
><?php manualFooter('if..endif syntax');?>