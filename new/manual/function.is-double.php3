<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.is-string.php3', 'is_string'),
  'next' => array('function.settype.php3', 'settype'),
  'up'   => array('ref.var.php3', 'Variable functions'),
  'toc'  => array(
    array('ref.var.php3#I(REF.VAR)C(1,TITLE)', ''),
    array('function.gettype.php3', 'gettype'),
    array('function.is-array.php3', 'is_array'),
    array('function.is-object.php3', 'is_object'),
    array('function.is-long.php3', 'is_long'),
    array('function.is-string.php3', 'is_string'),
    array('function.is-double.php3', 'is_double'),
    array('function.settype.php3', 'settype'))));
manualHeader('is_double');
?><H1
>is_double</H1
><P
>is_double -- Finds whether a variable is a double.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int is_double(mixed var);<P
>     Returns true if <TT
CLASS="PARAMETER"
><I
>var</I
></TT
> is a double,
     false otherwise.

    </P
><P
>     See also <A
HREF="function.is-array.php3"
>is_array</A
>,
     <A
HREF="function.is-string.php3"
>is_string</A
>,
     <A
HREF="function.is-long.php3"
>is_long</A
>, and
     <A
HREF="function.is-object.php3"
>is_object</A
>.
    
   </P
></DIV
><?php manualFooter('is_double');?>