<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration06.php3', 'Error messages have changed'),
  'next' => array('migration08.php3', 'Function true/false return values'),
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
manualHeader('Short-circuited boolean evaluation');
?><H1
><A
NAME="I(MIGRATION)C(7,SECT1)"
>Short-circuited boolean evaluation</A
></H1
><P
>   In PHP 3.0 boolean evaluation is short-circuited.  This means that
   in an expression like <TT
CLASS="LITERAL"
>(1 || test_me())</TT
>, the
   function <B
CLASS="FUNCTION"
>test_me()()</B
> would not be executed since
   the nothing can change the result of the expression after the
   <TT
CLASS="LITERAL"
>1</TT
>.
    
  </P
><P
>   This is a minor compatibility issue, but may cause unexpected
   side-effects.


 </P
><?php manualFooter('Short-circuited boolean evaluation');?>