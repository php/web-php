<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-syntax09.php3', 'Array manipulation'),
  'next' => array('lang-const01.php3', 'Expressions'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('Language constructs');
?><H1
><A
NAME="LANG-CONST"
>Chapter 5. Language constructs</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="lang-const01.php3"
>Expressions</A
></DT
><DT
><A
HREF="lang-const02.php3"
>IF</A
></DT
><DT
><A
HREF="lang-const03.php3"
>ELSE</A
></DT
><DT
><A
HREF="lang-const04.php3"
>ELSEIF</A
></DT
><DT
><A
HREF="lang-const05.php3"
>WHILE</A
></DT
><DT
><A
HREF="lang-const06.php3"
>DO..WHILE</A
></DT
><DT
><A
HREF="lang-const07.php3"
>FOR</A
></DT
><DT
><A
HREF="lang-const08.php3"
>SWITCH</A
></DT
><DT
><A
HREF="lang-const09.php3"
>REQUIRE</A
></DT
><DT
><A
HREF="lang-const10.php3"
>INCLUDE</A
></DT
><DT
><A
HREF="lang-const11.php3"
>FUNCTION</A
></DT
><DT
><A
HREF="lang-const12.php3"
>OLD_FUNCTION</A
></DT
><DT
><A
HREF="lang-const13.php3"
>CLASS</A
></DT
></DL
><P
>   Any PHP 3 script is built out of a series of statements.  A
   statement can be an assignment, a function call, a loop, a
   conditional statement of even a statement that does nothing (an
   empty statement).  Statements usually end with a semicolon.  In
   addition, statements can be grouped into a statement-group by
   encapsulating a group of statements with curly braces.  A
   statement-group is a statement by itself as well.  The various
   statement types are described in this chapter.
  </P
><?php manualFooter('Language constructs');?>