<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bindec.php3', 'BinDec'),
  'next' => array('function.cos.php3', 'Cos'),
  'up'   => array('ref.math.php3', 'Mathematical Functions'),
  'toc'  => array(
    array('ref.math.php3#I(REF.MATH)C(1,TITLE)', ''),
    array('function.abs.php3', 'Abs'),
    array('function.acos.php3', 'Acos'),
    array('function.asin.php3', 'Asin'),
    array('function.atan.php3', 'Atan'),
    array('function.bindec.php3', 'BinDec'),
    array('function.ceil.php3', 'Ceil'),
    array('function.cos.php3', 'Cos'),
    array('function.decbin.php3', 'DecBin'),
    array('function.dechex.php3', 'DecHex'),
    array('function.decoct.php3', 'DecOct'),
    array('function.exp.php3', 'Exp'),
    array('function.floor.php3', 'Floor'),
    array('function.hexdec.php3', 'HexDec'),
    array('function.log.php3', 'Log'),
    array('function.log10.php3', 'Log10'),
    array('function.max.php3', 'max'),
    array('function.min.php3', 'min'),
    array('function.octdec.php3', 'OctDec'),
    array('function.pow.php3', 'pow'),
    array('function.sin.php3', 'Sin'),
    array('function.sqrt.php3', 'Sqrt'),
    array('function.tan.php3', 'Tan'))));
manualHeader('Ceil');
?><H1
>Ceil</H1
><P
>Ceil -- round fractions up</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ceil(float number);<P
>     Returns an int value up to the next integer from number.  Using
     ceil() on int is absolutely waste time.

    </P
><P
>     See also <A
HREF="function.floor.php3"
>floor</A
>.  NOTE:
    PHP2 used to return. Use: <TT
CLASS="LITERAL"
>$new =
    (double)Ceil($number);</TT
>
    to get the old behaviour.

   </P
></DIV
><?php manualFooter('Ceil');?>