<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('langref.php3', 'Language Reference'),
  'next' => array('introduction01.php3', 'What is PHP3?'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('An introduction to PHP3');
?><H1
><A
NAME="INTRODUCTION"
>Chapter 1. An introduction to PHP3</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="introduction01.php3"
>What is PHP3?</A
></DT
><DT
><A
HREF="introduction02.php3"
>What can PHP3 do?</A
></DT
><DT
><A
HREF="introduction03.php3"
>PHP3 Concepts</A
></DT
><DT
><A
HREF="introduction04.php3"
>What can PHP3 not do?</A
></DT
><DT
><A
HREF="introduction05.php3"
>Some examples</A
></DT
></DL
><P
></P
><?php manualFooter('An introduction to PHP3');?>