<?php require "header.inc"?>
<h1>LDAP Example</h1>
<?example('<?  function lookup($host,$base="",$name, $field, $exact) {
		$ds = ldap_connect($host);
		if($ds) {
			$r = ldap_bind($ds);  /* anonymous read-only bind */
			if(!$exact) $name = "*$name*";
			$result = ldap_search($ds, $base, "($field=$name)");
			$array = ldap_get_entries($ds,$result);
			ldap_close($ds);
			return $array;
		} else {
			echo "Unable to connect to $host<P>\n";
		}
	}

	function show($array, $title) {
		$color = array("#a0a0a0","#d0d0d0");

		echo "<table border=0>\n";
		echo "<tr bgcolor=#a0a0a0><th colspan=2>$title</th></tr>\n";
		if(!is_array($array[0])) {
			echo "<tr bgcolor=#d0d0d0><th colspan=2>No Matches!</th></tr>\n";
			echo "</table>\n";
			return;	
		}
       	for ($i=0; $i<$array["count"]; $i++) {
			while(list($key,$value) = each($array[$i])) {
				if(is_array($value)) {
					for($j=0; $j < $value[count]; $j++) {
						echo "<tr bgcolor=".$color[$i%2]."><th>$key</th><td>&nbsp;".$value[$j]."</td></tr>\n";
					}
				} else {
					if($key != "count" && !is_int($key))
						echo "<tr bgcolor=".$color[$i%2]."><th>$key</th><td>&nbsp;".$value."</td></tr>\n";

				}
			}
		}	
		echo "</table>\n";
	}

	if(!$name) {
?>
<form action="<?echo $PHP_SELF?>" method="POST">
<table><tr><th>Name:</th><td><input type=text name=name></td></tr>
<tr><th>Options:</th><td><input type=checkbox name=exact>Exact Match,
Search cn<input type=radio name=field value="cn" CHECKED>,
mail <input type=radio name=field value="mail"></td></tr>
</table>
<input type=submit value="Search!">
</form>
<?  } else {
		$result= lookup("ldap.switchboard.com","c=US",$name,$field,$exact);
		show($result, "SwitchBoard");
	}
?>')?>
<?php require "footer.inc"?>
