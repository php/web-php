<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.setlocale.php3', 'setlocale'),
  'next' => array('function.stripslashes.php3', 'StripSlashes'),
  'up'   => array('ref.strings.php3', 'String functions'),
  'toc'  => array(
    array('ref.strings.php3#I(REF.STRINGS)C(1,TITLE)', ''),
    array('function.addslashes.php3', 'AddSlashes'),
    array('function.chop.php3', 'Chop'),
    array('function.chr.php3', 'Chr'),
    array('function.echo.php3', 'echo'),
    array('function.explode.php3', 'explode'),
    array('function.flush.php3', 'flush'),
    array('function.implode.php3', 'implode'),
    array('function.ord.php3', 'Ord'),
    array('function.print.php3', 'print'),
    array('function.printf.php3', 'printf'),
    array('function.quotemeta.php3', 'QuoteMeta'),
    array('function.rawurldecode.php3', 'rawurldecode'),
    array('function.rawurlencode.php3', 'rawurlencode'),
    array('function.setlocale.php3', 'setlocale'),
    array('function.sprintf.php3', 'sprintf'),
    array('function.stripslashes.php3', 'StripSlashes'),
    array('function.strlen.php3', 'strlen'),
    array('function.strtok.php3', 'strtok'),
    array('function.strrchr.php3', 'strrchr'),
    array('function.strrev.php3', 'strrev'),
    array('function.strstr.php3', 'strstr'),
    array('function.strtolower.php3', 'strtolower'),
    array('function.strtoupper.php3', 'strtolower'),
    array('function.strtr.php3', 'strtr'),
    array('function.substr.php3', 'substr'),
    array('function.ucfirst.php3', 'ucfirst'))));
manualHeader('sprintf');
?><H1
>sprintf</H1
><P
>sprintf -- return a formatted string</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>sprint(string format, mixed args...);<P
>     Returns a string produced according to the formatting string
     <TT
CLASS="PARAMETER"
><I
>format</I
></TT
>.

    </P
><P
>     The format string is composed by zero or more directives:
     ordinary characters (excluding <TT
CLASS="LITERAL"
>%</TT
>) that are
     copied directly to the result, and <I
CLASS="EMPHASIS"
>conversion
     specifications</I
>, each of which results in fetching its
     own parameter.  This applies to both sprintf and <A
HREF="function.printf.php3"
>printf</A
>

    </P
><P
>     Each conversion specification consists of these elements, in
     order:
     <P
></P
><OL
TYPE="1"
><LI
><P
>&#13;	An optional <I
CLASS="EMPHASIS"
>padding specifier</I
> that says
	what character will be used for padding the results to the
	right string size.  This may be a space character or a
	<TT
CLASS="LITERAL"
>0</TT
> (zero character).  The default is to pad
	with spaces.  An alternate padding character can be specified
	by prefixing it with a single quote (<TT
CLASS="LITERAL"
>'</TT
>).
	See the examples below.

      </P
></LI
><LI
><P
>&#13;	An optional <I
CLASS="EMPHASIS"
>alignment specifier</I
> that says
	if the result should be left-justified or right-justified.
	The default is right-justified, a <TT
CLASS="LITERAL"
>-</TT
>
	character here will make it left-justified.

      </P
></LI
><LI
><P
>&#13;	An optional number, a <I
CLASS="EMPHASIS"
>width specifier</I
>
	that says how many characters (minimum) this conversion should
	result in.

      </P
></LI
><LI
><P
>&#13;	An optional <I
CLASS="EMPHASIS"
>precision specifier</I
> that says
	how many decimal digits should be displayed for floating-point
	numbers.  This option has no effect for other types than
	double.

      </P
></LI
><LI
><P
>&#13;	A <I
CLASS="EMPHASIS"
>type specifier</I
> that says what type the
	argument data should be treated as.  Possible types:
	<P
></P
><TABLE
BORDER="0"
><TR
><TD
>	  <TT
CLASS="LITERAL"
>%</TT
> - a literal percent character. No
	  argument is required.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>b</TT
> - the argument is treated as an
	  integer, and presented as a binary number.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>c</TT
> - the argument is treated as an
	  integer, and presented as the character with that ASCII
	  value.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>d</TT
> - the argument is treated as an
	  integer, and presented as a decimal number.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>f</TT
> - the argument is treated as a double,
	  and presented as a floating-point number.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>o</TT
> - the argument is treated as an
	  integer, and presented as an octal number.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>s</TT
> - the argument is treated as and
	  presented as a string.
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>x</TT
> - the argument is treated as an
	  integer and presented as a hexadecimal number (with
	  lowercase letters).
	 </TD
></TR
><TR
><TD
>	  <TT
CLASS="LITERAL"
>X</TT
> - the argument is treated as an
	  integer and presented as a hexadecimal number (with
	  uppercase letters).
	 </TD
></TR
></TABLE
>

     </P
></LI
></OL
>

    </P
><P
>     See also:
     <A
HREF="function.printf.php3"
>printf</A
>

   </P
></DIV
><DIV
CLASS="REFSECT1"
><H2
>Examples</H2
><P
>     <TABLE
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
>Example 1. sprintf: zero-padded integers</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$isodate = sprintf("%04d-%02d-%02d", $year, $month, $day);</PRE
></DIV
></TD
></TR
></TABLE
>

    </P
></DIV
><?php manualFooter('sprintf');?>