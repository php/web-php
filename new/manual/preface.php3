<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('manual.php3', 'PHP3 Manual'),
  'next' => array('preface01.php3', 'About this Manual'),
  'up'   => array('manual.php3', 'PHP3 Manual'),
  'toc'  => array(
    array('manual.php3#I(MANUAL)C(1,TITLE)', ''),
    array('manual.php3#BOOKINFO', ''),
    array('preface.php3', 'Preface'),
    array('langref.php3', 'Language Reference'),
    array('funcref.php3', 'Function Reference'),
    array('appendixes.php3', 'Appendixes'))));
manualHeader('Preface');
?><H1
><A
NAME="PREFACE"
>Preface</A
></H1
><BLOCKQUOTE
CLASS="ABSTRACT"
><P
>    PHP Version 3.0 is an
    HTML-embedded scripting language.  Much of its syntax is borrowed
    from C, Java and Perl with a couple of unique PHP-specific
    features thrown in.  The goal of the language is to allow web
    developers to write dynamically generated pages quickly.

    
    <A
NAME="SECURITY"
></A
>

   </P
></BLOCKQUOTE
><?php manualFooter('Preface');?>