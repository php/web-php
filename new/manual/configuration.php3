<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('installation03.php3', 'Security'),
  'next' => array('configuration01.php3', 'The php3.ini file'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('Configuration');
?><H1
><A
NAME="CONFIGURATION"
>Chapter 3. Configuration</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="configuration01.php3"
>The php3.ini file</A
></DT
><DT
><A
HREF="configuration02.php3"
>Apache module</A
></DT
><DT
><A
HREF="configuration03.php3"
>CGI</A
></DT
><DT
><A
HREF="configuration04.php3"
>Virtual hosts</A
></DT
><DT
><A
HREF="configuration05.php3"
>Security</A
></DT
></DL
><P
></P
><?php manualFooter('Configuration');?>