<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.next.php3', 'next'),
  'next' => array('function.reset.php3', 'reset'),
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
manualHeader('prev');
?><H1
>prev</H1
><P
>prev -- rewind internal array pointer</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>mixed prev(array array);<P
>     Returns the array element in the previous place that's pointed by
     the internal array pointer, or false if there are no more
     elements.
    </P
><P
>  
     <B
CLASS="FUNCTION"
>prev()</B
> behaves just like
     <A
HREF="function.next.php3"
><B
CLASS="FUNCTION"
>next()</B
></A
>, except it rewinds the internal array
     pointer one place instead of advancing it.
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
> and <A
HREF="function.reset.php3"
><B
CLASS="FUNCTION"
>reset()</B
></A
>
   </P
></DIV
><?php manualFooter('prev');?>