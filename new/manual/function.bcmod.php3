<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcdiv.php3', 'bcdiv'),
  'next' => array('function.bcmul.php3', 'bcmul'),
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
manualHeader('bcmod');
?><H1
>bcmod</H1
><P
>bcmod -- Get modulus of an arbitrary precision number.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcmod(string left operand, string modulus, int scale);<P
>	Get the modulus of the <TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
> using
	<TT
CLASS="PARAMETER"
><I
>modulus</I
></TT
>.  The <TT
CLASS="PARAMETER"
><I
>scale</I
></TT
>
	parameter sets the number of digits after the decimal place in the
	result.
	</P
><P
>	See also <A
HREF="function.bcdiv.php3"
>bcdiv</A
>.
   </P
></DIV
><?php manualFooter('bcmod');?>