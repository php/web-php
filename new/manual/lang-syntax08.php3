<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('lang-syntax07.php3', 'Variables from outside PHP'),
  'next' => array('lang-syntax09.php3', 'Array manipulation'),
  'up'   => array('lang-syntax.php3', 'Syntax and grammar'),
  'toc'  => array(
    array('lang-syntax.php3#I(LANG-SYNTAX)C(1,TITLE)', ''),
    array('lang-syntax.php3#I(LANG-SYNTAX)C(1,SIMPARA)', ''),
    array('lang-syntax01.php3', 'Escaping from HTML'),
    array('lang-syntax02.php3', 'Instruction separation'),
    array('lang-syntax03.php3', 'Variable types'),
    array('lang-syntax04.php3', 'Variable initialization'),
    array('lang-syntax05.php3', 'Variable Scope'),
    array('lang-syntax06.php3', 'Variable variables'),
    array('lang-syntax07.php3', 'Variables from outside PHP'),
    array('lang-syntax08.php3', 'Type juggling'),
    array('lang-syntax09.php3', 'Array manipulation'))));
manualHeader('Type juggling');
?><H1
><A
NAME="I(LANG-SYNTAX)C(8,SECT1)"
>Type juggling</A
></H1
><P
>    PHP does not require (or support) explicit type definition in
    variable declaration; a variable's type is determined by the
    context in which that variable is used. That is to say, if you
    assign a string value to variable <TT
CLASS="PARAMETER"
><I
>var</I
></TT
>,
    <TT
CLASS="PARAMETER"
><I
>var</I
></TT
> becomes a string. If you then assign an
    integer value to <TT
CLASS="PARAMETER"
><I
>var</I
></TT
>, it becomes an
    integer.

   </P
><P
>    An example of PHP's automatic type conversion is the addition
    operator '+'. If any of the operands is a double, then all
    operands are evaluated as doubles, and the result will
    be a double. Otherwise, the operands will be interpreted as
    integers, and the result will also be an integer. Note that this
    does NOT change the types of the operands themselves; the
    only change is in how the operands are evaluated.

    <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 4-2. Type evaluation</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$foo = "0";  // $foo is a string (ASCII 48)
$foo++;      // $foo is the string "1" (ASCII 49)
$foo += 1;   // $foo is now an integer (2)
$foo = $foo + 1.3;  // $foo is now a double (3.3)
$foo = 5 + "10 Little Piggies";    // $foo is a double (15)
$foo = 5 + "10 Small Pigs";   // $foo is an integer (15)
     </PRE
></DIV
></TD
></TR
></TABLE
>

   </P
><P
>    If the last two examples above seem odd, see <A
HREF="lang-syntax08.php3#LANG-SYNTAX.STRINGCONV"
>String conversion</A
>.

   </P
><P
>    If you wish to force a variable to be evaluated as a certain type,
    see the section on <A
HREF="lang-syntax08.php3#LANG-SYNTAX.TYPECASTING"
>Type
     casting</A
>. If you wish to change the type of a variable, see
    <A
HREF="function.settype.php3"
>settype</A
>.

   </P
><H2
><A
NAME="I(LANG-SYNTAX)C(8,SECT1)(1,SECT2)"
>Determining variable types</A
></H2
><P
>     Because PHP determines the types of variables and converts them
     (generally) as needed, it is not always obvious what type a given
     variable is at any one time.  PHP includes several functions
     which find out what type a variable is. They are <A
HREF="function.gettype.php3"
>gettype</A
>, <A
HREF="function.is-long.php3"
>is_long</A
>, <A
HREF="function.is-double.php3"
>is_double</A
>, <A
HREF="function.is-string.php3"
>is_string</A
>, <A
HREF="function.is-array.php3"
>is_array</A
>, and <A
HREF="function.is-object.php3"
>is_object</A
>.
     
   </P
><H2
><A
NAME="LANG-SYNTAX.TYPECASTING"
>Type casting</A
></H2
><P
>     Type casting in PHP works much as it does in C: the name of the
     desired type is written in parentheses before the variable which
     is to be cast. 

     <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 4-3. Type casting</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$foo = 10;   // $foo is an integer
$bar = (double) $foo;   // $bar is a double
      </PRE
></DIV
></TD
></TR
></TABLE
>
    
    </P
><P
>     The casts allowed are:
     <P
></P
><UL
><LI
><P
>(int), (integer) - cast to integer
      </P
></LI
><LI
><P
>(real), (double), (float) - cast to double
      </P
></LI
><LI
><P
>(string) - convert to string
     </P
></LI
></UL
>

    </P
><P
>     You may only cast between scalar types. You can neither cast
     objects or arrays to scalar types nor cast scalars to object or
     array types.

   </P
><H2
><A
NAME="LANG-SYNTAX.STRINGCONV"
>String conversion</A
></H2
><P
>     When a string is evaluated as a numeric value, the resulting
     value and type are determined as follows.

    </P
><P
>     The string will evaluate as a double if it contains any of the
     characters '.', 'e', or 'E'. Otherwise, it will evaluate as an
     integer.
     
    </P
><P
>     The value is given by the initial portion of the string. If the
     string starts with valid numeric data, this will be the value
     used. Otherwise, the value will be 0 (zero). Valid numeric data
     is an optional sign, followed by one or more digits (optionally
     containing a decimal point), followed by an optional
     exponent. The exponent is an 'e' or 'E' followed by one or more
     digits.

     <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 4-4. String conversion</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$foo = 1 + "10.5";      // $foo is a double (11.5)
$foo = 1 + "-1.3e3";    // $foo is a double (-1299)
$foo = 1 + "bob-1.3e3"; // $foo is a double (1)
$foo = 1 + "bob3";      // $foo is an integer (1)
$foo = 1 + "10 Small Pigs";     // $foo is an integer (11)
$foo = 1 + "10 Little Piggies"; // $foo is a double (11); the string contains 'e'
      </PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     For more information on this conversion, see the Unix manual page 
     for strtod(3).

  </P
><?php manualFooter('Type juggling');?>