<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-next-attribute.php3', 'ldap_next_attribute'),
  'next' => array('function.ldap-read.php3', 'ldap_read'),
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
manualHeader('ldap_next_entry');
?><H1
>ldap_next_entry</H1
><P
>ldap_next_entry -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_next_entry(int link_identifier, int result_entry_identifier);<P
>    returns entry identifier for the next entry in the result whose entries
    are being read starting with ldap_first_entry(). If there are no more 
    entries in the result then it returns false.
    </P
><P
>  
    ldap_next_entry() function is used to retrieve the entries stored in 
    the result. Successive calls to the ldap_next_entry() return entries one
    by one till there are no more entries. The first call to ldap_next_entry()
	is made after the call to <A
HREF="function.ldap-first-entry.php3"
>	ldap_first_entry() </A
> with the result_identifier as returned from
	the ldap_first_entry().
	</P
><P
>	see also.<A
HREF="function.ldap-get-entries.php3"
> ldap_get_entries() </A
>
   </P
></DIV
><?php manualFooter('ldap_next_entry');?>