<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.count.php3', 'count'),
  'next' => array('function.current.php3', 'current'),
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
manualHeader('sizeof');
?><H1
>sizeof</H1
><P
>sizeof -- get size of array</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int sizeof(array array);<P
>     Returns the number of elements in the array.
    </P
><P
>     See also:
     <A
HREF="function.count.php3"
><B
CLASS="FUNCTION"
>count()</B
></A
>
   </P
></DIV
><?php manualFooter('sizeof');?>