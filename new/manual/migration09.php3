<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration08.php3', 'Function true/false return values'),
  'next' => array('phpdevel.php3', 'PHP development'),
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
manualHeader('Other incompatibilities');
?><H1
><A
NAME="I(MIGRATION)C(9,SECT1)"
>Other incompatibilities</A
></H1
><P
>   <P
></P
><UL
><LI
><P
>      The PHP 3.0 Apache module no longer supports Apache versions
      prior to 1.2.  Apache 1.2 or later is required.

    </P
></LI
><LI
><P
>      <A
HREF="function.echo.php3"
><B
CLASS="FUNCTION"
>echo()</B
></A
>
      no longer supports a format string.  Use the <A
HREF="function.printf.php3"
><B
CLASS="FUNCTION"
>printf()</B
></A
>
      function instead.

    </P
></LI
><LI
><P
>      In PHP/FI 2.0, an implementation side-effect caused
      <TT
CLASS="LITERAL"
>$foo[0]</TT
> to have the same effect as
      <TT
CLASS="LITERAL"
>$foo</TT
>.  This is not true for PHP 3.0.

    </P
></LI
><LI
><P
>      Reading arrays with <TT
CLASS="LITERAL"
>$array[]</TT
> is no longer
      supported

     </P
><P
>      That is, you cannot traverse an array by having a loop that does
      <TT
CLASS="LITERAL"
>$data = $array[]</TT
>.  Use <A
HREF="function.current.php3"
><B
CLASS="FUNCTION"
>current()</B
></A
>
      and <A
HREF="function.next.php3"
><B
CLASS="FUNCTION"
>next()</B
></A
>
      instead.
     </P
><P
>      Also, <TT
CLASS="LITERAL"
>$array1[] = $array2</TT
> does not append the
      values of <TT
CLASS="LITERAL"
>$array2</TT
> to <TT
CLASS="LITERAL"
>$array1</TT
>,
      but appends <TT
CLASS="LITERAL"
>$array2</TT
> as the last entry of
      <TT
CLASS="LITERAL"
>$array1</TT
>.  See also multidimensional array
      support.

   </P
></LI
></UL
>
  </P
><?php manualFooter('Other incompatibilities');?>