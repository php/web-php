<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcadd.php3', 'bcadd'),
  'next' => array('function.bcdiv.php3', 'bcdiv'),
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
manualHeader('bccomp');
?><H1
>bccomp</H1
><P
>bccomp -- Compare two arbitrary precision numbers.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int bccomp(string left operand, string right operand, int scale);<P
>	Compares the <TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
> to the
	<TT
CLASS="PARAMETER"
><I
>right operand</I
></TT
> and returns the 
	result as an integer.  The optional <TT
CLASS="PARAMETER"
><I
>scale</I
></TT
>
	parameter is used to set the number of digits after the decimal place
	which will be used in the comparion.  The return value is 0 if the
	two operands are equal.  If the <TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
>
	is larger than the <TT
CLASS="PARAMETER"
><I
>right operand</I
></TT
> the return
	value is +1 and if the <TT
CLASS="PARAMETER"
><I
>left operand</I
></TT
> is less than
	the <TT
CLASS="PARAMETER"
><I
>right operand</I
></TT
> the return value is -1.
   </P
></DIV
><?php manualFooter('bccomp');?>