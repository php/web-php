<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.msql-query.php3', 'msql_query'),
  'next' => array('function.msql-select-db.php3', 'msql_select_db'),
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
manualHeader('msql_result');
?><H1
>msql_result</H1
><P
>msql_result -- get result data</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int msql_result(int result, int i, mixed field);<P
>     Returns the contents of the cell at the row and offset in the specified
     mSQL result set.
    </P
><P
>  
  msql_result() returns the contents of one cell from a mSQL
  result set.  The field argument can be the field's offset,
  or the field's name, or the field's table dot field's name
  (fieldname.tablename).
  If the column name has been aliased ('select foo as bar from...'),
  use the alias instead of the column name.
    </P
><P
>  
  When working on large result sets, you should consider using
  one of the functions that fetch an entire row (specified below).
  As these functions return the contents of multiple cells in
  one function call, they're MUCH quicker than msql_result().
  Also, note that specifying a numeric offset for the field argument
  is much quicker than specifying a fieldname or tablename.fieldname
  argument.
    </P
><P
>  
  Recommended high-performance alternatives:
  <A
HREF="function.msql-fetch-row.php3"
>msql_fetch_row</A
>, <A
HREF="function.msql-fetch-array.php3"
>msql_fetch_array</A
>,
  <A
HREF="function.msql-fetch-object.php3"
>msql_fetch_object</A
></P
></DIV
><?php manualFooter('msql_result');?>