<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.regex.php3', 'Regular expression functions'),
  'next' => array('function.ereg-replace.php3', 'ereg_replace'),
  'up'   => array('ref.regex.php3', 'Regular expression functions'),
  'toc'  => array(
    array('ref.regex.php3#I(REF.REGEX)C(1,TITLE)', ''),
    array('function.ereg.php3', 'ereg'),
    array('function.ereg-replace.php3', 'ereg_replace'),
    array('function.eregi.php3', 'eregi'),
    array('function.eregi-replace.php3', 'eregi_replace'),
    array('function.split.php3', 'split'),
    array('function.sql-regcase.php3', 'sql_regcase'))));
manualHeader('ereg');
?><H1
>ereg</H1
><P
>ereg -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ereg(string pattern, string string, array regs);<P
>     Searchs string for matches to the regular expression
     given in pattern. If matches are found for
     parenthesized substrings of pattern and the function is
     called with the third argument regs, the matches
     will be stored in the elements of regs.

    </P
><P
>     Searching is case sensitive.

    </P
><P
>     Returns true if a match for pattern was found in string, or false
     if no matches were found or an error occurred.
    
    </P
><P
>     The following code snippet takes a date in ISO format (YYYY-MM-DD)
     and prints it in DD.MM.YYYY format:
     <DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. ereg() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>if ( ereg( "([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date, $regs ) ) {
    echo "$regs[3].$regs[2].$regs[1]";
} else {
    echo "Invalid date format: $date";
}</PRE
></DIV
>

    </P
><P
>     See also <A
HREF="function.eregi.php3"
>eregi</A
>, <A
HREF="function.ereg-replace.php3"
>ereg_replace</A
>, and <A
HREF="function.eregi-replace.php3"
>eregi_replace</A
>.

   </P
></DIV
><?php manualFooter('ereg');?>