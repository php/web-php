<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const07.php3', 'FOR'),
  'next' => array('lang-const09.php3', 'REQUIRE'),
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
manualHeader('SWITCH');
?><H1
><A
NAME="I(LANG-CONST)C(8,SECT1)"
>SWITCH</A
></H1
><P
>    The SWITCH statement is similar to a series of IF statements on
    the same expression.  In many occasions, you may want to compare
    the same variable (or expression) with many different values, and
    execute a different piece of code depending on which value it
    equals to.  This is exactly what the SWITCH statement is for.
   </P
><P
>    The following two examples are two different ways to write the
    same thing, one using a series of IF statements, and the other
    using the SWITCH statement:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>/* example 1 */
if ($i == 0) {
    print "i equals 0";
}
if ($i == 1) {
    print "i equals 1";
}
if ($i == 2) {
    print "i equals 2";
}

/* example 2 */
switch ($i) {
    case 0:
        print "i equals 0";
        break;
    case 1:
        print "i equals 1";
        break;
    case 2:
        print "i equals 2";
        break;
}</PRE
></DIV
>

    </P
><P
>    It is important to understand how the SWITCH statement is executed
    in order to avoid messups.  The SWITCH statement executes line by
    line (actually, statement by statement).  In the beginning, no
    code is executed.  Only when a CASE statement is found with a
    value that matches the value of the SWITCH expression, PHP begins
    to execute the statements.  PHP continues to execute the
    statements until the end of the SWITCH block, or the first time it
    sees a BREAK statement.  If you don't write a BREAK statement at
    the end of a case's statement list, PHP will go on executing the
    statements of the following case.  For example:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>/* example 3 */
switch ($i) {
  case 0:
    print "i equals 0";
  case 1:
    print "i equals 1";
  case 2:
    print "i equals 2";
}</PRE
></DIV
>

   </P
><P
>    Here, if $i equals to 0, PHP would execute all of the print
    statements!  If $i equals to 1, PHP would execute the last two
    print statements, and only if $i equals to 2, you'd get the
    'expected' behavior and only 'i equals 2' would be displayed.  So,
    it's important not to forget BREAK statements (even though you may
    want to avoid supplying them on purpose under certain
    circumstances).

   </P
><P
>    A special case is the default case.  This case matches anything
    that wasn't matched by the other cases.  For example:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>/* example 4 */
switch ($i) {
    case 0:
        print "i equals 0";
        break;
    case 1:
        print "i equals 1";
        break;
    case 2:
        print "i equals 2";
        break;
    default:
        print "i is not equal to 0, 1 or 2";
}</PRE
></DIV
>

    </P
><P
>    Another fact worth mentioning is that the CASE expression may be
    any expression that evaluates to a scalar type, that is, integer
    or real numbers and strings.  Arrays or objects won't crash PHP,
    but they're meaningless in that context.

  </P
><?php manualFooter('SWITCH');?>