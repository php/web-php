<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('introduction05.php3', 'Some examples'),
  'next' => array('installation01.php3', 'Installing From Source on UNIX'),
  'up'   => array('langref.php3', 'Language Reference'),
  'toc'  => array(
    array('langref.php3#I(LANGREF)C(1,TITLE)', ''),
    array('introduction.php3', 'An introduction to PHP3'),
    array('installation.php3', 'Installation'),
    array('configuration.php3', 'Configuration'),
    array('lang-syntax.php3', 'Syntax and grammar'),
    array('lang-const.php3', 'Language constructs'),
    array('lang-expr.php3', 'Expressions'))));
manualHeader('Installation');
?><H1
><A
NAME="INSTALLATION"
>Chapter 2. Installation</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="installation01.php3"
>Installing From Source on UNIX</A
></DT
><DT
><A
HREF="installation02.php3"
>Problems?</A
></DT
><DT
><A
HREF="installation03.php3"
>Security</A
></DT
></DL
><BLOCKQUOTE
CLASS="ABSTRACT"
><P
>    This chapter will guide you through the configuration and
    installation of PHP3.  Prerequisite knowledge and software:
    
    <P
></P
><UL
><LI
><P
>Basic UNIX skills (being able to operate "make"
      and a C compiler)</P
></LI
><LI
><P
>An ANSI C compiler</P
></LI
><LI
><P
>A web server (obviously)</P
></LI
></UL
>
   </P
></BLOCKQUOTE
><?php manualFooter('Installation');?>