<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
  'next' => array('migration03.php3', 'if..endif syntax'),
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
manualHeader('Start/end tags');
?><H1
><A
NAME="I(MIGRATION)C(2,SECT1)"
>Start/end tags</A
></H1
><P
>   The first thing you probably will notice is that PHP's start and end
   tags have changed.  The old <TT
CLASS="LITERAL"
>&#60;? &#62;</TT
> form has been
   replaced by three new possible forms:
   <DIV
CLASS="EXAMPLE"
><P
><B
>Example A-1. Migration: old start/end tags</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;? echo "This is PHP/FI 2.0 code.\n"; &#62;</PRE
></DIV
>

   As of version 2.0, PHP/FI also supports this variation:

   <DIV
CLASS="EXAMPLE"
><P
><B
>Example A-2. Migration: first new start/end tags</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;? echo "This is PHP 3.0 code!\n"; ?&#62;</PRE
></DIV
>

   Notice that the end tag now consists of a question mark and a
   greater-than character instead of just greater-than.  However, if
   you plan on using XML on your server, you will get problems with
   the first new variant, because PHP may try to execute the XML
   markup in XML documents as PHP code.  Because of this, the
   following variation was introduced:

   <DIV
CLASS="EXAMPLE"
><P
><B
>Example A-3. Migration: second new start/end tags</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php echo "This is PHP 3.0 code!\n"; ?&#62;</PRE
></DIV
>

   Some people have had problems with editors that don't understand
   the processing instruction tags at all.  Microsoft FrontPage is one
   such editor, and as a workaround for these, the following variation
   was introduced as well:

   <DIV
CLASS="EXAMPLE"
><P
><B
>Example A-4. Migration: third new start/end tags</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;script language="php"&#62;

  echo "This is PHP 3.0 code!\n";

&#60;/script&#62;</PRE
></DIV
>


 </P
><?php manualFooter('Start/end tags');?>