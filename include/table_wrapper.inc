<?php
#+-------------------------------------+
#| Table Wrapper for SQL Engines       |
#| By Zeev Suraski                     |
#+-------------------------------------+

  function table_wrapper()
  {
    global $fields,$tables;
    
    if (!isset($fields) || count($fields)==0) {
      echo "No fields specified";
      return 0;
    }
    if (!isset($tables) || count($tables)==0) {
      echo "No tables specified";
      return 0;
    }

    global $SERVER_NAME;
    global $PHP_SELF;
    $url = "http://$SERVER_NAME$PHP_SELF?foo=bar";
    
	for (reset(&$fields),$field_list=current(&$fields); next(&$fields); $field_list.=",".current(&$fields));

    for (reset(&$tables),$table_list=current(&$tables); next(&$tables); $table_list.=",".current(&$tables));

    # Generate query...
    
    global $select_options;
    $query = "select $select_options $field_list from $table_list";
    
    global $where_clause;
    if (@$where_clause) {
      $query .= " where $where_clause";
      $url .= "&where_clause=$where_clause";
    }
    
    global $group_by_clause;
    if (isset($group_by_clause)) {
      $query .= " group by $group_by_clause";
      $url .= "&group_by_clause=$group_by_clause";
    }
    
    global $order_by_clause;
    global $last_order_by;
    if (isset($order_by_clause)) {
      $query .= " order by $order_by_clause";
      if (isset($last_order_by) && $last_order_by==$order_by_clause) {
        $query .= " desc";
      } else {
        $last_order_by="last_order_by=$order_by_clause";
      }
    }
    
    global $having_clause;
    if (isset($having_clause)) {
      $query .= " having $having_clause";
      $url .= "&having_clause=$having_clause";
    }

	if (!isset($total_num_rows)) {
#		echo "$query<br>";
		$result = mysql_query($query) or die("SQL query failed:  '$query' - ".mysql_error());
		$total_num_rows = mysql_num_rows($result);
		mysql_free_result($result);
	}
	$url .= "&total_num_rows=$total_num_rows";
	
    if (isset($GLOBALS["limit_start"])) {
      $limit_start = $GLOBALS["limit_start"];
      if (isset($GLOBALS["limit_length"])) {
        $limit_length=$GLOBALS["limit_length"];
      } else {
        $limit_length="";
      }
      if ($limit_start!=-1) {
        $query .= " limit $limit_start";
        if ($limit_length) {
          $query .= ",$limit_length";
        }
      }
    } else {
      $limit_length = $limit_start = "";
    }


# escape URL
    $url = ereg_replace("[ ]","+",$url);

    global $debug;    
    if (isset($debug)) {
      echo "URL:  $url<br>\n";
      echo "Query:  $query<br>\n";
    }

    $result = mysql_query($query) or die("SQL query failed");
    
    if (!$result) {
      echo "Unable to perform query.\n";
      return 0;
    }

	$num_rows = mysql_num_rows($result);
    if ($num_rows==0) {
      return 0;
    }

    $field_count = mysql_num_fields($result);
    
    echo "$num_rows entries";
    if ($total_num_rows>$num_rows) {
      echo " (out of $total_num_rows total)";
    }
    echo ":<br>\n";

    echo "<table align=\"center\" border=\"0\" cellspacing=\"2\" width=\"95%\"><tr>\n";

# print table header
    global $conversion_table,$dont_display,$centering,$default_alignment,$coloring,$header_coloring,$dont_link;
    global $default_color,$default_header_color,$row_coloring_function;
    global $pass_on;
    $i=0;
    while ($field=mysql_fetch_field($result)) {
      $fieldnames[$i] = $field->name;
      $tablenames[$i] = $field->table;
      if (strlen($tablenames[$i])>0 && substr($tablenames[$i],0,3)!="SQL") {
        $fullnames[$i] = $tablenames[$i].".".$fieldnames[$i];
      } else {
        $fullnames[$i] = $fieldnames[$i];
      }
      if (isset($conversion_table[$fullnames[$i]])) {
        $display_fieldname = $conversion_table[$fullnames[$i]];
      } else if (isset($conversion_table[$fieldnames[$i]])) {
        $display_fieldname = $conversion_table[$fieldnames[$i]];
      } else {
        $display_fieldname=$fieldnames[$i];
      }
      if (isset($header_coloring[$fullnames[$i]])) {
        $add_attributes = "bgcolor=\"#".$header_coloring[$fullnames[$i]]."\"";
      } else if (isset($header_coloring[$fieldnames[$i]])) {
        $add_attributes = "bgcolor=\"#".$header_coloring[$fieldnames[$i]]."\"";
      } else if (isset($coloring[$fullnames[$i]])) {
        $add_attributes = "bgcolor=\"#".$coloring[$fullnames[$i]]."\"";
      } else if (isset($coloring[$fieldnames[$i]])) {
        $add_attributes = "bgcolor=\"#".$coloring[$fieldnames[$i]]."\"";
      } else if (isset($default_header_color)) {
        $add_attributes = "bgcolor=\"#".$default_header_color."\"";
      } else if (isset($default_color)) {
        $add_attributes = "bgcolor=\"#".$default_color."\"";
      } else {
        $add_attributes="";
      }
      if (!isset($dont_display[$fullnames[$i]]) && !isset($dont_display[$fieldnames[$i]])) {
        if (isset($dont_link[$fullnames[$i]]) || isset($dont_link[$fieldnames[$i]])) {
          $link=0;
        } else {
          $link=1;
        }
        echo "<th $add_attributes>";
        if ($link) {
          echo "<a href=\"$url$pass_on&order_by_clause=$fullnames[$i]&$last_order_by\">";
        }
		$df = ereg_replace("<", "&lt;", $display_fieldname);
 		$df = ereg_replace(">", "&gt;", $df);
        echo $df;
        if ($link) {
          echo "</a>";
        }
        echo "</th>";
      }
      $i++;
    }
    echo "</tr>\n";

# print table data
    global $external_processing_function;
    while ($row=mysql_fetch_array($result)) {
      if (isset($row_coloring_function)) {
      	print "<tr bgcolor=\"".$row_coloring_function($row)."\">";
      } else {
	    echo "<tr>\n";
	  }
      for ($i=0; $i<$field_count; $i++) {
        if (strlen($row[$i])==0) {
          $row[$i]= " &nbsp; ";
        }
        if (!isset($dont_display[$fullnames[$i]]) && !isset($dont_display[$fieldnames[$i]])) {
          if (isset($centering[$fullnames[$i]])) {
            $align = $centering[$fullnames[$i]];
          } else if (isset($centering[$fieldnames[$i]])) {
            $align = $centering[$fieldnames[$i]];
          } else if (isset($default_alignment)) {
            $align = $default_alignment;
          } else {
            $align = "left";
          }
          if (isset($coloring[$fullnames[$i]])) {
            $add_attributes = "bgcolor=\"#".$coloring[$fullnames[$i]]."\"";
          } else if (isset($coloring[$fieldnames[$i]])) {
            $add_attributes = "bgcolor=\"#".$coloring[$fieldnames[$i]]."\"";
          } else if (isset($default_color)) {
            $add_attributes = "bgcolor=\"#".$default_color."\"";
          } else {
            $add_attributes="";
          }
          echo "<td align=\"$align\" $add_attributes>";
          if (isset($external_processing_function)) {
            $external_processing_function($fieldnames[$i],$tablenames[$i],$row[$i],&$row);
          } else {
			$df = ereg_replace("<", "&lt;", $row[$i]);
 			$df = ereg_replace(">", "&gt;", $df);
            echo "$df\n";
          }
          echo "</td>";
        }
      }
    }
    echo "</table>\n";

    if ($num_rows!=$total_num_rows) {
      if ($limit_length && $limit_start!=-1) {
        echo "<hr width=\"70%\"><table border=\"0\" align=\"center\"><tr>\n";
        if ($limit_start>0) {
          $new_limit_start = $limit_start-$limit_length;
          if ($limit_start<0) {
            $limit_start=0;
          }
          echo "<td>\n";
          echo "<a href=\"$url$pass_on&order_by_clause=$order_by_clause&limit_start=$new_limit_start&limit_length=$limit_length\">Previous $limit_length records</a>";
          echo "</td>\n";
        }
        echo "<td><a href=\"$url$pass_on&order_by_clause=$order_by_clause&limit_start=-1\">All Records</a></td>";
        if ($num_rows+$limit_start < $total_num_rows) {
          $new_limit_start = $limit_start+$limit_length;
          $remaining_records = $total_num_rows-$new_limit_start;
          echo "<td>";
          echo "<a href=\"$url&order_by_clause=$pass_on&$order_by_clause&limit_start=$new_limit_start&limit_length=$limit_length\">";
          if ($remaining_records>$limit_length) {
	        echo "Next $limit_length records";
	      } else {
	      	echo "Last $remaining_records record".($remaining_records!=1?"s":"");
	      }
          echo "</a></td>\n";
        }
        echo "</tr></table>\n";
      }
      mysql_free_result($result);
    }
    return $num_rows;
  }
?>
