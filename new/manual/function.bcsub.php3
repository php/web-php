<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcsqrt.php3', 'bcsqrt'),
  'next' => array('ref.datetime.php3', 'Date/Time Functions'),
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
manualHeader('bcadd');
?><H1
>bcadd</H1
><P
>bcadd -- Subtract one arbitrary precision number from another.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcsub(string left operand, string right operand, int scale);<P
>	Subtracts the <TT
CLASS="PARAMETER"
><I
>right operand</I
></TT
> from the
	<TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
> and returns the 
	result in a string.  The optional <TT
CLASS="PARAMETER"
><I
>scale</I
></TT
>
	parameter is used to set the number of digits after the decimal 
	place in the result.
	</P
><P
>	See also <A
HREF="function.bcadd.php3"
>bcadd</A
>.
   </P
></DIV
><?php manualFooter('bcadd');?>