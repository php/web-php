<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.msql.php3', 'mSQL Functions'),
  'next' => array('function.msql-close.php3', 'msql_close'),
  'up'   => array('ref.msql.php3', 'mSQL Functions'),
  'toc'  => array(
    array('ref.msql.php3#I(REF.MSQL)C(1,TITLE)', ''),
    array('function.msql.php3', 'msql'),
    array('function.msql-close.php3', 'msql_close'),
    array('function.msql-connect.php3', 'msql_connect'),
    array('function.msql-create-db.php3', 'msql_create_db'),
    array('function.msql-createdb.php3', 'msql_createdb'),
    array('function.msql-data-seek.php3', 'msql_data_seek'),
    array('function.msql-dbname.php3', 'msql_dbname'),
    array('function.msql-drop-db.php3', 'msql_drop_db'),
    array('function.msql-fetch-array.php3', 'msql_fetch_array'),
    array('function.msql-fetch-field.php3', 'msql_fetch_field'),
    array('function.msql-fetch-object.php3', 'msql_fetch_object'),
    array('function.msql-fetch-row.php3', 'msql_fetch_row'),
    array('function.msql-field-name.php3', 'msql_fieldname'),
    array('function.msql-field-seek.php3', 'msql_field_seek'),
    array('function.msql-field-table.php3', 'msql_fieldtable'),
    array('function.msql-field-type.php3', 'msql_fieldtype'),
    array('function.msql-fieldflags.php3', 'msql_fieldflags'),
    array('function.msql-fieldlen.php3', 'msql_fieldlen'),
    array('function.msql-freeresult.php3', 'msql_freeresult'),
    array('function.msql-list-fields.php3', 'msql_list_fields'),
    array('function.msql-listdbs.php3', 'msql_listdbs'),
    array('function.msql-listtables.php3', 'msql_listtables'),
    array('function.msql-num-fields.php3', 'msql_num_fields'),
    array('function.msql-num-rows.php3', 'msql_num_rows'),
    array('function.msql-numfields.php3', 'msql_numfields'),
    array('function.msql-numrows.php3', 'msql_numrows'),
    array('function.msql-pconnect.php3', 'msql_pconnect'),
    array('function.msql-query.php3', 'msql_query'),
    array('function.msql-result.php3', 'msql_result'),
    array('function.msql-select-db.php3', 'msql_select_db'),
    array('function.msql-tablename.php3', 'msql_tablename'))));
manualHeader('msql');
?><H1
>msql</H1
><P
>msql -- send mSQL query</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int msql(string database, string query, int link_identifier);<P
>     Returns a positive mSQL result identifier to the query result,
     or false on error.
    </P
><P
>  
  msql() selects a database and executes a query on it.
  If the optional link identifier isn't specified, the function
  will try to find an open link to the mSQL server and if no
  such link is found it'll try to create one as if msql_connect()
  was called with no arguments (see <A
HREF="function.msql-connect.php3"
>msql_connect</A
>).</P
></DIV
><?php manualFooter('msql');?>