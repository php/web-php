<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.html.php3', 'HTML functions'),
  'next' => array('function.htmlentities.php3', 'htmlentities'),
  'up'   => array('ref.html.php3', 'HTML functions'),
  'toc'  => array(
    array('ref.html.php3#I(REF.HTML)C(1,TITLE)', ''),
    array('function.htmlspecialchars.php3', 'htmlspecialchars'),
    array('function.htmlentities.php3', 'htmlentities'))));
manualHeader('htmlspecialchars');
?><H1
>htmlspecialchars</H1
><P
>htmlspecialchars -- Convert special characters to HTML entities.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string htmlspecialchars(string string);<P
>     Certain characters have special significance in HTML, and should
     be represented by HTML entities if they are to preserve their
     meanings. This function returns a string with all of these
     conversions made.

    </P
><P
>     At present, the translations that are done are:
     <P
></P
><UL
><LI
><P
>        '&#38;' (ampersand) becomes '&#38;amp;'
      </P
></LI
><LI
><P
>        '"' (double quote) becomes '&#38;quot;'
      </P
></LI
><LI
><P
>        '&#60;' (less than) becomes '&#38;lt;'
      </P
></LI
><LI
><P
>        '&#62;' (greater than) becomes '&#38;gt;'
     </P
></LI
></UL
>
 
    </P
><P
>     Note that this functions does not translate anything beyond what
     is listed above. For full entity translation, see <A
HREF="function.htmlentities.php3"
>htmlentities</A
>.

   </P
></DIV
><?php manualFooter('htmlspecialchars');?>