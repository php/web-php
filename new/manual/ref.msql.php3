<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.tan.php3', 'Tan'),
  'next' => array('function.msql.php3', 'msql'),
  'up'   => array('funcref.php3', 'Function Reference'),
  'toc'  => array(
    array('funcref.php3#I(FUNCREF)C(1,TITLE)', ''),
    array('ref.adabas.php3', 'Adabas D Functions'),
    array('ref.array.php3', 'Array Functions'),
    array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
    array('ref.datetime.php3', 'Date/Time Functions'),
    array('ref.dir.php3', 'Directory Functions'),
    array('ref.filesystem.php3', 'Filesystem Functions'),
    array('ref.html.php3', 'HTML functions'),
    array('ref.image.php3', 'Image functions'),
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
    array('ref.url.php3', 'URL functions'))));
manualHeader('mSQL Functions');
?><H1
><A
NAME="REF.MSQL"
>mSQL Functions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.msql.php3"
>msql</A
></DT
><DT
><A
HREF="function.msql-close.php3"
>msql_close</A
></DT
><DT
><A
HREF="function.msql-connect.php3"
>msql_connect</A
></DT
><DT
><A
HREF="function.msql-create-db.php3"
>msql_create_db</A
></DT
><DT
><A
HREF="function.msql-createdb.php3"
>msql_createdb</A
></DT
><DT
><A
HREF="function.msql-data-seek.php3"
>msql_data_seek</A
></DT
><DT
><A
HREF="function.msql-dbname.php3"
>msql_dbname</A
></DT
><DT
><A
HREF="function.msql-drop-db.php3"
>msql_drop_db</A
></DT
><DT
><A
HREF="function.msql-fetch-array.php3"
>msql_fetch_array</A
></DT
><DT
><A
HREF="function.msql-fetch-field.php3"
>msql_fetch_field</A
></DT
><DT
><A
HREF="function.msql-fetch-object.php3"
>msql_fetch_object</A
></DT
><DT
><A
HREF="function.msql-fetch-row.php3"
>msql_fetch_row</A
></DT
><DT
><A
HREF="function.msql-field-name.php3"
>msql_fieldname</A
></DT
><DT
><A
HREF="function.msql-field-seek.php3"
>msql_field_seek</A
></DT
><DT
><A
HREF="function.msql-field-table.php3"
>msql_fieldtable</A
></DT
><DT
><A
HREF="function.msql-field-type.php3"
>msql_fieldtype</A
></DT
><DT
><A
HREF="function.msql-fieldflags.php3"
>msql_fieldflags</A
></DT
><DT
><A
HREF="function.msql-fieldlen.php3"
>msql_fieldlen</A
></DT
><DT
><A
HREF="function.msql-freeresult.php3"
>msql_freeresult</A
></DT
><DT
><A
HREF="function.msql-list-fields.php3"
>msql_list_fields</A
></DT
><DT
><A
HREF="function.msql-listdbs.php3"
>msql_listdbs</A
></DT
><DT
><A
HREF="function.msql-listtables.php3"
>msql_listtables</A
></DT
><DT
><A
HREF="function.msql-num-fields.php3"
>msql_num_fields</A
></DT
><DT
><A
HREF="function.msql-num-rows.php3"
>msql_num_rows</A
></DT
><DT
><A
HREF="function.msql-numfields.php3"
>msql_numfields</A
></DT
><DT
><A
HREF="function.msql-numrows.php3"
>msql_numrows</A
></DT
><DT
><A
HREF="function.msql-pconnect.php3"
>msql_pconnect</A
></DT
><DT
><A
HREF="function.msql-query.php3"
>msql_query</A
></DT
><DT
><A
HREF="function.msql-result.php3"
>msql_result</A
></DT
><DT
><A
HREF="function.msql-select-db.php3"
>msql_select_db</A
></DT
><DT
><A
HREF="function.msql-tablename.php3"
>msql_tablename</A
></DT
></DL
><?php manualFooter('mSQL Functions');?>