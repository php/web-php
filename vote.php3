<?
require("shared.inc");
commonHeader("PHP - Acronym Meaning Vote");

if (empty($name) || empty($email) || empty($choice)) {
	echo "Please fill out your name and email, and select one of the three options.";
} else {
	mysql_connect() or die("Unable to connect to SQL server");
	mysql_select_db("php3");
	if (!mysql_query("insert into name_vote (name,email,choice,comments) values ('$name','$email',$choice,'$comments')")) {
		if (strstr(mysql_error(),"Duplicate entry")) {
			echo "It seems you've already voted.  You can't vote more than once.";
		} else {
			echo "SQL Query Failed:  ".mysql_error();
		}
	} else {
		echo "Thanks for voting!";
	}
	echo "<br><a href='http://il.php.net/vote_listing.php3'>See current votes</a>";
}
commonFooter();
?>

