<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcpow.php3', 'bcpow'),
  'next' => array('function.bcsqrt.php3', 'bcsqrt'),
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
manualHeader('bcscale');
?><H1
>bcscale</H1
><P
>bcscale -- Set default scale parameter for all bc math functions.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string bcscale(int scale);<P
>	This function sets the default scale paramter for all subsequent bc math functions
	that do not explicitly specify a scale parameter.
   </P
></DIV
><?php manualFooter('bcscale');?>