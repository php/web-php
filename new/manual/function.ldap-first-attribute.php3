<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-delete.php3', 'ldap_delete'),
  'next' => array('function.ldap-first-entry.php3', 'ldap_first_entry'),
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
manualHeader('ldap_first_attribute');
?><H1
>ldap_first_attribute</H1
><P
>ldap_first_attribute -- Return first attribute</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_first_attribute(int link_identifier, int result_entry_identifier, int ber_identifier);<P
>    returns the first attribute in the entry on success and false on error.
    </P
><P
>  
    Similar to reading entries, attributes are also read one
    by one from a particular entry. <A
HREF="function.ldap-first-attribute.php3"
>	ldap_first_attribute()</A
> returns the
    first attribute in the entry pointed by the entry identifier.  Remaining
    attributes are retrieved by calling <A
HREF="function.ldap-next-attribute.php3"
>	ldap_next_attribute() </A
> successively. 
    ber_identifier is the identifier to internal memory location pointer. It 
    is passed by reference. The same <TT
CLASS="PARAMETER"
><I
>ber_identifier</I
></TT
> is passed to the 
    ldap_next_attribute() function, which modifies that pointer.
	</P
><P
>	see also <A
HREF="function.ldap-get-attributes.php3"
> ldap_get_attributes
	</A
>
   </P
></DIV
><?php manualFooter('ldap_first_attribute');?>