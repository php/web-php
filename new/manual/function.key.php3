<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.end.php3', 'end'),
  'next' => array('function.list.php3', 'list'),
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
manualHeader('key');
?><H1
>key</H1
><P
>key -- fetch a key from an associative array</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>mixed prev(array array);<P
>     <B
CLASS="FUNCTION"
>key()</B
> returns the index element of the
     current array position.
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
   </P
></DIV
><?php manualFooter('key');?>