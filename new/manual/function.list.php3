<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.key.php3', 'key'),
  'next' => array('function.next.php3', 'next'),
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
manualHeader('list');
?><H1
>list</H1
><P
>list --      assign variables as if they were an array
    </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void list(...);<P
>     Like <A
HREF="function.array.php3"
><B
CLASS="FUNCTION"
>array()</B
></A
>, this is not really a function,
     but a language construct.  <B
CLASS="FUNCTION"
>list()</B
> is used to
     assigning a list of variables in one operation.

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
>list()</B
> example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;table&#62;
 &#60;tr&#62;
  &#60;th&#62;Employee name&#60;/th&#62;
  &#60;th&#62;Salary&#60;/th&#62;
 &#60;/tr&#62;
&#60;?php

$result = mysql($conn, "SELECT id, name, salary FROM employees");
while (list($id, $name, $salary) = mysql_fetch_row($result)) {
    print(" &#60;tr&#62;\n".
          "  &#60;td&#62;&#60;a href=\"info.php3?id=$id\"&#62;$name&#60;/a&#62;&#60;/td&#62;\n".
          "  &#60;td&#62;$salary&#60;/td&#62;\n".
          " &#60;/tr&#62;\n");
}

?&#62;&#60;/table&#62;</PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See also:
     <A
HREF="function.array.php3"
><B
CLASS="FUNCTION"
>array()</B
></A
>.
   </P
></DIV
><?php manualFooter('list');?>