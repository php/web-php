<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const.php3', 'Language constructs'),
  'next' => array('lang-const03.php3', 'ELSE'),
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
manualHeader('IF');
?><H1
><A
NAME="I(LANG-CONST)C(2,SECT1)"
>IF</A
></H1
><P
>    The IF construct is one of the most important features of many
    languages, PHP included.  It allows for conditional execution of
    code fragments.  PHP features an IF sentence that is similar to
    that of C:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if (expr)
  statement</PRE
></DIV
>

   </P
><P
>    As described in the section about expressions, expr is evaluated
    to its truth value.  If expr evaluates to TRUE, PHP will execute
    statement, and if it evaluates to FALSE - it'll ignore it.

   </P
><P
>    The following example would display 'a is bigger than b' if $a is
    bigger than $b:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($a &#62; $b)
  print "a is bigger than b";</PRE
></DIV
>

   </P
><P
>    Often you'd want to have more than one statement to be executed
    conditionally.  Of course, there's no need to wrap each statement
    with an IF clause.  Instead, you can group several statements into
    a statement group.  For example, this code would display 'a is
    bigger than b' if $a is bigger than $b, and would then assign the
    value of $a into $b:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($a&#62;$b) {
  print "a is bigger than b";
  $b = $a;
}</PRE
></DIV
>

   </P
><P
>    If statements can be nested indefinitely within other IF
    statements, which provides you with complete flexibility for
    conditional execution of the various parts of your pgoram.
  </P
><?php manualFooter('IF');?>