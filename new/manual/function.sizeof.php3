<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rsort.php3', 'rsort'),
  'next' => array('function.sort.php3', 'sort'),
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