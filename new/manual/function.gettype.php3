<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.var.php3', 'Variable functions'),
  'next' => array('function.is-array.php3', 'is_array'),
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
manualHeader('gettype');
?><H1
>gettype</H1
><P
>gettype -- Get the type of a variable.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string gettype(mixed var);<P
>     Returns the type of the PHP variable <TT
CLASS="PARAMETER"
><I
>var</I
></TT
>.

    </P
><P
>     Possibles values for the returned string are:
     <P
></P
><UL
><LI
><P
>"integer"
      </P
></LI
><LI
><P
>"double"
      </P
></LI
><LI
><P
>"string"
      </P
></LI
><LI
><P
>"array"
      </P
></LI
><LI
><P
>"class"
      </P
></LI
><LI
><P
>"object"
      </P
></LI
><LI
><P
>"unknown type"
     </P
></LI
></UL
>

    </P
><P
>     See also <A
HREF="function.settype.php3"
>settype</A
>.

   </P
></DIV
><?php manualFooter('gettype');?>