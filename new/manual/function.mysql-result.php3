<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.mysql-query.php3', 'mysql_query'),
  'next' => array('function.mysql-select-db.php3', 'mysql_select_db'),
  'up'   => array('ref.mysql.php3', 'MySQL Functions'),
  'toc'  => array(
    array('ref.mysql.php3#I(REF.MYSQL)C(1,TITLE)', ''),
    array('function.mysql-db-query.php3', 'mysql_db_query'),
    array('function.mysql-affected-rows.php3', 'mysql_affected_rows'),
    array('function.mysql-close.php3', 'mysql_close'),
    array('function.mysql-connect.php3', 'mysql_connect'),
    array('function.mysql-create-db.php3', 'mysql_create_db'),
    array('function.mysql-createdb.php3', 'mysql_createdb'),
    array('function.mysql-data-seek.php3', 'mysql_data_seek'),
    array('function.mysql-dbname.php3', 'mysql_dbname'),
    array('function.mysql-drop-db.php3', 'mysql_drop_db'),
    array('function.mysql-fetch-array.php3', 'mysql_fetch_array'),
    array('function.mysql-fetch-field.php3', 'mysql_fetch_field'),
    array('function.mysql-fetch-lengths.php3', 'mysql_fetch_lengths'),
    array('function.mysql-fetch-object.php3', 'mysql_fetch_object'),
    array('function.mysql-fetch-row.php3', 'mysql_fetch_row'),
    array('function.mysql-field-name.php3', 'mysql_field_name'),
    array('function.mysql-field-seek.php3', 'mysql_field_seek'),
    array('function.mysql-field-table.php3', 'mysql_field_table'),
    array('function.mysql-field-type.php3', 'mysql_field_type'),
    array('function.mysql-fieldflags.php3', 'mysql_fieldflags'),
    array('function.mysql-fieldlen.php3', 'mysql_fieldlen'),
    array('function.mysql-freeresult.php3', 'mysql_freeresult'),
    array('function.mysql-insert-id.php3', 'mysql_insert_id'),
    array('function.mysql-list-fields.php3', 'mysql_list_fields'),
    array('function.mysql-listdbs.php3', 'mysql_listdbs'),
    array('function.mysql-listtables.php3', 'mysql_listtables'),
    array('function.mysql-num-fields.php3', 'mysql_num_fields'),
    array('function.mysql-num-rows.php3', 'mysql_num_rows'),
    array('function.mysql-numfields.php3', 'mysql_numfields'),
    array('function.mysql-numrows.php3', 'mysql_numrows'),
    array('function.mysql-pconnect.php3', 'mysql_pconnect'),
    array('function.mysql-query.php3', 'mysql_query'),
    array('function.mysql-result.php3', 'mysql_result'),
    array('function.mysql-select-db.php3', 'mysql_select_db'),
    array('function.mysql-tablename.php3', 'mysql_tablename'))));
manualHeader('mysql_result');
?><H1
>mysql_result</H1
><P
>mysql_result -- get result data</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int mysql_result(int result, int i, mixed field);<P
>Returns:     The contents of the cell at the row and offset in the specified
    MySQL result set.
  
  
  mysql_result() returns the contents of one cell from a MySQL
  result set.  The field argument can be the field's offset,
  or the field's name, or the field's table dot field's name
  (fieldname.tablename).
  If the column name has been aliased ('select foo as bar from...'),
  use the alias instead of the column name.
  
  When working on large result sets, you should consider using
  one of the functions that fetch an entire row (specified below).
  As these functions return the contents of multiple cells in
  one function call, they're MUCH quicker than mysql_result().
  Also, note that specifying a numeric offset for the field argument
  is much quicker than specifying a fieldname or tablename.fieldname
  argument.
  
  Recommended high-performance alternatives:
  <A
HREF="function.mysql-fetch-row.php3"
>mysql_fetch_row</A
>, <A
HREF="function.mysql-fetch-array.php3"
>mysql_fetch_array</A
>,
  <A
HREF="function.mysql-fetch-object.php3"
>mysql_fetch_object</A
></P
></DIV
><?php manualFooter('mysql_result');?>