<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-modify.php3', 'ldap_modify'),
  'next' => array('function.ldap-next-entry.php3', 'ldap_next_entry'),
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
manualHeader('ldap_next_attribute');
?><H1
>ldap_next_attribute</H1
><P
>ldap_next_attribute -- Get the next attribute in result</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_next_attribute(int link_identifier, int result_entry_identifier, int ber_identifier);<P
>    Returns the next attribute in an entry on success and false on error.
    </P
><P
>  
    ldap_next_attribute() is called to retrieve the attributes in an entry.
    The internal state of the pointer is maintained by the <TT
CLASS="PARAMETER"
><I
>ber_identifier</I
></TT
>. 
	It is passed by reference to the function. The first call to
	ldap_next_attribute() is made with the <TT
CLASS="PARAMETER"
><I
>result_entry_identifier</I
></TT
> returned
	from <A
HREF="function.ldap-first-attribute.php3"
><B
CLASS="FUNCTION"
>ldap_first_attribute()</B
></A
>.
	</P
><P
>	see also <A
HREF="function.ldap-get-attributes.php3"
><B
CLASS="FUNCTION"
>ldap_get_attributes()</B
></A
>
   </P
></DIV
><?php manualFooter('ldap_next_attribute');?>