<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-get-entries.php3', 'ldap_get_entries'),
  'next' => array('function.ldap-list.php3', 'ldap_list'),
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
manualHeader('ldap_get_values');
?><H1
>ldap_get_values</H1
><P
>ldap_get_values -- Get all value from a result entry</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_get_values(int link_identifier, int result_entry_identifier, string attribute);<P
>    Returns an array of values for the attribute on success and false on error.
    </P
><P
>  
    ldap_get_values() function is used to read all the values of 
    the attribute in the entry in the result. entry is specified by the 
    <TT
CLASS="PARAMETER"
><I
>result_entry_identifier</I
></TT
>. The number of values can 
	be found by indexing "count" in the resultant array. Individual values are 
	accessed by integer index in the array.  The first index is 0.
   	</P
><P
> 
	<DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><P
CLASS="LITERALLAYOUT"
>&nbsp;&nbsp;&nbsp;&nbsp;return_value["count"]&nbsp;=&nbsp;number&nbsp;of&nbsp;values&nbsp;for&nbsp;attribute<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value[0]&nbsp;=&nbsp;first&nbsp;value&nbsp;of&nbsp;attribute<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value[i]&nbsp;=&nbsp;ith&nbsp;value&nbsp;of&nbsp;attribute</P
></DIV
>
   </P
></DIV
><?php manualFooter('ldap_get_values');?>