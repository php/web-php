<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.prev.php3', 'prev'),
  'next' => array('function.rsort.php3', 'rsort'),
  'up'   => array('ref.array.php3', 'Array Functions'),
  'toc'  => array(
    array('ref.array.php3#I(REF.ARRAY)C(1,TITLE)', ''),
    array('function.array.php3', 'array'),
    array('function.arsort.php3', 'arsort'),
    array('function.asort.php3', 'asort'),
    array('function.count.php3', 'count'),
    array('function.current.php3', 'current'),
    array('function.end.php3', 'end'),
    array('function.key.php3', 'key'),
    array('function.list.php3', 'list'),
    array('function.next.php3', 'next'),
    array('function.prev.php3', 'prev'),
    array('function.reset.php3', 'reset'),
    array('function.rsort.php3', 'rsort'),
    array('function.sizeof.php3', 'sizeof'),
    array('function.sort.php3', 'sort'))));
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
> rewinds <TT
CLASS="PARAMETER"
><I
>array</I
></TT
>'s
     internal pointer to the first element.
    </P
><P
>     See also:
     <A
HREF="function.current.php3"
><B
CLASS="FUNCTION"
>current()</B
></A
>, <A
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
> and <B
CLASS="FUNCTION"
>reset()</B
>
   </P
></DIV
><?php manualFooter('reset');?>