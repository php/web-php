<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcmod.php3', 'bcmod'),
  'next' => array('function.bcpow.php3', 'bcpow'),
  'up'   => array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
  'toc'  => array(
    array('ref.bc.php3#I(REF.BC)C(1,TITLE)', ''),
    array('function.bcadd.php3', 'bcadd'),
    array('function.bccomp.php3', 'bccomp'),
    array('function.bcdiv.php3', 'bcdiv'),
    array('function.bcmod.php3', 'bcmod'),
    array('function.bcmul.php3', 'bcmul'),
    array('function.bcpow.php3', 'bcpow'),
    array('function.bcscale.php3', 'bcscale'),
    array('function.bcsqrt.php3', 'bcsqrt'),
    array('function.bcsub.php3', 'bcadd'))));
manualHeader('bcmul');
?><H1
>bcmul</H1
><P
>bcmul -- Multiply two arbitrary precision number.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcmul(string left operand, string right operand, int scale);<P
>	Multiply the <TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
> by the 
	<TT
CLASS="PARAMETER"
><I
>right operand</I
></TT
> and returns the result.  The optional
	<TT
CLASS="PARAMETER"
><I
>scale</I
></TT
> sets the number of digits after the decimal
	place in the result.
	
	</P
><P
>	See also <A
HREF="function.bcdiv.php3"
><B
CLASS="FUNCTION"
>bcdiv()</B
></A
>.
   </P
></DIV
><?php manualFooter('bcmul');?>