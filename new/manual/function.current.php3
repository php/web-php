<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.sizeof.php3', 'sizeof'),
  'next' => array('function.next.php3', 'next'),
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
>     Returns the array element that's currently being pointed by the
     internal array pointer.
  
    </P
><P
>     Each array variable has an internal pointer that points to one of
     its elements.  In addition, all of the elements in the array are
     linked by a bidirectional linked list for traversing purposes.
     The internal pointer points to the first element that was inserted
     to the array until you run one of the functions that modify that
     pointer on that array.

    </P
><P
>     The current() function simply returns the array element that's
     currently being pointed by the internal pointer.  It does not
     move the pointer in any way.  If the internal pointer points
     beyond the end of the elements list, current() returns false.

    </P
><P
>     See also:
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
><?php manualFooter('current');?>