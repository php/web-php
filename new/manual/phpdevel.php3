<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration09.php3', 'Other incompatibilities'),
  'next' => array('phpdevel02.php3', 'Reporting Errors'),
  'up'   => array('appendixes.php3', 'Appendixes'),
  'toc'  => array(
    array('appendixes.php3#I(APPENDIXES)C(1,TITLE)', ''),
    array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
    array('phpdevel.php3', 'PHP development'))));
manualHeader('PHP development');
?><H1
><A
NAME="PHPDEVEL"
>Appendix B. PHP development</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="phpdevel.php3#I(PHPDEVEL)C(1,SECT1)"
>Adding functions to PHP3</A
></DT
><DT
><A
HREF="phpdevel02.php3"
>Reporting Errors</A
></DT
><DT
><A
HREF="phpdevel03.php3"
>Hitchhiker's guide to PHP internals</A
></DT
></DL
><H1
><A
NAME="I(PHPDEVEL)C(1,SECT1)"
>Adding functions to PHP3</A
></H1
><P
></P
><?php manualFooter('PHP development');?>