<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.key.php3', 'key'),
  'next' => array('function.rsort.php3', 'rsort'),
  'up'   => array('ref.array.php3', 'Array Functions'),
  'toc'  => array(
    array('ref.array.php3#I(REF.ARRAY)C(1,TITLE)', ''),
    array('function.arsort.php3', 'arsort'),
    array('function.asort.php3', 'asort'),
    array('function.count.php3', 'count'),
    array('function.sizeof.php3', 'sizeof'),
    array('function.current.php3', 'current'),
    array('function.next.php3', 'next'),
    array('function.prev.php3', 'prev'),
    array('function.key.php3', 'key'),
    array('function.reset.php3', 'reset'),
    array('function.rsort.php3', 'rsort'),
    array('function.sort.php3', 'sort'),
    array('function.end.php3', 'end'))));
manualHeader('reset');
?><H1
>reset</H1
><P
>reset -- set internal pointer of array to first element</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>reset(array array);<P
>     <B
CLASS="FUNCTION"
>reset()</B
> rewinds
     <TT
CLASS="PARAMETER"
><I
>array</I
></TT
>'s internal pointer to the first
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
HREF="function.next.php3"
><B
CLASS="FUNCTION"
>next()</B
></A
>
     <A
HREF="function.prev.php3"
><B
CLASS="FUNCTION"
>prev()</B
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
><?php manualFooter('reset');?>