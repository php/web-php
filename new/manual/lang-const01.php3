<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-const.php3', 'Language constructs'),
  'next' => array('lang-const02.php3', 'IF'),
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
manualHeader('Expressions');
?><H1
><A
NAME="EXPRESSIONS"
>Expressions</A
></H1
><P
>    Expressions are the most important building stones of PHP.  In PHP
    3.0, almost anything you write is an expression.  The simplest yet
    most accurate way to define an expressions is "anything that has a
    value".
   </P
><P
>    Simple examples that come in mind are constants and variables.
    When you type "$a = 5", you're assigning '5' into $a.  '5',
    obviously, has the value 5, or in other words '5' is an expression
    with the value of 5 (in this case, '5' is an integer constant).
   </P
><P
>    After this assignment, you'd expect $a's value to be 5 as
    well, so if you wrote $b = $a, you'd expect it to behave just as
    if you wrote $b = 5.  In other words, $a is an expression with the
    value of 5 as well.  If everything works right, this is exactly
    what will happen.
   </P
><P
>    Slightly more complex examples for expressions are functions.  For
    instance, consider the following function:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>      function foo()
      {
          return 5;
      }
     </PRE
></DIV
>

   </P
><P
>    Assuming you're familiar with the concept of functions (if you're
    not, take a look at the chapter about functions), you'd assume
    that typing <TT
CLASS="LITERAL"
>$c = foo()</TT
> is essentially just like
    writing <TT
CLASS="LITERAL"
>$c = 5</TT
>, and you're right.  Functions
    are expressions with the value of their return value.  Since foo()
    returns 5, the value of the expression 'foo()' is 5.  Usually
    functions don't just return a static value but compute something.

   </P
><P
>    Of course, values in PHP don't have to be integers, and very often
    they aren't.  PHP supports 3 scalar value types: integer values,
    floating point values and string values (scalar values are values that
    you can't 'break' into smaller pieces, unlike arrays, for instance).
    PHP also supports two composite (non-scalar) types: arrays and
    objects.  Each of these value types can be assigned into variables or
    returned from functions.

   </P
><P
>    So far, users of PHP/FI 2 shouldn't feel any change.  However, PHP
    3 takes expressions much further, in the same way many other
    languages do.  PHP 3 is an expression-oriented language, in the
    sense that almost everything is an expression.  Consider the
    example we've already dealt with, '$a = 5'.  It's easy to see that
    there are two values involved here, the value of the integer
    constant '5', and the value of $a which is being updated to 5 as
    well.  But the truth is that there's one additional value involved
    here, and that's the value of the assignment itself.  The
    assignment itself evaluates to the assigned value, in this case 5.
    In practice, it means that '$a = 5', regardless of what it does,
    is an expression with the value 5.  Thus, writing something like
    '$b = ($a = 5)' is like writing '$a = 5; $b = 5;' (a semicolon
    marks the end of a statement).  Since assignments are parsed in a
    right to left order, you can also write '$b = $a = 5'.

   </P
><P
>    Another good example of expression orientation is pre- and
    post-increment and decrement.  Users of PHP/FI 2 and many other
    languages may be familiar with the notation of variable++ and
    variable--.  These are increment and decrement operators.  In
    PHP/FI 2, the statement '$a++' has no value (is not an
    expression), and thus you can't assign it or use it in any way.
    PHP 3 enhances the increment/decrement capabilities by making
    these expressions as well, like in C.  In PHP 3, like in C, there
    are two types of increment - pre-increment and post-increment.
    Both pre-increment and post-increment essentially increment the
    variable, and the effect on the variable is idential.  The
    difference is with the value of the increment expression.
    Pre-increment, which is written '++$variable', evaluates to the
    incremented value (PHP increments the variable before reading its
    value, thus the name 'pre-increment').  Post-increment, which is
    written '$variable++' evaluates to the original value of
    $variable, before it was incremented (PHP increments the variable
    after reading its value, thus the name 'post-increment').

   </P
><P
>    A very common type of expressions are comparison expressions.
    These expressions evaluate to either 0 or 1, meaning FALSE or TRUE
    (respectively).  PHP supports &#62; (bigger than), &#62;= (bigger than or
    equal to), == (equal), &#60; (smaller than) and &#60;= (smaller than or
    equal to).  These expressions are most commonly used inside
    conditional execution, such as IF statements.

   </P
><P
>    The last example of expressions we'll deal with here is combined
    operator-assignment expressions.  You already know that if you
    want to increment $a by 1, you can simply write '$a++' or '++$a'.
    But what if you want to add more than one to it, for instance 3?
    You could write '$a++' multiple times, but this is obviously not a
    very efficient or comfortable way.  A much more common practice is
    to write '$a = $a + 3'.  '$a + 3' evaluates to the value of $a
    plus 3, and is assigned back into $a, which results in
    incrementing $a by 3.  In PHP 3, as in several other languages
    like C, you can write this in a shorter way, which with time would
    become clearer and quicker to understand as well.  Adding 3 to the
    current value of $a can be written '$a += 3'.  This means exactly
    "take the value of $a, add 3 to it, and assign it back into $a".
    In addition to being shorter and clearer, this also results in
    faster execution.  The value of '$a += 3', like the value of a
    regular assignment, is the assigned value.  Notice that it is NOT
    3, but the combined value of $a plus 3 (this is the value that's
    assigned into $a).  Any two-place operator can be used in this
    operator-assignment mode, for example '$a -= 5' (subtract 5 from
    the value of $a), '$b *= 7' (multiply the value of $b by 7), etc.

   </P
><P
>    The following example should help you understand pre- and
    post-increment and expressions in general a bit better:
    <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>function double($i)
{
	return $i*2;
}
$b = $a = 5;        /* assign the value five into the variable $a and $b */
$c = $a++;          /* post-increment, the value assigned to $c is the original value of $a, which is 5 */
$e = $d = ++$b;     /* pre-increment, the value assigned into $d and $e is the incremented value of $b, which is 6 */
/* at this point, both $d and $e are equal to 6 */
$f = double($d++);  /* $f would be assigned twice the value of $d *before* the increment, 2*6 = 12 */
$g = double($++e);  /* $g would be assigned twice the value of $e *after* the increment, 2*7 = 14 */
$h = $g += 10;      /* first, $g is incremented by 10 and ends with the value of 24.
                       the value of the assignment (24) is then assigned into $h,
                       and $h ends with the value of 24 as well. */</PRE
></DIV
>

   </P
><P
>    In the beginning of the chapter we said that we'll be describing
    the various statement types, and as promised, expressions can be
    statements.  However, not every expression is a statement.  In
    this case, a statement has the form of 'expr' ';' that is, an
    expression followed by a semicolon.  In '$b=$a=5;', $a=5 is a
    valid expression, but it's not a statement by itself.  '$b=$a=5;'
    however is a valid statement.
   </P
><P
>    One last thing worth mentioning is the truth value of expressions.
    In many events, mainly in conditional execution and loops, you're
    not interested in the specific value of the expression, but only
    care about whether it means TRUE or FALSE (PHP doesn't have a
    dedicated boolean type).  The truth value of expressions in PHP is
    calculated in a similar way to perl.  Any numeric non-zero numeric
    value is TRUE, zero is FALSE.  Be sure to note that negative
    values are non-zero and are thus considered TRUE!  Any non-empty
    string is considered to be TRUE; empty strings are FALSE.  With
    non-scalar values (arrays and objects) - if the value contains no
    elements it's considered FALSE, otherwise it's considered TRUE.
   </P
><P
>    PHP 3 provides a full and powerful implementation of expressions,
    and documenting it entirely goes beyond the scope of this manual.
    The above examples should give you a good idea about what
    expressions are and how you can construct useful expressions.
    Throughout the rest of this manual we'll write 'expr' to mark any
    valid PHP3 expression.
    
  </P
><?php manualFooter('Expressions');?>