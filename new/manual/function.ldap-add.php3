<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.ldap.php3', 'LDAP Functions'),
  'next' => array('function.ldap-bind.php3', 'ldap_bind'),
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
manualHeader('ldap_add');
?><H1
>ldap_add</H1
><P
>ldap_add -- Add entries to LDAP directory</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_add(int link_identifier, string dn, array entry);<P
>    returns true on success and false on error.
    </P
><P
>  
    ldap_add() function is used to add entries in the LDAP directory. The DN 
    of the entry to be added is specified by dn. Array entry specifies the
    information about the entry. The values in the entries are indexed by
    individual attributes. In case of multiple values for an attribute, they
    are indexed using integers starting with 0.
	</P
><P
>	<PRE
CLASS="PROGRAMLISTING"
>		entry["attribute1"] = value
		
		entry["attribute2"][0] = value1
		entry["attribute2"][1] = value2
	</PRE
>
   </P
></DIV
><?php manualFooter('ldap_add');?>