<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.arsort.php3', 'arsort'),
  'next' => array('function.count.php3', 'count'),
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
manualHeader('asort');
?><H1
>asort</H1
><P
>asort -- Sort an array and maintain index association</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void asort(array array);<P
>     This function sorts an array such that array indices maintain their 
     correlation with the array elements they are associated with.  This is
     used mainly when sorting associative arrays where the actual element
     order is significant.  
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
>asort()</B
> example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fruits = array("d"=&#62;"lemon","a"=&#62;"orange","b"=&#62;"banana","c"=&#62;"apple");
asort($fruits);
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
>fruits[c] = apple
fruits[b] = banana
fruits[d] = lemon
fruits[a] = orange</TT
>
     The fruits have been sorted in alphabetical order, and the index
     associated with each element has been maintained.
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
><?php manualFooter('asort');?>