<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.count.php3', 'count'),
  'next' => array('function.end.php3', 'end'),
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
manualHeader('current');
?><H1
>current</H1
><P
>current -- give the current element in an array</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>mixed current(array array);<P
>     Each array variable has an internal pointer that points to one of
     its elements.  In addition, all of the elements in the array are
     linked by a bidirectional linked list for traversing purposes.
     The internal pointer points to the first element that was inserted
     to the array until you run one of the functions that modify that
     pointer on that array.

    </P
><P
>     The <B
CLASS="FUNCTION"
>current()</B
> function simply returns the
     array element that's currently being pointed by the internal
     pointer.  It does not move the pointer in any way.  If the
     internal pointer points beyond the end of the elements list,
     <B
CLASS="FUNCTION"
>current()</B
> returns false.

    </P
><P
>     See also:
     <A
HREF="function.end.php3"
><B
CLASS="FUNCTION"
>end()</B
></A
>, <A
HREF="function.next.php3"
><B
CLASS="FUNCTION"
>next()</B
></A
>,
     <A
HREF="function.prev.php3"
><B
CLASS="FUNCTION"
>prev()</B
></A
> and <A
HREF="function.reset.php3"
><B
CLASS="FUNCTION"
>reset()</B
></A
>.
   </P
></DIV
><?php manualFooter('current');?>