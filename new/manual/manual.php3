<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('XXX01.php3#R', ''),
  'next' => array('preface.php3', 'Preface'),
  'up'   => array('XXX01.php3#R', ''),
  'toc'  => array(
    array('XXX01.php3#R', ''))));
manualHeader('PHP3 Manual');
?><DIV
CLASS="BOOKINFO"
><H1
>PHP3 Manual</H1
><H2
></H2
><P
>by Stig Sæther Bakken, Alexander Aulbach, Egon Schmid, Jim Winstead, Lars Torben Wilson, Rasmus Lerdorf, and Zeev Suraski</P
><DIV
CLASS="REVHISTORY"
><TABLE
WIDTH="100%"
BORDER="0"
><TR
><TH
ALIGN="LEFT"
VALIGN="TOP"
COLSPAN="3"
><B
>Revision History</B
></TH
></TR
><TR
><TD
ALIGN="LEFT"
>Revision PHP 3.0rel-dev</TD
><TD
ALIGN="LEFT"
>1998-03-08</TD
><TD
ALIGN="LEFT"
></TD
></TR
><TR
><TD
ALIGN="LEFT"
COLSPAN="3"
></TD
></TR
></TABLE
></DIV
><P
>Edited by Stig Sæther Bakken</P
><P
CLASS="COPYRIGHT"
><A
HREF="copyright.php3"
>Copyright © 1997, 1998</A
> by the PHP Documentation Group</P
></DIV
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="preface.php3"
>Preface</A
></DT
><DL
><DT
><A
HREF="preface01.php3"
>About this Manual</A
></DT
></DL
><DT
>I. <A
HREF="langref.php3"
>Language Reference</A
></DT
><DL
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
><DT
>II. <A
HREF="funcref.php3"
>Function Reference</A
></DT
><DL
><DT
>1. <A
HREF="ref.adabas.php3"
>Adabas D Functions</A
></DT
><DT
>2. <A
HREF="ref.array.php3"
>Array Functions</A
></DT
><DT
>3. <A
HREF="ref.bc.php3"
>BC (Arbitrary Precision) Functions</A
></DT
><DT
>4. <A
HREF="ref.datetime.php3"
>Date/Time Functions</A
></DT
><DT
>5. <A
HREF="ref.dir.php3"
>Directory Functions</A
></DT
><DT
>6. <A
HREF="ref.filesystem.php3"
>Filesystem Functions</A
></DT
><DT
>7. <A
HREF="ref.html.php3"
>HTML functions</A
></DT
><DT
>8. <A
HREF="ref.image.php3"
>Image functions</A
></DT
><DT
>9. <A
HREF="ref.ldap.php3"
>LDAP Functions</A
></DT
><DT
>10. <A
HREF="ref.math.php3"
>Mathematical Functions</A
></DT
><DT
>11. <A
HREF="ref.msql.php3"
>mSQL Functions</A
></DT
><DT
>12. <A
HREF="ref.mysql.php3"
>MySQL Functions</A
></DT
><DT
>13. <A
HREF="ref.network.php3"
>Network Functions</A
></DT
><DT
>14. <A
HREF="ref.odbc.php3"
>ODBC Functions</A
></DT
><DT
>15. <A
HREF="ref.oracle.php3"
>Oracle functions</A
></DT
><DT
>16. <A
HREF="ref.pgsql.php3"
>PostgreSQL functions</A
></DT
><DT
>17. <A
HREF="ref.regex.php3"
>Regular expression functions</A
></DT
><DT
>18. <A
HREF="ref.strings.php3"
>String functions</A
></DT
><DT
>19. <A
HREF="ref.url.php3"
>URL functions</A
></DT
></DL
><DT
>III. <A
HREF="appendixes.php3"
>Appendixes</A
></DT
><DL
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
></DL
><?php manualFooter('PHP3 Manual');?>