<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.asort.php3', 'arsort'),
  'next' => array('function.sizeof.php3', 'sizeof'),
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
manualHeader('count');
?><H1
>count</H1
><P
>count -- count elements in array</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int count(array array);<P
>     Returns the number of elements in the array.
    </P
><P
>     See also:
     <A
HREF="function.sizeof.php3"
><B
CLASS="FUNCTION"
>sizeof()</B
></A
>
   </P
></DIV
><?php manualFooter('count');?>