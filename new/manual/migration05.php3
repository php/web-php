<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration04.php3', 'while syntax'),
  'next' => array('migration06.php3', 'Error messages have changed'),
  'up'   => array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
  'toc'  => array(
    array('migration.php3#I(MIGRATION)C(1,TITLE)', ''),
    array('migration.php3#I(MIGRATION)C(1,SECT1)', 'About the incompatbilities in 3.0'),
    array('migration02.php3', 'Start/end tags'),
    array('migration03.php3', 'if..endif syntax'),
    array('migration04.php3', 'while syntax'),
    array('migration05.php3', 'Expression types'),
    array('migration06.php3', 'Error messages have changed'),
    array('migration07.php3', 'Short-circuited boolean evaluation'),
    array('migration08.php3', 'Function true/false return values'),
    array('migration09.php3', 'Other incompatibilities'))));
manualHeader('Expression types');
?><H1
><A
NAME="I(MIGRATION)C(5,SECT1)"
>Expression types</A
></H1
><P
>   PHP/FI 2.0 used the left side of expressions to determine what type
   the result should be.  PHP 3.0 takes both sides into account when
   determining result types, and this may cause 2.0 scripts to behave
   unexpectedly in 3.0.
  </P
><P
>&#13;  </P
><P
>   Consider this example:
   <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>$a[0]=5;
$a[1]=7;

$key = key($a);
while ("" != $key) {
    echo "$keyn";
    next($a);
}</PRE
></DIV
>

   In PHP/FI 2.0, this would display both of $a's indices.  In PHP
   3.0, it wouldn't display anything.  The reason is that in PHP 2.0,
   because the left argument's type was string, a string comparison
   was made, and indeed <TT
CLASS="LITERAL"
>""</TT
> does not equal
   <TT
CLASS="LITERAL"
>"0"</TT
>, and the loop went through.  In PHP 3.0,
   when a string is compared with an integer, an integer comparison is
   made (the string is converted to an integer).  This results in
   comparing <TT
CLASS="LITERAL"
>atoi("")</TT
> which is
   <TT
CLASS="LITERAL"
>0</TT
>, and <TT
CLASS="LITERAL"
>variablelist</TT
> which is
   also <TT
CLASS="LITERAL"
>0</TT
>, and since <TT
CLASS="LITERAL"
>0==0</TT
>, the
   loop doesn't go through even once.

  </P
><P
>   The fix for this is simple.  Replace the while statement with:
   <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>while ((string)$key != "") {</PRE
></DIV
>


 </P
><?php manualFooter('Expression types');?>