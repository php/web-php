<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-close.php3', 'ldap_close'),
  'next' => array('function.ldap-count-entries.php3', 'ldap_count_entries'),
  'up'   => array('ref.ldap.php3', 'LDAP Functions'),
  'toc'  => array(
    array('ref.ldap.php3#I(REF.LDAP)C(1,TITLE)', ''),
    array('function.ldap-add.php3', 'ldap_add'),
    array('function.ldap-bind.php3', 'ldap_bind'),
    array('function.ldap-close.php3', 'ldap_close'),
    array('function.ldap-connect.php3', 'ldap_connect'),
    array('function.ldap-count-entries.php3', 'ldap_count_entries'),
    array('function.ldap-delete.php3', 'ldap_delete'),
    array('function.ldap-first-attribute.php3', 'ldap_first_attribute'),
    array('function.ldap-first-entry.php3', 'ldap_first_entry'),
    array('function.ldap-free-entry.php3', 'ldap_free_entry'),
    array('function.ldap-free-result.php3', 'ldap_free_result'),
    array('function.ldap-get-attributes.php3', 'ldap_get_attributes'),
    array('function.ldap-get-dn.php3', 'ldap_get_dn'),
    array('function.ldap-get-entries.php3', 'ldap_get_entries'),
    array('function.ldap-get-values.php3', 'ldap_get_values'),
    array('function.ldap-list.php3', 'ldap_list'),
    array('function.ldap-modify.php3', 'ldap_modify'),
    array('function.ldap-next-attribute.php3', 'ldap_next_attribute'),
    array('function.ldap-next-entry.php3', 'ldap_next_entry'),
    array('function.ldap-read.php3', 'ldap_read'),
    array('function.ldap-search.php3', 'ldap_search'),
    array('function.ldap-unbind.php3', 'ldap_unbind'))));
manualHeader('ldap_connect');
?><H1
>ldap_connect</H1
><P
>ldap_connect -- COnnect to an LDAP server</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_connect(string hostname, int port);<P
>    Returns a positive LDAP link identifier on success, or false on error.
    </P
><P
>  
    ldap_connect() establishes a connection to a LDAP server on a specified 
    <TT
CLASS="PARAMETER"
><I
>hostname</I
></TT
> and <TT
CLASS="PARAMETER"
><I
>port</I
></TT
>. 
    Both the arguments are optional. If no arguments are 
    specified then the link identifier of the already opened link will be
    returned. If only <TT
CLASS="PARAMETER"
><I
>hostname</I
></TT
> is specified, then the 
    port defaults to 389.
   </P
></DIV
><?php manualFooter('ldap_connect');?>