<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const13.php3', 'CLASS'),
  'next' => array('lang-expr01.php3', 'Mathematical expressions'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('Expressions');
?><H1
><A
NAME="LANG-EXPR"
>Chapter 6. Expressions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="lang-expr01.php3"
>Mathematical expressions</A
></DT
><DT
><A
HREF="lang-expr02.php3"
>Operators</A
></DT
></DL
><P
></P
><?php manualFooter('Expressions');?>