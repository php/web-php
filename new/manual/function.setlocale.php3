<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rawurlencode.php3', 'rawurlencode'),
  'next' => array('function.sprintf.php3', 'sprintf'),
  'up'   => array('ref.strings.php3', 'String functions'),
  'toc'  => array(
    array('ref.strings.php3#I(REF.STRINGS)C(1,TITLE)', ''),
    array('function.addslashes.php3', 'AddSlashes'),
    array('function.chop.php3', 'Chop'),
    array('function.chr.php3', 'Chr'),
    array('function.echo.php3', 'echo'),
    array('function.explode.php3', 'explode'),
    array('function.flush.php3', 'flush'),
    array('function.implode.php3', 'implode'),
    array('function.ord.php3', 'Ord'),
    array('function.print.php3', 'print'),
    array('function.printf.php3', 'printf'),
    array('function.quotemeta.php3', 'QuoteMeta'),
    array('function.rawurldecode.php3', 'rawurldecode'),
    array('function.rawurlencode.php3', 'rawurlencode'),
    array('function.setlocale.php3', 'setlocale'),
    array('function.sprintf.php3', 'sprintf'),
    array('function.stripslashes.php3', 'StripSlashes'),
    array('function.strlen.php3', 'strlen'),
    array('function.strtok.php3', 'strtok'),
    array('function.strrchr.php3', 'strrchr'),
    array('function.strrev.php3', 'strrev'),
    array('function.strstr.php3', 'strstr'),
    array('function.strtolower.php3', 'strtolower'),
    array('function.strtoupper.php3', 'strtolower'),
    array('function.strtr.php3', 'strtr'),
    array('function.substr.php3', 'substr'),
    array('function.ucfirst.php3', 'ucfirst'))));
manualHeader('setlocale');
?><H1
>setlocale</H1
><P
>setlocale -- set locale information</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string setlocale(string category, string locale);<P
>     category is a string specifying the category of the functions
     affected by the locale setting:
     <P
></P
><UL
><LI
><P
>	LC_ALL for all of the below
       </P
></LI
><LI
><P
>	LC_COLLATE for string comparison - not currently implemented in PHP
       </P
></LI
><LI
><P
>	LC_CTYPE for character classification and conversion, for
	example strtoupper()
       </P
></LI
><LI
><P
>	LC_MONETARY for localeconv() - not currently implemented in PHP
       </P
></LI
><LI
><P
>	LC_NUMERIC for decimal separator
       </P
></LI
><LI
><P
>	LC_TIME for time formats - not currently implemented in PHP
       </P
></LI
></UL
>

    </P
><P
>     If locale is an empty string <TT
CLASS="LITERAL"
>""</TT
>, the locale
     names will be set from the values of environment variables with
     the same names as the above categories, or from "LANG".

    </P
><P
>     If locale is zero or <TT
CLASS="LITERAL"
>"0"</TT
>, the locale setting
     is not affected, only the current setting is returned.

    </P
><P
>     Setlocale returns the new current locale, or false if the locale
     functionality is not implemented in the plattform, the specified
     locale does not exist or the category name is invalid.
     Invalid category name also causes a warning message.

   </P
></DIV
><?php manualFooter('setlocale');?>