<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('preface01.php3', 'About this Manual'),
  'next' => array('introduction.php3', 'An introduction to PHP3'),
  'up'   => array('manual.php3', 'PHP3 Manual'),
  'toc'  => array(
    array('manual.php3#I(MANUAL)C(1,TITLE)', ''),
    array('manual.php3#BOOKINFO', ''),
    array('preface.php3', 'Preface'),
    array('langref.php3', 'Language Reference'),
    array('funcref.php3', 'Function Reference'),
    array('appendixes.php3', 'Appendixes'))));
manualHeader('Language Reference');
?><H1
><A
NAME="LANGREF"
>I. Language Reference</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
>1. <A
HREF="introduction.php3"
>An introduction to PHP3</A
></DT
><DT
>2. <A
HREF="installation.php3"
>Installation</A
></DT
><DT
>3. <A
HREF="configuration.php3"
>Configuration</A
></DT
><DT
>4. <A
HREF="lang-syntax.php3"
>Syntax and grammar</A
></DT
><DT
>5. <A
HREF="lang-const.php3"
>Language constructs</A
></DT
><DT
>6. <A
HREF="lang-expr.php3"
>Expressions</A
></DT
></DL
><?php manualFooter('Language Reference');?>