<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const03.php3', 'ELSE'),
  'next' => array('lang-const05.php3', 'WHILE'),
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
manualHeader('ELSEIF');
?><H1
><A
NAME="I(LANG-CONST)C(4,SECT1)"
>ELSEIF</A
></H1
><P
>ELSEIF, as its name suggests, is a combination of IF and
    ELSE.  Like ELSE, it extends an IF statement to execute a
    different statement in case the original IF expression evaluates
    to FALSE.  However, unlike ELSE, it will execute that alternative
    expression only if the ELSEIF expression evaluates to TRUE.  For
    example, the following code would display 'a is bigger than b' if
    $a&#62;$b, 'a is equal to b' if $a==$b, and 'a is smaller than b' if
    $a&#60;$b:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($a &#62; $b) {
    print "a is bigger than b";
} elseif ($a == $b) {
    print "a is equal to b";
} else {
    print "a is smaller than b";
}</PRE
></DIV
>

   </P
><P
>    There may be several ELSEIFs within the same IF statement.  The
    first ELSEIF expression (if any) that evaluates to TRUE would be
    executed.  In PHP 3, you can also write 'else if' (in two words)
    and the behavior would be identical to the one of 'elseif' (in a
    single word).  The syntactic meaning is slightly different (if
    you're familiar with C, this is the same behavior) but the bottom
    line is that both would result in exactly the same behavior.
    
   </P
><P
>    The ELSEIF statement is only executed if the IF expression and any
    previous ELSEIF expressions evaluated to FALSE, and the current
    ELSEIF expression evaluated to TRUE.

   </P
><H2
><A
NAME="I(LANG-CONST)C(4,SECT1)(1,SECT2)"
>Alternative syntax for IF statements: IF(): ... ENDIF;</A
></H2
><P
>PHP 3 offers a different way to group statements within an IF
     statement.  This is most commonly used when you nest HTML blocks
     inside IF statements, but can be used anywhere.  Instead of using
     curly braces, the IF(expr) should be followed by a colon, the list
     of one or more statements, and end with ENDIF;.  Consider the
     following example:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php if ($a==5): ?&#62;
A = 5
&#60;?php endif; ?&#62;</PRE
></DIV
>

    </P
><P
>In the above example, the HTML block "A = 5" is nested
     within an IF statement written in the alternative syntax.  The
     HTML block would be displayed only if $a is equal to 5.

    </P
><P
>The alternative syntax applies to ELSE and ELSEIF (expr) as
     well.  The following is an IF statement with ELSEIF and ELSE in
     the alternative format:
     <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>if ($a==5):
    print "a equals to 5";
    print "...";
elseif ($a==6):
    print "a equals to 6";
    print "!!!";
else
    print "a is not 5 nor 6";
endif;</PRE
></DIV
>

  </P
><?php manualFooter('ELSEIF');?>