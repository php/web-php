<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.sizeof.php3', 'sizeof'),
  'next' => array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
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
manualHeader('sort');
?><H1
>sort</H1
><P
>sort -- Sort an array</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void sort(array array);<P
>     This function sorts an array.  Elements will be arranged from lowest to
     highest when this function has completed.
     <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. <B
CLASS="FUNCTION"
>sort()</B
> example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fruits = array("lemon","orange","banana","apple");
sort($fruits);
for(reset($fruits); $key = key($fruits); next($fruits)) {
    echo "fruits[$key] = ".$fruits[$key]."\n";
}</PRE
></DIV
></TD
></TR
></TABLE
>
     This example would display:
     <TT
CLASS="COMPUTEROUTPUT"
>fruits[0] = apple
fruits[1] = banana
fruits[2] = lemon
fruits[3] = orange</TT
>
     The fruits have been sorted in alphabetical order.
    </P
><P
>     See also:
     <A
HREF="function.arsort.php3"
><B
CLASS="FUNCTION"
>arsort()</B
></A
>, <A
HREF="function.asort.php3"
><B
CLASS="FUNCTION"
>asort()</B
></A
> and
     <A
HREF="function.rsort.php3"
><B
CLASS="FUNCTION"
>rsort()</B
></A
>.
   </P
></DIV
><?php manualFooter('sort');?>