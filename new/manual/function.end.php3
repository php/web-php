<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.sort.php3', 'arsort'),
  'next' => array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
  'up'   => array('ref.array.php3', 'Array Functions'),
  'toc'  => array(
    array('ref.array.php3#I(REF.ARRAY)C(1,TITLE)', ''),
    array('function.arsort.php3', 'arsort'),
    array('function.asort.php3', 'arsort'),
    array('function.count.php3', 'count'),
    array('function.sizeof.php3', 'sizeof'),
    array('function.current.php3', 'current'),
    array('function.next.php3', 'next'),
    array('function.prev.php3', 'prev'),
    array('function.key.php3', 'key'),
    array('function.reset.php3', 'reset'),
    array('function.rsort.php3', 'arsort'),
    array('function.sort.php3', 'arsort'),
    array('function.end.php3', 'end'))));
manualHeader('end');
?><H1
>end</H1
><P
>end -- set internal pointer of array to last element</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>end(array array);<P
>     <B
CLASS="FUNCTION"
>end()</B
> advances
     <TT
CLASS="PARAMETER"
><I
>array</I
></TT
>'s internal pointer to the last
     element.
    </P
><P
>     See also:
     <A
HREF="function.current.php3"
><B
CLASS="FUNCTION"
>current()</B
></A
>
     <A
HREF="function.end.php3"
><B
CLASS="FUNCTION"
>end()</B
></A
>
     <A
HREF="function.next.php3"
><B
CLASS="FUNCTION"
>next()</B
></A
>
     <A
HREF="function.reset.php3"
><B
CLASS="FUNCTION"
>reset()</B
></A
>
   </P
></DIV
><?php manualFooter('end');?>