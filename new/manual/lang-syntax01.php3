<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-syntax.php3', 'Syntax and grammar'),
  'next' => array('lang-syntax02.php3', 'Instruction separation'),
  'up'   => array('lang-syntax.php3', 'Syntax and grammar'),
  'toc'  => array(
    array('lang-syntax.php3#I(LANG-SYNTAX)C(1,TITLE)', ''),
    array('lang-syntax.php3#I(LANG-SYNTAX)C(1,SIMPARA)', ''),
    array('lang-syntax01.php3', 'Escaping from HTML'),
    array('lang-syntax02.php3', 'Instruction separation'),
    array('lang-syntax03.php3', 'Variable types'),
    array('lang-syntax04.php3', 'Variable initialization'),
    array('lang-syntax05.php3', 'Variable Scope'),
    array('lang-syntax06.php3', 'Variable variables'),
    array('lang-syntax07.php3', 'Variables from outside PHP'),
    array('lang-syntax08.php3', 'Type juggling'),
    array('lang-syntax09.php3', 'Array manipulation'))));
manualHeader('Escaping from HTML');
?><H1
><A
NAME="I(LANG-SYNTAX)C(1,SECT1)"
>Escaping from HTML</A
></H1
><P
>    There are three ways of escaping from HTML and entering "PHP code
    mode":
    <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 4-1. Ways of escaping from HTML</B
></P
><PRE
CLASS="PROGRAMLISTING"
>1.  &#60;? echo("this is the simplest, an SGML processing instruction\n"); ?&#62;


2.  &#60;?php echo("if you want to serve XML documents, do like this\n"); ?&#62;


3.  &#60;script language="php"&#62;

      echo("some editors (like FrontPage) don't like processing instructions");

    &#60;/script&#62;</PRE
></DIV
></TD
></TR
></TABLE
>

  </P
><?php manualFooter('Escaping from HTML');?>