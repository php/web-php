<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const02.php3', 'IF'),
  'next' => array('lang-const04.php3', 'ELSEIF'),
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
manualHeader('ELSE');
?><H1
><A
NAME="I(LANG-CONST)C(3,SECT1)"
>ELSE</A
></H1
><P
>    Often you'd want to execute a statement if a certain condition is
    met, and a different statement if the condition is not met.  This
    is what ELSE is for.  ELSE extends an IF statement to execute a
    statement in case the expression in the IF statement evaluates to
    FALSE.  For example, the following code would display 'a is bigger
    than b' if $a is bigger than $b, and 'a is NOT bigger than b'
    otherwise:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($a&#62;$b) {
    print "a is bigger than b";
} else {
    print "a is NOT bigger than b";
}</PRE
></DIV
>

    The ELSE statement is only executed if the IF expression evaluated
    to FALSE, and if there were any ELSEIF expressions - only if they
    evaluated to FALSE as well (see below).

  </P
><?php manualFooter('ELSE');?>