<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ldap-free-result.php3', 'ldap_free_result'),
  'next' => array('function.ldap-get-dn.php3', 'ldap_get_dn'),
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
manualHeader('ldap_get_attributes');
?><H1
>ldap_get_attributes</H1
><P
>ldap_get_attributes -- Get attributes from a search result entry</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ldap_get_attributes(int link_identifier, int result_entry_identifier);<P
>    Returns a comlete entry information in a multi-dimensional array on success
    and false on error.
    </P
><P
>  
    ldap_get_attributes() function is used to simplify reading the attributes 
    and values from an entry in the search result. The return value is a 
    multi-dimensional array of attributes and values.
	</P
><P
>	<DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><P
CLASS="LITERALLAYOUT"
>&nbsp;&nbsp;&nbsp;&nbsp;return_value["count"]&nbsp;=&nbsp;number&nbsp;of&nbsp;attributes&nbsp;in&nbsp;the&nbsp;entry<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value[0]&nbsp;=&nbsp;first&nbsp;attribute<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value[n]&nbsp;=&nbsp;nth&nbsp;attribute<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value["attribute"]["count"]&nbsp;=&nbsp;number&nbsp;of&nbsp;values&nbsp;for&nbsp;attribute<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value["attribute"][0]&nbsp;=&nbsp;first&nbsp;value&nbsp;of&nbsp;the&nbsp;attribute<br>
&nbsp;&nbsp;&nbsp;&nbsp;return_value["attribute"][i]&nbsp;=&nbsp;ith&nbsp;value&nbsp;of&nbsp;the&nbsp;attribute</P
></DIV
>

	see also <A
HREF="function.ldap-first-attribute.php3"
><B
CLASS="FUNCTION"
>ldap_first_attribute()</B
></A
> and 
	<A
HREF="function.ldap-next-attribute.php3"
><B
CLASS="FUNCTION"
>ldap_next_attribute()</B
></A
>
   </P
></DIV
><?php manualFooter('ldap_get_attributes');?>