<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('installation.php3', 'Installation'),
  'next' => array('installation03.php3', 'Security'),
  'up'   => array('installation.php3', 'Installation'),
  'toc'  => array(
    array('installation.php3#I(INSTALLATION)C(1,TITLE)', ''),
    array('installation.php3#I(INSTALLATION)C(1,ABSTRACT)', ''),
    array('installation01.php3', 'Installing From Source on UNIX'),
    array('installation02.php3', 'Problems?'),
    array('installation03.php3', 'Security'))));
manualHeader('Problems?');
?><H1
><A
NAME="PROBLEMS"
>Problems?</A
></H1
><H2
><A
NAME="I(PROBLEMS)C(1,SECT2)"
>Read the FAQ</A
></H2
><P
>     Some problems are more common than others.  The most common ones
     are listed in the PHP3 FAQ, found at <A
HREF="http://www.php.net/FAQ.php3"
>http://www.php.net/FAQ.php3</A
>
   </P
><H2
><A
NAME="I(PROBLEMS)C(2,SECT2)"
>Bug reports</A
></H2
><P
>     If you think you have found a bug in PHP3, please report it.  The
     PHP3 developers probably don't know about it, and unless you
     report it, chances are it won't be fixed.  A form for reporting
     bugs is available on the PHP3 network of sites, the main form is
     at <A
HREF="http://www.php.net/bug-form.php3"
>http://www.php.net/bug-form.php3</A
>.
   </P
><H2
><A
NAME="I(PROBLEMS)C(3,SECT2)"
>Other problems</A
></H2
><P
>     If you are still stuck, someone on the PHP3 mailing list may be
     able to help you.  You should check out the archive first, in
     case someone already answered someone else who had the same
     problem as you.  The archive is available at <A
HREF="http://www.tryc.on.ca/php3.html"
>http://www.tryc.on.ca/php3.html</A
>.  To subscribe to the
     PHP3 mailing list, send an empty mail to <A
HREF="mailto:php3-subscribe@lists.php.net"
>php3-subscribe@lists.php.net</A
>.  The mailing list address
     is <TT
CLASS="LITERAL"
>php3@lists.php.net</TT
>.

    </P
><P
>     If you want to get help on the mailing list, please try to be
     precise and give the necessary details about your environment
     (which operating system, what PHP version, what web server, if
     you are running PHP as CGI or a server module, etc.), and
     preferably enough code to make others able to reproduce and test
     your problem.

  </P
><?php manualFooter('Problems?');?>