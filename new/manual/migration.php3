<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('appendixes.php3', 'Appendixes'),
  'next' => array('migration02.php3', 'Start/end tags'),
  'up'   => array('appendixes.php3', 'Appendixes'),
  'toc'  => array(
    array('appendixes.php3#I(APPENDIXES)C(1,TITLE)', ''),
    array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
    array('phpdevel.php3', 'PHP development'))));
manualHeader('Migrating from PHP/FI 2.0 to PHP 3.0');
?><H1
><A
NAME="MIGRATION"
>Appendix A. Migrating from PHP/FI 2.0 to PHP 3.0</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="migration.php3#I(MIGRATION)C(1,SECT1)"
>About the incompatbilities in 3.0</A
></DT
><DT
><A
HREF="migration02.php3"
>Start/end tags</A
></DT
><DT
><A
HREF="migration03.php3"
>if..endif syntax</A
></DT
><DT
><A
HREF="migration04.php3"
>while syntax</A
></DT
><DT
><A
HREF="migration05.php3"
>Expression types</A
></DT
><DT
><A
HREF="migration06.php3"
>Error messages have changed</A
></DT
><DT
><A
HREF="migration07.php3"
>Short-circuited boolean evaluation</A
></DT
><DT
><A
HREF="migration08.php3"
>Function true/false return values</A
></DT
><DT
><A
HREF="migration09.php3"
>Other incompatibilities</A
></DT
></DL
><H1
><A
NAME="I(MIGRATION)C(1,SECT1)"
>About the incompatbilities in 3.0</A
></H1
><P
>   PHP 3.0 is rewritten from the ground up.  It has a proper parser
   that is much more robust and consistent than 2.0's.  3.0 is also
   significantly faster, and uses less memory.  However, some of
   these improvements have not been possible without compatibility
   changes, both in syntax and functionality.

  </P
><P
>   In addition, PHP's developers have tried to clean up both PHP's
   syntax and semantics in version 3.0, and this has also caused some
   incompatibilities.  In the long run, we believe that these changes
   are for the better.

  </P
><P
>   This chapter will try to guide you through the incompatibilities
   you might run into when going from PHP/FI 2.0 to PHP 3.0 and help
   you resolve them.  New features are not mentioned here unless
   necessary.

  </P
><P
>   A conversion program that can automatically convert your old
   PHP/FI 2.0 scripts exists.  It can be found in the <TT
CLASS="FILENAME"
>convertor</TT
> subdirectory of the PHP 3.0
   distribution.  This program only catches the syntax changes though,
   so you should read this chapter carefully anyway.

 </P
><?php manualFooter('Migrating from PHP/FI 2.0 to PHP 3.0');?>