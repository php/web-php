<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.htmlspecialchars.php3', 'htmlspecialchars'),
  'next' => array('ref.image.php3', 'Image functions'),
  'up'   => array('ref.html.php3', 'HTML functions'),
  'toc'  => array(
    array('ref.html.php3#I(REF.HTML)C(1,TITLE)', ''),
    array('function.htmlspecialchars.php3', 'htmlspecialchars'),
    array('function.htmlentities.php3', 'htmlentities'))));
manualHeader('htmlentities');
?><H1
>htmlentities</H1
><P
>htmlentities -- Convert all applicable characters to HTML entities.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string htmlentities(string string);<P
>     This function is identical to <A
HREF="function.htmlspecialchars.php3"
>htmlspecialchars</A
> in
     all ways, except that all characters which have HTML entity
     equivalents are translated into these entities. 

    </P
><P
>     At present, the ISO-8859-1 character set is used.

    </P
><P
>     See also <A
HREF="function.htmlspecialchars.php3"
>htmlspecialchars</A
>.

   </P
></DIV
><?php manualFooter('htmlentities');?>