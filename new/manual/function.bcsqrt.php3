<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcscale.php3', 'bcscale'),
  'next' => array('function.bcsub.php3', 'bcadd'),
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
manualHeader('bcsqrt');
?><H1
>bcsqrt</H1
><P
>bcsqrt -- Get the square root of an arbitray precision number.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcsqrt(string operand, int scale);<P
>	Return the square root of the <TT
CLASS="PARAMETER"
><I
>operand</I
></TT
>.  The
	optional <TT
CLASS="PARAMETER"
><I
>scale</I
></TT
> parameter sets the number of 
	digits after the decimal place in the result.
	</P
><P
>	See also <A
HREF="function.bcpow.php3"
><B
CLASS="FUNCTION"
>bcpow()</B
></A
>.
   </P
></DIV
><?php manualFooter('bcsqrt');?>