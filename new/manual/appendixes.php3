<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.base64-decode.php3', 'base64_decode'),
  'next' => array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
  'up'   => array('manual.php3', 'PHP3 Manual'),
  'toc'  => array(
    array('manual.php3#I(MANUAL)C(1,TITLE)', ''),
    array('manual.php3#BOOKINFO', ''),
    array('preface.php3', 'Preface'),
    array('langref.php3', 'Language Reference'),
    array('funcref.php3', 'Function Reference'),
    array('appendixes.php3', 'Appendixes'))));
manualHeader('Appendixes');
?><H1
><A
NAME="APPENDIXES"
>III. Appendixes</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
>A. <A
HREF="migration.php3"
>Migrating from PHP/FI 2.0 to PHP 3.0</A
></DT
><DT
>B. <A
HREF="phpdevel.php3"
>PHP development</A
></DT
></DL
><?php manualFooter('Appendixes');?>