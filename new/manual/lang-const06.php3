<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const05.php3', 'WHILE'),
  'next' => array('lang-const07.php3', 'FOR'),
  'up'   => array('lang-const.php3', 'Language constructs'),
  'toc'  => array(
    array('lang-const.php3#I(LANG-CONST)C(1,TITLE)', ''),
    array('lang-const.php3#I(LANG-CONST)C(1,SIMPARA)', ''),
    array('lang-const01.php3', 'Expressions'),
    array('lang-const02.php3', 'IF'),
    array('lang-const03.php3', 'ELSE'),
    array('lang-const04.php3', 'ELSEIF'),
    array('lang-const05.php3', 'WHILE'),
    array('lang-const06.php3', 'DO..WHILE'),
    array('lang-const07.php3', 'FOR'),
    array('lang-const08.php3', 'SWITCH'),
    array('lang-const09.php3', 'REQUIRE'),
    array('lang-const10.php3', 'INCLUDE'),
    array('lang-const11.php3', 'FUNCTION'),
    array('lang-const12.php3', 'OLD_FUNCTION'),
    array('lang-const13.php3', 'CLASS'))));
manualHeader('DO..WHILE');
?><H1
><A
NAME="I(LANG-CONST)C(6,SECT1)"
>DO..WHILE</A
></H1
><P
>    DO..WHILE loops are very similar to WHILE loops, except the truth
    expression is checked at the end of each iteration instead of in
    the beginning.  The main difference from regular WHILE loops is
    that the first iteration of a DO..WHILE loop is guarenteed to run
    (the truth expression is only checked at the end of the
    iteration), whereas it's may not necessarily run with a regular
    WHILE loop (the truth expression is checked at the beginning of
    each iteration, if it evaluates to FALSE right from the beginning,
    the loop execution would end immediately).
   </P
><P
>    There is just one syntax for DO..WHILE loops:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>$i = 0;
do {
    print $i;
} while ($i&#62;0);</PRE
></DIV
>

   </P
><P
>    The above loop would run one time exactly, since after the first
    iteration, when truth expression is checked, it evaluates to FALSE
    ($i is not bigger than 0) and the loop execution ends.

   </P
><P
>    Advanced C users may be familiar with a different usage of the
    DO..WHILE loop, to allow stopping execution in the middle of code
    blocks, by encapsulating them with DO..WHILE(0), and using the
    BREAK statement.  The following code fragment demonstrates this:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>do {
    if ($i &#60; 5) {
        print "i is not big enough";
        break;
    }
    $i *= $factor;
    if ($i &#60; $minimum_limit) {
        break;
    }
    print "i is ok";
    ...process i...
} while(0);</PRE
></DIV
>

   </P
><P
>    Don't worry if you don't understand this right away or at all.
    You can code scripts and even powerful scripts without using this
    `feature'.

  </P
><?php manualFooter('DO..WHILE');?>