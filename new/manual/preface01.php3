<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('preface.php3', 'Preface'),
  'next' => array('langref.php3', 'Language Reference'),
  'up'   => array('preface.php3', 'Preface'),
  'toc'  => array(
    array('preface.php3#I(PREFACE)C(1,TITLE)', ''),
    array('preface.php3#I(PREFACE)C(1,ABSTRACT)', ''),
    array('preface01.php3', 'About this Manual'))));
manualHeader('About this Manual');
?><H1
><A
NAME="ABOUT"
>About this Manual</A
></H1
><P
>    This manual is written in SGML using the <A
HREF="http://www.ora.com/davenport/"
>DocBook DTD</A
>, using <A
HREF="http://www.jclark.com/dsssl/"
>DSSSL</A
> (Document
     Style and Semantics Specification Language) for formatting.  The
     tools used for formatting HTML,
     TeX and RTF versions are
     <A
HREF="http://www.jclark.com/jade/"
>Jade</A
>, written by <A
HREF="http://www.jclark.com/bio.htm"
>James Clark</A
> and <A
HREF="http://www.berkshire.net/~norm/docbook/dsssl/"
>The Modular DocBook Stylesheets</A
>
     written by <A
HREF="http://www.berkshire.net/~norm/"
>Norman Walsh</A
>.
     PHP3's documentation framework was assembled by <A
HREF="mailto:stig@php.net"
>Stig Sæther Bakken</A
>.
   </P
><?php manualFooter('About this Manual');?>