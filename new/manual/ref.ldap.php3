<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.phpversion.php3', 'phpversion'),
  'next' => array('function.ldap-add.php3', 'ldap_add'),
  'up'   => array('funcref.php3', 'Function Reference'),
  'toc'  => array(
    array('funcref.php3#I(FUNCREF)C(1,TITLE)', ''),
    array('ref.adabas.php3', 'Adabas D Functions'),
    array('ref.array.php3', 'Array Functions'),
    array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
    array('ref.datetime.php3', 'Date/Time Functions'),
    array('ref.dir.php3', 'Directory Functions'),
    array('ref.filesystem.php3', 'Filesystem Functions'),
    array('ref.image.php3', 'Image functions'),
    array('ref.info.php3', 'PHP options & information'),
    array('ref.ldap.php3', 'LDAP Functions'),
    array('ref.math.php3', 'Mathematical Functions'),
    array('ref.msql.php3', 'mSQL Functions'),
    array('ref.mysql.php3', 'MySQL Functions'),
    array('ref.network.php3', 'Network Functions'),
    array('ref.odbc.php3', 'ODBC Functions'),
    array('ref.oracle.php3', 'Oracle functions'),
    array('ref.pgsql.php3', 'PostgreSQL functions'),
    array('ref.regex.php3', 'Regular expression functions'),
    array('ref.strings.php3', 'String functions'),
    array('ref.url.php3', 'URL functions'),
    array('ref.var.php3', 'Variable functions'))));
manualHeader('LDAP Functions');
?><H1
><A
NAME="REF.LDAP"
>LDAP Functions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.ldap-add.php3"
>ldap_add</A
></DT
><DT
><A
HREF="function.ldap-bind.php3"
>ldap_bind</A
></DT
><DT
><A
HREF="function.ldap-close.php3"
>ldap_close</A
></DT
><DT
><A
HREF="function.ldap-connect.php3"
>ldap_connect</A
></DT
><DT
><A
HREF="function.ldap-count-entries.php3"
>ldap_count_entries</A
></DT
><DT
><A
HREF="function.ldap-delete.php3"
>ldap_delete</A
></DT
><DT
><A
HREF="function.ldap-first-attribute.php3"
>ldap_first_attribute</A
></DT
><DT
><A
HREF="function.ldap-first-entry.php3"
>ldap_first_entry</A
></DT
><DT
><A
HREF="function.ldap-free-entry.php3"
>ldap_free_entry</A
></DT
><DT
><A
HREF="function.ldap-free-result.php3"
>ldap_free_result</A
></DT
><DT
><A
HREF="function.ldap-get-attributes.php3"
>ldap_get_attributes</A
></DT
><DT
><A
HREF="function.ldap-get-dn.php3"
>ldap_get_dn</A
></DT
><DT
><A
HREF="function.ldap-get-entries.php3"
>ldap_get_entries</A
></DT
><DT
><A
HREF="function.ldap-get-values.php3"
>ldap_get_values</A
></DT
><DT
><A
HREF="function.ldap-list.php3"
>ldap_list</A
></DT
><DT
><A
HREF="function.ldap-modify.php3"
>ldap_modify</A
></DT
><DT
><A
HREF="function.ldap-next-attribute.php3"
>ldap_next_attribute</A
></DT
><DT
><A
HREF="function.ldap-next-entry.php3"
>ldap_next_entry</A
></DT
><DT
><A
HREF="function.ldap-read.php3"
>ldap_read</A
></DT
><DT
><A
HREF="function.ldap-search.php3"
>ldap_search</A
></DT
><DT
><A
HREF="function.ldap-unbind.php3"
>ldap_unbind</A
></DT
></DL
><?php manualFooter('LDAP Functions');?>