<?php

	function status_print ($status, $num) 
	{
		$str = ucfirst($status).":";
		$str.= str_repeat(" ", 14-strlen($str));
		$str.= "<!-- NUM -->$num<!-- /NUM -->\n<br>";
		echo $str;
	}

	$statuses = array (	
						"open", 
						"critical", 
						"closed", 
						"analyzed", 
						"suspended", 
						"duplicate", 
						"assigned", 
						"feedback", 
						"bogus"
				);

	if(!isset($phpver)) {
		echo "<h3>Bug stats for both <a href='lstats.php?phpver=3'>PHP 3</a> and <a href='lstats.php?phpver=3'>PHP 4</a>:</h3><pre>\n";	
	} else {
		echo "<h3>Bug stats for PHP $phpver:</h3><pre>\n";	
	}
	
	mysql_connect("localhost","nobody","");
	mysql_select_db("php3");

	foreach($statuses as $status) {
		$query = "SELECT count(id) from bugdb WHERE";
		if ($phpver > 0) {
			$query .= " php_version LIKE '" . $phpver . "%' AND";
		}
		$query.= " status='$status' AND bug_type NOT LIKE '%Change Request%'";

		$result=mysql_unbuffered_query($query);
		$row=mysql_fetch_row($result);
		mysql_freeresult($result);
		
		status_print($status, $row[0]);
	}
	echo "</pre>\n";
?>
