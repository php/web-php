<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcmul.php3', 'bcmul'),
  'next' => array('function.bcscale.php3', 'bcscale'),
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
manualHeader('bcpow');
?><H1
>bcpow</H1
><P
>bcpow -- Raise an arbitrary precision number to another.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcpow(string x, string y, int scale);<P
>	Raise <TT
CLASS="PARAMETER"
><I
>x</I
></TT
> to the parameter <TT
CLASS="PARAMETER"
><I
>y</I
></TT
>.
	The <TT
CLASS="PARAMETER"
><I
>scale</I
></TT
> can be used to set the number of digits
	after the decimal place in the result.
	</P
><P
>	See also <A
HREF="function.bcsqrt.php3"
><B
CLASS="FUNCTION"
>bcsqrt()</B
></A
>.
   </P
></DIV
><?php manualFooter('bcpow');?>