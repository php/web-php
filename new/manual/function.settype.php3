<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.is-double.php3', 'is_double'),
  'next' => array('appendixes.php3', 'Appendixes'),
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
manualHeader('settype');
?><H1
>settype</H1
><P
>settype -- Set the type of a variable.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int settype(string var, string type);<P
>     Set the type of variable <TT
CLASS="PARAMETER"
><I
>var</I
></TT
> to
     <TT
CLASS="PARAMETER"
><I
>type</I
></TT
>. 

    </P
><P
>     Possibles values of <TT
CLASS="PARAMETER"
><I
>type</I
></TT
> are:
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
>"object"
     </P
></LI
></UL
>

    </P
><P
>     Returns true if successful; otherwise returns false.

    </P
><P
>     See also <A
HREF="function.gettype.php3"
>gettype</A
>.

   </P
></DIV
><?php manualFooter('settype');?>