<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration03.php3', 'if..endif syntax'),
  'next' => array('migration05.php3', 'Expression types'),
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
manualHeader('while syntax');
?><H1
><A
NAME="I(MIGRATION)C(4,SECT1)"
>while syntax</A
></H1
><P
>   Just like with if..endif, the syntax of while..endwhile has changed
   as well:
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
>Example A-7. Migration: old while..endwhile syntax</B
></P
><PRE
CLASS="PROGRAMLISTING"
>while ($more_to_come);
    ...
endwhile;</PRE
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
>Example A-8. Migration: new while..endwhile syntax</B
></P
><PRE
CLASS="PROGRAMLISTING"
>while ($more_to_come):
    ...
endwhile;</PRE
></DIV
></TD
></TR
></TABLE
>
  </P
><TABLE
CLASS="WARNING"
BORDER="1"
WIDTH="100%"
><TR
><TD
ALIGN="CENTER"
><B
>WARNING</B
></TD
></TR
><TR
><TD
ALIGN="LEFT"
><P
>    If you use the old while..endwhile syntax in PHP 3.0, you will get
    a never-ending loop.
   </P
></TD
></TR
></TABLE
><?php manualFooter('while syntax');?>