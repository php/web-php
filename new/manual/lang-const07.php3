<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const06.php3', 'DO..WHILE'),
  'next' => array('lang-const08.php3', 'SWITCH'),
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
manualHeader('FOR');
?><H1
><A
NAME="I(LANG-CONST)C(7,SECT1)"
>FOR</A
></H1
><P
>    FOR loops are the most complex loops in PHP.  They behave like
    their C counterparts.  The syntax of a FOR loop is:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>    FOR (expr1; expr2; expr3) statement</PRE
></DIV
>

   </P
><P
>    The first expression (expr1) is evaluated (executed)
    unconditionally at the beginning of the loop.
   </P
><P
>    In the beginning of each iteration, expr2 is evaluated.  If it
    evaluates to TRUE, the loop continues and the nested statement(s)
    are executed.  If it evaluates to FALSE, the execution of the loop
    ends.
   </P
><P
>    At the end of each iteration, expr3 is evaluated (executed).
   </P
><P
>    Each of the expressions can be empty.  expr2 being empty means the
    loop should be run indefinitely (PHP implicitly considers it as
    TRUE, like C).  This may not be as useless as you might think,
    since often you'd want to end the loop using a conditional BREAK
    statement instead of using the FOR truth expression.
   </P
><P
>    Consider the following examples.  All of them display numbers from
    1 to 10:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>/* example 1 */
for ($i=1; $i&#60;=10; $i++) {
    print $i;
}

/* example 2 */
for ($i = 1;;$i++) {
    if ($i &#62; 10) {
        break;
    }
    print $i;
}

/* example 3 */
$i = 1;
for (;;) {
    if ($i &#62; 10) {
        break;
    }
    print $i;
    $i++;
}</PRE
></DIV
>

   </P
><P
>    Of course, the first example appears to be the nicest one, but you
    may find that being able to use empty expressions in FOR loops comes
    in handy in many occasions.

   </P
><P
>There is only one format for FOR loops in PHP 3.
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>    FOR(expr): ... ENDFOR;  is NOT supported.</PRE
></DIV
>


  </P
><?php manualFooter('FOR');?>