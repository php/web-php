<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('introduction.php3', 'An introduction to PHP3'),
  'next' => array('introduction03.php3', 'PHP3 Concepts'),
  'up'   => array('introduction.php3', 'An introduction to PHP3'),
  'toc'  => array(
    array('introduction.php3#I(INTRODUCTION)C(1,TITLE)', ''),
    array('introduction.php3#I(INTRODUCTION)C(1,SIMPARA)', ''),
    array('introduction01.php3', 'What is PHP3?'),
    array('introduction02.php3', 'What can PHP3 do?'),
    array('introduction03.php3', 'PHP3 Concepts'),
    array('introduction04.php3', 'What can PHP3 not do?'),
    array('introduction05.php3', 'Some examples'))));
manualHeader('What can PHP3 do?');
?><H1
><A
NAME="I(INTRODUCTION)C(2,SECT1)"
>What can PHP3 do?</A
></H1
><P
>    Perhaps the strongest and most significant feature in PHP3 is its
    database integration layer.  Writing a database-enabled web page
    is incredibly simple.  The following databases are currently
    supported:
    <BLOCKQUOTE
><P
></P
><TABLE
BORDER="0"
><TR
><TD
>Oracle</TD
><TD
>PostgreSQL</TD
></TR
><TR
><TD
>Sybase</TD
><TD
>Adabas D</TD
></TR
><TR
><TD
>mSQL 1.x and 2.x</TD
><TD
>FilePro</TD
></TR
><TR
><TD
>MySQL</TD
><TD
>dBase</TD
></TR
><TR
><TD
>Solid</TD
><TD
>Unix dbm</TD
></TR
><TR
><TD
>Generic ODBC</TD
><TD
>&nbsp;</TD
></TR
></TABLE
></BLOCKQUOTE
>

  </P
><?php manualFooter('What can PHP3 do?');?>