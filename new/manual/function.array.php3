<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.array.php3', 'Array Functions'),
  'next' => array('function.arsort.php3', 'arsort'),
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
manualHeader('array');
?><H1
>array</H1
><P
>array --      Create an array
    </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array array(...);<P
>     Returns an array of the parameters.  The parameters can be given
     an index with the <TT
CLASS="LITERAL"
>=&#62;</TT
> operator.

    </P
><P
>     Note that <B
CLASS="FUNCTION"
>array()</B
> really is a language
     construct used to represent literal arrays, and not a regular
     function.

    </P
><P
>     The following example demonstrates how to create a
     two-dimensional array, how to specify keys for associative
     arrays, and how to skip-and-continue numeric indices in normal
     arrays.

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
>array()</B
> example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fruits = array(
    "fruits"  =&#62; array("a"=&#62;"orange","b"=&#62;"banana","c"=&#62;"apple"),
    "numbers" =&#62; array(1, 2, 3, 4, 5, 6)
    "holes"   =&#62; array("first", 5 =&#62; "second", "third")
);</PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See also:
     <A
HREF="function.list.php3"
><B
CLASS="FUNCTION"
>list()</B
></A
>.
   </P
></DIV
><?php manualFooter('array');?>