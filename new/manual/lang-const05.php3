<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const04.php3', 'ELSEIF'),
  'next' => array('lang-const06.php3', 'DO..WHILE'),
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
manualHeader('WHILE');
?><H1
><A
NAME="I(LANG-CONST)C(5,SECT1)"
>WHILE</A
></H1
><P
>    WHILE loops are the simplest type of loop in PHP 3.  They behave
     just like their C counterparts.  The basic form of a WHILE
     statement is:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>    WHILE(expr) statement</PRE
></DIV
>

   </P
><P
>    The meaning of a WHILE statement is simple.  It tells PHP to
    execute the nested statement(s) repeatedly, as long as the WHILE
    expression evaluates to TRUE.  The value of the expression is
    checked each time at the beginning of the loop, so even if this
    value changes during the execution of the nested statement(s),
    execution will not stop until the end of the iteration (each time
    PHP runs the statements in the loop is one iteration).  Sometimes,
    if the WHILE expression evaluates to FALSE from the very
    beginning, the nested statement(s) won't even be run once.

    </P
><P
>    Like with the IF statement, you can group multiple statements
    within the same WHILE loop by surrounding a group of statements
    with curly braces, OR by using the alternate syntax:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>    WHILE(expr): statement ... ENDWHILE;</PRE
></DIV
>

    </P
><P
>    The following examples are identical, and both print numbers from
    1 to 10:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>/* example 1 */
$i=1;
while ($i&#60;=10) {
    print $i++;  /* the printed value would be $i before the increment (post-increment) */
}

/* example 2 */
$i=1;
while ($i&#60;=10):
    print $i;
    $i++;
endwhile;</PRE
></DIV
>


  </P
><?php manualFooter('WHILE');?>