<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.max.php3', 'max'),
  'next' => array('function.octdec.php3', 'OctDec'),
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
manualHeader('min');
?><H1
>min</H1
><P
>min -- find lowest value</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>mixed min(mixed arg1, mixed arg2, mixed argn);<P
>     Min() returns the numerically highest of the parameter values.

    </P
><P
>     If the first parameter is an array, min() returns the lowest
     value in that array.  If the first parameter is an integer, string
     or double, you need at least two parameters and min() returns the
     lowest of these values.  You can compare an unlimited number of
     values.

    </P
><P
>     If one or more of the values is a double, all the values will be
     treated as doubles, and a double is returned.  If none of the
     values is a double, all of them will be treated as integers, and
     an integer is returned.

   </P
></DIV
><?php manualFooter('min');?>