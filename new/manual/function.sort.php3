<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rsort.php3', 'rsort'),
  'next' => array('function.end.php3', 'end'),
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
>	This function sorts an array.  Elements will be arranged from lowest to
	highest when this function has completed.
	<DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. sort() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>    $fruits = array("lemon","orange","banana","apple");
    sort($fruits);
    for(reset($fruits); $key = key($fruits); next($fruits)) {
        echo "fruits[$key] = ".$fruits[$key]."\n";
    }
	</PRE
></DIV
>
	This example would display:
	<TT
CLASS="COMPUTEROUTPUT"
>	fruits[0] = apple
	fruits[1] = banana
	fruits[2] = lemon
	fruits[3] = orange
	</TT
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
>,
     <A
HREF="function.asort.php3"
><B
CLASS="FUNCTION"
>asort()</B
></A
>, and
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