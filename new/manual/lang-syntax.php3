<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('configuration05.php3', 'Security'),
  'next' => array('lang-syntax01.php3', 'Escaping from HTML'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('Syntax and grammar');
?><H1
><A
NAME="LANG-SYNTAX"
>Chapter 4. Syntax and grammar</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="lang-syntax01.php3"
>Escaping from HTML</A
></DT
><DT
><A
HREF="lang-syntax02.php3"
>Instruction separation</A
></DT
><DT
><A
HREF="lang-syntax03.php3"
>Variable types</A
></DT
><DT
><A
HREF="lang-syntax04.php3"
>Variable initialization</A
></DT
><DT
><A
HREF="lang-syntax05.php3"
>Variable Scope</A
></DT
><DT
><A
HREF="lang-syntax06.php3"
>Variable variables</A
></DT
><DT
><A
HREF="lang-syntax07.php3"
>Variables from outside PHP</A
></DT
><DT
><A
HREF="lang-syntax08.php3"
>Type juggling</A
></DT
><DT
><A
HREF="lang-syntax09.php3"
>Array manipulation</A
></DT
></DL
><P
>   PHP's syntax is borrowed primarily from C.  Java and Perl have also
   influenced the syntax.

  </P
><?php manualFooter('Syntax and grammar');?>