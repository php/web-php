<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('installation02.php3', 'Problems?'),
  'next' => array('configuration.php3', 'Configuration'),
  'up'   => array('installation.php3', 'Installation'),
  'toc'  => array(
    array('installation.php3#I(INSTALLATION)C(1,TITLE)', ''),
    array('installation.php3#I(INSTALLATION)C(1,ABSTRACT)', ''),
    array('installation01.php3', 'Installing From Source on UNIX'),
    array('installation02.php3', 'Problems?'),
    array('installation03.php3', 'Security'))));
manualHeader('Security');
?><H1
><A
NAME="I(INSTALLATION)C(3,SECT1)"
>Security</A
></H1
><P
>    PHP is a powerful tool.  As with many other powerful tools, it is
    possible to shoot yourself in the foot with it.  PHP has
    functionality that, if carelessly used, may cause security
    problems on your system.  The best way of preventing this is to
    always know what you are doing.  Read the <A
HREF="preface.php3#SECURITY"
>Security chapter</A
> for more information.
    
 </P
><?php manualFooter('Security');?>