<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.mysql-fetch-array.php3', 'mysql_fetch_array'),
  'next' => array('function.mysql-fetch-lengths.php3', 'mysql_fetch_lengths'),
  'up'   => array('ref.mysql.php3', 'MySQL Functions'),
  'toc'  => array(
    array('ref.mysql.php3#I(REF.MYSQL)C(1,TITLE)', ''),
    array('function.mysql.php3', 'mysql'),
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
manualHeader('mysql_fetch_field');
?><H1
>mysql_fetch_field</H1
><P
>mysql_fetch_field -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>object mysql_fetch_field(int result, int field_offset);<P
>     Returns an object containing field information.
  
    </P
><P
>     mysql_fetch_field() can be used in order to obtain information about
     fields in a certain query result.  If the field offset isn't
     specified, the next field that wasn't yet retreived by
     mysql_fetch_field() is retreived.

    </P
><P
>     The properties of the object are:

     <P
></P
><UL
><LI
><P
>	name - column name
       </P
></LI
><LI
><P
>	table - name of the table the column belongs to
       </P
></LI
><LI
><P
>	max_length - maximum length of the column
       </P
></LI
><LI
><P
>	not_null - 1 if the column cannot be null
       </P
></LI
><LI
><P
>	primary_key - 1 if the column is a primary key
       </P
></LI
><LI
><P
>	unique_key - 1 if the column is a unique key
       </P
></LI
><LI
><P
>	multiple_key - 1 if the column is a non-unique key
       </P
></LI
><LI
><P
>	numeric - 1 if the column is numeric
       </P
></LI
><LI
><P
>	blob - 1 it the column is a BLOB
       </P
></LI
><LI
><P
>	type - the type of the column
       </P
></LI
><LI
><P
>	unsigned - 1 if the column is unsigned
       </P
></LI
><LI
><P
>	zerofill - 1 if the column is zero-filled
       </P
></LI
></UL
>

    </P
><P
>     See also <A
HREF="function.mysql-field-seek.php3"
>mysql_field_seek</A
>

   </P
></DIV
><?php manualFooter('mysql_fetch_field');?>