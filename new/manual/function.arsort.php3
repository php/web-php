<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.array.php3', 'Array Functions'),
  'next' => array('function.asort.php3', 'asort'),
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
manualHeader('arsort');
?><H1
>arsort</H1
><P
>arsort -- Sort an array in reverse order and maintain index association</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void arsort(array array);<P
>	This function sorts an array such that array indices maintain their 
	correlation with the array elements they are associated with.  This is
	used mainly when sorting associative arrays where the actual element
	order is significant.  
	<DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. arsort() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>    $fruits = array("d"=&#62;"lemon","a"=&#62;"orange","b"=&#62;"banana","c"=&#62;"apple");
    arsort($fruits);
    for(reset($fruits); $key = key($fruits); next($fruits)) {
        echo "fruits[$key] = ".$fruits[$key]."\n";
    }
	</PRE
></DIV
>
	This example would display:
	<TT
CLASS="COMPUTEROUTPUT"
>	fruits[a] = orange
	fruits[d] = lemon
	fruits[b] = banana
	fruits[c] = apple
	</TT
>
	The fruits have been sorted in reverse alphabetical order, and the index
	associated with each element has been maintained.
    </P
><P
>     See also:
     <A
HREF="function.asort.php3"
><B
CLASS="FUNCTION"
>asort()</B
></A
>,
     <A
HREF="function.rsort.php3"
><B
CLASS="FUNCTION"
>rsort()</B
></A
>, and
     <A
HREF="function.sort.php3"
><B
CLASS="FUNCTION"
>sort()</B
></A
>.
   </P
></DIV
><?php manualFooter('arsort');?>